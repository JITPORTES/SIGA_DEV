<?php

if(isset($_POST['id_subcategoria_update']) && $_POST['id_subcategoria_update'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$id_subcategoria_update  =$_POST['id_subcategoria_update'];

$sql_id_sub_categoria_update="
SELECT  Desc_Subcategoria
FROM    siga_cat_ticket_subcategoria
WHERE   Id_Subcategoria=$id_subcategoria_update
";

$sql_id_sub_categoria_update_qry=$pdoConexion->query($sql_id_sub_categoria_update);
$sql_id_sub_categoria_update_sel=$sql_id_sub_categoria_update_qry->fetch(PDO::FETCH_COLUMN);

$pdoConexion=null;

echo json_encode($sql_id_sub_categoria_update_sel);

}else{
    echo json_encode('Sin datos');
}
?>