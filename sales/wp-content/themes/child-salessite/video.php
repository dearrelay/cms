<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: video
 */

get_header(); 
$values=get_post();
$pass=random_code(3).strrev($values->post_password).random_code(3);

 $videos   = get_posts(array(
        'post_type' => 'video',
        'posts_per_page' =>-1
    ));
    $details = array();
    if ($videos):
	$i=0;
	foreach ($videos as $video) {
         $pid               = $video->ID;
            $fields            = get_fields($pid);
            $field             = array_map("htmlspecialchars_decode", $fields);
            $details           = $field;
            $details['PostID'] = $pid;
		   $videos[$i++]=$details;
		}
    endif;
?>
</div>
<div class="container">
                        <div class="border-line"></div>
                </div>

                    <!--content start-->
					<span id="vauth" vid-auth="<?php echo $pass ?>" ></span>   
                                                      <!--Episode Section Start-->
                <section class="section-ms episode-box overflow-hidden heading-sm heading-xs" id="videos">
                    <div class="episode-text text-center">
                            <h4><?php the_field('page_title'); ?></h4>
                        </div>
                    <div class="container episode-swiper-box">
                        

                          <div class="episode-box hidden-xs ">
                            <div class="row row-no-gutter">
							
                                <div class="col-md-6 col-sm-12 episode-img-ms destination" src="<?php echo $videos[0]['video_url']; ?>">
                                    
                                       <img src="<?php echo $videos[0]['video_image_url']; ?>" class="video-hide"/>
                                 
                                       <figure class="play-btn-vector-episode center-align video-hide" data-toggle="modal" data-target="#videomodal">
                                        <img alt="thumbnail_playbtn" src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn.svg" id="clearMessage">
                                    </figure>
                                     <iframe class="iframe-video-box video-player-pop left" style="display:none" id="play-button" width="100%" height="100%" scrolling="no" src="<?php echo $videos[0]['video_url']; ?>" framepadding="0" frameborder="0" allowtransparency="true" seamless
                                                            allowfullscreen mozallowfullscreen msallowfullscreen webkitallowfullscreen>Your browser does not support iframes.</iframe>
                                </div>
                                <div class="col-md-6 col-sm-12 hidden-xs">
                                    <div class="episode-wrapper">
                                        <div class="episode-num-ms" id="video_title">
                                            <?php echo $videos[0]['video_title']; ?>
											<?php echo $videos[0]['video_password']; ?>
											
                                        </div>
                                       <div id="video_desc" class="ms-para-text">
									  <?php echo $videos[0]['video_desc']; ?>
									   
									  
									  
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="episode-swiper-ms container-lg">

                            <div class="swiper-container swiper-episode swiper-container-padding">
                                <div class="swiper-wrapper swiperClickId">
								<?php 	
								$j=0;
								
								foreach ($videos as $video) {
								//echo "<pre>"; print_r($videos); 
 ?>
                                    <div class="swiper-slide img-info video-img">
                                        <div id="destination-mobile<?php echo $j; ?>" class="destination-mobile">
										<div class="showframe" vid-url="<?php echo $video['video_url'];?>">
                                        <img src="<?php echo $video['video_image_url']; ?>" alt="episode-swiper-img"  db-title="<?php echo $video['video_title']; ?>" db-desc="<?php echo $video['video_desc']; ?>">
                                        <figure class="play-btn-vector-episode-swiper center-align" id="image<?php echo $j; ?>" data-toggle="modal" data-target="#videomodal">
                                            <img class="clearMessage1" alt="thumbnail_playbtn" src="<?php echo get_template_directory_uri (); ?>/images/play_btn.svg">
                                        </figure>
                                        <div class="ms-img-overlay-text">
                                            <div class="left">
                                                <h4><?php echo $video['video_title']; ?> <?php echo $video['video_password']; ?> </h4>
                                            </div>
                                            <div class="right episode-duration"><?php echo $video['video_duration']; ?> </div>
                                        </div>
										</div>
										 <iframe id="mobile-iframe" width="100%" height="100%" src="<?php echo $video['video_url'];?>" id="frame<?php echo $j++; ?>" style="display:none"></iframe>
                                    </div>
								
                                   

                                    </div>
									<!-- -->
                                    <?php } ?>
                                    
                                   
                                    
                                </div>



                               <div class="swiper-pagination pagination-center visible-xs visible-sm hidden-md hidden-lg" id="swiper-episode-pagination"></div>
                                <!-- Add Arrows -->

                            </div>

           
            <div class="swiper-button-next swiper-button-next-episode hidden-xs hidden-sm"></div>
                        <div class="swiper-button-prev swiper-button-prev-episode hidden-xs hidden-sm"></div>
                    </div>
               </section>
                <!--Episode Section Ends-->
           </div>
            <!--content ends--> 
			 <?php if ( post_password_required() ) { ?>
			<div class="modal-mobile">
            <div class="modal fade modal-video" id="videomodal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">		
			
                <div class="modal-dialog ms-modal-dialog">
                    <div class="modal-content">
                     <button type="button" class="close" id="password-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/modal_close.png" alt="close" /></span></button>
                        

                        <div class="modal-body ms-form-group">
						<div id="mobile-playframe" style="display:none"></div>
						<div class="ms-alert" style="display:none" id="ms-video-alert">Incorrect password</div>
						<div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">  
						     
  <?php echo custom_password_form(); ?>


						   </div> 
                         </div>
                        </div>
                    </div>

                    

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
		
			
                </div> <?php   } ?> 

<?php 
get_footer();