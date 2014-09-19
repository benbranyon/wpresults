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
			<div>
				<h2 class="featured-headline">What we mean by results</h2>
				<span class="border_left"></span>
			</div>
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
		<div class="mid-box-mid row-fluid" style="margin-top:40px;"> 
			<!-- Featured Box 4 -->
			<div class="mid-box span4 fade_in_hide element_fade_in" >
				<div class="skt-iconbox iconbox-top">		
					<div class="iconbox-icon skt-animated small-to-large skt-viewport">
						<a class="skt-featured-icons" href="" title="">				
							<i class="fa fa-users"></i>
						</a>
					</div>			
					<div class="iconbox-content">			
						<h4>We mean Service</h4>				
						<p>We match you with a Senior Developer who understands your business and has the freedom to focus exclusively on your project. We take care of everything so all they have left to do is code your precise vision into a reality, on-time and on-budget.</p>		
					</div>		
					<div class="clearfix"></div>	
				</div>
			</div>
			<!-- Featured Box 5 -->
			<div class="mid-box span4 fade_in_hide element_fade_in" >
				<div class="skt-iconbox iconbox-top">		
					<div class="iconbox-icon skt-animated small-to-large skt-viewport">
						<a class="skt-featured-icons" href="" title="">				
							<i class="fa fa-desktop"></i>
						</a>
					</div>			
					<div class="iconbox-content">			
						<h4>We mean Experienced</h4>				
						<p>With decades of experience and millions of dollars in projects under our belt, we have seen and done it all. We understand that your website is your life-blood and when it goes down you’re essentially out of business. Our unparalleled industry and WordPress knowledge means you miss out on all the hard knocks and setbacks that would otherwise be in your future. Sorry about that!</p>		
					</div>		
					<div class="clearfix"></div>	
				</div>
			</div>
			<!-- Featured Box 6 -->
			<div class="mid-box span4 fade_in_hide element_fade_in" >
				<div class="skt-iconbox iconbox-top">		
					<div class="iconbox-icon skt-animated small-to-large skt-viewport">
						<a class="skt-featured-icons" href="" title="">				
							<i class="fa fa-money"></i>
						</a>
					</div>			
					<div class="iconbox-content">			
						<h4>We mean Affordable</h4>				
						<p>Because we provide our Senior Developers with an environment where their every need is accounted for, all they have left to do is hold planning and review calls with you, our valued customer, and… program. And when a programmer is free to program, you get the results you need at the best price possible.</p>		
					</div>		
					<div class="clearfix"></div>	
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php }?>