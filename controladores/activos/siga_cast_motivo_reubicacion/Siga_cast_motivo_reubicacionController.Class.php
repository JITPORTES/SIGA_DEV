<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cast_motivo_reubicacion/Siga_cast_motivo_reubicacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cast_motivo_reubicacion/Siga_cast_motivo_reubicacionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cast_motivo_reubicacionController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto){
$Siga_cast_motivo_reubicacionDto->setId_Motivo_reubicacion(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()))));
$Siga_cast_motivo_reubicacionDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_reubicacionDto->getId_Area()))));
$Siga_cast_motivo_reubicacionDto->setDesc_Motivo_reubicacion(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()))));
$Siga_cast_motivo_reubicacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_reubicacionDto->getFech_Inser()))));
$Siga_cast_motivo_reubicacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_reubicacionDto->getUsr_Inser()))));
$Siga_cast_motivo_reubicacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_reubicacionDto->getFech_Mod()))));
$Siga_cast_motivo_reubicacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_reubicacionDto->getUsr_Mod()))));
$Siga_cast_motivo_reubicacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_reubicacionDto->getEstatus_Reg()))));
return $Siga_cast_motivo_reubicacionDto;
}
public function selectSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto,$proveedor=null){
$Siga_cast_motivo_reubicacionDto=$this->validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
$Siga_cast_motivo_reubicacionDao = new Siga_cast_motivo_reubicacionDAO();
$orden=" order by Desc_Motivo_reubicacion asc";
$Siga_cast_motivo_reubicacionDto = $Siga_cast_motivo_reubicacionDao->selectSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto,$orden,$proveedor);
return $Siga_cast_motivo_reubicacionDto;
}
public function insertSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto,$proveedor=null){
//$Siga_cast_motivo_reubicacionDto=$this->validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
$Siga_cast_motivo_reubicacionDto->setFech_Inser("getdate()");
$Siga_cast_motivo_reubicacionDto->setFech_Mod("getdate()");
$Siga_cast_motivo_reubicacionDao = new Siga_cast_motivo_reubicacionDAO();
$Siga_cast_motivo_reubicacionDto = $Siga_cast_motivo_reubicacionDao->insertSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto,$proveedor);
return $Siga_cast_motivo_reubicacionDto;
}
public function updateSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto,$proveedor=null){
//$Siga_cast_motivo_reubicacionDto=$this->validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
$Siga_cast_motivo_reubicacionDto->setFech_Mod("getdate()");
$Siga_cast_motivo_reubicacionDao = new Siga_cast_motivo_reubicacionDAO();
//$tmpDto = new Siga_cast_motivo_reubicacionDTO();
//$tmpDto = $Siga_cast_motivo_reubicacionDao->selectSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto,$proveedor);
//if($tmpDto!=""){//$Siga_cast_motivo_reubicacionDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cast_motivo_reubicacionDto = $Siga_cast_motivo_reubicacionDao->updateSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto,$proveedor);
return $Siga_cast_motivo_reubicacionDto;
//}
//return "";
}
public function deleteSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto,$proveedor=null){
//$Siga_cast_motivo_reubicacionDto=$this->validarSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto);
$Siga_cast_motivo_reubicacionDao = new Siga_cast_motivo_reubicacionDAO();
$Siga_cast_motivo_reubicacionDto = $Siga_cast_motivo_reubicacionDao->deleteSiga_cast_motivo_reubicacion($Siga_cast_motivo_reubicacionDto,$proveedor);
return $Siga_cast_motivo_reubicacionDto;
}
}
?>