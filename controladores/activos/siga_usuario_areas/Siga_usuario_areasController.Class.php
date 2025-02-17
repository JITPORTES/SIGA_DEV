<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuario_areas/Siga_usuario_areasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_usuario_areas/Siga_usuario_areasDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_usuario_areasController {
private $proveedor;
public function __construct() {
}
public function validarSiga_usuario_areas($Siga_usuario_areasDto){
$Siga_usuario_areasDto->setId_Usuario_Area(strtoupper(str_ireplace("'","",trim($Siga_usuario_areasDto->getId_Usuario_Area()))));
$Siga_usuario_areasDto->setId_Usuario(strtoupper(str_ireplace("'","",trim($Siga_usuario_areasDto->getId_Usuario()))));
$Siga_usuario_areasDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_usuario_areasDto->getId_Area()))));
$Siga_usuario_areasDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_usuario_areasDto->getFech_Inser()))));
$Siga_usuario_areasDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_usuario_areasDto->getUsr_Inser()))));
$Siga_usuario_areasDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_usuario_areasDto->getFech_Mod()))));
$Siga_usuario_areasDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_usuario_areasDto->getUsr_Mod()))));
$Siga_usuario_areasDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_usuario_areasDto->getEstatus_Reg()))));
return $Siga_usuario_areasDto;
}
public function selectSiga_usuario_areas($Siga_usuario_areasDto,$proveedor=null){
$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasDao = new Siga_usuario_areasDAO();
$Siga_usuario_areasDto = $Siga_usuario_areasDao->selectSiga_usuario_areas($Siga_usuario_areasDto,$proveedor);
return $Siga_usuario_areasDto;
}
public function selectSiga_catareas($Siga_usuario_areasDto,$proveedor=null){
$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasDao = new Siga_usuario_areasDAO();
$Siga_usuario_areasDto = $Siga_usuario_areasDao->selectSiga_catareas($Siga_usuario_areasDto,$proveedor);
return $Siga_usuario_areasDto;
}
public function insertSiga_usuario_areas($Siga_usuario_areasDto,$proveedor=null){
//$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasDao = new Siga_usuario_areasDAO();
$Siga_usuario_areasDto = $Siga_usuario_areasDao->insertSiga_usuario_areas($Siga_usuario_areasDto,$proveedor);
return $Siga_usuario_areasDto;
}
public function updateSiga_usuario_areas($Siga_usuario_areasDto,$proveedor=null){
//$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasDao = new Siga_usuario_areasDAO();
//$tmpDto = new Siga_usuario_areasDTO();
//$tmpDto = $Siga_usuario_areasDao->selectSiga_usuario_areas($Siga_usuario_areasDto,$proveedor);
//if($tmpDto!=""){//$Siga_usuario_areasDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_usuario_areasDto = $Siga_usuario_areasDao->updateSiga_usuario_areas($Siga_usuario_areasDto,$proveedor);
return $Siga_usuario_areasDto;
//}
//return "";
}
public function deleteSiga_usuario_areas($Siga_usuario_areasDto,$proveedor=null){
//$Siga_usuario_areasDto=$this->validarSiga_usuario_areas($Siga_usuario_areasDto);
$Siga_usuario_areasDao = new Siga_usuario_areasDAO();
$Siga_usuario_areasDto = $Siga_usuario_areasDao->deleteSiga_usuario_areas($Siga_usuario_areasDto,$proveedor);
return $Siga_usuario_areasDto;
}
}
?>