<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_menu/Siga_det_menuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_menu/Siga_det_menuDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_det_menuController {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_menu($Siga_det_menuDto){
$Siga_det_menuDto->setId_Det_Menu(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getId_Det_Menu()))));
$Siga_det_menuDto->setId_Menu(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getId_Menu()))));
$Siga_det_menuDto->setId_Submenu(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getId_Submenu()))));
$Siga_det_menuDto->setId_Usuario(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getId_Usuario()))));
$Siga_det_menuDto->setLectura(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getLectura()))));
$Siga_det_menuDto->setAlta(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getAlta()))));
$Siga_det_menuDto->setBaja(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getBaja()))));
$Siga_det_menuDto->setCambio(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getCambio()))));
$Siga_det_menuDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getFech_Inser()))));
$Siga_det_menuDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getUsr_Inser()))));
$Siga_det_menuDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getFech_Mod()))));
$Siga_det_menuDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getUsr_Mod()))));
$Siga_det_menuDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_det_menuDto->getEstatus_Reg()))));
return $Siga_det_menuDto;
}
public function selectSiga_det_menu($Siga_det_menuDto,$proveedor=null){
$Siga_det_menuDto=$this->validarSiga_det_menu($Siga_det_menuDto);
$Siga_det_menuDao = new Siga_det_menuDAO();
$Siga_det_menuDto = $Siga_det_menuDao->selectSiga_det_menu($Siga_det_menuDto,$proveedor);
return $Siga_det_menuDto;
}
public function insertSiga_det_menu($Siga_det_menuDto,$proveedor=null){
//$Siga_det_menuDto=$this->validarSiga_det_menu($Siga_det_menuDto);
$Siga_det_menuDao = new Siga_det_menuDAO();
$Siga_det_menuDto = $Siga_det_menuDao->insertSiga_det_menu($Siga_det_menuDto,$proveedor);
return $Siga_det_menuDto;
}
public function updateSiga_det_menu($Siga_det_menuDto,$proveedor=null){
//$Siga_det_menuDto=$this->validarSiga_det_menu($Siga_det_menuDto);
$Siga_det_menuDao = new Siga_det_menuDAO();
//$tmpDto = new Siga_det_menuDTO();
//$tmpDto = $Siga_det_menuDao->selectSiga_det_menu($Siga_det_menuDto,$proveedor);
//if($tmpDto!=""){//$Siga_det_menuDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_det_menuDto = $Siga_det_menuDao->updateSiga_det_menu($Siga_det_menuDto,$proveedor);
return $Siga_det_menuDto;
//}
//return "";
}
public function deleteSiga_det_menu($Siga_det_menuDto,$proveedor=null){
//$Siga_det_menuDto=$this->validarSiga_det_menu($Siga_det_menuDto);
$Siga_det_menuDao = new Siga_det_menuDAO();
$Siga_det_menuDto = $Siga_det_menuDao->deleteSiga_det_menu($Siga_det_menuDto,$proveedor);
return $Siga_det_menuDto;
}
}
?>