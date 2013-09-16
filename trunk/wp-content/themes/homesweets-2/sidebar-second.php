<div id="second-sidebar">
         <div id='home_sweets_dathang'>
                        <div id='tit_name_home_sweets'>
                            <!-- đặt hàng thực phẩm trực tuyến từ sweethome-->
                            <?php
                            global $id;
                            $id = 9;  // 9 la id catalogue 
                            $category = get_the_category_by_ID($id); 
                           // var_dump($category);
                            echo $category;
                            ?>
                        </div><!-- id='tit_name_home_sweets' -->
                        
                        
         <?php 
           // đặt hàng thực phẩm trực tuyến từ sweethome
            global $post;
            $args = array('numberposts'=>1,'category'=>9, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
             <div id='khung_dathang'>
                    <div id='name_avali'>
                        <div id='images_dathang'>
                           <?php the_content();?>
                            <!-- <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div><!-- id='edit_post' -->
                         </div>
                    </div><!-- id='name_avali' -->
            </div><!--id='khung_avli' -->   
             
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?>


         <div id='khachhang_than_thiet' style='width: 208px;min-height: 100%;'>
                <div id='name_thanthiet' style='line-height: 1.3;color: #666666;font-size: 23px;font-weight: bold;text-align: center;padding-bottom: 25px;margin-bottom: 3px;border-bottom: 1px double #ddd;'>
               <!-- đặt hàng thực phẩm trực tuyến từ sweethome-->
                  <?php
                     global $id;
                     $id = 10;  // 9 la id catalogue 
                     $category = get_the_category_by_ID($id); 
                           // var_dump($category);
                     echo $category;
                            ?>
                </div><!--id='thanthiet' --> 
                <?php // cach 1 ?>
                  <!--
                    <div id='thanthiet' style='width: 208px;min-height: 100%;position: relative;float: left;' >
                        <div id='images_left_tk' >
                           <a href="<?php echo $cfs->get('link_images');?>">
                              <img src="<?php echo $cfs->get('images_tk');?>" style='width: 85px;height: 99px;'>
                            </a>
                         </div>
                    </div><!-- id='name_avali' -->
               
             <div id='thanthiet' style='width: 228px;min-height: 100%;position: relative;float: left;' >
                     <?php 
                     // cach 2 : dung shorecode
                    global $post;
                    $args = array('numberposts'=>1,'category'=>10, 'orderby'=>'rand');
                    $custom_posts = get_posts($args);
                    foreach($custom_posts as $post) : setup_postdata($post); ?> 
                            <div id='Khung_dathang'>
                                    <div id='thu_vien_anh_dathang'>
                                            <!-- <h3><?php the_title();?></h3>-->
                                     <div id='dinh_dang_anh'>
                                                <?php the_content();?>
                                     </div><!-- dinh_dang_anh -->    
                                    </div><!-- id='thu_vien_anh_dathang -->
                                    <!-- <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div><!-- id='edit_post' -->
                                    
                                </div><!-- id='Khung_dathang -->
                    <?php
                        endforeach;
                        wp_reset_postdata();

                
                     ?>
             </div><!-- id='thanthiet' -->
         </div><!-- id='khachhang_than_thiet -->

</div><!-- id='home_sweets_dathang'-->


    </div><!--end second-sidebar-->
</div><!--end content-wrap-->