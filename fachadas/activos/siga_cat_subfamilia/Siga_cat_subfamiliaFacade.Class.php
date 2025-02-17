<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_subfamilia/Siga_cat_subfamiliaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_subfamilia/Siga_cat_subfamiliaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_subfamiliaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto){
$Siga_cat_subfamiliaDto->setId_Subfamilia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_subfamiliaDto->getId_Subfamilia(),"utf8"):strtoupper($Siga_cat_subfamiliaDto->getId_Subfamilia()))))));
if($this->esFecha($Siga_cat_subfamiliaDto->getId_Subfamilia())){
$Siga_cat_subfamiliaDto->setId_Subfamilia($this->fechaMysql($Siga_cat_subfamiliaDto->getId_Subfamilia()));
}
$Siga_cat_subfamiliaDto->setId_Familia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_subfamiliaDto->getId_Familia(),"utf8"):strtoupper($Siga_cat_subfamiliaDto->getId_Familia()))))));
if($this->esFecha($Siga_cat_subfamiliaDto->getId_Familia())){
$Siga_cat_subfamiliaDto->setId_Familia($this->fechaMysql($Siga_cat_subfamiliaDto->getId_Familia()));
}
$Siga_cat_subfamiliaDto->setDesc_Subfamilia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_subfamiliaDto->getDesc_Subfamilia(),"utf8"):strtoupper($Siga_cat_subfamiliaDto->getDesc_Subfamilia()))))));
if($this->esFecha($Siga_cat_subfamiliaDto->getDesc_Subfamilia())){
$Siga_cat_subfamiliaDto->setDesc_Subfamilia($this->fechaMysql($Siga_cat_subfamiliaDto->getDesc_Subfamilia()));
}
$Siga_cat_subfamiliaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_subfamiliaDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_subfamiliaDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_subfamiliaDto->getFech_Inser())){
$Siga_cat_subfamiliaDto->setFech_Inser($this->fechaMysql($Siga_cat_subfamiliaDto->getFech_Inser()));
}
$Siga_cat_subfamiliaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_subfamiliaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_subfamiliaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_subfamiliaDto->getUsr_Inser())){
$Siga_cat_subfamiliaDto->setUsr_Inser($this->fechaMysql($Siga_cat_subfamiliaDto->getUsr_Inser()));
}
$Siga_cat_subfamiliaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_subfamiliaDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_subfamiliaDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_subfamiliaDto->getFech_Mod())){
$Siga_cat_subfamiliaDto->setFech_Mod($this->fechaMysql($Siga_cat_subfamiliaDto->getFech_Mod()));
}
$Siga_cat_subfamiliaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_subfamiliaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_subfamiliaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_subfamiliaDto->getUsr_Mod())){
$Siga_cat_subfamiliaDto->setUsr_Mod($this->fechaMysql($Siga_cat_subfamiliaDto->getUsr_Mod()));
}
$Siga_cat_subfamiliaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_subfamiliaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_subfamiliaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_subfamiliaDto->getEstatus_Reg())){
$Siga_cat_subfamiliaDto->setEstatus_Reg($this->fechaMysql($Siga_cat_subfamiliaDto->getEstatus_Reg()));
}
return $Siga_cat_subfamiliaDto;
}
public function selectSiga_cat_subfamilia($Siga_cat_subfamiliaDto){
$Siga_cat_subfamiliaDto=$this->validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
$Siga_cat_subfamiliaController = new Siga_cat_subfamiliaController();
$Siga_cat_subfamiliaDto = $Siga_cat_subfamiliaController->selectSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
if($Siga_cat_subfamiliaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_subfamiliaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_subfamilia($Siga_cat_subfamiliaDto){
//$Siga_cat_subfamiliaDto=$this->validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
$Siga_cat_subfamiliaController = new Siga_cat_subfamiliaController();
$Siga_cat_subfamiliaDto = $Siga_cat_subfamiliaController->insertSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
if($Siga_cat_subfamiliaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_subfamiliaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_subfamilia($Siga_cat_subfamiliaDto){
//$Siga_cat_subfamiliaDto=$this->validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
$Siga_cat_subfamiliaController = new Siga_cat_subfamiliaController();
$Siga_cat_subfamiliaDto = $Siga_cat_subfamiliaController->updateSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
if($Siga_cat_subfamiliaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_subfamiliaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_subfamilia($Siga_cat_subfamiliaDto){
//$Siga_cat_subfamiliaDto=$this->validarSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
$Siga_cat_subfamiliaController = new Siga_cat_subfamiliaController();
$Siga_cat_subfamiliaDto = $Siga_cat_subfamiliaController->deleteSiga_cat_subfamilia($Siga_cat_subfamiliaDto);
if($Siga_cat_subfamiliaDto==true){
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



@$Id_Subfamilia=$_POST["Id_Subfamilia"];
@$Id_Familia=$_POST["Id_Familia"];
@$Desc_Subfamilia=$_POST["Desc_Subfamilia"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_subfamiliaFacade = new Siga_cat_subfamiliaFacade();
$siga_cat_subfamiliaDto = new Siga_cat_subfamiliaDTO();

$siga_cat_subfamiliaDto->setId_Subfamilia($Id_Subfamilia);
$siga_cat_subfamiliaDto->setId_Familia($Id_Familia);
$siga_cat_subfamiliaDto->setDesc_Subfamilia($Desc_Subfamilia);
$siga_cat_subfamiliaDto->setFech_Inser($Fech_Inser);
$siga_cat_subfamiliaDto->setUsr_Inser($Usr_Inser);
$siga_cat_subfamiliaDto->setFech_Mod($Fech_Mod);
$siga_cat_subfamiliaDto->setUsr_Mod($Usr_Mod);
$siga_cat_subfamiliaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Subfamilia=="") ){
$siga_cat_subfamiliaDto=$siga_cat_subfamiliaFacade->insertSiga_cat_subfamilia($siga_cat_subfamiliaDto);
echo $siga_cat_subfamiliaDto;
} else if(($accion=="guardar") && ($Id_Subfamilia!="")){
$siga_cat_subfamiliaDto=$siga_cat_subfamiliaFacade->updateSiga_cat_subfamilia($siga_cat_subfamiliaDto);
echo $siga_cat_subfamiliaDto;
} else if($accion=="consultar"){
$siga_cat_subfamiliaDto=$siga_cat_subfamiliaFacade->selectSiga_cat_subfamilia($siga_cat_subfamiliaDto);
echo $siga_cat_subfamiliaDto;
} else if( ($accion=="baja") && ($Id_Subfamilia!="") ){
$siga_cat_subfamiliaDto=$siga_cat_subfamiliaFacade->deleteSiga_cat_subfamilia($siga_cat_subfamiliaDto);
echo $siga_cat_subfamiliaDto;
} else if( ($accion=="seleccionar") && ($Id_Subfamilia!="") ){
$siga_cat_subfamiliaDto=$siga_cat_subfamiliaFacade->selectSiga_cat_subfamilia($siga_cat_subfamiliaDto);
echo $siga_cat_subfamiliaDto;
}


?>