<style>
/*Using Theme Options Style****************/
<?php 
	if(get_theme_mod('simpleisbest_option_color')){
		$simpleisbest_get_color = get_theme_mod('simpleisbest_option_color');
	}else{
		$simpleisbest_get_color = "#333";
	}
?>
/*color*/
h1,h2,h3,h4,h5,h6,p,a,.single p a{
	color:#333;
}
#simpleisbest_mobileMenu a,.post-categories a,.cat-data a,.single .simpleisbest_prev span,.single .simpleisbest_next span{
	color:white;
}
#simpleisbest_hdrInfo div,body:not(.home) h1,.current-menu-item a,.single p a,.simpleisbest_paging .simpleisbest_prev a,.simpleisbest_paging .simpleisbest_next a,.simpleisbest_paging .simpleisbest_next,.simpleisbest_paging .simpleisbest_prev,#simpleisbest_fMenu li:before,#simpleisbest_comments_block .logged-in-as a,#simpleisbest_comments_block .comment-edit-link{
	color:<?php echo esc_html($simpleisbest_get_color); ?>;
}
/*background*/
h1,h2,h3,h4,h5,h6,a,.simpleisbest_copySec small{
	background:transparent;
}
body,th,td,.single .simpleisbest_content,#simpleisbest_sidebar{
	background:white;
}
#simpleisbest_mBtn span,.post-categories a,#simpleisbest_sidebar h4,.cat-data,.single .simpleisbest_prev span,.single .simpleisbest_next span,#simpleisbest_top_area,.simpleisbest_copySec,.page-numbers.current{
	background:<?php echo esc_html($simpleisbest_get_color); ?>;
}
#simpleisbest_mobileMenu,#simpleisbest_pcMenu .sub-menu,.simpleisbest_one_post.sticky{
	background:<?php echo esc_html($simpleisbest_get_color); ?> !important;
	opacity:0.8;
}
/*svg icon*/
.simpleisbest_one_post path,.simpleisbest_pagetop path{
	fill:<?php echo esc_html($simpleisbest_get_color); ?> !important;
}
/*border-bottom*/
.simpleisbest_postContents h2,.simpleisbest_one_post{
	border-bottom:solid 1px <?php echo esc_html($simpleisbest_get_color); ?>;
}
/*border-left*/
.single h3{
	border-left:solid 3px <?php echo esc_html($simpleisbest_get_color); ?> !important;
}
/*Keyboard-Navigation*/
a:focus,button:focus{
	color:<?php echo esc_html($simpleisbest_get_color); ?> !important;
	outline:solid 1px <?php echo esc_html($simpleisbest_get_color); ?>;
}
/*Footer Menu ICON*/
#simpleisbest_fMenu li a:before,#simpleisbest_sidebar .widget_archive a:before,#simpleisbest_pcMenu .sub-menu li a:before,#simpleisbest_mobileMenu a::before,.simpleisbest_result_page .simpleisbest_one_post a:before{
	content:url(<?php echo esc_url(get_template_directory_uri());?>/images/arrow-right-fill.svg);
	width:5px;
	height:5px;
	position:absolute;
	top:0;
	left:-15px;	
}
#simpleisbest_pcMenu .sub-menu li a:before,#simpleisbest_mobileMenu a::before{
	content:url(<?php echo esc_url(get_template_directory_uri());?>/images/arrow-right-fill-wh.svg) !important;
}
#simpleisbest_sidebar .widget_archive a:before{
	left:0;
}
/*Loading ICON*/
#simpleisbest_loader svg{
	stroke:<?php echo esc_html($simpleisbest_get_color); ?> !important;
}
/*Page Title Background*/
body:not(.home) #simpleisbest_page_title,#simpleisbest_top_area{
	margin:0 !important;
	margin-bottom:15px !important;
	padding:120px 0 !important;
<?php if(get_header_image()): ?>
	background:url(<?php header_image();?>) no-repeat center;
<?php else: ?>
	background:#999;
<?php endif; ?>
	background-size:cover;
	color:white !important;
	font-weight:bold !important;
	font-size:24px !important;
	letter-spacing:.2em;
	position:relative;
	z-index:0;
}
body:not(.home) #simpleisbest_page_title:before,#simpleisbest_top_area:before{
	content:"";
	width:100%;
	height:100%;
	background:rgba(0,0,0,0.5);
	position:absolute;
	top:0;
	left:0;
	z-index:-1;
}
body:not(.home) #simpleisbest_page_title span{
	width:1200px;
	display:inline-block;
	margin:0 auto;
}
body:not(.home).single h1{
	background:transparent !important;
	padding:0 !important;
	font-size:24px !important;
	font-weight:400 !important;
	color:#333 !important;
	letter-spacing:.2em;
}
body:not(.home).single h1:before{
	display:none;
}
@media only screen and (max-width:1200px){
	body:not(.home) #simpleisbest_page_title span{
		width:100%;
	}
}
@media only screen and (max-width:600px){
	body:not(.home) #simpleisbest_page_title,#simpleisbest_top_area{
		padding:30px 0 !important;
		font-size:16px !important;
	}
}
/*Header Layout Style*****************************************/
<?php if(get_theme_mod('simpleisbest_option_header')): ?>
<?php $simpleisbest_header = get_theme_mod('simpleisbest_option_header'); if($simpleisbest_header == 'simpleisbest_header2'): ?>
	<?php if(is_home() || is_front_page()): ?>
	#simpleisbest_hdrTitBg{
		position:absolute;
		top:0;
		left:0;
		border-bottom:none !important;
	}
	#simpleisbest_hdrMenu{
		right:0 !important;
	}
	#simpleisbest_hdr-txt,#simpleisbest_hdrMenu a{
		color:white !important;
	}
	<?php endif; ?>
<?php endif; ?>
<?php $simpleisbest_header = get_theme_mod('simpleisbest_option_header'); if($simpleisbest_header == 'simpleisbest_header3'): ?>
	<?php if(is_home() || is_front_page()): ?>
	#simpleisbest_hdrTitBg{
		position:absolute;
		top:0;
		left:0;
		border-bottom:none !important;
	}
	#simpleisbest_hdrCont{
		background:white;
		padding-right:0 !important;
	}
	#simpleisbest_hdrMenu{
		right:0 !important;
	}
	<?php endif; ?>
<?php endif; ?>
<?php endif; //if(get_theme_mod('sib_option_header'))?>
/*Footer Layout Style**************************************************/
<?php if(get_theme_mod('simpleisbest_option_footer')): ?>
<?php $simpleisbest_footer = get_theme_mod('simpleisbest_option_footer'); if($simpleisbest_footer == "simpleisbest_footer2"): //footer2 ?>
#simpleisbest_fCont.simpleisbest_flex{
display:block;
}
#simpleisbest_fMenu,#simpleisbest_fTitArea{
	width:100% !important;
}
#simpleisbest_fMenu ul.menu{
	display:flex;
	flex-wrap:wrap;
	flex-direction:row;
	height:auto;
}
#simpleisbest_fMenu li{
	margin:5px auto;
	flex-basis:20%;
}
#simpleisbest_fMenu li:before{
	display:none;
}
#simpleisbest_fTitArea{
	border-left:none !important;
	text-align:center;
}
#simpleisbest_fTitArea p{
	text-align:center !important;
}
@media only screen and (max-width:900px){
	#simpleisbest_fMenu li{
		flex-basis:32%;
	}
}
@media only screen and (max-width:600px){
	#simpleisbest_fTitArea p{
		text-align:left !important;
	}
	#simpleisbest_fMenu ul.menu{
		display:block;
	}
	#simpleisbest_fMenu li{
		display:block !important;
		padding-bottom:5px;
		margin-bottom:10px;
		margin-left:0px;
		flex-basis:100%;
		text-align:left;
		border:none;
	}
	#simpleisbest_fMenu li:before{
		display:block;
	}
}
<?php endif; ?>
<?php endif; //if(get_theme_mod('sib_option_footer'))?>
</style>