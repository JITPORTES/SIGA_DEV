<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_subcategoriaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto){
$Siga_cat_ticket_subcategoriaDto->setId_Subcategoria(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_subcategoriaDto->getId_Subcategoria()))));
$Siga_cat_ticket_subcategoriaDto->setDesc_Subcategoria(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()))));
$Siga_cat_ticket_subcategoriaDto->setId_Categoria(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_subcategoriaDto->getId_Categoria()))));
return $Siga_cat_ticket_subcategoriaDto;
}
public function selectSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto,$proveedor=null){
$Siga_cat_ticket_subcategoriaDto=$this->validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
$Siga_cat_ticket_subcategoriaDao = new Siga_cat_ticket_subcategoriaDAO();
$orden=" order by Desc_Subcategoria asc";
$Siga_cat_ticket_subcategoriaDto = $Siga_cat_ticket_subcategoriaDao->selectSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto,$orden,$proveedor);
return $Siga_cat_ticket_subcategoriaDto;
}
public function insertSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto,$proveedor=null){
//$Siga_cat_ticket_subcategoriaDto=$this->validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
$Siga_cat_ticket_subcategoriaDao = new Siga_cat_ticket_subcategoriaDAO();
$Siga_cat_ticket_subcategoriaDto = $Siga_cat_ticket_subcategoriaDao->insertSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto,$proveedor);
return $Siga_cat_ticket_subcategoriaDto;
}
public function updateSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto,$proveedor=null){
//$Siga_cat_ticket_subcategoriaDto=$this->validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
$Siga_cat_ticket_subcategoriaDao = new Siga_cat_ticket_subcategoriaDAO();
//$tmpDto = new Siga_cat_ticket_subcategoriaDTO();
//$tmpDto = $Siga_cat_ticket_subcategoriaDao->selectSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_ticket_subcategoriaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_ticket_subcategoriaDto = $Siga_cat_ticket_subcategoriaDao->updateSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto,$proveedor);
return $Siga_cat_ticket_subcategoriaDto;
//}
//return "";
}
public function deleteSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto,$proveedor=null){
//$Siga_cat_ticket_subcategoriaDto=$this->validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
$Siga_cat_ticket_subcategoriaDao = new Siga_cat_ticket_subcategoriaDAO();
$Siga_cat_ticket_subcategoriaDto = $Siga_cat_ticket_subcategoriaDao->deleteSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto,$proveedor);
return $Siga_cat_ticket_subcategoriaDto;
}
}
?>