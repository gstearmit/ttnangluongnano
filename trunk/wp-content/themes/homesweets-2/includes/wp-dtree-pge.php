<?php
function wpdt_get_pages_nodelist($args)
{
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
	// var_dump($pageresults);//die(); // lay đươc hêt  các pid : cha con va id tưng trang rui

	 if($pageresults)
	 {
	 	foreach($pageresults as $pageresult)
	 	 {
			$lay_duoc_trang_can_hien = array( 'id' => $pageresults[32]->ID, 'pid' => $pageresults[32]->post_parent, 'url' => esc_url(get_permalink($pageresults[32]->ID)), 'name' => strip_tags(apply_filters('the_title', $pageresults[32]->post_title)), 'title' => '');
			if($pageresults[32]->post_parent == 0){$has_root_connection = true;}
			// gan vao mang $arr de hin thi ra ngoai
			//$arr[0] = $lay_duoc_trang_can_hien;
	 	}
	 }

	$has_root_connection = false;
if($pageresults)
	{
			foreach($pageresults as $pageresult)
		{
			// luu tat ca cac page
			$nodedata[$idcount] = array( 'id' => $pageresult->ID, 'pid' => $pageresult->post_parent, 'url' => esc_url(get_permalink($pageresult->ID)), 'name' => strip_tags(apply_filters('the_title', $pageresult->post_title)), 'title' => '');

			if($pageresult->post_parent == 0){$has_root_connection = true;}
			$idcount++;

	}
	//echo 'nodedata- lay tu dau';var_dump($nodedata);//die();// co duoc het cac pid cua cha va con


		$i = 1;$arr= array();
		foreach($nodedata as $key => $node)
		{

			if($node['pid'] == 0){continue;} //connected to root.
			$hasparent = false;
				if($lay_duoc_trang_can_hien['id'] == $node['pid'])
				{
						$arr[$i++] = $node;
					    $hasparent = true; //break;
				}
			if(!$hasparent){$nodedata[$key]['pid'] = 0;} //connect orphans to root.
		}

	}//end .if($pageresults)

  // echo'tree pade';var_dump($arr);//die();





	// luu tat ca cac pic moi
$root_connection = false;
 if($pageresults)
{

		foreach($pageresults as $pageresult)
		{
			// luu tat ca cac page
			$dulieulaplai[$idpidcount] = array( 'id' => $pageresult->ID, 'pid' => $pageresult->post_parent, 'url' => esc_url(get_permalink($pageresult->ID)), 'name' => strip_tags(apply_filters('the_title', $pageresult->post_title)), 'title' => '');

			if($pageresult->post_parent == 0){$root_connection = true;}
			$idpidcount++;

	}

	$j =1 ; $array_con =array();$m=0;

	    foreach ($arr as $key =>$value )
			 {

				foreach($dulieulaplai as $lap_lay_pid =>$id_pid)
					   		{
					   			if($id_pid['pid'] == 0){continue;} //connected to root.

					   			$Co_parent = false;

								if($id_pid['pid'] == $arr[$key]['id'])
								    {
										$array_con[$m++] = $id_pid;
										$Co_parent = true; //break;
								    }

							}

			}
}
var_dump($array_con);die();

	return $arr;
}
?>