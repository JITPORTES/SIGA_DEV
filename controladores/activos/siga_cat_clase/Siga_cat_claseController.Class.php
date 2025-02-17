<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_clase/Siga_cat_claseDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_clase/Siga_cat_claseDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_claseController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_clase($Siga_cat_claseDto){
$Siga_cat_claseDto->setId_Clase(strtoupper(str_ireplace("'","",trim($Siga_cat_claseDto->getId_Clase()))));
$Siga_cat_claseDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_claseDto->getId_Area()))));
$Siga_cat_claseDto->setDesc_Clase(strtoupper(str_ireplace("'","",trim($Siga_cat_claseDto->getDesc_Clase()))));
$Siga_cat_claseDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_claseDto->getFech_Inser()))));
$Siga_cat_claseDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_claseDto->getUsr_Inser()))));
$Siga_cat_claseDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_claseDto->getFech_Mod()))));
$Siga_cat_claseDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_claseDto->getUsr_Mod()))));
$Siga_cat_claseDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_claseDto->getEstatus_Reg()))));
return $Siga_cat_claseDto;
}
public function selectSiga_cat_clase($Siga_cat_claseDto,$proveedor=null){
$Siga_cat_claseDto=$this->validarSiga_cat_clase($Siga_cat_claseDto);
$Siga_cat_claseDao = new Siga_cat_claseDAO();
$orden=" order by Desc_Clase asc";
$Siga_cat_claseDto = $Siga_cat_claseDao->selectSiga_cat_clase($Siga_cat_claseDto,$orden,$proveedor);
return $Siga_cat_claseDto;
}
public function insertSiga_cat_clase($Siga_cat_claseDto,$proveedor=null){
//$Siga_cat_claseDto=$this->validarSiga_cat_clase($Siga_cat_claseDto);
$Siga_cat_claseDto->setFech_Inser("getdate()");
$Siga_cat_claseDto->setFech_Mod("getdate()");
$Siga_cat_claseDao = new Siga_cat_claseDAO();
$Siga_cat_claseDto = $Siga_cat_claseDao->insertSiga_cat_clase($Siga_cat_claseDto,$proveedor);
return $Siga_cat_claseDto;
}
public function updateSiga_cat_clase($Siga_cat_claseDto,$proveedor=null){
//$Siga_cat_claseDto=$this->validarSiga_cat_clase($Siga_cat_claseDto);
$Siga_cat_claseDto->setFech_Mod("getdate()");
$Siga_cat_claseDao = new Siga_cat_claseDAO();
//$tmpDto = new Siga_cat_claseDTO();
//$tmpDto = $Siga_cat_claseDao->selectSiga_cat_clase($Siga_cat_claseDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_claseDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_claseDto = $Siga_cat_claseDao->updateSiga_cat_clase($Siga_cat_claseDto,$proveedor);
return $Siga_cat_claseDto;
//}
//return "";
}
public function deleteSiga_cat_clase($Siga_cat_claseDto,$proveedor=null){
//$Siga_cat_claseDto=$this->validarSiga_cat_clase($Siga_cat_claseDto);
$Siga_cat_claseDao = new Siga_cat_claseDAO();
$Siga_cat_claseDto = $Siga_cat_claseDao->deleteSiga_cat_clase($Siga_cat_claseDto,$proveedor);
return $Siga_cat_claseDto;
}
}
?>