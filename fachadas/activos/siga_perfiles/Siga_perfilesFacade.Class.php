<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_perfiles/Siga_perfilesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_perfiles/Siga_perfilesController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_perfilesFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_perfiles($Siga_perfilesDto){
$Siga_perfilesDto->setId_Perfil(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_perfilesDto->getId_Perfil(),"utf8"):strtoupper($Siga_perfilesDto->getId_Perfil()))))));
if($this->esFecha($Siga_perfilesDto->getId_Perfil())){
$Siga_perfilesDto->setId_Perfil($this->fechaMysql($Siga_perfilesDto->getId_Perfil()));
}
$Siga_perfilesDto->setNom_Perrfil(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_perfilesDto->getNom_Perrfil(),"utf8"):strtoupper($Siga_perfilesDto->getNom_Perrfil()))))));
if($this->esFecha($Siga_perfilesDto->getNom_Perrfil())){
$Siga_perfilesDto->setNom_Perrfil($this->fechaMysql($Siga_perfilesDto->getNom_Perrfil()));
}
$Siga_perfilesDto->setTipo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_perfilesDto->getTipo(),"utf8"):strtoupper($Siga_perfilesDto->getTipo()))))));
if($this->esFecha($Siga_perfilesDto->getTipo())){
$Siga_perfilesDto->setTipo($this->fechaMysql($Siga_perfilesDto->getTipo()));
}
$Siga_perfilesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_perfilesDto->getFech_Inser(),"utf8"):strtoupper($Siga_perfilesDto->getFech_Inser()))))));
if($this->esFecha($Siga_perfilesDto->getFech_Inser())){
$Siga_perfilesDto->setFech_Inser($this->fechaMysql($Siga_perfilesDto->getFech_Inser()));
}
$Siga_perfilesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_perfilesDto->getUsr_Inser(),"utf8"):strtoupper($Siga_perfilesDto->getUsr_Inser()))))));
if($this->esFecha($Siga_perfilesDto->getUsr_Inser())){
$Siga_perfilesDto->setUsr_Inser($this->fechaMysql($Siga_perfilesDto->getUsr_Inser()));
}
$Siga_perfilesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_perfilesDto->getFech_Mod(),"utf8"):strtoupper($Siga_perfilesDto->getFech_Mod()))))));
if($this->esFecha($Siga_perfilesDto->getFech_Mod())){
$Siga_perfilesDto->setFech_Mod($this->fechaMysql($Siga_perfilesDto->getFech_Mod()));
}
$Siga_perfilesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_perfilesDto->getUsr_Mod(),"utf8"):strtoupper($Siga_perfilesDto->getUsr_Mod()))))));
if($this->esFecha($Siga_perfilesDto->getUsr_Mod())){
$Siga_perfilesDto->setUsr_Mod($this->fechaMysql($Siga_perfilesDto->getUsr_Mod()));
}
$Siga_perfilesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_perfilesDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_perfilesDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_perfilesDto->getEstatus_Reg())){
$Siga_perfilesDto->setEstatus_Reg($this->fechaMysql($Siga_perfilesDto->getEstatus_Reg()));
}
return $Siga_perfilesDto;
}

public function selectConsultar_Menu($Siga_perfilesDto)
{
	$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
	$Siga_perfilesController = new Siga_perfilesController();
	$Siga_perfilesDto = $Siga_perfilesController->selectConsultar_Menu($Siga_perfilesDto);
	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_perfilesDto);
}
public function selectSiga_perfiles($Siga_perfilesDto){
$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
$Siga_perfilesController = new Siga_perfilesController();
$Siga_perfilesDto = $Siga_perfilesController->selectSiga_perfiles($Siga_perfilesDto);
if($Siga_perfilesDto!=""){
$dtoToJson = new DtoToJson($Siga_perfilesDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_perfiles($Siga_perfilesDto){
//$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
$Siga_perfilesController = new Siga_perfilesController();
$Siga_perfilesDto = $Siga_perfilesController->insertSiga_perfiles($Siga_perfilesDto);
if($Siga_perfilesDto!=""){
$dtoToJson = new DtoToJson($Siga_perfilesDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_perfiles($Siga_perfilesDto){
//$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
$Siga_perfilesController = new Siga_perfilesController();
$Siga_perfilesDto = $Siga_perfilesController->updateSiga_perfiles($Siga_perfilesDto);
if($Siga_perfilesDto!=""){
$dtoToJson = new DtoToJson($Siga_perfilesDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_perfiles($Siga_perfilesDto){
//$Siga_perfilesDto=$this->validarSiga_perfiles($Siga_perfilesDto);
$Siga_perfilesController = new Siga_perfilesController();
$Siga_perfilesDto = $Siga_perfilesController->deleteSiga_perfiles($Siga_perfilesDto);
if($Siga_perfilesDto==true){
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



@$Id_Perfil=$_POST["Id_Perfil"];
@$Nom_Perrfil=$_POST["Nom_Perrfil"];
@$Tipo=$_POST["Tipo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_perfilesFacade = new Siga_perfilesFacade();
$siga_perfilesDto = new Siga_perfilesDTO();

$siga_perfilesDto->setId_Perfil($Id_Perfil);
$siga_perfilesDto->setNom_Perrfil($Nom_Perrfil);
$siga_perfilesDto->setTipo($Tipo);
$siga_perfilesDto->setFech_Inser($Fech_Inser);
$siga_perfilesDto->setUsr_Inser($Usr_Inser);
$siga_perfilesDto->setFech_Mod($Fech_Mod);
$siga_perfilesDto->setUsr_Mod($Usr_Mod);
$siga_perfilesDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Perfil=="") ){
$siga_perfilesDto=$siga_perfilesFacade->insertSiga_perfiles($siga_perfilesDto);
echo $siga_perfilesDto;
} else if(($accion=="guardar") && ($Id_Perfil!="")){
$siga_perfilesDto=$siga_perfilesFacade->updateSiga_perfiles($siga_perfilesDto);
echo $siga_perfilesDto;
} else if($accion=="consultar"){
$siga_perfilesDto=$siga_perfilesFacade->selectSiga_perfiles($siga_perfilesDto);
echo $siga_perfilesDto;
}else if($accion=="consultarmenu"){
$siga_perfilesDto=$siga_perfilesFacade->selectConsultar_Menu($siga_perfilesDto);
echo $siga_perfilesDto;
} else if( ($accion=="baja") && ($Id_Perfil!="") ){
$siga_perfilesDto=$siga_perfilesFacade->deleteSiga_perfiles($siga_perfilesDto);
echo $siga_perfilesDto;
} else if( ($accion=="seleccionar") && ($Id_Perfil!="") ){
$siga_perfilesDto=$siga_perfilesFacade->selectSiga_perfiles($siga_perfilesDto);
echo $siga_perfilesDto;
}


?>