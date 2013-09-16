<?php get_header();?>
<div id='page-info-wapper'>
        <?php get_sidebar(); ?>
        <?php get_sidebar('second'); ?>
        <div id="main-content">
            <div class="post">
                    <h3>Kết quả tìm kiếm :</h3>    
                    <?php if(have_posts()) :  while(have_posts()) : the_post(); ?> 
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php the_excerpt(); ?>
                        <p class="meta-data">By: <strong><?php the_author(); ?></strong> | On: <?php the_time('F j, Y'); ?></p>               
                <?php endwhile; else : ?>
        			<h3> Không Thể tìm Thấy phần bạn muốn tìm!</h3>
                    <h4>Vui Lòng Tìm kiếm lại với một lựa chọn khác.</h4>
        		</div>

        	<?php endif; ?>
            </div><!--end post-->
        </div><!--end main-content-->
   </div><!-- id='page-info-wapper' -->     
        <?php get_footer(); ?>
</div><!-- id="page-wrap" -->

