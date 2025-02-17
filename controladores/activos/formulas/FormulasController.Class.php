<?php

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/formulas/FormulasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/formulas/FormulasDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class FormulasController {
private $proveedor;
public function __construct() {
}
public function validarFormulas($FormulasDto){
$FormulasDto->setid_formula(strtoupper(str_ireplace("'","",trim($FormulasDto->getid_formula()))));
$FormulasDto->setNombre(strtoupper(str_ireplace("'","",trim($FormulasDto->getNombre()))));
$FormulasDto->setFormula(strtoupper(str_ireplace("'","",trim($FormulasDto->getFormula()))));
$FormulasDto->setDescripcion(strtoupper(str_ireplace("'","",trim($FormulasDto->getDescripcion()))));
$FormulasDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($FormulasDto->getFech_Inser()))));
$FormulasDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($FormulasDto->getUsr_Inser()))));
$FormulasDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($FormulasDto->getFech_Mod()))));
$FormulasDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($FormulasDto->getUsr_Mod()))));
$FormulasDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($FormulasDto->getEstatus_Reg()))));
return $FormulasDto;
}
public function selectFormulas($FormulasDto,$proveedor=null){
$FormulasDto=$this->validarFormulas($FormulasDto);
$FormulasDao = new FormulasDAO();
$FormulasDto = $FormulasDao->selectFormulas($FormulasDto,$proveedor);
return $FormulasDto;
}
public function insertFormulas($FormulasDto,$proveedor=null){
//$FormulasDto=$this->validarFormulas($FormulasDto);
$FormulasDao = new FormulasDAO();
$FormulasDto->setFech_Inser("getdate()");

$FormulasDto = $FormulasDao->insertFormulas($FormulasDto,$proveedor);
return $FormulasDto;
}
public function updateFormulas($FormulasDto,$proveedor=null){
//$FormulasDto=$this->validarFormulas($FormulasDto);
$FormulasDao = new FormulasDAO();
//$tmpDto = new FormulasDTO();
//$tmpDto = $FormulasDao->selectFormulas($FormulasDto,$proveedor);
//if($tmpDto!=""){//$FormulasDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$FormulasDto->setFech_Mod("getdate()");
$FormulasDto = $FormulasDao->updateFormulas($FormulasDto,$proveedor);
return $FormulasDto;
//}
//return "";
}
public function deleteFormulas($FormulasDto,$proveedor=null){
//$FormulasDto=$this->validarFormulas($FormulasDto);
$FormulasDao = new FormulasDAO();
$FormulasDto = $FormulasDao->deleteFormulas($FormulasDto,$proveedor);
return $FormulasDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search) {
$FormulasDao = new FormulasDAO();
return $FormulasDao->llenarDataTable($draw, $columns, $order, $start, $length, $search);
}
}
?>