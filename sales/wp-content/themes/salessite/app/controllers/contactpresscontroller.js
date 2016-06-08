myApp.controller('ContactPressController',
    ['$scope', 'SeriesDataService', '$location', '$uibModal',
function ($scope, SeriesDataService, $location, $uibModal) {
    $scope.itemsPerPage = 9;
    $scope.currentPage = 1;
    $scope.ContactsList=[];
	$scope.SalesTerritoryList=[];
	var defaultSelection = 'Showing all A+E Contacts';
	$scope.SalesTerritoryList.push(defaultSelection);
	
	$scope.territory='Showing all A+E Contacts';
    $scope.PressList=[];
	$('#overlayLoader').show();
	if($location.absUrl().indexOf("contacts")!==-1) {
		SeriesDataService.getContactsDataCMS(function (dataResponse) {
			
			$scope.ContactTypeAppModel = [];
			for (var i = 0; i < dataResponse.length; i++) {
				if (dataResponse[i]) {
					$scope.ContactTypeAppModel.push({
						"Name" : dataResponse[i].title,
						"Designation": dataResponse[i].designation,
						"Email": dataResponse[i].email,
						"Phone": dataResponse[i].phone_number,
						"Picture": dataResponse[i].picture,
						"Role": dataResponse[i].role,
						"SalesTerritory": dataResponse[i].sales_territory
					});
					$scope.ContactsList.push($scope.ContactTypeAppModel[i]);
					$scope.salesData = {};
					$scope.salesData['sales_territory']=dataResponse[i].sales_territory; 
					if($scope.SalesTerritoryList.indexOf($scope.salesData['sales_territory']) < 0)
					{
						$scope.SalesTerritoryList.push($scope.salesData['sales_territory']);
					}					
				}
			}
		});
		$scope.changeTerritory = function(value) {
		if(value==='Showing all A+E Contacts'){
			$scope.ContactsList=$scope.ContactTypeAppModel;
			return;
		}
		$scope.contactsAll=[];
		$scope.contactsAll=$scope.ContactTypeAppModel;
		$scope.ContactsList=[];
			for (var i = 0; i < $scope.contactsAll.length; i++) {
                 if($scope.contactsAll[i].SalesTerritory === value){
					$scope.ContactsList.push($scope.contactsAll[i]);
				}
            }

        }
			$('#overlayLoader').hide();

	}
	if($location.absUrl().indexOf("press")!==-1) {		
	
		SeriesDataService.getPressDataCMS(function (dataResponse) {
			
			var PressTypeAppModel = [];
			$scope.pressArr=[];
			for (var i = 0; i < dataResponse.length; i++) {
				if (dataResponse[i]) {
					PressTypeAppModel.push({
						"Title" : dataResponse[i].title,
						"Description": dataResponse[i].content,
						"Picture": dataResponse[i].image,
						"Company": dataResponse[i].author,
						"Date": dataResponse[i].date,
						"Id": dataResponse[i].id
					});
					$scope.pressArr.push(PressTypeAppModel[i]);
				}
			}
			$scope.TotalRecords = $scope.pressArr.length;
			$scope.TotalPages = Math.ceil(($scope.TotalRecords) / ($scope.itemsPerPage));
			$scope.numPages = $scope.TotalPages;
			$scope.allPressList = $scope.pressArr;
			$scope.myFunction();
			$('#overlayLoader').hide();
			
			
		});
	}
	$scope.myFunction = function () {

	    $scope.PressList = [];
	    var begin = (($scope.currentPage - 1) * $scope.itemsPerPage);
	    var end = begin + $scope.itemsPerPage - 1;
	    for (var i = begin; i <= end; i++) {
	        if ($scope.pressArr[i] !== undefined) {
	            $scope.PressList.push($scope.pressArr[i]);
	        }
	    }
	
	}
	$scope.ShowPopup = function (pressRelease, indexRelease) {
	    var windowwidth = $(window).width();
	    if (windowwidth >= 768) {
	        var modalInstance = $uibModal.open({
	            templateUrl: 'PressModalContent.html',
	            controller: 'PressModalInstanceCtrl',
	            resolve: {
	                pressRelease: function () {
	                    return pressRelease;

	                },
	                allPressList: function () {
	                    return $scope.PressList;
	                },
	                indexRelease: function () {
	                    return indexRelease;
	                }

	            },
	            scope: $scope
	        });

	        modalInstance.result.then(function (selectedItem) {
	            $scope.selected = selectedItem;
	        }, function () {

	        });
	    }
	};
}]);