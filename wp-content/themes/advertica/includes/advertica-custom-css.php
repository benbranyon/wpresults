<?php global $advertica_shortname, $advertica_themename, $post; ?>
<?php
function skeHex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
} 
	if(sketch_get_option($advertica_shortname.'_colorpicker')){ $bg_color = sketch_get_option($advertica_shortname.'_colorpicker'); } 
	if(sketch_get_option($advertica_shortname.'_headercolorpicker')){ $headercolorpicker = sketch_get_option($advertica_shortname.'_headercolorpicker'); } 
	if(sketch_get_option($advertica_shortname.'_navfontcolorpicker')){ $navfontcolorpicker = sketch_get_option($advertica_shortname.'_navfontcolorpicker'); } 
	if(sketch_get_option($advertica_shortname.'_teamcolorpicker')){ $teamcolorpicker = sketch_get_option($advertica_shortname.'_teamcolorpicker'); } 
	if(sketch_get_option($advertica_shortname.'_teamtitlecolor')){ $teamtitlecolor = sketch_get_option($advertica_shortname.'_teamtitlecolor'); } 
	if(sketch_get_option($advertica_shortname.'_bread_color')){ $breadcolor = sketch_get_option($advertica_shortname.'_bread_color'); } 
	if(sketch_get_option($advertica_shortname.'_bread_image')){ $breadimage = sketch_get_option($advertica_shortname.'_bread_image'); } 
	if(sketch_get_option($advertica_shortname.'_fullparallax_image')){ $fullparallax_image = sketch_get_option($advertica_shortname.'_fullparallax_image'); } 
	if(sketch_get_option($advertica_shortname.'_mobi_menu_width')){ $mobi_menu_width = sketch_get_option($advertica_shortname.'_mobi_menu_width'); } 
	if(sketch_get_option($advertica_shortname.'_logo_wdth')){ $skt_logo_wdth = sketch_get_option($advertica_shortname.'_logo_wdth'); } 
	if(sketch_get_option($advertica_shortname.'_logo_hght')){ $skt_logo_hght = sketch_get_option($advertica_shortname.'_logo_hght'); } 
	if(sketch_get_option($advertica_shortname.'_hide_con_map')){ $skt_hide_map = sketch_get_option($advertica_shortname.'_hide_con_map'); } 
	if(sketch_get_option($advertica_shortname.'_contact_gmap_height')){ $skt_map_height = sketch_get_option($advertica_shortname.'_contact_gmap_height'); } 
	if(sketch_get_option($advertica_shortname.'_hide_pro_filter')){ $skt_port_filter_hide = sketch_get_option($advertica_shortname.'_hide_pro_filter'); } 
	if(sketch_get_option($advertica_shortname.'_bread_title_color')){ $skt_bread_title_color = sketch_get_option($advertica_shortname.'_bread_title_color'); } 	
	if(sketch_get_option($advertica_shortname.'_staticscolorpicker')){ $skt_staticscolorpicker = sketch_get_option($advertica_shortname.'_staticscolorpicker'); } 	
	if(sketch_get_option($advertica_shortname.'_statics_image')){ $skt_staticsbgimage = sketch_get_option($advertica_shortname.'_statics_image'); } 	

if(sketch_get_option($advertica_shortname.'_flextitleclr')){ $skt_flextitleclr = sketch_get_option($advertica_shortname.'_flextitleclr'); } 
if(sketch_get_option($advertica_shortname.'_flexdespclr')){ $skt_flexdespclr = sketch_get_option($advertica_shortname.'_flexdespclr'); } 
if(sketch_get_option($advertica_shortname.'_flexlinkclr')){ $skt_flexlinkclr = sketch_get_option($advertica_shortname.'_flexlinkclr'); } 

	if(is_page()) {
		$pagetitlebg = get_post_meta($post->ID, "_pagetitle_bg", true);
	}else{
		$pagetitlebg = "";
	}

	$rgb=array();
	$rgb = skeHex2RGB($bg_color);
	$R = $rgb['red'];
	$G = $rgb['green'];
	$B = $rgb['blue'];
	$rgbcolor = "rgba(". $R .",". $G .",". $B .",.4)";
	$bdrrgbcolor = "rgba(". $R .",". $G .",". $B .",.7)";

	$hrgb = skeHex2RGB($headercolorpicker);
	$hR = $hrgb['red'];
	$hG = $hrgb['green'];
	$hB = $hrgb['blue'];
	$hrgbcolor = "rgba(". $hR .",". $hG .",". $hB .",.95)";

?>
<style type="text/css">

	/***************** HEADER *****************/
	.skehead-headernav,.header-clone{background: <?php if(isset($hrgbcolor)){ echo $hrgbcolor; } ?>;}

	/**************** LOGO SIZE ***************/
	.skehead-headernav .logo{width:<?php if(isset($skt_logo_wdth)){ echo $skt_logo_wdth; } ?>px;height:<?php if(isset($skt_logo_hght)){ echo $skt_logo_hght; } ?>px;}

	/***************** THEME *****************/

	#ascrail2000 div {background: <?php if(isset($bg_color)){ echo $bg_color; } ?> !important;}
  	 a.skt-featured-icons,.service-icon{ background: <?php if(isset($bg_color)){ echo $bg_color; } ?>;}
	 a.skt-featured-icons:after,.service-icon:after {border-top-color: <?php if(isset($bg_color)){ echo $bg_color; } ?>; }
	 a.skt-featured-icons:before,.service-icon:before {border-bottom-color: <?php if(isset($bg_color)){ echo $bg_color; } ?>; }

	
	.skt_price_table .price_table_inner ul li.table_title{background: <?php if(isset($bg_color)){ echo $bg_color; } ?>; }
	.sticky-post {color : <?php if(isset($bg_color)){ echo $bg_color; } ?>;border-color:<?php if(isset($bdrrgbcolor)){ echo $bdrrgbcolor; } ?>}
	#footer,.skt_price_table .price_table_inner .price_button a { border-color: <?php if(isset($bg_color)){ echo $bg_color; } ?>; }
	.social li a:hover{background: <?php if(isset($bg_color)){ echo $bg_color; } ?>;}
	.social li a:hover:before{color:#fff; }
	.flexslider:hover .flex-next:hover, .flexslider:hover .flex-prev:hover,a#backtop,.slider-link a:hover,#respond input[type="submit"]:hover,.skt-ctabox div.skt-ctabox-button a:hover,#portfolio-division-box a.readmore:hover,.project-item .icon-image,.project-item:hover,.filter li .selected,.filter a:hover,.widget_tag_cloud a:hover,.continue a:hover,blockquote,.skt-quote,#advertica-paginate .advertica-current,#advertica-paginate a:hover,.postformat-gallerydirection-nav li a:hover,#wp-calendar,.comments-template .reply a:hover,#content .contact-left form input[type="submit"]:hover,.service-icon:hover,.skt-parallax-button:hover,.sktmenu-toggle,.skt_price_table .price_table_inner .price_button a:hover,#content .skt-service-page div.one_third:hover .service-icon,#content div.one_half .skt-service-page:hover .service-icon  {background-color: <?php if(isset($bg_color)){ echo $bg_color; } ?>; }
	.skt-ctabox div.skt-ctabox-button a,#portfolio-division-box .readmore,.teammember,.comments-template .reply a,#respond input[type="submit"],.slider-link a,.ske_tab_v ul.ske_tabs li.active,.ske_tab_h ul.ske_tabs li.active,#content .contact-left form input[type="submit"],.filter a,.skt-parallax-button,#advertica-paginate a:hover,#advertica-paginate .advertica-current,#content .contact-left form textarea:focus,#content .contact-left form input[type="text"]:focus, #content .contact-left form input[type="email"]:focus, #content .contact-left form input[type="url"]:focus, #content .contact-left form input[type="tel"]:focus, #content .contact-left form input[type="number"]:focus, #content .contact-left form input[type="range"]:focus, #content .contact-left form input[type="date"]:focus, #content .contact-left form input[type="file"]:focus{border-color:<?php if(isset($bg_color)){ echo $bg_color; } ?>;}
	.clients-items li a:hover{border-bottom-color:<?php if(isset($bg_color)){ echo $bg_color; } ?>;}
	a,.ske-footer-container ul li:hover:before,.ske-footer-container ul li:hover > a,.ske_widget ul ul li:hover:before,.ske_widget ul ul li:hover,.ske_widget ul ul li:hover a,.title a ,.skepost-meta a:hover,.post-tags a:hover,.entry-title a:hover ,.readmore a:hover,#Site-map .sitemap-rows ul li a:hover ,.childpages li a,#Site-map .sitemap-rows .title,.ske_widget a,.ske_widget a:hover,#Site-map .sitemap-rows ul li:hover,#footer .third_wrapper a:hover,.ske-title,#content .contact-left form input[type="submit"],.filter a,span.team_name,#respond input[type="submit"],.reply a, a.comment-edit-link,.skt_price_table .price_in_table .value, .teammember strong .team_name,#content .skt-service-page .one_third:hover .service-box-text h3,.ad-service:hover .service-box-text h3,.mid-box-mid .mid-box:hover .iconbox-content h4,.error-txt,.skt-ctabox .skt-ctabox-content h2 {color: <?php if(isset($bg_color)){ echo $bg_color; } ?>;text-decoration: none;}
	.single #content .title,#content .post-heading,.childpages li ,.fullwidth-heading,.comment-meta a:hover,#respond .required, #wp-calendar tbody a{color: <?php if(isset($bg_color)){ echo $bg_color; } ?>;} 
	#skenav a{color:<?php if(isset($navfontcolorpicker)){ echo $navfontcolorpicker; } ?>;}
	#skenav ul ul li a:hover{background-color: <?php if(isset($bg_color)){ echo $bg_color; } ?>;color:#fff;}
	*::-moz-selection{background: <?php if(isset($bg_color)){ echo $bg_color; } ?>;color:#fff;}
	::selection {background: <?php if(isset($bg_color)){ echo $bg_color; } ?>;color:#fff;}
	#full-twitter-box,.progress_bar {background: none repeat scroll 0 0 <?php if(isset($bg_color)){ echo $bg_color; } ?>;}
	#skenav ul li.current_page_item > a,
	#skenav ul li.current-menu-ancestor > a,
	#skenav ul li.current-menu-item > a,
	#skenav ul li.current-menu-parent > a { background-color:<?php if(isset($bg_color)){ echo $bg_color; } ?>;color:#fff;}
	.project-item:hover > .title,.continue a:hover { border-color: <?php if(isset($bg_color)){ echo $bg_color; } ?>;  }
	#searchform input[type="submit"]{ background: none repeat scroll 0 0 <?php if(isset($bg_color)){ echo $bg_color; } ?>;  }
	.ske-footer-container ul li {}
	.col-one .box .title, .col-two .box .title, .col-three .box .title, .col-four .box .title {color: <?php if(isset($bg_color)){ echo $bg_color; } ?> !important;  }
	<?php if(sketch_get_option($advertica_shortname.'_bread_stype')){ $bread_type = sketch_get_option($advertica_shortname.'_bread_stype'); } 
	
	if(isset($bread_type)) {
	if ($bread_type == "brcolor" && $pagetitlebg == Null ) {?>.full-bg-breadimage-fixed { background-color: <?php echo $breadcolor; ?>;}<?php  } 
	else { ?> .full-bg-breadimage-fixed { background-image: url("<?php if(isset($pagetitlebg) && $pagetitlebg!= Null ){ echo $pagetitlebg;} ?>");} <?php }
	?>
	<?php if($bread_type == "brimage") { ?>.full-bg-breadimage-fixed { background-image: url("<?php if(isset($pagetitlebg) && $pagetitlebg!= Null ){ echo $pagetitlebg;} else { echo $breadimage; } ?>");}<?php } } ?>
	#full-division-box { background-image: url("<?php if(isset($fullparallax_image)){ echo $fullparallax_image; } ?>"); }
	
	/***************** Statics BG *****************/
	<?php if(sketch_get_option($advertica_shortname.'_statics_stype')){ $statics_type = sketch_get_option($advertica_shortname.'_statics_stype'); } 
	
	if(isset($statics_type)) {
	if ($statics_type == "staticscolor" ) {?> #full-static-box {background-color: <?php if(isset($skt_staticscolorpicker)){ echo $skt_staticscolorpicker; } ?>;} <?php }
	?>
	<?php if($statics_type == "staticsimage") { ?> #full-static-box { background-image: url("<?php if(isset($skt_staticsbgimage)){ echo $skt_staticsbgimage;} ?>");}<?php } } ?>
	
	
	/***************** TEAM BG *****************/
	#team-division-box .border_center {border-color: <?php if(isset($teamtitlecolor)){ echo $teamtitlecolor; } ?>;}
	.team_custom_title.title_center, .team_custom_title.title_center h3 {color: <?php if(isset($teamtitlecolor)){ echo $teamtitlecolor; } ?>;}
	#team-division-box{background-color: <?php if(isset($teamcolorpicker)){ echo $teamcolorpicker; } ?>;}
	
	/***************** PAGINATE *****************/
	#skenav li a:hover,#skenav .sfHover { background-color:#333333;color: #FFFFFF;}
	#skenav .sfHover a { color: #FFFFFF;}
	#skenav ul ul li { background: none repeat scroll 0 0 #333333; color: #FFFFFF; }
	#skenav .ske-menu #menu-secondary-menu li a:hover, #skenav .ske-menu #menu-secondary-menu .current-menu-item a{color: #71C1F2;  }
	.footer-seperator{background-color: rgba(0,0,0,.2);}
	#skenav .ske-menu #menu-secondary-menu li .sub-menu li {	margin: 0;  }

	<?php if(isset($skt_hide_map) && $skt_hide_map === 'false' ){ ?>#map_canvas{display:none;}<?php } ?>
	<?php if(isset($skt_port_filter_hide) && $skt_port_filter_hide === 'false' ){ ?>#container-isotop{margin-top:0px !important;}<?php } ?>
	#map_canvas #map,#map_canvas{height:<?php if(isset($skt_map_height)){ echo $skt_map_height; } ?>px;}
	.teammember {border-bottom-color : <?php if(isset($rgbcolor)){ echo $rgbcolor; } ?>;}
 	<?php if(isset($skt_port_filter_hide) && $skt_port_filter_hide === 'false' ){ ?>#container-isotop{margin-top:0px !important;}<?php } ?>

	.bread-title-holder h1.title,.cont_nav_inner span,.bread-title-holder .cont_nav_inner p{
		color: <?php if(isset($skt_bread_title_color)){ echo $skt_bread_title_color; } ?>;
	}

	/***************** Flex Slider *****************/
	.flexslider .slider-title{color: <?php if(isset($skt_flextitleclr)){ echo $skt_flextitleclr; } ?>;text-shadow: 1px 1px 1px <?php if(isset($bg_color)){ echo $bg_color; } ?>;}
    .flexslider .text{color: <?php if(isset($skt_flexdespclr)){ echo $skt_flexdespclr; } ?>;}
	.flexslider .slider-link a{color: <?php if(isset($skt_flexlinkclr)){ echo $skt_flexlinkclr; } ?>;border-color:<?php if(isset($skt_flexlinkclr)){ echo $skt_flexlinkclr; } ?>;}
	.flexslider .slider-link a:hover{color: #fff;border-color:<?php if(isset($bg_color)){ echo $bg_color; } ?>; }
	
	/***************** Form Input Tags *****************/
	form input[type="text"]:focus,form input[type="email"]:focus,
	form input[type="url"]:focus, form input[type="tel"]:focus,
	form input[type="number"]:focus,form input[type="range"]:focus,
	form input[type="date"]:focus,form input[type="file"]:focus,form textarea:focus,form select:focus{ border: 1px solid <?php if(isset($bg_color)){ echo $bg_color; } ?>;}
	form input[type="submit"]{border-color:<?php if(isset($bg_color)){ echo $bg_color; } ?>;color:<?php if(isset($bg_color)){ echo $bg_color; } ?>;}
	form input[type="submit"]:hover{background-color:<?php if(isset($bg_color)){ echo $bg_color; } ?>;color:#fff;}
	
	@media only screen and (max-width : <?php if(isset($mobi_menu_width)){ echo $mobi_menu_width; } ?>px) {
		#menu-main {
			display:none;
		}

		#header .container {
			width:97%;
		}

		.skehead-headernav .logo {
		    margin-bottom: 3px;
		    margin-top: 12px;
		    position: relative;
		}

		.skehead-headernav.skehead-headernav-shrink .logo {
            margin-top: 1px;
            top: 6px;
		}

	}
</style>

<script type="text/javascript">
jQuery(document).ready(function(){
'use strict';
	jQuery('#menu-main').sktmobilemenu({'fwidth':<?php if(isset($mobi_menu_width)){ echo $mobi_menu_width; } ?>});
});
</script> 