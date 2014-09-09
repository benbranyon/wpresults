<?php global $advertica_shortname; ?>
<?php  $latestprojectmeta = get_post_meta( $post->ID,'_skt_latestproject_metabox',true );
if($latestprojectmeta == '1'){ ?>
<div id="portfolio-division-box" class="skt-section">
	<div class="container">
		<div class="row-fluid">
			<div class="portfolio-title span12">
				<div class="row-fluid clearfix">
					<?php if(sketch_get_option($advertica_shortname.'_port_title')) { ?> <div class="span8 port-title"><h3><?php echo sketch_get_option($advertica_shortname.'_port_title');  ?></h3><span class="border_left"></span></div><?php } ?>
					<?php if(sketch_get_option($advertica_shortname.'_port_link')) { ?><div class="span4 port-readmore"><a class="readmore" href="<?php if(sketch_get_option($advertica_shortname.'_port_link')) { echo sketch_get_option($advertica_shortname.'_port_link'); } ?>"><?php if(sketch_get_option($advertica_shortname.'_portlink_title')) { echo sketch_get_option($advertica_shortname.'_portlink_title'); } ?></a></div><?php } ?>
				</div>
			</div>
			<div class="row-fluid portfolio-wrap">
				<div class="span12">
					<div class="row-fluid">
						<div class="portfolio-box-mid">
							<?php $args=array('post_type' => 'project','posts_per_page'=>4);
							query_posts($args); ?>
							<?php if(have_posts()) : ?>
							<?php while(have_posts()) : the_post(); ?>
							<div class="span3 project-item skt_animate_when_almost_visible skt_bottom-to-top" id="post-<?php the_ID(); ?>">
								<?php if(has_post_thumbnail()) { 
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'advertica_portfolio_image' );
									$pretty_thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full'); ?>
								<div class="feature_image" style="position: relative;">
									<img class="skin-border" src="<?php echo $image[0]; ?>" alt="Thumbnail" />
								</div>
								<div class="title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></div>
							
								<div class="mask">
									<a data-rel="prettyPhoto[gallery]" class="icon-image folio" href="<?php echo $pretty_thumb[0]; ?>"></a>
								</div>
								<?php } ?> 
							</div>
							<?php endwhile; ?>
							<?php wp_reset_query(); ?>
							<?php endif  ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>