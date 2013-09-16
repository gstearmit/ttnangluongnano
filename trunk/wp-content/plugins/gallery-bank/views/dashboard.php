<div class="block well" style="min-height:400px;">
	<div class="navbar">
		<div class="navbar-inner">
			<h5><?php _e( "Dashboard", gallery_bank ); ?></h5>
		</div>
	</div>
	<ul class="midnav midnav-font">
		<?php
		global $wpdb;
		$album_count = $wpdb->get_var
		(
			$wpdb->prepare
			(
				"SELECT count(album_id) FROM ".gallery_bank_albums(),""
			)
		);
		if($album_count < 2)
		{
		?>
		<li>
			<a href="admin.php?page=add_album" class="hovertip" data-original-title="<?php _e( "Add New Album", gallery_bank ); ?>">
				<img src="<?php echo GALLERY_BK_PLUGIN_URL . '/assets/images/icons/color/photography.png'?>"/>
				<span><?php _e( "Add New Album", gallery_bank ); ?></span>
			</a>
		</li>
		<?php
		}
		?>
		<li>
			<a href="admin.php?page=settings" class="hovertip" data-original-title="<?php _e( "Global Settings", gallery_bank ); ?>">
				<img src="<?php echo GALLERY_BK_PLUGIN_URL . '/assets/images/icons/color/config.png'?>"/>
				<span><?php _e( "Global Settings", gallery_bank ); ?></span>
			</a>
		</li>
		<li>
			<a href="#" class="hovertip" data-original-title="<?php _e( "Delete All Albums", gallery_bank ); ?>" onclick="delete_all_albums();" >
				<img src="<?php echo GALLERY_BK_PLUGIN_URL . '/assets/images/icons/color/busy.png'?>"/>
				<span><?php _e( "Delete All Albums", gallery_bank ); ?></span>
			</a>
		</li>
	</ul>
	<div class="body" style="margin:10px;">
		<div class="separator-doubled"></div>
		<div class="block well">
			<div class="navbar">
				<div class="navbar-inner">
					<h5><?php _e( "Existing Albums Overview", gallery_bank ); ?></h5>
				</div>
			</div>
			<div class="body">
				<div class="table-overflow">
					<table class="table table-striped" id="data-table-album">
						<thead>
							<tr>
								<th><?php _e( "Album Title", gallery_bank ); ?></th>
								<th><?php _e( "Images in Album", gallery_bank ); ?></th>
								<th><?php _e( "Published By", gallery_bank ); ?></th>
								<th><?php _e( "Date of Creation", gallery_bank ); ?></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php
						$album = $wpdb->get_results
						(
							$wpdb->prepare
							(
								"SELECT * FROM ".gallery_bank_albums(),""
							)
						);
						for($flag=0; $flag < count($album); $flag++)
						{
							$count_pic = $wpdb->get_var
							(
								$wpdb->prepare
								(
									"SELECT count(".gallery_bank_albums().".album_id) FROM ".gallery_bank_albums()." join ".gallery_bank_pics()." on ".gallery_bank_albums().".album_id =  ".gallery_bank_pics().".album_id where ".gallery_bank_albums().".album_id = %d ",
									$album[$flag]->album_id
								)
							);
						?>
							<tr>
								<td><?php echo stripcslashes(htmlspecialchars_decode($album[$flag] -> album_name));?></td>
								<td><?php echo $count_pic;?></td>
								<td><?php echo $album[$flag] -> author;?></td>
								<td><?php echo date("d-M-Y", strtotime($album[$flag] -> album_date));?></td>
								<td>
									<ul class="table-controls">
										<li>
											<a href="admin.php?page=edit_album&album_id=<?php echo $album[$flag]->album_id;?>" class="btn hovertip" data-original-title="<?php _e( "Edit Album", gallery_bank ); ?>">
												<i class="icon-pencil"></i>
											</a>
										</li>
										<li>
											<a href="admin.php?page=images_sorting&album_id=<?php echo $album[$flag]->album_id;?>" class="btn hovertip" data-original-title="<?php _e( "Re-order Images", gallery_bank ); ?>">
												<i class="icon-th"></i>
											</a>
										</li>
										<li>
											<a href="admin.php?page=album_preview&album_id=<?php echo $album[$flag]->album_id;?>" class="btn hovertip" data-original-title="<?php _e( "Preview Album", gallery_bank ); ?>">
												<i class="icon-eye-open"></i>
											</a>
										</li>
										<li>
											<a class="btn hovertip" style="cursor: pointer;" data-original-title="<?php _e( "Delete Album", gallery_bank ); ?>" onclick="delete_album(<?php echo $album[$flag]->album_id;?>)">
												<i class="icon-trash"></i>
											</a>
										</li>
									</ul>
								</td>
							</tr>
						<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	oTable = jQuery('#data-table-album').dataTable
		({
			"bJQueryUI": false,
			"bAutoWidth": true,
			"sPaginationType": "full_numbers",
			"sDom": '<"datatable-header"fl>t<"datatable-footer"ip>',
			"oLanguage": 
			{
				"sLengthMenu": "<span>Show entries:</span> _MENU_"
			},
			"aaSorting": [[ 0, "asc" ]],
			"aoColumnDefs": [{ "bSortable": false, "aTargets": [4] }]
		});
	function delete_album(album_id) 
	{
			bootbox.confirm("<?php _e( "Are you sure you want to delete this Album?", gallery_bank ); ?>", function(confirmed)
			{
				console.log("Confirmed: "+confirmed);
				if(confirmed == true)
				{
					jQuery.post(ajaxurl, "album_id="+album_id+"&param=Delete_album&action=album_gallery_library", function(data)
					{
						
							var check_page = "<?php echo $_REQUEST['page']; ?>";
							window.location.href = "admin.php?page="+check_page;
						
					});
				}
			});
	}
	function delete_all_albums()
		{
			bootbox.confirm("<?php _e("Are you sure you want to delete all Albums ?", gallery_bank ); ?>", function(confirmed) 
			{
				console.log("Confirmed: "+confirmed);
				if(confirmed == true)
				{
					jQuery.post(ajaxurl, "&param=delete_all_albums&action=album_gallery_library", function(data)
					{
						var check_page = "<?php echo $_REQUEST['page']; ?>";
						window.location.href = "admin.php?page="+check_page;
					});
					
				}
			});
		}
</script>