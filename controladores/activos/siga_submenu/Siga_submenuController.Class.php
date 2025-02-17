<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_submenu/Siga_submenuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_submenu/Siga_submenuDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_submenuController {
private $proveedor;
public function __construct() {
}
public function validarSiga_submenu($Siga_submenuDto){
$Siga_submenuDto->setId_Submenu(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getId_Submenu()))));
$Siga_submenuDto->setId_Menu(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getId_Menu()))));
$Siga_submenuDto->setNom_Submenu(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getNom_Submenu()))));
$Siga_submenuDto->setUrl_Menu(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getUrl_Menu()))));
$Siga_submenuDto->setIcono(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getIcono()))));
$Siga_submenuDto->setOrden(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getOrden()))));
$Siga_submenuDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getFech_Inser()))));
$Siga_submenuDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getUsr_Inser()))));
$Siga_submenuDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getFech_Mod()))));
$Siga_submenuDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getUsr_Mod()))));
$Siga_submenuDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_submenuDto->getEstatus_Reg()))));
return $Siga_submenuDto;
}
public function selectSiga_submenu($Siga_submenuDto,$proveedor=null){
$Siga_submenuDto=$this->validarSiga_submenu($Siga_submenuDto);
$Siga_submenuDao = new Siga_submenuDAO();
$Siga_submenuDto = $Siga_submenuDao->selectSiga_submenu($Siga_submenuDto,$proveedor);
return $Siga_submenuDto;
}
public function insertSiga_submenu($Siga_submenuDto,$proveedor=null){
//$Siga_submenuDto=$this->validarSiga_submenu($Siga_submenuDto);
$Siga_submenuDao = new Siga_submenuDAO();
$Siga_submenuDto = $Siga_submenuDao->insertSiga_submenu($Siga_submenuDto,$proveedor);
return $Siga_submenuDto;
}
public function updateSiga_submenu($Siga_submenuDto,$proveedor=null){
//$Siga_submenuDto=$this->validarSiga_submenu($Siga_submenuDto);
$Siga_submenuDao = new Siga_submenuDAO();
//$tmpDto = new Siga_submenuDTO();
//$tmpDto = $Siga_submenuDao->selectSiga_submenu($Siga_submenuDto,$proveedor);
//if($tmpDto!=""){//$Siga_submenuDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_submenuDto = $Siga_submenuDao->updateSiga_submenu($Siga_submenuDto,$proveedor);
return $Siga_submenuDto;
//}
//return "";
}
public function deleteSiga_submenu($Siga_submenuDto,$proveedor=null){
//$Siga_submenuDto=$this->validarSiga_submenu($Siga_submenuDto);
$Siga_submenuDao = new Siga_submenuDAO();
$Siga_submenuDto = $Siga_submenuDao->deleteSiga_submenu($Siga_submenuDto,$proveedor);
return $Siga_submenuDto;
}
}
?>