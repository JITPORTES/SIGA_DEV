 <?php 
 error_reporting(0);
 require_once("class/SIGA.php");

 $Id_Activo = $_POST["Id_Activo"];
 $obj = new SIGA(); 
 
 $existe = $obj->obtenCuentas($Id_Activo);
 
 echo json_encode(count($existe));	 
?>