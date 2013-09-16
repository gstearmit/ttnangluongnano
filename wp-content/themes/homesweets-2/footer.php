</div><!-- id="page-wrap" -->
	 <div id="footer">
    	<?php 
		            global $post;
		            $args = array('numberposts'=>1,'category'=>20, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
					<?php  the_content()?>
					<ul id='post_footer' ><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></ul><!-- 'edit_post' -->
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>
	
    </div><!-- id="footer" -->

   


	  

	<!-- </div><!-- end #container -->
	<?php get_template_part('includes/scripts'); ?>
	<?php wp_footer(); ?>

</body>
</html>