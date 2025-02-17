<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cargos/Siga_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cargos/Siga_cargosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cargosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cargos($Siga_cargosDto){
$Siga_cargosDto->setId_Cargo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cargosDto->getId_Cargo(),"utf8"):strtoupper($Siga_cargosDto->getId_Cargo()))))));
if($this->esFecha($Siga_cargosDto->getId_Cargo())){
$Siga_cargosDto->setId_Cargo($this->fechaMysql($Siga_cargosDto->getId_Cargo()));
}
$Siga_cargosDto->setNom_Cargo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cargosDto->getNom_Cargo(),"utf8"):strtoupper($Siga_cargosDto->getNom_Cargo()))))));
if($this->esFecha($Siga_cargosDto->getNom_Cargo())){
$Siga_cargosDto->setNom_Cargo($this->fechaMysql($Siga_cargosDto->getNom_Cargo()));
}
$Siga_cargosDto->setTipo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cargosDto->getTipo(),"utf8"):strtoupper($Siga_cargosDto->getTipo()))))));
if($this->esFecha($Siga_cargosDto->getTipo())){
$Siga_cargosDto->setTipo($this->fechaMysql($Siga_cargosDto->getTipo()));
}
$Siga_cargosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cargosDto->getFech_Inser(),"utf8"):strtoupper($Siga_cargosDto->getFech_Inser()))))));
if($this->esFecha($Siga_cargosDto->getFech_Inser())){
$Siga_cargosDto->setFech_Inser($this->fechaMysql($Siga_cargosDto->getFech_Inser()));
}
$Siga_cargosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cargosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cargosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cargosDto->getUsr_Inser())){
$Siga_cargosDto->setUsr_Inser($this->fechaMysql($Siga_cargosDto->getUsr_Inser()));
}
$Siga_cargosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cargosDto->getFech_Mod(),"utf8"):strtoupper($Siga_cargosDto->getFech_Mod()))))));
if($this->esFecha($Siga_cargosDto->getFech_Mod())){
$Siga_cargosDto->setFech_Mod($this->fechaMysql($Siga_cargosDto->getFech_Mod()));
}
$Siga_cargosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cargosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cargosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cargosDto->getUsr_Mod())){
$Siga_cargosDto->setUsr_Mod($this->fechaMysql($Siga_cargosDto->getUsr_Mod()));
}
$Siga_cargosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cargosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cargosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cargosDto->getEstatus_Reg())){
$Siga_cargosDto->setEstatus_Reg($this->fechaMysql($Siga_cargosDto->getEstatus_Reg()));
}
return $Siga_cargosDto;
}
public function selectSiga_cargos($Siga_cargosDto){
$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosController = new Siga_cargosController();
$Siga_cargosDto = $Siga_cargosController->selectSiga_cargos($Siga_cargosDto);
if($Siga_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_cargosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function selectSiga_ConsGrupos($Siga_cargosDto){
$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosController = new Siga_cargosController();
$Siga_cargosDto->setEstatus_Reg("1");
$Siga_cargosDto = $Siga_cargosController->selectSiga_ConsGrupos($Siga_cargosDto);
if($Siga_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_cargosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function selectmenucargos($Siga_cargosDto)
{
	$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
	$Siga_cargosController = new Siga_cargosController();
	$Siga_cargosDto = $Siga_cargosController->selectmenucargos($Siga_cargosDto);
	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_cargosDto);
}


public function insertSiga_cargos($Siga_cargosDto){
//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosController = new Siga_cargosController();
$Siga_cargosDto = $Siga_cargosController->insertSiga_cargos($Siga_cargosDto);
if($Siga_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_cargosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}

public function insertcargosdetalle($Siga_cargosDto, $Arraymenu){
//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosController = new Siga_cargosController();
$Siga_cargosDto = $Siga_cargosController->insertcargosdetalle($Siga_cargosDto, $Arraymenu);
//if($Siga_usuariosDto!=""){
$jsonDto = new Encode_JSON();
//return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
//}
//$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_cargosDto);
}

public function updatecargosdetalle($Siga_cargosDto, $Arraymenu){
//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosController = new Siga_cargosController();
$Siga_cargosDto = $Siga_cargosController->updatecargosdetalle($Siga_cargosDto, $Arraymenu);
//if($Siga_usuariosDto!=""){
$jsonDto = new Encode_JSON();
//return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
//}
//$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_cargosDto);
}

//Eliminacion logica
public function eliminacionlogica($Siga_cargosDto){
//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosController = new Siga_cargosController();
$Siga_cargosDto = $Siga_cargosController->eliminacionlogica($Siga_cargosDto);
//if($Siga_usuariosDto!=""){
$jsonDto = new Encode_JSON();
//return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
//}
//$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_cargosDto);
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search) {
$Siga_cargosController = new Siga_cargosController();
return $Siga_cargosController->llenarDataTable($draw,$columns,$order,$start,$length,$search);
}
public function updateSiga_cargos($Siga_cargosDto){
//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosController = new Siga_cargosController();
$Siga_cargosDto = $Siga_cargosController->updateSiga_cargos($Siga_cargosDto);
if($Siga_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_cargosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cargos($Siga_cargosDto){
//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosController = new Siga_cargosController();
$Siga_cargosDto = $Siga_cargosController->deleteSiga_cargos($Siga_cargosDto);
if($Siga_cargosDto==true){
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



@$Id_Cargo=$_POST["Id_Cargo"];
@$Nom_Cargo=$_POST["Nom_Cargo"];
@$Tipo=$_POST["Tipo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$Arraymenu=$_POST["Arraymenu"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';


$siga_cargosFacade = new Siga_cargosFacade();
$siga_cargosDto = new Siga_cargosDTO();

$siga_cargosDto->setId_Cargo($Id_Cargo);
$siga_cargosDto->setNom_Cargo($Nom_Cargo);
$siga_cargosDto->setTipo($Tipo);
$siga_cargosDto->setFech_Inser($Fech_Inser);
$siga_cargosDto->setUsr_Inser($Usr_Inser);
$siga_cargosDto->setFech_Mod($Fech_Mod);
$siga_cargosDto->setUsr_Mod($Usr_Mod);
$siga_cargosDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Cargo=="") ){
$siga_cargosDto=$siga_cargosFacade->insertSiga_cargos($siga_cargosDto);
echo $siga_cargosDto;
} else if(($accion=="guardar") && ($Id_Cargo!="")){
$siga_cargosDto=$siga_cargosFacade->updateSiga_cargos($siga_cargosDto);
echo $siga_cargosDto;
} else if(($accion=="guardardetalle")){
$siga_cargosDto=$siga_cargosFacade->insertcargosdetalle($siga_cargosDto, $Arraymenu);
echo $siga_cargosDto;
}else if(($accion=="modificardetalle")){
$siga_cargosDto=$siga_cargosFacade->updatecargosdetalle($siga_cargosDto, $Arraymenu);
echo $siga_cargosDto;
}else if(($accion=="eliminacionlogica")){
$siga_cargosDto=$siga_cargosFacade->eliminacionlogica($siga_cargosDto);
echo $siga_cargosDto;
}else if($accion=="consultar"){
$siga_cargosDto=$siga_cargosFacade->selectSiga_cargos($siga_cargosDto);
echo $siga_cargosDto;
}else if($accion=="consultargrupos"){
$siga_cargosDto=$siga_cargosFacade->selectSiga_ConsGrupos($siga_cargosDto);
echo $siga_cargosDto;
} else if($accion=="consultarmencargos"){
$siga_cargosDto=$siga_cargosFacade->selectmenucargos($siga_cargosDto);
echo $siga_cargosDto;
}
else if( ($accion=="baja") && ($Id_Cargo!="") ){
$siga_cargosDto=$siga_cargosFacade->deleteSiga_cargos($siga_cargosDto);
echo $siga_cargosDto;
} else if( ($accion=="seleccionar") && ($Id_Cargo!="") ){
$siga_cargosDto=$siga_cargosFacade->selectSiga_cargos($siga_cargosDto);
echo $siga_cargosDto;
}else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
echo  $siga_cargosDto=$siga_cargosFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search); 
}


?>