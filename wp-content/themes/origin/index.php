<?php get_header();
include (TEMPLATEPATH . '/inc/featured.php');
?>
    <div id='homesweets_avali'>
        <?php 
        include (TEMPLATEPATH . '/inc/home_sweets.php');
        include (TEMPLATEPATH . '/inc/home_sweets_adv.php');
        ?>
    </div><!-- id='homesweets_avali' -->

    <div id='homesweets_avali'>
        <div id='float_left_se'>
            <?php 
            include (TEMPLATEPATH . '/inc/home_sweets_catalogue.php');
            include (TEMPLATEPATH . '/inc/can_ho_tieu_chaun.php');
            include (TEMPLATEPATH . '/inc/tinh_nang_noi_bat.php');
            include (TEMPLATEPATH . '/inc/thi_truong_dia_phuong_buoi_sang.php');
            include (TEMPLATEPATH . '/inc/Ho_tay_cuoi_tuan.php');
            ?>
        </div><!-- id='float_left_se' -->
        <?php
        // quang cao ben phai thu 2
        include (TEMPLATEPATH . '/inc/homesweets_dathang.php');
        ?>
    </div><!-- id='homesweets_avali' -->
</div><!-- page-info-->
<?php get_footer(); ?>