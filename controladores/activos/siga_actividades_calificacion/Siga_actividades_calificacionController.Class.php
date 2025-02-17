<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_actividades_calificacion/Siga_actividades_calificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_actividades_calificacion/Siga_actividades_calificacionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_actividades_calificacionController {
private $proveedor;
public function __construct() {
}
public function validarSiga_actividades_calificacion($Siga_actividades_calificacionDto){
$Siga_actividades_calificacionDto->setId_Calificacion(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getId_Calificacion()))));
$Siga_actividades_calificacionDto->setId_Actividad(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getId_Actividad()))));
$Siga_actividades_calificacionDto->setCal_Sol_Ofrecida(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getCal_Sol_Ofrecida()))));
$Siga_actividades_calificacionDto->setComen_Sol_Ofrecida(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getComen_Sol_Ofrecida()))));
$Siga_actividades_calificacionDto->setCal_Act_Servicio(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getCal_Act_Servicio()))));
$Siga_actividades_calificacionDto->setComen_Act_Servicio(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getComen_Act_Servicio()))));
$Siga_actividades_calificacionDto->setCal_Tiem_Respusta(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getCal_Tiem_Respusta()))));
$Siga_actividades_calificacionDto->setComen_Tiem_Respuesta(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getComen_Tiem_Respuesta()))));
$Siga_actividades_calificacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getFech_Inser()))));
$Siga_actividades_calificacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getUsr_Inser()))));
$Siga_actividades_calificacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getFech_Mod()))));
$Siga_actividades_calificacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getUsr_Mod()))));
$Siga_actividades_calificacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_actividades_calificacionDto->getEstatus_Reg()))));
return $Siga_actividades_calificacionDto;
}
public function selectSiga_actividades_calificacion($Siga_actividades_calificacionDto,$proveedor=null){
$Siga_actividades_calificacionDto=$this->validarSiga_actividades_calificacion($Siga_actividades_calificacionDto);
$Siga_actividades_calificacionDao = new Siga_actividades_calificacionDAO();
$Siga_actividades_calificacionDto = $Siga_actividades_calificacionDao->selectSiga_actividades_calificacion($Siga_actividades_calificacionDto,$proveedor);
return $Siga_actividades_calificacionDto;
}
public function insertSiga_actividades_calificacion($Siga_actividades_calificacionDto,$proveedor=null){
//$Siga_actividades_calificacionDto=$this->validarSiga_actividades_calificacion($Siga_actividades_calificacionDto);
$Siga_actividades_calificacionDao = new Siga_actividades_calificacionDAO();
$Siga_actividades_calificacionDto->setFech_Inser("getdate()");
$Siga_actividades_calificacionDto->setFech_Mod("getdate()");

$Siga_actividades_calificacionDto = $Siga_actividades_calificacionDao->insertSiga_actividades_calificacion($Siga_actividades_calificacionDto,$proveedor);
return $Siga_actividades_calificacionDto;
}
public function updateSiga_actividades_calificacion($Siga_actividades_calificacionDto,$proveedor=null){
//$Siga_actividades_calificacionDto=$this->validarSiga_actividades_calificacion($Siga_actividades_calificacionDto);
$Siga_actividades_calificacionDao = new Siga_actividades_calificacionDAO();
$Siga_actividades_calificacionDto->setFech_Mod("getdate()");
//$tmpDto = new Siga_actividades_calificacionDTO();
//$tmpDto = $Siga_actividades_calificacionDao->selectSiga_actividades_calificacion($Siga_actividades_calificacionDto,$proveedor);
//if($tmpDto!=""){//$Siga_actividades_calificacionDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_actividades_calificacionDto = $Siga_actividades_calificacionDao->updateSiga_actividades_calificacion($Siga_actividades_calificacionDto,$proveedor);
return $Siga_actividades_calificacionDto;
//}
//return "";
}
public function deleteSiga_actividades_calificacion($Siga_actividades_calificacionDto,$proveedor=null){
//$Siga_actividades_calificacionDto=$this->validarSiga_actividades_calificacion($Siga_actividades_calificacionDto);
$Siga_actividades_calificacionDao = new Siga_actividades_calificacionDAO();
$Siga_actividades_calificacionDto = $Siga_actividades_calificacionDao->deleteSiga_actividades_calificacion($Siga_actividades_calificacionDto,$proveedor);
return $Siga_actividades_calificacionDto;
}
}
?>