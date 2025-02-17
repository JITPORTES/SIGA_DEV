<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ubic_sec/Siga_cat_ubic_secDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ubic_sec/Siga_cat_ubic_secDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ubic_secController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto){
$Siga_cat_ubic_secDto->setId_Ubic_Sec(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_secDto->getId_Ubic_Sec()))));
$Siga_cat_ubic_secDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_secDto->getId_Ubic_Prim()))));
$Siga_cat_ubic_secDto->setDesc_Ubic_Sec(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_secDto->getDesc_Ubic_Sec()))));
$Siga_cat_ubic_secDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_secDto->getFech_Inser()))));
$Siga_cat_ubic_secDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_secDto->getUsr_Inser()))));
$Siga_cat_ubic_secDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_secDto->getFech_Mod()))));
$Siga_cat_ubic_secDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_secDto->getUsr_Mod()))));
$Siga_cat_ubic_secDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_ubic_secDto->getEstatus_Reg()))));
return $Siga_cat_ubic_secDto;
}
public function selectSiga_cat_ubic_sec($Siga_cat_ubic_secDto,$proveedor=null){
$Siga_cat_ubic_secDto=$this->validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
$Siga_cat_ubic_secDao = new Siga_cat_ubic_secDAO();
$orden=" order by Desc_Ubic_Sec asc";
$Siga_cat_ubic_secDto = $Siga_cat_ubic_secDao->selectSiga_cat_ubic_sec($Siga_cat_ubic_secDto,$orden,$proveedor);
return $Siga_cat_ubic_secDto;
}
public function insertSiga_cat_ubic_sec($Siga_cat_ubic_secDto,$proveedor=null){
//$Siga_cat_ubic_secDto=$this->validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
$Siga_cat_ubic_secDto->setFech_Inser("getdate()");
$Siga_cat_ubic_secDto->setFech_Mod("getdate()");
$Siga_cat_ubic_secDao = new Siga_cat_ubic_secDAO();
$Siga_cat_ubic_secDto = $Siga_cat_ubic_secDao->insertSiga_cat_ubic_sec($Siga_cat_ubic_secDto,$proveedor);
return $Siga_cat_ubic_secDto;
}
public function updateSiga_cat_ubic_sec($Siga_cat_ubic_secDto,$proveedor=null){
//$Siga_cat_ubic_secDto=$this->validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
$Siga_cat_ubic_secDto->setFech_Mod("getdate()");
$Siga_cat_ubic_secDao = new Siga_cat_ubic_secDAO();
//$tmpDto = new Siga_cat_ubic_secDTO();
//$tmpDto = $Siga_cat_ubic_secDao->selectSiga_cat_ubic_sec($Siga_cat_ubic_secDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_ubic_secDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_ubic_secDto = $Siga_cat_ubic_secDao->updateSiga_cat_ubic_sec($Siga_cat_ubic_secDto,$proveedor);
return $Siga_cat_ubic_secDto;
//}
//return "";
}
public function deleteSiga_cat_ubic_sec($Siga_cat_ubic_secDto,$proveedor=null){
//$Siga_cat_ubic_secDto=$this->validarSiga_cat_ubic_sec($Siga_cat_ubic_secDto);
$Siga_cat_ubic_secDao = new Siga_cat_ubic_secDAO();
$Siga_cat_ubic_secDto = $Siga_cat_ubic_secDao->deleteSiga_cat_ubic_sec($Siga_cat_ubic_secDto,$proveedor);
return $Siga_cat_ubic_secDto;
}
}
?>