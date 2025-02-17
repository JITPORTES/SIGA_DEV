<?php

if(isset($_POST['Id_Solicitud']) && $_POST['Id_Solicitud'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$Id_Solicitud  =$_POST['Id_Solicitud'];

$datos_material_externo="
SELECT   Nombre_Ext
        ,Cantidad_Ext
        ,Marca_Ext
        ,Modelo_Ext
        ,No_Serie_Ext
        ,Id_Accesorio_ext
FROM    siga_det_accesorios_act_ext
WHERE Id_Solicitud_Ext=$Id_Solicitud
AND Estatus_Reg_Ext <> 3
";

$datos_material_externo_qry=$pdoConexion->query($datos_material_externo);
$datos_material_externo_res=$datos_material_externo_qry->fetchAll(PDO::FETCH_NAMED);

$pdoConexion=null;

    echo json_encode($datos_material_externo_res);

    }else{
        echo json_encode('Sin datos');
    }
?>