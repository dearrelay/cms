<?php  logincheck(); ?>
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Factual Homepage
 */

get_header(); ?>

       <!--./content start--> 
       <div class="content content-mobile" ng-controller="moviesController">
            <!--./banner start-->
<div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
                      <!--./banner start-->
            <div class="banner-wrapper">
                <div class="container-lg">
                    <div class="banner visible-lg visible-md visible-sm hidden-xs">
                        <div class="row"  ng-cloak>
                            <div class="col-md-9 col-sm-12 banner-lg">
                                <div class="main-img" ng-style="{'background': 'url('+MainBanner.ImageURLCMS+') scroll 0 0'}">
                                    <button style='position:absolute; right:10px;top:10px;' ng-hide="!playBtnClicked" type="button" class="close close-btn-gallery close-lndng" ng-click="closeBannerPlayer()" aria-label="Close">
                                        <img class="right" src="<?php echo THEME_URL ?>/images/vplayer_close.png">
                                    </button>
                                <iframe id="bannerScreenerId" ng-hide="!playBtnClicked" width="100%" height="100%" scrolling="no" framepadding="0" frameborder="0" allowtransparency="true" seamless="seamless"
                                    allowfullscreen mozallowfullscreen msallowfullscreen webkitallowfullscreen>Your browser does not support iframes.</iframe>
                                    <div class="trailer-content" ng-hide="playBtnClicked">
                                      <div class="banner-heading">{{MainBanner.SeriesName}}</div> 
                                        <span class="counts" ng-hide="(MainBanner.SeasonsCount===0 || MainBanner.SeasonsCount===undefined)">{{MainBanner.SeasonsCount===0? '' : MainBanner.SeasonsCount}} {{(MainBanner.SeasonsCount === 0 || MainBanner.SeasonsCount===undefined )? '' : (MainBanner.SeasonsCount === 1 ? 'Season' : ' Seasons' )}} </span><span class="pipe" ng-hide="(MainBanner.SeasonsCount===0 || MainBanner.SeasonsCount===undefined ||MainBanner.EpisodesCount===0 || MainBanner.EpisodesCount===undefined )">|</span>
                                      <span class="counts" ng-hide="(MainBanner.EpisodesCount === 0 || MainBanner.EpisodesCount===undefined )">{{MainBanner.EpisodesCount===0? '' : MainBanner.EpisodesCount}}{{(MainBanner.EpisodesCount === 0 || MainBanner.EpisodesCount===undefined )? '' : (MainBanner.EpisodesCount === 1 ? 'Episode' : ' Episodes' )}} </span>
                                        <p class="hidden-xs">{{MainBanner.IsSizzle ? '' : desc}}</p>
                                        <a class="hidden-xs" href="#" ng-hide="MainBanner.IsSizzle" ng-click="GetScriptedDetails(MainBanner)">Learn more</a>
                                    </div>
                                      <div class="bg-img-overlay" ng-hide="playBtnClicked"></div>
                                    <div class="play-btn"  ng-show="MainBanner.Video_URL_CMS != '' && MainBanner.Video_URL_CMS !=null && MainBanner.Video_URL_CMS != undefined && !playBtnClicked ">
                                    <a ng-click="playBannerScreener(MainBanner)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn.png"></a>
                                    <span class="trailor-duration"> Trailer 
									<div>{{MainBanner.Video_Time_CMS}}</div></span>
                                </div>
                                <div class="addtolist-btn" ng-hide="MainBanner.IsSizzle || playBtnClicked">
										<button  class="button-md btn-gold margin-top30 addseasonbtn-xs btn-auto" ng-click="AddScriptedToWatchlist(MainBanner.SeriesID,MainBanner.ProgramType);"><span class="addlist-btn" id="{{MainBanner.SeriesID}}banner">Add to watchlists</span></button>
										
                                    </div>
									 <div class="presentlanding-btn">
								   <a ng-show='MainBanner.presentation_url!==null && MainBanner.presentation_url!== undefined && MainBanner.presentation_url!=="" && MainBanner.IsSizzle' href="{{MainBanner.presentation_url}}" download class="button-md btn-gold hidden-sm" ><span class="download-btn">Presentation</span></a>
								  
								  </div>
								  
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <div class="sub-images row sub-images-sm">
                                    <div class="col-md-12 col-sm-3 left-thumb-tablet sub-img-xs" ng-repeat="banner in BannerData" ng-click="DisplayMainImg(banner,$index)">
                                        <div class="sub-img sub-img-initial" ng-style="{'background': 'url('+banner.ImageURLCMS+') scroll 0 0'}">
                                            <div class="trailer-content" style="display: none">
                                              <div class="banner-heading">{{banner.SeriesName}}</div>
                                                <span class="counts">{{banner.SeasonsCount}} Seasons</span><span class="pipe">|</span><span class="counts">{{banner.EpisodesCount}} Episodes</span>
                                                <p class="hidden-xs">{{banner.SeriesDescription}}</p>
                                                <a class="hidden-xs" href="#">{{banner.IsSizzle ? '' : 'Learn more'}}</a>
                                              
                                            </div>
											<div ng-class="{ 'opaque-div': $index == selected }" ></div>
                                          <div class="truncate-box sub-img-holder">
                                            <h3 class="truncate-text">{{banner.SeriesName}}</h3>
                                          
                                        </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-container swiperHeader hidden-lg hidden-md hidden-sm visible-xs swiper-container-padding swiper-xs swiper-mobile">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide img-info" ng-repeat="banner in BannerData">
							 <button style='position:absolute; right:10px;top:10px;display:none;' id="closeBtnId_{{$index}}" type="button" class="close close-btn-gallery" ng-click="closeBannerMobilePlayer($index)" aria-label="Close">
                                        <img class="right" src="<?php echo THEME_URL ?>/images/vplayer_close.png">
                                    </button>
                                <img ng-src="{{banner.ImageURLCMS}}" id="bannerimageId_{{$index}}" alt="">
                                <iframe id="bannerScreenerMobileId_{{$index}}" style="display:none" width="100%" height="100%" scrolling="no" framepadding="0" frameborder="0" allowtransparency="true" seamless="seamless"
                                    allowfullscreen mozallowfullscreen msallowfullscreen webkitallowfullscreen>Your browser does not support iframes.</iframe>
                                <div class="img-overlay" id="imageoverlayId_{{$index}}"></div>
                                <div class="playbtn-img playbtn-mobile" id="playBtnId_{{$index}}" ng-show="banner.Video_URL_CMS != ''">
                                    <a ng-click="playBannerScreenerMobile(banner,$index)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn_white_mobile.png"></a>
                                   <!-- <span class="trailor-duration"> Trailer 
									<div>{{MainBanner.Video_Time_CMS}}</div></span> -->
                                </div>
                                <div class="overlay-swiper-label trailer-swiper" id="overlayId_{{$index}}">
                                    <h3 class="center-head">{{banner.SeriesName}}</h3>
                                    <ul class="thumbnail-links">
                                        <li><a href="#"><span class="counts" ng-hide="(banner.SeasonsCount===0 || banner.SeasonsCount===undefined)">{{banner.SeasonsCount === 0 ? '' : banner.SeasonsCount}} {{(banner.SeasonsCount === 0 || banner.SeasonsCount === undefined )? '' :(banner.SeasonsCount === 1 ? 'Season' : ' Seasons' )}} </span></a></li>
                                            <li ng-hide="(banner.SeasonsCount===0 || banner.SeasonsCount===undefined ||banner.EpisodesCount===0 || banner.EpisodesCount===undefined )">|</li>
                                            <li><a ng-click="GetScriptedDetails(banner)"><span class="counts" ng-hide="(banner.EpisodesCount === 0 || banner.EpisodesCount===undefined )">{{banner.EpisodesCount === 0 ? '' : banner.EpisodesCount}}{{(banner.EpisodesCount === 0 || banner.EpisodesCount === undefined )? '' :(banner.EpisodesCount === 1 ? 'Episode' : ' Episodes' )}} </span></a></li>
                                    </ul>
                                </div>
                            </div>
                                                    
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination swiper-pagination-header"></div>
                    </div>
                </div>


            </div>
           
            <!--./banner end-->
               <div ng-hide='true'>
                 <input id='PageName' value='Factual' />  
</div>			
    <div class="container-lg"  ng-cloak>	 
                <section class="text-center center-heading-box">
                
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-md-offset-3 col-xs-12 abstract">
                               <h1 class="center-head"><?php the_field('title'); ?></h1>
                                <div class="head-md-bg"></div>
                                <p class="centerbox-paragraph"><?php the_field('content'); ?></p>
                            </div>
                        </div>
                        <div ng-hide="true" class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
                            <div align="center" class="browse-scripted-btn">
                                <a ng-click="BrowseAllFactualData('All',1)" class="button-md btn-gold">Browse all factual titles</a>
                            </div>
                        </div>
                    </div>
               
            </section>               
                <section class="text-left dark-bg factual-border" ng-repeat='main in MainSectionFactual' ng-show='main.CollectionList.length>0'>
                
                        <div class="container swiper-slide-heading">
                            
							<div class="row">
                                <div class="col-md-12">
                                    <h3 class="swiper-heading-para swiper-heading">{{main.CategoryName}}</h3>
									<p class="paragrraph paragraph-width">{{main.CategoryDescription}}</p>
                                    <a class="right-align-box-para hidden-sm visible-lg visible-md hidden-xs" ng-click='BrowseAllFactualData(main,1)' href="#">Browse all</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container  swiper-container-padding solid-boxshadow" swiperdirective>
                          <div class="swiper-wrapper">
                                <div class="swiper-slide" ng-click='BrowseAllFactualData(main,collectionDetail)' data-toggle="collapse" ng-repeat="collectionDetail in main.CollectionList | limitTo: 10">
                                   
                                      <img class="img-responsive" ng-if="!(collectionDetail.ImageUrlDesktop1x)" ng-src="{{collectionDetail.ColectionImageUrl}}">
                                      <span picture-fill="" ng-if="collectionDetail.ImageUrlDesktop1x">
                                        <span class="img-responsive-pf" pf-src="{{collectionDetail.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                        <span class="img-responsive-pf" pf-src="{{collectionDetail.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                        <span class="img-responsive-pf" pf-src="{{collectionDetail.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                        <span class="img-responsive-pf" pf-src="{{collectionDetail.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                        <span class="img-responsive-pf" pf-src="{{collectionDetail.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                                        <span class="img-responsive-pf" pf-src="{{collectionDetail.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                                      </span>
                                    <div class="img-overlay"></div>
                                    <div class="overlay-swiper-label">
                                         <h3 class="video-thumb-titles">{{collectionDetail.CollectionName | lowercase}}</h3>
                                        <ul class="thumbnail-links">
                                            <li ng-show='collectionDetail.TilesCount !=null && collectionDetail.TilesCount != undefined && collectionDetail.TilesCount!=0' ><a href="#">{{collectionDetail.TilesCount === 0 ? '' : collectionDetail.TilesCount}} {{(collectionDetail.TilesCount === 0 || collectionDetail.TilesCount === undefined )? '' :(collectionDetail.TilesCount === 1 ? 'Title' : ' Titles' )}}</a></li>
											
										</ul>
                                    </div>
                                </div>
								<div  ng-if='main.CollectionList.length>10' class="swiper-slide browseMore-box">
                            <div class="browseMore playbtn-thumb">
                                 <a  ng-click="BrowseAllFactualData(main,1)">
                                 Browse more titles  <span class="findout-bacgrndimage"></span>
                            </a>
                          </div>
                         </div>
                        </div>
						<!-- Add Pagination -->
                        <div class="swiper-pagination swiper-pagination-mobile swiper-pagination{{$index}} "></div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-next{{$index}}">
                               
                            </div>
                            <div class="swiper-button-prev swiper-button-prev{{$index}}"></div>
			    <a href="#" class="right-align-box-bottom hidden-lg hidden-md visible-sm visible-xs" ng-click='BrowseAllFactualData(main,1)' >Browse all</a>
                            </div>
                             
                            
                       
                        
                   
                </section>
              </div>
			   <div class="container">
                <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
                    <div align="center" class="browse-lastbtn">
                        <a ng-click="BrowseAllFactualData('All',1)" class="button-md btn-gold">Browse all factual titles</a>
                    </div>
                </div>
            </div>
          
   </div>
  <!--./content end-->
  

<?php 
get_footer();
?>