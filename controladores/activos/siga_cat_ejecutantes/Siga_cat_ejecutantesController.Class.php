<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ejecutantes/Siga_cat_ejecutantesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ejecutantes/Siga_cat_ejecutantesDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ejecutantesController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto){
$Siga_cat_ejecutantesDto->setId_Ejecutante(strtoupper(str_ireplace("'","",trim($Siga_cat_ejecutantesDto->getId_Ejecutante()))));
$Siga_cat_ejecutantesDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_ejecutantesDto->getId_Area()))));
$Siga_cat_ejecutantesDto->setNombre_Completo(strtoupper(str_ireplace("'","",trim($Siga_cat_ejecutantesDto->getNombre_Completo()))));
$Siga_cat_ejecutantesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_ejecutantesDto->getFech_Inser()))));
$Siga_cat_ejecutantesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_ejecutantesDto->getUsr_Inser()))));
$Siga_cat_ejecutantesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_ejecutantesDto->getFech_Mod()))));
$Siga_cat_ejecutantesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_ejecutantesDto->getUsr_Mod()))));
$Siga_cat_ejecutantesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_ejecutantesDto->getEstatus_Reg()))));
return $Siga_cat_ejecutantesDto;
}
public function selectSiga_cat_ejecutantes($Siga_cat_ejecutantesDto,$proveedor=null){
//$Siga_cat_ejecutantesDto=$this->validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
$Siga_cat_ejecutantesDao = new Siga_cat_ejecutantesDAO();
$Siga_cat_ejecutantesDto = $Siga_cat_ejecutantesDao->selectSiga_cat_ejecutantes($Siga_cat_ejecutantesDto,$proveedor);
return $Siga_cat_ejecutantesDto;
}
public function insertSiga_cat_ejecutantes($Siga_cat_ejecutantesDto,$proveedor=null){
//$Siga_cat_ejecutantesDto=$this->validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
$Siga_cat_ejecutantesDao = new Siga_cat_ejecutantesDAO();
$Siga_cat_ejecutantesDto = $Siga_cat_ejecutantesDao->insertSiga_cat_ejecutantes($Siga_cat_ejecutantesDto,$proveedor);
return $Siga_cat_ejecutantesDto;
}
public function updateSiga_cat_ejecutantes($Siga_cat_ejecutantesDto,$proveedor=null){
//$Siga_cat_ejecutantesDto=$this->validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
$Siga_cat_ejecutantesDao = new Siga_cat_ejecutantesDAO();
//$tmpDto = new Siga_cat_ejecutantesDTO();
//$tmpDto = $Siga_cat_ejecutantesDao->selectSiga_cat_ejecutantes($Siga_cat_ejecutantesDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_ejecutantesDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_ejecutantesDto = $Siga_cat_ejecutantesDao->updateSiga_cat_ejecutantes($Siga_cat_ejecutantesDto,$proveedor);
return $Siga_cat_ejecutantesDto;
//}
//return "";
}
public function deleteSiga_cat_ejecutantes($Siga_cat_ejecutantesDto,$proveedor=null){
//$Siga_cat_ejecutantesDto=$this->validarSiga_cat_ejecutantes($Siga_cat_ejecutantesDto);
$Siga_cat_ejecutantesDao = new Siga_cat_ejecutantesDAO();
$Siga_cat_ejecutantesDto = $Siga_cat_ejecutantesDao->deleteSiga_cat_ejecutantes($Siga_cat_ejecutantesDto,$proveedor);
return $Siga_cat_ejecutantesDto;
}
}
?>