<?php
/**
 * The template for displaying posts in the Gallery post format.
 *
 */
?>

<div <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
		<?php
			$att_args = array( 'post_type'      => 'attachment',
							   'numberposts'    => -1,
							   'post_status'    => null,
							   'post_parent'    => $post->ID,
							   'post_mime_type' => 'image',
							   'orderby'        => 'menu_order'
						);
			$attachments = get_posts( $att_args );
	   ?>

		<div class="slider-attach">
		<?php if( $attachments ): ?>
		<?php 
			$postautoscroll = get_post_meta($post->ID, "_skt_postType_slider_auscroll", true);
			$postdirction   = get_post_meta($post->ID, "_skt_postType_slider_direction", true);
		?>	

		<script type="text/javascript">
			jQuery(document).ready(function(){
				  jQuery(window).load(function () {
					jQuery('#post-slider-<?php the_ID(); ?>').flexslider({
						animation: "fade",
						namespace: "postformat-gallery",//{NEW} String: Prefix string attached to the class of every element generated by the plugin
						selector: ".slides > li",       //{NEW} Selector: Must match a simple pattern. '{container} > {slide}' -- Ignore pattern at your own peril
						easing: "swing",                //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
						direction: "vertical",
						slideshow: <?php if(isset($postautoscroll)) { echo $postautoscroll; } else echo "true"; ?>,
						slideshowSpeed: 5000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
						animationSpeed: 600,            //Integer: Set the speed of animations, in milliseconds
						controlsContainer: "",
						controlNav: false,              //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
						directionNav: <?php if(isset($postdirction)) { echo $postdirction; } else echo "true"; ?>, //Boolean: Create navigation for previous/next navigation? (true/false)
						prevText: "",           	    //String: Set the text for the "previous" directionNav item
						nextText: ""
					});
				});
			});
		</script> 

		<div class="image-gallery-slider" id="post-slider-<?php the_ID(); ?>">
			<ul class="gallery-box slides">
			  <?php foreach( $attachments as $attachment ): ?>
			  <li> 
   				   <?php	$attachment_img = wp_get_attachment_image_src( $attachment->ID, 'advertica_standard_img');  ?>
				   <img src="<?php echo $attachment_img[0]; ?>" alt="<?php echo $attachment->post_title; ?>" width="<?php echo $attachment_img[1]; ?>" height="<?php echo $attachment_img[2]; ?>" />
			  </li>
              <?php endforeach; ?>
			</ul>
		</div>
		<?php endif; ?>
		</div><!-- slider-attach -->

		<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
        <div class="featured-image-shadow-box">
			<?php
     				$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'advertica_standard_img');
			?>
			<a href="<?php the_permalink(); ?>" class="image">
				<img src="<?php echo $thumbnail[0];?>" alt="<?php the_title(); ?>" class="featured-image alignnon"/>
			</a>
		</div>
	   <?php } ?>

		<h1 class="post-title">
		   <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_title(); ?>
          </a>
		</h1>

		<div class="skepost-meta clearfix">
		    <span class="date"><?php _e('On','advertica');?> <?php the_time('F j, Y') ?></span><?php _e(',','advertica');?>
            <span class="author-name"><?php _e('Posted by ','advertica'); the_author_posts_link(); ?> </span><?php _e(',','advertica');?>
			<?php if (has_category()) { ?><span class="category"><?php _e('In ','advertica');?><?php the_category(','); ?></span><?php _e(',','advertica');?><?php } ?>
            <?php the_tags('<span class="tags">By ',',','</span> ,'); ?>
            <span class="comments"><?php _e('With ','advertica');?><?php comments_popup_link(__('No Comments ','advertica'), __('1 Comment ','advertica'), __('% Comments ','advertica')) ; ?></span>
        </div>
		<!-- skepost-meta -->

        <div class="skepost">
          <?php the_excerpt(); ?> 
		  <div class="continue"><a href="<?php the_permalink(); ?>"><?php _e('Read More','advertica');?></a></div>		  
        </div>
        <!-- skepost -->
</div>
<!-- post -->