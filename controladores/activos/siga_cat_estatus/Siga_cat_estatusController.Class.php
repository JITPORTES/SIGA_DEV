<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_estatus/Siga_cat_estatusDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_estatus/Siga_cat_estatusDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_estatusController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_estatus($Siga_cat_estatusDto){
$Siga_cat_estatusDto->setId_Estatus(strtoupper(str_ireplace("'","",trim($Siga_cat_estatusDto->getId_Estatus()))));
$Siga_cat_estatusDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_estatusDto->getId_Area()))));
$Siga_cat_estatusDto->setDesc_Estatus(strtoupper(str_ireplace("'","",trim($Siga_cat_estatusDto->getDesc_Estatus()))));
$Siga_cat_estatusDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_estatusDto->getFech_Inser()))));
$Siga_cat_estatusDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_estatusDto->getUsr_Inser()))));
$Siga_cat_estatusDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_estatusDto->getFech_Mod()))));
$Siga_cat_estatusDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_estatusDto->getUsr_Mod()))));
$Siga_cat_estatusDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_estatusDto->getEstatus_Reg()))));
return $Siga_cat_estatusDto;
}
public function selectSiga_cat_estatus($Siga_cat_estatusDto,$proveedor=null){
$Siga_cat_estatusDto=$this->validarSiga_cat_estatus($Siga_cat_estatusDto);
$Siga_cat_estatusDao = new Siga_cat_estatusDAO();
$orden=" order by Desc_Estatus asc";
$Siga_cat_estatusDto = $Siga_cat_estatusDao->selectSiga_cat_estatus($Siga_cat_estatusDto,$orden,$proveedor);
return $Siga_cat_estatusDto;
}
public function insertSiga_cat_estatus($Siga_cat_estatusDto,$proveedor=null){
//$Siga_cat_estatusDto=$this->validarSiga_cat_estatus($Siga_cat_estatusDto);
$Siga_cat_estatusDto->setFech_Inser("getdate()");
$Siga_cat_estatusDto->setFech_Mod("getdate()");
$Siga_cat_estatusDao = new Siga_cat_estatusDAO();
$Siga_cat_estatusDto = $Siga_cat_estatusDao->insertSiga_cat_estatus($Siga_cat_estatusDto,$proveedor);
return $Siga_cat_estatusDto;
}
public function updateSiga_cat_estatus($Siga_cat_estatusDto,$proveedor=null){
//$Siga_cat_estatusDto=$this->validarSiga_cat_estatus($Siga_cat_estatusDto);
$Siga_cat_estatusDto->setFech_Mod("getdate()");
$Siga_cat_estatusDao = new Siga_cat_estatusDAO();
//$tmpDto = new Siga_cat_estatusDTO();
//$tmpDto = $Siga_cat_estatusDao->selectSiga_cat_estatus($Siga_cat_estatusDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_estatusDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_estatusDto = $Siga_cat_estatusDao->updateSiga_cat_estatus($Siga_cat_estatusDto,$proveedor);
return $Siga_cat_estatusDto;
//}
//return "";
}
public function deleteSiga_cat_estatus($Siga_cat_estatusDto,$proveedor=null){
//$Siga_cat_estatusDto=$this->validarSiga_cat_estatus($Siga_cat_estatusDto);
$Siga_cat_estatusDao = new Siga_cat_estatusDAO();
$Siga_cat_estatusDto = $Siga_cat_estatusDao->deleteSiga_cat_estatus($Siga_cat_estatusDto,$proveedor);
return $Siga_cat_estatusDto;
}
}
?>