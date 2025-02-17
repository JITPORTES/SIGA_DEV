<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ubic_prim/Siga_cat_ubic_primDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ubic_prim/Siga_cat_ubic_primDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ubic_primController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto){
$Siga_cat_ubic_primDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_primDto->getId_Ubic_Prim()))));
$Siga_cat_ubic_primDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_primDto->getId_Area()))));
$Siga_cat_ubic_primDto->setDesc_Ubic_Prim(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_primDto->getDesc_Ubic_Prim()))));
$Siga_cat_ubic_primDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_primDto->getFech_Inser()))));
$Siga_cat_ubic_primDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_primDto->getUsr_Inser()))));
$Siga_cat_ubic_primDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_primDto->getFech_Mod()))));
$Siga_cat_ubic_primDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_primDto->getUsr_Mod()))));
$Siga_cat_ubic_primDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_primDto->getEstatus_Reg()))));
return $Siga_cat_ubic_primDto;
}
public function selectSiga_cat_ubic_prim($Siga_cat_ubic_primDto,$proveedor=null){
$Siga_cat_ubic_primDto=$this->validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
$Siga_cat_ubic_primDao = new Siga_cat_ubic_primDAO();
$orden=" order by Desc_Ubic_Prim asc";
$Siga_cat_ubic_primDto = $Siga_cat_ubic_primDao->selectSiga_cat_ubic_prim($Siga_cat_ubic_primDto, $orden, $proveedor);
return $Siga_cat_ubic_primDto;
}
public function insertSiga_cat_ubic_prim($Siga_cat_ubic_primDto,$proveedor=null){
//$Siga_cat_ubic_primDto=$this->validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
$Siga_cat_ubic_primDto->setFech_Inser("getdate()");
$Siga_cat_ubic_primDto->setFech_Mod("getdate()");
$Siga_cat_ubic_primDao = new Siga_cat_ubic_primDAO();
$Siga_cat_ubic_primDto = $Siga_cat_ubic_primDao->insertSiga_cat_ubic_prim($Siga_cat_ubic_primDto,$proveedor);
return $Siga_cat_ubic_primDto;
}
public function updateSiga_cat_ubic_prim($Siga_cat_ubic_primDto,$proveedor=null){
//$Siga_cat_ubic_primDto=$this->validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
$Siga_cat_ubic_primDto->setFech_Mod("getdate()");
$Siga_cat_ubic_primDao = new Siga_cat_ubic_primDAO();
//$tmpDto = new Siga_cat_ubic_primDTO();
//$tmpDto = $Siga_cat_ubic_primDao->selectSiga_cat_ubic_prim($Siga_cat_ubic_primDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_ubic_primDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_ubic_primDto = $Siga_cat_ubic_primDao->updateSiga_cat_ubic_prim($Siga_cat_ubic_primDto,$proveedor);
return $Siga_cat_ubic_primDto;
//}
//return "";
}
public function deleteSiga_cat_ubic_prim($Siga_cat_ubic_primDto,$proveedor=null){
//$Siga_cat_ubic_primDto=$this->validarSiga_cat_ubic_prim($Siga_cat_ubic_primDto);
$Siga_cat_ubic_primDao = new Siga_cat_ubic_primDAO();
$Siga_cat_ubic_primDto = $Siga_cat_ubic_primDao->deleteSiga_cat_ubic_prim($Siga_cat_ubic_primDto,$proveedor);
return $Siga_cat_ubic_primDto;
}
}
?>