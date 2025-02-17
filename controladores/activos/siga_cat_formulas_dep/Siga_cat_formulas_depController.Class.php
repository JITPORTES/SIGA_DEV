<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_formulas_dep/Siga_cat_formulas_depDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_formulas_dep/Siga_cat_formulas_depDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_formulas_depController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto){
$Siga_cat_formulas_depDto->setId_Formulas_Dep(strtoupper(str_ireplace("'","",trim($Siga_cat_formulas_depDto->getId_Formulas_Dep()))));
$Siga_cat_formulas_depDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_formulas_depDto->getId_Area()))));
$Siga_cat_formulas_depDto->setDesc_Formulas_Dep(strtoupper(str_ireplace("'","",trim($Siga_cat_formulas_depDto->getDesc_Formulas_Dep()))));
$Siga_cat_formulas_depDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_formulas_depDto->getFech_Inser()))));
$Siga_cat_formulas_depDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_formulas_depDto->getUsr_Inser()))));
$Siga_cat_formulas_depDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_formulas_depDto->getFech_Mod()))));
$Siga_cat_formulas_depDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_formulas_depDto->getUsr_Mod()))));
$Siga_cat_formulas_depDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_formulas_depDto->getEstatus_Reg()))));
return $Siga_cat_formulas_depDto;
}
public function selectSiga_cat_formulas_dep($Siga_cat_formulas_depDto,$proveedor=null){
$Siga_cat_formulas_depDto=$this->validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
$Siga_cat_formulas_depDao = new Siga_cat_formulas_depDAO();
$orden=" order by Desc_Formulas_Dep asc";
$Siga_cat_formulas_depDto = $Siga_cat_formulas_depDao->selectSiga_cat_formulas_dep($Siga_cat_formulas_depDto,$orden,$proveedor);
return $Siga_cat_formulas_depDto;
}
public function insertSiga_cat_formulas_dep($Siga_cat_formulas_depDto,$proveedor=null){
//$Siga_cat_formulas_depDto=$this->validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
$Siga_cat_formulas_depDto->setFech_Inser("getdate()");
$Siga_cat_formulas_depDto->setFech_Mod("getdate()");
$Siga_cat_formulas_depDao = new Siga_cat_formulas_depDAO();
$Siga_cat_formulas_depDto = $Siga_cat_formulas_depDao->insertSiga_cat_formulas_dep($Siga_cat_formulas_depDto,$proveedor);
return $Siga_cat_formulas_depDto;
}
public function updateSiga_cat_formulas_dep($Siga_cat_formulas_depDto,$proveedor=null){
//$Siga_cat_formulas_depDto=$this->validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
$Siga_cat_formulas_depDto->setFech_Mod("getdate()");
$Siga_cat_formulas_depDao = new Siga_cat_formulas_depDAO();
//$tmpDto = new Siga_cat_formulas_depDTO();
//$tmpDto = $Siga_cat_formulas_depDao->selectSiga_cat_formulas_dep($Siga_cat_formulas_depDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_formulas_depDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_formulas_depDto = $Siga_cat_formulas_depDao->updateSiga_cat_formulas_dep($Siga_cat_formulas_depDto,$proveedor);
return $Siga_cat_formulas_depDto;
//}
//return "";
}
public function deleteSiga_cat_formulas_dep($Siga_cat_formulas_depDto,$proveedor=null){
//$Siga_cat_formulas_depDto=$this->validarSiga_cat_formulas_dep($Siga_cat_formulas_depDto);
$Siga_cat_formulas_depDao = new Siga_cat_formulas_depDAO();
$Siga_cat_formulas_depDto = $Siga_cat_formulas_depDao->deleteSiga_cat_formulas_dep($Siga_cat_formulas_depDto,$proveedor);
return $Siga_cat_formulas_depDto;
}
}
?>