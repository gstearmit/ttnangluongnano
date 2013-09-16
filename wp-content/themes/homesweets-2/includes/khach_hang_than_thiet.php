 <div id='khachhang_than_thiet' style='width: 208px;min-height: 100%;'>
             <div id='thanthiet' style='width: 228px;min-height: 100%;position: relative;float: left;' >
                            <div id='Khung_dathang'>
                                <?php 
                        global $post;
                        $args = array('numberposts'=>2,'category'=>10, 'orderby'=>'rand');
                        $custom_posts = get_posts($args);
                        foreach($custom_posts as $post) : setup_postdata($post); ?> 
                                    <div id='thu_vien_anh_dathang'>
                                            <div id='name_thanthiet' style='line-height: 1.3;color: #666666;font-size: 23px;font-weight: bold;text-align: center;padding-bottom: 25px;margin-bottom: 3px;border-bottom: 1px double #ddd;'>
                                                <?php the_title();?>
                                            </div><!--id='thanthiet' --> 
                                     <div id='dinh_dang_anh'>
                                                <?php the_content();?>
                                     </div><!-- dinh_dang_anh -->    
            <!--    <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div><!-- id='edit_post' -->
                                    </div><!-- id='thu_vien_anh_dathang -->         
                                </div><!-- id='Khung_dathang -->
                    <?php
                        endforeach;
                        wp_reset_postdata();

                
                     ?>
             </div><!-- id='thanthiet' -->
         </div><!-- id='khachhang_than_thiet -->
