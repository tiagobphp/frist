<?php
	function enviaMail($emaild,$nomed,$assunto,$mensagem)
	{

		include_once("class.phpmailer.php");
		$usuario = 'noreply@leonardoonline.com.br';
		$senha = 'leo@2017';
		$Host = 'smtp.gmail.com';
		$Username = $usuario;
		$Password = $senha;
		$Port = "587";
		
		$mail = new PHPMailer();
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host = $Host; // SMTP server
		$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
		// 1 = errors and messages
		// 2 = messages only
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "tls";
		$mail->Port = $Port; // set the SMTP port for the service server
		$mail->Username = $Username; // account username
		$mail->Password = $Password; // account password
		
		$mail->SetFrom($usuario, 'noreply');
		$mail->Subject = $assunto;;
		$mail->MsgHTML($mensagem);
		$mail->AddAddress($emaild, $nomed);

		
		if(!$mail->Send()) {
			die('Erro ao enviar e-mail: '. print($mail->ErrorInfo));
		} else {
		$mensagemRetorno = 'OK';
		}
		return $mensagemRetorno;	
	}
	
	// Exemplo de Uso e-mail destinatário, nome destinatário, assunto, corpo de e-mail
	enviaMail('tiagobphp@gmail.com','Tiago','Assunto do e-mail','<p>Teste de envio</p>');
	enviaMail('raul@humanostud.io','Raul','Assunto do e-mail','<p>Teste de envio</p>');



?>