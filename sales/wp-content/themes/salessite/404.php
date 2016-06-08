<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package salessite
 */

get_header(); ?>

	 <!--./main content start-->
        <div class="content content-mobile">
           <div class="container-lg">
		      <div class="error-bg error-overlay">
			  <div class="error-matter">		
			  <h2 class="error-warning">404.<br class="hidden-lg hidden-md hidden-sm">That's a wrap!</h2>
			  <p class="error-homelink">Sorry, there's no one here.Take me <a href="<?php echo site_url(); ?>">home</a></p>		
		      </div>
		    </div>
           </div>
        </div>
        <!--./main content end-->

<?php
get_footer();
