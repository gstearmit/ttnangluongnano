<?php 
/* 
Template Name: Theme Page clients-reviews
Comment : page_clients-reviews
*/
?>
<?php get_header(); ?>

			<?php get_template_part('includes/breadcrumbs'); ?>

      <div id='page-info-wapper'>
			<div id="content" class="clearfix fullwidth">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
											
						<?php if (get_option('chameleon_page_thumbnails') == 'on') { ?>
							<?php 
								$thumb = '';
								$width = 186;
								$height = 186;
								$classtext = 'post-thumb';
								$titletext = get_the_title();
								$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Entry');
								$thumb = $thumbnail["thumb"];
							?>
							
							<?php if($thumb <> '') { ?>
								<div class="post-thumbnail">
									<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
									<span class="post-overlay"></span>
								</div> 	<!-- end .post-thumbnail -->
							<?php } ?>
						<?php } ?>
						
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Trang','Chameleon').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						
						<div id='page_edit_link'>
							<?php 

							//var_dump(edit_post_link(esc_html__('Chỉnh Sửa page','Chameleon'))); 
							edit_post_link(esc_html__('Chỉnh Sửa page','Chameleon'));?>
						</div><!-- id='page_edit_link' -->			
					
								
					<?php //if (get_option('chameleon_show_pagescomments') == 'on') comments_template('', true); ?>
				<?php endwhile; endif; ?>
				
			</div> <!-- end #content -->


<div id='hen_gap_submit'>

	     <div id='sunmit_hengap'>
	     	

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
							    	<textarea id="input-676595472446059273" class="wsite-form-input wsite-input wsite-input-width-490x" name="_u676595472446059273" style="height: 200px;width: 639px;"></textarea>
							   		
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


</div><!-- id='page-info-wapper' -->
	<?php get_footer(); ?>
</div><!-- id="page-wrap" -->
	
	
					
