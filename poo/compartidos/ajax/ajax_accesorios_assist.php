<?php

include_once(dirname(__FILE__)."/../../cx.php");

$accesorios_assist="
SELECT 
        inviar.art,
        inviar.des1
FROM    inviar
LEFT JOIN invart ON inviar.art=invart.art
WHERE   invart.alm='BIO'
AND     inviar.status=00
AND     inviar.lin != 'SER'
AND     invart.status=00
";

$accesorios_assist_qry=$pdoConexionAssit->query($accesorios_assist);
$accesorios_assist_res=$accesorios_assist_qry->fetchAll(PDO::FETCH_NAMED);

$accesorios_assist_array=["<option disabled selected value='default'> Seleccionar Material Disponible </option>"];

for ($i=0; $i < count($accesorios_assist_res) ; $i++) { 
    $accesorios_assist_array[]="<option value='".$accesorios_assist_res[$i]['art']."'>".$accesorios_assist_res[$i]['des1'].'- ('.ltrim($accesorios_assist_res[$i]['art'],'0').')'."</option>";
}

$pdoConexionAssit=null;


echo json_encode($accesorios_assist_array);

?>