<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs  ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Mobile Specific Metas & Title ============================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <title>A+E Networks :: Home</title>

    <!-- Bootstrap & Font Awesome CSS  ================================================== -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css">
    
    <!-- Important swiper stylesheet -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/swiper.min.css">

    <!-- CSS  ================================================== -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/custom.css">

    <!-- jQuery Lib & Custom Java Scripts  ================================================== -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>    
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/swiper.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/picturefill.min.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/custom.js"></script>

    <!-- Initialize Swiper -->

</head>


<body>
    <div class="main">
        <div class="container-lg">
            <!--./header start-->

 <header class="dark navbar-fixed-top ms-header">
                <!--./nav start-->
                <div class="container-lg">
                    <div class="header-top">

                        <div class="row">
					<div class="col-md-6 col-sm-4 col-sm-offset-0 col-xs-6 col-xs-offset-0 micro-logo">
                            <div class="logo">
                                <a href="<?php echo WP_SITEURL ?>">
										<img class="ae-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/ae_logo.svg" alt="logo-image">
                                </a>
                            </div>
                        </div>
                          <div class="col-md-5 hidden-xs hidden-sm pull-right">
                                <ul class="top-nav">
								<li><?php wp_nav_menu(); ?></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="navbar-header">
                <button type="button" class="nav-toggle navbar-toggle" data-toggle="collapse" data-target="#mainmenu"><span></span></button>
            </div>
                <div id="mainmenu" class="collapse nav-link hidden-md hidden-lg">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <nav class="navbar navbar-default  mainmenu">
                                    <?php 
									
										$menu_name = 'primary';

										if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
										$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

										$menu_items = wp_get_nav_menu_items($menu->term_id);

										$menu_list = '<ul class="nav navbar-nav topmenu" >';

										foreach ( (array) $menu_items as $key => $menu_item ) {
										$title = $menu_item->title;
										$url = $menu_item->url;
										$menu_list .= '<li id="item-id"><a class="mobileFocus" src-url="'.$url .'" >' . $title . '</a></li>';
										}
										$menu_list .= '</ul>';
										}
									
									echo $menu_list ;
									
									?>
                            </nav>

                        </div>

                    </div>
                </div>
                <!--./nav end-->
            </header>
			
			<div class="content content-mobile">
                <!--banner section start-->

               
			    <div class="banner-wrapper-ms">
                    <div class="series-title-logo"  style="background: -webkit-linear-gradient(<?php the_field('logo_background_color');?>, transparent);
    background: -o-linear-gradient(<?php the_field('logo_background_color');?>, transparent);
    background: -moz-linear-gradient(<?php the_field('logo_background_color');?>, transparent);
    background: linear-gradient(<?php the_field('logo_background_color');?>, transparent);">
					<a href="<?php echo site_url(); ?>">
                                <img alt="title_logo" src="<?php header_image(); ?>" /> </a>
                            </div>
                       
				
                   
