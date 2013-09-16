<?php get_header();?>
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
             			<?php the_title(); ?>
             		</div> <!-- id='name_info -->
             		<div id='contend_info'>
             			<?php  the_content();?>
             		</div> <!-- id='contend_info -->
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
		                    <?php the_title();?>
		                </div><!-- name_can_ho -->
		                <div id='text_can_ho'>
		                	<div id='img_can_ho'>
		                    <?php  the_post_thumbnail(array(184,126));?>
			                </div><!-- img_can_ho -->
			                <div id='the_conted_can_ho'>
			                    <?php the_content();?>
			                </div><!-- id='the_conted_can_ho' -->
		                </div> <!-- id='text_can_ho' -->
		                
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

