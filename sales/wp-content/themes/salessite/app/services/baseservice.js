myApp.service('BaseService',
['$http', '$timeout', '$window', 'AuthenticationServices',
function($http, $timeout, $window,AuthenticationServices){
    this.baseServiceCall = function (methodtype, urlname, datas, callbackFunc) {
     
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: methodtype,
                contentType: false,
                crossDomain: true,
                url: constants.URL_API + urlname,
                data: datas,
                timeout: 15000
            }).success(function (data) {
                callbackFunc(data);
            }).error(function (data,status) {                

                if (status === 401) {
                    sessionStorage.clear();
                    AuthenticationServices.Logout(function (response) {
                        if (response === true) {
                          
                            window.sessionStorage.setItem("sessionExpired", 'true');
                            $window.location = url + '/login/';
                        }
                    });
                } else {
                    callbackFunc(data);
                }
            });
        
    }



    
}]);