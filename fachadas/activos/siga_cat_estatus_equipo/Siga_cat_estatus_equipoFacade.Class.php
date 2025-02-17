<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_estatus_equipo/Siga_cat_estatus_equipoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_estatus_equipo/Siga_cat_estatus_equipoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_estatus_equipoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto){
$Siga_cat_estatus_equipoDto->setId_Est_Equipo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatus_equipoDto->getId_Est_Equipo(),"utf8"):strtoupper($Siga_cat_estatus_equipoDto->getId_Est_Equipo()))))));
if($this->esFecha($Siga_cat_estatus_equipoDto->getId_Est_Equipo())){
$Siga_cat_estatus_equipoDto->setId_Est_Equipo($this->fechaMysql($Siga_cat_estatus_equipoDto->getId_Est_Equipo()));
}
$Siga_cat_estatus_equipoDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatus_equipoDto->getId_Area(),"utf8"):strtoupper($Siga_cat_estatus_equipoDto->getId_Area()))))));
if($this->esFecha($Siga_cat_estatus_equipoDto->getId_Area())){
$Siga_cat_estatus_equipoDto->setId_Area($this->fechaMysql($Siga_cat_estatus_equipoDto->getId_Area()));
}
$Siga_cat_estatus_equipoDto->setDesc_Est_Equipo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatus_equipoDto->getDesc_Est_Equipo(),"utf8"):strtoupper($Siga_cat_estatus_equipoDto->getDesc_Est_Equipo()))))));
if($this->esFecha($Siga_cat_estatus_equipoDto->getDesc_Est_Equipo())){
$Siga_cat_estatus_equipoDto->setDesc_Est_Equipo($this->fechaMysql($Siga_cat_estatus_equipoDto->getDesc_Est_Equipo()));
}
$Siga_cat_estatus_equipoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatus_equipoDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_estatus_equipoDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_estatus_equipoDto->getFech_Inser())){
$Siga_cat_estatus_equipoDto->setFech_Inser($this->fechaMysql($Siga_cat_estatus_equipoDto->getFech_Inser()));
}
$Siga_cat_estatus_equipoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatus_equipoDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_estatus_equipoDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_estatus_equipoDto->getUsr_Inser())){
$Siga_cat_estatus_equipoDto->setUsr_Inser($this->fechaMysql($Siga_cat_estatus_equipoDto->getUsr_Inser()));
}
$Siga_cat_estatus_equipoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatus_equipoDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_estatus_equipoDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_estatus_equipoDto->getFech_Mod())){
$Siga_cat_estatus_equipoDto->setFech_Mod($this->fechaMysql($Siga_cat_estatus_equipoDto->getFech_Mod()));
}
$Siga_cat_estatus_equipoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatus_equipoDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_estatus_equipoDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_estatus_equipoDto->getUsr_Mod())){
$Siga_cat_estatus_equipoDto->setUsr_Mod($this->fechaMysql($Siga_cat_estatus_equipoDto->getUsr_Mod()));
}
$Siga_cat_estatus_equipoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_estatus_equipoDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_estatus_equipoDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_estatus_equipoDto->getEstatus_Reg())){
$Siga_cat_estatus_equipoDto->setEstatus_Reg($this->fechaMysql($Siga_cat_estatus_equipoDto->getEstatus_Reg()));
}
return $Siga_cat_estatus_equipoDto;
}
public function selectSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto){
$Siga_cat_estatus_equipoDto=$this->validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
$Siga_cat_estatus_equipoController = new Siga_cat_estatus_equipoController();
$Siga_cat_estatus_equipoDto = $Siga_cat_estatus_equipoController->selectSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
if($Siga_cat_estatus_equipoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_estatus_equipoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto){
//$Siga_cat_estatus_equipoDto=$this->validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
$Siga_cat_estatus_equipoController = new Siga_cat_estatus_equipoController();
$Siga_cat_estatus_equipoDto = $Siga_cat_estatus_equipoController->insertSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
if($Siga_cat_estatus_equipoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_estatus_equipoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto){
//$Siga_cat_estatus_equipoDto=$this->validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
$Siga_cat_estatus_equipoController = new Siga_cat_estatus_equipoController();
$Siga_cat_estatus_equipoDto = $Siga_cat_estatus_equipoController->updateSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
if($Siga_cat_estatus_equipoDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_estatus_equipoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto){
//$Siga_cat_estatus_equipoDto=$this->validarSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
$Siga_cat_estatus_equipoController = new Siga_cat_estatus_equipoController();
$Siga_cat_estatus_equipoDto = $Siga_cat_estatus_equipoController->deleteSiga_cat_estatus_equipo($Siga_cat_estatus_equipoDto);
if($Siga_cat_estatus_equipoDto==true){
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



@$Id_Est_Equipo=$_POST["Id_Est_Equipo"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Est_Equipo=$_POST["Desc_Est_Equipo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_estatus_equipoFacade = new Siga_cat_estatus_equipoFacade();
$siga_cat_estatus_equipoDto = new Siga_cat_estatus_equipoDTO();

$siga_cat_estatus_equipoDto->setId_Est_Equipo($Id_Est_Equipo);
$siga_cat_estatus_equipoDto->setId_Area($Id_Area);
$siga_cat_estatus_equipoDto->setDesc_Est_Equipo($Desc_Est_Equipo);
$siga_cat_estatus_equipoDto->setFech_Inser($Fech_Inser);
$siga_cat_estatus_equipoDto->setUsr_Inser($Usr_Inser);
$siga_cat_estatus_equipoDto->setFech_Mod($Fech_Mod);
$siga_cat_estatus_equipoDto->setUsr_Mod($Usr_Mod);
$siga_cat_estatus_equipoDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Est_Equipo=="") ){
$siga_cat_estatus_equipoDto=$siga_cat_estatus_equipoFacade->insertSiga_cat_estatus_equipo($siga_cat_estatus_equipoDto);
echo $siga_cat_estatus_equipoDto;
} else if(($accion=="guardar") && ($Id_Est_Equipo!="")){
$siga_cat_estatus_equipoDto=$siga_cat_estatus_equipoFacade->updateSiga_cat_estatus_equipo($siga_cat_estatus_equipoDto);
echo $siga_cat_estatus_equipoDto;
} else if($accion=="consultar"){
$siga_cat_estatus_equipoDto=$siga_cat_estatus_equipoFacade->selectSiga_cat_estatus_equipo($siga_cat_estatus_equipoDto);
echo $siga_cat_estatus_equipoDto;
} else if( ($accion=="baja") && ($Id_Est_Equipo!="") ){
$siga_cat_estatus_equipoDto=$siga_cat_estatus_equipoFacade->deleteSiga_cat_estatus_equipo($siga_cat_estatus_equipoDto);
echo $siga_cat_estatus_equipoDto;
} else if( ($accion=="seleccionar") && ($Id_Est_Equipo!="") ){
$siga_cat_estatus_equipoDto=$siga_cat_estatus_equipoFacade->selectSiga_cat_estatus_equipo($siga_cat_estatus_equipoDto);
echo $siga_cat_estatus_equipoDto;
}


?>