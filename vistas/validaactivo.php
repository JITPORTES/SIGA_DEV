<?php 
 error_reporting(1);
 require_once("class/SIGA.php");
 header('Cache-Control: no-cache, must-revalidate');
 header('Content-type: application/json');

 $obj = new SIGA();
 $AF_BC = $_POST["AF_BC"];
 $activo = $obj->obtenCatalogo($AF_BC,"siga_activos","AF_BC","Nombre_Activo",""," and Estatus_Reg=1 ");
 
 echo json_encode($activo); 
?>
