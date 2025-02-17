<?php

if(isset($_POST['editar_ubicacion_primaria']) && $_POST['editar_ubicacion_primaria'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

$editar_ubicacion_primaria  =$_POST['editar_ubicacion_primaria'];

$ubicacion_secundaria="
SELECT  Id_Ubic_Sec,
        Desc_Ubic_Sec
FROM    siga_cat_ubic_sec
WHERE   Id_Ubic_Prim=$editar_ubicacion_primaria
";

$ubicacion_secundaria_qry=$pdoConexion->query($ubicacion_secundaria);
$ubicacion_secundaria_res=$ubicacion_secundaria_qry->fetchAll(PDO::FETCH_NAMED);

$ubicacion_secundaria_array=["<option disabled selected>Ubicación Secundaria</option>"];

for ($i=0; $i < count($ubicacion_secundaria_res) ; $i++) { 
    $ubicacion_secundaria_array[]="<option value='".$ubicacion_secundaria_res[$i]['Id_Ubic_Sec']."'>".$ubicacion_secundaria_res[$i]['Desc_Ubic_Sec']."</option>";
}

$pdoConexion=null;

echo json_encode($ubicacion_secundaria_array);

}else{
    $ubicacion_secundaria_array=["<option disabled selected>Sin Datos</option>"];
    echo json_encode($ubicacion_secundaria_array);
}
?>