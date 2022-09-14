<!--Single Page-->
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
<?php if(have_posts()): the_post(); ?>
<article <?php post_class('article-content'); ?>>
<!--Start Breadcrumbs-->
<?php
	$simpleisbest_parent_category = get_the_category();
	if($simpleisbest_parent_category[0]){
		$simpleisbest_parent_category_url = get_category_link($simpleisbest_parent_category[0]->term_id);
		$simpleisbest_parent_category_name = $simpleisbest_parent_category[0]->cat_name;
	}
?>
<ul class="simpleisbest_breadcrumbs">
<li class="simpleisbest_breadcrumbsHome"><a href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-home.svg"><?php esc_html_e('HOME','simpleisbest'); ?></a>&nbsp;&gt;&nbsp;</li>
<li><a href="<?php echo esc_url($simpleisbest_parent_category_url); ?>"><?php echo esc_html($simpleisbest_parent_category_name); ?></a>&nbsp;&gt;&nbsp;</li>
<li><?php
		$simpleisbest_bc_title = get_the_title();
		if($simpleisbest_bc_title){
			if(mb_strlen($simpleisbest_bc_title,'UTF-8')>30){
				$simpleisbest_bc_title_cut = mb_substr($simpleisbest_bc_title,0,30,'UTF-8');
				echo esc_html($simpleisbest_bc_title_cut . '...');
			}else{
				echo esc_html($simpleisbest_bc_title);
			}
		}else{
			esc_html_e("Untitled","simpleisbest");
		}
?></li>
</ul>
<!--End OF Breadcrumbs---------->
<div id="simpleisbest_postTitArea">
<!--Show Categories & Tags-->
<?php if(has_category() ): ?>
	<?php the_category(); ?>
<?php endif; ?>
<?php if(has_tag()):?>
	<div id="simpleisbest_post_tags"><?php the_tags(); ?></div>
<?php endif; ?>
<!--Show Page Title-->
<h1 id="simpleisbest_post_title"><?php
$simpleisbest_get_title = get_the_title();
if($simpleisbest_get_title !== ""){ 
	the_title();
}else{
	esc_html_e("Untitled","simpleisbest");
}
?></h1>
<!--Show Published Date-->
<p><?php esc_html_e("Posted date","simpleisbest"); ?>:<time datetime="<?php the_time('Y-m-d'); ?>" itemprop="datePublished"><?php the_time('Y-m-d'); ?></time></p>
</div><!--end of postTitArea-->
<br>
<?php if(the_post_thumbnail()): ?>
<div id="simpleisbest_thumbnail"><?php the_post_thumbnail(); ?></div>
<?php endif; ?>
<?php the_content();//Show Post Contents ?>
<?php wp_link_pages('before=<div id="simpleisbest_link_pages">&after=</div>'); //Show Pagenation ?>
</article>
<?php endif; ?>
<?php comments_template(); //Show Comments?>
<!--Start Pager-------------------------------------------------------------------->
<div class="simpleisbest_paging">
<?php if($simpleisbest_prevPost = get_previous_post()){; ?>
<!--Preview Post-->
<div class="prev"><a href="<?php the_permalink($simpleisbest_prevPost->ID); ?>"><span>
<!--start ICON-->
<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 4.2333332 4.2333335">
<g id="layer1" transform="translate(0,-292.76665)">
<path style="fill:#333333;fill-opacity:1;fill-rule:evenodd;stroke-width:1" d="m 3.6120348,293.24454 v 0.44942 l -2.1984524,1.26919 2.1984524,1.26943 v 0.45867 l -2.985126,-1.72348 z"/>
</g>
</svg>
<!--end ICON-->
<?php esc_html_e('PREV','simpleisbest'); ?></span><div class="simpleisbest_box">
<p><?php
	$simpleisbest_postTitle = get_the_title($simpleisbest_prevPost->ID);
	if($simpleisbest_postTitle !== "" ){
		if(mb_strlen($simpleisbest_postTitle)>30){
			$simpleisbest_title= mb_substr($simpleisbest_postTitle,0,30) ;
			echo esc_html($simpleisbest_title . '...');
		}else{
			echo esc_html($simpleisbest_postTitle);
		}
	}else{
		esc_html_e("Untitled","simpleisbest");
	}
?></p>
</div></a></div>
<?php }; ?>
<?php if ($simpleisbest_nextPost = get_next_post()):?>
<!--Next Post-->
<div class="next"><a href="<?php the_permalink($simpleisbest_nextPost->ID); ?>"><span><?php esc_html_e('NEXT','simpleisbest'); ?>
<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 4.2333332 4.2333335">
<g id="layer1" transform="translate(0,-292.76665)">
<path style="fill:#333333;fill-opacity:1;fill-rule:evenodd;stroke-width:1" d="m 0.6269088,293.24454 v 0.44942 l 2.1984524,1.26919 -2.1984524,1.26943 v 0.45867 l 2.985126,-1.72348 z"/>
</g>
</svg>
</span><div class="simpleisbest_box" style="flex-direction:row-reverse;">
<p><?php
	$simpleisbest_postTitle = get_the_title($simpleisbest_nextPost->ID);
	if($simpleisbest_postTitle !== "" ){
		if(mb_strlen($simpleisbest_postTitle)>30){
			$simpleisbest_title= mb_substr($simpleisbest_postTitle,0,30) ;
			echo esc_html($simpleisbest_title . '...');
		}else{
			echo esc_html($simpleisbest_postTitle);
		}
	}else{
		esc_html_e("Untitled","simpleisbest");
	}
?></p>
</div></a></div>
<?php endif; ?>
</div><!--end of paging-->
<!--End Of Pager-------------->
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

