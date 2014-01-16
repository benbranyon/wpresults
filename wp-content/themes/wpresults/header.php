<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php bloginfo('name'); ?> | <?php bloginfo( 'description' ); ?></title>
		<meta name="description" content="WPResults. The top sites choose us." />
		<meta name="Keywords" content="">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>
	</head>

	<body>
		<div class="header">
			<div class="container">
	 			<div class="row">
	 				<div class="callout">
	 					<div class="col-sm-6">
	 						<h2>WP Results</h2>
	 						<p>Beautiful WordPress by someone who knows the difference.</p>
	 					</div>
	 					<div class="col-sm-6">
	 						<div class="contact-info">
	 							<p>Contact Us (866) 648-0001</p>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
		<div class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">WP Results</a>
				</div>
				<?php 
					wp_nav_menu( array(
						'theme_location'=>'primary',
						'depth' =>2, 
						'container'=>'div',
						'container_class' =>'collapse navbar-collapse',
						'menu_class'=>'nav navbar-nav',
						'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
						'walker' => new wp_bootstrap_navwalker())
					);
				?>
			</div>
		</div>