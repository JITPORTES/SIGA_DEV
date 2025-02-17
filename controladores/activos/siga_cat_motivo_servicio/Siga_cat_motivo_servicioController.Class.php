<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_servicio/Siga_cat_motivo_servicioDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_motivo_servicio/Siga_cat_motivo_servicioDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_motivo_servicioController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto){
$Siga_cat_motivo_servicioDto->setId_Motivo_Servicio(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_servicioDto->getId_Motivo_Servicio()))));
$Siga_cat_motivo_servicioDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_servicioDto->getId_Area()))));
$Siga_cat_motivo_servicioDto->setDesc_Motivo_Servicio(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_servicioDto->getDesc_Motivo_Servicio()))));
$Siga_cat_motivo_servicioDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_servicioDto->getFech_Inser()))));
$Siga_cat_motivo_servicioDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_servicioDto->getUsr_Inser()))));
$Siga_cat_motivo_servicioDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_servicioDto->getFech_Mod()))));
$Siga_cat_motivo_servicioDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_servicioDto->getUsr_Mod()))));
$Siga_cat_motivo_servicioDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_servicioDto->getEstatus_Reg()))));
return $Siga_cat_motivo_servicioDto;
}
public function selectSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto,$proveedor=null){
$Siga_cat_motivo_servicioDto=$this->validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
$Siga_cat_motivo_servicioDao = new Siga_cat_motivo_servicioDAO();
$orden=" order by Desc_Motivo_Servicio asc";
$Siga_cat_motivo_servicioDto = $Siga_cat_motivo_servicioDao->selectSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto,$orden,$proveedor);
return $Siga_cat_motivo_servicioDto;
}
public function insertSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto,$proveedor=null){
//$Siga_cat_motivo_servicioDto=$this->validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
$Siga_cat_motivo_servicioDto->setFech_Inser("getdate()");
$Siga_cat_motivo_servicioDto->setFech_Mod("getdate()");
$Siga_cat_motivo_servicioDao = new Siga_cat_motivo_servicioDAO();
$Siga_cat_motivo_servicioDto = $Siga_cat_motivo_servicioDao->insertSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto,$proveedor);
return $Siga_cat_motivo_servicioDto;
}
public function updateSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto,$proveedor=null){
//$Siga_cat_motivo_servicioDto=$this->validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
$Siga_cat_motivo_servicioDto->setFech_Mod("getdate()");
$Siga_cat_motivo_servicioDao = new Siga_cat_motivo_servicioDAO();
//$tmpDto = new Siga_cat_motivo_servicioDTO();
//$tmpDto = $Siga_cat_motivo_servicioDao->selectSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_motivo_servicioDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_motivo_servicioDto = $Siga_cat_motivo_servicioDao->updateSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto,$proveedor);
return $Siga_cat_motivo_servicioDto;
//}
//return "";
}
public function deleteSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto,$proveedor=null){
//$Siga_cat_motivo_servicioDto=$this->validarSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto);
$Siga_cat_motivo_servicioDao = new Siga_cat_motivo_servicioDAO();
$Siga_cat_motivo_servicioDto = $Siga_cat_motivo_servicioDao->deleteSiga_cat_motivo_servicio($Siga_cat_motivo_servicioDto,$proveedor);
return $Siga_cat_motivo_servicioDto;
}
}
?>