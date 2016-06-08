myApp.controller('ModalInstanceCtrlForWatchlist', ['$scope', '$uibModalInstance','BaseService', '$uibModal','DraftWatchlistService', function ($scope, $uibModalInstance,BaseService, $uibModal,DraftWatchlistService) {
$scope.watchListsForCheckBox=[];
$scope.selectedWatchlists = [];
$scope.DraftWatchlistItems = [];
getDraftWatchlists();
$scope.errorClassName = "";
$scope.getWatchlists = function(){
$scope.watchlistname="";
    $scope.watchListsForCheckBox=[];
    var dat = {
        "userId": usrid
    };
    BaseService.baseServiceCall('POST','WatchList/WatchListDetails',dat,function(Response) {
        for(var i=0;i<Response.length;i++){
            $scope.watchListsForCheckBox.push(Response[i]);
        }
        if($scope.watchListsForCheckBox.length>5) {
            $('.watchlists-checkbox-block').css('padding-right','15px');
        }
    });
}
 $scope.getWatchlists();
$scope.CreateWatchlistPopup = function (name) {

    if (name === "" || name === undefined || name.length>49) {
        $scope.errorClassName = 'ae-error-fields';
        return;
    }
	else{
	var repetedCount=0;
	 for(var i=0;i<$scope.watchListsForCheckBox.length;i++)
	 {
	 if($scope.watchListsForCheckBox[i].WatchListName===name)
	 {
	 var modalInstance = $uibModal.open({
		                    templateUrl: 'OverrideConformationMessageWatchlist.html',
		                    controller: 'OverrideConformationWatchlistController',
							 resolve: {
 	                watchListSelectedIDForUserId: function () {
 	                    return usrid;
 	                },
 	                SelectedWatchlistId: function () {
 	                    return $scope.watchListsForCheckBox[i].WatchListName;
 	                }
 	            },
		                    scope: $scope
							
		                });
	  
				return;
	 }
	 }
	 if(repetedCount===0){
    $scope.watchListsForCheckBox = [];
    var dat = {
        "WatchListName":name,
        "UserID":usrid
    };
    BaseService.baseServiceCall('POST','WatchList/CreateWatchList',dat,function (dataResponse) {
        $scope.watchlistname = "";
        $scope.getWatchlists();

    });
	}
	}
}
$scope.labelHighlight=function(id){
 if(document.getElementById(id+'checkbox').checked){
   $('#'+id).css( 'color','black');
   }else{
   $('#'+id).css({"display": "inline-block","float": "left","font-size": "22px","padding": "10px 0","text-align": "left","width": "auto","color": "#afafaf"});

   }
}
$scope.clickFnLabel=function(id){
if(document.getElementById(id+'checkbox').checked){
document.getElementById(id+'checkbox').checked=false;
 $('#'+id).css({"display": "inline-block","float": "left","font-size": "22px","padding": "10px 0","text-align": "left","width": "auto","color": "#afafaf"});
    $scope.selectedWatchlists.splice($scope.selectedWatchlists.indexOf(id),1);
   }else{
 
   document.getElementById(id+'checkbox').checked=true;
   $scope.selectedWatchlists.push(id);
    $('#'+id).css( 'color','black');
   }
}
	$scope.CheckErrorClassName = function () {
	    if ($scope.errorClassName === 'ae-error-fields') {
	        $scope.errorClassName = '';
	    }
	}
	$scope.deleteItemFromDraft=function(draft){
	$('#overlayLoaderForDraft').show();
			if(draft.ProgramType==='series'){
				var itemid=draft.SeriesID;
				var programtype=draft.ProgramType.toLowerCase();
				$('.' +draft.SeriesID+'minus').hide();
				$('.' +draft.SeriesID+'plus').show();
				$('#'+draft.SeriesID+'banner').addClass('addlist-btn').removeClass('removelist-btn');
				$('#' + draft.SeriesID + 'banner').text("Add to watchlists");
				var seasonAttr = $("span[id$='season']").attr('id');
				if (seasonAttr !== undefined) {
				    var splitSeasonId = seasonAttr.split('-');
				    $("span[id$='season']").addClass('addlist-btn').removeClass('removelist-btn');
				    $("span[id$='season']").text("Add Season " + splitSeasonId[1] + (splitSeasonId[2].length === 1 ? '-' + splitSeasonId[2] : '') + " to watchlists");
				    
				}
				    $("span[id$='episode']").addClass('addlist-btn').removeClass('removelist-btn');
				    $("span[id$='episode']").text("Add Episode to watchlists");
				  
			} else if (draft.ProgramType === 'season') {
			    var itemid = draft.SeasonID;
			    var programtype = draft.ProgramType.toLowerCase();
			    $('.' + itemid + 'minus').hide();
			    $('.' + itemid + 'plus').show();
			    var seasonAttr = $("span[id$='season']").attr('id');
			    if (seasonAttr !== undefined) {
			        var splitSeasonId = seasonAttr.split('-');
			        $("span[id$='season']").addClass('addlist-btn').removeClass('removelist-btn');
			        $("span[id$='season']").text("Add Season " + splitSeasonId[1] + (splitSeasonId[2].length === 1 ? '-' + splitSeasonId[2] : '') + " to watchlists");
			    }

			    $("span[id$='episode']").addClass('addlist-btn').removeClass('removelist-btn');
			    $("span[id$='episode']").text("Add Episode to watchlists");
			}
			else {
			    if (draft.PieceID!==undefined) {
			        var itemid = draft.PieceID;
			    } else {
			        // this will be piece present at series level
			        var itemid = draft.SeriesID; 
			    }
					
					var programtype='piece';
					$('.' + itemid + 'minus').hide();
					$('.' + itemid + 'plus').show();
					$("span[id$='episode']").each(function () {
					    if ($(this).attr('id') === itemid + 'episode')
					    {
					        $(this).addClass('addlist-btn').removeClass('removelist-btn');
					        $(this).text("Add Episode to watchlists");
					    }
					})
					var seasonAttr = $("span[id$='season']").attr('id');
					if (seasonAttr !== undefined) {
					    var splitSeasonId = seasonAttr.split('-');
					    $("span[id$='season']").addClass('addlist-btn').removeClass('removelist-btn');
					    $("span[id$='season']").text("Add Season " + splitSeasonId[1] + (splitSeasonId[2].length === 1 ? '-' + splitSeasonId[2] : '') + " to watchlists");
					}
			}
			if(draft.SubProgramType==='Movie'){
					var itemid=draft.SeriesID;
					var programtype='piece';
					$('.' + itemid + 'minus').hide();
					$('.' + itemid + 'plus').show();
			}
            var dat = {
						"UserID":usrid,
						"ItemID":itemid,
						"ItemType":programtype,
						"WatchListID":0
					};
					
			BaseService.baseServiceCall('POST','WatchList/DeleteItemsFromWatchList',dat,function(dataResponse){
					
                    $scope.DraftWatchlistItems=[];
                    if(dataResponse && dataResponse.SeriesDetail) {
                        $scope.DraftWatchlistItems=dataResponse.SeriesDetail;
                        $scope.DraftWatchlistId=dataResponse.WatchListID;
                        setTimeout(function() {
                            DraftWatchlistService.UpdateWatchListItems(dataResponse.SeriesDetail);
                        }, 500);
                    } else {
                        window.sessionStorage.setItem("seasonIdsArray","");
                        $('#draftListId').hide();
                    }
					$('#overlayLoaderForDraft').hide();
                    getDraftWatchlists();
			});
		}
	$scope.clearDraft = function () {
	    if ($scope.DraftWatchlistItems.length > 0) {


	        var modalInstance = $uibModal.open({
	            templateUrl: 'ClearDraftConfirmMessageWatchlist.html',
	            controller: 'ClearDraftConfirmWatchlistCntrl',
	            scope: $scope
	        });

	        modalInstance.result.then(function (selectedItem) {
	            $scope.selected = selectedItem;
	        }, function () {

	        });
	    }
        
		}
		$scope.MovetoSelectedWatchlists = function () {
		if($scope.DraftWatchlistItems.length<1){
			
			var modalInstance = $uibModal.open({
								templateUrl: 'NoItemInCartMessageWatchlist.html',
								controller: 'ModalInstanceCtrlForWatchlist',
																							
								scope: $scope
																							
							});
			}
			else
			{

		    if ($scope.selectedWatchlists.length > 0 && $scope.DraftWatchlistItems.length>0 && usrid !== "" && usrid != 0) {
                var dat = {
		        "WatchListID": $scope.selectedWatchlists,
		        "UserID": usrid
		    };
		    BaseService.baseServiceCall('POST','/WatchList/MoveToSelectedWatchLists',dat,function (dataResponse) {
		            if (dataResponse) {
		                $scope.clearList();
						$('a[class*="minus"]').each(function(item){
                    $(this).hide();
                });
                $('a[class*="plus"]').each(function(item){
                    $(this).show();
                });
                $('img[class*="minus"]').each(function(item){
                    $(this).hide();
                });
                $('img[class*="plus"]').each(function(item){
                    $(this).show();
                });
                $('button[class*="minus"]').each(function(item){
                    $(this).hide();
                });
                $('button[class*="plus"]').each(function(item){
                    $(this).show();
                });
                $("span[id$='banner']").addClass('addlist-btn').removeClass('removelist-btn');
                $("span[id$='banner']").text("Add to watchlists");
				var seasonAttr = $("span[id$='season']").attr('id');
				if(seasonAttr !== undefined) {
					var splitSeasonId = seasonAttr.split('-');
					$("span[id$='season']").addClass('addlist-btn').removeClass('removelist-btn');
					$("span[id$='season']").text("Add Season " + splitSeasonId[1] + (splitSeasonId[2].length===1 ? '-'+splitSeasonId[2]:'') + " to watchlists");
				}
                $("span[id$='episode']").addClass('addlist-btn').removeClass('removelist-btn');
                $("span[id$='episode']").text("Add Episode to watchlists");
                window.sessionStorage.setItem("seasonIdsArray","");
                $('#draftListId').hide();
		                var modalInstance = $uibModal.open({
		                    templateUrl: 'SuccessMessageWatchlist.html',
		                    controller: 'SuccessModalWatchlistCntrl',
		                    scope: $scope
		                });

		                modalInstance.result.then(function (selectedItem) {
		                    $scope.selected = selectedItem;
		                }, function () {

		                });
		            } else {
		                var modalInstance = $uibModal.open({
		                    templateUrl: 'ErrorMessageWatchlist.html',
		                    controller: 'ErrorModalWatchlistCntrl',
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
		}
	function getDraftWatchlists(){
        var dat = {
					"userID" : usrid
				};
        BaseService.baseServiceCall('POST','WatchList/GetDraftWatchListItems',dat,function(Response){
            $scope.DraftWatchlistItems=[];
            $scope.DraftWatchlistItems=Response.SeriesDetail;
            $scope.DraftWatchlistId=Response.WatchListID;
			$('#overlayLoaderForDraft').hide();
        });
		
    }
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
		
    };

    $scope.clearList = function () {
        $scope.DraftWatchlistItems = [];
    }

    $scope.ShowWatchlistTab = function () {
         $("#checklist-tab2").addClass("active");
   $("#checklist-tab1").removeClass("active");
   $("#list-watchlists").addClass("active").addClass("in");
   $("#list-selections").removeClass("active").removeClass("in");
       
    }
}]);

myApp.controller('SuccessModalWatchlistCntrl', ['$scope', '$uibModalInstance', function ($scope, $uibModalInstance) {

    $scope.cancelThis = function () {
        $uibModalInstance.dismiss('cancel');

    };

    $scope.cancelMain = function () {
        $scope.cancelThis();
        $scope.cancel();
        
    }

    $scope.GotoWatchlist = function () {
        window.location.href = url + "/mywatchlist/";
    }

}]);

myApp.controller('ErrorModalWatchlistCntrl', ['$scope', '$uibModalInstance', function ($scope, $uibModalInstance) {

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');

    };

}]);

myApp.controller('ClearDraftConfirmWatchlistCntrl', ['$scope', '$uibModalInstance', 'BaseService', function ($scope, $uibModalInstance, BaseService) {

    $scope.cancelConfirmation = function () {
        $uibModalInstance.dismiss('cancel');
        
    };

    $scope.clearConfirmed = function () {
        var dat = {
            "idToBeDeleted":$scope.DraftWatchlistId
        };
        BaseService.baseServiceCall('POST','WatchList/DeleteWatchList',dat,function (dataResponse) {
             
            if (dataResponse) {
                $scope.clearList();
                $('a[class*="minus"]').each(function(item){
                    $(this).hide();
                });
                $('a[class*="plus"]').each(function(item){
                    $(this).show();
                });
                $('img[class*="minus"]').each(function(item){
                    $(this).hide();
                });
                $('img[class*="plus"]').each(function(item){
                    $(this).show();
                });
                $('button[class*="minus"]').each(function(item){
                    $(this).hide();
                });
                $('button[class*="plus"]').each(function(item){
                    $(this).show();
                });
                $("span[id$='banner']").addClass('addlist-btn').removeClass('removelist-btn');
                $("span[id$='banner']").text("Add to watchlists");
				var seasonAttr = $("span[id$='season']").attr('id');
                if(seasonAttr !== undefined) {
					var splitSeasonId = seasonAttr.split('-');
					$("span[id$='season']").addClass('addlist-btn').removeClass('removelist-btn');
					$("span[id$='season']").text("Add Season " + splitSeasonId[1] + (splitSeasonId[2].length===1 ? '-'+splitSeasonId[2]:'') + " to watchlists");
				}
                $("span[id$='episode']").addClass('addlist-btn').removeClass('removelist-btn');
                $("span[id$='episode']").text("Add Episode to watchlists");
                window.sessionStorage.setItem("seasonIdsArray","");
                $('#draftListId').hide();
            }
            $uibModalInstance.dismiss('cancel');
        });
        $scope.cancel();
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
	  BaseService.baseServiceCall('POST', 'WatchList/CreateWatchList', dat, function (dataResponse) {
           if(dataResponse!==0){
                    $scope.getWatchlists();					
			 }
			
         });
		  $uibModalInstance.dismiss('cancel');
		 
	
       
    };
}]);