<?php get_header(); ?>
<!--Index Page-->
<div id="<?php 
		if(get_theme_mod('simpleisbest_option_column')){
			echo esc_attr(get_theme_mod('simpleisbest_option_column'));
		}else{
			echo esc_attr('simpleisbest_two-col');
		} 
	?>" class="simpleisbest_container">
<div class="simpleisbest_content">
<div id="simpleisbest_block_archive" class="simpleisbest_block">
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<?php get_template_part('loop-content'); ?><!--Show All Posts-->
	<?php endwhile; endif; ?><!--End Of Loop-->
</div><!--end of block_archive-->
<div class="simpleisbest_pager">
	<?php the_posts_pagination(
			array(
				'mid_size' => '3',
				'prev_text' => '<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 4.2333332 4.2333335">
							<g id="layer1" transform="translate(0,-292.76665)">
			  				<path style="fill:#333333;fill-opacity:1;fill-rule:evenodd;stroke-width:1" d="m 3.6120348,293.24454 v 0.44942 l -2.1984524,1.26919 2.1984524,1.26943 v 0.45867 l -2.985126,-1.72348 z"/>
							</g>
			  				</svg>',
				'next_text' => '<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 4.2333332 4.2333335">
							<g id="layer1" transform="translate(0,-292.76665)">
			  				<path style="fill:#333333;fill-opacity:1;fill-rule:evenodd;stroke-width:1" d="m 0.6269088,293.24454 v 0.44942 l 2.1984524,1.26919 -2.1984524,1.26943 v 0.45867 l 2.985126,-1.72348 z"/>
							</g>
		  					</svg>',
				)
		); ?>
</div><!--end of pager-->
</div><!--end sib_content-->
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
</div><!--end sib_container-->
<?php get_footer(); ?>

