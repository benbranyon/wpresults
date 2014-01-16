<?php

require_once('vendor/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');

add_filter('show_admin_bar', '__return_false');

add_action('init', function() {
  add_theme_support( 'post-thumbnails' );

// THIS THEME USES wp_nav_menu() 
register_nav_menus(array('primary' => __('Primary Navigation', 'infowars-standard'),
                         'footer' => __('Footer Navigation', 'infowars-standard')));
});

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_script('default-scripts', get_template_directory_uri(). '/js/scripts.js', array('jquery'), '1.0', true);
	wp_enqueue_script('bootstrap-scripts', get_template_directory_uri(). '/vendor/bootstrap-3.0.0/js/bootstrap.min.js', array('jquery'), '1.0', true);
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('bootstrap-styles', get_template_directory_uri(). '/vendor/bootstrap-3.0.0/css/bootstrap.min.css');
	wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/js/modernizr.custom.js', array('jquery'), false, false);
	wp_enqueue_style('liquidslider-css', get_template_directory_uri().'/vendor/liquidslider/css/liquid-slider.css', array('bootstrap-styles'));
	wp_enqueue_style( 'styles', get_Template_directory_uri() . '/style.css', array('bootstrap-styles'));
    wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/vendor/liquidslider/js/jquery.easing.1.3.js', array('jquery'), '', true );
    wp_enqueue_script( 'jquery-touchSwipe', get_template_directory_uri() . '/vendor/liquidslider/js/jquery.touchSwipe.min.js', array('jquery-easing'), '', true );
    wp_enqueue_script( 'jquery-ls', get_template_directory_uri() . '/vendor/liquidslider/js/jquery.liquid-slider.min.js', array('jquery-touchSwipe'), '', true );
});