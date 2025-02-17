<?php

include_once(dirname(__FILE__)."/../../cx.php");

$ubicacion_primaria="
SELECT 	Id_Ubic_Prim,
      	Desc_Ubic_Prim
FROM 	siga_cat_ubic_prim
WHERE 	Id_Area=1
";

$ubicacion_primaria_qry=$pdoConexion->query($ubicacion_primaria);
$ubicacion_primaria_res=$ubicacion_primaria_qry->fetchAll(PDO::FETCH_NAMED);

$ubicacion_primaria_array=["<option disabled selected>Ubicación Primaria</option>"];

for ($i=0; $i < count($ubicacion_primaria_res) ; $i++) { 
    $ubicacion_primaria_array[]="<option value='".$ubicacion_primaria_res[$i]['Id_Ubic_Prim']."'>".$ubicacion_primaria_res[$i]['Desc_Ubic_Prim']."</option>";
}

$pdoConexion=null;

echo json_encode($ubicacion_primaria_array);

?>