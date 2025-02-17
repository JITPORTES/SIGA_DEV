<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_salida/Siga_cat_motivo_salidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_motivo_salida/Siga_cat_motivo_salidaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_motivo_salidaController {
private $proveedor;
public function __construct() {
}
public function selectSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto,$proveedor=null){
$Siga_cat_motivo_salidaDao = new Siga_cat_motivo_salidaDAO();
$orden=" order by Desc_Motivo_Alta asc ";
$Siga_cat_motivo_salidaDto = $Siga_cat_motivo_salidaDao->selectSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto,$orden,$proveedor);
return $Siga_cat_motivo_salidaDto;
}
public function insertSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto,$proveedor=null){
$Siga_cat_motivo_salidaDto->setFech_Inser("getdate()");
$Siga_cat_motivo_salidaDto->setFech_Mod("getdate()");
$Siga_cat_motivo_salidaDao = new Siga_cat_motivo_salidaDAO();
$Siga_cat_motivo_salidaDto = $Siga_cat_motivo_salidaDao->insertSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto,$proveedor);
return $Siga_cat_motivo_salidaDto;
}
public function updateSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto,$proveedor=null){
$Siga_cat_motivo_salidaDto->setFech_Mod("getdate()");
$Siga_cat_motivo_salidaDao = new Siga_cat_motivo_salidaDAO();
//$tmpDto = new Siga_cat_motivo_salidaDTO();
//$tmpDto = $Siga_cat_motivo_salidaDao->selectSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_motivo_salidaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_motivo_salidaDto = $Siga_cat_motivo_salidaDao->updateSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto,$proveedor);
return $Siga_cat_motivo_salidaDto;
//}
//return "";
}
public function deleteSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto,$proveedor=null){
$Siga_cat_motivo_salidaDao = new Siga_cat_motivo_salidaDAO();
$Siga_cat_motivo_salidaDto = $Siga_cat_motivo_salidaDao->deleteSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto,$proveedor);
return $Siga_cat_motivo_salidaDto;
}
}
?>