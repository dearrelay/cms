<?php  logincheck(); ?>

<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Watchlist
 */

get_header(); ?>

<!--./content start-->
<div class="content content-mobile" ng-controller="WatchlistController">
<div class="container-lg">

    <div class="header-bg">
               	<span picture-fill>
				<span pf-src="<?php the_field('header_mobile_image');?>"></span>
<span pf-src="<?php the_field('header_tablet_image');?>" data-media="(min-width: 768px)"></span>
<span pf-src="<?php the_field('header_background');?>" data-media="(min-width: 992px)"></span>
				</span>
            </div>
            <div class="searchresultstopbox-bg mywatchliststopbox-bg last-box">

    <!--./banner start-->
	<div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
    <div class="baanner-my-watchlist">
      <div class="container container-mywatchlist">
        <div class="banner-content">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
              <div class="banner-heading bannerheading-watch">MY WATCHLISTS</div>
              <p class="para-md">Here you can find all the titles, movies & episodes you have added throughout the A+E site.</p>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h3 class="count-watchlists">
                you <span class="condensed-light">have</span> <span ng-bind-template="{{watchListsForDropDown.length}}"></span> <span class="condensed-light">{{watchListsForDropDown.length == 1 ? 'watchlist' : 'watchlists'}}</span></h6>
                <div class="row">

                  <div class="col-md-6 col-sm-6 col-xs-12" >

                    <div class="ae-dropdown-lg ae-dropdown-xs selectpad-right margin-btm0" ng-hide="(watchListsForDropDown.length==0)">

                      <div class="demo-section k-content">
                        <select class="selectwatchdrop" id="WatchlistId"  k-option-label="'Select My Watchlist'" kendo-drop-down-list style="width: 100%;" ng-model="WacthclistValue" k-data-text-field="'WatchListName'"
													k-data-value-field="'WatchListID'"
													k-data-source="watchListsForDropDown" k-rebind="watchListsForDropDown" k-on-change="GetWatchlistDetails(WacthclistValue)" >
                        


                        </select>
                      </div>
                      <div class="ae-form-group error-margin">
                      <div class="alert alert-danger" ng-show="WatchListEmpty">We notice your watchlist is empty, are you sure you want to keep it? If not please delete.</div>
                        <div class="alert alert-danger" ng-hide="WatchListValid">Your watchlist no longer includes valid programs, please delete this watchlist and contact your sales representative for updates.</div>
                    </div>
                    </div>



                  </div>
                  <div class="col-md-6 col-sm-6 hidden-xs">
				  
                    <form class="search-watchlists-block">
					<div id="overlayLoader-newWatchlist" ><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div> 
                      <input type="text" class="search-watchlists-input {{errorClassName}}" ng-keyup="CheckErrorClassName()" placeholder="New watchlist name" ng-model="NewWatchlistName">

                        <button class="button-md btn-gold btn-create-watchlists" ng-click="CreateWatchlist(NewWatchlistName)">
                          <span class="icon-plus1">
                            <span class="btn-txt">Create</span>
                          </span>
                        </button>
                      </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>

    </div>


    <!--./banner end-->

    <!-- watchlists contain start -->

    <div class="watchlists-content" ng-hide="watchListsForDropDown.length==0 || WacthclistValue==''">
      <div class="container container-mywatchlist">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="row" ng-show="WatchlistDataExists">



              <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="my-watchlists">
                 
                  <p class="created-date" ng-bind-template="CREATED {{Watchlistdetails.CreatedDateString +((Watchlistdetails.SharedBy!=null)?', Shared by '+Watchlistdetails.SharedBy:'')}}"></p>
           
                  <h1 class="watch-name" ng-bind-template="{{Watchlistdetails.WatchListName}}"></h1>
                </div>
              </div>
              <div class="col-md-7 col-sm-12 col-xs-12">
                <div class="banner-btngroup btngroup-watch hidden-xs">
                  <button class="button-md btn-gold btn-ipad" ng-click="deleteWatchlist()">
                    <span class="delete-btn">
                      <span class="hidden-xs">Delete</span>
                    </span>
                  </button>
                  <button class="button-md btn-gold btn-ipad btn-mob" ng-show="Watchlistdetails.IsSeller" ng-click="showPopupForWatchlist()">
                    <span class="share-btn">
                      <span class="hidden-xs">Share</span>
                    </span>
                  </button>
                  <button class="button-md btn-gold btn-ipad hidden-xs" ng-click="ExportToCSV()">
                    <span class="print-btn">Export (.xls)</span>
                  </button>
                </div>

                <div class="sort-selection sortselection-watch row">
                  <div class="col-md-7 col-sm-12 col-xs-12 pull-right">
                    <div class="col-md-4 col-sm-4 text-right col-xs-4 sort-results-xs">
                      <label class="sort-results">Sort results:</label>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8 no-padding dropdown-results-xs">
                      <div class="ae-dropdown-small ae-dropdown-xs">
                        <div class="demo-section k-content">
                          <select class="selectwatchdrop" ng-model="sortingWatchlist" kendo-drop-down-list style="width: 100%;" ng-change="sorting(sortingWatchlist)">
                           
                            <option value="Name">Alphabetically(A-Z)</option>
                            <option value="CreatedDate">Most recently created</option>

                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- pagination start-->
            <div class="row">
              <div class="col-md-12">

                <!-- accordion panel start      **************************** -->
                <div id="watchlist-accordion">
				
                  <div class="panel-group no-margin" id="accordion">
					<!-- /.panel -->
					<!--<div ng-if="WatchlistDataExists">-->
                    <div class="panel panel-default dragdrop" ng-repeat="seriesDetail in seriesDetails |orderBy:sortbyDate">
                      <div class="panel-heading">
					
					  <div class="accord-delete hidden-xs" ng-click="deleteWatchlistAccordian(seriesDetail)"></div>
                        <h3 class="panel-title">
                          <a href="" class="collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#{{seriesDetail.SeriesID}}">
                            <div class="accord-title" ng-bind-template="{{seriesDetail.SeriesName}}"></div>
							<div class="small-title">{{seriesDetail.SubProgramType}}</div>
							
                          </a>
                        </h3>
                      </div>
                      <!--/.panel-heading -->
                      <div id="{{seriesDetail.SeriesID}}" class="panel-collapse collapse">
                        <div class="panel-body panelbody-watch">
                          <div class="panel-body-inner">
                            <div class="row">
                              <div class="col-md-6 col-sm-12 col-xs-12 detail-desc-box-left">

                                <figure class="figure">
                                    <div ng-show="seriesDetail.IScreenerAvailable" class="playbtn-img hidden-xs" ng-click="showScreenerModal(seriesDetail)">
                                                            <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/play_btn.png">
                                                        </div>
                                  
                                  <img class="pfimage-width" ng-if="!(seriesDetail.ImageUrlDesktop1x)" ng-src="{{seriesDetail.ImageUrl}}">
                                    <span picture-fill="" ng-if="seriesDetail.ImageUrlDesktop1x">
                                      <span class="image-widthpf" pf-src="{{seriesDetail.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                      <span class="image-widthpf" pf-src="{{seriesDetail.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                      <span class="image-widthpf" pf-src="{{seriesDetail.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                      <span class="image-widthpf" pf-src="{{seriesDetail.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                      <span class="image-widthpf" pf-src="{{seriesDetail.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                                      <span class="image-widthpf" pf-src="{{seriesDetail.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                                    </span>
                                  </figure>

                              </div>
                              <div class="col-md-6 col-sm-12 col-xs-12 detail-desc-box-right">
                                <p class="desc-watch" ng-bind-html="seriesDetail.SeriesDescription"></p>
                                <a class="button-sm btn-gold small-btn small-btn-watch" href="" ng-click="GetDetailsPage(seriesDetail)">Go to detail page</a>
                              </div>
                              
                              <div class="col-md-12 col-sm-12 col-xs-12" id="watchlist-accordion-nested-inner">

                                <!-- nested  ****************************************************************** -->

                                <div class="panel-group no-margin" id="nested">

                                <div class="panel panel-default accord-noborder"  ng-repeat="season in seriesDetail.SeasonDetail" >
                                    <div class="panel-heading accord-border">
									  <div class="accord-delete hidden-xs" ng-click="deleteWatchlistAccordian(season)"></div>
                                      <h3 class="panel-title">
                                        <a href="" class="seasonlink-watch" id="season1id" data-toggle="collapse" data-parent="#nested" data-target="#{{season.SeasonID}}">
                                          <div class="accord-title" ng-bind-template="Season {{season.SeasonNumber+(season.SeasonPart!=null?'-'+season.SeasonPart:'')}}"></div>
                                          <div class="small-title">{{season.EpisodeCountInWatchList + " of "+season.EpisodeCountBySeason +" Episodes Added"}}</div>
										  
                                        </a>
                                      </h3>
                                    </div>
                                    <!--.panel-heading -->
                                    <div id="{{season.SeasonID}}" class="panel-collapse collapse in">
                                      <div class="panel-body">

                                        <div class="panel-body-inner accord-noborder no-padding">

                                          <!-- nested of nested inner ******************************************************************-->
                                          <div id="watchlist-accordion-nested-inner-nested">
                                            <div class="panel-group left-padding-space accord-border" id="nested1">

                                           <div class="panel panel-default" ng-repeat="episode in season.EpisodeDetail">
                                                <div class="panel-heading">
												  <div class="accord-delete hidden-xs" ng-click="deleteWatchlistAccordian(episode)"></div>
                                                  <h3 class="panel-title">
                                                    <a href="" class="seasonlink-watch" data-toggle="collapse" data-parent="#nested1" data-target="#{{episode.PieceID}}">
                                                      <span ng-bind-template="Episode {{episode.PieceNumber}} - {{episode.PieceTitle}}"></span>
                                                    </a>
                                                  </h3>
                                                </div>
                                                <!--.panel-heading -->
                                                <div id="{{episode.PieceID}}" class="panel-collapse collapse in">
                                                  <div class="panel-body">

                                                    <div class="panel-body-inner">
                                                      <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 detail-desc-box-left">
                                                          <figure class="image_block" >        
                                                              
                                                            <img class="pfimage-width" ng-if="!(episode.ImageUrlDesktop1x)" ng-src="{{episode.EpisodeImageUrl}}">
                                                              <span picture-fill="" ng-if="episode.ImageUrlDesktop1x">
                                                                <span class="image-widthpf" pf-src="{{episode.ImageUrlMobile1x}}" data-media="(min-width: 320px)"></span>
                                                                <span class="image-widthpf" pf-src="{{episode.ImageUrlMobile2x}}" data-media="(min-width: 320px) and (min-resolution: 2dppx)"></span>
                                                                <span class="image-widthpf" pf-src="{{episode.ImageUrlTablet1x}}" data-media="(min-width: 768px)"></span>
                                                                <span class="image-widthpf" pf-src="{{episode.ImageUrlTablet2x}}" data-media="(min-width: 768px) and (min-resolution: 2dppx)"></span>
                                                                <span class="image-widthpf" pf-src="{{episode.ImageUrlDesktop1x}}" data-media="(min-width: 992px)"></span>
                                                                <span class="image-widthpf" pf-src="{{episode.ImageUrlDesktop2x}}" data-media="(min-width: 992px) and (min-resolution: 2dppx)"></span>
                                                              </span>  
                                                            <div class="playbtn-thumb" ng-show="episode.IScreenerAvailable" ng-click="showScreenerModal(episode)">
                                                                  <img src="https://images.sales.aenetworks.com/wp-content/themes/salessite/images/play_btn.png">
                                                              </div>
                                                            </figure>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 detail-desc-box-right">
                                                          <p class="desc" ng-bind-html="episode.PieceDescription"></p>
                                                        </div>
                                                      </div>
                                                    </div>

                                                  </div>
                                                  <!--/.panel-body -->
                                                </div>
                                                <!--/.panel-collapse -->
                                              </div>
                                              <!-- /.panel -->


                                         
                                              <!-- /.panel -->


                                            </div>
                                          </div>

                                        </div>
                                        <!-- nested of nested inner ****************************************************************** -->

                                      </div>
                                      <!--/.panel-body -->
                                    </div>
                                    <!--/.panel-collapse -->
                                  </div>
                                  <!-- /.panel -->

                                
                                  <!-- /.panel -->


                                </div>

                                <!-- nested  ****************************************************************** -->
                                <!-- /.panel-group -->

                              </div>
                            </div>
                          </div>

                        </div>
                        <!--/.panel-body -->
                      </div>
                      <!--/.panel-collapse -->
                    </div>
					<!--</div>-->
                    <!-- /.panel -->

                    <!-- /.panel -->


                    <!-- /.panel -->


                  </div>
                  <!-- /.panel-group -->
                </div>
                <!-- accordion panel end     **************************** -->

              </div>
            </div>
            <!-- pagination end-->

          </div>
        </div>
      </div>
    </div>

    <!-- watchlists contain end -->
<!-- modal pupup start ******************************************************* -->
        <!-- Modal -->
      

  </div>
</div>
</div>
<!--script -->

<script type="text/ng-template" id="WatchListModalContent.html">

  
     
	            
					<div class="modal-header modalheader-xs">
                           <button type="button" class="close" ng-click="cancel()" aria-label="Close"><span aria-hidden="true"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/modal_close.png" alt="close" /></span></button>
				
			<h2 class="modal-title" id="myModalLabel">
                                <span>share</span> <span class="condensed-light">watchlist</span>
                            </h2>	
                        </div>
			<div class="modal-body">
                            <h3 class="to-title-txt">To</h3>
                            <div class="mselect-wraper">
                            <div ng-app="KendoDemos" class="ae-multiselect">
                                <div class="demo-section k-content">
                                    <select kendo-multi-select k-options="selectOptions" k-ng-model="selectedIds" id="k-multidroplist"></select>
                                </div>
							</div>
                            </div>
							<h3 class="to-title-txt">Messages</h3>
                            <div class="textarea-block">
								<textarea class="message-textarea" ng-model="shareNotes" id="placeholder-img" placeholder="Type notes here..." maxlength="500"></textarea>
                            </div>
		</div>
			<div class="modal-footer">
                            <div class="row">
                                <div class="col-xs-12 col-md-7 col-sm-7 sendme-check">
                                    <div class="custom-checkbox">
                                        <input class="sendme-checkbox" ng-model="IsMailCopy" type="checkbox" value="2" name="checkbox" id="checkbox6">
                                        <label for="checkbox6">Send me a copy of this message</label>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-5 col-sm-5">
                                    <button class="button-md btn-gold" ng-click="shareWithUsers()">Share Watchlist</button>
                                </div>

                            </div>
                        </div>
						
						
		

                   
              
            
            
       
</script>

<script type="text/ng-template" id="DeleteWatchlisConfirmMessage.html">


  

    <div class="modal-header modalheader-xs">
      <button type="button" class="close" ng-click="cancel()" aria-label="Close">
        <span aria-hidden="true">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/modal_close.png" alt="close" />
        </span>
      </button>

    </div>
    <div class="modal-body">
      <div class="removelist-poptext">
        <h3>Are you sure you want to delete current watchlist?</h3>
      </div>
      <div class="custom-footer-error row">

        <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
          <button data-dismiss="modal" aria-label="Close" class="button-md btn-gold" ng-click="clearConfirmed()">OK</button>
        </div>
      </div>
    </div>



  

</script>
<script type="text/ng-template" id="PlayWatchlisScreener.html">
<div class="modal-watchlist-mobile">
          <button type="button" class="close" ng-click="cancelThis()" aria-label="Close">
        <span aria-hidden="true">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/modal_close.png" alt="close" />
        </span>
      </button>
       <iframe class="mobile-iframe-watchlist" id="screenerWatchList" width="100%" height="100%" style="height:540px; !important;" scrolling="no" framepadding="0" frameborder="0" allowtransparency="true" seamless="seamless"
                    allowfullscreen mozallowfullscreen msallowfullscreen webkitallowfullscreen>Your browser does not support iframes.</iframe>
    
</div>
</script>


<script type="text/ng-template" id="SuccessShareMessageWatchlist.html">


  

    <div class="modal-header modalheader-xs">
      <button type="button" class="close" ng-click="cancelThis()" aria-label="Close">
        <span aria-hidden="true">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/modal_close.png" alt="close" />
        </span>
      </button>
      <div class="success-image">
        <div class="success-ellipse"></div>
      </div>
    </div>
    <div class="modal-body">
      <div class="success-poptext">
        <h3>Your watchlist has been successfully shared to selected users.</h3>
      </div>
      <div class="custom-footer-error row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
          <button data-dismiss="modal" aria-label="Close" class="button-md btn-gold" ng-click="cancelMain()">OK</button>
        </div>
      </div>
    </div>





</script>

<script type="text/ng-template" id="ErrorShareMessageWatchlist.html">




    <div class="modal-header modalheader-xs">
      <button type="button" class="close" ng-click="cancel()" aria-label="Close">
        <span aria-hidden="true">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/modal_close.png" alt="close" />
        </span>
      </button>
     
        <div class="error-image">
          <div class="error-ellipse"></div>
        </div>

      </div>
      <div class="modal-body">
        <div class="error-poptext">
          <h3>There was an error sharing your watchlist.<br>Please try again!</h3>
        </div>
        <div class="custom-footer-error row">

          <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <button data-dismiss="modal" aria-label="Close" class="button-md btn-gold" ng-click="cancel()">Close</button>
          </div>
        </div>
      </div>





  </script>
   <script type="text/ng-template" id="OverrideConformationMessageWatchlist.html">
    <div class="modal-header modalheader-xs">
      <button type="button" class="close" ng-click="cancelThis()" aria-label="Close">
        <span aria-hidden="true">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/modal_close.png" alt="close" />
        </span>
      </button>
    <div class="error-image">
          <div class="error-ellipse"></div>
        </div>
    </div>
    <div class="modal-body">
						<div class="success-poptext">
						<h3>This WatchList name already exists. Do you want to override existing watchList?</h3>
						</div>
						     <div class="custom-footer-error row">
						    <div class="col-md-6 col-sm-6 pull-left">
                                  <button class="button-md btn-gold" ng-click="Yes()">Yes</button>
                            </div>
                            <div class="col-md-6 col-sm-6 pull-right">
                                  <button class="button-md btn-gold" ng-click="No()">No</button>
                            </div>							
                         </div>
                        </div>




</script>

<?php 
get_footer();
?>