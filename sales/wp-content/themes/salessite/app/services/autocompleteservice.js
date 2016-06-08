myApp.service('AutocompleteService',
['$http',
 function ($http) {
   
      this.getSelectedData = function (query,length,callbackFunc) {
        $http({
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            method: 'GET', contentType: false,
            crossDomain: true,
            processData: false,
            url: constants.URL_SOLR+'/select?q='+query
				
        }).success(function (data) {
            // With the data succesfully returned, call our callback
            callbackFunc(data);
        }).error(function () {
           
        });
    }
	//update
	 this.updateFormats = function (querySpaceReplacement,query,length,pieceStart,pieceEnd,yearStart,yearEnd,programtype,qualities,callbackFunc) {
        $http({
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            method: 'GET', contentType: false,
            crossDomain: true,
            processData: false,
            url:constants.URL_SOLR+'/select?q=X'+querySpaceReplacement+'* OR *'+querySpaceReplacement+"* OR \""+query+'\" '+query+"*"+'&fq=AssetQuality%3A('+qualities+')&fq=PieceCount%3A%5B'+pieceStart+'+TO+'+pieceEnd+'%5D&fq=ReleasedDate%3A%5B%20'+yearStart+'+TO+'+yearEnd+'%5D&fq=ProgramType%3A'+programtype+"&rows="+7500+"&df=Name_k&wt=json&indent=true&defType=edismax&qf=Name_k%5E100+Name%5E10+SeriesName_k%5E100+SeriesName&stopwords=true&lowercaseOperators=true"

				
        }).success(function (data) {
            // With the data succesfully returned, call our callback  %3A%5B1  %5D
            callbackFunc(data);
        }).error(function () {
           
        });
    }
	//update movies
	this.updateMovies = function (querySpaceReplacement,query,length,yearStart,yearEnd,programtype,qualities,selectedGeners,callbackFunc) {
        var URL_SUFFIX;
       if(selectedGeners!=='*'){
            URL_SUFFIX='&fq=GenreID%3A("'+selectedGeners+'")'
        }
        $http({
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            method: 'GET', contentType: false,
            crossDomain: true,
            processData: false,
            url:constants.URL_SOLR+'/select?q=X'+querySpaceReplacement+'* OR *'+querySpaceReplacement+"* OR \""+query+'\" '+query+"*"+'&fq=AssetQuality%3A('+qualities+')&fq=ReleasedDate%3A%5B%20'+yearStart+'+TO+'+yearEnd+'%5D'+'&fq=ProgramType%3A'+programtype+"&rows="+7500+"&df=Name_k&wt=json&indent=true&defType=edismax&qf=Name_k%5E100+Name%5E10+SeriesName_k%5E100+SeriesName&stopwords=true&lowercaseOperators=true"+URL_SUFFIX
				
        }).success(function (data) {
            // With the data succesfully returned, call our callback  %3A%5B1  %5D
            callbackFunc(data);
        }).error(function () {
           
        });
    }
	//For All
	this.updateAll = function (querySpaceReplacement,query,length,yearStart,yearEnd,qualities,callbackFunc) {
        $http({
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            method: 'GET', contentType: false,
            crossDomain: true,
            processData: false,
            url:constants.URL_SOLR+'/select?q=X'+querySpaceReplacement+'* OR *'+querySpaceReplacement+"* OR \""+query+'\" '+query+"*"+'&fq=AssetQuality%3A('+qualities+')&fq=ReleasedDate%3A%5B%20'+yearStart+'+TO+'+yearEnd+'%5D'+"&rows="+7500+"&df=Name_k&wt=json&indent=true&defType=edismax&qf=Name_k%5E100+Name%5E10+SeriesName_k%5E100+SeriesName&stopwords=true&lowercaseOperators=true"
				
        }).success(function (data) {
            // With the data succesfully returned, call our callback  %3A%5B1  %5D
            callbackFunc(data);
        }).error(function () {
           
        });
    }
	
}]);


