<?php

if(isset($_POST['id_categoria_update']) && $_POST['id_categoria_update'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$id_categoria_update  =$_POST['id_categoria_update'];

$sql_id_categoria_update="
SELECT Desc_Categoria
FROM siga_cat_ticket_categoria
WHERE Id_Categoria=$id_categoria_update
";

$sql_id_categoria_update_qry=$pdoConexion->query($sql_id_categoria_update);
$sql_id_categoria_update_sel=$sql_id_categoria_update_qry->fetchAll(PDO::FETCH_COLUMN);

$pdoConexion=null;

echo json_encode($sql_id_categoria_update_sel);

}else{
    echo json_encode('Sin datos');
}
?>