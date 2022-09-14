<?php
/*
*/
?>
<!--Page Template-->
<?php get_header(); ?>
<!--start page title-->
<?php wp_reset_query(); if(!is_home() && !is_front_page()): ?>
<h1 id="simpleisbest_page_title"><span>
<?php
	$simpleisbest_get_title = get_the_title();
	if($simpleisbest_get_title !== ""){
		the_title();
	}else{
		esc_html_e("Untitled","simpleisbest");
	}
?>
</span></h1><!--end page title-->
<?php endif; ?>
<div id="<?php 
		if(get_theme_mod('simpleisbest_option_column')){
			echo esc_attr(get_theme_mod('simpleisbest_option_column'));
		}else{
			echo esc_attr('simpleisbest_two-col');
		} 
	?>" class="simpleisbest_container">
  <div class="simpleisbest_content">
    <div class="simpleisbest_block">
<?php if(have_posts()): the_post(); ?>
<article <?php post_class( 'article-content' ); ?>>
  <?php //Breadcrumbs
    wp_reset_query();
    if(!is_home() && !is_front_page()){
      get_template_part('breadcrumbs');
    }
  ?><!--end of breadcrumbs-->
<?php the_content();//Show Page Contents ?>
</article>
<?php endif; ?>
<?php comments_template(); //Show Comments?>
</div><!--end of block-->
</div><!--end of contents-->
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
</div><!--sib_container-->
<?php get_footer(); ?>