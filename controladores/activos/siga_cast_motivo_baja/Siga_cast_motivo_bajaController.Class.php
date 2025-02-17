<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cast_motivo_baja/Siga_cast_motivo_bajaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cast_motivo_baja/Siga_cast_motivo_bajaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cast_motivo_bajaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto){
$Siga_cast_motivo_bajaDto->setId_Motivo_baja(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_bajaDto->getId_Motivo_baja()))));
$Siga_cast_motivo_bajaDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_bajaDto->getId_Area()))));
$Siga_cast_motivo_bajaDto->setDesc_Motivo_baja(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_bajaDto->getDesc_Motivo_baja()))));
$Siga_cast_motivo_bajaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_bajaDto->getFech_Inser()))));
$Siga_cast_motivo_bajaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_bajaDto->getUsr_Inser()))));
$Siga_cast_motivo_bajaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_bajaDto->getFech_Mod()))));
$Siga_cast_motivo_bajaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_bajaDto->getUsr_Mod()))));
$Siga_cast_motivo_bajaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cast_motivo_bajaDto->getEstatus_Reg()))));
return $Siga_cast_motivo_bajaDto;
}
public function selectSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto,$proveedor=null){
$Siga_cast_motivo_bajaDto=$this->validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
$Siga_cast_motivo_bajaDao = new Siga_cast_motivo_bajaDAO();
$orden=" order by Desc_Motivo_baja asc";
$Siga_cast_motivo_bajaDto = $Siga_cast_motivo_bajaDao->selectSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto,$orden,$proveedor);
return $Siga_cast_motivo_bajaDto;
}
public function insertSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto,$proveedor=null){
//$Siga_cast_motivo_bajaDto=$this->validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
$Siga_cast_motivo_bajaDto->setFech_Inser("getdate()");
$Siga_cast_motivo_bajaDto->setFech_Mod("getdate()");
$Siga_cast_motivo_bajaDao = new Siga_cast_motivo_bajaDAO();
$Siga_cast_motivo_bajaDto = $Siga_cast_motivo_bajaDao->insertSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto,$proveedor);
return $Siga_cast_motivo_bajaDto;
}
public function updateSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto,$proveedor=null){
//$Siga_cast_motivo_bajaDto=$this->validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
$Siga_cast_motivo_bajaDto->setFech_Mod("getdate()");
$Siga_cast_motivo_bajaDao = new Siga_cast_motivo_bajaDAO();
//$tmpDto = new Siga_cast_motivo_bajaDTO();
//$tmpDto = $Siga_cast_motivo_bajaDao->selectSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cast_motivo_bajaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cast_motivo_bajaDto = $Siga_cast_motivo_bajaDao->updateSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto,$proveedor);
return $Siga_cast_motivo_bajaDto;
//}
//return "";
}
public function deleteSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto,$proveedor=null){
//$Siga_cast_motivo_bajaDto=$this->validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
$Siga_cast_motivo_bajaDao = new Siga_cast_motivo_bajaDAO();
$Siga_cast_motivo_bajaDto = $Siga_cast_motivo_bajaDao->deleteSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto,$proveedor);
return $Siga_cast_motivo_bajaDto;
}
}
?>