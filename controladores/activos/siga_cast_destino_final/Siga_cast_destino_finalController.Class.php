<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cast_destino_final/Siga_cast_destino_finalDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cast_destino_final/Siga_cast_destino_finalDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cast_destino_finalController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cast_destino_final($Siga_cast_destino_finalDto){
$Siga_cast_destino_finalDto->setId_Destino_final(strtoupper(str_ireplace("'","",trim($Siga_cast_destino_finalDto->getId_Destino_final()))));
$Siga_cast_destino_finalDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cast_destino_finalDto->getId_Area()))));
$Siga_cast_destino_finalDto->setDesc_Destino_final(strtoupper(str_ireplace("'","",trim($Siga_cast_destino_finalDto->getDesc_Destino_final()))));
$Siga_cast_destino_finalDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cast_destino_finalDto->getFech_Inser()))));
$Siga_cast_destino_finalDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cast_destino_finalDto->getUsr_Inser()))));
$Siga_cast_destino_finalDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cast_destino_finalDto->getFech_Mod()))));
$Siga_cast_destino_finalDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cast_destino_finalDto->getUsr_Mod()))));
$Siga_cast_destino_finalDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cast_destino_finalDto->getEstatus_Reg()))));
return $Siga_cast_destino_finalDto;
}
public function selectSiga_cast_destino_final($Siga_cast_destino_finalDto,$proveedor=null){
$Siga_cast_destino_finalDto=$this->validarSiga_cast_destino_final($Siga_cast_destino_finalDto);
$Siga_cast_destino_finalDao = new Siga_cast_destino_finalDAO();
$orden=" order by Desc_Destino_final asc";
$Siga_cast_destino_finalDto = $Siga_cast_destino_finalDao->selectSiga_cast_destino_final($Siga_cast_destino_finalDto,$orden,$proveedor);
return $Siga_cast_destino_finalDto;
}
public function insertSiga_cast_destino_final($Siga_cast_destino_finalDto,$proveedor=null){
//$Siga_cast_destino_finalDto=$this->validarSiga_cast_destino_final($Siga_cast_destino_finalDto);
$Siga_cast_destino_finalDto->setFech_Inser("getdate()");
$Siga_cast_destino_finalDto->setFech_Mod("getdate()");
$Siga_cast_destino_finalDao = new Siga_cast_destino_finalDAO();
$Siga_cast_destino_finalDto = $Siga_cast_destino_finalDao->insertSiga_cast_destino_final($Siga_cast_destino_finalDto,$proveedor);
return $Siga_cast_destino_finalDto;
}
public function updateSiga_cast_destino_final($Siga_cast_destino_finalDto,$proveedor=null){
//$Siga_cast_destino_finalDto=$this->validarSiga_cast_destino_final($Siga_cast_destino_finalDto);
$Siga_cast_destino_finalDto->setFech_Mod("getdate()");
$Siga_cast_destino_finalDao = new Siga_cast_destino_finalDAO();
//$tmpDto = new Siga_cast_destino_finalDTO();
//$tmpDto = $Siga_cast_destino_finalDao->selectSiga_cast_destino_final($Siga_cast_destino_finalDto,$proveedor);
//if($tmpDto!=""){//$Siga_cast_destino_finalDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cast_destino_finalDto = $Siga_cast_destino_finalDao->updateSiga_cast_destino_final($Siga_cast_destino_finalDto,$proveedor);
return $Siga_cast_destino_finalDto;
//}
//return "";
}
public function deleteSiga_cast_destino_final($Siga_cast_destino_finalDto,$proveedor=null){
//$Siga_cast_destino_finalDto=$this->validarSiga_cast_destino_final($Siga_cast_destino_finalDto);
$Siga_cast_destino_finalDao = new Siga_cast_destino_finalDAO();
$Siga_cast_destino_finalDto = $Siga_cast_destino_finalDao->deleteSiga_cast_destino_final($Siga_cast_destino_finalDto,$proveedor);
return $Siga_cast_destino_finalDto;
}
}
?>