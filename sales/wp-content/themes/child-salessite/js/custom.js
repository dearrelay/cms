// JavaScript Document

$(document).ready(function () {
    function showImageDetails(thisVar) {
		
        
        var src = thisVar.children('img').attr('src');        
        $('.destination').children('img').attr('src', src);
    }
	  function videoDetails(thisVar) {	        
        var src = thisVar.children('img').attr('src');  

        $('.destination').children('img').attr('src', src);
		var title=thisVar.children('img').attr('db-title');
		$('#video_title').html(title);
			var title=thisVar.children('img').attr('db-desc');
		$('#video_desc').html(title);
		var x = thisVar.attr("vid-url");
	
	$('#play-button').attr('src',x);
	
    }
    
   $('#clearMessage').on('click', function () {
     $('#ms-video-alert').hide();
	 $('.video-password').val("");
     
    });
	$('.clearMessage1').on('click', function () {
     $('#ms-video-alert').hide();
	 $('.video-password').val("");
     
    });

    $('.source-img').on('click', function () {
        showImageDetails($(this));
     
    });
	$(' .showframe').on('click',function(){
			videoDetails($(this));			
	});
	
	
function showUrlDetails(thisVar) {
$(this).css('color','#fff');
var src = thisVar.attr('src-url');
 setTimeout(function(){         
$(location).attr('href', src);
}, 250);
$(this).css('color','#fff');
}
$('.mobileFocus').click(function(event){
showUrlDetails($(this));                                                

});
	$('.playbtn-thumb').click(function () {

 $('.videoplayer-image').hide();
  $('.video-home').show();
	
});
$('.destination-mobile').on('click', function () {
	 if(($('#videomodal').length) == 0){
	 if (screen.width <= 767){
	 var y =$(this).children('#mobile-iframe').attr("src");
	var x= y + "?autoPlay=true";
	$(this).children('#mobile-iframe').attr('src',x);
	  $('iframe').hide();
	  $('.showframe').show();
	$(this).children('.showframe').hide();
	  $(this).children('iframe').show();
	 }
	 else{
	 var y = $('#play-button').attr("src");
	var x= y + "?autoPlay=true";
	$('#play-button').attr('src',x);
	 }
	 }
	 
 var id = $(this).attr("id");
 document.getElementById("mobile-playframe").innerHTML = id;
	
});
    $('#submit-password').click(function () {
    var vpass=$('#vauth').attr("vid-auth");
	var val1=vpass.slice(3);
	var val2=val1.split('').reverse().join('');
	var val=val2.slice(3);
	
	var videoPasswordVal = $('.video-password').val();	
	var x=document.getElementById("mobile-playframe").innerHTML;
	
	if (videoPasswordVal === val) {
if (screen.width <= 767){
var y1 = $('#mobile-iframe').attr("src");
	var x1= y1 + "?autoPlay=true";
	$('#mobile-iframe').attr('src',x1);
	
	$("#" + x + " " + ".showframe").hide();
	$("#" + x + " " + "iframe").show();
	$("#videomodal").remove();
	$(".modal-backdrop").remove();
	}
	else{
	$('#password-close').click(); 
	$(".destination img").hide();

	var y = $('#play-button').attr("src");
	var x= y + "?autoPlay=true";
	$('#play-button').attr('src',x);
	$('#play-button').show();
	$('#play-button').click();
	$('.video-hide').hide();
	$("#videomodal").remove();
	$(".modal-backdrop").remove();
		}
	
	}
	else{
	    
		$('#ms-video-alert').show();
	}

	    
    });	
	 $(".video-password").keypress(function(e) {
    if(e.which == 13) {
       $("#submit-password").click();
   
    }
}); 
	
	  
	  $(".nav-toggle").click(function () {
        $(".nav-toggle").toggleClass("active");
    });
   
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
	
 if (($('.image-descriptionbox').length)==0) {

$(".image-description").css('width','100%');
$(".image-description").css('height','600px');
}
	   if (($('.image-description').length)==0) {
	   
$(".image-descriptionbox").css('width','100%');
}


  });
  




