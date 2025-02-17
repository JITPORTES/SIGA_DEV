<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_actividades/Siga_det_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_actividades/Siga_det_actividadesDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_det_actividadesController {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_actividades($Siga_det_actividadesDto){
$Siga_det_actividadesDto->setId_Det_Actividad(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getId_Det_Actividad()))));
$Siga_det_actividadesDto->setNombre_Actividad(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getNombre_Actividad()))));
$Siga_det_actividadesDto->setValor_Referencia(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getValor_Referencia()))));
$Siga_det_actividadesDto->setValor_Medido(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getValor_Medido()))));
$Siga_det_actividadesDto->setEstatus_Actividad(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getEstatus_Actividad()))));
$Siga_det_actividadesDto->setObservaciones(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getObservaciones()))));
$Siga_det_actividadesDto->setUrl_Adjunto(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getUrl_Adjunto()))));
$Siga_det_actividadesDto->setFecha_Programada(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getFecha_Programada()))));
$Siga_det_actividadesDto->setFecha_Realizada(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getFecha_Realizada()))));
$Siga_det_actividadesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getFech_Inser()))));
$Siga_det_actividadesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getUsr_Inser()))));
$Siga_det_actividadesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getFech_Mod()))));
$Siga_det_actividadesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getUsr_Mod()))));
$Siga_det_actividadesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getEstatus_Reg()))));
$Siga_det_actividadesDto->setV_Mesa(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getV_Mesa()))));
$Siga_det_actividadesDto->setCampo_2(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getCampo_2()))));
$Siga_det_actividadesDto->setCampo_3(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getCampo_3()))));
$Siga_det_actividadesDto->setCampo_4(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getCampo_4()))));
$Siga_det_actividadesDto->setCampo_5(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getCampo_5()))));
$Siga_det_actividadesDto->setCampo_6(strtoupper(str_ireplace("'","",trim($Siga_det_actividadesDto->getCampo_6()))));
return $Siga_det_actividadesDto;
}
public function selectSiga_det_actividades($Siga_det_actividadesDto,$proveedor=null){
$Siga_det_actividadesDto=$this->validarSiga_det_actividades($Siga_det_actividadesDto);
$Siga_det_actividadesDao = new Siga_det_actividadesDAO();
$Siga_det_actividadesDto = $Siga_det_actividadesDao->selectSiga_det_actividades($Siga_det_actividadesDto,$proveedor);
return $Siga_det_actividadesDto;
}
public function insertSiga_det_actividades($Siga_det_actividadesDto,$proveedor=null){
//$Siga_det_actividadesDto=$this->validarSiga_det_actividades($Siga_det_actividadesDto);
$Siga_det_actividadesDao = new Siga_det_actividadesDAO();
$Siga_det_actividadesDto = $Siga_det_actividadesDao->insertSiga_det_actividades($Siga_det_actividadesDto,$proveedor);
return $Siga_det_actividadesDto;
}
public function updateSiga_det_actividades($Siga_det_actividadesDto,$proveedor=null){
//$Siga_det_actividadesDto=$this->validarSiga_det_actividades($Siga_det_actividadesDto);
$Siga_det_actividadesDao = new Siga_det_actividadesDAO();
//$tmpDto = new Siga_det_actividadesDTO();
//$tmpDto = $Siga_det_actividadesDao->selectSiga_det_actividades($Siga_det_actividadesDto,$proveedor);
//if($tmpDto!=""){//$Siga_det_actividadesDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_det_actividadesDto = $Siga_det_actividadesDao->updateSiga_det_actividades($Siga_det_actividadesDto,$proveedor);
return $Siga_det_actividadesDto;
//}
//return "";
}
public function deleteSiga_det_actividades($Siga_det_actividadesDto,$proveedor=null){
//$Siga_det_actividadesDto=$this->validarSiga_det_actividades($Siga_det_actividadesDto);
$Siga_det_actividadesDao = new Siga_det_actividadesDAO();
$Siga_det_actividadesDto = $Siga_det_actividadesDao->deleteSiga_det_actividades($Siga_det_actividadesDto,$proveedor);
return $Siga_det_actividadesDto;
}
}
?>