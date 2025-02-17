<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_area_de_poliza/Siga_cat_area_de_polizaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_area_de_poliza/Siga_cat_area_de_polizaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_area_de_polizaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto){
$Siga_cat_area_de_polizaDto->setId_Area_de_poliza(strtoupper(str_ireplace("'","",trim($Siga_cat_area_de_polizaDto->getId_Area_de_poliza()))));
$Siga_cat_area_de_polizaDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_area_de_polizaDto->getId_Area()))));
$Siga_cat_area_de_polizaDto->setDesc_Area_de_poliza(strtoupper(str_ireplace("'","",trim($Siga_cat_area_de_polizaDto->getDesc_Area_de_poliza()))));
$Siga_cat_area_de_polizaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_area_de_polizaDto->getFech_Inser()))));
$Siga_cat_area_de_polizaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_area_de_polizaDto->getUsr_Inser()))));
$Siga_cat_area_de_polizaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_area_de_polizaDto->getFech_Mod()))));
$Siga_cat_area_de_polizaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_area_de_polizaDto->getUsr_Mod()))));
$Siga_cat_area_de_polizaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_area_de_polizaDto->getEstatus_Reg()))));
return $Siga_cat_area_de_polizaDto;
}
public function selectSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto,$proveedor=null){
$Siga_cat_area_de_polizaDto=$this->validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
$Siga_cat_area_de_polizaDao = new Siga_cat_area_de_polizaDAO();
$orden=" order by Desc_Area_de_poliza asc";
$Siga_cat_area_de_polizaDto = $Siga_cat_area_de_polizaDao->selectSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto,$orden,$proveedor);
return $Siga_cat_area_de_polizaDto;
}
public function insertSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto,$proveedor=null){
//$Siga_cat_area_de_polizaDto=$this->validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
$Siga_cat_area_de_polizaDto->setFech_Inser("getdate()");
$Siga_cat_area_de_polizaDto->setFech_Mod("getdate()");
$Siga_cat_area_de_polizaDao = new Siga_cat_area_de_polizaDAO();
$Siga_cat_area_de_polizaDto = $Siga_cat_area_de_polizaDao->insertSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto,$proveedor);
return $Siga_cat_area_de_polizaDto;
}
public function updateSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto,$proveedor=null){
//$Siga_cat_area_de_polizaDto=$this->validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
$Siga_cat_area_de_polizaDto->setFech_Mod("getdate()");
$Siga_cat_area_de_polizaDao = new Siga_cat_area_de_polizaDAO();
//$tmpDto = new Siga_cat_area_de_polizaDTO();
//$tmpDto = $Siga_cat_area_de_polizaDao->selectSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_area_de_polizaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_area_de_polizaDto = $Siga_cat_area_de_polizaDao->updateSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto,$proveedor);
return $Siga_cat_area_de_polizaDto;
//}
//return "";
}
public function deleteSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto,$proveedor=null){
//$Siga_cat_area_de_polizaDto=$this->validarSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto);
$Siga_cat_area_de_polizaDao = new Siga_cat_area_de_polizaDAO();
$Siga_cat_area_de_polizaDto = $Siga_cat_area_de_polizaDao->deleteSiga_cat_area_de_poliza($Siga_cat_area_de_polizaDto,$proveedor);
return $Siga_cat_area_de_polizaDto;
}
}
?>