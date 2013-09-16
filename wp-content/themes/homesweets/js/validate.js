jQuery(document).ready(function(){
   // refresh captcha
	 jQuery('img#refresh').click(function() {
			change_captcha();
	 });
	 function change_captcha()
	 {
	 	var strURL = jQuery('#base_url').val();
	    var URLstr = jQuery('#urll').val();

	 	document.getElementById('captcha').src= URLstr + Math.random();

	 	// jQuery.post("<?php theme_url()?>Chameleon/includes/get_captcha.php",function(data)
	 	//  {//tao 1 request len trang capcha.php
        // jQuery("#mabaove").html(data);//do du lieu ve doi tuong co id bang hinh_captcha
          //})
	 }
	 function clear_form()
	 {
	 	jQuery("#et_register_form_full_name").val('');
		jQuery("#et_register_form_company_name").val('');
		jQuery("#et_register_form_location_name").val('');

		jQuery("#et_register_form_email").val('');
		jQuery("#et_register_form_contact_phone").val('');
		jQuery("#et_register_form_password").val('');
		jQuery("#et_register_form_password_confirm").val('');
		jQuery("#et_register_form_captcha").val('');
	 }
	  // reset
	 jQuery('#et_contact_reset').click(function() {
			//jQuery('div#et-register#et-contact-message').find('p').hide();
			clear_form();
			 var elem = document.getElementById('et-contact-message');
                 elem.hidden = true;
             var content = document.getElementById('content');
                 content.padding="0";
			clear_form();
		jQuery("#et_register_form_full_name").val('');
		jQuery("#et_register_form_company_name").val('');
		jQuery("#et_register_form_location_name").val('');

		jQuery("#et_register_form_email").val('');
		jQuery("#et_register_form_contact_phone").val('');
		jQuery("#et_register_form_password").val('');
		jQuery("#et_register_form_password_confirm").val('');
		jQuery("#et_register_form_captcha").val('');

	 });

	 // clear form pages-03

	 function clear_form_3()
	 {
	 	jQuery("#et_register_form_full_name").val('');
		jQuery("#et_register_form_company_name").val('');
		jQuery("#et_register_form_location_name").val('');

		jQuery("#et_register_form_email").val('');
		jQuery("#et_register_form_contact_phone").val('');
		jQuery("#et_register_form_password").val('');
		jQuery("#et_register_form_password_confirm").val('');
		jQuery("#et_register_form_captcha").val('');
	 }
	  // reset
	 jQuery('#et_contact_reset_ph').click(function() {
			//jQuery('div#et-register#et-contact-message').find('p').hide();
			clear_form_3();
			 var elem = document.getElementById('et-contact-message');
                 elem.hidden = true;
             var content = document.getElementById('content');
                 content.padding="0";
		jQuery("#et_register_form_full_name").val('');
		jQuery("#et_register_form_company_name").val('');
		jQuery("#et_register_form_location_name").val('');

		jQuery("#et_register_form_email").val('');
		jQuery("#et_register_form_contact_phone").val('');
		jQuery("#et_register_form_password").val('');
		jQuery("#et_register_form_password_confirm").val('');
		jQuery("#et_register_form_captcha").val('');

	 });
});



