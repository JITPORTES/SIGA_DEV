<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_cuenta_reubicacion/Siga_cat_cuenta_reubicacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_cuenta_reubicacion/Siga_cat_cuenta_reubicacionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_cuenta_reubicacionController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto){
$Siga_cat_cuenta_reubicacionDto->setId_Cuenta_reubicacion(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()))));
$Siga_cat_cuenta_reubicacionDto->setDesc_Cuenta_reubicacion(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()))));
$Siga_cat_cuenta_reubicacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_reubicacionDto->getFech_Inser()))));
$Siga_cat_cuenta_reubicacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_reubicacionDto->getUsr_Inser()))));
$Siga_cat_cuenta_reubicacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_reubicacionDto->getFech_Mod()))));
$Siga_cat_cuenta_reubicacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_reubicacionDto->getUsr_Mod()))));
$Siga_cat_cuenta_reubicacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_reubicacionDto->getEstatus_Reg()))));
return $Siga_cat_cuenta_reubicacionDto;
}
public function selectSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto,$proveedor=null){
$Siga_cat_cuenta_reubicacionDto=$this->validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
$Siga_cat_cuenta_reubicacionDao = new Siga_cat_cuenta_reubicacionDAO();
$Siga_cat_cuenta_reubicacionDto = $Siga_cat_cuenta_reubicacionDao->selectSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto,$proveedor);
return $Siga_cat_cuenta_reubicacionDto;
}
public function insertSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto,$proveedor=null){
$Siga_cat_cuenta_reubicacionDto=$this->validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
$Siga_cat_cuenta_reubicacionDao = new Siga_cat_cuenta_reubicacionDAO();
$Siga_cat_cuenta_reubicacionDto = $Siga_cat_cuenta_reubicacionDao->insertSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto,$proveedor);
return $Siga_cat_cuenta_reubicacionDto;
}
public function updateSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto,$proveedor=null){
$Siga_cat_cuenta_reubicacionDto=$this->validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
$Siga_cat_cuenta_reubicacionDao = new Siga_cat_cuenta_reubicacionDAO();
//$tmpDto = new Siga_cat_cuenta_reubicacionDTO();
//$tmpDto = $Siga_cat_cuenta_reubicacionDao->selectSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_cuenta_reubicacionDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_cuenta_reubicacionDto = $Siga_cat_cuenta_reubicacionDao->updateSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto,$proveedor);
return $Siga_cat_cuenta_reubicacionDto;
//}
//return "";
}
public function deleteSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto,$proveedor=null){
$Siga_cat_cuenta_reubicacionDto=$this->validarSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto);
$Siga_cat_cuenta_reubicacionDao = new Siga_cat_cuenta_reubicacionDAO();
$Siga_cat_cuenta_reubicacionDto = $Siga_cat_cuenta_reubicacionDao->deleteSiga_cat_cuenta_reubicacion($Siga_cat_cuenta_reubicacionDto,$proveedor);
return $Siga_cat_cuenta_reubicacionDto;
}
}
?>