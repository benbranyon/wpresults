<?php global $advertica_shortname; ?>
<?php

$_fb1_first_icon_class = sketch_get_option($advertica_shortname.'_fb1_first_icon_class');
$_fb2_first_icon_class = sketch_get_option($advertica_shortname.'_fb2_first_icon_class');
$_fb3_first_icon_class = sketch_get_option($advertica_shortname.'_fb3_first_icon_class');

$_fb1_first_icon_class = ($_fb1_first_icon_class !="") ? $_fb1_first_icon_class : 'fa-group';
$_fb2_first_icon_class = ($_fb2_first_icon_class !="") ? $_fb2_first_icon_class : 'fa-shield';
$_fb3_first_icon_class = ($_fb3_first_icon_class !="") ? $_fb3_first_icon_class : 'fa-desktop';

?>
<?php  $fraturedbox = get_post_meta( $post->ID,'_skt_freaturedboxsection_metabox',true );
if($fraturedbox == '1'){?>
<div id="featured-box" class="skt-section">
	<div class="container">
		<div class="mid-box-mid row-fluid"> 
			<!-- Featured Box 1 -->
			<div class="mid-box span4 fade_in_hide element_fade_in">
				<div class="skt-iconbox iconbox-top">		
					<div class="iconbox-icon skt-animated small-to-large skt-viewport">	
						<?php if(sketch_get_option($advertica_shortname.'_fb1_first_part_image')) { ?>
							<a class="skt-featured-images" href="<?php if(sketch_get_option($advertica_shortname."_fb1_first_part_link")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_link"); } ?>" title="<?php if(sketch_get_option($advertica_shortname."_fb1_first_part_heading")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_heading"); } ?>">
									<span class="skt-featured-image-mask"></span>
									<img class="skin-bg" src="<?php  echo sketch_get_option($advertica_shortname.'_fb1_first_part_image','advertica'); ?>" alt="boximg"/>	  
							</a>
						<?php } else { ?>
						<a class="skt-featured-icons" href="<?php if(sketch_get_option($advertica_shortname."_fb1_first_part_link")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_link"); } ?>" title="<?php if(sketch_get_option($advertica_shortname."_fb1_first_part_heading")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_heading"); } ?>">
							<i class="fa <?php echo $_fb1_first_icon_class; ?>"></i>		  
						</a>
						<?php } ?>
					</div>		
					<div class="iconbox-content">		
						<h4><?php if(sketch_get_option($advertica_shortname."_fb1_first_part_heading")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_heading"); } ?></h4>			
						<p><?php if(sketch_get_option($advertica_shortname."_fb1_first_part_content")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_content"); } ?></p>		
					</div>			
					<div class="clearfix"></div>	
				</div>
			</div>
			<!-- Featured Box 2 -->
			<div class="mid-box span4 fade_in_hide element_fade_in" >
				<div class="skt-iconbox iconbox-top">
					<div class="iconbox-icon skt-animated small-to-large skt-viewport">	
					  <?php if(sketch_get_option($advertica_shortname.'_fb2_second_part_image')) { ?>
						<a class="skt-featured-images" href="<?php if(sketch_get_option($advertica_shortname."_fb2_second_part_link")) { echo sketch_get_option($advertica_shortname."_fb2_second_part_link"); } ?>" title="<?php if(sketch_get_option($advertica_shortname."_fb2_second_part_heading")) { echo sketch_get_option($advertica_shortname."_fb2_second_part_heading"); } ?>">
								<span class="skt-featured-image-mask"></span>
								<img class="skin-bg" src="<?php  echo sketch_get_option($advertica_shortname.'_fb2_second_part_image','advertica'); ?>" alt="boximg"/>
						</a>
					  <?php } else { ?>
						<a class="skt-featured-icons" href="<?php if(sketch_get_option($advertica_shortname."_fb2_second_part_link")) { echo sketch_get_option($advertica_shortname."_fb2_second_part_link"); } ?>" title="<?php if(sketch_get_option($advertica_shortname."_fb2_second_part_heading")) { echo sketch_get_option($advertica_shortname."_fb2_second_part_heading"); } ?>">
							<i class="fa <?php echo $_fb2_first_icon_class; ?>"></i>
						</a>
					  <?php  } ?>	
					</div>		
					<div class="iconbox-content">		
						<h4><?php if(sketch_get_option($advertica_shortname."_fb2_second_part_heading")) { echo sketch_get_option($advertica_shortname."_fb2_second_part_heading"); } ?></h4>				
						<p><?php if(sketch_get_option($advertica_shortname."_fb2_second_part_content")) { echo sketch_get_option($advertica_shortname."_fb2_second_part_content"); } ?></p>			
					</div>			
					<div class="clearfix"></div>	
				</div>
			</div>
			<!-- Featured Box 3 -->
			<div class="mid-box span4 fade_in_hide element_fade_in" >
				<div class="skt-iconbox iconbox-top">		
					<div class="iconbox-icon skt-animated small-to-large skt-viewport">
					  <?php if(sketch_get_option($advertica_shortname.'_fb3_third_part_image')) { ?>			
						<a class="skt-featured-images" href="<?php if(sketch_get_option($advertica_shortname."_fb3_third_part_link")) { echo sketch_get_option($advertica_shortname."_fb3_third_part_link"); } ?>" title="<?php if(sketch_get_option($advertica_shortname."_fb3_third_part_heading")) { echo sketch_get_option($advertica_shortname."_fb3_third_part_heading"); } ?>">				
								<span class="skt-featured-image-mask"></span>
								<img class="skin-bg" src="<?php  echo sketch_get_option($advertica_shortname.'_fb3_third_part_image','advertica'); ?>" alt="boximg"/>
						</a>
					  <?php } else { ?>
						<a class="skt-featured-icons" href="<?php if(sketch_get_option($advertica_shortname."_fb3_third_part_link")) { echo sketch_get_option($advertica_shortname."_fb3_third_part_link"); } ?>" title="<?php if(sketch_get_option($advertica_shortname."_fb3_third_part_heading")) { echo sketch_get_option($advertica_shortname."_fb3_third_part_heading"); } ?>">				
							<i class="fa <?php echo $_fb3_first_icon_class; ?>"></i>
						</a>
					  <?php } ?>	
					</div>			
					<div class="iconbox-content">			
						<h4><?php if(sketch_get_option($advertica_shortname."_fb3_third_part_heading")) { echo sketch_get_option($advertica_shortname."_fb3_third_part_heading"); } ?></h4>				
						<p><?php if(sketch_get_option($advertica_shortname."_fb3_third_part_content")) { echo sketch_get_option($advertica_shortname."_fb3_third_part_content"); } ?></p>		
					</div>		
					<div class="clearfix"></div>	
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php }?>