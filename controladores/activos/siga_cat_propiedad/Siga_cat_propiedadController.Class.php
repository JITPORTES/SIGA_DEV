<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_propiedad/Siga_cat_propiedadDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_propiedad/Siga_cat_propiedadDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_propiedadController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_propiedad($Siga_cat_propiedadDto){
$Siga_cat_propiedadDto->setId_Propiedad(strtoupper(str_ireplace("'","",trim($Siga_cat_propiedadDto->getId_Propiedad()))));
$Siga_cat_propiedadDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_propiedadDto->getId_Area()))));
$Siga_cat_propiedadDto->setDesc_Propiedad(strtoupper(str_ireplace("'","",trim($Siga_cat_propiedadDto->getDesc_Propiedad()))));
$Siga_cat_propiedadDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_propiedadDto->getFech_Inser()))));
$Siga_cat_propiedadDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_propiedadDto->getUsr_Inser()))));
$Siga_cat_propiedadDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_propiedadDto->getFech_Mod()))));
$Siga_cat_propiedadDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_propiedadDto->getUsr_Mod()))));
$Siga_cat_propiedadDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_propiedadDto->getEstatus_Reg()))));
return $Siga_cat_propiedadDto;
}
public function selectSiga_cat_propiedad($Siga_cat_propiedadDto,$proveedor=null){
$Siga_cat_propiedadDto=$this->validarSiga_cat_propiedad($Siga_cat_propiedadDto);
$Siga_cat_propiedadDao = new Siga_cat_propiedadDAO();
$orden=" order by Desc_Propiedad asc";
$Siga_cat_propiedadDto = $Siga_cat_propiedadDao->selectSiga_cat_propiedad($Siga_cat_propiedadDto, $orden,$proveedor);
return $Siga_cat_propiedadDto;
}
public function insertSiga_cat_propiedad($Siga_cat_propiedadDto,$proveedor=null){
//$Siga_cat_propiedadDto=$this->validarSiga_cat_propiedad($Siga_cat_propiedadDto);
$Siga_cat_propiedadDto->setFech_Inser("getdate()");
$Siga_cat_propiedadDto->setFech_Mod("getdate()");
$Siga_cat_propiedadDao = new Siga_cat_propiedadDAO();
$Siga_cat_propiedadDto = $Siga_cat_propiedadDao->insertSiga_cat_propiedad($Siga_cat_propiedadDto,$proveedor);
return $Siga_cat_propiedadDto;
}
public function updateSiga_cat_propiedad($Siga_cat_propiedadDto,$proveedor=null){
//$Siga_cat_propiedadDto=$this->validarSiga_cat_propiedad($Siga_cat_propiedadDto);
$Siga_cat_propiedadDto->setFech_Mod("getdate()");
$Siga_cat_propiedadDao = new Siga_cat_propiedadDAO();
//$tmpDto = new Siga_cat_propiedadDTO();
//$tmpDto = $Siga_cat_propiedadDao->selectSiga_cat_propiedad($Siga_cat_propiedadDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_propiedadDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_propiedadDto = $Siga_cat_propiedadDao->updateSiga_cat_propiedad($Siga_cat_propiedadDto,$proveedor);
return $Siga_cat_propiedadDto;
//}
//return "";
}
public function deleteSiga_cat_propiedad($Siga_cat_propiedadDto,$proveedor=null){
//$Siga_cat_propiedadDto=$this->validarSiga_cat_propiedad($Siga_cat_propiedadDto);
$Siga_cat_propiedadDao = new Siga_cat_propiedadDAO();
$Siga_cat_propiedadDto = $Siga_cat_propiedadDao->deleteSiga_cat_propiedad($Siga_cat_propiedadDto,$proveedor);
return $Siga_cat_propiedadDto;
}
}
?>