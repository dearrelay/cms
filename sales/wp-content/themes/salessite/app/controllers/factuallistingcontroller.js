myApp.controller('FactualListingController',
    ['$scope', '$location','SeriesDataService',
function ($scope, $location,SeriesDataService) {
    $scope.selectedOption ='SeriesName';
   $scope.FactuallistSampleJson ={};
     $scope.ListingScripts =[];
     $scope.MacthingResult1 = [];
     $('#overlayLoader').show();
        $scope.totalPageHide= true;
	   $scope.FactuallistSampleJson = $.parseJSON(window.sessionStorage.getItem("reqForCall"));
	   SeriesDataService.getFactualListing($scope.FactuallistSampleJson, function (dataResponseService) {
			     $scope.FactuallistSampleJson = dataResponseService;			  

	
	   if(($scope.FactuallistSampleJson === null || $scope.FactuallistSampleJson === undefined) )
		{
          $scope.totalPageHide= false;
         	
        $('#overlayLoader').hide();			
		}
		else
		{
           $scope.totalPageHide= true;
  $scope.collectionmb ='';
$scope.ListingCategoryDup=[];
$scope.ListingCollection=[];
$scope.ListingCollectionDup=[];
$scope.ListingCategory=[];
function init(){
SeriesDataService.getCategoryList(function (dataResponse) {
	 if(dataResponse!==null && dataResponse !== undefined && dataResponse !==''){
	$scope.ListingCategory = dataResponse;
	$scope.ListingCategoryForDropdown=[];
	for(var i=0;i<$scope.ListingCategory.length;i++){
   $scope.ListingCategory[i].CategoryName= $scope.ListingCategory[i].CategoryName.replace(/ AND /g, ' & ');
   
   }
	 }
	 
	$scope.screen_width = window.innerWidth;
 $scope.WindowResize();
$scope.TotalRecordsForScript = $scope.FactuallistSampleJson.SeriesDetail.length;
 
$scope.categorymb=$scope.FactuallistSampleJson.CategoryId;

$scope.collectionmb = $scope.FactuallistSampleJson.CollectionId ;

 for(var i=0;i< $scope.ListingCategory.length; i++){
 if($scope.ListingCategory[i].CategoryId === $scope.categorymb ){

 $scope.ListingCollection = $scope.ListingCategory[i].CollectionList;
if($scope.FactuallistSampleJson.CollectionId !== null && $scope.FactuallistSampleJson.CollectionId !== undefined && $scope.FactuallistSampleJson.CollectionId !== '')
{
$scope.ListingCollection = $scope.ListingCategory[i].CollectionList;
}
}
}
for(var k=0;k<$scope.ListingCollection.length;k++){
   $scope.ListingCollection[k].CollectionName= $scope.ListingCollection[k].CollectionName.replace(/ AND /g, ' & ');
   
}
if ($scope.ListingScripts.length === 0) {
    $scope.MacthingResult1 = $scope.FactuallistSampleJson.SeriesDetail;
} else {
    $scope.MacthingResult1 = $scope.ListingScripts;
}
   $scope.currentPage = 1;   
    $scope.TotalRecords = 0;
    $scope.TotalRecords = $scope.MacthingResult1.length;
    $scope.TotalPages =0;
    $scope.TotalPages = Math.ceil(($scope.MacthingResult1.length) / ($scope.itemsPerPage));
    $scope.numPages = $scope.TotalPages;
    $scope.MacthingResult1.sort(SortByName);
    $scope.MacthingResult1.sort(SortByDate);
	$scope.myFunction();
	});
	
$scope.getDraftWatchlists1();
    
 $('#overlayLoader').hide();		
   }
   
 $scope.GetScriptedDetails = function (details) {
		       
				window.sessionStorage.setItem("ScriptedList", JSON.stringify($scope.selectedSeries));
				window.sessionStorage.setItem("ScriptedDetails", JSON.stringify(details));
				window.sessionStorage.setItem("pageName", JSON.stringify("Factual"));
               if(details.ProgramType==="Piece")
					{
					details.ProgramType="Episodes";
					}
					window.location.href = url + "/factual-detail/" + details.SeriesID +"/?"+details.ProgramType;
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
$scope.getDefaultShowCardImage = function() {
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

   $scope.sorting=function(key){
	if(key==="SeriesName")
	{
	$scope.MacthingResult1.sort(SortByName) ;
	}
	else
	{
	$scope.MacthingResult1.sort(SortByDate) ;
	}
	$scope.myFunction();
}		
//This will sort your results by name
function SortByName(a, b){
  var aName = a.SeriesName.toLowerCase();
  var bName = b.SeriesName.toLowerCase(); 
  return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
}
$scope.categorymb ='';
//This will sort your results by date
function SortByDate(a, b){
   var aDate = new Date(a.ReleasedDate);
var bDate = new Date(b.ReleasedDate);
  return ((aDate > bDate) ? -1 : ((aDate < bDate) ? 1 : 0));
}

 $scope.getMobileCollection = function()
 {
 
  $scope.ListingCollection=[];
 for(var i=0; i<$scope.ListingCategory.length;i++)
 {
 if(parseInt($scope.categorymb)===parseInt($scope.ListingCategory[i].CategoryId)){
 $scope.ListingCollection=$scope.ListingCategory[i].CollectionList;
 }
 
 }
 for(var m=0;m<$scope.ListingCollection.length;m++){
   $scope.ListingCollection[m].CollectionName= $scope.ListingCollection[m].CollectionName.replace(/ AND /g, ' & ');
   
   }
  inputformainlist={
	"CategoryId":$scope.categorymb
	 }
	  $('#overlayLoaderForCategory').show();
  $scope.getMainList(inputformainlist);
 }
var inputformainlist={};
		 $scope.getCollectionDetails= function() {
	  if($scope.categorymb===null || $scope.categorymb=== undefined ){
	 $scope.categorymb=$scope.FactuallistSampleJson.CategoryId;
	 }
	 
	      if($scope.collectionmb !==0 && $scope.collectionmb !==""){
		   inputformainlist={
	"CategoryId":$scope.categorymb,
	"CollectionId":$scope.collectionmb
	 }     
	 $('#overlayLoaderForCategory').show();
			 $scope.getMainList(inputformainlist);
			 }else{
			 inputformainlist={
	"CategoryId":$scope.categorymb
	 }
	
	  $scope.getMainList(inputformainlist);
			 }
		}
		
		 $scope.getMainList = function(inputformainlist){		
		 $scope.MacthingResult1=[];
		    SeriesDataService.getFactualListing(inputformainlist, function (dataResponseService) {
			$scope.ListingScripts=[];
			     $scope.FactuallistSampleJson = dataResponseService;
				   $scope.TotalRecordsForScript = $scope.FactuallistSampleJson.SeriesDetail.length;				  
				   $scope.MacthingResult1 = $scope.FactuallistSampleJson.SeriesDetail;
				  $('#overlayLoader').hide();	 
             $scope.currentPage = 1;
           $scope.TotalRecords = 0;
            $scope.TotalRecords = $scope.MacthingResult1.length;
           $scope.TotalPages =0;
          $scope.TotalPages = Math.ceil(($scope.MacthingResult1.length) / ($scope.itemsPerPage));
      $scope.numPages = $scope.TotalPages;
      $scope.MacthingResult1.sort(SortByName);
      $scope.MacthingResult1.sort(SortByDate);
      $scope.myFunction();
	   
			 $('#overlayLoaderForCategory').hide();
	  
		    });
		    $scope.getDraftWatchlists1();
			$scope.selectedOption ='-YearReleased';
		 }

	init();
	}
	});

}]);