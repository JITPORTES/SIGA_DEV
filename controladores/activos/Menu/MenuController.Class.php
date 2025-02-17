<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/Menu/MenuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/Menu/MenuDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class MenuController {
private $proveedor;
public function __construct() {
}
public function validarMenu($MenuDto){
$MenuDto->setId_Menu(strtoupper(str_ireplace("'","",trim($MenuDto->getId_Menu()))));
$MenuDto->setNombre_Menu(strtoupper(str_ireplace("'","",trim($MenuDto->getNombre_Menu()))));
$MenuDto->setDescripcion(strtoupper(str_ireplace("'","",trim($MenuDto->getDescripcion()))));
$MenuDto->setId_Menu_Padre(strtoupper(str_ireplace("'","",trim($MenuDto->getId_Menu_Padre()))));
$MenuDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($MenuDto->getEstatus_Reg()))));
$MenuDto->setUsr_Modifico(strtoupper(str_ireplace("'","",trim($MenuDto->getUsr_Modifico()))));
$MenuDto->setFecha(strtoupper(str_ireplace("'","",trim($MenuDto->getFecha()))));
return $MenuDto;
}
public function selectMenu($MenuDto,$proveedor=null){
$MenuDto=$this->validarMenu($MenuDto);
$MenuDao = new MenuDAO();
$MenuDto = $MenuDao->selectMenu($MenuDto,$proveedor);
return $MenuDto;
}
public function insertMenu($MenuDto,$proveedor=null){
$MenuDto=$this->validarMenu($MenuDto);
$MenuDao = new MenuDAO();
$MenuDto = $MenuDao->insertMenu($MenuDto,$proveedor);
return $MenuDto;
}
public function updateMenu($MenuDto,$proveedor=null){
$MenuDto=$this->validarMenu($MenuDto);
$MenuDao = new MenuDAO();
//$tmpDto = new MenuDTO();
//$tmpDto = $MenuDao->selectMenu($MenuDto,$proveedor);
//if($tmpDto!=""){//$MenuDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$MenuDto = $MenuDao->updateMenu($MenuDto,$proveedor);
return $MenuDto;
//}
//return "";
}
public function deleteMenu($MenuDto,$proveedor=null){
$MenuDto=$this->validarMenu($MenuDto);
$MenuDao = new MenuDAO();
$MenuDto = $MenuDao->deleteMenu($MenuDto,$proveedor);
return $MenuDto;
}
}
?>