<?php 
 error_reporting(0);
 require_once("class/SIGA.php");

 $Id_CalificaTicket = $_GET["Id_CalificaTicket"];
 $Bin = $_GET["Bin"];
 $obj = new SIGA(); 
 
 $activos = $obj->obtenFirma($Id_CalificaTicket);

 //echo $activos[0]["Archivo_Binario"];
 if ($Bin==1)
 echo '<img src="data:image/jpeg;base64,'. $activos[0]["Archivo_Binario"] .'"/>';
 else
 {
 header('Content-type:image/jpg');
 //header("Content-Length:".strlen($activos[0]["Archivo_Binario"]));
 header('Content-Disposition: attachment; filename="'.$Id_CalificaTicket.'.jpg"');
 echo 	base64_decode($activos[0]["Archivo_Binario"]);
 exit();
 }
?>