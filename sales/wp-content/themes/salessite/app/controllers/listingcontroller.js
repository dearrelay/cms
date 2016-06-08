myApp.controller('ListingController',
    ['$scope', '$location','SeriesDataService','BrowseAllService', 
function ($scope, $location,SeriesDataService, BrowseAllService) {
    $scope.selectedOption ='SeriesName';
   $scope.ListingSampleJson ={};
   $scope.TotalRecordsForScript =0;
     $scope.ListingScripts =[];
	  $scope.MacthingResult1=[];
	  $scope.ListingSampleJson = $.parseJSON(window.sessionStorage.getItem("reqForCall"));
	  
	   BrowseAllService.getMovieListing($scope.ListingSampleJson, function (dataResponseService) {
				$scope.ListingSampleJson = dataResponseService;
	   
	   if($scope.ListingSampleJson!==undefined && $scope.ListingSampleJson!==null && $scope.ListingSampleJson!==''){

  $('#overlayLoader').show();
	  $scope.MovieBanner  ='';
		  
	 function init(){
	
	$scope.screen_width = window.innerWidth;
	$scope.ListingScripts=[];
	  $scope.WindowResize();
	  $scope.GetDetailsFunction();
	  $scope.MacthingResult1.sort(SortByName);
	  $scope.MacthingResult1.sort(SortByDate);
	    $scope.myFunction(); 
   }
   $scope.getDefaultShowCardImage = function() {
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
   $scope.getDefaultTabShowCardImage = function () {
       var defaultImagesArray = [imgpath + "/default-images/default1_688x384_tab.jpg ",
   imgpath + "/default-images/default2_688x384_tab.jpg ",
   imgpath + "/default-images/default3_688x384_tab.jpg ",
   imgpath + "/default-images/default4_688x384_tab.jpg ",
   imgpath + "/default-images/default5_688x384_tab.jpg ",
   imgpath + "/default-images/default6_688x384_tab.jpg ",
   imgpath + "/default-images/default7_688x384_tab.jpg ",
   imgpath + "/default-images/default8_688x384_tab.jpg ",
   imgpath + "/default-images/default9_688x384_tab.jpg ",
   imgpath + "/default-images/default10_688x384_tab.jpg ",
   imgpath + "/default-images/default11_688x384_tab.jpg ",
   imgpath + "/default-images/default12_688x384_tab.jpg "];

       return defaultImagesArray[Math.floor(Math.random() * defaultImagesArray.length)];
   }
    $scope.updateEpisodeImagesWithDefaultImage = function(seasonData) {
			for(var i=0;i<seasonData.length;i++)
		   { 
			    if (seasonData[i].ImageUrlDesktop1x === "" || seasonData[i].ImageUrlDesktop1x === null
					|| typeof seasonData[i].ImageUrlDesktop1x === "undefined") {
			        seasonData[i].ImageUrlDefault = $scope.getDefaultShowCardImage();
			        seasonData[i].ImageUrlDefaultTab = $scope.getDefaultTabShowCardImage();
					}
		   }
		}
   $scope.GetDetailsFunction = function(){
   $scope.TotalRecordsForScript = $scope.ListingSampleJson.MovieDetail.length;
   $scope.MacthingResult1 = $scope.ListingSampleJson.MovieDetail;
     $scope.currentPage = 1;
   
    $scope.MacthingResult = [];
    $scope.TotalRecords = 0;
    $scope.TotalRecords = $scope.MacthingResult1.length;
    $scope.TotalPages =0;
    $scope.TotalPages = Math.ceil(($scope.MacthingResult1.length) / ($scope.itemsPerPage));
    $scope.numPages = $scope.TotalPages;
	$('#overlayLoader').hide();
	$scope.getDraftWatchlists1();      
       

  }
 
   
 
 $scope.movieDetail = function(details)
 {
     window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
					window.sessionStorage.setItem("pageName",  JSON.stringify("Movies"));
					window.location.href = url + "/movie-detail/" + details.PPLID + "/";
 
 }
 
 
  $scope.WindowResize=function(){
if($scope.screen_width < 768){
		//for Mobile
		$scope.itemsPerPage = 6;
		}
if( ($scope.screen_width > 767) && ($scope.screen_width < 992)){
		//for Tab
		$scope.itemsPerPage = 10;
		}
 if($scope.screen_width > 991){
		//for Desktop
		$scope.itemsPerPage = 15;
		}
		}

   $scope.sorting=function(key){
	if(key==="MovieName")
	{
	$scope.MacthingResult1.sort(SortByName) ;
	}
	else
	{
	$scope.MacthingResult1.sort(SortByDate) ;
	}
	$scope.myFunction();
}
 $scope.myFunction = function () {
        $scope.ListingScripts = [];
        var begin = (($scope.currentPage - 1) * $scope.itemsPerPage);
        var end = begin + $scope.itemsPerPage - 1;
        for (var i = begin; i <= end; i++) {
            if ($scope.MacthingResult1[i] !== undefined) {
                $scope.ListingScripts.push($scope.MacthingResult1[i]);
            }
        }
        $scope.updateEpisodeImagesWithDefaultImage($scope.ListingScripts);
    }

//This will sort your results by name
function SortByName(a, b){
  var aName = a.MovieName.toLowerCase();
  var bName = b.MovieName.toLowerCase(); 
  return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
}

//This will sort your results by date
function SortByDate(a, b){
    var aDate = new Date(a.ReleasedDate); 
    var bDate = new Date(b.ReleasedDate);
  return ((aDate > bDate) ? -1 : ((aDate < bDate) ? 1 : 0));
}
    
     

	init();
	}
	else{
     $scope.totalPageHide="true";
	}
	  });
}]);