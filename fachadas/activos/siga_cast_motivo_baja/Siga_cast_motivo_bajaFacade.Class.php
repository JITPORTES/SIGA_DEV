<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cast_motivo_baja/Siga_cast_motivo_bajaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cast_motivo_baja/Siga_cast_motivo_bajaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cast_motivo_bajaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto){
$Siga_cast_motivo_bajaDto->setId_Motivo_baja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_bajaDto->getId_Motivo_baja(),"utf8"):strtoupper($Siga_cast_motivo_bajaDto->getId_Motivo_baja()))))));
if($this->esFecha($Siga_cast_motivo_bajaDto->getId_Motivo_baja())){
$Siga_cast_motivo_bajaDto->setId_Motivo_baja($this->fechaMysql($Siga_cast_motivo_bajaDto->getId_Motivo_baja()));
}
$Siga_cast_motivo_bajaDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_bajaDto->getId_Area(),"utf8"):strtoupper($Siga_cast_motivo_bajaDto->getId_Area()))))));
if($this->esFecha($Siga_cast_motivo_bajaDto->getId_Area())){
$Siga_cast_motivo_bajaDto->setId_Area($this->fechaMysql($Siga_cast_motivo_bajaDto->getId_Area()));
}
$Siga_cast_motivo_bajaDto->setDesc_Motivo_baja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_bajaDto->getDesc_Motivo_baja(),"utf8"):strtoupper($Siga_cast_motivo_bajaDto->getDesc_Motivo_baja()))))));
if($this->esFecha($Siga_cast_motivo_bajaDto->getDesc_Motivo_baja())){
$Siga_cast_motivo_bajaDto->setDesc_Motivo_baja($this->fechaMysql($Siga_cast_motivo_bajaDto->getDesc_Motivo_baja()));
}
$Siga_cast_motivo_bajaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_bajaDto->getFech_Inser(),"utf8"):strtoupper($Siga_cast_motivo_bajaDto->getFech_Inser()))))));
if($this->esFecha($Siga_cast_motivo_bajaDto->getFech_Inser())){
$Siga_cast_motivo_bajaDto->setFech_Inser($this->fechaMysql($Siga_cast_motivo_bajaDto->getFech_Inser()));
}
$Siga_cast_motivo_bajaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_bajaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cast_motivo_bajaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cast_motivo_bajaDto->getUsr_Inser())){
$Siga_cast_motivo_bajaDto->setUsr_Inser($this->fechaMysql($Siga_cast_motivo_bajaDto->getUsr_Inser()));
}
$Siga_cast_motivo_bajaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_bajaDto->getFech_Mod(),"utf8"):strtoupper($Siga_cast_motivo_bajaDto->getFech_Mod()))))));
if($this->esFecha($Siga_cast_motivo_bajaDto->getFech_Mod())){
$Siga_cast_motivo_bajaDto->setFech_Mod($this->fechaMysql($Siga_cast_motivo_bajaDto->getFech_Mod()));
}
$Siga_cast_motivo_bajaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_bajaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cast_motivo_bajaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cast_motivo_bajaDto->getUsr_Mod())){
$Siga_cast_motivo_bajaDto->setUsr_Mod($this->fechaMysql($Siga_cast_motivo_bajaDto->getUsr_Mod()));
}
$Siga_cast_motivo_bajaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_motivo_bajaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cast_motivo_bajaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cast_motivo_bajaDto->getEstatus_Reg())){
$Siga_cast_motivo_bajaDto->setEstatus_Reg($this->fechaMysql($Siga_cast_motivo_bajaDto->getEstatus_Reg()));
}
return $Siga_cast_motivo_bajaDto;
}
public function selectSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto){
$Siga_cast_motivo_bajaDto=$this->validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
$Siga_cast_motivo_bajaController = new Siga_cast_motivo_bajaController();
$Siga_cast_motivo_bajaDto = $Siga_cast_motivo_bajaController->selectSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
if($Siga_cast_motivo_bajaDto!=""){
$dtoToJson = new DtoToJson($Siga_cast_motivo_bajaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto){
//$Siga_cast_motivo_bajaDto=$this->validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
$Siga_cast_motivo_bajaController = new Siga_cast_motivo_bajaController();
$Siga_cast_motivo_bajaDto = $Siga_cast_motivo_bajaController->insertSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
if($Siga_cast_motivo_bajaDto!=""){
$dtoToJson = new DtoToJson($Siga_cast_motivo_bajaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto){
//$Siga_cast_motivo_bajaDto=$this->validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
$Siga_cast_motivo_bajaController = new Siga_cast_motivo_bajaController();
$Siga_cast_motivo_bajaDto = $Siga_cast_motivo_bajaController->updateSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
if($Siga_cast_motivo_bajaDto!=""){
$dtoToJson = new DtoToJson($Siga_cast_motivo_bajaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto){
//$Siga_cast_motivo_bajaDto=$this->validarSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
$Siga_cast_motivo_bajaController = new Siga_cast_motivo_bajaController();
$Siga_cast_motivo_bajaDto = $Siga_cast_motivo_bajaController->deleteSiga_cast_motivo_baja($Siga_cast_motivo_bajaDto);
if($Siga_cast_motivo_bajaDto==true){
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



@$Id_Motivo_baja=$_POST["Id_Motivo_baja"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Motivo_baja=$_POST["Desc_Motivo_baja"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cast_motivo_bajaFacade = new Siga_cast_motivo_bajaFacade();
$siga_cast_motivo_bajaDto = new Siga_cast_motivo_bajaDTO();

$siga_cast_motivo_bajaDto->setId_Motivo_baja($Id_Motivo_baja);
$siga_cast_motivo_bajaDto->setId_Area($Id_Area);
$siga_cast_motivo_bajaDto->setDesc_Motivo_baja($Desc_Motivo_baja);
$siga_cast_motivo_bajaDto->setFech_Inser($Fech_Inser);
$siga_cast_motivo_bajaDto->setUsr_Inser($Usr_Inser);
$siga_cast_motivo_bajaDto->setFech_Mod($Fech_Mod);
$siga_cast_motivo_bajaDto->setUsr_Mod($Usr_Mod);
$siga_cast_motivo_bajaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Motivo_baja=="") ){
$siga_cast_motivo_bajaDto=$siga_cast_motivo_bajaFacade->insertSiga_cast_motivo_baja($siga_cast_motivo_bajaDto);
echo $siga_cast_motivo_bajaDto;
} else if(($accion=="guardar") && ($Id_Motivo_baja!="")){
$siga_cast_motivo_bajaDto=$siga_cast_motivo_bajaFacade->updateSiga_cast_motivo_baja($siga_cast_motivo_bajaDto);
echo $siga_cast_motivo_bajaDto;
} else if($accion=="consultar"){
$siga_cast_motivo_bajaDto=$siga_cast_motivo_bajaFacade->selectSiga_cast_motivo_baja($siga_cast_motivo_bajaDto);
echo $siga_cast_motivo_bajaDto;
} else if( ($accion=="baja") && ($Id_Motivo_baja!="") ){
$siga_cast_motivo_bajaDto=$siga_cast_motivo_bajaFacade->deleteSiga_cast_motivo_baja($siga_cast_motivo_bajaDto);
echo $siga_cast_motivo_bajaDto;
} else if( ($accion=="seleccionar") && ($Id_Motivo_baja!="") ){
$siga_cast_motivo_bajaDto=$siga_cast_motivo_bajaFacade->selectSiga_cast_motivo_baja($siga_cast_motivo_bajaDto);
echo $siga_cast_motivo_bajaDto;
}


?>