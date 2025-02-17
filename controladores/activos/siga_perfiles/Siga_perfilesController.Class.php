<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_perfiles/Siga_perfilesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_perfiles/Siga_perfilesDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_perfilesController {
private $proveedor;
public function __construct() {
}
public function validarSiga_perfiles($Siga_perfilesDto){
$Siga_perfilesDto->setId_Perfil(strtoupper(str_ireplace("'","",trim($Siga_perfilesDto->getId_Perfil()))));
$Siga_perfilesDto->setNom_Perrfil(strtoupper(str_ireplace("'","",trim($Siga_perfilesDto->getNom_Perrfil()))));
$Siga_perfilesDto->setTipo(strtoupper(str_ireplace("'","",trim($Siga_perfilesDto->getTipo()))));
$Siga_perfilesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_perfilesDto->getFech_Inser()))));
$Siga_perfilesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_perfilesDto->getUsr_Inser()))));
$Siga_perfilesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_perfilesDto->getFech_Mod()))));
$Siga_perfilesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_perfilesDto->getUsr_Mod()))));
$Siga_perfilesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_perfilesDto->getEstatus_Reg()))));
return $Siga_perfilesDto;
}
public function selectSiga_perfiles($Siga_perfilesDto,$proveedor=null){
$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
$Siga_perfilesDao = new Siga_perfilesDAO();
$Siga_perfilesDto = $Siga_perfilesDao->selectSiga_perfiles($Siga_perfilesDto,$proveedor);
return $Siga_perfilesDto;
}
//Realizo la consulta (procedimiento almacenado) enviando el numero de perfil para traer los datos del menu
public function selectConsultar_Menu($Siga_perfilesDto,$proveedor=null){
$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
$Siga_perfilesDao = new Siga_perfilesDAO();
$Siga_perfilesDto = $Siga_perfilesDao->selectmenuopciones($Siga_perfilesDto,$proveedor);
return $Siga_perfilesDto;
}

public function insertSiga_perfiles($Siga_perfilesDto,$proveedor=null){
//$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
$Siga_perfilesDao = new Siga_perfilesDAO();
$Siga_perfilesDto = $Siga_perfilesDao->insertSiga_perfiles($Siga_perfilesDto,$proveedor);
return $Siga_perfilesDto;
}
public function updateSiga_perfiles($Siga_perfilesDto,$proveedor=null){
//$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
$Siga_perfilesDao = new Siga_perfilesDAO();
//$tmpDto = new Siga_perfilesDTO();
//$tmpDto = $Siga_perfilesDao->selectSiga_perfiles($Siga_perfilesDto,$proveedor);
//if($tmpDto!=""){//$Siga_perfilesDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_perfilesDto = $Siga_perfilesDao->updateSiga_perfiles($Siga_perfilesDto,$proveedor);
return $Siga_perfilesDto;
//}
//return "";
}
public function deleteSiga_perfiles($Siga_perfilesDto,$proveedor=null){
//$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
$Siga_perfilesDao = new Siga_perfilesDAO();
$Siga_perfilesDto = $Siga_perfilesDao->deleteSiga_perfiles($Siga_perfilesDto,$proveedor);
return $Siga_perfilesDto;
}
}
?>