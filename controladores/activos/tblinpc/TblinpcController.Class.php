<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/tblinpc/TblinpcDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/tblinpc/TblinpcDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class TblinpcController {
private $proveedor;
public function __construct() {
}
public function validarTblinpc($TblinpcDto){
$TblinpcDto->setId_INPC(strtoupper(str_ireplace("'","",trim($TblinpcDto->getId_INPC()))));
$TblinpcDto->setAnio(strtoupper(str_ireplace("'","",trim($TblinpcDto->getAnio()))));
$TblinpcDto->setMes(strtoupper(str_ireplace("'","",trim($TblinpcDto->getMes()))));
$TblinpcDto->setValor(strtoupper(str_ireplace("'","",trim($TblinpcDto->getValor()))));
$TblinpcDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($TblinpcDto->getFech_Inser()))));
$TblinpcDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($TblinpcDto->getUsr_Inser()))));
$TblinpcDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($TblinpcDto->getFech_Mod()))));
$TblinpcDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($TblinpcDto->getUsr_Mod()))));
$TblinpcDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($TblinpcDto->getEstatus_Reg()))));
return $TblinpcDto;
}
public function selectTblinpc($TblinpcDto,$proveedor=null){
$TblinpcDto=$this->validarTblinpc($TblinpcDto);
$TblinpcDao = new TblinpcDAO();
$TblinpcDto = $TblinpcDao->selectTblinpc($TblinpcDto,$proveedor);
return $TblinpcDto;
}
public function insertTblinpc($TblinpcDto,$proveedor=null){
//$TblinpcDto=$this->validarTblinpc($TblinpcDto);
$TblinpcDao = new TblinpcDAO();
$TblinpcDto = $TblinpcDao->insertTblinpc($TblinpcDto,$proveedor);
return $TblinpcDto;
}
public function updateTblinpc($TblinpcDto,$proveedor=null){
//$TblinpcDto=$this->validarTblinpc($TblinpcDto);
$TblinpcDao = new TblinpcDAO();
//$tmpDto = new TblinpcDTO();
//$tmpDto = $TblinpcDao->selectTblinpc($TblinpcDto,$proveedor);
//if($tmpDto!=""){//$TblinpcDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$TblinpcDto = $TblinpcDao->updateTblinpc($TblinpcDto,$proveedor);
return $TblinpcDto;
//}
//return "";
}
public function deleteTblinpc($TblinpcDto,$proveedor=null){
//$TblinpcDto=$this->validarTblinpc($TblinpcDto);
$TblinpcDao = new TblinpcDAO();
$TblinpcDto = $TblinpcDao->deleteTblinpc($TblinpcDto,$proveedor);
return $TblinpcDto;
}
}
?>