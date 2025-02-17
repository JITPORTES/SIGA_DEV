<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_adjuntos/Siga_cat_ticket_adjuntosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ticket_adjuntos/Siga_cat_ticket_adjuntosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_adjuntosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto){
$Siga_cat_ticket_adjuntosDto->setId_Adjunto(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_adjuntosDto->getId_Adjunto()))));
$Siga_cat_ticket_adjuntosDto->setId_Chat(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_adjuntosDto->getId_Chat()))));
$Siga_cat_ticket_adjuntosDto->setUrl_Adjunto(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_adjuntosDto->getUrl_Adjunto()))));
$Siga_cat_ticket_adjuntosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_adjuntosDto->getFech_Inser()))));
$Siga_cat_ticket_adjuntosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_adjuntosDto->getUsr_Inser()))));
$Siga_cat_ticket_adjuntosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_adjuntosDto->getFech_Mod()))));
$Siga_cat_ticket_adjuntosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_adjuntosDto->getUsr_Mod()))));
$Siga_cat_ticket_adjuntosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_adjuntosDto->getEstatus_Reg()))));
return $Siga_cat_ticket_adjuntosDto;
}
public function selectSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor=null){
$Siga_cat_ticket_adjuntosDto=$this->validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
$Siga_cat_ticket_adjuntosDao = new Siga_cat_ticket_adjuntosDAO();
$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosDao->selectSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor);
return $Siga_cat_ticket_adjuntosDto;
}
public function insertSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor=null){
//$Siga_cat_ticket_adjuntosDto=$this->validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
$Siga_cat_ticket_adjuntosDao = new Siga_cat_ticket_adjuntosDAO();
$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosDao->insertSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor);
return $Siga_cat_ticket_adjuntosDto;
}
public function updateSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor=null){
//$Siga_cat_ticket_adjuntosDto=$this->validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
$Siga_cat_ticket_adjuntosDao = new Siga_cat_ticket_adjuntosDAO();
//$tmpDto = new Siga_cat_ticket_adjuntosDTO();
//$tmpDto = $Siga_cat_ticket_adjuntosDao->selectSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_ticket_adjuntosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosDao->updateSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor);
return $Siga_cat_ticket_adjuntosDto;
//}
//return "";
}
public function deleteSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor=null){
//$Siga_cat_ticket_adjuntosDto=$this->validarSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto);
$Siga_cat_ticket_adjuntosDao = new Siga_cat_ticket_adjuntosDAO();
$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosDao->deleteSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor);
return $Siga_cat_ticket_adjuntosDto;
}
}
?>