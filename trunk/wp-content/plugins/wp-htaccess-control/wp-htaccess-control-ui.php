<?php
$debug=false;

$plugin_path = WP_CONTENT_DIR.'/plugins/'.plugin_basename(dirname(__FILE__));
$plugin_url = WP_CONTENT_URL.'/plugins/'.plugin_basename(dirname(__FILE__));
$q=explode('&',$_SERVER['QUERY_STRING']);
$purl='http'.((!empty($_SERVER['HTTPS'])) ? 's' : '').'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$q[0];
global $WPhtc, $echo;
$WPhtc->page_action();

?>
<div id="wphtc-page" class="wrap">
	<h2>Wp htaccess Control</h2>
	<?php 
	if(!current_user_can("administrator")) {
		echo '<p>'.__('Please log in as admin','wp-htaccess-control').'</p>';
		return;
		}
	?>
	<div id="wphtc-sidebar">
		<div class="wphtc-section">
			<div class="wphtc-section-title stuffbox">
				<!--<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>-->
				<h3><?php _e('About this Plugin', 'wp-htaccess-control'); ?></h3>
			</div>
			<div class="wphtc-inputs">
				<ul>
					<li><a href="http://antonioandra.de/wp-htaccess-control"><img width="16" height="16" src="<?php echo $plugin_url?>/images/antonioandra.de_favicon.png"> Plugin Homepage</a></li>
					<li><a href="http://wordpress.org/extend/plugins/wp-htaccess-control/"><img src="<?php echo $plugin_url?>/images/favicon.ico"> Plugin at Wordpress.org </a></li>
					<li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=s4mancha%40gmail%2ecom&lc=US&item_name=WP%20htaccess%20Control%20%28Antonio%20Andrade%29&no_note=0&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest"><img width="16" height="16" src="<?php echo $plugin_url?>/images/pp_favicon_x.ico"> Donate with Paypal</a></li>
				</ul>
			</div>
		</div>
		<div class="wphtc-section">
			<div class="wphtc-section-title stuffbox">
				<h3><?php _e('Latest donations', 'wp-htaccess-control'); ?></h3>
			</div>
			<div class="wphtc-inputs">
				<iframe width="220" src="http://antonioandra.de/wp-htaccess-control-donations"></iframe>
			</div>
		</div>
		<p id="foot">WP htaccess Control <?php _e('by', 'wp-htaccess-control'); ?> António Andrade</p>
	</div>
	<div id="wphtc-main">
		<form method="post" action="<?php echo $purl?>">
			<?php if($echo!=''){?>
				<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204);"><p><?php echo $echo;?></p></div>
			<?php }
			# Donation Message
			if($WPhtc->data['donation_hidden_time']&&$WPhtc->data['donation_hidden_time']<time()){?>
				<div class="updated">
					<p>
						<strong>Is this plugin useful? Consider making a donation encouraging me to continue supporting it!</strong>
						<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=s4mancha%40gmail%2ecom&lc=US&item_name=WP%20htaccess%20Control%20%28Antonio%20Andrade%29&no_note=0&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest"><img alt="Donate" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/btn/btn_donate_SM.gif"></a>
						<span><a href="<?php echo $purl?>&action=hide_donation_message">Hide this message</a></span>
					</p>
				</div>
			<?php }?>
			
			<!-- INSTRUCTIONS -->
			<div class="wphtc-section permanently-open">
				<div class="wphtc-section-title stuffbox">
					<h3><?php _e('Introduction', 'wp-table-of-paginated-contents');?></h3>
				</div>
				<table class="form-table wphtc-inputs start-open">
					<tr valign="top">
						<th scope="row" style="width:18%;"></th>
						<td >
							<p class="description"><?php _e('This plugin has made such a long way that it should really now be called <strong>WP htaccess and Rewrite Control</strong>.', 'wp-htaccess-control');?></p>
							<p class="description"><?php _e('Many core parts of WP htaccess Control have been almost completely re-done in version 3.0 with the goal of providing an universal solution. This means that you can now selectively remove base slugs and create full archives for any custom taxonomy in addiction to the previous Category and Post tags.', 'wp-htaccess-control');?></p>
							<p class="description"><?php _e('This changes also mean that some unforeseen issues might arise. Please report them. If your setup seems to get out of control there are a few easy options to reverse all changes: 1) Click on "Reset all rules", at the bottom of this page; 2) rename/delete the plugin folder and re-submit your permalink settings under "Settings > Permalinks" and 3) if the previous did not solve your issue, remove the .htaccess file on your blog\'s root directory and repeat step 2; 4) in such cases you might want to get back back to the last version you knew working, which you\'ll find at http://wordpress.org/extend/plugins/wp-htaccess-control/download/.', 'wp-htaccess-control');?></p>
						</td>
					</tr>
				</table>
			</div>
			
			<!-- Custom Author Permalink -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Custom Author Permalink', 'wp-htaccess-control');?></h3>
				</div>
				<table class="form-table wphtc-inputs">
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Author Base', 'wp-htaccess-control'); ?></th>
						<td >
							<input type="text" name="WPhtc_cap" value="<?php echo $WPhtc->data['cap']; ?>" />
							<p><code><?php bloginfo('home')?>/<em><?php _e('(your-base)', 'wp-htaccess-control');?></em>/admin</code></p>
						</td>
						<td valign="middle">
							<p class="description"><?php _e('Permalink settings must be set and not Default (/?p=123).', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('If set, the author base will be used as shown next to the form field.', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('If you do not want to use a custom Author Permalink base just leave the field empty.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<?php if(class_exists('GoogleSitemapGeneratorLoader')){?>
						<tr valign="top">
							<th>Google XML Sitemap</th>
							<td>
								<input type="checkbox" name="WPhtc_sm_enabled" value="true" <?php if($WPhtc->data['sm_enabled']){ echo "checked";}?>/> <?php _e('Apply Custom Author Permalink on Generated Sitemap', 'wp-htaccess-control'); ?>
							</td>
							<td valign="middle" >
								<p class="description"><?php _e('Leave "Include author pages" unchecked on Google XML Sitemap options page if using this.', 'wp-htaccess-control'); ?></p>
								<p class="description"><?php _e('However, if you want to adjust the "Priority" or "Change frequency" you should do so on the <a href="options-general.php?page=google-sitemap-generator/sitemap.php">Google XML Sitemap options page</a>.', 'wp-htaccess-control'); ?></p>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<!-- Custom Pagination Permalink -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Custom Pagination Permalink', 'wp-htaccess-control');?></h3>
				</div>
				<table class="form-table wphtc-inputs">
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Page Base', 'wp-htaccess-control'); ?></th>
						<td >
							<input type="text" name="WPhtc_cpp" value="<?php echo $WPhtc->data['cpp']; ?>" />
							<p><code><?php bloginfo('home')?>/<em><?php _e('(your-base)', 'wp-htaccess-control');?></em>/2</code></p>
						</td>
						<td valign="middle">
							<p class="description"><?php _e('Permalink settings must be set and not Default (/?p=123).', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('If set, the page base will be used as shown next to the form field in every post listing (category, tag, archive, etc).', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('If you do not want to use a custom Pagination Permalink base just leave the field empty.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
				</table>
			</div>
			<!-- Custom Search Permalink -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Custom Search Permalink', 'wp-htaccess-control');?></h3>
				</div>
				<table class="form-table wphtc-inputs">
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Search Base', 'wp-htaccess-control'); ?></th>
						<td >
							<input type="text" name="WPhtc_custom_search_permalink" value="<?php echo $WPhtc->data['custom_search_permalink']; ?>" />
							<p><code><?php bloginfo('home')?>/<em><?php _e('(your-base)', 'wp-htaccess-control');?></em>/search-term</code></p>
						</td>
						<td valign="middle">
							<p class="description"><?php _e('Permalink settings must be set and not Default (/?p=123).', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('If set, the search base will always be used instead of "?s=search-term".', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('If you do not want to use a custom Search Permalink base just leave the field empty.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
				</table>
			</div>
			<!-- Remove Taxonomies and Author Base -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Remove Taxonomies and Author Base', 'wp-htaccess-control');?></h3>
				</div>
				<table class="form-table wphtc-inputs">
					<!-- Remove Author Base -->
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Remove Author Base', 'wp-htaccess-control'); ?></th>
						<td >
							<input type="checkbox" name="WPhtc_remove_author_base" <?php if($WPhtc->data['remove_author_base']){echo "checked=checked";} ?> />
						</td>
						<td valign="middle">
							<p class="description"><?php _e('If active, the author base will be removed from permalinks:'); ?></p>
							<p class="description"><code><?php bloginfo('home')?>/<?php _e('the-author', 'wp-htaccess-control'); ?></code></p>
							<p class="description"><strong><?php _e('Beware:'); ?></strong> <?php _e('This could conflict with the removal of the category base on a situation where a category slug is the same as a user nicename.'); ?></p>
						</td>
					</tr>
					<!-- Remove Taxonomies Base -->
					<?php foreach (get_taxonomies('','objects') as $taxonomy){
						if(!$taxonomy->rewrite){continue;}
						?>
						<tr valign="top">
							<th scope="row" style="width:18%;"><?php _e('Remove', 'wp-htaccess-control'); echo " ".$taxonomy->labels->name." " ; _e('Base', 'wp-htaccess-control'); ?></th>
							<td >
								<input type="checkbox" name="WPhtc_remove_base[<?php echo $taxonomy->name; ?>]" <?php if($WPhtc->data['remove_taxonomy_base'][$taxonomy->name]){echo "checked=checked";} ?> />
							</td>
							<td valign="middle">
								<p class="description"><?php _e('If active, the'); echo " ".$taxonomy->labels->name." "; _e('base will be removed from permalinks:'); ?></p>
								<p class="description"><code><?php bloginfo('home')?>/<?php echo $taxonomy->name;?>_term</code></p>
								<p class="description"><strong><?php _e('Beware:'); ?></strong> <?php _e('This could conflict with the removal of the other permalink bases on a situation where a term slug is the same.'); ?></p>
							</td>
						</tr>
						<?php
						}	
						?>
				</table>
			</div>
			<!-- Advanced Archives -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Advanced Archives', 'wp-htaccess-control');?></h3>
				</div>
				<table class="form-table wphtc-inputs">
					<?php foreach (get_taxonomies('','objects') as $taxonomy){
						if(!$taxonomy->rewrite){continue;}
						?>
						<tr valign="top">
							<th scope="row" style="width:18%;"><?php _e('Create', 'wp-htaccess-control'); echo " ".$taxonomy->labels->name." " ; _e('Archives', 'wp-htaccess-control'); ?></th>
							<td >
								<input type="checkbox" name="WPhtc_create_archive[<?php echo $taxonomy->name; ?>]" <?php if($WPhtc->data['create_archive'][$taxonomy->name]){echo "checked=checked";} ?> />
							</td>
							<td valign="middle">
								<p class="description"><?php _e('If active, taxonomy-based archives will be accessible:', 'wp-htaccess-control'); ?></p>
								<p class="description"><code><?php bloginfo('home')?>/<?php echo $taxonomy->name; ?>_base/<?php echo $taxonomy->name; ?>_term/2010</code></p>
								<p class="description"><code><?php bloginfo('home')?>/<?php echo $taxonomy->name; ?>_base/<?php echo $taxonomy->name; ?>_term/2010/12</code></p>
								<p class="description"><?php _e("This will also work if you've removed the", 'wp-htaccess-control'); ?> <?php echo $taxonomy->labels->name; ?> <?php _e("base.", 'wp-htaccess-control'); ?></p>
							</td>
						</tr>
						<?php
						}	
						?>		
				</table>
			</div>
			<!-- More Rewrite Settings -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('More Rewrite Settings', 'wp-htaccess-control');?></h3>
				</div>
				<table class="form-table wphtc-inputs">
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e("Remove hierarchy", 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="checkbox" name="WPhtc_remove_hierarchy" value="true" <?php if($WPhtc->data['remove_hierarchy']){ echo "checked";}?>/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e("Remove hierarchy from taxonomy permalinks (this might be interesting when removing the category base).", 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<!--<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e(".html suffix", 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="checkbox" name="WPhtc_suffix_html" value="true" <?php if($WPhtc->data['suffix_html']){ echo "checked";}?>/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e("Add '.html' at the end of taxonomy permalinks.", 'wp-htaccess-control'); ?></p>
						</td>
					</tr>-->
				</table>
			</div>
			<!-- Custom htaccess -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Custom htaccess', 'wp-htaccess-control'); ?></h3>
				</div>
				<table class="form-table wphtc-inputs">
					<tr valign="top">
						<td>
							<textarea name="WPhtc_hta" style="width:100%;" rows="7"><?php echo stripslashes($WPhtc->data['hta']); ?></textarea>
						</td>
						<td style="width:50%;">
							<p class="description"><?php _e('This rules will be printed before any Wordpress rules.', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('Please double check them before saving as a mistake could make your site inaccessible.', 'wp-htaccess-control'); ?></p>
							<ul class="description">
								<li><a href="http://www.google.com/search?q=htaccess+tutorial" title="Search for htaccess tutorials"><img width="16px" src="http://google.com/favicon.ico" alt="google favicon"> htaccess tutorial</a></li>
								<li><a href="http://httpd.apache.org/docs/current/howto/htaccess.html" title="Read about htaccess at apache.org"><img width="16px" src="http://apache.org/favicon.ico" alt="apache favicon"> htaccess</a></li>
								<li><a href="http://httpd.apache.org/docs/current/mod/mod_rewrite.html" title="Read about mod_rewrite at apache.org"><img width="16px" src="http://apache.org/favicon.ico" alt="apache favicon"> mod_rewrite</a></li>
							</ul>
						</td>
					</tr>
				</table>
			</div>
			<!-- Replace Wordpress htaccess -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Replace Wordpress htaccess', 'wp-htaccess-control'); ?></h3>
				</div>
				<table class="form-table wphtc-inputs">
					<tr valign="top">
						<td>
							<textarea name="WPhtc_wp_hta" style="width:100%;" rows="7" <?php if($WPhtc->data['jim_morgan_hta']){ echo "readonly='true' class='readonly'";}?>><?php echo stripslashes($WPhtc->data['wp_hta']); ?></textarea>
							<p class="description"><?php _e('Leave empty for default.', 'wp-htaccess-control'); ?></p>
							<p><input type="checkbox" name="WPhtc_jim_morgan_hta" value="true" <?php if($WPhtc->data['jim_morgan_hta']){ echo "checked";}?>/> 
							<?php _e("<strong>Use <a href='http://www.webmasterworld.com/apache/4053973.htm'>Jim Morgan's wordpress htaccess</a></strong> (has been reported to \"speed up your WP mod_rewrite code by a factor of more than two\")", 'wp-htaccess-control'); ?></p>
						</td>
						<td style="width:50%;">
							<p class="description"><?php _e('This rules will be printed instead of Wordpress rules.', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('Please double check them before saving as a mistake could make your site inaccessible.', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('Original rules:', 'wp-htaccess-control'); ?></p>
							<p class="description">
								<code><?php echo nl2br(htmlspecialchars(substr($WPhtc->data['htaccess_original'],0,-1)));?></code>
							</p>
						</td>
					</tr>
				</table>
			</div>
			<!-- htaccess Suggestions -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('htaccess Suggestions', 'wp-htaccess-control'); ?></h3>
				</div>
				<table class="form-table wphtc-inputs">
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('ServerSignature', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="checkbox" name="WPhtc_disable_serversignature" value="true" <?php if($WPhtc->data['disable_serversignature']){ echo "checked";}?>/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('Disable the ServerSignature on server generated error pages.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Indexes', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="checkbox" name="WPhtc_disable_indexes" value="true" <?php if($WPhtc->data['disable_indexes']){ echo "checked";}?>/>
						</td>
						<td valign="middle">
							<p class="description"><?php _e('Disable directory browsing.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Protect wp-config.php file', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="checkbox" name="WPhtc_protect_wp_config" value="true" <?php if($WPhtc->data['protect_wp_config']){ echo "checked";}?>/>						</td>
						<td valign="middle">
							<p class="description"><?php _e('Deny access to wp-config.php file.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Protect htaccess file', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="checkbox" name="WPhtc_protect_htaccess" value="true" <?php if($WPhtc->data['protect_htaccess']){ echo "checked";}?>/>					</td>
						<td valign="middle">
							<p class="description"><?php _e('Deny access to .htaccess file.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Protect comments.php', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="checkbox" name="WPhtc_protect_comments" value="true" <?php if($WPhtc->data['protect_comments']){ echo "checked";}?>/>					</td>
						<td valign="middle">
							<p class="description"><?php _e('Deny comment posting to no referrer requests. This will avoid spam bots coming from nowhere.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('mod_gzip', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="checkbox" name="WPhtc_gzip" value="true" <?php if($WPhtc->data['gzip']){ echo "checked";}?>/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('Use mod_gzip if available.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('mod_deflate', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="checkbox" name="WPhtc_deflate" value="true" <?php if($WPhtc->data['deflate']){ echo "checked";}?>/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('Use mod_deflate if available.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Limit Upload Size', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="text" name="WPhtc_up_limit" value="<?php echo $WPhtc->data['up_limit']?>"/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('If set, this value in MB will be used as limit to file uploads.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Admin Email', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;">
							<input type="text" name="WPhtc_admin_email" value="<?php echo $WPhtc->data['admin_email']?>"/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('If set, this will be used as the admin email on server generated error pages.', 'wp-htaccess-control'); ?></p>
							</td>
					</tr>				
					<tr valign="top">
						<th scope="row"><?php _e('Disable image hotlinking', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;">
							<input type="text" name="WPhtc_disable_hotlink" value="<?php echo $WPhtc->data['disable_hotlink']?>"/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('If set, this url will be used as redirection to hotlinked images (you should be using an image url here). If you prefer no output on hotlinked images use "_".', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('Disable file hotlinking extensions', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;">
							<input type="text" name="WPhtc_disable_file_hotlink_ext" value="<?php echo $WPhtc->data['disable_file_hotlink_ext']?>"/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('If set, this file extensions will not be hotlinkable.', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('Separate different extensions with a white-space, ie: "pdf doc zip".', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('File hotlinking redirection', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;">
							<input type="text" name="WPhtc_disable_file_hotlink_redir" value="<?php echo $WPhtc->data['disable_file_hotlink_redir']?>"/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('If set, this url will be used as redirection for hotlinked files.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('500 error', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="text" name="WPhtc_redirect_500" value="<?php echo $WPhtc->data['redirect_500']?>"/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('If set, this path will be used as page to 500 errors (example: /error.php).', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e('403 error', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<input type="text" name="WPhtc_redirect_403" value="<?php echo $WPhtc->data['redirect_403']?>"/>			
						</td>
						<td valign="middle">
							<p class="description"><?php _e('If set, this path will be used as page to 403 errors (example: /error.php).', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row" valign="middle"><?php _e('Canonical Url', 'wp-htaccess-control'); ?></th>
						<td style="width:3%;" valign="middle">
							<select name="WPhtc_canon">
								<option value=""></option>
								<option value="www" <?php if($WPhtc->data['canon']=='www'){echo "selected";} ?>><?php _e('Force WWW', 'wp-htaccess-control'); ?></option>
								<option value="simple" <?php if($WPhtc->data['canon']=='simple'){echo "selected";} ?>><?php _e('Force non-WWW', 'wp-htaccess-control'); ?></option>
							</select>	
						</td>
						<td valign="middle">
							<p class="description"><?php _e('This will force canonization. This will be done by simply modifying the wordpress "site url" and "home" options (not htaccess).', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
				</table>
			</div>
			<!-- Maintenance Mode -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Maintenance Mode', 'wp-htaccess-control'); ?></h3>
				</div>				
				<table class="form-table wphtc-inputs">
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Maintenance Active', 'wp-htaccess-control'); ?></th>
						<td valign="middle">
							<input type="checkbox" name="WPhtc_maintenance_active" value="true" <?php if($WPhtc->data['maintenance_active']){ echo "checked";}?>/>	
						</td>
						<td valign="middle">
							<p class="description"><?php _e('Toggles Maintenance Mode.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Allowed IPs', 'wp-htaccess-control'); ?></th>
						<td>
							<textarea name="WPhtc_maintenance_ips"><?php if(isset($WPhtc->data['maintenance_ips'])){echo implode($WPhtc->data['maintenance_ips'],"\n");}?></textarea>
						</td>
						<td  valign="middle">
							<p class="description"><?php _e('List of allowed IPs.', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('All the IPs not listed will view the 403 error page or be redirected to a page set below.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Redirection', 'wp-htaccess-control'); ?></th>
						<td>
							<input type="text" name="WPhtc_maintenance_redirection" value="<?php echo $WPhtc->data['maintenance_redirection']?>"/>				
						</td>
						<td  valign="middle">
							<p class="description"><?php _e('If set, this will be used as redirection for disallowed IPs. This could be an external url or a document on your server (local paths begin with a trailing slash)', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
				</table>
			</div>
			<!-- Login Control -->
			<div class="wphtc-section">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Login Control', 'wp-htaccess-control'); ?></h3>
				</div>				
				<table class="form-table wphtc-inputs">
					<tr valign="top">
						<th scope="row" style="width:18%;"></th>
						<td valign="middle" colspan="2">
							<p class="description"><?php _e('The options below concern wp-login.php. You\'ll be able to redirect all traffic away from that page and set some allowed IPs.', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('BEWARE: once disabled you won\'t be able to login through that form in any way, except for the listed IPs.', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('If everything goes wrong directly edit your .htaccess file and delete the relevant part somewhere at the top.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Disable wp-login.php', 'wp-htaccess-control'); ?></th>
						<td>
							<input type="checkbox" name="WPhtc_login_disabled" value="true" <?php if($WPhtc->data['login_disabled']){ echo "checked";}?>/>				
						</td>
						<td  valign="middle">
							<p class="description"><?php _e('This is the main switch. Make sure you know what you\'re doing.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Redirect', 'wp-htaccess-control'); ?></th>
						<td valign="middle">
							<input type="text" name="WPhtc_login_redirection" value="<?php echo $WPhtc->data['login_redirection']?>"/>
						</td>
						<td valign="middle">
							<p class="description"><?php _e('This will be used as redirection url. You might use something like "member-login" to redirect people to "http://yoursite.com/member-login/". If empty the home page will be served as redirection.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Allowed IPs', 'wp-htaccess-control'); ?></th>
						<td>							
							<textarea name="WPhtc_login_ips"><?php if(isset($WPhtc->data['login_ips'])){echo implode($WPhtc->data['login_ips'],"\n");}?></textarea>
						</td>
						<td  valign="middle">
							<p class="description"><?php _e('List of IPs allowed to access wp-login.php.', 'wp-htaccess-control'); ?></p>
							<p class="description"><?php _e('Make sure you are have a static IP when using this.'); ?></p>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row" style="width:18%;"><?php _e('Half-mode', 'wp-htaccess-control'); ?></th>
						<td>
							<input type="checkbox" name="WPhtc_login_half_mode" value="true" <?php if($WPhtc->data['login_half_mode']){ echo "checked";}?>/>				
						</td>
						<td  valign="middle">
							<p class="description"><?php _e('(BETA) If set, this will still allow access to POST (login) requests, logout and to the password recovery form. I don\'t think this is very useful at the moment (login error messages will still show up on wp-login.php) but may be helpful for AJAX use.', 'wp-htaccess-control'); ?></p>
						</td>
					</tr>
				</table>
			</div>
			<?php wp_nonce_field('WPhtc_settings'); ?>
			<input type="hidden" name="action" value="update" />
			<div class="wphtc-menu">
				<a class="button-secondary" href="<?php echo wp_nonce_url($purl."&action=reset_rules", 'WPhtc_reset_settings'); ?>"><?php _e('Reset all rules', 'wp-htaccess-control'); ?></a>
				<input type="submit" class="button-primary" value="<?php _e('Save all changes', 'wp-htaccess-control'); ?>" />
			</div>
		</form>
		<div class="wphtc-section">
			<div class="wphtc-section-title stuffbox">
				<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
				<h3><?php _e('Current htaccess file as it is generated by Wordpress', 'wp-htaccess-control'); ?></h3>
			</div>
			<div class="wphtc-inputs start-open">
				<p>
					<code><?php echo str_replace(array("&lt;br /&gt;","&lt;br/&gt;"),"<br/>",htmlspecialchars($WPhtc->data['cur_hta']));?></code>
				</p>
			</div>
		</div>
		<?php if($debug){?>
			<div class="wphtc-section start-open">
				<div class="wphtc-section-title stuffbox">
					<div title="Click to toggle" class="handlediv" style="background:url('<?php bloginfo("wpurl")?>/wp-admin/images/menu-bits.gif') no-repeat scroll left -111px transparent"><br></div>
					<h3><?php _e('Debug Data', 'wp-htaccess-control'); ?></h3>
				</div>
				<div class="wphtc-inputs">
						<pre>
							<?php print_r($WPhtc->data);?>
						</pre>
						
						<pre>
							<?php global $wp_rewrite; print_r($wp_rewrite);?>
						</pre>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
