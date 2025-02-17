<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_catareas/Siga_catareasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_catareas/Siga_catareasDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_catareasController {
private $proveedor;
public function __construct() {
}
public function validarSiga_catareas($Siga_catareasDto){
$Siga_catareasDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_catareasDto->getId_Area()))));
$Siga_catareasDto->setNom_Area(strtoupper(str_ireplace("'","",trim($Siga_catareasDto->getNom_Area()))));
$Siga_catareasDto->setIcono(strtoupper(str_ireplace("'","",trim($Siga_catareasDto->getIcono()))));
$Siga_catareasDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_catareasDto->getFech_Inser()))));
$Siga_catareasDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_catareasDto->getUsr_Inser()))));
$Siga_catareasDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_catareasDto->getFech_Mod()))));
$Siga_catareasDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_catareasDto->getUsr_Mod()))));
$Siga_catareasDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_catareasDto->getEstatus_Reg()))));
return $Siga_catareasDto;
}
public function selectSiga_catareas($Siga_catareasDto,$proveedor=null){
$Siga_catareasDto=$this->validarSiga_catareas($Siga_catareasDto);
$Siga_catareasDao = new Siga_catareasDAO();
$Siga_catareasDto = $Siga_catareasDao->selectSiga_catareas($Siga_catareasDto,$proveedor);
return $Siga_catareasDto;
}
public function insertSiga_catareas($Siga_catareasDto,$proveedor=null){
//$Siga_catareasDto=$this->validarSiga_catareas($Siga_catareasDto);
$Siga_catareasDao = new Siga_catareasDAO();
$Siga_catareasDto = $Siga_catareasDao->insertSiga_catareas($Siga_catareasDto,$proveedor);
return $Siga_catareasDto;
}
public function updateSiga_catareas($Siga_catareasDto,$proveedor=null){
//$Siga_catareasDto=$this->validarSiga_catareas($Siga_catareasDto);
$Siga_catareasDao = new Siga_catareasDAO();
//$tmpDto = new Siga_catareasDTO();
//$tmpDto = $Siga_catareasDao->selectSiga_catareas($Siga_catareasDto,$proveedor);
//if($tmpDto!=""){//$Siga_catareasDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_catareasDto = $Siga_catareasDao->updateSiga_catareas($Siga_catareasDto,$proveedor);
return $Siga_catareasDto;
//}
//return "";
}
public function deleteSiga_catareas($Siga_catareasDto,$proveedor=null){
//$Siga_catareasDto=$this->validarSiga_catareas($Siga_catareasDto);
$Siga_catareasDao = new Siga_catareasDAO();
$Siga_catareasDto = $Siga_catareasDao->deleteSiga_catareas($Siga_catareasDto,$proveedor);
return $Siga_catareasDto;
}
}
?>