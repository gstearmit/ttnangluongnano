<?php
/*
Template Name: About Page
*/
?>
<?php get_header(); ?>


<div id="content-area">

		<div id='wapper'>
			<div id='wapper-about1'>
				<img style='width: 958px; height: 449px;position: relative;top: -4px;left: 1px;' src="<?php bloginfo('template_url'); ?>/images/about12345.png">
				<div id='text_ez'>
					<p><strong class='ez_meta'>Maybanhang.net</strong>
						là dịch vụ cung cấp bởi EZ Solution, công ty giải pháp công nghệ thông tin trong lĩnh vực bán lẻ, phân phối và dịch vụ thành lập năm 2011. Với đội ngũ kỹ sư trẻ đầy đam mê, sáng tạo, có nhiều năm kinh nghiệm trong lĩnh vực bán lẻ và công nghệ thông tin, chúng tôi phấn đấu để trở thành công ty công nghệ thông tin hàng đầu trong lĩnh vực mà chúng tôi tham gia.
					</p>
				 <ul class='text_ul'>
					<li class='li_text'>
					 •	Chúng tôi <strong class='ez_meta'>thấu hiểu</strong> sự vất vả, các vấn đề tồn tại, các nhu cầu phát triển của những người làm việc trong ngành bán lẻ, dịch vụ và phân phối.
					 </li>
					 <li class='li_text'>
					  •	Đặc biệt với sự <strong class='ez_meta'>đam mê</strong> chúng tôi khát khao nghiên cứu, ứng dụng các công nghệ tiên tiến nhất và chọn lọc nhất (Điện toán đám mây, Công nghệ màn hình chạm, Công nghệ di động) để nâng cao chất lượng dịch vụ, giảm tối đa chi phí và tối ưu hiệu suất quản lý, bán hàng.
					 </li>
					 <li class='li_text'>
					 •	Chúng tôi <strong class='ez_meta'> nỗ lực</strong> hết sức để tạo ra sự đột phá trong cách thức áp dụng công nghệ thông tin trong quản lý và vận hành.
					 </li>
				    </ul>
				</div> <!-- id='text_ez' -->
			</div><!-- id='wapper-about1' -->


			<div id='wapper-about2'>
				<p class='text_view'>THÀNH VIÊN TIÊU BIỂU</p>
				<div id='div_view'>

					<?php
					//Nhóm phát triển( co iD moi tren may ban hang :id = 76 )
				    global $post;
				    $args = array('numberposts'=>3, 'category'=>76);
				    $custom_posts = get_posts($args);
				    foreach($custom_posts as $post) : setup_postdata($post);
				     $Id_post_custom = get_post_custom($post->ID);

				     ?>
				                     <div id='view123'>
										<img class='images_view' src="<?php echo $Id_post_custom['images_link'][0];?>">
										<div id='name_view'><?php echo $Id_post_custom['Name_view'][0];?></div>
										<div id='posi_view'><?php echo $Id_post_custom['jop_view'][0];?></div>
										<div id='meta_posi'>
											<?php echo $Id_post_custom['meta_pos'][0];?>
										</div><!-- id='meta_posi' -->
									</div><!--id='view123'-->

				     <?php
				    //...
				    endforeach;
				    wp_reset_postdata();

				  ?>

				</div><!--id='div_view'-->

			</div><!-- id='wapper-about2' -->


			


		<div id='wapper-about3'>

				<div id='div_view'>

					<?php
					//Nhóm deverlop 2 (82)

				    global $post;
				    $args = array('numberposts'=>20, 'category'=>82);
				    $custom_posts = get_posts($args);
				    foreach($custom_posts as $post) : setup_postdata($post);
				     $Id_post_custom = get_post_custom($post->ID);

				     ?>
				                    <div id='view123'>
									<img class='images_view' src="<?php echo $Id_post_custom['images_link'][0];?>">
									<div id='name_view'><?php echo $Id_post_custom['Name_view'][0];?></div>
									<div id='posi_view'><?php echo $Id_post_custom['jop_view'][0];?></div>
									<div id='meta_posi'>
										<?php echo $Id_post_custom['meta_pos'][0];?>

									</div><!-- id='meta_posi' -->
								</div><!--id='view123'-->

				     <?php
				    //...
				    endforeach;
				    wp_reset_postdata();

				  ?>
				</div><!--id='div_view'-->

			</div><!-- id='wapper-about3' -->

	
	
<div id='wapper-about3'>

				<div id='div_view'>

					<?php
					//Nhóm Kiểm tra chất lượng (77)

				    global $post;
				    $args = array('numberposts'=>12, 'category'=>77);
				    $custom_posts = get_posts($args);
				    foreach($custom_posts as $post) : setup_postdata($post);
				     $Id_post_custom = get_post_custom($post->ID);

				     ?>
				                    <div id='view123'>
									<img class='images_view' src="<?php echo $Id_post_custom['images_link'][0];?>">
									<div id='name_view'><?php echo $Id_post_custom['Name_view'][0];?></div>
									<div id='posi_view'><?php echo $Id_post_custom['jop_view'][0];?></div>
									<div id='meta_posi'>
										<?php echo $Id_post_custom['meta_pos'][0];?>

									</div><!-- id='meta_posi' -->
								</div><!--id='view123'-->

				     <?php
				    //...
				    endforeach;
				    wp_reset_postdata();

				  ?>
				</div><!--id='div_view'-->

			</div><!-- id='wapper-about3' -->








			<div id='wapper-about3'>

				<div id='div_view'>

					<?php
					//Nhóm kinh doanh (id = 78)

				    global $post;
				    $args = array('numberposts'=>20, 'category'=>78);
				    $custom_posts = get_posts($args);
				    foreach($custom_posts as $post) : setup_postdata($post);
				     $Id_post_custom = get_post_custom($post->ID);

				     ?>
				                    <div id='view123'>
									<img class='images_view' src="<?php echo $Id_post_custom['images_link'][0];?>">
									<div id='name_view'><?php echo $Id_post_custom['Name_view'][0];?></div>
									<div id='posi_view'><?php echo $Id_post_custom['jop_view'][0];?></div>
									<div id='meta_posi'>
										<?php echo $Id_post_custom['meta_pos'][0];?>

									</div><!-- id='meta_posi' -->
								</div><!--id='view123'-->

				     <?php
				    //...
				    endforeach;
				    wp_reset_postdata();

				  ?>
				</div><!--id='div_view'-->

			</div><!-- id='wapper-about3' -->


<div id='wapper-about3'>

				<div id='div_view'>

					<?php
					//Nhóm kinh doanh 2  (id =83)

				    global $post;
				    $args = array('numberposts'=>20, 'category'=>83);
				    $custom_posts = get_posts($args);
				    foreach($custom_posts as $post) : setup_postdata($post);
				     $Id_post_custom = get_post_custom($post->ID);

				     ?>
				                    <div id='view123'>
									<img class='images_view' src="<?php echo $Id_post_custom['images_link'][0];?>">
									<div id='name_view'><?php echo $Id_post_custom['Name_view'][0];?></div>
									<div id='posi_view'><?php echo $Id_post_custom['jop_view'][0];?></div>
									<div id='meta_posi'>
										<?php echo $Id_post_custom['meta_pos'][0];?>

									</div><!-- id='meta_posi' -->
								</div><!--id='view123'-->

				     <?php
				    //...
				    endforeach;
				    wp_reset_postdata();

				  ?>
				</div><!--id='div_view'-->

			</div><!-- id='wapper-about3' -->







			<div id='wapper-about3'>

				<div id='div_view'>

					<?php
					//Nhóm Marketing(79)

				    global $post;
				    $args = array('numberposts'=>20, 'category'=>79);
				    $custom_posts = get_posts($args);
				    foreach($custom_posts as $post) : setup_postdata($post);
				     $Id_post_custom = get_post_custom($post->ID);

				     ?>
				                    <div id='view123'>
									<img class='images_view' src="<?php echo $Id_post_custom['images_link'][0];?>">
									<div id='name_view'><?php echo $Id_post_custom['Name_view'][0];?></div>
									<div id='posi_view'><?php echo $Id_post_custom['jop_view'][0];?></div>
									<div id='meta_posi'>
										<?php echo $Id_post_custom['meta_pos'][0];?>

									</div><!-- id='meta_posi' -->
								</div><!--id='view123'-->

				     <?php
				    //...
				    endforeach;
				    wp_reset_postdata();

				  ?>
				</div><!--id='div_view'-->

			</div><!-- id='wapper-about3' -->

			<div id='wapper-about3'>

				<div id='div_view'>

					<?php
					//Nhóm hỗ trợ - VP (80)

				    global $post;
				    $args = array('numberposts'=>9, 'category'=>80);
				    $custom_posts = get_posts($args);
				    foreach($custom_posts as $post) : setup_postdata($post);
				     $Id_post_custom = get_post_custom($post->ID);

				     ?>
				                    <div id='view123'>
									<img class='images_view' src="<?php echo $Id_post_custom['images_link'][0];?>">
									<div id='name_view'><?php echo $Id_post_custom['Name_view'][0];?></div>
									<div id='posi_view'><?php echo $Id_post_custom['jop_view'][0];?></div>
									<div id='meta_posi'>
										<?php echo $Id_post_custom['meta_pos'][0];?>

									</div><!-- id='meta_posi' -->
								</div><!--id='view123'-->

				     <?php
				    //...
				    endforeach;
				    wp_reset_postdata();

				  ?>
				</div><!--id='div_view'-->

			</div><!-- id='wapper-about3' -->



			<div id='wapper-about4'>

				<div id='div_view'>

					<?php 
					//Ban giám đốc (id= 75)
				    global $post;
				    $args = array('numberposts'=>3, 'category'=>75);
				    $custom_posts = get_posts($args);
				    foreach($custom_posts as $post) : setup_postdata($post);
				     $Id_post_custom = get_post_custom($post->ID);
				     ?>
				                     <div id='view123'>
										<img class='images_view' src="<?php echo $Id_post_custom['images_link'][0];?>">
										<div id='name_view'><?php echo $Id_post_custom['Name_view'][0];?></div>
										<div id='posi_view'><?php echo $Id_post_custom['jop_view'][0];?> </div>
										<div id='meta_posi'>
											<?php echo $Id_post_custom['meta_pos'][0];?>
										</div><!-- id='meta_posi' -->
									</div><!--id='view123'-->


				     <?php
				    //...
				    endforeach;
				    wp_reset_postdata();

				  ?>

				</div><!--id='div_view'-->

			</div><!-- id='wapper-about3' -->








			</div><!--id='wapper' -->


		<div class="clear"></div>



</div> <!-- end #content-area -->

<?php get_footer(); ?>