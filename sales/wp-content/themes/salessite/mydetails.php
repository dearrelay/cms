<?php  logincheck(); ?>

<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package salessite
 * Template Name: My Details
 */

get_header(); ?>

<!--./main content start-->
<div class="content content-mobile" ng-controller='MyAccountController' class="ng-cloak">
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
        <div class="banner-heading banner-heading-box text-center">
          <?php the_field('header_title');?>
        </div>

      </section>
      <section class="dark-bg-medium border-top-none last-box formbox-tab-mob">
        <div class="container">
          <div class="account-details ae-form-group">
            <!--ng-hide="(AccountDetailsJson.Email.indexOf('aenetworks.com')!= -1)"-->
            <div class="row">
              <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12" ng-hide="(AccountDetailsJson.Email.indexOf('aenetworks.com')!= -1)">
                <div class="change-pwd-box">
                  <div class="row ae-form-group" ng-show="ChangePwdFailed" ng-cloak="">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="alert alert-danger error-msg-text">{{invalidUserMessage}}</div>
                    </div>
                  </div>
                  <div class="row ae-form-group" ng-show="ChangePwdSuccess" ng-cloak="">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="alert alert-success error-msg-text">{{successUserMessage}}</div>
                    </div>
                  </div>
                  <form>
                    <h3 class="upper-case">
                      Change <span class="condensed-font">Password</span>
                    </h3>
                    <div class="form-gap-top40">
                      <div class=" eye-wrapper">
                        <span class="current-password">Current Password</span>
                        <input type="{{inputTypeCurrentPswd}}" class="{{currentpassword}}" ng-model="user.CurrentPassword" placeholder="Current Password" ng-keyup="CheckErrorCurrentPassword()">
                          <span class="eye-icon eyeicon-mydetail" ng-click="hideShowCurrentPassword()">
                            <i class="fa {{eyeClassNameCurrentPswd}}"></i>
                          </span>
                        </div>
                    </div>

                    <div class="form-gap-top20">
                      <div class="eye-wrapper">
                        <span class="new-password">New Password</span>
                        <input type="{{inputTypeNewPswd}}" class="{{newpassword}}" ng-model="user.NewPassword" placeholder="New Password" ng-keyup="CheckErrorNewPassword()">
                          <span class="eye-icon eyeicon-mydetail" ng-click="hideShowNewPassword()">
                            <i class="fa {{eyeClassNameNewPswd}}"></i>
                          </span>
                        </div>
                    </div>
                    <div class="form-gap-top20">
                      <div class="eye-wrapper">
                        <span class="current-password">Confirm Password</span>
                        <input type="{{inputTypeConfirmPswd}}" class="{{confirmpassword}}" ng-model="ConfirmPassword" placeholder="Confirm Password" ng-keyup="CheckErrorConfirmPassword()">
                          <span class="eye-icon eyeicon-mydetail" ng-click="hideShowConfirmPassword()">
                            <i class="fa {{eyeClassNameConfirmPswd}}"></i>
                          </span>
                        </div>
                    </div>
                    <div class="form-gap-top20">
                      <button class="button-md account-update-btn" ng-click='UpdatePasword(user)'>Update Password</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12">
                  <div class="personal-detail-box">
                    <h3 class="upper-case personal-detail-heading">
                      Personal <span class="condensed-font">Details</span>
                    </h3>
                    <p class="desc-mydetail">
                      Please email <span class="condensed-gold">
                        &lt;<a href="mailto:register@aenetworks.com" class="emailad-mydetail">register@aenetworks.com</a>&gt;
                      </span>to update your details
                    </p>


                    <div class="form-gap-top30 display-group ">

                      <input type="text" id="Text10" ng-value='AccountDetailsJson.FirstName'  placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text2" ng-value='AccountDetailsJson.LastName'  placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text3" ng-value='AccountDetailsJson.Position'  placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text4" ng-value='AccountDetailsJson.CompanyName'  placeholder="" disabled="">
                                        </div>
                  </div>
                  <div class="contact-details-box">
                    <h3 class="upper-case">
                      Contact <span class="condensed-font">Details</span>
                    </h3>
                    <div class="form-gap-top40">

                      <input type="text" id="Text5" ng-value='AccountDetailsJson.Email'  placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text9" ng-value='AccountDetailsJson.Phone1'  placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text9" ng-value='AccountDetailsJson.Phone2'  placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text6" ng-value='AccountDetailsJson.Street1' placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text7" ng-value='AccountDetailsJson.Street2'  placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text8" ng-value='AccountDetailsJson.City'  placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text8" ng-value='AccountDetailsJson.State'  placeholder="" disabled="">
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text8" ng-value='AccountDetailsJson.PostalCode'  placeholder="" disabled="">
											
                                        </div>
                    <div class="form-gap-top20">

                      <input type="text" id="Text8" ng-value='AccountDetailsJson.Country'  placeholder="" disabled="">
                                        </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </section>
    </div>

  </div>

  <!--./main content end-->
</div>
<?php 
get_footer();
?>
</div>