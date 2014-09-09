<?php  $sktstatics_metabox = get_post_meta( $post->ID,'_skt_statics_metabox',true );
if($sktstatics_metabox == '1'){ ?>
<div id="full-static-box">
	<div class="container" >
		<div class="row-fluid">
			<div class="span12">
				<?php $skt_staticsarea_section = get_post_meta( $post->ID,'_skt_staticsarea_section',true ); ?>
				<?php if(isset($skt_staticsarea_section)) { echo do_shortcode($skt_staticsarea_section);} ?>				
			</div>
		</div>
	</div>
</div>
<?php } ?>