<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_usuario_resp/Siga_cat_usuario_respDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_usuario_resp/Siga_cat_usuario_respController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_usuario_respFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto){
$Siga_cat_usuario_respDto->setId_Usuario_Resp(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_usuario_respDto->getId_Usuario_Resp(),"utf8"):strtoupper($Siga_cat_usuario_respDto->getId_Usuario_Resp()))))));
if($this->esFecha($Siga_cat_usuario_respDto->getId_Usuario_Resp())){
$Siga_cat_usuario_respDto->setId_Usuario_Resp($this->fechaMysql($Siga_cat_usuario_respDto->getId_Usuario_Resp()));
}
$Siga_cat_usuario_respDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_usuario_respDto->getId_Area(),"utf8"):strtoupper($Siga_cat_usuario_respDto->getId_Area()))))));
if($this->esFecha($Siga_cat_usuario_respDto->getId_Area())){
$Siga_cat_usuario_respDto->setId_Area($this->fechaMysql($Siga_cat_usuario_respDto->getId_Area()));
}
$Siga_cat_usuario_respDto->setDesc_Usuario_Resp(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_usuario_respDto->getDesc_Usuario_Resp(),"utf8"):strtoupper($Siga_cat_usuario_respDto->getDesc_Usuario_Resp()))))));
if($this->esFecha($Siga_cat_usuario_respDto->getDesc_Usuario_Resp())){
$Siga_cat_usuario_respDto->setDesc_Usuario_Resp($this->fechaMysql($Siga_cat_usuario_respDto->getDesc_Usuario_Resp()));
}
$Siga_cat_usuario_respDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_usuario_respDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_usuario_respDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_usuario_respDto->getFech_Inser())){
$Siga_cat_usuario_respDto->setFech_Inser($this->fechaMysql($Siga_cat_usuario_respDto->getFech_Inser()));
}
$Siga_cat_usuario_respDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_usuario_respDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_usuario_respDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_usuario_respDto->getUsr_Inser())){
$Siga_cat_usuario_respDto->setUsr_Inser($this->fechaMysql($Siga_cat_usuario_respDto->getUsr_Inser()));
}
$Siga_cat_usuario_respDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_usuario_respDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_usuario_respDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_usuario_respDto->getFech_Mod())){
$Siga_cat_usuario_respDto->setFech_Mod($this->fechaMysql($Siga_cat_usuario_respDto->getFech_Mod()));
}
$Siga_cat_usuario_respDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_usuario_respDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_usuario_respDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_usuario_respDto->getUsr_Mod())){
$Siga_cat_usuario_respDto->setUsr_Mod($this->fechaMysql($Siga_cat_usuario_respDto->getUsr_Mod()));
}
$Siga_cat_usuario_respDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_usuario_respDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_usuario_respDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_usuario_respDto->getEstatus_Reg())){
$Siga_cat_usuario_respDto->setEstatus_Reg($this->fechaMysql($Siga_cat_usuario_respDto->getEstatus_Reg()));
}
return $Siga_cat_usuario_respDto;
}
public function selectSiga_cat_usuario_resp($Siga_cat_usuario_respDto){
$Siga_cat_usuario_respDto=$this->validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
$Siga_cat_usuario_respController = new Siga_cat_usuario_respController();
$Siga_cat_usuario_respDto = $Siga_cat_usuario_respController->selectSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
if($Siga_cat_usuario_respDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_usuario_respDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_usuario_resp($Siga_cat_usuario_respDto){
//$Siga_cat_usuario_respDto=$this->validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
$Siga_cat_usuario_respController = new Siga_cat_usuario_respController();
$Siga_cat_usuario_respDto = $Siga_cat_usuario_respController->insertSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
if($Siga_cat_usuario_respDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_usuario_respDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_usuario_resp($Siga_cat_usuario_respDto){
//$Siga_cat_usuario_respDto=$this->validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
$Siga_cat_usuario_respController = new Siga_cat_usuario_respController();
$Siga_cat_usuario_respDto = $Siga_cat_usuario_respController->updateSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
if($Siga_cat_usuario_respDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_usuario_respDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_usuario_resp($Siga_cat_usuario_respDto){
//$Siga_cat_usuario_respDto=$this->validarSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
$Siga_cat_usuario_respController = new Siga_cat_usuario_respController();
$Siga_cat_usuario_respDto = $Siga_cat_usuario_respController->deleteSiga_cat_usuario_resp($Siga_cat_usuario_respDto);
if($Siga_cat_usuario_respDto==true){
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



@$Id_Usuario_Resp=$_POST["Id_Usuario_Resp"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Usuario_Resp=$_POST["Desc_Usuario_Resp"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_cat_usuario_respFacade = new Siga_cat_usuario_respFacade();
$siga_cat_usuario_respDto = new Siga_cat_usuario_respDTO();

$siga_cat_usuario_respDto->setId_Usuario_Resp($Id_Usuario_Resp);
$siga_cat_usuario_respDto->setId_Area($Id_Area);
$siga_cat_usuario_respDto->setDesc_Usuario_Resp($Desc_Usuario_Resp);
$siga_cat_usuario_respDto->setFech_Inser($Fech_Inser);
$siga_cat_usuario_respDto->setUsr_Inser($Usr_Inser);
$siga_cat_usuario_respDto->setFech_Mod($Fech_Mod);
$siga_cat_usuario_respDto->setUsr_Mod($Usr_Mod);
$siga_cat_usuario_respDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Usuario_Resp=="") ){
$siga_cat_usuario_respDto=$siga_cat_usuario_respFacade->insertSiga_cat_usuario_resp($siga_cat_usuario_respDto);
echo $siga_cat_usuario_respDto;
} else if(($accion=="guardar") && ($Id_Usuario_Resp!="")){
$siga_cat_usuario_respDto=$siga_cat_usuario_respFacade->updateSiga_cat_usuario_resp($siga_cat_usuario_respDto);
echo $siga_cat_usuario_respDto;
} else if($accion=="consultar"){
$siga_cat_usuario_respDto=$siga_cat_usuario_respFacade->selectSiga_cat_usuario_resp($siga_cat_usuario_respDto);
echo $siga_cat_usuario_respDto;
} else if( ($accion=="baja") && ($Id_Usuario_Resp!="") ){
$siga_cat_usuario_respDto=$siga_cat_usuario_respFacade->deleteSiga_cat_usuario_resp($siga_cat_usuario_respDto);
echo $siga_cat_usuario_respDto;
} else if( ($accion=="seleccionar") && ($Id_Usuario_Resp!="") ){
$siga_cat_usuario_respDto=$siga_cat_usuario_respFacade->selectSiga_cat_usuario_resp($siga_cat_usuario_respDto);
echo $siga_cat_usuario_respDto;
}


?>