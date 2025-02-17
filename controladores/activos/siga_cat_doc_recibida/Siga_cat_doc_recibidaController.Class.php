<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_doc_recibida/Siga_cat_doc_recibidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_doc_recibida/Siga_cat_doc_recibidaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_doc_recibidaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto){
$Siga_cat_doc_recibidaDto->setId_Doc_Recibida(strtoupper(str_ireplace("'","",trim($Siga_cat_doc_recibidaDto->getId_Doc_Recibida()))));
$Siga_cat_doc_recibidaDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_doc_recibidaDto->getId_Area()))));
$Siga_cat_doc_recibidaDto->setDesc_Doc_Recibida(strtoupper(str_ireplace("'","",trim($Siga_cat_doc_recibidaDto->getDesc_Doc_Recibida()))));
$Siga_cat_doc_recibidaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_doc_recibidaDto->getFech_Inser()))));
$Siga_cat_doc_recibidaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_doc_recibidaDto->getUsr_Inser()))));
$Siga_cat_doc_recibidaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_doc_recibidaDto->getFech_Mod()))));
$Siga_cat_doc_recibidaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_doc_recibidaDto->getUsr_Mod()))));
$Siga_cat_doc_recibidaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_doc_recibidaDto->getEstatus_Reg()))));
return $Siga_cat_doc_recibidaDto;
}
public function selectSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto,$proveedor=null){
$Siga_cat_doc_recibidaDto=$this->validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
$Siga_cat_doc_recibidaDao = new Siga_cat_doc_recibidaDAO();
$orden=" order by Desc_Doc_Recibida asc";
$Siga_cat_doc_recibidaDto = $Siga_cat_doc_recibidaDao->selectSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto,$orden,$proveedor);
return $Siga_cat_doc_recibidaDto;
}
public function insertSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto,$proveedor=null){
//$Siga_cat_doc_recibidaDto=$this->validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
$Siga_cat_doc_recibidaDto->setFech_Inser("getdate()");
$Siga_cat_doc_recibidaDto->setFech_Mod("getdate()");
$Siga_cat_doc_recibidaDao = new Siga_cat_doc_recibidaDAO();
$Siga_cat_doc_recibidaDto = $Siga_cat_doc_recibidaDao->insertSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto,$proveedor);
return $Siga_cat_doc_recibidaDto;
}
public function updateSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto,$proveedor=null){
//$Siga_cat_doc_recibidaDto=$this->validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
$Siga_cat_doc_recibidaDto->setFech_Mod("getdate()");
$Siga_cat_doc_recibidaDao = new Siga_cat_doc_recibidaDAO();
//$tmpDto = new Siga_cat_doc_recibidaDTO();
//$tmpDto = $Siga_cat_doc_recibidaDao->selectSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_doc_recibidaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_doc_recibidaDto = $Siga_cat_doc_recibidaDao->updateSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto,$proveedor);
return $Siga_cat_doc_recibidaDto;
//}
//return "";
}
public function deleteSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto,$proveedor=null){
//$Siga_cat_doc_recibidaDto=$this->validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
$Siga_cat_doc_recibidaDao = new Siga_cat_doc_recibidaDAO();
$Siga_cat_doc_recibidaDto = $Siga_cat_doc_recibidaDao->deleteSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto,$proveedor);
return $Siga_cat_doc_recibidaDto;
}
}
?>