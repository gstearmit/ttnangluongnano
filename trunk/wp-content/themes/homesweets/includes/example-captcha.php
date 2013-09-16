<html>
  <body>
    <form action="" method="post">
<?php
/*
maybanhang.net
Domain Name:	maybanhang.net
This is a global key. It will work across all domains.

Public Key:	6LdOmeESAAAAAFwN-qrxl8GyGVhSJIM2wIN5bZ3w
Use this in the JavaScript code that is served to your users

Private Key:	6LdOmeESAAAAAHrh0HxfhxPzEb6g-0x3DUEIdyxE
Use this when communicating between your server and our server. Be sure to keep it a secret.

Delete these keys
Resources:	
reCAPTCHA plugins and libraries
reCAPTCHA API Documentation
*/
require_once('recaptchalib.php');

// Get a key from https://www.google.com/recaptcha/admin/create
$publickey = "6LdOmeESAAAAAFwN-qrxl8GyGVhSJIM2wIN5bZ3w";
$privatekey = "6LdOmeESAAAAAHrh0HxfhxPzEb6g-0x3DUEIdyxE";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# was there a reCAPTCHA response?
if ($_POST["recaptcha_response_field"]) {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) {
                echo "You got it!";
        } else {
                # set the error code so that we can display it
                $error = $resp->error;
        }
}
echo recaptcha_get_html($publickey, $error);
?>
    <br/>
    <input type="submit" value="submit" />
    </form>
  </body>
</html>
