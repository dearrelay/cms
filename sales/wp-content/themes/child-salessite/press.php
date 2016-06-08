<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: press
 */

get_header(); ?>
</div>
</section>
                <!--banner section ends-->
                     <!--content start-->
          
                <!--banner section ends-->
                <div class="container">
                      <div class="border-line"></div>
                 </div>
                
                               <!--Press Section Start -->
                <section class="section-ms overflow-hidden heading-sm heading-xs" id="press">
				<div class="press-text text-center">
                        <h4><?php the_field('page_title'); ?></h4>
                    </div>
                    <div class="container">
                        <div class="block-text">
                            <h3><?php the_field('press_text'); ?></h3>
                            <div class="quote-text-small">
                                <span class="font-bold"><?php the_field('author1'); ?> Review</span>  <?php the_field('sub_author1'); ?>
                            </div>
                        </div>
                         <div class="container">
                        <div class="border-line"></div>
                            </div>
                        <div class="block-text">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <h3><?php the_field('press_text2'); ?></h3>
                                    <div class="quote-text-small">
                                        <span class="font-bold"><?php the_field('author2'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <section class="section-ms overflow-hidden">
                    <div class="image-text blur press-img" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/production_image.jpg);
    background-repeat:no-repeat;
    -o-background-size: 100%;
    -moz-background-size: 100%;
    -webkit-background-size:100%;">
                    </div>
                    <div class="press-wrapper press-box">
                        <div class="container">
                            <div class="press-block-text text-center">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <h3><?php the_field('press_text3'); ?></h3>
                                        <div class="quote-text-small">
                                            <span class="font-bold"><?php the_field('author3'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="press-block-text text-center">
                                <h3><?php the_field('press_text4'); ?></h3>
                                <div class="quote-text-small">
                                    <span class="font-bold"><?php the_field('author4'); ?></span>
                                </div>
                            </div>

                            <div class="press-block-text text-center">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <h3><?php the_field('press_text5'); ?></h3>
                                        <div class="quote-text-small">
                                            <span class="font-bold"><?php the_field('author5'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--press design 2 start-->
                                <!--press design 2 start-->
                <section>
                 <div class="row row-no-gutter ms-form-group">
                        <div class="col-md-6 cast-ms vertical-middle">
                            <img alt="cast-img" src="<?php the_field('cast_image'); ?>">
                            <div class="button-overlay" >
                                <a href="<?php echo site_url(); ?>/cast" class="button-on-image button-link">See Cast</a>
                            </div>
                        </div>
                        <div class="col-md-6 cast-ms vertical-middle">
                            <img alt="cast-img" src="<?php the_field('video_image'); ?>">
                            <div class="button-overlay">
                                <a href="<?php echo site_url(); ?>/video" class="button-on-image button-link">See Episodes</a>
                            </div>
                        </div>
                    </div>
                <section class="section-ms overflow-hidden">
                    <div class="image-text image-blur blur production-img">
                        <img alt="cast-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/production_image.jpg">
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
                                <div class="row production-margin">
                                    <div class="col-md-5 col-sm-5 col-xs-12 mobile-ms-text">
                                        <div class="text-right production-column-margin">
                                            <h4>produced by</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-12 mobile-ms-text person-name text-left">
                                        <?php the_field('produced_by'); ?>
                                    </div>
                                </div>
                                <div class="row production-margin">
                                    <div class="col-md-5 col-sm-5 col-xs-12 mobile-ms-text">
                                        <div class="text-right upper-case production-column-margin">
                                            <h4>directed by</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-12 person-name text-left mobile-ms-text">
                                        <?php the_field('directed_by'); ?>
                            <br>
                                        <div class="text-light"><?php the_field('directed_by_sub_content'); ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 col-sm-5 col-xs-12 mobile-ms-text">
                                        <div class="text-right upper-case production-column-margin">
                                            <h4>written by</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-sm-7 col-xs-12 mobile-ms-text person-name text-left">
                                        <?php the_field('written_by'); ?>
                                <br>
                                        <div class="text-light"> <?php the_field('written_by_sub_content'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                    </section>
                <!--press design 2 ends-->
                <!--Press Section Ends -->

            </div>
            <!--content ends-->
			
<?php 
get_footer();