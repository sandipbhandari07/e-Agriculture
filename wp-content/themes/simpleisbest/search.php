<!--Search Result Page-->
<?php get_header(); ?>
<h1 id="simpleisbest_page_title"><span><?php esc_html_e("search results","simpleisbest");//Page Title?></span></h1>
<div id="<?php 
		if(get_theme_mod('simpleisbest_option_column')){
			echo esc_attr(get_theme_mod('simpleisbest_option_column'));
		}else{
			echo esc_attr('simpleisbest_two-col');
		} 
	?>" class="simpleisbest_container simpleisbest_result_page">
<div class="simpleisbest_content">
<div class="simpleisbest_block">
<?php if (have_posts()): ?>
<p><?php
  if (isset($_GET['s']) && empty($_GET['s'])){
    esc_html_e("No search keyword entered","simpleisbest");
  } else {
    echo esc_html("'".$_GET['s']."'");
    esc_html_e("search results","simpleisbest");
    echo esc_html($wp_query->found_posts);
    esc_html_e("Case","simpleisbest");
  }
?></p>
<ul>
<?php while(have_posts()): the_post(); ?>
<li class="simpleisbest_one_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>
<?php else: ?>
<p><?php esc_html_e("There were no articles matching the searched keywords","simpleisbest"); ?></p>
<?php endif; ?>
</div><!--end of sib_block-->
</div><!--end of sib_content-->
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
</div><!--end of sib_container-->
<?php get_footer(); ?>