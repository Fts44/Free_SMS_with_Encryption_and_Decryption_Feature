<?php

	if(isset($_POST["send"])){
		//Encrypts message
		$message = $_POST["message"];
		$ciphering = "AES-128-CTR";
		$option = 0;
		$encryption_iv = '1234567890123456';
		$encryption_key = $_POST["key"];
		$encrypted_message = openssl_encrypt($message, $ciphering, $encryption_key,$option, $encryption_iv);

		//send message
		include "smsAPIContr.php";

		$receiver = $_POST["receiver"];
		$message = $encrypted_message;
		$smsAPICode = "TR-JOSEP352402_7ZZIW";
		$smsAPIPassword = "d@4a6ttt&n";

		$send = new ItextMoController();

		$send->itexmo($receiver,$message,$smsAPICode,$smsAPIPassword);

		if($send){
			echo "Message send successfully!";
		}
		else{
			echo "No Message from the server!";
		}
	}

?>