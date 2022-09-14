<?php get_header(); ?>
<div id="simpleisbest_top_area"></div>
<div id="<?php 
		if(get_theme_mod('simpleisbest_option_column')){
			echo esc_attr(get_theme_mod('simpleisbest_option_column'));
		}else{
			echo esc_attr('simpleisbest_two-col');
		} 
	?>" class="simpleisbest_container">
	<div class="simpleisbest_content">
		<div class="simpleisbest_block">
			<h1 class="simpleisbest_page-title"><span><?php esc_html_e('NOT FOUND.','simpleisbest'); ?></span></h1>
	  		<p><?php esc_html_e("I'm sorry. The page you were looking for was not found.",'simpleisbest'); ?></p>
		</div><!--end of simpleisbest_block-->
	</div><!--end simpleisbest_content-->
<?php
//2 Column
if(get_theme_mod('simpleisbest_option_column')){
	$simpleisbest_col_type = get_theme_mod('simpleisbest_option_column');
	if($simpleisbest_col_type == 'simpleisbest_two-col'){
		get_sidebar();
	}
}else{
	get_sidebar();
}
?>
</div><!--end simpleisbest_container-->
<?php get_footer(); ?>


