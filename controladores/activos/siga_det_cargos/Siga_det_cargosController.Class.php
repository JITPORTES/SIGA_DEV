<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_cargos/Siga_det_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_cargos/Siga_det_cargosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_det_cargosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_cargos($Siga_det_cargosDto){
$Siga_det_cargosDto->setId_Det_Cargo(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getId_Det_Cargo()))));
$Siga_det_cargosDto->setId_Menu(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getId_Menu()))));
$Siga_det_cargosDto->setId_Submenu(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getId_Submenu()))));
$Siga_det_cargosDto->setId_Cargo(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getId_Cargo()))));
$Siga_det_cargosDto->setId_Aplicacion(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getId_Aplicacion()))));
$Siga_det_cargosDto->setLectura(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getLectura()))));
$Siga_det_cargosDto->setAlta(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getAlta()))));
$Siga_det_cargosDto->setBaja(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getBaja()))));
$Siga_det_cargosDto->setCambio(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getCambio()))));
$Siga_det_cargosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getFech_Inser()))));
$Siga_det_cargosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getUsr_Inser()))));
$Siga_det_cargosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getFech_Mod()))));
$Siga_det_cargosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getUsr_Mod()))));
$Siga_det_cargosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_det_cargosDto->getEstatus_Reg()))));
return $Siga_det_cargosDto;
}
public function selectSiga_det_cargos($Siga_det_cargosDto,$proveedor=null){
$Siga_det_cargosDto=$this->validarSiga_det_cargos($Siga_det_cargosDto);
$Siga_det_cargosDao = new Siga_det_cargosDAO();
$Siga_det_cargosDto = $Siga_det_cargosDao->selectSiga_det_cargos($Siga_det_cargosDto,$proveedor);
return $Siga_det_cargosDto;
}
public function insertSiga_det_cargos($Siga_det_cargosDto,$proveedor=null){
//$Siga_det_cargosDto=$this->validarSiga_det_cargos($Siga_det_cargosDto);
$Siga_det_cargosDao = new Siga_det_cargosDAO();
$Siga_det_cargosDto = $Siga_det_cargosDao->insertSiga_det_cargos($Siga_det_cargosDto,$proveedor);
return $Siga_det_cargosDto;
}
public function updateSiga_det_cargos($Siga_det_cargosDto,$proveedor=null){
//$Siga_det_cargosDto=$this->validarSiga_det_cargos($Siga_det_cargosDto);
$Siga_det_cargosDao = new Siga_det_cargosDAO();
//$tmpDto = new Siga_det_cargosDTO();
//$tmpDto = $Siga_det_cargosDao->selectSiga_det_cargos($Siga_det_cargosDto,$proveedor);
//if($tmpDto!=""){//$Siga_det_cargosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_det_cargosDto = $Siga_det_cargosDao->updateSiga_det_cargos($Siga_det_cargosDto,$proveedor);
return $Siga_det_cargosDto;
//}
//return "";
}
public function deleteSiga_det_cargos($Siga_det_cargosDto,$proveedor=null){
//$Siga_det_cargosDto=$this->validarSiga_det_cargos($Siga_det_cargosDto);
$Siga_det_cargosDao = new Siga_det_cargosDAO();
$Siga_det_cargosDto = $Siga_det_cargosDao->deleteSiga_det_cargos($Siga_det_cargosDto,$proveedor);
return $Siga_det_cargosDto;
}
}
?>