<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_frecuencia/Siga_cat_frecuenciaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_frecuencia/Siga_cat_frecuenciaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_frecuenciaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto){
$Siga_cat_frecuenciaDto->setId_Frecuencia(strtoupper(str_ireplace("'","",trim($Siga_cat_frecuenciaDto->getId_Frecuencia()))));
$Siga_cat_frecuenciaDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_frecuenciaDto->getId_Area()))));
$Siga_cat_frecuenciaDto->setDesc_Frecuencia(strtoupper(str_ireplace("'","",trim($Siga_cat_frecuenciaDto->getDesc_Frecuencia()))));
$Siga_cat_frecuenciaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_frecuenciaDto->getFech_Inser()))));
$Siga_cat_frecuenciaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_frecuenciaDto->getUsr_Inser()))));
$Siga_cat_frecuenciaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_frecuenciaDto->getFech_Mod()))));
$Siga_cat_frecuenciaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_frecuenciaDto->getUsr_Mod()))));
$Siga_cat_frecuenciaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_frecuenciaDto->getEstatus_Reg()))));
return $Siga_cat_frecuenciaDto;
}
public function selectSiga_cat_frecuencia($Siga_cat_frecuenciaDto,$proveedor=null){
$Siga_cat_frecuenciaDto=$this->validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
$Siga_cat_frecuenciaDao = new Siga_cat_frecuenciaDAO();
$Siga_cat_frecuenciaDto = $Siga_cat_frecuenciaDao->selectSiga_cat_frecuencia($Siga_cat_frecuenciaDto,$proveedor);
return $Siga_cat_frecuenciaDto;
}
public function insertSiga_cat_frecuencia($Siga_cat_frecuenciaDto,$proveedor=null){
//$Siga_cat_frecuenciaDto=$this->validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
$Siga_cat_frecuenciaDto->setFech_Inser("getdate()");
$Siga_cat_frecuenciaDto->setFech_Mod("getdate()");
$Siga_cat_frecuenciaDao = new Siga_cat_frecuenciaDAO();
$Siga_cat_frecuenciaDto = $Siga_cat_frecuenciaDao->insertSiga_cat_frecuencia($Siga_cat_frecuenciaDto,$proveedor);
return $Siga_cat_frecuenciaDto;
}
public function updateSiga_cat_frecuencia($Siga_cat_frecuenciaDto,$proveedor=null){
//$Siga_cat_frecuenciaDto=$this->validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
$Siga_cat_frecuenciaDto->setFech_Mod("getdate()");
$Siga_cat_frecuenciaDao = new Siga_cat_frecuenciaDAO();
//$tmpDto = new Siga_cat_frecuenciaDTO();
//$tmpDto = $Siga_cat_frecuenciaDao->selectSiga_cat_frecuencia($Siga_cat_frecuenciaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_frecuenciaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_frecuenciaDto = $Siga_cat_frecuenciaDao->updateSiga_cat_frecuencia($Siga_cat_frecuenciaDto,$proveedor);
return $Siga_cat_frecuenciaDto;
//}
//return "";
}
public function deleteSiga_cat_frecuencia($Siga_cat_frecuenciaDto,$proveedor=null){
//$Siga_cat_frecuenciaDto=$this->validarSiga_cat_frecuencia($Siga_cat_frecuenciaDto);
$Siga_cat_frecuenciaDao = new Siga_cat_frecuenciaDAO();
$Siga_cat_frecuenciaDto = $Siga_cat_frecuenciaDao->deleteSiga_cat_frecuencia($Siga_cat_frecuenciaDto,$proveedor);
return $Siga_cat_frecuenciaDto;
}
}
?>