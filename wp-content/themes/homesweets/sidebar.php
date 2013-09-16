<div id="content-wrap">
    <div id="first-sidebar">
       <?php 
            global $post;
            $args = array('numberposts'=>27,'category'=>8, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
            
             <div id='right_adv'>
                <div id='img_adv'>
                    <?php  the_post_thumbnail(array(207,73));?>
                </div><!-- img_adv -->
                <div id='map_sibar' style='width:195px; height: 253px;padding-bottom:20px;'>
                    <iframe width="195" height="255" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;hl=vi&amp;ie=UTF8&amp;sll=21.0687,105.82295&amp;sspn=0.024629,0.03592&amp;oq=to&amp;hnear=T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;t=m&amp;hq=&amp;ll=21.068723,105.822973&amp;spn=0.020344,0.017252&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q=T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;hl=vi&amp;ie=UTF8&amp;sll=21.0687,105.82295&amp;sspn=0.024629,0.03592&amp;oq=to&amp;hnear=T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;t=m&amp;hq=&amp;ll=21.068723,105.822973&amp;spn=0.020344,0.017252&amp;z=14&amp;iwloc=A&amp;source=embed" style="color:#0000FF;text-align:left">Xem Bản đồ cỡ lớn hơn</a></small>
                </div><!-- id='google_map_ip -->
                <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
             </div><!-- right_adv -->
                
        <?php
            endforeach;
            wp_reset_postdata();
    
         ?> 

         <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?> 
	     <?php endif; ?>
	     
    </div><!--end first-sidebar-->     

 

