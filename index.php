<?php
	$ToMail = $_GET['ToMail'];

	if ($ToMail == null) {
		$ToMail = 'guest';
	}
	
	$MailSubject= $_GET['MailSubject'];
	
	if ($MailSubject == null) {
		$MailSubject = 'Default';
	}

	$MailContent= $_GET['MailContent'];
	
	if ($MailContent == null) {
		$MailContent = 'Default';
	}

	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = "587";
	$mail->Username = "sudharsangk23@gmail.com";
	$mail->Password = "*";
	$mail->Subject = $MailSubject;
	$mail->setFrom("sudharsangk23@gmail.com");
	$mail->isHTML(true);
	//$mail->addAttachment('img/attachment.png');
	$mail->Body = $MailContent;
	$mail->addAddress($ToMail);
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error: ";
	}
	$mail->smtpClose();
