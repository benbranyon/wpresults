<?php
/*
Template Name: Blog with Left Sidebar Template
*/

get_header(); ?>

<?php global $advertica_shortname; ?>
<div class="main-wrapper-item blog-template">
	<?php 
		$pagetitle = get_post_meta($post->ID, "_skt_pagetitle_metabox", true); 
		$pagetitle = ((isset($pagetitle) && $pagetitle !="") ? $pagetitle : '1' ); 
	?>
	<?php if($pagetitle == 1) { ?>
	<div class="bread-title-holder">
		<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
		<div class="container">
			<div class="row-fluid">
				<div class="container_inner clearfix">
					<h1 class="title"><?php if(sketch_get_option($advertica_shortname.'_blogpage_heading')) { echo sketch_get_option($advertica_shortname.'_blogpage_heading'); } ?></h1>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>

	<div class="container post-wrap left-sidebar">
		<div class="row-fluid">
				<div id="content" class="span8 blogsidebar">
					<?php 
					if(get_query_var( 'page')){$paged=get_query_var('page');}
					else{$paged=get_query_var('paged');}
					$args=array('post_type' => 'post','paged' => $paged);
					query_posts( $args ); 
					?>

					<?php if(have_posts()) : ?>
					<?php /* The loop */ ?>
					<?php while(have_posts()) : the_post(); ?>
					<?php if(is_sticky($post->ID)) { _e("<div class='sticky-post'>featured</div>",'advertica'); } ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php
						$prev_link = get_previous_posts_link('&larr;Previous');
						$next_link = get_next_posts_link('Next&rarr;');
						if($prev_link || $next_link){
						?>

						<div class="navigation blog-navigation">	
							<?php  if (function_exists("advertica_paginate") && sketch_get_option($advertica_shortname.'_show_pagination')) { advertica_paginate(); } else {?>			
							<div class="alignleft"><?php previous_posts_link(__('&larr;Previous','advertica')) ?></div>		
							<div class="alignright"><?php next_posts_link(__('Next&rarr;','advertica'),'') ?></div>    		
							<?php } ?>					
						</div>  
						<?php
						}
					?> 

					<?php else :  ?>
					<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
					<?php wp_reset_query();?>
				</div>
				<!-- content -->

				<!-- Sidebar -->
				<div id="sidebar" class="span3">
					<?php get_sidebar(); ?>
				</div>
				<!-- Sidebar --> 
		</div><!-- row-fluid -->
	</div><!-- container -->
</div>
<?php get_footer(); ?>