<div id='home_se_catalogue'>
	   <?php 
		            // Gallery Images Sweethome 1 AU  : catalogue 
		            global $post;
		            $args = array('category'=>11, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
								<div id='ke_khung_cata'>
									<div id='galylle_cata'>
											<h3><?php the_title();?></h3>
											<p>
												<?php the_content();?>
											</p>
									</div><!-- id='galylle_cata -->
									<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div><!-- id='edit_post' -->
									
								</div><!-- id='ke_khung_cata -->
							
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>

</div><!-- id='home_se_catalogue -->