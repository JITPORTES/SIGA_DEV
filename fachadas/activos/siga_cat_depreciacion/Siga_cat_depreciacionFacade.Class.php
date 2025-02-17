<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_depreciacion/Siga_cat_depreciacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_depreciacion/Siga_cat_depreciacionController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_depreciacionFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_depreciacion($Siga_cat_depreciacionDto){
$Siga_cat_depreciacionDto->setId_Depreciacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_depreciacionDto->getId_Depreciacion(),"utf8"):strtoupper($Siga_cat_depreciacionDto->getId_Depreciacion()))))));
if($this->esFecha($Siga_cat_depreciacionDto->getId_Depreciacion())){
$Siga_cat_depreciacionDto->setId_Depreciacion($this->fechaMysql($Siga_cat_depreciacionDto->getId_Depreciacion()));
}
$Siga_cat_depreciacionDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_depreciacionDto->getId_Area(),"utf8"):strtoupper($Siga_cat_depreciacionDto->getId_Area()))))));
if($this->esFecha($Siga_cat_depreciacionDto->getId_Area())){
$Siga_cat_depreciacionDto->setId_Area($this->fechaMysql($Siga_cat_depreciacionDto->getId_Area()));
}
$Siga_cat_depreciacionDto->setDesc_Depreciacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_depreciacionDto->getDesc_Depreciacion(),"utf8"):strtoupper($Siga_cat_depreciacionDto->getDesc_Depreciacion()))))));
if($this->esFecha($Siga_cat_depreciacionDto->getDesc_Depreciacion())){
$Siga_cat_depreciacionDto->setDesc_Depreciacion($this->fechaMysql($Siga_cat_depreciacionDto->getDesc_Depreciacion()));
}
$Siga_cat_depreciacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_depreciacionDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_depreciacionDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_depreciacionDto->getFech_Inser())){
$Siga_cat_depreciacionDto->setFech_Inser($this->fechaMysql($Siga_cat_depreciacionDto->getFech_Inser()));
}
$Siga_cat_depreciacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_depreciacionDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_depreciacionDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_depreciacionDto->getUsr_Inser())){
$Siga_cat_depreciacionDto->setUsr_Inser($this->fechaMysql($Siga_cat_depreciacionDto->getUsr_Inser()));
}
$Siga_cat_depreciacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_depreciacionDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_depreciacionDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_depreciacionDto->getFech_Mod())){
$Siga_cat_depreciacionDto->setFech_Mod($this->fechaMysql($Siga_cat_depreciacionDto->getFech_Mod()));
}
$Siga_cat_depreciacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_depreciacionDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_depreciacionDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_depreciacionDto->getUsr_Mod())){
$Siga_cat_depreciacionDto->setUsr_Mod($this->fechaMysql($Siga_cat_depreciacionDto->getUsr_Mod()));
}
$Siga_cat_depreciacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_depreciacionDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_depreciacionDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_depreciacionDto->getEstatus_Reg())){
$Siga_cat_depreciacionDto->setEstatus_Reg($this->fechaMysql($Siga_cat_depreciacionDto->getEstatus_Reg()));
}
return $Siga_cat_depreciacionDto;
}
public function selectSiga_cat_depreciacion($Siga_cat_depreciacionDto){
$Siga_cat_depreciacionDto=$this->validarSiga_cat_depreciacion($Siga_cat_depreciacionDto);
$Siga_cat_depreciacionController = new Siga_cat_depreciacionController();
$Siga_cat_depreciacionDto = $Siga_cat_depreciacionController->selectSiga_cat_depreciacion($Siga_cat_depreciacionDto);
if($Siga_cat_depreciacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_depreciacionDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_depreciacion($Siga_cat_depreciacionDto){
//$Siga_cat_depreciacionDto=$this->validarSiga_cat_depreciacion($Siga_cat_depreciacionDto);
$Siga_cat_depreciacionController = new Siga_cat_depreciacionController();
$Siga_cat_depreciacionDto = $Siga_cat_depreciacionController->insertSiga_cat_depreciacion($Siga_cat_depreciacionDto);
if($Siga_cat_depreciacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_depreciacionDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_depreciacion($Siga_cat_depreciacionDto){
//$Siga_cat_depreciacionDto=$this->validarSiga_cat_depreciacion($Siga_cat_depreciacionDto);
$Siga_cat_depreciacionController = new Siga_cat_depreciacionController();
$Siga_cat_depreciacionDto = $Siga_cat_depreciacionController->updateSiga_cat_depreciacion($Siga_cat_depreciacionDto);
if($Siga_cat_depreciacionDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_depreciacionDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_depreciacion($Siga_cat_depreciacionDto){
//$Siga_cat_depreciacionDto=$this->validarSiga_cat_depreciacion($Siga_cat_depreciacionDto);
$Siga_cat_depreciacionController = new Siga_cat_depreciacionController();
$Siga_cat_depreciacionDto = $Siga_cat_depreciacionController->deleteSiga_cat_depreciacion($Siga_cat_depreciacionDto);
if($Siga_cat_depreciacionDto==true){
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



@$Id_Depreciacion=$_POST["Id_Depreciacion"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Depreciacion=$_POST["Desc_Depreciacion"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_depreciacionFacade = new Siga_cat_depreciacionFacade();
$siga_cat_depreciacionDto = new Siga_cat_depreciacionDTO();

$siga_cat_depreciacionDto->setId_Depreciacion($Id_Depreciacion);
$siga_cat_depreciacionDto->setId_Area($Id_Area);
$siga_cat_depreciacionDto->setDesc_Depreciacion($Desc_Depreciacion);
$siga_cat_depreciacionDto->setFech_Inser($Fech_Inser);
$siga_cat_depreciacionDto->setUsr_Inser($Usr_Inser);
$siga_cat_depreciacionDto->setFech_Mod($Fech_Mod);
$siga_cat_depreciacionDto->setUsr_Mod($Usr_Mod);
$siga_cat_depreciacionDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Depreciacion=="") ){
$siga_cat_depreciacionDto=$siga_cat_depreciacionFacade->insertSiga_cat_depreciacion($siga_cat_depreciacionDto);
echo $siga_cat_depreciacionDto;
} else if(($accion=="guardar") && ($Id_Depreciacion!="")){
$siga_cat_depreciacionDto=$siga_cat_depreciacionFacade->updateSiga_cat_depreciacion($siga_cat_depreciacionDto);
echo $siga_cat_depreciacionDto;
} else if($accion=="consultar"){
$siga_cat_depreciacionDto=$siga_cat_depreciacionFacade->selectSiga_cat_depreciacion($siga_cat_depreciacionDto);
echo $siga_cat_depreciacionDto;
} else if( ($accion=="baja") && ($Id_Depreciacion!="") ){
$siga_cat_depreciacionDto=$siga_cat_depreciacionFacade->deleteSiga_cat_depreciacion($siga_cat_depreciacionDto);
echo $siga_cat_depreciacionDto;
} else if( ($accion=="seleccionar") && ($Id_Depreciacion!="") ){
$siga_cat_depreciacionDto=$siga_cat_depreciacionFacade->selectSiga_cat_depreciacion($siga_cat_depreciacionDto);
echo $siga_cat_depreciacionDto;
}


?>