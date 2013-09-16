
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
/*
<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/includes/featured_2.php'); ?>
	<div id='homesweets_avali'>
        <?php 
         include (TEMPLATEPATH . '/includes/home_sweets.php');
         include (TEMPLATEPATH . '/includes/home_sweets_adv.php');
        ?>
    </div><!-- id='homesweets_avali' -->

    <div id='homesweets_avali'>
        <div id='float_left_se'>
            <?php 
             include (TEMPLATEPATH . '/includes/home_sweets_catalogue.php');
             include (TEMPLATEPATH . '/includes/can_ho_tieu_chaun.php');
             include (TEMPLATEPATH . '/includes/tinh_nang_noi_bat.php');
             include (TEMPLATEPATH . '/includes/thi_truong_dia_phuong_buoi_sang.php');
             include (TEMPLATEPATH . '/includes/Ho_tay_cuoi_tuan.php');
            ?>
        </div><!-- id='float_left_se' -->
        <?php
        // quang cao ben phai thu 2
         include (TEMPLATEPATH . '/includes/homesweets_dathang.php');
        ?>
    </div><!-- id='homesweets_avali' -->
</div><!-- page-info-->
*/
?>
<?php 


 get_header(); ?>
get_template_part('includes/breadcrumbs'); 
?>

<?php get_template_part('/includes/top_info'); ?>

<div id="content" class="clearfix">
	<div id="left-area">
		<?php get_template_part('includes/entry'); ?>
	</div> 	<!-- end #left-area -->

	<?php //get_sidebar(); ?>
</div> <!-- end #content -->

?>
<?php get_footer(); ?>