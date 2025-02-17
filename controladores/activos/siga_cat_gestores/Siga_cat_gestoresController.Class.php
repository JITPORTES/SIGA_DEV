<?php

 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_gestores/Siga_cat_gestoresDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_gestores/Siga_cat_gestoresDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_gestoresController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_gestores($Siga_cat_gestoresDto){
$Siga_cat_gestoresDto->setId_Gestor(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getId_Gestor()))));
$Siga_cat_gestoresDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getId_Area()))));
$Siga_cat_gestoresDto->setId_Seccion(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getId_Seccion()))));
$Siga_cat_gestoresDto->setTipo_Gestor(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getTipo_Gestor()))));
$Siga_cat_gestoresDto->setId_Usuario(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getId_Usuario()))));
$Siga_cat_gestoresDto->setNombre_Empleado(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getNombre_Empleado()))));
$Siga_cat_gestoresDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getFech_Inser()))));
$Siga_cat_gestoresDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getUsr_Inser()))));
$Siga_cat_gestoresDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getFech_Mod()))));
$Siga_cat_gestoresDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getUsr_Mod()))));
$Siga_cat_gestoresDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_gestoresDto->getEstatus_Reg()))));
return $Siga_cat_gestoresDto;
}
public function selectSiga_cat_gestores($Siga_cat_gestoresDto,$proveedor=null){
$Siga_cat_gestoresDto=$this->validarSiga_cat_gestores($Siga_cat_gestoresDto);
$Siga_cat_gestoresDao = new Siga_cat_gestoresDAO();
$Siga_cat_gestoresDto = $Siga_cat_gestoresDao->selectSiga_cat_gestores($Siga_cat_gestoresDto,$proveedor);
return $Siga_cat_gestoresDto;
}
public function insertSiga_cat_gestores($Siga_cat_gestoresDto,$proveedor=null){
//$Siga_cat_gestoresDto=$this->validarSiga_cat_gestores($Siga_cat_gestoresDto);
$Siga_cat_gestoresDao = new Siga_cat_gestoresDAO();
$Siga_cat_gestoresDto = $Siga_cat_gestoresDao->insertSiga_cat_gestores($Siga_cat_gestoresDto,$proveedor);
return $Siga_cat_gestoresDto;
}
public function updateSiga_cat_gestores($Siga_cat_gestoresDto,$proveedor=null){
//$Siga_cat_gestoresDto=$this->validarSiga_cat_gestores($Siga_cat_gestoresDto);
$Siga_cat_gestoresDao = new Siga_cat_gestoresDAO();
//$tmpDto = new Siga_cat_gestoresDTO();
//$tmpDto = $Siga_cat_gestoresDao->selectSiga_cat_gestores($Siga_cat_gestoresDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_gestoresDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_gestoresDto = $Siga_cat_gestoresDao->updateSiga_cat_gestores($Siga_cat_gestoresDto,$proveedor);
return $Siga_cat_gestoresDto;
//}
//return "";
}
public function deleteSiga_cat_gestores($Siga_cat_gestoresDto,$proveedor=null){
//$Siga_cat_gestoresDto=$this->validarSiga_cat_gestores($Siga_cat_gestoresDto);
$Siga_cat_gestoresDao = new Siga_cat_gestoresDAO();
$Siga_cat_gestoresDto = $Siga_cat_gestoresDao->deleteSiga_cat_gestores($Siga_cat_gestoresDto,$proveedor);
return $Siga_cat_gestoresDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search, $Id_Area) {
$Siga_cat_gestoresDao = new Siga_cat_gestoresDAO();
return $Siga_cat_gestoresDao->llenarDataTable($draw, $columns, $order, $start, $length, $search, $Id_Area);
}
}
?>