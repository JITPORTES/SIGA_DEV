<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_aparente/Siga_cat_motivo_aparenteDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_motivo_aparente/Siga_cat_motivo_aparenteDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_motivo_aparenteController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto){
$Siga_cat_motivo_aparenteDto->setId_Motivo_Aparente(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_aparenteDto->getId_Motivo_Aparente()))));
$Siga_cat_motivo_aparenteDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_aparenteDto->getId_Area()))));
$Siga_cat_motivo_aparenteDto->setDesc_Motivo_Aparente(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_aparenteDto->getDesc_Motivo_Aparente()))));
$Siga_cat_motivo_aparenteDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_aparenteDto->getFech_Inser()))));
$Siga_cat_motivo_aparenteDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_aparenteDto->getUsr_Inser()))));
$Siga_cat_motivo_aparenteDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_aparenteDto->getFech_Mod()))));
$Siga_cat_motivo_aparenteDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_aparenteDto->getUsr_Mod()))));
$Siga_cat_motivo_aparenteDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_aparenteDto->getEstatus_Reg()))));
return $Siga_cat_motivo_aparenteDto;
}
public function selectSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto,$proveedor=null){
$Orden= " order by Desc_Motivo_Aparente asc ";	
	
$Siga_cat_motivo_aparenteDto=$this->validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
$Siga_cat_motivo_aparenteDao = new Siga_cat_motivo_aparenteDAO();

$Siga_cat_motivo_aparenteDto = $Siga_cat_motivo_aparenteDao->selectSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto,$Orden, $proveedor);
return $Siga_cat_motivo_aparenteDto;
}
public function insertSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto,$proveedor=null){
//$Siga_cat_motivo_aparenteDto=$this->validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
$Siga_cat_motivo_aparenteDao = new Siga_cat_motivo_aparenteDAO();
$Siga_cat_motivo_aparenteDto->setFech_Inser("getdate()");
$Siga_cat_motivo_aparenteDto->setFech_Mod("getdate()");
$Siga_cat_motivo_aparenteDto = $Siga_cat_motivo_aparenteDao->insertSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto,$proveedor);
return $Siga_cat_motivo_aparenteDto;
}
public function updateSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto,$proveedor=null){
//$Siga_cat_motivo_aparenteDto=$this->validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
$Siga_cat_motivo_aparenteDao = new Siga_cat_motivo_aparenteDAO();
//$tmpDto = new Siga_cat_motivo_aparenteDTO();
//$tmpDto = $Siga_cat_motivo_aparenteDao->selectSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_motivo_aparenteDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_motivo_aparenteDto->setFech_Mod("getdate()");
$Siga_cat_motivo_aparenteDto = $Siga_cat_motivo_aparenteDao->updateSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto,$proveedor);
return $Siga_cat_motivo_aparenteDto;
//}
//return "";
}
public function deleteSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto,$proveedor=null){
//$Siga_cat_motivo_aparenteDto=$this->validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
$Siga_cat_motivo_aparenteDao = new Siga_cat_motivo_aparenteDAO();
$Siga_cat_motivo_aparenteDto = $Siga_cat_motivo_aparenteDao->deleteSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto,$proveedor);
return $Siga_cat_motivo_aparenteDto;
}
}
?>