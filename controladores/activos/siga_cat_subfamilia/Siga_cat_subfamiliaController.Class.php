<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_subfamilia/Siga_cat_subfamiliaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_subfamilia/Siga_cat_subfamiliaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_subfamiliaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto){
$Siga_cat_subfamiliaDto->setId_Subfamilia(strtoupper(str_ireplace("'","",trim($Siga_cat_subfamiliaDto->getId_Subfamilia()))));
$Siga_cat_subfamiliaDto->setId_Familia(strtoupper(str_ireplace("'","",trim($Siga_cat_subfamiliaDto->getId_Familia()))));
$Siga_cat_subfamiliaDto->setDesc_Subfamilia(strtoupper(str_ireplace("'","",trim($Siga_cat_subfamiliaDto->getDesc_Subfamilia()))));
$Siga_cat_subfamiliaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_subfamiliaDto->getFech_Inser()))));
$Siga_cat_subfamiliaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_subfamiliaDto->getUsr_Inser()))));
$Siga_cat_subfamiliaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_subfamiliaDto->getFech_Mod()))));
$Siga_cat_subfamiliaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_subfamiliaDto->getUsr_Mod()))));
$Siga_cat_subfamiliaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_subfamiliaDto->getEstatus_Reg()))));
return $Siga_cat_subfamiliaDto;
}
public function selectSiga_cat_subfamilia($Siga_cat_subfamiliaDto,$proveedor=null){
$Siga_cat_subfamiliaDto=$this->validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
$Siga_cat_subfamiliaDao = new Siga_cat_subfamiliaDAO();
$orden=" order by Desc_Subfamilia asc";
$Siga_cat_subfamiliaDto = $Siga_cat_subfamiliaDao->selectSiga_cat_subfamilia($Siga_cat_subfamiliaDto,$orden,$proveedor);
return $Siga_cat_subfamiliaDto;
}
public function insertSiga_cat_subfamilia($Siga_cat_subfamiliaDto,$proveedor=null){
//$Siga_cat_subfamiliaDto=$this->validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
$Siga_cat_subfamiliaDto->setFech_Inser("getdate()");
$Siga_cat_subfamiliaDto->setFech_Mod("getdate()");
$Siga_cat_subfamiliaDao = new Siga_cat_subfamiliaDAO();
$Siga_cat_subfamiliaDto = $Siga_cat_subfamiliaDao->insertSiga_cat_subfamilia($Siga_cat_subfamiliaDto,$proveedor);
return $Siga_cat_subfamiliaDto;
}
public function updateSiga_cat_subfamilia($Siga_cat_subfamiliaDto,$proveedor=null){
//$Siga_cat_subfamiliaDto=$this->validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
$Siga_cat_subfamiliaDto->setFech_Mod("getdate()");
$Siga_cat_subfamiliaDao = new Siga_cat_subfamiliaDAO();
//$tmpDto = new Siga_cat_subfamiliaDTO();
//$tmpDto = $Siga_cat_subfamiliaDao->selectSiga_cat_subfamilia($Siga_cat_subfamiliaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_subfamiliaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_subfamiliaDto = $Siga_cat_subfamiliaDao->updateSiga_cat_subfamilia($Siga_cat_subfamiliaDto,$proveedor);
return $Siga_cat_subfamiliaDto;
//}
//return "";
}
public function deleteSiga_cat_subfamilia($Siga_cat_subfamiliaDto,$proveedor=null){
//$Siga_cat_subfamiliaDto=$this->validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
$Siga_cat_subfamiliaDao = new Siga_cat_subfamiliaDAO();
$Siga_cat_subfamiliaDto = $Siga_cat_subfamiliaDao->deleteSiga_cat_subfamilia($Siga_cat_subfamiliaDto,$proveedor);
return $Siga_cat_subfamiliaDto;
}
}
?>