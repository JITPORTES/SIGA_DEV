<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_departamento/Siga_cat_departamentoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_departamento/Siga_cat_departamentoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_departamentoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_departamento($Siga_cat_departamentoDto){
$Siga_cat_departamentoDto->setId_Departamento(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_departamentoDto->getId_Departamento(),"utf8"):strtoupper($Siga_cat_departamentoDto->getId_Departamento()))))));
if($this->esFecha($Siga_cat_departamentoDto->getId_Departamento())){
$Siga_cat_departamentoDto->setId_Departamento($this->fechaMysql($Siga_cat_departamentoDto->getId_Departamento()));
}
$Siga_cat_departamentoDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_departamentoDto->getId_Area(),"utf8"):strtoupper($Siga_cat_departamentoDto->getId_Area()))))));
if($this->esFecha($Siga_cat_departamentoDto->getId_Area())){
$Siga_cat_departamentoDto->setId_Area($this->fechaMysql($Siga_cat_departamentoDto->getId_Area()));
}
$Siga_cat_departamentoDto->setDes_Departamento(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_departamentoDto->getDes_Departamento(),"utf8"):strtoupper($Siga_cat_departamentoDto->getDes_Departamento()))))));
if($this->esFecha($Siga_cat_departamentoDto->getDes_Departamento())){
$Siga_cat_departamentoDto->setDes_Departamento($this->fechaMysql($Siga_cat_departamentoDto->getDes_Departamento()));
}
$Siga_cat_departamentoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_departamentoDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_departamentoDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_departamentoDto->getFech_Inser())){
$Siga_cat_departamentoDto->setFech_Inser($this->fechaMysql($Siga_cat_departamentoDto->getFech_Inser()));
}
$Siga_cat_departamentoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_departamentoDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_departamentoDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_departamentoDto->getUsr_Inser())){
$Siga_cat_departamentoDto->setUsr_Inser($this->fechaMysql($Siga_cat_departamentoDto->getUsr_Inser()));
}
$Siga_cat_departamentoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_departamentoDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_departamentoDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_departamentoDto->getFech_Mod())){
$Siga_cat_departamentoDto->setFech_Mod($this->fechaMysql($Siga_cat_departamentoDto->getFech_Mod()));
}
$Siga_cat_departamentoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_departamentoDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_departamentoDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_departamentoDto->getUsr_Mod())){
$Siga_cat_departamentoDto->setUsr_Mod($this->fechaMysql($Siga_cat_departamentoDto->getUsr_Mod()));
}
$Siga_cat_departamentoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_departamentoDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_departamentoDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_departamentoDto->getEstatus_Reg())){
$Siga_cat_departamentoDto->setEstatus_Reg($this->fechaMysql($Siga_cat_departamentoDto->getEstatus_Reg()));
}
return $Siga_cat_departamentoDto;
}
public function selectSiga_cat_departamento($Siga_cat_departamentoDto){
$Siga_cat_departamentoDto=$this->validarSiga_cat_departamento($Siga_cat_departamentoDto);
$Siga_cat_departamentoController = new Siga_cat_departamentoController();
$Siga_cat_departamentoDto = $Siga_cat_departamentoController->selectSiga_cat_departamento($Siga_cat_departamentoDto);
if($Siga_cat_departamentoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_departamentoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_departamento($Siga_cat_departamentoDto){
//$Siga_cat_departamentoDto=$this->validarSiga_cat_departamento($Siga_cat_departamentoDto);
$Siga_cat_departamentoController = new Siga_cat_departamentoController();
$Siga_cat_departamentoDto = $Siga_cat_departamentoController->insertSiga_cat_departamento($Siga_cat_departamentoDto);
if($Siga_cat_departamentoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_departamentoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_departamento($Siga_cat_departamentoDto){
//$Siga_cat_departamentoDto=$this->validarSiga_cat_departamento($Siga_cat_departamentoDto);
$Siga_cat_departamentoController = new Siga_cat_departamentoController();
$Siga_cat_departamentoDto = $Siga_cat_departamentoController->updateSiga_cat_departamento($Siga_cat_departamentoDto);
if($Siga_cat_departamentoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_departamentoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_departamento($Siga_cat_departamentoDto){
//$Siga_cat_departamentoDto=$this->validarSiga_cat_departamento($Siga_cat_departamentoDto);
$Siga_cat_departamentoController = new Siga_cat_departamentoController();
$Siga_cat_departamentoDto = $Siga_cat_departamentoController->deleteSiga_cat_departamento($Siga_cat_departamentoDto);
if($Siga_cat_departamentoDto==true){
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



@$Id_Departamento=$_POST["Id_Departamento"];
@$Id_Area=$_POST["Id_Area"];
@$Des_Departamento=$_POST["Des_Departamento"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_departamentoFacade = new Siga_cat_departamentoFacade();
$siga_cat_departamentoDto = new Siga_cat_departamentoDTO();

$siga_cat_departamentoDto->setId_Departamento($Id_Departamento);
$siga_cat_departamentoDto->setId_Area($Id_Area);
$siga_cat_departamentoDto->setDes_Departamento($Des_Departamento);
$siga_cat_departamentoDto->setFech_Inser($Fech_Inser);
$siga_cat_departamentoDto->setUsr_Inser($Usr_Inser);
$siga_cat_departamentoDto->setFech_Mod($Fech_Mod);
$siga_cat_departamentoDto->setUsr_Mod($Usr_Mod);
$siga_cat_departamentoDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Departamento=="") ){
$siga_cat_departamentoDto=$siga_cat_departamentoFacade->insertSiga_cat_departamento($siga_cat_departamentoDto);
echo $siga_cat_departamentoDto;
} else if(($accion=="guardar") && ($Id_Departamento!="")){
$siga_cat_departamentoDto=$siga_cat_departamentoFacade->updateSiga_cat_departamento($siga_cat_departamentoDto);
echo $siga_cat_departamentoDto;
} else if($accion=="consultar"){
$siga_cat_departamentoDto=$siga_cat_departamentoFacade->selectSiga_cat_departamento($siga_cat_departamentoDto);
echo $siga_cat_departamentoDto;
} else if( ($accion=="baja") && ($Id_Departamento!="") ){
$siga_cat_departamentoDto=$siga_cat_departamentoFacade->deleteSiga_cat_departamento($siga_cat_departamentoDto);
echo $siga_cat_departamentoDto;
} else if( ($accion=="seleccionar") && ($Id_Departamento!="") ){
$siga_cat_departamentoDto=$siga_cat_departamentoFacade->selectSiga_cat_departamento($siga_cat_departamentoDto);
echo $siga_cat_departamentoDto;
}


?>