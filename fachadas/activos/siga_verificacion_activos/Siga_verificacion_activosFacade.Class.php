<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_verificacion_activos/Siga_verificacion_activosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_verificacion_activos/Siga_verificacion_activosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_verificacion_activosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_verificacion_activos($Siga_verificacion_activosDto){
$Siga_verificacion_activosDto->setId_Verificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_verificacion_activosDto->getId_Verificacion(),"utf8"):strtoupper($Siga_verificacion_activosDto->getId_Verificacion()))))));
if($this->esFecha($Siga_verificacion_activosDto->getId_Verificacion())){
$Siga_verificacion_activosDto->setId_Verificacion($this->fechaMysql($Siga_verificacion_activosDto->getId_Verificacion()));
}
$Siga_verificacion_activosDto->setFecha(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_verificacion_activosDto->getFecha(),"utf8"):strtoupper($Siga_verificacion_activosDto->getFecha()))))));
if($this->esFecha($Siga_verificacion_activosDto->getFecha())){
$Siga_verificacion_activosDto->setFecha($this->fechaMysql($Siga_verificacion_activosDto->getFecha()));
}
$Siga_verificacion_activosDto->setComentarios(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_verificacion_activosDto->getComentarios(),"utf8"):strtoupper($Siga_verificacion_activosDto->getComentarios()))))));
if($this->esFecha($Siga_verificacion_activosDto->getComentarios())){
$Siga_verificacion_activosDto->setComentarios($this->fechaMysql($Siga_verificacion_activosDto->getComentarios()));
}
$Siga_verificacion_activosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_verificacion_activosDto->getFech_Inser(),"utf8"):strtoupper($Siga_verificacion_activosDto->getFech_Inser()))))));
if($this->esFecha($Siga_verificacion_activosDto->getFech_Inser())){
$Siga_verificacion_activosDto->setFech_Inser($this->fechaMysql($Siga_verificacion_activosDto->getFech_Inser()));
}
$Siga_verificacion_activosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_verificacion_activosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_verificacion_activosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_verificacion_activosDto->getUsr_Inser())){
$Siga_verificacion_activosDto->setUsr_Inser($this->fechaMysql($Siga_verificacion_activosDto->getUsr_Inser()));
}
$Siga_verificacion_activosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_verificacion_activosDto->getFech_Mod(),"utf8"):strtoupper($Siga_verificacion_activosDto->getFech_Mod()))))));
if($this->esFecha($Siga_verificacion_activosDto->getFech_Mod())){
$Siga_verificacion_activosDto->setFech_Mod($this->fechaMysql($Siga_verificacion_activosDto->getFech_Mod()));
}
$Siga_verificacion_activosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_verificacion_activosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_verificacion_activosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_verificacion_activosDto->getUsr_Mod())){
$Siga_verificacion_activosDto->setUsr_Mod($this->fechaMysql($Siga_verificacion_activosDto->getUsr_Mod()));
}
$Siga_verificacion_activosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_verificacion_activosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_verificacion_activosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_verificacion_activosDto->getEstatus_Reg())){
$Siga_verificacion_activosDto->setEstatus_Reg($this->fechaMysql($Siga_verificacion_activosDto->getEstatus_Reg()));
}
return $Siga_verificacion_activosDto;
}
public function selectSiga_verificacion_activos_detalle($Siga_verificacion_activosDto){
$Siga_verificacion_activosDto=$this->validarSiga_verificacion_activos($Siga_verificacion_activosDto);
$Siga_verificacion_activosController = new Siga_verificacion_activosController();
$Siga_verificacion_activosDto = $Siga_verificacion_activosController->selectSiga_verificacion_activos_detalle($Siga_verificacion_activosDto);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_verificacion_activosDto);
}

public function selectSiga_verificacion_activos($Siga_verificacion_activosDto){
$Siga_verificacion_activosDto=$this->validarSiga_verificacion_activos($Siga_verificacion_activosDto);
$Siga_verificacion_activosController = new Siga_verificacion_activosController();
$Siga_verificacion_activosDto = $Siga_verificacion_activosController->selectSiga_verificacion_activos($Siga_verificacion_activosDto);
if($Siga_verificacion_activosDto!=""){
$dtoToJson = new DtoToJson($Siga_verificacion_activosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_verificacion_activos($Siga_verificacion_activosDto, $array_activos){
//$Siga_verificacion_activosDto=$this->validarSiga_verificacion_activos($Siga_verificacion_activosDto);
$Siga_verificacion_activosController = new Siga_verificacion_activosController();
$Siga_verificacion_activosDto = $Siga_verificacion_activosController->insertSiga_verificacion_activos($Siga_verificacion_activosDto, $array_activos);


$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_verificacion_activosDto);
}
public function updateSiga_verificacion_activos($Siga_verificacion_activosDto, $array_activos){
//$Siga_verificacion_activosDto=$this->validarSiga_verificacion_activos($Siga_verificacion_activosDto);
$Siga_verificacion_activosController = new Siga_verificacion_activosController();
$Siga_verificacion_activosDto = $Siga_verificacion_activosController->updateSiga_verificacion_activos($Siga_verificacion_activosDto, $array_activos);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_verificacion_activosDto);
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search,$siga_verificacion_activosDto) {
$Siga_verificacion_activosController = new Siga_verificacion_activosController();
return $Siga_verificacion_activosController->llenarDataTable($draw,$columns,$order,$start,$length,$search,$siga_verificacion_activosDto);
}

public function deleteSiga_verificacion_activos($Siga_verificacion_activosDto){
//$Siga_verificacion_activosDto=$this->validarSiga_verificacion_activos($Siga_verificacion_activosDto);
$Siga_verificacion_activosController = new Siga_verificacion_activosController();
$Siga_verificacion_activosDto = $Siga_verificacion_activosController->deleteSiga_verificacion_activos($Siga_verificacion_activosDto);
if($Siga_verificacion_activosDto==true){
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



@$Id_Verificacion=$_POST["Id_Verificacion"];
@$Id_Area=$_POST["Id_Area"];
@$Fecha=$_POST["Fecha"];
@$Comentarios=$_POST["Comentarios"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';

//Array Activos
@$array_activos=$_POST["array_activos"];

$siga_verificacion_activosFacade = new Siga_verificacion_activosFacade();
$siga_verificacion_activosDto = new Siga_verificacion_activosDTO();

$siga_verificacion_activosDto->setId_Verificacion($Id_Verificacion);
$siga_verificacion_activosDto->setId_Area($Id_Area);
$siga_verificacion_activosDto->setFecha($Fecha);
$siga_verificacion_activosDto->setComentarios($Comentarios);
$siga_verificacion_activosDto->setFech_Inser($Fech_Inser);
$siga_verificacion_activosDto->setUsr_Inser($Usr_Inser);
$siga_verificacion_activosDto->setFech_Mod($Fech_Mod);
$siga_verificacion_activosDto->setUsr_Mod($Usr_Mod);
$siga_verificacion_activosDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Verificacion=="") ){
$siga_verificacion_activosDto=$siga_verificacion_activosFacade->insertSiga_verificacion_activos($siga_verificacion_activosDto, $array_activos);
echo $siga_verificacion_activosDto;
} else if(($accion=="guardar") && ($Id_Verificacion!="")){
$siga_verificacion_activosDto=$siga_verificacion_activosFacade->updateSiga_verificacion_activos($siga_verificacion_activosDto, $array_activos);
echo $siga_verificacion_activosDto;
} else if($accion=="consultar"){
$siga_verificacion_activosDto=$siga_verificacion_activosFacade->selectSiga_verificacion_activos($siga_verificacion_activosDto);
echo $siga_verificacion_activosDto;
} else if($accion=="consultar_verificacion"){
$siga_verificacion_activosDto=$siga_verificacion_activosFacade->selectSiga_verificacion_activos_detalle($siga_verificacion_activosDto);
echo $siga_verificacion_activosDto;
}else if( ($accion=="baja") && ($Id_Verificacion!="") ){
$siga_verificacion_activosDto=$siga_verificacion_activosFacade->deleteSiga_verificacion_activos($siga_verificacion_activosDto);
echo $siga_verificacion_activosDto;
} else if( ($accion=="seleccionar") && ($Id_Verificacion!="") ){
$siga_verificacion_activosDto=$siga_verificacion_activosFacade->selectSiga_verificacion_activos($siga_verificacion_activosDto);
echo $siga_verificacion_activosDto;
}else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
echo  $siga_verificacion_activosFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search, $siga_verificacion_activosDto); 
}


?>