<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_verificacion/Siga_det_verificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_verificacion/Siga_det_verificacionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_det_verificacionController {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_verificacion($Siga_det_verificacionDto){
$Siga_det_verificacionDto->setId_Det_Verficacion(strtoupper(str_ireplace("'","",trim($Siga_det_verificacionDto->getId_Det_Verficacion()))));
$Siga_det_verificacionDto->setId_Verificacion(strtoupper(str_ireplace("'","",trim($Siga_det_verificacionDto->getId_Verificacion()))));
$Siga_det_verificacionDto->setId_Activo(strtoupper(str_ireplace("'","",trim($Siga_det_verificacionDto->getId_Activo()))));
$Siga_det_verificacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_verificacionDto->getFech_Inser()))));
$Siga_det_verificacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_verificacionDto->getUsr_Inser()))));
$Siga_det_verificacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_verificacionDto->getFech_Mod()))));
$Siga_det_verificacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_verificacionDto->getUsr_Mod()))));
$Siga_det_verificacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_det_verificacionDto->getEstatus_Reg()))));
return $Siga_det_verificacionDto;
}
public function selectSiga_det_verificacion($Siga_det_verificacionDto,$proveedor=null){
$Siga_det_verificacionDto=$this->validarSiga_det_verificacion($Siga_det_verificacionDto);
$Siga_det_verificacionDao = new Siga_det_verificacionDAO();
$Siga_det_verificacionDto = $Siga_det_verificacionDao->selectSiga_det_verificacion($Siga_det_verificacionDto,$proveedor);
return $Siga_det_verificacionDto;
}
public function insertSiga_det_verificacion($Siga_det_verificacionDto,$proveedor=null){
//$Siga_det_verificacionDto=$this->validarSiga_det_verificacion($Siga_det_verificacionDto);
$Siga_det_verificacionDao = new Siga_det_verificacionDAO();
$Siga_det_verificacionDto = $Siga_det_verificacionDao->insertSiga_det_verificacion($Siga_det_verificacionDto,$proveedor);
return $Siga_det_verificacionDto;
}
public function updateSiga_det_verificacion($Siga_det_verificacionDto,$proveedor=null){
//$Siga_det_verificacionDto=$this->validarSiga_det_verificacion($Siga_det_verificacionDto);
$Siga_det_verificacionDao = new Siga_det_verificacionDAO();
//$tmpDto = new Siga_det_verificacionDTO();
//$tmpDto = $Siga_det_verificacionDao->selectSiga_det_verificacion($Siga_det_verificacionDto,$proveedor);
//if($tmpDto!=""){//$Siga_det_verificacionDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_det_verificacionDto = $Siga_det_verificacionDao->updateSiga_det_verificacion($Siga_det_verificacionDto,$proveedor);
return $Siga_det_verificacionDto;
//}
//return "";
}
public function deleteSiga_det_verificacion($Siga_det_verificacionDto,$proveedor=null){
//$Siga_det_verificacionDto=$this->validarSiga_det_verificacion($Siga_det_verificacionDto);
$Siga_det_verificacionDao = new Siga_det_verificacionDAO();
$Siga_det_verificacionDto = $Siga_det_verificacionDao->deleteSiga_det_verificacion($Siga_det_verificacionDto,$proveedor);
return $Siga_det_verificacionDto;
}
}
?>