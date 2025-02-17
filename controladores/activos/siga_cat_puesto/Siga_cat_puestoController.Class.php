<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_puesto/Siga_cat_puestoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_puesto/Siga_cat_puestoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_puestoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_puesto($Siga_cat_puestoDto){
$Siga_cat_puestoDto->setId_Puesto(strtoupper(str_ireplace("'","",trim($Siga_cat_puestoDto->getId_Puesto()))));
$Siga_cat_puestoDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_puestoDto->getId_Area()))));
$Siga_cat_puestoDto->setDesc_Puesto(strtoupper(str_ireplace("'","",trim($Siga_cat_puestoDto->getDesc_Puesto()))));
$Siga_cat_puestoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_puestoDto->getFech_Inser()))));
$Siga_cat_puestoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_puestoDto->getUsr_Inser()))));
$Siga_cat_puestoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_puestoDto->getFech_Mod()))));
$Siga_cat_puestoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_puestoDto->getUsr_Mod()))));
$Siga_cat_puestoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_puestoDto->getEstatus_Reg()))));
return $Siga_cat_puestoDto;
}
public function selectSiga_cat_puesto($Siga_cat_puestoDto,$proveedor=null){
$Siga_cat_puestoDto=$this->validarSiga_cat_puesto($Siga_cat_puestoDto);
$Siga_cat_puestoDao = new Siga_cat_puestoDAO();
$orden=" order by Desc_Puesto asc";
$Siga_cat_puestoDto = $Siga_cat_puestoDao->selectSiga_cat_puesto($Siga_cat_puestoDto,$orden,$proveedor);
return $Siga_cat_puestoDto;
}
public function insertSiga_cat_puesto($Siga_cat_puestoDto,$proveedor=null){
//$Siga_cat_puestoDto=$this->validarSiga_cat_puesto($Siga_cat_puestoDto);
$Siga_cat_puestoDto->setFech_Inser("getdate()");
$Siga_cat_puestoDto->setFech_Mod("getdate()");
$Siga_cat_puestoDao = new Siga_cat_puestoDAO();
$Siga_cat_puestoDto = $Siga_cat_puestoDao->insertSiga_cat_puesto($Siga_cat_puestoDto,$proveedor);
return $Siga_cat_puestoDto;
}
public function updateSiga_cat_puesto($Siga_cat_puestoDto,$proveedor=null){
//$Siga_cat_puestoDto=$this->validarSiga_cat_puesto($Siga_cat_puestoDto);
$Siga_cat_puestoDto->setFech_Mod("getdate()");
$Siga_cat_puestoDao = new Siga_cat_puestoDAO();
//$tmpDto = new Siga_cat_puestoDTO();
//$tmpDto = $Siga_cat_puestoDao->selectSiga_cat_puesto($Siga_cat_puestoDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_puestoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_puestoDto = $Siga_cat_puestoDao->updateSiga_cat_puesto($Siga_cat_puestoDto,$proveedor);
return $Siga_cat_puestoDto;
//}
//return "";
}
public function deleteSiga_cat_puesto($Siga_cat_puestoDto,$proveedor=null){
//$Siga_cat_puestoDto=$this->validarSiga_cat_puesto($Siga_cat_puestoDto);
$Siga_cat_puestoDao = new Siga_cat_puestoDAO();
$Siga_cat_puestoDto = $Siga_cat_puestoDao->deleteSiga_cat_puesto($Siga_cat_puestoDto,$proveedor);
return $Siga_cat_puestoDto;
}
}
?>