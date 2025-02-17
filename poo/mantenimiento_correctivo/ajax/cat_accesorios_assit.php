<?php

if(isset($_POST['Id_Seccion']) && $_POST['Id_Seccion'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");


$Id_Seccion=$_POST['Id_Seccion'];

$cat_categoria="
SELECT  Id_Categoria, 
        Desc_Categoria
FROM    siga_cat_ticket_categoria
WHERE   Id_Seccion=$Id_Seccion
";

$cat_categoria_qry=$pdoConexion->query($cat_categoria);
$cat_categoria_resul=$cat_categoria_qry->fetchAll(PDO::FETCH_NAMED);

$cat_categoria_array=array("<option disabled selected>Selecciona Categoría</option>");

for ($i=0; $i < count($cat_categoria_resul) ; $i++) { 
    $cat_categoria_array[]="<option value='".$cat_categoria_resul[$i]['Id_Categoria']."'>".$cat_categoria_resul[$i]['Desc_Categoria']."</option>";
}

$pdoConexion=null;
echo json_encode($cat_categoria_array);

}else{
  echo false;
} 

?>