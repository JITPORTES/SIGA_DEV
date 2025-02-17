<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_menu/Siga_det_menuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_det_menu/Siga_det_menuController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_det_menuFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_menu($Siga_det_menuDto){
$Siga_det_menuDto->setId_Det_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getId_Det_Menu(),"utf8"):strtoupper($Siga_det_menuDto->getId_Det_Menu()))))));
if($this->esFecha($Siga_det_menuDto->getId_Det_Menu())){
$Siga_det_menuDto->setId_Det_Menu($this->fechaMysql($Siga_det_menuDto->getId_Det_Menu()));
}
$Siga_det_menuDto->setId_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getId_Menu(),"utf8"):strtoupper($Siga_det_menuDto->getId_Menu()))))));
if($this->esFecha($Siga_det_menuDto->getId_Menu())){
$Siga_det_menuDto->setId_Menu($this->fechaMysql($Siga_det_menuDto->getId_Menu()));
}
$Siga_det_menuDto->setId_Submenu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getId_Submenu(),"utf8"):strtoupper($Siga_det_menuDto->getId_Submenu()))))));
if($this->esFecha($Siga_det_menuDto->getId_Submenu())){
$Siga_det_menuDto->setId_Submenu($this->fechaMysql($Siga_det_menuDto->getId_Submenu()));
}
$Siga_det_menuDto->setId_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getId_Usuario(),"utf8"):strtoupper($Siga_det_menuDto->getId_Usuario()))))));
if($this->esFecha($Siga_det_menuDto->getId_Usuario())){
$Siga_det_menuDto->setId_Usuario($this->fechaMysql($Siga_det_menuDto->getId_Usuario()));
}
$Siga_det_menuDto->setLectura(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getLectura(),"utf8"):strtoupper($Siga_det_menuDto->getLectura()))))));
if($this->esFecha($Siga_det_menuDto->getLectura())){
$Siga_det_menuDto->setLectura($this->fechaMysql($Siga_det_menuDto->getLectura()));
}
$Siga_det_menuDto->setAlta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getAlta(),"utf8"):strtoupper($Siga_det_menuDto->getAlta()))))));
if($this->esFecha($Siga_det_menuDto->getAlta())){
$Siga_det_menuDto->setAlta($this->fechaMysql($Siga_det_menuDto->getAlta()));
}
$Siga_det_menuDto->setBaja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getBaja(),"utf8"):strtoupper($Siga_det_menuDto->getBaja()))))));
if($this->esFecha($Siga_det_menuDto->getBaja())){
$Siga_det_menuDto->setBaja($this->fechaMysql($Siga_det_menuDto->getBaja()));
}
$Siga_det_menuDto->setCambio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getCambio(),"utf8"):strtoupper($Siga_det_menuDto->getCambio()))))));
if($this->esFecha($Siga_det_menuDto->getCambio())){
$Siga_det_menuDto->setCambio($this->fechaMysql($Siga_det_menuDto->getCambio()));
}
$Siga_det_menuDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getFech_Inser(),"utf8"):strtoupper($Siga_det_menuDto->getFech_Inser()))))));
if($this->esFecha($Siga_det_menuDto->getFech_Inser())){
$Siga_det_menuDto->setFech_Inser($this->fechaMysql($Siga_det_menuDto->getFech_Inser()));
}
$Siga_det_menuDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getUsr_Inser(),"utf8"):strtoupper($Siga_det_menuDto->getUsr_Inser()))))));
if($this->esFecha($Siga_det_menuDto->getUsr_Inser())){
$Siga_det_menuDto->setUsr_Inser($this->fechaMysql($Siga_det_menuDto->getUsr_Inser()));
}
$Siga_det_menuDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getFech_Mod(),"utf8"):strtoupper($Siga_det_menuDto->getFech_Mod()))))));
if($this->esFecha($Siga_det_menuDto->getFech_Mod())){
$Siga_det_menuDto->setFech_Mod($this->fechaMysql($Siga_det_menuDto->getFech_Mod()));
}
$Siga_det_menuDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getUsr_Mod(),"utf8"):strtoupper($Siga_det_menuDto->getUsr_Mod()))))));
if($this->esFecha($Siga_det_menuDto->getUsr_Mod())){
$Siga_det_menuDto->setUsr_Mod($this->fechaMysql($Siga_det_menuDto->getUsr_Mod()));
}
$Siga_det_menuDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_menuDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_det_menuDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_det_menuDto->getEstatus_Reg())){
$Siga_det_menuDto->setEstatus_Reg($this->fechaMysql($Siga_det_menuDto->getEstatus_Reg()));
}
return $Siga_det_menuDto;
}
public function selectSiga_det_menu($Siga_det_menuDto){
$Siga_det_menuDto=$this->validarSiga_det_menu($Siga_det_menuDto);
$Siga_det_menuController = new Siga_det_menuController();
$Siga_det_menuDto = $Siga_det_menuController->selectSiga_det_menu($Siga_det_menuDto);
if($Siga_det_menuDto!=""){
$dtoToJson = new DtoToJson($Siga_det_menuDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_det_menu($Siga_det_menuDto){
//$Siga_det_menuDto=$this->validarSiga_det_menu($Siga_det_menuDto);
$Siga_det_menuController = new Siga_det_menuController();
$Siga_det_menuDto = $Siga_det_menuController->insertSiga_det_menu($Siga_det_menuDto);
if($Siga_det_menuDto!=""){
$dtoToJson = new DtoToJson($Siga_det_menuDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_det_menu($Siga_det_menuDto){
//$Siga_det_menuDto=$this->validarSiga_det_menu($Siga_det_menuDto);
$Siga_det_menuController = new Siga_det_menuController();
$Siga_det_menuDto = $Siga_det_menuController->updateSiga_det_menu($Siga_det_menuDto);
if($Siga_det_menuDto!=""){
$dtoToJson = new DtoToJson($Siga_det_menuDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_det_menu($Siga_det_menuDto){
//$Siga_det_menuDto=$this->validarSiga_det_menu($Siga_det_menuDto);
$Siga_det_menuController = new Siga_det_menuController();
$Siga_det_menuDto = $Siga_det_menuController->deleteSiga_det_menu($Siga_det_menuDto);
if($Siga_det_menuDto==true){
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



@$Id_Det_Menu=$_POST["Id_Det_Menu"];
@$Id_Menu=$_POST["Id_Menu"];
@$Id_Submenu=$_POST["Id_Submenu"];
@$Id_Usuario=$_POST["Id_Usuario"];
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

$siga_det_menuFacade = new Siga_det_menuFacade();
$siga_det_menuDto = new Siga_det_menuDTO();

$siga_det_menuDto->setId_Det_Menu($Id_Det_Menu);
$siga_det_menuDto->setId_Menu($Id_Menu);
$siga_det_menuDto->setId_Submenu($Id_Submenu);
$siga_det_menuDto->setId_Usuario($Id_Usuario);
$siga_det_menuDto->setLectura($Lectura);
$siga_det_menuDto->setAlta($Alta);
$siga_det_menuDto->setBaja($Baja);
$siga_det_menuDto->setCambio($Cambio);
$siga_det_menuDto->setFech_Inser($Fech_Inser);
$siga_det_menuDto->setUsr_Inser($Usr_Inser);
$siga_det_menuDto->setFech_Mod($Fech_Mod);
$siga_det_menuDto->setUsr_Mod($Usr_Mod);
$siga_det_menuDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Det_Menu=="") ){
$siga_det_menuDto=$siga_det_menuFacade->insertSiga_det_menu($siga_det_menuDto);
echo $siga_det_menuDto;
} else if(($accion=="guardar") && ($Id_Det_Menu!="")){
$siga_det_menuDto=$siga_det_menuFacade->updateSiga_det_menu($siga_det_menuDto);
echo $siga_det_menuDto;
} else if($accion=="consultar"){
$siga_det_menuDto=$siga_det_menuFacade->selectSiga_det_menu($siga_det_menuDto);
echo $siga_det_menuDto;
} else if( ($accion=="baja") && ($Id_Det_Menu!="") ){
$siga_det_menuDto=$siga_det_menuFacade->deleteSiga_det_menu($siga_det_menuDto);
echo $siga_det_menuDto;
} else if( ($accion=="seleccionar") && ($Id_Det_Menu!="") ){
$siga_det_menuDto=$siga_det_menuFacade->selectSiga_det_menu($siga_det_menuDto);
echo $siga_det_menuDto;
}


?>