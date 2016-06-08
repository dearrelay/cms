<?php  logincheck(); ?>
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Movies Homepage
 */

get_header(); ?>



<!--./main content start-->
             <?php  $args = array( 'post_type' => 'bannerslider', 'posts_per_page' => 3 ,'orderby' => 'date');
               $loop = new WP_Query( $args ); ?>
        <div class="content content-mobile" ng-controller="moviesController">
          <div id="overlayLoader">
            <img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif">
          </div>
            <!--./banner start-->
            <div class="banner-wrapper">
                 <div class="container-lg">
                <div class="banner border-none">
                            <div class="main-img">
                                <img class="img-responsive" src="<?php echo get_field('banner'); ?>" alt="movies_banner">
							<div class="movies-heading display-group">
							<div class="col-md-10 col-md-offset-1">
                                <div class="banner-heading margin-btm0"><?php echo get_field('image_title'); ?></div>
                          
                                </div>
								</div>
                            </div>
                </div>
                     </div>


            </div>
            <!--./banner end-->

           
   <div ng-hide='true'>
                 <input id='PageName' value='' />  
</div>			
  <div class="container-lg" ng-cloak>
   <section class="text-center center-heading-box">
                
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-md-offset-3 col-xs-12 abstract">
                             
                               <h1 class="center-head"><?php the_field('title'); ?></h1>
                                <div class="head-md-bg"></div>
                                <p class="centerbox-paragraph"><?php the_field('content'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
                            <div align="center" class="browse-scripted-btn">
                                <a ng-click='BrowseAllData("All")' class="button-md btn-gold" href="#">Browse all movies</a>
                            </div>
                        </div>
                    </div>
                
            </section>
          <section class="text-left dark-bg" ng-repeat='main in MainSectionMovies'  ng-show='main.MovieDetail.length>0'>
          
              <div class="container swiper-slide-heading">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="swiper-heading">{{main.GenreName}}</h3>
                    <a class="right-align-box hidden-sm visible-lg visible-md hidden-xs"  ng-click='BrowseAllData(main)' href="#">Browse all</a>
                  </div>
                </div>
              </div>
              <div class="swiper-container swiper-container-padding" swiperdirective  ng-cloak>
                <div class="swiper-wrapper">
                  <div class="swiper-slide"   ng-repeat="movie in main.MovieDetail | limitTo: 10">
                      <img ng-if="!(movie.ImageUrlDesktop1x)" ng-src="{{movie.TileUrl}}">
                        <span picture-fill="" ng-if="movie.ImageUrlDesktop1x">
                          <span pf-src="{{movie.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                          <span pf-src="{{movie.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                          <span pf-src="{{movie.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                          <span pf-src="{{movie.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                          <span pf-src="{{movie.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                          <span pf-src="{{movie.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                        </span>
                      <div class="img-overlay" ng-click='movieDetails(movie)'></div>
                      <div class="plus-img">
                        <img  class="{{movie.PPLID + 'plus'}}" ng-click="AddToWatchlist(movie.PPLID,'piece')" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_gold.png">
						<img  class="{{movie.PPLID + 'minus'}}" ng-click="AddToWatchlist(movie.PPLID,'piece')" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_gold.png" style="display:none">
                      </div>
                      <div class="overlay-swiper-label" ng-click='movieDetails(movie)'>
                        <h3 class="video-thumb-titles">{{movie.MovieName}}</h3>
                        <ul class="thumbnail-links">
                          <li>
                            <a href="#">movie</a>
                          </li>
                          <li>|</li>
                          <li>
                            <a href="#">{{movie.YearReleased}}</a>
                          </li>
                          <li ng-show="(movie.ParentSeriesName!=null)">{{(movie.ParentSeriesName!=null ? '|' : '')}}</li>
                          <li ng-show="(movie.ParentSeriesName!=null)">
                            {{(movie.ParentSeriesName!=null ? movie.ParentSeriesName : '')}}
                          </li>
                        </ul>
                      </div>
                    </div>
                  <div  ng-if='main.MovieDetail.length>10' class="swiper-slide browseMore-box">
                    <div class="browseMore playbtn-thumb">
                      <a ng-click='BrowseAllData(main)'>
                        Browse more titles  <span class="findout-bacgrndimage"></span>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination-mobile swiper-pagination1" id="swiper-pagination{{$index}}"></div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-next{{$index}}">
                </div>
                <div class="swiper-button-prev swiper-button-prev{{$index}}"></div>
                <a class="right-align-box-bottom hidden-lg hidden-md visible-sm visible-xs" ng-click='BrowseAllData(main)' href="#">Browse all</a>
              </div>
               
            
          </section>
		  </div>
   </div>

<?php 
get_footer();
?>
