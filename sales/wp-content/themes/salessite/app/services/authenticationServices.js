myApp.factory('AuthenticationServices',
    ['$http', '$timeout',
    function ($http, $timeout) {
        var service = {};
        service.Login = function (dataModel, callback) {
            var req = {
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8'
                },
                method: 'POST',
                data: dataModel, contentType: false,
                crossDomain: true,
                processData: false,
                url: url + '/wp-json/wp/v2/login',
                timeout: 15000
            }
            $http(req)
                .success(function (response) {
                    callback(response);
                })
            .error(function (response) {
               			
					$('#overlayLoader').hide();
					$('#overlayLoader-signinmodal').hide();
					$('#overlayLoader-signincatalog').hide();
            });
		};
		     service.Logout = function (callback) {
         
            var req = {
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8'
                },
                method: 'GET',             
                crossDomain: true,
                url:url + '/wp-json/wp/v2/logout'
            }
            $http(req)
                .success(function (response) {
                    callback(response);
                })
            .error(function (response) {
               
            });
            
            

        };

        
        return service;
    }])

