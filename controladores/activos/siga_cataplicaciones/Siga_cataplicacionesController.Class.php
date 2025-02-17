<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cataplicaciones/Siga_cataplicacionesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cataplicaciones/Siga_cataplicacionesDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cataplicacionesController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cataplicaciones($Siga_cataplicacionesDto){
$Siga_cataplicacionesDto->setId_Aplicacion(strtoupper(str_ireplace("'","",trim($Siga_cataplicacionesDto->getId_Aplicacion()))));
$Siga_cataplicacionesDto->setNom_Aplicacion(strtoupper(str_ireplace("'","",trim($Siga_cataplicacionesDto->getNom_Aplicacion()))));
$Siga_cataplicacionesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cataplicacionesDto->getEstatus_Reg()))));
return $Siga_cataplicacionesDto;
}
public function selectSiga_cataplicaciones($Siga_cataplicacionesDto,$proveedor=null){
$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
$Siga_cataplicacionesDao = new Siga_cataplicacionesDAO();
$orden=" order by Nom_Aplicacion asc";
$Siga_cataplicacionesDto = $Siga_cataplicacionesDao->selectSiga_cataplicaciones($Siga_cataplicacionesDto,$orden,$proveedor);
return $Siga_cataplicacionesDto;
}
public function selectmenuaplicaciones($Siga_cataplicacionesDto,$proveedor=null){
$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
$Siga_cataplicacionesDao = new Siga_cataplicacionesDAO();
$Siga_cataplicacionesDto = $Siga_cataplicacionesDao->selectmenuaplicaciones($Siga_cataplicacionesDto,$proveedor);
return $Siga_cataplicacionesDto;
}
public function insertSiga_cataplicaciones($Siga_cataplicacionesDto,$proveedor=null){
//$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
$Siga_cataplicacionesDao = new Siga_cataplicacionesDAO();
$Siga_cataplicacionesDto = $Siga_cataplicacionesDao->insertSiga_cataplicaciones($Siga_cataplicacionesDto,$proveedor);
return $Siga_cataplicacionesDto;
}
public function updateSiga_cataplicaciones($Siga_cataplicacionesDto,$proveedor=null){
//$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
$Siga_cataplicacionesDao = new Siga_cataplicacionesDAO();
//$tmpDto = new Siga_cataplicacionesDTO();
//$tmpDto = $Siga_cataplicacionesDao->selectSiga_cataplicaciones($Siga_cataplicacionesDto,$proveedor);
//if($tmpDto!=""){//$Siga_cataplicacionesDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cataplicacionesDto = $Siga_cataplicacionesDao->updateSiga_cataplicaciones($Siga_cataplicacionesDto,$proveedor);
return $Siga_cataplicacionesDto;
//}
//return "";
}
public function deleteSiga_cataplicaciones($Siga_cataplicacionesDto,$proveedor=null){
//$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
$Siga_cataplicacionesDao = new Siga_cataplicacionesDAO();
$Siga_cataplicacionesDto = $Siga_cataplicacionesDao->deleteSiga_cataplicaciones($Siga_cataplicacionesDto,$proveedor);
return $Siga_cataplicacionesDto;
}
}
?>