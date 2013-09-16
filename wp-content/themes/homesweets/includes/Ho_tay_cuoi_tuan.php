<div id='noi_bat_index'>
	<div id='name_noi_bat'>
		 <?php
                            global $id;
                            $id = 19;  // 9 la id catalogue 
                            $category = get_the_category_by_ID($id); 
                           //var_dump($category);
                            echo $category;
                            ?>
	</div><!-- id='name_noi_bat' -->
	<div id='noi_bat_khung'>
	          <div id='noi_bat_galylle'> 
				<h3></h3>
				<p>
					<?php 
		            global $post;
		            $args = array('numberposts'=>27,'category'=>17, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
							<a class="fancybox-thumbs" data-fancybox-group="thumb" 
							href="<?php echo $cfs->get("images_gallery");?>">
								<?php the_post_thumbnail();?>
							</a>
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>
				</p>
			</div><!-- id='noi_bat_galylle -->
        
		
		<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
		
	</div><!-- id='noi_bat_khung -->

	<?php // khung da ta thu 2 ?>
	<div id='noi_bat_khung'>
		<div id='noi_bat_galylle'>
				<h3></h3>
				<p>
					<?php 
		            global $post;
		            $args = array('numberposts'=>27,'category'=>16, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
							<a class="fancybox-thumbs" data-fancybox-group="thumb" 
							href="<?php echo $cfs->get("images_gallery");?>">
								<?php the_post_thumbnail();?>
							</a>
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>
				</p>
			</div><!-- id='noi_bat_galylle -->
			
			<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
	</div><!-- id='noi_bat_khung -->

	<?php // khung da ta thu 3 ?>
	<div id='noi_bat_khung'>
		<div id='noi_bat_galylle'>
				<h3></h3>
				<p>
					<?php 
		            global $post;
		            $args = array('numberposts'=>27,'category'=>17, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
							<a class="fancybox-thumbs" data-fancybox-group="thumb" 
							href="<?php echo $cfs->get("images_gallery");?>">
								<?php the_post_thumbnail();?>
							</a>
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>
				</p>
		</div><!-- id='noi_bat_galylle -->
		
		<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
	</div><!-- id='noi_bat_khung -->

</div><!-- id='noi_bat_index -->

<div id='mo_ta_catalogue'>
			<p>
				 <?php
                            global $id;
                            $id = 19;  // 9 la id catalogue 
                            $category_decripts = category_description($id); 
                            // var_dump( $category_decripts );
                            echo  $category_decripts ;
                            ?>
			</p>
</div><!-- id='mo_ta_catalogue -->