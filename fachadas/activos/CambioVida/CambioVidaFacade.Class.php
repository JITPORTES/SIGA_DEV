<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/CambioVida/CambioVidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/CambioVida/CambioVidaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class CambioVidaFacade {
private $proveedor;
public function __construct() {
}
public function validarCambioVida($CambioVidaDto){
$CambioVidaDto->setId_cambiovida(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($CambioVidaDto->getId_cambiovida(),"utf8"):strtoupper($CambioVidaDto->getId_cambiovida()))))));
if($this->esFecha($CambioVidaDto->getId_cambiovida())){
$CambioVidaDto->setId_cambiovida($this->fechaMysql($CambioVidaDto->getId_cambiovida()));
}
$CambioVidaDto->setfechacambio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($CambioVidaDto->getfechacambio(),"utf8"):strtoupper($CambioVidaDto->getfechacambio()))))));
if($this->esFecha($CambioVidaDto->getfechacambio())){
$CambioVidaDto->setfechacambio($this->fechaMysql($CambioVidaDto->getfechacambio()));
}
$CambioVidaDto->setnuevosmeses(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($CambioVidaDto->getnuevosmeses(),"utf8"):strtoupper($CambioVidaDto->getnuevosmeses()))))));
if($this->esFecha($CambioVidaDto->getnuevosmeses())){
$CambioVidaDto->setnuevosmeses($this->fechaMysql($CambioVidaDto->getnuevosmeses()));
}
$CambioVidaDto->setsaldoMOI(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($CambioVidaDto->getsaldoMOI(),"utf8"):strtoupper($CambioVidaDto->getsaldoMOI()))))));
if($this->esFecha($CambioVidaDto->getsaldoMOI())){
$CambioVidaDto->setsaldoMOI($this->fechaMysql($CambioVidaDto->getsaldoMOI()));
}
$CambioVidaDto->setsaldoDepreciacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($CambioVidaDto->getsaldoDepreciacion(),"utf8"):strtoupper($CambioVidaDto->getsaldoDepreciacion()))))));
if($this->esFecha($CambioVidaDto->getsaldoDepreciacion())){
$CambioVidaDto->setsaldoDepreciacion($this->fechaMysql($CambioVidaDto->getsaldoDepreciacion()));
}
$CambioVidaDto->setId_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($CambioVidaDto->getId_Activo(),"utf8"):strtoupper($CambioVidaDto->getId_Activo()))))));
if($this->esFecha($CambioVidaDto->getId_Activo())){
$CambioVidaDto->setId_Activo($this->fechaMysql($CambioVidaDto->getId_Activo()));
}
$CambioVidaDto->setfechaalta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($CambioVidaDto->getfechaalta(),"utf8"):strtoupper($CambioVidaDto->getfechaalta()))))));
if($this->esFecha($CambioVidaDto->getfechaalta())){
$CambioVidaDto->setfechaalta($this->fechaMysql($CambioVidaDto->getfechaalta()));
}
$CambioVidaDto->setTipoDepreciacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($CambioVidaDto->getTipoDepreciacion(),"utf8"):strtoupper($CambioVidaDto->getTipoDepreciacion()))))));
if($this->esFecha($CambioVidaDto->getTipoDepreciacion())){
$CambioVidaDto->setTipoDepreciacion($this->fechaMysql($CambioVidaDto->getTipoDepreciacion()));
}
return $CambioVidaDto;
}
public function selectCambioVida($CambioVidaDto){
$CambioVidaDto=$this->validarCambioVida($CambioVidaDto);
$CambioVidaController = new CambioVidaController();
$CambioVidaDto = $CambioVidaController->selectCambioVida($CambioVidaDto);
if($CambioVidaDto!=""){
$dtoToJson = new DtoToJson($CambioVidaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertCambioVida($CambioVidaDto){
$CambioVidaDto=$this->validarCambioVida($CambioVidaDto);
$CambioVidaController = new CambioVidaController();
$CambioVidaDto = $CambioVidaController->insertCambioVida($CambioVidaDto);
if($CambioVidaDto!=""){
$dtoToJson = new DtoToJson($CambioVidaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateCambioVida($CambioVidaDto){
$CambioVidaDto=$this->validarCambioVida($CambioVidaDto);
$CambioVidaController = new CambioVidaController();
$CambioVidaDto = $CambioVidaController->updateCambioVida($CambioVidaDto);
if($CambioVidaDto!=""){
$dtoToJson = new DtoToJson($CambioVidaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteCambioVida($CambioVidaDto){
$CambioVidaDto=$this->validarCambioVida($CambioVidaDto);
$CambioVidaController = new CambioVidaController();
$CambioVidaDto = $CambioVidaController->deleteCambioVida($CambioVidaDto);
if($CambioVidaDto==true){
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



@$Id_cambiovida=$_POST["Id_cambiovida"];
@$fechacambio=$_POST["fechacambio"];
@$nuevosmeses=$_POST["nuevosmeses"];
@$saldoMOI=$_POST["saldoMOI"];
@$saldoDepreciacion=$_POST["saldoDepreciacion"];
@$Id_Activo=$_POST["Id_Activo"];
@$fechaalta=$_POST["fechaalta"];
@$TipoDepreciacion=$_POST["TipoDepreciacion"];
@$accion=$_POST["accion"];

$CambioVidaFacade = new CambioVidaFacade();
$CambioVidaDto = new CambioVidaDTO();

$CambioVidaDto->setId_cambiovida($Id_cambiovida);
$CambioVidaDto->setFechacambio($fechacambio);
$CambioVidaDto->setNuevosmeses($nuevosmeses);
$CambioVidaDto->setSaldoMOI($saldoMOI);
$CambioVidaDto->setSaldoDepreciacion($saldoDepreciacion);
$CambioVidaDto->setId_Activo($Id_Activo);
$CambioVidaDto->setFechaalta($fechaalta);
$CambioVidaDto->setTipoDepreciacion($TipoDepreciacion);

if( ($accion=="guardar") && ($Id_cambiovida=="") ){
$CambioVidaDto=$CambioVidaFacade->insertCambioVida($CambioVidaDto);
echo $CambioVidaDto;
} else if(($accion=="guardar") && ($Id_cambiovida!="")){
$CambioVidaDto=$CambioVidaFacade->updateCambioVida($CambioVidaDto);
echo $CambioVidaDto;
} else if($accion=="consultar"){
$CambioVidaDto=$CambioVidaFacade->selectCambioVida($CambioVidaDto);
echo $CambioVidaDto;
} else if( ($accion=="baja") && ($Id_cambiovida!="") ){
$CambioVidaDto=$CambioVidaFacade->deleteCambioVida($CambioVidaDto);
echo $CambioVidaDto;
} else if( ($accion=="seleccionar") && ($Id_cambiovida!="") ){
$CambioVidaDto=$CambioVidaFacade->selectCambioVida($CambioVidaDto);
echo $CambioVidaDto;
}


?>