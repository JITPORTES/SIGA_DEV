<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_activos_contabilidad/Siga_activos_contabilidadDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_activos_contabilidad/Siga_activos_contabilidadController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_activos_contabilidadFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_activos_contabilidad($Siga_activos_contabilidadDto){
$Siga_activos_contabilidadDto->setId_Activo_Contabilidad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getId_Activo_Contabilidad(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getId_Activo_Contabilidad()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getId_Activo_Contabilidad())){
$Siga_activos_contabilidadDto->setId_Activo_Contabilidad($this->fechaMysql($Siga_activos_contabilidadDto->getId_Activo_Contabilidad()));
}
$Siga_activos_contabilidadDto->setId_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getId_Activo(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getId_Activo()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getId_Activo())){
$Siga_activos_contabilidadDto->setId_Activo($this->fechaMysql($Siga_activos_contabilidadDto->getId_Activo()));
}
$Siga_activos_contabilidadDto->setCentro_Costos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getCentro_Costos(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getCentro_Costos()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getCentro_Costos())){
$Siga_activos_contabilidadDto->setCentro_Costos($this->fechaMysql($Siga_activos_contabilidadDto->getCentro_Costos()));
}
$Siga_activos_contabilidadDto->setNo_Capex(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getNo_Capex(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getNo_Capex()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getNo_Capex())){
$Siga_activos_contabilidadDto->setNo_Capex($this->fechaMysql($Siga_activos_contabilidadDto->getNo_Capex()));
}
$Siga_activos_contabilidadDto->setProrrateo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getProrrateo(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getProrrateo()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getProrrateo())){
$Siga_activos_contabilidadDto->setProrrateo($this->fechaMysql($Siga_activos_contabilidadDto->getProrrateo()));
}
$Siga_activos_contabilidadDto->setParticipa_Depreciacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getParticipa_Depreciacion(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getParticipa_Depreciacion()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getParticipa_Depreciacion())){
$Siga_activos_contabilidadDto->setParticipa_Depreciacion($this->fechaMysql($Siga_activos_contabilidadDto->getParticipa_Depreciacion()));
}
$Siga_activos_contabilidadDto->setFecha_Inicio_Depr(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getFecha_Inicio_Depr(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getFecha_Inicio_Depr()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getFecha_Inicio_Depr())){
$Siga_activos_contabilidadDto->setFecha_Inicio_Depr($this->fechaMysql($Siga_activos_contabilidadDto->getFecha_Inicio_Depr()));
}
$Siga_activos_contabilidadDto->setUrl_Factura(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getUrl_Factura(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getUrl_Factura()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getUrl_Factura())){
$Siga_activos_contabilidadDto->setUrl_Factura($this->fechaMysql($Siga_activos_contabilidadDto->getUrl_Factura()));
}

$Siga_activos_contabilidadDto->setCuent_Cont_Act(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Act(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Act()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getCuent_Cont_Act())){
$Siga_activos_contabilidadDto->setCuent_Cont_Act($this->fechaMysql($Siga_activos_contabilidadDto->getCuent_Cont_Act()));
}
$Siga_activos_contabilidadDto->setCuent_Cont_Act_B10(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Act_B10(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Act_B10()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getCuent_Cont_Act_B10())){
$Siga_activos_contabilidadDto->setCuent_Cont_Act_B10($this->fechaMysql($Siga_activos_contabilidadDto->getCuent_Cont_Act_B10()));
}
$Siga_activos_contabilidadDto->setCuent_Cont_Result(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Result(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Result()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getCuent_Cont_Result())){
$Siga_activos_contabilidadDto->setCuent_Cont_Result($this->fechaMysql($Siga_activos_contabilidadDto->getCuent_Cont_Result()));
}
$Siga_activos_contabilidadDto->setCuent_Cont_Result_B10(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Result_B10(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Result_B10()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getCuent_Cont_Result_B10())){
$Siga_activos_contabilidadDto->setCuent_Cont_Result_B10($this->fechaMysql($Siga_activos_contabilidadDto->getCuent_Cont_Result_B10()));
}
$Siga_activos_contabilidadDto->setCuent_Cont_Dep(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Dep(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Dep()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getCuent_Cont_Dep())){
$Siga_activos_contabilidadDto->setCuent_Cont_Dep($this->fechaMysql($Siga_activos_contabilidadDto->getCuent_Cont_Dep()));
}
$Siga_activos_contabilidadDto->setCuent_Cont_Dep_B10(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Dep_B10(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getCuent_Cont_Dep_B10())){
$Siga_activos_contabilidadDto->setCuent_Cont_Dep_B10($this->fechaMysql($Siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()));
}
$Siga_activos_contabilidadDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getFech_Inser(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getFech_Inser()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getFech_Inser())){
$Siga_activos_contabilidadDto->setFech_Inser($this->fechaMysql($Siga_activos_contabilidadDto->getFech_Inser()));
}
$Siga_activos_contabilidadDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getUsr_Inser(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getUsr_Inser()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getUsr_Inser())){
$Siga_activos_contabilidadDto->setUsr_Inser($this->fechaMysql($Siga_activos_contabilidadDto->getUsr_Inser()));
}
$Siga_activos_contabilidadDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getFech_Mod(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getFech_Mod()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getFech_Mod())){
$Siga_activos_contabilidadDto->setFech_Mod($this->fechaMysql($Siga_activos_contabilidadDto->getFech_Mod()));
}
$Siga_activos_contabilidadDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getUsr_Mod(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getUsr_Mod()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getUsr_Mod())){
$Siga_activos_contabilidadDto->setUsr_Mod($this->fechaMysql($Siga_activos_contabilidadDto->getUsr_Mod()));
}
$Siga_activos_contabilidadDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activos_contabilidadDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_activos_contabilidadDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_activos_contabilidadDto->getEstatus_Reg())){
$Siga_activos_contabilidadDto->setEstatus_Reg($this->fechaMysql($Siga_activos_contabilidadDto->getEstatus_Reg()));
}
return $Siga_activos_contabilidadDto;
}
public function selectSiga_activos_contabilidad($Siga_activos_contabilidadDto){
$Siga_activos_contabilidadDto=$this->validarSiga_activos_contabilidad($Siga_activos_contabilidadDto);
$Siga_activos_contabilidadController = new Siga_activos_contabilidadController();
$Siga_activos_contabilidadDto = $Siga_activos_contabilidadController->selectSiga_activos_contabilidad($Siga_activos_contabilidadDto);
if($Siga_activos_contabilidadDto!=""){
$dtoToJson = new DtoToJson($Siga_activos_contabilidadDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_activos_contabilidad($Siga_activos_contabilidadDto){
//$Siga_activos_contabilidadDto=$this->validarSiga_activos_contabilidad($Siga_activos_contabilidadDto);
$Siga_activos_contabilidadController = new Siga_activos_contabilidadController();
$Siga_activos_contabilidadDto = $Siga_activos_contabilidadController->insertSiga_activos_contabilidad($Siga_activos_contabilidadDto);
if($Siga_activos_contabilidadDto!=""){
$dtoToJson = new DtoToJson($Siga_activos_contabilidadDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_activos_contabilidad($Siga_activos_contabilidadDto){
//$Siga_activos_contabilidadDto=$this->validarSiga_activos_contabilidad($Siga_activos_contabilidadDto);
$Siga_activos_contabilidadController = new Siga_activos_contabilidadController();
$Siga_activos_contabilidadDto = $Siga_activos_contabilidadController->updateSiga_activos_contabilidad($Siga_activos_contabilidadDto);
if($Siga_activos_contabilidadDto!=""){
$dtoToJson = new DtoToJson($Siga_activos_contabilidadDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_activos_contabilidad($Siga_activos_contabilidadDto){
//$Siga_activos_contabilidadDto=$this->validarSiga_activos_contabilidad($Siga_activos_contabilidadDto);
$Siga_activos_contabilidadController = new Siga_activos_contabilidadController();
$Siga_activos_contabilidadDto = $Siga_activos_contabilidadController->deleteSiga_activos_contabilidad($Siga_activos_contabilidadDto);
if($Siga_activos_contabilidadDto==true){
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



@$Id_Activo_Contabilidad=$_POST["Id_Activo_Contabilidad"];
@$Id_Activo=$_POST["Id_Activo"];
@$Centro_Costos=$_POST["Centro_Costos"];
@$No_Capex=$_POST["No_Capex"];
@$Prorrateo=$_POST["Prorrateo"];
@$Participa_Depreciacion=$_POST["Participa_Depreciacion"];
@$Fecha_Inicio_Depr=$_POST["Fecha_Inicio_Depr"];
@$Url_Factura=$_POST["Url_Factura"];
@$Cuent_Cont_Act=$_POST["Cuent_Cont_Act"];
@$Cuent_Cont_Act_B10=$_POST["Cuent_Cont_Act_B10"];
@$Cuent_Cont_Result=$_POST["Cuent_Cont_Result"];
@$Cuent_Cont_Result_B10=$_POST["Cuent_Cont_Result_B10"];
@$Cuent_Cont_Dep=$_POST["Cuent_Cont_Dep"];
@$Cuent_Cont_Dep_B10=$_POST["Cuent_Cont_Dep_B10"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$Url_Xml=$_POST["Url_Xml"];
@$accion=$_POST["accion"];

$siga_activos_contabilidadFacade = new Siga_activos_contabilidadFacade();
$siga_activos_contabilidadDto = new Siga_activos_contabilidadDTO();

$siga_activos_contabilidadDto->setId_Activo_Contabilidad($Id_Activo_Contabilidad);
$siga_activos_contabilidadDto->setId_Activo($Id_Activo);
$siga_activos_contabilidadDto->setCentro_Costos($Centro_Costos);
$siga_activos_contabilidadDto->setNo_Capex($No_Capex);
$siga_activos_contabilidadDto->setProrrateo($Prorrateo);
$siga_activos_contabilidadDto->setParticipa_Depreciacion($Participa_Depreciacion);
$siga_activos_contabilidadDto->setFecha_Inicio_Depr($Fecha_Inicio_Depr);
$siga_activos_contabilidadDto->setUrl_Factura($Url_Factura);
$siga_activos_contabilidadDto->setCuent_Cont_Act($Cuent_Cont_Act);
$siga_activos_contabilidadDto->setCuent_Cont_Act_B10($Cuent_Cont_Act_B10);
$siga_activos_contabilidadDto->setCuent_Cont_Result($Cuent_Cont_Result);
$siga_activos_contabilidadDto->setCuent_Cont_Result_B10($Cuent_Cont_Result_B10);
$siga_activos_contabilidadDto->setCuent_Cont_Dep($Cuent_Cont_Dep);
$siga_activos_contabilidadDto->setCuent_Cont_Dep_B10($Cuent_Cont_Dep_B10);
$siga_activos_contabilidadDto->setFech_Inser($Fech_Inser);
$siga_activos_contabilidadDto->setUsr_Inser($Usr_Inser);
$siga_activos_contabilidadDto->setFech_Mod($Fech_Mod);
$siga_activos_contabilidadDto->setUsr_Mod($Usr_Mod);
$siga_activos_contabilidadDto->setEstatus_Reg($Estatus_Reg);
$siga_activos_contabilidadDto->setUrl_Xml($Url_Xml);

if( ($accion=="guardar") && ($Id_Activo_Contabilidad=="") ){
$siga_activos_contabilidadDto=$siga_activos_contabilidadFacade->insertSiga_activos_contabilidad($siga_activos_contabilidadDto);
echo $siga_activos_contabilidadDto;
} else if(($accion=="guardar") && ($Id_Activo_Contabilidad!="")){
$siga_activos_contabilidadDto=$siga_activos_contabilidadFacade->updateSiga_activos_contabilidad($siga_activos_contabilidadDto);
echo $siga_activos_contabilidadDto;
} else if($accion=="consultar"){
$siga_activos_contabilidadDto=$siga_activos_contabilidadFacade->selectSiga_activos_contabilidad($siga_activos_contabilidadDto);
echo $siga_activos_contabilidadDto;
} else if( ($accion=="baja") && ($Id_Activo_Contabilidad!="") ){
$siga_activos_contabilidadDto=$siga_activos_contabilidadFacade->deleteSiga_activos_contabilidad($siga_activos_contabilidadDto);
echo $siga_activos_contabilidadDto;
} else if( ($accion=="seleccionar") && ($Id_Activo_Contabilidad!="") ){
$siga_activos_contabilidadDto=$siga_activos_contabilidadFacade->selectSiga_activos_contabilidad($siga_activos_contabilidadDto);
echo $siga_activos_contabilidadDto;
}


?>