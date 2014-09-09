<?php
/*
Template Name: Home page Template
*/
get_header();
global $advertica_shortname; 
?>
<?php
	global $skt_shortname, $wp_query;
	$postid = $wp_query->post->ID;
	$_skt_frontpage_sections_order = get_post_meta($postid, '_skt_frontpage_sections_order', true);
	
	if(isset($_skt_frontpage_sections_order) && $_skt_frontpage_sections_order !=""){
	
		foreach($_skt_frontpage_sections_order as $fsection){ 
		
			if($fsection === "Featured Box Section"){
			
				include("includes/front-featured-boxes-section.php"); // FEATURED BOXES SECTION
			
			}elseif($fsection === "Call to Action Section"){
			
				include("includes/front-call-to-action-section.php"); // CALL-TO-ACTION SECTION
			
			}elseif($fsection === "Latest Project Section"){
			
				include("includes/front-latest-project-section.php"); // LATEST PROJECTS SECTION
			
			}elseif($fsection === "Content Box with Parallax Effect Section"){
			
				include("includes/front-parallax-section.php");       // AWESOME PARALLAX SECTION
			
			}elseif($fsection === "Team Member Section"){
			
				include("includes/front-teammember-section.php");     // TEAM MEMBER SECTION
				
			}elseif($fsection === "Statistics Section"){
			
				include("includes/front-statistics-section.php");     // STATISTICS SECTION
				
			}elseif($fsection === "Client Logo Section"){
			
				include("includes/front-client-logo-section.php");    // TEAM MEMBER SECTION
				
			}elseif($fsection === "Page Content"){
			?>
				<!-- PAGE EDITER CONTENT -->
				<div id="front-content-box" class="skt-section">
					<div class="container">
						<div class="row-fluid"> 
							<?php 
								$post_object = get_post( $postid );
								if($post_object->post_content) {
									echo do_shortcode($post_object->post_content); 
								}
							?>
						</div>
						<div class="border-content-box bottom-space"></div>
					</div>
				</div>
				<!-- \\PAGE EDITER CONTENT -->
			<?php
			}
		}
	}else{
	?>
		<!-- FEATURED BOXES SECTION -->
		<?php include("includes/front-featured-boxes-section.php"); ?>

		<!-- CALL TO ACTION SECTION -->
		<?php include("includes/front-call-to-action-section.php"); ?>

		<!-- LATEST PORTFOLIO SECTION -->
		<?php include("includes/front-latest-project-section.php"); ?>

		<!-- AWESOME PARALLAX SECTION -->
		<?php include("includes/front-parallax-section.php"); ?>

		<!-- TEAM-MEMBER SECTION -->
		<?php include("includes/front-teammember-section.php"); ?>

		<!-- STATISTICS SECTION -->
		<?php include("includes/front-statistics-section.php"); ?>

		<!-- CLIENTS-LOGO SECTION -->
		<?php include("includes/front-client-logo-section.php"); ?>
	<?php
	}
?>
<?php get_footer(); ?>