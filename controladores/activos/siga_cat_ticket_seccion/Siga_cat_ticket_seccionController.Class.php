<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_seccion/Siga_cat_ticket_seccionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ticket_seccion/Siga_cat_ticket_seccionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_seccionController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto){
$Siga_cat_ticket_seccionDto->setId_Seccion(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_seccionDto->getId_Seccion()))));
$Siga_cat_ticket_seccionDto->setDesc_Seccion(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_seccionDto->getDesc_Seccion()))));
$Siga_cat_ticket_seccionDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_seccionDto->getId_Area()))));
return $Siga_cat_ticket_seccionDto;
}
public function selectSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto,$proveedor=null){
$Siga_cat_ticket_seccionDto=$this->validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
$Siga_cat_ticket_seccionDao = new Siga_cat_ticket_seccionDAO();
$orden=" order by Desc_Seccion asc";
$Siga_cat_ticket_seccionDto = $Siga_cat_ticket_seccionDao->selectSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto,$orden,$proveedor);
return $Siga_cat_ticket_seccionDto;
}
public function insertSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto,$proveedor=null){
//$Siga_cat_ticket_seccionDto=$this->validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
$Siga_cat_ticket_seccionDao = new Siga_cat_ticket_seccionDAO();
$Siga_cat_ticket_seccionDto = $Siga_cat_ticket_seccionDao->insertSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto,$proveedor);
return $Siga_cat_ticket_seccionDto;
}
public function updateSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto,$proveedor=null){
//$Siga_cat_ticket_seccionDto=$this->validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
$Siga_cat_ticket_seccionDao = new Siga_cat_ticket_seccionDAO();
//$tmpDto = new Siga_cat_ticket_seccionDTO();
//$tmpDto = $Siga_cat_ticket_seccionDao->selectSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_ticket_seccionDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_ticket_seccionDto = $Siga_cat_ticket_seccionDao->updateSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto,$proveedor);
return $Siga_cat_ticket_seccionDto;
//}
//return "";
}
public function deleteSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto,$proveedor=null){
//$Siga_cat_ticket_seccionDto=$this->validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
$Siga_cat_ticket_seccionDao = new Siga_cat_ticket_seccionDAO();
$Siga_cat_ticket_seccionDto = $Siga_cat_ticket_seccionDao->deleteSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto,$proveedor);
return $Siga_cat_ticket_seccionDto;
}
}
?>