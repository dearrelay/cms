
            <!--./footer start-->
            <div class="container-lg">
                <footer>

                    <div class="footer-bg">
                        <picture>
            <source srcset="<?php the_field('footer_desktop'); ?>" media="(min-width:992px)">
             <source srcset="<?php the_field('footer_tablet'); ?>" media="(min-width:768px)">
            <img srcset="<?php the_field('footer_mobile'); ?>" alt="mobile image"> 
             </picture>
                    </div>
                    <div class="footer-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                                    <div class="footerlist-items list-unstyled">
                                        <span><a href="http://www.aenetworks.com/terms" target="_blank">Terms of Service</a></span>
                                        <span class="separator">|</span>
                                        <span><a href="http://www.aenetworks.com/privacy" target="_blank">Privacy Policy</a></span>

                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 copyright-info text-center">
                                    A&E Television Networks  &copy 1996-2016.<br class="visible-xs hidden-sm hidden-md hidden-lg" />
                                    All rights reserved.
                                </div>
                                <div class="col-md-3 col-sm-12 col-xs-12 email-link text-right">
                                    <a href="mailto:intl.sales@aenetworks.com">intl.sales@aenetworks.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!--./footer end-->
        </div>
    </div>
   
    <script>

         var swiperepisode = new Swiper('.swiper-episode', {
            resizeReInit: true,
            observer: true,
            observeParents: true,
            slidesPerView: 4,
            spaceBetween: 15,
            centeredSlides: true,
            initialSlide: 1,
            paginationClickable: true,
            pagination: '#swiper-episode-pagination',
            nextButton: '.swiper-button-next-episode',
            prevButton: '.swiper-button-prev-episode',
				onSlideChangeStart: function (swiper) {
                    $(' .swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
                    
                        $(' .swiper-slide-prev').prev().css("opacity", "0.3");
                        $(' .swiper-slide-next').next().css("opacity", "0.3"); 
						
                   
                },
            breakpoints: {
                1920: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                    initialSlide: 1,
                    slidesPerColumn: 1,
                    centeredSlides: true,
                    slidesOffsetBefore: 0
					
                },
                991: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                    initialSlide: 0,
                    slidesPerColumn: 1,
                    centeredSlides: false,
                    slidesOffsetBefore: 30,
                    slidesOffsetAfter: 30
                },
                767: {
                     slidesPerView: 1,
                    spaceBetween: 10,
                    initialSlide: 0,
                    slidesPerColumn: 1,
                    centeredSlides: false,
                    slidesOffsetBefore: 0,
                    slidesOffsetAfter: 0
                }
            }
        });
        
        var swipergallery = new Swiper('.swiper-gallery', {
            resizeReInit: true,
            observer: true,
            observeParents: true,
            slidesPerView: 4,
            spaceBetween: 15,
            centeredSlides: true,
            initialSlide: 1,
            paginationClickable: true,
            pagination: '#swiper-gallery-pagination',
            nextButton: '.swiper-button-next-gallery',
            prevButton: '.swiper-button-prev-gallery',
				onSlideChangeStart: function (swiper) {
                    $(' .swiper-slide-prev,.swiper-slide-next,.swiper-slide-active').css("opacity", "1");
                    
                        $(' .swiper-slide-prev').prev().css("opacity", "0.3");
                        $(' .swiper-slide-next').next().css("opacity", "0.3"); 
						
                   
                },
            breakpoints: {
                1920: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                    initialSlide: 2,
                    slidesPerColumn: 1,
                    centeredSlides: true,
                    slidesOffsetBefore: 0
					
                },
                991: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                    initialSlide: 0,
                    slidesPerColumn: 1,
                    centeredSlides: false,
                    slidesOffsetBefore: 30,
                    slidesOffsetAfter: 30
                },
                767: {
                     slidesPerView: 1,
                    spaceBetween: 10,
                    initialSlide: 0,
                    slidesPerColumn: 1,
                    centeredSlides: false,
                    slidesOffsetBefore: 0,
                    slidesOffsetAfter: 0
                }
            }
        });
		
		  var swipercast = new Swiper('.swiper-cast', {
            resizeReInit: true,
            observer: true,
            observeParents: true,
            slidesPerView: 4,
            spaceBetween: 15,
            centeredSlides: true,
            initialSlide: 1,
            paginationClickable: true,
			autoHeight: true,
            pagination: '#swiper-cast-pagination',
            breakpoints: {
                1920: {
                    slidesPerView: 3,
                    spaceBetween: 15,
                    initialSlide: 1,
                    slidesPerColumn: 1,
                    centeredSlides: true,
                    slidesOffsetBefore: 0,
                },
                991: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    initialSlide: 0,
                    slidesPerColumn: 1,
                    centeredSlides: false,
                    slidesOffsetBefore: 30,
                    slidesOffsetAfter: 30,
                },
                767: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    initialSlide: 0,
                    slidesPerColumn: 1,
                    centeredSlides: true,
                    slidesOffsetBefore: 0,
                    slidesOffsetAfter: 0,
                    width:screen.width
                }
            }
        });
        
		 $('.topmenu li').click(function () {
            $('.navbar-header button').click();
        });
        $('.home_block').click(function () {
            $('body,html').animate({
                scrollTop: eval($('#' + $(this).attr('target')).offset().top - 200)
            }, 2000);
        });
        $('.contact_block').click(function () {
            $('body,html').animate({
                scrollTop: eval($('#' + $(this).attr('target')).offset().top - 150)
            }, 1000);
        });

        $('.video_block').click(function () {
            $('body,html').animate({
                scrollTop: eval($('#' + $(this).attr('target')).offset().top - 200)
            }, 2000);
        });

        $('.cast_block').click(function () {
            $('body,html').animate({
                scrollTop: eval($('#' + $(this).attr('target')).offset().top - 200)
            }, 2000);
        });

        $('.press_block').click(function () {
            $('body,html').animate({
                scrollTop: eval($('#' + $(this).attr('target')).offset().top - 200)
            }, 2000);
        });

        $('.gallery_block').click(function () {
            $('body,html').animate({
                scrollTop: eval($('#' + $(this).attr('target')).offset().top - 200)
            }, 2000);
        });
 
     
		
        var swiper = new Swiper('.swiper-container-banner', {
            pagination: '#swiper-banner-vertical-pagination',
            direction: 'vertical',
            slidesPerView: 1,
            paginationClickable: true,
            spaceBetween: 30,
            calculateHeight: true
        });

//cast script starts
if (screen.width <= 767){
		   var z = $(this).width();
        $('.hidden-container').width(z);
		$('.info-icon-ms').click(function () {
		$('.row-no-gutter').css('margin-bottom','0');
		 $(this).parent().siblings('.cast-hidden-section').toggle();
		 var hiddenHeight = $('.cast-hidden-section').outerHeight(true);
		 if($('.cast-hidden-section').is(':hidden')) {
				$(this).parent().parent().parent('.row-no-gutter').css('margin-bottom','0');
                }
		 if($('.cast-hidden-section').is(':visible')) {
		 $(this).parent().parent().parent('.row-no-gutter').css('margin-bottom',hiddenHeight);
		 }
		 $('.cast-hidden-section').click(function () {
		      $(this).hide();
			  $('.row-no-gutter').css('margin-bottom','0');
		 });
        });
		}
		if (screen.width > 991) {
	    //var z = $(this).width(); 
		var z = $('.banner-wrapper-ms').width();
        $('.hidden-container').width(z);
		$('.info-icon-ms').click(function () {
		$('.row-no-gutter').css('margin-bottom','0');
		
		 $(this).parent().siblings('.cast-hidden-section').toggle();
		 
		 if($('.cast-hidden-section').is(':hidden')) {
				$(this).parent().parent().parent('.row-no-gutter').css('margin-bottom',0);
                }
		 if($('.cast-hidden-section').is(':visible')) {
		 $('.cast-hidden-section').hide();
		 
		 $(this).parent().siblings('.cast-hidden-section').toggle();
		 var hiddenHeight = $(this).parent().siblings('.cast-hidden-section').outerHeight(true);
		 $(this).parent().parent().parent('.row-no-gutter').css('margin-bottom',hiddenHeight);
		 
		 }
		 $('.cast-hidden-section').click(function () {
		      $(this).hide();
			  $('.row-no-gutter').css('margin-bottom','0');
		 });
        });
		
		 }
		if (screen.width > 767 && screen.width <= 991) {
		 var z = $(this).width();
        $('.hidden-container').width(z);
		$('.info-icon-ms').click(function () {
		
		 
	
		$('.cast-ms').css('margin-bottom','0');

		 $(this).parent().siblings('.cast-hidden-section').toggle();
		
		 
		 if($('.cast-hidden-section').is(':hidden')) {
				$(this).parent().parent('.cast-ms').css('margin-bottom','0');
                }
		 if($('.cast-hidden-section').is(':visible')) {
		 $('.cast-hidden-section').hide();
		 $(this).parent().siblings('.cast-hidden-section').toggle();
		
		 var hiddenHeight = $(this).parent().siblings('.cast-hidden-section').outerHeight(true);
		 $(this).parent().parent('.cast-ms').css('margin-bottom',hiddenHeight);
		 }
		 $('.cast-hidden-section').click(function () {
		      $(this).hide();
			  $('.cast-ms').css('margin-bottom','0');
		 });
        });
		
		
		}
//cast script end

    </script>
</body>
</html>
