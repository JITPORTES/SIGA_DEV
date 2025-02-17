<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_activos_contabilidad/Siga_activos_contabilidadDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_activos_contabilidad/Siga_activos_contabilidadDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_activos_contabilidadController {
private $proveedor;
public function __construct() {
}
public function validarSiga_activos_contabilidad($Siga_activos_contabilidadDto){
$Siga_activos_contabilidadDto->setId_Activo_Contabilidad(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getId_Activo_Contabilidad()))));
$Siga_activos_contabilidadDto->setId_Activo(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getId_Activo()))));
$Siga_activos_contabilidadDto->setCentro_Costos(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getCentro_Costos()))));
$Siga_activos_contabilidadDto->setNo_Capex(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getNo_Capex()))));
$Siga_activos_contabilidadDto->setProrrateo(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getProrrateo()))));
$Siga_activos_contabilidadDto->setParticipa_Depreciacion(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getParticipa_Depreciacion()))));
$Siga_activos_contabilidadDto->setFecha_Inicio_Depr(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getFecha_Inicio_Depr()))));
$Siga_activos_contabilidadDto->setUrl_Factura(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getUrl_Factura()))));
$Siga_activos_contabilidadDto->setCuent_Cont_Act(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getCuent_Cont_Act()))));
$Siga_activos_contabilidadDto->setCuent_Cont_Act_B10(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getCuent_Cont_Act_B10()))));
$Siga_activos_contabilidadDto->setCuent_Cont_Result(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getCuent_Cont_Result()))));
$Siga_activos_contabilidadDto->setCuent_Cont_Result_B10(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getCuent_Cont_Result_B10()))));
$Siga_activos_contabilidadDto->setCuent_Cont_Dep(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getCuent_Cont_Dep()))));
$Siga_activos_contabilidadDto->setCuent_Cont_Dep_B10(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()))));
$Siga_activos_contabilidadDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getFech_Inser()))));
$Siga_activos_contabilidadDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getUsr_Inser()))));
$Siga_activos_contabilidadDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getFech_Mod()))));
$Siga_activos_contabilidadDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getUsr_Mod()))));
$Siga_activos_contabilidadDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getEstatus_Reg()))));
$Siga_activos_contabilidadDto->setUrl_Xml(strtoupper(str_ireplace("'","",trim($Siga_activos_contabilidadDto->getUrl_Xml()))));
return $Siga_activos_contabilidadDto;
}
public function selectSiga_activos_contabilidad($Siga_activos_contabilidadDto,$proveedor=null){
$Siga_activos_contabilidadDto=$this->validarSiga_activos_contabilidad($Siga_activos_contabilidadDto);
$Siga_activos_contabilidadDao = new Siga_activos_contabilidadDAO();
$Siga_activos_contabilidadDto = $Siga_activos_contabilidadDao->selectSiga_activos_contabilidad($Siga_activos_contabilidadDto,$proveedor);
return $Siga_activos_contabilidadDto;
}
public function insertSiga_activos_contabilidad($Siga_activos_contabilidadDto,$proveedor=null){
//$Siga_activos_contabilidadDto=$this->validarSiga_activos_contabilidad($Siga_activos_contabilidadDto);
$Siga_activos_contabilidadDao = new Siga_activos_contabilidadDAO();
$Siga_activos_contabilidadDto = $Siga_activos_contabilidadDao->insertSiga_activos_contabilidad($Siga_activos_contabilidadDto,$proveedor);
return $Siga_activos_contabilidadDto;
}
public function updateSiga_activos_contabilidad($Siga_activos_contabilidadDto,$proveedor=null){
//$Siga_activos_contabilidadDto=$this->validarSiga_activos_contabilidad($Siga_activos_contabilidadDto);
$Siga_activos_contabilidadDao = new Siga_activos_contabilidadDAO();
//$tmpDto = new Siga_activos_contabilidadDTO();
//$tmpDto = $Siga_activos_contabilidadDao->selectSiga_activos_contabilidad($Siga_activos_contabilidadDto,$proveedor);
//if($tmpDto!=""){//$Siga_activos_contabilidadDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_activos_contabilidadDto = $Siga_activos_contabilidadDao->updateSiga_activos_contabilidad($Siga_activos_contabilidadDto,$proveedor);
return $Siga_activos_contabilidadDto;
//}
//return "";
}
public function deleteSiga_activos_contabilidad($Siga_activos_contabilidadDto,$proveedor=null){
//$Siga_activos_contabilidadDto=$this->validarSiga_activos_contabilidad($Siga_activos_contabilidadDto);
$Siga_activos_contabilidadDao = new Siga_activos_contabilidadDAO();
$Siga_activos_contabilidadDto = $Siga_activos_contabilidadDao->deleteSiga_activos_contabilidad($Siga_activos_contabilidadDto,$proveedor);
return $Siga_activos_contabilidadDto;
}
}
?>