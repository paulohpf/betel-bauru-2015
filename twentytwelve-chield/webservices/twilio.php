<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
		<?php 
		
			$telnumber = $_POST["telnumber"];
			$message = $_POST["message"];
			echo $telnumber;
			echo "<br>".$message;

			if($telnumber != "" && $message != ""){
				
				// Get the PHP helper library from twilio.com/docs/php/install
				require_once('../twilio/Services/Twilio.php'); // Loads the library
				 
				// Your Account Sid and Auth Token from twilio.com/user/account
				$sid = "AC2294233e50325da4132e285f8686257d"; 
				$token = "b32d662b1a88d83e48349d2cd0951291"; 
				$client = new Services_Twilio($sid, $token);
				 
				$retorno = $client->account->messages->sendMessage("+17162476169", $telnumber, $message);
				
				echo $retorno;
			}
		?>		
	</head>
	<body>
		<form action="" method="get">
			<fieldset>
				<legend>Informações de contato:</legend>
				Telefone: <input type="text" name="telnumber" value=""><br>
				Mensagem: <input type="text" name="message" value=""><br>
				<input type="submit" value="Submit">
		  </fieldset>
		</form>
	</body>	
</html>