<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_real/Siga_cat_motivo_realDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_motivo_real/Siga_cat_motivo_realDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_motivo_realController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_real($Siga_cat_motivo_realDto){
$Siga_cat_motivo_realDto->setId_Motivo_Real(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_realDto->getId_Motivo_Real()))));
$Siga_cat_motivo_realDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_realDto->getId_Area()))));
$Siga_cat_motivo_realDto->setDesc_Motivo_Real(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_realDto->getDesc_Motivo_Real()))));
$Siga_cat_motivo_realDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_realDto->getFech_Inser()))));
$Siga_cat_motivo_realDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_realDto->getUsr_Inser()))));
$Siga_cat_motivo_realDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_realDto->getFech_Mod()))));
$Siga_cat_motivo_realDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_realDto->getUsr_Mod()))));
$Siga_cat_motivo_realDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_realDto->getEstatus_Reg()))));
return $Siga_cat_motivo_realDto;
}
public function selectSiga_cat_motivo_real($Siga_cat_motivo_realDto,$proveedor=null){
$Siga_cat_motivo_realDto=$this->validarSiga_cat_motivo_real($Siga_cat_motivo_realDto);
$Siga_cat_motivo_realDao = new Siga_cat_motivo_realDAO();
$orden=" order by Desc_Motivo_Real asc ";
$Siga_cat_motivo_realDto = $Siga_cat_motivo_realDao->selectSiga_cat_motivo_real($Siga_cat_motivo_realDto,$orden,$proveedor);
return $Siga_cat_motivo_realDto;
}
public function insertSiga_cat_motivo_real($Siga_cat_motivo_realDto,$proveedor=null){
//$Siga_cat_motivo_realDto=$this->validarSiga_cat_motivo_real($Siga_cat_motivo_realDto);
$Siga_cat_motivo_realDao = new Siga_cat_motivo_realDAO();
$Siga_cat_motivo_realDto->setFech_Inser("getdate()");
$Siga_cat_motivo_realDto->setFech_Mod("getdate()");
$Siga_cat_motivo_realDto = $Siga_cat_motivo_realDao->insertSiga_cat_motivo_real($Siga_cat_motivo_realDto,$proveedor);
return $Siga_cat_motivo_realDto;
}
public function updateSiga_cat_motivo_real($Siga_cat_motivo_realDto,$proveedor=null){
//$Siga_cat_motivo_realDto=$this->validarSiga_cat_motivo_real($Siga_cat_motivo_realDto);
$Siga_cat_motivo_realDao = new Siga_cat_motivo_realDAO();
//$tmpDto = new Siga_cat_motivo_realDTO();
//$tmpDto = $Siga_cat_motivo_realDao->selectSiga_cat_motivo_real($Siga_cat_motivo_realDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_motivo_realDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_motivo_realDto->setFech_Mod("getdate()");
$Siga_cat_motivo_realDto = $Siga_cat_motivo_realDao->updateSiga_cat_motivo_real($Siga_cat_motivo_realDto,$proveedor);
return $Siga_cat_motivo_realDto;
//}
//return "";
}
public function deleteSiga_cat_motivo_real($Siga_cat_motivo_realDto,$proveedor=null){
//$Siga_cat_motivo_realDto=$this->validarSiga_cat_motivo_real($Siga_cat_motivo_realDto);
$Siga_cat_motivo_realDao = new Siga_cat_motivo_realDAO();
$Siga_cat_motivo_realDto = $Siga_cat_motivo_realDao->deleteSiga_cat_motivo_real($Siga_cat_motivo_realDto,$proveedor);
return $Siga_cat_motivo_realDto;
}
}
?>