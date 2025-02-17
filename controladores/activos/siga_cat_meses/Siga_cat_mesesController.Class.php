<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_meses/Siga_cat_mesesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_meses/Siga_cat_mesesDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_mesesController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_meses($Siga_cat_mesesDto){
$Siga_cat_mesesDto->setId_Meses(strtoupper(str_ireplace("'","",trim($Siga_cat_mesesDto->getId_Meses()))));
$Siga_cat_mesesDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_mesesDto->getId_Area()))));
$Siga_cat_mesesDto->setDesc_Meses(strtoupper(str_ireplace("'","",trim($Siga_cat_mesesDto->getDesc_Meses()))));
$Siga_cat_mesesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_mesesDto->getFech_Inser()))));
$Siga_cat_mesesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_mesesDto->getUsr_Inser()))));
$Siga_cat_mesesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_mesesDto->getFech_Mod()))));
$Siga_cat_mesesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_mesesDto->getUsr_Mod()))));
$Siga_cat_mesesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_mesesDto->getEstatus_Reg()))));
return $Siga_cat_mesesDto;
}
public function selectSiga_cat_meses($Siga_cat_mesesDto,$proveedor=null){
$Siga_cat_mesesDto=$this->validarSiga_cat_meses($Siga_cat_mesesDto);
$Siga_cat_mesesDao = new Siga_cat_mesesDAO();
$Siga_cat_mesesDto = $Siga_cat_mesesDao->selectSiga_cat_meses($Siga_cat_mesesDto,$proveedor);
return $Siga_cat_mesesDto;
}
public function insertSiga_cat_meses($Siga_cat_mesesDto,$proveedor=null){
//$Siga_cat_mesesDto=$this->validarSiga_cat_meses($Siga_cat_mesesDto);
$Siga_cat_mesesDto->setFech_Inser("getdate()");
$Siga_cat_mesesDto->setFech_Mod("getdate()");
$Siga_cat_mesesDao = new Siga_cat_mesesDAO();
$Siga_cat_mesesDto = $Siga_cat_mesesDao->insertSiga_cat_meses($Siga_cat_mesesDto,$proveedor);
return $Siga_cat_mesesDto;
}
public function updateSiga_cat_meses($Siga_cat_mesesDto,$proveedor=null){
//$Siga_cat_mesesDto=$this->validarSiga_cat_meses($Siga_cat_mesesDto);
$Siga_cat_mesesDto->setFech_Mod("getdate()");
$Siga_cat_mesesDao = new Siga_cat_mesesDAO();
//$tmpDto = new Siga_cat_mesesDTO();
//$tmpDto = $Siga_cat_mesesDao->selectSiga_cat_meses($Siga_cat_mesesDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_mesesDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_mesesDto = $Siga_cat_mesesDao->updateSiga_cat_meses($Siga_cat_mesesDto,$proveedor);
return $Siga_cat_mesesDto;
//}
//return "";
}
public function deleteSiga_cat_meses($Siga_cat_mesesDto,$proveedor=null){
//$Siga_cat_mesesDto=$this->validarSiga_cat_meses($Siga_cat_mesesDto);
$Siga_cat_mesesDao = new Siga_cat_mesesDAO();
$Siga_cat_mesesDto = $Siga_cat_mesesDao->deleteSiga_cat_meses($Siga_cat_mesesDto,$proveedor);
return $Siga_cat_mesesDto;
}
}
?>