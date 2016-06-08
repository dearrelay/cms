
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Change Password
 */

get_header(); ?>

  <!--./main content start-->
       <div class="content content-mobile" ng-controller="ChangePassword">
   <div class="header-bg">
				<span picture-fill>
				<span pf-src="<?php the_field('header_mobile_image');?>"></span>
<span pf-src="<?php the_field('header_tablet_image');?>" data-media="(min-width: 768px)"></span>
<span pf-src="<?php the_field('header_background');?>" data-media="(min-width: 992px)"></span>
				</span>
            </div>
            <div class="form-top-bg">
                <div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div>
                    <section class="text-center login-content">
                <div class="container-lg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h1 class="banner-heading banner-heading-box">Change Your Password</h1>
                            </div>
							 <div class="login-group center-align text-left email-changepassword formbox-tab-mob">
                                    <h3>Current E-Mail <span class="condensed-font">{{UserDetails.Email}}</span></h3>
                             </div>
						</div>	
						<div class="row ae-form-group">
						<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
							
							<div ng-show="Passwordreset" class="alert alert-success">Password Reset successful</div>
							<div ng-show="LinkExpired" class="alert alert-danger">Link has Expired</div>
							<div ng-show="Passwordfailure" class="alert alert-danger">Please contact IT team to reset your password.</div>
						</div>
					</div>
						
						<div class="row ae-form-group">	
						
                            <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
                               
                            <div class="login-group eye-wrapper">
                                
                                <input type="{{inputTypeNewPswd}}" name="form-password" placeholder="New Password" ng-model="newpassword" class="form-password form-control modal-textbox {{errorClassNewPswd}}" id="Password1" ng-enter="changePassword()" ng-keyup="CheckErrorNewPassword()">
								<span class="eye-icon" ng-click="hideShowNewPassword()"><i class="fa {{eyeClassNameNewPswd}}"></i></span>
                            </div>
                            <div class="login-group eye-wrapper">
                                <input type="{{inputTypeConfirmPswd}}" name="form-password" placeholder="Confirm Password" ng-model="confirmpassword" class="form-password form-control modal-textbox {{errorClassConfirmPswd}}" id="Password2" ng-enter="changePassword()" ng-keyup="CheckErrorConfirmPassword()">
								<span class="eye-icon" ng-click="hideShowConfirmPassword()"><i class="fa {{eyeClassNameConfirmPswd}}"></i></span>
                            </div>
                                <div class="login-group margin-btm0">
                                   <button class="button-lg btn-gold SignIn-btn" ng-click="changePassword()" ng-disabled="ExpiredState">Change Password</button>
                            </div>
                            </div>
                        </div>
                </div>
                    </div>
            </section>
           </div>
    </div>
        <!--./main content end-->
<?php 
get_footer();
