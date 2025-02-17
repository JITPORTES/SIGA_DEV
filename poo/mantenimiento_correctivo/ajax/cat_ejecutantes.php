<?php

include_once(dirname(__FILE__)."/../../cx.php");

$Id_Area=$_POST['Id_Area'];

$cat_ejecutante="
SELECT      Id_Ejecutante as ID, 
            Nombre_Completo
FROM        siga_cat_ejecutantes
WHERE       Id_Area=$Id_Area
AND         Estatus_Reg <> 3
";

$cat_ejecutante_qry=$pdoConexion->query($cat_ejecutante);
$cat_ejecutante_resul=$cat_ejecutante_qry->fetchAll(PDO::FETCH_NAMED);

$cat_ejecutante_array=array("<option disabled selected>Selecciona Ejecutante</option>");

for ($i=0; $i < count($cat_ejecutante_resul) ; $i++) { 
    $cat_ejecutante_array[]="<option value='".$cat_ejecutante_resul[$i]['ID']."'>".$cat_ejecutante_resul[$i]['Nombre_Completo']."</option>";
}

$pdoConexion=null;

echo json_encode($cat_ejecutante_array);

?>
