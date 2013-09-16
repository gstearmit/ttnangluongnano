
<?php
/* nếu menu là : 
            catalogue thi index.php su lí 
            post thi singe.php xu li 
            page thi page-full.php xu li
    neu menu la Custum thi Post se xu li va cuoi cung thi singe.php  xu li no
    chú ý :  xem phần chỉnh sửa của nó ở đâu để xem trang nào sẽ xử lí nó 
                            chỉnh sửa và edit page
*/?>


<?php 
 get_header(); ?>
 <div id='page-info-wapper'>
    <?php get_template_part('includes/breadcrumbs'); ?>

    <?php //get_template_part('/includes/top_info'); ?>

<div id="content" class="clearfix">
	<div id="left-area">
		<?php get_template_part('includes/entry'); ?>
	</div> 	<!-- end #left-area -->

	<?php //get_sidebar(); ?>
</div> <!-- end #content -->

?>
<?php get_footer(); ?>
</div><!-- id="page-wrap" -->