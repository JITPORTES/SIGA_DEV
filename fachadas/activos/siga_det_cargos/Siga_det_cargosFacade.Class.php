<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_cargos/Siga_det_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_det_cargos/Siga_det_cargosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_det_cargosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_cargos($Siga_det_cargosDto){
$Siga_det_cargosDto->setId_Det_Cargo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getId_Det_Cargo(),"utf8"):strtoupper($Siga_det_cargosDto->getId_Det_Cargo()))))));
if($this->esFecha($Siga_det_cargosDto->getId_Det_Cargo())){
$Siga_det_cargosDto->setId_Det_Cargo($this->fechaMysql($Siga_det_cargosDto->getId_Det_Cargo()));
}
$Siga_det_cargosDto->setId_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getId_Menu(),"utf8"):strtoupper($Siga_det_cargosDto->getId_Menu()))))));
if($this->esFecha($Siga_det_cargosDto->getId_Menu())){
$Siga_det_cargosDto->setId_Menu($this->fechaMysql($Siga_det_cargosDto->getId_Menu()));
}
$Siga_det_cargosDto->setId_Submenu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getId_Submenu(),"utf8"):strtoupper($Siga_det_cargosDto->getId_Submenu()))))));
if($this->esFecha($Siga_det_cargosDto->getId_Submenu())){
$Siga_det_cargosDto->setId_Submenu($this->fechaMysql($Siga_det_cargosDto->getId_Submenu()));
}
$Siga_det_cargosDto->setId_Cargo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getId_Cargo(),"utf8"):strtoupper($Siga_det_cargosDto->getId_Cargo()))))));
if($this->esFecha($Siga_det_cargosDto->getId_Cargo())){
$Siga_det_cargosDto->setId_Cargo($this->fechaMysql($Siga_det_cargosDto->getId_Cargo()));
}
$Siga_det_cargosDto->setId_Aplicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getId_Aplicacion(),"utf8"):strtoupper($Siga_det_cargosDto->getId_Aplicacion()))))));
if($this->esFecha($Siga_det_cargosDto->getId_Aplicacion())){
$Siga_det_cargosDto->setId_Aplicacion($this->fechaMysql($Siga_det_cargosDto->getId_Aplicacion()));
}
$Siga_det_cargosDto->setLectura(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getLectura(),"utf8"):strtoupper($Siga_det_cargosDto->getLectura()))))));
if($this->esFecha($Siga_det_cargosDto->getLectura())){
$Siga_det_cargosDto->setLectura($this->fechaMysql($Siga_det_cargosDto->getLectura()));
}
$Siga_det_cargosDto->setAlta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getAlta(),"utf8"):strtoupper($Siga_det_cargosDto->getAlta()))))));
if($this->esFecha($Siga_det_cargosDto->getAlta())){
$Siga_det_cargosDto->setAlta($this->fechaMysql($Siga_det_cargosDto->getAlta()));
}
$Siga_det_cargosDto->setBaja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getBaja(),"utf8"):strtoupper($Siga_det_cargosDto->getBaja()))))));
if($this->esFecha($Siga_det_cargosDto->getBaja())){
$Siga_det_cargosDto->setBaja($this->fechaMysql($Siga_det_cargosDto->getBaja()));
}
$Siga_det_cargosDto->setCambio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getCambio(),"utf8"):strtoupper($Siga_det_cargosDto->getCambio()))))));
if($this->esFecha($Siga_det_cargosDto->getCambio())){
$Siga_det_cargosDto->setCambio($this->fechaMysql($Siga_det_cargosDto->getCambio()));
}
$Siga_det_cargosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getFech_Inser(),"utf8"):strtoupper($Siga_det_cargosDto->getFech_Inser()))))));
if($this->esFecha($Siga_det_cargosDto->getFech_Inser())){
$Siga_det_cargosDto->setFech_Inser($this->fechaMysql($Siga_det_cargosDto->getFech_Inser()));
}
$Siga_det_cargosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_det_cargosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_det_cargosDto->getUsr_Inser())){
$Siga_det_cargosDto->setUsr_Inser($this->fechaMysql($Siga_det_cargosDto->getUsr_Inser()));
}
$Siga_det_cargosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getFech_Mod(),"utf8"):strtoupper($Siga_det_cargosDto->getFech_Mod()))))));
if($this->esFecha($Siga_det_cargosDto->getFech_Mod())){
$Siga_det_cargosDto->setFech_Mod($this->fechaMysql($Siga_det_cargosDto->getFech_Mod()));
}
$Siga_det_cargosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_det_cargosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_det_cargosDto->getUsr_Mod())){
$Siga_det_cargosDto->setUsr_Mod($this->fechaMysql($Siga_det_cargosDto->getUsr_Mod()));
}
$Siga_det_cargosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_cargosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_det_cargosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_det_cargosDto->getEstatus_Reg())){
$Siga_det_cargosDto->setEstatus_Reg($this->fechaMysql($Siga_det_cargosDto->getEstatus_Reg()));
}
return $Siga_det_cargosDto;
}
public function selectSiga_det_cargos($Siga_det_cargosDto){
$Siga_det_cargosDto=$this->validarSiga_det_cargos($Siga_det_cargosDto);
$Siga_det_cargosController = new Siga_det_cargosController();
$Siga_det_cargosDto = $Siga_det_cargosController->selectSiga_det_cargos($Siga_det_cargosDto);
if($Siga_det_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_det_cargosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_det_cargos($Siga_det_cargosDto){
//$Siga_det_cargosDto=$this->validarSiga_det_cargos($Siga_det_cargosDto);
$Siga_det_cargosController = new Siga_det_cargosController();
$Siga_det_cargosDto = $Siga_det_cargosController->insertSiga_det_cargos($Siga_det_cargosDto);
if($Siga_det_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_det_cargosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_det_cargos($Siga_det_cargosDto){
//$Siga_det_cargosDto=$this->validarSiga_det_cargos($Siga_det_cargosDto);
$Siga_det_cargosController = new Siga_det_cargosController();
$Siga_det_cargosDto = $Siga_det_cargosController->updateSiga_det_cargos($Siga_det_cargosDto);
if($Siga_det_cargosDto!=""){
$dtoToJson = new DtoToJson($Siga_det_cargosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_det_cargos($Siga_det_cargosDto){
//$Siga_det_cargosDto=$this->validarSiga_det_cargos($Siga_det_cargosDto);
$Siga_det_cargosController = new Siga_det_cargosController();
$Siga_det_cargosDto = $Siga_det_cargosController->deleteSiga_det_cargos($Siga_det_cargosDto);
if($Siga_det_cargosDto==true){
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



@$Id_Det_Cargo=$_POST["Id_Det_Cargo"];
@$Id_Menu=$_POST["Id_Menu"];
@$Id_Submenu=$_POST["Id_Submenu"];
@$Id_Cargo=$_POST["Id_Cargo"];
@$Id_Aplicacion=$_POST["Id_Aplicacion"];
@$Lectura=$_POST["Lectura"];
@$Alta=$_POST["Alta"];
@$Baja=$_POST["Baja"];
@$Cambio=$_POST["Cambio"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_det_cargosFacade = new Siga_det_cargosFacade();
$siga_det_cargosDto = new Siga_det_cargosDTO();

$siga_det_cargosDto->setId_Det_Cargo($Id_Det_Cargo);
$siga_det_cargosDto->setId_Menu($Id_Menu);
$siga_det_cargosDto->setId_Submenu($Id_Submenu);
$siga_det_cargosDto->setId_Cargo($Id_Cargo);
$siga_det_cargosDto->setId_Aplicacion($Id_Aplicacion);
$siga_det_cargosDto->setLectura($Lectura);
$siga_det_cargosDto->setAlta($Alta);
$siga_det_cargosDto->setBaja($Baja);
$siga_det_cargosDto->setCambio($Cambio);
$siga_det_cargosDto->setFech_Inser($Fech_Inser);
$siga_det_cargosDto->setUsr_Inser($Usr_Inser);
$siga_det_cargosDto->setFech_Mod($Fech_Mod);
$siga_det_cargosDto->setUsr_Mod($Usr_Mod);
$siga_det_cargosDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Det_Cargo=="") ){
$siga_det_cargosDto=$siga_det_cargosFacade->insertSiga_det_cargos($siga_det_cargosDto);
echo $siga_det_cargosDto;
} else if(($accion=="guardar") && ($Id_Det_Cargo!="")){
$siga_det_cargosDto=$siga_det_cargosFacade->updateSiga_det_cargos($siga_det_cargosDto);
echo $siga_det_cargosDto;
} else if($accion=="consultar"){
$siga_det_cargosDto=$siga_det_cargosFacade->selectSiga_det_cargos($siga_det_cargosDto);
echo $siga_det_cargosDto;
} else if( ($accion=="baja") && ($Id_Det_Cargo!="") ){
$siga_det_cargosDto=$siga_det_cargosFacade->deleteSiga_det_cargos($siga_det_cargosDto);
echo $siga_det_cargosDto;
} else if( ($accion=="seleccionar") && ($Id_Det_Cargo!="") ){
$siga_det_cargosDto=$siga_det_cargosFacade->selectSiga_det_cargos($siga_det_cargosDto);
echo $siga_det_cargosDto;
}


?>