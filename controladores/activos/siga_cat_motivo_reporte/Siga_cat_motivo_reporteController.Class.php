<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_reporte/Siga_cat_motivo_reporteDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_motivo_reporte/Siga_cat_motivo_reporteDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_motivo_reporteController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto){
$Siga_cat_motivo_reporteDto->setId_Motivo(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_reporteDto->getId_Motivo()))));
$Siga_cat_motivo_reporteDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_reporteDto->getId_Area()))));
$Siga_cat_motivo_reporteDto->setDesc_Motivo(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_reporteDto->getDesc_Motivo()))));
$Siga_cat_motivo_reporteDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_reporteDto->getFech_Inser()))));
$Siga_cat_motivo_reporteDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_reporteDto->getUsr_Inser()))));
$Siga_cat_motivo_reporteDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_reporteDto->getFech_Mod()))));
$Siga_cat_motivo_reporteDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_reporteDto->getUsr_Mod()))));
$Siga_cat_motivo_reporteDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cat_motivo_reporteDto->getEstatus_Reg()))));
return $Siga_cat_motivo_reporteDto;
}
public function selectSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto,$proveedor=null){
$Siga_cat_motivo_reporteDto=$this->validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
$Siga_cat_motivo_reporteDao = new Siga_cat_motivo_reporteDAO();
$orden=" order by Desc_Motivo asc";
$Siga_cat_motivo_reporteDto = $Siga_cat_motivo_reporteDao->selectSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto,$orden,$proveedor);
return $Siga_cat_motivo_reporteDto;
}
public function insertSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto,$proveedor=null){
//$Siga_cat_motivo_reporteDto=$this->validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
$Siga_cat_motivo_reporteDto->setFech_Inser("getdate()");
$Siga_cat_motivo_reporteDto->setFech_Mod("getdate()");
$Siga_cat_motivo_reporteDao = new Siga_cat_motivo_reporteDAO();
$Siga_cat_motivo_reporteDto = $Siga_cat_motivo_reporteDao->insertSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto,$proveedor);
return $Siga_cat_motivo_reporteDto;
}
public function updateSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto,$proveedor=null){
//$Siga_cat_motivo_reporteDto=$this->validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
$Siga_cat_motivo_reporteDto->setFech_Mod("getdate()");
$Siga_cat_motivo_reporteDao = new Siga_cat_motivo_reporteDAO();
//$tmpDto = new Siga_cat_motivo_reporteDTO();
//$tmpDto = $Siga_cat_motivo_reporteDao->selectSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_motivo_reporteDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_motivo_reporteDto = $Siga_cat_motivo_reporteDao->updateSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto,$proveedor);
return $Siga_cat_motivo_reporteDto;
//}
//return "";
}
public function deleteSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto,$proveedor=null){
//$Siga_cat_motivo_reporteDto=$this->validarSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto);
$Siga_cat_motivo_reporteDao = new Siga_cat_motivo_reporteDAO();
$Siga_cat_motivo_reporteDto = $Siga_cat_motivo_reporteDao->deleteSiga_cat_motivo_reporte($Siga_cat_motivo_reporteDto,$proveedor);
return $Siga_cat_motivo_reporteDto;
}
}
?>