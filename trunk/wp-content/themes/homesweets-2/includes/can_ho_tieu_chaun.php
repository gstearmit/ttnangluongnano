<div id='can_ho_tieu_chuan'>
                        <div id='tit_name_can_ho_tieu_chuans'>
                            <!-- đặt hàng thực phẩm trực tuyến từ sweethome-->
                            <?php
                            global $id;
                            $id = 14;  // 9 la id catalogue 
                            $category = get_the_category_by_ID($id); 
                           // var_dump($category);
                            echo $category;
                            ?>
                        </div><!-- id='can_ho_tieu_chuan' -->
                         
         <?php 
            global $post;
            $args = array('category'=>14, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
             <div id='post_name'>
                    <?php the_content()?>
                    <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
            </div><!--id='post_name' -->   
                
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?>
</div><!-- can ho tieu chuan -->
