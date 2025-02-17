<?php 
 error_reporting(1);
 require_once("class/SIGA.php");
 //require_once("../datos/mail/correo.php");
 require_once("CURL.php");
 
 $Id_Activo = $_POST["Id_Activo"];
 $Id_Baja = $_POST["Id_Baja"];
 //$Id_Usuario = $_POST["Usuario"];
 $Paso = $_POST["Paso"];
 //$email = "javier@mockup.mx";
 $email = "itdeveloper@hospitalsatelite.com";

 $dir = $_SERVER['SERVER_NAME']; 
 $obj = new SIGA();  
 $RUTA = "//".$dir."/".$obj->rutaSistema();
 
 $activo = $obj->obtenCatalogo($Id_Activo,"siga_activos","Id_Activo","Nombre_Activo",""," and Estatus_Reg<>3");
 $motivo = $obj->obtenDetalleBaja($Id_Activo, $Id_Baja);
 $proceso_actual = $obj->obtenProcesoWorkflow2($Id_Activo);
 $usuarioEnvia = $obj->obtenCatalogo($proceso_actual[0]["Id_Usuario"],"siga_usuarios","Id_Usuario","Nombre_Usuario");
 //$email = $usuarioEnvia[0]["Correo"];
 //print_r($usuarioEnvia);
 //$Paso = $obj->insertaProcesoWorkflow($Id_Activo,$Id_Usuario);
 //print_r($activo);
 $nombre = $usuarioEnvia[0]["Nombre_Usuario"];
 $subject = "Baja no aceptada: ".$activo[0]["Nombre_Activo"]." AFBC: ".$activo[0]["AF_BC"]." no aceptada ";
 $correo = new Correo();
 
 $cont=0;
 $objenvia = new CURL();
 for ($i=1; $i <= count($proceso_actual); $i++)
 {
 $usuario = $obj->obtenCatalogo($proceso_actual[$cont]["Id_Usuario"],"siga_usuarios","Id_Usuario","Nombre_Usuario");
 
 $mensajeFinal = file_get_contents('../datos/mail/correosiga2.html');
 $mensajeFinal = str_replace("#ACTIVO#",$activo[0]["Nombre_Activo"]." / ".$activo[0]["AF_BC"],$mensajeFinal);
 $mensajeFinal = str_replace("#Id_Activo#",$Id_Activo,$mensajeFinal);
 $mensajeFinal = str_replace("#RUTA#",$RUTA,$mensajeFinal);
 $mensajeFinal = str_replace("#PASO#",$Paso,$mensajeFinal);
 //$mensajeFinal = str_replace("#Id_Usuario#",$Id_Usuario,$mensajeFinal);
 $mensajeFinal = str_replace("#USUARIO#",$usuario[0]["Nombre_Usuario"],$mensajeFinal);
 $mensajeFinal = str_replace("#USER#",$usuario[0]["Nombre_Usuario"],$mensajeFinal);
 $mensajeFinal = str_replace("#AFBC#",$activo[0]["AF_BC"],$mensajeFinal);
 $mensajeFinal = str_replace("#DescCorta#",$activo[0]["DescCorta"],$mensajeFinal);
 $mensajeFinal = str_replace("#Marca#",$activo[0]["Marca"],$mensajeFinal);
 $mensajeFinal = str_replace("#Modelo#",$activo[0]["Modelo"],$mensajeFinal);
 $mensajeFinal = str_replace("#Serie#",$activo[0]["NumSerie"],$mensajeFinal); 
 $mensajeFinal = str_replace("#Desc_Motivo_baja#",$motivo[0]["Desc_Motivo_baja"],$mensajeFinal);
 $mensajeFinal = str_replace("#Desc_Destino_final#",$motivo[0]["Desc_Destino_final"],$mensajeFinal);
 $mensajeFinal = str_replace("#Comentarios#",$motivo[0]["Comentarios"],$mensajeFinal);
 $mensajeFinal = str_replace("#ComentarioBaja#",$proceso_actual[0]["ComentarioBaja"],$mensajeFinal);
 
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
 
	 if($proceso_actual[$cont]["Orden"]==1){
		 $emailUsuario = $proceso_actual[$cont]["Correo"];
		 
		 $url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";                                       
		 //$data = array('strPassword' => 'C68H17S49', 'strSubject' => $subject,'strTo'=>$emailUsuario,'strHTMLBody'=>$mensajeFinal,'strCc'=>"",'strBCC'=>"itdeveloper@hospitalsatelite.com");		
		 $data = array('strPassword' => 'C68H17S49', 'strSubject' => $subject,'strTo'=>"itdeveloper@hospitalsatelite.com",'strHTMLBody'=>$mensajeFinal,'strCc'=>"cmaqueda@hospitalsatelite.com",'strBCC'=>"itdeveloper@hospitalsatelite.com");		
		 $correoASP = $objenvia->curlData($url,$data);
		 
		 
		 //$correo->enviaCorreo("itdeveloper@hospitalsatelite.com","SIGA BAJA ACTIVOS ".$usuario[0]["Nombre_Usuario"],$subject,$mensajeFinal,"","");
		 //if ($emailUsuario != "")
		 // //$correo->enviaCorreo($emailUsuario,"SIGA BAJA ACTIVOS ",$subject,$mensajeFinal,"","");
		 // $correo->enviaCorreo("itdeveloper@hospitalsatelite.com","SIGA BAJA ACTIVOS ",$subject,$mensajeFinal,"","");
		 // echo "<br>Enviado a ".$emailUsuario;
		 echo "Enviado ".$emailUsuario;
	 }
	 $cont=$cont+1;
 }
 
?>
