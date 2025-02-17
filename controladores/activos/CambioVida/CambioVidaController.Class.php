<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/CambioVida/CambioVidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/CambioVida/CambioVidaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class CambioVidaController {
private $proveedor;
public function __construct() {
}
public function validarCambioVida($CambioVidaDto){
$CambioVidaDto->setId_cambiovida(strtoupper(str_ireplace("'","",trim($CambioVidaDto->getId_cambiovida()))));
$CambioVidaDto->setfechacambio(strtoupper(str_ireplace("'","",trim($CambioVidaDto->getfechacambio()))));
$CambioVidaDto->setnuevosmeses(strtoupper(str_ireplace("'","",trim($CambioVidaDto->getnuevosmeses()))));
$CambioVidaDto->setsaldoMOI(strtoupper(str_ireplace("'","",trim($CambioVidaDto->getsaldoMOI()))));
$CambioVidaDto->setsaldoDepreciacion(strtoupper(str_ireplace("'","",trim($CambioVidaDto->getsaldoDepreciacion()))));
$CambioVidaDto->setId_Activo(strtoupper(str_ireplace("'","",trim($CambioVidaDto->getId_Activo()))));
$CambioVidaDto->setfechaalta(strtoupper(str_ireplace("'","",trim($CambioVidaDto->getfechaalta()))));
$CambioVidaDto->setTipoDepreciacion(strtoupper(str_ireplace("'","",trim($CambioVidaDto->getTipoDepreciacion()))));
return $CambioVidaDto;
}
public function selectCambioVida($CambioVidaDto,$proveedor=null){
$CambioVidaDto=$this->validarCambioVida($CambioVidaDto);
$CambioVidaDao = new CambioVidaDAO();
$CambioVidaDto = $CambioVidaDao->selectCambioVida($CambioVidaDto,$proveedor);
return $CambioVidaDto;
}
public function insertCambioVida($CambioVidaDto,$proveedor=null){
$CambioVidaDto=$this->validarCambioVida($CambioVidaDto);
$CambioVidaDao = new CambioVidaDAO();
$CambioVidaDto = $CambioVidaDao->insertCambioVida($CambioVidaDto,$proveedor);
return $CambioVidaDto;
}
public function updateCambioVida($CambioVidaDto,$proveedor=null){
$CambioVidaDto=$this->validarCambioVida($CambioVidaDto);
$CambioVidaDao = new CambioVidaDAO();
//$tmpDto = new CambioVidaDTO();
//$tmpDto = $CambioVidaDao->selectCambioVida($CambioVidaDto,$proveedor);
//if($tmpDto!=""){//$CambioVidaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$CambioVidaDto = $CambioVidaDao->updateCambioVida($CambioVidaDto,$proveedor);
return $CambioVidaDto;
//}
//return "";
}
public function deleteCambioVida($CambioVidaDto,$proveedor=null){
$CambioVidaDto=$this->validarCambioVida($CambioVidaDto);
$CambioVidaDao = new CambioVidaDAO();
$CambioVidaDto = $CambioVidaDao->deleteCambioVida($CambioVidaDto,$proveedor);
return $CambioVidaDto;
}
}
?>