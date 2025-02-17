<?php

if(isset($_POST['sku_id']) && $_POST['sku_id'] !==''){

$sku_id=$_POST['sku_id'];

include_once(dirname(__FILE__)."/../../cx.php");

$accesorios_assist="
SELECT 
        inviar.art,
        inviar.des1,
        inviar.cod_barras,
        REPLACE(LTRIM(REPLACE(inviar.art,'0',' ')),' ','0') as sku_vista,
        inviar.s_lin,
        inviar.marca,
        invart.localizacion,
        invart.uds_sal,
        invart.Existencia,
        inviar.uds_min,
        invart.cto_prom
FROM    inviar
LEFT JOIN invart ON inviar.art=invart.art
WHERE   inviar.art='$sku_id'
AND     invart.alm='BIO'
AND     inviar.status=00
AND     inviar.lin != 'SER'
AND     invart.status=00
";

$accesorios_assist_qry=$pdoConexionAssit->query($accesorios_assist);
$accesorios_assist_res=$accesorios_assist_qry->fetchAll(PDO::FETCH_NAMED);

$pdoConexionAssit=null;

echo json_encode($accesorios_assist_res);
 }
 else
 { echo json_encode(false); }
?>