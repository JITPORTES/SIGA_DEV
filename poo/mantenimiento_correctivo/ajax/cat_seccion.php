<?php

if(isset($_POST['Id_Area']) && $_POST['Id_Area'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");


$Id_Area=$_POST['Id_Area'];

$cat_seccion="
SELECT  Id_Seccion, 
        Desc_Seccion
FROM    siga_cat_ticket_seccion
WHERE   Id_Area=$Id_Area
";

$cat_seccion_qry=$pdoConexion->query($cat_seccion);
$cat_seccion_resul=$cat_seccion_qry->fetchAll(PDO::FETCH_NAMED);

$cat_seccion_array=array("<option disabled selected value='-1'>- Selecciona Sección -</option>");

for ($i=0; $i < count($cat_seccion_resul) ; $i++) { 
    $cat_seccion_array[]="<option value='".$cat_seccion_resul[$i]['Id_Seccion']."'>".$cat_seccion_resul[$i]['Desc_Seccion']."</option>";
}

$pdoConexion=null;

echo json_encode($cat_seccion_array);
}


?>