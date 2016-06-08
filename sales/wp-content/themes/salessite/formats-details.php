<?php  logincheck(); ?>
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Formats Detail Page
 */

get_header(); ?>

              <!--./main content start-->
<div ng-controller="FormatDetailController">
        <div  class="content content-mobile noprint">
		  <div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
            <!--./banner start-->
            <div class="banner-wrapper">
                <div class="container-lg">
                    <div class="detail-banner-wrapper border-none" ng-cloak>
                        <div class="hidden-md hidden-lg hidden-sm mobileoverlay-wrap">
						
						<a class="mobilebackbtn-img" href="javascript:history.go(-1)">
						
						</a>                       
                       
                           <div class="banner-heading banner-headingdetail-xs mbt-25 hidden-sm hidden-lg hidden-md visible-xs" >{{SeriesDetailsInformation.SeriesName}}</div>
  
                    </div>
                        <div class="detail-banner-box"><!-- style="background: url({{(descfromcms.hero_image !=null &&  descfromcms.hero_image!= undefined) && descfromcms.hero_image != '' ? descfromcms.hero_image : (SeriesDetailsInformation.SeriesImageUrl!=null && SeriesDetailsInformation.SeriesImageUrl!='' && SeriesDetailsInformation.SeriesImageUrl!=undefined ? SeriesDetailsInformation.SeriesImageUrl :ViewBannerDefault) }}) scroll 0 0;">-->
						
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
                            <div class="trailer-content-format trailer-content">
                             <div ng-show="SeriesDetailsInformation.SeriesName!=NULL && SeriesDetailsInformation.SeriesName!='' && SeriesDetailsInformation.SeriesName!=undefined" class="banner-heading banner-headingdetail-xs mbt-25 hidden-xs hidden-lg hidden-md visible-sm" >{{SeriesDetailsInformation.SeriesName.length>80?SeriesDetailsInformation.SeriesName.substring(0,80)+'...':SeriesDetailsInformation.SeriesName}}</div>
								 <div ng-show="SeriesDetailsInformation.SeriesName!=NULL && SeriesDetailsInformation.SeriesName!='' && SeriesDetailsInformation.SeriesName!=undefined" class="banner-heading banner-headingdetail-xs mbt-25 hidden-sm visible-lg visible-md hidden-xs" >{{SeriesDetailsInformation.SeriesName}}</div>
								<p ng-show="SeriesDetailsInformation.ProductionCompany!=NULL && SeriesDetailsInformation.ProductionCompany!='' && SeriesDetailsInformation.ProductionCompany!=undefined" class="average-count average-count-nomargin hidden-xs">Production Company: {{SeriesDetailsInformation.ProductionCompany}}
								</p>							
								
                                <!--<span class="counts hidden-xs" ng-hide="(SeriesDetailsInformation.SeasonsCount===0 || SeriesDetailsInformation.SeasonsCount===undefined )" >{{SeriesDetailsInformation.SeasonsCount===0? '' : SeriesDetailsInformation.SeasonsCount}} {{(SeriesDetailsInformation.SeasonsCount === 0 || SeriesDetailsInformation.SeasonsCount===undefined )? '' : (SeriesDetailsInformation.SeasonsCount === 1 ? 'Season' : ' Seasons' )}}</span>-->
                                <p ng-show='(SeriesDetailsInformation.AverageDuration!= null  && SeriesDetailsInformation.AverageDuration!= undefined  && SeriesDetailsInformation.AverageDuration!= "0")' class="average-count average-count-nomargin hidden-xs">Average duration per episode:{{SeriesDetailsInformation.AverageDuration >=2 ? ' '+SeriesDetailsInformation.AverageDuration+' hours':' '+SeriesDetailsInformation.AverageDuration+' hour'}}</p>
								
								<p ng-show="(SeriesDetailsInformation.DayPart!=NULL && SeriesDetailsInformation.DayPart!='' && SeriesDetailsInformation.DayPart!=undefined)" class="average-count average-count-nomargin hidden-xs"> Daypart: {{SeriesDetailsInformation.DayPart}}</p>
                            </div>


                            
                            <!--<div class="banner-btngroup">

                                <div class="btn-gold-group">
                                    <div class="col-md-offset-8">

                                        <div class="col-md-4 col-sm-4">
                                            <span class="button-md btn-gold"><i class="fa fa-file-text"></i>Print PDF</span>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <span class="button-md btn-gold"><i class="fa fa-arrow-circle-down"></i>Presentation</span>
                                        </div>

                                        <div class="col-md-4 col-sm-4">
                                            <span class="button-md btn-gold"><i class="fa fa-plus"></i>Add to list</span>
                                        </div>


                                    </div>

                                </div>




                            </div>-->


                            <div class="banner-btngroup details-btngroup container">
                              <a href="#" class="button-md btn-gold hidden-sm print-mainbtn" ng-click="printPDF()">
                                <span class="print-btn">Print PDF</span>
                              </a>
                                <a ng-show='descfromcms.presentation_url!=null && descfromcms.presentation_url!= undefined && descfromcms.presentation_url!=""' href="{{descfromcms.presentation_url}}" download class="button-md btn-gold hidden-sm presentation-mainbtn" ><span class="download-btn">Presentation</span></a>
                                <a ng-show="false" href="#" class="button-md btn-gold"><span class="addlist-btn">Add to watchlists</span></a>



                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <!--./banner end-->

            <div class="dark-bg-large detail-darkbg last-box border-top-none" ng-show='totalPage'>

                <section>
				<div class="hidden-lg hidden-md hidden-sm visible-xs banner-info" ng-show='totalPage'>
                         <div class="banner-info-mobile">
                            
							
						
                            
								 <span  ng-hide="(SeriesDetailsInformation.EpisodesCount===0 || SeriesDetailsInformation.EpisodesCount===undefined)" class="counts ">

{{SeriesDetailsInformation.EpisodesCount===0? '' : SeriesDetailsInformation.EpisodesCount}}{{(SeriesDetailsInformation.EpisodesCount === 0 || SeriesDetailsInformation.EpisodesCount===undefined )? '' : (SeriesDetailsInformation.EpisodesCount === 1 ? 'Episode' : ' Episodes' )}}</span>
							
                            
                        </div>
                       
						
						<p class="average-count" ng-show="SeriesDetailsInformation.ProductionCompany!=NULL && SeriesDetailsInformation.ProductionCompany!='' && SeriesDetailsInformation.ProductionCompany!=undefined" class="trailer-matter line-clamp">{{SeriesDetailsInformation.ProductionCompany}}
								</p>
						  <p class="average-count" ng-show='(SeriesDetailsInformation.AverageDuration!= null  && SeriesDetailsInformation.AverageDuration!= undefined  && SeriesDetailsInformation.AverageDuration!= "0")' class="average-count">Average duration per episode:{{SeriesDetailsInformation.AverageDuration >=2 ? ' '+SeriesDetailsInformation.AverageDuration+' hours':' '+SeriesDetailsInformation.AverageDuration+' hour'}}</p>
						  <p class="average-count" ng-show="(SeriesDetailsInformation.DayPart!=NULL && SeriesDetailsInformation.DayPart!='' && SeriesDetailsInformation.DayPart!=undefined)"> Daypart: {{SeriesDetailsInformation.DayPart}}</p>
							
                        <div ng-hide=true class="channel-coproduction display-group">
                            <h3 class="scripted-channel">Channel :<span class="channel-label">Life Time </span></h3>

                            <h3 class="scripted-coproduction">co-production :<span class="upper-case network-label">A+E networks</span></h3>
                        </div>
                    </div>
                   <!-- <div class="hidden-lg hidden-md hidden-sm visible-xs detailbtn-xs">
                        <a href="#" class="button-md btn-gold"><span class="print-btn"></span></a>
                        <a href="#" class="button-md btn-gold"><span class="addlist-btn"></span></a> 
                    </div> -->
                   
					
					<div class="container-lg">
                    <div class="container detail-container swiper-slide-heading" >
					<!--ng-hide= "(CastingVariable.desc =='' || CastingVariable.desc==null || CastingVariable.desc ==undefined) && (SeriesDetailsInformation.SeriesDescription =='' || SeriesDetailsInformation.SeriesDescription==null || SeriesDetailsInformation.SeriesDescription ==undefined)"-->

                                <div class="row tab-pane"  ng-cloak >
                                    <div class="col-md-6 detail-desc-box-left">
									<?php if($post->post_content!=="") : ?>
                                                 <h2 class="tab-heading">
                                               <?php echo $post->post_content; ?>
                                                </h2>
                                                <div class="border-small border-small-format"  ></div>
												 <div class="bg-cloud"  ></div>
                                        <?php endif; ?>
										<!--ng-hide= "(CastingVariable.desc =='' || CastingVariable.desc==null || CastingVariable.desc ==undefined)" -->
                                       
										<!--ng-hide="(CastingVariable.desc =='' || CastingVariable.desc==null || CastingVariable.desc ==undefined)"-->
                                    </div>
                                    <div class="col-md-6 detail-desc-box-right">
                                        <p ng-show='(SeriesDetailsInformation.FormatDescription!= null  && SeriesDetailsInformation.FormatDescription!= undefined)' ng-bind-html='SeriesDetailsInformation.FormatDescription'>
                                       
                                        </p>
										
										<p ng-if='(SeriesDetailsInformation.PremierNetwork!= null  && SeriesDetailsInformation.PremierNetwork!= undefined && SeriesDetailsInformation.PremierNetwork!= "")' class="premiere">
										<span class="premiere-heading">Premiere Network: </span>{{'  '+SeriesDetailsInformation.PremierNetwork}}</p>
										<a href="" ng-click="goToScriptedDetails(SeriesDetailsInformation)" class="findout-detail findout-margin premiere-find">Also available as a series<span class="findout-bacgrndimage"></span></a>
                                        <div  ng-show='false' class="channel-coproduction display-group visible-lg visible-md hidden-sm hidden-xs">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h3 class="scripted-channel">Channel</h3>
                                                    <h2 class="upper-case">life time</h2>


                                                </div>
                                                <div class="col-md-6">
                                                    <h3 class="scripted-coproduction">co-production</h3>
                                                    <h2 class="upper-case">a+e networks</h2>

                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>
                    </div>
					<!--Sample episode section start-->
					<div class="container-lg" ng-show="EpisodeArray.length>2">
                    <section class="episode-box episode-detail-sm">
                        <div class="dark-bg-medium hr-light episode-dark-box">

                            <div class="container swiper-slide-heading" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="swiper-heading-para format-heading-para">sample 
										<span class="condensed-light">episodes</span></h3>
                                        <p class="paragrraph format-paragraph" ng-bind-html="descfromcms.desc">
                                           
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <section ng-show='(EpisodeArray.length>2)'>

                               


                                                  <div ng-show='EpisodeArray.length > 2 '  class="swiper-container swiper-btmnone episodesSwiper swiper-container-padding swiper-detail-padding hidden-xs" ng-show='totalPage'>
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide"  ng-click='ShowEpisodeDetails(episode,$index)'  id="'Firstswiper'+$index" ng-repeat='episode in EpisodeArray' >
                                                            <div class="episode-info">
                                                                <span class="episode-number left">Episode {{episode.PieceNumber}}</span>
                                                               <span class="episode-time right" ng-show='episode.Duration != "" && episode.Duration != null && episode.Duration != undefined && episode.Duration != 0'>{{episode.Duration}}</span>
                                                            </div>
                                                         
                                                            <img ng-if="!(episode.ImageUrlDesktop1x)" ng-src="{{episode.EpisodeImageUrl}}">
                                                              <span picture-fill="" ng-if="episode.ImageUrlDesktop1x">
                                                                <span pf-src="{{episode.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                                                <span pf-src="{{episode.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                                                <span pf-src="{{episode.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                                                <span pf-src="{{episode.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                                                <span pf-src="{{episode.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                                                                <span pf-src="{{episode.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                                                              </span>
                                                           <div ng-show='episode.IScreenerAvailable' class="playbtn-thumb">
                                                              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/thumbnail_playbtn.png">
                                                            </div>
															<div ng-hide='episode.IScreenerAvailable' class="playbtn-thumb">
                                                              <img   src="<?php echo get_stylesheet_directory_uri(); ?>/images/info_episode.svg">
                                                            </div>
                                                            <div class="img-overlay"></div>
															<div ng-class="{ 'opaque-div': $index == selected }" ></div>
                                                            <div class="overlay-swiper-label">
                                                            </div>
                                                        </div>
														
														
														                                                   

												   </div>
                                                    <!-- Add Pagination -->
                                                    <div class="swiper-pagination pagination-center swiper-pagination2"></div>
                                                    <!-- Add Arrows -->
                                                    <div class="swiper-button-next swiper-button-next2">
                                                    </div>
                                                    <div class="swiper-button-prev swiper-button-prev2"></div>
                                                </div>


                                <div    class="episode-play hidden-xs" ng-show='EpisodeDetails'>
                                                    <div class="container swiper-slide-heading"  ng-cloak>
                                                        <div id="'firstrow'+$index" class="row">
                                                            <div class="col-md-4 col-xs-12">
															     <div class="close-vplayer right hidden-md hidden-lg visible-sm" ng-hide='EpisodeArray.length >=0 && EpisodeArray.length < 2' ng-click='EpisodeDetails = false'>
                                                                        <img class="right" src="<?php echo get_stylesheet_directory_uri(); ?>/images/vplayer_close.png" alt="vplayer_close">
                                                                 </div>
															    <h2 class="video-pop-heading">Episode: {{EpisodeViewInformation.PieceNumber}}</h2>
                                                                <h2 class="video-pop-title season-title" ng-show='SeasonListIndividual.SeasonNumber != null &&  SeasonListIndividual.SeasonNumber != undefined && SeasonListIndividual.SeasonNumber != 0' >Season {{SeasonListIndividual.SeasonNumber}}</h2>
																<h2 class="video-pop-heading" ng-show='EpisodeViewInformation.PieceTitle != null &&  EpisodeViewInformation.PieceTitle != undefined && EpisodeViewInformation.PieceTitle != ""'>{{EpisodeViewInformation.PieceTitle}}</h2>
                                                               <h2 class="video-pop-heading">
                                                              {{EpisodeViewInformation.ProgramID!=null && EpisodeViewInformation.ProgramID!=undefined &&EpisodeViewInformation.ProgramID!=""?EpisodeViewInformation.ProgramID+' | '+''+EpisodeViewInformation.PieceID:EpisodeViewInformation.PieceID}}</h2>
															   <p class="season-matter" ng-bind-html="EpisodeViewInformation.PieceDescription">
                                                                </p>
																
                                                            </div>
                                                           <div class="col-md-8 col-xs-12">
                                                                <div class="detail-image-box video-player-pop left">
                                                                  <img ng-show='!isPlayClicked' ng-src="{{EpisodeViewInformation.ImageUrlDesktop2x ? EpisodeViewInformation.ImageUrlDesktop2x : EpisodeViewInformation.EpisodeImageUrl}}">
																   <iframe width="100%" ng-show='isPlayClicked' id="screenerEpisode" style="height:450px;" scrolling="no" framepadding="0" frameborder="0" allowtransparency="true" seamless="seamless"
                                        allowfullscreen mozallowfullscreen msallowfullscreen webkitallowfullscreen>Your browser does not support iframes.</iframe>
                                                                </div>
                                                                <div ng-show='EpisodeViewInformation.IScreenerAvailable && isSinglePiece' ng-click="playScreenerMovie()" class="playbtn-img hidden-xs">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn.png">
                                <span class="trailor-duration">WATCH EPISODE</span>
                                                                </div>
                                                                <div ng-show='EpisodeViewInformation.IScreenerAvailable && isSinglePiece' class="play-btn banner-playbtn banner-playbtn-xs visible-xs hidden-sm hidden-lg hidden-md" ng-click="playScreenerMovie()">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn.png" alt="back_btn">
                                <span class="trailor-duration">WATCH EPISODE</span>

                            </div>
																   <div class="close-vplayer right visible-md visible-lg hidden-xs hidden-sm" ng-hide='EpisodeArray.length >0 && EpisodeArray.length < 2' ng-click='closeEpisodeDiv()' >
                                                                        <img class="right" src="<?php echo get_stylesheet_directory_uri(); ?>/images/vplayer_close.png">
                                                                    </div>
																   
                                                            
                                                            </div>
                                                    </div>
                                                </div>
 </div>
                                                <div  class="visible-xs episode-format" ng-show='totalPage'>
                                                    
													<div class="episode-row-box episode-row-num"  ng-repeat='episodeshow in EpisodeArray' >
													<div  class="episode-rownum"  ng-cloak  ng-click='ShowEpisodeDetailsmobile(episodeshow,$index)'>
                                                        <div class="episode-num left"><div class="episode-text">Episode {{episodeshow.PieceNumber}}</div>
                                                           <div class="episoderow-time" ng-show='episodeshow.Duration != "" && episodeshow.Duration != null && episodeshow.Duration != undefined && episodeshow.Duration!=0'>{{episodeshow.Duration}}</div>
                                                        </div>
                                                        <div class="mobile-playbtn right">
                                                            <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn_white_mobile.png">
                                                        </div>
														<div   ng-show='$index == indexshow'  >
                              <div class="detail-image-box video-player-pop left detail-video-mobile">
                                <img ng-show='!isPlayClicked' ng-src="{{episodeshow.ImageUrlDesktop2x ? episodeshow.ImageUrlDesktop2x : episodeshow.EpisodeImageUrl}}">

                                  <iframe id="screenerEpisodeMobile_{{$index}}"  ng-show='isPlayClicked' width="100%" height="100%" scrolling="no" framepadding="0" frameborder="0" allowtransparency="true" seamless="seamless"
                                     allowfullscreen mozallowfullscreen msallowfullscreen webkitallowfullscreen>Your browser does not support iframes.</iframe>
                                </div>
														<div class="clear episodedetail-para">
                                                        <p ng-bind-html="episodeshow.PieceDescription">
                                                         
                                                        </p>
                                                            </div>
                                                        <button class="button-md btn-gold visible-xs episode-btn-xs"><span class="addlist-btn">Add Episode {{episodeshow.PieceNumber}} to watchlist</span></button>
														</div>
														</div>
                                                        
													
                                                    </div>
													
                                                   
                                                </div>


                                           
												






                            </section>
                        </div>
                    </section>
                    </div>
					<!--Sample episode section end-->
                    <!--Resources section start-->
                    <section ng-hide="true" class="dark-bg-medium bordr-top-none hidden-xs hidden-sm container-lg border-top-none ">
                        <div class="container swiper-slide-heading" ng-show='totalPage'>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="swiper-heading resource-heading">resources</h3>

                                </div>
                            </div>
                            <div class="resources">
                                <table class="asset-container format-asset">
                                        <tbody>
										<tr>
                                            <td class="select-label-box">
                                                <table class="asset-wrapper">

                                        <tbody><tr>
                                            <td class="select-label">Example Download</td>
                                            <td class="season-box">
                                                
                                                   
                                                        <h6 class="assets-seasonnum">Title
                                                        </h6>
                                                        <div class="assets-series-episodenum upper-case">
                                                           detail
                                                       
                                                        </div>
                                                   

                                            </td>
                                            <td class="episode-title-box">
                                               
                                                    Description 
                                                
                                            </td>
                                            
                                        </tr>


                                    </tbody></table>
                                            </td>
                                            <td class="pad-none download-box">
                                                
                                                <a class="button-md btn-gold btn-assets"><span class="download-btn upper-case">PDF (3.5mb)</span></a>
                                            </td>

                                           

                                        </tr>
                                        <tr>
                                            <td class="select-label-box">
                                                <table class="asset-wrapper">

                                        <tbody><tr>
                                            <td class="select-label">Example Download</td>
                                            <td class="season-box">
                                                
                                                   
                                                        <h6 class="assets-seasonnum">Title
                                                        </h6>
                                                        <div class="assets-series-episodenum upper-case">
                                                            detail
                                                        </div>
                                                   

                                            </td>
                                            <td class="episode-title-box">
                                               
                                                    Description 
                                                
                                            </td>
                                            
                                        </tr>


                                    </tbody></table>
                                            </td>
                                            <td class="pad-none download-box">
                                                
                                                <a class="button-md btn-gold btn-assets"><span class="download-btn upper-case">PDF (3.5mb)</span></a>
                                            </td>

                                           

                                        </tr>
                                        <tr>
                                            <td class="select-label-box">
                                                <table class="asset-wrapper">

                                        <tbody><tr>
                                            <td class="select-label">Example Download</td>
                                            <td class="season-box">
                                                 <h6 class="assets-seasonnum">Title
                                                        </h6>
                                                        <div class="assets-series-episodenum upper-case">
                                                            detail
                                                        </div>
                                                    </td>
                                            <td class="episode-title-box">
                                                Description 
                                             </td>
                                        </tr>
                                        </tbody></table>
                                            </td>
                                            <td class="pad-none download-box">
                                                
                                                <a class="button-md btn-gold btn-assets"><span class="download-btn upper-case">PDF (3.5mb)</span></a>
                                            </td>

                                        </tr>
                                       
                                            
                                    </tbody></table>
                        </div>
                            </div>
                        
                    </section>
                    <!--Resources section end-->
                    
                </section>
				<div class="container-lg">
				   <div  class="dark-bg last-box" ng-show="SeriesDetailsInformation.InterstedDetail.length>0">
                                    <div class="container swiper-slide-heading">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="swiper-heading">Adaptations of this Format</h3>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-container youMaySwiper1 swiper-container-padding">
                        
                            <div class="swiper-wrapper" >
                                <div class="swiper-slide" ng-click="goToScriptedDetails(series)" ng-repeat="series in SeriesDetailsInformation.InterstedDetail | limitTo: 10" data-toggle="collapse">
                                   
                                  <img class="img-responsive" ng-if="!(series.ImageUrlDesktop1x)" ng-src="{{series.ImageUrl}}">
                                    <span picture-fill="" ng-if="series.ImageUrlDesktop1x">
                                      <span class="img-responsive-pf" pf-src="{{series.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                      <span class="img-responsive-pf" pf-src="{{series.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                      <span class="img-responsive-pf" pf-src="{{series.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                      <span class="img-responsive-pf" pf-src="{{series.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                      <span class="img-responsive-pf" pf-src="{{series.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                                      <span class="img-responsive-pf" pf-src="{{series.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                                    </span>
                                    <div class="img-overlay"></div>
                                
                                    <div class="overlay-swiper-label">
                                        <h3 class="video-thumb-titles">{{series.SeriesName}}</h3>
                                        <ul class="thumbnail-links">
										     <li><a href="#">{{series.Genre}}</a></li>
                                            <li class="entertainment-division"><a href="#">{{series.ProgramType}}</a></li>
											<li  ng-hide="((series.SeasonsCount===0 || series.SeasonsCount===undefined) && (series.EpisodesCount===0 || series.EpisodesCount===undefined ))">|</li>
                                            <li><a href="#"><span class="counts" ng-hide="(series.SeasonsCount===0 || series.SeasonsCount===undefined)">{{series.SeasonsCount === 0 ? '' : series.SeasonsCount}} {{(series.SeasonsCount === 0 || series.SeasonsCount === undefined )? '' :(series.SeasonsCount === 1 ? 'Season' : ' Seasons' )}} </span></a></li>
                                            <li ng-hide="(series.SeasonsCount===0 || series.SeasonsCount===undefined ||series.EpisodesCount===0 || series.EpisodesCount===undefined )">|</li>
                                            <li><a href="#"><span class="counts" ng-hide="(series.EpisodesCount === 0 || series.EpisodesCount===undefined )">{{series.EpisodesCount === 0 ? '' : series.EpisodesCount}}{{(series.EpisodesCount === 0 || series.EpisodesCount === undefined )? '' :(series.EpisodesCount === 1 ? 'Episode' : ' Episodes' )}} </span></a></li>
                                        </ul>
                                    </div>
                                </div>
								
								  
								
                              </div>
                              
                        <div class="swiper-pagination swiper-pagination-mobile swiper-pagination1"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-next1">
                        </div>
                        <div class="swiper-button-prev swiper-button-prev1"></div>
                    
                    </div>
                                <!--Other titles end-->
                           
                     </div>
				 </div>
            </div>
   </div>

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
    
  </div>
</div>

</div>
        <!--./main content end-->
<?php 
get_footer();
?>