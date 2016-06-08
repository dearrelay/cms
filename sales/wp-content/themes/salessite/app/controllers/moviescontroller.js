myApp.controller('moviesController',
    ['$scope', '$location', 'MoviesService', 'BrowseAllService', 'SeriesDataService', 'SwiperService', '$window','$filter', 
function ($scope, $location, MoviesService, BrowseAllService, SeriesDataService, SwiperService, $window,$filter) {

    $scope.BannerAddText = "Add to watchlists";
    $scope.BannerAddButton = "addlist-btn";
	

$scope.imagesrc=url +'/wp-content/themes/wp-ss/images/plus_gold.png';
$('#overlayLoader').show();
var pagename ='';
pagename = document.getElementById('PageName').value;

if(pagename==="Factual")
{
var data = "Factual";
		SeriesDataService.getBannerData(data,function(dataResponse){
	$scope.spinner1 = true;
	$scope.spinnerStatus();
		    $scope.BannerData = [];
		    var dataAPI = [];
		    var ProgramTypeAppModel = [];
		    var dataResponseJSON = [];
		    for (var i = 0; i < dataResponse.length; i++) {
		        if (dataResponse[i].id !== "" && dataResponse[i].programetype !== "" &&  dataResponse[i].programetype === "Factual") {
		            ProgramTypeAppModel.push({"ItemId":parseInt(dataResponse[i].id),"ProgramType":"Series"});
		            var dataResponseThis = {};
		            dataResponseThis.SeriesID = parseInt(dataResponse[i].id);
		            dataResponseThis.ImageURLCMS = dataResponse[i].thumbnail_url;
                    dataResponseThis.Video_Time_CMS = dataResponse[i].video_time;
                    dataResponseThis.Video_URL_CMS = dataResponse[i].video_url;
		            dataResponseThis.IsSizzle = false;
		            dataResponseJSON.push(dataResponseThis);
		        }
		    }
		    dataAPI = ProgramTypeAppModel; 
		    SeriesDataService.getSeriesData(dataAPI, function (dataResponseService) {
	$scope.spinner2 = true;
	$scope.spinnerStatus();
		        $scope.BannerData = [];
		      
		        for (var i = 0; i < dataResponseJSON.length; i++) {
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
				var input ='38';
		        SeriesDataService.getSizzleCMS(input,function (responseSizzle) {
	$scope.spinner3 = true;
$scope.spinnerStatus();
		            var dataResponseThis = {};
		            dataResponseThis.SeriesName = responseSizzle.acf.sizzle_title;
		            dataResponseThis.ImageURLCMS = responseSizzle.acf.sizzle_image;
		            dataResponseThis.IsSizzle = true;
					dataResponseThis.Video_URL_CMS = responseSizzle.acf.sizzle_video_url;
				    dataResponseThis.presentation_url = responseSizzle.acf.presentation_url;

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
				 	
		
           $scope.AddScriptedToWatchlist = function (pplid, itemType) {
                if (window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
                    var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
                    if (tempseasonIdsArray.indexOf(pplid.toString()) > -1) {
                        $('#' + $scope.MainBanner.SeriesID + 'banner').addClass('addlist-btn').removeClass('removelist-btn');
                        $('#' + $scope.MainBanner.SeriesID + 'banner').text("Add to watchlists");
                    } else {
                        $('#' + pplid + 'banner').addClass('removelist-btn').removeClass('addlist-btn');
                        $('#' + pplid + 'banner').text("Remove from watchlists");
                    }
                } else {
                    $('#' + pplid + 'banner').addClass('removelist-btn').removeClass('addlist-btn');
                    $('#' + pplid + 'banner').text("Remove from watchlists");
                }
                $scope.AddToWatchlist(pplid, itemType);
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
					
			    setTimeout(function () {
			        if (window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
			            var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
			            if (tempseasonIdsArray.indexOf($scope.MainBanner.SeriesID.toString()) > -1) {
			                $('#' + $scope.MainBanner.SeriesID + 'banner').addClass('removelist-btn').removeClass('addlist-btn');
			                $('#' + $scope.MainBanner.SeriesID + 'banner').text("Remove from watchlists");
			            } else {
			                $('#' + $scope.MainBanner.SeriesID + 'banner').addClass('addlist-btn').removeClass('removelist-btn');
			                $('#' + $scope.MainBanner.SeriesID + 'banner').text("Add to watchlists");
			            }
			        }
			    }, 200);
			   

			}
		
		})



 MoviesService.getLandingFactual(function (dataResponse) {
   $scope.MainSectionFactual = dataResponse;
   for(var i=0;i<$scope.MainSectionFactual.length;i++){
   $scope.MainSectionFactual[i].CategoryName= $scope.MainSectionFactual[i].CategoryName.replace(/ AND /g, ' & ');
   
   }
   for(var i=0;i< $scope.MainSectionFactual.length;i++){
     if($scope.MainSectionFactual[i].CollectionList.length>0)
	 {
	     for(var j=0;j<$scope.MainSectionFactual[i].CollectionList.length; j++)
		 {
		   if($scope.MainSectionFactual[i].CollectionList[j].ColectionImageUrl==="" || $scope.MainSectionFactual[i].CollectionList[j].ColectionImageUrl === null || $scope.MainSectionFactual[i].CollectionList[j].ColectionImageUrl ===undefined )
		   {
		     $scope.MainSectionFactual[i].CollectionList[j].ColectionImageUrl = getDefaultShowCardImage();
		   }
		 
		 }
	 }
   }
   $('#overlayLoader').hide();
     $scope.getDraftWatchlists1();
});
}
else{
 MoviesService.getLandingMovies(function (dataResponse) {
   $scope.MainSectionMovies = dataResponse;
   for(var i=0;i< $scope.MainSectionMovies.length;i++){
     if($scope.MainSectionMovies[i].MovieDetail.length>0)
	 {
	     for(var j=0;j<$scope.MainSectionMovies[i].MovieDetail.length; j++)
		 {
		   if($scope.MainSectionMovies[i].MovieDetail[j].TileUrl==="" || $scope.MainSectionMovies[i].MovieDetail[j].TileUrl === null || $scope.MainSectionMovies[i].MovieDetail[j].TileUrl ===undefined )
		   {
		     $scope.MainSectionMovies[i].MovieDetail[j].TileUrl = getDefaultShowCardImage();
		   }
		 
		 }
	 }
   }
   $('#overlayLoader').hide();
     $scope.getDraftWatchlists1();
		 
});
} 
function getDefaultShowCardImage() {
		var defaultImagesArray =[ imgpath+"/default-images/showcard_1.jpg",
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
	  
	   $scope.movieDetails = function (details) {
		       				  
				  window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
					window.sessionStorage.setItem("pageName",  JSON.stringify("Movies"));
					window.location.href = url + "/movie-detail/" + details.PPLID + "/";
				  
				
		    }
	/*function For Browse All*/
    
        $scope.BrowseAllData = function(BrowseData)
      {
	      $scope.requestForCall ='';
		 var searchTextVal='';
	         if(BrowseData === "All")
			 {
			    $scope.requestForCall = "SSProgramTypeLK:1753";
				
			 }else{
			
				$scope.requestForCall ={ "genreId": BrowseData.GenreId};
			 }
			 if(BrowseData === "All"){
			     //search term
				    window.sessionStorage.setItem("SearchTerm", searchTextVal);
					window.sessionStorage.setItem("CategoryTerm", 'movies');
				  
				   window.location.href=url + "/searchresults/";
				   
				}else{
				
			     window.sessionStorage.setItem("reqForCall", JSON.stringify($scope.requestForCall));
			     //search term
				  window.sessionStorage.setItem("SearchTerm", searchTextVal);
					window.sessionStorage.setItem("CategoryTerm", 'movies');
				    window.location.href=url + "/movie-listings/";
				  }
			   
      }
	  
	  if(pagename==="Factual"){
        $scope.BrowseAllFactualData = function(BrowseData,input)
      {
	      $scope.requestForCall ='';
		 var searchTextVal='';
	         if(BrowseData === "All")
			 {
			    $scope.requestForCall = "SSProgramTypeLK:1752";
				
			 }else{
			     if(input===1 || input === undefined){
				$scope.requestForCall ={ "CategoryId":BrowseData.CategoryId};

				}
				else{
				$scope.requestForCall ={ "CategoryId":BrowseData.CategoryId,
				"CollectionId":input.CollectionId };
				}
				}
				
			
			 if(BrowseData === "All"){
			     //search term
				    window.sessionStorage.setItem("SearchTerm", searchTextVal);
					window.sessionStorage.setItem("CategoryTerm", 'Factual');
				  
				   window.location.href=url + "/searchresults/";
				    
				}else{
				 window.sessionStorage.setItem("reqForCall", JSON.stringify($scope.requestForCall));
				 window.location.href=url + "/factual-listings/";
				
				 }
				 
				  
			   
      }
	  }
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
		
		    $scope.GetScriptedDetails = function (details) {
					window.location.href = url + "/factual-detail/" + details.SeriesID + "/?" + details.ProgramType;;
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
    

}]);

myApp.directive('swiperdirective', ['SwiperService', function (SwiperService) {
    return {
        link: function ($scope, elm) {
            
                elm.addClass('swiperMovie' + $scope.$index);
               var swiper = SwiperService.GetDynamicSlides('.swiperMovie' + $scope.$index , $scope.$index);
        }
    }
}]);
