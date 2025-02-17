<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_menu/Siga_menuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_menu/Siga_menuDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_menuController {
private $proveedor;
public function __construct() {
}
public function validarSiga_menu($Siga_menuDto){
$Siga_menuDto->setId_Menu(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getId_Menu()))));
$Siga_menuDto->setId_Perfil(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getId_Perfil()))));
$Siga_menuDto->setNom_Menu(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getNom_Menu()))));
$Siga_menuDto->setUrl_Menu(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getUrl_Menu()))));
$Siga_menuDto->setIcono(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getIcono()))));
$Siga_menuDto->setOrden(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getOrden()))));
$Siga_menuDto->setPadre(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getPadre()))));
$Siga_menuDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getFech_Inser()))));
$Siga_menuDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getUsr_Inser()))));
$Siga_menuDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getFech_Mod()))));
$Siga_menuDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getUsr_Mod()))));
$Siga_menuDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_menuDto->getEstatus_Reg()))));
return $Siga_menuDto;
}
public function selectSiga_menu($Siga_menuDto,$proveedor=null){
$Siga_menuDto=$this->validarSiga_menu($Siga_menuDto);
$Siga_menuDao = new Siga_menuDAO();
$Siga_menuDto = $Siga_menuDao->selectSiga_menu($Siga_menuDto,$proveedor);
return $Siga_menuDto;
}
public function insertSiga_menu($Siga_menuDto,$proveedor=null){
//$Siga_menuDto=$this->validarSiga_menu($Siga_menuDto);
$Siga_menuDao = new Siga_menuDAO();
$Siga_menuDto = $Siga_menuDao->insertSiga_menu($Siga_menuDto,$proveedor);
return $Siga_menuDto;
}
public function updateSiga_menu($Siga_menuDto,$proveedor=null){
//$Siga_menuDto=$this->validarSiga_menu($Siga_menuDto);
$Siga_menuDao = new Siga_menuDAO();
//$tmpDto = new Siga_menuDTO();
//$tmpDto = $Siga_menuDao->selectSiga_menu($Siga_menuDto,$proveedor);
//if($tmpDto!=""){//$Siga_menuDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_menuDto = $Siga_menuDao->updateSiga_menu($Siga_menuDto,$proveedor);
return $Siga_menuDto;
//}
//return "";
}
public function deleteSiga_menu($Siga_menuDto,$proveedor=null){
//$Siga_menuDto=$this->validarSiga_menu($Siga_menuDto);
$Siga_menuDao = new Siga_menuDAO();
$Siga_menuDto = $Siga_menuDao->deleteSiga_menu($Siga_menuDto,$proveedor);
return $Siga_menuDto;
}
}
?>