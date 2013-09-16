<div class="entry">
<!--If no results are found-->
	<h1><?php esc_html_e('Không tìm thấy kết quả','Chameleon'); ?></h1>
	<p><?php esc_html_e('Trang bạn yêu cầu không thể được tìm thấy. Hãy thử tinh chỉnh tìm kiếm của bạn, hoặc sử dụng điều hướng trên để xác định vị trí các bài.','Chameleon'); ?></p>
</div>
<!--End if no results are found-->
   <?php
	   // $forwardUrl = 'http://www.maybanhang.net';
		//header('Location: '.$forwardUrl);
	?>

	<?php
	header("HTTP/1.1 301 Moved Permanently");
	header("Location:".get_bloginfo('url'));
	exit();
	?>
