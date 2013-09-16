
    <div id="featured">
      <div id='gioithieu'>
         <?php //cach thuc an toan nhat de tao mot loop rieng biet hoac nhieu loop tren mot trang
            global $post;
            $args = array('numberposts'=>1, 'category'=>6, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
                    <div id='git_giotthieu'>
                        <div id='name_gt'>
                            <a href="<?php the_permalink(); ?>"><?php the_title();?></a>
                        </div>
                        <div id='so_dt'>
                            <?php echo $cfs->get('so_dt');?>
                        </div>
                    </div>
                    <div id='contend_gt'>
                        <?php //the_excerpt();
                                the_content();
                         ?>
                    </div>
                <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?>
    
    </div><!-- id='gioithieu' -->




