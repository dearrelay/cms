myApp.controller('SearchResultController', ['$scope', '$window', 'SeriesDataService', '$timeout', 'AutocompleteService',
    function($scope, $window, SeriesDataService, $timeout, AutocompleteService) {

        var w = angular.element($window);
        $scope.modeForFactual = true;
        var factualCount = 0;
        var AllListCount = 0;
        $scope.modeForMovies = true;
        $scope.modeForallCategory = true;
        $scope.plusImg = true;
        $scope.spinner1 = false;
        var movieCount = 0;
        var minDateValue = "";
        var maxDateValue = "";
        $scope.advancedFilters = '';
        $scope.CategoryAllData=[];
        $scope.serviceCallAllCategory=0;
        $scope.WindowResize = function() {
            if ($scope.screen_width < 768) {
                //for Mobile
                $scope.itemsPerPage = 6;
            }
            if (($scope.screen_width > 767) && ($scope.screen_width < 992)) {
                //for Tab
                $scope.itemsPerPage = 10;
            }
            if ($scope.screen_width > 991) {
                //for Desktop
                $scope.itemsPerPage = 15;
            }
        }

        $('#overlayLoaderForCategory').hide();
        document.getElementById("radio2").checked = true;
        $scope.screen_width = window.innerWidth;
        var SearchResults = [];

        $scope.category = window.sessionStorage.getItem("CategoryTerm");
        $scope.searchServiceCall = function() {


            
            if ($scope.searchTextValForService === undefined) {
                $scope.searchTextValForService = "";
            }
            //Space in String
           
                $scope.searchTextValForService = $scope.searchTextValForService.replace(/^\s+|\s+$/g, '');
                $scope.searchTextValForService = $scope.searchTextValForService.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1");
                var querySpaceReplacement =encodeURIComponent($scope.searchTextValForService.replace(/ /g,"\\ "));
                $scope.searchTextValForService = encodeURIComponent($scope.searchTextValForService);

            if ($scope.searchTextValForService !== "") {
                $scope.serviceURL="X"+ querySpaceReplacement  + "* OR *" + querySpaceReplacement + "* OR \""+$scope.searchTextValForService+"\" OR "+$scope.searchTextValForService+"*"+"&rows="+7500+"&df=Name_k&wt=json&indent=true&defType=edismax&qf=Name_k%5E100+Name%5E10+SeriesName_k%5E100+SeriesName&stopwords=true&lowercaseOperators=true";
                
            }
            if ($scope.searchTextValForService === "") {
                $scope.serviceURL = '*' + $scope.searchTextValForService + '*&wt=json&indent=true&rows=' + 7400
            }

            AutocompleteService.getSelectedData($scope.serviceURL, 7400, function(dataResponse) {
            $scope.serviceCallAllCategory=1;
             var seriesList = [];
                seriesList = dataResponse.response.docs;

                $scope.totalResults = seriesList;
                $scope.CategoryAllData=seriesList
          

                $scope.currentPage = 1;
                $scope.MacthingResult = [];
                $scope.TotalRecords = 0;
                $scope.TotalRecords = $scope.totalResults.length;
                $scope.TotalPages = 0;
                $scope.TotalPages = Math.ceil(($scope.TotalRecords) / ($scope.itemsPerPage));
                $scope.numPages = $scope.TotalPages;

                window.sessionStorage.setItem("CategoryTerm", 'all');
                //sorting
                displayResults();
                $scope.myFunction();
                $scope.selectedOption = "";
                $('#overlayLoaderForCategory').hide();
                
            });
            $('#overlayLoader').hide();

            $scope.category = 'all';

            $('#searchTerm').blur();


        }
        $scope.searchTermClickForSelect = function() {
            $scope.searchTextVal = $scope.searchTerm;
            window.sessionStorage.setItem("SearchTerm", $scope.searchTextVal);
            $scope.searchTextValForService = $scope.searchTerm;
            $scope.searchServiceCall();

        }
        $scope.searchTermClick = function() {

            $('#overlayLoaderForCategory').show();
            $('#overlayLoaderForCategory img').css('display', 'block');
            $scope.searchTextVal = $scope.searchTerm;
            $scope.searchTerm = $("#searchTerm").val();
            $scope.redirectionFrom = window.sessionStorage.getItem("redirection");
            $scope.searchTextVal = $scope.searchTerm;

            if ($scope.redirectionFrom === 'catalogue') {
                $scope.searchTerm = window.sessionStorage.getItem("SearchTerm");
                window.sessionStorage.setItem("SearchTerm", $scope.searchTerm);
            }

            $scope.searchTextValForService = $scope.searchTerm;
            $scope.searchServiceCall();

        }
        $scope.searchTermClickFromResults = function() {
                
            $('#overlayLoaderForCategory').show();
            $('#overlayLoaderForCategory img').css('display', 'block');
                $scope.searchTerm = $("#searchTerm").val();
                $scope.searchTextVal = $scope.searchTerm;
                window.sessionStorage.setItem("SearchTerm", $scope.searchTextVal);
                $scope.searchTextValForService = $scope.searchTextVal;
                $scope.searchServiceCall();
            }
            //On click of pagination buttons
        $scope.myFunction = function() {
            
            $scope.MacthingResult = [];
            var begin = (($scope.currentPage - 1) * $scope.itemsPerPage);
            var end = begin + $scope.itemsPerPage - 1;
            for (var i = begin; i <= end; i++) {
                if ($scope.MacthingResult1[i] !== undefined) {
                    if ($scope.MacthingResult1[i].URL === "" || $scope.MacthingResult1[i].URL === null || typeof $scope.MacthingResult1[i].URL === "undefined") {
                        $scope.MacthingResult1[i].URL = getDefaultShowCardImage();
                    }
                    $scope.MacthingResult.push($scope.MacthingResult1[i]);
                }
            }
            setTimeout(function() {
                if (window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
                    var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
                    if ($scope.MacthingResult && $scope.MacthingResult.length > 0) {
                        for (var i = 0; i < $scope.MacthingResult.length; i++) {
                            var minusImgSeries = '.' + $scope.MacthingResult[i].PPLID + 'minus';
                            var plusImgSeries = '.' + $scope.MacthingResult[i].PPLID + 'plus';
                            if (tempseasonIdsArray.indexOf($scope.MacthingResult[i].PPLID.toString()) > -1) {
                                $(minusImgSeries).show();
                                $(plusImgSeries).hide();
                            } else {
                                $(minusImgSeries).hide();
                                $(plusImgSeries).show();
                            }
                        }

                    }
                }
            }, 500);
        }

        //pagination code ends
        $scope.CategoryBasedFunction = function(ProgramTypeNumber) {
            $scope.currentPage = 1;
            $scope.MacthingResult = [];
            $scope.MacthingResult1 = [];
           
            $scope.CategoryBasedData = $scope.CategoryAllData;
            
            if ($scope.CategoryBasedData !== null) {
                if (ProgramTypeNumber !== 0) {
                    for (var i = 0; i < $scope.CategoryBasedData.length; i++) {

                        if ($scope.CategoryBasedData[i].ProgramType === ProgramTypeNumber) {
                            $scope.MacthingResult1.push($scope.CategoryBasedData[i]);

                        }
                    }
                    $scope.updateResults1 = $scope.MacthingResult1;

                }
                if (ProgramTypeNumber === 0) {

                    for (var i = 0; i < $scope.CategoryBasedData.length; i++) {
                        $scope.MacthingResult1.push($scope.CategoryBasedData[i]);
                        $scope.TotalPages = Math.ceil(($scope.CategoryBasedData.length) / ($scope.itemsPerPage));


                    }

                }
            }
           
            $scope.TotalRecords = $scope.MacthingResult1.length;
            $scope.TotalPages = Math.ceil(($scope.MacthingResult1.length) / ($scope.itemsPerPage));
            $scope.numPages = $scope.TotalPages;
            $('#overlayLoaderForCategory').hide();
            $scope.myFunction();
        }
        $scope.CategoryType = function(type) {
            if (type === 'scripted') {
                $('#overlayLoaderForCategory').show();
                document.getElementById('overlayLoaderForCategory').removeAttribute("style");
                $scope.selectedOption = "";
                $scope.CategoryBasedFunction('Scripted');
                refreshSlider();
            }
            if (type === 'Factual') {
                $('#overlayLoaderForCategory').show();
                document.getElementById('overlayLoaderForCategory').removeAttribute("style");
                if (factualCount === 0) {
                    $scope.selectedOption = "";

                    $scope.CategoryBasedFunction('Factual');
                   
                    refreshSlider();
                } else {
                    $scope.updateResultsForFactual();
                    $scope.advanceFilter('Factual', 'show');
                }
            }
            if (type === 'movies') {
                $('#overlayLoaderForCategory').show();

                document.getElementById('overlayLoaderForCategory').removeAttribute("style");
                if (movieCount === 0) {
                    $scope.selectedOption = "";

                    $scope.CategoryBasedFunction('Movie');
                   
                    refreshSlider();
                } else {
                    $scope.updateResultsForMovies();
                    $scope.advanceFilter('movies', 'show');

                }

            }
            if (type === 'formats') {
                $('#overlayLoaderForCategory').show();
                document.getElementById('overlayLoaderForCategory').removeAttribute("style");
                $scope.selectedOption = "";
                refreshSlider();
                $scope.CategoryBasedFunction('Format');
              
            }
            if (type === 'all') {

                if (AllListCount === 0) {
                    $('#overlayLoaderForCategory').show();
                    document.getElementById('overlayLoaderForCategory').removeAttribute("style");
                    $scope.selectedOption = "";
					if($scope.searchTerm!==""){
                    if($scope.serviceCallAllCategory===0){
                       $scope.searchTermClick();
                    }else{
					$scope.CategoryBasedFunction(0);
                    }
					 }else{
					  $scope.CategoryBasedFunction(0);
					 }
              
                    refreshSlider();
                } else {
                    $scope.updateResultsForAll();
                    $scope.advanceFilter('all', 'show');
                }

            }
        }



        // for sorting 


        //This will sort your results by name
        function sortByName(a, b) {
            var aName = a.Name.toLowerCase();
            var bName = b.Name.toLowerCase();
            return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
        }

        //This will sort your results by date
        function sortByDate(a, b) {
            var aDate = new Date(a.ReleasedDate);
            var bDate = new Date(b.ReleasedDate);

            return ((aDate > bDate) ? -1 : ((aDate < bDate) ? 1 : 0));
        }
        $scope.sorting = function(key) {

            if (key === "") {

                return;
            }
            if (key === "Name") {

                $scope.MacthingResult1.sort(sortByName);
            } else {

                $scope.MacthingResult1.sort(sortByName);
                $scope.MacthingResult1.sort(sortByDate);
            }
            $scope.myFunction();
        }

        //Range slider config 
        $scope.minRangeSliderForYear = {
            minValue: '',
            maxValue: ''

        };
        $scope.minValueForAll = "";
        $scope.maxValueForAll = "";
        //Slider config with custom display function  
        $scope.slider = {
            minValue: 0,
            maxValue: 1000,
            options: {
                floor: 0,
                ceil: 1000,
                noSwitching: true

            }
        };
        //Range Slider For Movies 

        $scope.minRangeSliderForYearForMovies = {
            minValue: '',
            maxValue: ''

        };

        $scope.QualityCheck = [];
        $scope.QualitiesChecked1 = {
            QualitiesSelected1: []
        };

        $scope.QualitiesCheckedForAll = {
            QualitiesSelected: []
        };


        $scope.QualitiesCheckedForMovies = {
            QualitiesSelectedForMovies: []
        };
        var assetList;
        getAdvanceFilters();

        function getAdvanceFilters() {
            SeriesDataService.getAdvancedFilter('', function(dataResponseService) {
                $scope.advancedFilters = dataResponseService;
                assetList = $scope.advancedFilters.AssetQualityList;
                $scope.QualityCheck.push(assetList);

                if ($scope.QualityCheck[0].length === 2) {

                    if ($scope.screen_width > 767) {

                        $scope.conditionWidth = '50%';
                    } else {
                        $scope.conditionWidth = '100%';
                    }
                }
                if ($scope.QualityCheck[0].length === 4) {

                    if ($scope.screen_width > 767) {

                        $scope.conditionWidth = '25%';
                    } else {
                        $scope.conditionWidth = '100%';
                    }
                }

                var gerenelist = [];
                gerenelist = $scope.advancedFilters.GenreList;

                $scope.selectOptions = {
                    placeholder: "Start typing a name....",
                    dataTextField: "GenreName",
                    dataValueField: "GenreId",
                    valuePrimitive: true,
                    autoBind: false,
                    dataSource: gerenelist
                };
                $scope.selectedIds = [];
                minDateValue = $scope.advancedFilters.MinReleaseDate;
                maxDateValue = $scope.advancedFilters.MaxReleaseDate;

                var minDateSplit = minDateValue.split('/');
                var maxDateSplit = maxDateValue.split('/');
                $scope.minDate = new Date(minDateSplit[2], minDateSplit[0] - 1, minDateSplit[1], 0, 0, 0);
                $scope.maxDate = new Date(maxDateSplit[2], maxDateSplit[0] - 1, maxDateSplit[1], 0, 0, 0);

                $("#datepickerstart").kendoDatePicker({
                    format: "MM/dd/yyyy",
                    min: $scope.minDate,
                    max: $scope.maxDate
                });
                $("#datepickerend").kendoDatePicker({
                    format: "MM/dd/yyyy",
                    min: $scope.minDate,
                    max: $scope.maxDate
                });
                $("#datepickerstartMovie").kendoDatePicker({
                    format: "MM/dd/yyyy",
                    min: $scope.minDate,
                    max: $scope.maxDate
                });
                $("#datepickerendMovie").kendoDatePicker({
                    format: "MM/dd/yyyy",
                    min: $scope.minDate,
                    max: $scope.maxDate
                });
                $("#datepickerstartAll").kendoDatePicker({
                    format: "MM/dd/yyyy",
                    min: $scope.minDate,
                    max: $scope.maxDate
                });
                $("#datepickerendAll2").kendoDatePicker({
                    format: "MM/dd/yyyy",
                    min: $scope.minDate,
                    max: $scope.maxDate
                });
            });
        }
        //on resize of window
        w.bind('resize', function() {
            $scope.screen_width = window.innerWidth;
            $scope.WindowResize();
        });

        function init() {

            $scope.spinner1 = true;
            $scope.WindowResize();
            //search term
            $scope.searchTerm = window.sessionStorage.getItem("SearchTerm"); 

            $scope.CategoryTerm = window.sessionStorage.getItem("CategoryTerm");

            $scope.category = $scope.CategoryTerm;
        
            $scope.$watch("searchTerm", function(newValue, oldValue) {
                if (newValue === "" && oldValue === "") {
                    return;
                }
                if ($scope.searchTerm === "") {

                    $('#overlayLoaderForCategory').show();
                    document.getElementById('overlayLoaderForCategory').removeAttribute("style");
                    $scope.searchTermClickFromResults();
                    if (newValue !== oldValue)
                        $('#searchTerm').focus();
                    return;

                }
            });

            $('#overlayLoader').hide();
            if ($scope.searchTerm === undefined || $scope.searchTerm === "") {
                $('#overlayLoaderForCategory').show();
                $scope.searchTerm = "";
                $scope.serviceURL = '*' + $scope.searchTerm + '*&wt=json&indent=true&rows=' + 7400

                AutocompleteService.getSelectedData($scope.serviceURL, 7400, function(dataResponse) {
                   var seriesList=[];
                    seriesList = dataResponse.response.docs;
                    $scope.CategoryAllData=seriesList
                    $scope.CategoryType($scope.category);
                     $scope.getDraftWatchlists1();
                });
            } else {
                $scope.CategoryType('all');
            }
        }


        $(".search-catalogue").hide();




        $("#searchTerm").autocomplete({
            source: function(request, response) {
                var query = request.term.trim();
                if (query === "") {
                    $('#overlayLoaderForCategory').show();
                    document.getElementById('overlayLoaderForCategory').removeAttribute("style");
                    $scope.searchTermClickFromResults();
                    $('#searchTerm').focus();

                    return;
                }

                query = query.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1");
                var query1 =query.replace(/ /g,"\\ ");
                var queryURL="X"+ query1  + "* OR *" + query1 + "* OR *"+query1+"*";
                $.ajax({
                    url: constants.URL_SOLR + '_AUTO/select?'+"&rows=10&fl=Name&df=Name&wt=json&indent=true&defType=edismax&qf=Name%5E100+Name_text%5E10&stopwords=true&lowercaseOperators=true",
                    data: {
                        q: queryURL
                    },
                    dataType: "jsonp",
                    jsonp: 'json.wrf',
                    success: function(data) {
                        response($.map(data.response.docs, function(item) {
                            return {
                                label: item.Name

                            };
                        }))


                    }

                });
            },
            minLength: 1,
            select: function(event, ui) {
                $scope.searchTerm = ui.item.value;
                $scope.searchTermClickForSelect();
            },
            open: function() {
                if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
                    $('.ui-autocomplete').off('menufocus hover mouseover mouseenter');
                }
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            this.term = this.term.replace(/\s\s+/g, ' ');
            var re = new RegExp(this.term.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1"), "gi");

            var t = item.label.replace(re, "<span style='font-weight:bold;color:blue;'>" + this.term + "</span>");
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append(t)
                .appendTo(ul);
        };
		//search term
        $scope.serchTerm = window.sessionStorage.getItem("SearchTerm"); 


        //Function that returns default show card image
        function getDefaultShowCardImage() {
            var defaultImagesArray = [imgpath + "/default-images/showcard_1.jpg",
                imgpath + "/default-images/showcard_2.jpg",
                imgpath + "/default-images/showcard_3.jpg",
                imgpath + "/default-images/showcard_4.jpg",
                imgpath + "/default-images/showcard_5.jpg",
                imgpath + "/default-images/showcard_6.jpg",
                imgpath + "/default-images/showcard_7.jpg",
                imgpath + "/default-images/showcard_8.jpg",
                imgpath + "/default-images/showcard_9.jpg",
                imgpath + "/default-images/showcard_10.jpg",
                imgpath + "/default-images/showcard_11.jpg",
                imgpath + "/default-images/showcard_12.jpg"
            ];

            return defaultImagesArray[Math.floor(Math.random() * defaultImagesArray.length)];
        }

        function displayResults() {
            $scope.MacthingResult1 = [];
            $scope.MacthingResult1 = $scope.totalResults;

            if (SearchResults !== "null" && SearchResults !== null && SearchResults !== undefined) {
                $('#ScriptedDiv').show();
                $scope.MacthingResult1 = $scope.totalResults;

            } else {
                $('#ScriptedDiv').hide();
            }
            $scope.getDraftWatchlists1();
        }


        //Show Hiding Advance filter based on Category
        $scope.advanceFilter = function(category, visible) {
            if (category === 'Factual') {
                if (visible === 'show') {
                    $scope.modeForFactual = false;

                }
                if (visible === 'hide') {
                    $scope.modeForFactual = true;
                    factualCount = 0;
                }
            }
            if (category === 'movies') {
                if (visible === 'show') {
                    $scope.modeForMovies = false;
                }
                if (visible === 'hide') {
                    $scope.modeForMovies = true;
                    movieCount = 0;

                }
            }
            if (category === 'all') {
                if (visible === 'show') {
                    $scope.modeForallCategory = false;
                }
                if (visible === 'hide') {
                    $scope.modeForallCategory = true;
                    AllListCount = 0;
                }
            }

            refreshSlider();

        }

        $scope.updateResultsForFactual = function() {

            var FactualList = [];
            $scope.programtype = "Factual";
            var newStartDate = '';
            var newEndDate = '';
            var newEndDateForService = '';
            var newStartDateForService = '';
			if(($scope.minRangeSliderForYear.minValue === "") && ($scope.minRangeSliderForYear.maxValue === "") && ($scope.QualitiesChecked1.QualitiesSelected1.length === 0) && ($scope.slider.minValue === 0) && ($scope.slider.maxValue ===1000)){
			$scope.CategoryBasedFunction('Factual');
			return;
			}

            if (($scope.minRangeSliderForYear.minValue === "") && ($scope.minRangeSliderForYear.maxValue !== "")) {
                $scope.errorStartDateForFactual = 'ae-error-fields';
                $scope.errorEndDateForFactual = '';
            } else if (($scope.minRangeSliderForYear.maxValue === "") && ($scope.minRangeSliderForYear.minValue !== "")) {
                $scope.errorStartDateForFactual = '';
                $scope.errorEndDateForFactual = 'ae-error-fields';
            } else if ($scope.minRangeSliderForYear.minValue !== '' && ($scope.minRangeSliderForYear.maxValue === '' || new Date($scope.minRangeSliderForYear.minValue) < new Date(minDateValue) || new Date($scope.minRangeSliderForYear.maxValue) > new Date(maxDateValue) || new Date($scope.minRangeSliderForYear.minValue) > new Date($scope.minRangeSliderForYear.maxValue))) {
                $scope.errorStartDateForFactual = 'ae-error-fields';
                $scope.errorEndDateForFactual = 'ae-error-fields';
            } else if ($scope.slider.minValue > 1000) {
                $scope.errorStartDateForFactual = '';
                $scope.errorEndDateForFactual = '';
                $scope.errorClassForSliderMin = 'ae-error-fields';
                $scope.errorClassForSliderMax = '';
            } else if ($scope.slider.maxValue > 1000) {
                $scope.errorStartDateForFactual = '';
                $scope.errorEndDateForFactual = '';
               
                $scope.errorClassForSliderMin = '';
                $scope.errorClassForSliderMax = 'ae-error-fields';

            } else if ($scope.slider.minValue > $scope.slider.maxValue) {
                $scope.errorClassForSliderMin = 'ae-error-fields';
                $scope.errorClassForSliderMax = 'ae-error-fields';
            } else {
                $scope.errorClassForSliderMin = '';
                $scope.errorClassForSliderMax = '';
                $scope.errorStartDateForFactual = '';
                $scope.errorEndDateForFactual = '';
                $scope.MacthingResult1 = [];
                $scope.MacthingResult = [];

                if ($scope.minRangeSliderForYear.minValue === "" && $scope.minRangeSliderForYear.maxValue === "") {

                    newStartDateForService = '*';

                    newEndDateForService = '*';
                } else {
                    newStartDate = $scope.minRangeSliderForYear.minValue.split('/');
                    if (newStartDate.length > 1) {
                        newStartDateForService = newStartDate[2] + '-' + newStartDate[0] + '-' + newStartDate[1] + 'T00:00:00Z';

                    }
                    newEndDate = $scope.minRangeSliderForYear.maxValue.split('/');
                    if (newEndDate.length > 1) {
                        newEndDateForService = newEndDate[2] + '-' + newEndDate[0] + '-' + newEndDate[1] + 'T00:00:00Z';

                    }
                }
                var qualities = "";
                if ($scope.QualitiesChecked1.QualitiesSelected1 && $scope.QualitiesChecked1.QualitiesSelected1.length > 0) {
                    qualities = "\"" + $scope.QualitiesChecked1.QualitiesSelected1.join("\",\"") + "\"";
                }
                //search term
                $scope.searchTextValForService = window.sessionStorage.getItem("SearchTerm"); 
                if ($scope.searchTextValForService === undefined || $scope.searchTextValForService === "") {
                    $scope.searchTextValForService = '*';
                }
                if ($scope.QualitiesChecked1.QualitiesSelected1.length === 0) {

                    qualities = '*';
                }
                $('#overlayLoaderForCategory').show();
                if ($scope.searchTextValForService !== '*') {
                var querySpaceReplacement =encodeURIComponent($scope.searchTextValForService.replace(/ /g,"\\ "));
                $scope.searchTextValForService = encodeURIComponent($scope.searchTextValForService.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1"));
                }
                AutocompleteService.updateFormats(querySpaceReplacement,$scope.searchTextValForService, 7400, $scope.slider.minValue, $scope.slider.maxValue, newStartDateForService, newEndDateForService, $scope.programtype, qualities, function(dataResponse) {

                    FactualList = dataResponse.response.docs;

                    $scope.currentPage = 1;
                    $scope.MacthingResult1 = FactualList;
                    $scope.MacthingResult = FactualList;
                    $scope.TotalRecords = 0;
                    $scope.TotalRecords = FactualList.length;
                    $scope.TotalPages = 0;
                    $scope.TotalPages = Math.ceil(($scope.TotalRecords) / ($scope.itemsPerPage));
                    $scope.numPages = $scope.TotalPages;
                    factualCount = 1;

                    $scope.myFunction();

                    $('#overlayLoaderForCategory').hide();
                });
            }

        }
        $scope.updateResultsForMovies = function() {

            var MovielList = [];

            var selectedGeners = '';
            $scope.programtype = "Movie";
				if(($scope.minRangeSliderForYearForMovies.minValue === "") && ($scope.minRangeSliderForYearForMovies.maxValue==="") && ($scope.QualitiesCheckedForMovies.QualitiesSelectedForMovies.length === 0) && ($scope.selectedIds.length === 0)){
			$scope.CategoryBasedFunction('Movie');
			return;
			}
            if (($scope.minRangeSliderForYearForMovies.minValue === "" || $scope.minRangeSliderForYearForMovies.minValue === "*") && ($scope.minRangeSliderForYearForMovies.maxValue !== "")) {
                $scope.errorStartDateForMovies = 'ae-error-fields';
                $scope.errorEndDateForMovies = '';
            } else if (($scope.minRangeSliderForYearForMovies.maxValue === "" || $scope.minRangeSliderForYearForMovies.maxValue === "*") && ($scope.minRangeSliderForYearForMovies.minValue !== "")) {
                $scope.errorStartDateForMovies = '';
                $scope.errorEndDateForMovies = 'ae-error-fields';
            } else if ($scope.minRangeSliderForYearForMovies.minValue !== '' && ($scope.minRangeSliderForYearForMovies.maxValue === '' || new Date($scope.minRangeSliderForYearForMovies.minValue) < new Date(minDateValue) || new Date($scope.minRangeSliderForYearForMovies.maxValue) > new Date(maxDateValue) || new Date($scope.minRangeSliderForYearForMovies.minValue) > new Date($scope.minRangeSliderForYearForMovies.maxValue))) {
                $scope.errorStartDateForMovies = 'ae-error-fields';
                $scope.errorEndDateForMovies = 'ae-error-fields';

            } else {
                $scope.MacthingResult1 = [];
                $scope.MacthingResult = [];
                $scope.errorStartDateForMovies = '';
                $scope.errorEndDateForMovies = '';
                var newStartDateForService = '';
                var newEndDateForService = '';

                if ($scope.minRangeSliderForYearForMovies.minValue === "" && $scope.minRangeSliderForYearForMovies.maxValue === "") {
                    newStartDateForService = '*';
                    newEndDateForService = '*';
                } else {
                    var newStartDate = $scope.minRangeSliderForYearForMovies.minValue.split('/');
                    if (newStartDate.length > 1) {
                        newStartDateForService = newStartDate[2] + '-' + newStartDate[0] + '-' + newStartDate[1] + 'T00:00:00Z';

                    }
                    var newEndDate = $scope.minRangeSliderForYearForMovies.maxValue.split('/');
                    if (newEndDate.length > 1) {
                        newEndDateForService = newEndDate[2] + '-' + newEndDate[0] + '-' + newEndDate[1] + 'T00:00:00Z';

                    }
                }

                var qualities = "";
                if ($scope.QualitiesCheckedForMovies.QualitiesSelectedForMovies && $scope.QualitiesCheckedForMovies.QualitiesSelectedForMovies.length > 0) {
                    qualities = "\"" + $scope.QualitiesCheckedForMovies.QualitiesSelectedForMovies.join("\",\"") + "\"";
                }


                if ($scope.selectedIds.length === 0) {
                    selectedGeners = "*";
                } else {
                    selectedGeners = "\"" + $scope.selectedIds.join("\",\"") + "\"";
                }
                $scope.searchTextValForService = window.sessionStorage.getItem("SearchTerm"); //search term
                if ($scope.searchTextValForService === undefined || $scope.searchTextValForService === "") {
                    $scope.searchTextValForService = '*';
                }
                if ($scope.QualitiesCheckedForMovies.QualitiesSelectedForMovies.length === 0) {
                    qualities = '*';
                }
                $('#overlayLoaderForCategory').show();
				if ($scope.searchTextValForService !== '*') {
                var querySpaceReplacement =encodeURIComponent($scope.searchTextValForService.replace(/ /g,"\\ "));
                $scope.searchTextValForService = encodeURIComponent($scope.searchTextValForService.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1"));
				}
                AutocompleteService.updateMovies(querySpaceReplacement,$scope.searchTextValForService, 7400, newStartDateForService, newEndDateForService, $scope.programtype, qualities, selectedGeners, function(dataResponse) {
                    MovielList = dataResponse.response.docs;



                    $scope.currentPage = 1;
                    $scope.MacthingResult1 = MovielList;
                    $scope.MacthingResult = MovielList;
                    $scope.TotalRecords = 0;
                    $scope.TotalRecords = MovielList.length;
                    $scope.TotalPages = 0;
                    $scope.TotalPages = Math.ceil(($scope.TotalRecords) / ($scope.itemsPerPage));
                    $scope.numPages = $scope.TotalPages;
                    movieCount = 1;



                    $scope.myFunction();
                    $('#overlayLoaderForCategory').hide();
                })

            }
        }

        $scope.updateResultsForAll = function() {
            var AllList = [];

			if(($scope.minValueForAll === "") && ($scope.maxValueForAll==="") && ($scope.QualitiesCheckedForAll.QualitiesSelected.length  === 0)){
						$scope.CategoryBasedFunction(0);
						return;
						}
            if (($scope.minValueForAll === "") && ($scope.maxValueForAll !== "")) {
                $scope.errorStartDateForAll = 'ae-error-fields';
                $scope.errorEndDateForAll = '';
            } else if (($scope.maxValueForAll === "" || $scope.maxValueForAll === "*") && ($scope.minValueForAll !== "")) {
                $scope.errorStartDateForAll = '';
                $scope.errorEndDateForAll = 'ae-error-fields';
            } else if ($scope.minValueForAll !== '' && ($scope.maxValueForAll === '' || new Date($scope.minValueForAll) < new Date(minDateValue) || new Date($scope.maxValueForAll) > new Date(maxDateValue) || new Date($scope.minValueForAll) > new Date($scope.maxValueForAll))) {
                $scope.errorStartDateForAll = 'ae-error-fields';
                $scope.errorEndDateForAll = 'ae-error-fields';
            } else {
                $scope.MacthingResult1 = [];
                $scope.MacthingResult = [];
                $scope.errorStartDateForAll = '';
                $scope.errorEndDateForAll = '';
                var newStartDateForService = '';
                var newEndDateForService = '';
                if ($scope.minValueForAll === "" && $scope.maxValueForAll === "") {
                    newStartDateForService = '*';
                    newEndDateForService = '*';
                } else {
                    var newStartDate = [];
                    var newEndDate = [];
                    if ($scope.minValueForAll !== undefined && $scope.minValueForAll !== '') {
                        newStartDate = $scope.minValueForAll.split('/');
                        if (newStartDate.length > 1) {
                            newStartDateForService = newStartDate[2] + '-' + newStartDate[0] + '-' + newStartDate[1] + 'T00:00:00Z';

                        }
                    }

                    if ($scope.maxValueForAll !== undefined && $scope.maxValueForAll !== '') {
                        newEndDate = $scope.maxValueForAll.split('/');
                        if (newEndDate.length > 1) {
                            newEndDateForService = newEndDate[2] + '-' + newEndDate[0] + '-' + newEndDate[1] + 'T00:00:00Z';

                        }
                    }
                }



                var qualities = "";
                if ($scope.QualitiesCheckedForAll.QualitiesSelected && $scope.QualitiesCheckedForAll.QualitiesSelected.length > 0) {
                    qualities = "\"" + $scope.QualitiesCheckedForAll.QualitiesSelected.join("\",\"") + "\"";
                }
				//search term
                $scope.searchTextValForService = window.sessionStorage.getItem("SearchTerm"); 
                if ($scope.searchTextValForService === undefined || $scope.searchTextValForService === "") {
                    $scope.searchTextValForService = '';
                }
                if ($scope.QualitiesCheckedForAll.QualitiesSelected.length === 0) {
                    qualities = '*';
                }
                $('#overlayLoaderForCategory').show();
                 var querySpaceReplacement =encodeURIComponent($scope.searchTextValForService.replace(/ /g,"\\ "));
                $scope.searchTextValForService = encodeURIComponent($scope.searchTextValForService.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1"));
                AutocompleteService.updateAll(querySpaceReplacement,$scope.searchTextValForService, 7400, newStartDateForService, newEndDateForService, qualities, function(dataResponse) {
                    AllList = dataResponse.response.docs;


                    $scope.currentPage = 1;
                    $scope.MacthingResult1 = AllList;
                    $scope.MacthingResult = AllList;
                    $scope.TotalRecords = 0;
                    $scope.TotalRecords = AllList.length;
                    $scope.TotalPages = 0;
                    $scope.TotalPages = Math.ceil(($scope.TotalRecords) / ($scope.itemsPerPage));
                    $scope.numPages = $scope.TotalPages;
                    AllListCount = 1;


                    $scope.myFunction();

                    $('#overlayLoaderForCategory').hide();

                })
            }
        }
        $scope.ClearSelections = function(type) {

            if (type === 'Factual') {
                $scope.slider.minValue = 0;
                $scope.slider.maxValue = 1000;
                //calender
                $scope.minRangeSliderForYear.minValue = "";
                $scope.minRangeSliderForYear.maxValue = "";
                //asset quality
                $scope.errorStartDateForFactual = '';
                $scope.errorEndDateForFactual = '';
                $scope.QualitiesChecked1.QualitiesSelected1 = [];
                $scope.errorClassForSliderMin = '';
                $scope.errorClassForSliderMax = '';
               
            }
            if (type === 'Movies') {
                //calender
                $scope.minRangeSliderForYearForMovies.minValue = "";
                $scope.minRangeSliderForYearForMovies.maxValue = "";

                $scope.QualitiesCheckedForMovies.QualitiesSelectedForMovies = [];
                $scope.errorStartDateForMovies = '';
                $scope.errorEndDateForMovies = '';

                $scope.selectedIds = [];
            }
            if (type === 'all') {

                $scope.minValueForAll = "";
                $scope.maxValueForAll = "";

                $scope.QualitiesCheckedForAll.QualitiesSelected = [];
                $scope.errorStartDateForAll = '';
                $scope.errorEndDateForAll = '';

            }


        }

        $scope.GetDetailsPage = function(details) {
            if (details.ItemName === "Piece") {
				// for detail pages 
                details.ItemName = "Episodes"; 
            }
            if (details.ProgramType === "Scripted") {
                window.location.href = url + "/scripted-details/" + details.PPLID + "/?" + details.ItemName;
            }
            if (details.ProgramType === "Movie") {

                window.location.href = url + "/movie-detail/" + details.PPLID + "/";
            }
            if (details.ProgramType === "Factual") {
                window.location.href = url + "/factual-detail/" + details.PPLID + "/?" + details.ItemName;
            }
            if (details.ProgramType === "Format") {
                window.location.href = url + "/formats-details/" + details.PPLID + "/";

            }

        }
  $scope.$watch("slider.minValue", function(newValue) {

	if(newValue > 1000 || newValue < 0){
		$scope.slider.minValue=newValue.slice(0, -1);
	}

});
  $scope.$watch("slider.maxValue", function(newValue) {
	
	
	if(newValue > 1000 || newValue < 0){
		$scope.slider.maxValue=newValue.slice(0, -1);
	}

});


        function refreshSlider() {
            $timeout(function() {
                $scope.$broadcast('rzSliderForceRender');
            });
        }

        init();

    }
]);
myApp.directive('allowPattern', [allowPatternDirective]);
                                   
function allowPatternDirective() {
    return {
        restrict: "A",
        compile: function(tElement, tAttrs) {
            return function(scope, element, attrs) {
        // I handle key events
                element.bind("keypress", function(event) {
				// I safely get the keyCode pressed from the event.
                    var keyCode = event.which || event.keyCode; 
					// I determine the char from the keyCode.
                    var keyCodeChar = String.fromCharCode(keyCode); 
          
          // If the keyCode char does not match the allowed Regex Pattern, then don't allow the input into the field.
                    if (!keyCodeChar.match(new RegExp(attrs.allowPattern, "i"))) {
            event.preventDefault();
                        return false;
                    }
          
                });
            };
        }
    };
}