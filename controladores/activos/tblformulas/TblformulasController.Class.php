<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/tblformulas/TblformulasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/tblformulas/TblformulasDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class TblformulasController {
private $proveedor;
public function __construct() {
}
public function validarTblformulas($TblformulasDto){
$TblformulasDto->setid_formula(strtoupper(str_ireplace("'","",trim($TblformulasDto->getid_formula()))));
$TblformulasDto->setNombre(strtoupper(str_ireplace("'","",trim($TblformulasDto->getNombre()))));
$TblformulasDto->setFormula(strtoupper(str_ireplace("'","",trim($TblformulasDto->getFormula()))));
$TblformulasDto->setDescripcion(strtoupper(str_ireplace("'","",trim($TblformulasDto->getDescripcion()))));
$TblformulasDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($TblformulasDto->getFech_Inser()))));
$TblformulasDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($TblformulasDto->getUsr_Inser()))));
$TblformulasDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($TblformulasDto->getFech_Mod()))));
$TblformulasDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($TblformulasDto->getUsr_Mod()))));
$TblformulasDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($TblformulasDto->getEstatus_Reg()))));
return $TblformulasDto;
}
public function selectTblformulas($TblformulasDto,$proveedor=null){
$TblformulasDto=$this->validarTblformulas($TblformulasDto);
$TblformulasDao = new TblformulasDAO();
$TblformulasDto = $TblformulasDao->selectTblformulas($TblformulasDto,$proveedor);
return $TblformulasDto;
}
public function insertTblformulas($TblformulasDto,$proveedor=null){
//$TblformulasDto=$this->validarTblformulas($TblformulasDto);
$TblformulasDao = new TblformulasDAO();
$TblformulasDto = $TblformulasDao->insertTblformulas($TblformulasDto,$proveedor);
return $TblformulasDto;
}
public function updateTblformulas($TblformulasDto,$proveedor=null){
//$TblformulasDto=$this->validarTblformulas($TblformulasDto);
$TblformulasDao = new TblformulasDAO();
//$tmpDto = new TblformulasDTO();
//$tmpDto = $TblformulasDao->selectTblformulas($TblformulasDto,$proveedor);
//if($tmpDto!=""){//$TblformulasDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$TblformulasDto = $TblformulasDao->updateTblformulas($TblformulasDto,$proveedor);
return $TblformulasDto;
//}
//return "";
}
public function deleteTblformulas($TblformulasDto,$proveedor=null){
//$TblformulasDto=$this->validarTblformulas($TblformulasDto);
$TblformulasDao = new TblformulasDAO();
$TblformulasDto = $TblformulasDao->deleteTblformulas($TblformulasDto,$proveedor);
return $TblformulasDto;
}
}
?>