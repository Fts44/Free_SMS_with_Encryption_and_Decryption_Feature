<?php 

	if(isset($_POST["decrypt"])){
		$message = $_POST["message"];
		$ciphering = "AES-128-CTR";
		$option = 0;
		$encryption_iv = '1234567890123456';
		$encryption_key = $_POST["key"];
		$encrypted_message = openssl_decrypt($message, $ciphering, $encryption_key,$option, $encryption_iv);
		echo $encrypted_message;
	}


?>