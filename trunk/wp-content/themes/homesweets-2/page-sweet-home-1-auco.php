<?php 
/* 
Template Name: Theme page Sweet Home 1 AU CO
Comment : ( các trang chính hiển thị)
*/
?>
<?php get_header(); ?>
	<div id='page-info-wapper'>
		<?php get_sidebar(); ?>
		<?php get_sidebar('second'); ?>
		<div id="main-content">
			<div id='infor_sweets_1auco'>
				<?php 
            global $post;
            //Sweethome 1 - Âu Cơ : category'=>21
            $args = array('numberposts'=>2,'category'=>21, 'orderby'=>'rand');
            $custom_posts = get_posts($args);
            foreach($custom_posts as $post) : setup_postdata($post); ?>
             	<div id='khung_info'>
             		<div id='name_info'>
             			<a href="<?php the_permalink();?>">
                            <?php the_title(); ?>
             			</a>
             		</div> <!-- id='name_info -->
             		<div id='contend_info'>
             			<a href="<?php the_permalink();?>"><?php  the_content();?>	</a>
             		</div> <!-- id='contend_info -->
             		<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div><!-- 'edit_post' -->
             	</div><!-- khung_info -->
						                
			<?php
			endforeach;
			 wp_reset_postdata();
			 ?>
			</div> <!-- id='infor_sweets_1auco' -->

			<div id='cac_can_ho'>
				 <?php 
		            global $post;
		            //Các Căn Hộ 1 - Âu Cơ  : category'=>22
		            $args = array('','category'=>22,'');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
		            
		             <div id='khung_can_ho'>
		             	<div id='name_can_ho'>
		                    <a href="<?php the_permalink();?>">
		                    	<?php the_title();?>
		                    </a>
		                </div><!-- name_can_ho -->
		                <div id='text_can_ho'>
		                	<div id='img_can_ho'>
			                    <?php if (has_post_thumbnail()) { ?>
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(array(184,126)); ?>
									</a>
									<?php } else { ?>
										<a href="<?php the_permalink(); ?>">
											<img  width="184" height="126" src="<?php echo get_bloginfo('template_directory').'/images/no_image.gif';?>" />
										</a>
									<?php } ?>

			                </div><!-- img_can_ho -->
			                <div id='the_conted_can_ho'>
			               
			                   <a href="<?php the_permalink();?>">
			                   		<?php  the_excerpt();?>
			                   </a> 
			                </div><!-- id='the_conted_can_ho' -->
		                </div> <!-- id='text_can_ho' -->
		                <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
		             </div><!-- khung_can_ho-->
		                
		        <?php
		            endforeach;
		            wp_reset_postdata();
		    
		         ?>
			</div><!-- id='cac_can_ho -->


			<div id='hen_gap_submit_page_n'>
		<div id='post_cont_hen_gap' style='width:100%;float:left;'>
			<?php 
	            global $post;
	            $args = array('numberposts'=>1,'category'=>25, 'orderby'=>'rand');
	            $custom_posts = get_posts($args);
	            foreach($custom_posts as $post) : setup_postdata($post); ?>
	             <div id='noi_dung_cont_hen_gap'>
	                    <?php the_content();?>
	                <div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div>
	            </div><!-- noi_dung_cont_hen_gap' -->   
	                
	        <?php
	            endforeach;
	            wp_reset_postdata();
	    
	         ?>
	     </div><!-- id='post_cont_hen_gap' -->

	     <div id='sunmit_hengap' style='width:100%; float:left;'>

	     <div id="dk_page_03">
			
			<div id="et-register">

				<div id="et-contact-message" style="color:#FF0000; margin-left: 10px;">
								    </div>

				
				<div id="dangki_vistor_r">

					<form action="#" method="post" id="et_register_form">
						<div id="namedangki_form">
							 <p class="dki_use_m">ĐĂNG KÝ HẸN GẶP</p>
							 
						</div>

						<ul id="et_contact_left">
							<li id="li_ul_n">
							    <div id="fontName_n">Họ tên </div>
							    <div id="ldiv_one" style="float: right;">
							    	<input id="input_text_w" type="text" name="et_register_form_full_name" value="">
									<div id="Saodo">*</div>
								</div> <!-- id='ldiv_one'-->
						    </li>

						   
						    
						    <li id="li_ul_n">
							    <div id="fontName_n">Email </div>
							    <div id="ldiv_one">
							   		<input id="input_text_w" type="text" name="et_register_form_email" value="">
							    	<div id="Saodo">*</div>
								</div> <!-- id='ldiv_one'-->
						    </li>
						     <li id="li_ul_n">
							    <div id="fontName_n">Bình Luận </div>
							    <div id="ldiv_one">
							    	<textarea id="input-676595472446059273" class="wsite-form-input wsite-input wsite-input-width-370px" name="_u676595472446059273" style="height: 200px;width: 400px;"></textarea>
							   		
								</div> <!-- id='ldiv_one'-->
						    </li>
						</ul>

						<input type="hidden" name="et_register_form_submit_ph" value="et_register_form_proccess">
						<input type="submit" value="Đăng ký" id="register_submit_form_ph">
					</form>

				</div> <!--id='dangki_vistor'-->
						</div> <!-- end #et-register -->

			</div>

	     </div><!-- id='sunmit_hengap' -->
	</div><!--id='hen-gap-submit-->



		</div><!--end main-content-->
	</div><!-- id='page-info-wapper' -->

	<?php get_footer(); ?>
</div><!-- id="page-wrap" -->
					
