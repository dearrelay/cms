<?php
/*
Plugin Name: Custom Admin columns for Sorting and Filtering  
Plugin URI: https://wordpress.org/plugins/wpi-custom-admin-columns-for-sorting-and-filtering/
Description: Add custom admin columns to post types to provide sorting and filtering through these extra columns
Version: 1.1
Tested up to: WPMU 4.4.2
Author: WPIndex
Author URI: http://phpwpinfo.com
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
*/

include(plugin_dir_path( __FILE__ )."/wpi_custom_filter.php");
include(plugin_dir_path( __FILE__ )."/wpi_custom_sort_filter_settings.php");

new wpiCustomFilter();

?>
