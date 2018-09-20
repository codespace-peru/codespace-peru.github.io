<?php
require 'PHPMailer/PHPMailerAutoload.php';
require_once "recaptchalib.php";
    $siteKey = "6LeCf_4SAAAAABERO3-kAEUI5SR9GsoEya8CE5Hz";
    $secret = "6LeCf_4SAAAAABq6pBI5eW3E-YnOLeQd_vLSN86S";
    // reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
    $lang = "en";
    $resp = null;
    $error = null;
    $reCaptcha = new ReCaptcha($secret);
    if ($_POST["g-recaptcha-response"]) {
        $resp = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
        );
    }

    if ($resp != null && $resp->success) {
		try{
			$mail = new PHPMailer(true);

			$to="codespaceperu@gmail.com";
			$from="support@codespace.pe";

			$nombre = $_POST['name'];
			$email = $_POST['email'];
			$asunto = $_POST['subject'];
			$mensaje = nl2br($_POST['message']);

			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "tls"; //ssl
			$mail->Host = 'gator4178.hostgator.com';
			$mail->Port = 587; //465
			$mail->Username = 'carlos';
			$mail->Password = 'C0d3sp4c3';
			$mail->setFrom($from,'Soporte codespace');

			$mail->addAddress($to);
			$mail->Subject = $asunto;
			$mail->isHtml(true);
			$mail->Body = '<strong>'.$nombre.'</strong>'.' le ha contactado desde su web, y le ha enviado el siguiente mensaje: <br><p>'.$mensaje.'</p>'; 
			$mail->CharSet='UTF-8';
			if($mail->send())
				echo 'OK';
			else
				echo 'Error: '.$email->ErrorInfo;

		}
		catch(phpmailerException $e){
			echo $e->getMessage();
		}
}
else{
	echo 'Error';
}

?>