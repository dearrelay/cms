<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //


include("constants.php");

/** The name of the database for WordPress */
define('DB_NAME', $dbname);

/** MySQL database username */
define('DB_USER', $dbuser);

/** MySQL database password */
define('DB_PASSWORD', $dpwd);

/** MySQL hostname */
define('DB_HOST', $dbhost);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', $dbcharset);

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** API URL */
define('API_URL', $APIurl);
//Define Base CDN URL
define('BASE_CDN_URL',$BaseCDNUrl); 
define('BASE_IMG_CDN_URL',$BaseImgCDNUrl); 
define('THEME_URL', $ThemeUrl); 
define( 'WP_SITEURL', $SiteUrl);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ItP$_adT.HA&+=$H5 l4-C:r(/YK`ml+amRm3+7|(u=I96_DEZgMVNXh2fx)+?Q*');
define('SECURE_AUTH_KEY',  'sXDa29ORWa7OdwLwSOafD4#]9D^o{?p|}lCF%%yB%m%ON;S%QQ<<X8aVSAV q4Wm');
define('LOGGED_IN_KEY',    '-~m7wk3X$8!mJ5zAnDp>r+1v?SfaDrWU}!6ft)JAUT)eyK@BhnLNb@AElQkR=J{U');
define('NONCE_KEY',        '00 YWZ*,@|6~qzM&w 8Gn?y{!JGMn>bqYP>};T9_ s1(Hqzq2Qp4Iw3`qXjz0e<|');
define('AUTH_SALT',        'y ?9-GF C<`<Emz+uh|oCTMqH-Z}pN$Zs|6Y1*CWn+n2Kt_x37_Zs6+*+6B/)-j~');
define('SECURE_AUTH_SALT', 'XO|+4|p(pAruTJ_[1*H3O*dxMgM^v@GQx;b4+&==#E+1o=YBJl5Z- ?-Unb.2~([');
define('LOGGED_IN_SALT',   'w>{Vz 4-|B#S~Nl_p}tKfq]vFWSLl--!$G?yit^(>0!P0H`,b;x@vF1j%.?b52JS');
define('NONCE_SALT',       '&eiSn%9Cy:5;}9u7y*V%yClC|g]HfTVQ~6-C)m;*ac+4;-}%2qAOgINw)9N}PUX`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
// Turns WordPress debugging on
define('WP_DEBUG', true);

// Tells WordPress to log everything to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

// Doesn't force the PHP 'display_errors' variable to be on
define('WP_DEBUG_DISPLAY', false);

// Hides errors from being displayed on-screen
@ini_set('display_errors', 0);

define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', $Site);
define('PATH_CURRENT_SITE', $Folder);
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
