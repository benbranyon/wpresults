<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
	global $advertica_shortname;
	global $advertica_themename;
	// This gets the theme name from the stylesheet

	$advertica_themename = get_option( 'stylesheet' );
	$advertica_themename = preg_replace("/\W/", "_", strtolower($advertica_themename) );
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $advertica_themename;
	update_option( 'optionsframework', $optionsframework_settings );

}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 * If you are making your theme translatable, you should replace 'advertica'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
*/

function optionsframework_options() {

	global $advertica_shortname;
	global $advertica_themename;
	
	// Background Defaults
	$background_style = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	//mode_test_array
		$mode_test_array = array(
			'fade' => __('Fade', 'advertica'),
			'slide' => __('Slide', 'advertica')
		);

     //showcontrols_test_array
	   $showcontrols_test_array = array(
			'true' => __('Enable', 'advertica'),
			'false' => __('Disable', 'advertica')
		);

	//map_hide_array
	   $map_hide_array = array(
			'true' => __('Enable', 'advertica'),
			'false' => __('Disable', 'advertica')
		);

	//filter_hide_array
	   $port_filter_hide_array = array(
			'true' => __('Enable', 'advertica'),
			'false' => __('Disable', 'advertica')
		);

	//direction_arra
	$direction_array = array(
		'horizontal' => __('Horizontal', 'advertica'),
		'vertical' => __('Vertical', 'advertica')
	);

	$bread_type = array(
		'brimage' => __('Image', 'advertica'),
		'brcolor' => __('Color', 'advertica')
	);
	
	$statics_type = array(
		'staticsimage' => __('Image', 'advertica'),
		'staticscolor' => __('Color', 'advertica')
	);

	//showmarkers_array
	$showmarkers_array = array(
		'true' => __('Enable', 'advertica'),
		'false' => __('Disable', 'advertica')
	);

	//pauseonhover_array

	$pauseonhover_array = array(
		'true' => __('Enable', 'advertica'),
		'false' => __('Disable', 'advertica')
	);

	// pagination
	$test_pagiarray = array(
		1 => __('Enable', 'advertica'),
		0 => __('Disable', 'advertica')
	);

	// rss_feed_icon

	$test_rss_feed_icon = array(
		1 => __('Enable', 'advertica'),
		0 => __('Disable', 'advertica')
	);

	//breadcumhide_array
	$breadcumhide_array = array(
		'true' => __('Enable', 'advertica'),
		'false' => __('Disable', 'advertica')
	);

	// cgmap infostatus
	$cgmap_infowin = array(
		'open' => __('Open', 'advertica'),
		'close' => __('Close', 'advertica')
	);

	// cgmap marker animation
	$cgmap_markanim = array(
		'BOUNCE' => __('Bounce', 'advertica'),
		'DROP' => __('Drop', 'advertica')
	);

	// cgmap zoom level
	$cgmap_zoomlevel = array(
		'1' => __('1', 'advertica'),
		'2' => __('2', 'advertica'),
		'3' => __('3', 'advertica'),
		'4' => __('4', 'advertica'),
		'5' => __('5', 'advertica'),
		'6' => __('6', 'advertica'),
		'7' => __('7', 'advertica'),
		'8' => __('8', 'advertica'),
		'9' => __('9', 'advertica'),
		'10' => __('10', 'advertica'),
		'11' => __('11', 'advertica'),
		'12' => __('12', 'advertica'),
		'13' => __('13', 'advertica'),
		'14' => __('14', 'advertica'),
		'15' => __('15', 'advertica'),
		'16' => __('16', 'advertica'),
		'17' => __('17', 'advertica'),
		'18' => __('18', 'advertica'),
		'19' => __('19', 'advertica'),
		'20' => __('20', 'advertica'),
		'21' => __('21', 'advertica')
	);

	// cgmap map type
	$cgmap_maptype = array(
		'ROADMAP'  => __('ROADMAP', 'advertica'),
		'SATELLITE'=> __('SATELLITE', 'advertica'),
		'HYBRID'   => __('HYBRID', 'advertica'),
		'TERRAIN'  => __('TERRAIN', 'advertica')
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array

	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// set pages
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath   =  get_template_directory_uri() . '/images/';
	$twitterInfo = 'http://www.sketchthemes.com/tutorials/getting-new-twitter-api-consumer-and-secret-keys/';

	$options = array();
	
	//General Settings
	$options[] = array(
		'name' => __('General Settings', 'advertica'),
		'type' => 'heading');

	$options[] = array(
			'name' => __('Choose Theme Color', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_colorpicker',
			'std' => '#FFA500',
			'type' => 'color' );

	$options[] = array(
			'name' => __('Change Logo (full path to logo image size: width * height (156px * 40px) )', 'advertica'),
			'desc' => __('This creates a custom logo for your website.', 'advertica'),
			'id' => $advertica_shortname.'_logo_img',
			'std' => $imagepath.'advertica-logo.png',
			'type' => 'upload');

	$options[] = array(
			'name' => __('Logo Image Width (in pixel)', 'advertica'),
			'desc' => __('Enter logo image width in pixel.', 'advertica'),
			'id' => $advertica_shortname.'_logo_wdth',
			'class' => 'mini',
			'std' => '156',
			'type' => 'text');

	$options[] = array(
			'name' => __('Logo Image Height (in px)', 'advertica'),
			'desc' => __('Enter logo image height in pixel.', 'advertica'),
			'id' => $advertica_shortname.'_logo_hght',
			'class' => 'mini',
			'std' => '40',
			'type' => 'text');

	$options[] = array(
			'name' => __('Logo ALT Text', 'advertica'),
			'desc' => __('Enter logo image alt attribute text.', 'advertica'),
			'id' => $advertica_shortname.'_logo_alt',
			'std' => 'sketch themes',
			'type' => 'text');

	$options[] = array(
			'name' => __('Upload Favicon', 'advertica'),
			'desc' => __('This creates a custom favicon for your website.', 'advertica'),
			'id' => $advertica_shortname.'_favicon',
			'std' => $imagepath.'advertica_favicon.png',
			'type' => 'upload');

	$options[] = array(
			'name' => __('Choose Header Background Color', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_headercolorpicker',
			'std' => '#ffffff',
			'type' => 'color' );

	$options[] = array(
			'name' => __('Choose Navigation Font Color', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_navfontcolorpicker',
			'std' => '#333333',
			'type' => 'color' );

	 $options[] = array(
			'name' => __('Custom Pagination', 'advertica'),
			'desc' => __('Show custom pagination on blog page.', 'advertica'),
			'id' => $advertica_shortname.'_show_pagination',
			'std' => '1',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $test_pagiarray);

	$options[] = array(
			'name' => __('Mobile Menu Activate Width', 'advertica'),
			'desc' => __('Layout width after which mobile menu will get activated', 'advertica'),
			'id' => $advertica_shortname.'_mobi_menu_width',
			'std' => '1025',
			'type' => 'text');

		//Bg style
		$options[] = array(
				'name' => __('Custom Background', 'advertica'),
				'desc' => __('Change the page background.', 'advertica'),
				'id'   => $advertica_shortname.'_bg_style',
				'std'  => $background_style,
				'type' => 'background' );

	$options[] = array(
			'name' => __('Home Template Video Height (in pixel)', 'advertica'),
			'desc' => __('Enter home template video height in pixel.', 'advertica'),
			'id' => $advertica_shortname.'_homevideo_hght',
			'class' => 'mini',
			'std' => '500',
			'type' => 'text');


	//Breadcrumb	
	$options[] = array(
		'name' => __('Breadcrumb Settings', 'advertica'),
		'type' => 'heading');

	$options[] = array(
			'name' => __('Breadcrumb Enable/Disable', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_hide_bread',
			'std' => 'true',
			'type' => 'radio',
			'options' => $breadcumhide_array);

	$options[] = array(
			'name' => __('Page Title & Breadcrumb Background Type', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_bread_stype',
			'std' => 'brcolor',
			'type' => 'radio',
			'options' => $bread_type);

    $options[] = array(
			'name' => __('Choose Page Title & Breadcrumb Background Color', 'advertica'),
			'desc' => __('Please choose background color', 'advertica'),
			'id' => $advertica_shortname.'_bread_color',
			'std' => '#F9F1E3',
			'type' => 'color',
			'class'=>'hidden' );

    $options[] = array(
			'name' => __('Upload Page Title & Breadcrumb Background Image ( width * height (1600px * 180px) )', 'advertica'),
			'desc' => __('This image will show up as background on page title & breadcrumb section.', 'advertica'),
			'id' => $advertica_shortname.'_bread_image',
			'std' => $imagepath.'danbo_green.jpg',
			'type' => 'upload',
			'class'=>'hidden');

	$options[] = array(
			'name' => __('Choose Page Title & Breadcrumb Font Color', 'advertica'),
			'desc' => __('Please choose font color', 'advertica'),
			'id' => $advertica_shortname.'_bread_title_color',
			'std' => '#222222',
			'type' => 'color' );		

	//Blog	
	$options[] = array(
		'name' => __('Blog Page Settings', 'advertica'),
		'type' => 'heading');

	//Blog page Title
	$options[] = array(
			'name' => __('Enter Blog Page Title', 'advertica'),
			'desc' => __('Enter blog page title text.', 'advertica'),
			'id' => $advertica_shortname.'_blogpage_heading',
			'std' => 'Blog',
			'type' => 'text');		

	//Team Member Section	
	$options[] = array(
		'name' => __('Team Member Settings', 'advertica'),
		'type' => 'heading');

		 $options[] = array(
			'name' => __('Choose Team Member Section Background Color', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_teamcolorpicker',
			'std' => '#F1F1F1',
			'type' => 'color' );

		 $options[] = array(
			'name' => __('Choose Team Member Section Title & Border Color', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_teamtitlecolor',
			'std' => '#2B1E07',
			'type' => 'color' );

		//Teammember Title
		$options[] = array(
			'name' => __('Team Member Section Title', 'advertica'),
			'desc' => __('Enter teamMember title text.', 'advertica'),
			'id' => $advertica_shortname.'_teammember_title',
			'std' => 'Team Member',
			'type' => 'text');

		//Teammember description
	    $options[] = array(
			'name' => __('Team Member Section Sub-Title', 'advertica'),
			'desc' => __('Enter team member sub-title text.', 'advertica'),
			'id' => $advertica_shortname.'_teamsub_title',
			'std' => 'Lorem ipsum dolor sit amet, feugiat delicata liberavisse.',
			'type' => 'text');

	    $options[] = array(
			'name' => __('About Template ( Team Member Count )', 'advertica'),
			'desc' => __('Enter number of team member that you want to show on About Template.', 'advertica'),
			'id' => $advertica_shortname.'_numbet_team_member',
			'std' => '6',
			'type' => 'text');
			
			
		$options[] = array(
			'name' => __('Team Member Description (Content) Word Limit', 'advertica'),
			'desc' => __('Enter word limit for team member content.', 'advertica'),
			'id' => $advertica_shortname.'_team_cont_limit',
			'std' => '20',
			'type' => 'text');	
			
			

	//Project	
	$options[] = array(
		'name' => __('Project Page Settings', 'advertica'),
		'type' => 'heading');

		$options[] = array(
			'name' => __('Enable/Disable Project Page Filter Section', 'advertica'),
			'desc' => __('Enable/disable projects page filter section .', 'advertica'),
			'id' => $advertica_shortname.'_hide_pro_filter',
			'std' => 'true',
			'type' => 'radio',
			'options' => $port_filter_hide_array);

//Slider Setting
	$options[] = array(
		'name' => __('Home Template Flex Slider Configuration', 'advertica'),
		'type' => 'heading');

		 $options[] = array(
				'name' => __('Slider Animation Effect', 'advertica'),
				'desc' => __('Select slider animation effect.', 'advertica'),
				'id' => $advertica_shortname.'_mode_select',
				'std' => 'fade',
				'type' => 'select',
				'class' => 'mini', //mini, tiny, small
				'options' => $mode_test_array);

		 $options[] = array(
			'name' => __('Slider Direction', 'advertica'),
			'desc' => __('Set sliding direction for Slide Effect', 'advertica'),
			'id' => $advertica_shortname.'_direction',
			'std' => 'true',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $direction_array);

	     $options[] = array(
				'name' => __('Slider Transition Speed', 'advertica'),
				'desc' => __('Set the delay between two slides transition in milliseconds.', 'advertica'),
				'id' => $advertica_shortname.'_slideshowspeed',
				'std' => '7000',
				'type' => 'text');

		 $options[] = array(
				'name' => __('Slider Animation Speed', 'advertica'),
				'desc' => __('Set the speed for slide animation in milliseconds.', 'advertica'),
				'id' => $advertica_shortname.'_animspeed',
				'std' => '600',
				'type' => 'text');

		 $options[] = array(
				'name' => __('Slider Navigation (Enable/Disable)', 'advertica'),
				'desc' => __('Enable/disable navigation controls.', 'advertica'),
				'id' => $advertica_shortname.'_showcontrols',
				'std' => '',
				'type' => 'select',
				'class' => 'mini', //mini, tiny, small
				'options' => $showcontrols_test_array);

	     $options[] = array(
				'name' => __('Slider Markers (Enable/Disable)', 'advertica'),
				'desc' => __('Enable/disable slider markers.', 'advertica'),
				'id' => $advertica_shortname.'_showmarkers',
				'std' => 'true',
				'type' => 'select',
				'class' => 'mini', //mini, tiny, small
				'options' => $showmarkers_array);

		 $options[] = array(
				'name' => __('Slider Pause On Hover', 'advertica'),
				'desc' => __('Pause the slideshow when hovering over slider, then resume when no longer hovering.', 'advertica'),
				'id' => $advertica_shortname.'_pauseonhover',
				'std' => 'true',
				'type' => 'select',
				'class' => 'mini', //mini, tiny, small
				'options' => $pauseonhover_array);


		 $options[] = array(
				'name' => __('Choose Slide Title Color', 'advertica'),
				'desc' => __('Choose Slide Title Color', 'advertica'),
				'id' => $advertica_shortname.'_flextitleclr',
				'std' => '#ffffff',
				'type' => 'color' );


		 $options[] = array(
				'name' => __('Choose Slide Description Color', 'advertica'),
				'desc' => __('Choose slide description color', 'advertica'),
				'id' => $advertica_shortname.'_flexdespclr',
				'std' => '#701600',
				'type' => 'color' );


		 $options[] = array(
				'name' => __('Choose Slide Link Color', 'advertica'),
				'desc' => __('Choose slide link color', 'advertica'),
				'id' => $advertica_shortname.'_flexlinkclr',
				'std' => '#701600',
				'type' => 'color' );



//Home Page Featured Box Options	
	$options[] = array(
		'name' => __('Home Template Featured Box Section', 'advertica'),
		'type' => 'heading');

	//Featured Box 1
		$options[] = array(
			'name' => __('First Featured Box Heading', 'advertica'),
			'desc' => __('Enter heading for first featured box.', 'advertica'),
			'id' => $advertica_shortname.'_fb1_first_part_heading',
			'std' => 'Business Strategy',
			'type' => 'text');

		$options[] = array(
			'name' => __('First Featured Box Icon Class', 'advertica'),
			'desc' => __('Enter class for first featured box icon.', 'advertica'),
			'id' => $advertica_shortname.'_fb1_first_icon_class',
			'std' => 'fa-briefcase',
			'type' => 'text');
			
		$options[] = array(
			'name' => __('First Featured Box Image Path (size: width * height (150px * 150px) )', 'advertica'),
			'desc' => __('Upload image for first featured box.', 'advertica'),
			'id' => $advertica_shortname.'_fb1_first_part_image',
			'std' => '',
			'type' => 'upload');

		 $options[] = array(
				'name' => __('First Featured Box Content', 'advertica'),
				'desc' => __('Enter content for first featured box.','advertica'),
				'id' => $advertica_shortname.'_fb1_first_part_content',
				'std' => ' Get focused from your target consumers and increase your business with Web portal Design and Development. ',
				'type' => 'textarea');

		$options[] = array(
				'name' => __('First Featured Box Link', 'advertica'),
				'desc' => __('Enter link for first featured box.', 'advertica'),
				'id' => $advertica_shortname.'_fb1_first_part_link',
				'std' => '#',
				'type' => 'text');

		//Featured Box 2
		$options[] = array(
			'name' => __('Second Featured Box Heading', 'advertica'),
			'desc' => __('Enter heading for second featured box.', 'advertica'),
			'id' => $advertica_shortname.'_fb2_second_part_heading',
			'std' => 'Quality Products',
			'type' => 'text');

		$options[] = array(
			'name' => __('Second Featured Box Icon Class', 'advertica'),
			'desc' => __('Enter class for second featured box icon.', 'advertica'),
			'id' => $advertica_shortname.'_fb2_first_icon_class',
			'std' => 'fa-bar-chart-o',
			'type' => 'text');
			
		$options[] = array(
			'name' => __('Second Featured Box Image Path (size: width * height (150px * 150px) )', 'advertica'),
			'desc' => __('Upload image for second featured box.', 'advertica'),
			'id' => $advertica_shortname.'_fb2_second_part_image',
			'std' => '',
			'type' => 'upload');

	    $options[] = array(
			'name' => __('Second Featured Box Content', 'advertica'),
			'desc' => __('Enter content for second featured box.','advertica'),
			'id' => $advertica_shortname.'_fb2_second_part_content',
			'std' => ' Products with the ultimate features and functionality that provide the complete satisfaction to the clients.',
			'type' => 'textarea');

	    $options[] = array(
			'name' => __('Second Featured Box Link', 'advertica'),
			'desc' => __('Enter link for second featured box.', 'advertica'),
			'id' => $advertica_shortname.'_fb2_second_part_link',
			'std' => '#',
			'type' => 'text');

	//Featured Box 3
		$options[] = array(
			'name' => __('Third Featured Box Heading', 'advertica'),
			'desc' => __('Enter heading for third featured box.', 'advertica'),
			'id' => $advertica_shortname.'_fb3_third_part_heading',
			'std' => 'Best Business Plans',
			'type' => 'text');
			
		$options[] = array(
			'name' => __('Third Featured Box Icon Class', 'advertica'),
			'desc' => __('Enter class for second featured box icon.', 'advertica'),
			'id' => $advertica_shortname.'_fb3_first_icon_class',
			'std' => 'fa-sitemap',
			'type' => 'text');

		$options[] = array(
			'name' => __('Third Featured Box Image Path (size: width * height (150px * 150px) )', 'advertica'),
			'desc' => __('Upload image for third featured box.', 'advertica'),
			'id' => $advertica_shortname.'_fb3_third_part_image',
			'std' => '',
			'type' => 'upload');

	 	$options[] = array(
			'name' => __('Third Featured Box Content', 'advertica'),
			'desc' => __('Enter content for third featured box.','advertica'),
			'id' => $advertica_shortname.'_fb3_third_part_content',
			'std' => ' Based on the client requirement, different business plans suits and fulfill your business and cost requirement.',
			'type' => 'textarea');

		$options[] = array(
			'name' => __('Third Featured Box Link', 'advertica'),
			'desc' => __('Enter link for third featured box.', 'advertica'),
			'id' => $advertica_shortname.'_fb3_third_part_link',
			'std' => '#',
			'type' => 'text');

	//Front Page call-to-action-block	
	$options[] = array(
		'name' => __('Home Template Call To Action Section', 'advertica'),
		'type' => 'heading');

	$options[] = array(
			'name' => __('Call to Action Box Heading', 'advertica'),
			'desc' => __('Enter call to action box heading.', 'advertica'),
			'id' => $advertica_shortname.'_catoac_heading',
			'std' => 'Join The Ultimate And Irreplaceable Experience Now',
			'type' => 'text');

	$options[] = array(
			'name' => __('Call to Action Box Content', 'advertica'),
			'desc' => __('Enter call to action box content.','advertica'),
			'id' => $advertica_shortname.'_catoac_content',
			'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consequat malesuada urna, non fringilla purus malesuada eget.',
			'type' => 'textarea');

	$options[] = array(
			'name' => __('Call to Action Button Text', 'advertica'),
			'desc' => __('Enter call to action button text.', 'advertica'),
			'id' => $advertica_shortname.'_catoac_txt',
			'std' => 'Call to Action',
			'type' => 'text');

	$options[] = array(
			'name' => __('Call to Action Button Link', 'advertica'),
			'desc' => __('Enter call to action button Link.', 'advertica'),
			'id' => $advertica_shortname.'_catoac_link',
			'std' => '#',
			'type' => 'text');

	//Front Page Project Box Options	
	$options[] = array(
		'name' => __('Home Template Latest Project Section', 'advertica'),
		'type' => 'heading');

	//Project Title
		$options[] = array(
			'name' => __('Project Section Title', 'advertica'),
			'desc' => __('Enter title for project section.', 'advertica'),
			'id' => $advertica_shortname.'_port_title',
			'std' => 'Latest Projects',
			'type' => 'text');

	//Project Title
		$options[] = array(
			'name' => __('Project Section View More Button Title', 'advertica'),
			'desc' => __('Enter title for project secion view more button.', 'advertica'),
			'id' => $advertica_shortname.'_portlink_title',
			'std' => 'View More Projects',
			'type' => 'text');

	//Project link
	    $options[] = array(
			'name' => __('Project Section View More Button Link', 'advertica'),
			'desc' => __('Enter link for project section view more button.', 'advertica'),
			'id' => $advertica_shortname.'_port_link',
			'std' => '#',
			'type' => 'text');

	//Front Page Parallax Box Options	
	$options[] = array(
		'name' => __('Home Template Parallax Section', 'advertica'),
		'type' => 'heading');

	$options[] = array(
			'name' => __('Parallax Section Background Image (size: width * height (1600x * 1000px) )', 'advertica'),
			'desc' => __('Upload background image for parallax section.', 'advertica'),
			'id' => $advertica_shortname.'_fullparallax_image',
			'std' => $imagepath.'Parallax_Section_Image.jpg',
			'type' => 'upload');

	$options[] = array(
			'name' => __('Parallax Section Content', 'advertica'),
			'desc' => __('Enter content for parallax section','advertica'),
			'id' => $advertica_shortname.'_para_content_left',
			'std' => '<div class="skt-awesome-section"> 
						<div class="skt-awesome-title">Awesome Parallax Section</div><div class="skt-awesome-desp">Advertica features an amazing parallax section</div>
						<div class="clearfix"><a class="para_btn" href="http://sketchthemes.com/samples/advertica-creative-demo/">View Demo</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="para_btn" href="http://sketchthemes.com/samples/advertica-creative-demo/">Buy Theme</a></div>
					  </div>',
			'type' => 'textarea');

	//Front Page Options	
	$options[] = array(
		'name' => __('Home Template Statistics Section', 'advertica'),
		'type' => 'heading');
		
	$options[] = array(
			'name' => __('Statistics Section Background Type', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_statics_stype',
			'std' => 'staticsimage',
			'type' => 'radio',
			'options' => $statics_type);

	$options[] = array(
			'name' => __('Choose Statistics Section Background Color', 'advertica'),
			'desc' => __('Choose background color.', 'advertica'),
			'id' => $advertica_shortname.'_staticscolorpicker',
			'std' => '#F2F2F2',
			'type' => 'color',
			'class'=>'hidden' );

    $options[] = array(
			'name' => __('Statistics Section Background Image (size: width * height (1600px * 565px) )', 'advertica'),
			'desc' => __('Upload background image for statistics section', 'advertica'),
			'id' => $advertica_shortname.'_statics_image',
			'std' => $imagepath.'statics-bg.jpg',
			'type' => 'upload',
			'class'=>'hidden');
		

		

	//Front Page Options	
	$options[] = array(
		'name' => __('Home Template Clients Logo Section', 'advertica'),
		'type' => 'heading');

	$options[] = array(
			'name' => __('Client Section Title', 'advertica'),
			'desc' => __('Enter title for client section.', 'advertica'),
			'id' => $advertica_shortname.'_clientsec_title',
			'std' => 'Our Partners',
			'type' => 'text');

	$options[] = array(
			'name' => __('First Client Logo Title', 'advertica'),
			'desc' => __('Enter title for first client logo image.', 'advertica'),
			'id' => $advertica_shortname.'_img1_title',
			'std' => '',
			'type' => 'text');

	$options[] = array(
		'name' => __('First Client Logo Image (size: width * height (232px * 101px)', 'advertica'),
		'desc' => __('Upload image for first client logo.', 'advertica'),
		'id' => $advertica_shortname.'_img1_icon',
		'std' => $imagepath.'clients-logo/defdault-client-logo.png',
		'type' => 'upload');

	$options[] = array(
		'name' => __('First Client Logo Image Link', 'advertica'),
		'desc' => __('Enter link for first client logo image.', 'advertica'),
		'id' => $advertica_shortname.'_img1_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Second Client Logo Title', 'advertica'),
		'desc' => __('Enter title for second client logo image.', 'advertica'),
		'id' => $advertica_shortname.'_img2_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Second Client Logo Image (size: width * height (232px * 101px)', 'advertica'),
		'desc' => __('Upload image for second client logo.', 'advertica'),
		'id' => $advertica_shortname.'_img2_icon',
		'std' => $imagepath.'clients-logo/defdault-client-logo.png',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Second Client Logo Image Link', 'advertica'),
		'desc' => __('Enter link for second client logo image.', 'advertica'),
		'id' => $advertica_shortname.'_img2_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Third Client Logo Title', 'advertica'),
		'desc' => __('Enter title for third client logo image.', 'advertica'),
		'id' => $advertica_shortname.'_img3_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Third Client Logo Image (size: width * height (232px * 101px)', 'advertica'),
		'desc' => __('Upload image for third client logo.', 'advertica'),
		'id' => $advertica_shortname.'_img3_icon',
		'std' => $imagepath.'clients-logo/defdault-client-logo.png',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Third Client Logo Image Link', 'advertica'),
		'desc' => __('Enter link for third client logo image.', 'advertica'),
		'id' => $advertica_shortname.'_img3_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Fourth Client Logo Title', 'advertica'),
		'desc' => __('Enter title for fourth client logo image.', 'advertica'),
		'id' => $advertica_shortname.'_img4_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Fourth Client Logo Image (size: width * height (232px * 101px)', 'advertica'),
		'desc' => __('Upload image for fourth client logo.', 'advertica'),
		'id' => $advertica_shortname.'_img4_icon',
		'std' => $imagepath.'clients-logo/defdault-client-logo.png',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Fourth Client Logo Image Link', 'advertica'),
		'desc' => __('Enter link for fourth client logo image.', 'advertica'),
		'id' => $advertica_shortname.'_img4_link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => __('Fifth Client Logo Title', 'advertica'),
		'desc' => __('Enter title for fifth client logo image.', 'advertica'),
		'id' => $advertica_shortname.'_img5_title',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Fifth Client Logo Image (size: width * height (232px * 101px)', 'advertica'),
		'desc' => __('Upload image for fifth client logo.', 'advertica'),
		'id' => $advertica_shortname.'_img5_icon',
		'std' => $imagepath.'clients-logo/defdault-client-logo.png',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Fifth Client Logo Image Link', 'advertica'),
		'desc' => __('Enter link for fifth client logo image.', 'advertica'),
		'id' => $advertica_shortname.'_img5_link',
		'std' => '#',
		'type' => 'text');

	//Twitter	

	$options[] = array(
		'name' => __('Home Template Twitter Band Configuration', 'advertica'),
		'type' => 'heading');

	$options[] = array(
			'name' => __('Twitter Configuration Info', 'advertica'),
			'desc' => __("<p class='description'>More information on Twiiter api keys and how to get them, read this <a href='$twitterInfo' target='_blank'>$twitterInfo</a> tutorial to find out.</p>", 'advertica'),
			'type' => 'info');

	//Cache Tweets
		$options[] = array(
			'name' => __('Cache Tweets(In Minutes)', 'advertica'),
			'desc' => __('Cache tweets(in minutes).', 'advertica'),
			'id' => $advertica_shortname.'_cachetime',
			'std' => '1',
			'type' => 'text');

	//latest tweets

		$options[] = array(
			'name' => __('Number of Latest Tweets Display', 'advertica'),
			'desc' => __('Number of latest tweets display.', 'advertica'),
			'id' => $advertica_shortname.'_numb_lat_tw',
			'std' => '10',
			'type' => 'text');

	//username

		$options[] = array(
			'name' => __('Twitter Username', 'advertica'),
			'desc' => __('Enter twitter username.', 'advertica'),
			'id' => $advertica_shortname.'_tw_username',
			'std' => 'sketchthemes',
			'type' => 'text');

	//Twitter consumer
		$options[] = array(
			'name' => __('Consumer Key', 'advertica'),
			'desc' => __('Enter consumer key.', 'advertica'),
			'id' => $advertica_shortname.'_twitter_consumer',
			'std' => '',
			'type' => 'text');

	//twitter Consumer secret
		$options[] = array(
			'name' => __('Consumer Secret Key', 'advertica'),
			'desc' => __('Enter consumer secret key.', 'advertica'),
			'id' => $advertica_shortname.'_twitter_con_s',
			'std' => '',
			'type' => 'text');

	//twitter Access token
		$options[] = array(
			'name' => __('Access Token Key', 'advertica'),
			'desc' => __('Enter access token key.', 'advertica'),
			'id' => $advertica_shortname.'_twitter_acc_t',
			'std' => '',
			'type' => 'text');

	//twitter Access token secret
		$options[] = array(
			'name' => __('Access Token Secret Key', 'advertica'),
			'desc' => __('Enter access token secret key.', 'advertica'),
			'id' => $advertica_shortname.'_twitter_acc_t_s',
			'std' => '',
			'type' => 'text');

	//contact page
		$options[] = array(
				'name' => __('Contact Template Settings', 'advertica'),
				'type' => 'heading');

	$options[] = array(
			'name' => __('Contact Map (Enable/Disable)', 'advertica'),
			'desc' => __('Enable/disable contact map', 'advertica'),
			'id' => $advertica_shortname.'_hide_con_map',
			'std' => 'true',
			'type' => 'radio',
			'options' => $map_hide_array);

		$options[] = array(
			'name' => __('Contact Google Map Height', 'advertica'),
			'desc' => __('Enter height for google map in pixel.', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_height',
			'std' => '460',
			'type' => 'text');

		$options[] = array(
			'name' => __('Contact Google Map Latitude', 'advertica'),
			'desc' => __('To find latitude and longitude  right click on the google map at your desired location and from context menu select Whats here & you will get the latitude and longitude  at searchbox..', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_lat',
			'std' => '21.0000',
			'type' => 'text');

		$options[] = array(
			'name' => __('Contact Google Map Longitude', 'advertica'),
			'desc' => __('To find latitude and longitude  right click on the google map at your desired location and from context menu select Whats here & you will get the latitude and longitude at searchbox..', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_long',
			'std' => '78.0000',
			'type' => 'text');	

		$options[] = array(
			'name' => __('Contact Google Map Info Window State', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_infost',
			'std' => 'close',
			'type' => 'radio',
			'options' => $cgmap_infowin);	

		$options[] = array(
			'name' => __('Contact Google Map Info Window Text. ( please donot use double quotes. )', 'advertica'),
			'desc' => __('Enter text for google map info window.', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_infotxt',
			'std' => "Sketch Themes, Forever Street Coridor View",
			'type' => 'textarea');

		$options[] = array(
			'name' => __('Contact Google Map Marker Title', 'advertica'),
			'desc' => __('Enter title for contact google map marker.', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_marttl',
			'std' => 'India',
			'type' => 'text');

		$options[] = array(
			'name' => __('Contact Google Map Marker Image', 'advertica'),
			'desc' => __('Upload image for google map marker.', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_iconimg',
			'std' => $imagepath.'blue-marker.png',
			'type' => 'upload');

		$options[] = array(
			'name' => __('Contact Google Map Marker Animation', 'advertica'),
			'desc' => __('', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_markanim',
			'std' => 'DROP',
			'type' => 'radio',
			'options' => $cgmap_markanim);

		$options[] = array(
			'name' => __('Contact Google Map Zoom Level', 'advertica'),
			'desc' => __('Set zoom level for google map.', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_zlevel',
			'std' => '12',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $cgmap_zoomlevel);

		$options[] = array(
			'name' => __('Contact Google Map Type', 'advertica'),
			'desc' => __('Set google map type.', 'advertica'),
			'id' => $advertica_shortname.'_contact_gmap_maptype',
			'std' => 'ROADMAP',
			'type' => 'select',
			'class' => 'mini', //mini, tiny, small
			'options' => $cgmap_maptype);

	//Custom style Settings
		$options[] = array(
			'name' => __('Custom CSS', 'advertica'),
			'type' => 'heading');		
			
		$options[] = array(
			'name' => __('Custom CSS', 'advertica'),
			'desc' => __('Write custom CSS in order to overwrite style CSS (without "style" tag).', 'advertica'),
			'id' => $advertica_shortname.'_custom_css',
			'std' => "#logo{}",
			'type' => 'textarea');

  //404	

	$options[] = array(
		'name' => __('404 Page Settings', 'advertica'),
		'type' => 'heading');

		$options[] = array(
			'name' => __('404 Page Text', 'advertica'),
			'desc' => __('Enter text for 404 page (you can also use HTML tags here).', 'advertica'),
			'id' => $advertica_shortname.'_four_zero_four_txt',
			'std' => 'Sorry, but the requested resource was not found on this site. Please try again or contact the administrator for assistance.',
			'type' => 'textarea');

	//Footer	

	$options[] = array(
		'name' => __('Footer Settings', 'advertica'),
		'type' => 'heading');

		$options[] = array(
			'name' => __('Copyright Text', 'advertica'),
			'desc' => __('Enter text for copyright (you can also use HTML tags here).', 'advertica'),
			'id' => $advertica_shortname.'_copyright',
			'std' => "Advertica WordPress Theme &copy; 2014 SketchThemes",
			'type' => 'textarea');
			
		$options[] = array(
			'name' => __('Google Analytics Code', 'advertica'),
			'desc' => __('Enter google analytics code here.', 'advertica'),
			'id' => $advertica_shortname.'_analytics',
			'std' => '',
			'type' => 'textarea');
	return $options;

}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
function optionsframework_custom_scripts() { ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});
	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

    var selected_bredbtn = jQuery("#section-advertica_bread_stype input:checked").val();
    var selected_staticsbtn = jQuery("#section-advertica_statics_stype input:checked").val();
	if (selected_bredbtn === 'brcolor') {
		jQuery('#section-advertica_bread_color').show();
	}
    else if (selected_bredbtn === 'brimage') {
		jQuery('#section-advertica_bread_image').show();
	}
	if (selected_staticsbtn === 'staticscolor') {
		jQuery('#section-advertica_staticscolorpicker').show();
	}
    else if (selected_staticsbtn === 'staticsimage') {
		jQuery('#section-advertica_statics_image').show();
	}

	jQuery("input[type='radio']").change(function() {
        var selected_radio = jQuery(this).val();
		if (selected_radio === 'brcolor') {
            jQuery('#section-advertica_bread_image').hide();
			jQuery('#section-advertica_bread_color').fadeIn();
        }else if (selected_radio === 'brimage') {
			jQuery('#section-advertica_bread_color').hide();
            jQuery('#section-advertica_bread_image').fadeIn();
        }
		if (selected_radio === 'staticscolor') {
            jQuery('#section-advertica_statics_image').hide();
			jQuery('#section-advertica_staticscolorpicker').fadeIn();
        }else if (selected_radio === 'staticsimage') {
			jQuery('#section-advertica_staticscolorpicker').hide();
            jQuery('#section-advertica_statics_image').fadeIn();
        }
    });
});
</script>
<?php
}