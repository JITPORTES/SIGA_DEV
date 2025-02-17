<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_anios/Siga_cat_aniosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_anios/Siga_cat_aniosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_aniosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_anios($Siga_cat_aniosDto){
$Siga_cat_aniosDto->setId_Anios(strtoupper(str_ireplace("'","",trim($Siga_cat_aniosDto->getId_Anios()))));
$Siga_cat_aniosDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_aniosDto->getId_Area()))));
$Siga_cat_aniosDto->setDesc_Anios(strtoupper(str_ireplace("'","",trim($Siga_cat_aniosDto->getDesc_Anios()))));
$Siga_cat_aniosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_aniosDto->getFech_Inser()))));
$Siga_cat_aniosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_aniosDto->getUsr_Inser()))));
$Siga_cat_aniosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_aniosDto->getFech_Mod()))));
$Siga_cat_aniosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_aniosDto->getUsr_Mod()))));
$Siga_cat_aniosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_aniosDto->getEstatus_Reg()))));
return $Siga_cat_aniosDto;
}
public function selectSiga_cat_anios($Siga_cat_aniosDto,$proveedor=null){
$Siga_cat_aniosDto=$this->validarSiga_cat_anios($Siga_cat_aniosDto);
$Siga_cat_aniosDao = new Siga_cat_aniosDAO();
$Siga_cat_aniosDto = $Siga_cat_aniosDao->selectSiga_cat_anios($Siga_cat_aniosDto,$proveedor);
return $Siga_cat_aniosDto;
}
public function insertSiga_cat_anios($Siga_cat_aniosDto,$proveedor=null){
//$Siga_cat_aniosDto=$this->validarSiga_cat_anios($Siga_cat_aniosDto);
$Siga_cat_aniosDto->setFech_Inser("getdate()");
$Siga_cat_aniosDto->setFech_Mod("getdate()");
$Siga_cat_aniosDao = new Siga_cat_aniosDAO();
$Siga_cat_aniosDto = $Siga_cat_aniosDao->insertSiga_cat_anios($Siga_cat_aniosDto,$proveedor);
return $Siga_cat_aniosDto;
}
public function updateSiga_cat_anios($Siga_cat_aniosDto,$proveedor=null){
//$Siga_cat_aniosDto=$this->validarSiga_cat_anios($Siga_cat_aniosDto);
$Siga_cat_aniosDto->setFech_Mod("getdate()");
$Siga_cat_aniosDao = new Siga_cat_aniosDAO();
//$tmpDto = new Siga_cat_aniosDTO();
//$tmpDto = $Siga_cat_aniosDao->selectSiga_cat_anios($Siga_cat_aniosDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_aniosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_aniosDto = $Siga_cat_aniosDao->updateSiga_cat_anios($Siga_cat_aniosDto,$proveedor);
return $Siga_cat_aniosDto;
//}
//return "";
}
public function deleteSiga_cat_anios($Siga_cat_aniosDto,$proveedor=null){
//$Siga_cat_aniosDto=$this->validarSiga_cat_anios($Siga_cat_aniosDto);
$Siga_cat_aniosDao = new Siga_cat_aniosDAO();
$Siga_cat_aniosDto = $Siga_cat_aniosDao->deleteSiga_cat_anios($Siga_cat_aniosDto,$proveedor);
return $Siga_cat_aniosDto;
}
}
?>