<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_submenu/Siga_submenuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_submenu/Siga_submenuController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_submenuFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_submenu($Siga_submenuDto){
$Siga_submenuDto->setId_Submenu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getId_Submenu(),"utf8"):strtoupper($Siga_submenuDto->getId_Submenu()))))));
if($this->esFecha($Siga_submenuDto->getId_Submenu())){
$Siga_submenuDto->setId_Submenu($this->fechaMysql($Siga_submenuDto->getId_Submenu()));
}
$Siga_submenuDto->setId_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getId_Menu(),"utf8"):strtoupper($Siga_submenuDto->getId_Menu()))))));
if($this->esFecha($Siga_submenuDto->getId_Menu())){
$Siga_submenuDto->setId_Menu($this->fechaMysql($Siga_submenuDto->getId_Menu()));
}
$Siga_submenuDto->setNom_Submenu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getNom_Submenu(),"utf8"):strtoupper($Siga_submenuDto->getNom_Submenu()))))));
if($this->esFecha($Siga_submenuDto->getNom_Submenu())){
$Siga_submenuDto->setNom_Submenu($this->fechaMysql($Siga_submenuDto->getNom_Submenu()));
}
$Siga_submenuDto->setUrl_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getUrl_Menu(),"utf8"):strtoupper($Siga_submenuDto->getUrl_Menu()))))));
if($this->esFecha($Siga_submenuDto->getUrl_Menu())){
$Siga_submenuDto->setUrl_Menu($this->fechaMysql($Siga_submenuDto->getUrl_Menu()));
}
$Siga_submenuDto->setIcono(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getIcono(),"utf8"):strtoupper($Siga_submenuDto->getIcono()))))));
if($this->esFecha($Siga_submenuDto->getIcono())){
$Siga_submenuDto->setIcono($this->fechaMysql($Siga_submenuDto->getIcono()));
}
$Siga_submenuDto->setOrden(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getOrden(),"utf8"):strtoupper($Siga_submenuDto->getOrden()))))));
if($this->esFecha($Siga_submenuDto->getOrden())){
$Siga_submenuDto->setOrden($this->fechaMysql($Siga_submenuDto->getOrden()));
}
$Siga_submenuDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getFech_Inser(),"utf8"):strtoupper($Siga_submenuDto->getFech_Inser()))))));
if($this->esFecha($Siga_submenuDto->getFech_Inser())){
$Siga_submenuDto->setFech_Inser($this->fechaMysql($Siga_submenuDto->getFech_Inser()));
}
$Siga_submenuDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getUsr_Inser(),"utf8"):strtoupper($Siga_submenuDto->getUsr_Inser()))))));
if($this->esFecha($Siga_submenuDto->getUsr_Inser())){
$Siga_submenuDto->setUsr_Inser($this->fechaMysql($Siga_submenuDto->getUsr_Inser()));
}
$Siga_submenuDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getFech_Mod(),"utf8"):strtoupper($Siga_submenuDto->getFech_Mod()))))));
if($this->esFecha($Siga_submenuDto->getFech_Mod())){
$Siga_submenuDto->setFech_Mod($this->fechaMysql($Siga_submenuDto->getFech_Mod()));
}
$Siga_submenuDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getUsr_Mod(),"utf8"):strtoupper($Siga_submenuDto->getUsr_Mod()))))));
if($this->esFecha($Siga_submenuDto->getUsr_Mod())){
$Siga_submenuDto->setUsr_Mod($this->fechaMysql($Siga_submenuDto->getUsr_Mod()));
}
$Siga_submenuDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_submenuDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_submenuDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_submenuDto->getEstatus_Reg())){
$Siga_submenuDto->setEstatus_Reg($this->fechaMysql($Siga_submenuDto->getEstatus_Reg()));
}
return $Siga_submenuDto;
}
public function selectSiga_submenu($Siga_submenuDto){
$Siga_submenuDto=$this->validarSiga_submenu($Siga_submenuDto);
$Siga_submenuController = new Siga_submenuController();
$Siga_submenuDto = $Siga_submenuController->selectSiga_submenu($Siga_submenuDto);
if($Siga_submenuDto!=""){
$dtoToJson = new DtoToJson($Siga_submenuDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_submenu($Siga_submenuDto){
//$Siga_submenuDto=$this->validarSiga_submenu($Siga_submenuDto);
$Siga_submenuController = new Siga_submenuController();
$Siga_submenuDto = $Siga_submenuController->insertSiga_submenu($Siga_submenuDto);
if($Siga_submenuDto!=""){
$dtoToJson = new DtoToJson($Siga_submenuDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_submenu($Siga_submenuDto){
//$Siga_submenuDto=$this->validarSiga_submenu($Siga_submenuDto);
$Siga_submenuController = new Siga_submenuController();
$Siga_submenuDto = $Siga_submenuController->updateSiga_submenu($Siga_submenuDto);
if($Siga_submenuDto!=""){
$dtoToJson = new DtoToJson($Siga_submenuDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_submenu($Siga_submenuDto){
//$Siga_submenuDto=$this->validarSiga_submenu($Siga_submenuDto);
$Siga_submenuController = new Siga_submenuController();
$Siga_submenuDto = $Siga_submenuController->deleteSiga_submenu($Siga_submenuDto);
if($Siga_submenuDto==true){
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



@$Id_Submenu=$_POST["Id_Submenu"];
@$Id_Menu=$_POST["Id_Menu"];
@$Nom_Submenu=$_POST["Nom_Submenu"];
@$Url_Menu=$_POST["Url_Menu"];
@$Icono=$_POST["Icono"];
@$Orden=$_POST["Orden"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_submenuFacade = new Siga_submenuFacade();
$siga_submenuDto = new Siga_submenuDTO();

$siga_submenuDto->setId_Submenu($Id_Submenu);
$siga_submenuDto->setId_Menu($Id_Menu);
$siga_submenuDto->setNom_Submenu($Nom_Submenu);
$siga_submenuDto->setUrl_Menu($Url_Menu);
$siga_submenuDto->setIcono($Icono);
$siga_submenuDto->setOrden($Orden);
$siga_submenuDto->setFech_Inser($Fech_Inser);
$siga_submenuDto->setUsr_Inser($Usr_Inser);
$siga_submenuDto->setFech_Mod($Fech_Mod);
$siga_submenuDto->setUsr_Mod($Usr_Mod);
$siga_submenuDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Submenu=="") ){
$siga_submenuDto=$siga_submenuFacade->insertSiga_submenu($siga_submenuDto);
echo $siga_submenuDto;
} else if(($accion=="guardar") && ($Id_Submenu!="")){
$siga_submenuDto=$siga_submenuFacade->updateSiga_submenu($siga_submenuDto);
echo $siga_submenuDto;
} else if($accion=="consultar"){
$siga_submenuDto=$siga_submenuFacade->selectSiga_submenu($siga_submenuDto);
echo $siga_submenuDto;
} else if( ($accion=="baja") && ($Id_Submenu!="") ){
$siga_submenuDto=$siga_submenuFacade->deleteSiga_submenu($siga_submenuDto);
echo $siga_submenuDto;
} else if( ($accion=="seleccionar") && ($Id_Submenu!="") ){
$siga_submenuDto=$siga_submenuFacade->selectSiga_submenu($siga_submenuDto);
echo $siga_submenuDto;
}


?>