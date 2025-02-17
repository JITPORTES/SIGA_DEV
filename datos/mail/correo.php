<?php
require("class.phpmailer.php");	

class Correo 
{
  
  
  public $nombreR = 'Hospital Satelite';
  public $correoremitente="hospitalsatelite@mockup.mx";
  public $correoremitente2="hospitalsatelite@hospitalsatelite.com";
  public $passmail = "Hsatelite2017@";	
  public $servername="mail.mockup.mx";	
  public $domain="mockup.mx";	
  public $port = "587";
 
  public function enviaCorreo($email,$nombre,$subject,$mensajeFinal,$CorreoSalas="",$attach) 
  {
    try 
	{	
    //echo "Mail para:".$email;
  $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
  $mail->IsSMTP(); // telling the class to use SMTP
	$mail->IsHTML(true);
	$mail->CharSet = "UTF-8"; 
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	//$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
	$mail->Host       = $this->servername; // sets the SMTP server
	$mail->Port       = $this->port;                    // set the SMTP port for the GMAIL server
	$mail->Username   = $this->correoremitente; // SMTP account username
	$mail->Password   = $this->passmail;        // SMTP account password
	$mail->AddReplyTo($this->correoremitente2, $nombre);
	$mail->AddAddress($email,$nombre);
	//$mail->AddBCC("javier@mockup.mx");
	
	$mail->Sender = $this->correoremitente2;
	$mail->SetFrom($this->correoremitente2, $nombre);
	$mail->Subject = $subject;
	$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
	$mail->Body =$mensajeFinal;						  
	//$mail->DKIM_domain = $this->domain;	
	
	/*if (count($attach) > 0)
	{
	for ($i=0; $i < count($attach); $i++)
	{
	   $mail->AddAttachment('images/MaterialDigital/Denuncias/'.$attach[$i].'', $attach[$i]);  // optional name
	}
	}*/
	$mail_result = $mail->Send();
	$mail->SmtpClose();
	return true;	
	} 
	catch (phpmailerException $e) 
	{
		echo "Error phpException ".$e->getMessage(); //Pretty error messages from PHPMailer					
		return false;
	} 
		catch (Exception $e) 
	{
   		 echo "Error Exception ".$e->getMessage(); //Boring error messages from anything else!	
		 return false;		  				 
	}
  }
 
}

?>