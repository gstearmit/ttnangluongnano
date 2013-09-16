<?php 
/* 
Template Name: Theme page full
Comment : ( các trang chính hiển thị)
*/
?>
<?php get_header(); ?>

	
<div id='page-info-wapper'>
		<?php get_sidebar(); ?>
		<?php get_sidebar('second'); ?>
		<div id="main-content">
			<div id='infor_sweets_1auco'>
				<?php 
            global $post;
            $args = array('numberposts'=>2,'category'=>21, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
             	<div id='khung_info'>
             		<div id='name_info'>
             			<a href="<?php the_permalink();?>">
                            <?php the_title(); ?>
             			</a>
             		</div> <!-- id='name_info -->
             		<div id='contend_info'>
             			<a href="<?php the_permalink();?>"><?php  the_excerpt(80);?>	</a>
             		</div> <!-- id='contend_info -->
             		<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div><!-- 'edit_post' -->
             	</div><!-- khung_info -->
						                
			<?php
			endforeach;
			 wp_reset_postdata();
			 ?>
			</div> <!-- id='infor_sweets_1auco' -->

			<div id='cac_can_ho'>
				 <?php 
		            global $post;
		            $args = array('numberposts'=>27,'category'=>22, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
		            
		             <div id='khung_can_ho'>
		             	<div id='name_can_ho'>
		                    <a href="<?php the_permalink();?>">
		                    	<?php the_title();?>
		                    </a>
		                </div><!-- name_can_ho -->
		                <div id='text_can_ho'>
		                	<div id='img_can_ho'>
			                    <a href="<?php the_permalink();?>">
			                    	<?php  the_post_thumbnail(array(184,126));?>
			                    </a>
			                </div><!-- img_can_ho -->
			                <div id='the_conted_can_ho'>
			                   <a href="<?php the_permalink();?>">
			                   		<?php the_excerpt(80); ?>
			                   </a> 
			                </div><!-- id='the_conted_can_ho' -->
		                </div> <!-- id='text_can_ho' -->
		                <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
		             </div><!-- khung_can_ho-->
		                
		        <?php
		            endforeach;
		            wp_reset_postdata();
		    
		         ?>
			</div><!-- id='cac_can_ho -->
		</div><!--end main-content-->
	</div><!-- id='page-info-wapper' -->
	<?php get_footer(); ?>
</div><!-- id="page-wrap" -->
					
