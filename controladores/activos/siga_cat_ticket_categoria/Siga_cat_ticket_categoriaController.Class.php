<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_categoria/Siga_cat_ticket_categoriaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ticket_categoria/Siga_cat_ticket_categoriaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_categoriaController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto){
$Siga_cat_ticket_categoriaDto->setId_Categoria(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_categoriaDto->getId_Categoria()))));
$Siga_cat_ticket_categoriaDto->setDesc_Categoria(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_categoriaDto->getDesc_Categoria()))));
$Siga_cat_ticket_categoriaDto->setId_Seccion(strtoupper(str_ireplace("'","",trim($Siga_cat_ticket_categoriaDto->getId_Seccion()))));
return $Siga_cat_ticket_categoriaDto;
}
public function selectSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto,$proveedor=null){
$Siga_cat_ticket_categoriaDto=$this->validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
$Siga_cat_ticket_categoriaDao = new Siga_cat_ticket_categoriaDAO();
$orden=" order by Desc_Categoria asc";
$Siga_cat_ticket_categoriaDto = $Siga_cat_ticket_categoriaDao->selectSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto,$orden,$proveedor);
return $Siga_cat_ticket_categoriaDto;
}
public function insertSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto,$proveedor=null){
//$Siga_cat_ticket_categoriaDto=$this->validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
$Siga_cat_ticket_categoriaDao = new Siga_cat_ticket_categoriaDAO();
$Siga_cat_ticket_categoriaDto = $Siga_cat_ticket_categoriaDao->insertSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto,$proveedor);
return $Siga_cat_ticket_categoriaDto;
}
public function updateSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto,$proveedor=null){
//$Siga_cat_ticket_categoriaDto=$this->validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
$Siga_cat_ticket_categoriaDao = new Siga_cat_ticket_categoriaDAO();
//$tmpDto = new Siga_cat_ticket_categoriaDTO();
//$tmpDto = $Siga_cat_ticket_categoriaDao->selectSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto,$proveedor);
//if($tmpDto!=""){//$Siga_cat_ticket_categoriaDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cat_ticket_categoriaDto = $Siga_cat_ticket_categoriaDao->updateSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto,$proveedor);
return $Siga_cat_ticket_categoriaDto;
//}
//return "";
}
public function deleteSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto,$proveedor=null){
//$Siga_cat_ticket_categoriaDto=$this->validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
$Siga_cat_ticket_categoriaDao = new Siga_cat_ticket_categoriaDAO();
$Siga_cat_ticket_categoriaDto = $Siga_cat_ticket_categoriaDao->deleteSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto,$proveedor);
return $Siga_cat_ticket_categoriaDto;
}
}
?>