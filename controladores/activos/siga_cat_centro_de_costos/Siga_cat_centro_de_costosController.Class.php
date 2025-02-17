<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_centro_de_costos/Siga_cat_centro_de_costosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_centro_de_costos/Siga_cat_centro_de_costosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_centro_de_costosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto){
$Siga_cat_centro_de_costosDto->setId_Centros_de_costos(strtoupper(str_ireplace("'","",trim($Siga_cat_centro_de_costosDto->getId_Centros_de_costos()))));
$Siga_cat_centro_de_costosDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_centro_de_costosDto->getId_Area()))));
$Siga_cat_centro_de_costosDto->setDesc_Centro_de_costos(strtoupper(str_ireplace("'","",trim($Siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()))));
$Siga_cat_centro_de_costosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_centro_de_costosDto->getFech_Inser()))));
$Siga_cat_centro_de_costosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_centro_de_costosDto->getUsr_Inser()))));
$Siga_cat_centro_de_costosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_centro_de_costosDto->getFech_Mod()))));
$Siga_cat_centro_de_costosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_centro_de_costosDto->getUsr_Mod()))));
$Siga_cat_centro_de_costosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_centro_de_costosDto->getEstatus_Reg()))));
return $Siga_cat_centro_de_costosDto;
}
public function selectSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto,$proveedor=null){
$Siga_cat_centro_de_costosDto=$this->validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
$Siga_cat_centro_de_costosDao = new Siga_cat_centro_de_costosDAO();
$orden=" order by Desc_Centro_de_costos asc";
$Siga_cat_centro_de_costosDto = $Siga_cat_centro_de_costosDao->selectSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto,$orden,$proveedor);
return $Siga_cat_centro_de_costosDto;
}
public function insertSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto,$proveedor=null){
//$Siga_cat_centro_de_costosDto=$this->validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
$Siga_cat_centro_de_costosDto->setFech_Inser("getdate()");
$Siga_cat_centro_de_costosDto->setFech_Mod("getdate()");
$Siga_cat_centro_de_costosDao = new Siga_cat_centro_de_costosDAO();
$Siga_cat_centro_de_costosDto = $Siga_cat_centro_de_costosDao->insertSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto,$proveedor);
return $Siga_cat_centro_de_costosDto;
}
public function updateSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto,$proveedor=null){
//$Siga_cat_centro_de_costosDto=$this->validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
$Siga_cat_centro_de_costosDto->setFech_Mod("getdate()");
$Siga_cat_centro_de_costosDao = new Siga_cat_centro_de_costosDAO();
//$tmpDto = new Siga_cat_centro_de_costosDTO();
//$tmpDto = $Siga_cat_centro_de_costosDao->selectSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_centro_de_costosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_centro_de_costosDto = $Siga_cat_centro_de_costosDao->updateSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto,$proveedor);
return $Siga_cat_centro_de_costosDto;
//}
//return "";
}
public function deleteSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto,$proveedor=null){
//$Siga_cat_centro_de_costosDto=$this->validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
$Siga_cat_centro_de_costosDao = new Siga_cat_centro_de_costosDAO();
$Siga_cat_centro_de_costosDto = $Siga_cat_centro_de_costosDao->deleteSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto,$proveedor);
return $Siga_cat_centro_de_costosDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search) {
$Siga_cat_centro_de_costosDao = new Siga_cat_centro_de_costosDAO();
return $Siga_cat_centro_de_costosDao->llenarDataTable($draw, $columns, $order, $start, $length, $search);
}
}
?>