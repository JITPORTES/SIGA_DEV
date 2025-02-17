<?php
require("class.phpmailer.php");	

class Correo 
{
  
  
  public $nombreR = 'Hospital Satelite';
  public $correoremitente="hospital2603@gmail.com";
  public $passmail = "talonportes1";
  public $servername="smtp.gmail.com";	
  public $domain="gmail.com";
  public $port = "587";
  public $correo_configurado = false;
  
  

  public function enviaCorreo($cadena_email,$cadena_email_copia,$cadena_email_c_oculta,$cadena_archivos,$subject,$mensajeFinal,$cadena_archivos_nombre="") 
  {
    try 
	{
		$correo_envio=$this->correoremitente;
		$pass_correo_envio=$this->passmail;
		
	    //echo "Mail para:".$email;
	    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	    $mail->IsSMTP(); // telling the class to use SMTP
		//$mail->IsHTML(false);
		$mail->CharSet = "UTF-8"; 
		$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
		$mail->Host       = $this->servername; // sets the SMTP server
		$mail->Port       = $this->port; 
        //$mail->ConfirmReadingTo=$correo_envio; //correo de confirmacion para quien envia
        
        //****ALTA PRIORIDAD
        $msPriority = 'High';
        $mail->AddCustomHeader( "X-MSMail-Priority: $msPriority" );
        $mail->AddCustomHeader( "Priority: $msPriority" );
		                // set the SMTP port for the GMAIL server

		//CORREO DE ENVIO PERSONALIZADO
		if (strlen($correo_envio)>0 && strlen($pass_correo_envio)>0)
		{
			$mail->Username   = $correo_envio;
			$mail->Password   = $pass_correo_envio;
			$this->correo_configurado=true;

		}
		else
		{
			$this->correo_configurado=false;
			// $mail->Username   = "cursos@locutores.com"; // SMTP account username
			// $mail->Password   = "locutores";        // SMTP account password
		}

	

        	
			
			//*** ASIGNAR CORREOS
			$array_emailcorreo = explode(";", $cadena_email);
			$cant_elem_correo = count($array_emailcorreo);

			if (strlen($cadena_email)>0)
			for($i=0; $i<$cant_elem_correo;$i++)
			{
				if (strlen($array_emailcorreo [$i])>0)
				{
					$mail->AddAddress($array_emailcorreo [$i],$array_emailcorreo [$i]);
				}

			}
			
			//*** ASIGNAR CORREOS CON COPIA
			$array_emailcc = explode(";", $cadena_email_copia);
			$cant_cc = count($array_emailcc);
			if (strlen($cadena_email_copia)>0)
			for($i=0; $i<$cant_cc;$i++)
			{
				if (strlen($array_emailcc [$i])>0)
				{
					$mail->AddCC($array_emailcc [$i],$array_emailcc [$i]);
				}

			}

			//*** ASIGNAR CORREOS CON COPIA OCULTA
			$array_emailcco = explode(";", $cadena_email_c_oculta);
			$cant_cco = count($array_emailcco);

			if (strlen($cadena_email_c_oculta)>0)
			for($i=0; $i<$cant_cco;$i++)
			{
				if (strlen($array_emailcco [$i])>0)
				{
					$mail->AddBCC($array_emailcco [$i],$array_emailcco [$i]);
				}

			}

			//CADENA DE ARCHIVOS
			$array_archivos_nombre = explode(";", $cadena_archivos_nombre);
			
		
			$array_email = explode(";", $cadena_archivos);
			$cant_elem = count($array_email);
			if (strlen($cadena_archivos)>0)
			for($i=0; $i<$cant_elem;$i++)
			{
				if (strlen($array_email [$i])>0)
				{
					if (strlen($array_archivos_nombre [$i])>0)
						$mail->AddAttachment( $array_email [$i], $array_archivos_nombre [$i] );
					else
						$mail->AddAttachment( $array_email [$i] );
				}

			}

			try{
				$mail->Sender = $correo_envio;
				$mail->AddReplyTo($correo_envio, $correo_envio);
				$mail->SetFrom($correo_envio, $this->nombreR);
				$mail->Subject = $subject;
				$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
				$mail->Body =$mensajeFinal;				  
				//$mail->DKIM_domain = $this->domain;	
				$mail_result = $mail->Send();
				$mail->SmtpClose();
				
				return true;
			}catch (phpmailerException $e){
				return false;	
			}
				
		
		
	} 
	catch (phpmailerException $e) 
	{
		if (!$this->correo_configurado)
			echo '<div class="alert alert-block alert-danger">Error: El Correo en este usuario no esta Configurado</div>';

		echo '<div class="alert alert-block alert-danger">Error: '.$e->getMessage().'</div>'; //Pretty error messages from PHPMailer					
		return false;

	} 
		catch (Exception $e) 
	{
		if (!$this->correo_configurado)
			echo '<div class="alert alert-block alert-danger">Error: El Correo en este usuario no esta Configurado</div>';

   		 echo '<div class="alert alert-block alert-danger">Error: '.$e->getMessage().'</div>'; //Boring error messages from anything else!	
		 return false;		  				 
	}
  }
 
}

?>