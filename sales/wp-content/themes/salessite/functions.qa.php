<?php
/**
 * salessite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package salessite
 */

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
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on salessite, use a find and replace
	 * to change 'salessite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'salessite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'salessite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	$args = array(
     'size' => 'full',
);
	add_theme_support( 'site-logo',$args );

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

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function salessite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'salessite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	/*register_sidebar( array(
		'name'          => esc_html__( 'Movie Banners', 'salessite' ),
		'id'            => 'movies-banner',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );*/
	register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'salessite' ),
		'id'            => 'copyright',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Scripted Series Middle Center', 'salessite' ),
		'id'            => 'scripted-middle-center',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h1 class="center-head">',
		'after_title'   => '</h1><div class="head-md-bg"></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Movies Middle Center', 'salessite' ),
		'id'            => 'movies-middle-center',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h1>',
		'after_title'   => '</h1><div class="head-md-bg"></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Swipper Carousel', 'salessite' ),
		'id'            => 'swipper',
		'description'   => '',
		'before_widget' => '<section class="text-left gray-bg"><div class="container-lg">',
		'after_widget'  => ' </div>
            </section>',
		'before_title'  => '<div class="container"> <div class="row"><div class="col-md-12">
                            <h2 class="swiper-heading">',
		'after_title'   => '</h2>
                            <a class="right-align-box" href="#">Browse all</a>
                            </div>
                        </div>
                    </div>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Homepage', 'salessite' ),
		'id'            => 'homepagemiddle',
		'description'   => '',
		'before_widget' => '<p>',
		'after_widget'  => '</p>',
		'before_title'  => '<h1 class="center-head">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Login', 'salessite' ),
		'id'            => 'login',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<section class="gray-bg home-login-container" id="loginsectionId"><div class="container-lg"><div class="container">',
		'after_title'   => '</div></div></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Map', 'salessite' ),
		'id'            => 'map',
		'description'   => '',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<p>',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Count', 'salessite' ),
		'id'            => 'count',
		'description'   => '',
		'before_widget' => '<li id="%1$s" class="">',
		'after_widget'  => '</li>',
		'before_title'  => '<p>',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Count Mobile Channels', 'salessite' ),
		'id'            => 'countmobile',
		'description'   => '',
		'before_widget' => '<li id="%1$s" class="">',
		'after_widget'  => '</li>',
		'before_title'  => '<p>',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Count Mobile Languages', 'salessite' ),
		'id'            => 'countmobile1',
		'description'   => '',
		'before_widget' => '<li id="%1$s" class="">',
		'after_widget'  => '</li>',
		'before_title'  => '<p>',
		'after_title'   => '</p>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Count Mobile Households', 'salessite' ),
		'id'            => 'countmobile2',
		'description'   => '',
		'before_widget' => '<li id="%1$s" class="">',
		'after_widget'  => '</li>',
		'before_title'  => '<p>',
		'after_title'   => '</p>',
	) );
	
}
add_action( 'widgets_init', 'salessite_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function salessite_scripts() {

	if(is_user_logged_in ()) { $status=false; }else{ $status=true; }
	//wp_deregister_script('jquery');
    
    wp_enqueue_script( 'jquerymini', BASE_CDN_URL. '/js/jquery-1.11.3.min.js', array(jquery), '1.0.0', $status );
	wp_enqueue_script( 'jqueryui11', BASE_CDN_URL . '/Scripts/jquery-ui-1.11.4.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'angularmin', BASE_CDN_URL. '/Scripts/angular.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'angularrouter', BASE_CDN_URL . '/Scripts/angular-ui-router.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'bootstrapmin', BASE_CDN_URL . '/js/bootstrap.min.js', array(), '1.0.0', $status );
	if(is_page(scripted-details) || is_page(searchresults))
	   {	   	
		wp_enqueue_style( 'kendocommon', BASE_CDN_URL . '/css/kendo.common-material.min.css',false,'1.1');
		wp_enqueue_style( 'kendomaterial', BASE_CDN_URL . '/css/kendo.material.min.css',false,'1.1');
	   }
	wp_enqueue_style( 'bootstrapmin', BASE_CDN_URL . '/css/bootstrap.min.css',true,'1.1');
	wp_enqueue_style( 'swipermin', BASE_CDN_URL . '/css/swiper.min.css',true,'1.1');
	wp_enqueue_style( 'rzslider', BASE_CDN_URL . '/css/rzslider.min.css',true,'1.1');
    //wp_enqueue_script( 'picturefill', BASE_CDN_URL . '/js/picturefill.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'picturefillmain', BASE_CDN_URL . '/js/picturefill.js', array(), '1.0.0', $status );
	wp_enqueue_style( 'custom', THEME_URL . '/css/salseSite.min.css',true,'1.1');
	wp_enqueue_script( 'bootstraptpls', BASE_CDN_URL . '/js/ui-bootstrap-tpls.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'kendo', BASE_CDN_URL . '/js/kendo.all.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'constant', BASE_CDN_URL . '/app/constant.js', array(), '1.0.0', $status );
		
	wp_enqueue_script( 'enterdirec', BASE_CDN_URL . '/app/preLogin.min.js', array(), '1.0.0', $status );
	/**
 * After login
 */
   if(is_user_logged_in ()) { 
   wp_enqueue_script( 'searchresult', BASE_CDN_URL . '/app/postLogin.min.js', array(), '1.0.0', $status );

	   }
	   
		   
}
add_action( 'wp_enqueue_scripts', 'salessite_scripts' );

//require get_template_directory() . '/inc/custom-header.php';
//require get_template_directory() . '/inc/template-tags.php';*/
//Custom functions that act independently of the theme templates.
//require get_template_directory() . '/inc/extras.php'; */
//require get_template_directory() . '/inc/jetpack.php';*/


/**
 * Sets new user Cookies
 */
show_admin_bar(false);
function set_newuser_cookie($name=false,$value=false) {
	if($name){
	if ( !isset($_COOKIE[$name])) {
		setcookie( $name, $value, time()+6000, COOKIEPATH, COOKIE_DOMAIN, false);
	}}
}
add_action( 'init', 'set_newuser_cookie');
/**
 * User restrictions to Admin
 */
function salessite_redirect_admin(){
	if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
		wp_redirect( site_url() );
		exit;		
	}
}
add_action( 'admin_init', 'salessite_redirect_admin' );

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/*add_filter( 'auth_cookie_expiration', 'keep_me_logged' );
function keep_me_logged( $expirein ) {
    return 60; // 10mins
}*/
function logincheck(){
	if(!(is_user_logged_in () && isset($_COOKIE['user_id'])) ) {
  wp_logout();
  wp_redirect(site_url()."/login");  
}
}
