myApp.controller('SearchController', ['$scope',
function ($scope) {
     
    //Searching and autoComplete
    $scope.searchText = "";

    $scope.availableTags = [];
  $scope.autocompleteList = [];
  $scope.screen_width = window.innerWidth;

$("#Searchtags").autocomplete({
		 source: function( request, response ) {
		 var query=request.term.trim();
		 if(query===""){
				return;
		}
		query = query.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1");
        var query1 =query.replace(/ /g,"\\ ");
                var queryURL="X"+ query1  + "* OR *" + query1 + "* OR *"+query1+"*"
            $.ajax({
            url:constants.URL_SOLR + '_AUTO/select?'+"&rows=10&fl=Name&df=Name&wt=json&indent=true&defType=edismax&qf=Name%5E100+Name_text%5E10&stopwords=true&lowercaseOperators=true",
            data: { 
                fl: "Name",
                wt: 'json',
				indent:'true',
				q:queryURL
             }, 
             dataType: "jsonp",
             jsonp: 'json.wrf',
             success: function( data ) {
				response($.map(data.response.docs, function( item ) { 
					return { 
                        label:item.Name
                    }; 
            }))
			
				 
            }
			
          }); 
         },
        minLength: 1,
		select: function(event, ui) {
				$('#Searchtags').val(ui.item.value);
				$scope.searchClick();
		},open: function () {
					if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
					    $('.ui-autocomplete').off('menufocus hover mouseover mouseenter');
            }
        },
		create: function() {
        $(this).data('ui-autocomplete')._renderItem = function( ul, item) {
			  this.term=this.term.replace(/\s\s+/g, ' ');
              var re = new RegExp(this.term.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1"), "gi") ;
              var t = item.label.replace(re,"<span style='font-weight:bold;color:blue;'>" + this.term + "</span>");
              return $( "<li></li>" )
                  .data( "item.autocomplete", item )
                  .append(t)
                  .appendTo( ul );
          };
    }
        })
  //Desktop
  $("#tagsDesktop").autocomplete({
		 source: function( request, response ) {
		 var query=request.term.trim();
		 if(query===""){
				return;
		}
		query = query.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1");
        var query1 =query.replace(/ /g,"\\ ");
                var queryURL="X"+ query1  + "* OR *" + query1 + "* OR *"+query1+"*"
            $.ajax({
            url:constants.URL_SOLR + '_AUTO/select?'+"&rows=10&fl=Name&df=Name&wt=json&indent=true&defType=edismax&qf=Name%5E100+Name_text%5E10&stopwords=true&lowercaseOperators=true",
            data: { 
                fl: "Name",
                wt: 'json',
				indent:'true',
				q:queryURL
             }, 
             dataType: "jsonp",
             jsonp: 'json.wrf',
             success: function( data ) {
				response($.map(data.response.docs, function( item ) { 
					return { 
                        label:item.Name
                    }; 
            }))
			
				 
            }
			
          }); 
         },
        minLength: 1,
		select: function(event, ui) {
				$('#tagsDesktop').val(ui.item.value);
				$scope.searchClick();
		},open: function () {
					if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
					    $('.ui-autocomplete').off('menufocus hover mouseover mouseenter');
            }
        },
		create: function() {
        $(this).data('ui-autocomplete')._renderItem = function( ul, item) {
			  this.term=this.term.replace(/\s\s+/g, ' ');
              var re = new RegExp(this.term.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1"), "gi") ;
              var t = item.label.replace(re,"<span style='font-weight:bold;color:blue;'>" + this.term + "</span>");
              return $( "<li></li>" )
                  .data( "item.autocomplete", item )
                  .append(t)
                  .appendTo( ul );
          };
    }
        })

    $("#tags15").autocomplete({
        source: function( request, response ) {
		var query=request.term.trim();
		if(query===""){
				return;
		}
		query = query.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1");
            var query1 =query.replace(/ /g,"\\ ");
                var queryURL="X"+ query1  + "* OR *" + query1 + "* OR *"+query1+"*";
            $.ajax({
            url: constants.URL_SOLR + '_AUTO/select?'+"&rows=10&fl=Name&df=Name&wt=json&indent=true&defType=edismax&qf=Name%5E100+Name_text%5E10&stopwords=true&lowercaseOperators=true",
            data: { 
                q:queryURL
             }, 
             dataType: "jsonp",
             jsonp: 'json.wrf',
             success: function( data ) {
				response($.map(data.response.docs, function( item ) { 
					return { 
                        label:item.Name
                    }; 
            }))
			
				 
            }
			
          }); 
         },
        minLength: 1,
		select: function(event, ui) {
				$('#tags15').val(ui.item.value);
				$scope.searchClick();
		},open: function (result) {
					if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
					    $('.ui-autocomplete').off('menufocus hover mouseover mouseenter');
            }
        }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item) {
		      this.term=this.term.replace(/\s\s+/g, ' ');
              var re = new RegExp(this.term.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1"), "gi") ;
              var t = item.label.replace(re,"<span style='font-weight:bold;color:blue;'>" + this.term + "</span>");
              return $( "<li></li>" )
                  .data( "item.autocomplete", item )
                  .append(t)
                  .appendTo( ul );
          };
		
		  var windowwidth = $(window).width();
if(windowwidth > 1600)
		 {
		 $(".ui-autocomplete").addClass("autocomp-stylegreater");
		 }
		 else{
		  $(".ui-autocomplete").addClass("autocomp-style");
		 }
 
        $scope.searchClick = function () {
			if($scope.screen_width < 768){
				//for Mobile
				$scope.searchTextVal = $('#Searchtags').val().trim(); 					
				var searchTextValForService = $('#Searchtags').val();
			}
			if(($scope.screen_width > 767) && ($scope.screen_width < 992)){
			//tab
				$scope.searchTextVal= $('#tags15').val().trim(); 					
				var searchTextValForService=$('#tags15').val().trim();
			}
			if($scope.screen_width > 991){
			//Desktop
				$scope.searchTextVal= $('#tagsDesktop').val().trim(); 					
				var searchTextValForService=$('#tagsDesktop').val().trim();
			}
	
				searchTextValForService = encodeURIComponent(searchTextValForService);
			searchTextValForService=searchTextValForService.replace(/([:!@#$%^*()+=\[\]\\';,./{}|":<>?~_-])/g, "\\$1");
		    
			if(searchTextValForService!==""){
				$scope.serviceURL='\"'+searchTextValForService+'\"'+' OR '+'*'+searchTextValForService+'*&wt=json&indent=true&rows='+7400
			}
		if(searchTextValForService===""){
				$scope.serviceURL='*'+searchTextValForService+'*&wt=json&indent=true&rows='+7400
			}
          
				window.sessionStorage.setItem("CategoryTerm", 'all');
				window.sessionStorage.setItem("redirection", 'catalogue');
			    window.sessionStorage.setItem("SearchTerm", $scope.searchTextVal);//search term
				window.location.href=url + "/searchresults/";
        
			
        }
   

}]);