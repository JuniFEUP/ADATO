<?php
	require 'ligacaoSMTP.php';
	//require 'generate_img.php';
	require 'ligacaoSQL.php';

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
			echo "Apenas são aceites ficheiros JPG, JPEG, PNG & PDF.";
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

  	$message = "Name: $fname\nEmail: $email\nCurso: $curso\nAno: $ano\nLinkedin: $linkedin";
//	$mail->addAddress('pcova.dev@gmail.com');
	$mail->addAddress('adato@junifeup.pt');
	//$mail->addAttachment('../images/credentials/'.$email.'.jpeg', 'credential.jpeg');
	$mail->CharSet = 'UTF-8';
	$mail->Subject = 'Registo AD@TO';
	$mail->Body = $message;

	if($mail->send()) {
		$form_data['success'] = true;
		$replymsg = "Obrigado $fname pelo teu registo!\n\nEstamos a processar a tua inscrição.\nCaso não tenhas enviado o teu CV ainda vais a tempo. Prepara-o e quando avisarmos terás oportunidade de nos enviar para o passarmos as empresas.\nPassaremos novas informações brevemente.\n\n\nAD@TO - sem bancas, sem gravatas, sem complicaçõees - a tua carreira, o teu futuro.\nby JuniFEUP";
		$mail->clearAddresses();
		$mail->clearAttachments();
		$mail->addAddress($email);
		$mail->Subject = 'Registo AD@TO';
		$mail->Body = $replymsg;
		$mail->send();
	}

	// execute the query
	// query returns FALSE on error, and a result object on success
	if ($db == null) {
		echo "No database!\n";
		die();
	}

	// create a query that should return a single record
	$sql =<<<EOF
		  INSERT INTO participants (name, email, course_year, course, linkedin)
		  VALUES ('$fname', '$email', '$ano', '$curso', '$linkedin');
EOF;

	$ret = $db->exec($sql);
	if(!$ret){
		echo $db->lastErrorMsg();
		die();
	} else {
		echo "Records created successfully\n";
	}
	$db->close();
	
	header("Location: http://$_SERVER[HTTP_HOST]?success=".$form_data['success']."#registration");
	die();
