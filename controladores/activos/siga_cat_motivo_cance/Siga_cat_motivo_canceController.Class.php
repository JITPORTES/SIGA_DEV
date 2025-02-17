<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_cance/Siga_cat_motivo_canceDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_motivo_cance/Siga_cat_motivo_canceDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_motivo_canceController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto){
$Siga_cat_motivo_canceDto->setId_Mot_Cancelacion(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_canceDto->getId_Mot_Cancelacion()))));
$Siga_cat_motivo_canceDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_canceDto->getId_Area()))));
$Siga_cat_motivo_canceDto->setDesc_Motivo_Cancel(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_canceDto->getDesc_Motivo_Cancel()))));
$Siga_cat_motivo_canceDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_canceDto->getFech_Inser()))));
$Siga_cat_motivo_canceDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_canceDto->getUsr_Inser()))));
$Siga_cat_motivo_canceDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_canceDto->getFech_Mod()))));
$Siga_cat_motivo_canceDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_canceDto->getUsr_Mod()))));
$Siga_cat_motivo_canceDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_canceDto->getEstatus_Reg()))));
return $Siga_cat_motivo_canceDto;
}
public function selectSiga_cat_motivo_cance($Siga_cat_motivo_canceDto,$proveedor=null){
$Siga_cat_motivo_canceDto=$this->validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
$Siga_cat_motivo_canceDao = new Siga_cat_motivo_canceDAO();
$Siga_cat_motivo_canceDto = $Siga_cat_motivo_canceDao->selectSiga_cat_motivo_cance($Siga_cat_motivo_canceDto,$proveedor);
return $Siga_cat_motivo_canceDto;
}
public function insertSiga_cat_motivo_cance($Siga_cat_motivo_canceDto,$proveedor=null){
//$Siga_cat_motivo_canceDto=$this->validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
$Siga_cat_motivo_canceDao = new Siga_cat_motivo_canceDAO();
$Siga_cat_motivo_canceDto = $Siga_cat_motivo_canceDao->insertSiga_cat_motivo_cance($Siga_cat_motivo_canceDto,$proveedor);
return $Siga_cat_motivo_canceDto;
}
public function updateSiga_cat_motivo_cance($Siga_cat_motivo_canceDto,$proveedor=null){
//$Siga_cat_motivo_canceDto=$this->validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
$Siga_cat_motivo_canceDao = new Siga_cat_motivo_canceDAO();
//$tmpDto = new Siga_cat_motivo_canceDTO();
//$tmpDto = $Siga_cat_motivo_canceDao->selectSiga_cat_motivo_cance($Siga_cat_motivo_canceDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_motivo_canceDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_motivo_canceDto = $Siga_cat_motivo_canceDao->updateSiga_cat_motivo_cance($Siga_cat_motivo_canceDto,$proveedor);
return $Siga_cat_motivo_canceDto;
//}
//return "";
}
public function deleteSiga_cat_motivo_cance($Siga_cat_motivo_canceDto,$proveedor=null){
$Siga_cat_motivo_canceDto=$this->validarSiga_cat_motivo_cance($Siga_cat_motivo_canceDto);
$Siga_cat_motivo_canceDao = new Siga_cat_motivo_canceDAO();
$Siga_cat_motivo_canceDto = $Siga_cat_motivo_canceDao->deleteSiga_cat_motivo_cance($Siga_cat_motivo_canceDto,$proveedor);
return $Siga_cat_motivo_canceDto;
}
}
?>