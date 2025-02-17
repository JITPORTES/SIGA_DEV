<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_medios/Siga_cat_mediosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_medios/Siga_cat_mediosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_mediosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_medios($Siga_cat_mediosDto){
$Siga_cat_mediosDto->setId_Medio(strtoupper(str_ireplace("'","",trim($Siga_cat_mediosDto->getId_Medio()))));
$Siga_cat_mediosDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_mediosDto->getId_Area()))));
$Siga_cat_mediosDto->setDesc_Medio(strtoupper(str_ireplace("'","",trim($Siga_cat_mediosDto->getDesc_Medio()))));
$Siga_cat_mediosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_mediosDto->getFech_Inser()))));
$Siga_cat_mediosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_mediosDto->getUsr_Inser()))));
$Siga_cat_mediosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_mediosDto->getFech_Mod()))));
$Siga_cat_mediosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_mediosDto->getUsr_Mod()))));
$Siga_cat_mediosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_mediosDto->getEstatus_Reg()))));
return $Siga_cat_mediosDto;
}
public function selectSiga_cat_medios($Siga_cat_mediosDto,$proveedor=null){
$Siga_cat_mediosDto=$this->validarSiga_cat_medios($Siga_cat_mediosDto);
$Siga_cat_mediosDao = new Siga_cat_mediosDAO();
$Siga_cat_mediosDto = $Siga_cat_mediosDao->selectSiga_cat_medios($Siga_cat_mediosDto,$proveedor);
return $Siga_cat_mediosDto;
}
public function insertSiga_cat_medios($Siga_cat_mediosDto,$proveedor=null){
//$Siga_cat_mediosDto=$this->validarSiga_cat_medios($Siga_cat_mediosDto);
$Siga_cat_mediosDao = new Siga_cat_mediosDAO();
$Siga_cat_mediosDto = $Siga_cat_mediosDao->insertSiga_cat_medios($Siga_cat_mediosDto,$proveedor);
return $Siga_cat_mediosDto;
}
public function updateSiga_cat_medios($Siga_cat_mediosDto,$proveedor=null){
//$Siga_cat_mediosDto=$this->validarSiga_cat_medios($Siga_cat_mediosDto);
$Siga_cat_mediosDao = new Siga_cat_mediosDAO();
//$tmpDto = new Siga_cat_mediosDTO();
//$tmpDto = $Siga_cat_mediosDao->selectSiga_cat_medios($Siga_cat_mediosDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_mediosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_mediosDto = $Siga_cat_mediosDao->updateSiga_cat_medios($Siga_cat_mediosDto,$proveedor);
return $Siga_cat_mediosDto;
//}
//return "";
}
public function deleteSiga_cat_medios($Siga_cat_mediosDto,$proveedor=null){
//$Siga_cat_mediosDto=$this->validarSiga_cat_medios($Siga_cat_mediosDto);
$Siga_cat_mediosDao = new Siga_cat_mediosDAO();
$Siga_cat_mediosDto = $Siga_cat_mediosDao->deleteSiga_cat_medios($Siga_cat_mediosDto,$proveedor);
return $Siga_cat_mediosDto;
}
}
?>