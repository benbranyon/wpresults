<?php
/*
Template Name: Full Width Template
*/
?>

<?php get_header(); ?>
<?php global $advertica_shortname; ?>
<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>
<?php 
	$pagetitle = get_post_meta($post->ID, "_skt_pagetitle_metabox", true); 
	$pagetitle = ((isset($pagetitle) && $pagetitle !="") ? $pagetitle : '1' ); 
if($pagetitle == 1) { ?>
<div class="bread-title-holder">

	<div class="bread-title-bg-image full-bg-breadimage-fixed"></div>
	<div class="container">
		<div class="row-fluid">
		  <div class="container_inner clearfix">
			<h1 class="title"><?php the_title(); ?></h1>
			<?php if(sketch_get_option($advertica_shortname."_hide_bread") == 'true') { if ((class_exists('advertica_breadcrumb_class'))) {$advertica_breadcumb->custom_breadcrumb();} } ?>
		   </div>
		 </div>
	</div>
</div>
<?php } ?>

<div class="page-content fullwidth-temp">
	<div class="container post-wrap">
		<div class="row-fluid">
			<div id="content" class="span12">
				<div class="post" id="post-<?php the_ID(); ?>">
					<div class="skepost">
						<?php the_content(); ?>
						<?php wp_link_pages(__('<p><strong>Pages:</strong> ','advertica'), '</p>', __('number','advertica')); ?>
						<?php edit_post_link('Edit', '', ''); ?>	
					</div>
					<!-- skepost -->
				</div>
				<!-- post -->

				<?php endwhile; ?>
				<?php else :  ?>
					<div class="post">
						<h2><?php _e('Not Found','advertica'); ?></h2>
					</div>
				<?php endif; ?>
			</div>
			<!-- content --> 
		</div>
	</div>
</div>
<?php get_footer(); ?>