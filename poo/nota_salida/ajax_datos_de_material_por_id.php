<?php

if(isset($_POST['Id_material']) && $_POST['Id_material'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$Id_material  =$_POST['Id_material'];

$datos_material_externo_id="
SELECT  Id_Accesorio_Ext,
        Id_Solicitud_Ext,
        Nombre_Ext,
        Cantidad_Ext,
        Marca_Ext,
        No_Serie_Ext,
        Modelo_Ext
FROM    siga_det_accesorios_act_ext
WHERE   Id_Accesorio_Ext=$Id_material
";

$datos_material_externo_id_qry=$pdoConexion->query($datos_material_externo_id);
$datos_material_externo_id_res=$datos_material_externo_id_qry->fetchAll(PDO::FETCH_NAMED);

$pdoConexion=null;

echo json_encode($datos_material_externo_id_res);

}else{
echo json_encode('Sin datos');
}

?>