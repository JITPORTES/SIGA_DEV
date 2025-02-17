<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/inpc/InpcDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/inpc/InpcDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class InpcController {
private $proveedor;
public function __construct() {
}
public function validarInpc($InpcDto){
$InpcDto->setId_INPC(strtoupper(str_ireplace("'","",trim($InpcDto->getId_INPC()))));
$InpcDto->setAnio(strtoupper(str_ireplace("'","",trim($InpcDto->getAnio()))));
$InpcDto->setMes(strtoupper(str_ireplace("'","",trim($InpcDto->getMes()))));
$InpcDto->setValor(strtoupper(str_ireplace("'","",trim($InpcDto->getValor()))));
$InpcDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($InpcDto->getFech_Inser()))));
$InpcDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($InpcDto->getUsr_Inser()))));
$InpcDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($InpcDto->getFech_Mod()))));
$InpcDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($InpcDto->getUsr_Mod()))));
$InpcDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($InpcDto->getEstatus_Reg()))));
return $InpcDto;
}
public function selectInpc($InpcDto,$proveedor=null){
//$InpcDto=$this->validarInpc($InpcDto);
$InpcDao = new InpcDAO();
$InpcDto = $InpcDao->selectInpc($InpcDto,$proveedor);
return $InpcDto;
}
public function insertInpc($InpcDto,$proveedor=null){
//$InpcDto=$this->validarInpc($InpcDto);
$InpcDao = new InpcDAO();
$InpcDto->setFech_Inser("getdate()");
$InpcDto = $InpcDao->insertInpc($InpcDto,$proveedor);
return $InpcDto;
}
public function updateInpc($InpcDto,$proveedor=null){
$InpcDto=$this->validarInpc($InpcDto);
$InpcDao = new InpcDAO();
//$tmpDto = new InpcDTO();
//$tmpDto = $InpcDao->selectInpc($InpcDto,$proveedor);
//if($tmpDto!=""){//$InpcDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$InpcDto->setFech_Mod("getdate()");
$InpcDto = $InpcDao->updateInpc($InpcDto,$proveedor);
return $InpcDto;
//}
//return "";
}
public function deleteInpc($InpcDto,$proveedor=null){
//$InpcDto=$this->validarInpc($InpcDto);
$InpcDao = new InpcDAO();
$InpcDto = $InpcDao->deleteInpc($InpcDto,$proveedor);
return $InpcDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search) {
$InpcDao = new InpcDAO();
return $InpcDao->llenarDataTable($draw, $columns, $order, $start, $length, $search);
}
}
?>