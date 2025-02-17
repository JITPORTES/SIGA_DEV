<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_usuario_resp/Siga_cat_usuario_respDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_usuario_resp/Siga_cat_usuario_respDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_usuario_respController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto){
$Siga_cat_usuario_respDto->setId_Usuario_Resp(strtoupper(str_ireplace("'","",trim($Siga_cat_usuario_respDto->getId_Usuario_Resp()))));
$Siga_cat_usuario_respDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_usuario_respDto->getId_Area()))));
$Siga_cat_usuario_respDto->setDesc_Usuario_Resp(strtoupper(str_ireplace("'","",trim($Siga_cat_usuario_respDto->getDesc_Usuario_Resp()))));
$Siga_cat_usuario_respDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_usuario_respDto->getFech_Inser()))));
$Siga_cat_usuario_respDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_usuario_respDto->getUsr_Inser()))));
$Siga_cat_usuario_respDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_usuario_respDto->getFech_Mod()))));
$Siga_cat_usuario_respDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_usuario_respDto->getUsr_Mod()))));
$Siga_cat_usuario_respDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_usuario_respDto->getEstatus_Reg()))));
return $Siga_cat_usuario_respDto;
}
public function selectSiga_cat_usuario_resp($Siga_cat_usuario_respDto,$proveedor=null){
$Siga_cat_usuario_respDto=$this->validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
$Siga_cat_usuario_respDao = new Siga_cat_usuario_respDAO();
$orden=" order by Desc_Usuario_Resp asc";
$Siga_cat_usuario_respDto = $Siga_cat_usuario_respDao->selectSiga_cat_usuario_resp($Siga_cat_usuario_respDto,$orden,$proveedor);
return $Siga_cat_usuario_respDto;
}
public function insertSiga_cat_usuario_resp($Siga_cat_usuario_respDto,$proveedor=null){
//$Siga_cat_usuario_respDto=$this->validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
$Siga_cat_usuario_respDto->setFech_Inser("getdate()");
$Siga_cat_usuario_respDto->setFech_Mod("getdate()");
$Siga_cat_usuario_respDao = new Siga_cat_usuario_respDAO();
$Siga_cat_usuario_respDto = $Siga_cat_usuario_respDao->insertSiga_cat_usuario_resp($Siga_cat_usuario_respDto,$proveedor);
return $Siga_cat_usuario_respDto;
}
public function updateSiga_cat_usuario_resp($Siga_cat_usuario_respDto,$proveedor=null){
//$Siga_cat_usuario_respDto=$this->validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
$Siga_cat_usuario_respDto->setFech_Mod("getdate()");
$Siga_cat_usuario_respDao = new Siga_cat_usuario_respDAO();
//$tmpDto = new Siga_cat_usuario_respDTO();
//$tmpDto = $Siga_cat_usuario_respDao->selectSiga_cat_usuario_resp($Siga_cat_usuario_respDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_usuario_respDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_usuario_respDto = $Siga_cat_usuario_respDao->updateSiga_cat_usuario_resp($Siga_cat_usuario_respDto,$proveedor);
return $Siga_cat_usuario_respDto;
//}
//return "";
}
public function deleteSiga_cat_usuario_resp($Siga_cat_usuario_respDto,$proveedor=null){
//$Siga_cat_usuario_respDto=$this->validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
$Siga_cat_usuario_respDao = new Siga_cat_usuario_respDAO();
$Siga_cat_usuario_respDto = $Siga_cat_usuario_respDao->deleteSiga_cat_usuario_resp($Siga_cat_usuario_respDto,$proveedor);
return $Siga_cat_usuario_respDto;
}
}
?>