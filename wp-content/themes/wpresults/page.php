<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 */

get_header(); ?>
	<div class="container content">
		<div class="row">
			<div class="col-sm-6">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="callout jumbotron">
  					<div class="container">
						<?php the_title( '<h1>', '</h1>' );?>
					</div>
				</div>
				<?php the_content(); ?>

			<?php endwhile; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>