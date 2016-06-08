<?php
/**
 * salessite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package salessite
 */
log_me("cookies after login:" . json_encode($_COOKIE));
 
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
	if(is_user_logged_in () || !is_admin() ) { 
			$status=false; }else{ $status=true; 
	}
	wp_deregister_script('jquery');
	wp_register_script('jquery', BASE_CDN_URL. '/js/jquery-1.11.3.min.js', '1.11.3');
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'jqueryui11', BASE_CDN_URL . '/js/jquery-ui-1.11.4.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'angularmin', BASE_CDN_URL. '/js/angular.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'angularsanitize', BASE_CDN_URL .'/js/angular-sanitize.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'angularpf', BASE_CDN_URL . '/js/angular-picturefill.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'angularrouter', BASE_CDN_URL . '/js/angular-ui-router.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'bootstrapmin', BASE_CDN_URL . '/js/bootstrap.min.js', array(), '1.0.0', $status );
	wp_enqueue_style( 'kendocommon', BASE_CDN_URL . '/css/kendo.common-material.min.css',false,'1.1');
	wp_enqueue_style( 'kendomaterial', BASE_CDN_URL . '/css/kendo.material.min.css',false,'1.1');
	wp_enqueue_style( 'bootstrapmin', BASE_CDN_URL . '/css/bootstrap.min.css',true,'1.1');
	wp_enqueue_style( 'font-awsome', BASE_CDN_URL . '/css/font-awesome.css');
	wp_enqueue_style( 'bootstrpslider', BASE_CDN_URL . '/css/bootstrapslider.css',true,'1.1');
	wp_enqueue_style( 'jqueryui', BASE_CDN_URL . '/css/jquery-ui.css',true,'1.1');
	wp_enqueue_style( 'swipermin', BASE_CDN_URL . '/css/swiper.min.css',true,'1.1');
	wp_enqueue_style( 'style', THEME_URL . '/css/style.css',true,'1.1');
	wp_enqueue_style( 'custom', THEME_URL . '/css/custom.css',true,'1.1');
	wp_enqueue_style( 'rzslider', BASE_CDN_URL . '/css/rzslider.min.css',true,'1.1');
	wp_enqueue_script( 'picturefillmain', BASE_CDN_URL . '/js/picturefill.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'custom', THEME_URL . '/app/custom.js', array(), '1.0.0', $status );
	//wp_enqueue_script( 'scriptedseries', THEME_URL . '/app/scriptedseries.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'swiper2', THEME_URL . '/app/swiper.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'bootstrslider', BASE_CDN_URL . '/js/bootstrapslider.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'bootstraptpls', BASE_CDN_URL . '/js/ui-bootstrap-tpls.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'rzslider', BASE_CDN_URL . '/js/rzslider.js', array(), '1.0.0', $status );		
	wp_enqueue_script( 'app', BASE_CDN_URL . '/app/app.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'constant', THEME_URL . '/app/constant.js', array(), '1.0.0', $status );		
	wp_enqueue_script( 'cuspagdir', THEME_URL . '/app/controllers/custompaginationdirective.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'baseservice', THEME_URL . '/app/services/baseservice.js', array(), '1.0.0', $status );	
	wp_enqueue_script( 'watchlistservice', THEME_URL . '/app/services/watchlistservice.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'Draftwatchlistservice', THEME_URL . '/app/services/draftwatchlistservice.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'homecontr', THEME_URL . '/app/controllers/homecontroller.js', array(), '1.0.0', $status );	
	wp_enqueue_script( 'swiperser', THEME_URL . '/app/services/swiperservice.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'authentication', THEME_URL . '/app/services/authenticationservices.js', array(), '1.0.0', $status );	
	wp_enqueue_script( 'swiperpressdirective', THEME_URL . '/app/controllers/swiperpressdirective.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'pressmodalcontroller', THEME_URL . '/app/controllers/pressmodalcontroller.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'contacts', THEME_URL . '/app/controllers/contactpresscontroller.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'kendo', BASE_CDN_URL . '/js/kendo.all.min.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'checklistmodel', THEME_URL. '/app/controllers/checklist-model.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'seriesdata', THEME_URL . '/app/services/seriesdataservice.js', array(), '1.0.0', $status );	
	wp_enqueue_script( 'enterdirec', THEME_URL . '/app/controllers/enterdirective.js', array(), '1.0.0', $status );
	wp_enqueue_script( 'changepswd', THEME_URL . '/app/controllers/changepassword.js', array(), '1.0.0', $status );
	
if(is_front_page())
	wp_enqueue_script( 'homebanner', THEME_URL . '/app/homebanner.js', array(), '1.0.0', $status );
	/**
	* After login
	*/
	if(is_user_logged_in ()) 
	{
		wp_enqueue_script( 'searchresult', THEME_URL . '/app/controllers/searchresultcontroller.js', array(), '1.0.0', $status );
		wp_enqueue_script( 'searchcatal', THEME_URL . '/app/controllers/searchcatalogue.js', array(), '1.0.0', $status );
		wp_enqueue_script( 'autocomplete', THEME_URL . '/app/services/autocompleteservice.js', array(), '1.0.0', $status );
		wp_enqueue_script( 'browseall', THEME_URL . '/app/services/browseallservice.js', array(), '1.0.0', $status );
		//wp_enqueue_script( 'seriesservice', THEME_URL . '/app/services/seriesservice.js', array(), '1.0.0', $status );
		wp_enqueue_script( 'listing', THEME_URL . '/app/controllers/listingcontroller.js', array(), '1.0.0', $status );
		wp_enqueue_script( 'scriptedseriescontroller', THEME_URL . '/app/controllers/scriptedseriescontroller.js', array(), '1.0.0', $status );
		wp_enqueue_script( 'modelWatchlist', THEME_URL . '/app/controllers/modelinstancewatchlistcontroller.js', array(), '1.0.0', $status );
		if (is_page('scripted-details') || is_page('movie-detail') || is_page('factual-detail'))
		{
			wp_enqueue_script( 'swipergallerydirective', THEME_URL . '/app/controllers/swipergallerydirective.js', array(), '1.0.0', $status );
			wp_enqueue_script( 'gallerymodalcontroller', THEME_URL . '/app/controllers/gallerymodalcontroller.js', array(), '1.0.0', $status );
			wp_enqueue_script( 'scriptedetailcont', THEME_URL . '/app/controllers/scripteddetailcontroller.js', array(), '1.0.0', $status );
			wp_enqueue_script( 'scriptedetswiper', THEME_URL . '/app/scripteddetailsswiper.js', array(), '1.0.0', $status );		
		}
		if (is_page('formats-details'))
		{
			wp_enqueue_script( 'scriptedetailcont', THEME_URL . '/app/controllers/formatsdetailcontroller.js', array(), '1.0.0', $status );
			wp_enqueue_script( 'scriptedetswiper', THEME_URL . '/app/scripteddetailsswiper.js', array(), '1.0.0', $status );		
		}
		if(is_page('mydetails'))
		{
			wp_enqueue_script( 'myaccount', THEME_URL . '/app/controllers/myaccountcontroller.js', array(), '1.0.0', $status );
			wp_enqueue_script( 'accountdetails', THEME_URL . '/app/services/myaccountdetails.js', array(), '1.0.0', $status );
		}
		if(is_page('movies') || is_page('factual'))
		{
			wp_enqueue_script( 'moviescontr', THEME_URL. '/app/controllers/moviescontroller.js', array(), '1.0.0', $status );
			wp_enqueue_script( 'moviesserv', THEME_URL . '/app/services/moviesservice.js', array(), '1.0.0', $status );
		}
		if(is_page('factual-listings'))
		{
			wp_enqueue_script( 'factualcon', THEME_URL . '/app/controllers/factuallistingcontroller.js', array(), '1.0.0', $status );
		}
		if(is_page('mywatchlist'))
		{
			wp_enqueue_script( 'watchlistcontroller', THEME_URL . '/app/controllers/watchlistcontroller.js', array(), '1.0.0', $status );
		}
	} 	  
}
add_action( 'wp_enqueue_scripts', 'salessite_scripts' );
/**
 * Sets new user Cookies
 */

show_admin_bar(false);
function set_newuser_cookie($name=false,$value=false) {
	if($name){
		log_me("Cookie name : " . $name . "with value " . $value )	;
		if(setcookie( $name, $value, time()+7200, COOKIEPATH, COOKIE_DOMAIN, false))
			return true;
		else
			return false;
	}
}
add_action( 'init', 'set_newuser_cookie');
/**
 * User restrictions to Admin
 */
function salessite_redirect_admin(){
	if ( ! defined('DOING_AJAX') && ! current_user_can('edit_posts') ) {
		 ob_start();
        session_start();
		wp_redirect( site_url()."/login/" );
		exit;		
	}
}
add_action( 'admin_init', 'salessite_redirect_admin' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function logincheck(){
	log_me("Start In login check");
	//ob_flush();
	session_start();
	Global $wp_query;
	$page_title = $wp_query->post->post_title;
	log_me("login check user id from cookie functions.php : " . $_COOKIE['user_id']);
	if(!(is_user_logged_in () && isset($_COOKIE['user_id'])) ) {
		log_me("Not login In functions.php : " . $page_title );
		wp_logout();
		if(is_front_page())
			wp_redirect(site_url()."/home/"); 
		else	
			wp_redirect(site_url()."/login/");  
	}
	else{
		log_me("login In functions.php : " . $page_title );
		$uid=get_current_user_id();
		setUser($uid);
		set_newuser_cookie("Token", $_COOKIE['Token']);
		set_newuser_cookie("user_id", $_COOKIE['user_id']);
	}
	
	log_me("End login check" );
}

//Removes Embeded Scripts
function disable_embeds_init() {
    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'disable_embeds_init', 9999);
/**
 * Hide editor for specific page templates.
 *
 */
add_action( 'admin_init', 'hide_editor' );
//Removes Editor in Particular pages
function hide_editor() {
	// Get the Post ID.
	if(isset($_GET['post']) || isset($_POST['post_ID'])){
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if( !isset( $post_id ) ) return;

	// Get the name of the Page Template file.
	$template_file = get_post_meta($post_id, '_wp_page_template', true);
    
    if($template_file == 'contacts.php' || $template_file == 'factual-landing.php' || $template_file == 'factual-listings.php' || $template_file == 'forgotpassword.php' || $template_file == 'formats.php' || $template_file == 'homepage.php' || $template_file == 'login.php' || $template_file == 'movie-listings.php' || $template_file == 'movies.php' || $template_file == 'watchlist.php' || $template_file == 'mydetails.php' || $template_file == 'press.php' || $template_file == 'scriptedpage.php' || $template_file == 'searchtpl.php' || $template_file == 'changepassword.php'){ // edit the template name
    	remove_post_type_support('page', 'editor');
		}	
	}
}
add_theme_support( 'custom-header' );

function log_me($message) {
    if (WP_DEBUG === true) {
        if (is_array($message) || is_object($message)) {
            error_log(print_r($message, true));
        } else {
            error_log($message);
        }
    }
}



function disable_search( $query, $error = true ) {
  if ( is_search() ) {
    $query->is_search = false;
    $query->query_vars[s] = false;
    $query->query[s] = false;
    // to error
    if ( $error == true )
    $query->is_404 = true;
  }
}
add_action( 'parse_query', 'disable_search' );
add_filter( 'get_search_form', create_function( '$a', "return null;" ) );
function no_redirect_guess_404_permalink( $header ){
    global $wp_query;
    if( is_404() )
        unset( $wp_query->query_vars['name'] );
    return $header;
}
add_filter( 'status_header', 'no_redirect_guess_404_permalink' );

if (function_exists('header_remove')) {
    header_remove('X-Powered-By'); // PHP 5.3+
} else {
    @ini_set('expose_php', 'off');
}


function httpurl($var)
{
    if (strpos($var, 'http://') !== 0) {
        return 'http://' . $var;
    } else {
        return $var;
    }
}
function setUser($user_id)
{
    wp_clear_auth_cookie();
    $user = get_user_by('id', $user_id);
    if ($user) {
       do_action('wp_login', $user->user_login, $user);
       wp_set_current_user( $user->ID );
       wp_set_auth_cookie( $user->ID );
       log_me("user set from setUser in wordpress :" . $user_id ); 
       if(is_user_logged_in ()) {   
       log_me("AUTH COOKIE setUser in wordpress :"); 
            return true; 
        }
        else{   
            log_me("AUTH COOKIE is not setUser in wordpress :"); 
            return false; 
        }
    }
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');