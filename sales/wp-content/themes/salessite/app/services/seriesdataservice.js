myApp.service('SeriesDataService',
    ['$http', '$timeout', '$window', 'AuthenticationServices',
    function ($http, $timeout,$window,AuthenticationServices) {
        var seriesDetail = {};
        var self = this;
        var countforRedirect = 0;
        this.redirectToLogin = function () {
            countforRedirect++;
            if (countforRedirect === 1) {
                
                AuthenticationServices.Logout(function (response) {
                    if (response === true) {
                       
                        sessionStorage.clear();
                        window.sessionStorage.setItem("sessionExpired", 'true');
                        $window.location = url + '/login/';
                    }
                });
            }
        }
        this.getSeriesDataCMS = function (data,callbackFunc) {
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                url: url + '/wp-json/wp/v2/getCarouselByType/'+data
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function () {
            
            });
        }
		
		
		
		
		this.getContactsDataCMS = function (callbackFunc) {
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                url: url + '/wp-json/wp/v2/contactDirectory/'
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function () {
                
            });
        }
        this.getPressDataCMS = function (callbackFunc) {
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                url: url + '/wp-json/wp/v2/getPressdetails'
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function (data) {
               
                
            });
        }

        this.getSeriesData = function (dataModel, callbackFunc) {
                    
                    $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'POST',
                        contentType: false,
                        crossDomain: true,
                        url: constants.URL_API+'Scripted/GetSeriesList',
                        data: dataModel
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function (xhr,status) {
                       
                        if (status===401) {
                            self.redirectToLogin();
                        }
                    });
        }
		/*Scripted Details Services Start*/
		  this.getSeriesDataByID = function (data,type, callbackFunc) {
		      var dat={};
			  if(data.ProgramType ==="Scripted" || data.ProgramType ==="Factual"){
			data.ProgramType = 'Series';
			  }
			 
		      if(type === 'Movies'){
                dat = {
                    "ItemId": data.PPLID,
                    "ProgramType":'Episodes',
                     "PPLProgramType":type
                }
              }
              else if(type === 'Formats'){
                 dat = {
                    "ItemId": data.SeriesID,
                    "ProgramType":data.ProgramType,
                     "PPLProgramType":type
                }
              } else {
                  dat = {
                    "ItemId": data.SeriesID,
                    "ProgramType":data.ProgramType,
					
                     "PPLProgramType":type
                  }
				  if(data.ProgramType ==="Factual" )
					{
					  dat.ProgramType ='Series';
					}
              }
			  
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'POST',
                contentType: false,
                crossDomain: true,
                url: constants.URL_API+'Scripted/GetSeriesDetailById',
                data: dat
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function (xhr,status) {
                
                if (status === 401) {
                    self.redirectToLogin();
                }
            });
        }
		this.getSeriesDataFromSearchByIDforsearch = function (data,input, callbackFunc) {
		var programType = "";
		switch(data.ItemName)
		{
		case "Series":
		programType = "Series";
		break;
		case "Piece":
		programType = "Episodes";
		break;
		case "Season":
		programType = "Seasons";
		break;
		}
                    var dat = {
                        "ItemId": data.PPLID,
						"ProgramType":programType,
						"PPLProgramType":input	
                    };
                    $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'POST',
                        contentType: false,
                        crossDomain: true,
                        url: constants.URL_API+'Scripted/GetSeriesDetailById',
                        data: dat
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function (xhr,status) {
                        
                        if (status === 401) {
                            self.redirectToLogin();
                        }
                    });
        }
		this.getSeriesDataFromSearchByID = function (data, callbackFunc) {
		var programType = "";
		switch(data.ItemName)
		{
		case "Series":
		programType = "Series";
		break;
		case "Piece":
		programType = "Episodes";
		break;
		case "Season":
		programType = "Seasons";
		break;
		}
                    var dat = {
                        "ItemId": data.PPLID,
						"ProgramType":programType
							
                    };
                    $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'POST',
                        contentType: false,
                        crossDomain: true,
                        url: constants.URL_API+'Scripted/GetSeriesDetailById',
                        data: dat
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function (xhr,status) {
                       
                        if (status === 401) {
                            self.redirectToLogin();
                        }
                    });
        }
		 this.getSeriesDetailsByID = function (data,type,callbackFunc) {
		 
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                url: url + '/wp-json/wp/v2/getProgramDetailsByID/'+type+'/'+data
				
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function (xhr,status) {
               
                if (status === 401) {
                    self.redirectToLogin();
                }
            });
        }
		
		this.getDetailsContentByType = function (data,type,callbackFunc) {
		 
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                url: url + '/wp-json/wp/v2/getDetailsContentByType/'+data
				
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function () {
                
            });
        }
         this.getRatingDetailsDetailsByID = function (data,type,callbackFunc) {
		 
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                url: url + '/wp-json/wp/v2/getRatingByItemID/'+type+'/'+data
				
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function () {
                
            });
        }
		this.getCastingDetailsDetailsByID = function (data,type,callbackFunc) {
		 
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                url: url + '/wp-json/wp/v2/getCastByItemID/'+type+'/'+data
				
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function () {
               
            });
        }
/*Scripted Details Services Start*/		
        this.setSeriesDetails = function (seriesModel) {
            seriesDetail = seriesModel;
        }

        this.getSeriesDetails = function () {
            return seriesDetail;
        }
	
	this.getBannerData = function(input,callbackFunc){
		 $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'GET',
                        contentType: false,
                        url: url+'/wp-json/wp/v2/getBannersList/'+input
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function () {
                        
                    });
	}
	this.getSizzleCMS = function (input,callbackFunc) {
	    $http({
	        headers: {
	            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	        },
	        method: 'GET',
	        contentType: false,
	        url: url + '/wp-json/wp/v2/pages/'+input
	    }).success(function (data) {
	        // With the data succesfully returned, call our callback
	        callbackFunc(data);
	    }).error(function () {
	     
	    });
	}
    
	// hero image for movie listing 
	
	this.getGenreDetails = function (input,callbackFunc) {
	    $http({
	        headers: {
	            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	        },
	        method: 'GET',
	        contentType: false,
	        url: url + '/wp-json/wp/v2/getGenreDetails/'+input.GenreId
	    }).success(function (data) {
	        // With the data succesfully returned, call our callback
	        callbackFunc(data);
	    }).error(function () {
	       
	    });
	}
	
//factual Listing
this.getFactualListing = function (data,callbackFunc) {
        $http({
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            method: 'POST',
			contentType: false,
            crossDomain: true,
            processData: false,
			data:data,
            url: constants.URL_API+'Factual/GetFactualListing'

        }).success(function (data) {
            // With the data succesfully returned, call our callback
            callbackFunc(data);
        }).error(function (xhr,status) {
           
            if (status === 401) {
                self.redirectToLogin();
            }
        });
    }
	//format landing data
    this.getFormatLandingData = function(data,callbackFunc) {
        $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                crossDomain: true,
                processData: false,
                url: url + '/wp-json/wp/v2/pages/'+data

            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function () {
            
            });
    }
	//format detail
	this.getFormatsDetailById = function (data,callbackFunc) {
        $http({
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            method: 'POST',
			contentType: false,
            crossDomain: true,
            processData: false,
			data:data,
            url: constants.URL_API+'Scripted/GetFormatsDetailById'

        }).success(function (data) {
            // With the data succesfully returned, call our callback
            callbackFunc(data);
        }).error(function (xhr,status) {
        
            if (status === 401) {
                self.redirectToLogin();
            }
        });
    }
	//Scripted Details
	
	/* Assets Tab Calls*/
	this.GetSeriesAssets = function(data,callbackFunc){
			var dat = {
                    "seriesId": data.SeriesID
                       
                };
                $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'POST',
                        contentType: false,
                        crossDomain: true,
                        url: constants.URL_API+'Scripted/GetSeriesAssetDetailById',
                        data: dat
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function (xhr,status) {
                      
                        if (status === 401) {
                            self.redirectToLogin();
                        }
                });
			}
			/* You may interested in Data*/
	this.getYouMayInterstedInData = function(itemId,programType,callbackFunc){
			
			var dat = {
			    "ItemId": itemId,
			    "ProgramType": programType

			};
                $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'POST',
                        contentType: false,
                        crossDomain: true,
                        url: constants.URL_API+'Factual/GetYouMayInterestedInData',
                        data: dat
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function (xhr,status) {
                      
                        if (status === 401) {
                            self.redirectToLogin();
                        }
                });
			}
			
			
			
		this.getCategoryList = function(callbackFunc){
			
                $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'GET',
                        contentType: false,
                        crossDomain: true,
                        url: constants.URL_API+'Factual/GetCategoryList'
                        
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function (xhr,status) {
                        if (status === 401) {
                            self.redirectToLogin();
                        }
                      
                });
			}
			//Formats for getting cms ids
			this.getFormatsDetailByIdfromcms = function (input,callbackFunc) {
	    $http({
	        headers: {
	            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	        },
	        method: 'GET',
	        contentType: false,
	        url: url + '/wp-json/wp/v2/getFormatsDetailsByID/'+input
	    }).success(function (data) {
	        // With the data succesfully returned, call our callback
	        callbackFunc(data);
	    }).error(function () {
	       
	    });
	}
	//Genere List For Advanced Results
	this.getAdvancedFilter = function(data,callbackFunc){
			
                $http({
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        },
                        method: 'GET',
                        contentType: false,
                        crossDomain: true,
                        url: constants.URL_API+'Shared/GetAdvancedFilter'                        
                    }).success(function (data) {
                        // With the data succesfully returned, call our callback
                        callbackFunc(data);
                    }).error(function (xhr,status) {
                        if (status === 401) {
                            self.redirectToLogin();
                        }
                       
                });
			}
			
	/* Only Scripted Details Services Start*/
		  this.getSeriesDetailsDataByID = function (data,type, callbackFunc) {
		      var dat={};
			 
			 
		      if(type === 'Movies'){
                dat = {
                    "itemId": data.PPLID,
                    "programType":'Episodes',
                     "PPLProgramType":type
                }
              }
              else {
                  dat = {
                    "itemId": data.SeriesID,
                    "programType":data.ProgramType,
					
                     "PPLProgramType":type
                  }
				  
              }
			  
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                crossDomain: true,
                url: constants.URL_API+'Scripted/GetSeriesDataById?itemId='+dat.itemId +'&programType='+dat.programType,
                data: dat
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function (xhr,status) {
            
                if (status === 401) {
                    self.redirectToLogin();
                }
            });
        }		
			
		/* Only Season Details Services Start*/
		
		 this.getSeasonDetailsDataByID = function (data,type, callbackFunc) {
		      var dat={};
			 
			 
		       if(type === 'Movies'){
                dat = {
                    "itemId": data.SeriesID,
                    "programType":'Episodes',
                     "PPLProgramType":type
                }
              }
              else {
                  dat = {
                    "itemId": data.SeriesID,
                    "programType":data.ProgramType,
					
                     "PPLProgramType":type
                  }
				  
              }
			  
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                crossDomain: true,
                url: constants.URL_API + 'Scripted/GetSeasonDataById?itemId=' + dat.itemId + '&programType=' + dat.programType,
                data: dat
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function (xhr,status) {
             
                if (status === 401) {
                    self.redirectToLogin();
                }
            });
        }
		  
        /* Only Episode Details Services Start*/
		 			
	
		
		 this.getEpisodeDetailsDataByID = function (data,seasonid,type,episodeCount, callbackFunc) {
		      var dat={};
			  if(data.ProgramType ==="Scripted" || data.ProgramType ==="Factual"){
			data.ProgramType = 'Series';
			  }
			 
		      if(type === 'Movies'){
                dat = {
                    "itemId": data.SeriesID,
                    "programType":'Episodes',
                     "PPLProgramType":type
                }
              }
               
			 
			  else {
                   dat = {
                    "itemId": data.SeriesID,
                    "programType":data.ProgramType,
					
                     "PPLProgramType":type
                  }
                   if (seasonid === 0)
                   {
                       if (episodeCount>0) {
                           dat.programType = 'Series'
                       } else {
                           dat.programType = 'Episodes';
                       }                 

			       }
              }
			  
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                crossDomain: true,
                url: constants.URL_API + 'Scripted/GetEpisodeDataById?itemId=' + dat.itemId + '&seasonId=' + seasonid + '&programType=' + dat.programType,
                data: dat
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function (xhr,status) {
              
                if (status === 401) {
                    self.redirectToLogin();
                }
            });
        }
			
		
		 this.getMainAssetsDetailsDataByID = function (data,type, callbackFunc) {
		      var dat={};
			 
		     
                dat ={
			  "SeriesId":data.SeriesId,
              "SeasonID":data.SeasonID,
              "PieceID":data.PieceID,
              "AssetTypeLK":data.AssetTypeLK
               }
			  
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'POST',
                contentType: false,
                crossDomain: true,
                url: constants.URL_API+'Scripted/UpdateAssetDetail',
                data: dat
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function (xhr,status) {
              
                if (status === 401) {
                    self.redirectToLogin();
                }
            });
        }
		
		
		 this.getGetGalleryDetailsDataByID = function (data,seasonid,type, callbackFunc) {
		      var dat={};
			  if(data.ProgramType ==="Scripted" || data.ProgramType ==="Factual"){
			data.ProgramType = 'Series';
			  }
			 
		      if(type === 'Movies'){
                dat = {
                    "itemId": data.SeriesID,
                    "programType":'Episodes',
                     "PPLProgramType":type
                }
              }
               
			 
			  else {
                   dat = {
                    "itemId": data.SeriesID,
                    "programType":data.ProgramType,
					
                     "PPLProgramType":type
                  }
					
              }
			  
            $http({
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                },
                method: 'GET',
                contentType: false,
                crossDomain: true,
                url: constants.URL_API+'Scripted/GetGalleryImage?itemId='+dat.itemId +'&seasonId='+seasonid+'&programType='+dat.programType,
                data: dat
            }).success(function (data) {
                // With the data succesfully returned, call our callback
                callbackFunc(data);
            }).error(function () {
               
            });
        }			

    }])

