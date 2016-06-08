<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Press
 */

get_header(); ?><!--content-->
        <div class="content content-mobile" ng-controller="ContactPressController">
		<div class="container-lg">
              <div class="header-bg">
             	<span picture-fill>
				<span pf-src="<?php the_field('header_mobile_image');?>"></span>
<span pf-src="<?php the_field('header_tablet_image');?>" data-media="(min-width: 768px)"></span>
<span pf-src="<?php the_field('header_background');?>" data-media="(min-width: 992px)"></span>
				</span>
            </div>
            <div class="form-top-bg">
                <section>
                    <div class="banner-heading text-center banner-heading-box">Press Releases</div>
                </section>
              <div id="press-wrapper" class="container">
                <div id="press-list">
                  <div class="press-item" ng-repeat="release in PressList">
                    <article ng-click="ShowPopup(release,$index)">
                        <div class="article-picture" ng-show='(release.Picture !=null && release.Picture != undefined && release.Picture !=0)'>
                          <img ng-src="{{release.Picture}}"/>
                                                </div>
                      <div class="article-content">
                        <div class="press-detail">
                          <h3>{{release.Title}}</h3>
                          <div class="ae-small" ng-show="release.Company || release.Date">
                            {{release.Company}}
                            <span class="pipe" ng-show="release.Company && release.Date">|</span>{{release.Date  | date:'MMM dd yyyy' }}
                          </div>
                          <p class="visible-md hidden-xs visible-sm visible-lg" ng-show='release.Description != null || release.Description != undefined' ng-bind-html="(release.Description.length>250?release.Description.substring(0, 250) + '...' : release.Description)">
                           </p>
                          <p class="visible-xs hidden-md hidden-sm hidden-lg" ng-show='release.Description != null || release.Description != undefined' ng-bind-html='release.Description'>
                          </p>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
              <div class="container">
			  <div class="row">
                <div class="custom-pagination ae-form-group">
                  <div class="pagination-custom"   ng-cloak="">
                    <div class="pagination-box" ng-show="TotalRecords > itemsPerPage">
                      <custom-pagination total-items="TotalRecords" ng-model="currentPage" items-per-page="itemsPerPage" ng-click="myFunction()" >
                        <span class="prev-textbox left">
                          <input type="text"  value="{{currentPage}}" readonly="" />
                        </span>
                        <span class="left text-of">of</span>
                        <span class="next-textbox left">
                          <input type="text"  value="{{numPages}}" disabled="" />
                        </span>
                      </custom-pagination>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			</div>
			</div>
        </div>
        <!--content-->
<!--modal script-->
<script type="text/ng-template" id="PressModalContent.html">
  <button type="button" class="close" ng-click="cancel()" aria-label="Close">
    <span aria-hidden="true">
      <img src="http://dv2-images.aesalessite.com/dv2/wp-content/themes/salessite/images/modal_close.png" alt="close" />
    </span>
  </button>

  <div class="modal-body press-body no-padding">

    <div class="swiper-container  press-container" swiperpressdirective>
      <div class="swiper-wrapper">

        <div class="swiper-slide press-slide" ng-repeat="release in allPressList">
      
          <article>
            <div class="article-picture">
              <img ng-show="{{release.Picture}}" ng-src="{{release.Picture}}">
                <div class="img-overlay"></div>
                <h1 class="swiper-modal-heading center-head">{{release.Title}}</h1>
              </div>
            <div class="article-content modal-content-white">
              <div class="press-detail">
                
                  <div class="ae-small swiper-heading" ng-show="release.Company || release.Date">
                    {{release.Company}}
                    <!-- <span class="pipe" ng-show="release.Company && release.Date">|</span>{{release.Date  |dateSuffix}}</div> -->
                    <span class="pipe" ng-show="release.Company && release.Date">|</span>{{release.Date  | date:'MMM dd yyyy' }}                 
                </div>
                <p ng-show='release.Description != null || release.Description != undefined' ng-bind-html='release.Description'>
                </p>
               </div>
            </div>
          </article>
        </div>

      </div>
      
      <!-- Add Arrows -->
      
    </div>
     <div class="swiper-pagination pagination-center swiper-pagination-press"></div>
	<div class="swiper-button-next  swiper-button-next-press " ></div>
      <div class="swiper-button-prev  swiper-button-prev-press" ></div>

  </div>


</script>
<?php 
get_footer();