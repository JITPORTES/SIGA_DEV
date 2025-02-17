<?php

if(isset($_POST['Id_ticket']) && $_POST['Id_ticket'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$Id_ticket=$_POST['Id_ticket'];

$update_estatus="
	UPDATE siga_solicitud_tickets
  	SET Estatus_Proceso=2
 	WHERE Id_Solicitud=$Id_ticket
";

$pdoConexion->query($update_estatus);
//$Pre_Registro_Ext_res=$Pre_Registro_Ext_qry->fetchAll(PDO::FETCH_NAMED);

$pdoConexion=null;

echo json_encode(true);
}

?>