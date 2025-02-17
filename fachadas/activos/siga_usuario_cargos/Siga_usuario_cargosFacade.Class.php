<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuario_cargos/Siga_usuario_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_usuario_cargos/Siga_usuario_cargosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_usuario_cargosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_usuario_cargos($Siga_usuario_cargosDto){
$Siga_usuario_cargosDto->setId_Usuario_Cargos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_cargosDto->getId_Usuario_Cargos(),"utf8"):strtoupper($Siga_usuario_cargosDto->getId_Usuario_Cargos()))))));
if($this->esFecha($Siga_usuario_cargosDto->getId_Usuario_Cargos())){
$Siga_usuario_cargosDto->setId_Usuario_Cargos($this->fechaMysql($Siga_usuario_cargosDto->getId_Usuario_Cargos()));
}
$Siga_usuario_cargosDto->setId_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_cargosDto->getId_Usuario(),"utf8"):strtoupper($Siga_usuario_cargosDto->getId_Usuario()))))));
if($this->esFecha($Siga_usuario_cargosDto->getId_Usuario())){
$Siga_usuario_cargosDto->setId_Usuario($this->fechaMysql($Siga_usuario_cargosDto->getId_Usuario()));
}
$Siga_usuario_cargosDto->setId_Cargo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_cargosDto->getId_Cargo(),"utf8"):strtoupper($Siga_usuario_cargosDto->getId_Cargo()))))));
if($this->esFecha($Siga_usuario_cargosDto->getId_Cargo())){
$Siga_usuario_cargosDto->setId_Cargo($this->fechaMysql($Siga_usuario_cargosDto->getId_Cargo()));
}
$Siga_usuario_cargosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_cargosDto->getFech_Inser(),"utf8"):strtoupper($Siga_usuario_cargosDto->getFech_Inser()))))));
if($this->esFecha($Siga_usuario_cargosDto->getFech_Inser())){
$Siga_usuario_cargosDto->setFech_Inser($this->fechaMysql($Siga_usuario_cargosDto->getFech_Inser()));
}
$Siga_usuario_cargosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_cargosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_usuario_cargosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_usuario_cargosDto->getUsr_Inser())){
$Siga_usuario_cargosDto->setUsr_Inser($this->fechaMysql($Siga_usuario_cargosDto->getUsr_Inser()));
}
$Siga_usuario_cargosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_cargosDto->getFech_Mod(),"utf8"):strtoupper($Siga_usuario_cargosDto->getFech_Mod()))))));
if($this->esFecha($Siga_usuario_cargosDto->getFech_Mod())){
$Siga_usuario_cargosDto->setFech_Mod($this->fechaMysql($Siga_usuario_cargosDto->getFech_Mod()));
}
$Siga_usuario_cargosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_cargosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_usuario_cargosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_usuario_cargosDto->getUsr_Mod())){
$Siga_usuario_cargosDto->setUsr_Mod($this->fechaMysql($Siga_usuario_cargosDto->getUsr_Mod()));
}
$Siga_usuario_cargosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuario_cargosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_usuario_cargosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_usuario_cargosDto->getEstatus_Reg())){
$Siga_usuario_cargosDto->setEstatus_Reg($this->fechaMysql($Siga_usuario_cargosDto->getEstatus_Reg()));
}
return $Siga_usuario_cargosDto;
}
public function selectSiga_usuario_cargos($Siga_usuario_cargosDto){
$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosController = new Siga_usuario_cargosController();
$Siga_usuario_cargosDto = $Siga_usuario_cargosController->selectSiga_usuario_cargos($Siga_usuario_cargosDto);
if($Siga_usuario_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_usuario_cargosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function selectSiga_cargos($Siga_usuario_cargosDto){
$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosController = new Siga_usuario_cargosController();
$Siga_usuario_cargosDto = $Siga_usuario_cargosController->selectSiga_cargos($Siga_usuario_cargosDto);
if($Siga_usuario_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_usuario_cargosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function insertSiga_usuario_cargos($Siga_usuario_cargosDto){
//$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosController = new Siga_usuario_cargosController();
$Siga_usuario_cargosDto = $Siga_usuario_cargosController->insertSiga_usuario_cargos($Siga_usuario_cargosDto);
if($Siga_usuario_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_usuario_cargosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_usuario_cargos($Siga_usuario_cargosDto){
//$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosController = new Siga_usuario_cargosController();
$Siga_usuario_cargosDto = $Siga_usuario_cargosController->updateSiga_usuario_cargos($Siga_usuario_cargosDto);
if($Siga_usuario_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_usuario_cargosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_usuario_cargos($Siga_usuario_cargosDto){
//$Siga_usuario_cargosDto=$this->validarSiga_usuario_cargos($Siga_usuario_cargosDto);
$Siga_usuario_cargosController = new Siga_usuario_cargosController();
$Siga_usuario_cargosDto = $Siga_usuario_cargosController->deleteSiga_usuario_cargos($Siga_usuario_cargosDto);
if($Siga_usuario_cargosDto==true){
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



@$Id_Usuario_Cargos=$_POST["Id_Usuario_Cargos"];
@$Id_Usuario=$_POST["Id_Usuario"];
@$Id_Cargo=$_POST["Id_Cargo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_usuario_cargosFacade = new Siga_usuario_cargosFacade();
$siga_usuario_cargosDto = new Siga_usuario_cargosDTO();

$siga_usuario_cargosDto->setId_Usuario_Cargos($Id_Usuario_Cargos);
$siga_usuario_cargosDto->setId_Usuario($Id_Usuario);
$siga_usuario_cargosDto->setId_Cargo($Id_Cargo);
$siga_usuario_cargosDto->setFech_Inser($Fech_Inser);
$siga_usuario_cargosDto->setUsr_Inser($Usr_Inser);
$siga_usuario_cargosDto->setFech_Mod($Fech_Mod);
$siga_usuario_cargosDto->setUsr_Mod($Usr_Mod);
$siga_usuario_cargosDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Usuario_Cargos=="") ){
$siga_usuario_cargosDto=$siga_usuario_cargosFacade->insertSiga_usuario_cargos($siga_usuario_cargosDto);
echo $siga_usuario_cargosDto;
} else if(($accion=="guardar") && ($Id_Usuario_Cargos!="")){
$siga_usuario_cargosDto=$siga_usuario_cargosFacade->updateSiga_usuario_cargos($siga_usuario_cargosDto);
echo $siga_usuario_cargosDto;
} else if($accion=="consultar"){
$siga_usuario_cargosDto=$siga_usuario_cargosFacade->selectSiga_usuario_cargos($siga_usuario_cargosDto);
echo $siga_usuario_cargosDto;
} else if($accion=="consultarcargos"){
$siga_usuario_cargosDto=$siga_usuario_cargosFacade->selectSiga_cargos($siga_usuario_cargosDto);
echo $siga_usuario_cargosDto;
}else if( ($accion=="baja") && ($Id_Usuario_Cargos!="") ){
$siga_usuario_cargosDto=$siga_usuario_cargosFacade->deleteSiga_usuario_cargos($siga_usuario_cargosDto);
echo $siga_usuario_cargosDto;
} else if( ($accion=="seleccionar") && ($Id_Usuario_Cargos!="") ){
$siga_usuario_cargosDto=$siga_usuario_cargosFacade->selectSiga_usuario_cargos($siga_usuario_cargosDto);
echo $siga_usuario_cargosDto;
}


?>