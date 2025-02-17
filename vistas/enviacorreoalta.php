<?php 
error_reporting(1);

require_once("class/SIGA.php");
 /*
|--------------------------------------------------------------------------
| 10 fecbrero, 2023
| Developer: Alejandro Arias
| Descripción: Se comento está línea ya que no es necesaria. #3
|--------------------------------------------------------------------------
| 
*/

 //require_once("../datos/mail/correo.php"); #3
 
 $Id_Activo 	= $_POST["Id_Activo"];
 $Id_Usuario 	= $_POST["Usuario"];
 $email 			= "itdeveloper@hospitalsatelite.com; gchan@hospitalsatelite.com";
 $dir 				= $_SERVER['SERVER_NAME'];
 $obj 				= new SIGA();  
 
 //$RUTA = "//".$dir."/".$obj->rutaSistema();
	 
	// $ip = isset($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];

	// if (strpos($ip, '192.168') !== false) {
	// 	//$rutaip = "http://192.168.1.191";
	// 	$rutaip = "https://apps2.hospitalsatelite.com";
	// }
	// else
	// {
	// 	//$rutaip = "http://207.249.133.114";
	// 	$rutaip = "https://apps2.hospitalsatelite.com";
	// }
 
$rutaip = "https://apps2.hospitalsatelite.com";

 $RUTA = $rutaip."/".$obj->rutaSistema();
 $FORMATOALTA = $rutaip."/".$obj->rutaSistema()."/controladores/activos/siga_activos/Reporte-Alta.php?Id_Activo=".$Id_Activo."&Nom=1";

 $activo = $obj->obtenCatalogo($Id_Activo,"siga_activos","Id_Activo","Nombre_Activo",""," and Estatus_Reg<>3 ");
 $primaria_secundaria = $obj->ubic_prim_y_ubic_sev($Id_Activo);
 $propiedad_activo = $obj->propiedad_activo($Id_Activo);

/*
|--------------------------------------------------------------------------
| 10 fecbrero, 2023
| Developer: Alejandro Arias
| Descripción: Se comento está línea es el error que no permitia el envió de e-mail.(#1)
|--------------------------------------------------------------------------
| 
*/

 //$motivo = $obj->obtenDetalleBaja($Id_Activo); #1

 $usuarioEnvia = $obj->obtenCatalogo($Id_Usuario,"siga_usuarios","Id_Usuario","Nombre_Usuario");
 $nombre = $usuarioEnvia[0]["Nombre_Completo"];
 $email_user_resp = $obj->correo_resp($Id_Activo);

 //echo $url;
 //echo "eslabon=".$eslabon;
 //echo "correo=".$datosUsuario[0]["email"];
 //die();
 
 //$usuarioEnvia = $obj->obtenCatalogo($Id_Usuario,"siga_usuarios","Id_Usuario","Nombre_Usuario");
 $emailUsuario = $usuarioEnvia[0]["No_Usuario"];
 //print_r($usuarioEnvia);
 $subject = "Solicitud de alta activo: ".$activo[0]["Nombre_Activo"]." AFBC: ".$activo[0]["AF_BC"];
 
 //$correo = new Correo();
 $mensajeFinal = file_get_contents('../datos/mail/correoalta.html');

 $mensajeFinal = str_replace("#ACTIVO#",$activo[0]["Nombre_Activo"],$mensajeFinal);
 $mensajeFinal = str_replace("#Id_Activo#",$Id_Activo,$mensajeFinal);
 $mensajeFinal = str_replace("#FORMATOALTA#",$FORMATOALTA,$mensajeFinal);
 $mensajeFinal = str_replace("#RUTA#",$RUTA,$mensajeFinal);
 $mensajeFinal = str_replace("#PASO#",$Paso,$mensajeFinal);
 $mensajeFinal = str_replace("#Id_Usuario#",$Id_Usuario,$mensajeFinal);
 $mensajeFinal = str_replace("#USER#",$nombre,$mensajeFinal);
 
 $mensajeFinal = str_replace("#AFBC#",$activo[0]["AF_BC"],$mensajeFinal);
 $mensajeFinal = str_replace("#Ubic_Prim#",$primaria_secundaria[0]["Desc_Ubic_Prim"],$mensajeFinal);
 $mensajeFinal = str_replace("#Ubic_Sec#",$primaria_secundaria[0]["Desc_Ubic_Sec"],$mensajeFinal);
 $mensajeFinal = str_replace("#Propiedad#",$propiedad_activo[0]["Desc_Propiedad"],$mensajeFinal);
 $mensajeFinal = str_replace("#ImporteSeguros#",$activo[0]["ImporteSeguros"],$mensajeFinal);
 $mensajeFinal = str_replace("#DescCorta#",$activo[0]["DescCorta"],$mensajeFinal);
 $mensajeFinal = str_replace("#Marca#",$activo[0]["Marca"],$mensajeFinal);
 $mensajeFinal = str_replace("#Modelo#",$activo[0]["Modelo"],$mensajeFinal);
 $mensajeFinal = str_replace("#Serie#",$activo[0]["NumSerie"],$mensajeFinal);

/*
|--------------------------------------------------------------------------
| 10 fecbrero, 2023
| Developer: Alejandro Arias
| Descripción: Se comento está línea es el error que no permitia el envió de e-mail.
|              Se comentan estás líneas que pertenecen a la función con error. #2
|--------------------------------------------------------------------------
| 
*/

// $mensajeFinal = str_replace("#Desc_Motivo_baja#",$motivo[0]["Desc_Motivo_baja"],$mensajeFinal);#2
// $mensajeFinal = str_replace("#Desc_Destino_final#",$motivo[0]["Desc_Destino_final"],$mensajeFinal);#2
// $mensajeFinal = str_replace("#Comentarios#",$motivo[0]["Comentarios"],$mensajeFinal);#2
// $mensajeFinal = str_replace("#Costos#",$motivo[0]["Costos"],$mensajeFinal);#2
 
 $activo 		= $obj->obtenCatalogo($Id_Activo,"siga_activos","Id_Activo","Id_Activo"); 
 $Id_Area 		= $activo[0]["Id_Area"];
 $usuarioEnvia 	= $obj->obtenCatalogo($Id_Area,"siga_jefe_area","Id_Area","Id_Area");

  $url = "https://apps2.hospitalsatelite.com/".$obj->rutaSistema()."/fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php";
	$cliente = curl_init();
	curl_setopt($cliente, CURLOPT_URL, $url);
	curl_setopt($cliente, CURLOPT_POST, 1);
	curl_setopt($cliente, CURLOPT_POSTFIELDS, "num_empleado=".$usuarioEnvia[0]["Num_Empleado"]."&accion=consultar");
	curl_setopt($cliente, CURLOPT_RETURNTRANSFER, 1);
	$Resp_cont_enc_m=curl_exec($cliente);
	curl_close($cliente);

	$Resp_cont_enc_m=json_decode($Resp_cont_enc_m, true);
	$correos_destino="";
	if($Resp_cont_enc_m["totalCount"]>0){
		$emailUsuario =$Resp_cont_enc_m["data"][0]["email"];
		if($emailUsuario!=""){
			$correos_destino=$emailUsuario;
		}
	}
	
	if($email_user_resp!=""){
		$email_user_resp =$email_user_resp[0]["email"];
	}
	
	if($correos_destino!=""){
		if($email_user_resp!=""){
			$correos_destino.="; ".$email_user_resp;
		}
	}
	
	if($correos_destino!=""){
		$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
		
		$subject=str_replace("á", "a|", $subject);
		$subject=str_replace("Á", "A|", $subject);
		$subject=str_replace("é", "e|", $subject);
		$subject=str_replace("É", "E|", $subject);
		$subject=str_replace("í", "i|", $subject);
		$subject=str_replace("Í", "I|", $subject);
		$subject=str_replace("ó", "o|", $subject);
		$subject=str_replace("Ó", "O|", $subject);
		$subject=str_replace("ú", "u|", $subject);
		$subject=str_replace("Ú", "U|", $subject);
		$subject=str_replace("ñ", "n|", $subject);
		$subject=str_replace("Ñ", "N|", $subject);
		
		$mensajeFinal=str_replace("á", "a|", $mensajeFinal);
		$mensajeFinal=str_replace("Á", "A|", $mensajeFinal);
		$mensajeFinal=str_replace("é", "e|", $mensajeFinal);
		$mensajeFinal=str_replace("É", "E|", $mensajeFinal);
		$mensajeFinal=str_replace("í", "i|", $mensajeFinal);
		$mensajeFinal=str_replace("Í", "I|", $mensajeFinal);
		$mensajeFinal=str_replace("ó", "o|", $mensajeFinal);
		$mensajeFinal=str_replace("Ó", "O|", $mensajeFinal);
		$mensajeFinal=str_replace("ú", "u|", $mensajeFinal);
		$mensajeFinal=str_replace("Ú", "U|", $mensajeFinal);
		$mensajeFinal=str_replace("ñ", "n|", $mensajeFinal);
		$mensajeFinal=str_replace("Ñ", "N|", $mensajeFinal);

		$data = array('strPassword' => 'C68H17S49','strSubject' => $subject,'strTo'=>$correos_destino,'strHTMLBody'=>$mensajeFinal,'strBCC'=>$email,'strCc'=>'cmaqueda@hospitalsatelite.com');
		$correoASP = $obj->curlData($url,$data);
		echo "Enviado=".$mensajeFinal;
	}

