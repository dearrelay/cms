<?php  logincheck(); ?>
<?php
   /**
   * Template part for displaying page content in page.php.
   *
   * @link https://codex.wordpress.org/Template_Hierarchy
   *
   * @package salessite
   * Template Name: Search-Results
   */
   
   get_header(); ?>
<div ng-controller="SearchResultController">
   <!--./content start-->
   <div class="content content-mobile">
      <div class="container-lg">
         <div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
         <div class="header-bg">
				<span picture-fill>
				<span pf-src="<?php the_field('header_mobile_image');?>"></span>
<span pf-src="<?php the_field('header_tablet_image');?>" data-media="(min-width: 768px)"></span>
<span pf-src="<?php the_field('header_background');?>" data-media="(min-width: 992px)"></span>
				</span>
            </div>
         <div class="searchresultstopbox-bg  last-box">
            <section class="text-left">
               <!--search content filter start-->
               <div class="search-content">
                  <div class="container">
				  <div class="hidden-md hidden-lg hidden-sm visible-xs"><a class="mobilebackbtn-img" href="javascript:history.go(-1)">
                                </a></div>
                     
                     <div class="searchresults-content search-box display-group ae-form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                           <div class="icon-wrapper">
                              <input type="text" class="searchresults-searchbox" placeholder="Search term here" id="searchTerm" ng-model="searchTerm" ng-enter="searchTermClickFromResults()" ng-trim=false>
                              <span class="search-icon" ng-click="searchTermClickFromResults()">
                                <svg id="0f019f33-4adb-4de4-a815-0674fe68cc11" data-name="Search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                  <defs>
                                    <style>.\34 3c1ca71-6054-4ea3-a171-a15c3f4dab72{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style>
                                  </defs>
                                  <title>search icon</title>
                                  <circle class="43c1ca71-6054-4ea3-a171-a15c3f4dab72" cx="9" cy="9" r="8"/>
                                  <line class="43c1ca71-6054-4ea3-a171-a15c3f4dab72" x1="23" y1="23" x2="14.95" y2="14.95"/>
                                </svg>
                              </span>
                              </div>
                        </div>
                     </div>
                     <h3 class="browse-heading">Change <span class="condensed-font">Program Type</span></h3>
                     <div class="custom-radiobtn display-group">
                        <div class="visible-lg visible-md visible-sm hidden-xs">
                           <div class="browse-radiobtn">
                              <input type="radio" name="radio1" ng-model="category" id="radio1" class="radio" value="scripted" ng-change="CategoryType(category)" />
                              <label class="radio-inline text-center radio-btn1" for="radio1">Scripted</label>
                           </div>
                           <div class="browse-radiobtn">                                                                                                                                                                          
                              <input type="radio" name="radio1" id="radio2" class="radio" ng-model="category" value="Factual" ng-change="CategoryType(category)" />
                              <label class="radio-inline text-center" for="radio2">Factual</label>
                           </div>
                           <div class="browse-radiobtn">                                                                                                                                                             
                              <input type="radio" name="radio1" id="radio3" class="radio" ng-model="category" value="movies" ng-change="CategoryType(category)" />
                              <label class="radio-inline text-center" for="radio3">Movies</label>                                                                                                                                                                 
                           </div>
                           <div class="browse-radiobtn">                                                                                                                                                            
                              <input type="radio" name="radio1" id="radio4" class="radio" ng-model="category" value="formats" ng-change="CategoryType(category)" />
                              <label class="radio-inline text-center" for="radio4">Formats</label>
                           </div>
                           <div class="browse-radiobtn">
                              <input type="radio" name="radio1" id="radio22" class="radio" checked ng-model="category" value="all" ng-change="CategoryType(category)" />
                              <label class="radio-inline text-center" for="radio22">All Program Types</label>
                           </div>
                        </div>
                        <!--for Extra small-->
                        <div class="visible-xs">
                           <div id="example"  class="ae-dropdown-gold">
                              <div class="demo-section k-content">
                                 <select kendo-drop-down-list style="width: 100%;" id="search-dropdown" ng-model="category" ng-change="CategoryType(category)">
                                    <!--<span class='selected selectbox-medium'></span>-->
                                    <span class='selectArrow selectarrow-medium'><img class="down-arrow" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mobile_downarw_white.png" alt="" /></span>
                                    <option class="selectOption" value="scripted">Scripted</option>
                                    <option class="selectOption" value="Factual">Factual</option>
                                    <option class="selectOption" value="movies">Movies</option>
                                    <option class="selectOption" value="formats">Formats</option>
                                    <option class="selectOption" value="all">All Program Types</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                       
                     </div>
                     <!--for Extra small-->
                  </div>
                  </div>
                     <div ng-cloak>
                        <div ng-show="(category=='Factual')">
							<div class="container">
                           <div class="advanced-btn display-group" >
                              
                                 <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                                    <button type="button" class="btn btn-success btn-lg btn-block" ng-click="advanceFilter('Factual','show')"  ng-show="modeForFactual">
                                       Show advanced filters<!--<span class="glyphicon glyphicon-chevron-down"></span>-->
                                       <span class="down-arrow-img"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-lg btn-block" ng-click="advanceFilter('Factual','hide')"   ng-show="!modeForFactual">
                                       Close advanced filters<!--<span class="glyphicon glyphicon-chevron-up"></span>-->
                                       <span class="up-arrow-img"></span>
                                    </button>
                                 </div>
                           </div>   
                           </div>
                           <!-- <div class="gray-bg searchresults-filter scriptedSeries">-->
                           <div class="gray-bg searchresults-filter typeMov border-top-none" ng-show="!modeForFactual">
                              <div class="container">
                                 <div class="more-section collapse in">
                                    <div class="series-radiobtn movie-radiobtn  ">
                                       <div class="row">
                                          <div class="slider-section display-group">
                                          
											 
											  <div class="col-md-4 col-sm-6">
                                                <div class="slider-btn">
                                                   <h3 class="adv-quality-heading col-sm-12">Quality</h3>
                                                   <div class="col-md-12 quality-sm">
                                                      <div class="col-md-4 col-sm-4" ng-repeat="Quality in QualityCheck[0]" ng-style="{'width' : conditionWidth}">
                                                         <input type="checkbox" name="checkbox-sd" id="{{Quality.AssetQualityLK}}" class="checkboxes" checklist-model="QualitiesChecked1.QualitiesSelected1" checklist-value="Quality.AssetQualityName"/>
                                                         <label id="checkbox-label" for="{{Quality.AssetQualityLK}}" >{{Quality.AssetQualityName}}
                                                         </label>
                                                      </div>
                                                   </div>
                                                  
                                                </div>											
                                           
                                             </div>
											 	 
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="slider-btn">
                                                    <h3 class="adv-year-heading">Release Date</h3>
                                                   
                                                    <div class="text-left col-md-12 ae-calendar">
                                                        <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-xs-5 {{errorStartDateForFactual}}">
														<input  id="datepickerstart" ng-model="minRangeSliderForYear.minValue"  k-min = "minDate"  k-max = "maxDate" style="width: 100%" />
														</div>
														<div class="col-md-2 col-sm-2 col-xs-2 text-center to-text-calendar">
														<span>to</span>
														</div>
														
														 <div class="col-md-5 col-sm-5 col-xs-5 {{errorEndDateForFactual}}">
														<input  id="datepickerend"  ng-model="minRangeSliderForYear.maxValue"  k-min = "minDate"  k-max = "maxDate" style="width: 100%" />
														</div>
                                                    </div>
                                                        </div>
                                                </div>

                                            </div>
											 <div class="col-md-4 col-sm-12 display-table">
                                                <div class="slider-btn col-md-12">
                                                   <h3 class="adv-episode-heading col-sm-12">Number of Episodes</h3>
                                                   <div class="slider-movable">
                                                      <rzslider rz-slider-model="slider.minValue" rz-slider-high="slider.maxValue" rz-slider-options="slider.options"></rzslider>
                                                   </div>
                                                   <div class="slider-value text-left ">
                                                      <input  class="slider-min text-center {{errorClassForSliderMin}}" ng-model="slider.minValue" allow-pattern="\d"/><span class="to-text">to</span>
                                                      <input  class="slider-max text-center {{errorClassForSliderMax}}" ng-model="slider.maxValue" allow-pattern="\d"/>
                                                   </div>
                                                </div>
                                             </div>
											
                                            
                                          </div>
                                       </div>
                                       
									   <div class="row update-clear-box">
                                        <div class="update-clear-xs update-clear-sm">
                                            <div class="pull-right updatebtn">
                                                <button class="button-md btn-gold update-btn" ng-click="updateResultsForFactual()">Update Results</button>
                                            </div>
                                            <div class="pull-right refresh-sm ">
                                                <a class="clear-selection refresh-xs" href="#" ng-click="ClearSelections('Factual')">
                                                    <span class="refersh"></span>Clear selections</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                       
                     </div>
                  </div>
                  <!-- Sample -->
                  <div  ng-cloak>
                     <div ng-show="(category=='movies')">
						<div class="container">
                        <div class="advanced-btn display-group">
                           <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                              <button type="button" class="btn btn-success btn-lg btn-block" ng-click="advanceFilter('movies','show')"   ng-show="modeForMovies">
                                 Show advanced filters<!--<span class="glyphicon glyphicon-chevron-down"></span>-->
                                 <span class="down-arrow-img"></span>
                              </button>
                              <button type="button" class="btn btn-success btn-lg btn-block" ng-click="advanceFilter('movies','hide')"   ng-show="!modeForMovies">
                                 Close advanced filters<!--<span class="glyphicon glyphicon-chevron-up"></span>-->
                                 <span class="up-arrow-img"></span>
                              </button>
                           </div>
						   </div>
                        </div>
                        <div class="gray-bg searchresults-filter scriptedSeries border-top-none" ng-show="!modeForMovies">
                           <div class="gray-bg searchresults-filter typeMov border-top-none">
                              <div class="container">
                                 <div class="more-section collapse in" >
                                    <div class="series-radiobtn">
                                       <div class="series-radiobtn movie-radiobtn">
                                          <div class="row">
                                             <div class="slider-section display-group">
                                            
                                           <div class="col-md-4 col-sm-6">
                                                <div class="slider-btn">
                                                   <h3 class="adv-quality-heading col-sm-12">Quality</h3>
                                                   <div class="col-md-12 quality-sm">
                                                      <div class="col-md-4 col-sm-4" ng-repeat="Quality in QualityCheck[0]" ng-style="{'width' : conditionWidth}">
                                                         <input type="checkbox" name="checkbox-sd" id="{{Quality.AssetQualityLK +'1'}}" class="checkboxes" checklist-model="QualitiesCheckedForMovies.QualitiesSelectedForMovies" checklist-value="Quality.AssetQualityName"/>
                                                         <label id="checkbox-label" for="{{Quality.AssetQualityLK +'1'}}" >{{Quality.AssetQualityName}}
                                                         </label>
                                                      </div>
                                                   </div>
                                                  
                                                </div>											
                                           
                                             </div>
                                             
												 <div class="col-md-4 col-sm-6 col-xs-12">
                                                <div class="slider-btn">
                                                    <h3 class="adv-year-heading">Release Date</h3>
                                                   
                                                    <div class="text-left col-md-12 ae-calendar">
                                                        <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-xs-5 {{errorStartDateForMovies}}">
														<input id="datepickerstartMovie" ng-model="minRangeSliderForYearForMovies.minValue"  k-min = "minDate"  k-max = "maxDate"  style="width: 100%" />
														</div>
														<div class="col-md-2 col-sm-2 col-xs-2 text-center to-text-calendar">
														<span>to</span>
														</div>
														<div class="col-md-5 col-sm-5 col-xs-5 {{errorEndDateForMovies}}">
														<input ng-model="minRangeSliderForYearForMovies.maxValue"   id="datepickerendMovie" k-min = "minDate"  k-max = "maxDate" style="width: 100%" />
                                                        </div>
                                                    </div>
                                                        </div>
                                                </div>

                                            </div>
												
												
                                            <div class="col-md-4 col-sm-12 col-xs-12">
												
                                                <div class="slider-btn">
                                                    <h3 class="adv-genre-heading">Genre</h3>
                                                     <div  class="ae-multiselect display-group">
                                <div class="demo-section k-content" >
                                    <select kendo-multi-select k-options="selectOptions" k-ng-model="selectedIds" id="k-multidroplist"></select>
                                  
                                </div>
                            </div>
                                                </div>

                                            </div>
												
                                             </div>
                                          </div>
                                          
										  <div class="row update-clear-box">
                                        <div class="update-clear-xs update-clear-sm">
                                            <div class="pull-right updatebtn">
                                                <button class="button-md btn-gold update-btn" ng-click="updateResultsForMovies()">Update Results</button>
                                            </div>
                                            <div class="pull-right refresh-sm ">
                                                <a class="clear-selection refresh-xs" href="#" ng-click="ClearSelections('Movies')">
                                                    <span class="refersh"></span>Clear selections</a>
                                            </div>
                                        </div>
                                    </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
				  <!-- Here-->
				   <div  ng-cloak>
                     <div ng-show="(category=='all')">
						<div class="container">
                        <div class="advanced-btn display-group">
                           <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                              <button type="button" class="btn btn-success btn-lg btn-block" ng-click="advanceFilter('all','show')"   ng-show="modeForallCategory">
                                 Show advanced filters<!--<span class="glyphicon glyphicon-chevron-down"></span>-->
                                 <span class="down-arrow-img"></span>
                              </button>
                              <button type="button" class="btn btn-success btn-lg btn-block" ng-click="advanceFilter('all','hide')"   ng-show="!modeForallCategory">
                                 Close advanced filters<!--<span class="glyphicon glyphicon-chevron-up"></span>-->
								 <span class="up-arrow-img"></span>
                              </button>
                           </div>
						   </div>
                        </div>
                        <div class="gray-bg searchresults-filter scriptedSeries border-top-none" ng-show="!modeForallCategory">
                           <div class="gray-bg searchresults-filter typeMov border-top-none">
                              <div class="container">
                                 <div class="more-section collapse in">
                                    <div class="series-radiobtn">
                                       <div class="series-radiobtn movie-radiobtn">
                                          <div class="row">
                                             <div class="slider-section display-group">
                                             
                                           <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="slider-btn">
                                                   <h3 class="adv-quality-heading col-sm-12">Quality</h3>
                                                   <div class="col-md-12 quality-sm">
												   
                                                      <div class="col-md-4 col-sm-4"  ng-repeat="Quality in QualityCheck[0]" ng-style="{'width' : conditionWidth}">
													  
                                                         <input type="checkbox" name="checkbox-sd" id="{{Quality.AssetQualityLK + '2'}}" class="checkboxes" checklist-model="QualitiesCheckedForAll.QualitiesSelected" checklist-value="Quality.AssetQualityName"/>
                                                         <label id="checkbox-label" for="{{Quality.AssetQualityLK + '2'}}" >{{Quality.AssetQualityName}}
                                                         </label>
                                                      </div>
                                                   </div>
                                                  
                                                </div>											
                                           
                                             </div>
                                             
												 <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="slider-btn no-margin">
                                                    <h3 class="adv-year-heading">Release Date</h3>
                                                   
                                                    <div class="text-left col-md-12 ae-calendar">
                                                        <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-xs-5 {{errorStartDateForAll}}">
														<input id="datepickerstartAll" ng-model="minValueForAll"   k-min = "minDate"  k-max = "maxDate"  style="width: 100%" />
														</div>
														<div class="col-md-2 col-sm-2 col-xs-2 text-center to-text-calendar">
														<span>to</span>
														</div>
														<div class="col-md-5 col-sm-5 col-xs-5 {{errorEndDateForAll}}">
														<input ng-model="maxValueForAll"   id="datepickerendAll2" k-min = "minDate"  k-max = "maxDate" style="width: 100%" />
                                                        </div>
                                                    </div>
                                                        </div>
                                                </div>

                                            </div>
											
												
                                             </div>
                                          </div>
                                          
										   <div class="row update-clear-box">
                                        <div class="update-clear-xs update-clear-sm">
                                            <div class="pull-right updatebtn">
                                                <button class="button-md btn-gold update-btn" ng-click="updateResultsForAll()">Update Results</button>
                                            </div>
                                            <div class="pull-right refresh-sm ">
                                                <a class="clear-selection refresh-xs" href="#" ng-click="ClearSelections('all')">
                                                    <span class="refersh"></span>Clear selections</a>
                                            </div>
                                        </div>
                                    </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="gray-bg searchresults-filter typeMov border-top-none" >
                  <div class="container">
                     <div class="more-section collapse" id="Div1">
                        <div class="series-radiobtn movie-radiobtn">
                           <div class="row">
                              <div class="slider-section display-group">
                                 <div class="col-md-4">
                                    <div class="slider-btn">
                                       <h3 class="slider-heading">Number of Episodes</h3>
                                       <div class="slider-movable">
                                          <input id="slider1" type="text" /><br />
                                       </div>
                                       <div class="slider-value text-left">
                                          <input class="slider-min text-center" /><span class="to-text">to</span>
                                          <input class="slider-max text-center" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="slider-btn">
                                       <h3 class="slider-heading">Year Released</h3>
                                       <div class="slider-movable">
                                          <input id="slider2" type="text" /><br />
                                       </div>
                                       <div class="slider-value text-left">
                                          <input class="slider-min text-center" /><span class="to-text">to</span>
                                          <input class="slider-max text-center" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="slider-btn">
                                       <h3 class="slider-heading">Quality</h3>
                                       <div class="col-md-4">
                                          <input type="checkbox" name="checkbox-sd" id="checkboxsd" class="checkboxes" />
                                          <label class="checkbox-label" for="checkboxsd">SD </label>
                                       </div>
                                       <div class="col-md-4">
                                          <input type="checkbox" name="checkbox-hd" id="checkboxhd" class="checkboxes" checked/>
                                          <label class="checkbox-label" for="checkboxhd">HD</label>
                                       </div>
                                       <div class="col-md-4">
                                          <input type="checkbox" name="checkbox-3d" id="checkbox3d" class="checkboxes" checked/>
                                          <label class="checkbox-label" for="checkbox3d">3D</label>
                                       </div>
                                    </div>
                                 </div>
								
                              </div>                                            
                                           
												

                                           
                           </div>
                           <div class="row">
                              <div class="col-md-2 pull-right">
                                 <button class="button-md btn-gold update-btn">Update Results</button>
                              </div>
                              <div class="col-md-2 pull-right refresh-link">
                                 <a class="clear-selection" href="#">
                                 <span class="refersh"></span>Clear selections</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--movie search result end-->
               <!--factual search result start-->
               <div class="gray-bg searchresults-filter factualSeries border-top-none" >
                  <div class="container">
                     <div class="more-section collapse" id="Div2">
                        <div class="series-radiobtn movie-radiobtn">
                           <div class="row">
                              <div class="slider-section display-group">
                                 <div class="col-md-4">
                                    <div class="slider-btn">
                                       <h3 class="slider-heading">Number of Episodes</h3>
                                       <div class="slider-movable">
                                          <input id="slider4" type="text" /><br />
                                       </div>
                                       <div class="slider-value text-left">
                                          <input class="slider-min text-center" /><span class="to-text">to</span>
                                          <input class="slider-max text-center" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="slider-btn">
                                       <h3 class="slider-heading">Year Released</h3>
                                       <div class="slider-movable">
                                          <input id="slider5" type="text" /><br />
                                       </div>
                                       <div class="slider-value text-left">
                                          <input class="slider-min text-center" /><span class="to-text">to</span>
                                          <input class="slider-max text-center" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="slider-btn">
                                       <h3 class="slider-heading">Quality</h3>
                                       <div class="col-md-4">
                                          <input type="checkbox" name="checkbox-sd" id="checkbox1" class="checkboxes" />
                                          <label class="checkbox-label" for="checkboxsd">SD </label>
                                       </div>
                                       <div class="col-md-4">
                                          <input type="checkbox" name="checkbox-hd" id="checkbox2" class="checkboxes" checked/>
                                          <label class="checkbox-label" for="checkboxhd">HD</label>
                                       </div>
                                       <div class="col-md-4">
                                          <input type="checkbox" name="checkbox-3d" id="checkbox3" class="checkboxes" checked/>
                                          <label class="checkbox-label" for="checkbox3d">3D</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-2 pull-right">
                                 <button class="button-md btn-gold update-btn">Update Results</button>
                              </div>
                              <div class="col-md-2 pull-right refresh-link">
                                 <a class="clear-selection" href="#">
                                 <span class="refersh"></span>Clear selections</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--factual search result end-->
               <!-----./COLLAPSABLE end----->
               <!--end-->
            </section>
            <!--./image thumbnails start-->
            <section class="text-left dark-bg-medium  darkbg-xs last-box">
               <div class="container-lg">
                  <div class="container">
                     <div class="row imageslide-separation"   ng-cloak>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <h3 class="heading-text">{{TotalRecords}}<span id="titlesHeader" class="condensed-font"> {{TotalRecords === 1 ? 'Title' : 'Titles'}}</span></h3>
                        </div>
                        <div class="sort-selection" ng-show="TotalRecords!=0">
                           <div class="col-md-offset-4 col-md-4 col-sm-6 col-xs-12">
                              <div class="col-md-4 col-sm-4 text-right col-xs-4 sort-results-xs">
                                 <label class="sort-results">Sort results :</label>
                              </div>
                              <div class="col-md-8 col-sm-8 col-xs-8 sort-dropdownbox">
                                 <!--select box -->
                                 <div id="example"  class="ae-dropdown-small ae-dropdown-xs">
                                    <div class="demo-section k-content">
                                       <select kendo-drop-down-list style="width: 100%;" ng-model="selectedOption"  ng-change="sorting(selectedOption)" k-option-label="'Please Select'">
                                          <option value="Name">Alphabetically (A-Z)</option>
                                          <option value="-ReleasedDate">Most recently released</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
					 <div class="overlayLoader-wrapper-search">
                     <div class="row" id="ScriptedDiv">
					 <div id="overlayLoaderForCategory" style="display:none"><img id="loading"  src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif" ></div>
					  <div class="col-md-4 col-sm-6 col-xs-12" ng-repeat="match in MacthingResult | orderBy :['selectedOption','searchTerm'] track by $index">

                            <div class="image-slide" ng-cloak>
                                <!--  orderBy :['selectedOption','searchTerm']<img src="http://cdn-static.denofgeek.com/sites/denofgeek/files/styles/insert_main_wide_image/public/1/13//vikings_rollo_ragnar.jpg?itok=ul_3zp6I" alt=""> {{match.ImageUrl}}  http://dlaetniaenti.edgesuite.net/AETNI_B2B/1/167/i-20358_1_show.jpg-->
								<!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/{{match.URL}}">-->
								<img ng-src={{match.URL}} >
                                <div class="img-overlay" ng-click="GetDetailsPage(match)"></div>
								<div class="plus-img" ng-hide="match.ProgramType=='Format'">
                                           <img  class="{{match.PPLID + 'plus'}}" ng-click="AddToWatchlist(match.PPLID,match.ItemName)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus_gold.png">
										   <img  class="{{match.PPLID + 'minus'}}" ng-click="AddToWatchlist(match.PPLID,match.ItemName)" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus_gold.png" style="display:none">
										  <!-- <img id="" ng-src="<?php echo get_stylesheet_directory_uri(); ?>/{{ImgUrl}}">-->
								</div>
                                <div class="overlay-swiper-label" ng-click="GetDetailsPage(match)">
                                    <h3 class="video-thumb-titles">{{match.Name}}<!--Minute By Minute--></h3>
                                    <ul class="thumbnail-links">
                                       <!-- <li><a href="#" class="programTypeVal">{{match.ProgramType==='Scripted/Drama' ? 'Scripted' : (match.ProgramType === 'Unscripted/Factual' ? 'Factual' : 'Movie' )}}</a></li>-->
									   <li><a href="#" class="programTypeVal">{{match.ProgramType}}</a></li>
                                        <li ng-hide="match.SeasonCount===0">|</li>
										<li ng-show="match.ProgramType=='Movie'">{{match.YearProduced===0 ? '':(match.YearProduced === null ? '' : ' | '+match.YearProduced )}}</li>
										<li ng-show="match.ProgramType=='Format' && match.hasOwnProperty('genreName')">{{match.genreName===0 ? '':(match.genreName === null ? '' :' | '+match.genreName )}}</li>
                                        <li ng-hide="match.SeasonCount===0 || match.ProgramType=='Movie' || match.ProgramType=='Format'"><a href="#"><span class="counts">{{match.SeasonCount===0 ? '' : match.SeasonCount}}</span>{{match.SeasonCount===0 ? '':(match.SeasonCount === 1 ? 'Season' : 'Seasons' )}}</a></li>
                                        <li>{{match.SeasonCount===0 ? '' : '|'}}</li>
                                        <li ng-hide="match.PieceCount===0 || match.ProgramType=='Movie' || match.ProgramType=='Format'"><a href="#"><span class="counts">{{match.PieceCount===0 ? '' : match.PieceCount}}</span>{{match.PieceCount===0 ? '':(match.PieceCount === 1 ? 'Episode' : 'Episodes' )}}</a></li>
                                        <li style="display:none" class="subProgramTypeVal">{{match.SubProgramType}}</li>
										<li ng-show="match.hasOwnProperty('SeriesName')">|</li>
                                      <li ng-show="match.hasOwnProperty('SeriesName')">{{match.SeriesName}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                       </div>
					   </div>
                        <div class="row">
						<div class="custom-pagination ae-form-group">
						<div class="pagination-custom"   ng-cloak>
						<div class="pagination-box" ng-show="TotalRecords > itemsPerPage">
                                <custom-pagination total-items=TotalRecords ng-model="currentPage" items-per-page=itemsPerPage ng-click="myFunction()" >
                                     <span class="prev-textbox left"> 
									 <input type="text"  ng-model="currentPage" readonly />
                                     </span> 
									 <span class="left text-of">of</span> 
									 <span class="next-textbox left"><input type="text"  ng-model="numPages" disabled />
                   </span>
                                </custom-pagination>
							</div>
							</div>
							</div>
                        </div>
                     </div>
                  </div>
            
            </section>
            <!--./image thumbnails ends-->
         </div>
      </div>
   </div>
 

<!--./content end-->
<!--./footer end-->
<script>


$("#datepickerendAll").kendoDatePicker();

</script>
<?php 
get_footer();
?>
</div>