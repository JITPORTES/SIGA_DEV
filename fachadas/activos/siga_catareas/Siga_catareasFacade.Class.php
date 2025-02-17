<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_catareas/Siga_catareasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_catareas/Siga_catareasController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_catareasFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_catareas($Siga_catareasDto){
$Siga_catareasDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_catareasDto->getId_Area(),"utf8"):strtoupper($Siga_catareasDto->getId_Area()))))));
if($this->esFecha($Siga_catareasDto->getId_Area())){
$Siga_catareasDto->setId_Area($this->fechaMysql($Siga_catareasDto->getId_Area()));
}
$Siga_catareasDto->setNom_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_catareasDto->getNom_Area(),"utf8"):strtoupper($Siga_catareasDto->getNom_Area()))))));
if($this->esFecha($Siga_catareasDto->getNom_Area())){
$Siga_catareasDto->setNom_Area($this->fechaMysql($Siga_catareasDto->getNom_Area()));
}
$Siga_catareasDto->setIcono(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_catareasDto->getIcono(),"utf8"):strtoupper($Siga_catareasDto->getIcono()))))));
if($this->esFecha($Siga_catareasDto->getIcono())){
$Siga_catareasDto->setIcono($this->fechaMysql($Siga_catareasDto->getIcono()));
}
$Siga_catareasDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_catareasDto->getFech_Inser(),"utf8"):strtoupper($Siga_catareasDto->getFech_Inser()))))));
if($this->esFecha($Siga_catareasDto->getFech_Inser())){
$Siga_catareasDto->setFech_Inser($this->fechaMysql($Siga_catareasDto->getFech_Inser()));
}
$Siga_catareasDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_catareasDto->getUsr_Inser(),"utf8"):strtoupper($Siga_catareasDto->getUsr_Inser()))))));
if($this->esFecha($Siga_catareasDto->getUsr_Inser())){
$Siga_catareasDto->setUsr_Inser($this->fechaMysql($Siga_catareasDto->getUsr_Inser()));
}
$Siga_catareasDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_catareasDto->getFech_Mod(),"utf8"):strtoupper($Siga_catareasDto->getFech_Mod()))))));
if($this->esFecha($Siga_catareasDto->getFech_Mod())){
$Siga_catareasDto->setFech_Mod($this->fechaMysql($Siga_catareasDto->getFech_Mod()));
}
$Siga_catareasDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_catareasDto->getUsr_Mod(),"utf8"):strtoupper($Siga_catareasDto->getUsr_Mod()))))));
if($this->esFecha($Siga_catareasDto->getUsr_Mod())){
$Siga_catareasDto->setUsr_Mod($this->fechaMysql($Siga_catareasDto->getUsr_Mod()));
}
$Siga_catareasDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_catareasDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_catareasDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_catareasDto->getEstatus_Reg())){
$Siga_catareasDto->setEstatus_Reg($this->fechaMysql($Siga_catareasDto->getEstatus_Reg()));
}
return $Siga_catareasDto;
}
public function selectSiga_catareas($Siga_catareasDto){
$Siga_catareasDto=$this->validarSiga_catareas($Siga_catareasDto);
$Siga_catareasController = new Siga_catareasController();
$Siga_catareasDto = $Siga_catareasController->selectSiga_catareas($Siga_catareasDto);
if($Siga_catareasDto!=""){
$dtoToJson = new DtoToJson($Siga_catareasDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_catareas($Siga_catareasDto){
//$Siga_catareasDto=$this->validarSiga_catareas($Siga_catareasDto);
$Siga_catareasController = new Siga_catareasController();
$Siga_catareasDto = $Siga_catareasController->insertSiga_catareas($Siga_catareasDto);
if($Siga_catareasDto!=""){
$dtoToJson = new DtoToJson($Siga_catareasDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_catareas($Siga_catareasDto){
//$Siga_catareasDto=$this->validarSiga_catareas($Siga_catareasDto);
$Siga_catareasController = new Siga_catareasController();
$Siga_catareasDto = $Siga_catareasController->updateSiga_catareas($Siga_catareasDto);
if($Siga_catareasDto!=""){
$dtoToJson = new DtoToJson($Siga_catareasDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_catareas($Siga_catareasDto){
//$Siga_catareasDto=$this->validarSiga_catareas($Siga_catareasDto);
$Siga_catareasController = new Siga_catareasController();
$Siga_catareasDto = $Siga_catareasController->deleteSiga_catareas($Siga_catareasDto);
if($Siga_catareasDto==true){
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



@$Id_Area=$_POST["Id_Area"];
@$Nom_Area=$_POST["Nom_Area"];
@$Icono=$_POST["Icono"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_catareasFacade = new Siga_catareasFacade();
$siga_catareasDto = new Siga_catareasDTO();

$siga_catareasDto->setId_Area($Id_Area);
$siga_catareasDto->setNom_Area($Nom_Area);
$siga_catareasDto->setIcono($Icono);
$siga_catareasDto->setFech_Inser($Fech_Inser);
$siga_catareasDto->setUsr_Inser($Usr_Inser);
$siga_catareasDto->setFech_Mod($Fech_Mod);
$siga_catareasDto->setUsr_Mod($Usr_Mod);
$siga_catareasDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Area=="") ){
$siga_catareasDto=$siga_catareasFacade->insertSiga_catareas($siga_catareasDto);
echo $siga_catareasDto;
} else if(($accion=="guardar") && ($Id_Area!="")){
$siga_catareasDto=$siga_catareasFacade->updateSiga_catareas($siga_catareasDto);
echo $siga_catareasDto;
} else if($accion=="consultar"){
$siga_catareasDto=$siga_catareasFacade->selectSiga_catareas($siga_catareasDto);
echo $siga_catareasDto;
} else if( ($accion=="baja") && ($Id_Area!="") ){
$siga_catareasDto=$siga_catareasFacade->deleteSiga_catareas($siga_catareasDto);
echo $siga_catareasDto;
} else if( ($accion=="seleccionar") && ($Id_Area!="") ){
$siga_catareasDto=$siga_catareasFacade->selectSiga_catareas($siga_catareasDto);
echo $siga_catareasDto;
}


?>