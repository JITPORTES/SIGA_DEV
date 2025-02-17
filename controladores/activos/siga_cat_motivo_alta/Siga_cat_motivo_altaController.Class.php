<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_alta/Siga_cat_motivo_altaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_motivo_alta/Siga_cat_motivo_altaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_motivo_altaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto){
$Siga_cat_motivo_altaDto->setId_Motivo_Alta(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_altaDto->getId_Motivo_Alta()))));
$Siga_cat_motivo_altaDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_altaDto->getId_Area()))));
$Siga_cat_motivo_altaDto->setDesc_Motivo_Alta(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_altaDto->getDesc_Motivo_Alta()))));
$Siga_cat_motivo_altaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_altaDto->getFech_Inser()))));
$Siga_cat_motivo_altaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_altaDto->getUsr_Inser()))));
$Siga_cat_motivo_altaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_altaDto->getFech_Mod()))));
$Siga_cat_motivo_altaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_altaDto->getUsr_Mod()))));
$Siga_cat_motivo_altaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_altaDto->getEstatus_Reg()))));
return $Siga_cat_motivo_altaDto;
}
public function selectSiga_cat_motivo_alta($Siga_cat_motivo_altaDto,$proveedor=null){
$Siga_cat_motivo_altaDto=$this->validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
$Siga_cat_motivo_altaDao = new Siga_cat_motivo_altaDAO();
$orden=" order by Desc_Motivo_Alta asc";
$Siga_cat_motivo_altaDto = $Siga_cat_motivo_altaDao->selectSiga_cat_motivo_alta($Siga_cat_motivo_altaDto,$orden,$proveedor);
return $Siga_cat_motivo_altaDto;
}
public function insertSiga_cat_motivo_alta($Siga_cat_motivo_altaDto,$proveedor=null){
//$Siga_cat_motivo_altaDto=$this->validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
$Siga_cat_motivo_altaDto->setFech_Inser("getdate()");
$Siga_cat_motivo_altaDto->setFech_Mod("getdate()");
$Siga_cat_motivo_altaDao = new Siga_cat_motivo_altaDAO();
$Siga_cat_motivo_altaDto = $Siga_cat_motivo_altaDao->insertSiga_cat_motivo_alta($Siga_cat_motivo_altaDto,$proveedor);
return $Siga_cat_motivo_altaDto;
}
public function updateSiga_cat_motivo_alta($Siga_cat_motivo_altaDto,$proveedor=null){
//$Siga_cat_motivo_altaDto=$this->validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
$Siga_cat_motivo_altaDto->setFech_Mod("getdate()");
$Siga_cat_motivo_altaDao = new Siga_cat_motivo_altaDAO();
//$tmpDto = new Siga_cat_motivo_altaDTO();
//$tmpDto = $Siga_cat_motivo_altaDao->selectSiga_cat_motivo_alta($Siga_cat_motivo_altaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_motivo_altaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_motivo_altaDto = $Siga_cat_motivo_altaDao->updateSiga_cat_motivo_alta($Siga_cat_motivo_altaDto,$proveedor);
return $Siga_cat_motivo_altaDto;
//}
//return "";
}
public function deleteSiga_cat_motivo_alta($Siga_cat_motivo_altaDto,$proveedor=null){
//$Siga_cat_motivo_altaDto=$this->validarSiga_cat_motivo_alta($Siga_cat_motivo_altaDto);
$Siga_cat_motivo_altaDao = new Siga_cat_motivo_altaDAO();
$Siga_cat_motivo_altaDto = $Siga_cat_motivo_altaDao->deleteSiga_cat_motivo_alta($Siga_cat_motivo_altaDto,$proveedor);
return $Siga_cat_motivo_altaDto;
}
}
?>