<?php get_header();?>
<div id='page-info-wapper'>
		<?php get_sidebar(); ?>
		<?php get_sidebar('second'); ?>
		<div id="main-content">
			
			<div id='cac_can_ho'>
			    <div class="post">
			        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
						
						<h3><?php the_title(); ?></h3>
						
						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

						<div class="entry">
							
							<?php the_content(); ?>

							<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
							
							<?php the_tags( 'Tags: ', ', ', ''); ?>

						</div>
						
						<?php edit_post_link('Chỉnh Sửa','','.'); ?>
						
					</div>

				<?php endwhile; endif; ?>
		    </div><!--end post-->


		    <ul>  
    			   <?php wp_get_archives('type=postbypost&limit=20'); ?>
    		</ul> 

			
				<div class="widget">
		            <h2>Danh Mục Menu</h2>
		            <?php wp_nav_menu(array('menu'=>'Categories Menu', 'container'=>'')); ?>
		        </div>


		        

		    <?php comments_template(); ?>
		</div><!-- id='cac_can_ho' -->
		    
		</div><!--end main-content-->
	</div><!-- id='page-info-wapper' -->
		<?php get_footer(); ?>
</div><!-- id="page-wrap" -->

