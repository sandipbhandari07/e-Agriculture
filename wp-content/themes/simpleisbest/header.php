<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#simpleisbest_mainArea"><?php esc_html_e('Skip to content','simpleisbest'); ?></a>
<!--Loading Animation-->
<div id="simpleisbest_loader_bg">
<div id="simpleisbest_loader">
<svg width="100" height="100" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40"/></svg>
</div><!--end of loader-->
</div><!--end of loader_bg-->
<header>
<div id="simpleisbest_hdrTitBg"><!--Header Title Background-->
<div id="simpleisbest_hdrCont"><!--Header Title Contents-->
	<p id="simpleisbest_hdr-txt"><?php bloginfo("name"); ?></p>
		<?php
			if(is_home() || is_front_page()) {
				$simpleisbest_title_tag_start = '<h1 id="simpleisbest_hdrTit">';
				$simpleisbest_title_tag_end = '</h1>';
			} else {
				$simpleisbest_title_tag_start = '<p id="simpleisbest_hdrTit">';
				$simpleisbest_title_tag_end =  '</p>';
			}
		?>
	<!--Start Header Title Logo Image-->
	<?php echo $simpleisbest_title_tag_start; ?>
		<?php if(has_custom_logo()): ?>
			<?php the_custom_logo(); ?>
		<?php else: ?>
			<a href="<?php echo esc_url(home_url()); ?>"><span style="font-size:16px;"><?php bloginfo("name"); ?></span></a>
		<?php endif; ?>
	<?php echo $simpleisbest_title_tag_end; ?>
	<!--End Of Header Title Logo Image-->
	<!--Start Header Menu-->
	<div id="simpleisbest_hdrMenu" class="<?php //Changing Layout By Menu Items
			$simpleisbest_h_menu_locations = get_nav_menu_locations();
			$simpleisbest_h_menu_location_items = wp_get_nav_menu_items($simpleisbest_h_menu_locations['header-nav']);
			$simpleisbest_h_menu_item_count = 0;
			foreach($simpleisbest_h_menu_location_items as $simpleisbest_h_item){
				if($simpleisbest_h_item->simpleisbest_h_menu_item_parent == 0 ){
					$simpleisbest_h_menu_item_count++;
				}
			}
			if($simpleisbest_h_menu_item_count <= 5){
				echo esc_attr("simpleisbest_row1");
			}else{
				echo esc_attr("simpleisbest_row2");
			}?>">
		<?php if(has_nav_menu('header-nav')): ?>
			<div id="simpleisbest_pcMenu"><?php wp_nav_menu( array('container' => 'nav','theme_location' => 'header-nav' ) ); ?></div>
		<?php endif;//if(has_nav_menu) ?>
	</div><!--end of hdrMenu----------------->
	<!--End Of Header Menu-->
	<!--Start Mobile Menu Button---------------------------------------------->
	<div id="simpleisbest_mBtnArea">
	<button id="simpleisbest_mBtn" class="simpleisbest_mBtn">
	<span></span><span></span><span></span>
	</button><!--end of mbtn-->
	</div><!--end of mBtnArea-->
		<div id="simpleisbest_mobileMenu"><!--Start Mobile Menu-->
			<?php wp_nav_menu(array('container' => 'nav','theme_location' => 'mobile-nav')); ?>
		</div><!--End Of Mobile Menu-->
	<!--End Of Mobile Menu Button--------------------------------------------->
</div><!--end of hdrCont-->
</div><!--end of hdrTitBg------------>
</header><!--End Of Header-->
<?php if(is_home() || is_front_page()): ?>
	<div id="simpleisbest_mainVisual">
		<?php if(get_header_image()): ?>
			<div id="simpleisbest_mainVisual_image" style="background:url(<?php header_image(); ?>)center no-repeat; background-size:cover;"></div>
		<?php else: ?>
			<div id="simpleisbest_mainVisual_image" style="background:#999;"></div>
		<?php endif; ?>
	</div><!--end of mainVisual-->
<?php endif; ?>
<div id="simpleisbest_mainArea">