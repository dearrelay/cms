<?php 

/**
 * Theme Option Page Example
 */
function ss_theme_menu()
{
    add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'theme_options.php', 'child-site1');  
add_action('admin_menu', 'ss_theme_menu');
}

if ( ! function_exists( 'salessite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function salessite_setup() {
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'salessite' ),
	) );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', 
		apply_filters( 'salessite_custom_background_args', 
			array(
		'default-color' => 'CCC',
		'default-image' => '',
	) ) );
	//add_theme_support( 'site-logo',$args );

}
endif;
add_action( 'after_setup_theme', 'salessite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function salessite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'salessite_content_width', 640 );
}
add_action( 'after_setup_theme', 'salessite_content_width', 0 );
	add_theme_support( 'custom-header' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '
    ' . __( "" ) . '
    <div class="form-gap"><input class="video-password" name="post_password" id="' . $label . '" type="password"  size="20"  placeholder="Password" /></div><input type="button" id="submit-password" name="Submit" class="modal-button" value="' . esc_attr__( "Submit" ) . '" />
    
    ';
    return $o;
	
}

function random_code($length=10) {

   $string = '';
   // You can define your own characters here.
   $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz1234567890";

   for ($p = 0; $p < $length; $p++) {
       $string .= $characters[mt_rand(0, strlen($characters)-1)];
   }

   return $string;

}


?>
