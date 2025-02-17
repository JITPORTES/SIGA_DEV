<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_menu/Siga_menuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_menu/Siga_menuController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_menuFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_menu($Siga_menuDto){
$Siga_menuDto->setId_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getId_Menu(),"utf8"):strtoupper($Siga_menuDto->getId_Menu()))))));
if($this->esFecha($Siga_menuDto->getId_Menu())){
$Siga_menuDto->setId_Menu($this->fechaMysql($Siga_menuDto->getId_Menu()));
}
$Siga_menuDto->setId_Perfil(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getId_Perfil(),"utf8"):strtoupper($Siga_menuDto->getId_Perfil()))))));
if($this->esFecha($Siga_menuDto->getId_Perfil())){
$Siga_menuDto->setId_Perfil($this->fechaMysql($Siga_menuDto->getId_Perfil()));
}
$Siga_menuDto->setNom_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getNom_Menu(),"utf8"):strtoupper($Siga_menuDto->getNom_Menu()))))));
if($this->esFecha($Siga_menuDto->getNom_Menu())){
$Siga_menuDto->setNom_Menu($this->fechaMysql($Siga_menuDto->getNom_Menu()));
}
$Siga_menuDto->setUrl_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getUrl_Menu(),"utf8"):strtoupper($Siga_menuDto->getUrl_Menu()))))));
if($this->esFecha($Siga_menuDto->getUrl_Menu())){
$Siga_menuDto->setUrl_Menu($this->fechaMysql($Siga_menuDto->getUrl_Menu()));
}
$Siga_menuDto->setIcono(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getIcono(),"utf8"):strtoupper($Siga_menuDto->getIcono()))))));
if($this->esFecha($Siga_menuDto->getIcono())){
$Siga_menuDto->setIcono($this->fechaMysql($Siga_menuDto->getIcono()));
}
$Siga_menuDto->setOrden(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getOrden(),"utf8"):strtoupper($Siga_menuDto->getOrden()))))));
if($this->esFecha($Siga_menuDto->getOrden())){
$Siga_menuDto->setOrden($this->fechaMysql($Siga_menuDto->getOrden()));
}
$Siga_menuDto->setPadre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getPadre(),"utf8"):strtoupper($Siga_menuDto->getPadre()))))));
if($this->esFecha($Siga_menuDto->getPadre())){
$Siga_menuDto->setPadre($this->fechaMysql($Siga_menuDto->getPadre()));
}
$Siga_menuDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getFech_Inser(),"utf8"):strtoupper($Siga_menuDto->getFech_Inser()))))));
if($this->esFecha($Siga_menuDto->getFech_Inser())){
$Siga_menuDto->setFech_Inser($this->fechaMysql($Siga_menuDto->getFech_Inser()));
}
$Siga_menuDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getUsr_Inser(),"utf8"):strtoupper($Siga_menuDto->getUsr_Inser()))))));
if($this->esFecha($Siga_menuDto->getUsr_Inser())){
$Siga_menuDto->setUsr_Inser($this->fechaMysql($Siga_menuDto->getUsr_Inser()));
}
$Siga_menuDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getFech_Mod(),"utf8"):strtoupper($Siga_menuDto->getFech_Mod()))))));
if($this->esFecha($Siga_menuDto->getFech_Mod())){
$Siga_menuDto->setFech_Mod($this->fechaMysql($Siga_menuDto->getFech_Mod()));
}
$Siga_menuDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getUsr_Mod(),"utf8"):strtoupper($Siga_menuDto->getUsr_Mod()))))));
if($this->esFecha($Siga_menuDto->getUsr_Mod())){
$Siga_menuDto->setUsr_Mod($this->fechaMysql($Siga_menuDto->getUsr_Mod()));
}
$Siga_menuDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_menuDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_menuDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_menuDto->getEstatus_Reg())){
$Siga_menuDto->setEstatus_Reg($this->fechaMysql($Siga_menuDto->getEstatus_Reg()));
}
return $Siga_menuDto;
}
public function selectSiga_menu($Siga_menuDto){
$Siga_menuDto=$this->validarSiga_menu($Siga_menuDto);
$Siga_menuController = new Siga_menuController();
$Siga_menuDto = $Siga_menuController->selectSiga_menu($Siga_menuDto);
if($Siga_menuDto!=""){
$dtoToJson = new DtoToJson($Siga_menuDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_menu($Siga_menuDto){
//$Siga_menuDto=$this->validarSiga_menu($Siga_menuDto);
$Siga_menuController = new Siga_menuController();
$Siga_menuDto = $Siga_menuController->insertSiga_menu($Siga_menuDto);
if($Siga_menuDto!=""){
$dtoToJson = new DtoToJson($Siga_menuDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_menu($Siga_menuDto){
//$Siga_menuDto=$this->validarSiga_menu($Siga_menuDto);
$Siga_menuController = new Siga_menuController();
$Siga_menuDto = $Siga_menuController->updateSiga_menu($Siga_menuDto);
if($Siga_menuDto!=""){
$dtoToJson = new DtoToJson($Siga_menuDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_menu($Siga_menuDto){
//$Siga_menuDto=$this->validarSiga_menu($Siga_menuDto);
$Siga_menuController = new Siga_menuController();
$Siga_menuDto = $Siga_menuController->deleteSiga_menu($Siga_menuDto);
if($Siga_menuDto==true){
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



@$Id_Menu=$_POST["Id_Menu"];
@$Id_Perfil=$_POST["Id_Perfil"];
@$Nom_Menu=$_POST["Nom_Menu"];
@$Url_Menu=$_POST["Url_Menu"];
@$Icono=$_POST["Icono"];
@$Orden=$_POST["Orden"];
@$Padre=$_POST["Padre"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_menuFacade = new Siga_menuFacade();
$siga_menuDto = new Siga_menuDTO();

$siga_menuDto->setId_Menu($Id_Menu);
$siga_menuDto->setId_Perfil($Id_Perfil);
$siga_menuDto->setNom_Menu($Nom_Menu);
$siga_menuDto->setUrl_Menu($Url_Menu);
$siga_menuDto->setIcono($Icono);
$siga_menuDto->setOrden($Orden);
$siga_menuDto->setPadre($Padre);
$siga_menuDto->setFech_Inser($Fech_Inser);
$siga_menuDto->setUsr_Inser($Usr_Inser);
$siga_menuDto->setFech_Mod($Fech_Mod);
$siga_menuDto->setUsr_Mod($Usr_Mod);
$siga_menuDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Menu=="") ){
$siga_menuDto=$siga_menuFacade->insertSiga_menu($siga_menuDto);
echo $siga_menuDto;
} else if(($accion=="guardar") && ($Id_Menu!="")){
$siga_menuDto=$siga_menuFacade->updateSiga_menu($siga_menuDto);
echo $siga_menuDto;
} else if($accion=="consultar"){
$siga_menuDto=$siga_menuFacade->selectSiga_menu($siga_menuDto);
echo $siga_menuDto;
} else if( ($accion=="baja") && ($Id_Menu!="") ){
$siga_menuDto=$siga_menuFacade->deleteSiga_menu($siga_menuDto);
echo $siga_menuDto;
} else if( ($accion=="seleccionar") && ($Id_Menu!="") ){
$siga_menuDto=$siga_menuFacade->selectSiga_menu($siga_menuDto);
echo $siga_menuDto;
}


?>