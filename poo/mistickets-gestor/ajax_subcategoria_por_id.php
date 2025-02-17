<?php

if(isset($_POST['id_categoria_select']) && $_POST['id_categoria_select'] !==''){

include_once(dirname(__FILE__)."/../cx.php"); 

$id_categoria_select  =$_POST['id_categoria_select'];

$sql_id_categoria_select="
SELECT  Id_Subcategoria, Desc_Subcategoria
FROM    siga_cat_ticket_subcategoria
WHERE   Id_Categoria=$id_categoria_select
";

$sql_id_categoria_select_qry=$pdoConexion->query($sql_id_categoria_select);
$sql_id_categoria_select_res=$sql_id_categoria_select_qry->fetchall(PDO::FETCH_NAMED);

$sql_id_categoria_select_array=[];

    for ($i=0; $i < count($sql_id_categoria_select_res) ; $i++) {    
            $sql_id_categoria_select_array[]="<option value='".$sql_id_categoria_select_res[$i]['Id_Subcategoria']."' $selected>".$sql_id_categoria_select_res[$i]['Desc_Subcategoria']."</option>";
    }


$pdoConexion=null;

echo json_encode($sql_id_categoria_select_array);

}else{
    echo json_encode('Sin datos');
}
?>