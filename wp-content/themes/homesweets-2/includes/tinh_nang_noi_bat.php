<div id='noi_bat_index'>
	<div id='name_noi_bat'>Tính năng nổi bật của chúng tôi quý</div><!-- id='name_noi_bat' -->
	     <?php 
	     		// Các thị trường hoa nổi tiếng nhất tại Hà Nội là gần id 15
		            global $post;
		            $args = array('numberposts'=>27,'category'=>15, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
							<div id='noi_bat_khung'>
								      <h3><?php  the_title();?></h3>
							          <div id='noi_bat_galylle'>
							          	<?php the_content();?>
									  </div><!-- id='noi_bat_galylle -->
								<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
							</div><!-- id='noi_bat_khung -->
							
				<?php
					endforeach;
					wp_reset_postdata(); 
				?> 
</div><!-- id='noi_bat_index -->