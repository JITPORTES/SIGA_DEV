<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_prestamo_proceso/Siga_cat_prestamo_procesoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_prestamo_proceso/Siga_cat_prestamo_procesoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_prestamo_procesoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto){
$Siga_cat_prestamo_procesoDto->setId_Estatus_Proceso(strtoupper(str_ireplace("'","",trim($Siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()))));
$Siga_cat_prestamo_procesoDto->setDesc_Proceso(strtoupper(str_ireplace("'","",trim($Siga_cat_prestamo_procesoDto->getDesc_Proceso()))));
return $Siga_cat_prestamo_procesoDto;
}
public function selectSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto,$proveedor=null){
$Siga_cat_prestamo_procesoDto=$this->validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
$Siga_cat_prestamo_procesoDao = new Siga_cat_prestamo_procesoDAO();
$Siga_cat_prestamo_procesoDto = $Siga_cat_prestamo_procesoDao->selectSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto,$proveedor);
return $Siga_cat_prestamo_procesoDto;
}
public function insertSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto,$proveedor=null){
//$Siga_cat_prestamo_procesoDto=$this->validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
$Siga_cat_prestamo_procesoDao = new Siga_cat_prestamo_procesoDAO();
$Siga_cat_prestamo_procesoDto = $Siga_cat_prestamo_procesoDao->insertSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto,$proveedor);
return $Siga_cat_prestamo_procesoDto;
}
public function updateSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto,$proveedor=null){
//$Siga_cat_prestamo_procesoDto=$this->validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
$Siga_cat_prestamo_procesoDao = new Siga_cat_prestamo_procesoDAO();
//$tmpDto = new Siga_cat_prestamo_procesoDTO();
//$tmpDto = $Siga_cat_prestamo_procesoDao->selectSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_prestamo_procesoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_prestamo_procesoDto = $Siga_cat_prestamo_procesoDao->updateSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto,$proveedor);
return $Siga_cat_prestamo_procesoDto;
//}
//return "";
}
public function deleteSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto,$proveedor=null){
//$Siga_cat_prestamo_procesoDto=$this->validarSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto);
$Siga_cat_prestamo_procesoDao = new Siga_cat_prestamo_procesoDAO();
$Siga_cat_prestamo_procesoDto = $Siga_cat_prestamo_procesoDao->deleteSiga_cat_prestamo_proceso($Siga_cat_prestamo_procesoDto,$proveedor);
return $Siga_cat_prestamo_procesoDto;
}
}
?>