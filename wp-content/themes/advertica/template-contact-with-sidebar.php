<?php
/**
Template Name: Contact page Template with Sidebar
*/
get_header(); ?>

<?php global $advertica_shortname; ?>

<?php
	$skt_gmap_lat  = sketch_get_option($advertica_shortname.'_contact_gmap_lat');
	$skt_gmap_long = sketch_get_option($advertica_shortname.'_contact_gmap_long');
	$skt_gmap_infiotxt = sketch_get_option($advertica_shortname.'_contact_gmap_infotxt');
	$skt_gmap_infost   = sketch_get_option($advertica_shortname.'_contact_gmap_infost');
	$skt_gmap_marttl   = sketch_get_option($advertica_shortname.'_contact_gmap_marttl');
	$skt_gmap_iconimg  = sketch_get_option($advertica_shortname.'_contact_gmap_iconimg');
	$skt_gmap_markani  = sketch_get_option($advertica_shortname.'_contact_gmap_markanim');
	$skt_gmap_zlevel   = sketch_get_option($advertica_shortname.'_contact_gmap_zlevel');
	$skt_gmap_maptype  = sketch_get_option($advertica_shortname.'_contact_gmap_maptype');
	$skt_gmap_infiotxt = ($skt_gmap_infiotxt) ? $skt_gmap_infiotxt : 'This Is Indore.';
	$skt_gmap_iconimg  = ($skt_gmap_iconimg) ? $skt_gmap_iconimg : 0;
	$skt_gmap_marttl   = ($skt_gmap_marttl) ? $skt_gmap_marttl : "Indore";
?>

<input type="hidden" id="skt-gmap-content" value="<?php echo $skt_gmap_infiotxt; ?>" />
<?php if($skt_gmap_lat && $skt_gmap_long){ ?>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
	<script type="text/javascript">
	var marker;
	var map;
	var ele;
	jQuery(document).ready(function() {
		ele = "";
		var contstring = jQuery('#skt-gmap-content').val();	
		var lines = contstring.split(/\n/g);      
		for(var i=0; i < lines.length; i++) {      
			 ele += lines[i];                  
		}
	});

	function sktinitializemap() 
	{
		var contentStringEle = ele;
		var contentString = contentStringEle; 
		var image = '<?php echo $skt_gmap_iconimg; ?>';
		var infowindow = new google.maps.InfoWindow({content: contentString,maxWidth: 300}); // info-window text
		var myLatLng = new google.maps.LatLng('<?php echo $skt_gmap_lat; ?>','<?php echo $skt_gmap_long; ?>'); // address in the form of latitude/lognitude
		var mapOptions = {
			zoom: <?php echo $skt_gmap_zlevel; ?>,
			scrollwheel: false,
			center:  myLatLng,
			mapTypeControl: true,
			panControl: true,
			mapTypeControlOptions: {
			  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			},
			zoomControl: true,
			zoomControlOptions: {
			  style: google.maps.ZoomControlStyle.LARGE
			},
			mapTypeId: google.maps.MapTypeId.<?php echo $skt_gmap_maptype; ?>
		}

		map = new google.maps.Map(document.getElementById('map'),mapOptions);
		// add google map marker
		marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: image,
			title:"<?php echo $skt_gmap_marttl; ?>",
			animation: google.maps.Animation.<?php echo $skt_gmap_markani; ?>
		});

		// open info-window at marker click event
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
		});

		// check info-window status

		<?php if($skt_gmap_infost ==="open") { ?>
			infowindow.open(map,marker);
			skt_moveMap(skt_moveMap, 10);
		<?php } ?>
	}
	function skt_moveMap() {
		map.panBy(0, -100);
	}
	// initialize the map at window load event
	google.maps.event.addDomListener(window, 'load', sktinitializemap);
	</script>  
<?php } ?>

<div class="main-wrapper-item"> 
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
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
						<h1 class="title"><?php the_title(); ?></h1>
						<?php if(sketch_get_option($advertica_shortname."_hide_bread") == 'true') {
						if ((class_exists('advertica_breadcrumb_class'))) {$advertica_breadcumb->custom_breadcrumb();}
						} ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>	

	<div class="page-content contactsidetemp">
		<div class="container post-wrap">
			<div class="row-fluid">
				<div id="content" class="span8">
					<div id="map_canvas" class="google-map">
						<!-- GOOGLE MAP  -->
							<?php if($skt_gmap_lat && $skt_gmap_long){ ?><div id="map"></div> <?php } ?>
						<!-- GOOGLE MAP  -->
					</div>	
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
							<h2><?php _e('Page Does Not Exist','advertica'); ?></h2>
						</div>
					<?php endif; ?>
						<div class="clearfix"></div>
				</div>
				<!-- content -->

				<!-- Sidebar -->
				<div id="sidebar" class="span3">
					<?php get_sidebar('contact'); ?>
				</div>
				<div class="clearfix"></div>
				<!-- Sidebar --> 

			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>