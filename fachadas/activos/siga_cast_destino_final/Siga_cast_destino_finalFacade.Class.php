<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cast_destino_final/Siga_cast_destino_finalDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cast_destino_final/Siga_cast_destino_finalController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cast_destino_finalFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cast_destino_final($Siga_cast_destino_finalDto){
$Siga_cast_destino_finalDto->setId_Destino_final(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_destino_finalDto->getId_Destino_final(),"utf8"):strtoupper($Siga_cast_destino_finalDto->getId_Destino_final()))))));
if($this->esFecha($Siga_cast_destino_finalDto->getId_Destino_final())){
$Siga_cast_destino_finalDto->setId_Destino_final($this->fechaMysql($Siga_cast_destino_finalDto->getId_Destino_final()));
}
$Siga_cast_destino_finalDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_destino_finalDto->getId_Area(),"utf8"):strtoupper($Siga_cast_destino_finalDto->getId_Area()))))));
if($this->esFecha($Siga_cast_destino_finalDto->getId_Area())){
$Siga_cast_destino_finalDto->setId_Area($this->fechaMysql($Siga_cast_destino_finalDto->getId_Area()));
}
$Siga_cast_destino_finalDto->setDesc_Destino_final(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_destino_finalDto->getDesc_Destino_final(),"utf8"):strtoupper($Siga_cast_destino_finalDto->getDesc_Destino_final()))))));
if($this->esFecha($Siga_cast_destino_finalDto->getDesc_Destino_final())){
$Siga_cast_destino_finalDto->setDesc_Destino_final($this->fechaMysql($Siga_cast_destino_finalDto->getDesc_Destino_final()));
}
$Siga_cast_destino_finalDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_destino_finalDto->getFech_Inser(),"utf8"):strtoupper($Siga_cast_destino_finalDto->getFech_Inser()))))));
if($this->esFecha($Siga_cast_destino_finalDto->getFech_Inser())){
$Siga_cast_destino_finalDto->setFech_Inser($this->fechaMysql($Siga_cast_destino_finalDto->getFech_Inser()));
}
$Siga_cast_destino_finalDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_destino_finalDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cast_destino_finalDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cast_destino_finalDto->getUsr_Inser())){
$Siga_cast_destino_finalDto->setUsr_Inser($this->fechaMysql($Siga_cast_destino_finalDto->getUsr_Inser()));
}
$Siga_cast_destino_finalDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_destino_finalDto->getFech_Mod(),"utf8"):strtoupper($Siga_cast_destino_finalDto->getFech_Mod()))))));
if($this->esFecha($Siga_cast_destino_finalDto->getFech_Mod())){
$Siga_cast_destino_finalDto->setFech_Mod($this->fechaMysql($Siga_cast_destino_finalDto->getFech_Mod()));
}
$Siga_cast_destino_finalDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_destino_finalDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cast_destino_finalDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cast_destino_finalDto->getUsr_Mod())){
$Siga_cast_destino_finalDto->setUsr_Mod($this->fechaMysql($Siga_cast_destino_finalDto->getUsr_Mod()));
}
$Siga_cast_destino_finalDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cast_destino_finalDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cast_destino_finalDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cast_destino_finalDto->getEstatus_Reg())){
$Siga_cast_destino_finalDto->setEstatus_Reg($this->fechaMysql($Siga_cast_destino_finalDto->getEstatus_Reg()));
}
return $Siga_cast_destino_finalDto;
}
public function selectSiga_cast_destino_final($Siga_cast_destino_finalDto){
$Siga_cast_destino_finalDto=$this->validarSiga_cast_destino_final($Siga_cast_destino_finalDto);
$Siga_cast_destino_finalController = new Siga_cast_destino_finalController();
$Siga_cast_destino_finalDto = $Siga_cast_destino_finalController->selectSiga_cast_destino_final($Siga_cast_destino_finalDto);
if($Siga_cast_destino_finalDto!=""){
$dtoToJson = new DtoToJson($Siga_cast_destino_finalDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cast_destino_final($Siga_cast_destino_finalDto){
//$Siga_cast_destino_finalDto=$this->validarSiga_cast_destino_final($Siga_cast_destino_finalDto);
$Siga_cast_destino_finalController = new Siga_cast_destino_finalController();
$Siga_cast_destino_finalDto = $Siga_cast_destino_finalController->insertSiga_cast_destino_final($Siga_cast_destino_finalDto);
if($Siga_cast_destino_finalDto!=""){
$dtoToJson = new DtoToJson($Siga_cast_destino_finalDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cast_destino_final($Siga_cast_destino_finalDto){
//$Siga_cast_destino_finalDto=$this->validarSiga_cast_destino_final($Siga_cast_destino_finalDto);
$Siga_cast_destino_finalController = new Siga_cast_destino_finalController();
$Siga_cast_destino_finalDto = $Siga_cast_destino_finalController->updateSiga_cast_destino_final($Siga_cast_destino_finalDto);
if($Siga_cast_destino_finalDto!=""){
$dtoToJson = new DtoToJson($Siga_cast_destino_finalDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cast_destino_final($Siga_cast_destino_finalDto){
//$Siga_cast_destino_finalDto=$this->validarSiga_cast_destino_final($Siga_cast_destino_finalDto);
$Siga_cast_destino_finalController = new Siga_cast_destino_finalController();
$Siga_cast_destino_finalDto = $Siga_cast_destino_finalController->deleteSiga_cast_destino_final($Siga_cast_destino_finalDto);
if($Siga_cast_destino_finalDto==true){
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



@$Id_Destino_final=$_POST["Id_Destino_final"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Destino_final=$_POST["Desc_Destino_final"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cast_destino_finalFacade = new Siga_cast_destino_finalFacade();
$siga_cast_destino_finalDto = new Siga_cast_destino_finalDTO();

$siga_cast_destino_finalDto->setId_Destino_final($Id_Destino_final);
$siga_cast_destino_finalDto->setId_Area($Id_Area);
$siga_cast_destino_finalDto->setDesc_Destino_final($Desc_Destino_final);
$siga_cast_destino_finalDto->setFech_Inser($Fech_Inser);
$siga_cast_destino_finalDto->setUsr_Inser($Usr_Inser);
$siga_cast_destino_finalDto->setFech_Mod($Fech_Mod);
$siga_cast_destino_finalDto->setUsr_Mod($Usr_Mod);
$siga_cast_destino_finalDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Destino_final=="") ){
$siga_cast_destino_finalDto=$siga_cast_destino_finalFacade->insertSiga_cast_destino_final($siga_cast_destino_finalDto);
echo $siga_cast_destino_finalDto;
} else if(($accion=="guardar") && ($Id_Destino_final!="")){
$siga_cast_destino_finalDto=$siga_cast_destino_finalFacade->updateSiga_cast_destino_final($siga_cast_destino_finalDto);
echo $siga_cast_destino_finalDto;
} else if($accion=="consultar"){
$siga_cast_destino_finalDto=$siga_cast_destino_finalFacade->selectSiga_cast_destino_final($siga_cast_destino_finalDto);
echo $siga_cast_destino_finalDto;
} else if( ($accion=="baja") && ($Id_Destino_final!="") ){
$siga_cast_destino_finalDto=$siga_cast_destino_finalFacade->deleteSiga_cast_destino_final($siga_cast_destino_finalDto);
echo $siga_cast_destino_finalDto;
} else if( ($accion=="seleccionar") && ($Id_Destino_final!="") ){
$siga_cast_destino_finalDto=$siga_cast_destino_finalFacade->selectSiga_cast_destino_final($siga_cast_destino_finalDto);
echo $siga_cast_destino_finalDto;
}


?>