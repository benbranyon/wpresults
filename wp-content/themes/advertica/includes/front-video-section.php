<div class="front-video-bg">
<?php  
	$skt_video_section = get_post_meta( $post->ID,'_skt_video_section',true ); 
?>
<?php if(sketch_get_option($advertica_shortname.'_homevideo_hght')){ $skt_video_height = sketch_get_option($advertica_shortname.'_homevideo_hght','advertica'); } ?>
<?php if ($skt_video_section) { 
	$src1 = $skt_video_section;
	if(preg_match('/http:\/\/(www\.)*vimeo\.com\/.*/',$src1)){
		preg_match_all('#(http://vimeo.com)/([0-9]+)#i',$src1,$output);
		$video_id = $output[2][0];
		?>      
		<iframe src='http://player.vimeo.com/video/<?php echo $video_id; ?>?portrait=0&amp;title=0&amp;byline=0&amp;badge=0' height='<?php echo $skt_video_height; ?>' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		<?php 
	}
	if(preg_match('/http:\/\/(www\.)*youtube\.com\/.*/',$src1)) {
		preg_match_all('#(http://www.youtube.com)?/(v/([-|~_0-9A-Za-z]+)|watch\?v\=([-|~_0-9A-Za-z]+)&?.*?)#i',$src1,$output);
		$video_id = $output[4][0];
		?>
		<iframe height="<?php echo $skt_video_height; ?>" src="https://www.youtube.com/embed/<?php echo $video_id; ?>?autohide=1&amp;wmode=opaque&amp;showinfo=0" class="youtube-video" allowfullscreen></iframe>
		<?php 
	} 
}
?>
</div>