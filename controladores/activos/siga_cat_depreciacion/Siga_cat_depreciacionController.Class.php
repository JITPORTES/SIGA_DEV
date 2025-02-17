<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_depreciacion/Siga_cat_depreciacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_depreciacion/Siga_cat_depreciacionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_depreciacionController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_depreciacion($Siga_cat_depreciacionDto){
$Siga_cat_depreciacionDto->setId_Depreciacion(strtoupper(str_ireplace("'","",trim($Siga_cat_depreciacionDto->getId_Depreciacion()))));
$Siga_cat_depreciacionDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_depreciacionDto->getId_Area()))));
$Siga_cat_depreciacionDto->setDesc_Depreciacion(strtoupper(str_ireplace("'","",trim($Siga_cat_depreciacionDto->getDesc_Depreciacion()))));
$Siga_cat_depreciacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_depreciacionDto->getFech_Inser()))));
$Siga_cat_depreciacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_depreciacionDto->getUsr_Inser()))));
$Siga_cat_depreciacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_depreciacionDto->getFech_Mod()))));
$Siga_cat_depreciacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_depreciacionDto->getUsr_Mod()))));
$Siga_cat_depreciacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_depreciacionDto->getEstatus_Reg()))));
return $Siga_cat_depreciacionDto;
}
public function selectSiga_cat_depreciacion($Siga_cat_depreciacionDto,$proveedor=null){
$Siga_cat_depreciacionDto=$this->validarSiga_cat_depreciacion($Siga_cat_depreciacionDto);
$Siga_cat_depreciacionDao = new Siga_cat_depreciacionDAO();
$orden=" order by Desc_Depreciacion asc";
$Siga_cat_depreciacionDto = $Siga_cat_depreciacionDao->selectSiga_cat_depreciacion($Siga_cat_depreciacionDto,$orden,$proveedor);
return $Siga_cat_depreciacionDto;
}
public function insertSiga_cat_depreciacion($Siga_cat_depreciacionDto,$proveedor=null){
//$Siga_cat_depreciacionDto=$this->validarSiga_cat_depreciacion($Siga_cat_depreciacionDto);
$Siga_cat_depreciacionDto->setFech_Inser("getdate()");
$Siga_cat_depreciacionDto->setFech_Mod("getdate()");
$Siga_cat_depreciacionDao = new Siga_cat_depreciacionDAO();
$Siga_cat_depreciacionDto = $Siga_cat_depreciacionDao->insertSiga_cat_depreciacion($Siga_cat_depreciacionDto,$proveedor);
return $Siga_cat_depreciacionDto;
}
public function updateSiga_cat_depreciacion($Siga_cat_depreciacionDto,$proveedor=null){
//$Siga_cat_depreciacionDto=$this->validarSiga_cat_depreciacion($Siga_cat_depreciacionDto);
$Siga_cat_depreciacionDto->setFech_Mod("getdate()");
$Siga_cat_depreciacionDao = new Siga_cat_depreciacionDAO();
//$tmpDto = new Siga_cat_depreciacionDTO();
//$tmpDto = $Siga_cat_depreciacionDao->selectSiga_cat_depreciacion($Siga_cat_depreciacionDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_depreciacionDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_depreciacionDto = $Siga_cat_depreciacionDao->updateSiga_cat_depreciacion($Siga_cat_depreciacionDto,$proveedor);
return $Siga_cat_depreciacionDto;
//}
//return "";
}
public function deleteSiga_cat_depreciacion($Siga_cat_depreciacionDto,$proveedor=null){
//$Siga_cat_depreciacionDto=$this->validarSiga_cat_depreciacion($Siga_cat_depreciacionDto);
$Siga_cat_depreciacionDao = new Siga_cat_depreciacionDAO();
$Siga_cat_depreciacionDto = $Siga_cat_depreciacionDao->deleteSiga_cat_depreciacion($Siga_cat_depreciacionDto,$proveedor);
return $Siga_cat_depreciacionDto;
}
}
?>