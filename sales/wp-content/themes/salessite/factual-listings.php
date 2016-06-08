<?php  logincheck(); ?>

<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Factual Listings
 */

get_header(); ?>
 
 
        <!--./content start-->
        <div class="content content-mobile" ng-controller="FactualListingController">
		<div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
		 <section class="text-left">
                    <!--search content filter start-->
					<div class="container-lg banner-small-mob">
					<div class="hidden-md hidden-lg hidden-sm visible-xs"><a class="mobilebackbtn-img" href="javascript:history.go(-1)">
                                </a></div>
                    <div class="banner-small" style="background: url(<?php the_field('header_background');?>) no-repeat scroll center top;background-size: cover;">
					<div class="bg-img-overlay"></div>				 
						
	                   <div class="listingbanner-content"  ng-cloak>
					   <div class="banner-heading listing-heading">{{FactuallistSampleJson.CategoryName}}</div>
                                        <!--<div class="banner-heading listing-heading"><?php the_field(header_title);?></div>-->
                                     <span class="listing-subheading">Factual</span>
                                        <p class="hidden-xs">{{FactuallistSampleJson.CategoryDescription}}</p>                               
                       </div>
					</div>		
					<p class="banner-small-mobpara visible-xs hidden-lg hidden-md hidden-sm"  ng-cloak>{{FactuallistSampleJson.CategoryDescription}}</p>                               
				   </div>					
									
					
           
                </section>
		
		
              
             <!--./image thumbnails start-->
                <section class="text-left dark-bg-medium darkbg-xs last-box border-top-none">
                    <div class="container-lg" ng-show="totalPageHide">
                        <div class="container">
						<div class="row listing-dropdown">
						       
                                   <div class="col-md-4 col-sm-6 col-xs-12">
                                          <h3 class="Factualfilter-title">category</h3>
											 <div id="Div1"  class="ae-dropdown-small ae-dropdown-xs factual-dropdownseparation-xs">
                                        <div class="demo-section k-content" >
                                            <select kendo-drop-down-list style="width: 100%;"  ng-model="categorymb" k-option-label="categorymb"  k-data-text-field="'CategoryName'" k-data-value-field="'CategoryId'" k-data-source="ListingCategory"  k-on-change='getMobileCollection()'  >											
                                           
                                              </select>
											
                                        </div>
                                    </div>
                                     
                                        </div>
                             <div class="col-md-4 col-sm-6 col-xs-12">
                                 <h3 class="Factualfilter-title">Collections</h3>
                                           <div id="Div2"  class="ae-dropdown-small ae-dropdown-xs">
                                        <div class="demo-section k-content" >                      
										<select kendo-drop-down-list style="width: 100%;"  ng-model="collectionmb" k-option-label="collectionmb!=''&&collectionmb!=null&& collectionmb!=undefined? collectionmb : 'ALL' " k-data-text-field="'CollectionName'" k-data-value-field="'CollectionId'"    k-on-change='getCollectionDetails()'  k-data-source="ListingCollection">
												
                                           
                                              </select>
                                        </div>
                                    </div>
                                        </div>
						  
													
						</div>
						
                            <div class="row imageslide-separation" ng-cloak>
                                    <div class="col-md-4 col-sm-6">
                                    <h3 class="heading-text">{{TotalRecords}}<span class="condensed-font">{{TotalRecords===1? ' Title' : ' Titles'}}</span></h3>
                                    </div>
                             <div class="sort-selection">
                                    <div class="col-md-offset-4 col-md-4 col-sm-6">
                                        <div class="col-md-4 col-sm-4 text-right col-xs-4 sort-results-xs">
                                        <label class="sort-results">Sort results:</label>
                                            </div>
                           <div class="col-md-8 col-sm-8 col-xs-8 sort-dropdownbox">
                                            <div id="example"  class="ae-dropdown-small ae-dropdown-xs">
										 <div class="demo-section k-content">
											<select kendo-drop-down-list style="width: 100%;" ng-model="selectedOption" ng-init="selectedOption='-YearReleased'" ng-change="sorting(selectedOption)">
											
                                                <option value="SeriesName">Alphabetically (A-Z)</option>
                                                <option value="-YearReleased">Most recently released</option>
                                            </select>
											</div>
											</div>
                                        </div>
                                </div>
                                    </div>
                                </div>
                           
                           <div class="overlayLoader-wrapper-search">
								 <div class="row">
								<div id="overlayLoaderForCategory" style="display:none"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
                                <div class="col-md-4 col-sm-6 col-xs-12" ng-repeat='listing in ListingScripts | orderBy : selectedOption ' >
								
                                   <div   class="image-slide"  ng-cloak>
                                     <span picture-fill ng-if="!(listing.ImageUrlDesktop1x)">
                                       <span class="img-responsive-pf" pf-src="{{listing.ImageUrlDefaultTab}}" data-media="(min-width: 320px)"></span>
                                       <span class="img-responsive-pf" pf-src="{{listing.ImageUrlDefault}}" data-media="(min-width: 992px)"></span>
                                     </span>
                                            <span picture-fill ng-if="listing.ImageUrlDesktop1x">
                                              <span class="img-responsive-pf" pf-src="{{listing.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                              <span class="img-responsive-pf" pf-src="{{listing.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                              <span class="img-responsive-pf" pf-src="{{listing.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                              <span class="img-responsive-pf" pf-src="{{listing.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                              <span class="img-responsive-pf" pf-src="{{listing.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                                              <span class="img-responsive-pf" pf-src="{{listing.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                                            </span>
                                        <div class="img-overlay"  ng-click='GetScriptedDetails(listing)'></div>
										<div class="plus-img">
                                        <img  class="{{listing.SeriesID + 'plus'}}" ng-click="AddToWatchlist(listing.SeriesID,listing.ProgramType)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_gold.png">
						<img  class="{{listing.SeriesID + 'minus'}}" ng-click="AddToWatchlist(listing.SeriesID,listing.ProgramType)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_gold.png" style="display:none">
						</div>
						<div class="overlay-swiper-label" ng-click='GetScriptedDetails(listing)'>
                                            <h3 class="video-thumb-titles">{{listing.SeriesName}}</h3>
                                            <ul class="thumbnail-links">
                                                <li><a href="#">factual </a></li>
												<li  ng-hide="((listing.SeasonsCount===0 || listing.SeasonsCount===undefined) && (listing.EpisodesCount===0 || listing.EpisodesCount===undefined ))">|</li>
												<li><a href="#"><span class="counts" ng-hide="(listing.SeasonsCount===0 || listing.SeasonsCount===undefined)">{{listing.SeasonsCount === 0 ? '' : listing.SeasonsCount}} {{(listing.SeasonsCount === 0 || listing.SeasonsCount === undefined )? '' :(listing.SeasonsCount === 1 ? 'Season' : ' Seasons' )}} </span></a></li>
												<li ng-hide="(listing.SeasonsCount===0 || listing.SeasonsCount===undefined ||listing.EpisodesCount===0 || listing.EpisodesCount===undefined )">|</li>
												<li><a href="#"><span class="counts" ng-hide="(listing.EpisodesCount === 0 || listing.EpisodesCount===undefined )">{{listing.EpisodesCount === 0 ? '' : listing.EpisodesCount}}{{(listing.EpisodesCount === 0 || listing.EpisodesCount === undefined )? '' :(listing.EpisodesCount === 1 ? ' Episode' : ' Episodes' )}} </span></a></li>
                                              <li ng-show="(listing.ParentSeriesName!=null)">{{(listing.ParentSeriesName!=null ? '|' : '')}}</li>
                                              <li ng-show="(listing.ParentSeriesName!=null)">
                                                {{(listing.ParentSeriesName!=null ? listing.ParentSeriesName : '')}}
                                              </li>
                                            </ul>
                                        </div>
                      </div>
                                        
                                    </div>
                                </div>
								</div>
				   <div class="row" ng-show="TotalRecords > itemsPerPage">
                                     <div class="custom-pagination ae-form-group">
                                        <div class="pagination-custom" >
                                            <div class="pagination-box"  ng-cloak>
                                                <custom-pagination total-items=TotalRecords ng-model="currentPage" items-per-page=itemsPerPage ng-click="myFunction()">
                                            <span class="prev-textbox left"><input type="text" readonly ng-model="currentPage"></span>
                                            <span class="left text-of">of</span>
                                            <span class="next-textbox left"><input type="text" ng-model="numPages" disabled=""></span>
                                            
                                             </custom-pagination>
                                            
                                            </div>
                                </div>
                            
                            
                                     
                                    </div>
                        </div> 
                                
								</div>
                       
                       
                    </div>
					</div>
                </section>
                <!--./image thumbnails ends-->
     

        <!--./content end-->

     
    
<?php 
get_footer();
?>