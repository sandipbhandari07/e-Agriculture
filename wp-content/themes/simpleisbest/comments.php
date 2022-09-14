<?php if(comments_open())://Comments Active ?>
    <div id="simpleisbest_comments_block">
        <h3><?php esc_html_e("Comment","simpleisbest"); ?></h3>
        <?php if(have_comments()): ?>
            <ul id="simpleisbest_comments_list">
                <?php wp_list_comments();//Show Comments ?>
            </ul>
            <div id="simpleisbest_comments_pager">
                <?php the_comments_pagination();//Pagenation in the Comments ?>
            </div><!--end of sib_comments_pager-->
        <?php endif; ?>
        <?php comment_form();//Show Comment Form ?>
    </div><!--end of sib_comments_block-->
<?php endif; ?>