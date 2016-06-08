myApp.service('MyDetailsService', ['$http', '$window', 'AuthenticationServices',
    function ($http,$window,AuthenticationServices) {
   
    var self = this;
    this.redirectToLogin = function () {
        sessionStorage.clear();
        AuthenticationServices.Logout(function (response) {
            if (response === true) {
               
                window.sessionStorage.setItem("sessionExpired", 'true');
                $window.location = url + '/login/';
            }
        });
    }
    this.UpdatePassowrd = function (input,callbackFunc) {
        $http({
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            method: 'POST', contentType: false,
            crossDomain: true,
            processData: false,
            url: constants.URL_API+'/Login/ChangePassword',
            data:input

        }).success(function (data) {
            // With the data succesfully returned, call our callback
            callbackFunc(data);
        }).error(function (xhr,status) {
            
            if (status === 401) {
                self.redirectToLogin();
            }
        });
    }
       this.getMyAccountDetails = function (input,callbackFunc) {
        $http({
             headers: {
                         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                       },
            method: 'POST',
            contentType: false,
           crossDomain: true,
           url:  constants.URL_API+'Home/GetMyDetail' ,
                                  data: input

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
