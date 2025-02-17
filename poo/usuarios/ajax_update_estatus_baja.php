<?php

if(isset($_POST['id_usuario']) && $_POST['id_usuario'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$id_usuario  =$_POST['id_usuario'];

$update_estatus_baja="
UPDATE siga_usuarios
SET Estatus_Reg = 3
WHERE Id_Usuario=$id_usuario
";

$update_estatus_baja_qry=$pdoConexion->query($update_estatus_baja);

$pdoConexion=null;

echo json_encode(true);
}else{
echo json_encode(false);
}

?>