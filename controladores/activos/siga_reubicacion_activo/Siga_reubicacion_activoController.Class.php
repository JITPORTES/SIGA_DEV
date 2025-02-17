<?php

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_reubicacion_activo/Siga_reubicacion_activoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_reubicacion_activo/Siga_reubicacion_activoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_reubicacion_activoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_reubicacion_activo($Siga_reubicacion_activoDto){
$Siga_reubicacion_activoDto->setId_Activo_Reubicacion(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getId_Activo_Reubicacion()))));
$Siga_reubicacion_activoDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getId_Area()))));
$Siga_reubicacion_activoDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getId_Ubic_Prim()))));
$Siga_reubicacion_activoDto->setId_Ubic_Sec(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getId_Ubic_Sec()))));
$Siga_reubicacion_activoDto->setId_Usuario_Responsable(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getId_Usuario_Responsable()))));
$Siga_reubicacion_activoDto->setNom_Usuario_Reponsable(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getNom_Usuario_Reponsable()))));
$Siga_reubicacion_activoDto->setCentro_Costos(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getCentro_Costos()))));
$Siga_reubicacion_activoDto->setJefe_Area(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getJefe_Area()))));
$Siga_reubicacion_activoDto->setMotivo_Reubicacion(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getMotivo_Reubicacion()))));
$Siga_reubicacion_activoDto->setComentarios_Reubicacion(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getComentarios_Reubicacion()))));
$Siga_reubicacion_activoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getFech_Inser()))));
$Siga_reubicacion_activoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getUsr_Inser()))));
$Siga_reubicacion_activoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getFech_Mod()))));
$Siga_reubicacion_activoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getUsr_Mod()))));
$Siga_reubicacion_activoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_reubicacion_activoDto->getEstatus_Reg()))));
return $Siga_reubicacion_activoDto;
}
public function selectSiga_reubicacion_activo($Siga_reubicacion_activoDto,$proveedor=null){
$Siga_reubicacion_activoDto=$this->validarSiga_reubicacion_activo($Siga_reubicacion_activoDto);
$Siga_reubicacion_activoDao = new Siga_reubicacion_activoDAO();
$Siga_reubicacion_activoDto = $Siga_reubicacion_activoDao->selectSiga_reubicacion_activo($Siga_reubicacion_activoDto,$proveedor);
return $Siga_reubicacion_activoDto;
}
public function insertSiga_reubicacion_activo($Siga_reubicacion_activoDto,$proveedor=null){
//$Siga_reubicacion_activoDto=$this->validarSiga_reubicacion_activo($Siga_reubicacion_activoDto);
$Siga_reubicacion_activoDao = new Siga_reubicacion_activoDAO();
$Siga_reubicacion_activoDto = $Siga_reubicacion_activoDao->insertSiga_reubicacion_activo($Siga_reubicacion_activoDto,$proveedor);
return $Siga_reubicacion_activoDto;
}
public function updateSiga_reubicacion_activo($Siga_reubicacion_activoDto,$proveedor=null){
//$Siga_reubicacion_activoDto=$this->validarSiga_reubicacion_activo($Siga_reubicacion_activoDto);
$Siga_reubicacion_activoDao = new Siga_reubicacion_activoDAO();
//$tmpDto = new Siga_reubicacion_activoDTO();
//$tmpDto = $Siga_reubicacion_activoDao->selectSiga_reubicacion_activo($Siga_reubicacion_activoDto,$proveedor);
//if($tmpDto!=""){//$Siga_reubicacion_activoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_reubicacion_activoDto = $Siga_reubicacion_activoDao->updateSiga_reubicacion_activo($Siga_reubicacion_activoDto,$proveedor);
return $Siga_reubicacion_activoDto;
//}
//return "";
}
public function deleteSiga_reubicacion_activo($Siga_reubicacion_activoDto,$proveedor=null){
//$Siga_reubicacion_activoDto=$this->validarSiga_reubicacion_activo($Siga_reubicacion_activoDto);
$Siga_reubicacion_activoDao = new Siga_reubicacion_activoDAO();
$Siga_reubicacion_activoDto = $Siga_reubicacion_activoDao->deleteSiga_reubicacion_activo($Siga_reubicacion_activoDto,$proveedor);
return $Siga_reubicacion_activoDto;
}
}
?>