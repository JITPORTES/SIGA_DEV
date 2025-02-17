<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_actividades/Siga_det_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_det_actividades/Siga_det_actividadesController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_det_actividadesFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_det_actividades($Siga_det_actividadesDto){
$Siga_det_actividadesDto->setId_Det_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getId_Det_Actividad(),"utf8"):strtoupper($Siga_det_actividadesDto->getId_Det_Actividad()))))));
if($this->esFecha($Siga_det_actividadesDto->getId_Det_Actividad())){
$Siga_det_actividadesDto->setId_Det_Actividad($this->fechaMysql($Siga_det_actividadesDto->getId_Det_Actividad()));
}
$Siga_det_actividadesDto->setId_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getId_Actividad(),"utf8"):strtoupper($Siga_det_actividadesDto->getId_Actividad()))))));
if($this->esFecha($Siga_det_actividadesDto->getId_Actividad())){
$Siga_det_actividadesDto->setId_Actividad($this->fechaMysql($Siga_det_actividadesDto->getId_Actividad()));
}
$Siga_det_actividadesDto->setNombre_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getNombre_Actividad(),"utf8"):strtoupper($Siga_det_actividadesDto->getNombre_Actividad()))))));
if($this->esFecha($Siga_det_actividadesDto->getNombre_Actividad())){
$Siga_det_actividadesDto->setNombre_Actividad($this->fechaMysql($Siga_det_actividadesDto->getNombre_Actividad()));
}
$Siga_det_actividadesDto->setValor_Referencia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getValor_Referencia(),"utf8"):strtoupper($Siga_det_actividadesDto->getValor_Referencia()))))));
if($this->esFecha($Siga_det_actividadesDto->getValor_Referencia())){
$Siga_det_actividadesDto->setValor_Referencia($this->fechaMysql($Siga_det_actividadesDto->getValor_Referencia()));
}
$Siga_det_actividadesDto->setValor_Medido(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getValor_Medido(),"utf8"):strtoupper($Siga_det_actividadesDto->getValor_Medido()))))));
if($this->esFecha($Siga_det_actividadesDto->getValor_Medido())){
$Siga_det_actividadesDto->setValor_Medido($this->fechaMysql($Siga_det_actividadesDto->getValor_Medido()));
}
$Siga_det_actividadesDto->setEstatus_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getEstatus_Actividad(),"utf8"):strtoupper($Siga_det_actividadesDto->getEstatus_Actividad()))))));
if($this->esFecha($Siga_det_actividadesDto->getEstatus_Actividad())){
$Siga_det_actividadesDto->setEstatus_Actividad($this->fechaMysql($Siga_det_actividadesDto->getEstatus_Actividad()));
}
$Siga_det_actividadesDto->setObservaciones(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getObservaciones(),"utf8"):strtoupper($Siga_det_actividadesDto->getObservaciones()))))));
if($this->esFecha($Siga_det_actividadesDto->getObservaciones())){
$Siga_det_actividadesDto->setObservaciones($this->fechaMysql($Siga_det_actividadesDto->getObservaciones()));
}
$Siga_det_actividadesDto->setUrl_Adjunto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getUrl_Adjunto(),"utf8"):strtoupper($Siga_det_actividadesDto->getUrl_Adjunto()))))));
if($this->esFecha($Siga_det_actividadesDto->getUrl_Adjunto())){
$Siga_det_actividadesDto->setUrl_Adjunto($this->fechaMysql($Siga_det_actividadesDto->getUrl_Adjunto()));
}
$Siga_det_actividadesDto->setFecha_Programada(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getFecha_Programada(),"utf8"):strtoupper($Siga_det_actividadesDto->getFecha_Programada()))))));
if($this->esFecha($Siga_det_actividadesDto->getFecha_Programada())){
$Siga_det_actividadesDto->setFecha_Programada($this->fechaMysql($Siga_det_actividadesDto->getFecha_Programada()));
}
$Siga_det_actividadesDto->setFecha_Realizada(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getFecha_Realizada(),"utf8"):strtoupper($Siga_det_actividadesDto->getFecha_Realizada()))))));
if($this->esFecha($Siga_det_actividadesDto->getFecha_Realizada())){
$Siga_det_actividadesDto->setFecha_Realizada($this->fechaMysql($Siga_det_actividadesDto->getFecha_Realizada()));
}
$Siga_det_actividadesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getFech_Inser(),"utf8"):strtoupper($Siga_det_actividadesDto->getFech_Inser()))))));
if($this->esFecha($Siga_det_actividadesDto->getFech_Inser())){
$Siga_det_actividadesDto->setFech_Inser($this->fechaMysql($Siga_det_actividadesDto->getFech_Inser()));
}
$Siga_det_actividadesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getUsr_Inser(),"utf8"):strtoupper($Siga_det_actividadesDto->getUsr_Inser()))))));
if($this->esFecha($Siga_det_actividadesDto->getUsr_Inser())){
$Siga_det_actividadesDto->setUsr_Inser($this->fechaMysql($Siga_det_actividadesDto->getUsr_Inser()));
}
$Siga_det_actividadesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getFech_Mod(),"utf8"):strtoupper($Siga_det_actividadesDto->getFech_Mod()))))));
if($this->esFecha($Siga_det_actividadesDto->getFech_Mod())){
$Siga_det_actividadesDto->setFech_Mod($this->fechaMysql($Siga_det_actividadesDto->getFech_Mod()));
}
$Siga_det_actividadesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getUsr_Mod(),"utf8"):strtoupper($Siga_det_actividadesDto->getUsr_Mod()))))));
if($this->esFecha($Siga_det_actividadesDto->getUsr_Mod())){
$Siga_det_actividadesDto->setUsr_Mod($this->fechaMysql($Siga_det_actividadesDto->getUsr_Mod()));
}
$Siga_det_actividadesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_det_actividadesDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_det_actividadesDto->getEstatus_Reg())){
$Siga_det_actividadesDto->setEstatus_Reg($this->fechaMysql($Siga_det_actividadesDto->getEstatus_Reg()));
}
$Siga_det_actividadesDto->setV_Mesa(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getV_Mesa(),"utf8"):strtoupper($Siga_det_actividadesDto->getV_Mesa()))))));
if($this->esFecha($Siga_det_actividadesDto->getV_Mesa())){
$Siga_det_actividadesDto->setV_Mesa($this->fechaMysql($Siga_det_actividadesDto->getV_Mesa()));
}
$Siga_det_actividadesDto->setCampo_2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getCampo_2(),"utf8"):strtoupper($Siga_det_actividadesDto->getCampo_2()))))));
if($this->esFecha($Siga_det_actividadesDto->getCampo_2())){
$Siga_det_actividadesDto->setCampo_2($this->fechaMysql($Siga_det_actividadesDto->getCampo_2()));
}
$Siga_det_actividadesDto->setCampo_3(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getCampo_3(),"utf8"):strtoupper($Siga_det_actividadesDto->getCampo_3()))))));
if($this->esFecha($Siga_det_actividadesDto->getCampo_3())){
$Siga_det_actividadesDto->setCampo_3($this->fechaMysql($Siga_det_actividadesDto->getCampo_3()));
}
$Siga_det_actividadesDto->setCampo_4(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getCampo_4(),"utf8"):strtoupper($Siga_det_actividadesDto->getCampo_4()))))));
if($this->esFecha($Siga_det_actividadesDto->getCampo_4())){
$Siga_det_actividadesDto->setCampo_4($this->fechaMysql($Siga_det_actividadesDto->getCampo_4()));
}
$Siga_det_actividadesDto->setCampo_5(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getCampo_5(),"utf8"):strtoupper($Siga_det_actividadesDto->getCampo_5()))))));
if($this->esFecha($Siga_det_actividadesDto->getCampo_5())){
$Siga_det_actividadesDto->setCampo_5($this->fechaMysql($Siga_det_actividadesDto->getCampo_5()));
}
$Siga_det_actividadesDto->setCampo_6(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_det_actividadesDto->getCampo_6(),"utf8"):strtoupper($Siga_det_actividadesDto->getCampo_6()))))));
if($this->esFecha($Siga_det_actividadesDto->getCampo_6())){
$Siga_det_actividadesDto->setCampo_6($this->fechaMysql($Siga_det_actividadesDto->getCampo_6()));
}
return $Siga_det_actividadesDto;
}
public function selectSiga_det_actividades($Siga_det_actividadesDto){
$Siga_det_actividadesDto=$this->validarSiga_det_actividades($Siga_det_actividadesDto);
$Siga_det_actividadesController = new Siga_det_actividadesController();
$Siga_det_actividadesDto = $Siga_det_actividadesController->selectSiga_det_actividades($Siga_det_actividadesDto);
if($Siga_det_actividadesDto!=""){
$dtoToJson = new DtoToJson($Siga_det_actividadesDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_det_actividades($Siga_det_actividadesDto){
//$Siga_det_actividadesDto=$this->validarSiga_det_actividades($Siga_det_actividadesDto);
$Siga_det_actividadesController = new Siga_det_actividadesController();
$Siga_det_actividadesDto = $Siga_det_actividadesController->insertSiga_det_actividades($Siga_det_actividadesDto);
if($Siga_det_actividadesDto!=""){
$dtoToJson = new DtoToJson($Siga_det_actividadesDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_det_actividades($Siga_det_actividadesDto){
//$Siga_det_actividadesDto=$this->validarSiga_det_actividades($Siga_det_actividadesDto);
$Siga_det_actividadesController = new Siga_det_actividadesController();
$Siga_det_actividadesDto = $Siga_det_actividadesController->updateSiga_det_actividades($Siga_det_actividadesDto);
if($Siga_det_actividadesDto!=""){
$dtoToJson = new DtoToJson($Siga_det_actividadesDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_det_actividades($Siga_det_actividadesDto){
//$Siga_det_actividadesDto=$this->validarSiga_det_actividades($Siga_det_actividadesDto);
$Siga_det_actividadesController = new Siga_det_actividadesController();
$Siga_det_actividadesDto = $Siga_det_actividadesController->deleteSiga_det_actividades($Siga_det_actividadesDto);
if($Siga_det_actividadesDto==true){
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



@$Id_Det_Actividad=$_POST["Id_Det_Actividad"];
@$Id_Actividad=$_POST["Id_Actividad"];
@$Num_Actividad=$_POST["Num_Actividad"];
@$Nombre_Actividad=$_POST["Nombre_Actividad"];
@$Valor_Referencia=$_POST["Valor_Referencia"];
@$Valor_Medido=$_POST["Valor_Medido"];
@$Estatus_Actividad=$_POST["Estatus_Actividad"];
@$Observaciones=$_POST["Observaciones"];
@$Url_Adjunto=$_POST["Url_Adjunto"];
@$Fecha_Programada=$_POST["Fecha_Programada"];
@$Fecha_Realizada=$_POST["Fecha_Realizada"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$V_Mesa=$_POST["V_Mesa"];
@$Campo_2=$_POST["Campo_2"];
@$Campo_3=$_POST["Campo_3"];
@$Campo_4=$_POST["Campo_4"];
@$Campo_5=$_POST["Campo_5"];
@$Campo_6=$_POST["Campo_6"];
@$accion=$_POST["accion"];

$siga_det_actividadesFacade = new Siga_det_actividadesFacade();
$siga_det_actividadesDto = new Siga_det_actividadesDTO();
$siga_det_actividadesDto->setId_Det_Actividad($Id_Det_Actividad);
$siga_det_actividadesDto->setId_Actividad($Id_Actividad);
$siga_det_actividadesDto->setNum_Actividad($Num_Actividad);
$siga_det_actividadesDto->setNombre_Actividad($Nombre_Actividad);
$siga_det_actividadesDto->setValor_Referencia($Valor_Referencia);
$siga_det_actividadesDto->setValor_Medido($Valor_Medido);
$siga_det_actividadesDto->setEstatus_Actividad($Estatus_Actividad);
$siga_det_actividadesDto->setObservaciones($Observaciones);
$siga_det_actividadesDto->setUrl_Adjunto($Url_Adjunto);
$siga_det_actividadesDto->setFecha_Programada($Fecha_Programada);
$siga_det_actividadesDto->setFecha_Realizada($Fecha_Realizada);
$siga_det_actividadesDto->setFech_Inser($Fech_Inser);
$siga_det_actividadesDto->setUsr_Inser($Usr_Inser);
$siga_det_actividadesDto->setFech_Mod($Fech_Mod);
$siga_det_actividadesDto->setUsr_Mod($Usr_Mod);
$siga_det_actividadesDto->setEstatus_Reg($Estatus_Reg);
$siga_det_actividadesDto->setV_Mesa($V_Mesa);
$siga_det_actividadesDto->setCampo_2($Campo_2);
$siga_det_actividadesDto->setCampo_3($Campo_3);
$siga_det_actividadesDto->setCampo_4($Campo_4);
$siga_det_actividadesDto->setCampo_5($Campo_5);
$siga_det_actividadesDto->setCampo_6($Campo_6);

if( ($accion=="guardar") && ($Id_Det_Actividad=="") ){
$siga_det_actividadesDto=$siga_det_actividadesFacade->insertSiga_det_actividades($siga_det_actividadesDto);
echo $siga_det_actividadesDto;
} else if(($accion=="guardar") && ($Id_Det_Actividad!="")){
$siga_det_actividadesDto=$siga_det_actividadesFacade->updateSiga_det_actividades($siga_det_actividadesDto);
echo $siga_det_actividadesDto;
} else if($accion=="consultar"){
$siga_det_actividadesDto=$siga_det_actividadesFacade->selectSiga_det_actividades($siga_det_actividadesDto);
echo $siga_det_actividadesDto;
} else if( ($accion=="baja") && ($Id_Det_Actividad!="") ){
$siga_det_actividadesDto=$siga_det_actividadesFacade->deleteSiga_det_actividades($siga_det_actividadesDto);
echo $siga_det_actividadesDto;
} else if( ($accion=="seleccionar") && ($Id_Det_Actividad!="") ){
$siga_det_actividadesDto=$siga_det_actividadesFacade->selectSiga_det_actividades($siga_det_actividadesDto);
echo $siga_det_actividadesDto;
}


?>