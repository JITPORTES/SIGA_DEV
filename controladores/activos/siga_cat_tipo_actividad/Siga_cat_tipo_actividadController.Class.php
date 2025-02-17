<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_tipo_actividad/Siga_cat_tipo_actividadDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_tipo_actividad/Siga_cat_tipo_actividadDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_tipo_actividadController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto){
$Siga_cat_tipo_actividadDto->setId_Tipo_Actividad(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_actividadDto->getId_Tipo_Actividad()))));
$Siga_cat_tipo_actividadDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_actividadDto->getId_Area()))));
$Siga_cat_tipo_actividadDto->setDesc_Tipo_Actividad(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_actividadDto->getDesc_Tipo_Actividad()))));
$Siga_cat_tipo_actividadDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_actividadDto->getFech_Inser()))));
$Siga_cat_tipo_actividadDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_actividadDto->getUsr_Inser()))));
$Siga_cat_tipo_actividadDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_actividadDto->getFech_Mod()))));
$Siga_cat_tipo_actividadDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_actividadDto->getUsr_Mod()))));
$Siga_cat_tipo_actividadDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_actividadDto->getEstatus_Reg()))));
return $Siga_cat_tipo_actividadDto;
}
public function selectSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto,$proveedor=null){
$Siga_cat_tipo_actividadDto=$this->validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
$Siga_cat_tipo_actividadDao = new Siga_cat_tipo_actividadDAO();
$orden=" order by Desc_Tipo_Actividad asc";
$Siga_cat_tipo_actividadDto = $Siga_cat_tipo_actividadDao->selectSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto,$orden,$proveedor);
return $Siga_cat_tipo_actividadDto;
}
public function insertSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto,$proveedor=null){
//$Siga_cat_tipo_actividadDto=$this->validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
$Siga_cat_tipo_actividadDto->setFech_Inser("getdate()");
$Siga_cat_tipo_actividadDto->setFech_Mod("getdate()");
$Siga_cat_tipo_actividadDao = new Siga_cat_tipo_actividadDAO();
$Siga_cat_tipo_actividadDto = $Siga_cat_tipo_actividadDao->insertSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto,$proveedor);
return $Siga_cat_tipo_actividadDto;
}
public function updateSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto,$proveedor=null){
//$Siga_cat_tipo_actividadDto=$this->validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
$Siga_cat_tipo_actividadDto->setFech_Mod("getdate()");
$Siga_cat_tipo_actividadDao = new Siga_cat_tipo_actividadDAO();
//$tmpDto = new Siga_cat_tipo_actividadDTO();
//$tmpDto = $Siga_cat_tipo_actividadDao->selectSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_tipo_actividadDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_tipo_actividadDto = $Siga_cat_tipo_actividadDao->updateSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto,$proveedor);
return $Siga_cat_tipo_actividadDto;
//}
//return "";
}
public function deleteSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto,$proveedor=null){
//$Siga_cat_tipo_actividadDto=$this->validarSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto);
$Siga_cat_tipo_actividadDao = new Siga_cat_tipo_actividadDAO();
$Siga_cat_tipo_actividadDto = $Siga_cat_tipo_actividadDao->deleteSiga_cat_tipo_actividad($Siga_cat_tipo_actividadDto,$proveedor);
return $Siga_cat_tipo_actividadDto;
}
}
?>