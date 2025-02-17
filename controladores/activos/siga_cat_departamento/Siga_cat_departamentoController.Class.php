<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_departamento/Siga_cat_departamentoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_departamento/Siga_cat_departamentoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_departamentoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_departamento($Siga_cat_departamentoDto){
$Siga_cat_departamentoDto->setId_Departamento(strtoupper(str_ireplace("'","",trim($Siga_cat_departamentoDto->getId_Departamento()))));
$Siga_cat_departamentoDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_departamentoDto->getId_Area()))));
$Siga_cat_departamentoDto->setDes_Departamento(strtoupper(str_ireplace("'","",trim($Siga_cat_departamentoDto->getDes_Departamento()))));
$Siga_cat_departamentoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_departamentoDto->getFech_Inser()))));
$Siga_cat_departamentoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_departamentoDto->getUsr_Inser()))));
$Siga_cat_departamentoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_departamentoDto->getFech_Mod()))));
$Siga_cat_departamentoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_departamentoDto->getUsr_Mod()))));
$Siga_cat_departamentoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_departamentoDto->getEstatus_Reg()))));
return $Siga_cat_departamentoDto;
}
public function selectSiga_cat_departamento($Siga_cat_departamentoDto,$proveedor=null){
$Siga_cat_departamentoDto=$this->validarSiga_cat_departamento($Siga_cat_departamentoDto);
$Siga_cat_departamentoDao = new Siga_cat_departamentoDAO();
$orden=" order by Des_Departamento asc";
$Siga_cat_departamentoDto = $Siga_cat_departamentoDao->selectSiga_cat_departamento($Siga_cat_departamentoDto,$orden,$proveedor);
return $Siga_cat_departamentoDto;
}
public function insertSiga_cat_departamento($Siga_cat_departamentoDto,$proveedor=null){
//$Siga_cat_departamentoDto=$this->validarSiga_cat_departamento($Siga_cat_departamentoDto);
$Siga_cat_departamentoDto->setFech_Inser("getdate()");
$Siga_cat_departamentoDto->setFech_Mod("getdate()");
$Siga_cat_departamentoDao = new Siga_cat_departamentoDAO();
$Siga_cat_departamentoDto = $Siga_cat_departamentoDao->insertSiga_cat_departamento($Siga_cat_departamentoDto,$proveedor);
return $Siga_cat_departamentoDto;
}
public function updateSiga_cat_departamento($Siga_cat_departamentoDto,$proveedor=null){
//$Siga_cat_departamentoDto=$this->validarSiga_cat_departamento($Siga_cat_departamentoDto);
$Siga_cat_departamentoDto->setFech_Mod("getdate()");
$Siga_cat_departamentoDao = new Siga_cat_departamentoDAO();
//$tmpDto = new Siga_cat_departamentoDTO();
//$tmpDto = $Siga_cat_departamentoDao->selectSiga_cat_departamento($Siga_cat_departamentoDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_departamentoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_departamentoDto = $Siga_cat_departamentoDao->updateSiga_cat_departamento($Siga_cat_departamentoDto,$proveedor);
return $Siga_cat_departamentoDto;
//}
//return "";
}
public function deleteSiga_cat_departamento($Siga_cat_departamentoDto,$proveedor=null){
//$Siga_cat_departamentoDto=$this->validarSiga_cat_departamento($Siga_cat_departamentoDto);
$Siga_cat_departamentoDao = new Siga_cat_departamentoDAO();
$Siga_cat_departamentoDto = $Siga_cat_departamentoDao->deleteSiga_cat_departamento($Siga_cat_departamentoDto,$proveedor);
return $Siga_cat_departamentoDto;
}
}
?>