myApp.controller('WatchlistController',
    ['$scope', '$uibModal','BaseService',
function ($scope, $uibModal, BaseService) {
$('#overlayLoader-newWatchlist').hide();
$scope.WatchlistDataExists=true;
$scope.WatchlistidForService="";
$scope.sortingWatchlist = 'CreatedDate';
$scope.sortbyDate = "-CreatedDate";
$scope.userId = usrid;
$scope.watchListsForDropDown = [];
$scope.SelectedWatchlistId = 0;
$scope.WacthclistValue = "";
$scope.errorClassName = "";
$scope.dummyImage = imgpath + "/default-images/showcard_2.jpg";
$scope.WatchListEmpty = false;
$scope.WatchListValid = true;
$scope.getDraftWatchlists1();
 function updateEpisodeImagesWithDefaultImage (seriesDeatil) {
                                                
                                                
for(var i=0;i<seriesDeatil.length;i++){
if(seriesDeatil[i].ImageUrl === "" || seriesDeatil[i].ImageUrl === null 
                            || typeof seriesDeatil[i].ImageUrl === "undefined") {
                                            seriesDeatil[i].ImageUrl = getDefaultShowCardImage();
                            }
            
            if(seriesDeatil[i].SeasonDetail!==null && seriesDeatil[i].SeasonDetail!=="" && seriesDeatil[i].SeasonDetail!==undefined){
            for(var j=0;j<seriesDeatil[i].SeasonDetail.length;j++){
            for(var k=0;k<seriesDeatil[i].SeasonDetail[j].EpisodeDetail.length;k++){
            if(seriesDeatil[i].SeasonDetail[j].EpisodeDetail[k].EpisodeImageUrl === "" || seriesDeatil[i].SeasonDetail[j].EpisodeDetail[k].EpisodeImageUrl === null 
                            || typeof seriesDeatil[i].SeasonDetail[j].EpisodeDetail[k].EpisodeImageUrl === "undefined") {
                                            seriesDeatil[i].SeasonDetail[j].EpisodeDetail[k].EpisodeImageUrl = getDefaultShowCardImage();
                            }
            
            }
            }
            }
                            
            }
                               

}
                                
                                
           function getDefaultShowCardImage() {
             var defaultImagesArray = [ imgpath+"/default-images/showcard_1.jpg",
                imgpath+"/default-images/showcard_2.jpg",
                imgpath+"/default-images/showcard_3.jpg",
                imgpath+"/default-images/showcard_4.jpg",
                imgpath+"/default-images/showcard_5.jpg",
                imgpath+"/default-images/showcard_6.jpg",
                imgpath+"/default-images/showcard_7.jpg",
                imgpath+"/default-images/showcard_8.jpg",
                imgpath+"/default-images/showcard_9.jpg",
                imgpath+"/default-images/showcard_10.jpg",
                imgpath+"/default-images/showcard_11.jpg",
                imgpath+"/default-images/showcard_12.jpg"];
                
                                return defaultImagesArray[Math.floor(Math.random() * defaultImagesArray.length)];
                }

 $scope.CreateWatchlist=function(WatchlistName){

     if (WatchlistName === "" || WatchlistName === undefined || WatchlistName.length > 49) {
        
         $scope.errorClassName = 'ae-error-fields';
				return;
     }
	 
     else {
	 var repetedCount=0;
	 for(var i=0;i<$scope.watchListsForDropDown.length;i++)
	 {
	 if($scope.watchListsForDropDown[i].WatchListName===WatchlistName)
	 {
	 var modalInstance = $uibModal.open({
		                    templateUrl: 'OverrideConformationMessageWatchlist.html',
		                    controller: 'OverrideConformationWatchlistController',
							 resolve: {
 	                watchListSelectedIDForUserId: function () {
 	                    return $scope.userId;
 	                },
 	                SelectedWatchlistId: function () {
 	                    return $scope.watchListsForDropDown[i].WatchListName;
 	                }
 	            },
		                    scope: $scope
							
		                });
	 	  
				return;
	 }
	 }
	 if(repetedCount===0){
         $('#overlayLoader-newWatchlist').show();
         var dat = {
            "WatchListName":WatchlistName,
            "UserID":$scope.userId
        };
        BaseService.baseServiceCall('POST','WatchList/CreateWatchList',dat, function (dataResponse) {
             $scope.NewWatchlistName = "";
             $scope.WatchListsByUserId();
         });
		 }
     }
     $scope.WatchListEmpty = false;
     $scope.WatchListValid = true;
 }
 $scope.CheckErrorClassName = function () {
     if ($scope.errorClassName === 'ae-error-fields') {
         $scope.errorClassName = '';
     }
 }
 $scope.deleteWatchlist = function () {
     var modalInstance = $uibModal.open({
         templateUrl: 'DeleteWatchlisConfirmMessage.html',
         controller: 'DeleteWatchlisConfirmMessageCntrl',
         scope: $scope
     });

     modalInstance.result.then(function (selectedItem) {
         $scope.selected = selectedItem;
     }, function () {

     });
     $scope.WatchListEmpty = false;
     $scope.WatchListValid = true;
 }
function userDetails(){
    var data = {};
	BaseService.baseServiceCall('GET','WatchList/GetSaleSiteUserDetails',data,function(dataResponse){
        $scope.UserDetails=dataResponse;
    });
}
$scope.deleteWatchlistAccordian=function(details){
    if (details.ProgramType === 'series' || details.SubProgramType === 'Movie') {
				var itemid=details.SeriesID;
				var programtype=details.ProgramType.toLowerCase();
    } else if (details.ProgramType === 'season') {
			    var itemid = details.SeasonID;
			    var programtype = details.ProgramType.toLowerCase();
			}
    else if (details.ProgramType === 'piece') {
        var itemid = 0;
        if (details.PieceID) {
             itemid = details.PieceID;
        } else {
            itemid = details.SeriesID;
        }
					
					var programtype='piece';
			}
    var dat = {
						"UserID":usrid,
						"ItemID":itemid,
						"ItemType":programtype,
						"WatchListID":$scope.WacthclistValue
					};
    BaseService.baseServiceCall('POST','WatchList/DeleteItemsFromWatchList',dat,function(dataResponse){
		$scope.WatchListDetails($scope.WacthclistValue);
	 });
}
  function init(){
	$scope.WatchListsByUserId();
	userDetails();
	}
  
  $scope.WatchListsByUserId=function(){
  $scope.NewWatchlistName = "";
			$scope.watchListsForDropDown=[];
			var dat = {
                    "userId": $scope.userId
                  };
		    BaseService.baseServiceCall('POST','WatchList/WatchListDetails',dat,function (Response) {
			    for (var i = 0; i < Response.length; i++) {
			        $scope.watchListsForDropDown.push(Response[i]);
			    }
			    $scope.WacthclistValue = "";
			});
		$('#overlayLoader').hide();
		$('#overlayLoader-newWatchlist').hide();
			
}

  $scope.GetWatchlistDetails = function (value) {
      if (value !== "") {
          $scope.WacthclistValue = value;
          $scope.WatchListDetails(value);
      } else {
          $scope.WacthclistValue = value;
      }
  }

$scope.WatchListDetails=function(value){
    var dat = {
        "watchListID":value
    };
	BaseService.baseServiceCall('POST','WatchList/GetWatchListDetail',dat,function (dataResponse) {
        $scope.SelectedWatchlistId = value;
        $scope.Watchlistdetails=dataResponse;
        $scope.seriesDetails=dataResponse.SeriesDetail;
        updateEpisodeImagesWithDefaultImage($scope.seriesDetails);
        
        if($scope.seriesDetails.length===0){
            $scope.WatchListEmpty = true;
        }else{
            $scope.WatchListEmpty = false;
        }
        if (dataResponse.IsValidWatchList) {
            $scope.WatchListValid = true;
        } else {
            $scope.WatchListValid = false;
            $scope.WatchListEmpty = false;
        }
    });
    
}
  
  $scope.showScreenerModal = function(episode) {
      $scope.screeerURL = episode.ScreenerUrl;
      var modalInstance = $uibModal.open({
        templateUrl: 'PlayWatchlisScreener.html',
        controller: 'PlayWatchlisScreenerCntrl',
        scope: $scope
    });

    modalInstance.rendered.then(function () {
        $('#screenerWatchList').attr('src',constants.PLAYER_BASE_URL+$scope.screeerURL+'?autoPlay=true');
    }, function () {

    });
      
     
  }
 	$scope.showPopupForWatchlist=function(){
 	    if ($scope.seriesDetails.length > 0) {
 	        var modalInstance = $uibModal.open({
 	            templateUrl: 'WatchListModalContent.html',
 	            controller: 'ModalInstanceCtrl',
 	            resolve: {
 	                UserDetails: function () {
 	                    return $scope.UserDetails;
 	                },
 	                SelectedWatchlistId: function () {
 	                    return $scope.SelectedWatchlistId;
 	                }
 	            },
 	            scope: $scope
 	        });

 	        modalInstance.result.then(function (selectedItem) {
 	            $scope.selected = selectedItem;
 	        }, function () {

 	        });
 	    }
	}
$scope.sorting=function(value){
    if (value === 'CreatedDate') {
	$scope.sortbyDate="-CreatedDate"
	}
    if (value === 'Name') {
	$scope.sortbyDate="SeriesName"
	}
	
}
$scope.GetDetailsPage = function (details) {

    if (details.SubProgramType!==null && details.SubProgramType.toLowerCase() === "scripted") {
        switch (details.ProgramType) {
            case "series":
                details.ProgramType = "Series";
                break;
            case "season":
                details.ProgramType = "Seasons";
                break;
            case "piece":
                details.ProgramType = "Episodes";
                break;
            default:
                break;

        }
        window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
        window.sessionStorage.setItem("pageName", JSON.stringify("Scripted"));
        window.location.href = url + "/scripted-details/" + details.SeriesID + "/?" + details.ProgramType;
        
    }
    if (details.SubProgramType !== null && details.SubProgramType.toLowerCase() === "movie") {
        details.PPLID = details.SeriesID;
        window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
        window.sessionStorage.setItem("pageName", JSON.stringify("Movies"));
        window.location.href = url + "/movie-detail/" + details.PPLID + "/";
        
    }
    if (details.SubProgramType !== null && details.SubProgramType.toLowerCase() === "factual") {
        switch (details.ProgramType) {
            case "series":
                details.ProgramType = "Series";
                break;
            case "season":
                details.ProgramType = "Seasons";
                break;
            case "piece":
                details.ProgramType = "Episodes";
                break;
            default:
                break;

        }

        window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
        window.sessionStorage.setItem("pageName", JSON.stringify("Factual"));
        window.location.href = url + "/factual-detail/" + details.SeriesID + "/?" + details.ProgramType;
    }

    if (details.SubProgramType !== null && details.SubProgramType.toLowerCase() === "format") {
        window.location.href = url + "/formats-details/" + details.PPLID + "/";
        
    }

}

$scope.ExportToCSV = function () {
    if ($scope.WacthclistValue !== "") {
        window.open(constants.URL_API + '/WatchList/GetWatchListExport/' + parseInt($scope.WacthclistValue));
    }
}
  init();
	
}]);


// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $modal service used above.

myApp.controller('ModalInstanceCtrl',
    ['$scope', '$uibModalInstance', 'BaseService', 'UserDetails', 'SelectedWatchlistId', '$uibModal',
function ($scope, $uibModalInstance, BaseService, UserDetails, SelectedWatchlistId,$uibModal) {
var userlist=[];
	userlist=UserDetails;
 $scope.selectOptions = {
            placeholder: "Start typing a name....",
            dataTextField: "UserFullName",
            dataValueField: "UserID",
            valuePrimitive: true,
            autoBind: false,
            dataSource:userlist 
        };
		
        $scope.selectedIds = [];
		
  $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
  }
  $scope.shareNotes = ''
  $scope.shareWithUsers = function () {
      
      if ($scope.selectedIds.length > 0 && usrid !== "") {
        
          var selectedWatchlistId = SelectedWatchlistId;
          var notes = ($scope.shareNotes !== null && $scope.shareNotes !== '') ? $scope.shareNotes : null;
          var dat = {
		        "WatchListID": selectedWatchlistId,
		        "UserID": usrid,
		        "SharedUserIds": $scope.selectedIds,
		        "Notes": notes,
		        "IsMailCopy": $scope.IsMailCopy
		    };
		    BaseService.baseServiceCall('POST','/WatchList/SharedWatchList',dat,function (dataResponse) {
              if (dataResponse) {
                 
                  var modalInstance = $uibModal.open({
                      templateUrl: 'SuccessShareMessageWatchlist.html',
                      controller: 'SuccessShareModalWatchlistCntrl',
                      scope: $scope
                  });

                  modalInstance.result.then(function (selectedItem) {
                      $scope.selected = selectedItem;
                  }, function () {

                  });
              } else {
                  var modalInstance = $uibModal.open({
                      templateUrl: 'ErrorShareMessageWatchlist.html',
                      controller: 'ErrorShareModalWatchlistCntrl',
                      scope: $scope
                  });

                  modalInstance.result.then(function (selectedItem) {
                      $scope.selected = selectedItem;
                  }, function () {

                  });
              }
          });
      }
  }
}]);

myApp.controller('DeleteWatchlisConfirmMessageCntrl', ['$scope', '$uibModalInstance', 'BaseService',
function ($scope, $uibModalInstance, BaseService) {

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');

    };

    $scope.clearConfirmed = function () {           
            $('#overlayLoader').show();

            $scope.WatchlistId = $scope.WacthclistValue;
            var dat = {
                "idToBeDeleted":$scope.WatchlistId
            };
			BaseService.baseServiceCall('POST','WatchList/DeleteWatchList',dat,function (dataResponse) {
			    if (dataResponse === true) {
                   
                    $scope.WatchListsByUserId();
                }
            });
            $uibModalInstance.dismiss('cancel');
          
       
    };
}]);

myApp.controller('PlayWatchlisScreenerCntrl', ['$scope', '$uibModalInstance', function ($scope, $uibModalInstance) {
     $scope.cancelThis = function () {
        $uibModalInstance.dismiss('cancel');

    };
}]);

myApp.controller('SuccessShareModalWatchlistCntrl', ['$scope', '$uibModalInstance', function ($scope, $uibModalInstance) {

    $scope.cancelThis = function () {
        $uibModalInstance.dismiss('cancel');

    };

    $scope.cancelMain = function () {
        $scope.cancelThis();
        $scope.cancel();
    }
    
}]);

myApp.controller('ErrorShareModalWatchlistCntrl', ['$scope', '$uibModalInstance', function ($scope, $uibModalInstance) {

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');

    };

}]);


myApp.controller('OverrideConformationWatchlistController', ['$scope', '$uibModalInstance',  'BaseService','watchListSelectedIDForUserId', 'SelectedWatchlistId', function ($scope, $uibModalInstance, BaseService,watchListSelectedIDForUserId, SelectedWatchlistId ) {
var watchlistId=watchListSelectedIDForUserId;
var selectedWatchListName=SelectedWatchlistId;

    $scope.No = function () {
        $uibModalInstance.dismiss('cancel');

    };
	 $scope.cancelThis = function () {
        $uibModalInstance.dismiss('cancel');

    };


    $scope.Yes = function () {
	  var dat = {
            "WatchListName":selectedWatchListName,
            "UserID":watchlistId,
			"IsUpdateExisting":"true"
        };
        BaseService.baseServiceCall('POST','WatchList/CreateWatchList',dat, function (dataResponse) {
           if(dataResponse!==0){
		   $scope.NewWatchlistName = "";
             $scope.WatchListsByUserId();
			 }
			
         });
		  $uibModalInstance.dismiss('cancel');
		 
	
       
    };
}]);
