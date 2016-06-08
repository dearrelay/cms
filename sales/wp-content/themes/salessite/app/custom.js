// JavaScript Document
$(document).ready(function () {

 $(window).trigger('resize');
  $(document).on("click", ".xs-myac", function() {
  $('.mainmenu').animate({
        scrollTop: $("#scrollbottom-menu").offset().top
    }, 2000);
});
$('#Searchtags').click(function(){
   $(".logo").addClass("logo-index");
}); 
$('.content.content-mobile,.navbar-header,footer').click(function(){
   $(".logo").removeClass("logo-index");
}); 

function showUrlDetails(thisVar) {
$(this).css('color','#fff');
var src = thisVar.attr('src-url');
 setTimeout(function(){         
$(location).attr('href', src);
}, 250);
$(this).css('color','#fff');
}
var doc = document.documentElement;
doc.setAttribute('data-useragent', navigator.userAgent);
$('.mobileFocus').click(function(event){
showUrlDetails($(this));                                                

});

var brMsg="This site is best viewed using the latest versions of Internet Explorer (v. 10+), Chrome (v. 47+), Safari (v. 9+) and Firefox (v. 38+) ";

var objappVersion = navigator.appVersion;

 var objAgent = navigator.userAgent; 

 var objbrowserName = navigator.appName;
 var objfullVersion = ''+parseFloat(navigator.appVersion);
 var objBrMajorVersion = parseInt(navigator.appVersion,10); 

 var objOffsetVersion,ix; 
 
     
 // In Chrome
 if ((objOffsetVersion=objAgent.indexOf("Chrome"))!==-1) 
 { 
 objbrowserName = "Chrome"; 
 objfullVersion = objAgent.substring(objOffsetVersion+7); 
 if ((ix=objfullVersion.indexOf(";"))!==-1)
 objfullVersion=objfullVersion.substring(0,ix);
 if ((ix=objfullVersion.indexOf(" "))!==-1) 
 objfullVersion=objfullVersion.substring(0,ix);
 objBrMajorVersion = parseInt(''+objfullVersion,10); 
 if (isNaN(objBrMajorVersion)) 
 { 
 objfullVersion = ''+parseFloat(navigator.appVersion); 
 objBrMajorVersion = parseInt(navigator.appVersion,10); 
 }
if(objBrMajorVersion<47){
 document.getElementById("browseMessage").style.display = "block";
document.getElementById("browseMessage").innerHTML = brMsg;
}  
 } 
 // In Microsoft internet explorer 

 else if ((objOffsetVersion=objAgent.indexOf("MSIE"))!==-1) 
 { 

 objbrowserName = "Microsoft Internet Explorer"; 
 objfullVersion = objAgent.substring(objOffsetVersion+5);
 if ((ix=objfullVersion.indexOf(";"))!==-1)
 objfullVersion=objfullVersion.substring(0,ix);
 if ((ix=objfullVersion.indexOf(" "))!=-1) 
 objfullVersion=objfullVersion.substring(0,ix);
 objBrMajorVersion = parseInt(''+objfullVersion,10); 
 if (isNaN(objBrMajorVersion)) 
 { 
 objfullVersion = ''+parseFloat(navigator.appVersion); 
 objBrMajorVersion = parseInt(navigator.appVersion,10); 
 } 
 if(objBrMajorVersion<10){
 document.getElementById("browseMessage").style.display = "block";
document.getElementById("browseMessage").innerHTML = brMsg;
} 
 } 
 // In Firefox 
else if ((objOffsetVersion=objAgent.indexOf("Firefox"))!==-1) {
 objbrowserName = "Firefox"; 
 objfullVersion = objAgent.substring(objOffsetVersion+8);
 if ((ix=objfullVersion.indexOf(";"))!=-1)
 objfullVersion=objfullVersion.substring(0,ix);
 if ((ix=objfullVersion.indexOf(" "))!=-1) 
 objfullVersion=objfullVersion.substring(0,ix);
 objBrMajorVersion = parseInt(''+objfullVersion,10); 
 if (isNaN(objBrMajorVersion)) 
 { 
 objfullVersion = ''+parseFloat(navigator.appVersion); 
 objBrMajorVersion = parseInt(navigator.appVersion,10); 
 }
 if(objBrMajorVersion<38){
  document.getElementById("browseMessage").style.display = "block";
document.getElementById("browseMessage").innerHTML = brMsg;
} 
 } 
 // In Safari
 else if ((objOffsetVersion=objAgent.indexOf("Safari"))!==-1) 
 { objbrowserName = "Safari"; objfullVersion = objAgent.substring(objOffsetVersion+7);
 if ((objOffsetVersion=objAgent.indexOf("Version"))!=-1) 
 objfullVersion = objAgent.substring(objOffsetVersion+8); 
 if ((ix=objfullVersion.indexOf(";"))!==-1)
 objfullVersion=objfullVersion.substring(0,ix);
 if ((ix=objfullVersion.indexOf(" "))!==-1) 
 objfullVersion=objfullVersion.substring(0,ix);
 objBrMajorVersion = parseInt(''+objfullVersion,10); 
 if (isNaN(objBrMajorVersion)) 
 { 
 objfullVersion = ''+parseFloat(navigator.appVersion); 
 objBrMajorVersion = parseInt(navigator.appVersion,10); 
 }
if(objBrMajorVersion<9){
 document.getElementById("browseMessage").style.display = "block";
document.getElementById("browseMessage").innerHTML = brMsg;
}  
 }



window.onorientationchange = function() {
    location.reload() 
};
    
$('.img-overlay').click(function(){
   $('#episode-detail').toggle(); 
});    
    
$(document).keyup(function (event){
   if(event.which === 27) {
       $('#myModal').modal('hide');
       $('#videoPlayerModalId').append("");
   } 
});

$(".img-info").on({
    mouseover: function() {
        $(this).children(".watchList-hover").show();
		
	},

    mouseout: function() {
        $(".watchList-hover").hide();
    }
});
    $('[data-toggle="popover"]').popover(
        {
            html:true,
            content: function(){
                return $('#popoverSignInId').html();
            }});
    $(".nav-toggle").click(function () {
        $(".nav-toggle").toggleClass("active");
    });
    

    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
    }

    function alignModal() {
        var modalDialog = $(this).find(".modal-dialog");

        // Applying the top margin on modal dialog to align it vertically center
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }
    // Align modal when it is displayed
    $(".modal").on("shown.bs.modal", alignModal);

    // Align modal when user resize the window
    $(window).on("resize", function () {
        $(".modal:visible").each(alignModal);
    });


    $('#more').click(function () {
        if ($('#more').children().hasClass('down-arrow-img')) {
            $('#more').html('Close advanced filters <img class="up-arrow-img" src="images/up_arrow.png" />');
        }
        else {
            $('#more').html('Show advanced filters  <img class="down-arrow-img" src="images/down_arrow.png" /> ');
        }
    });
    $('#Button1').click(function () {
        if ($('#Button1').children().hasClass('down-arrow-img')) {
            $('#Button1').html('Close advanced filters <img class="up-arrow-img" src="images/up_arrow.png" />');
        }
        else {
            $('#Button1').html('Show advanced filters  <img class="down-arrow-img" src="images/down_arrow.png" /> ');
        }
    });
   
        $("#slider1").slider({ min: 0, max: 10, value: [0, 10], focus: true });
        $("#slider2").slider({ min: 0, max: 10, value: [0, 10], focus: true });
        $("#slider3").slider({ min: 0, max: 10, value: [0, 10], focus: true });
        $("#slider4").slider({ min: 0, max: 10, value: [0, 10], focus: true });
        $("#slider5").slider({ min: 0, max: 10, value: [0, 10], focus: true });
        $("#slider6").slider({ min: 0, max: 10, value: [0, 10], focus: true });
		
		//Script for watchlist checkboxes
		var  watchDiv =  $('.watchlists-checkbox').length;;
		if ( watchDiv > 5 ){
                   $('.watchlists-checkbox-block').css('padding-right','15px');
                }
				
				
	//Code for Search Catalogue
	
	$("#Searchtags").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			$("form").submit();
		}
	});
		
	$('#Searchtags').on('click', function() {	
		$(".search-transparent").css("display", "block");
	});
	$('.search-catlog-tabicon').on('click', function () {
	        $(".topmenu").hide();
            $("#tags15").show();
			$(".search-tabtransparent").show();
			$(".back-btn").hide();
        });
		
		 $('.content.content-mobile,.navbar-header,footer').click(function(){
              $("#tags15").hide();
			  $(".topmenu").show();
			  $(".back-btn").show();
			  $(".search-tabtransparent").hide();
         });

}); 
$(window).on('resize',function() {

 var windowwidth = $(window).width();
if(windowwidth > 1600)
		 {
		 
		 var x=windowwidth - 1600;
		 var rightadd = ((x/2)+65) + 'px';

		 $(".autocomp-stylegreater").css('right', rightadd);
		
		 }

}); 





   




