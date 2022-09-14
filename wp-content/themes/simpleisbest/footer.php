<!--Button of the Return To Top-->
<p id="simpleisbest_topBtn" class="simpleisbest_pagetop">
<!--start ICON-->
<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 4.2333332 4.2333335">
  <g id="layer1" transform="translate(0,-292.76665)">
    <path style="fill:#333333;fill-opacity:1;fill-rule:evenodd;stroke-width:0.26458332" d="m 0.72657063,292.88964 c -0.31409822,0 -0.56689048,0.25279 -0.56689048,0.56689 v 2.88199 c 0,0.3141 0.25279226,0.5669 0.56689048,0.5669 H 3.6085652 c 0.3140983,0 0.5674072,-0.2528 0.5674072,-0.5669 v -2.88199 c 0,-0.3141 -0.2533089,-0.56689 -0.5674072,-0.56689 z m 1.44125557,0.86196 1.3229166,1.91358 H 0.84490965 Z"/>
  </g>
</svg>
<!--end ICON-->
</p><!--end pagetop-->
</div><!--end of the MainArea-->
<footer>
<!--Start Footer Contents-->
<div id="simpleisbest_fCont" class="simpleisbest_flex">
<!--Footer Menu-->
<div id="simpleisbest_fMenu"><?php wp_nav_menu(array('theme_location' => 'footer-nav','container' => 'nav')); ?></div><!--end of fMenu-->
<!--Start Footer Site Title-->
<div id="simpleisbest_fTitArea">
<?php if(has_custom_logo()): ?>
	<?php the_custom_logo(); ?>
<?php else: ?>
	<a href="<?php echo esc_url(home_url()); ?>"><span style="font-size:16px;"><?php bloginfo("name"); ?></span></a>
<?php endif; ?>
<!--End Fooer Site Title-->
<?php if(get_theme_mod('simpleisbest_option_tel') || get_theme_mod('simpleisbest_option_fax') || get_theme_mod('simpleisbest_option_mail') || get_theme_mod('simpleisbest_option_adrs') ): ?>
<div id="simpleisbest_fInfo">
	<?php if(get_theme_mod('simpleisbest_option_tel')): ?>
		<p><span>
		<!--start ICON--><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-tel.svg"><!--end ICON-->
		<?php esc_html_e('TEL','simpleisbest'); ?></span>:<?php echo esc_html(get_theme_mod('simpleisbest_option_tel')); ?></p>
	<?php endif; ?>
	<?php if(get_theme_mod('simpleisbest_option_fax')): ?>
		<p><span>
		<!--start ICON--><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-fax.svg"><!--end ICON-->
		<?php esc_html_e('FAX','simpleisbest'); ?></span>:<?php echo esc_html(get_theme_mod('simpleisbest_option_fax')); ?></p>
	<?php endif; ?>
	<?php if(get_theme_mod('simpleisbest_option_mail')): ?>
		<p><span>
		<!--start ICON--><img src="<?php echo esc_url(get_template_directory_uri());?>/images/icon-mail.svg"><!--end ICON-->
		<?php esc_html_e('Email','simpleisbest'); ?></span>:<?php echo esc_html(get_theme_mod('simpleisbest_option_mail')); ?></p>
	<?php endif; ?>
	<?php if(get_theme_mod('simpleisbest_option_adrs')): ?>	
		<p><span>
		<!--start ICON--><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-adrs.svg"><!--end ICON-->
		<?php esc_html_e('ADDRESS','simpleisbest'); ?></span>:<?php echo esc_html(get_theme_mod('simpleisbest_option_adrs')); ?></p>
	<?php endif; ?>
</div><!--end of fInfo-->
<?php endif; //(isset($echo_tel) || isset($echo_fax) || isset($echo_mail) || isset($echo_adrs))?>
</div><!--end of fTitArea-->
</div><!--end of fCont-->
<!--End Of Footer Contents-->
<!--Start Copyright-->
<?php //Copyright Start Year 
$simpleisbest_c_args = array('sort_order' => 'ASC','sort_column' => 'post_date','hierarchical' => 0,'post_type' => 'page','post_status' => 'publish',); 
$simpleisbest_c_pages = get_pages($simpleisbest_c_args); 
$simpleisbest_c_year = mb_substr($simpleisbest_c_pages[0]->post_date,0,4,"UTF-8");
?>
<div class="simpleisbest_copySec">
		<small>&copy;&nbsp;<?php echo esc_html($simpleisbest_c_year); ?>-<?php echo esc_html(date('Y')); ?>&nbsp;<?php bloginfo("name"); ?></small>
</div><!--end of copySec-->
</footer>
<?php wp_footer(); ?><!--System & Plugins-->
</body>
</html>