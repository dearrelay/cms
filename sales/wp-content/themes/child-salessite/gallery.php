<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: gallery
 */

get_header(); 
$galleries   = get_posts(array(
        'post_type' => 'gallery',
        'posts_per_page' =>-1
    ));
    $details = array();
    if ($galleries):
	$i=0;
	foreach ($galleries as $gallery) {
        $pid               = $gallery->ID;
            $fields            = get_fields($pid);

            $details           = $fields;
            $details['PostID'] = $pid;
		   $galleriesdetails[$i++]=$details;
		}
		
    endif;
	
	
?>
</div>
                <!--banner section ends-->
 <div class="container">
                        <div class="border-line"></div>
                </div>
                  <!--Gallery Section Starts-->
                <section class="section-ms gallery-box overflow-hidden heading-sm heading-xs" id="gallery">
                    <div class="gallery-text text-center">
                        <h4><?php the_field('page_title'); ?></h4>
                    </div>
                     <div class="episode-fullwidth-image destination hidden-xs">
                        <img src="<?php echo $galleriesdetails[0]['image_url']; ?>" alt="full-width-img" />
                    </div>
                    <?php if(is_array($galleriesdetails)){  ?>
                    <div class="gallery-swiper-ms container-lg">
                            <div class="swiper-container swiper-gallery swiper-container-padding">
                                <div class="swiper-wrapper swiperClickId">
								
								<?php 	
								
								foreach ($galleriesdetails as $gallery) {  
								if($gallery['image_url']){
								?>
                                     <div class="swiper-slide img-info source-img">
                                        <img src="<?php echo $gallery['image_url']; ?>">
                                    </div>
									<?php } } ?>
                                    
                                </div>
                              
                                <div class="swiper-pagination pagination-center visible-xs visible-sm hidden-md hidden-lg" id="swiper-gallery-pagination"></div>
                                <!-- Add Arrows -->

                            </div>


                        <div class="swiper-button-next swiper-button-next-gallery hidden-xs hidden-sm"></div>
                        <div class="swiper-button-prev swiper-button-prev-gallery hidden-xs hidden-sm"></div>
                    </div>
					<?php } ?>

               </section>
                <!--Gallery Section Ends-->
               </div>
<?php 
get_footer();