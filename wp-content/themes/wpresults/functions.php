<?php

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_script('default-scripts', get_template_directory_uri(). '/js/scripts.js', array('jquery'), '1.0', true);
	wp_enqueue_style( 'radleysboo', get_Template_directory_uri() . '/style.css');
});