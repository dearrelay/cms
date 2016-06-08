myApp.service('MoviesService',
    ['$http', '$timeout', '$window', 'AuthenticationServices',
    function ($http, $timeout,$window,AuthenticationServices) {
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
		this.getLandingMovies = function(callbackFunc){
		 $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'GET',
                        contentType: false,
                        url: constants.URL_API+'Movie/GetLandingMovies'
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function (xhr,status) {
                        
                        if (status === 401) {
                            self.redirectToLogin();
                        }
                    });
	}
	this.getLandingFactual = function(callbackFunc){
		 $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'GET',
                        contentType: false,
                        url: constants.URL_API+'Factual/GetFactualCarousel'
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function (xhr,status) {
                        
                        if (status === 401) {
                            self.redirectToLogin();
                        }
                    });
	}

		 
		
		     
			 
        this.setMovieDetails = function (movieModel) {
            moviesDetail = movieModel;
        }

        this.getMovieDetails = function () {
            return moviesDetail;
        }

        this.getBannerData = function (pageId, callbackFunc) {
           
            $http({
                
                method: 'GET',
                contentType: false,
                url: url +'/wp-json/wp/v2/pages/'+pageId
            }).success(function (data) {
                // With the data succesfully returned, call our callback
               
                callbackFunc(data);
            }).error(function () {
              
            });
        }


    }])

