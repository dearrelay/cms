
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Contacts
 */

get_header(); ?>

  <!--./main content start-->
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
            				<div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
				<div class="container-lg">
                <section>
				<div class="container">
                    <div class="banner-heading text-center banner-heading-box">
                        a+e international contacts
                    </div>
                    
                    <div class="contacts-dropdown" ng-cloak>
                        
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                    <div class="ae-dropdown-lg ae-dropdown-xs">
                                        <div class="demo-section k-content">
                                            <select kendo-drop-down-list style="width: 100%;" ng-model="territory" 
													k-data-source="SalesTerritoryList" k-rebind="SalesTerritoryList"  k-on-change="changeTerritory(territory)">
											</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
					</div>
                </section>
                <section class="text-left dark-bg-large dark-bg-xs-contact last-box border-top-none">
                    <div class="container-lg">
                        <div class="container">
						
                            <div class="row" ng-cloak>
                                <div class="contacts-details col-md-4 col-sm-6 col-xs-12" ng-repeat="contact in ContactsList">
                                    <div class="contacts-info-box">
                                        <div class="contact-img-section" >
                                            <img class="img-responsive" ng-src="{{contact.Picture}}" alt="contact_circle_image"/>
                                        </div>
                                        <div class="form-gap-btm20 text-center">
                                            <h3>{{contact.Name}}</h3>
                                        </div>
                                        <div class="text-center">
                                            <h7 class="designation">{{contact.Designation}}
                                    <br />
                                    &nbsp;{{contact.Role}}
                                      </h7>
                                        </div>
                                        <div class="gap-group-top text-center">
                                            <div class="ae-small email">
                                                <a href="mailto:{{contact.Email}}">{{contact.Email}}</a>
                                            </div>
                                            <div class="ae-small email" ><a href="tel:{{contact.Phone}}">{{contact.Phone}}</a></div>
                                        </div>
                                    </div>

                                    <div class="contact-person">
                                        <div class="text-center">{{contact.SalesTerritory}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
				
		   </div>
        </div>
		</div>
        <!--./main content end-->
    </div>
<?php 
get_footer();
