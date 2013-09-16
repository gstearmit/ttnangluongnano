<div id='home_se_catalogue'>
	<div id='ke_khung_cata'>
	          <div id='galylle_cata'>
                   <?php
                         global $id;$id = 11;  // 9 la id catalogue  
                         $category = get_the_category_by_ID($id);  // var_dump($category); ?>
				<h3><?php  echo $category; ?></h3>
				<p>
					<?php 
		            global $post;
		            $args = array('category'=>11, 'orderby'=>'rand');
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
			</div><!-- id='galylle_cata -->
        
		
		<div id='google_map_ip'>
			<iframe width="202" height="254" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;hl=vi&amp;ie=UTF8&amp;sll=21.0687,105.82295&amp;sspn=0.024629,0.03592&amp;oq=to&amp;hnear=T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;t=m&amp;hq=&amp;ll=21.068723,105.822973&amp;spn=0.020344,0.017252&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q=T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;hl=vi&amp;ie=UTF8&amp;sll=21.0687,105.82295&amp;sspn=0.024629,0.03592&amp;oq=to&amp;hnear=T%C3%B4+Ng%E1%BB%8Dc+V%C3%A2n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;t=m&amp;hq=&amp;ll=21.068723,105.822973&amp;spn=0.020344,0.017252&amp;z=14&amp;iwloc=A&amp;source=embed" style="color:#0000FF;text-align:left">Xem Bản đồ cỡ lớn hơn</a></small>
		</div><!-- id='google_map_ip -->
		<div id='google_detail_meta'>
			<p>Vị trí trong một nơi yên bình và an toàn gần Hồ Tây, trên đường Âu Co 3 phút đi bộ đến trạm xe buýt và trạm xe taxi. 12 phút đi bộ đến Hồ Tây. . 15 phút lái xe đến trung tâm thành phố siêu thị, chợ, quán cà phê, cửa hàng, nhà hàng gần đây: thị trường trong nước chỉ là bên cạnh bạn, Fivimart siêu thị và trung tâm mua sắm Syrena, rau xanh, Yuki trái cây tươi và thực phẩm thực vật; Alfresco - nhà hàng Mỹ, Salsa - nhà hàng Tây Ban Nha, nhà hàng Nhật Bản, cà phê và các cửa hàng Joma nhiều hơn, nhà hàng ... Xuân Diệu và để đường phố Tô Ngọc Vân là trong tầm tay trong vòng 15 phút đi bộ. Đặc biệt trong vòng 3 phút đi bộ, bạn sẽ thấy thị trường hoa nổi tiếng nhất của Hà Nội nằm ở đây.  đường lớn để truy cập xe. </p>
		</div><!-- id='google_detail_meta -->
	</div><!-- id='ke_khung_cata -->

	<?php // khung da ta thu 2 ?>
	<div id='ke_khung_cata'>
		<div id='galylle_cata'>
			<!--
			<h3>Cactalogue</h3>
				<p>
					<a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo bloginfo('template_directory'); ?>/demo/4_b.jpg">
						<img src="<?php echo bloginfo('template_directory'); ?>/demo/4_s.jpg" alt="" />
					</a>

					<a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo bloginfo('template_directory'); ?>/demo/3_b.jpg"><img src="<?php echo bloginfo('template_directory'); ?>/demo/3_s.jpg" alt="" /></a>

					<a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo bloginfo('template_directory'); ?>/demo/2_b.jpg"><img src="<?php echo bloginfo('template_directory'); ?>/demo/2_s.jpg" alt="" /></a>

					<a class="fancybox-thumbs" data-fancybox-group="thumb" href="<?php echo bloginfo('template_directory'); ?>/demo/1_b.jpg"><img src="<?php echo bloginfo('template_directory'); ?>/demo/1_s.jpg" alt="" /></a>
				</p>
			-->
		
                   <?php
                         global $id;$id = 11;  // 9 la id catalogue  
                         $category = get_the_category_by_ID($id);  // var_dump($category); ?>
				<h3><?php  echo $category; ?></h3>
				<p>
					<?php 
		            global $post;
		            $args = array('category'=>11, 'orderby'=>'rand');
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
			</div><!-- id='galylle_cata -->

		<div id='google_map_ip'>
		           <iframe width="202" height="254" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=vi&amp;geocode=&amp;q=B%E1%BA%BFn+Nh%E1%BA%ADt+B%E1%BA%A3n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;aq=0&amp;oq=b%E1%BA%BFn+&amp;sll=21.075931,105.822008&amp;sspn=0.012314,0.01796&amp;ie=UTF8&amp;hq=&amp;hnear=B%E1%BA%BFn+Nh%E1%BA%ADt+B%E1%BA%A3n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;t=m&amp;ll=21.064558,105.819883&amp;spn=0.020344,0.017252&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=vi&amp;geocode=&amp;q=B%E1%BA%BFn+Nh%E1%BA%ADt+B%E1%BA%A3n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;aq=0&amp;oq=b%E1%BA%BFn+&amp;sll=21.075931,105.822008&amp;sspn=0.012314,0.01796&amp;ie=UTF8&amp;hq=&amp;hnear=B%E1%BA%BFn+Nh%E1%BA%ADt+B%E1%BA%A3n,+Qu%E1%BA%A3ng+An,+T%C3%A2y+H%E1%BB%93,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam&amp;t=m&amp;ll=21.064558,105.819883&amp;spn=0.020344,0.017252&amp;z=14" style="color:#0000FF;text-align:left">Xem Bản đồ cỡ lớn hơn</a></small>
		</div><!-- id='google_map_ip -->
		<div id='google_detail_meta'>
			<p>Vị trí trực tiếp bên bờ hồ, nơi rất bình tĩnh với quang cảnh hồ đẹp. 15 phút lái xe đến trung tâm thành phố. siêu thị, quán cà phê, cửa hàng, nhà hàng, quán bar gần đó dọc theo đường Xuân Diệu là trong tầm tay trong vòng 10 phút đi bộ. đường lớn cho xe hơi truy cập.</p>
		</div><!-- id='google_detail_meta -->
	</div><!-- id='ke_khung_cata -->
	<?php // khung da ta thu 3 ?>
	<div id='ke_khung_cata'>
		<div id='galylle_cata'>
                   <?php
                         global $id;$id = 11;  // 9 la id catalogue  
                         $category = get_the_category_by_ID($id);  // var_dump($category); ?>
				<h3><?php  echo $category; ?></h3>
				<p>
					<?php 
		            global $post;
		            $args = array('category'=>11, 'orderby'=>'rand');
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
		</div><!-- id='galylle_cata -->
		<div id='google_map_ip'>
					<?php
						$args =  array('category'=>12, 'orderby'=>'rand');
					    $My_query = get_posts($args); 
					     global $map_api;
					    foreach  ( $My_query as $map_api ) : setup_postdata($map_api); ?> 
					    <?php the_content();?>
					<?php
		            endforeach;
		            wp_reset_postdata();   ?>

		</div><!-- id='google_map_ip -->
		<div id='google_detail_meta'>
			<p>Vị trí trên đường lớn để truy cập xe hơi -. Tô Ngọc Vân . 15 phút lái xe đến trung tâm thành phố Tô Ngọc Vân bây giờ là một đường phố nổi tiếng, như người Việt Nam gọi nó là đường phố phương Tây, với các nhà hàng phương Tây, các quán cà phê, cửa hàng thực phẩm nhỏ, các cửa hàng , trường mẫu giáo quốc tế, vv  Đặc biệt, trong vòng 3 phút đi bộ, bạn có thể đạt đến hồ Tây, nơi chuyên gia cho hoa sen, đó là một trong những điều nổi tiếng về Hồ Tây.</p>
		</div><!-- id='google_detail_meta -->
	</div><!-- id='ke_khung_cata -->

</div><!-- id='home_se_catalogue -->