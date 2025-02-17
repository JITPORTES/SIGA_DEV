<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_doc_recibida/Siga_cat_doc_recibidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_doc_recibida/Siga_cat_doc_recibidaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_doc_recibidaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto){
$Siga_cat_doc_recibidaDto->setId_Doc_Recibida(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_doc_recibidaDto->getId_Doc_Recibida(),"utf8"):strtoupper($Siga_cat_doc_recibidaDto->getId_Doc_Recibida()))))));
if($this->esFecha($Siga_cat_doc_recibidaDto->getId_Doc_Recibida())){
$Siga_cat_doc_recibidaDto->setId_Doc_Recibida($this->fechaMysql($Siga_cat_doc_recibidaDto->getId_Doc_Recibida()));
}
$Siga_cat_doc_recibidaDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_doc_recibidaDto->getId_Area(),"utf8"):strtoupper($Siga_cat_doc_recibidaDto->getId_Area()))))));
if($this->esFecha($Siga_cat_doc_recibidaDto->getId_Area())){
$Siga_cat_doc_recibidaDto->setId_Area($this->fechaMysql($Siga_cat_doc_recibidaDto->getId_Area()));
}
$Siga_cat_doc_recibidaDto->setDesc_Doc_Recibida(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_doc_recibidaDto->getDesc_Doc_Recibida(),"utf8"):strtoupper($Siga_cat_doc_recibidaDto->getDesc_Doc_Recibida()))))));
if($this->esFecha($Siga_cat_doc_recibidaDto->getDesc_Doc_Recibida())){
$Siga_cat_doc_recibidaDto->setDesc_Doc_Recibida($this->fechaMysql($Siga_cat_doc_recibidaDto->getDesc_Doc_Recibida()));
}
$Siga_cat_doc_recibidaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_doc_recibidaDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_doc_recibidaDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_doc_recibidaDto->getFech_Inser())){
$Siga_cat_doc_recibidaDto->setFech_Inser($this->fechaMysql($Siga_cat_doc_recibidaDto->getFech_Inser()));
}
$Siga_cat_doc_recibidaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_doc_recibidaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_doc_recibidaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_doc_recibidaDto->getUsr_Inser())){
$Siga_cat_doc_recibidaDto->setUsr_Inser($this->fechaMysql($Siga_cat_doc_recibidaDto->getUsr_Inser()));
}
$Siga_cat_doc_recibidaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_doc_recibidaDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_doc_recibidaDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_doc_recibidaDto->getFech_Mod())){
$Siga_cat_doc_recibidaDto->setFech_Mod($this->fechaMysql($Siga_cat_doc_recibidaDto->getFech_Mod()));
}
$Siga_cat_doc_recibidaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_doc_recibidaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_doc_recibidaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_doc_recibidaDto->getUsr_Mod())){
$Siga_cat_doc_recibidaDto->setUsr_Mod($this->fechaMysql($Siga_cat_doc_recibidaDto->getUsr_Mod()));
}
$Siga_cat_doc_recibidaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_doc_recibidaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_doc_recibidaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_doc_recibidaDto->getEstatus_Reg())){
$Siga_cat_doc_recibidaDto->setEstatus_Reg($this->fechaMysql($Siga_cat_doc_recibidaDto->getEstatus_Reg()));
}
return $Siga_cat_doc_recibidaDto;
}
public function selectSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto){
$Siga_cat_doc_recibidaDto=$this->validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
$Siga_cat_doc_recibidaController = new Siga_cat_doc_recibidaController();
$Siga_cat_doc_recibidaDto = $Siga_cat_doc_recibidaController->selectSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
if($Siga_cat_doc_recibidaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_doc_recibidaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto){
//$Siga_cat_doc_recibidaDto=$this->validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
$Siga_cat_doc_recibidaController = new Siga_cat_doc_recibidaController();
$Siga_cat_doc_recibidaDto = $Siga_cat_doc_recibidaController->insertSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
if($Siga_cat_doc_recibidaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_doc_recibidaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto){
//$Siga_cat_doc_recibidaDto=$this->validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
$Siga_cat_doc_recibidaController = new Siga_cat_doc_recibidaController();
$Siga_cat_doc_recibidaDto = $Siga_cat_doc_recibidaController->updateSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
if($Siga_cat_doc_recibidaDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_doc_recibidaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto){
//$Siga_cat_doc_recibidaDto=$this->validarSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
$Siga_cat_doc_recibidaController = new Siga_cat_doc_recibidaController();
$Siga_cat_doc_recibidaDto = $Siga_cat_doc_recibidaController->deleteSiga_cat_doc_recibida($Siga_cat_doc_recibidaDto);
if($Siga_cat_doc_recibidaDto==true){
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



@$Id_Doc_Recibida=$_POST["Id_Doc_Recibida"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Doc_Recibida=$_POST["Desc_Doc_Recibida"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_doc_recibidaFacade = new Siga_cat_doc_recibidaFacade();
$siga_cat_doc_recibidaDto = new Siga_cat_doc_recibidaDTO();

$siga_cat_doc_recibidaDto->setId_Doc_Recibida($Id_Doc_Recibida);
$siga_cat_doc_recibidaDto->setId_Area($Id_Area);
$siga_cat_doc_recibidaDto->setDesc_Doc_Recibida($Desc_Doc_Recibida);
$siga_cat_doc_recibidaDto->setFech_Inser($Fech_Inser);
$siga_cat_doc_recibidaDto->setUsr_Inser($Usr_Inser);
$siga_cat_doc_recibidaDto->setFech_Mod($Fech_Mod);
$siga_cat_doc_recibidaDto->setUsr_Mod($Usr_Mod);
$siga_cat_doc_recibidaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Doc_Recibida=="") ){
$siga_cat_doc_recibidaDto=$siga_cat_doc_recibidaFacade->insertSiga_cat_doc_recibida($siga_cat_doc_recibidaDto);
echo $siga_cat_doc_recibidaDto;
} else if(($accion=="guardar") && ($Id_Doc_Recibida!="")){
$siga_cat_doc_recibidaDto=$siga_cat_doc_recibidaFacade->updateSiga_cat_doc_recibida($siga_cat_doc_recibidaDto);
echo $siga_cat_doc_recibidaDto;
} else if($accion=="consultar"){
$siga_cat_doc_recibidaDto=$siga_cat_doc_recibidaFacade->selectSiga_cat_doc_recibida($siga_cat_doc_recibidaDto);
echo $siga_cat_doc_recibidaDto;
} else if( ($accion=="baja") && ($Id_Doc_Recibida!="") ){
$siga_cat_doc_recibidaDto=$siga_cat_doc_recibidaFacade->deleteSiga_cat_doc_recibida($siga_cat_doc_recibidaDto);
echo $siga_cat_doc_recibidaDto;
} else if( ($accion=="seleccionar") && ($Id_Doc_Recibida!="") ){
$siga_cat_doc_recibidaDto=$siga_cat_doc_recibidaFacade->selectSiga_cat_doc_recibida($siga_cat_doc_recibidaDto);
echo $siga_cat_doc_recibidaDto;
}


?>