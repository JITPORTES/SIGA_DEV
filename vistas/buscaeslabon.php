<?php 
 error_reporting(1);
 require_once("class/SIGA.php");
 header('Cache-Control: no-cache, must-revalidate');
 header('Content-type: application/json');

 $obj = new SIGA();
 $Id_Activo = $_POST["Id_Activo"];
 $workflow = $obj->obtenProcesoWorkflow($Id_Activo);
 
 echo json_encode($workflow); 
?>
