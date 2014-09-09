<div class="Skt_revolution">
<?php 
	if(function_exists('putRevSlider')) {
		$revAlias = get_post_meta( $post->ID, '_advertica_revslider_alias', true );
		if(isset($revAlias)){ putRevSlider( $revAlias ); } 
	}else{
		_e('<div class="rev_slider_install_err">Please install the <b>Revolution Slider</b> from admin section</div>','advertica');
	}
?>
</div>