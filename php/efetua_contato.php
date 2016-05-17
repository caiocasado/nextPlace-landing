<meta charset="utf-8" />
<?php

			//RECEBER VARIAVEIS
			$NAME = $_POST["name"];
			$EMAIL = $_POST["email"];
			$PHONE = $_POST["phone"];
			$MESSAGE = $_POST["message"];

			$quebra_linha = "\n"; 

			// Passando os dados obtidos pelo formulário para as variáveis abaixo

			$emailsender="contato@nextplace.com.br";
			$emaildestinatario = trim($_POST['email']);
			$assunto = "Contato pelo Site de $NAME";
			$assunto = '=?UTF-8?B?'.base64_encode($assunto).'?=';



			/* Montando a mensagem a ser enviada no corpo do e-mail. */
			$mensagemHTML = "<P>E-mail enviado pelo site nextplace.com.br -  Formulário de Contato </P><hr><br /><br />
			<b>Nome:</b> $NAME <br/ >
			<b>Email:</b> $EMAIL <br />
			<b>Telefone:</b> $PHONE <br /><br />
			<b>Mensagem:</b> $MESSAGE <br /><br />
			";



			/* Montando o cabeçalho da mensagem */
			$headers = "MIME-Version: 1.1".$quebra_linha;
			$headers .= "Content-type: text/html; charset=utf-8".$quebra_linha;
			// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
			$headers .= "From: ".$emailsender.$quebra_linha;
			$headers .= "Return-Path: " . $emailsender . $quebra_linha;
			$headers .= "Reply-To: ".$emaildestinatario.$quebra_linha;

			/* Enviando a mensagem */

			 $envio = mail($emailsender, "$assunto", $mensagemHTML, $headers, "-f$emailsender");

			 if($envio)
				echo "<script language='javascript'>alert('Contato efetuado com sucesso. Em breve a NextPlace entrará em contato.');</script>";
			else
				echo "<script language='javascript'>alert('Falha, tente novamente mais tarde.');</script>";

			echo "Você está sendo redirecionado";
			echo "<meta HTTP-EQUIV='Refresh' CONTENT=1;URL=http://www.nextplace.com.br>";
		?>
