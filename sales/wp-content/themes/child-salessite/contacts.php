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
</div>
</section>
                <!--banner section ends-->
            
               <!--  Contact Section Start-->
                <section class="section-ms contacts-box" id="contacts">
                    <div class="ms-form-group">
                        <div class="container">
                            <div class="contacts-text text-center">
                                <h4>Contacts</h4>
                            </div>
                            <div class="contact-text">
                                For more information contact A+E Network Sales
                           
                            </div>
                            <div class="text-center">
                                <div class="message-us-ms">
                                    or message us
                                </div>
                            </div>
							<div class="row">
                                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                            <?php echo do_shortcode('[contact-form-7 id="83" title="Contact form 1"]');?> 
							</div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--  Contact Section ends-->


            </div>
            <!--content ends-->
  
<?php 
get_footer();