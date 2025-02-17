<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_subseccion/Siga_cat_ticket_subseccionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ticket_subseccion/Siga_cat_ticket_subseccionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_subseccionController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto){
$Siga_cat_ticket_subseccionDto->setId_Subseccion(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_subseccionDto->getId_Subseccion()))));
$Siga_cat_ticket_subseccionDto->setDesc_Subseccion(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_subseccionDto->getDesc_Subseccion()))));
$Siga_cat_ticket_subseccionDto->setId_Seccion(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_subseccionDto->getId_Seccion()))));
return $Siga_cat_ticket_subseccionDto;
}
public function selectSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto,$proveedor=null){
$Siga_cat_ticket_subseccionDto=$this->validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
$Siga_cat_ticket_subseccionDao = new Siga_cat_ticket_subseccionDAO();
$orden=" order by Desc_Subseccion asc";
$Siga_cat_ticket_subseccionDto = $Siga_cat_ticket_subseccionDao->selectSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto,$orden,$proveedor);
return $Siga_cat_ticket_subseccionDto;
}
public function insertSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto,$proveedor=null){
//$Siga_cat_ticket_subseccionDto=$this->validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
$Siga_cat_ticket_subseccionDao = new Siga_cat_ticket_subseccionDAO();
$Siga_cat_ticket_subseccionDto = $Siga_cat_ticket_subseccionDao->insertSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto,$proveedor);
return $Siga_cat_ticket_subseccionDto;
}
public function updateSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto,$proveedor=null){
//$Siga_cat_ticket_subseccionDto=$this->validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
$Siga_cat_ticket_subseccionDao = new Siga_cat_ticket_subseccionDAO();
//$tmpDto = new Siga_cat_ticket_subseccionDTO();
//$tmpDto = $Siga_cat_ticket_subseccionDao->selectSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_ticket_subseccionDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_ticket_subseccionDto = $Siga_cat_ticket_subseccionDao->updateSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto,$proveedor);
return $Siga_cat_ticket_subseccionDto;
//}
//return "";
}
public function deleteSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto,$proveedor=null){
//$Siga_cat_ticket_subseccionDto=$this->validarSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto);
$Siga_cat_ticket_subseccionDao = new Siga_cat_ticket_subseccionDAO();
$Siga_cat_ticket_subseccionDto = $Siga_cat_ticket_subseccionDao->deleteSiga_cat_ticket_subseccion($Siga_cat_ticket_subseccionDto,$proveedor);
return $Siga_cat_ticket_subseccionDto;
}
}
?>