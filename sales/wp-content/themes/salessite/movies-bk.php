
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Movies-bk Homepage
 */

get_header(); ?>



<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/controllers/moviesController.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/services/moviesService.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/services/swiperService.js"></script>

<div class="mainDiv"  ng-controller="MoviesController">
<div class="content" >
            <!--./banner start-->
             <?php  $args = array( 'post_type' => 'bannerslider', 'posts_per_page' => 3 ,'orderby' => 'date');
               $loop = new WP_Query( $args ); ?>

  <input id="pageID" ng-model="PageID" ng-value="name" text='<?php the_ID() ?>' style="display:none" />
  <div class="banner-wrapper">
    <div class="container-lg">
      <div class="banner border-none">
        <div class="main-img">
          <!-- <img class="img-responsive" src="{{BannerImageURl}}"/> -->
		  <img class="img-responsive" src="<?php echo get_field(banner); ?>"/>
            <div class="movies-heading display-group">
              <div class="col-md-10 col-md-offset-1">
                <!-- <div class="banner-heading margin-btm0">{{BannerCaption}}</div> -->
				<div class="banner-heading margin-btm0"><?php echo get_field(image_title); ?></div>
				

              </div>
            </div>
          </div>
      </div>
    </div>


  </div>
            </div>
<!--./banner end-->


<section class="text-center center-heading-box">
  <div class="container-lg">
    <div class="container">
	<div class="row">
                            <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2 col-xs-6 col-xs-offset-3 abstract">
                                     <?php dynamic_sidebar( 'movies-middle-center' ); ?>
                            </div>
                        </div>
      <a href="search-results.html" class="button-lg btn-gold">Browse all Movies</a>
    </div>
  </div>
</section>


  
 

            <!--./content start-->
<div class="content" >
  <section class="text-left dark-bg">
    <div class="container-lg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="swiper-heading">studio movies</h2>
            <a class="right-align-box" href="#">Browse all</a>
          </div>
        </div>
      </div>
      <div class="swiper-container swiper1">
        <div class="swiper-wrapper" >
          <div class="swiper-slide" ng-repeat="movie in StudioMovieList">
            <img src="{{movie.data.image_url}}" alt="" />
            <div class="img-overlay"></div>
            <div class="plus-img">
              <!--<img src="http://localhost:82/wordpress/wp-content/themes/wp-ss/images/plus_gold.png" />-->
            </div>
            <div class="overlay-swiper-label">
              <div class="video-thumb-titles">{{movie.title}}</div>
              <ul class="thumbnail-links">
                <li>
                  <a href="#">movies</a>
                </li>
                <li>|</li>
                <li>
                  <a href="#">{{movie.data.production_year}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-next1">
        </div>
        <div class="swiper-button-prev swiper-button-prev1"></div>
      </div>
    </div>
  </section>
  <section class="text-left dark-bg">
    <div class="container-lg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="swiper-heading">thriller/crime</h2>
            <a class="right-align-box" href="#">Browse all</a>
          </div>
        </div>
      </div>
      <div class="swiper-container swiper2">
        <div class="swiper-wrapper" >
          <div class="swiper-slide" ng-repeat="movie in ThrillerMovieList">
            <img src="{{movie.data.image_url}}" alt="" />
            <div class="img-overlay"></div>
            <div class="plus-img">
              <!--<img src="images/plus_gold.png" />-->
            </div>
            <div class="overlay-swiper-label">
              <div class="video-thumb-titles">{{movie.title}}</div>
              <ul class="thumbnail-links">
                <li>
                  <a href="#">movies</a>
                </li>
                <li>|</li>
                <li>
                  <a href="#">{{movie.data.production_year}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-next2"></div>
        <div class="swiper-button-prev swiper-button-prev2"></div>
      </div>

    </div>

  </section>
  <section class="text-left dark-bg">
    <div class="container-lg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="swiper-heading">romance/biopic</h2>
            <a class="right-align-box" href="#">Browse all</a>
          </div>
        </div>
      </div>
      <div class="swiper-container swiper3">
        <div class="swiper-wrapper" >
          <div class="swiper-slide" ng-repeat="movie in RomanceMovieList">
            <img src="{{movie.data.image_url}}" alt="" />
            <div class="img-overlay"></div>
            <div class="plus-img">
              <!--<img src="images/plus_gold.png" />-->
            </div>
            <div class="overlay-swiper-label">
              <div class="video-thumb-titles">{{movie.title}}</div>
              <ul class="thumbnail-links">
                <li>
                  <a href="#">movies</a>
                </li>
                <li>|</li>
                <li>
                  <a href="#">{{movie.data.production_year}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-next3"></div>
        <div class="swiper-button-prev swiper-button-prev3"></div>
      </div>

    </div>
  </section>
  <section class="text-left dark-bg last-box">
    <div class="container-lg">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="swiper-heading">family/holidays</h2>
            <a class="right-align-box" href="#">Browse all</a>
          </div>
        </div>
      </div>
      <div class="swiper-container swiper4">
        <div class="swiper-wrapper" >
          <div class="swiper-slide" ng-repeat="movie in FamilyMovieList">
            <img src="{{movie.data.image_url}}" alt="" />
            <div class="img-overlay"></div>
            <div class="plus-img">
              <!--<img src="images/plus_gold.png" />-->
            </div>
            <div class="overlay-swiper-label">
              <div class="video-thumb-titles">{{movie.title}}</div>
              <ul class="thumbnail-links">
                <li>
                  <a href="#">movies</a>
                </li>
                <li>|</li>
                <li>
                  <a href="#">{{movie.data.production_year}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-next4">

        </div>
        <div class="swiper-button-prev swiper-button-prev4"></div>
      </div>
    </div>
  </section>
  <!--./content end-->
</div>
</div>
<?php 
get_footer();
?>
