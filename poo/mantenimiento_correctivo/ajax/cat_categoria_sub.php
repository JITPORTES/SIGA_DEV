<?php

if(isset($_POST['Id_Categoria']) && $_POST['Id_Categoria'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");


$Id_Categoria=$_POST['Id_Categoria'];

$cat_categoria_sub="
SELECT  Id_Subcategoria, 
        Desc_Subcategoria
FROM    siga_cat_ticket_subcategoria
WHERE   Id_Categoria=$Id_Categoria
";

$cat_categoria_sub_qry=$pdoConexion->query($cat_categoria_sub);
$cat_categoria_sub_resul=$cat_categoria_sub_qry->fetchAll(PDO::FETCH_NAMED);

$cat_categoria_sub_array=array();

for ($i=0; $i < count($cat_categoria_sub_resul) ; $i++) { 
    $cat_categoria_sub_array[]="<option value='".$cat_categoria_sub_resul[$i]['Id_Subcategoria']."'>".$cat_categoria_sub_resul[$i]['Desc_Subcategoria']."</option>";
}

$pdoConexion=null;
echo json_encode($cat_categoria_sub_array);

}else{
  echo false;
} 

?>