 <div id="footer">
    	<?php 
		            global $post;
		            $args = array('numberposts'=>1,'category'=>20, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
					<?php  the_content()?>
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>
	
    </div><!-- id="footer" -->

    <?php wp_footer(); ?>
	
</body>
</html>


