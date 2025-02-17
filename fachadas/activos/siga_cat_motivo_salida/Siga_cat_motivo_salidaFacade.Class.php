<?php
session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_salida/Siga_cat_motivo_salidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_motivo_salida/Siga_cat_motivo_salidaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");

class Siga_cat_motivo_salidaFacade {
private $proveedor;
public function __construct() {
}
public function selectSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto){
//$Siga_cat_motivo_salidaDto=$this->validarSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto);
$Siga_cat_motivo_salidaController = new Siga_cat_motivo_salidaController();
$Siga_cat_motivo_salidaDto = $Siga_cat_motivo_salidaController->selectSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto);
if($Siga_cat_motivo_salidaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_salidaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto){
//$Siga_cat_motivo_salidaDto=$this->validarSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto);
$Siga_cat_motivo_salidaController = new Siga_cat_motivo_salidaController();
$Siga_cat_motivo_salidaDto = $Siga_cat_motivo_salidaController->insertSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto);
if($Siga_cat_motivo_salidaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_salidaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto){
//$Siga_cat_motivo_salidaDto=$this->validarSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto);
$Siga_cat_motivo_salidaController = new Siga_cat_motivo_salidaController();
$Siga_cat_motivo_salidaDto = $Siga_cat_motivo_salidaController->updateSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto);
if($Siga_cat_motivo_salidaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_salidaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto){
//$Siga_cat_motivo_salidaDto=$this->validarSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto);
$Siga_cat_motivo_salidaController = new Siga_cat_motivo_salidaController();
$Siga_cat_motivo_salidaDto = $Siga_cat_motivo_salidaController->deleteSiga_cat_motivo_salida($Siga_cat_motivo_salidaDto);
if($Siga_cat_motivo_salidaDto==true){
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



@$Id_Motivo_Salida=$_POST["Id_Motivo_Salida"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Motivo_Alta=$_POST["Desc_Motivo_Alta"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_motivo_salidaFacade = new Siga_cat_motivo_salidaFacade();
$siga_cat_motivo_salidaDto = new Siga_cat_motivo_salidaDTO();

$siga_cat_motivo_salidaDto->setId_Motivo_Salida($Id_Motivo_Salida);
$siga_cat_motivo_salidaDto->setId_Area($Id_Area);
$siga_cat_motivo_salidaDto->setDesc_Motivo_Alta($Desc_Motivo_Alta);
$siga_cat_motivo_salidaDto->setFech_Inser($Fech_Inser);
$siga_cat_motivo_salidaDto->setUsr_Inser($Usr_Inser);
$siga_cat_motivo_salidaDto->setFech_Mod($Fech_Mod);
$siga_cat_motivo_salidaDto->setUsr_Mod($Usr_Mod);
$siga_cat_motivo_salidaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Motivo_Salida=="") ){
$siga_cat_motivo_salidaDto=$siga_cat_motivo_salidaFacade->insertSiga_cat_motivo_salida($siga_cat_motivo_salidaDto);
echo $siga_cat_motivo_salidaDto;
} else if(($accion=="guardar") && ($Id_Motivo_Salida!="")){
$siga_cat_motivo_salidaDto=$siga_cat_motivo_salidaFacade->updateSiga_cat_motivo_salida($siga_cat_motivo_salidaDto);
echo $siga_cat_motivo_salidaDto;
} else if($accion=="consultar"){
$siga_cat_motivo_salidaDto=$siga_cat_motivo_salidaFacade->selectSiga_cat_motivo_salida($siga_cat_motivo_salidaDto);
echo $siga_cat_motivo_salidaDto;
} else if( ($accion=="baja") && ($Id_Motivo_Salida!="") ){
$siga_cat_motivo_salidaDto=$siga_cat_motivo_salidaFacade->deleteSiga_cat_motivo_salida($siga_cat_motivo_salidaDto);
echo $siga_cat_motivo_salidaDto;
} else if( ($accion=="seleccionar") && ($Id_Motivo_Salida!="") ){
$siga_cat_motivo_salidaDto=$siga_cat_motivo_salidaFacade->selectSiga_cat_motivo_salida($siga_cat_motivo_salidaDto);
echo $siga_cat_motivo_salidaDto;
}


?>