<div id='thi_truong_dia_phuong_buoi_sang'>
                        <div id='tit_name_thi_truong_dia_phuong_buoi_sangs'>
                            <!-- đặt hàng thực phẩm trực tuyến từ sweethome-->
                            <?php
                            global $id;
                            $id = 18;  // 9 la id catalogue 
                            $category = get_the_category_by_ID($id); 
                           //var_dump($category);
                            echo $category;
                            ?>
                        </div><!-- id='thi_truong_dia_phuong_buoi_sang' -->
                         
         <?php 
            global $post;
            $args = array('numberposts'=>100,'category'=>18, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
             <div id='post_thi_truong_dia_phuong_buoi_sang'>
             	 <div id='images_thi_truong'>
             	 	<a href='<?php the_permalink(); ?>'><?php the_post_thumbnail(array(182,128));?></a>
             	 </div><!-- images_thi_truong -->
                 <div id='contend_thi_truong'>
                 	<a href='<?php the_permalink(); ?>'> 
                 		<?php the_content()?>
                    </a>
                 </div><!-- contend_thi_truong -->
                 <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
             </div><!--id='post_name' -->   
                
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?>
</div><!-- can ho tieu chuan -->
