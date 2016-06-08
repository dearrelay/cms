<?php  logincheck(); ?>
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Movie-Details
 */

get_header(); ?>
        <!--./main content start-->
<div ng-controller="ScriptedDetailController">
        <div class="content content-mobile noprint" >
		<div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
            <!--./banner start-->
            <div class="banner-wrapper">
                <div class="container-lg">
                    <div class="detail-banner-wrapper border-none">
					<div class="hidden-md hidden-lg hidden-sm visible-xs mobileoverlay-wrap">
						
						<a class="mobilebackbtn-img" href="javascript:history.go(-1)">
						
						</a>                       
                       
                           <div class="banner-heading banner-headingdetail-xs mbt-25 hidden-sm hidden-lg hidden-md visible-xs" >{{SeriesDetailsInformation.SeriesName}}</div>
  
                    </div>
						
                        <div class="detail-banner-box" >
                          <img class="detail-banner-img" ng-if="!(SeriesDetailsInformation.ImageUrlDesktop1x)" ng-src="{{SeriesDetailsInformation.SeriesImageUrl}}">
                            <span picture-fill="" ng-if="SeriesDetailsInformation.ImageUrlDesktop1x">
                              <span class="detail-banner-img-pf" pf-src="{{SeriesDetailsInformation.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                              <span class="detail-banner-img-pf" pf-src="{{SeriesDetailsInformation.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                              <span class="detail-banner-img-pf" pf-src="{{SeriesDetailsInformation.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                              <span class="detail-banner-img-pf" pf-src="{{SeriesDetailsInformation.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                              <span class="detail-banner-img-pf" pf-src="{{SeriesDetailsInformation.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                              <span class="detail-banner-img-pf" pf-src="{{SeriesDetailsInformation.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                            </span>
                            <div class="bg-img-overlay hidden-xs"></div>
						   <div class="mobilebanner-img-overlay hidden-md hidden-lg hidden-sm"></div>
                            <div class="trailer-content">
                             <div class="banner-heading banner-headingdetail-xs mbt-25 hidden-xs hidden-lg hidden-md visible-sm" >{{SeriesDetailsInformation.SeriesName.length>80?SeriesDetailsInformation.SeriesName.substring(0,80)+'...':SeriesDetailsInformation.SeriesName}}</div>
								 <div class="banner-heading banner-headingdetail-xs mbt-25 hidden-sm visible-lg visible-md hidden-xs" >{{SeriesDetailsInformation.SeriesName}}</div>
                                  <span ng-show='(EpisodeViewInformation.YearReleased !=null && EpisodeViewInformation.YearReleased != undefined && EpisodeViewInformation.YearReleased !=0)' class="counts hidden-xs">Released In {{EpisodeViewInformation.YearReleased}}</span>
                                
                                
                                <p ng-show='(SeriesDetailsInformation.AveragePieceLength !=null && SeriesDetailsInformation.AveragePieceLength != undefined && SeriesDetailsInformation.AveragePieceLength !=0)' class="average-count hidden-xs">Duration: {{(SeriesDetailsInformation.AveragePieceLength>=2? SeriesDetailsInformation.AveragePieceLength+' hours': SeriesDetailsInformation.AveragePieceLength+' hour')}} 
                                </p>
                            </div>


                            <div ng-hide='true' class="play-btn banner-playbtn banner-playbtn-xs">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn.png" alt="play_btn">
                                <span class="trailor-duration">Trailer
                                    <br>
                                    <span class="hidden-xs">00:01:32</span>
									</span>

                            </div>
                            

                           <div class="banner-btngroup details-btngroup container">
                             <a href="#" class="button-md btn-gold hidden-sm print-mainbtn" ng-click="printPDF()">
                               <span class="print-btn">Print PDF</span>
                             </a>
                                <a ng-show='CastingVariable.presentation_url!=null && CastingVariable.presentation_url!= undefined && CastingVariable.presentation_url!=""' href="{{CastingVariable.presentation_url}}" download class="button-md btn-gold hidden-sm presentation-mainbtn" ><span class="download-btn">Presentation</span></a>
                             <a href="#" class="button-width-auto button-md btn-gold hidden-xs margin-top30 {{EpisodeViewInformation.PieceID}}plus"ng-click="AddToWatchlist(EpisodeViewInformation.PieceID,'piece');"><span class="addlist-btn">Add to watchlists</span></a>
																 <a href="#" class="button-width-auto button-md btn-gold hidden-xs margin-top30 {{EpisodeViewInformation.PieceID}}minus" style="display:none" ng-click="AddToWatchlist(EpisodeViewInformation.PieceID,'piece');"><span class="removelist-btn">Remove  from watchlists</span></a>

                                </div>
                        </div>

                    </div>


                </div>
            </div>
            <!--./banner end-->

            <div class="dark-bg-large detail-darkbg last-box border-top-none">

                <section >
					<div  ng-cloak class="hidden-lg hidden-md hidden-sm visible-xs banner-info" ng-show='totalPage'>
                        <div class="banner-info-mobile">
                           
                        </div>
            <p class="average-count" ng-show='(SeriesDetailsInformation.AveragePieceLength !=null && SeriesDetailsInformation.AveragePieceLength != undefined && SeriesDetailsInformation.AveragePieceLength !=0)'>
              Duration: {{(SeriesDetailsInformation.AveragePieceLength>=2? SeriesDetailsInformation.AveragePieceLength+' hours': SeriesDetailsInformation.AveragePieceLength+' hour')}}
              
                    </div>
                    <div ng-show='false' ng-cloak class="hidden-lg hidden-md hidden-sm visible-xs detailbtn-xs" ng-show='totalPage'>
                       <!-- <a href="#" class="button-md btn-gold"><span class="print-btn"></span></a> -->
                        <a href="#" class="button-md btn-gold"><span class="addlist-btn"></span></a>
                    </div>
                   <div ng-cloak class="container hidden-sm hidden-xs" ng-show='totalPage'>
                        <ul class="nav nav-tabs tab-design1" id="maintab">
                            <li class="active"><a href="#sectionA">Details</a></li>
                            <li><a ng-click='MainAssetAdding()' href="#sectionB">Assets</a></li>

                        </ul>


                    </div>
					<div class="container-lg" ng-show='totalPage'>
                    <div  class="tab-content" >
                        <div id="sectionA" class="tab-pane fade in active">
                          <div  ng-cloak class="container detail-container swiper-slide-heading"  >
						  
						  <!--ng-hide= "(CastingVariable1.pagecontent =='' || CastingVariable1.pagecontent==null || CastingVariable1.pagecontent ==undefined) && (SeriesDetailsInformation.SeriesDescription =='' || SeriesDetailsInformation.SeriesDescription==null || SeriesDetailsInformation.SeriesDescription ==undefined)"-->

                                <div class="row">
                                    <div class="col-md-6 detail-desc-box-left">
                                       <?php if($post->post_content!=="") : ?>
                                                 <h2 class="tab-heading">
                                               <?php echo $post->post_content; ?>
                                                </h2>
                                                <div class="border-small"  ></div>
                                        <?php endif; ?>
									   
										<!--ng-hide= "CastingVariable1.pagecontent =='' || CastingVariable1.pagecontent==null || CastingVariable1.pagecontent ==undefined"-->
                                        <div class="bg-cloud"  ></div>
										<!--ng-hide= "CastingVariable1.pagecontent =='' || CastingVariable1.pagecontent==null || CastingVariable1.pagecontent ==undefined"-->
                                    </div>
                                    <div class="col-md-6 detail-desc-box-right">
                                        <p class="load-multitext"> 
                                            {{SeriesDetailsInformation.SeriesDescription}}
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <section class="episode-box episode-detail-sm" >
                                <div class="dark-bg-medium detail-darkbg-sm detail-darkbg-xs hr-light">

                                    <section>
									<div class="container">
                                        <ul class="nav nav-tabs tab-design1 tabinside" id="maintab2">
                                            <li class="active"><a href="#sectionAB">Movie Detail</a></li>
                                            <li ng-show='gallary.length>0'><a href="#sectionBB">Browse Gallery ({{gallary.length}})</a></li>

                                        </ul>
										</div>
                                        
                                        <div class="tab-content">
                                            <div id="sectionAB" class="tab-pane fade in active" ng-cloak>
                                                


                                                
                                                    <div class="container swiper-slide-heading ">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-12 episode-desc detail-desc-box-left">
                                                               
                                                                <p ng-bind-html="EpisodeViewInformation.PieceDescription">
                                                                    
                                                                </p>
                                                                <a href="#" class="button-width-auto button-md btn-gold hidden-sm hidden-xs margin-top30 {{EpisodeViewInformation.PieceID}}plus"ng-click="AddToWatchlist(EpisodeViewInformation.PieceID,'piece');"><span class="addlist-btn">Add title to watchlists</span></a>
																 <a href="#" class="button-width-auto button-md btn-gold hidden-sm hidden-xs margin-top30 {{EpisodeViewInformation.PieceID}}minus" style="display:none" ng-click="AddToWatchlist(EpisodeViewInformation.PieceID,'piece');"><span class="removelist-btn">Remove title from watchlists</span></a>
                                                            </div>
                                                            <div class="col-md-8 col-xs-12 detail-desc-box-right movie-desc-right">
                                                                <div class="detail-image-box movie-box-image video-player-pop">
                                                                  <img ng-show='!isPlayClicked' ng-if="!(EpisodeViewInformation.ImageUrlDesktop1x)" ng-src="{{EpisodeViewInformation.EpisodeImageUrl}}">
                                                                    <span picture-fill="" ng-if="EpisodeViewInformation.ImageUrlDesktop1x">
                                                                      <span ng-show='!isPlayClicked' pf-src="{{EpisodeViewInformation.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                                                      <span ng-show='!isPlayClicked' pf-src="{{EpisodeViewInformation.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                                                      <span ng-show='!isPlayClicked' pf-src="{{EpisodeViewInformation.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                                                      <span ng-show='!isPlayClicked' pf-src="{{EpisodeViewInformation.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                                                      <span ng-show='!isPlayClicked' pf-src="{{EpisodeViewInformation.ImageUrlDesktop2x}}" data-media="(min-width: 992px)"></span>
                                                                    </span> 
                                                                    <iframe width="100%" ng-show='isPlayClicked' style="height:450px;" id="screenerEpisode" scrolling="no" framepadding="0" frameborder="0" allowtransparency="true" seamless="seamless"
                                    allowfullscreen mozallowfullscreen msallowfullscreen webkitallowfullscreen>Your browser does not support iframes.</iframe>
                                                                </div>
                                                                
                                                                <div ng-show='EpisodeViewInformation.IScreenerAvailable' ng-click="playScreenerMovie()" class="playbtn-img hidden-xs">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn.png">
                                <span class="trailor-duration">WATCH MOVIE<br>
                                    <span>{{EpisodeViewInformation.Duration}}</span></span>

									
                            </div>

							<div class="play-btn banner-playbtn banner-playbtn-xs visible-xs hidden-sm hidden-lg hidden-md" ng-click="playScreenerMovie()" ng-show='!isPlayClicked'>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn.png" alt="back_btn">
                            </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                               




                                            </div>

                                             <div id="sectionBB" class="tab-pane fade" ng-cloak>
                                                

                                                <div class="swiper-container sectionBB browseGallerySwiper swiper-btmnone swiper-container-padding">
                                                    <div class="swiper-wrapper" >
                                                        <div class="swiper-slide img-info" ng-repeat='browsegallery in gallary'>
                                                            <img ng-src="{{browsegallery.GalleryUrl}}" alt="">
                                                            <div class="watchList-hover" ng-click="ShowPopup(Gallery.GalleryUrl,$index)"><!--  data-toggle="modal" data-target="#myModal">-->
                                                                <div class="watchlist-thumb">
                                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/view_image.png">
                                                                </div>
                                                                <p class="watchlist-para">
                                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit pellentesque interdum arcu eu velit
                                                                </p>
                                                            </div>
                                                            <div class="img-overlay"></div>
                                                            <div ng-hide="Gallery.DownloadUrl===null || Gallery.DownloadUrl=== undefined" class="download-img">
																<a  href="{{Gallery.DownloadUrl}}" download ><img class="hidden-xs" src="<?php echo get_stylesheet_directory_uri(); ?>/images/download_gold.png"></a>
															</div>
                                                            <div class="overlay-swiper-label">
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                    <!-- Add Pagination -->
                                                    <div class="swiper-pagination pagination-center swiper-pagination-bg1" id="swiper-pagination"></div>
                                                    <!-- Add Arrows -->
                                                    <div class="swiper-button-next swiper-button-next-bg1"></div>
                                                    <div class="swiper-button-prev swiper-button-prev-bg1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                </div>

                                <!--CAST members start-->
                                <div ng-show='CastingDetails.length>0' class="dark-bg-cast border-top"  ng-cloak >
                                    <div class="container swiper-slide-heading" >
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="swiper-heading cast-heading">cast</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-container castSwiper1 swiper-btmnone swiper-container-padding swipercontainer-moviecast">
                                        <div class="swiper-wrapper">
                                           <div class="swiper-slide cast-slide" ng-repeat="regular in CastingDetails  | limitTo: 10">
                                                <img ng-src="{{regular.image.sizes.thumbnail !=null && regular.image.sizes.thumbnail !=undefined && regular.image.sizes.thumbnail !='' ?regular.image.sizes.thumbnail:ViewBannerDefault}}" alt="">
                                                <div class="img-overlay"></div>
                                                <div class="overlay-swiper-label">
                                                    <div class="cast-name">{{regular.cast_real_name}}</div>
                                                    <div class="character-name">{{regular.character_name}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination pagination-center swiper-pagination-cast1"></div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next swiper-button-next-cast1"></div>
                                        <div class="swiper-button-prev swiper-button-next-cast1"></div>
                                    </div>
                                </div>

                                <!--CAST members end-->

                              <div class="dark-bg-medium last-box-rating last-box" ng-cloak>
                                    <!--Ratiing section start-->
                                                                     <div  ng-show="ratingResponse.length>0"  class="container">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="row">
                                                <div ng-show="ratingResponse.length>=2" class="col-md-3 col-sm-3 hidden-xs hidden-sm text-center rating-box">
                                                    <div  ng-click="ratingNumber(ratingResponse[0],'rating1')" class="{{(ratingResponse.length==2 || ratingResponse.length==3)? 'circle-wrapper rating1 selected margin-btm0  ':'circle-wrapper rating1 selected '}}" ng-show='ratingResponse[0].rating_type=="Numeric"'>
                                                        <div class="review-circle">
                                                            <h2 class="rating">{{ratingResponse[0].rating_numeric}}</h2>

                                                        </div>
                                                        <a href="" ng-click='openingWebSite(ratingResponse[0])'  ><span>{{ratingResponse[0].site_name}}</span></a>

                                                    </div>
													<div  ng-click="ratingNumber(ratingResponse[0],'rating1')" class="{{(ratingResponse.length==2 || ratingResponse.length==3)?'circle-wrapper hidden-xs hidden-sm rating1 margin-btm0 selected':'circle-wrapper hidden-xs hidden-sm rating1 selected'}}" ng-show='ratingResponse[0].rating_type=="Star"'>
                                                        <div class="review-circle">
                                                            <h2 class="rating-head">{{ratingResponse[0].rating}}</h2>
                                                            <div class="stars-aj">
                                                               <span class="star-selected" ng-repeat="i in range(ratingResponse[0].rating)" ></span>
                                                             
                                                                <!--<span  ng-show="hidingStar1(ratingResponse[0].rating)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[0].rating)" class="star-unselected"></span>
                                                            </div>
                                                        </div>
                                                        <a href="" ng-click='openingWebSite(ratingResponse[0])'><span>{{ratingResponse[0].site_name}}</span></a>

                                                    </div>
													<div ng-show='ratingResponse.length==4 && ratingResponse[2].rating_type=="Numeric"' ng-click="ratingNumber(ratingResponse[2],'rating3')" class="circle-wrapper rating3 margin-btm0" >
                                                        <div class="review-circle">
                                                            <h2 class="rating">{{ratingResponse[2].rating_numeric}}</h2>

                                                        </div>
                                                        <a href="" ng-click='openingWebSite(ratingResponse[2])'><span>{{ratingResponse[2].site_name}}</span></a>

                                                    </div>
                                                    <div ng-show='ratingResponse.length==4 && ratingResponse[2].rating_type=="Star"' ng-click="ratingNumber(ratingResponse[2],'rating3')" class="circle-wrapper hidden-xs hidden-sm margin-btm0 rating3" >
                                                        <div class="review-circle ">
                                                            <h2 class="rating-head">{{ratingResponse[2].rating}}</h2>
                                                            <div class="stars-aj">
                                                               <span class="star-selected" ng-repeat="i in range(ratingResponse[2].rating)" ></span>
                                                             
                                                               <!-- <span  ng-show="hidingStar1(ratingResponse[2].rating)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[2].rating)" class="star-unselected"></span>
                                                            </div>
                                                        </div>
                                                        <a href="" ng-click='openingWebSite(ratingResponse[2])'><span>{{ratingResponse[2].site_name}}</span></a>

                                                    </div>
                                                </div>
                                                <div ng-show="ratingResponse.length>=2" class="col-md-6 col-sm-12 text-center rating-box  hidden-xs hidden-sm">
                                                    <div class="square-wrapper">
                                                        <p class="para-quote" ng-bind-html="(review.length>300?review.substring(0,300)+'...':review)"></p>

                                                        <div class="author-detail">
                                                            <span class="authorname">{{AuthorName}}</span>
                                                            <span class="channelname">{{ChannelName}}</span>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div  class="col-md-6 col-sm-12 text-center rating-box visible-sm  visible-xs ">
                                                    <div class="square-wrapper">
                                                        <p class="para-quote" ng-bind-html="(review.length>300?review.substring(0,300)+'...':review)"></p>

                                                        <div class="author-detail">
                                                            <span class="authorname">{{AuthorName}}</span>
                                                            <span class="channelname">{{ChannelName}}</span>
                                                        </div>

                                                    </div>

                                                </div>
                                                                                   
                                                                   
                                                       
                                  
                                  
<div class="visible-xs rating-mobile">
    <div class="swiper-container ratingSwiper swiper-container-padding swiper-rating-border">
        <div class="swiper-wrapper">
            <div ng-click="ratingNumber(ratingResponse[0],'rating1')" class="swiper-slide rating-slide"  ng-if='ratingResponse[0].rating_type==="Numeric"' >
                <div class='rating1 selected' >
                    <h2 class="rating rating-xs">{{ratingResponse[0].rating_numeric}}</h2>
                    <span ng-click='openingWebSite(ratingResponse[0])' class="rating-label-mob">{{ratingResponse[0].site_name}}</span>
                </div>
            </div>
            <div ng-click="ratingNumber(ratingResponse[0],'rating1')" ng-if="ratingResponse[0].rating_type==='Star'" class="swiper-slide rating-slide img-info">
                <div class="circle-wrapper selected rating1" >
                    <div class="review-circle">
                        <h2 class="rating-head">{{ratingResponse[0].rating}}</h2>
                        <div class="stars-aj">
						                                       <span class="star-selected" ng-repeat="i in range(ratingResponse[0].rating)" ></span>
                                                             
                                                                <!--<span  ng-show="hidingStar1(ratingResponse[0].rating/2)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[0].rating)" class="star-unselected"></span>
                            
                                    </div>
                                </div>
                                <div ng-click='openingWebSite(ratingResponse[0])' class="rating-label-mob text-center">{{ratingResponse[0].site_name}}</div>
                            </div>
                        </div>
            <div class="swiper-slide rating-slide" ng-click="ratingNumber(ratingResponse[1],'rating2')" ng-if='ratingResponse[1].rating_type==="Numeric"'>
                            <div class='rating2'>
                                <h2 class="rating rating-xs">{{ratingResponse[1].rating_numeric}}</h2>
                                <span ng-click='openingWebSite(ratingResponse[1])' class="rating-label-mob">{{ratingResponse[1].site_name}}</span>
                            </div>
                        </div>
            <div ng-click="ratingNumber(ratingResponse[1],'rating2')"  ng-if='ratingResponse[1].rating_type==="Star"' class="swiper-slide rating-slide img-info">
                            <div class="circle-wrapper rating2">
                                <div class="review-circle">
                                    <h2 class="rating-head">{{ratingResponse[1].rating}}</h2>
                                    <div class="stars-aj">
                                        <span class="star-selected" ng-repeat="i in range(ratingResponse[1].rating)" ></span>
                                                             
                                                                <!--<span  ng-show="hidingStar1(ratingResponse[1].rating/2)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[1].rating)" class="star-unselected"></span>
                                                </div>
                                            </div>
                                            <div  ng-click='openingWebSite(ratingResponse[1])' class="rating-label-mob text-center">{{ratingResponse[1].site_name}}</div>
                                        </div>
                                    </div>
            <div ng-click="ratingNumber(ratingResponse[2],'rating3')" ng-if='ratingResponse[2].rating_type==="Numeric"' class="swiper-slide rating-slide">
                                        <div class='rating3'>
                                            <h2 class="rating rating-xs">{{ratingResponse[2].rating_numeric}}</h2>
                                            <span ng-click='openingWebSite(ratingResponse[2])' class="rating-label-mob">{{ratingResponse[2].site_name}}</span>
                                        </div>
                                    </div>
            <div ng-click="ratingNumber(ratingResponse[2],'rating3')" ng-if='ratingResponse[2].rating_type==="Star"' class="swiper-slide rating-slide img-info">
                <div class="circle-wrapper rating3">
                    <div class="review-circle">
                        <h2 class="rating-head">{{ratingResponse[2].rating}}</h2>
                        <div class="stars-aj">
                            <span class="star-selected" ng-repeat="i in range(ratingResponse[2].rating)" ></span>

                                        <!--<span  ng-show="hidingStar1(ratingResponse[2].rating/2)" class="star-semiselected"></span>-->
                                        <span ng-repeat="i in rangeforhide(ratingResponse[2].rating)" class="star-unselected"></span>
                                    </div>
                                </div>
                                <div  ng-click='openingWebSite(ratingResponse[2])' class="rating-label-mob text-center">{{ratingResponse[2].site_name}}</div>
                            </div>
                        </div>
            <div ng-click="ratingNumber(ratingResponse[3],'rating4')" ng-if='ratingResponse[3].rating_type==="Numeric"' class="swiper-slide rating-slide">
                <div class='rating4'>
                    <h2 class="rating rating-xs">{{ratingResponse[3].rating_numeric}}</h2>
                    <span ng-click='openingWebSite(ratingResponse[3])' class="rating-label-mob">{{ratingResponse[3].site_name}}</span>
                </div>
            </div>
            <div ng-click="ratingNumber(ratingResponse[3],'rating4')" ng-if='ratingResponse[3].rating_type==="Star"' class="swiper-slide rating-slide img-info">
                <div class="circle-wrapper rating4">
                    <div class="review-circle">
                        <h2 class="rating-head">{{ratingResponse[3].rating}}</h2>
                        <div class="stars-aj">
                            <span class="star-selected" ng-repeat="i in range(ratingResponse[3].rating)" ></span>

                            <!--<span  ng-show="hidingStar1(ratingResponse[3].rating/2)" class="star-semiselected"></span>-->
                            <span ng-repeat="i in rangeforhide(ratingResponse[3].rating)" class="star-unselected"></span>
                                    </div>
                                </div>
                                <div ng-click='openingWebSite(ratingResponse[3])' class="rating-label-mob text-center">{{ratingResponse[3].site_name}}</div>
                            </div>
                                                </div>
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-next-rating"></div>
        <div class="swiper-button-prev swiper-button-prev-rating"></div>
    </div>
</div>

                                                <div ng-show="ratingResponse.length>=2" class="col-md-3 col-sm-3 text-center hidden-xs hidden-sm rating-box">
                                                    <div ng-click="ratingNumber(ratingResponse[1],'rating2')" class="{{(ratingResponse.length==2 || ratingResponse.length==3)?'circle-wrapper rating2 margin-btm0':'circle-wrapper rating2 '}}" ng-show='ratingResponse[1].rating_type=="Numeric"'>
                                                        <div class="review-circle">
                                                            <h2 class="rating">{{ratingResponse[1].rating_numeric}}</h2>

                                                        </div>
                                                        <a href="" ng-click='openingWebSite(ratingResponse[1])'><span>{{ratingResponse[1].site_name}}</span></a>

                                                    </div>
                                                    <div ng-click="ratingNumber(ratingResponse[1],'rating2')" class="{{(ratingResponse.length==2 || ratingResponse.length==3)?'circle-wrapper hidden-xs hidden-sm margin-btm0 rating2' : 'circle-wrapper hidden-xs hidden-sm  rating2'}}" ng-show='ratingResponse[1].rating_type=="Star"'>
                                                        <div class="review-circle">
                                                            <h2 class="rating-head">{{ratingResponse[1].rating}}</h2>
                                                            <div class="stars-aj">
                                                                  <span class="star-selected" ng-repeat="i in range(ratingResponse[1].rating)" ></span>
                                                             
                                                                <!--<span  ng-show="hidingStar1(ratingResponse[1].rating/2)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[1].rating)" class="star-unselected"></span>
                                                            </div>
                                                        </div>
                                                        <a href="" ng-click='openingWebSite(ratingResponse[1])'><span>{{ratingResponse[1].site_name}}</span></a>

                                                    </div>

                                                    <div ng-show='ratingResponse.length==4 && ratingResponse[3].rating_type=="Numeric"'  ng-click="ratingNumber(ratingResponse[3],'rating4')" class="circle-wrapper rating4 margin-btm0" >
                                                        <div class="review-circle">
                                                            <h2 class="rating">{{ratingResponse[3].rating_numeric}}</h2>

                                                        </div>
                                                        <a href="" ng-click='openingWebSite(ratingResponse[3])'><span>{{ratingResponse[3].site_name}}</span></a>

                                                    </div>
                                                    <div ng-show='ratingResponse.length==4 && ratingResponse[3].rating_type=="Star"' ng-click="ratingNumber(ratingResponse[3],'rating4')" class="circle-wrapper hidden-xs hidden-sm margin-btm0 rating4 margin-btm0" >
                                                        <div class="review-circle">
                                                            <h2 class="rating-head">{{ratingResponse[3].rating}}</h2>
                                                            <div class="stars-aj">
                                                                 <span class="star-selected" ng-repeat="i in range(ratingResponse[3].rating)" ></span>
                                                             
                                                                <!--<span  ng-show="hidingStar1(ratingResponse[3].rating/2)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[3].rating)" class="star-unselected"></span>
                                                            </div>
                                                        </div>
                                                        <a href="" ng-click='openingWebSite(ratingResponse[3])'><span>{{ratingResponse[3].site_name}}</span></a>

                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row visible-sm rating-tablet center-clmn-content-tab">
                                              
                                                        <div class="col-sm-3" ng-show='ratingResponse[0].rating_type=="Numeric"'  ng-click="ratingNumber(ratingResponse[0],'rating1')">
                                                            <div class="circle-wrapper rating1 selected">
                                                        <div class="review-circle">
                                                            <h2 class="rating">{{ratingResponse[0].rating_numeric}}</h2>

                                                        </div>
                                                        <div  ng-click='openingWebSite(ratingResponse[0])' class="rating-label-tab">{{ratingResponse[0].site_name}}</div>

                                                    </div>
                                                        
                                                        </div>
                                                         <div class="col-sm-3" ng-click="ratingNumber(ratingResponse[0],'rating1')" ng-hide="ratingResponse[0].rating_type!='Star'">
                                                           <div class="circle-wrapper rating1 selected">
                                                        <div class="review-circle">
                                                            <h2 class="rating-head">{{ratingResponse[0].rating}}</h2>
                                                            <div class="stars-rating">
                                                                <span class="star-selected" ng-repeat="i in range(ratingResponse[0].rating)" ></span>
                                                             
                                                                <!--<span  ng-show="hidingStar1(ratingResponse[0].rating)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[0].rating)" class="star-unselected"></span>
                                                            </div>
                                                        </div>
                                                        <div ng-click='openingWebSite(ratingResponse[0])' class="rating-label-tab">{{ratingResponse[0].site_name}}</div>

                                                    </div>
                                                        </div>
														
														<div class="col-sm-3" ng-show='ratingResponse[1].rating_type=="Numeric"'  ng-click="ratingNumber(ratingResponse[1],'rating2')">
                                                            <div class="circle-wrapper rating2 ">
                                                        <div class="review-circle">
                                                            <h2 class="rating">{{ratingResponse[1].rating_numeric}}</h2>

                                                        </div>
                                                        <div ng-click='openingWebSite(ratingResponse[1])' class="rating-label-tab">{{ratingResponse[1].site_name}}</div>

                                                    </div>
                                                        
                                                        </div>
                                                         <div class="col-sm-3" ng-click="ratingNumber(ratingResponse[1],'rating2')" ng-hide="ratingResponse[1].rating_type!='Star'">
                                                           <div class="circle-wrapper rating2 ">
                                                        <div class="review-circle">
                                                            <h2 class="rating-head">{{ratingResponse[1].rating}}</h2>
                                                            <div class="stars-rating">
                                                                <span class="star-selected" ng-repeat="i in range(ratingResponse[1].rating)" ></span>
                                                             
                                                                <!--<span  ng-show="hidingStar1(ratingResponse[1].rating)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[1].rating)" class="star-unselected"></span>
                                                            </div>
                                                        </div>
                                                        <div  ng-click='openingWebSite(ratingResponse[1])' class="rating-label-tab">{{ratingResponse[1].site_name}}</div>

                                                    </div>
                                                        </div>
														
														
														
														<div class="col-sm-3" ng-show='ratingResponse[2].rating_type=="Numeric"'  ng-click="ratingNumber(ratingResponse[2],'rating3')">
                                                            <div class="circle-wrapper rating3 ">
                                                        <div class="review-circle">
                                                            <h2 class="rating">{{ratingResponse[2].rating_numeric}}</h2>

                                                        </div>
                                                        <div ng-click='openingWebSite(ratingResponse[2])' class="rating-label-tab">{{ratingResponse[2].site_name}}</div>

                                                    </div>
                                                        
                                                        </div>
                                                         <div class="col-sm-3" ng-click="ratingNumber(ratingResponse[2],'rating3')" ng-hide="ratingResponse[2].rating_type!='Star'">
                                                           <div class="circle-wrapper rating3 ">
                                                        <div class="review-circle">
                                                            <h2 class="rating-head">{{ratingResponse[2].rating}}</h2>
                                                            <div class="stars-rating">
                                                                <span class="star-selected" ng-repeat="i in range(ratingResponse[2].rating)" ></span>
                                                             
                                                               <!-- <span  ng-show="hidingStar1(ratingResponse[2].rating)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[2].rating)" class="star-unselected"></span>
                                                            </div>
                                                        </div>
                                                        <div  ng-click='openingWebSite(ratingResponse[2])' class="rating-label-tab">{{ratingResponse[2].site_name}}</div>

                                                    </div>
                                                        </div>
														
														
														<div class="col-sm-3" ng-show='ratingResponse[3].rating_type=="Numeric"'  ng-click="ratingNumber(ratingResponse[3],'rating4')">
                                                            <div class="circle-wrapper rating4 ">
                                                        <div class="review-circle">
                                                            <h2 class="rating">{{ratingResponse[3].rating_numeric}}</h2>

                                                        </div>
                                                        <div  ng-click='openingWebSite(ratingResponse[3])' class="rating-label-tab">{{ratingResponse[3].site_name}}</div>

                                                    </div>
                                                        
                                                        </div>
                                                         <div class="col-sm-3" ng-click="ratingNumber(ratingResponse[3],'rating4')" ng-hide="ratingResponse[3].rating_type!='Star'">
                                                           <div class="circle-wrapper rating4 ">
                                                        <div class="review-circle">
                                                            <h2 class="rating-head">{{ratingResponse[3].rating}}</h2>
                                                            <div class="stars-rating">
                                                                <span class="star-selected" ng-repeat="i in range(ratingResponse[3].rating)" ></span>
                                                             
                                                               <!-- <span  ng-show="hidingStar1(ratingResponse[3].rating)" class="star-semiselected"></span>-->
                                                                <span ng-repeat="i in rangeforhide(ratingResponse[3].rating)" class="star-unselected"></span>
                                                            </div>
                                                        </div>
                                                        <div ng-click='openingWebSite(ratingResponse[3])' class="rating-label-tab">{{ratingResponse[3].site_name}}</div>

                                                    </div>
                                                        </div>
														
                                                        
                                       
                                                </div>

                                       

                                        </div>

                                    </div>  
                                    <!--Ratiing section end-->

                                <div class="container visible-sm visible-md visible-lg hidden-xs" ng-show='LastDetails'>
                                        <div class="col-md-10 col-md-offset-1 text-center stats-wrapper stats-wrapper-detail">
                                            <div class="row center-clmn-content"   ng-cloak>
                                                <div  ng-show='CastingVariable.stats_1' class="col-md-4 col-sm-4 stats-box">
                                                    <div class="stats" ng-bind-html="CastingVariable.stats_1">
                                                        {{CastingVariable.stats_1}}
                                                    </div>
                                                </div>
                                                <div  ng-show='CastingVariable.stats_2' class="col-md-4 col-sm-4 stats-box">
                                                    <div class="stats" ng-bind-html="CastingVariable.stats_2">
                                                        {{CastingVariable.stats_2}}
                                                    </div>
                                                </div>									
												<div  ng-show='CastingVariable.stats_3' class="col-md-4 col-sm-4 stats-box">
                                                    <div class="stats" ng-bind-html="CastingVariable.stats_3">
                                                        {{CastingVariable.stats_3}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container hidden-sm hidden-md hidden-lg" ng-show='LastDetails'>
                                        <div class="swiper-container swiperDetailStats">
                                            <div class="swiper-wrapper homestat-slider"  ng-cloak>
                                                <div ng-if='CastingVariable.stats_1' class="swiper-slide">
                                                    <div class="text-center stats-wrapper stats-wrapper-xs">
                                                        <div class="stats" ng-bind-html="CastingVariable.stats_1">
                                                        {{CastingVariable.stats_1}}
                                                    </div>
                                                    </div>
                                                </div>
                                                <div ng-if='CastingVariable.stats_2' class="swiper-slide">
                                                    <div class="text-center stats-wrapper stats-wrapper-xs">
                                                         <div class="stats" ng-bind-html="CastingVariable.stats_2">
                                                        {{CastingVariable.stats_2}}
                                                    </div>
                                                    </div>
                                                </div>
                                                <div ng-if='CastingVariable.stats_3' class="swiper-slide">
                                                    <div class="text-center stats-wrapper stats-wrapper-xs">
                                                        <div class="stats" ng-bind-html="CastingVariable.stats_3">
                                                        {{CastingVariable.stats_3}}
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Add Pagination -->
                                            <div class="swiper-pagination swiper-pagination-stat"></div>
                                        </div>

                                        

                                    </div>
                                <!--Other titles strat-->
                                
                                <!--Other titles end-->
                            </div>


                               
                                <!--Other titles end-->
                            </section>

                            <!--tab bottom-->
                            <!-- tabs bottom -->
                        </div>

                        <!-- /tabs -->

                         <div id="sectionB" class="tab-pane fade" ng-cloak>
                            <div class="container hidden-sm hidden-xs">
                                <div class="assets" >
                                   
                                        <div class="dropdown-group-assets">
                                       
                                        
                                        <div class="col-md-4 col-sm-4 col-xs-12 filter-section dropdown-group">
                                             <div id="example"  class="ae-dropdown-small ae-dropdown-xs">
											 <div class="demo-section k-content">
                                            <select   id="title" kendo-drop-down-list style="width: 100%;" ng-model="filters" k-option-label="'Filter By Type'" k-data-text-field="'value'" k-data-value-field="'id'" k-data-source="FilterAssetsListsForDropDown"  ng-disabled='FilterAssetsListsForDropDown.length<=0 || FilterAssetsListsForDropDown===undefined || FilterAssetsListsForDropDown==="" || FilterAssetsListsForDropDown===null'>
													
												 <!-- <option k-value=''>Filter by type</option>
                                                     <option ng-repeat="title in FilterType" value='{{title.FilterTypeId}}'>{{title.FilterTypeValue}}</option>-->
                                                </select>
											</div>
											</div>
                                           
                                        </div>
                                        </div>
                                  
                                    
                                        <div class="assets-selection display-group">
                                           
											<div class="row">
                                            <div class="col-md-3 download-selected-btn" style="float:right;">
                                                <button class="button-md btn-gold" ng-click="UpdateAssetResults()">Update Results</button>
                                            </div>
											</div>
                                        </div>
                                       <div class="row results-notfound" ng-show='MacthingResult.length <= 0'>
                                           <div class="col-md-6 col-sm-6 col-xs-12">
                                               <label>No Results Found</label>
                                           </div> 
                                       </div>
                                   
                                  
                                       	  <table class="asset-container">
                                        <tr ng-repeat="assetlist in MacthingResult">
                                            <td class="select-label-box">
                                                <table class="asset-wrapper">

                                        <tr>
                                            <td class="select-label">{{assetlist.AssetType}}</td>
                                            <td class="season-box">
                                                
                                                   
                                                      <h6  ng-show='assetlist.SeasonNumber != null && assetlist.SeasonNumber != undefined && assetlist.SeasonNumber != 0' class="assets-seasonnum">{{'Season '+assetlist.SeasonNumber}}
                                                        </h6>
                                                       <div class="assets-series-episodenum upper-case">
                                                           {{assetlist.SeriesName}}
                                                       
                                                        </div>
                                                   

                                            </td>
                                            <!--<td class="episode-title-box">
                                               
                                                    {{assetlist.PieceTitle}}
                                                
                                            </td>-->
                                            
                                        </tr>


                                    </table>
                                            </td>
                                            <td class="pad-none download-box">
                                                
                                               <a href="{{assetlist.URL}}" download class="btn-assets button-md btn-gold"><span class="download-btn upper-case">{{assetlist.URL!=null ? assetlist.URL.substring(assetlist.URL.lastIndexOf('.')+1) : 'Download'}} {{assetlist.Size>0 ? '('+(assetlist.Size/(1024*1024)).toFixed(2)+' MB)' : ''}}</span></a>
                                            </td>

                                           

                                        </tr>
										</table>
										
										
                                    
                                </div>
									<div class="row" >
										<div ng-show='numPages>1' class="custom-pagination ae-form-group">
										<div class="pagination-custom">
										<div class="pagination-box">
												<custom-pagination total-items=TotalRecords  ng-model="currentPage" items-per-page=itemsPerPage ng-click="myFunction()" >
													 <span class="prev-textbox left"> 
													 <input type="text"  value="{{currentPage}}" readonly />
													 </span> 
													 <span class="left text-of">of</span> 
													 <span class="next-textbox left"><input type="text"  value="{{numPages}}" disabled /></span>
												</custom-pagination>
										</div>
										</div>
										</div>
									</div>
                              <div class="row">
                                <div class="container" ng-show="supplementalText.length>0">
                                  <div class="supplemental-content">
                                    <h6>Supplemental</h6>
                                    <p ng-bind-html="supplementalText |  limitTo:supplementalLimit"></p>
                                    <div class="text-right">
                                      <a id="more-link" href="javascript:void(0)" ng-click="showMoreSupplemental()" ng-show="showMore">Learn more...</a>
                                      <a id="less-link" href="javascript:void(0)" ng-click="showLessSupplemental()" ng-show="!showMore">Show less...</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        </div>
					</div>
				</section>

            </div>
        </div>
        <!--./main content end-->
<div class="print-main print-container">
  <!--./main content start-->
  <div class="container-lg">
    <div class="printpdf-content">

      <!--./banner start-->
      <div class="printbanner-wrapper">

        <div class="print-banner border-none">
          <div class="printmain-img">
            <img class="img-responsive" ng-src="{{SeriesDetailsInformation.ImageUrlDesktop1x!=null && SeriesDetailsInformation.ImageUrlDesktop1x!='' && SeriesDetailsInformation.ImageUrlDesktop1x!=undefined ? SeriesDetailsInformation.ImageUrlDesktop1x :SeriesDetailsInformation.SeriesImageUrl }}">
          </div>
        </div>

      </div>
      <!--./banner end-->
      <section class="text-center center-heading-box">

        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="banner-heading printbanner-heading">{{SeriesDetailsInformation.SeriesName}}</div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 printhead-counts">
              <span class="counts" ng-hide="(SeriesDetailsInformation.SeasonsCount===0 || SeriesDetailsInformation.SeasonsCount===undefined )" >{{SeriesDetailsInformation.SeasonsCount===0? '' : SeriesDetailsInformation.SeasonsCount}} {{(SeriesDetailsInformation.SeasonsCount === 0 || SeriesDetailsInformation.SeasonsCount===undefined )? '' : (SeriesDetailsInformation.SeasonsCount === 1 ? 'Season' : ' Seasons' )}}</span>
              <span class="pipe" ng-hide="(SeriesDetailsInformation.SeasonsCount===0 || SeriesDetailsInformation.SeasonsCount===undefined)">|</span>
              <span  ng-hide="(SeriesDetailsInformation.EpisodesCount===0 || SeriesDetailsInformation.EpisodesCount===undefined)" class="counts">

                {{SeriesDetailsInformation.EpisodesCount===0? '' : SeriesDetailsInformation.EpisodesCount}}{{(SeriesDetailsInformation.EpisodesCount === 0 || SeriesDetailsInformation.EpisodesCount===undefined )? '' : (SeriesDetailsInformation.EpisodesCount === 1 ? 'Episode' : ' Episodes' )}}
              </span>
              <span class="pipe" ng-hide="(SeriesDetailsInformation.EpisodesCount===0 || SeriesDetailsInformation.EpisodesCount===undefined || SeriesDetailsInformation.AveragePieceLength===0 )">|</span>
              <span class="counts" ng-show='(EpisodeArray.length >0 && EpisodeArray.length >= 2) &&(SeriesDetailsInformation.AveragePieceLength!= null  && SeriesDetailsInformation.AveragePieceLength!= undefined  && SeriesDetailsInformation.AveragePieceLength!= "0")' class="average-count">{{SeriesDetailsInformation.AveragePieceLength >=2 ? ' '+SeriesDetailsInformation.AveragePieceLength+' hours':' '+SeriesDetailsInformation.AveragePieceLength+' hour'}}</span>

            </div>
          </div>
        </div>
      </div>

    </section>
    <section>

      <div class="container">
        <div class="print-text-left">
          <?php if($post->post_content!=="") : ?>
          <h2 class="tab-heading tabheading-black">
            <?php echo $post->post_content; ?>
          </h2>
          <?php endif; ?>
          <div class="border-small printborder-small"></div>
        </div>
        <div class="print-text-right">
          <p class="para-black">
            {{SeriesDetailsInformation.SeriesDescription}}
          </p>
        </div>
      </div>

    </section>
    <section class="center-heading-box last-box print-gallery" ng-show="(RegularCastMembers.length+OtherCastMembers.length)>0">
      <div class="printimg-section row row-no-gutter" >
        <div class="col-md-4 col-sm-4 col-xs-4" ng-repeat="regularMember in RegularCastMembers">
          <img ng-src="{{regularMember.image}}" alt="">
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4" ng-repeat="otherMember in OtherCastMembers">
          <img ng-src="{{otherMember.image}}" alt="">
        </div>
      </div>
    </section>
    <section class="center-heading-box last-box" ng-if="ratingResponse.length>0">
      <table class="rating-section" ng-repeat="ratingItem in ratingResponse">
        <tr>
          <td class="print-rating" style="vertical-align:top" width="10%">
            <div class="text-center rating-box print-ratingbox">
              <div class="circle-wrapper circlewrapper-left">
                <div class="review-circle printreview-circle">
                  <h2 class="rating-head" ng-if='ratingItem.rating_type==="Star"'>{{ratingItem.rating}}</h2>
                  <h2 class="rating" ng-if='ratingItem.rating_type==="Numeric"'>{{ratingItem.rating}}</h2>
                  <div class="stars-rating" ng-if='ratingItem.rating_type==="Star"'>
                    <span class="star-selected" ng-repeat="i in range(ratingItem.rating)" ></span>
                    <span ng-repeat="i in rangeforhide(ratingItem.rating)" class="star-unselected"></span>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td class="print-rating" style="vertical-align:top" width="90%">
            <div class="print-desc-text" style="width:90%">
              <p class="para-black paratop-padding" ng-bind-html="ratingItem.review">
              </p>
              <div class="margin-top10">
                <span class="print-authorname ">{{ratingItem.author_name}}</span>
                <span class="print-channelname ">{{ratingItem.site_name}}</span>
              </div>

            </div>
          </td>
        </tr>
      </table>
    </section>

    <section class="text-center center-heading-box print-stat">
      <div class="text-center stats-wrapper">
        <div class="center-clmn-content">              
              <div  ng-show='CastingVariable.stats_1' class="col-md-4 col-sm-4 stats-box">
                <div class="stats" ng-bind-html="CastingVariable.stats_1">
                    {{CastingVariable.stats_1}}
                </div>
            </div>
            <div  ng-show='CastingVariable.stats_2' class="col-md-4 col-sm-4 stats-box">
                <div class="stats" ng-bind-html="CastingVariable.stats_2">
                    {{CastingVariable.stats_2}}
                </div>
            </div>									
            <div  ng-show='CastingVariable.stats_3' class="col-md-4 col-sm-4 stats-box">
                <div class="stats" ng-bind-html="CastingVariable.stats_3">
                    {{CastingVariable.stats_3}}
                </div>
            </div>          
        </div>
      </div>
    </section>
    
  </div>
</div>
</div>
       <script type="text/ng-template" id="ImageModalContent.html">
  
    
 
      
      <button type="button" class="close close-btn-gallery" ng-click="cancel()" aria-label="Close">
        <span aria-hidden="true">
          <img src="https://images.sales.aenetworks.com/wp-content/themes/salessite/images/modal_close.png" alt="close" />
        </span>
      </button>
 
    <div class="modal-body modal-gallery-body">

      <div class="swiper-container swiper-btmnone" id="abc" swipergallerydirective>
        <div class="swiper-wrapper">

          <div class="swiper-slide" ng-repeat="galleryImage in gallary">
            <img ng-src="{{galleryImage.GalleryUrl}}"></img>
          </div>

        </div>
        <div class="swiper-pagination pagination-center swiper-pagination1" id="swiper-pagination7"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-next-gallery " id="swiper-button-next"></div>
        <div class="swiper-button-prev swiper-button-prev-gallery" id="swiper-button-prev"></div>
      </div>

    </div>


</script>
       
    <?php 
get_footer();   ?>

   


