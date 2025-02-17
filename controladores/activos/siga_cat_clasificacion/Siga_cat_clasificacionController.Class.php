<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_clasificacion/Siga_cat_clasificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_clasificacion/Siga_cat_clasificacionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_clasificacionController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_clasificacion($Siga_cat_clasificacionDto){
$Siga_cat_clasificacionDto->setId_Clasificacion(strtoupper(str_ireplace("'","",trim($Siga_cat_clasificacionDto->getId_Clasificacion()))));
$Siga_cat_clasificacionDto->setId_Clase(strtoupper(str_ireplace("'","",trim($Siga_cat_clasificacionDto->getId_Clase()))));
$Siga_cat_clasificacionDto->setDesc_Clasificacion(strtoupper(str_ireplace("'","",trim($Siga_cat_clasificacionDto->getDesc_Clasificacion()))));
$Siga_cat_clasificacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_clasificacionDto->getFech_Inser()))));
$Siga_cat_clasificacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_clasificacionDto->getUsr_Inser()))));
$Siga_cat_clasificacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_clasificacionDto->getFech_Mod()))));
$Siga_cat_clasificacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_clasificacionDto->getUsr_Mod()))));
$Siga_cat_clasificacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_clasificacionDto->getEstatus_Reg()))));
return $Siga_cat_clasificacionDto;
}
public function selectSiga_cat_clasificacion($Siga_cat_clasificacionDto,$proveedor=null){
$Siga_cat_clasificacionDto=$this->validarSiga_cat_clasificacion($Siga_cat_clasificacionDto);

$Siga_cat_clasificacionDao = new Siga_cat_clasificacionDAO();
$orden=" order by Desc_Clasificacion asc";
$Siga_cat_clasificacionDto = $Siga_cat_clasificacionDao->selectSiga_cat_clasificacion($Siga_cat_clasificacionDto,$orden,$proveedor);
return $Siga_cat_clasificacionDto;
}
public function insertSiga_cat_clasificacion($Siga_cat_clasificacionDto,$proveedor=null){
//$Siga_cat_clasificacionDto=$this->validarSiga_cat_clasificacion($Siga_cat_clasificacionDto);
$Siga_cat_clasificacionDto->setFech_Inser("getdate()");
$Siga_cat_clasificacionDto->setFech_Mod("getdate()");
$Siga_cat_clasificacionDao = new Siga_cat_clasificacionDAO();
$Siga_cat_clasificacionDto = $Siga_cat_clasificacionDao->insertSiga_cat_clasificacion($Siga_cat_clasificacionDto,$proveedor);
return $Siga_cat_clasificacionDto;
}
public function updateSiga_cat_clasificacion($Siga_cat_clasificacionDto,$proveedor=null){
//$Siga_cat_clasificacionDto=$this->validarSiga_cat_clasificacion($Siga_cat_clasificacionDto);
$Siga_cat_clasificacionDto->setFech_Mod("getdate()");
$Siga_cat_clasificacionDao = new Siga_cat_clasificacionDAO();
//$tmpDto = new Siga_cat_clasificacionDTO();
//$tmpDto = $Siga_cat_clasificacionDao->selectSiga_cat_clasificacion($Siga_cat_clasificacionDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_clasificacionDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_clasificacionDto = $Siga_cat_clasificacionDao->updateSiga_cat_clasificacion($Siga_cat_clasificacionDto,$proveedor);
return $Siga_cat_clasificacionDto;
//}
//return "";
}
public function deleteSiga_cat_clasificacion($Siga_cat_clasificacionDto,$proveedor=null){
//$Siga_cat_clasificacionDto=$this->validarSiga_cat_clasificacion($Siga_cat_clasificacionDto);
$Siga_cat_clasificacionDao = new Siga_cat_clasificacionDAO();
$Siga_cat_clasificacionDto = $Siga_cat_clasificacionDao->deleteSiga_cat_clasificacion($Siga_cat_clasificacionDto,$proveedor);
return $Siga_cat_clasificacionDto;
}
}
?>