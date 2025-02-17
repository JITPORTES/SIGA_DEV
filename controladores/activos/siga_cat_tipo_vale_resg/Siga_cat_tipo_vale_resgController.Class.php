<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_tipo_vale_resg/Siga_cat_tipo_vale_resgDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_tipo_vale_resg/Siga_cat_tipo_vale_resgDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_tipo_vale_resgController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto){
$Siga_cat_tipo_vale_resgDto->setId_Tipo_Vale_Resg(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_vale_resgDto->getId_Tipo_Vale_Resg()))));
$Siga_cat_tipo_vale_resgDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_vale_resgDto->getId_Area()))));
$Siga_cat_tipo_vale_resgDto->setDesc_Tipo_Vale_Resg(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_vale_resgDto->getDesc_Tipo_Vale_Resg()))));
$Siga_cat_tipo_vale_resgDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_vale_resgDto->getFech_Inser()))));
$Siga_cat_tipo_vale_resgDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_vale_resgDto->getUsr_Inser()))));
$Siga_cat_tipo_vale_resgDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_vale_resgDto->getFech_Mod()))));
$Siga_cat_tipo_vale_resgDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_vale_resgDto->getUsr_Mod()))));
$Siga_cat_tipo_vale_resgDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_tipo_vale_resgDto->getEstatus_Reg()))));
return $Siga_cat_tipo_vale_resgDto;
}
public function selectSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto,$proveedor=null){
$Siga_cat_tipo_vale_resgDto=$this->validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
$Siga_cat_tipo_vale_resgDao = new Siga_cat_tipo_vale_resgDAO();
$orden=" order by Desc_Tipo_Vale_Resg asc";
$Siga_cat_tipo_vale_resgDto = $Siga_cat_tipo_vale_resgDao->selectSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto,$orden,$proveedor);
return $Siga_cat_tipo_vale_resgDto;
}
public function insertSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto,$proveedor=null){
//$Siga_cat_tipo_vale_resgDto=$this->validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
$Siga_cat_tipo_vale_resgDto->setFech_Inser("getdate()");
$Siga_cat_tipo_vale_resgDto->setFech_Mod("getdate()");
$Siga_cat_tipo_vale_resgDao = new Siga_cat_tipo_vale_resgDAO();
$Siga_cat_tipo_vale_resgDto = $Siga_cat_tipo_vale_resgDao->insertSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto,$proveedor);
return $Siga_cat_tipo_vale_resgDto;
}
public function updateSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto,$proveedor=null){
//$Siga_cat_tipo_vale_resgDto=$this->validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
$Siga_cat_tipo_vale_resgDto->setFech_Mod("getdate()");
$Siga_cat_tipo_vale_resgDao = new Siga_cat_tipo_vale_resgDAO();
//$tmpDto = new Siga_cat_tipo_vale_resgDTO();
//$tmpDto = $Siga_cat_tipo_vale_resgDao->selectSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_tipo_vale_resgDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_tipo_vale_resgDto = $Siga_cat_tipo_vale_resgDao->updateSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto,$proveedor);
return $Siga_cat_tipo_vale_resgDto;
//}
//return "";
}
public function deleteSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto,$proveedor=null){
//$Siga_cat_tipo_vale_resgDto=$this->validarSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto);
$Siga_cat_tipo_vale_resgDao = new Siga_cat_tipo_vale_resgDAO();
$Siga_cat_tipo_vale_resgDto = $Siga_cat_tipo_vale_resgDao->deleteSiga_cat_tipo_vale_resg($Siga_cat_tipo_vale_resgDto,$proveedor);
return $Siga_cat_tipo_vale_resgDto;
}
}
?>