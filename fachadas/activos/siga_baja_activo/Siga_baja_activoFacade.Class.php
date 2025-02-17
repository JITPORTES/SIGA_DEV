<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_baja_activo/Siga_baja_activoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_baja_activo/Siga_baja_activoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_baja_activoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_baja_activo($Siga_baja_activoDto){
$Siga_baja_activoDto->setId_baja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getId_baja(),"utf8"):strtoupper($Siga_baja_activoDto->getId_baja()))))));
if($this->esFecha($Siga_baja_activoDto->getId_baja())){
$Siga_baja_activoDto->setId_baja($this->fechaMysql($Siga_baja_activoDto->getId_baja()));
}
$Siga_baja_activoDto->setId_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getId_Activo(),"utf8"):strtoupper($Siga_baja_activoDto->getId_Activo()))))));
if($this->esFecha($Siga_baja_activoDto->getId_Activo())){
$Siga_baja_activoDto->setId_Activo($this->fechaMysql($Siga_baja_activoDto->getId_Activo()));
}
$Siga_baja_activoDto->setMotivo_Baja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getMotivo_Baja(),"utf8"):strtoupper($Siga_baja_activoDto->getMotivo_Baja()))))));
if($this->esFecha($Siga_baja_activoDto->getMotivo_Baja())){
$Siga_baja_activoDto->setMotivo_Baja($this->fechaMysql($Siga_baja_activoDto->getMotivo_Baja()));
}
$Siga_baja_activoDto->setComentarios(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getComentarios(),"utf8"):strtoupper($Siga_baja_activoDto->getComentarios()))))));
if($this->esFecha($Siga_baja_activoDto->getComentarios())){
$Siga_baja_activoDto->setComentarios($this->fechaMysql($Siga_baja_activoDto->getComentarios()));
}
$Siga_baja_activoDto->setDestino(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getDestino(),"utf8"):strtoupper($Siga_baja_activoDto->getDestino()))))));
if($this->esFecha($Siga_baja_activoDto->getDestino())){
$Siga_baja_activoDto->setDestino($this->fechaMysql($Siga_baja_activoDto->getDestino()));
}
$Siga_baja_activoDto->setFecha_Baja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getFecha_Baja(),"utf8"):strtoupper($Siga_baja_activoDto->getFecha_Baja()))))));
if($this->esFecha($Siga_baja_activoDto->getFecha_Baja())){
$Siga_baja_activoDto->setFecha_Baja($this->fechaMysql($Siga_baja_activoDto->getFecha_Baja()));
}
$Siga_baja_activoDto->setUsuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getUsuario(),"utf8"):strtoupper($Siga_baja_activoDto->getUsuario()))))));
if($this->esFecha($Siga_baja_activoDto->getUsuario())){
$Siga_baja_activoDto->setUsuario($this->fechaMysql($Siga_baja_activoDto->getUsuario()));
}

$Siga_baja_activoDto->setSeg_Sol_Baja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getSeg_Sol_Baja(),"utf8"):strtoupper($Siga_baja_activoDto->getSeg_Sol_Baja()))))));
if($this->esFecha($Siga_baja_activoDto->getSeg_Sol_Baja())){
$Siga_baja_activoDto->setSeg_Sol_Baja($this->fechaMysql($Siga_baja_activoDto->getSeg_Sol_Baja()));
}

$Siga_baja_activoDto->setSeg_Resp_Area_Ges(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getSeg_Resp_Area_Ges(),"utf8"):strtoupper($Siga_baja_activoDto->getSeg_Resp_Area_Ges()))))));
if($this->esFecha($Siga_baja_activoDto->getSeg_Resp_Area_Ges())){
$Siga_baja_activoDto->setSeg_Resp_Area_Ges($this->fechaMysql($Siga_baja_activoDto->getSeg_Resp_Area_Ges()));
}
$Siga_baja_activoDto->setSeg_Dir_Adminis(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getSeg_Dir_Adminis(),"utf8"):strtoupper($Siga_baja_activoDto->getSeg_Dir_Adminis()))))));
if($this->esFecha($Siga_baja_activoDto->getSeg_Dir_Adminis())){
$Siga_baja_activoDto->setSeg_Dir_Adminis($this->fechaMysql($Siga_baja_activoDto->getSeg_Dir_Adminis()));
}
$Siga_baja_activoDto->setCuenta_baja(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getCuenta_baja(),"utf8"):strtoupper($Siga_baja_activoDto->getCuenta_baja()))))));
if($this->esFecha($Siga_baja_activoDto->getCuenta_baja())){
$Siga_baja_activoDto->setCuenta_baja($this->fechaMysql($Siga_baja_activoDto->getCuenta_baja()));
}
$Siga_baja_activoDto->setJefe_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getJefe_Area(),"utf8"):strtoupper($Siga_baja_activoDto->getJefe_Area()))))));
if($this->esFecha($Siga_baja_activoDto->getJefe_Area())){
$Siga_baja_activoDto->setJefe_Area($this->fechaMysql($Siga_baja_activoDto->getJefe_Area()));
}
$Siga_baja_activoDto->setSeg_Usuario_Resp(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_baja_activoDto->getSeg_Usuario_Resp(),"utf8"):strtoupper($Siga_baja_activoDto->getSeg_Usuario_Resp()))))));
if($this->esFecha($Siga_baja_activoDto->getSeg_Usuario_Resp())){
$Siga_baja_activoDto->setSeg_Usuario_Resp($this->fechaMysql($Siga_baja_activoDto->getSeg_Usuario_Resp()));
}
return $Siga_baja_activoDto;
}
public function selectSiga_baja_activo($Siga_baja_activoDto){
$Siga_baja_activoDto=$this->validarSiga_baja_activo($Siga_baja_activoDto);
$Siga_baja_activoController = new Siga_baja_activoController();
$Siga_baja_activoDto = $Siga_baja_activoController->selectSiga_baja_activo($Siga_baja_activoDto);
if($Siga_baja_activoDto!=""){
$dtoToJson = new DtoToJson($Siga_baja_activoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_baja_activo($Siga_baja_activoDto){
//$Siga_baja_activoDto=$this->validarSiga_baja_activo($Siga_baja_activoDto);
$Siga_baja_activoController = new Siga_baja_activoController();
$Siga_baja_activoDto = $Siga_baja_activoController->insertSiga_baja_activo($Siga_baja_activoDto);
if($Siga_baja_activoDto!=""){
$dtoToJson = new DtoToJson($Siga_baja_activoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_baja_activo($Siga_baja_activoDto){
//$Siga_baja_activoDto=$this->validarSiga_baja_activo($Siga_baja_activoDto);
$Siga_baja_activoController = new Siga_baja_activoController();
$Siga_baja_activoDto = $Siga_baja_activoController->updateSiga_baja_activo($Siga_baja_activoDto);
if($Siga_baja_activoDto!=""){
$dtoToJson = new DtoToJson($Siga_baja_activoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_baja_activo($Siga_baja_activoDto){
$Siga_baja_activoDto=$this->validarSiga_baja_activo($Siga_baja_activoDto);
$Siga_baja_activoController = new Siga_baja_activoController();
$Siga_baja_activoDto = $Siga_baja_activoController->deleteSiga_baja_activo($Siga_baja_activoDto);
if($Siga_baja_activoDto==true){
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



@$Id_baja=$_POST["Id_baja"];
@$Id_Activo=$_POST["Id_Activo"];
@$Motivo_Baja=$_POST["Motivo_Baja"];
@$Comentarios=$_POST["Comentarios"];
@$Destino=$_POST["Destino"];
@$Fecha_Baja=$_POST["Fecha_Baja"];
@$Usuario=$_POST["Usuario"];
@$Seg_Sol_Baja=$_POST["Seg_Sol_Baja"];
@$Seg_Resp_Area_Ges=$_POST["Seg_Resp_Area_Ges"];
@$Seg_Dir_Adminis=$_POST["Seg_Dir_Adminis"];
@$Cuenta_baja=$_POST["Cuenta_baja"];
@$Jefe_Area=$_POST["Jefe_Area"];
@$Seg_Usuario_Resp=$_POST["Seg_Usuario_Resp"];
@$accion=$_POST["accion"];

$siga_baja_activoFacade = new Siga_baja_activoFacade();
$siga_baja_activoDto = new Siga_baja_activoDTO();

$siga_baja_activoDto->setId_baja($Id_baja);
$siga_baja_activoDto->setId_Activo($Id_Activo);
$siga_baja_activoDto->setMotivo_Baja($Motivo_Baja);
$siga_baja_activoDto->setComentarios($Comentarios);
$siga_baja_activoDto->setDestino($Destino);
$siga_baja_activoDto->setFecha_Baja($Fecha_Baja);
$siga_baja_activoDto->setUsuario($Usuario);
$siga_baja_activoDto->setSeg_Sol_Baja($Seg_Sol_Baja);
$siga_baja_activoDto->setSeg_Resp_Area_Ges($Seg_Resp_Area_Ges);
$siga_baja_activoDto->setSeg_Dir_Adminis($Seg_Dir_Adminis);
$siga_baja_activoDto->setCuenta_baja($Cuenta_baja);
$siga_baja_activoDto->setJefe_Area($Jefe_Area);
$siga_baja_activoDto->setSeg_Usuario_Resp($Seg_Usuario_Resp);

if( ($accion=="guardar") && ($Id_baja=="") ){
$siga_baja_activoDto=$siga_baja_activoFacade->insertSiga_baja_activo($siga_baja_activoDto);
echo $siga_baja_activoDto;
} else if(($accion=="guardar") && ($Id_baja!="")){
$siga_baja_activoDto=$siga_baja_activoFacade->updateSiga_baja_activo($siga_baja_activoDto);
echo $siga_baja_activoDto;
} else if($accion=="consultar"){
$siga_baja_activoDto=$siga_baja_activoFacade->selectSiga_baja_activo($siga_baja_activoDto);
echo $siga_baja_activoDto;
} else if( ($accion=="baja") && ($Id_baja!="") ){
$siga_baja_activoDto=$siga_baja_activoFacade->deleteSiga_baja_activo($siga_baja_activoDto);
echo $siga_baja_activoDto;
} else if( ($accion=="seleccionar") && ($Id_baja!="") ){
$siga_baja_activoDto=$siga_baja_activoFacade->selectSiga_baja_activo($siga_baja_activoDto);
echo $siga_baja_activoDto;
}


?>