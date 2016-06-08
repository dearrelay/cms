<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Cast
 */

get_header(); 
$large   = get_posts(array(
        'post_type' => 'cast',
        'posts_per_page' =>4,	
        'meta_key' => 'image_size',
        'meta_value' =>'Large',
        'order' => 'DESC'		
    ));	
$small   = get_posts(array(
        'post_type' => 'cast',
        'posts_per_page' =>6,	
        'meta_key' => 'image_size',
        'meta_value' =>'Small',
        'order' => 'DESC'		
    ));	
function getDetailscast($postvlaues)
{
	$i=0;
	$details = array();
	if ($postvlaues)
	{
		foreach ($postvlaues as $cast)
		{
				$pid               = $cast->ID;
				$fields            = get_fields($pid);
				$field             = array_map("htmlspecialchars_decode", $fields);
				$detail           = $field;
				$detail['PostID'] = $pid;					
				$details[$i++]=$detail;				
		}			
   }
   return $details;
}   
$castsdetails_small=getDetailscast($small);
$castsdetails_large=getDetailscast($large);

$image_full_size=get_field('half_screen_image');
?>
<div class="container">
	<div class="border-line"></div>
</div>
	<!--cast section starts-->
<section class="overflow-hidden  heading-sm heading-xs" id="cast">

	<div class="starring-text text-center">
		<h4><?php the_field('page_title'); ?></h4>
	</div>
	<div class="cast-starring visible-lg visible-md visible-sm hidden-xs">
	<?php 
		for($i=0;$i<2;$i++)
		{	
			if(count($castsdetails_large) >= ($i*2 + 2)) {  					
	?>
			<div class="row row-no-gutter">
			<?php 	
			for($j=0;$j<2;$j++)
			{        
				$cast=$castsdetails_large[$i+$j];
				?> 			
				<div class="col-md-6 cast-ms vertical-middle">
					<img alt="cast_img" class="zoomIn animated" src="<?php echo $cast['image_url'] ?>" />
					<div class="ms-img-overlay-text-episode">
						<div class="cast-overlay">
							<div class="cast-name ms-ellipsis">
								<h4 class="ellipsis-heading">
									<?php echo $cast['actors_name'] ?>
								</h4>
							</div>
							<div class="available-series ms-ellipsis">
								<?php echo $cast['roles_in'] ?>                                                                               
							</div>
						</div>
						<div class="info-icon-ms">
							<img alt="info_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/info_icon.png" />
						</div>
					</div>
					<div class="hidden-container cast-hidden-section-half-left cast-hidden-section" style="display: none">
						<div class="cast-info-section cast-info-hidden">
							<div>
								<h2 class="cast-name-ms">
									<?php echo $cast['actors_name'] ?>
								</h2>
								<div class="cast-name-in-series">
									as <?php echo $cast['character'] ?>
								</div>
								<p class="para-cast">
									<?php echo $cast['character_description'] ?>
								</p>
							</div>
						</div>
					</div>
				</div> 
		<?php } ?>
		</div>		
<?php } 
 } 
if(count($castsdetails_small) >= 4 ) {  	?>
<div class="row row-no-gutter">
	<?php 
		for($m=0;$m<4;$m++)
		{	

		$cast=$castsdetails_small[$m]; ?>
		<div class="col-md-3 col-sm-6 cast-ms vertical-middle">
		<img alt="cast_img" src="<?php echo $cast['image_url'] ?>" />
		<div class="ms-img-overlay-text-episode">
		<div class="cast-overlay">
		<div class="cast-name ms-ellipsis">
		<h4 class="ellipsis-heading"><?php echo $cast['actors_name'] ?></h4>
		</div>
		<div class="available-series ms-ellipsis">
		<?php echo $cast['roles_in'] ?>  
		</div>

		</div>
		<div class="info-icon-ms">
		<img alt="info_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/info_icon.png" />
		</div>
		</div>
		<div class="hidden-container cast-hidden-section-half-quater-right cast-hidden-section-half-quater cast-hidden-section"
		style="display: none">
		<div class="cast-info-section cast-info-hidden">
		<div>
		<h2 class="cast-name-ms"><?php echo $cast['actors_name'] ?></h2>
		<div class="cast-name-in-series">
		as <?php echo $cast['character'] ?>
		</div>
		<p class="para-cast">
		<?php echo $cast['character_description'] ?></p>
		</div>
		</div>
		</div>
		</div>
<?php }?>
</div>
<?php 
}
$count = count($castsdetails_small);
if(($count >= 2 && $count < 4  && $image_full_size ) || ($count == 6 && $image_full_size))
{
	 $k = ($count >= 2 && $count < 4) ? 0 : 4;

	?>
<div class="row row-no-gutter">
	<?php 
		for($m=$k;$m<$k+2;$m++)
		{	
	$cast=$castsdetails_small[$m]; 
	?>
		<div class="col-md-3 col-sm-6 cast-ms vertical-middle">
		<img alt="cast_img" src="<?php echo $cast['image_url'] ?>" />
		<div class="ms-img-overlay-text-episode">
		<div class="cast-overlay">
		<div class="cast-name ms-ellipsis">
		<h4 class="ellipsis-heading"><?php echo $cast['actors_name'] ?></h4>
		</div>
		<div class="available-series ms-ellipsis">
		<?php echo $cast['roles_in'] ?>  
		</div>

		</div>
		<div class="info-icon-ms">
		<img alt="info_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/info_icon.png" />
		</div>
		</div>
		<div class="hidden-container cast-hidden-section-half-quater-right cast-hidden-section-half-quater cast-hidden-section"
		style="display: none">
		<div class="cast-info-section cast-info-hidden">
		<div>
		<h2 class="cast-name-ms"><?php echo $cast['actors_name'] ?></h2>
		<div class="cast-name-in-series">
		as <?php echo $cast['character'] ?>
		</div>
		<p class="para-cast">
		<?php echo $cast['character_description'] ?></p>
		</div>
		</div>
		</div>
		</div>


	<?php
}
 ?>
 <div class="col-md-6 col-sm-12 cast-ms vertical-middle">
                            <img alt="cast_img" src="<?php echo $image_full_size ?>">
                        </div>
</div>
<?php } ?>







                <!--cast section ends-->

            </div>
            <!--content ends-->
			<!-- Mobile version starts-->

			
			
			
			<div class="visible-xs">
			 <div class="cast-swiper-ms container-lg">
                        <div class="container">
                            <div class="swiper-container swiper-cast swiper-container-padding swiper-overflow">
                                <div class="swiper-wrapper swiperClickId">
			<?php 
			
			$mobilemerge = array_merge($castsdetails_small, $castsdetails_large) ; 
			
			foreach ($mobilemerge as $cast) {
			?>
                   
                       
								
								<div class="swiper-slide img-info">
																<img src="<?php echo $cast['image_url'];?>" alt="cast-swiper-img">
																  <div class="ms-img-overlay-text-episode">
														<div class="cast-overlay">
															<div class="cast-name ms-ellipsis">
																<h4 class="ellipsis-heading"><?php echo $cast['actors_name'] ?></h4>
															</div>
															<div class="available-series ms-ellipsis">
																	<?php echo $cast['roles_in'] ?>  
															</div>
														  
															
														</div>
														  <div class="info-icon-ms">
																<img alt="info_icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/info_icon.png" />
															</div>
													</div>
													<div class="cast-hidden-section-half-quater-right cast-hidden-section" style="display: none">
													<div class="cast-info-section cast-info-hidden">
														<div class="container">
															<h2 class="cast-name-ms"><?php echo $cast['actors_name'] ?>
															<div class="cast-name-in-series">
																as <?php echo $cast['character'] ?>
															</div>
															<p class="para-cast">
																<?php echo $cast['character_description'] ?>
															</p>
														</div>
													</div>
												</div>
							               
                             </div>
                    
					  <?php } ?>
					  </div>

                             

                                <div class="swiper-pagination cast-pagination pagination-center visible-xs visible-sm hidden-md hidden-lg" id="swiper-cast-pagination"></div>
                                <!-- Add Arrows -->

                            </div>
                  
                        </div>
                        </div>
				</div>
				
				
					
					
					<div class="additional-cast-box">
							<div class="image-text blur additioanl-cast-img" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/production_image.jpg);background-repeat:no-repeat;
								-o-background-size: 100%;
						-moz-background-size: 100%;
-							webkit-background-size:100%;">
					</div>
					<div class="additionalcast-box">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center production-heading">
						<h4 class="production-text">Additional Cast</h4>
						</div>
					</div>
				<div class="container">
						<div class="border-line"></div>
				</div>
				<div class="row">
				<div class="col-md-6 col-md-offset-3 production-ms-text">
					<?php
					//WordPress loop for Additional Cast
							$my_query = new WP_Query('post_type=addcast&posts_per_page=-1');
							while ($my_query->have_posts()) : $my_query->the_post(); ?>

				<div class="row production-margin">
						<div class="col-md-6 col-sm-5 col-xs-12 mobile-ms-text">
											<div class="text-right">
									<h4 class="additional-cast-font-xs"><?php the_field('add_character_name'); ?></h4>
						</div>
						</div>
					<div class="col-md-6 col-sm-7 col-xs-12 mobile-ms-text person-name text-left">
							<?php the_field('add_real_name'); ?> 
						</div>
						</div>
	
								<?php endwhile;  wp_reset_query(); ?>

					</div>
					</div>
									</div>
					</div>
					</section>
					</div>

<!-- Mobile version Ends-->
<?php 
get_footer();