<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_categoria/Siga_cat_ticket_categoriaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_ticket_categoria/Siga_cat_ticket_categoriaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: POST");
class Siga_cat_ticket_categoriaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto){
$Siga_cat_ticket_categoriaDto->setId_Categoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_categoriaDto->getId_Categoria(),"utf8"):strtoupper($Siga_cat_ticket_categoriaDto->getId_Categoria()))))));
if($this->esFecha($Siga_cat_ticket_categoriaDto->getId_Categoria())){
$Siga_cat_ticket_categoriaDto->setId_Categoria($this->fechaMysql($Siga_cat_ticket_categoriaDto->getId_Categoria()));
}
$Siga_cat_ticket_categoriaDto->setDesc_Categoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_categoriaDto->getDesc_Categoria(),"utf8"):strtoupper($Siga_cat_ticket_categoriaDto->getDesc_Categoria()))))));
if($this->esFecha($Siga_cat_ticket_categoriaDto->getDesc_Categoria())){
$Siga_cat_ticket_categoriaDto->setDesc_Categoria($this->fechaMysql($Siga_cat_ticket_categoriaDto->getDesc_Categoria()));
}
$Siga_cat_ticket_categoriaDto->setId_Seccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_categoriaDto->getId_Seccion(),"utf8"):strtoupper($Siga_cat_ticket_categoriaDto->getId_Seccion()))))));
if($this->esFecha($Siga_cat_ticket_categoriaDto->getId_Seccion())){
$Siga_cat_ticket_categoriaDto->setId_Seccion($this->fechaMysql($Siga_cat_ticket_categoriaDto->getId_Seccion()));
}
return $Siga_cat_ticket_categoriaDto;
}
public function selectSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto){
$Siga_cat_ticket_categoriaDto=$this->validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
$Siga_cat_ticket_categoriaController = new Siga_cat_ticket_categoriaController();
$Siga_cat_ticket_categoriaDto = $Siga_cat_ticket_categoriaController->selectSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
if($Siga_cat_ticket_categoriaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_categoriaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto){
//$Siga_cat_ticket_categoriaDto=$this->validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
$Siga_cat_ticket_categoriaController = new Siga_cat_ticket_categoriaController();
$Siga_cat_ticket_categoriaDto = $Siga_cat_ticket_categoriaController->insertSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
if($Siga_cat_ticket_categoriaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_categoriaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto){
//$Siga_cat_ticket_categoriaDto=$this->validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
$Siga_cat_ticket_categoriaController = new Siga_cat_ticket_categoriaController();
$Siga_cat_ticket_categoriaDto = $Siga_cat_ticket_categoriaController->updateSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
if($Siga_cat_ticket_categoriaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_categoriaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto){
//$Siga_cat_ticket_categoriaDto=$this->validarSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
$Siga_cat_ticket_categoriaController = new Siga_cat_ticket_categoriaController();
$Siga_cat_ticket_categoriaDto = $Siga_cat_ticket_categoriaController->deleteSiga_cat_ticket_categoria($Siga_cat_ticket_categoriaDto);
if($Siga_cat_ticket_categoriaDto==true){
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



@$Id_Categoria=$_POST["Id_Categoria"];
@$Desc_Categoria=$_POST["Desc_Categoria"];
@$Id_Seccion=$_POST["Id_Seccion"];
@$accion=$_POST["accion"];

$siga_cat_ticket_categoriaFacade = new Siga_cat_ticket_categoriaFacade();
$siga_cat_ticket_categoriaDto = new Siga_cat_ticket_categoriaDTO();

$siga_cat_ticket_categoriaDto->setId_Categoria($Id_Categoria);
$siga_cat_ticket_categoriaDto->setDesc_Categoria($Desc_Categoria);
$siga_cat_ticket_categoriaDto->setId_Seccion($Id_Seccion);

if( ($accion=="guardar") && ($Id_Categoria=="") ){
$siga_cat_ticket_categoriaDto=$siga_cat_ticket_categoriaFacade->insertSiga_cat_ticket_categoria($siga_cat_ticket_categoriaDto);
echo $siga_cat_ticket_categoriaDto;
} else if(($accion=="guardar") && ($Id_Categoria!="")){
$siga_cat_ticket_categoriaDto=$siga_cat_ticket_categoriaFacade->updateSiga_cat_ticket_categoria($siga_cat_ticket_categoriaDto);
echo $siga_cat_ticket_categoriaDto;
} else if($accion=="consultar"){
$siga_cat_ticket_categoriaDto=$siga_cat_ticket_categoriaFacade->selectSiga_cat_ticket_categoria($siga_cat_ticket_categoriaDto);
echo $siga_cat_ticket_categoriaDto;
} else if( ($accion=="baja") && ($Id_Categoria!="") ){
$siga_cat_ticket_categoriaDto=$siga_cat_ticket_categoriaFacade->deleteSiga_cat_ticket_categoria($siga_cat_ticket_categoriaDto);
echo $siga_cat_ticket_categoriaDto;
} else if( ($accion=="seleccionar") && ($Id_Categoria!="") ){
$siga_cat_ticket_categoriaDto=$siga_cat_ticket_categoriaFacade->selectSiga_cat_ticket_categoria($siga_cat_ticket_categoriaDto);
echo $siga_cat_ticket_categoriaDto;
}


?>