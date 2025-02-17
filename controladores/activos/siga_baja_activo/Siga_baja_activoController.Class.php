<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_baja_activo/Siga_baja_activoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_baja_activo/Siga_baja_activoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_baja_activoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_baja_activo($Siga_baja_activoDto){
$Siga_baja_activoDto->setId_baja(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getId_baja()))));
$Siga_baja_activoDto->setId_Activo(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getId_Activo()))));
$Siga_baja_activoDto->setMotivo_Baja(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getMotivo_Baja()))));
$Siga_baja_activoDto->setComentarios(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getComentarios()))));
$Siga_baja_activoDto->setDestino(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getDestino()))));
$Siga_baja_activoDto->setFecha_Baja(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getFecha_Baja()))));
$Siga_baja_activoDto->setUsuario(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getUsuario()))));

$Siga_baja_activoDto->setSeg_Sol_Baja(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getSeg_Sol_Baja()))));
$Siga_baja_activoDto->setSeg_Resp_Area_Ges(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getSeg_Resp_Area_Ges()))));
$Siga_baja_activoDto->setSeg_Dir_Adminis(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getSeg_Dir_Adminis()))));
$Siga_baja_activoDto->setCuenta_baja(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getCuenta_baja()))));
$Siga_baja_activoDto->setJefe_Area(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getJefe_Area()))));
$Siga_baja_activoDto->setSeg_Usuario_Resp(strtoupper(str_ireplace("'","",trim($Siga_baja_activoDto->getSeg_Usuario_Resp()))));

return $Siga_baja_activoDto;
}
public function selectSiga_baja_activo($Siga_baja_activoDto,$proveedor=null){
$Siga_baja_activoDto=$this->validarSiga_baja_activo($Siga_baja_activoDto);
$Siga_baja_activoDao = new Siga_baja_activoDAO();
$Siga_baja_activoDto = $Siga_baja_activoDao->selectSiga_baja_activo($Siga_baja_activoDto,$proveedor);
return $Siga_baja_activoDto;
}
public function insertSiga_baja_activo($Siga_baja_activoDto,$proveedor=null){
//$Siga_baja_activoDto=$this->validarSiga_baja_activo($Siga_baja_activoDto);
$Siga_baja_activoDao = new Siga_baja_activoDAO();
$Siga_baja_activoDto = $Siga_baja_activoDao->insertSiga_baja_activo($Siga_baja_activoDto,$proveedor);
return $Siga_baja_activoDto;
}
public function updateSiga_baja_activo($Siga_baja_activoDto,$proveedor=null){
//$Siga_baja_activoDto=$this->validarSiga_baja_activo($Siga_baja_activoDto);
$Siga_baja_activoDao = new Siga_baja_activoDAO();
//$tmpDto = new Siga_baja_activoDTO();
//$tmpDto = $Siga_baja_activoDao->selectSiga_baja_activo($Siga_baja_activoDto,$proveedor);
//if($tmpDto!=""){//$Siga_baja_activoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_baja_activoDto = $Siga_baja_activoDao->updateSiga_baja_activo($Siga_baja_activoDto,$proveedor);
return $Siga_baja_activoDto;
//}
//return "";
}
public function deleteSiga_baja_activo($Siga_baja_activoDto,$proveedor=null){
//$Siga_baja_activoDto=$this->validarSiga_baja_activo($Siga_baja_activoDto);
$Siga_baja_activoDao = new Siga_baja_activoDAO();
$Siga_baja_activoDto = $Siga_baja_activoDao->deleteSiga_baja_activo($Siga_baja_activoDto,$proveedor);
return $Siga_baja_activoDto;
}
}
?>