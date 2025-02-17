<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_jefe_area/Siga_jefe_areaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_jefe_area/Siga_jefe_areaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_jefe_areaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_jefe_area($Siga_jefe_areaDto){
$Siga_jefe_areaDto->setId_Jefe_Area(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getId_Jefe_Area()))));
$Siga_jefe_areaDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getId_Area()))));
$Siga_jefe_areaDto->setNum_Empleado(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getNum_Empleado()))));
$Siga_jefe_areaDto->setNombre(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getNombre()))));
$Siga_jefe_areaDto->setCorreo(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getCorreo()))));
$Siga_jefe_areaDto->setCampo_1(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getCampo_1()))));
$Siga_jefe_areaDto->setCampo_2(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getCampo_2()))));
$Siga_jefe_areaDto->setCampo_3(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getCampo_3()))));
$Siga_jefe_areaDto->setCampo_4(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getCampo_4()))));
$Siga_jefe_areaDto->setCampo_5(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getCampo_5()))));
$Siga_jefe_areaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getFech_Inser()))));
$Siga_jefe_areaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getUsr_Inser()))));
$Siga_jefe_areaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getFech_Mod()))));
$Siga_jefe_areaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getUsr_Mod()))));
$Siga_jefe_areaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_jefe_areaDto->getEstatus_Reg()))));
return $Siga_jefe_areaDto;
}
public function selectSiga_jefe_area($Siga_jefe_areaDto,$proveedor=null){
$Siga_jefe_areaDto=$this->validarSiga_jefe_area($Siga_jefe_areaDto);
$Siga_jefe_areaDao = new Siga_jefe_areaDAO();
$Siga_jefe_areaDto = $Siga_jefe_areaDao->selectSiga_jefe_area($Siga_jefe_areaDto,$proveedor);
return $Siga_jefe_areaDto;
}
public function insertSiga_jefe_area($Siga_jefe_areaDto,$proveedor=null){
//$Siga_jefe_areaDto=$this->validarSiga_jefe_area($Siga_jefe_areaDto);
$Siga_jefe_areaDao = new Siga_jefe_areaDAO();
$Siga_jefe_areaDto = $Siga_jefe_areaDao->insertSiga_jefe_area($Siga_jefe_areaDto,$proveedor);
return $Siga_jefe_areaDto;
}
public function updateSiga_jefe_area($Siga_jefe_areaDto,$proveedor=null){
//$Siga_jefe_areaDto=$this->validarSiga_jefe_area($Siga_jefe_areaDto);
$Siga_jefe_areaDao = new Siga_jefe_areaDAO();
//$tmpDto = new Siga_jefe_areaDTO();
//$tmpDto = $Siga_jefe_areaDao->selectSiga_jefe_area($Siga_jefe_areaDto,$proveedor);
//if($tmpDto!=""){//$Siga_jefe_areaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_jefe_areaDto = $Siga_jefe_areaDao->updateSiga_jefe_area($Siga_jefe_areaDto,$proveedor);
return $Siga_jefe_areaDto;
//}
//return "";
}
public function deleteSiga_jefe_area($Siga_jefe_areaDto,$proveedor=null){
//$Siga_jefe_areaDto=$this->validarSiga_jefe_area($Siga_jefe_areaDto);
$Siga_jefe_areaDao = new Siga_jefe_areaDAO();
$Siga_jefe_areaDto = $Siga_jefe_areaDao->deleteSiga_jefe_area($Siga_jefe_areaDto,$proveedor);
return $Siga_jefe_areaDto;
}
}
?>