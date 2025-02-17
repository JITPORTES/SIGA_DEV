<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_ticket_usuarios_vip/Siga_ticket_usuarios_vipDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_ticket_usuarios_vip/Siga_ticket_usuarios_vipDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_ticket_usuarios_vipController {
private $proveedor;
public function __construct() {
}
public function validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto){
$Siga_ticket_usuarios_vipDto->setId_Usuario_Vip(strtoupper(str_ireplace("'","",trim($Siga_ticket_usuarios_vipDto->getId_Usuario_Vip()))));
$Siga_ticket_usuarios_vipDto->setId_Usuario(strtoupper(str_ireplace("'","",trim($Siga_ticket_usuarios_vipDto->getId_Usuario()))));
$Siga_ticket_usuarios_vipDto->setNo_Empleado(strtoupper(str_ireplace("'","",trim($Siga_ticket_usuarios_vipDto->getNo_Empleado()))));
$Siga_ticket_usuarios_vipDto->setNombre_Usuario(strtoupper(str_ireplace("'","",trim($Siga_ticket_usuarios_vipDto->getNombre_Usuario()))));
$Siga_ticket_usuarios_vipDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_ticket_usuarios_vipDto->getFech_Inser()))));
$Siga_ticket_usuarios_vipDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_ticket_usuarios_vipDto->getUsr_Inser()))));
$Siga_ticket_usuarios_vipDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_ticket_usuarios_vipDto->getFech_Mod()))));
$Siga_ticket_usuarios_vipDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_ticket_usuarios_vipDto->getUsr_Mod()))));
$Siga_ticket_usuarios_vipDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_ticket_usuarios_vipDto->getEstatus_Reg()))));
return $Siga_ticket_usuarios_vipDto;
}
public function selectSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto,$proveedor=null){
$Siga_ticket_usuarios_vipDto=$this->validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
$Siga_ticket_usuarios_vipDao = new Siga_ticket_usuarios_vipDAO();
$Siga_ticket_usuarios_vipDto = $Siga_ticket_usuarios_vipDao->selectSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto,$proveedor);
return $Siga_ticket_usuarios_vipDto;
}
public function insertSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto,$proveedor=null){
//$Siga_ticket_usuarios_vipDto=$this->validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
$Siga_ticket_usuarios_vipDao = new Siga_ticket_usuarios_vipDAO();
$Siga_ticket_usuarios_vipDto = $Siga_ticket_usuarios_vipDao->insertSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto,$proveedor);
return $Siga_ticket_usuarios_vipDto;
}
public function updateSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto,$proveedor=null){
//$Siga_ticket_usuarios_vipDto=$this->validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
$Siga_ticket_usuarios_vipDao = new Siga_ticket_usuarios_vipDAO();
//$tmpDto = new Siga_ticket_usuarios_vipDTO();
//$tmpDto = $Siga_ticket_usuarios_vipDao->selectSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto,$proveedor);
//if($tmpDto!=""){//$Siga_ticket_usuarios_vipDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_ticket_usuarios_vipDto = $Siga_ticket_usuarios_vipDao->updateSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto,$proveedor);
return $Siga_ticket_usuarios_vipDto;
//}
//return "";
}
public function deleteSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto,$proveedor=null){
//$Siga_ticket_usuarios_vipDto=$this->validarSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto);
$Siga_ticket_usuarios_vipDao = new Siga_ticket_usuarios_vipDAO();
$Siga_ticket_usuarios_vipDto = $Siga_ticket_usuarios_vipDao->deleteSiga_ticket_usuarios_vip($Siga_ticket_usuarios_vipDto,$proveedor);
return $Siga_ticket_usuarios_vipDto;
}
}
?>