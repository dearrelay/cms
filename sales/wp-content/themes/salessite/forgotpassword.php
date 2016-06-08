
<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: Forgot  Password
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
           
                <div class="container"  ng-controller="HomeController">                    
                    
       
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
                                <h1 class="banner-heading banner-heading-box">Forgot Password</h1>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 text-cnter">
                                    <p class="para-md desc">If you are a registered customer, please enter your email address below and we will send you instructions on how to reset your password</p>
                            </div>
							</div>
							<div class="row ae-form-group">
						<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2" ng-cloak>
								<div ng-show="EmailSent" class="alert alert-success">Password sent to your Email Id successfully</div>
							<div ng-show="EmailFailure" class="alert alert-danger">Unable to send password to your Email.</div>
              <div ng-show="EmailInvalid" class="alert alert-danger">You are not registered yet. Send email to <a href="mailto:register@aenetworks.com">register@aenetworks.com</a> for getting registered.</div>
                            <div ng-show="EmailWrong" class="alert alert-danger">Please contact IT team to reset your password</div>
							
						</div>
					</div>
						
							<div class="row">
                            <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12 ae-form-group">
                            <div class="login-group">
                                <input type="text" class=" form-username form-control {{errorClassEmail}}" ng-keyup="CheckErrorClassEmail()" name="form-username" placeholder="Email Address"   ng-model="emailAddress" ng-enter="SendEmail()">
                            </div>
                                <div class="login-group margin-btm0">
                                    <a ng-click="SendEmail()"><button class="button-md" ng-disabled="isEmailSent">Submit</button></a>
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

