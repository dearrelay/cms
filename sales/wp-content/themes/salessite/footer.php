<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package salessite
 */

?>
  <!--./footer start-->
	<div class="container-lg noprint">
             <footer>
     
	   <div class="footer-bg">
				<span picture-fill>
				<span pf-src="<?php echo get_field('footer_mobile_image'); ?>"></span>
				<span pf-src="<?php echo get_field('footer_tablet_image'); ?>" data-media="(min-width: 768px)"></span>
				<span pf-src="<?php echo get_field('footer_background'); ?>" data-media="(min-width: 992px)"></span>
				</span>
		  </div>
		  
		 
						<div class="footer-wrapper">
							<div class="container">
								<div class="row">
									<div class="col-md-3 col-sm-12 col-xs-12 text-left">
										<div class="footerlist-items list-unstyled">
										<span><a href="<?php echo site_url(); ?>/faq" target="_blank">FAQ</a></span>
										<span class="separator">|</span>
											<span><a href="http://www.aenetworks.com/terms" target="_blank">Terms of Service</a></span>
											<span class="separator">|</span>
											<span><a href="http://www.aenetworks.com/privacy" target="_blank">Privacy Policy</a></span>
										   
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12 copyright-info text-center">
										 A&E Television Networks &copy 1996-2016.<br class="visible-xs hidden-sm hidden-md hidden-lg" /> All rights reserved.
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
        <!--./main div  end-->
		<?php wp_footer(); ?>	
		<!-- Homepage IMAGE BOX Swiper -->
		<script>
        var swiper = new Swiper('.swiperHome', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            slidesOffsetBefore:0,
            breakpoints: {
                767: {
                    slidesPerView:1,
                    spaceBetween:0,
                    initialSlide:0,
                    centeredSlides:true,
                    slidesOffsetBefore:-20,
                    width: screen.width
                }
            }
        });
            
            //google analytics code
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-38302025-2', 'auto');
  ga('send', 'pageview');
    </script>
	
        <script>
            $('html').on('click', function (e) {
                if (typeof $(e.target).data('original-title') == 'undefined' &&
                   !$(e.target).parents().is('.popover.in')) {
                    $('[data-original-title]').popover('hide');
                }
            });
        </script>
    <!-- Important swiper stylesheet -->   
</body>
</html>
