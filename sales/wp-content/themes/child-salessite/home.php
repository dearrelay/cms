<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Homepage
 */

get_header(); ?>
   <!--content start-->
   <div class="hero-image-ms">
                            <img src="<?php the_field('hero_image_desktop'); ?>" alt="hero_img2" />
                            <div class="ms-overlay"></div>
                        </div>
             <div class="tagline-ms">
                        <div class="hero-image-tagline-ms"><h1><?php the_field('hero_image_text'); ?></h1></div>
                    </div>
					</div>
               </section>

                <!--video player section-->
                <div class="section-ms video-palyer-box overflow-hidden">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 videoplayer-image">
                            <img src="<?php the_field('video_image_url') ?>" alt="video_img"/>
                            <div class="playbtn-thumb center-align">
                                <figure class="play-btn-vector zoomIn animated">
                                    <img alt="thumbnail_playbtn" src="http://dv2-images.aesalessite.com/site-images/microsites/common/play_btn.svg">
                                </figure>
                                <span class="trailor-duration">View Trailer (<?php the_field('video_duration') ?>)</span>
                            </div>
                        </div>
						 <iframe class="col-md-6 col-md-offset-3 iframe-video-box video-player-pop video-home left" style="display:none" id="play-button" width="100%" height="100%" scrolling="no" src="<?php the_field('video_url') ?>" framepadding="0" frameborder="0" allowtransparency="true" seamless
                                                            allowfullscreen mozallowfullscreen msallowfullscreen webkitallowfullscreen>Your browser does not support iframes.</iframe>
                    </div>

                </div>
                <!--video player section ends-->
				
				               <!--image and text section start-->
                <section class="section-ms image-text-box overflow-hidden">
                    <div class="container">
                        <div class="border-line"></div>
                    </div>
                    <div class="section-ms" style="display: none">
                        <div class="image-text blur">
                            <img alt="imagetext-img" src="<?php echo BASE_IMG_CDN_URL ?>/microsites/andthentherewerenone/image1.jpg" />
                        </div>
                    </div>

                    <div class="row row-no-gutter">
					<?php if(get_field('site_title')): ?>
                        <div class="col-md-6 col-sm-12 col-xs-12 image-description">
                            <div class="image-text">
                                <img alt="imagetext-img-blur" class="blur" src="http://dv2-images.aesalessite.com/site-images/microsites/andthentherewerenone/image1.jpg" />
                            </div>
                            <div class="center-align image-text">
                                <h4 class="upper-case text-center heroimg-margin fadeInDown animDelay01 animated"><?php  the_field('site_title'); ?></h4>
                                <p class="text-center para-ms fadeInUp animDelay02 animated">
                                   <?php the_field('site_desc'); ?>
                                </p>
                            </div>
                        </div>
						<?php endif; ?>
						<?php if( get_field('image_url') ): ?>
	

                        <div class="col-md-6 col-sm-12 col-xs-12 image-descriptionbox">
                            <div class="image-text">
                                <img alt="img-text-img" class="animated slideInRight" src="<?php the_field('image_url'); ?>" />
                            </div>
                        </div>
						<?php endif; ?>
                    </div>

                    <div class="container">
                        <div class="border-line"></div>
                    </div>
                </section>
                <!--image and text section ends-->

 <!--production Section Start-->
                <section class="section-ms overflow-hidden">
                    <div class="image-text image-blur blur production-img">
                        <img src="http://dv2-images.aesalessite.com/site-images/microsites/andthentherewerenone/production_image.jpg" alt="cast-img"/>
                    </div>
                    <div class="production-box">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 text-center production-heading">
                                <h4 class="production-text">Production</h4>
                            </div>
                        </div>
                        <div class="container">
                            <div class="border-line"></div>
                         </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 production-ms-text">
                                
                          <?php the_field('production_info_text'); ?>
                             </div>
                        </div>
                    </div>

                </section>
                <!--production Section Ends-->
          <!-- Contact Section starts -->
		  <section class="section-ms contacts-box" id="contacts">
                    <div class="ms-form-group">
                        <div class="container">
                            <div class="contacts-text text-center">
                                <h4>Contact us</h4>
                            </div>
                            <div class="border-line"></div>
                            <div class="contact-text">
                                For more information contact <a target="blank" href="<?php echo WP_SITEURL ?>/contacts">A+E Network Sales
                           </a>
                            </div>
                            
                           
                        </div>
                    </div>
                </section>
				        <!-- Contact Section Ends -->
            <!--content ends-->
<?php 
get_footer();