<?php  logincheck(); ?>
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Scriptedpage
 */

get_header(); ?>

<div  ng-controller="ScriptedSeriesController">
<div class="content content-mobile" >
<div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
                      <!--./banner start-->
            <div class="banner-wrapper" ng-cloak>
                <div class="container-lg">
                    <div class="banner visible-lg visible-md visible-sm hidden-xs">
                        <div class="row">
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
                                    <div class="play-btn" ng-show="MainBanner.Video_URL_CMS != '' && MainBanner.Video_URL_CMS !=null && MainBanner.Video_URL_CMS != undefined && !playBtnClicked ">
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
                                    <div class="col-md-12 col-sm-3 left-thumb-tablet sub-img-xs" ng-repeat="banner in BannerData" ng-click="DisplayMainImg(banner,$index);"  >
                                        <div class="sub-img sub-img-initial" ng-style="{'background': 'url('+banner.ImageURLCMS+') scroll 0 0'}">
                                            <div class="trailer-content" style="display: none">
                                              <div class="banner-heading">{{banner.SeriesName}}</div>
                                                <span class="counts">{{banner.SeasonsCount}} Seasons</span><span class="pipe">|</span><span class="counts">{{banner.EpisodesCount}} Episodes</span>
                                                <p class="hidden-xs">{{banner.SeriesDescription}}</p>
                                                <a class="hidden-xs" href="#">{{banner.IsSizzle ? '' : 'Learn more'}}</a>
                                              
                                            </div>
											<div ng-class="{ 'opaque-div': $index === selected }" ></div>
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
            

             <div class="container-lg">
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
                               <a href="#" ng-click="BrowseAllData()"   class="button-md btn-gold">Browse all scripted titles</a>
                            </div>
                        </div>                        
                    </div>
           
            </section>  


                 <!--./main content start-->
      
            <section class="text-left dark-bg" ng-show="NewScriptedList.length>2">
             
                     <div class="container swiper-slide-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="swiper-heading">New Series</h3>
                                <a class="right-align-box hidden-sm visible-lg visible-md hidden-xs" ng-show=false ng-click="BrowseAllData()"  href="#">Browse all</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container swiper1 swiper-container-padding"  ng-cloak>
                        
                            <div class="swiper-wrapper" >
                                <div class="swiper-slide"  ng-repeat="series in NewScriptedList | limitTo: 10" data-toggle="collapse">
                                  <img ng-if="(series.ImageURLCMS && series.ImageURLCMS!=='')|| !(series.ImageUrlDesktop1x)" ng-src="{{series.ImageURLCMS ? series.ImageURLCMS : series.ImageURL}}">
                                    <span picture-fill="" ng-if="series.ImageUrlDesktop1x && (series.ImageURLCMS===null || series.ImageURLCMS==='')">
                                      <span pf-src="{{series.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                      <span pf-src="{{series.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                      <span pf-src="{{series.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                      <span pf-src="{{series.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                      <span pf-src="{{series.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                                      <span pf-src="{{series.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                                    </span>
                                    <div class="img-overlay" ng-click="GetScriptedDetails(series)"></div>
                                  <div class="plus-img">
                        <img  class="{{series.SeriesID + 'plus'}}" ng-click="AddToWatchlist(series.SeriesID,series.ProgramType)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_gold.png">
						<img  class="{{series.SeriesID + 'minus'}}" ng-click="AddToWatchlist(series.SeriesID,series.ProgramType)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_gold.png" style="display:none">
                      </div>
                                    <div class="overlay-swiper-label" ng-click="GetScriptedDetails(series)">
                                        <h3 class="video-thumb-titles">{{series.SeriesName}}</h3>
                                        <ul class="thumbnail-links">
                                            <li><a href="#">SCRIPTED</a></li>
											<li  ng-hide="((series.SeasonsCount===0 || series.SeasonsCount===undefined) && (series.EpisodesCount===0 || series.EpisodesCount===undefined ))">|</li>
                                            <li><a href="#"><span class="counts" ng-hide="(series.SeasonsCount===0 || series.SeasonsCount===undefined)">{{series.SeasonsCount === 0 ? '' : series.SeasonsCount}} {{(series.SeasonsCount === 0 || series.SeasonsCount === undefined )? '' :(series.SeasonsCount === 1 ? 'Season' : ' Seasons' )}} </span></a></li>
                                            <li ng-hide="(series.SeasonsCount===0 || series.SeasonsCount===undefined ||series.EpisodesCount===0 || series.EpisodesCount===undefined )">|</li>
                                            <li><a href="#"><span class="counts" ng-hide="(series.EpisodesCount === 0 || series.EpisodesCount===undefined )">{{series.EpisodesCount === 0 ? '' : series.EpisodesCount}}{{(series.EpisodesCount === 0 || series.EpisodesCount === undefined )? '' :(series.EpisodesCount === 1 ? 'Episode' : ' Episodes' )}} </span></a></li>
											<li ng-show="(series.ParentSeriesName!=null)">{{(series.ParentSeriesName!=null ? '|' : '')}}</li>
                                              <li ng-show="(series.ParentSeriesName!=null)">
                                                {{(series.ParentSeriesName!=null ? series.ParentSeriesName : '')}}
                                              </li>
                                        </ul>
                                    </div>
                                </div>
								
								  <div  ng-show='newMore' class="swiper-slide browseMore-box">
                                                            <div class="browseMore playbtn-thumb">
                                                            <a ng-click="BrowseAllData()">Browse more titles <span class="findout-bacgrndimage"></span></a>
                                                            </div>
                                                        </div>
								
                              </div>
                              
                        <div class="swiper-pagination swiper-pagination-mobile swiper-pagination1"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-next1">
                        </div>
                        <div class="swiper-button-prev swiper-button-prev1"></div>
                     <a class="right-align-box-bottom hidden-lg hidden-md visible-sm visible-xs" ng-click="BrowseAllData()" ng-show=false  href="#">Browse all</a>
                    </div>
                  			
               
                                   
            </section>
            <section class="text-left dark-bg" ng-show="PopularScriptedList.length>2">
               
                    
                        <div class="container swiper-slide-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="swiper-heading">Popular Series</h3>
                                <a class="right-align-box hidden-sm visible-lg visible-md hidden-xs" ng-show=false ng-click="BrowseAllData()"  href="#">Browse all</a>
                            </div>
                        </div>
                    </div>
                 
                    <div class="swiper-container swiper2 swiper-container-padding" ng-cloak>
                        <div class="swiper-wrapper" >
                                <div class="swiper-slide"  ng-repeat="series in PopularScriptedList | limitTo: 10">
                                  <img ng-if="(series.ImageURLCMS && series.ImageURLCMS!=='')|| !(series.ImageUrlDesktop1x)" ng-src="{{series.ImageURLCMS ? series.ImageURLCMS : series.ImageURL}}">
                                    <span picture-fill="" ng-if="series.ImageUrlDesktop1x && (series.ImageURLCMS===null || series.ImageURLCMS==='')">
                                      <span pf-src="{{series.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                      <span pf-src="{{series.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                      <span pf-src="{{series.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                      <span pf-src="{{series.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                      <span pf-src="{{series.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                                      <span pf-src="{{series.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                                    </span>
                                    <div class="img-overlay" ng-click="GetScriptedDetails(series)"></div>
                                        <div class="plus-img" >
                        <img  class="{{series.SeriesID + 'plus'}}" ng-click="AddToWatchlist(series.SeriesID,series.ProgramType)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_gold.png">
						<img  class="{{series.SeriesID + 'minus'}}" ng-click="AddToWatchlist(series.SeriesID,series.ProgramType)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_gold.png" style="display:none">
                      </div>
                                    <div class="overlay-swiper-label" ng-click="GetScriptedDetails(series)">
                                        <h3 class="video-thumb-titles">{{series.SeriesName}}</h3>
                                        <ul class="thumbnail-links">
                                            <li><a href="#">SCRIPTED</a></li>
											<li  ng-hide="((series.SeasonsCount===0 || series.SeasonsCount===undefined) && (series.EpisodesCount===0 || series.EpisodesCount===undefined ))">|</li>
                                            <li><a href="#"><span class="counts" ng-hide="(series.SeasonsCount===0 || series.SeasonsCount===undefined)">{{series.SeasonsCount === 0 ? '' : series.SeasonsCount}} {{(series.SeasonsCount === 0 || series.SeasonsCount === undefined )? '' :(series.SeasonsCount === 1 ? 'Season' : ' Seasons' )}} </span></a></li>
                                            <li ng-hide="(series.SeasonsCount===0 || series.SeasonsCount===undefined ||series.EpisodesCount===0 || series.EpisodesCount===undefined )">|</li>
                                            <li><a href="#"><span class="counts" ng-hide="(series.EpisodesCount === 0 || series.EpisodesCount===undefined )">{{series.EpisodesCount === 0 ? '' : series.EpisodesCount}}{{(series.EpisodesCount === 0 || series.EpisodesCount === undefined )? '' :(series.EpisodesCount === 1 ? 'Episode' : ' Episodes' )}} </span></a></li>
											<li ng-show="(series.ParentSeriesName!=null)">{{(series.ParentSeriesName!=null ? '|' : '')}}</li>
                                              <li ng-show="(series.ParentSeriesName!=null)">
                                                {{(series.ParentSeriesName!=null ? series.ParentSeriesName : '')}}
                                              </li>
                                        </ul>
                                    </div>
                                </div>
								
								 <div  ng-show='popularMore' class="swiper-slide browseMore-box">
                                                            <div class="browseMore playbtn-thumb">
                                                            <a ng-click="BrowseAllData()">Browse more titles  <span class="findout-bacgrndimage"></span></a>
                                                            </div>
                                                        </div>
                              </div>
                       
                        <!-- Add Pagination -->
                        <div class="swiper-pagination swiper-pagination-mobile swiper-pagination2"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-next2"></div>
                        <div class="swiper-button-prev swiper-button-prev2"></div>
                       <a class="right-align-box-bottom hidden-lg hidden-md visible-sm visible-xs" ng-show=false ng-click="BrowseAllData()"  href="#">Browse all</a>
                    </div>
                 
				  
				 
				 
            

            </section>
            <section class="text-left dark-bg dark-bg-lastbox grey-bg-border" ng-show="MiniSeriesScriptedList.length>2">
               
                  <!--add to lists circle start-->
                    <!--add to lists circle end-->
                    <div class="container swiper-slide-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="swiper-heading">Mini-Series</h3>
                               <a class="right-align-box hidden-sm visible-lg visible-md hidden-xs" ng-click="BrowseAllData()" ng-show=false href="#">Browse all</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container swiper3 swiper-container-padding"  ng-cloak>
                        <div class="swiper-wrapper">
                            <div  ng-repeat="series in MiniSeriesScriptedList | limitTo: 10" class="swiper-slide">
                              <img ng-if="(series.ImageURLCMS && series.ImageURLCMS!=='')|| !(series.ImageUrlDesktop1x)" ng-src="{{series.ImageURLCMS ? series.ImageURLCMS : series.ImageURL}}">
                                <span picture-fill="" ng-if="series.ImageUrlDesktop1x && (series.ImageURLCMS===null || series.ImageURLCMS==='')">
                                  <span pf-src="{{series.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                  <span pf-src="{{series.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                  <span pf-src="{{series.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                  <span pf-src="{{series.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                  <span pf-src="{{series.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                                  <span pf-src="{{series.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                                </span>
                                    <div class="img-overlay" ng-click="GetScriptedDetails(series)"></div>
                                   <div class="plus-img" >
                        <img  class="{{series.SeriesID + 'plus'}}" ng-click="AddToWatchlist(series.SeriesID,series.ProgramType)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_gold.png">
						<img  class="{{series.SeriesID + 'minus'}}" ng-click="AddToWatchlist(series.SeriesID,series.ProgramType)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_gold.png" style="display:none">
                      </div>
                                    <div class="overlay-swiper-label" ng-click="GetScriptedDetails(series)">
                                        <h3 class="video-thumb-titles">{{series.SeriesName}}</h3>
                                        <ul class="thumbnail-links">
                                            <li><a href="#">SCRIPTED</a></li>
											<li  ng-hide="((series.SeasonsCount===0 || series.SeasonsCount===undefined) && (series.EpisodesCount===0 || series.EpisodesCount===undefined ))">|</li>
                                            <li><a href="#"><span class="counts" ng-hide="(series.SeasonsCount===0 || series.SeasonsCount===undefined)">{{series.SeasonsCount === 0 ? '' : series.SeasonsCount}} {{(series.SeasonsCount === 0 || series.SeasonsCount === undefined )? '' :(series.SeasonsCount === 1 ? 'Season' : ' Seasons' )}} </span></a></li>
                                            <li ng-hide="(series.SeasonsCount===0 || series.SeasonsCount===undefined ||series.EpisodesCount===0 || series.EpisodesCount===undefined )">|</li>
                                            <li><a href="#"><span class="counts" ng-hide="(series.EpisodesCount === 0 || series.EpisodesCount===undefined )">{{series.EpisodesCount === 0 ? '' : series.EpisodesCount}}{{(series.EpisodesCount === 0 || series.EpisodesCount === undefined )? '' :(series.EpisodesCount === 1 ? 'Episode' : ' Episodes' )}} </span></a></li>
											<li ng-show="(series.ParentSeriesName!=null)">{{(series.ParentSeriesName!=null ? '|' : '')}}</li>
                                              <li ng-show="(series.ParentSeriesName!=null)">
                                                {{(series.ParentSeriesName!=null ? series.ParentSeriesName : '')}}
                                              </li>
                                        </ul>
                                    </div>
                            </div>
							
								  <div   ng-show='miniMore'  class="swiper-slide browseMore-box">
                                                            <div class="browseMore playbtn-thumb">
                                                            <a ng-click="BrowseAllData()">Browse more titles  <span class="findout-bacgrndimage"></span></a>
                                                            </div>
                                                        </div>
                            </div>
                       
                        <!-- Add Pagination -->
                        <div class="swiper-pagination swiper-pagination-mobile swiper-pagination3"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-next3"></div>
                        <div class="swiper-button-prev swiper-button-prev3"></div>
                        <a class="right-align-box-bottom hidden-lg hidden-md visible-sm visible-xs"  ng-click="BrowseAllData()" ng-show=false  href="#">Browse all</a>
                    </div>
                  			
                
            </section>
</div> 
 <div class="container">
                <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
                    <div align="center" class="browse-lastbtn">
                        <a href="#" ng-click="BrowseAllData()"  class="button-md btn-gold">Browse all scripted titles</a>
                    </div>
                </div>
            </div>       
        

    </div>
</div>
<!--./main content end-->
		<div class="modal-main-panel" id="videoPlayerModalId">
        </div>

		
		
		
		<?php 
get_footer();
