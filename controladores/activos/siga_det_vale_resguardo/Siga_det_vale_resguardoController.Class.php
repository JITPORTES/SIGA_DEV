<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_vale_resguardo/Siga_det_vale_resguardoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_vale_resguardo/Siga_det_vale_resguardoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_det_vale_resguardoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto){
$Siga_det_vale_resguardoDto->setId_Det_Vale_Resguardo(strtoupper(str_ireplace("'","",trim($Siga_det_vale_resguardoDto->getId_Det_Vale_Resguardo()))));
$Siga_det_vale_resguardoDto->setId_Vale_Resguardo(strtoupper(str_ireplace("'","",trim($Siga_det_vale_resguardoDto->getId_Vale_Resguardo()))));
$Siga_det_vale_resguardoDto->setId_Activo(strtoupper(str_ireplace("'","",trim($Siga_det_vale_resguardoDto->getId_Activo()))));
$Siga_det_vale_resguardoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_vale_resguardoDto->getFech_Inser()))));
$Siga_det_vale_resguardoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_vale_resguardoDto->getUsr_Inser()))));
$Siga_det_vale_resguardoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_vale_resguardoDto->getFech_Mod()))));
$Siga_det_vale_resguardoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_vale_resguardoDto->getUsr_Mod()))));
$Siga_det_vale_resguardoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_det_vale_resguardoDto->getEstatus_Reg()))));
return $Siga_det_vale_resguardoDto;
}
public function selectSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor=null){
$Siga_det_vale_resguardoDto=$this->validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
$Siga_det_vale_resguardoDao = new Siga_det_vale_resguardoDAO();
$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoDao->selectSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor);
return $Siga_det_vale_resguardoDto;
}
public function insertSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor=null){
//$Siga_det_vale_resguardoDto=$this->validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
$Siga_det_vale_resguardoDao = new Siga_det_vale_resguardoDAO();
$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoDao->insertSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor);
return $Siga_det_vale_resguardoDto;
}
public function updateSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor=null){
//$Siga_det_vale_resguardoDto=$this->validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
$Siga_det_vale_resguardoDao = new Siga_det_vale_resguardoDAO();
//$tmpDto = new Siga_det_vale_resguardoDTO();
//$tmpDto = $Siga_det_vale_resguardoDao->selectSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor);
//if($tmpDto!=""){//$Siga_det_vale_resguardoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoDao->updateSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor);
return $Siga_det_vale_resguardoDto;
//}
//return "";
}
public function deleteSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor=null){
//$Siga_det_vale_resguardoDto=$this->validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
$Siga_det_vale_resguardoDao = new Siga_det_vale_resguardoDAO();
$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoDao->deleteSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor);
return $Siga_det_vale_resguardoDto;
}
}
?>