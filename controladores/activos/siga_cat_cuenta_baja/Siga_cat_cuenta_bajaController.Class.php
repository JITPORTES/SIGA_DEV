<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_cuenta_baja/Siga_cat_cuenta_bajaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_cuenta_baja/Siga_cat_cuenta_bajaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_cuenta_bajaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto){
$Siga_cat_cuenta_bajaDto->setId_Cuenta_baja(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_bajaDto->getId_Cuenta_baja()))));
$Siga_cat_cuenta_bajaDto->setDesc_Cuenta_baja(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_bajaDto->getDesc_Cuenta_baja()))));
$Siga_cat_cuenta_bajaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_bajaDto->getFech_Inser()))));
$Siga_cat_cuenta_bajaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_bajaDto->getUsr_Inser()))));
$Siga_cat_cuenta_bajaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_bajaDto->getFech_Mod()))));
$Siga_cat_cuenta_bajaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_bajaDto->getUsr_Mod()))));
$Siga_cat_cuenta_bajaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_cuenta_bajaDto->getEstatus_Reg()))));
return $Siga_cat_cuenta_bajaDto;
}
public function selectSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto,$proveedor=null){
$Siga_cat_cuenta_bajaDto=$this->validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
$Siga_cat_cuenta_bajaDao = new Siga_cat_cuenta_bajaDAO();
$Siga_cat_cuenta_bajaDto = $Siga_cat_cuenta_bajaDao->selectSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto,$proveedor);
return $Siga_cat_cuenta_bajaDto;
}
public function insertSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto,$proveedor=null){
$Siga_cat_cuenta_bajaDto=$this->validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
$Siga_cat_cuenta_bajaDao = new Siga_cat_cuenta_bajaDAO();
$Siga_cat_cuenta_bajaDto = $Siga_cat_cuenta_bajaDao->insertSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto,$proveedor);
return $Siga_cat_cuenta_bajaDto;
}
public function updateSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto,$proveedor=null){
$Siga_cat_cuenta_bajaDto=$this->validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
$Siga_cat_cuenta_bajaDao = new Siga_cat_cuenta_bajaDAO();
//$tmpDto = new Siga_cat_cuenta_bajaDTO();
//$tmpDto = $Siga_cat_cuenta_bajaDao->selectSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_cuenta_bajaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_cuenta_bajaDto = $Siga_cat_cuenta_bajaDao->updateSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto,$proveedor);
return $Siga_cat_cuenta_bajaDto;
//}
//return "";
}
public function deleteSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto,$proveedor=null){
$Siga_cat_cuenta_bajaDto=$this->validarSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto);
$Siga_cat_cuenta_bajaDao = new Siga_cat_cuenta_bajaDAO();
$Siga_cat_cuenta_bajaDto = $Siga_cat_cuenta_bajaDao->deleteSiga_cat_cuenta_baja($Siga_cat_cuenta_bajaDto,$proveedor);
return $Siga_cat_cuenta_bajaDto;
}
}
?>