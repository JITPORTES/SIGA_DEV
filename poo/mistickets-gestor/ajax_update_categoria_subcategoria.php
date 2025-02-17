<?php

if(isset($_POST['id_solicitud_update']) && $_POST['id_solicitud_update'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$id_solicitud_update=$_POST['id_solicitud_update'];
$id_categoria_update=$_POST['id_categoria_update'];
$id_subcategoria_update=$_POST['id_subcategoria_update'];

$update_categoria_subcategoria="
	UPDATE 	siga_solicitud_tickets
  	SET 	Id_Categoria=$id_categoria_update, Id_Subcategoria=$id_subcategoria_update
 	WHERE 	Id_Solicitud=$id_solicitud_update
";

$pdoConexion->query($update_categoria_subcategoria);
$pdoConexion=null;

echo json_encode('OK');
}else{
	echo json_encode('error');
}

?>