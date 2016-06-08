<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Faq
 */

get_header(); ?><!--content-->
        <div class="content content-mobile" ng-controller="ContactPressController">
		<div class="container-lg">
              <div class="header-bg">
                                                               <span picture-fill>
                                                                <span pf-src="<?php the_field('header_mobile_image');?>"></span>
                                                                <span pf-src="<?php the_field('header_tablet_image');?>"></span>
                                                                <span pf-src="<?php the_field('header_background');?>" data-media="(min-width: 992px)"></span>
                                                                </span>

            </div>
            <div class="form-top-bg">
                <section>
                    <div class="banner-heading text-center banner-heading-box">Faq</div>
                </section>
				<div class="container">
				<div class="row">
				<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
          <?php
			while ( have_posts() ) : the_post();	
			the_content();
			endwhile; // End of the loop.
			?></div>
            </div>
			</div>
			</div>
			</div>
        </div>
        <!--content-->


			

	
<?php 
get_footer();