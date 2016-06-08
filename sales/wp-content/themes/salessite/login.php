   <?php                  
if(is_user_logged_in () && isset($_COOKIE['user_id']) ) {
  wp_redirect(site_url()."/home");
 } 
?>
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Login Page
 */

get_header(); 

?>
<div class="content content-mobile">
<div class="container-lg">

  <div class="header-bg">
             <span picture-fill>
<span pf-src="<?php the_field('header_mobile_image');?>"></span>
<span pf-src="<?php the_field('header_tablet_image');?>" data-media="(min-width: 768px)"></span>
<span pf-src="<?php the_field('header_background');?>" data-media="(min-width: 992px)"></span>
				</span>
            </div>
            <div class="form-top-bg">
            	<section class="text-center login-content">
            <div class="container-lg">
                <div class="container"  ng-controller="HomeController">                    
                    <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                                <div class="banner-heading banner-heading-box"><?php the_field('header_title'); ?></div>
                            </div>
							
                    </div>
					<div class="row ae-form-group" ng-show="IsInValidLoginPage">
						<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
							<div class="alert alert-danger error-msg-text"  style="display:none;" id="errorMessage">{{invalidUserMessage}}</div>
						</div>
					</div>
                    <div class="row ae-form-group">
                          <!-- <div class="alert alert-danger">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>Ooops !</strong> Invalid User. Please login again
							</div>-->
							
                            <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2" >
								<div class="login-group">
									<div id="overlayLoader"><img id="loading" src="<?php echo BASE_CDN_URL ?>/images/ajax-loader.gif"></div> 
									<div class="login-group">
										<input type="text"  class="{{errorClassEmail}}" ng-keyup="CheckErrorClassEmail()" name="form-username" placeholder="Email Address*" ng-model="modelData.userName"  class="form-username form-control" id="username" ng-enter="validateForm(modelData,'signin')">
										
									</div>
									
									<div class="login-group eye-wrapper">
										<input type="{{inputType}}" name="form-password" placeholder="Password*" ng-model="modelData.password" ng-keyup="CheckErrorClassPassword()" class="form-password form-control {{ShowPassword}} {{errorClassPassword}}" id="usr_pwd" ng-enter="validateForm(modelData,'signin')">
										   <span id="ShowHidePassword1" class="eye-icon" ng-click="hideShowPassword()"><i class="fa {{eyeClassName}}"></i></span>
									</div>									
								</div>
								<div class="login-group margin-btm0">
									<button class="button-lg btn-gold SignIn-btn" ng-click="validateForm(modelData,'signin')">Sign in</button>
								</div>
								<div class="forgot-password login-password">
									   <a href="" class="link-white" ng-click="forgotPassword()">Forgot your password?</a>
								</div>
                              <div class="login-group">
                                <a class="register-btn button-md" href="mailto:register@aenetworks.com">Not yet registered?</a>
                              </div>
							  
							</div>   
						</div>
					</div>
				</div>
    </section>
	
</div>
	</div>
</div>


<?php 
get_footer();

