<?php 
 error_reporting(1);
 require_once("class/SIGA.php");
 require_once("../datos/mail/correo.php");
 
 $Id_Activo = $_GET["Id_Activo"];
 $Id_Usuario = $_GET["Usuario"];
 $email = "javier@mockup.mx";
 
 $url = $_SERVER['REQUEST_URI']; //returns the current URL
 $parts = explode('/',$url);
 $dir = $_SERVER['SERVER_NAME'];
 $paginaSEO = "//".$dir."/".$parts[1]."/";
 if (isset($parts[2]))
 $paginaSEO = $paginaSEO.$parts[2]."/"; 
 
 $RUTA = $paginaSEO;
 
 $obj = new SIGA();  
 $activo = $obj->obtenCatalogo($Id_Activo,"siga_activos","Id_Activo","Nombre_Activo",""," and Estatus_Reg<>3 ");
 $motivo = $obj->obtenDetalleBaja($Id_Activo);
 $usuarioEnvia = $obj->obtenCatalogo($Id_Usuario,"siga_usuarios","Id_Usuario","Nombre_Usuario");
 
 $url = "http:".$RUTA."../fachadas/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoFacade.Class.php";
 echo $url;
 $data = array('accion' => 'consultar', 'num_empleado' => $usuarioEnvia[0]["No_Usuario"]);
 $eslabon = $obj->curlData($url,$data);
 $datosUsuario = $eslabon["data"];
 ?>