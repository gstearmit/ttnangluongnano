<?php 
/* 
Template Name: Theme page vitr-location-SweetHome 3- TO NGOC VAN
Comment : page-them-chitet-cac-page-can-ho-201-602
*/
?>

<?php get_header(); ?>
<div id='page-info-wapper'>
		<?php get_sidebar(); ?>
		<?php get_sidebar('second'); ?>
		<div id="main-content">
		<?php get_template_part('includes/breadcrumbs'); ?>
		<?php //get_template_part('includes/top_info'); ?>

		<div id="content" class="clearfix">
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div id="left-area">							
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
						
						<div id='page_edit_link'>
							<?php edit_post_link(esc_html__('Chỉnh Sửa page','Chameleon')); ?>
						</div><!-- id='page_edit_link' -->			
					
								
					<?php if (get_option('chameleon_show_pagescomments') == 'on') comments_template('', true); ?>
				<?php endwhile; endif; ?>
			
			</div> 	<!-- end #left-area -->

			
		</div> <!-- end #content -->	
		</div><!--end main-content-->
	</div><!-- id='page-info-wapper' -->

	<div id='noi_dung_cont_chitiet'>
		<?php 
		/*
            global $post;
            $args = array('numberposts'=>1,'category'=>26, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
             
                    <?php the_content();?>
                <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
               
                
        <?php
            endforeach;
            wp_reset_postdata();
            */
         ?>
         <iframe width="900" height="253" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=vi&amp;q=52+T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;aq=&amp;sll=21.068703,105.822952&amp;sspn=0.012314,0.01796&amp;ie=UTF8&amp;geocode=FSp7QQEdC75OBg&amp;split=0&amp;hq=&amp;hnear=52+T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;t=m&amp;ll=21.080656,105.828466&amp;spn=0.020262,0.077162&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://www.google.com/maps?f=q&amp;source=embed&amp;hl=vi&amp;q=52+T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;aq=&amp;sll=21.068703,105.822952&amp;sspn=0.012314,0.01796&amp;ie=UTF8&amp;geocode=FSp7QQEdC75OBg&amp;split=0&amp;hq=&amp;hnear=52+T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;t=m&amp;ll=21.080656,105.828466&amp;spn=0.020262,0.077162&amp;z=14" style="color:#0000FF;text-align:left">Xem Bản đồ cỡ lớn hơn</a></small>
	</div> <!-- id='noi_dung_cont_chitiet' -->

<?php get_footer(); ?>
	</div><!-- id="page-wrap" -->