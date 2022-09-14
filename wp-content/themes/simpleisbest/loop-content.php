<!--Show All Posts-->
<?php if(!is_paged() && !is_archive() && is_sticky())://Fixed Post ?>
	<div class="simpleisbest_one_post sticky">
<?php else:?>
	<div class="simpleisbest_one_post">
<?php endif;?>
	<span>
	<!--start ICON-->
	<svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg"  width="16" height="16" viewBox="0 0 4.2333332 4.2333335">
  	<g transform="translate(0,-292.76665)">
    <rect style="fill:#000002;fill-opacity:1;fill-rule:evenodd;stroke-width:0.21628374" id="rect4543" width="2.974345" height="2.3176363" x="13.044898" y="295.29782" rx="0" ry="0"/>
    <path style="opacity:1;fill:#000002;fill-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:0.84693873;stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;paint-order:markers fill stroke" d="M 7.9472656 0.64257812 A 7.4107145 7.4107145 0 0 0 0.53515625 8.0527344 A 7.4107145 7.4107145 0 0 0 7.9472656 15.464844 A 7.4107145 7.4107145 0 0 0 15.357422 8.0527344 A 7.4107145 7.4107145 0 0 0 7.9472656 0.64257812 z M 8.2167969 2.3535156 C 8.6338203 2.3535156 8.9874459 2.428088 9.2753906 2.578125 C 9.5732645 2.7231607 9.7207031 2.9012764 9.7207031 3.1113281 C 9.7207031 3.3213799 9.5732645 3.5003537 9.2753906 3.6503906 C 8.9874459 3.8004276 8.6338203 3.875 8.2167969 3.875 C 7.7997735 3.875 7.4424051 3.8004276 7.1445312 3.6503906 C 6.8466574 3.5003537 6.6972656 3.3213799 6.6972656 3.1113281 C 6.6972656 2.9012764 6.8429146 2.7231607 7.1308594 2.578125 C 7.4287332 2.428088 7.7898443 2.3535156 8.2167969 2.3535156 z M 8.7988281 5.9453125 L 9.453125 5.9453125 L 9.453125 11.466797 C 9.453125 11.896903 9.513663 12.185042 9.6328125 12.330078 C 9.7618912 12.470113 9.9452947 12.574514 10.183594 12.644531 C 10.431822 12.714549 10.878044 12.75 11.523438 12.75 L 11.523438 13.019531 L 4.8964844 13.019531 L 4.8964844 12.75 C 5.561736 12.75 6.0079582 12.71736 6.2363281 12.652344 C 6.4646981 12.587328 6.6443588 12.480115 6.7734375 12.330078 C 6.9124453 12.180041 6.9804687 11.891902 6.9804688 11.466797 L 6.9804688 8.8203125 C 6.9804687 8.0751289 6.9370184 7.591148 6.8476562 7.3710938 C 6.7781523 7.2110543 6.6684682 7.1010304 6.5195312 7.0410156 C 6.3705943 6.9759996 6.1663605 6.9433594 5.9082031 6.9433594 C 5.6301875 6.9433594 5.2936495 6.9816221 4.8964844 7.0566406 L 4.6875 6.7871094 L 8.7988281 5.9453125 z " transform="matrix(0.26458333,0,0,0.26458333,0,292.76665)"/>
  	</g>
	</svg>
	<!--end ICON-->
	<?php the_time('Y-m-d'); ?>
	</span>
	<?php the_category(); ?>
	<a href="<?php the_permalink(); ?>">
	<?php
		$simpleisbest_one_post_title = $post->post_title;
		if($simpleisbest_one_post_title !== "" ){
			if(mb_strlen($post->post_title,'UTF-8')>30){
				$simpleisbest_one_post_title= mb_substr($post->post_title, 0, 30, 'UTF-8');
				echo esc_html($simpleisbest_one_post_title.'……');
			}else{
				echo esc_html($post->post_title);
			}
		}else{
			esc_html_e("Untitled","simpleisbest");
		}
	?></a>
</div><!--end of one_post-->