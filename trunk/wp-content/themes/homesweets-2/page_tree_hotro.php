<?php
/*
Template Name: Trang Hỗ Trợ Khách Hàng
*/
?>
<?php get_header(); ?>
<?php get_template_part('includes/breadcrumbs'); ?>
<?php get_template_part('includes/top_info'); ?>
<div id="content_tree" style='padding: 5px;' class="clearfix">
	<div id='left_tree' style='float:left; padding: 3px; width: 236px;height: auto;'>

		   <div id="treecontrol">
				
				<a title="Thu gọn tất cả" href="#"><img src="<?php bloginfo('template_url'); ?>/images/minus.gif" /> Thu gọn</a>
				<a title="mở rộng tất cả" href="#"><img src="<?php bloginfo('template_url'); ?>/images/plus.gif" /> mở rộng</a>
				<!--<a title="chuyển đổi Tất cả" href="#">chuyển đổi Tất cả</a>
				-->
			</div><!-- id="treecontrol" -->
			<?php
				$args = array(
					'title' =>'Pages',
					  'cache' =>0,
					  'opento' =>'',
					  'uselines' => 1,
					  'useicons' => 0,
					  'exclude' =>'',
					  'closelevels' =>1,
					  'folderlinks' => 1,
					  'showselection' => 0,
					  'include' =>'',
					  'opentoselection' =>1,
					  'truncate' =>0,
					  'sort_order' =>'ASC',
					  'sortby' =>'ID',
					  'treetype' =>'pge',
					  'openlink' => 'open all',
					  'closelink' => 'close all',
					  'oclink_sep' => ' | ',
					  'meta_key' => '',
					  'meta_value' =>'',
					  'authors' => '',
					  'child_of' =>0,
					  'parent' =>-1,
					  'exclude_tree' =>'0',
					 'number' => null,
					  'offset' =>0,
					    'hierarchical' => null,
					  'title_li' =>'',
					  'sort_column' =>'ID'
						);
				if(!isset($args['sort_column']) || $args['sort_column'] == ''){$args['sort_column'] = $args['sortby'];}
					extract($args, EXTR_SKIP);
				    $idcount = 1; $idpidcount =1 ;
					$pageresults = &get_pages(array(
						'child_of' => $child_of,
						'parent'	=> $parent,
						'sort_order' => $sort_order,
						'sort_column' => $sort_column,
						'hierarchical' => $hierarchical,
						'exclude_tree' => $exclude_tree,
						'exclude' => $exclude,
						'include' => $include,
						'meta_key' => $meta_key,
						'meta_value' => $meta_value,
						'authors' => $authors
					));
			// var_dump($pageresults);//die();
					 if($pageresults)
					 {
					 	foreach($pageresults as $pageresult)
					 	 {
							$lay_duoc_trang_can_hien = array( 
                               'id' => $pageresults[32]->ID,
                               'pid' => $pageresults[32]->post_parent,
                               'url' => esc_url(get_permalink($pageresults[32]->ID)),
                               'name' => strip_tags(apply_filters('the_title', $pageresults[32]->post_title)),
                               'title' => '',
							   'slug_p'=> strip_tags(apply_filters('the_name', $pageresults[32]->post_name)),);

							if($pageresults[32]->post_parent == 0){$has_root_connection = true;}

							$arr[0] = $lay_duoc_trang_can_hien;
					 	}
					 }

			?>

<ul id="navigation">
		<a href="<?php echo $arr[0]['url'];?>">Hỗ Trợ</a>
			<?php
				$has_root_connection = false;
				$i = 1;
				if($pageresults)
					{
					 foreach($pageresults as $pageresult)
						{
							$nodedata[$idcount] = array(
												'id' => $pageresult->ID,
												'pid' => $pageresult->post_parent,
												'url' => esc_url(get_permalink($pageresult->ID)),
											    'name' => strip_tags(apply_filters('the_title', $pageresult->post_title)),
											    'title' => '',
												'slug_p'=> strip_tags(apply_filters('the_name', $pageresults->post_name)),);

							if($pageresult->post_parent == 0){$has_root_connection = true;}
							$idcount++;
					    }
					//	echo 'hien nodedata'; var_dump($nodedata); die();
						
						$arr= array();
						foreach($nodedata as $key => $node)
						{
							if($node['pid'] == 0){continue;} //connected to root.
							$hasparent = false;
									if($lay_duoc_trang_can_hien['id'] == $node['pid'])
									{
										// hien thi cap 2
										$arr[$i++] = $node;
										$hasparent = true; //break;
												?>
											<ul>
												<li>
												 <span><a href="<?php echo $node['url'];?>"><?php echo $node['name']; ?></a></span>
												   
													<ul>
														 <?php
															   //echo'tree pade';var_dump($arr);//die();
																	foreach ($arr as $key =>$value )
																		{
																			foreach($nodedata as $lap_lay_pid =>$id_pid)
																						{
																							if($id_pid['pid'] == 0){continue;} //connected to root.
																							$Co_parent = false;
																							if($id_pid['pid'] == $arr[$key]['id'])
																								{
																									// $id_pid;  // luu duoc tat ca cac pages con
																									//echo'id_pid';var_dump($id_pid);
																									//die();
																	 ?>
																										  <li><a href="<?php echo $id_pid['url'];?>">
																														<?php echo $id_pid['name'];?>
																													</a>
																												
																											<?php 	// tu 131 toi 216 : cap 3- cap 4 - cap 5  ?>
																											                                                            <ul>
																		<?php
																			 foreach($nodedata as $lap_lay_pid =>$id_pid_con_3)
																					{
																						if($id_pid_con_3['pid'] == 0){continue;} //connected to root.
																						$Co_parent = false;
																						if($id_pid_con_3['pid'] == $id_pid['id'])
																							{
																								// $id_pid_con_3;  // luu duoc tat ca cac pages con
																			                	//	echo"$id_pid_con_3";var_dump($id_pid_con_3);
																						  ?>
																							  <li>
																								  <span>
																								  <a href="<?php echo $id_pid_con_3['url'];?>">
																												<?php echo $id_pid_con_3['name'];?>
																											</a>
																								 </span>
																										
																									<ul>
																										<?php
																															// câp 4
																										foreach($nodedata as $lap_lay_pid =>$id_pid_con_4)
																												{
																													if($id_pid_con_4['pid'] == 0){continue;} //connected to root.
																													$Co_parent = false;
																													if($id_pid_con_4['pid'] == $id_pid_con_3['id'])
																														{
																														  // $id_pid_con_4;  // luu duoc tat ca cac pages con
																														  //  echo '$id_pid_con_4';var_dump($id_pid_con_4);
																										   ?>
																															<li>
																																<span>
																																<a href="<?php echo $id_pid_con_4['url'];?>">
																																		<?php echo $id_pid_con_4['name'];?>
																																</a>
																																</span>
																																<ul>
																																<?php
																																	// cap 5
																																		foreach($nodedata as $lap_lay_pid =>$id_pid_con_5)
																																				{
																																					if($id_pid_con_4['pid'] == 0){continue;} //connected to root.
																																					$Co_parent = false;
																																					if($id_pid_con_5['pid'] == $id_pid_con_4['id'])
																																						{
																																							// $id_pid_con_5;  // luu duoc tat ca cac pages con
																																									// echo ''; var_dump($id_pid_con_5);
																																							  ?>
																																								<li>
																																										<a href="<?php echo $id_pid_con_5['url'];?>">
																																											<?php echo $id_pid_con_5['name'];?>
																																										</a>
																																								</li>
																																							 <?php
																																									$Co_parent = true; //break;
																																						}//end if($id_pid_con_5['pid'] == $id_pid_con_4['id'])
																																				}//end foreach($nodedata as $lap_lay_pid =>$id_pid_con_5)
																																	//end cap 5
																															   	?>
																																</ul>
																															</li>
																													      <?php
																															$Co_parent = true; //break;
																														}//end if($id_pid_con_4['pid'] == $id_pid_con_3['id'])
																												}//end foreach($nodedata as $lap_lay_pid =>$id_pid_con_4)
																										?>
																									</ul>
																							  </li>
																							    <?php
																									$Co_parent = true; //break;
																							}//end if($id_pid['pid'] == $arr[$key]['id'])

																					}//end foreach($nodedata as $lap_lay_pid =>$id_pid)
																			?>
															</ul>

																										  </li>
																							 <?php
																										$Co_parent = true; //break;
																								}//end if($id_pid['pid'] == $arr[$key]['id'])
																						}//end foreach($nodedata as $lap_lay_pid =>$id_pid)
																		} //end  foreach ($arr as $key =>$value )
									?>				</ul>
											   </li>
										   </ul>
							<?php   }//end if($lay_duoc_trang_can_hien['id'] == $node['pid'])
													if(!$hasparent){$nodedata[$key]['pid'] = 0;} //connect orphans to root.
						}//end foreach($nodedata as $key => $node)
					}//end 	if($pageresults)
			?>
	  
  </ul>
	</div> <!-- end #id='left_tree'-->

	<div id="right-area" style='float:left;width: 700px; height:auto; padding: 4px;'>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="entry post clearfix">
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
			<?php edit_post_link(esc_html__('Chỉnh sửa','Chameleon')); ?>
		</div> <!-- end .entry -->

		<div id="ph_sharr" style=" margin-left:50px; width: 600px; height: 30px;">
			<!-- AddThis Button BEGIN -->
	     <div class="addthis_toolbox addthis_default_style ">
			<a class="addthis_button_preferred_1"></a>
			<a class="addthis_button_preferred_2"></a>
			<a class="addthis_button_preferred_3"></a>
			<a class="addthis_button_preferred_4"></a>
			<a class="addthis_button_compact"></a>
			<a class="addthis_counter addthis_bubble_style"></a>
			</div>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51b237a667b71e33"></script>
			<!-- AddThis Button END -->
	</div><!-- id="ph_sharr" -->

		<?php if (get_option('chameleon_show_pagescomments') == 'on') comments_template('', true); ?>
	<?php endwhile; endif; ?>
	</div> 	<!-- end #right-area -->

	<?php// get_sidebar(); ?>
</div> <!-- end #content -->

<?php get_footer(); ?>