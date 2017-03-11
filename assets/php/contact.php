<?php
	require 'ligacaoSMTP.php';
	require 'generate_img.php';

	$form_data = ['success' => true];

	$fname	= $_POST['fname'];
	$email	= $_POST['email'];
	$curso	= $_POST['curso'];
	$ano	= $_POST['ano'];
	$linkedin	= $_POST['linkedin'];

	//generate_credential($fname, $email, $curso, $h1, $h2, $h3); //J� n�o h� hobbies, alterar!

	if (isset($_FILES['cv']) && !empty($_FILES['cv']['name'])) {
		$fileType = pathinfo(basename($_FILES["cv"]["name"]), PATHINFO_EXTENSION);
		$target_dir = '../cv/';
		$target_file = $target_dir . $email . '.' .$fileType;
		if ($fileType != "pdf" && $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg")// && file_exists('../cv/'. $email . '.' .$fileType)) {
		{
			echo "Apenas s�o aceites ficheiros JPG, JPEG, PNG & PDF.";
			return;
		}
		 /*Check file size
		if ($_FILES["cv"]["size"] > 10000000) {
			echo "Sorry, your file is too large.";
			return;
		}*/
		if (!move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
			echo "Desculpa, ocorreu um erro no upload do teu CV.";
			return;
		}
		$mail->addAttachment( $target_file , 'cv.pdf' );
	}

  	$message = "Name: $fname \nEmail: $email \nCurso: $curso \nAno: $ano \nLinkedin: $linkedin";
	$mail->addAddress('adato@junifeup.pt');
	//$mail->addAttachment('../images/credentials/'.$email.'.jpeg', 'credential.jpeg');
	$mail->CharSet = 'UTF-8';
	$mail->Subject = 'Registo AD@TO';
	$mail->Body = $message;

	if($mail->send()) {
		$form_data['success'] = true;
		$replymsg = "Obrigado $fname pelo teu registo!\n\nEstamos a processar a tua inscri��o.\nCaso n�o tenhas enviado o teu CV ainda vais a tempo. Prepara-o e quando avisarmos ter�s oportunidade de nos enviar para o passarmos �s empresas.\nPassaremos novas informa��es brevemente.\n\n\nAD@TO - sem bancas, sem gravatas, sem complica��es - a tua carreira, o teu futuro.\nby JuniFEUP
		$mail->clearAddresses();
		$mail->clearAttachments();
		$mail->addAddress($email);
		$mail->Subject = 'Registo AD@TO';
		$mail->Body = $replymsg;
		$mail->send();
	}
	
	header("Location: http://$_SERVER[HTTP_HOST]?success=".$form_data['success']."#registration");
	die();
