<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_familia/Siga_cat_familiaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_familia/Siga_cat_familiaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_familiaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_familia($Siga_cat_familiaDto){
$Siga_cat_familiaDto->setId_Familia(strtoupper(str_ireplace("'","",trim($Siga_cat_familiaDto->getId_Familia()))));
$Siga_cat_familiaDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_familiaDto->getId_Area()))));
$Siga_cat_familiaDto->setDesc_Familia(strtoupper(str_ireplace("'","",trim($Siga_cat_familiaDto->getDesc_Familia()))));
$Siga_cat_familiaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_familiaDto->getFech_Inser()))));
$Siga_cat_familiaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_familiaDto->getUsr_Inser()))));
$Siga_cat_familiaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_familiaDto->getFech_Mod()))));
$Siga_cat_familiaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_familiaDto->getUsr_Mod()))));
$Siga_cat_familiaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_familiaDto->getEstatus_Reg()))));
return $Siga_cat_familiaDto;
}
public function selectSiga_cat_familia($Siga_cat_familiaDto,$proveedor=null){
$Siga_cat_familiaDto=$this->validarSiga_cat_familia($Siga_cat_familiaDto);
$Siga_cat_familiaDao = new Siga_cat_familiaDAO();
$orden=" order by Desc_Familia asc";
$Siga_cat_familiaDto = $Siga_cat_familiaDao->selectSiga_cat_familia($Siga_cat_familiaDto,$orden,$proveedor);
return $Siga_cat_familiaDto;
}
public function insertSiga_cat_familia($Siga_cat_familiaDto,$proveedor=null){
//$Siga_cat_familiaDto=$this->validarSiga_cat_familia($Siga_cat_familiaDto);
$Siga_cat_familiaDto->setFech_Inser("getdate()");
$Siga_cat_familiaDto->setFech_Mod("getdate()");
$Siga_cat_familiaDao = new Siga_cat_familiaDAO();
$Siga_cat_familiaDto = $Siga_cat_familiaDao->insertSiga_cat_familia($Siga_cat_familiaDto,$proveedor);
return $Siga_cat_familiaDto;
}
public function updateSiga_cat_familia($Siga_cat_familiaDto,$proveedor=null){
//$Siga_cat_familiaDto=$this->validarSiga_cat_familia($Siga_cat_familiaDto);
$Siga_cat_familiaDto->setFech_Mod("getdate()");
$Siga_cat_familiaDao = new Siga_cat_familiaDAO();
//$tmpDto = new Siga_cat_familiaDTO();
//$tmpDto = $Siga_cat_familiaDao->selectSiga_cat_familia($Siga_cat_familiaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_familiaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_familiaDto = $Siga_cat_familiaDao->updateSiga_cat_familia($Siga_cat_familiaDto,$proveedor);
return $Siga_cat_familiaDto;
//}
//return "";
}
public function deleteSiga_cat_familia($Siga_cat_familiaDto,$proveedor=null){
//$Siga_cat_familiaDto=$this->validarSiga_cat_familia($Siga_cat_familiaDto);
$Siga_cat_familiaDao = new Siga_cat_familiaDAO();
$Siga_cat_familiaDto = $Siga_cat_familiaDao->deleteSiga_cat_familia($Siga_cat_familiaDto,$proveedor);
return $Siga_cat_familiaDto;
}
}
?>