<?php

if(isset($_POST['Id_Ubic_Prim']) && $_POST['Id_Ubic_Prim'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

$Id_Ubic_Prim  =$_POST['Id_Ubic_Prim'];
$Id_Ubic_Sec  =$_POST['Id_Ubic_Sec'];

$ubicacion_secundaria="
SELECT  Id_Ubic_Sec,
        Desc_Ubic_Sec
FROM    siga_cat_ubic_sec
WHERE   Id_Ubic_Prim=$Id_Ubic_Prim
";

$ubicacion_secundaria_qry=$pdoConexion->query($ubicacion_secundaria);
$ubicacion_secundaria_res=$ubicacion_secundaria_qry->fetchAll(PDO::FETCH_NAMED);

$ubicacion_secundaria_array=["<option disabled selected>Ubicación Secundaria</option>"];

for ($i=0; $i < count($ubicacion_secundaria_res) ; $i++) { 
    if($ubicacion_secundaria_res[$i]['Id_Ubic_Sec'] == $Id_Ubic_Sec){$selected="selected";}else{$selected="";}
    $ubicacion_secundaria_array[]="<option value='".$ubicacion_secundaria_res[$i]['Id_Ubic_Sec']."' $selected>".$ubicacion_secundaria_res[$i]['Desc_Ubic_Sec']."</option>";
}

$pdoConexion=null;

echo json_encode($ubicacion_secundaria_array);

}else{
    $ubicacion_secundaria_array=["<option disabled selected>Sin Datos</option>"];
    echo json_encode($ubicacion_secundaria_array);
}
?>