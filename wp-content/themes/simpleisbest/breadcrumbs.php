<ul class="simpleisbest_breadcrumbs">
<a href="<?php echo esc_url(home_url()); ?>"><li class="simpleisbest_breadcrumbsHome"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-home.svg"><?php esc_html_e('HOME','simpleisbest'); ?>&nbsp;&gt;&nbsp;</li></a>
<?php
  $simpleisbest_postId = $post->ID;
  $simpleisbest_parent_post_array = array_reverse(get_post_ancestors($post));
  if(simpleisbest_breadcrumbs()):
?>
<?php foreach($simpleisbest_parent_post_array as $simpleisbest_parents_post_Id): ?>
<li><a href="<?php the_permalink($simpleisbest_parents_post_Id); ?>"><?php echo esc_html(get_the_title($simpleisbest_parents_post_Id)); ?></a>&nbsp;&gt;&nbsp;</li>
  <?php endforeach; ?>
    <?php
    //Breadcrumbs Title
      $simpleisbest_bc_title = get_the_title($simpleisbest_postId);  
      if($simpleisbest_bc_title){
        if(mb_strlen($simpleisbest_bc_title,'UTF-8')>30){
          $simpleisbest_bc_title_cut = mb_substr($simpleisbest_bc_title,0,30,'UTF-8');
          echo esc_html($simpleisbest_bc_title_cut.'...');
        }else{
          echo esc_html($simpleisbest_bc_title);
        }
      }else{
        esc_html_e("Untitled","simpleisbest");
      }
    ?>
  <?php else: ?>
<li><?php
    //Breadcrumbs Title
      $simpleisbest_bc_title = get_the_title($simpleisbest_postId);  
      if($simpleisbest_bc_title){
        if(mb_strlen($simpleisbest_bc_title,'UTF-8')>30){
          $simpleisbest_bc_title_cut = mb_substr($simpleisbest_bc_title,0,30,'UTF-8');
          echo esc_html($simpleisbest_bc_title_cut.'...');
        }else{
          echo esc_html($simpleisbest_bc_title);
        }
      }else{
        esc_html_e("Untitled","simpleisbest");
      }
    ?></li>
  <?php endif; ?>
</ul><!--end of breadcrumbs-->