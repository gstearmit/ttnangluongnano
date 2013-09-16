<?php
/* 
Template Name: Theme page 201-602
Comment : page-them-chitet-cac-page-can-ho-201-602
*/
?>
<?php 
 get_header(); ?>
<div id='page-info-wapper'>
		<?php get_sidebar(); ?>
		     <div id="second-sidebar">
			 	<div id="khung_dathang">
			 	    	<div id='khung_trai'>
			 	    		<?php 
								if ($cfs->get('content_post') != null) {
									echo $cfs->get('content_post');
								}
						?>
			 	    	</div><!-- id='khung_trai' -->
						
					</div> <!-- id="khung_dathang" -->
		     </div><!--end second-sidebar-->

            </div>

		<div id="main-content">
		<?php get_template_part('includes/breadcrumbs'); ?>

		<div id="content" class="clearfix">
			<div id="left-area">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div ><!-- class="entry post clearfix" -->
					<?php if (get_option('chameleon_integration_single_top') <> '' && get_option('chameleon_integrate_singletop_enable') == 'on') echo esc_html(get_option('chameleon_integration_single_top')); ?>
					
					<?php if (get_option('chameleon_thumbnails') == 'on') { ?>
						<?php 
							$thumb = '';
							$width = 186;
							$height = 186;
							$classtext = 'post-thumb';
							$titletext = get_the_title();
							$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Entry');
							$thumb = $thumbnail["thumb"];
						?>
						
						<?php 
						/*
						if($thumb <> '') { ?>
							<div class="post-thumbnail">
								<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
								<span class="post-overlay"></span>
							</div> 	<!-- end .post-thumbnail -->
						<?php }
						*/ ?>
					<?php } ?>
					
					<div id='sing_cont_dd' class="paragraph" style="text-align:left;display:block;"><?php the_content(); ?></div>
					<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages','Chameleon').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
					<div id='edit_post'><?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?></div><!-- 'edit_post' -->

					<div id='sharr_ez'>
						<div class="addthis_toolbox addthis_default_style ">
						<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
						<a class="addthis_button_tweet"></a>
						<a class="addthis_button_pinterest_pinit"></a>
						<a class="addthis_counter addthis_pill_style"></a>
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51b237a667b71e33"></script>
			      </div><!-- id='sharr_ez' -->	
			      	
				</div> <!-- end .entry -->
				
				<?php if (get_option('chameleon_integration_single_bottom') <> '' && get_option('chameleon_integrate_singlebottom_enable') == 'on') echo esc_html(get_option('chameleon_integration_single_bottom')); ?>		
							
				<?php if (get_option('chameleon_468_enable') == 'on') { ?>
						  <?php if(get_option('chameleon_468_adsense') <> '') echo esc_html(get_option('chameleon_468_adsense'));
						else { ?>
						   <a href="<?php echo esc_url(get_option('chameleon_468_url')); ?>"><img src="<?php echo esc_attr(get_option('chameleon_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
				   <?php } ?>   
				<?php } ?>
				
				<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
			<?php endwhile; endif; ?>
			</div> 	<!-- end #left-area -->

		</div> <!-- end #content -->	
		
	</div><!-- id='page-info-wapper' -->

	<div id='hen_gap_submit'>
		<div id='post_cont_hen_gap'>
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
							    	<textarea id="input-676595472446059273" class="wsite-form-input wsite-input wsite-input-width-370px" name="_u676595472446059273" style="height: 200px"></textarea>
							   		
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

<?php get_footer(); ?>
	

