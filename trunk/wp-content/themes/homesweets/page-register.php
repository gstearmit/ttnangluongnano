<?php session_start();
/*
Template Name: Register Page
*/
?>

<?php
	function checkEmailExists($email){
		$exists = 0;
		$url_domain = 'http://ws.maybanhang.net:8180/EzRest/rest/web';
		$url_domain_email = $url_domain.'/getAccountByEmail?e='.$email;
		$chEmail = curl_init($url_domain_email);

		//curl_setopt($chEmail, CURLOPT_USERPWD, "web:513ff453#9G!%0kjh2454h8jndskb34434");
		
		$timeout = 10; //set to zero for no timeout
		curl_setopt ($chEmail, CURLOPT_URL, $url_domain_email);
		curl_setopt ($chEmail, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt ($chEmail, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_content_emails = curl_exec($chEmail);

		curl_close($chEmail);

		if (!$file_content_emails){
			$exists = 2;
		}else {
			$phpObj_email = json_decode($file_content_emails, true);
			$exists = $phpObj_email["dataValue"];
		}
		return $exists;
	}

	function checkContactPhoneExists($contactPhone){
		$exists = 0;
		$url_domain = 'http://ws.maybanhang.net:8180/EzRest/rest/web';
		$url_domain_phone = $url_domain.'/getAccountByUserName?u='.$contactPhone;
		$chPhone = curl_init($url_domain_phone);

		//curl_setopt($chPhone, CURLOPT_USERPWD, "web:513ff453#9G!%0kjh2454h8jndskb34434");
		
		$timeout = 10; //set to zero for no timeout
		curl_setopt ($chPhone, CURLOPT_URL, $url_domain_phone);
		curl_setopt ($chPhone, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt ($chPhone, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_content_phones = curl_exec($chPhone);

		curl_close($chPhone);
		
		if (!$file_content_phones){
			$exists = 2;
		}else {
			$phpObj_phone = json_decode($file_content_phones, true);
			$exists = $phpObj_phone["dataValue"];
		}
		return $exists;
	}

	function getIndustryName($industryId){
		$industryName = "";
		switch ($industryId){
			case "1":
				$industryName = "Điện thoại viễn thông";
				break;
			case "2":
				$industryName = "Điện tử, điện lạnh";
				break;
			case "3":
				$industryName = "Ô tô, xe máy";
				break;
			case "4":
				$industryName = "Thời trang";
				break;
			case "5":
				$industryName = "Thực phẩm, đồ uống";
				break;
			case "6":
				$industryName = "Đồ dùng gia đình";
				break;
			case "7":
				$industryName = "Giáo dục, đào tạo";
				break;
			case "8":
				$industryName = "Sách báo, văn phòng phẩm";
				break;
			case "9":
				$industryName = "Đồ chơi, giải trí";
				break;
			case "10":
				$industryName = "Sức khỏe, y tế";
				break;
			case "11":
				$industryName = "Nội ngoại thất";
				break;
			case "12":
				$industryName = "Máy móc, thiết bị";
				break;
			case "13":
				$industryName = "Thủ công mỹ nghệ";
				break;
			case "14":
				$industryName = "Hoa, quà tặng";
				break;
			case "15":
				$industryName = "Du lịch, dịch vụ";
				break;
			case "16":
				$industryName = "Bán lẻ";
				break;
			case "17":
				$industryName = "Khác";
				break;
			default:
				$industryName = "";
		}
		return $industryName;
	}

	function getPurpose($accountType){
		$purpose = "";
		switch ($accountType){
			case "1":
				$purpose = "Tôi đã có cửa hàng, đang cần mua phần mềm để quản lý";
				break;
			case "2":
				$purpose = "Tôi sắp mở cửa hàng, có thể sẽ cần mua phần mềm quản lý";
				break;
			case "3":
				$purpose = "Tôi không có cửa hàng, chỉ muốn tìm hiểu tính năng phần mềm";
				break;
			default:
				$purpose = "";
		}
		return $purpose;
	}

	function getServiceName($serviceId){
		$serviceName = "";
		switch ($serviceId){
			case "2":
				$serviceName = "Cơ bản (Cửa hàng nhỏ)";
				break;
			case "3":
				$serviceName = "Nâng cao (Siêu thị mini)";
				break;
			case "4":
				$serviceName = "Chuỗi cửa hàng";
				break;
			default:
				$serviceName = "";
		}
		return $serviceName;
	}

	function getStateName($stateId){
		$stateName = "";
		switch ($stateId){
			case "1":
				$stateName = "Hà Nội";
				break;
			case "2":
				$stateName = "TP. Hồ Chí Minh";
				break;
			case "3":
				$stateName = "An Giang";
				break;
			case "4":
				$stateName = "Bà Rịa - Vũng Tàu";
				break;
			case "5":
				$stateName = "Bạc Liêu";
				break;
			case "6":
				$stateName = "Bắc Kạn";
				break;
			case "7":
				$stateName = "Bắc Giang";
				break;
			case "8":
				$stateName = "Bắc Ninh";
				break;
			case "9":
				$stateName = "Bến Tre";
				break;
			case "10":
				$stateName = "Bình Dương";
				break;
			case "11":
				$stateName = "Bình Định";
				break;
			case "12":
				$stateName = "Bình Phước";
				break;
			case "13":
				$stateName = "Bình Thuận";
				break;
			case "14":
				$stateName = "Cà Mau";
				break;
			case "15":
				$stateName = "Cao Bằng";
				break;
			case "16":
				$stateName = "Cần Thơ";
				break;
			case "17":
				$stateName = "Đà Nẵng";
				break;
			case "18":
				$stateName = "Đắk Lắk";
				break;
			case "19":
				$stateName = "Đắk Nông";
				break;
			case "20":
				$stateName = "Đồng Nai";
				break;
			case "21":
				$stateName = "Đồng Tháp";
				break;
			case "22":
				$stateName = "Điện Biên";
				break;
			case "23":
				$stateName = "Gia Lai";
				break;
			case "24":
				$stateName = "Hà Giang";
				break;
			case "25":
				$stateName = "Hà Nam";
				break;
			case "26":
				$stateName = "Hà Tĩnh";
				break;
			case "27":
				$stateName = "Hải Dương";
				break;
			case "28":
				$stateName = "Hải Phòng";
				break;
			case "29":
				$stateName = "Hòa Bình";
				break;
			case "30":
				$stateName = "Hậu Giang";
				break;
			case "31":
				$stateName = "Hưng Yên";
				break;
			case "32":
				$stateName = "Khánh Hòa";
				break;
			case "33":
				$stateName = "Kiên Giang";
				break;
			case "34":
				$stateName = "Kon Tum";
				break;
			case "35":
				$stateName = "Lai Châu";
				break;
			case "36":
				$stateName = "Lào Cai";
				break;
			case "37":
				$stateName = "Lạng Sơn";
				break;
			case "38":
				$stateName = "Lâm Đồng";
				break;
			case "39":
				$stateName = "Long An";
				break;
			case "40":
				$stateName = "Nam Định";
				break;
			case "41":
				$stateName = "Nghệ An";
				break;
			case "42":
				$stateName = "Ninh Bình";
				break;
			case "43":
				$stateName = "Ninh Thuận";
				break;
			case "44":
				$stateName = "Phú Thọ";
				break;
			case "45":
				$stateName = "Phú Yên";
				break;
			case "46":
				$stateName = "Quảng Bình";
				break;
			case "47":
				$stateName = "Quảng Nam";
				break;
			case "48":
				$stateName = "Quảng Ngãi";
				break;
			case "49":
				$stateName = "Quảng Ninh";
				break;
			case "50":
				$stateName = "Quảng Trị";
				break;
			case "51":
				$stateName = "Sóc Trăng";
				break;
			case "52":
				$stateName = "Sơn La";
				break;
			case "53":
				$stateName = "Tây Ninh";
				break;
			case "54":
				$stateName = "Thái Bình";
				break;
			case "55":
				$stateName = "Thái Nguyên";
				break;
			case "56":
				$stateName = "Thanh Hóa";
				break;
			case "57":
				$stateName = "Thừa Thiên - Huế";
				break;
			case "58":
				$stateName = "Tiền Giang";
				break;
			case "59":
				$stateName = "Trà Vinh";
				break;
			case "60":
				$stateName = "Tuyên Quang";
				break;
			case "61":
				$stateName = "Vĩnh Long";
				break;
			case "62":
				$stateName = "Vĩnh Phúc";
				break;
			case "63":
				$stateName = "Yên Bái";
				break;
			default:
				$stateName = "";
		}
		return $stateName;
	}

	function registerAccount(){
		$account = '<?xml version="1.0" encoding="UTF-8"?>';
		$account = $account. '<Account>';
		$accountType = $_POST['et_register_form_account_type'];
		if($_POST['et_register_form_account_type'] == "3"){
			$accountType = "0";
		}
		$account = $account. '<AccountType>'.$accountType.'</AccountType>';
		$account = $account. '<Purpose>'.getPurpose($_POST['et_register_form_account_type']).'</Purpose>';
		$account = $account. '<ServiceId>'.$_POST['et_register_form_service'].'</ServiceId>';
		$account = $account. '<AccountFullName>'.trim($_POST['et_register_form_full_name']).'</AccountFullName>';
		$account = $account. '<CompanyName>'.trim($_POST['et_register_form_company_name']).'</CompanyName>';
		$account = $account. '<IndustryId>'.$_POST['et_register_form_industry'].'</IndustryId>';
		$account = $account. '<IndustryName>'.getIndustryName($_POST['et_register_form_industry']).'</IndustryName>';
		$account = $account. '<LocationName>'.trim($_POST['et_register_form_location_name']).'</LocationName>';
		$account = $account. '<StateId>'.$_POST['et_register_form_state'].'</StateId>';
		$account = $account. '<StateName>'.getStateName($_POST['et_register_form_state']).'</StateName>';
		$account = $account. '<Email>'.trim($_POST['et_register_form_email']).'</Email>';
		$account = $account. '<ContactPhone>'.trim($_POST['et_register_form_contact_phone']).'</ContactPhone>';
		$account = $account. '<Mobile>'.trim($_POST['et_register_form_contact_phone']).'</Mobile>';
		$account = $account. '<AccountUsername>'.trim($_POST['et_register_form_contact_phone']).'</AccountUsername>';
		$account = $account. '<AccountPassword>'.$_POST['et_register_form_password'].'</AccountPassword>';
		$account = $account. '<Address></Address>';
		$account = $account. '</Account>';

		$url_domain = 'http://ws.maybanhang.net:8180/EzRest/rest/web';
		$ch = curl_init($url_domain.'/registerAccount');
		
		//curl_setopt($ch, CURLOPT_USERPWD, "web:513ff453#9G!%0kjh2454h8jndskb34434");
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $account);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml', 'Content-Length: '.strlen($account)));

		$result = curl_exec($ch);
		curl_close($ch);

		if ($result){
			$phpObj_account = json_decode($result, true);
			if($phpObj_account["dataValue"] <> "0"){
				return $phpObj_account["dataValue"];
			}
		}

		return '';
	}

	function sendRegisterEmail($accountNo){
		$et_register_email_to = trim($_POST['et_register_form_email']);
		$et_register_email_subject = "Maybanhang.net - Khách hàng đăng ký tài khoản.";
		$et_register_email_header = "From: Maybanhang.net<info@maybanhang.net>";
		$et_register_email_message = '<html>
			<head>
			<style type="text/css">
			div.ex
			{
				width:700px;
				padding:20px;
				border-left:20px solid #EAEAEA;
				border-right:20px solid #EAEAEA;
				border-top:30px solid #EAEAEA;
				border-bottom:30px solid #EAEAEA;
				margin:0px;
			}

			div.subex
			{
				width:640px;
				padding:10px;
				border-left:5px solid #F7F7F7;
				margin:0px;
				background:#F7F7F7;
				margin-left:20px;
			}

			</style>
			</head>
			<body>
			<div class="ex">
				<p style="margin-left:5px;">Xin chào, <label style="color:#5E96E5">'.trim($_POST['et_register_form_full_name']).' </label> ! </p>
				<p style="margin-left:5px;"><label style="font-size:17px;">CÁM ƠN BẠN ĐÃ ĐĂNG KÝ SỬ DỤNG DỊCH VỤ CỦA </label><label style="color:#5E96E5;font-size:17px;font-weight:bold;">  MAYBANHANG.NET ! </label></p>
				<hr noshade size=1 width="700px" style="background:#EAEAEA;">
				<div style="margin-left:5px;">
					<label style="color:5E96E5"> Maybanhang.net </label><label style="color:#5C5C5C">cung cấp dịch vụ quản lý cửa hàng và bán hàng.
					<br/>Bạn có thể sử dụng dịch vụ của chúng tôi để điều hành cửa hàng của mình, thực hiện các nghiệp vụ quan trọng như
					<br/>Bán hàng/ Quản lý kho/ Cập nhật doanh thu hàng ngày,... và nhiều tiện ích khác nữa.
				</div>
				<br/>
				<p style="margin-left:5px;">Địa chỉ truy cập tài khoản của bạn:</p>
				</label>
				<br/>
				<div class="subex">
					<a href ="http://quanly.maybanhang.net">http://quanly.maybanhang.net</a>
					<br/>
				</div>
				<br/>
				<div class="subex">
					<label style="font-weight:bold;">Tên đăng nhập</label><label style="color:#5C5C5C">: '.trim($_POST['et_register_form_contact_phone']).'</label>
					<br/>
					<label style="font-weight:bold;">Mật khẩu</label><label style="color:#5C5C5C">: '.trim($_POST['et_register_form_password']).' </label>
					<br/>
					<label style="font-weight:bold;">Mã cửa hàng</label><label style="color:#5C5C5C">: '.$accountNo.'</label>
					<br/>
				</div>
				<br/>
				<label style="color:#5C5C5C">
				<p style="margin-left:5px;">Bộ phận hỗ trợ của chúng tôi luôn sẵn sàng phục vụ. Xin vui lòng gọi:<p>
				</label>
				<p style="margin-left:5px;">
					<label style="color:#5C5C5C">Hỗ trợ kỹ thuật: 0914400658  &nbsp; |  &nbsp;  Hỗ trợ kinh doanh: 0915400660  &nbsp;  |   &nbsp; hoặc gửi email cho chúng tôi: hotro@maybanhang.net </label>
				</p>
				<label style="color:#5C5C5C">
				<p style="margin-left:5px;">Kính thư!<p>
				<p style="margin-left:5px;">MAYBANHANG.NET<p>
				</label>
			</div>
			</body>
			</html>';

		wp_mail($et_register_email_to, $et_register_email_subject, $et_register_email_message, $et_register_email_header);

		$et_support_email_to = "sale@maybanhang.net";
		$et_support_email_subject = "Maybanhang.net - Khách hàng đăng ký tài khoản.";
		$et_support_email_header = "From: Maybanhang.net<info@maybanhang.net>";
		$et_support_email_message = '<html>
			<body>
			Khách hàng sau vừa đăng ký tài khoản:
			<br/>
			Họ tên : '.trim($_POST['et_register_form_full_name']).'.
			<br/>
			Email: '.trim($_POST['et_register_form_email']).'.
			<br/>
			Số điện thoại : '.trim($_POST['et_register_form_contact_phone']).'.
			<br/>
			Tỉnh : '.getStateName($_POST['et_register_form_state']).'.
			<br/>
			Gói dịch vụ : '.getServiceName($_POST['et_register_form_service']).'.
			<br/>
			Nhu cầu : '.getPurpose($_POST['et_register_form_account_type']).'.
			<br/>
			Mã cửa hàng : '.$accountNo.'.
			<br/>
			Tên cửa hàng : '.trim($_POST['et_register_form_location_name']).'.
			<br/>

			Kính thư!
			<br/>
			http://maybanhang.net
			</body>
			</html>';

		wp_mail($et_support_email_to, $et_support_email_subject, $et_support_email_message, $et_support_email_header);
	}

?>

<?php
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );

	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;

	$et_error_message = '';
	$et_register_form_error = false;

	$baseUrl = $_SERVER['PHP_SELF'];
	$local_ez = $_SERVER["HTTP_HOST"];
	$url_ht=$local_ez.$_SERVER['REQUEST_URI'];
	//var_dump($url_ht);

	if(isset($_POST['et_contact_reset'])){
		$et_register_form_error = true;
		// reload page
		$baseUrl = $_SERVER['PHP_SELF'];
		$local_ez = $_SERVER["HTTP_HOST"];
		$url_ht=$local_ez.$_SERVER['REQUEST_URI'];
		//var_dump($url_ht);
		header('Location:http://'.$url_ht.'');
	}

	if ( isset($_POST['et_register_form_submit_ph']) || isset($_POST['et_contact_reset_ph']) || isset($_POST['register_submit_form_ph'])) {
		if ( !isset($_POST['et_register_form_account_type']) || empty($_POST['et_register_form_account_type']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa nhập Nhu cầu đăng ký. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}

		if ( !isset($_POST['et_register_form_service']) || empty($_POST['et_register_form_service']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa chọn Gói dịch vụ. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}

		if ( !isset($_POST['et_register_form_full_name']) || empty($_POST['et_register_form_full_name']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa nhập Họ tên. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['et_register_form_full_name'])){
			$et_error_message .= '<p>' . esc_html__('Họ tên không được chứa ký tự đặc biệt. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}

		if ( !isset($_POST['et_register_form_company_name']) || empty($_POST['et_register_form_company_name']) ) {
		
		}else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['et_register_form_company_name'])){
			$et_error_message .= '<p>' . esc_html__('Tên công ty không được chứa ký tự đặc biệt. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}
		
		if ( !isset($_POST['et_register_form_industry']) || empty($_POST['et_register_form_industry']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa chọn Ngành nghề kinh doanh. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}

		if ( !isset($_POST['et_register_form_location_name']) || empty($_POST['et_register_form_location_name']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa nhập Tên cửa hàng. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['et_register_form_location_name'])){
			$et_error_message .= '<p>' . esc_html__('Tên cửa hàng không được chứa ký tự đặc biệt. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}

		if ( !isset($_POST['et_register_form_state']) || empty($_POST['et_register_form_state']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa chọn Tỉnh thành. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}

		if ( !isset($_POST['et_register_form_email']) || empty($_POST['et_register_form_email']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa nhập Email. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}else if ( !is_email( $_POST['et_register_form_email'] ) ) {
			$et_error_message .= '<p>' . esc_html__('Email không đúng định dạng. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}else{
			$emailExists = checkEmailExists(trim($_POST['et_register_form_email']));
			if($emailExists == 1){
				$et_error_message .= '<p>' . esc_html__('Email đã tồn tại trong hệ thống. ','Chameleon') . '</p>';
				$et_register_form_error = true;
			}else if($emailExists == 2){
				$et_error_message .= '<p>' . esc_html__('Lỗi xác thực email. ','Chameleon') . '</p>';
				$et_register_form_error = true;
			}
		}

		if ( !isset($_POST['et_register_form_contact_phone']) || empty($_POST['et_register_form_contact_phone']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa nhập Số điện thoại. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}else if(!preg_match("/^[+]{0,1}[0-9]{1,15}$/", $_POST['et_register_form_contact_phone'])) {
			$et_error_message .= '<p>' . esc_html__('Số điện thoại không đúng định dạng. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}else{
			$contactPhoneExists = checkContactPhoneExists(trim($_POST['et_register_form_contact_phone']));
			if($contactPhoneExists == 1){
				$et_error_message .= '<p>' . esc_html__('Số điện thoại đã tồn tại trong hệ thống. ','Chameleon') . '</p>';
				$et_register_form_error = true;
			}else if($contactPhoneExists == 2){
				$et_error_message .= '<p>' . esc_html__('Lỗi xác thực số điện thoại. ','Chameleon') . '</p>';
				$et_register_form_error = true;
			}
		}

		if ( !isset($_POST['et_register_form_password']) || empty($_POST['et_register_form_password']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa nhập Mật khẩu. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}else if ( strlen($_POST['et_register_form_password']) < 6 || strlen($_POST['et_register_form_password']) > 25 ) {
			$et_error_message .= '<p>' . esc_html__('Độ dài mật khẩu không hợp lệ. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}else if ( !isset($_POST['et_register_form_password_confirm']) || empty($_POST['et_register_form_password_confirm']) ) {
			$et_error_message .= '<p>' . esc_html__('Bạn chưa nhập Xác nhận mật khẩu. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}else if ( $_POST['et_register_form_password'] <> $_POST['et_register_form_password_confirm'] ) {
			$et_error_message .= '<p>' . esc_html__('Mật khẩu và Xác nhận mật khẩu không trùng nhau. ','Chameleon') . '</p>';
			$et_register_form_error = true;
		}
	} else {
		$et_register_form_error = true;
    }

	if ( !$et_register_form_error ) {
		$accountNo = registerAccount();
		//sendRegisterEmail($accountNo);
		
		//$_SESSION['et_register_account_no'] = md5($accountNo);
		$baseUrl = $_SERVER['HTTP_HOST'];
		//$forwardUrl = 'http://'.$baseUrl.'/29227736bbfdcd42d2d4c7447b9df8fa.php?794e24d063ebe783f8c098e892c00ebe='.md5($accountNo).'&accountNo='.$accountNo;
		$forwardUrl = 'http://'.$baseUrl.'/dang-ky-thanh-cong';
		header('Location: '.$forwardUrl);
	}
?>

<?php get_header(); ?>

<?php get_template_part('includes/breadcrumbs'); ?>
<?php get_template_part('includes/top_info'); ?>

<div id="content" class="clearfix<?php if($fullwidth) echo(' fullwidth');?>">
	<div id="left-area">
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
			<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages','Chameleon').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			<div id='dk_page_03'>
			
			<div id="et-register">

				<div id="et-contact-message" style="color:#FF0000; margin-left: 10px;">
					<?php echo($et_error_message); ?>
			    </div>

				<?php if ( $et_register_form_error ) { ?>

				<div id='dangki_vistor_r'>

					<form action="<?php echo(get_permalink($post->ID)); ?>" method="post" id="et_register_form">
						<div id='namedangki_form'>
							 <p class="dki_use_m">ĐĂNG KÝ SỬ DỤNG </p>
							 <p id='fontchu_dep_m'>(7 ngày dùng thử miễn phí tất cả các gói)</p>
						</div>

						<ul id="et_contact_left">
							<li id='li_ul_n'>
							    <div id='fontName_n' >Họ tên </div>
							    <div id='ldiv_one' style='float: right;'>
							    	<input id='input_text_w' type="text" name="et_register_form_full_name" value="<?php if ( isset($_POST['et_register_form_full_name']) ) echo esc_attr($_POST['et_register_form_full_name']); ?>" id="et_register_form_full_name"  />
									<div id='Saodo'>*</div>
								</div> <!-- id='ldiv_one'-->
						    </li>

						    <li id='li_ul_n'>
							    <div id='fontName_n' >Điện thoại di động </div>
							    <div id='ldiv_one'>
							   		<input id='input_text_w' type="text" name="et_register_form_contact_phone" value="<?php if ( isset($_POST['et_register_form_contact_phone']) ) echo esc_attr($_POST['et_register_form_contact_phone']); ?>" id="et_register_form_contact_phone"  />
							    	<div id='Saodo'>*</div>
								</div> <!-- id='ldiv_one'-->
						    </li>
						    <div id="dt_dt_n">(Dùng làm tên đăng nhập)</div><!-- id='ldiv_one'-->
							<li id='li_ul_n'>
							    <div id='fontName_phone_note' >Xin vui lòng điền số điện thoại mà bạn đang dùng, sau khi chúng tôi liên lạc với bạn chúng tôi sẽ kích hoạt tài khoản</div>
						    </li>
						    
						    <li id='li_ul_n'>
							    <div id='fontName_n' >Email </div>
							    <div id='ldiv_one'>
							   		<input id='input_text_w' type="text" name="et_register_form_email" value="<?php if ( isset($_POST['et_register_form_email']) ) echo esc_attr($_POST['et_register_form_email']); ?>" id="et_register_form_email"  />
							    	<div id='Saodo'>*</div>
								</div> <!-- id='ldiv_one'-->
						    </li>
						 
						    <li id='li_ul_n'>
							    <div id='fontName_n' >Tên cửa hàng </div>
							    <div id='ldiv_one'>
							    	<input id='input_text_w' type="text" name="et_register_form_location_name" value="<?php if ( isset($_POST['et_register_form_location_name']) ) echo esc_attr($_POST['et_register_form_location_name']); ?>" id="et_register_form_location_name"  />
							    	<div id='Saodo'>*</div>
								</div> <!-- id='ldiv_one'-->
						    </li>

						    <li id='li_ul_n'>
							    <div id='fontName_num' >Mật khẩu </div>
							     <div id='ldiv_one'>
							    	<input id='input_text_wi' type="password" name="et_register_form_password" value="<?php if ( isset($_POST['et_register_form_password']) ) echo esc_attr($_POST['et_register_form_password']); ?>" id="et_register_form_password"  />
							    	<div id='Saodo_next'>*</div>
								</div> <!-- id='ldiv_one'-->
						    </li>

						    <li id='li_ul_n'>
							    <div id='fontName_num' >Xác nhận mật khẩu </div>
							     <div id='ldiv_one'>
							   		<input id='input_text_wi' type="password" name="et_register_form_password_confirm" value="<?php if ( isset($_POST['et_register_form_password_confirm']) ) echo esc_attr($_POST['et_register_form_password_confirm']); ?>" id="et_register_form_password_confirm"  />
							     	<div id='Saodo_next'>*</div>
								</div> <!-- id='ldiv_one'-->
						    </li>
						     
							<li id='li_ul_n'>
							 	<div id='fontName_n'> Nhu cầu đăng ký </div>
							 	<div id='ldiv_one'>
									<select class='opptin' id="et_register_form_account_type"  name="et_register_form_account_type">
										<option value="">-----</option>
										<option value="1" <?php if ( $_POST['et_register_form_account_type'] == "1") echo ' selected="selected"'; ?>>Tôi đã có cửa hàng, đang cần mua phần mềm để quản lý.</option>
										<option value="2" <?php if ( $_POST['et_register_form_account_type'] == "2") echo ' selected="selected"'; ?>>Tôi sắp mở cửa hàng, có thể sẽ cần mua phần mềm quản lý.</option>
										<option value="3" <?php if ( $_POST['et_register_form_account_type'] == "3") echo ' selected="selected"'; ?>> Tôi không có cửa hàng, chỉ muốn tìm hiểu tính năng phần mềm.</option>
									</select>
									<div id='Saodo'>*</div>
								</div> <!-- id='left_div'-->
							</li>

							<li id='li_ul_n'>
								<div id='fontName_n'> Gói dịch vụ </div>
								<div id='ldiv_one'>
									<select class='opptin' id="et_register_form_service"  name="et_register_form_service">
										<option value="2" <?php if ( $_POST['et_register_form_service'] == "2") echo ' selected="selected"'; ?>>Cơ bản (Cửa hàng nhỏ)</option>
										<option value="3" <?php if ( $_POST['et_register_form_service'] == "3") echo ' selected="selected"'; ?>>Nâng cao (Siêu thị mini)</option>
										<option value="4" <?php if ( $_POST['et_register_form_service'] == "4") echo ' selected="selected"'; ?>>Chuỗi cửa hàng</option>
									</select>
									<div id='Saodo'>*</div>
								</div> <!-- id='left_div'-->
							</li>

							<li id='li_ul_n'>
							    <div id='fontName_n' >Tên công ty </div>
							    <div id='ldiv_one' style='float: right;'>
							     <input id='input_text_w' type="text" name="et_register_form_company_name" value="<?php if ( isset($_POST['et_register_form_company_name']) ) echo esc_attr($_POST['et_register_form_company_name']); ?>" id="et_register_form_company_name"  />
							     <div id='Saodo'></div>
								</div> <!-- id='ldiv_one'-->
						    </li>

						    <li id='li_ul_n'>
								<div id='fontName_n'> Ngành nghề kinh doanh</div>
								<div id='ldiv_one'>
									<select class='opptin' id="et_register_form_industry"  name="et_register_form_industry">
										<option value="">-----</option>
										<option value="1" <?php if ( $_POST['et_register_form_industry'] == "1") echo ' selected="selected"'; ?>>Điện thoại viễn thông</option>
										<option value="2" <?php if ( $_POST['et_register_form_industry'] == "2") echo ' selected="selected"'; ?>>Điện tử, điện lạnh</option>
										<option value="3" <?php if ( $_POST['et_register_form_industry'] == "3") echo ' selected="selected"'; ?>>Ô tô, xe máy</option>
										<option value="4" <?php if ( $_POST['et_register_form_industry'] == "4") echo ' selected="selected"'; ?>>Thời trang</option>
										<option value="5" <?php if ( $_POST['et_register_form_industry'] == "5") echo ' selected="selected"'; ?>>Thực phẩm, đồ uống</option>
										<option value="6" <?php if ( $_POST['et_register_form_industry'] == "6") echo ' selected="selected"'; ?>>Đồ dùng gia đình</option>
										<option value="7" <?php if ( $_POST['et_register_form_industry'] == "7") echo ' selected="selected"'; ?>>Giáo dục, đào tạo</option>
										<option value="8" <?php if ( $_POST['et_register_form_industry'] == "8") echo ' selected="selected"'; ?>>Sách báo, văn phòng phẩm</option>
										<option value="9" <?php if ( $_POST['et_register_form_industry'] == "9") echo ' selected="selected"'; ?>>Đồ chơi, giải trí</option>
										<option value="10" <?php if ( $_POST['et_register_form_industry'] == "10") echo ' selected="selected"'; ?>>Sức khỏe, y tế</option>
										<option value="11" <?php if ( $_POST['et_register_form_industry'] == "11") echo ' selected="selected"'; ?>>Nội ngoại thất</option>
										<option value="12" <?php if ( $_POST['et_register_form_industry'] == "12") echo ' selected="selected"'; ?>>Máy móc, thiết bị</option>
										<option value="13" <?php if ( $_POST['et_register_form_industry'] == "13") echo ' selected="selected"'; ?>>Thủ công mỹ nghệ</option>
										<option value="14" <?php if ( $_POST['et_register_form_industry'] == "14") echo ' selected="selected"'; ?>>Hoa, quà tặng</option>
										<option value="15" <?php if ( $_POST['et_register_form_industry'] == "15") echo ' selected="selected"'; ?>>Du lịch, dịch vụ</option>
										<option value="16" <?php if ( $_POST['et_register_form_industry'] == "16") echo ' selected="selected"'; ?>>Bán lẻ</option>
										<option value="17" <?php if ( $_POST['et_register_form_industry'] == "17") echo ' selected="selected"'; ?>>Khác</option>
									</select>
									<div id='Saodo'>*</div>
								</div> <!-- id='ldiv_one'-->
							</li>

							<li id='li_ul_n'>
								<div id='fontName_n'>Tỉnh</div>
								<div id='ldiv_one'>
									<select class='opptin' id="et_register_form_state"  name="et_register_form_state">
										<option value="">Tỉnh</option>
										<option value="1" <?php if ( $_POST['et_register_form_state'] == "1") echo ' selected="selected"'; ?>>Hà Nội</option>
										<option value="2" <?php if ( $_POST['et_register_form_state'] == "2") echo ' selected="selected"'; ?>>TP. Hồ Chí Minh</option>
										<option value="3" <?php if ( $_POST['et_register_form_state'] == "3") echo ' selected="selected"'; ?>>An Giang</option>
										<option value="4" <?php if ( $_POST['et_register_form_state'] == "4") echo ' selected="selected"'; ?>>Bà Rịa - Vũng Tàu</option>
										<option value="5" <?php if ( $_POST['et_register_form_state'] == "5") echo ' selected="selected"'; ?>>Bạc Liêu</option>
										<option value="6" <?php if ( $_POST['et_register_form_state'] == "6") echo ' selected="selected"'; ?>>Bắc Kạn</option>
										<option value="7" <?php if ( $_POST['et_register_form_state'] == "7") echo ' selected="selected"'; ?>>Bắc Giang</option>
										<option value="8" <?php if ( $_POST['et_register_form_state'] == "8") echo ' selected="selected"'; ?>>Bắc Ninh</option>
										<option value="9" <?php if ( $_POST['et_register_form_state'] == "9") echo ' selected="selected"'; ?>>Bến Tre</option>
										<option value="10" <?php if ( $_POST['et_register_form_state'] == "10") echo ' selected="selected"'; ?>>Bình Dương</option>
										<option value="11" <?php if ( $_POST['et_register_form_state'] == "11") echo ' selected="selected"'; ?>>Bình Định</option>
										<option value="12" <?php if ( $_POST['et_register_form_state'] == "12") echo ' selected="selected"'; ?>>Bình Phước</option>
										<option value="13" <?php if ( $_POST['et_register_form_state'] == "13") echo ' selected="selected"'; ?>>Bình Thuận</option>
										<option value="14" <?php if ( $_POST['et_register_form_state'] == "14") echo ' selected="selected"'; ?>>Cà Mau</option>
										<option value="15" <?php if ( $_POST['et_register_form_state'] == "15") echo ' selected="selected"'; ?>>Cao Bằng</option>
										<option value="16" <?php if ( $_POST['et_register_form_state'] == "16") echo ' selected="selected"'; ?>>Cần Thơ</option>
										<option value="17" <?php if ( $_POST['et_register_form_state'] == "17") echo ' selected="selected"'; ?>>Đà Nẵng</option>
										<option value="18" <?php if ( $_POST['et_register_form_state'] == "18") echo ' selected="selected"'; ?>>Đắk Lắk</option>
										<option value="19" <?php if ( $_POST['et_register_form_state'] == "19") echo ' selected="selected"'; ?>>Đắk Nông</option>
										<option value="20" <?php if ( $_POST['et_register_form_state'] == "20") echo ' selected="selected"'; ?>>Đồng Nai</option>
										<option value="21" <?php if ( $_POST['et_register_form_state'] == "21") echo ' selected="selected"'; ?>>Đồng Tháp</option>
										<option value="22" <?php if ( $_POST['et_register_form_state'] == "22") echo ' selected="selected"'; ?>>Điện Biên</option>
										<option value="23" <?php if ( $_POST['et_register_form_state'] == "23") echo ' selected="selected"'; ?>>Gia Lai</option>
										<option value="24" <?php if ( $_POST['et_register_form_state'] == "24") echo ' selected="selected"'; ?>>Hà Giang</option>
										<option value="25" <?php if ( $_POST['et_register_form_state'] == "25") echo ' selected="selected"'; ?>>Hà Nam</option>
										<option value="26" <?php if ( $_POST['et_register_form_state'] == "26") echo ' selected="selected"'; ?>>Hà Tĩnh</option>
										<option value="27" <?php if ( $_POST['et_register_form_state'] == "27") echo ' selected="selected"'; ?>>Hải Dương</option>
										<option value="28" <?php if ( $_POST['et_register_form_state'] == "28") echo ' selected="selected"'; ?>>Hải Phòng</option>
										<option value="29" <?php if ( $_POST['et_register_form_state'] == "29") echo ' selected="selected"'; ?>>Hòa Bình</option>
										<option value="30" <?php if ( $_POST['et_register_form_state'] == "30") echo ' selected="selected"'; ?>>Hậu Giang</option>
										<option value="31" <?php if ( $_POST['et_register_form_state'] == "31") echo ' selected="selected"'; ?>>Hưng Yên</option>
										<option value="32" <?php if ( $_POST['et_register_form_state'] == "32") echo ' selected="selected"'; ?>>Khánh Hòa</option>
										<option value="33" <?php if ( $_POST['et_register_form_state'] == "33") echo ' selected="selected"'; ?>>Kiên Giang</option>
										<option value="34" <?php if ( $_POST['et_register_form_state'] == "34") echo ' selected="selected"'; ?>>Kon Tum</option>
										<option value="35" <?php if ( $_POST['et_register_form_state'] == "35") echo ' selected="selected"'; ?>>Lai Châu</option>
										<option value="36" <?php if ( $_POST['et_register_form_state'] == "36") echo ' selected="selected"'; ?>>Lào Cai</option>
										<option value="37" <?php if ( $_POST['et_register_form_state'] == "37") echo ' selected="selected"'; ?>>Lạng Sơn</option>
										<option value="38" <?php if ( $_POST['et_register_form_state'] == "38") echo ' selected="selected"'; ?>>Lâm Đồng</option>
										<option value="39" <?php if ( $_POST['et_register_form_state'] == "39") echo ' selected="selected"'; ?>>Long An</option>
										<option value="40" <?php if ( $_POST['et_register_form_state'] == "40") echo ' selected="selected"'; ?>>Nam Định</option>
										<option value="41" <?php if ( $_POST['et_register_form_state'] == "41") echo ' selected="selected"'; ?>>Nghệ An</option>
										<option value="42" <?php if ( $_POST['et_register_form_state'] == "42") echo ' selected="selected"'; ?>>Ninh Bình</option>
										<option value="43" <?php if ( $_POST['et_register_form_state'] == "43") echo ' selected="selected"'; ?>>Ninh Thuận</option>
										<option value="44" <?php if ( $_POST['et_register_form_state'] == "44") echo ' selected="selected"'; ?>>Phú Thọ</option>
										<option value="45" <?php if ( $_POST['et_register_form_state'] == "45") echo ' selected="selected"'; ?>>Phú Yên</option>
										<option value="46" <?php if ( $_POST['et_register_form_state'] == "46") echo ' selected="selected"'; ?>>Quảng Bình</option>
										<option value="47" <?php if ( $_POST['et_register_form_state'] == "47") echo ' selected="selected"'; ?>>Quảng Nam</option>
										<option value="48" <?php if ( $_POST['et_register_form_state'] == "48") echo ' selected="selected"'; ?>>Quảng Ngãi</option>
										<option value="49" <?php if ( $_POST['et_register_form_state'] == "49") echo ' selected="selected"'; ?>>Quảng Ninh</option>
										<option value="50" <?php if ( $_POST['et_register_form_state'] == "50") echo ' selected="selected"'; ?>>Quảng Trị</option>
										<option value="51" <?php if ( $_POST['et_register_form_state'] == "51") echo ' selected="selected"'; ?>>Sóc Trăng</option>
										<option value="52" <?php if ( $_POST['et_register_form_state'] == "52") echo ' selected="selected"'; ?>>Sơn La</option>
										<option value="53" <?php if ( $_POST['et_register_form_state'] == "53") echo ' selected="selected"'; ?>>Tây Ninh</option>
										<option value="54" <?php if ( $_POST['et_register_form_state'] == "54") echo ' selected="selected"'; ?>>Thái Bình</option>
										<option value="55" <?php if ( $_POST['et_register_form_state'] == "55") echo ' selected="selected"'; ?>>Thái Nguyên</option>
										<option value="56" <?php if ( $_POST['et_register_form_state'] == "56") echo ' selected="selected"'; ?>>Thanh Hóa</option>
										<option value="57" <?php if ( $_POST['et_register_form_state'] == "57") echo ' selected="selected"'; ?>>Thừa Thiên - Huế</option>
										<option value="58" <?php if ( $_POST['et_register_form_state'] == "58") echo ' selected="selected"'; ?>>Tiền Giang</option>
										<option value="59" <?php if ( $_POST['et_register_form_state'] == "59") echo ' selected="selected"'; ?>>Trà Vinh</option>
										<option value="60" <?php if ( $_POST['et_register_form_state'] == "60") echo ' selected="selected"'; ?>>Tuyên Quang</option>
										<option value="61" <?php if ( $_POST['et_register_form_state'] == "61") echo ' selected="selected"'; ?>>Vĩnh Long</option>
										<option value="62" <?php if ( $_POST['et_register_form_state'] == "62") echo ' selected="selected"'; ?>>Vĩnh Phúc</option>
										<option value="63" <?php if ( $_POST['et_register_form_state'] == "63") echo ' selected="selected"'; ?>>Yên Bái</option>
									</select>
									<div id='Saodo'>*</div>
								</div> <!-- id='ldiv_one'-->
							</li>

						</ul>

						<input  type="hidden" name="et_register_form_submit_ph" value="et_register_form_proccess" />
						<input  type="reset" id="et_contact_reset_ph" value="<?php esc_attr_e('Nhập lại','Chameleon');?>"/>
						<input type="hidden" name="base_url" id="base_url" value="<?php echo $baseUrl; ?>" />
						<input  type="submit" value="<?php esc_attr_e('Đăng ký','Chameleon'); ?>" id="register_submit_form_ph" />
					</form>

				</div> <!--id='dangki_vistor'-->
			<?php } ?>
			</div> <!-- end #et-register -->

			</div><!-- end id='dk_page_03' -->

			<div class="clear"></div>
		</div> <!-- end .entry -->
	<?php endwhile; endif; ?>
	</div> 	<!-- end #left-area -->

	<?php if (!$fullwidth) get_sidebar(); ?>
</div> <!-- end #content -->

<?php get_footer(); ?>
