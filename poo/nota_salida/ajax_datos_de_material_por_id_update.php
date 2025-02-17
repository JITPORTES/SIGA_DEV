<?php

if(isset($_POST['editar_Id_Accesorio_Ext_material']) && $_POST['editar_Id_Accesorio_Ext_material'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$editar_Id_Accesorio_Ext_material  	=trim($_POST['editar_Id_Accesorio_Ext_material']);
$editar_nombre_material  			=trim($_POST['editar_nombre_material']);
$editar_marca_material  			=trim($_POST['editar_marca_material']);
$editar_modelo_del_material			=trim($_POST['editar_modelo_del_material']);
$editar_serie_material  			=trim($_POST['editar_serie_material']);
$editar_cantidad_material  			=trim($_POST['editar_cantidad_material']);

$datos_material_externo_id_update="
UPDATE 	siga_det_accesorios_act_ext
SET 	Nombre_Ext='$editar_nombre_material',
		Marca_Ext='$editar_marca_material',
		Modelo_Ext='$editar_modelo_del_material',
		No_Serie_Ext='$editar_serie_material',
		Cantidad_Ext=$editar_cantidad_material,
		Estatus_Reg_Ext=2,
		Fech_Mod_Ext=getdate()
WHERE   Id_Accesorio_Ext=$editar_Id_Accesorio_Ext_material
";

$pdoConexion->query($datos_material_externo_id_update);
$pdoConexion=null;

		echo json_encode('OK');
	} else {
		echo json_encode('Datos Sin');
	}

?>