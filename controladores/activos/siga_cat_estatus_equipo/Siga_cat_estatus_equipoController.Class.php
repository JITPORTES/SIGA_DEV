<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_estatus_equipo/Siga_cat_estatus_equipoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_estatus_equipo/Siga_cat_estatus_equipoDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_estatus_equipoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto){
$Siga_cat_estatus_equipoDto->setId_Est_Equipo(strtoupper(str_ireplace("'","",trim($Siga_cat_estatus_equipoDto->getId_Est_Equipo()))));
$Siga_cat_estatus_equipoDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_estatus_equipoDto->getId_Area()))));
$Siga_cat_estatus_equipoDto->setDesc_Est_Equipo(strtoupper(str_ireplace("'","",trim($Siga_cat_estatus_equipoDto->getDesc_Est_Equipo()))));
$Siga_cat_estatus_equipoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_estatus_equipoDto->getFech_Inser()))));
$Siga_cat_estatus_equipoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_estatus_equipoDto->getUsr_Inser()))));
$Siga_cat_estatus_equipoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_estatus_equipoDto->getFech_Mod()))));
$Siga_cat_estatus_equipoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_estatus_equipoDto->getUsr_Mod()))));
$Siga_cat_estatus_equipoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_estatus_equipoDto->getEstatus_Reg()))));
return $Siga_cat_estatus_equipoDto;
}
public function selectSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto,$proveedor=null){
$Siga_cat_estatus_equipoDto=$this->validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
$Siga_cat_estatus_equipoDao = new Siga_cat_estatus_equipoDAO();
$Siga_cat_estatus_equipoDto = $Siga_cat_estatus_equipoDao->selectSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto,$proveedor);
return $Siga_cat_estatus_equipoDto;
}
public function insertSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto,$proveedor=null){
//$Siga_cat_estatus_equipoDto=$this->validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
$Siga_cat_estatus_equipoDao = new Siga_cat_estatus_equipoDAO();
$Siga_cat_estatus_equipoDto->setFech_Inser("getdate()");
$Siga_cat_estatus_equipoDto->setFech_Mod("getdate()");
$Siga_cat_estatus_equipoDto = $Siga_cat_estatus_equipoDao->insertSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto,$proveedor);
return $Siga_cat_estatus_equipoDto;
}
public function updateSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto,$proveedor=null){
//$Siga_cat_estatus_equipoDto=$this->validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
$Siga_cat_estatus_equipoDao = new Siga_cat_estatus_equipoDAO();
//$tmpDto = new Siga_cat_estatus_equipoDTO();
//$tmpDto = $Siga_cat_estatus_equipoDao->selectSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_estatus_equipoDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_estatus_equipoDto->setFech_Mod("getdate()");
$Siga_cat_estatus_equipoDto = $Siga_cat_estatus_equipoDao->updateSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto,$proveedor);
return $Siga_cat_estatus_equipoDto;
//}
//return "";
}
public function deleteSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto,$proveedor=null){
//$Siga_cat_estatus_equipoDto=$this->validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
$Siga_cat_estatus_equipoDao = new Siga_cat_estatus_equipoDAO();
$Siga_cat_estatus_equipoDto = $Siga_cat_estatus_equipoDao->deleteSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto,$proveedor);
return $Siga_cat_estatus_equipoDto;
}
}
?>