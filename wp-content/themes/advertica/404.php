<?php 
/**
 * The template for displaying Error 404 page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>
<?php global $advertica_shortname; ?>

<div class="page-content">
	<div class="container" id="error-404">
		<div class="row-fluid">
			<div id="content" class="span12">
				<div class="post">
					<div class="skepost _404-page">
						<div class="error-txt-first"><?php _e( 'OOPS !!!', 'advertica' ); ?></div>
						<div class="error-txt"><i class="fa fa-bullhorn"></i>&nbsp;<?php _e( '404', 'advertica' ); ?></div>
						<p><?php if(sketch_get_option($advertica_shortname.'_four_zero_four_txt')) { echo sketch_get_option($advertica_shortname.'_four_zero_four_txt'); } ?></p>
						<?php get_search_form(); ?>
					</div>
					<!-- post --> 
				</div>
				<!-- post -->
			</div>
			<!-- content --> 
		</div>
	</div>
</div>
<?php get_footer(); ?>