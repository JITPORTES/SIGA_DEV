<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_tipo_activo/Siga_cat_tipo_activoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_tipo_activo/Siga_cat_tipo_activoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_tipo_activoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto){
$Siga_cat_tipo_activoDto->setId_Tipo_Activo(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_activoDto->getId_Tipo_Activo()))));
$Siga_cat_tipo_activoDto->setDesc_Tipo_Activo(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_activoDto->getDesc_Tipo_Activo()))));
$Siga_cat_tipo_activoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_activoDto->getFech_Inser()))));
$Siga_cat_tipo_activoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_activoDto->getUsr_Inser()))));
$Siga_cat_tipo_activoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_activoDto->getFech_Mod()))));
$Siga_cat_tipo_activoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_activoDto->getUsr_Mod()))));
$Siga_cat_tipo_activoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_activoDto->getEstatus_Reg()))));
return $Siga_cat_tipo_activoDto;
}
public function selectSiga_cat_tipo_activo($Siga_cat_tipo_activoDto,$proveedor=null){
$Siga_cat_tipo_activoDto=$this->validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
$Siga_cat_tipo_activoDao = new Siga_cat_tipo_activoDAO();
$Siga_cat_tipo_activoDto = $Siga_cat_tipo_activoDao->selectSiga_cat_tipo_activo($Siga_cat_tipo_activoDto,$proveedor);
return $Siga_cat_tipo_activoDto;
}
public function insertSiga_cat_tipo_activo($Siga_cat_tipo_activoDto,$proveedor=null){
//$Siga_cat_tipo_activoDto=$this->validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
$Siga_cat_tipo_activoDao = new Siga_cat_tipo_activoDAO();
$Siga_cat_tipo_activoDto = $Siga_cat_tipo_activoDao->insertSiga_cat_tipo_activo($Siga_cat_tipo_activoDto,$proveedor);
return $Siga_cat_tipo_activoDto;
}
public function updateSiga_cat_tipo_activo($Siga_cat_tipo_activoDto,$proveedor=null){
//$Siga_cat_tipo_activoDto=$this->validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
$Siga_cat_tipo_activoDao = new Siga_cat_tipo_activoDAO();
//$tmpDto = new Siga_cat_tipo_activoDTO();
//$tmpDto = $Siga_cat_tipo_activoDao->selectSiga_cat_tipo_activo($Siga_cat_tipo_activoDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_tipo_activoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_tipo_activoDto = $Siga_cat_tipo_activoDao->updateSiga_cat_tipo_activo($Siga_cat_tipo_activoDto,$proveedor);
return $Siga_cat_tipo_activoDto;
//}
//return "";
}
public function deleteSiga_cat_tipo_activo($Siga_cat_tipo_activoDto,$proveedor=null){
//$Siga_cat_tipo_activoDto=$this->validarSiga_cat_tipo_activo($Siga_cat_tipo_activoDto);
$Siga_cat_tipo_activoDao = new Siga_cat_tipo_activoDAO();
$Siga_cat_tipo_activoDto = $Siga_cat_tipo_activoDao->deleteSiga_cat_tipo_activo($Siga_cat_tipo_activoDto,$proveedor);
return $Siga_cat_tipo_activoDto;
}
}
?>