myApp.controller('ScriptedDetailController', ['$scope','$location', '$window', 'SeriesDataService', 'SwiperService', '$uibModal' ,function ($scope,$location, $window, SeriesDataService, SwiperService, $uibModal) {
       $scope.semiStar=false;
       $scope.addbutton=true;
	   $scope.StarType=[];
	   $scope.timeStamp="";
	   $scope.timehour = '';
	   $scope.timemin = '';
       var isScrneer="";
	     $scope.timesplit=[];
	   $scope.programTypeThis="";	 
        $scope.SeasonListDetails = [];
		$scope.SeriesDetailsInformation ='';
		$scope.SeriesDetailsInformation={
				SeasonDetail:[]
				};
		$scope.dataForSeason='';		
		$scope.SeriesDetailsInformationInitialValues='';		
		$scope.seasonList ='';
        $scope.EpisodeArray = [];
		$scope.LastDetails =false;
		   $scope.isPlayClicked = false;
		$scope.castingshow=false;
		$scope.rating = false;
        $scope.SeasonOptions = [];
		$scope.ratingResponse=[];
		$scope.CastingDetails=[];
		$scope.CastingVariable='';
		$scope.RegularCastMembers=[];
		$scope.OtherCastMembers=[];
		$scope.StarRatingCount=[];
		$scope.spinner1 = false;
		$scope.FactualDetailsPage ='';
		$scope.spinner2 = false;
		$scope.spinner3 = false;
        $scope.isSinglePiece = false;
		$('#overlayLoader').show();
		$scope.ViewBannerDefault = imgpath + "/default-images/showcard_2.jpg";
		$scope.supplementalLimit = 50;
		$scope.showMore = true;
		$scope.bannerProgramType = 'series';
    //Function that returns default detail page banner image
	function getDefaultDPBImage() {
		var defaultImagesArray = [ imgpath+"/default-images/dpb_1.jpg",
	imgpath+"/default-images/dpb_2.jpg",
	imgpath+"/default-images/dpb_3.jpg",
	imgpath+"/default-images/dpb_4.jpg",
	imgpath+"/default-images/dpb_5.jpg",
	imgpath+"/default-images/dpb_6.jpg",
	imgpath+"/default-images/dpb_7.jpg",
	imgpath+"/default-images/dpb_8.jpg",
	imgpath+"/default-images/dpb_9.jpg",
	imgpath+"/default-images/dpb_10.jpg",
	imgpath+"/default-images/dpb_11.jpg",
	imgpath+"/default-images/dpb_12.jpg"];
	
		return defaultImagesArray[Math.floor(Math.random() * defaultImagesArray.length)];
	}
	
		
		$scope.totalPage= true;
		$scope.printPDF = function () {
		    window.print();
		}
		$scope.showMoreSupplemental = function () {
		    $scope.supplementalLimit = $scope.supplementalText.length;
		    $scope.showMore = false;
		}
		$scope.showLessSupplemental = function () {
		    $scope.supplementalLimit = 50;
		    $scope.showMore = true;
		}
		var urlCurrent = window.location.href;
		var urlItems = urlCurrent.split('/');
		var maxCount = urlItems.length;
		
		$scope.programTypeThis = (urlItems[maxCount - 1].split('?'))[1];
		$scope.SeriesDetailsInformation = {};
		$scope.inputPageName = (urlItems[maxCount - 3].split('-'))[0].charAt(0).toUpperCase() + ((urlItems[maxCount - 3].split('-'))[0]).slice(1);
		if ($scope.inputPageName === "Movie") {
		    $scope.inputPageName = "Movies";
		    $scope.SeriesDetailsInformation.PPLID = parseInt(urlItems[maxCount - 2]);
		} else {
		    $scope.SeriesDetailsInformation.SeriesID = parseInt(urlItems[maxCount - 2]);
		}
		if($scope.programTypeThis===undefined || $scope.programTypeThis ===null || $scope.programTypeThis===""){
		$scope.programTypeThis = "Movies";
		}else{
		$scope.SeriesDetailsInformation.ProgramType=$scope.programTypeThis;
		}
		$scope.SeriesDetailsInformationInitialValues=$scope.SeriesDetailsInformation;
		$scope.bannerProgramType = $scope.programTypeThis;
		SeriesDataService.getSeriesDetailsDataByID($scope.SeriesDetailsInformation, $scope.inputPageName,function (dataResponseService) {
		    
                     $scope.SeriesDetailsInformation=dataResponseService;
            if(dataResponseService.SeriesImageUrl===null || dataResponseService.SeriesImageUrl==="") {
                $scope.SeriesDetailsInformation.SeriesImageUrl = getDefaultDPBImage();
            }
					 $scope.SeriesDetailsInformation.ProgramType=$scope.programTypeThis;
				 
			$scope.movieMainDetailJson = $.parseJSON(window.sessionStorage.getItem("ScriptedDetails"));
			
		if(($scope.SeriesDetailsInformation === null || $scope.SeriesDetailsInformation === undefined) )
		{
		$scope.totalPage= false;
         	
        $('#overlayLoader').hide();		
		}
		else
		{
		if($location.absUrl().indexOf("factual-detail")!==-1) {
		$('#overlayLoaderForYouMayInterestedIn').show();
            $scope.YoumayInstredinArray = [];           
            SeriesDataService.getYouMayInterstedInData($scope.SeriesDetailsInformation.SeriesID, $scope.programTypeThis, function (dataResponse) {
				if(dataResponse && dataResponse.SeriesDetail) {
					$scope.YoumayInstredinArray = dataResponse;
					updateFactualImagesWithDefaultImage($scope.YoumayInstredinArray.SeriesDetail);
					setTimeout(function() {
					var swiper4 = "";
					if ($location.absUrl().indexOf("factual-detail") !== -1) {
						swiper4 = SwiperService.GetSwiperSlides('.youMaySwiper1', 2);
						swiperOnload(swiper4, '.youMaySwiper1', 2);
					}
					}, 500);
					setTimeout(function() {
						if(window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
						var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
						if(dataResponse && dataResponse.SeriesDetail.length > 0) {
							for(var i=0;i<dataResponse.SeriesDetail.length;i++) {
								var minusImgSeries = '.' +dataResponse.SeriesDetail[i].SeriesID+'minus';
								var plusImgSeries='.' +dataResponse.SeriesDetail[i].SeriesID+'plus';
								if(tempseasonIdsArray.indexOf(dataResponse.SeriesDetail[i].SeriesID.toString()) > -1) {    
									$(minusImgSeries).show();
									$(plusImgSeries).hide();
								} else {
									$(minusImgSeries).hide();
									$(plusImgSeries).show();
								}
							}
							
						}
					}
					}, 1000);
                }
				$('#overlayLoaderForYouMayInterestedIn').hide();

            });
		}
            
		 $scope.FilterType=$scope.SeriesDetailsInformation.FilterType;
		$scope.FilterAssetsListsForDropDown=[];
		$scope.SampleJsonForFilters={
			'id':'',
			'value':''
		};
	  
		for(var i = 0; i < $scope.FilterType.length; i++)
					{
					$scope.SampleJsonForFilters.id=$scope.FilterType[i].FilterTypeId;
					$scope.SampleJsonForFilters.value=$scope.FilterType[i].FilterTypeValue;
					$scope.FilterAssetsListsForDropDown.push($scope.SampleJsonForFilters);
					$scope.SampleJsonForFilters={
					  'id':'',
					  'value':''
					}
					}
		
		SeriesDataService.getSeriesDetailsByID($scope.SeriesDetailsInformation.SeriesID,$scope.inputPageName,function(dataResponse){
		$scope.spinner1 = true;
		$scope.spinnerStatus();
		if(dataResponse !== null && dataResponse !== undefined && dataResponse!==''){
		 $scope.CastingVariable =   dataResponse;
		 $scope.supplementalText = dataResponse.supplemental;
			if(angular.isArray(dataResponse.details))
			{
			  $scope.LastDetails = false;
		   
			}else{
			
			 $scope.LastDetails = true;	
                setTimeout(function(){
                 var swiper5 =  SwiperService.GetStatisticsSwiperSlides('.swiperDetailStats', '-stat');
				 swiperOnload(swiper5, '.swiperDetailStats', '-stat');
                },200);
                
			}
		}else{
		    $scope.LastDetails = false;		   
		}		  
		});
            
            $scope.getDraftWatchlists1();
		
		SeriesDataService.getCastingDetailsDetailsByID($scope.SeriesDetailsInformation.SeriesID,$scope.inputPageName,function(dataResponse){
		$scope.spinner2 = true;
		$scope.spinnerStatus();
		 
			if(dataResponse !== null && dataResponse !== undefined && dataResponse.length>3){
				$scope.castingshow = true
				$scope.CastingDetails =   dataResponse;		 
				for(var i=0;i<$scope.CastingDetails.length;i++){
			
					if($scope.CastingDetails[i].cast_type==='Regular'){
						$scope.RegularCastMembers.push($scope.CastingDetails[i]);
					}
					if($scope.CastingDetails[i].cast_type==='Other'){
						$scope.OtherCastMembers.push($scope.CastingDetails[i]);
					}
				}
			}else{
				$scope.castingshow = false;			   
			}
			var swiper1 = SwiperService.GetCastSwiperSlides('.castSwiper1', 1);
		    swiperOnload(swiper1, '.castSwiper1', 1);
			var swiper2="";
			if($location.absUrl().indexOf("scripted-details")!==-1) {
			swiper2 = SwiperService.GetCastSwiperSlides('.castSwiper2', 2);
		    swiperOnload(swiper2, '.castSwiper2', 2);
		}
			  
			  
		});
		SeriesDataService.getRatingDetailsDetailsByID($scope.SeriesDetailsInformation.SeriesID,$scope.inputPageName,function(dataResponse){
		$scope.spinner3 = true;
		$scope.spinnerStatus();
			if(dataResponse !== null && dataResponse !== undefined && dataResponse.length>0){
				$scope.rating = true
				$scope.ratingResponse =   dataResponse;
				$scope.NumberType=[];
				$scope.review=$scope.ratingResponse[0].review;
				$scope.AuthorName=$scope.ratingResponse[0].author_name;
				$scope.ChannelName=$scope.ratingResponse[0].site_name;
					for(var i=0;i<$scope.ratingResponse.length;i++){			 
						if($scope.ratingResponse[i].rating_type==='Star'){
								$scope.StarType.push($scope.ratingResponse[i]);
								
						}
						if($scope.ratingResponse[i].rating_type==='Numeric'){
								$scope.NumberType.push($scope.ratingResponse[i]);
						}
				}
			
			}else{
				$scope.rating = false;		   
			}
            setTimeout(function() {
                var swiperRating = SwiperService.GetRatingSwiperSlides('.ratingSwiper', '-rating');
                swiperRating.on('transitionEnd',function(swiper) {
					$scope.ratingNumber($scope.ratingResponse[swiper.activeIndex],'rating'+(swiper.activeIndex+1));
                });   
            },500);
            
		});	
	
		$scope.spinnerStatus =  function(){
			if($scope.spinner1 === true && $scope.spinner2 === true && $scope.spinner3 === true){	
				$scope.spinner1 = false;
				$scope.spinner2 = false;
				$scope.spinner3 = false;				
			}
		};
        
        $scope.playScreenerMovie = function() {
            $('#screenerEpisode').attr('src',constants.PLAYER_BASE_URL+$scope.EpisodeViewInformation.ScreenerUrl+'?autoPlay=true');
            $scope.EpisodeViewInformation.IScreenerAvailable = false;
            $scope.isPlayClicked = true;
        }
		  $scope.range = function(max){
		      if (max === undefined ||isNaN(max) || max === null) {
  
    return 0;
  }
			$scope.test=Math.floor(max);
			max=Math.floor(max);
			if($scope.test!==max){
				$scope.semiStar=true;
				
			}
			var input = [];
			for (var i = 0; i < max; i ++) {
			input.push(i);
			}
				return input;
  };
  /* youmayInterestedListing */
  $scope.youmayInterestedListing = function()
  {
  $scope.requestForCall ={ "CategoryId":$scope.YoumayInstredinArray.CategoryId,
				"CollectionId":$scope.YoumayInstredinArray.CollectionId 
				}
				  window.sessionStorage.setItem("reqForCall",JSON.stringify($scope.requestForCall));
				window.location.href=url + "/factual-listings/";
			
  }
  
  
  $scope.rangeforhide  = function(input)
  {
  var result=0;
  if (input === undefined || isNaN(input) || input === null) {
  
    return result;
  }
   result = 5 - (Math.ceil(input));
     var input1 = [];
			for (var i = 0; i < result; i ++) {
			input1.push(i);
			}
     
    return(input1);
  
  }
  
  $scope.hidingStar1=function(number){
  if (number === undefined || isNaN(number) || number === null) {
  
    return false;
  }
			var ex =number%2;
			if(ex!==0){
			  return true;
			}
			else{
			 return false;
			}
  
  }
  
 function updateFactualImagesWithDefaultImage (seasonData) {
			
			 
			    for(var i=0;i<seasonData.length;i++){
					if(seasonData[i].ImageUrl === "" || seasonData[i].ImageUrl === null 
					|| typeof seasonData[i].ImageUrl === "undefined") {
						seasonData[i].ImageUrl = getDefaultShowCardImage();
					}
				 }
			  		   
		   
		}
	//Function that returns default show card image
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
            
	$scope.togglewatchlist=function(id){
		
	}
	$scope.EpisodeArrayDetailsShow= false;
	$scope.EpisodeDetailsShow= false;
		$scope.EpisodeDetails = false;		
		$scope.EpisodeDetailsmobile =false;		
		$scope.SeasonAvailable = false;
		
		function updateEpisodeImagesWithDefaultImage (seasonData) {
			
			 
			    for(var i=0;i<seasonData.length;i++){
					if(seasonData[i].EpisodeImageUrl === "" || seasonData[i].EpisodeImageUrl === null 
					|| typeof seasonData[i].EpisodeImageUrl === "undefined") {
						seasonData[i].EpisodeImageUrl = getDefaultShowCardImage();
					}
				 }
			  		   
		   
		}
		function SortBySeasonDesc(a, b){
  var aSeasonNumber =  parseInt(a.SeasonNumber);
  var bSeasonNumber =  parseInt(b.SeasonNumber); 
  return ((aSeasonNumber > bSeasonNumber) ? -1 : ((aSeasonNumber < bSeasonNumber) ? 1 : 0));
}
		function init(){
		if($scope.programTypeThis==="Seasons"){
		$scope.dataForSeason=$scope.SeriesDetailsInformationInitialValues;
		}
		else
		{
		$scope.dataForSeason=$scope.SeriesDetailsInformation;
		}
		
	SeriesDataService.getSeasonDetailsDataByID($scope.dataForSeason, $scope.inputPageName,function (dataResponseService) {
                     $scope.SeriesDetailsInformation.SeasonDetail=dataResponseService;
				
		
		if($scope.SeriesDetailsInformation.SeasonDetail.length>0){
		
			$scope.SeasonAvailable = true;
			$scope.SeasonListDetails = $scope.SeriesDetailsInformation.SeasonDetail;
$scope.SeasonsListForDropdown=[];
$scope.SampleSearchSeasonJson={
		      "id":"",
	          "value":"",
			  "Season":"",
			  "SeasonNumber":""
		    };			
$scope.SeasonListDetails.sort(SortBySeasonDesc);
		for(var i=0;i<$scope.SeasonListDetails.length;i++){
			$scope.SampleSearchSeasonJson.id=$scope.SeasonListDetails[i].SeasonID;
			$scope.SampleSearchSeasonJson.value = 'Season ' + $scope.SeasonListDetails[i].SeasonNumber + ($scope.SeasonListDetails[i].SeasonPart!==null?'-'+$scope.SeasonListDetails[i].SeasonPart:'') + ' - ' + $scope.SeasonListDetails[i].EpisodeCountBySeason + ($scope.SeasonListDetails[i].EpisodeCountBySeason>1?' Episodes':' Episode');
			$scope.SampleSearchSeasonJson.Season='Season '+ $scope.SeasonListDetails[i].SeasonNumber + ($scope.SeasonListDetails[i].SeasonPart!==null?'-'+$scope.SeasonListDetails[i].SeasonPart:'');
			$scope.SampleSearchSeasonJson.SeasonNumber=$scope.SeasonListDetails[i].SeasonNumber;
			
			$scope.SeasonsListForDropdown.push($scope.SampleSearchSeasonJson);
			$scope.SampleSearchSeasonJson={
		      "id":"",
	          "value":"",
			  "Season":"",
			  "SeasonNumber":""
		    };
			
		}
		$scope.SeasonsListForDropdown.sort(SortBySeasonDesc);
		if ($scope.programTypeThis === "Seasons") {
		    for (var s = 0; s < $scope.SeriesDetailsInformation.SeasonDetail.length; s++) {
                // if user directly accesses season, then SeasonID will be stored in dataforSeason.SeriesID 
		        if ($scope.SeriesDetailsInformation.SeasonDetail[s].SeasonID === $scope.dataForSeason.SeriesID) {
		            $scope.SeasonListIndividual = $scope.SeriesDetailsInformation.SeasonDetail[s];
		        }
		    }
		} else {
		    $scope.SeasonListIndividual = $scope.SeriesDetailsInformation.SeasonDetail[0];
		}
		$scope.seasonList = '' + $scope.SeasonListIndividual.SeasonID + '';
		
    
    setTimeout(function () {
    if(window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
        var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
        if(tempseasonIdsArray.indexOf($scope.SeasonListIndividual.SeasonID.toString()) > -1) {
            $('#' + $scope.SeasonListIndividual.SeasonID + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('addlist-btn').removeClass('removelist-btn');
            $('#' + $scope.SeasonListIndividual.SeasonID + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Add Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " to watchlists");
        } else {
            $('#' + $scope.SeasonListIndividual.SeasonID + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('removelist-btn').removeClass('addlist-btn');
            $('#' + $scope.SeasonListIndividual.SeasonID + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Remove Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " from watchlists");
        }
    } else {
        $('#' + $scope.SeasonListIndividual.SeasonID + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('removelist-btn').removeClass('addlist-btn');
        $('#' + $scope.SeasonListIndividual.SeasonID + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Remove Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " from watchlists");
    }
                     },200);
	
	$scope.SesionChangeDetails($scope.SeasonListIndividual.SeasonID);
				
}	
else{

		
		    SeriesDataService.getEpisodeDetailsDataByID($scope.SeriesDetailsInformation, 0, $scope.inputPageName, $scope.SeriesDetailsInformation.EpisodesCount, function (dataResponseService)
		{
		    $scope.isSinglePiece = true;
		    $scope.EpisodeArray = dataResponseService;
			
			
			if (dataResponseService.length > 0) {
			    setTimeout(function () {
			    if (window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
			        var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
			        if (tempseasonIdsArray.indexOf($scope.EpisodeArray[0].PieceID.toString()) > -1) {
                        $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").addClass('removelist-btn').removeClass('addlist-btn');
                        $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").text("Remove Episode from watchlists");

			        } else {
                        $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").addClass('addlist-btn').removeClass('removelist-btn');
                        $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").text("Add Episode to watchlists");
			        }
			    } else {
                    $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").addClass('addlist-btn').removeClass('removelist-btn');
                    $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").text("Add Episode to watchlists");
			    }
			},200);
			 $scope.EpisodeAssetsListsForDropDown=[];
			$scope.SampleJsonForEpisodeAssets={
					  'id':'',
					  'value':''
					}
		for(var l = 0; l < $scope.EpisodeArray.length; l++)
					{
					$scope.SampleJsonForEpisodeAssets.id=$scope.EpisodeArray[l].PieceID;
					$scope.SampleJsonForEpisodeAssets.value='Episode : '+$scope.EpisodeArray[l].PieceNumber+' - '+$scope.EpisodeArray[l].PieceTitle
					$scope.EpisodeAssetsListsForDropDown.push($scope.SampleJsonForEpisodeAssets);
					$scope.SampleJsonForEpisodeAssets={
					  'id':'',
					  'value':''
					}
					}
				if($scope.EpisodeArray.length===1){
				$scope.ShowEpisodeDetails($scope.EpisodeArray[0],0);
                $scope.ShowEpisodeDetailsmobile($scope.EpisodeArray[0],0);
				}
                updateEpisodeImagesWithDefaultImage($scope.EpisodeArray);
            }
			for (var i = 0; i < $scope.EpisodeArray.length; i++) {
			$scope.timeStamp="";
			$scope.timesplit=[];
			    $scope.timeStamp = $scope.EpisodeArray[i].Duration;
			    $scope.timehour = '';
			    $scope.timemin = '';
			    if ($scope.timeStamp !== 0 && $scope.timeStamp !== null && $scope.timeStamp !== undefined && $scope.timeStamp !== "") {
			        $scope.timesplit = $scope.timeStamp.split('.');
			        if ($scope.timesplit[0] > 60) {
			            $scope.timehour = Math.floor(($scope.timesplit[0] / 60));
			            $scope.timemin = ($scope.timesplit[0] % 60);
			            if ($scope.timemin < 10) {
			                $scope.timemin = "0" + $scope.timemin;
			            }
			            else if ($scope.timemin === 0) {
			                $scope.timemin = "00";
			            }
			        }
			        else {
			            $scope.timehour = "00";
			            $scope.timemin = $scope.timesplit[0];
			            if ($scope.timemin < 10) {
			                $scope.timemin = "0" + $scope.timemin;
			            }
			        }
			        $scope.EpisodeArray[i].Duration = $scope.timehour + ':' + $scope.timemin + ':' + $scope.timesplit[1];
			    }
			}

			var swiper8 = SwiperService.GetSwiperSlides('.episodesSwiper', 1);
			swiperOnload(swiper8, '.episodesSwiper', 1);
		});
		
		
		 $('#overlayLoader').hide();
		

}

		});
		$scope.StarType=[];
    }
	
    $scope.AddSeasonToWatchlist = function (pplid,itemType) {
        if(window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
            var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
            if(tempseasonIdsArray.indexOf(pplid.toString()) > -1) {
                $('#' + pplid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('addlist-btn').removeClass('removelist-btn');
                $('#' + pplid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Add Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " to watchlists");
                $("span[id$='episode']").addClass('addlist-btn').removeClass('removelist-btn');
                $("span[id$='episode']").text("Add Episode to watchlists");
            } else {
                $('#' + pplid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('removelist-btn').removeClass('addlist-btn');
                $('#' + pplid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Remove Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " from watchlists");
                $("span[id$='episode']").addClass('removelist-btn').removeClass('addlist-btn');
                $("span[id$='episode']").text("Remove Episode from watchlists");
            }
        } else {
            $('#' + pplid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('removelist-btn').removeClass('addlist-btn');
            $('#' + pplid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Remove Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " from watchlists");
            $("span[id$='episode']").addClass('removelist-btn').removeClass('addlist-btn');
            $("span[id$='episode']").text("Remove Episode from watchlists");
        }
        $scope.AddToWatchlist(pplid,itemType);
    }  
    $scope.AddEpisodeToWatchlist = function (pplid,itemType) {
        if(window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
            var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
            if (tempseasonIdsArray.indexOf(pplid.toString()) > -1) {
                $('#' + pplid + 'episode').addClass('addlist-btn').removeClass('removelist-btn');
                $('#' + pplid + 'episode').text("Add Episode to watchlists");
                if ($scope.SeasonListIndividual) {
                    $('#' + $scope.SeasonListIndividual.SeasonID + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('addlist-btn').removeClass('removelist-btn');
                    $('#' + $scope.SeasonListIndividual.SeasonID + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Add Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " to watchlists");
                }
            } else {
                $('#' + pplid + 'episode').addClass('removelist-btn').removeClass('addlist-btn');
                $('#' + pplid + 'episode').text("Remove Episode from watchlists");
            }
        } else {
            $('#' + pplid + 'episode').addClass('removelist-btn').removeClass('addlist-btn');
            $('#' + pplid + 'episode').text("Remove Episode from watchlists");
        }
        $scope.AddToWatchlist(pplid,itemType);
    }  
    
$scope.GetScriptedDetails = function (details) {
				window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
					window.sessionStorage.setItem("pageName",  JSON.stringify("Factual"));
					if(details.ProgramType==="Piece")
					{
					details.ProgramType="Episodes";
					}
					window.location.href = url + "/factual-detail/" + details.SeriesID +"/?"+details.ProgramType;
		    }
	/*Main Assets*/
	$scope.MainAssetAdding = function()
	{
	
	$scope.filters="";
	$scope.EpisodeAssetinformation="";
	
	$scope.closeEpisodeDiv();
	$scope.SeasonAssetLists="";
	 var data={};
	
	  $scope.MainAssets=[];
	  if($scope.SeriesDetailsInformation.ProgramType==="Movies" || $scope.SeriesDetailsInformation.ProgramType==="Episodes"){
	   data={ "SeriesId" : 0,
        "SeasonID" : 0,
        "PieceID" : $scope.SeriesDetailsInformation.SeriesID,
        "AssetTypeLK":0	
		};
	  }
	  else{
	    data={
		"SeriesId":$scope.SeriesDetailsInformation.SeriesID,
        "SeasonID":0,
        "PieceID":0,
        "AssetTypeLK":0		
		}; 
		}
		SeriesDataService.getMainAssetsDetailsDataByID(data, $scope.inputPageName,function (dataResponseService) {
                     $scope.MainAssets=dataResponseService;
	   
	   
	

	  $scope.AssetListDeatails = $scope.MainAssets;
	  window.sessionStorage.setItem("assertsList", JSON.stringify($scope.AssetListDeatails));
	  $scope.currentPage = 1;
			$scope.MacthingResult = [];
			$scope.TotalRecords = 0;
			$scope.TotalRecords = $scope.AssetListDeatails.length;
			$scope.TotalPages =0;
			$scope.itemsPerPage = 15;
			$scope.TotalPages = Math.ceil(($scope.AssetListDeatails.length) / ($scope.itemsPerPage));
			$scope.numPages = $scope.TotalPages;
			$scope.myFunction();
			
      });	
	  if($scope.EpisodeArray.length===1){
	  $scope.EpisodeDetails=true;
	  $scope.isPlayClicked=false;
		  $scope.isSinglePiece = true;
		  $scope.EpisodeViewInformation.IScreenerAvailable=isScrneer;
	  }
	  
    }
	
	$scope.Presentation = function()
	{	 
		window.open($scope.CastingVariable.presentation_url); 	
	}
	
	
	$scope.openingWebSite = function(rating)
	{	 
		window.open(rating.site_url,'_blank'); 	
	}
	
	$scope.viewDetails='';
	$scope.showDesktopData = function(DetailsDesktop)
	{
	  $scope.viewDetails = DetailsDesktop;	
	}
		
        /*on change Function*/
		$scope.seasonId="";
		$scope.Episodeinfo="";
        $scope.SesionChangeDetails = function(seasonid) {
		  $('#overlayLoaderForCategory').show();
		
            $scope.EpisodeDetails = false;
            $('#screenerEpisode').attr('src','');
		$scope.EpisodeArray=[];
		$scope.gallary =[];
		$scope.SeasonListIndividual = '';
		for (var i = 0; i < $scope.SeriesDetailsInformation.SeasonDetail.length; i++) {
                if (parseInt(seasonid) === $scope.SeriesDetailsInformation.SeasonDetail[i].SeasonID) {
                   
                    $scope.SeasonListIndividual = $scope.SeriesDetailsInformation.SeasonDetail[i];
                    $scope.EpisodeDetails=false;
                }
               
            }
		SeriesDataService.getEpisodeDetailsDataByID($scope.SeriesDetailsInformation, seasonid, $scope.inputPageName, $scope.SeriesDetailsInformation.EpisodesCount, function (dataResponseService)
		{
		
		    $scope.EpisodeArray=dataResponseService;
		    var episodesArray = [];
		    for(var i=0;i<dataResponseService.length;i++) {
		        episodesArray.push(dataResponseService[i].PieceID);    
		    }
		    for(var i=0;i<$scope.EpisodeArray.length;i++){
			$scope.timeStamp="";
			$scope.timesplit=[];
		         $scope.timeStamp=$scope.EpisodeArray[i].Duration;
		         $scope.timehour='';
		         $scope.timemin='';
		        if ($scope.timeStamp !== 0 && $scope.timeStamp !== null && $scope.timeStamp !== undefined && $scope.timeStamp !== "")
		        {
		           $scope.timesplit=$scope.timeStamp.split('.');
		            if($scope.timesplit[0]>60){
		                $scope.timehour= Math.floor(($scope.timesplit[0]/60));
		                $scope.timemin=($scope.timesplit[0]%60);
		                if($scope.timemin<10)
		                {
		                    $scope.timemin="0"+$scope.timemin;
		                }
		                else if($scope.timemin===0){
		                    $scope.timemin="00";
		                }
		            }
		            else
		            {
		                $scope.timehour="00";
		                $scope.timemin=$scope.timesplit[0];
		                if($scope.timemin<10)
		                {
		                    $scope.timemin="0"+$scope.timemin;
		                }
		            }
		            $scope.EpisodeArray[i].Duration=$scope.timehour+':'+$scope.timemin+':'+$scope.timesplit[1];
		        }
		    }
				
		    window.sessionStorage.setItem("episodesArray",episodesArray);
		    updateEpisodeImagesWithDefaultImage($scope.EpisodeArray);
		    if($scope.EpisodeArray.length===1){
		        $scope.ShowEpisodeDetails($scope.EpisodeArray[0],0);
		    }
		    var swiper8 = SwiperService.GetSwiperSlides('.episodesSwiper', 1);
		    swiperOnload(swiper8, '.episodesSwiper', 1);
		    setTimeout(function () {
		        if (window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
		            var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
		            if (tempseasonIdsArray.indexOf($scope.EpisodeArray[0].PieceID.toString()) > -1) {
                        $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").addClass('removelist-btn').removeClass('addlist-btn');
                        $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").text("Remove Episode from watchlists");

			        } else {
                        $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").addClass('addlist-btn').removeClass('removelist-btn');
                        $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").text("Add Episode to watchlists");
			        }
			    } else {
                    $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").addClass('addlist-btn').removeClass('removelist-btn');
                    $("span[id$='" + $scope.EpisodeArray[0].PieceID + "episode']").text("Add Episode to watchlists");
			    }
		    }, 200);
		    setTimeout(function(){
		    if(window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
		        var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
		        if(tempseasonIdsArray.indexOf(seasonid.toString()) > -1) {
		            $('#' + seasonid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('removelist-btn').removeClass('addlist-btn');
		            $('#' + seasonid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Remove Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " from watchlists");
		        } else {

		            $('#' + seasonid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('addlist-btn').removeClass('removelist-btn');
		            $('#' + seasonid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Add Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " to watchlists");
		        }
		    } else {

		        $('#' + seasonid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').addClass('addlist-btn').removeClass('removelist-btn');
		        $('#' + seasonid + '-' + $scope.SeasonListIndividual.SeasonNumber + '-' + ($scope.SeasonListIndividual.SeasonPart !== null ? $scope.SeasonListIndividual.SeasonPart : '') + '-season').text("Add Season " + $scope.SeasonListIndividual.SeasonNumber + ($scope.SeasonListIndividual.SeasonPart !== null ? "-" + $scope.SeasonListIndividual.SeasonPart : "") + " to watchlists");
		    }
		    }, 200);
			  $('#overlayLoaderForCategory').hide();

			  var swiper8 = SwiperService.GetSwiperSlides('.episodesSwiper', 1);
			  swiperOnload(swiper8, '.episodesSwiper', 1);
		});
		
		 $('#overlayLoader').hide();
		
	
        }
		
	
		
		$scope.indexshow =''
		/*Episode Details View*/
		$scope.ShowEpisodeDetailsmobile = function(episodedetail,index){
			
		    $scope.isPlayClicked = false;
			$scope.EpisodeViewInformationForMobile = episodedetail;
			
			$scope.indexshow = index;

			$("[id^='screenerEpisodeMobile']").each(function () {
			    $(this).removeAttr('src');
			});
			if (episodedetail.IScreenerAvailable && !$scope.isSinglePiece) {
			    $('#screenerEpisodeMobile_' + index).attr('src', constants.PLAYER_BASE_URL + episodedetail.ScreenerUrl + '?autoPlay=true');
			    $scope.isPlayClicked = true;
			}

			
		}
		
		$scope.closeEpisodeDiv = function() {
            $scope.EpisodeDetails = false;
            $('#screenerEpisode').attr('src','');
            $scope.isSinglePiece = false;
            $scope.isPlayClicked = false;
        }
		
		$scope.ShowEpisodeDetails = function (episode, index) {

			$scope.selected = index;
            $('#screenerEpisode').attr('src','');
            $scope.isPlayClicked = false;
			$scope.EpisodeDetails = !$scope.EpisodeDetails;
			$scope.EpisodeViewInformation = episode;
            isScrneer=$scope.EpisodeViewInformation.IScreenerAvailable;
			$scope.$watch('EpisodeViewInformation.PieceID', function (NewVal, oldVal) {
			    if (NewVal !== oldVal) {
					$scope.EpisodeDetails = true;
				}
			});
			setTimeout(function () {
            if(window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
                var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
                if (tempseasonIdsArray.indexOf(episode.PieceID.toString()) > -1) {
					$("span[id$='" + episode.PieceID + "episode']").addClass('removelist-btn').removeClass('addlist-btn');
                    $("span[id$='" + episode.PieceID + "episode']").text("Remove Episode from watchlists");
                  
                } else {
					$("span[id$='" + episode.PieceID + "episode']").addClass('addlist-btn').removeClass('removelist-btn');
                    $("span[id$='" + episode.PieceID + "episode']").text("Add Episode to watchlists");
                }
            } else {
                $("span[id$='" + episode.PieceID + "episode']").addClass('addlist-btn').removeClass('removelist-btn');
                $("span[id$='" + episode.PieceID + "episode']").text("Add Episode to watchlists");
            }
		},200);
		
            if(episode.IScreenerAvailable && !$scope.isSinglePiece) {
                $('#screenerEpisode').attr('src',constants.PLAYER_BASE_URL+episode.ScreenerUrl+'?autoPlay=true');
                $scope.isPlayClicked = true;
            }
		}
		$scope.showbutton = function(input)
		{

		if(input === $scope.AddButton)
		{
		 $scope.AddButton =-1;
		}else
		{
		$scope.AddButton =input;
		}
		
		}
		$scope.ratingNumber=function(rating,id){
			
			  if(id==='rating1')
			  {
			  $(".rating1").addClass('selected');
              $(".rating2").removeClass('selected');
			  $(".rating3").removeClass('selected');
			 
			  $(".rating4").removeClass('selected');
			  
			  }else if(id==='rating2')
			  {
			   $(".rating2").addClass('selected');
              $(".rating1").removeClass('selected');
			  $(".rating3").removeClass('selected');
			 
			  $(".rating4").removeClass('selected');
			  }else if(id==='rating3')
			  {
			  $(".rating3").addClass('selected');
              $(".rating2").removeClass('selected');
			  $(".rating1").removeClass('selected');
			 
			  $(".rating4").removeClass('selected');
			  
			  }else if(id==='rating4')
			  {
			  $(".rating4").addClass('selected');
              $(".rating2").removeClass('selected');
			  $(".rating1").removeClass('selected');
			 
			  $(".rating3").removeClass('selected');
			  
			  }
			  
			 
			$scope.review=rating.review;
			$scope.AuthorName=rating.author_name;
			$scope.ChannelName=rating.site_name;
			
		}
		 
		$scope.ratingStar=function(rating){
			
			$scope.review=rating.review;
			$scope.AuthorName=rating.author_name;
			$scope.ChannelName=rating.site_name;
		}

		/*Browse Gallery*/
		$scope.GalleryPopup=false;
		$scope.EpisodeDetailsShow= true;
		$scope.ShowPopup = function (ImageURL, indexImage) {
		    var modalInstance = $uibModal.open({
		        templateUrl: 'ImageModalContent.html',
		        controller: 'GalleryModalInstanceCtrl',
		        resolve: {
		            ImageURL: function () {
		                return ImageURL;
		                
		            },
		            gallary: function () {
		                return $scope.gallary;
		            },
		            indexImage: function () {
		                return indexImage;
		            }
		        },
		        scope:$scope
		    });

		    modalInstance.result.then(function (selectedItem) {
		        $scope.selected = selectedItem;
		    }, function () {
		        
		    });
		};
		
		/*--------------Code for Asset Tab-------------------*/
		
		// on update button click, filter results
		$scope.UpdateAssetResults = function(){
		var data={};	
			 $scope.MainAssets=[];
			 
			  if($scope.SeriesDetailsInformation.ProgramType==="Movies" || $scope.SeriesDetailsInformation.ProgramType==="Episodes"){
	   data={ "SeriesId" : 0,
        "SeasonID" : 0,
        "PieceID" : $scope.SeriesDetailsInformation.SeriesID,
        "AssetTypeLK":(($scope.filters===undefined || $scope.filters==="" || $scope.filters===null)?0:$scope.filters)		
		};
	  }else
			 
	  {
	    data={
		"SeriesId":(($scope.SeriesDetailsInformation.SeriesID===undefined || $scope.SeriesDetailsInformation.SeriesID==="" || $scope.SeriesDetailsInformation.SeriesID===null)?0:$scope.SeriesDetailsInformation.SeriesID),
        "SeasonID":(($scope.SeasonAssetLists===undefined || $scope.SeasonAssetLists==="" || $scope.SeasonAssetLists===null)?0:$scope.SeasonAssetLists),
        "PieceID":(($scope.EpisodeAssetinformation===undefined || $scope.EpisodeAssetinformation==="" || $scope.EpisodeAssetinformation===null)?0:$scope.EpisodeAssetinformation),
        "AssetTypeLK":(($scope.filters===undefined || $scope.filters==="" || $scope.filters===null)?0:$scope.filters)		
		};
      }
	  
		SeriesDataService.getMainAssetsDetailsDataByID(data, $scope.inputPageName,function (dataResponseService) {
                     $scope.MainAssets=dataResponseService;
	   
	   
	

	  $scope.AssetListDeatails = $scope.MainAssets;
	  window.sessionStorage.setItem("assertsList", JSON.stringify($scope.AssetListDeatails));
	  $scope.currentPage = 1;
			$scope.MacthingResult = [];
			$scope.TotalRecords = 0;
			$scope.TotalRecords = $scope.AssetListDeatails.length;
			$scope.TotalPages =0;
			$scope.itemsPerPage = 15;
			$scope.TotalPages = Math.ceil(($scope.AssetListDeatails.length) / ($scope.itemsPerPage));
			$scope.numPages = $scope.TotalPages;
			$scope.myFunction();
			
      });			
			 
			  
			 $scope.MainAssets = $.parseJSON(window.sessionStorage.getItem("assertsList"));
			}
		
		// filter results based upon dropdowns
		//change the episode on change of season
		$scope.EpisodeAssetsListsForDropDown=[];
		$scope.SampleJsonForEpisodeAssets={
			'id':'',
			'value':''
		};
	
		$scope.Seasonchange = function(seasonid)
		{
		 
		$scope.EpisodeAssetsListsForDropDown=[];
		$scope.EpisodeAssetsLists=[];
		$scope.EpisodeAssetinformation='';
		
		SeriesDataService.getEpisodeDetailsDataByID($scope.SeriesDetailsInformation, seasonid, $scope.inputPageName, $scope.SeriesDetailsInformation.EpisodesCount, function (dataResponseService)
		{
		
		$scope.EpisodeAssetsLists=dataResponseService;
		
		$scope.SampleJsonForEpisodeAssets={
					  'id':'',
					  'value':''
					}
		for(var i = 0; i < $scope.EpisodeAssetsLists.length; i++)
					{
					$scope.SampleJsonForEpisodeAssets.id=$scope.EpisodeAssetsLists[i].PieceID;
					$scope.SampleJsonForEpisodeAssets.value='Episode : '+$scope.EpisodeAssetsLists[i].PieceNumber+' - '+$scope.EpisodeAssetsLists[i].PieceTitle
					$scope.EpisodeAssetsListsForDropDown.push($scope.SampleJsonForEpisodeAssets);
					$scope.SampleJsonForEpisodeAssets={
					  'id':'',
					  'value':''
					}
		}

		var swiper8 = SwiperService.GetSwiperSlides('.episodesSwiper', 1);
		swiperOnload(swiper8, '.episodesSwiper', 1);
				
});

		
		}
		
		$scope.SelectAssetSeason = function() {
		
			$scope.EpisodeforAssetsLists=[];
			
			
		    // if seasons list available & dropdown valid filter
		    // selected dropdown season
			if ($scope.SeasonAssetLists !== null && $scope.SeasonAssetLists !== undefined && $scope.SeasonAssetLists !== '') {
			    // available season list
			for (var i = 0; i < $scope.SeasonListDetails.length; i++) {
				if ($scope.SeasonAssetLists === $scope.SeasonListDetails[i].SeasonID) {
				     $scope.MainAssets=[];
					$scope.EpisodeforAssetsLists = $scope.SeriesDetailsInformation.SeasonDetail[i].EpisodeDetail;
					if($scope.EpisodeforAssetsLists.length > 0)
					{
					    // if episode dropdown selected filter for that episode
					    // selected dropdown episode
					    if ($scope.EpisodeAssetinformation !== null && $scope.EpisodeAssetinformation !== undefined && $scope.EpisodeAssetinformation !== '') 
					    {
					        // available episode list
			       for(var j=0;j<$scope.EpisodeforAssetsLists.length;j++){
				   if($scope.EpisodeAssetinformation===$scope.EpisodeforAssetsLists[j].PieceID ){
				    if($scope.EpisodeforAssetsLists[j].AssetDetail.length>0){
				    for(var k=0;k<$scope.EpisodeforAssetsLists[j].AssetDetail.length;k++){
			          $scope.MainAssets.push($scope.EpisodeforAssetsLists[j].AssetDetail[k]);
				    }
					}
				   }
				   
				  }
				  }else 
					    {
					        // get all episode assets for selected season if no episode selected
					        // available episode list
				  for(var j=0;j<$scope.EpisodeforAssetsLists.length;j++){ 
				    if($scope.EpisodeforAssetsLists[j].AssetDetail.length>0){
				    for(var k=0;k<$scope.EpisodeforAssetsLists[j].AssetDetail.length;k++){
			          $scope.MainAssets.push($scope.EpisodeforAssetsLists[j].AssetDetail[k]);
				    }
					}				   
				  }
				  }
			  
					}
					
				}
			}
			
			}
			
			// if no seasons available & only episodes list is there filter for those
			if($scope.SeriesDetailsInformation.SeasonDetail.length===0 && $scope.SeriesDetailsInformation.EpisodeDetail.length>0)
			{
			    // available episodes for no seasons case
			    for (var j = 0; j < $scope.SeriesDetailsInformation.EpisodeDetail.length; j++) {
			        // if assets available for episode
			        if ($scope.SeriesDetailsInformation.EpisodeDetail[j].AssetDetail.length > 0) {
			            // match with selected episode & get results
				   if($scope.EpisodeAssetinformation===$scope.SeriesDetailsInformation.EpisodeDetail[j].PieceID ){ 
				    $scope.MainAssets =[];
				  for(var k=0;k<$scope.SeriesDetailsInformation.EpisodeDetail[j].AssetDetail.length;k++){
			       $scope.MainAssets.push($scope.SeriesDetailsInformation.EpisodeDetail[j].AssetDetail[k]);
				  }
				  }
				 }
			  }
		 }
			   
			   // check for doctype filter
			   $scope.FilterAssetsByDocType();
		}
		
       $scope.FilterAssetsByDocType = function()
	   {
	   $scope.FilterMainAssets = $scope.MainAssets ;
	     if($scope.filters !== null && $scope.filters !== undefined && $scope.filters !== ''){
		 $scope.MainAssets =[];
		   for(var j=0;j<$scope.FilterMainAssets.length;j++)
		  {
		   if($scope.filters ===$scope.FilterMainAssets[j].AssetTypeLK )
		   {
		     
		   $scope.MainAssets.push($scope.FilterMainAssets[j]);
		  
		  }
		 
		 }
	   
	   }
	   }
		   
		   //On click of pagination buttons
			$scope.myFunction = function () {
				$scope.MacthingResult = [];
				var begin = (($scope.currentPage - 1) * $scope.itemsPerPage);
				var end = begin + $scope.itemsPerPage - 1;
				for (var i = begin; i <= end; i++) {
				    if ($scope.AssetListDeatails[i] !== undefined) {
						$scope.MacthingResult.push($scope.AssetListDeatails[i]);
					}
				}
			}
			
$scope.renderHTML = function(html_code)
        {
            var decoded = angular.element('<textarea />').html(html_code).text();
            return $sce.trustAsHtml(decoded);
        };
        function swiperOnload(swiperThis, swiperClass, num) {
		    if (swiperThis.activeIndex === 1) {
		        $('.swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
		        $(swiperClass + ' .swiper-slide-next').next().css("opacity", "0.3");
		    }
		}
				
		init();
		}
		 });
		
		
    }]);
