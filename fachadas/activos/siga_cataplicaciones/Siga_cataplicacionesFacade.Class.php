<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cataplicaciones/Siga_cataplicacionesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cataplicaciones/Siga_cataplicacionesController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cataplicacionesFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cataplicaciones($Siga_cataplicacionesDto){
$Siga_cataplicacionesDto->setId_Aplicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cataplicacionesDto->getId_Aplicacion(),"utf8"):strtoupper($Siga_cataplicacionesDto->getId_Aplicacion()))))));
if($this->esFecha($Siga_cataplicacionesDto->getId_Aplicacion())){
$Siga_cataplicacionesDto->setId_Aplicacion($this->fechaMysql($Siga_cataplicacionesDto->getId_Aplicacion()));
}
$Siga_cataplicacionesDto->setNom_Aplicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cataplicacionesDto->getNom_Aplicacion(),"utf8"):strtoupper($Siga_cataplicacionesDto->getNom_Aplicacion()))))));
if($this->esFecha($Siga_cataplicacionesDto->getNom_Aplicacion())){
$Siga_cataplicacionesDto->setNom_Aplicacion($this->fechaMysql($Siga_cataplicacionesDto->getNom_Aplicacion()));
}
$Siga_cataplicacionesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cataplicacionesDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cataplicacionesDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cataplicacionesDto->getEstatus_Reg())){
$Siga_cataplicacionesDto->setEstatus_Reg($this->fechaMysql($Siga_cataplicacionesDto->getEstatus_Reg()));
}
return $Siga_cataplicacionesDto;
}
public function selectSiga_cataplicaciones($Siga_cataplicacionesDto){
$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
$Siga_cataplicacionesController = new Siga_cataplicacionesController();
$Siga_cataplicacionesDto = $Siga_cataplicacionesController->selectSiga_cataplicaciones($Siga_cataplicacionesDto);
if($Siga_cataplicacionesDto!=""){
$dtoToJson = new DtoToJson($Siga_cataplicacionesDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cataplicaciones($Siga_cataplicacionesDto){
//$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
$Siga_cataplicacionesController = new Siga_cataplicacionesController();
$Siga_cataplicacionesDto = $Siga_cataplicacionesController->insertSiga_cataplicaciones($Siga_cataplicacionesDto);
if($Siga_cataplicacionesDto!=""){
$dtoToJson = new DtoToJson($Siga_cataplicacionesDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cataplicaciones($Siga_cataplicacionesDto){
//$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
$Siga_cataplicacionesController = new Siga_cataplicacionesController();
$Siga_cataplicacionesDto = $Siga_cataplicacionesController->updateSiga_cataplicaciones($Siga_cataplicacionesDto);
if($Siga_cataplicacionesDto!=""){
$dtoToJson = new DtoToJson($Siga_cataplicacionesDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function selectmenuaplicaciones($Siga_cataplicacionesDto)
{
	$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
	$Siga_cataplicacionesController = new Siga_cataplicacionesController();
	$Siga_cataplicacionesDto = $Siga_cataplicacionesController->selectmenuaplicaciones($Siga_cataplicacionesDto);
	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_cataplicacionesDto);
}

public function deleteSiga_cataplicaciones($Siga_cataplicacionesDto){
//$Siga_cataplicacionesDto=$this->validarSiga_cataplicaciones($Siga_cataplicacionesDto);
$Siga_cataplicacionesController = new Siga_cataplicacionesController();
$Siga_cataplicacionesDto = $Siga_cataplicacionesController->deleteSiga_cataplicaciones($Siga_cataplicacionesDto);
if($Siga_cataplicacionesDto==true){
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



@$Id_Aplicacion=$_POST["Id_Aplicacion"];
@$Nom_Aplicacion=$_POST["Nom_Aplicacion"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cataplicacionesFacade = new Siga_cataplicacionesFacade();
$siga_cataplicacionesDto = new Siga_cataplicacionesDTO();

$siga_cataplicacionesDto->setId_Aplicacion($Id_Aplicacion);
$siga_cataplicacionesDto->setNom_Aplicacion($Nom_Aplicacion);
$siga_cataplicacionesDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Aplicacion=="") ){
$siga_cataplicacionesDto=$siga_cataplicacionesFacade->insertSiga_cataplicaciones($siga_cataplicacionesDto);
echo $siga_cataplicacionesDto;
} else if(($accion=="guardar") && ($Id_Aplicacion!="")){
$siga_cataplicacionesDto=$siga_cataplicacionesFacade->updateSiga_cataplicaciones($siga_cataplicacionesDto);
echo $siga_cataplicacionesDto;
}else if($accion=="consultarmenuaplicaciones"){
$siga_cataplicacionesDto=$siga_cataplicacionesFacade->selectmenuaplicaciones($siga_cataplicacionesDto);
echo $siga_cataplicacionesDto;
} else if($accion=="consultar"){
$siga_cataplicacionesDto=$siga_cataplicacionesFacade->selectSiga_cataplicaciones($siga_cataplicacionesDto);
echo $siga_cataplicacionesDto;
} else if( ($accion=="baja") && ($Id_Aplicacion!="") ){
$siga_cataplicacionesDto=$siga_cataplicacionesFacade->deleteSiga_cataplicaciones($siga_cataplicacionesDto);
echo $siga_cataplicacionesDto;
} else if( ($accion=="seleccionar") && ($Id_Aplicacion!="") ){
$siga_cataplicacionesDto=$siga_cataplicacionesFacade->selectSiga_cataplicaciones($siga_cataplicacionesDto);
echo $siga_cataplicacionesDto;
}


?>