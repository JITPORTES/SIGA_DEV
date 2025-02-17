<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_motivo_aparente/Siga_cat_motivo_aparenteDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_motivo_aparente/Siga_cat_motivo_aparenteController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_motivo_aparenteFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto){
$Siga_cat_motivo_aparenteDto->setId_Motivo_Aparente(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_aparenteDto->getId_Motivo_Aparente(),"utf8"):strtoupper($Siga_cat_motivo_aparenteDto->getId_Motivo_Aparente()))))));
if($this->esFecha($Siga_cat_motivo_aparenteDto->getId_Motivo_Aparente())){
$Siga_cat_motivo_aparenteDto->setId_Motivo_Aparente($this->fechaMysql($Siga_cat_motivo_aparenteDto->getId_Motivo_Aparente()));
}
$Siga_cat_motivo_aparenteDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_aparenteDto->getId_Area(),"utf8"):strtoupper($Siga_cat_motivo_aparenteDto->getId_Area()))))));
if($this->esFecha($Siga_cat_motivo_aparenteDto->getId_Area())){
$Siga_cat_motivo_aparenteDto->setId_Area($this->fechaMysql($Siga_cat_motivo_aparenteDto->getId_Area()));
}
$Siga_cat_motivo_aparenteDto->setDesc_Motivo_Aparente(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_aparenteDto->getDesc_Motivo_Aparente(),"utf8"):strtoupper($Siga_cat_motivo_aparenteDto->getDesc_Motivo_Aparente()))))));
if($this->esFecha($Siga_cat_motivo_aparenteDto->getDesc_Motivo_Aparente())){
$Siga_cat_motivo_aparenteDto->setDesc_Motivo_Aparente($this->fechaMysql($Siga_cat_motivo_aparenteDto->getDesc_Motivo_Aparente()));
}
$Siga_cat_motivo_aparenteDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_aparenteDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_motivo_aparenteDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_motivo_aparenteDto->getFech_Inser())){
$Siga_cat_motivo_aparenteDto->setFech_Inser($this->fechaMysql($Siga_cat_motivo_aparenteDto->getFech_Inser()));
}
$Siga_cat_motivo_aparenteDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_aparenteDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_motivo_aparenteDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_motivo_aparenteDto->getUsr_Inser())){
$Siga_cat_motivo_aparenteDto->setUsr_Inser($this->fechaMysql($Siga_cat_motivo_aparenteDto->getUsr_Inser()));
}
$Siga_cat_motivo_aparenteDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_aparenteDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_motivo_aparenteDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_motivo_aparenteDto->getFech_Mod())){
$Siga_cat_motivo_aparenteDto->setFech_Mod($this->fechaMysql($Siga_cat_motivo_aparenteDto->getFech_Mod()));
}
$Siga_cat_motivo_aparenteDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_aparenteDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_motivo_aparenteDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_motivo_aparenteDto->getUsr_Mod())){
$Siga_cat_motivo_aparenteDto->setUsr_Mod($this->fechaMysql($Siga_cat_motivo_aparenteDto->getUsr_Mod()));
}
$Siga_cat_motivo_aparenteDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_motivo_aparenteDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_motivo_aparenteDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_motivo_aparenteDto->getEstatus_Reg())){
$Siga_cat_motivo_aparenteDto->setEstatus_Reg($this->fechaMysql($Siga_cat_motivo_aparenteDto->getEstatus_Reg()));
}
return $Siga_cat_motivo_aparenteDto;
}
public function selectSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto){
$Siga_cat_motivo_aparenteDto=$this->validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
$Siga_cat_motivo_aparenteController = new Siga_cat_motivo_aparenteController();
$Siga_cat_motivo_aparenteDto = $Siga_cat_motivo_aparenteController->selectSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
if($Siga_cat_motivo_aparenteDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_aparenteDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto){
//$Siga_cat_motivo_aparenteDto=$this->validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
$Siga_cat_motivo_aparenteController = new Siga_cat_motivo_aparenteController();
$Siga_cat_motivo_aparenteDto = $Siga_cat_motivo_aparenteController->insertSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
if($Siga_cat_motivo_aparenteDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_aparenteDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto){
//$Siga_cat_motivo_aparenteDto=$this->validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
$Siga_cat_motivo_aparenteController = new Siga_cat_motivo_aparenteController();
$Siga_cat_motivo_aparenteDto = $Siga_cat_motivo_aparenteController->updateSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
if($Siga_cat_motivo_aparenteDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_motivo_aparenteDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto){
//$Siga_cat_motivo_aparenteDto=$this->validarSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
$Siga_cat_motivo_aparenteController = new Siga_cat_motivo_aparenteController();
$Siga_cat_motivo_aparenteDto = $Siga_cat_motivo_aparenteController->deleteSiga_cat_motivo_aparente($Siga_cat_motivo_aparenteDto);
if($Siga_cat_motivo_aparenteDto==true){
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



@$Id_Motivo_Aparente=$_POST["Id_Motivo_Aparente"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Motivo_Aparente=$_POST["Desc_Motivo_Aparente"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_motivo_aparenteFacade = new Siga_cat_motivo_aparenteFacade();
$siga_cat_motivo_aparenteDto = new Siga_cat_motivo_aparenteDTO();

$siga_cat_motivo_aparenteDto->setId_Motivo_Aparente($Id_Motivo_Aparente);
$siga_cat_motivo_aparenteDto->setId_Area($Id_Area);
$siga_cat_motivo_aparenteDto->setDesc_Motivo_Aparente($Desc_Motivo_Aparente);
$siga_cat_motivo_aparenteDto->setFech_Inser($Fech_Inser);
$siga_cat_motivo_aparenteDto->setUsr_Inser($Usr_Inser);
$siga_cat_motivo_aparenteDto->setFech_Mod($Fech_Mod);
$siga_cat_motivo_aparenteDto->setUsr_Mod($Usr_Mod);
$siga_cat_motivo_aparenteDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Motivo_Aparente=="") ){
$siga_cat_motivo_aparenteDto=$siga_cat_motivo_aparenteFacade->insertSiga_cat_motivo_aparente($siga_cat_motivo_aparenteDto);
echo $siga_cat_motivo_aparenteDto;
} else if(($accion=="guardar") && ($Id_Motivo_Aparente!="")){
$siga_cat_motivo_aparenteDto=$siga_cat_motivo_aparenteFacade->updateSiga_cat_motivo_aparente($siga_cat_motivo_aparenteDto);
echo $siga_cat_motivo_aparenteDto;
} else if($accion=="consultar"){
$siga_cat_motivo_aparenteDto=$siga_cat_motivo_aparenteFacade->selectSiga_cat_motivo_aparente($siga_cat_motivo_aparenteDto);
echo $siga_cat_motivo_aparenteDto;
} else if( ($accion=="baja") && ($Id_Motivo_Aparente!="") ){
$siga_cat_motivo_aparenteDto=$siga_cat_motivo_aparenteFacade->deleteSiga_cat_motivo_aparente($siga_cat_motivo_aparenteDto);
echo $siga_cat_motivo_aparenteDto;
} else if( ($accion=="seleccionar") && ($Id_Motivo_Aparente!="") ){
$siga_cat_motivo_aparenteDto=$siga_cat_motivo_aparenteFacade->selectSiga_cat_motivo_aparente($siga_cat_motivo_aparenteDto);
echo $siga_cat_motivo_aparenteDto;
}


?>