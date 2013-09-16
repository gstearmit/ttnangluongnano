<?php 
/* 
Template Name: Theme page Sweet Home 1 AU CO
Comment : ( các trang chính hiển thị)
*/
?>
<?php get_header(); ?>

			<?php //get_template_part('includes/breadcrumbs'); ?>
			<?php //get_template_part('includes/top_info'); ?>
<?php 
/*
			<div id="content" class="clearfix fullwidth">
				<div id="left-area">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="entry post clearfix">							
						<?php if (get_option('chameleon_page_thumbnails') == 'on') { ?>
							<?php 
								$thumb = '';
								$width = 186;
								$height = 186;
								$classtext = 'post-thumb';
								$titletext = get_the_title();
								$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Entry');
								$thumb = $thumbnail["thumb"];
							?>
							
							<?php if($thumb <> '') { ?>
								<div class="post-thumbnail">
									<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
									<span class="post-overlay"></span>
								</div> 	<!-- end .post-thumbnail -->
							<?php } ?>
						<?php } ?>
						
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Trang','Chameleon').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php edit_post_link(esc_html__('Edit this page','Chameleon')); ?>			
					</div> <!-- end .entry -->
								
					<?php if (get_option('chameleon_show_pagescomments') == 'on') comments_template('', true); ?>
				<?php endwhile; endif; ?>
				</div> 	<!-- end #left-area -->
			</div> <!-- end #content -->

	*/
	?>
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
             			<a href="<?php the_permalink();?>"><?php  the_content();?>	</a>
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
			                   		<?php the_content();?>
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
					
