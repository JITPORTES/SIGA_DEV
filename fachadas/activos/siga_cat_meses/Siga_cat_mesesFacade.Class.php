<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_meses/Siga_cat_mesesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_meses/Siga_cat_mesesController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_mesesFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_meses($Siga_cat_mesesDto){
$Siga_cat_mesesDto->setId_Meses(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mesesDto->getId_Meses(),"utf8"):strtoupper($Siga_cat_mesesDto->getId_Meses()))))));
if($this->esFecha($Siga_cat_mesesDto->getId_Meses())){
$Siga_cat_mesesDto->setId_Meses($this->fechaMysql($Siga_cat_mesesDto->getId_Meses()));
}
$Siga_cat_mesesDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mesesDto->getId_Area(),"utf8"):strtoupper($Siga_cat_mesesDto->getId_Area()))))));
if($this->esFecha($Siga_cat_mesesDto->getId_Area())){
$Siga_cat_mesesDto->setId_Area($this->fechaMysql($Siga_cat_mesesDto->getId_Area()));
}
$Siga_cat_mesesDto->setDesc_Meses(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mesesDto->getDesc_Meses(),"utf8"):strtoupper($Siga_cat_mesesDto->getDesc_Meses()))))));
if($this->esFecha($Siga_cat_mesesDto->getDesc_Meses())){
$Siga_cat_mesesDto->setDesc_Meses($this->fechaMysql($Siga_cat_mesesDto->getDesc_Meses()));
}
$Siga_cat_mesesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mesesDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_mesesDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_mesesDto->getFech_Inser())){
$Siga_cat_mesesDto->setFech_Inser($this->fechaMysql($Siga_cat_mesesDto->getFech_Inser()));
}
$Siga_cat_mesesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mesesDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_mesesDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_mesesDto->getUsr_Inser())){
$Siga_cat_mesesDto->setUsr_Inser($this->fechaMysql($Siga_cat_mesesDto->getUsr_Inser()));
}
$Siga_cat_mesesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mesesDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_mesesDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_mesesDto->getFech_Mod())){
$Siga_cat_mesesDto->setFech_Mod($this->fechaMysql($Siga_cat_mesesDto->getFech_Mod()));
}
$Siga_cat_mesesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mesesDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_mesesDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_mesesDto->getUsr_Mod())){
$Siga_cat_mesesDto->setUsr_Mod($this->fechaMysql($Siga_cat_mesesDto->getUsr_Mod()));
}
$Siga_cat_mesesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_mesesDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_mesesDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_mesesDto->getEstatus_Reg())){
$Siga_cat_mesesDto->setEstatus_Reg($this->fechaMysql($Siga_cat_mesesDto->getEstatus_Reg()));
}
return $Siga_cat_mesesDto;
}
public function selectSiga_cat_meses($Siga_cat_mesesDto){
$Siga_cat_mesesDto=$this->validarSiga_cat_meses($Siga_cat_mesesDto);
$Siga_cat_mesesController = new Siga_cat_mesesController();
$Siga_cat_mesesDto = $Siga_cat_mesesController->selectSiga_cat_meses($Siga_cat_mesesDto);
if($Siga_cat_mesesDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_mesesDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_meses($Siga_cat_mesesDto){
//$Siga_cat_mesesDto=$this->validarSiga_cat_meses($Siga_cat_mesesDto);
$Siga_cat_mesesController = new Siga_cat_mesesController();
$Siga_cat_mesesDto = $Siga_cat_mesesController->insertSiga_cat_meses($Siga_cat_mesesDto);
if($Siga_cat_mesesDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_mesesDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_meses($Siga_cat_mesesDto){
//$Siga_cat_mesesDto=$this->validarSiga_cat_meses($Siga_cat_mesesDto);
$Siga_cat_mesesController = new Siga_cat_mesesController();
$Siga_cat_mesesDto = $Siga_cat_mesesController->updateSiga_cat_meses($Siga_cat_mesesDto);
if($Siga_cat_mesesDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_mesesDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_meses($Siga_cat_mesesDto){
//$Siga_cat_mesesDto=$this->validarSiga_cat_meses($Siga_cat_mesesDto);
$Siga_cat_mesesController = new Siga_cat_mesesController();
$Siga_cat_mesesDto = $Siga_cat_mesesController->deleteSiga_cat_meses($Siga_cat_mesesDto);
if($Siga_cat_mesesDto==true){
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



@$Id_Meses=$_POST["Id_Meses"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Meses=$_POST["Desc_Meses"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_mesesFacade = new Siga_cat_mesesFacade();
$siga_cat_mesesDto = new Siga_cat_mesesDTO();

$siga_cat_mesesDto->setId_Meses($Id_Meses);
$siga_cat_mesesDto->setId_Area($Id_Area);
$siga_cat_mesesDto->setDesc_Meses($Desc_Meses);
$siga_cat_mesesDto->setFech_Inser($Fech_Inser);
$siga_cat_mesesDto->setUsr_Inser($Usr_Inser);
$siga_cat_mesesDto->setFech_Mod($Fech_Mod);
$siga_cat_mesesDto->setUsr_Mod($Usr_Mod);
$siga_cat_mesesDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Meses=="") ){
$siga_cat_mesesDto=$siga_cat_mesesFacade->insertSiga_cat_meses($siga_cat_mesesDto);
echo $siga_cat_mesesDto;
} else if(($accion=="guardar") && ($Id_Meses!="")){
$siga_cat_mesesDto=$siga_cat_mesesFacade->updateSiga_cat_meses($siga_cat_mesesDto);
echo $siga_cat_mesesDto;
} else if($accion=="consultar"){
$siga_cat_mesesDto=$siga_cat_mesesFacade->selectSiga_cat_meses($siga_cat_mesesDto);
echo $siga_cat_mesesDto;
} else if( ($accion=="baja") && ($Id_Meses!="") ){
$siga_cat_mesesDto=$siga_cat_mesesFacade->deleteSiga_cat_meses($siga_cat_mesesDto);
echo $siga_cat_mesesDto;
} else if( ($accion=="seleccionar") && ($Id_Meses!="") ){
$siga_cat_mesesDto=$siga_cat_mesesFacade->selectSiga_cat_meses($siga_cat_mesesDto);
echo $siga_cat_mesesDto;
}


?>