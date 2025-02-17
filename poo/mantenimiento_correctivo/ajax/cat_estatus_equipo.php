<?php

include_once(dirname(__FILE__)."/../../cx.php");

$Id_Area=$_POST['Id_Area'];

$cat_estatus_equipo="
SELECT  Id_Estatus
        ,Desc_Estatus
FROM    siga_cat_estatus
WHERE   Id_Area=5
AND     Id_Estatus != 12
";

$cat_estatus_equipo_qry=$pdoConexion->query($cat_estatus_equipo);
$cat_estatus_equipo_resul=$cat_estatus_equipo_qry->fetchAll(PDO::FETCH_NAMED);

$cat_estatus_equipo_array=array("<option disabled selected>Selecciona Estatus</option>");

for ($i=0; $i < count($cat_estatus_equipo_resul) ; $i++) { 
    $cat_estatus_equipo_array[]="<option value='".$cat_estatus_equipo_resul[$i]['Id_Estatus']."'>".$cat_estatus_equipo_resul[$i]['Desc_Estatus']."</option>";
}

$pdoConexion=null;

echo json_encode($cat_estatus_equipo_array);

?>