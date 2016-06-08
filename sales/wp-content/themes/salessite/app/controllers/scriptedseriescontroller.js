myApp.controller('ScriptedSeriesController',
    ['$scope','$location', 'SeriesDataService', 'SwiperService','BrowseAllService', '$window','$filter',
function ($scope, $location, SeriesDataService, SwiperService, BrowseAllService, $window, $filter) {
    $scope.addon=false;
    $scope.plus=false;
    $scope.closebutton = false;
    $(".search-catalogue").show();
    $scope.selectedSeries=null;
    $scope.ToggleDetails = true;
    $scope.TogglePopularDetails = true;
    $scope.ToggleMiniDetails = true;
    $scope.newMore = false;
    $scope.popularMore = false;
    $scope.miniMore = false;
    $scope.MorePopularDetails = false;
    $scope.MoreMiniDetails = false;
    $scope.MoreNewDetails = false;
    $scope.spinner1 = false;
    $scope.spinner2 = false;
    $scope.spinner3 = false;
    $scope.AddButton='';
    $scope.spinner4 = false;
    $scope.playBtnClicked = false;
    $('#overlayLoader').show();
    $scope.isPlayBtnClicked = false;
    var input='';
	var casualtitleinput='';
	 var pageType = "";
    if($location.absUrl().indexOf("scripted-series")!==-1) {
        pageType = "Scripted";
		input ='36';
		casualtitleinput = 'Scripted';
    } else if($location.absUrl().indexOf("formats")!==-1) {
        pageType = "Formats";
		input ='42';
		casualtitleinput = 'Formats';
    }
	   
		SeriesDataService.getBannerData(pageType,function(dataResponse){
            $scope.spinner1 = true;
            $scope.spinnerStatus();
		    $scope.BannerData = [];            
		    var dataAPI = [];
		    var ProgramTypeAppModel = [];
		    var dataResponseJSON = [];
			if(dataResponse!==null){
		    for (var i = 0; i < dataResponse.length; i++) {
		        if (dataResponse[i].id !== "" && dataResponse[i].programetype !== "") {
		            if( dataResponse[i].programetype === "Scripted"){
                ProgramTypeAppModel.push({"ItemId":parseInt(dataResponse[i].id),"ProgramType":"Series"});
				}if( dataResponse[i].programetype === "Formats")
				{
				ProgramTypeAppModel.push({"ItemId":parseInt(dataResponse[i].id),"ProgramType":"Formats"});
				}
		        var dataResponseThis = {};
				if(dataResponse[i].programetype === "Scripted"){
                dataResponseThis.SeriesID = parseInt(dataResponse[i].id);
				}  if(dataResponse[i].programetype === "Formats"){
				  dataResponseThis.FormatID = parseInt(dataResponse[i].id);
				}
                dataResponseThis.ImageURLCMS = dataResponse[i].thumbnail_url;
                dataResponseThis.Video_Time_CMS = dataResponse[i].video_time;
                dataResponseThis.Video_URL_CMS = dataResponse[i].video_url;                    
                dataResponseThis.IsSizzle = false;
                dataResponseJSON.push(dataResponseThis);
                }
		    }
			}
		    dataAPI = ProgramTypeAppModel; 
		    SeriesDataService.getSeriesData(dataAPI, function (dataResponseService) {
                $scope.spinner2 = true;
                $scope.spinnerStatus();
		        $scope.BannerData = [];
		        for (var i = 0; i < dataResponseJSON.length; i++) {
				if( pageType === "Formats"){
				var found = $filter('filter')(dataResponseService, { FormatID: dataResponseJSON[i].FormatID }, true);
		            if (found.length) {
                        // if already same ID is present in final list dont add another data with it and add only 3 items for banner
		                if (($filter('filter')($scope.BannerData, { FormatID: dataResponseJSON[i].FormatID }, true)).length === 0 && $scope.BannerData.length < 3) {
		                    found[0].ImageURLCMS = dataResponseJSON[i].ImageURLCMS;
                            found[0].Video_Time_CMS = dataResponseJSON[i].Video_Time_CMS;
                            found[0].Video_URL_CMS = dataResponseJSON[i].Video_URL_CMS;
		                    found[0].IsSizzle = false;
		                    $scope.BannerData.push(found[0]);
		                }		               
		            }
				}
				if( pageType === "Scripted"){
		            var found = $filter('filter')(dataResponseService, { SeriesID: dataResponseJSON[i].SeriesID }, true);
		            if (found.length) {
                        // if already same ID is present in final list dont add another data with it and add only 3 items for banner
		                if (($filter('filter')($scope.BannerData, { SeriesID: dataResponseJSON[i].SeriesID }, true)).length === 0 && $scope.BannerData.length < 3) {
		                    found[0].ImageURLCMS = dataResponseJSON[i].ImageURLCMS;
                            found[0].Video_Time_CMS = dataResponseJSON[i].Video_Time_CMS;
                            found[0].Video_URL_CMS = dataResponseJSON[i].Video_URL_CMS;
		                    found[0].IsSizzle = false;
		                    $scope.BannerData.push(found[0]);
		                }		               
		            } 
					}
		        }				
		        SeriesDataService.getSizzleCMS(input,function (responseSizzle) {
	$scope.spinner3 = true;	 
	$scope.spinnerStatus();
		            var dataResponseThis = {};
		            dataResponseThis.SeriesName = responseSizzle.acf.sizzle_title;
		            dataResponseThis.ImageURLCMS = responseSizzle.acf.sizzle_image;
		            dataResponseThis.IsSizzle = true;
					dataResponseThis.Video_URL_CMS = responseSizzle.acf.sizzle_video_url;
					dataResponseThis.presentation_url = responseSizzle.acf.presentation_url;
				$scope.Title = responseSizzle.acf.title;
                $scope.VideoTime = responseSizzle.acf.video_time;
		        $scope.VideoURL = responseSizzle.acf.video_url;
                $scope.Content = responseSizzle.acf.content;
                $scope.StillImageURL = responseSizzle.acf.stillimage_url;

                $scope.BannerData.push(dataResponseThis);
		            // sizzle image has to be highlighted in main banner on load
		            $scope.MainBanner = $scope.BannerData[0];
					$scope.DisplayMainImg ($scope.MainBanner,0);
				
		            if ($scope.BannerData[0].SeriesDescription !== null && $scope.BannerData[0].SeriesDescription !== "NULL" &&$scope.BannerData[0].SeriesDescription !== undefined)
					{
					    var strin = $scope.BannerData[0].SeriesDescription;
					    if (strin.length > 200) {
                            $scope.desc = strin.substring(0, 200) + "...";
					    } else {
					        $scope.desc = strin;
					    }
					}
					else {
					    $scope.desc = '';
					}
		            // first image should be selected by default
		            $scope.selected = 0;

                    // for mobile view
		            var swiperHeader = SwiperService.GetSingleSwiperSlide('.swiperHeader');
                    swiperHeader.on('slideChangeEnd',function(swiper) {
						$('#bannerScreenerMobileId_'+swiper.activeIndex).hide();
						$('#bannerScreenerMobileId_'+(swiper.activeIndex-1)).attr('src','');
						$('#closeBtnId_'+swiper.activeIndex).hide();
						$('#bannerimageId_'+swiper.activeIndex).show();
						$('#imageoverlayId_'+swiper.activeIndex).show();
						$('#overlayId_'+swiper.activeIndex).show();
						if($scope.BannerData[swiper.activeIndex].Video_URL_CMS !== "") {
							$('#playBtnId_'+swiper.activeIndex).show();
						}
					});
		        })
		    })						
		
		})
		
		
		/*function for toogle*/
				
				$scope.closeshowbutton = function()
				{
				
				  $scope.closebutton = true;
				  
				}
				$scope.closehidebutton = function()
				{
				$scope.closebutton = false;
				}
				 	
		
        $scope.playFormatsScreener = function(videoURL) {
		if(videoURL!=="" && videoURL!==undefined && videoURL!==null){
            $('#screenerFormat').attr('src',videoURL+'?autoPlay=true');
            $scope.isPlayBtnClicked = true;
			}
        }
		$scope.AddScriptedToWatchlist = function (pplid,itemType) {
            if(window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
                var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
                if(tempseasonIdsArray.indexOf(pplid.toString()) > -1) {
                    $('#'+$scope.MainBanner.SeriesID+'banner').addClass('addlist-btn').removeClass('removelist-btn');
                    $('#'+$scope.MainBanner.SeriesID+'banner').text("Add to watchlists");
                } else {
                    $('#'+pplid+'banner').addClass('removelist-btn').removeClass('addlist-btn');
                    $('#'+pplid+'banner').text("Remove from watchlists");
                }
            } else {
                $('#'+pplid+'banner').addClass('removelist-btn').removeClass('addlist-btn');
                    $('#'+pplid+'banner').text("Remove from watchlists");
            }
            $scope.AddToWatchlist(pplid,itemType);
        }
        $scope.DisplayMainImg = function (banner,index) {	
            $scope.playBtnClicked = false;
            $('#bannerScreenerId').attr('src','');
           
            $scope.selected = index;
            $scope.MainBanner = banner;

            if ($scope.MainBanner.SeriesDescription !== null && $scope.MainBanner.SeriesDescription !== "NULL" && $scope.MainBanner.SeriesDescription !== undefined) { 
                var strin = $scope.MainBanner.SeriesDescription;
                if (strin.length > 200) {
                    $scope.desc = strin.substring(0, 200) + "...";
                } else {
                    $scope.desc = strin;
                }
            } else {
                $scope.desc = '';
            }
            setTimeout(function(){
              if(window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
                var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
                if(tempseasonIdsArray.indexOf($scope.MainBanner.SeriesID.toString()) > -1) {
                    $('#'+$scope.MainBanner.SeriesID+'banner').addClass('removelist-btn').removeClass('addlist-btn');
                    $('#'+$scope.MainBanner.SeriesID+'banner').text("Remove from watchlists");
                } else {
                    $('#'+$scope.MainBanner.SeriesID+'banner').addClass('addlist-btn').removeClass('removelist-btn');
                    $('#'+$scope.MainBanner.SeriesID+'banner').text("Add to watchlists");
                }
            }
            },200);
             
			}
        
        if($location.absUrl().indexOf("formats")!==-1) {
            $scope.Title = "ashvca";
           
        }
		SeriesDataService.getSeriesDataCMS(casualtitleinput,function (dataResponse) {
		$scope.spinner4 = true;
		$scope.spinnerStatus();
		    var dataNew = {};
		    var ProgramTypeAppModel = [];
		   
		    for (var i = 0; i < dataResponse.length; i++) {
                $scope.PageLocation = dataResponse[i].page_location;
		        if (dataResponse[i].id !== "" && dataResponse[i].page_location === "Scripted") {
		            ProgramTypeAppModel.push({
		                "ItemId": parseInt(dataResponse[i].id),
		                "ProgramType": ( dataResponse[i].program_type==="Season"?"Seasons":dataResponse[i].program_type),
		                "ProgramTypeCMS": ( dataResponse[i].program_type==="Season"?"Seasons":dataResponse[i].program_type),
		                "SubProgramTypeCMS": dataResponse[i].scripted_category,
		                "ImageURLCMS": dataResponse[i].image_url
		            });
		        } else if (dataResponse[i].id !== "" && dataResponse[i].page_location === "Formats") {
		            ProgramTypeAppModel.push({
		                "ItemId": parseInt(dataResponse[i].id),
		                "ProgramType": ( dataResponse[i].program_type==="Season"?"Seasons":dataResponse[i].program_type),
		                "ProgramTypeCMS": ( dataResponse[i].program_type==="Season"?"Seasons":dataResponse[i].program_type),
		                "SubProgramTypeCMS": dataResponse[i].formats_category,
		                "ImageURLCMS": dataResponse[i].image_url
		            });
		        }
		    }
		    dataNew = ProgramTypeAppModel; 

		    SeriesDataService.getSeriesData(dataNew, function (dataResponseService) {
	$scope.spinner5 = true;
	$scope.spinnerStatus();
		        $scope.ScriptedList = [];
		        $scope.NewScriptedList = [];
		        $scope.PopularScriptedList = [];
		        $scope.MiniSeriesScriptedList = [];
				updateEpisodeImagesWithDefaultImage(dataResponseService);
		        for (var i = 0; i < dataResponseService.length; i++) {
		            
                    if($location.absUrl().indexOf("scripted-series")!==-1) {
                        switch (dataResponseService[i].SubProgramTypeCMS) {
                            
                            case "New":
                                $scope.NewScriptedList.push(dataResponseService[i]);
								     
                                break;
                            case "Popular": 
                                $scope.PopularScriptedList.push(dataResponseService[i]);
                                
                                break;
                            case "Mini-series":
                                $scope.MiniSeriesScriptedList.push(dataResponseService[i]);
                                
                                break;
                            default:
                                break;
                        }
                    } else if($location.absUrl().indexOf("formats")!==-1) {
                        switch (dataResponseService[i].SubProgramTypeCMS) {
                            case "New":
                                $scope.NewScriptedList.push(dataResponseService[i]);
								
                                break;
                            case "Classic":
                                $scope.PopularScriptedList.push(dataResponseService[i]);
								
                                break;
                            case "A+E Favourites":
                                $scope.MiniSeriesScriptedList.push(dataResponseService[i]);
								
                                break;
                            default:
                                break;
                        }
                    }
		            $scope.ScriptedList.push(dataResponseService[i]);
		                }
		                
		            			   
		          if($scope.NewScriptedList.length > 10)
				  {
				    $scope.newMore = true;
				  }
				  if($scope.PopularScriptedList.length > 10)
				  {
				   $scope.popularMore = true;
				  }
				  if($scope.MiniSeriesScriptedList.length > 10)
				  {
				  $scope.miniMore = true;
				  }
		        var swiper1 = SwiperService.GetSwiperSlides('.swiper1', 1);
		        
		        var swiper2 = SwiperService.GetSwiperSlides('.swiper2', 2);
		     
		        var swiper3 = SwiperService.GetSwiperSlides('.swiper3', 3);
		       
		      $scope.getDraftWatchlists1();
			                
		    })


		    $scope.GetScriptedDetails = function (details) {
		        if($location.absUrl().indexOf("scripted-series")!==-1) {
                   
					window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
					window.sessionStorage.setItem("pageName",  JSON.stringify("Series"));
					window.location.href = url + "/scripted-details/" + details.SeriesID+"/?"+details.ProgramType;
                } else if($location.absUrl().indexOf("formats")!==-1) {
                    window.location.href = url + "/formats-details/" + details.FormatID + "/";
                }
            }
			
            $scope.closeBannerPlayer = function () {
                $scope.playBtnClicked = false;
                $('#bannerScreenerId').attr('src','');
            }
			
			$scope.closeBannerMobilePlayer = function (index) {
				$('#closeBtnId_'+index).hide();
				$('#bannerimageId_'+index).show();
				$('#imageoverlayId_'+index).show();
				$('#overlayId_'+index).show();
				if($scope.BannerData[index].Video_URL_CMS !== "") {
					$('#playBtnId_'+index).show();
				}
				$('#bannerScreenerMobileId_'+index).hide();
				$('#bannerScreenerMobileId_'+(index-1)).attr('src','');
			};

            $scope.playBannerScreener = function (banner) {
                $scope.playBtnClicked = true;
                $('#bannerScreenerId').attr('src',banner.Video_URL_CMS+'?autoPlay=true');
            }
            
            $scope.playBannerScreenerMobile = function (banner,index) {
                $('#closeBtnId_'+index).show();
				$('#bannerimageId_'+index).hide();
				$('#imageoverlayId_'+index).hide();
				$('#overlayId_'+index).hide();
				$('#playBtnId_'+index).hide();
				$('#bannerScreenerMobileId_'+index).show();
                $('#bannerScreenerMobileId_'+index).attr('src',banner.Video_URL_CMS+'?autoPlay=true&allowFullScreen=true');
            }
            
            
		});
		
		
		
		$scope.spinnerStatus =  function(){
			if($scope.spinner1 === true && $scope.spinner2 === true && $scope.spinner3 === true && $scope.spinner4 === true && $scope.spinner5 === true){	
				$scope.spinner1 = false;
				$scope.spinner2 = false;
				$scope.spinner3 = false;
				$scope.spinner4 = false;
				$scope.spinner5 = false;
				$('#overlayLoader').hide();
				
			}
		};
/*function For Browse All*/
    $scope.BrowseAllData = function()
      {
	      $scope.requestForCall ='';
		  var searchTextVal='';
         if($location.absUrl().indexOf("scripted-series")!==-1) {
            $scope.requestForCall = "SSProgramTypeLK:1751";

         }else if($location.absUrl().indexOf("formats")!==-1) {
            
            $scope.requestForCall = "SSProgramTypeLK:1754" ;
         }
        //search term
            window.sessionStorage.setItem("SearchTerm", searchTextVal);
                if($location.absUrl().indexOf("scripted-series")!==-1) {
                    window.sessionStorage.setItem("CategoryTerm", 'scripted');
                }else if($location.absUrl().indexOf("formats")!==-1) {
                    window.sessionStorage.setItem("CategoryTerm", 'formats');
                }
              
              window.location.href=url + "/searchresults/";
       
      }
		
		
		function updateEpisodeImagesWithDefaultImage (seasonData) {
			for(var i=0;i<seasonData.length;i++)
		   {
		      if(seasonData.length>0)
			  {
			  
					if(seasonData[i].ImageURLCMS === "" || seasonData[i].ImageURLCMS === null 
					|| typeof seasonData[i].ImageURLCMS === "undefined") {
					    if (seasonData[i].ImageUrlDesktop1x === null || seasonData[i].ImageUrlDesktop1x === "") {
					        seasonData[i].ImageURL = getDefaultShowCardImage();
					        
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
	
}]);