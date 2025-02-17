<?php

//session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_seccion/Siga_cat_ticket_seccionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_ticket_seccion/Siga_cat_ticket_seccionController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: POST");
class Siga_cat_ticket_seccionFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto){
$Siga_cat_ticket_seccionDto->setId_Seccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_seccionDto->getId_Seccion(),"utf8"):strtoupper($Siga_cat_ticket_seccionDto->getId_Seccion()))))));
if($this->esFecha($Siga_cat_ticket_seccionDto->getId_Seccion())){
$Siga_cat_ticket_seccionDto->setId_Seccion($this->fechaMysql($Siga_cat_ticket_seccionDto->getId_Seccion()));
}
$Siga_cat_ticket_seccionDto->setDesc_Seccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_seccionDto->getDesc_Seccion(),"utf8"):strtoupper($Siga_cat_ticket_seccionDto->getDesc_Seccion()))))));
if($this->esFecha($Siga_cat_ticket_seccionDto->getDesc_Seccion())){
$Siga_cat_ticket_seccionDto->setDesc_Seccion($this->fechaMysql($Siga_cat_ticket_seccionDto->getDesc_Seccion()));
}
$Siga_cat_ticket_seccionDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_ticket_seccionDto->getId_Area(),"utf8"):strtoupper($Siga_cat_ticket_seccionDto->getId_Area()))))));
if($this->esFecha($Siga_cat_ticket_seccionDto->getId_Area())){
$Siga_cat_ticket_seccionDto->setId_Area($this->fechaMysql($Siga_cat_ticket_seccionDto->getId_Area()));
}
return $Siga_cat_ticket_seccionDto;
}
public function selectSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto){
$Siga_cat_ticket_seccionDto=$this->validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
$Siga_cat_ticket_seccionController = new Siga_cat_ticket_seccionController();
$Siga_cat_ticket_seccionDto = $Siga_cat_ticket_seccionController->selectSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
if($Siga_cat_ticket_seccionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_seccionDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto){
//$Siga_cat_ticket_seccionDto=$this->validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
$Siga_cat_ticket_seccionController = new Siga_cat_ticket_seccionController();
$Siga_cat_ticket_seccionDto = $Siga_cat_ticket_seccionController->insertSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
if($Siga_cat_ticket_seccionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_seccionDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto){
//$Siga_cat_ticket_seccionDto=$this->validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
$Siga_cat_ticket_seccionController = new Siga_cat_ticket_seccionController();
$Siga_cat_ticket_seccionDto = $Siga_cat_ticket_seccionController->updateSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
if($Siga_cat_ticket_seccionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_ticket_seccionDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto){
//$Siga_cat_ticket_seccionDto=$this->validarSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
$Siga_cat_ticket_seccionController = new Siga_cat_ticket_seccionController();
$Siga_cat_ticket_seccionDto = $Siga_cat_ticket_seccionController->deleteSiga_cat_ticket_seccion($Siga_cat_ticket_seccionDto);
if($Siga_cat_ticket_seccionDto==true){
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



@$Id_Seccion=$_POST["Id_Seccion"];
@$Desc_Seccion=$_POST["Desc_Seccion"];
@$Id_Area=$_POST["Id_Area"];
@$accion=$_POST["accion"];

$siga_cat_ticket_seccionFacade = new Siga_cat_ticket_seccionFacade();
$siga_cat_ticket_seccionDto = new Siga_cat_ticket_seccionDTO();

$siga_cat_ticket_seccionDto->setId_Seccion($Id_Seccion);
$siga_cat_ticket_seccionDto->setDesc_Seccion($Desc_Seccion);
$siga_cat_ticket_seccionDto->setId_Area($Id_Area);

if( ($accion=="guardar") && ($Id_Seccion=="") ){
$siga_cat_ticket_seccionDto=$siga_cat_ticket_seccionFacade->insertSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto);
echo $siga_cat_ticket_seccionDto;
} else if(($accion=="guardar") && ($Id_Seccion!="")){
$siga_cat_ticket_seccionDto=$siga_cat_ticket_seccionFacade->updateSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto);
echo $siga_cat_ticket_seccionDto;
} else if($accion=="consultar"){
$siga_cat_ticket_seccionDto=$siga_cat_ticket_seccionFacade->selectSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto);
echo $siga_cat_ticket_seccionDto;
} else if( ($accion=="baja") && ($Id_Seccion!="") ){
$siga_cat_ticket_seccionDto=$siga_cat_ticket_seccionFacade->deleteSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto);
echo $siga_cat_ticket_seccionDto;
} else if( ($accion=="seleccionar") && ($Id_Seccion!="") ){
$siga_cat_ticket_seccionDto=$siga_cat_ticket_seccionFacade->selectSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto);
echo $siga_cat_ticket_seccionDto;
}


?>