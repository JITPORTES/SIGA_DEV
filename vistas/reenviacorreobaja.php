<?php 
 error_reporting(1);
 require_once("class/SIGA.php");
 require_once("../datos/mail/correo.php");
 
 $Id_Activo = $_GET["Id_Activo"];
 $Id_Usuario = $_GET["Usuario"];
 //$email = "javier@mockup.mx";
 $email = "jtalon@hospitalsatelite.com";
 $dir = $_SERVER['SERVER_NAME']; 
 $obj = new SIGA();  
 $RUTA = "//".$dir."/".$obj->rutaSistema();
 

 $activo = $obj->obtenCatalogo($Id_Activo,"siga_activos","Id_Activo","Nombre_Activo",""," and Estatus_Reg<>3 ");
 $motivo = $obj->obtenDetalleBaja($Id_Activo);
 $usuarioEnvia = $obj->obtenCatalogo($Id_Usuario,"siga_usuarios","Id_Usuario","Nombre_Usuario");
 
 $url = "http:".$RUTA."/fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php";
 /*Curl Anterior*/
 //$data = array('accion' => 'consultar', 'num_empleado' => $usuarioEnvia[0]["No_Usuario"]);
 //$eslabon = $obj->curlData($url,$data);
 //$datosUsuario = $eslabon["data"];
 /*Fin Curl*/
 
 $nominas = curl_init();
 curl_setopt($nominas, CURLOPT_URL, $url);
 curl_setopt($nominas, CURLOPT_POST, 1);
 curl_setopt($nominas, CURLOPT_POSTFIELDS, "num_empleado=".$usuarioEnvia[0]["No_Usuario"]."&accion=consultar");
 curl_setopt($nominas, CURLOPT_RETURNTRANSFER, 1);
 $Resp_cont_enc_m=curl_exec($nominas);
 curl_close($nominas);
 $Resp_cont_enc_m=json_decode($Resp_cont_enc_m, true);
 
 //$usuarioEnvia = $obj->obtenCatalogo($Id_Usuario,"siga_usuarios","Id_Usuario","Nombre_Usuario");
 $emailUsuario = $Resp_cont_enc_m["data"][0]["email"];
 //echo $emailUsuario;
 //print_r($usuarioEnvia);
 $Paso = $obj->insertaProcesoWorkflow($Id_Activo,$Id_Usuario,$emailUsuario);
 //print_r($activo);
 $nombre = $Resp_cont_enc_m["data"][0]["nombre_completo"];
 $subject = "Solicitud de baja activo: ".$activo[0]["Nombre_Activo"]." AFBC: ".$activo[0]["AF_BC"];
 $correo = new Correo();
 $mensajeFinal = file_get_contents('../datos/mail/correosiga.html');
 $mensajeFinal = str_replace("#ACTIVO#",$activo[0]["Nombre_Activo"],$mensajeFinal);
 $mensajeFinal = str_replace("#Id_Activo#",$Id_Activo,$mensajeFinal);
 $mensajeFinal = str_replace("#RUTA#",$RUTA,$mensajeFinal);
 $mensajeFinal = str_replace("#PASO#",$Paso,$mensajeFinal);
 $mensajeFinal = str_replace("#Id_Usuario#",$Id_Usuario,$mensajeFinal);
 $mensajeFinal = str_replace("#USER#",$nombre,$mensajeFinal);
 
 $mensajeFinal = str_replace("#AFBC#",$activo[0]["AF_BC"],$mensajeFinal);
 $mensajeFinal = str_replace("#DescCorta#",$activo[0]["DescCorta"],$mensajeFinal);
 $mensajeFinal = str_replace("#Marca#",$activo[0]["Marca"],$mensajeFinal);
 $mensajeFinal = str_replace("#Modelo#",$activo[0]["Modelo"],$mensajeFinal);
 $mensajeFinal = str_replace("#Serie#",$activo[0]["NumSerie"],$mensajeFinal);
 $mensajeFinal = str_replace("#Desc_Motivo_baja#",$motivo[0]["Desc_Motivo_baja"],$mensajeFinal);
 $mensajeFinal = str_replace("#Desc_Destino_final#",$motivo[0]["Desc_Destino_final"],$mensajeFinal);
 $mensajeFinal = str_replace("#Comentarios#",$motivo[0]["Comentarios"],$mensajeFinal);
 $mensajeFinal = str_replace("#Costos#",$motivo[0]["Costos"],$mensajeFinal);
 
 $correo->enviaCorreo($email,"SIGA BAJA ACTIVOS ".$nombre,$subject,$mensajeFinal,"","");
 //$correo->enviaCorreo("cmaqueda@hospitalsatelite.com","SIGA BAJA ACTIVOS (PRUEBAS) ".$nombre,$subject,$mensajeFinal,"","");
 if ($emailUsuario != "")
 $correo->enviaCorreo($emailUsuario,"SIGA BAJA ACTIVOS ",$subject,$mensajeFinal,"","");
 //$correo->enviaCorreo("jpalacio@hospitalsatelite.com",$nombre,$subject,$mensajeFinal,"","");
 //$correo->enviaCorreo("carolina@mockup.mx",$nombre,$subject,$mensajeFinal,"","");

 echo "Enviado=".$emailUsuario;
?>
