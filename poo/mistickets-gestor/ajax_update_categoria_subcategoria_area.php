<?php

if(isset($_POST['id_solicitud_update']) && $_POST['id_solicitud_update'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$id_solicitud_update=$_POST['id_solicitud_update'];
$id_categoria_update=$_POST['id_categoria_update'];
$id_subcategoria_update=$_POST['id_subcategoria_update'];

$buscar_area="
		SELECT 	Id_Seccion
		FROM 	siga_cat_ticket_categoria
		WHERE 	Id_Categoria=$id_categoria_update
";

$buscar_area_qry=$pdoConexion->query($buscar_area);
$buscar_area_sel=$buscar_area_qry->fetchAll(PDO::FETCH_COLUMN);

$update_categoria_subcategoria="
	UPDATE 	siga_solicitud_tickets
  	SET 	Id_Categoria=$id_categoria_update, Id_Subcategoria=$id_subcategoria_update, Seccion=$buscar_area_sel[0]
 	WHERE 	Id_Solicitud=$id_solicitud_update
";

$pdoConexion->query($update_categoria_subcategoria);
$pdoConexion=null;

echo json_encode('OK:');
}else{
	echo json_encode('error31');
}
