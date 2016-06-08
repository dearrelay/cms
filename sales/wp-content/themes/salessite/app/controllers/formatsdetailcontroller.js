myApp.controller('FormatDetailController', ['$scope', '$window', 'SeriesDataService', 'SwiperService',
    function ($scope, $window, SeriesDataService, SwiperService) {
      
        $scope.SeasonListDetails = [];
		$scope.SeriesDetailsInformation ='';
		$scope.seasonList ='';
        $scope.EpisodeArray = [];
		
		$scope.CastingDetails=[];
		$scope.CastingVariable='';
		$scope.timeStamp="";
	   $scope.timehour = '';
	   $scope.timemin = '';
	     $scope.timesplit=[];
		
		$scope.spinner1 = false;

		$scope.spinner2 = false;
		$scope.spinner3 = false;
        $scope.isSinglePiece = true;
		$('#overlayLoader').show();
		$scope.ViewBannerDefault =imgpath+"/default-images/showcard_2.jpg";
		$scope.totalPage = true;
		$scope.printPDF = function () {
		    window.print();
		}
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
		
	var urlCurrent = window.location.href;
		var urlItems = urlCurrent.split('/');
		
		var formatID = parseInt(urlItems[urlItems.length-2]);
		var res = [];
			
		SeriesDataService.getFormatsDetailByIdfromcms(formatID, function (dataResponseService) {
		
            
		    $scope.descfromcms = dataResponseService;
		    var result = dataResponseService.piece_id;
			if(result!==undefined){
		    if (result.indexOf(',') !== -1) {
		        res = result.split(",");
		    } else {

		        res.push(result);
		    }
		    $scope.SeriesDetailsInformation = {
		        "FormatID": formatID,
		        "PieceIDs": res
		    }
			}
			else
			{
			res.push(0);
			 $scope.SeriesDetailsInformation = {
		        "FormatID": formatID,
		        "PieceIDs": res
		    }
			}
        SeriesDataService.getFormatsDetailById($scope.SeriesDetailsInformation, function (dataResponseService) {
			 $scope.SeriesDetailsInformation =dataResponseService;
            if(dataResponseService.SeriesImageUrl===null || dataResponseService.SeriesImageUrl==="") {
                $scope.SeriesDetailsInformation.SeriesImageUrl = getDefaultDPBImage();
            }
		if(($scope.SeriesDetailsInformation === null || $scope.SeriesDetailsInformation === undefined) )
		{
		$scope.totalPage= false;
         	
        $('#overlayLoader').hide();		
		}
		else
		{
			 SeriesDataService.getYouMayInterstedInData($scope.SeriesDetailsInformation.SeriesID,$scope.SeriesDetailsInformation.ProgramType,function(dataResponse){
			$scope.YoumayInstredinArray = dataResponse;
			
			  
			});
            
		
		SeriesDataService.getSeriesDetailsByID($scope.SeriesDetailsInformation.FormatID,'Formats',function(dataResponse){
		$scope.spinner1 = true;
		$scope.spinnerStatus();
		if(dataResponse !== null && dataResponse !== undefined && dataResponse!==''){
		 $scope.CastingVariable =   dataResponse;
			
			if(angular.isArray($scope.CastingVariable))
			{
			  $scope.LastDetails = false
		   
			}else{
			 $scope.LastDetails = true;	
			}
		}else{
		    $scope.LastDetails = false;		   
		}	

   	    	
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
		      if (max === undefined || isNaN(max) || max === null) {
  
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
            
	
		
		function updateEpisodeImagesWithDefaultImage (seasonData) {
			
			 
			    for(var i=0;i<seasonData.length;i++){
					if(seasonData[i].EpisodeImageUrl === "" || seasonData[i].EpisodeImageUrl === null 
					|| typeof seasonData[i].EpisodeImageUrl === "undefined") {
						seasonData[i].EpisodeImageUrl = getDefaultShowCardImage();
					}
				 }
			  		   
		   
		}
		function updateEpisodeImagesWithDefaultImageOtherAPI (seasonData) {
			for(var i=0;i<seasonData.length;i++)
		   {
		      if(seasonData.length>0)
			  {
			  
					if(seasonData[i].ImageUrl === "" || seasonData[i].ImageUrl === null 
					|| typeof seasonData[i].ImageUrl === "undefined") {
						seasonData[i].ImageUrl = getDefaultShowCardImage();
					}
				
			  }
		   
		   }
		}
		function SortBySeasonDesc(a, b){
  var aSeasonNumber =  parseInt(a.SeasonNumber);
  var bSeasonNumber =  parseInt(b.SeasonNumber); 
  return ((aSeasonNumber > bSeasonNumber) ? -1 : ((aSeasonNumber < bSeasonNumber) ? 1 : 0));
}

$scope.goToScriptedDetails = function (details) {
 if(details.ProgramType === "Scripted") {
		window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
					window.sessionStorage.setItem("pageName",  JSON.stringify("Scripted"));
					window.location.href = url + "/scripted-details/" + details.SeriesID + "/?Series";
			
		}
		 if(details.ProgramType === "Movie")
		{
		details.PPLID =details.SeriesID;
		window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
					window.sessionStorage.setItem("pageName",  JSON.stringify("Movies"));
					window.location.href = url + "/movie-detail/" + details.PPLID + "/";
		 
		}
		 if(details.ProgramType === "Factual")
		{
			
				window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
					window.sessionStorage.setItem("pageName",  JSON.stringify("Factual"));
					window.location.href = url + "/factual-detail/" + details.SeriesID + "/?Series";
		}
		 if (details.ProgramType === "Format") {

		     window.location.href = url + "/formats-details/" + details.FormatID + "/";

		 }
		      
		    }
		function init(){
		
		if($scope.SeriesDetailsInformation.EpisodeDetail!==null  && $scope.SeriesDetailsInformation.EpisodeDetail!=='' && $scope.SeriesDetailsInformation.EpisodeDetail!==undefined){
			 if($scope.SeriesDetailsInformation.EpisodeDetail.length>1){
			$scope.SeasonAvailable = false;
			$scope.EpisodeArray =  $scope.SeriesDetailsInformation.EpisodeDetail;
			for(var i=0;i<$scope.EpisodeArray.length;i++){
			$scope.timesplit=[];
			$scope.timeStamp="";
		$scope.timeStamp=$scope.EpisodeArray[i].Duration;
		 $scope.timehour='';
		 $scope.timemin='';
		if($scope.timeStamp!==0&& $scope.timeStamp!==null&& $scope.timeStamp!==undefined  && $scope.timeStamp!=="")
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
			$scope.EpisodeAssetsLists =  $scope.EpisodeArray;
			$scope.EpisodeViewInformationForMobile = $scope.EpisodeArray[0];
			updateEpisodeImagesWithDefaultImage($scope.SeriesDetailsInformation.EpisodeDetail);
			updateEpisodeImagesWithDefaultImageOtherAPI($scope.SeriesDetailsInformation.InterstedDetail);
				
		}else{
		
		    $scope.SeasonAvailable = false;
			$scope.EpisodeArray =  $scope.SeriesDetailsInformation.EpisodeDetail;
			for(var i=0;i<$scope.EpisodeArray.length;i++){
			$scope.timesplit=[];
			$scope.timeStamp="";
		 $scope.timeStamp=$scope.EpisodeArray[i].Duration;
		if($scope.timeStamp!==0&& $scope.timeStamp!==null&& $scope.timeStamp!==undefined  && $scope.timeStamp!=="")
		{
		 $scope.timesplit=$scope.timeStamp.split('.');
		 $scope.timehour=($scope.timesplit[0]/60);
		 $scope.timemin=($scope.timesplit[0]%60);
		$scope.EpisodeArray[i].Duration=($scope.timehour>10?$scope.timehour:'0'+$scope.timehour)+':'+($scope.timemin>10?$scope.timemin:'0'+$scope.timemin)+':'+($scope.timesplit[1]>10?$scope.timesplit[1]:'0'+$scope.timesplit[1])
		}
		
		
		}
			$scope.EpisodeAssetsLists =  $scope.EpisodeArray;
	
			$scope.gallary = $scope.SeriesDetailsInformation.GalleryList;
			SwiperService.GetBrowseGallerySwiper();
			 
			if($scope.EpisodeArray.length>0)
					
			{
			$scope.EpisodeDetails = true;
			}
			$scope.EpisodeViewInformation = $scope.EpisodeArray[0];
			$scope.EpisodeViewInformationForMobile = $scope.EpisodeArray[0];
			updateEpisodeImagesWithDefaultImageOtherAPI($scope.SeriesDetailsInformation.InterstedDetail);
			$(".episode-play").addClass("mtp0");
	 
		}
		}
		
					var swiper4 = SwiperService.GetSwiperSlides('.youMaySwiper1', 1);
		    swiperOnload(swiper4, '.youMaySwiper1', 1);
			 var swiper8 = SwiperService.GetSwiperSlides('.episodesSwiper', 2);
		    swiperOnload(swiper8, '.episodesSwiper', 2);
	$('#overlayLoader').hide();
            $scope.getDraftWatchlists1();
	       
    }
	
 
	
	 
	
	
	$scope.Presentation = function()
	{	 
		window.open($scope.CastingVariable.presentation_url); 	
	}
	
	
	$scope.openingWebSite = function(rating)
	{	 
		window.open(rating.site_url,'_blank'); 	
	}
	
	$scope.viewDetails=''
	$scope.playFormatScreener = function(DetailsDesktop)
	{
	  $scope.viewDetails = DetailsDesktop;
        
        $('#screenerFormat').attr('src',constants.PLAYER_BASE_URL+DetailsDesktop.ScreenerUrl+'?autoPlay=true');
	}
	$scope.episodeDivClosed = function()
	{
        $('#screenerFormat').attr('src','');
        $scope.EpisodeDetails = false;
    }
	$scope.indexshow =''
		/*Episode Details View*/
		$scope.ShowEpisodeDetailsmobile = function(episodedetail,index){
			
			
			$scope.EpisodeViewInformationForMobile = episodedetail;
			
			$scope.indexshow= index;
			$scope.isPlayClicked = false;
			$("[id^='screenerEpisodeMobile']").each(function () {
			    $(this).removeAttr('src');
			});
			if (episode.IScreenerAvailable) {
			    $('#screenerEpisodeMobile_' + index).attr('src', constants.PLAYER_BASE_URL + episode.ScreenerUrl + '?autoPlay=true');
			    $scope.isPlayClicked = true;
			}
		}
		
		$scope.closeEpisodeDiv = function() {
            $scope.EpisodeDetails = false;
            $('#screenerEpisode').attr('src','');
            $scope.isSinglePiece = false;
            $scope.isPlayClicked = false;
        }
		$scope.ShowEpisodeDetails = function(episode,index){
			$scope.selected = index;
            $('#screenerEpisode').attr('src','');
            $scope.isSinglePiece = false;
            $scope.isPlayClicked = false;
			$scope.EpisodeDetails = !$scope.EpisodeDetails;
			$scope.EpisodeViewInformation = episode;
			 $('#screenerFormat').attr('src',constants.PLAYER_BASE_URL+$scope.EpisodeViewInformation.ScreenerUrl+'?autoPlay=true');
			$scope.$watch('EpisodeViewInformation.PieceID', function (NewVal, oldVal) {
				if (NewVal !== oldVal) {
					$scope.EpisodeDetails = true;
				}
			});
            if(episode.IScreenerAvailable) {
                $('#screenerEpisode').attr('src',constants.PLAYER_BASE_URL+episode.ScreenerUrl+'?autoPlay=true');
                $scope.isPlayClicked = true;
            }
		}
	
	
        function swiperOnload(swiperThis, swiperClass, num) {
		    if (swiperThis.activeIndex === 1) {
		        $('.swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
		        $(swiperClass + ' .swiper-slide-next').next().css("opacity", "0.3");
		    }
		}
				
		init();
		}
		 });
		
		
    });
	}
	]);
