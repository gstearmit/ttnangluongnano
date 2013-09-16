<div id="page-info">
    <div id="featured">
    <!-- 
        <div id="accordion">
            <dl class="easy-accordion">
        <?php 
       //   is_numeric(get_option('origin-num-slides')) ? $num_slides = get_option('origin-num-slides') : $num_slides = 5;
            global $post;
       //   $args = array('numberposts'=>$num_slides, 'category'=>5);
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
            <dt><?php the_title(); ?></dt>
                <dd>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                    <p><?php the_post_thumbnail();
                    //the_post_thumbnail( array(313,215) ); ?>
                    <?php the_excerpt(); ?></p>
                </dd>
            <?php endforeach; wp_reset_postdata();?>
                
            </dl>
        </div><!--end accordion-->
   <!-- </div><!--end featrued-->
   <!-- <div id="facebook">
        <?php    //            echo get_option('origin-facebook'); ?>
        </div>  
    -->    

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
                
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?>
    </div><!-- id='gioithieu' -->




</div><!--end page-info-->