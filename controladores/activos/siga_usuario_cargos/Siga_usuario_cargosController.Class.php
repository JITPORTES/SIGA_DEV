<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuario_cargos/Siga_usuario_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_usuario_cargos/Siga_usuario_cargosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_usuario_cargosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_usuario_cargos($Siga_usuario_cargosDto){
$Siga_usuario_cargosDto->setId_Usuario_Cargos(strtoupper(str_ireplace("'","",trim($Siga_usuario_cargosDto->getId_Usuario_Cargos()))));
$Siga_usuario_cargosDto->setId_Usuario(strtoupper(str_ireplace("'","",trim($Siga_usuario_cargosDto->getId_Usuario()))));
$Siga_usuario_cargosDto->setId_Cargo(strtoupper(str_ireplace("'","",trim($Siga_usuario_cargosDto->getId_Cargo()))));
$Siga_usuario_cargosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_usuario_cargosDto->getFech_Inser()))));
$Siga_usuario_cargosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_usuario_cargosDto->getUsr_Inser()))));
$Siga_usuario_cargosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_usuario_cargosDto->getFech_Mod()))));
$Siga_usuario_cargosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_usuario_cargosDto->getUsr_Mod()))));
$Siga_usuario_cargosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_usuario_cargosDto->getEstatus_Reg()))));
return $Siga_usuario_cargosDto;
}
public function selectSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor=null){
$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosDao = new Siga_usuario_cargosDAO();
$Siga_usuario_cargosDto = $Siga_usuario_cargosDao->selectSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor);
return $Siga_usuario_cargosDto;
}
public function selectSiga_cargos($Siga_usuario_cargosDto,$proveedor=null){
$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosDao = new Siga_usuario_cargosDAO();
$Siga_usuario_cargosDto = $Siga_usuario_cargosDao->selectSiga_cargos($Siga_usuario_cargosDto,$proveedor);
return $Siga_usuario_cargosDto;
}
public function insertSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor=null){
//$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosDao = new Siga_usuario_cargosDAO();
$Siga_usuario_cargosDto = $Siga_usuario_cargosDao->insertSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor);
return $Siga_usuario_cargosDto;
}
public function updateSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor=null){
//$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosDao = new Siga_usuario_cargosDAO();
//$tmpDto = new Siga_usuario_cargosDTO();
//$tmpDto = $Siga_usuario_cargosDao->selectSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor);
//if($tmpDto!=""){//$Siga_usuario_cargosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_usuario_cargosDto = $Siga_usuario_cargosDao->updateSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor);
return $Siga_usuario_cargosDto;
//}
//return "";
}
public function deleteSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor=null){
//$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosDao = new Siga_usuario_cargosDAO();
$Siga_usuario_cargosDto = $Siga_usuario_cargosDao->deleteSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor);
return $Siga_usuario_cargosDto;
}
}
?>