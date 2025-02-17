<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_vale_resguardo/Siga_det_vale_resguardoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_det_vale_resguardo/Siga_det_vale_resguardoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_det_vale_resguardoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto){
$Siga_det_vale_resguardoDto->setId_Det_Vale_Resguardo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_vale_resguardoDto->getId_Det_Vale_Resguardo(),"utf8"):strtoupper($Siga_det_vale_resguardoDto->getId_Det_Vale_Resguardo()))))));
if($this->esFecha($Siga_det_vale_resguardoDto->getId_Det_Vale_Resguardo())){
$Siga_det_vale_resguardoDto->setId_Det_Vale_Resguardo($this->fechaMysql($Siga_det_vale_resguardoDto->getId_Det_Vale_Resguardo()));
}
$Siga_det_vale_resguardoDto->setId_Vale_Resguardo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_vale_resguardoDto->getId_Vale_Resguardo(),"utf8"):strtoupper($Siga_det_vale_resguardoDto->getId_Vale_Resguardo()))))));
if($this->esFecha($Siga_det_vale_resguardoDto->getId_Vale_Resguardo())){
$Siga_det_vale_resguardoDto->setId_Vale_Resguardo($this->fechaMysql($Siga_det_vale_resguardoDto->getId_Vale_Resguardo()));
}
$Siga_det_vale_resguardoDto->setId_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_vale_resguardoDto->getId_Activo(),"utf8"):strtoupper($Siga_det_vale_resguardoDto->getId_Activo()))))));
if($this->esFecha($Siga_det_vale_resguardoDto->getId_Activo())){
$Siga_det_vale_resguardoDto->setId_Activo($this->fechaMysql($Siga_det_vale_resguardoDto->getId_Activo()));
}
$Siga_det_vale_resguardoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_vale_resguardoDto->getFech_Inser(),"utf8"):strtoupper($Siga_det_vale_resguardoDto->getFech_Inser()))))));
if($this->esFecha($Siga_det_vale_resguardoDto->getFech_Inser())){
$Siga_det_vale_resguardoDto->setFech_Inser($this->fechaMysql($Siga_det_vale_resguardoDto->getFech_Inser()));
}
$Siga_det_vale_resguardoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_vale_resguardoDto->getUsr_Inser(),"utf8"):strtoupper($Siga_det_vale_resguardoDto->getUsr_Inser()))))));
if($this->esFecha($Siga_det_vale_resguardoDto->getUsr_Inser())){
$Siga_det_vale_resguardoDto->setUsr_Inser($this->fechaMysql($Siga_det_vale_resguardoDto->getUsr_Inser()));
}
$Siga_det_vale_resguardoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_vale_resguardoDto->getFech_Mod(),"utf8"):strtoupper($Siga_det_vale_resguardoDto->getFech_Mod()))))));
if($this->esFecha($Siga_det_vale_resguardoDto->getFech_Mod())){
$Siga_det_vale_resguardoDto->setFech_Mod($this->fechaMysql($Siga_det_vale_resguardoDto->getFech_Mod()));
}
$Siga_det_vale_resguardoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_vale_resguardoDto->getUsr_Mod(),"utf8"):strtoupper($Siga_det_vale_resguardoDto->getUsr_Mod()))))));
if($this->esFecha($Siga_det_vale_resguardoDto->getUsr_Mod())){
$Siga_det_vale_resguardoDto->setUsr_Mod($this->fechaMysql($Siga_det_vale_resguardoDto->getUsr_Mod()));
}
$Siga_det_vale_resguardoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_vale_resguardoDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_det_vale_resguardoDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_det_vale_resguardoDto->getEstatus_Reg())){
$Siga_det_vale_resguardoDto->setEstatus_Reg($this->fechaMysql($Siga_det_vale_resguardoDto->getEstatus_Reg()));
}
return $Siga_det_vale_resguardoDto;
}
public function selectSiga_det_vale_resguardo($Siga_det_vale_resguardoDto){
$Siga_det_vale_resguardoDto=$this->validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
$Siga_det_vale_resguardoController = new Siga_det_vale_resguardoController();
$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoController->selectSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
if($Siga_det_vale_resguardoDto!=""){
$dtoToJson = new DtoToJson($Siga_det_vale_resguardoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_det_vale_resguardo($Siga_det_vale_resguardoDto){
//$Siga_det_vale_resguardoDto=$this->validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
$Siga_det_vale_resguardoController = new Siga_det_vale_resguardoController();
$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoController->insertSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
if($Siga_det_vale_resguardoDto!=""){
$dtoToJson = new DtoToJson($Siga_det_vale_resguardoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_det_vale_resguardo($Siga_det_vale_resguardoDto){
//$Siga_det_vale_resguardoDto=$this->validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
$Siga_det_vale_resguardoController = new Siga_det_vale_resguardoController();
$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoController->updateSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
if($Siga_det_vale_resguardoDto!=""){
$dtoToJson = new DtoToJson($Siga_det_vale_resguardoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_det_vale_resguardo($Siga_det_vale_resguardoDto){
//$Siga_det_vale_resguardoDto=$this->validarSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
$Siga_det_vale_resguardoController = new Siga_det_vale_resguardoController();
$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoController->deleteSiga_det_vale_resguardo($Siga_det_vale_resguardoDto);
if($Siga_det_vale_resguardoDto==true){
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



@$Id_Det_Vale_Resguardo=$_POST["Id_Det_Vale_Resguardo"];
@$Id_Vale_Resguardo=$_POST["Id_Vale_Resguardo"];
@$Id_Activo=$_POST["Id_Activo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_det_vale_resguardoFacade = new Siga_det_vale_resguardoFacade();
$siga_det_vale_resguardoDto = new Siga_det_vale_resguardoDTO();

$siga_det_vale_resguardoDto->setId_Det_Vale_Resguardo($Id_Det_Vale_Resguardo);
$siga_det_vale_resguardoDto->setId_Vale_Resguardo($Id_Vale_Resguardo);
$siga_det_vale_resguardoDto->setId_Activo($Id_Activo);
$siga_det_vale_resguardoDto->setFech_Inser($Fech_Inser);
$siga_det_vale_resguardoDto->setUsr_Inser($Usr_Inser);
$siga_det_vale_resguardoDto->setFech_Mod($Fech_Mod);
$siga_det_vale_resguardoDto->setUsr_Mod($Usr_Mod);
$siga_det_vale_resguardoDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Det_Vale_Resguardo=="") ){
$siga_det_vale_resguardoDto=$siga_det_vale_resguardoFacade->insertSiga_det_vale_resguardo($siga_det_vale_resguardoDto);
echo $siga_det_vale_resguardoDto;
} else if(($accion=="guardar") && ($Id_Det_Vale_Resguardo!="")){
$siga_det_vale_resguardoDto=$siga_det_vale_resguardoFacade->updateSiga_det_vale_resguardo($siga_det_vale_resguardoDto);
echo $siga_det_vale_resguardoDto;
} else if($accion=="consultar"){
$siga_det_vale_resguardoDto=$siga_det_vale_resguardoFacade->selectSiga_det_vale_resguardo($siga_det_vale_resguardoDto);
echo $siga_det_vale_resguardoDto;
} else if( ($accion=="baja") && ($Id_Det_Vale_Resguardo!="") ){
$siga_det_vale_resguardoDto=$siga_det_vale_resguardoFacade->deleteSiga_det_vale_resguardo($siga_det_vale_resguardoDto);
echo $siga_det_vale_resguardoDto;
} else if( ($accion=="seleccionar") && ($Id_Det_Vale_Resguardo!="") ){
$siga_det_vale_resguardoDto=$siga_det_vale_resguardoFacade->selectSiga_det_vale_resguardo($siga_det_vale_resguardoDto);
echo $siga_det_vale_resguardoDto;
}


?>