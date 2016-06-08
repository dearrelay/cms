<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Homepage
 */

get_header();
if((is_user_logged_in () && isset($_COOKIE['user_id'])))
      logincheck();
log_me("In Home page : " );
 ?>
 

          
            <div class="content content-mobile">
                <div class="banner-wrapper">
                    <div class="container-lg">



 <div class="home-banner" data-element="home-banner">
    <div class="home-banner__slide home-banner__slide--one">
      <span picture-fill>
   <span pf-src="<?php echo get_field('image1_mobile'); ?>"></span>
  <span pf-src="<?php echo get_field('image1_tab'); ?>" data-media="(min-width: 768px)"></span>
   <span pf-src="<?php echo get_field('image1'); ?>" data-media="(min-width: 992px)"></span>
</span>


      <!-- <img src="images/square-1.jpg" alt="" class="home-banner__media"> -->
	   <?php if( get_field('image1_url') ): ?>
 <div class="home-banner__content">
        <a href="<?php echo httpurl (get_field('image1_url')); ?>" class="learnmorebtn-home"  target="_blank">Learn more</a>
      </div>
	  <?php endif; ?>
      
    </div>
    <div class="home-banner__slide home-banner__slide--two">
      <span picture-fill>
    <span pf-src="<?php echo get_field('image2_mobile'); ?>"></span>
  <span pf-src="<?php echo get_field('image2_tab'); ?>" data-media="(min-width: 768px)"></span>
  <span pf-src="<?php echo get_field('image2'); ?>" data-media="(min-width: 992px)"></span>
 
</span>
       <?php if( get_field('image2_url') ): ?>
 <div class="home-banner__content">
        <a href="<?php echo httpurl (get_field('image2_url')); ?>" class="learnmorebtn-home" target="_blank">Learn more</a>
      </div>
	  <?php endif; ?>
      
    </div>
    <div class="home-banner__slide home-banner__slide--three">
      <span picture-fill>
    <span pf-src="<?php echo get_field('image3_mobile'); ?>"></span>
  <span pf-src="<?php echo get_field('image3_tab'); ?>" data-media="(min-width: 768px)"></span>
  <span pf-src="<?php echo get_field('image3'); ?>" data-media="(min-width: 992px)"></span>
</span>
 <?php if( get_field('image3_url') ): ?>
      <div class="home-banner__content">
      
        <a href="<?php echo httpurl (get_field('image3_url')); ?>" class="learnmorebtn-home" target="_blank">Learn more</a>
      </div>
	  <?php endif; ?>
    </div>
    <div class="home-banner__slide">
        <span picture-fill>
    <span pf-src="<?php echo get_field('image4_mobile'); ?>"></span>
  <span pf-src="<?php echo get_field('image4_tab'); ?>" data-media="(min-width: 768px)"></span>
  <span pf-src="<?php echo get_field('image4'); ?>" data-media="(min-width: 992px)"></span>
</span>
<?php if( get_field('image4_url') ): ?>
      <div class="home-banner__content">
      
        <a href="<?php echo httpurl (get_field('image4_url')); ?>" class="learnmorebtn-home" target="_blank">Learn more</a>
      </div>
	    <?php endif; ?>
    </div>
    <div class="home-banner__slide">
      <span picture-fill>
    <span pf-src="<?php echo get_field('image5_mobile'); ?>"></span>
  <span pf-src="<?php echo get_field('image5_tab'); ?>" data-media="(min-width: 768px)"></span>
  <span pf-src="<?php echo get_field('image5'); ?>" data-media="(min-width: 992px)"></span>
</span>
<?php if( get_field('image5_url') ): ?>
        <div class="home-banner__content">
      
        <a href="<?php echo httpurl (get_field('image5_url')); ?>" class="learnmorebtn-home" target="_blank">Learn more</a> 
      </div>
	   <?php endif; ?>
    </div>
      <div class="home-banner__slide">
      <span picture-fill>
    <span pf-src="<?php echo get_field('image6_mobile'); ?>"></span>
  <span pf-src="<?php echo get_field('image6_tab'); ?>" data-media="(min-width: 768px)"></span>
  <span pf-src="<?php echo get_field('image6'); ?>" data-media="(min-width: 992px)"></span>
</span>
<?php if( get_field('image6_url') ): ?>
        <div class="home-banner__content">
       
        <a href="<?php echo httpurl (get_field('image6_url')); ?>" class="learnmorebtn-home" target="_blank">Learn more</a> 
      </div>
	  <?php endif; ?>
    </div>
    </div>      </div>
                </div>


              <?php if(!(is_user_logged_in () && isset($_COOKIE['user_id']))) {
 
?>
<div class="container-lg">
                <section class="gray-bg home-login-container" id="loginsectionId">
                    <div class="container-lg" ng-controller="HomeController">
                        <div class="container login-form has-error">                           
                        
							<div class="home-loginbox ae-form-group col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
							<div class="class="overlayLoader-wrapper"">
										<h3>Sign In<span class="condensed-font"> to access the catalogue</span></h3>

								<div ng-show="IsInValidLoginPage">
								  <div class="alert alert-danger"  style="display:none;" id="errorMessage" >{{invalidUserMessage}}</div>
								</div>
								<div class="row" >
									<div id="overlayLoader-signincatalog"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
									<div class="col-md-4 col-sm-4">
										<input type="text" class="{{errorClassEmail}}" ng-keyup="CheckErrorClassEmail()" id="username" placeholder="Email Address*" ng-focus="onFocusInput('modelData.userName')" ng-blur="onBlurInput('modelData.userName')" ng-model="modelData.userName" ng-enter="validateForm(modelData,'signincatalog')">
										<span style="color:red" ng-show="errorMessage.username">Please enter Username</span>
									</div>
									<div class="col-md-4 col-sm-4 eye-wrapper"> 
										<input type="{{inputType}}" id="usr_pwd" placeholder="Password*" class="{{ShowPassword}} {{errorClassPassword}}" ng-keyup="CheckErrorClassPassword()" ng-focus="onFocusInput('modelData.password')" ng-blur="onBlurInput('modelData.password')" ng-model="modelData.password" ng-enter="validateForm(modelData,'signincatalog')">
										<span style="color:red" ng-show="errorMessage.password">Please enter Password</span>
										<span id="ShowHidePassword1" class="eye-icon" ng-click="hideShowPassword()">
											<i class="fa {{eyeClassName}}"></i>
										</span>
									</div>
									<div class="login-h-btn"><button class="button-md" id="signInDivId" ng-click="validateForm(modelData,'signincatalog')">Sign In</button></div>
									<div class="forgot-h-password"><a href="#"  class="link-white" ng-click="forgotPassword()">Forgot Your Password?</a></div>
								   
								</div>
							  </div>					
							</div> 
						</div>   
</div>                   
				   </div>

                    
                   
                </section>
				            
				            <?php } ?>
                <section class="text-center star-abstract aboutae">
								<div class="container-lg">
									<div class="container">
										<div class="row">
											<div class="col-md-6 col-sm-12 col-md-offset-3 col-xs-12 abstract-home">
												<h1 class="center-head"><?php the_field('title'); ?></h1>
												<p><?php the_field('content'); ?></p>
											</div>

											
										</div>
						


                         <div class="world-map" data-element="world-map">
            <img src="<?php echo THEME_URL ?>/images/map.svg" alt="" class="world-map__background"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--1"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--2"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--3"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--4"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--5"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--6"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--7"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--8"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--9"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--10"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--11"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--12"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--13"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--14"/>
            <img src="<?php echo THEME_URL ?>/images/pin.svg" alt="" class="world-map__pin world-map__pin--15"/>
          </div>									   
									</div>
									 
										<!-- Desktop version Start-->
									  <div class="container stat-shadow hidden-xs visible-sm visible-md visible-lg">
                        <div class="text-center stats-wrapper">
                            <div class="row center-clmn-content">
							<?php if( get_field('stats_1') ): ?>
                                <div class="col-md-4 col-sm-4 stats-box">
                                    <div class="stats">
                                        <?php the_field('stats_1'); ?>
                                    </div>
                                </div>
								<?php endif; ?>
								<?php if( get_field('stats_2') ): ?>
                                <div class="col-md-4 col-sm-4 stats-box">
                                    <div class="stats">
                                        <?php the_field('stats_2'); ?>
                                    </div>
                                </div>
								<?php endif; ?>
								<?php if( get_field('stats_3') ): ?>
                                <div class="col-md-4 col-sm-4 stats-box">
                                    <div class="stats">
                                        <?php the_field('stats_3'); ?>
                                    </div>
                                </div>
								<?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
                            <div align="center" class="more-btn-home">
                                <a href="http://www.aenetworks.com/about" target="_blank" class="button-md btn-gold">More about A+E Networks</a>
                            </div>
                        </div>
                    </div>
								
									<!-- Desktop version end-->
									
									<!--Mobile Swiper Statictics start-->
									<!-- Swiper -->
									<div class="container hidden-sm hidden-md hidden-lg" style="background:url(<?php echo get_stylesheet_directory_uri(); ?>/images/stat_bg_mobile.png) no-repeat scroll center -28px; ">
										<div class="swiper-container swiperDetailHomeStats">
											<div class="swiper-wrapper homestat-slider">
											<?php if( get_field('stats_1') ): ?>
												    <div class="swiper-slide">
														<div class="text-center stats-wrapper">
															<div class="stats">
																 <?php the_field('stats_1'); ?>
															</div>
                                                        </div>
													</div>
													<?php endif; ?>
													<?php if( get_field('stats_2') ): ?>
													<div class="swiper-slide">
														<div class="text-center stats-wrapper">
															<div class="stats">
																 <?php the_field('stats_2'); ?>
															</div>
                                                        </div>
													</div>
													<?php endif; ?>
													<?php if( get_field('stats_3') ): ?>
													<div class="swiper-slide">
														<div class="text-center stats-wrapper">
															<div class="stats">
																 <?php the_field('stats_3'); ?>
															</div>
                                                       </div>
													</div>
													<?php endif; ?>
												
											</div>
											<!-- Add Pagination -->
											<div class="swiper-pagination swiper-pagination-stat"></div>
										</div>

										<div class="col-md-4 col-md-offset-4">
											<div align="center" class="more-btn-home">
												<a href="http://www.aenetworks.com/about" target="_blank" class="button-lg btn-gold">More about A+E Networks</a>
											</div>
										</div>

									</div>
									
								</div>

                </section>
            
         </div>

<?php 
get_footer();
