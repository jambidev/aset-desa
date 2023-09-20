<?php
	session_start();
	if(isset($_GET['model'])): // for secure
		ob_start();
		date_default_timezone_set('Asia/Makassar');
		require "../libs/path.php";
		require '../assets/tools/phpmailer/PHPMailerAutoload.php';

		$model = $_GET['model'];
		$method = $_GET['method'];
		$model;

		if($model == 'kirim' AND $method == 'kirim') {
			if(isset($_POST['kirim'])) {

				$alamat_email	= $_POST['alamat_email'];
				$judul 			= $_POST['judul'];
				$upload_data	= $_FILES['upload_data']['name'];

				if (!empty($alamat_email) AND !empty($judul) AND !empty($upload_data)) {
				

					$mail = new PHPMailer;

					// Fungsi pengiriman menggunakan PHPMailer

					//Enable SMTP debugging. 
					$mail->SMTPDebug = 3;                               
					//Set PHPMailer to use SMTP.
					$mail->isSMTP();            
					//Set SMTP host name   
					// Belum Terset                       
					$mail->Host = "#";
					//Set this to true if SMTP host requires authentication to send email
					$mail->SMTPAuth = true;   

					//Provide username and password    
					// Belum set alamat email dan password 
					$mail->Username = "#";                 
					$mail->Password = "#";                           
					//If SMTP requires TLS encryption then set it
					$mail->SMTPSecure = "tsl";                           
					//Set TCP port to connect to 
					$mail->Port = 587;          

					// $mail->SMTPOptions = array(
					//     'ssl' => array(
					//         'verify_peer' => false,
					//         'verify_peer_name' => false,
					//         'allow_self_signed' => true
					//     )
					// );                         

					$mail->From 	= "official.rahmatslamet@gmail.com";
					$mail->FromName = "Arhen";

					$mail->Subject 	= $judul;
					$mail->Body    = "Tim Asset Desa. (LOL)";
	       			$mail->AddAddress($alamat_email);
	       			$mail->AddReplyTo($alamat_email);
	       	    	$mail->AddAttachment( $_FILES['upload_data']['tmp_name'], $_FILES['upload_data']['name'] );

					if(!$mail->send()) 
					{
					    echo "Mailer Error: " . $mail->ErrorInfo;
					} 
					else 
					{
					    echo "Message has been sent successfully";
					}
					
						echo "<script> alert('Data Berhasil Dikirim'); </script>";
						// header("location:".ROOT."kirim");
					
				} else {
					header("location:".ROOT."kirim?&act=err");
				}
			}
		}

	endif;
?>
