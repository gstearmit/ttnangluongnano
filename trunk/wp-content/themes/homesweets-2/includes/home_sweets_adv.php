 <div id='home_adv'>

         <?php 
            global $post;
            $args = array('numberposts'=>27,'category'=>8, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
            
             <div id='right_adv'>
                <div id='img_adv'>
                    <?php  the_post_thumbnail(array(207,73));?>
                </div><!-- img_adv -->
                <div id='title_name'>
                    <?php the_title();?>
                </div><!-- title_name -->
                <div id='the_conted_adv'>
                    <?php the_content();?>
                </div><!-- id='the_conted_adv' -->
                <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
             </div><!-- right_adv -->
                
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?>
</div><!-- id='home_adv'-->
