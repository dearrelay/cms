myApp.service('WatchListService',
    ['$http', '$timeout','BaseService',
    function ($http, $timeout,BaseService) {
    
    this.getWatchLists = function(userId,callbackFunc){
			var dat = {
                    "userId": userId
                  };
		    BaseService.baseServiceCall('POST','WatchList/WatchListDetails',dat,callbackFunc);
		  }
		  
		  
    this.getUserDetails = function(callbackFunc){
		var data = {};
		BaseService.baseServiceCall('GET','WatchList/GetSalesiteUserDetails',data,callbackFunc);
	}
			
	this.WatchListDetailsByWatchListId = function(watchlistid,callbackFunc){
			var dat = {
					"watchListID":watchlistid
				};
			BaseService.baseServiceCall('POST','WatchList/GetWatchListDetail',dat,callbackFunc);
		}
              
	this.AddItemToWatchList = function(userId,itemId,itemType,callbackFunc){
			var dat = {
						"UserID":userId,
						"ItemID":itemId,
						"ItemType":itemType,
						"WatchListID":0
					};
			BaseService.baseServiceCall('POST','WatchList/AddItemToWatchList',dat,callbackFunc);
		}
               
		this.DeleteItemFromWatchList = function(userId,itemId,itemType,watchlistid,callbackFunc){
			var dat = {
						"UserID":userId,
						"ItemID":itemId,
						"ItemType":itemType,
						"WatchListID":watchlistid
					};
			BaseService.baseServiceCall('POST','WatchList/DeleteItemsFromWatchList',dat,callbackFunc);
		}
	this.CreateWatchListService = function(Watchlistname,userid,callbackFunc){
			var dat = {
						"WatchListName":Watchlistname,
						"UserID":userid
					};
			BaseService.baseServiceCall('POST','WatchList/CreateWatchList',dat,callbackFunc);
		}	
		this.DeleteWatchlistService = function(WatchlistId,callbackFunc){
			var dat = {
						"idToBeDeleted":WatchlistId
						
					};
			BaseService.baseServiceCall('POST','WatchList/DeleteWatchList',dat,callbackFunc);
		}	
		this.GetDraftWatchlistService = function(userId,callbackFunc){
			var dat = {
					"userID" : userId
				};
			BaseService.baseServiceCall('POST','WatchList/GetDraftWatchListItems',dat,callbackFunc);
		}
       
		this.MoveToSelectedWatchlists = function (WatchlistIds, userId, callbackFunc) {
		    var dat = {
		        "WatchListID": WatchlistIds,
		        "UserID": userId
		    };
		    BaseService.baseServiceCall('POST','/WatchList/MoveToSelectedWatchLists',dat,callbackFunc);
		}	

		this.ShareWatchlistToSelectedUsers = function (userIds, currentUserId,watchlistId,notes,  callbackFunc) {
		    var dat = {
		        "WatchListID": watchlistId,
		        "UserID": currentUserId,
		        "SharedUserIds": userIds,
			"Notes": notes

		    };
		    BaseService.baseServiceCall('POST','/WatchList/SharedWatchList',dat,callbackFunc);
		}
		this.ExportToCSV = function (watchlistId) {
		    window.open(constants.URL_API + '/WatchList/GetWatchListExport/' + watchlistId);

		}
	}
		
	]);