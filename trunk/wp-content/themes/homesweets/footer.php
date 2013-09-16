</div><!--end page-info-->
	 <div id="footer">
    	<?php 
		            global $post;
		            $args = array('numberposts'=>1,'category'=>20, 'orderby'=>'rand');
		            $custom_posts = get_posts($args);
		            foreach($custom_posts as $post) : setup_postdata($post); ?>
					<?php  the_content()?>
					<?php
		            endforeach;
		            wp_reset_postdata(); ?>
	
    </div><!-- id="footer" -->

   


	<!---
		<div id="footer">
			<?php 
			/*
			// hien quang cao hoac hot line
				<div style="position:fixed;bottom:0;left:0;width:100%;height:50px">
				        <div class="divOnCenterBottom">
                         <img id="imgleft" style="border-width: 0px;position: relative;top: -139px;right: -58px;"
				            src="<?php bloginfo('template_url'); ?>/images/hotline5.png">
				        </div>
				</div>

				<div style="position:fixed;bottom:0;left:0;width:100%;height:50px">
				        <div class="hoan100dungthu">
             <a href="http://maybanhang.net/dang-ky/"> 
             	<img id="imgleft" style="border-width: 0px;position: relative;top: -139px;left: 8px;width: 139px;" src="<?php bloginfo('template_url'); ?>/images/148.png">
             </a>
				        </div>
				</div>
			*/ ?>

					<div id="footer-content" class="clearfix">
						<div id="footer-widgets" class="clearfix">
							<?php 
					/*
							if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
							<?php endif; ?>
						</div> <!-- end #footer-widgets -->
							<div id="footer_ez" style=" width:623px; height: 147px; position: relative; top: -175px; left: 61px;">
								<div style="font-size: 12px;margin-left: 49px; color:#1d1d1d;font-weight: bold;font-family: arial;padding-bottom: 5px;">
									Bản quyền © 2011 - 2013 Maybanhang.net  sản phẩm của Công ty Cổ phần giải pháp EZ
								</div>
								<div style="width: 304px;height: 119px;float: left;margin-left: 16px;">
									<p style="font-weight: bold;">Hà Nội : </p>
						            <p>Tầng 11, Toà nhà TTC, 19 Duy Tân,  Cầu Giấy</p>
						            <p>Tel :  04 6282 0386 - Fax:  04 6282 0386</p>
						         </div>

						         <div style="width: 286px;height: 119px;float: right;margin-left: 16px;">
									<p style="font-weight: bold;">TP. HCM : </p>
						            <p>Số 7 Đặng Tất, Phường Tân Định, Quận 1</p>
						            <p>Tel :  08 6279 5344  -  Fax:  08 3526 5123</p>
						         </div>
					        </div><!--  id="footer_ez" -->
					</div> <!-- end #footer-content -->
					
			
	 <!--  </div> <!-- end #footer -->
					*/
					?>
	-->
	  

	</div><!-- end #container -->
	<?php get_template_part('includes/scripts'); ?>
	<?php wp_footer(); ?>

</body>
</html>