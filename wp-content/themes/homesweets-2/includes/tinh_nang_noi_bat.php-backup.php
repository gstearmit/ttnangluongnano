<div id='noi_bat_index'>
	<div id='name_noi_bat'>Tính năng nổi bật của chúng tôi quý</div><!-- id='name_noi_bat' -->
	<div id='noi_bat_khung'>
	          <div id='noi_bat_galylle'>
                   <?php
                         global $id;$id = 15;  // 9 la id catalogue  
                         $category = get_the_category_by_ID($id);  // var_dump($category); ?>
				<h3><?php  echo $category; ?></h3>
				<p>
					<?php 
		            global $post;
		            $args = array('numberposts'=>27,'category'=>15, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
							<a class="fancybox-thumbs" data-fancybox-group="thumb" 
							href="<?php echo $cfs->get("images_gallery");?>">
								<?php the_post_thumbnail();?>
							</a>
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>
				</p>
			</div><!-- id='noi_bat_galylle -->
        
		
		
		<div id='noi_bat_detail_meta'>
			<p>Những đêm chợ hoa thời gian là trong vòng 3 phút đi bộ từ Sweethome của bạn :) Từ 02:00-7:00, không chỉ có kẻ bán và mua, nhưng cũng có nhiều người đến đây để thưởng thức hương thơm của hoa.  thị trường này có vẻ như một cuộc triển lãm hoa. Bạn có thể mua bó hoa rất đẹp với giá rẻ. </p>
		</div><!-- id='noi_bat_detail_meta -->
		<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
	</div><!-- id='noi_bat_khung -->

	<?php // khung da ta thu 2 ?>
	<div id='noi_bat_khung'>
		<div id='noi_bat_galylle'>
			
		
                   <?php
                         global $id;$id = 16;  // 9 la id catalogue  
                         $category = get_the_category_by_ID($id);  // var_dump($category); ?>
				<h3><?php  echo $category; ?></h3>
				<p>
					<?php 
		            global $post;
		            $args = array('numberposts'=>27,'category'=>16, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
							<a class="fancybox-thumbs" data-fancybox-group="thumb" 
							href="<?php echo $cfs->get("images_gallery");?>">
								<?php the_post_thumbnail();?>
							</a>
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>
				</p>
			</div><!-- id='noi_bat_galylle -->

		<div id='noi_bat_detail_meta'>
			<p>Trong vòng 10 phút đi bộ từ Sweethome của bạn, bạn sẽ có một cơ hội để xem quyến rũ  Hồ Tây sen  bắt đầu từ tháng Năm đến tháng Chín. Thời gian đẹp nhất của Lotus là trong tháng Sáu và tháng Bảy. Ngoài ra, các truyền thống Tây Hồ trà sen , món quà cũng-biết tốt nhất từ Hà Nội, được thực hiện từ đây.</p>
		</div><!-- id='noi_bat_detail_meta -->
		<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
	</div><!-- id='noi_bat_khung -->

	<?php // khung da ta thu 3 ?>
	<div id='noi_bat_khung'>
		<div id='noi_bat_galylle'>
                   <?php
                         global $id;$id = 17;  // 9 la id catalogue  
                         $category = get_the_category_by_ID($id);  // var_dump($category); ?>
				<h3><?php  echo $category; ?></h3>
				<p>
					<?php 
		            global $post;
		            $args = array('numberposts'=>27,'category'=>17, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
							<a class="fancybox-thumbs" data-fancybox-group="thumb" 
							href="<?php echo $cfs->get("images_gallery");?>">
								<?php the_post_thumbnail();?>
							</a>
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>
				</p>
		</div><!-- id='noi_bat_galylle -->
		
		<div id='noi_bat_detail_meta'>
			<p>Là hồ lớn nhất của Hà Nội, nằm ngay tại trung tâm của Hà Nội, Hồ Tây là đâm với nhiều khu vườn, khách sạn, nhà hàng và trung tâm vui chơi giải trí khác. Vì lý do này, giá bất động sản của khu vực gần Hồ Tây là đáng kinh ngạc và các khu xung quanh thường đầy đủ với dinh thự hoành tráng lớn bị chiếm đóng bởi người Việt Nam phong phú và cựu vỗ.</p>
		</div><!-- id='noi_bat_detail_meta -->
		<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
	</div><!-- id='noi_bat_khung -->

</div><!-- id='noi_bat_index -->