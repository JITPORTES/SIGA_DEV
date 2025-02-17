<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_clasificacion/Siga_cat_clasificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_clasificacion/Siga_cat_clasificacionController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_clasificacionFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_clasificacion($Siga_cat_clasificacionDto){
$Siga_cat_clasificacionDto->setId_Clasificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_clasificacionDto->getId_Clasificacion(),"utf8"):strtoupper($Siga_cat_clasificacionDto->getId_Clasificacion()))))));
if($this->esFecha($Siga_cat_clasificacionDto->getId_Clasificacion())){
$Siga_cat_clasificacionDto->setId_Clasificacion($this->fechaMysql($Siga_cat_clasificacionDto->getId_Clasificacion()));
}
$Siga_cat_clasificacionDto->setId_Clase(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_clasificacionDto->getId_Clase(),"utf8"):strtoupper($Siga_cat_clasificacionDto->getId_Clase()))))));
if($this->esFecha($Siga_cat_clasificacionDto->getId_Clase())){
$Siga_cat_clasificacionDto->setId_Clase($this->fechaMysql($Siga_cat_clasificacionDto->getId_Clase()));
}
$Siga_cat_clasificacionDto->setDesc_Clasificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_clasificacionDto->getDesc_Clasificacion(),"utf8"):strtoupper($Siga_cat_clasificacionDto->getDesc_Clasificacion()))))));
if($this->esFecha($Siga_cat_clasificacionDto->getDesc_Clasificacion())){
$Siga_cat_clasificacionDto->setDesc_Clasificacion($this->fechaMysql($Siga_cat_clasificacionDto->getDesc_Clasificacion()));
}
$Siga_cat_clasificacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_clasificacionDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_clasificacionDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_clasificacionDto->getFech_Inser())){
$Siga_cat_clasificacionDto->setFech_Inser($this->fechaMysql($Siga_cat_clasificacionDto->getFech_Inser()));
}
$Siga_cat_clasificacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_clasificacionDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_clasificacionDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_clasificacionDto->getUsr_Inser())){
$Siga_cat_clasificacionDto->setUsr_Inser($this->fechaMysql($Siga_cat_clasificacionDto->getUsr_Inser()));
}
$Siga_cat_clasificacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_clasificacionDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_clasificacionDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_clasificacionDto->getFech_Mod())){
$Siga_cat_clasificacionDto->setFech_Mod($this->fechaMysql($Siga_cat_clasificacionDto->getFech_Mod()));
}
$Siga_cat_clasificacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_clasificacionDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_clasificacionDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_clasificacionDto->getUsr_Mod())){
$Siga_cat_clasificacionDto->setUsr_Mod($this->fechaMysql($Siga_cat_clasificacionDto->getUsr_Mod()));
}
$Siga_cat_clasificacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_clasificacionDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_clasificacionDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_clasificacionDto->getEstatus_Reg())){
$Siga_cat_clasificacionDto->setEstatus_Reg($this->fechaMysql($Siga_cat_clasificacionDto->getEstatus_Reg()));
}
return $Siga_cat_clasificacionDto;
}
public function selectSiga_cat_clasificacion($Siga_cat_clasificacionDto){
$Siga_cat_clasificacionDto=$this->validarSiga_cat_clasificacion($Siga_cat_clasificacionDto);
$Siga_cat_clasificacionController = new Siga_cat_clasificacionController();
$Siga_cat_clasificacionDto = $Siga_cat_clasificacionController->selectSiga_cat_clasificacion($Siga_cat_clasificacionDto);
if($Siga_cat_clasificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_clasificacionDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_clasificacion($Siga_cat_clasificacionDto){
//$Siga_cat_clasificacionDto=$this->validarSiga_cat_clasificacion($Siga_cat_clasificacionDto);
$Siga_cat_clasificacionController = new Siga_cat_clasificacionController();
$Siga_cat_clasificacionDto = $Siga_cat_clasificacionController->insertSiga_cat_clasificacion($Siga_cat_clasificacionDto);
if($Siga_cat_clasificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_clasificacionDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_clasificacion($Siga_cat_clasificacionDto){
//$Siga_cat_clasificacionDto=$this->validarSiga_cat_clasificacion($Siga_cat_clasificacionDto);
$Siga_cat_clasificacionController = new Siga_cat_clasificacionController();
$Siga_cat_clasificacionDto = $Siga_cat_clasificacionController->updateSiga_cat_clasificacion($Siga_cat_clasificacionDto);
if($Siga_cat_clasificacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_clasificacionDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_clasificacion($Siga_cat_clasificacionDto){
//$Siga_cat_clasificacionDto=$this->validarSiga_cat_clasificacion($Siga_cat_clasificacionDto);
$Siga_cat_clasificacionController = new Siga_cat_clasificacionController();
$Siga_cat_clasificacionDto = $Siga_cat_clasificacionController->deleteSiga_cat_clasificacion($Siga_cat_clasificacionDto);
if($Siga_cat_clasificacionDto==true){
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



@$Id_Clasificacion=$_POST["Id_Clasificacion"];
@$Id_Clase=$_POST["Id_Clase"];
@$Desc_Clasificacion=$_POST["Desc_Clasificacion"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_clasificacionFacade = new Siga_cat_clasificacionFacade();
$siga_cat_clasificacionDto = new Siga_cat_clasificacionDTO();

$siga_cat_clasificacionDto->setId_Clasificacion($Id_Clasificacion);
$siga_cat_clasificacionDto->setId_Clase($Id_Clase);
$siga_cat_clasificacionDto->setDesc_Clasificacion($Desc_Clasificacion);
$siga_cat_clasificacionDto->setFech_Inser($Fech_Inser);
$siga_cat_clasificacionDto->setUsr_Inser($Usr_Inser);
$siga_cat_clasificacionDto->setFech_Mod($Fech_Mod);
$siga_cat_clasificacionDto->setUsr_Mod($Usr_Mod);
$siga_cat_clasificacionDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Clasificacion=="") ){
$siga_cat_clasificacionDto=$siga_cat_clasificacionFacade->insertSiga_cat_clasificacion($siga_cat_clasificacionDto);
echo $siga_cat_clasificacionDto;
} else if(($accion=="guardar") && ($Id_Clasificacion!="")){
$siga_cat_clasificacionDto=$siga_cat_clasificacionFacade->updateSiga_cat_clasificacion($siga_cat_clasificacionDto);
echo $siga_cat_clasificacionDto;
} else if($accion=="consultar"){
$siga_cat_clasificacionDto=$siga_cat_clasificacionFacade->selectSiga_cat_clasificacion($siga_cat_clasificacionDto);
echo $siga_cat_clasificacionDto;
} else if( ($accion=="baja") && ($Id_Clasificacion!="") ){
$siga_cat_clasificacionDto=$siga_cat_clasificacionFacade->deleteSiga_cat_clasificacion($siga_cat_clasificacionDto);
echo $siga_cat_clasificacionDto;
} else if( ($accion=="seleccionar") && ($Id_Clasificacion!="") ){
$siga_cat_clasificacionDto=$siga_cat_clasificacionFacade->selectSiga_cat_clasificacion($siga_cat_clasificacionDto);
echo $siga_cat_clasificacionDto;
}


?>