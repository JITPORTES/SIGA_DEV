<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: POST");
class Siga_cat_ticket_subcategoriaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto){
$Siga_cat_ticket_subcategoriaDto->setId_Subcategoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_subcategoriaDto->getId_Subcategoria(),"utf8"):strtoupper($Siga_cat_ticket_subcategoriaDto->getId_Subcategoria()))))));
if($this->esFecha($Siga_cat_ticket_subcategoriaDto->getId_Subcategoria())){
$Siga_cat_ticket_subcategoriaDto->setId_Subcategoria($this->fechaMysql($Siga_cat_ticket_subcategoriaDto->getId_Subcategoria()));
}
$Siga_cat_ticket_subcategoriaDto->setDesc_Subcategoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria(),"utf8"):strtoupper($Siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()))))));
if($this->esFecha($Siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria())){
$Siga_cat_ticket_subcategoriaDto->setDesc_Subcategoria($this->fechaMysql($Siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()));
}
$Siga_cat_ticket_subcategoriaDto->setId_Categoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_subcategoriaDto->getId_Categoria(),"utf8"):strtoupper($Siga_cat_ticket_subcategoriaDto->getId_Categoria()))))));
if($this->esFecha($Siga_cat_ticket_subcategoriaDto->getId_Categoria())){
$Siga_cat_ticket_subcategoriaDto->setId_Categoria($this->fechaMysql($Siga_cat_ticket_subcategoriaDto->getId_Categoria()));
}
return $Siga_cat_ticket_subcategoriaDto;
}
public function selectSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto){
$Siga_cat_ticket_subcategoriaDto=$this->validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
$Siga_cat_ticket_subcategoriaController = new Siga_cat_ticket_subcategoriaController();
$Siga_cat_ticket_subcategoriaDto = $Siga_cat_ticket_subcategoriaController->selectSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
if($Siga_cat_ticket_subcategoriaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_subcategoriaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto){
//$Siga_cat_ticket_subcategoriaDto=$this->validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
$Siga_cat_ticket_subcategoriaController = new Siga_cat_ticket_subcategoriaController();
$Siga_cat_ticket_subcategoriaDto = $Siga_cat_ticket_subcategoriaController->insertSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
if($Siga_cat_ticket_subcategoriaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_subcategoriaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto){
//$Siga_cat_ticket_subcategoriaDto=$this->validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
$Siga_cat_ticket_subcategoriaController = new Siga_cat_ticket_subcategoriaController();
$Siga_cat_ticket_subcategoriaDto = $Siga_cat_ticket_subcategoriaController->updateSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
if($Siga_cat_ticket_subcategoriaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_subcategoriaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto){
//$Siga_cat_ticket_subcategoriaDto=$this->validarSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
$Siga_cat_ticket_subcategoriaController = new Siga_cat_ticket_subcategoriaController();
$Siga_cat_ticket_subcategoriaDto = $Siga_cat_ticket_subcategoriaController->deleteSiga_cat_ticket_subcategoria($Siga_cat_ticket_subcategoriaDto);
if($Siga_cat_ticket_subcategoriaDto==true){
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"REGISTRO ELIMINADO DE FORMA CORRECTA"));
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL LA BAJA"));
}
private function esFecha($fecha) {
if (preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $fecha)) {
return true;
}
return false;
}
private function esFechaMysql($fecha) {
if (preg_match('/^\d{4}\-\d{1,2}\-\d{1,2}$/', $fecha)) {
return true;
}
return false;
}
private function fechaMysql($fecha) {
list($dia, $mes, $year) = explode("/", $fecha);
return $year . "-" . $mes . "-" . $dia;
}
private function fechaNormal($fecha) {
list($dia, $mes, $year) = explode("/", $fecha);
return $year . "-" . $mes . "-" . $dia;
}
}



@$Id_Subcategoria=$_POST["Id_Subcategoria"];
@$Desc_Subcategoria=$_POST["Desc_Subcategoria"];
@$Id_Categoria=$_POST["Id_Categoria"];
@$accion=$_POST["accion"];

$siga_cat_ticket_subcategoriaFacade = new Siga_cat_ticket_subcategoriaFacade();
$siga_cat_ticket_subcategoriaDto = new Siga_cat_ticket_subcategoriaDTO();

$siga_cat_ticket_subcategoriaDto->setId_Subcategoria($Id_Subcategoria);
$siga_cat_ticket_subcategoriaDto->setDesc_Subcategoria($Desc_Subcategoria);
$siga_cat_ticket_subcategoriaDto->setId_Categoria($Id_Categoria);

if( ($accion=="guardar") && ($Id_Subcategoria=="") ){
$siga_cat_ticket_subcategoriaDto=$siga_cat_ticket_subcategoriaFacade->insertSiga_cat_ticket_subcategoria($siga_cat_ticket_subcategoriaDto);
echo $siga_cat_ticket_subcategoriaDto;
} else if(($accion=="guardar") && ($Id_Subcategoria!="")){
$siga_cat_ticket_subcategoriaDto=$siga_cat_ticket_subcategoriaFacade->updateSiga_cat_ticket_subcategoria($siga_cat_ticket_subcategoriaDto);
echo $siga_cat_ticket_subcategoriaDto;
} else if($accion=="consultar"){
$siga_cat_ticket_subcategoriaDto=$siga_cat_ticket_subcategoriaFacade->selectSiga_cat_ticket_subcategoria($siga_cat_ticket_subcategoriaDto);
echo $siga_cat_ticket_subcategoriaDto;
} else if( ($accion=="baja") && ($Id_Subcategoria!="") ){
$siga_cat_ticket_subcategoriaDto=$siga_cat_ticket_subcategoriaFacade->deleteSiga_cat_ticket_subcategoria($siga_cat_ticket_subcategoriaDto);
echo $siga_cat_ticket_subcategoriaDto;
} else if( ($accion=="seleccionar") && ($Id_Subcategoria!="") ){
$siga_cat_ticket_subcategoriaDto=$siga_cat_ticket_subcategoriaFacade->selectSiga_cat_ticket_subcategoria($siga_cat_ticket_subcategoriaDto);
echo $siga_cat_ticket_subcategoriaDto;
}


?>