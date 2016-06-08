<?php
/**
* The header for our theme.
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package salessite
*/

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
                <head>
						<meta charset="<?php bloginfo( 'charset' ); ?>">
						<meta http-equiv="X-UA-Compatible" content="IE=edge">   
						<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
						<link rel="profile" href="http://gmpg.org/xfn/11">
						<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
						<meta http-equiv="refresh" content="7200" />
					<!-- 	<meta http-equiv="cache-control" content="no-cache,no-store,must-revalidate">
						<meta http-equiv="pragma" content="no-cache">
						<meta http-equiv="expires" content="0"> -->
                                                    
                        <script>                                                                                                                                                
									var imgthemeurl = '<?php echo BASE_CDN_URL ?>';
									var imgpath="<?php echo  BASE_IMG_CDN_URL ?>";
									var url='<?php echo site_url(); ?>';         
									<?php if(is_user_logged_in () && $_COOKIE['user_id'] &&  $_COOKIE['Token'] ) { ?>                                                                          
									 var usrid ="<?php echo $_COOKIE['user_id'] ?>";                                                                                            
									 var token ="<?php echo $_COOKIE['Token'] ?>";
									<?php } ?>
                        </script>
						<?php wp_head(); ?> 
						<style>
														[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
																		display: none !important;
														}
						</style>
						
                </head>
   <body >
        <div class="main" ng-app="salessiteApp"  ng-controller="HomeController">
                        
<!--./header start-->
            <header class="dark navbar-fixed-top noprint">
<!--./nav start-->
<div class="container-lg">
     
        <div class="header-top">
			<?php  if(!is_page('searchresults' ) && (is_user_logged_in () && isset($_COOKIE['user_id'])) ) { ?>
							<div class="searchbox-mobile hidden-md hidden-sm hidden-lg" id="searchCatalogueMobileId">
							<!--<img src="images/search_mobile.png">-->
											<div class="search-expand ui-widget" ng-controller="SearchController">
															<div class="search-transparent" ng-click="searchClick()"></div>
															<form>
																			<input type="search" placeholder="Search Catalogue" id="Searchtags" ng-model="query" ng-enter="searchClick()">
															</form>
											</div>
							</div>
			<?php } ?>

				<div class="row">
								
					<div class="col-md-6 col-sm-4 col-sm-offset-0 col-xs-6 col-xs-offset-3">
<!--.Site Logo Starts-->
												<div class="logo">
																<a class="logo-main" href="<?php echo site_url(); ?>/">
																				
																				<!-- <span picture-fill>
    <span pf-src="<?php echo BASE_IMG_CDN_URL ?>/common/logo_mobile.png"></span>
  <span pf-src="<?php echo BASE_IMG_CDN_URL ?>/common/ae_logo_1x.png" data-media="(min-width: 992px)"></span>
  <span pf-src=" <?php echo BASE_IMG_CDN_URL ?>/common/logo_tablet.png" data-media="(min-width: 768px)"></span>
</span> -->
<img  class="ae-logo" src="<?php header_image(); ?>">

																</a>
												</div>
<!--.Site Logo Ends-->
					</div>

								<div class="col-md-6 col-sm-8 col-xs-6 hidden-xs">
<!--.Top Navigation Starts-->                                                                                      
												<ul class="top-nav">
													<li><a href="<?php echo site_url(); ?>/contacts/">Contacts</a></li>
													<li><a href="<?php echo site_url(); ?>/press/">Press</a></li>
					<?php if(!(is_user_logged_in () && isset($_COOKIE['user_id']))) { ?>
<!--= true-->
													<li><a href="#" class="slidedown-arrow-white"  ng-click="showPopupForSignin()" data-placement="bottom">Sign in</a>
													</li>
								<?php } else { ?>                                                                  
									<li id="watchlistLiId" >
																  <a href="<?php echo site_url(); ?>/mywatchlist/">My Watchlists</a>
									</li>
									<li id="myAccountLiId" class="dropdown myaccount-dropdown">
									<a data-toggle="dropdown" href="#" class="dropdown-toggl slidedown-arrow-white">My Account</a>
												<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
												<li><a href="<?php echo site_url(); ?>/mydetails/">My Account Details</a></li> 
												<li class="signout-link"><a  href="#" id="signOutLiId" ng-click="signout()">Signout</a></li>                                                                
												</ul>
									</li>
																				<?php   } ?>
												</ul>
<!--.Top Navigation Ends-->                                                                                                                                       
								</div>
								  <div class="info-msg-white browser-support-text hidden-xs" id="browseMessage"></div>  
				</div>
</div>
</div>
		<div class="navbar-header">
										<button type="button" class="nav-toggle navbar-toggle" data-toggle="collapse" data-target="#mainmenu"><span></span>
										</button>
		</div>   
<!--.Main Menu Starts-->             
<div class="menu-bar">                                               
<div id="mainmenu" class="collapse navbar-collapse nav-link">
				
<div class="row">
<div class="col-md-6 col-md-offset-3 text-center">
	<nav class="navbar navbar-default mainmenu ">
			<ul class="nav navbar-nav topmenu">
			<li><a class="mobileFocus <?php if(is_page('scripted-details') ||is_page('scripted-series')) echo ' active'; ?> "  src-url="<?php echo site_url(); ?>/scripted-series/" ><span class="nav-pipe">|</span>Scripted</a> </li>                                                                                                                   
			<li><a class="mobileFocus <?php if(is_page('factual') ||  is_page('factual-detail') || is_page('factual-listings')) echo 'active';?>"  src-url="<?php echo site_url(); ?>/factual/"><span class="nav-pipe">|</span>Factual</a> </li>
			<li><a class="mobileFocus <?php if(is_page('movies') || is_page('movie-detail') || is_page('movie-listings')) echo 'active';?>"  src-url="<?php echo site_url(); ?>/movies/"><span class="nav-pipe">|</span>Movies</a> </li>
			<li><a class="mobileFocus <?php if(is_page('formats') || is_page('formats-details')) echo ' active';?>"  src-url="<?php echo site_url(); ?>/formats/"><span class="nav-pipe">|</span>Formats</a> </li>
			<hr class="visible-xs hidden-md hidden-sm hidden-lg horizontal-line" />
			<li class="hidden-md hidden-sm hidden-lg contacts-collapsebar"><a href="<?php echo site_url(); ?>/contacts/">Contacts</a> </li>
			<li class="hidden-md hidden-sm hidden-lg press-collapsebar"><a href="<?php echo site_url(); ?>/press/">Press</a> </li>
			<?php   if(is_user_logged_in () && isset($_COOKIE['user_id'])) { ?>
			<li class="hidden-md hidden-sm hidden-lg press-collapsebar"><a href="/mywatchlist/">My Watchlists</a> </li>
			<li class="hidden-md hidden-sm hidden-lg press-collapsebar xs-myac" data-toggle="collapse" data-target="#account-expand"><a  href="#">My Account</a>
			<span class="xs-myac-arrow"><img src="<?php echo BASE_CDN_URL ?>/images/slidedown_arrow_white.png"></span>

			<div class="xs-pop-myac hidden-sm hidden-md hidden-lg">
			<a href="<?php echo site_url(); ?>/mydetails/">My Account Details</a>
			<a ng-click="signout()" >Sign Out</a>
			</div>
			</li>

			</ul>
<input ng-controller="SearchController" ng-enter="searchClick()" ng-model="query" class="hidden-lg hidden-md hidden-xs header-search-control" type="search" placeholder="Search Catalogue" id="tags15" style="display:none">
					<div class="xs-pop-myac hidden-sm hidden-md hidden-lg collapse" id="account-expand">
<a href="<?php echo site_url(); ?>/mydetails/">My Account Details</a>
<a href="#" ng-click="signout()">Sign Out</a>
</div><?php   } ?>
	<div id="scrollbottom-menu"></div>
	</nav>
</div>

<?php   if(is_user_logged_in () && isset($_COOKIE['user_id'])) { ?>
<div class="header-searchbox" id="searchCatalogueId"  >
<div class="search-catalogue hidden-xs" ng-controller="SearchController">
					<form class="form-group has-feedback">
									<input type="text" class="header-search-control hide-input-sm" id="tagsDesktop" ng-model="query"   placeholder="Search Catalogue" ng-enter="searchClick()"/>
									<span class="search-catlog-icon hidden-sm" ng-click="searchClick()">
									<svg id="0f019f33-4adb-4de4-a815-0674fe68cc11" data-name="Search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><style>.\34 3c1ca71-6054-4ea3-a171-a15c3f4dab72{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style></defs><title>search icon</title><circle class="43c1ca71-6054-4ea3-a171-a15c3f4dab72" cx="9" cy="9" r="8"/><line class="43c1ca71-6054-4ea3-a171-a15c3f4dab72" x1="23" y1="23" x2="14.95" y2="14.95"/></svg>
									</span>
                                    <span class="search-catlog-icon search-catlog-tabicon hidden-lg hidden-md hidden-xs">
                                        <a class="tabsearch-relative">
                                            	<svg id="0f019f33-4adb-4de4-a815-0674fe68cc11" data-name="Search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><defs><style>.\34 3c1ca71-6054-4ea3-a171-a15c3f4dab72{fill:none;stroke:#fff;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style></defs><title>search icon</title><circle class="43c1ca71-6054-4ea3-a171-a15c3f4dab72" cx="9" cy="9" r="8"/><line class="43c1ca71-6054-4ea3-a171-a15c3f4dab72" x1="23" y1="23" x2="14.95" y2="14.95"/></svg>

										</a>
										<a href="<?php echo site_url(); ?>/searchresults/" ng-click="searchClick()" class="search-tabtransparent" style="display:none;"></a>
									</span>
					</form>
	</div>
</div>
<?php   } ?>
</div>
	<?php   if(!(is_user_logged_in () && isset($_COOKIE['user_id']))) { ?>
					<div class="popup-content-cms ae-form-group" ng-show="showPopup" id="test" style="display:none;">
					<div class="overlayLoader-wrapper">
				   <div class="pop-up-arrow-cms"></div>
					<div class="text-left">
									<h2 class="factualh2">SIGN IN</h2>
									<div class="alert alert-danger" ng-show="IsInValid">{{invalidUserMessage}}</div>
					</div>
					<div id="overlayLoader-signinmodal"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div> 
			<div class="popupbox-content">
							<div class="inner-addon right-addon">
															<input type="text" id="userName" ng-model="modelData.userName" class="{{errorClassEmail}}" ng-keyup="CheckErrorClassEmail()" name="form-username" placeholder="Email Address*" ng-enter="validateForm(modelData,'signinmodal')"/>
							</div>
			</div>
			<div class="popupbox-content eye-wrapper">
							<input type="{{inputType}}" name="form-password" ng-model="modelData.password" placeholder="Password*" id="usr_pwd" ng-keyup="CheckErrorClassPassword()" class="{{ShowPassword}} {{errorClassPassword}}" ng-enter="validateForm(modelData,'signinmodal')">
			<span id="ShowHidePassword1" class="eye-icon" ng-click="hideShowPassword()"><i class="fa {{eyeClassName}}"></i></span>
			</div>
			<div class="popupbox-content search-box display-group">
											<div style="width:370px">
															<button class="SignIn-btn btn-gold" ng-click="validateForm(modelData,'signinmodal')" id="signInPopOverId">Sign In</button>
											</div>
			</div>
			<div class="search-box display-group">
							<div class="text-center">
															<a  href="" class="forgot-password-popup-box link-black" ng-click="forgotPassword()">Forgot your password?</a>
							</div>
			</div>
			
	</div>
</div>
				<?php   } ?>
									<?php if(is_page('searchresults' )|| is_page('scripted-details' ) || is_page('movie-detail' ) || is_page('factual-detail') || is_page('formats-details')) { ?>
		<div class="back-btn hidden-xs" ng-click="GoBack()"><a href="javascript:history.go(-1)"><span class="hidden-sm">Back</span></a>
		</div>
																				<?php }
																				?>
    <?php if(is_page('factual-listings')) { ?>
		<div class="back-btn hidden-xs"><a href="<?php echo site_url(); ?>/factual/"><span class="hidden-sm">Back</span></a>
		</div>
																				<?php }
																				?>
    <?php if(is_page('movie-listings' )) { ?>
		<div class="back-btn hidden-xs"><a href="<?php echo site_url(); ?>/movies/"><span class="hidden-sm">Back</span></a>
		</div>
																				<?php }
																				?>
																				
				</div>
         </div>
<!--.Main Menu Ends-->
                                                                <!--./nav end-->
        </header>                  
            <!--./header end-->           
                <?php   if(is_user_logged_in () && isset($_COOKIE['user_id'])) { ?>                        
                <div class="add-to-list-container noprint hidden-xs" id="draftListId" ng-click="ShowDraftWatchlists()" style="display:none;">
                        <div class="addlist-circle" >
                            <h3 class="circle-font" id="selectionId" style="display:none;">Selection Added</h3>
							<h3 id="readytoAddId"><u><a class="circle-font" href="#">Add to Watchlist?</a></u></h3>
                        </div>
      </div>
                  <?php } ?>
                  <script type="text/ng-template" id="WatchListModalContentForDraft.html">
                     

                                                                   
                      <button type="button" class="close" ng-click="cancel()" aria-label="Close"><span aria-hidden="true"><img src="<?php echo BASE_CDN_URL ?>/images/modal_close.png" alt="close"></span></button>  <div id="overlayLoaderForDraft"><img id="loading"  src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif" ></div>              
                        <div class="modal-header modalheader-switchtab">
                           
                            <ul class="nav nav-tabs tab-design1 list-tab">
                                <li id="checklist-tab1" class="active"><a href="#list-selections" data-toggle="tab">1. Check your selections</a></li>
                                <li id="checklist-tab2"><a href="#list-watchlists" data-toggle="tab">2. Select your watchlists</a></li>

                            </ul>


                        </div>

                        <div class="modal-body">
                            <div class="tab-content">

                                <!-- ****************** list-selections tab ************************ -->
                                <div class="tab-pane fade in active" id="list-selections">
                                    <h2 id="myModalLabel" class="modal-title modaltitle-switchtab">
                                        <span>selected</span> <span class="condensed-light">titles</span>
                                    </h2>
									 
                                    <div id="list-selections-accordion">

                                        <!-- accordion panel start      **************************** -->
                                        <div id="watchlist-accordion">
                                            <div class="panel-group" id="accordion1">

                                                                                                                                                                                                

                                                <div class="panel panel-default {{((draft.SeasonDetail==null || draft.SeasonDetail.length==0) ? 'droparrow-hidden':'')}}" ng-repeat="draft in DraftWatchlistItems">
                                                    <div class="panel-heading panel-main-heading">
                                                                                                                                                                                                                <div class="accord-delete" ng-if="draft.ProgramType!=='series' || draft.WatchListSeriesID!==0" ng-click="deleteItemFromDraft(draft)"></div>
                                                        <h3 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#{{((draft.SeasonDetail.length>0 && draft.SeasonDetail!=null)? draft.SeriesID : '')}}">
                                                                <div class="accord-title">{{draft.SeriesName}}</div><div class="small-title">{{draft.SubProgramType}}</div>
                                                            </a>
                                                        </h3>
                                                    </div><!--/.panel-heading -->
                                                    <div id="{{draft.SeriesID}}" class="panel-collapse collapse">
                                                        <div class="panel-body season-block">
                                                            <div class="panel-body-inner no-padding">
                                                                <div class="row">
																																					
																																					
																																					
																																					              <div class="col-md-12" id="watchlist-accordion-nested-inner-modal">
																																													<div class="panel-group left-padding-space" id="nested3">

<div class="panel panel-default accord-border season-acord-border" ng-repeat="draftSeason in draft.SeasonDetail">
	<div class="panel-heading panel-season-heading" >
																																																													<div class="accord-delete" ng-if="draftSeason.EpisodeCountBySeason===draftSeason.EpisodeCountInWatchList" ng-click="deleteItemFromDraft(draftSeason)"></div>
		<h3 class="panel-title">
			<a class="seasonlink-watch1" data-toggle="collapse" data-parent="#nested3" href="#{{draftSeason.SeasonID}}">
			   Season {{draftSeason.SeasonNumber +(draftSeason.SeasonPart!=null?'-'+draftSeason.SeasonPart:'')}}
			</a>
		</h3>
	</div><!--/.panel-heading -->
	<div id="{{draftSeason.SeasonID}}" class="panel-collapse collapse in">
		<div class="panel-body">

			<div class="panel-body-inner no-padding">

				<div id="watchlist-accordion-nested-inner-nested">
					<div class="panel-group left-padding-space" id="nested11">

						<div class="panel panel-default accord-border droparrow-hidden" ng-repeat="draftEpisode in draftSeason.EpisodeDetail">
							<div class="panel-heading panel-episode-heading">
																																																																																					<div class="accord-delete" ng-click="deleteItemFromDraft(draftEpisode)"></div>
								<h3 class="panel-title">
								   <a data-toggle="collapse" data-parent="#nested11" href="#">
																																																																																																									Episode: {{draftEpisode.PieceNumber}} - {{draftEpisode.PieceTitle}}
									</a>
								</h3>
							</div><!--/.panel-heading -->
							<div id="{{draftEpisode.PieceNumber}}" class="panel-collapse collapse in">
								<div class="panel-body">

									
								</div><!--/.panel-body -->
							</div><!--/.panel-collapse -->
						</div><!-- /.panel -->


					</div>
				</div>
			</div>
			 </div><!--/.panel-body -->
	</div><!--/.panel-collapse -->
</div><!-- /.panel -->
</div>



	<!-- nested  ****************************************************************** -->
	<!-- /.panel-group -->

</div>
</div>
</div>

</div><!--/.panel-body -->
</div><!--/.panel-collapse -->
</div><!-- /.panel -->
</div><!-- /.panel-group -->
</div>
<!-- accordion panel end     **************************** -->
</div>
<div class="custom-footer custom-footer-new row">
		<div class="col-md-6 col-sm-6 col-xs-12">

			<div class="pull-left clear-mob" ng-click="clearDraft()">
			<a class="clear-selection clearselection-watchpop refresh-xs" href="javascript:void(0)">
			<span class="popup-refersh" ></span>Clear selections</a>
			</div>

		</div>
	<div class="col-md-6 col-sm-6 col-xs-12 pull-right">
<button class="button-md btn-gold" ng-click="ShowWatchlistTab()">Add selections to watchlists</button>
</div>    
</div>
                                </div>

                                <!-- ****************** list-selections tab end ************************ -->
                                <!-- ****************** list-watchlists tab ************************ -->
<div class="tab-pane fade" id="list-watchlists">

<div class="searchresults-content search-box searchpopup-box display-group ae-form-group row">
							<div class="col-md-12">
											<div class="icon-wrapper">
															<input type="text" class="searchresults-searchbox" ng-model="WatchListName" placeholder="Quick search watchlists">
															<span class="search-icon">
							<img ng-src="<?php echo get_stylesheet_directory_uri(); ?>/images/search_icon_black.png">
																			</span>
											</div>
							</div>
			</div>
<h2 id="myModalLabel" class="modal-title title-popup">
add <span class="condensed-light">to</span>
</h2>
<div id="" class="watchlists-checkbox-block" >
<div class="watchlists-checkbox" ng-repeat="draft in watchListsForCheckBox | filter:WatchListName track by $index">
<h3 class="checkbox-lable" id="{{draft.WatchListID}}" ng-click="clickFnLabel(draft.WatchListID)">{{draft.WatchListName}}</h3>
<div class="custom-checkbox-new custombox-popup">
<input type="checkbox" checklist-model="selectedWatchlists" checklist-value="draft.WatchListID" id="{{draft.WatchListID +'checkbox'}}" class="checkboxlist" name="checkbox" value="2" ng-click="labelHighlight(draft.WatchListID)">
<label class="checkbox-img" for="{{draft.WatchListID +'checkbox'}}">&nbsp;</label>
</div>
</div>

</div>
<div class="search-watchlists-block-new searchblock-popup">
<form class="search-watchlists-block">
<input type="text" class="search-watchlists-input {{errorClassName}}" ng-keyup="CheckErrorClassName()" ng-model="watchlistname" placeholder="New watchlist name">

<button class="button-md btn-gold btn-create-watchlists" ng-click="CreateWatchlistPopup(watchlistname)"><span class="icon-plus1"><span class="btn-txt">Create</span></span></button>
											</form>
</div>
			
<div class="custom-footer custom-footer-new row">
			<div class="col-md-6 col-sm-6 col-xs-12 pull-right">
<button class="button-md btn-gold" ng-click="MovetoSelectedWatchlists()" >Add to selected watchlists</button>
</div>    
</div>

</div>
	<!-- ****************** list-watchlists tab end ************************ -->
</div>



</div>




</script>

                  <script type="text/ng-template" id="SuccessMessageWatchlist.html">
    <div class="modal-header modalheader-xs">
      <button type="button" class="close" ng-click="cancelThis()" aria-label="Close">
        <span aria-hidden="true">
          <img src="<?php echo BASE_CDN_URL ?>/images/modal_close.png" alt="close" />
        </span>
      </button>
      <div class="success-image">
                                                                                                       <div class="success-ellipse"></div>
                                                                                                   </div>
    </div>
    <div class="modal-body">
                                                                                                <div class="success-poptext">
                                                                                                <h3>Your selections have been added to your selected list/s successfully</h3>
                                                                                                </div>
                                                                                                     <div class="custom-footer-error row">
                                                                                                    <div class="col-md-6 col-sm-6 col-xs-12 pull-left mobile-padding20">
                                  <button class="button-md btn-gold" ng-click="GotoWatchlist()">Go to your watchlists</button>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 pull-right">
                                  <button class="button-md btn-gold" ng-click="cancelMain()">Continue Browsing</button>
                            </div>                                                                                                       
                         </div>
                        </div>
    




</script>

<script type="text/ng-template" id="ErrorMessageWatchlist.html">




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
		<h3>There was an error saving to your watchlist.Please try again!</h3>
		</div>
					<div class="custom-footer-error row">
								   
						<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
						<button data-dismiss="modal" aria-label="Close" class="button-md btn-gold" ng-click="cancel()">Close</button>
						</div>                                                                                                       
                    </div>
</div>
    




</script>

<script type="text/ng-template" id="ClearDraftConfirmMessageWatchlist.html">




    <div class="modal-header modalheader-xs">
      <button type="button" class="close" ng-click="cancelConfirmation()" aria-label="Close">
        <span aria-hidden="true">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/modal_close.png" alt="close" />
        </span>
      </button>
                              
    </div>
     <div class="modal-body">
                                                                                                <div class="removelist-poptext">
                                                                                                <h3>Are you sure you want to remove all selections?</h3>
                                                                                                </div>
                                                                                                     <div class="custom-footer-error row">
                                                                                                   
                            <div class="col-md-4 col-md-offset-4 col-sm-4  col-sm-offset-4 col-xs-4 col-xs-offset-4">
                                  <button data-dismiss="modal" aria-label="Close" class="button-md btn-gold" ng-click="clearConfirmed()">OK</button>
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
<script type="text/ng-template" id="NoItemInCartMessageWatchlist.html">




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
                                                                                                <div class="removelist-poptext">
                                                                                               <h3> There are no items to add</h3>
                                                                                                </div>
                                                                                                     <div class="custom-footer-error row">
                                                                                                   
                            <div class="col-md-4 col-md-offset-4 col-sm-4  col-sm-offset-4 col-xs-4 col-xs-offset-4">
                                  <button data-dismiss="modal" aria-label="Close" class="button-md btn-gold" ng-click="cancel()">OK</button>
                            </div>                                                                                                       
                         </div>
                        </div>
</script>

