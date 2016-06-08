myApp.service('BrowseAllService',
['$http', 'AuthenticationServices', '$window',
function ($http,AuthenticationServices,$window) {
   
    var self = this;
    this.redirectToLogin = function () {
       
        AuthenticationServices.Logout(function (response) {
            if (response === true) {
                sessionStorage.clear();
               
                window.sessionStorage.setItem("sessionExpired", 'true');
                $window.location = url + '/login/';
            }
        });
    }
    this.getBrowseAllData = function (query,callbackFunc) {
        $http({
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            method: 'GET', contentType: false,
            crossDomain: true,
            processData: false,
           url: constants.URL_SOLR+'/select?q=*:*&wt=json&indent=true&rows=7400'
        }).success(function (data) {
            // With the data succesfully returned, call our callback
            callbackFunc(data);
        }).error(function () {
            
        });
    }
      this.getMovieListing = function (data,callbackFunc) {
        $http({
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            method: 'POST',
			contentType: false,
            crossDomain: true,
            processData: false,
			data:data,
            url: constants.URL_API+'Movie/GetMovieListing'

        }).success(function (data) {
            // With the data succesfully returned, call our callback
            callbackFunc(data);
        }).error(function (xhr,status) {
           
            if (status === 401) {
                self.redirectToLogin();
            }
        });
    }
	

}]);

