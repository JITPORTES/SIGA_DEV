<?php 
 error_reporting(0);
 require_once("class/SIGA.php");

 $Id_Activo = $_POST["Id_Activo"];
 $obj = new SIGA(); 
 
 $activos = $obj->obtenActivoProveedor($Id_Activo);

 echo json_encode($activos);
?>