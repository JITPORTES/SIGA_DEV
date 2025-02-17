<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_vale_resguardo/Siga_vale_resguardoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_vale_resguardo/Siga_vale_resguardoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_vale_resguardoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_vale_resguardo($Siga_vale_resguardoDto){
$Siga_vale_resguardoDto->setId_Vale_Resguardo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getId_Vale_Resguardo(),"utf8"):strtoupper($Siga_vale_resguardoDto->getId_Vale_Resguardo()))))));
if($this->esFecha($Siga_vale_resguardoDto->getId_Vale_Resguardo())){
$Siga_vale_resguardoDto->setId_Vale_Resguardo($this->fechaMysql($Siga_vale_resguardoDto->getId_Vale_Resguardo()));
}
$Siga_vale_resguardoDto->setId_Tipo_Vale_Resg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getId_Tipo_Vale_Resg(),"utf8"):strtoupper($Siga_vale_resguardoDto->getId_Tipo_Vale_Resg()))))));
if($this->esFecha($Siga_vale_resguardoDto->getId_Tipo_Vale_Resg())){
$Siga_vale_resguardoDto->setId_Tipo_Vale_Resg($this->fechaMysql($Siga_vale_resguardoDto->getId_Tipo_Vale_Resg()));
}
$Siga_vale_resguardoDto->setNum_Empleado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getNum_Empleado(),"utf8"):strtoupper($Siga_vale_resguardoDto->getNum_Empleado()))))));
if($this->esFecha($Siga_vale_resguardoDto->getNum_Empleado())){
$Siga_vale_resguardoDto->setNum_Empleado($this->fechaMysql($Siga_vale_resguardoDto->getNum_Empleado()));
}
$Siga_vale_resguardoDto->setExtension_Tel(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getExtension_Tel(),"utf8"):strtoupper($Siga_vale_resguardoDto->getExtension_Tel()))))));
if($this->esFecha($Siga_vale_resguardoDto->getExtension_Tel())){
$Siga_vale_resguardoDto->setExtension_Tel($this->fechaMysql($Siga_vale_resguardoDto->getExtension_Tel()));
}
$Siga_vale_resguardoDto->setCorreo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getCorreo(),"utf8"):strtoupper($Siga_vale_resguardoDto->getCorreo()))))));
if($this->esFecha($Siga_vale_resguardoDto->getCorreo())){
$Siga_vale_resguardoDto->setCorreo($this->fechaMysql($Siga_vale_resguardoDto->getCorreo()));
}
$Siga_vale_resguardoDto->setObservaciones(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getObservaciones(),"utf8"):strtoupper($Siga_vale_resguardoDto->getObservaciones()))))));
if($this->esFecha($Siga_vale_resguardoDto->getObservaciones())){
$Siga_vale_resguardoDto->setObservaciones($this->fechaMysql($Siga_vale_resguardoDto->getObservaciones()));
}
$Siga_vale_resguardoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getFech_Inser(),"utf8"):strtoupper($Siga_vale_resguardoDto->getFech_Inser()))))));
if($this->esFecha($Siga_vale_resguardoDto->getFech_Inser())){
$Siga_vale_resguardoDto->setFech_Inser($this->fechaMysql($Siga_vale_resguardoDto->getFech_Inser()));
}
$Siga_vale_resguardoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getUsr_Inser(),"utf8"):strtoupper($Siga_vale_resguardoDto->getUsr_Inser()))))));
if($this->esFecha($Siga_vale_resguardoDto->getUsr_Inser())){
$Siga_vale_resguardoDto->setUsr_Inser($this->fechaMysql($Siga_vale_resguardoDto->getUsr_Inser()));
}
$Siga_vale_resguardoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getFech_Mod(),"utf8"):strtoupper($Siga_vale_resguardoDto->getFech_Mod()))))));
if($this->esFecha($Siga_vale_resguardoDto->getFech_Mod())){
$Siga_vale_resguardoDto->setFech_Mod($this->fechaMysql($Siga_vale_resguardoDto->getFech_Mod()));
}
$Siga_vale_resguardoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getUsr_Mod(),"utf8"):strtoupper($Siga_vale_resguardoDto->getUsr_Mod()))))));
if($this->esFecha($Siga_vale_resguardoDto->getUsr_Mod())){
$Siga_vale_resguardoDto->setUsr_Mod($this->fechaMysql($Siga_vale_resguardoDto->getUsr_Mod()));
}
$Siga_vale_resguardoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_vale_resguardoDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_vale_resguardoDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_vale_resguardoDto->getEstatus_Reg())){
$Siga_vale_resguardoDto->setEstatus_Reg($this->fechaMysql($Siga_vale_resguardoDto->getEstatus_Reg()));
}
return $Siga_vale_resguardoDto;
}
public function selectSiga_vale_resguardo($Siga_vale_resguardoDto){
$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
$Siga_vale_resguardoDto = $Siga_vale_resguardoController->selectSiga_vale_resguardo($Siga_vale_resguardoDto);
if($Siga_vale_resguardoDto!=""){
$dtoToJson = new DtoToJson($Siga_vale_resguardoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function selectSiga_vale_resguardo_pdf($Siga_vale_resguardoDto){
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
$Siga_vale_resguardoDto = $Siga_vale_resguardoController->selectSiga_vale_resguardo_pdf($Siga_vale_resguardoDto);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_vale_resguardoDto);
}

public function delete_logic_vale_resguardo($Siga_vale_resguardoDto){
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
$Siga_vale_resguardoDto = $Siga_vale_resguardoController->delete_logic_vale_resguardo($Siga_vale_resguardoDto);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_vale_resguardoDto);
}

public function selectSiga_vale_resguardo_tbl_dynamic($Siga_vale_resguardoDto, $Historico){
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
$Siga_vale_resguardoDto = $Siga_vale_resguardoController->selectSiga_vale_resguardo_tbl_dynamic($Siga_vale_resguardoDto, $Historico);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_vale_resguardoDto);
}

public function selectcambia_estatus_autorizacion($Siga_vale_resguardoDto){
	$Siga_vale_resguardoController = new Siga_vale_resguardoController();
	$Siga_vale_resguardoDto = $Siga_vale_resguardoController->selectcambia_estatus_autorizacion($Siga_vale_resguardoDto);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_vale_resguardoDto);
}

public function selectcambia_estatus_envio($Siga_vale_resguardoDto){
	$Siga_vale_resguardoController = new Siga_vale_resguardoController();
	$Siga_vale_resguardoDto = $Siga_vale_resguardoController->selectcambia_estatus_envio($Siga_vale_resguardoDto);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_vale_resguardoDto);
}

public function selectSiga_Tabla_Activos ($Siga_vale_resguardoDto, $Id_Tipo_Vale_Resg_Bus, $Id_Area_Sesion_Bus, $Num_Empleado_Bus, $Estatus_Reg_Bus){
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
$Siga_vale_resguardoDto = $Siga_vale_resguardoController->selectSiga_Tabla_Activos($Siga_vale_resguardoDto, $Id_Tipo_Vale_Resg_Bus, $Id_Area_Sesion_Bus, $Num_Empleado_Bus, $Estatus_Reg_Bus);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_vale_resguardoDto);
}


public function insertSiga_vale_resguardo($Siga_vale_resguardoDto, $cadena_id_activos, $enviar_correo, $mensaje_correo, $con_copia){
//$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
$Siga_vale_resguardoDto = $Siga_vale_resguardoController->insertSiga_vale_resguardo($Siga_vale_resguardoDto, $cadena_id_activos, $enviar_correo, $mensaje_correo, $con_copia);
//if($Siga_vale_resguardoDto!=""){
//$dtoToJson = new DtoToJson($Siga_vale_resguardoDto);
//return $dtoToJson->toJson("SE HA GENERADO EL VALE CORRECTAMENTE");
//}
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_vale_resguardoDto);
}
public function guardar_vales_todos($Siga_vale_resguardoDto, $enviar_correo, $mensaje_correo, $con_copia){
//$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
$Siga_vale_resguardoDto = $Siga_vale_resguardoController->guardar_vales_todos($Siga_vale_resguardoDto, $enviar_correo, $mensaje_correo, $con_copia);
//if($Siga_vale_resguardoDto!=""){
//$dtoToJson = new DtoToJson($Siga_vale_resguardoDto);
//return $dtoToJson->toJson("SE HA GENERADO EL VALE CORRECTAMENTE");
//}
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_vale_resguardoDto);
}
public function updateSiga_vale_resguardo($Siga_vale_resguardoDto, $cadena_id_activos){
//$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
$Siga_vale_resguardoDto = $Siga_vale_resguardoController->updateSiga_vale_resguardo($Siga_vale_resguardoDto, $cadena_id_activos);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_vale_resguardoDto);

}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search) {
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
return $Siga_vale_resguardoController->llenarDataTable($draw,$columns,$order,$start,$length,$search);
}
public function deleteSiga_vale_resguardo($Siga_vale_resguardoDto){
//$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
$Siga_vale_resguardoController = new Siga_vale_resguardoController();
$Siga_vale_resguardoDto = $Siga_vale_resguardoController->deleteSiga_vale_resguardo($Siga_vale_resguardoDto);
if($Siga_vale_resguardoDto==true){
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



@$Id_Vale_Resguardo=$_POST["Id_Vale_Resguardo"];
@$Id_Tipo_Vale_Resg=$_POST["Id_Tipo_Vale_Resg"];
@$Id_Area=$_POST["Id_Area"];
@$Num_Empleado=$_POST["Num_Empleado"];
@$Extension_Tel=$_POST["Extension_Tel"];
@$Correo=$_POST["Correo"];
@$Observaciones=$_POST["Observaciones"];
@$Estatus_Envio=$_POST["Estatus_Envio"];
@$Estatus_Correo_Responsable=$_POST["Estatus_Correo_Responsable"];
@$Estatus_Correo_Solicitante=$_POST["Estatus_Correo_Solicitante"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';
//Array Para Guardar los activos en el detalle
@$cadena_id_activos=$_POST["cadena_id_activos"];
//Variables para la busqueda de activos
@$Id_Tipo_Vale_Resg_Bus=$_POST["Id_Tipo_Vale_Resg_Bus"];
@$Id_Area_Sesion_Bus=$_POST["Id_Area_Sesion_Bus"];
@$Num_Empleado_Bus=$_POST["Num_Empleado_Bus"];
@$Estatus_Reg_Bus=$_POST["Estatus_Reg_Bus"];
@$Historico=$_POST["Historico"];

@$enviar_correo=$_POST["enviar_correo"];
@$mensaje_correo=$_POST["mensaje_correo"]; 
@$con_copia=$_POST["con_copia"]; 

$siga_vale_resguardoFacade = new Siga_vale_resguardoFacade();
$siga_vale_resguardoDto = new Siga_vale_resguardoDTO();

$siga_vale_resguardoDto->setId_Vale_Resguardo($Id_Vale_Resguardo);
$siga_vale_resguardoDto->setId_Tipo_Vale_Resg($Id_Tipo_Vale_Resg);
$siga_vale_resguardoDto->setId_Area($Id_Area);
$siga_vale_resguardoDto->setNum_Empleado($Num_Empleado);
$siga_vale_resguardoDto->setExtension_Tel($Extension_Tel);
$siga_vale_resguardoDto->setCorreo($Correo);
$siga_vale_resguardoDto->setObservaciones($Observaciones);
$siga_vale_resguardoDto->setEstatus_Envio($Estatus_Envio);
$siga_vale_resguardoDto->setEstatus_Correo_Responsable($Estatus_Correo_Responsable);
$siga_vale_resguardoDto->setEstatus_Correo_Solicitante($Estatus_Correo_Solicitante);
$siga_vale_resguardoDto->setFech_Inser($Fech_Inser);
$siga_vale_resguardoDto->setUsr_Inser($Usr_Inser);
$siga_vale_resguardoDto->setFech_Mod($Fech_Mod);
$siga_vale_resguardoDto->setUsr_Mod($Usr_Mod);
$siga_vale_resguardoDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Vale_Resguardo=="") ){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->insertSiga_vale_resguardo($siga_vale_resguardoDto, $cadena_id_activos, $enviar_correo, $mensaje_correo, $con_copia);
echo $siga_vale_resguardoDto;
} else if(($accion=="guardar") && ($Id_Vale_Resguardo!="")){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->updateSiga_vale_resguardo($siga_vale_resguardoDto, $cadena_id_activos);
echo $siga_vale_resguardoDto;
} else if($accion=="consultar"){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->selectSiga_vale_resguardo($siga_vale_resguardoDto);
echo $siga_vale_resguardoDto;
}else if($accion=="consultarpdf"){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->selectSiga_vale_resguardo_pdf($siga_vale_resguardoDto);
echo $siga_vale_resguardoDto;
}else if($accion=="consultartabladinamica"){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->selectSiga_vale_resguardo_tbl_dynamic($siga_vale_resguardoDto, $Historico);
echo $siga_vale_resguardoDto;
}else if($accion=="tabla_activos_generar"){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->selectSiga_Tabla_Activos($siga_vale_resguardoDto, $Id_Tipo_Vale_Resg_Bus, $Id_Area_Sesion_Bus, $Num_Empleado_Bus, $Estatus_Reg_Bus);
echo $siga_vale_resguardoDto;
}else if($accion=="cambia_estatus_autorizacion"){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->selectcambia_estatus_autorizacion($siga_vale_resguardoDto);
echo $siga_vale_resguardoDto;
}else if($accion=="cambia_estatus_envio"){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->selectcambia_estatus_envio($siga_vale_resguardoDto);
echo $siga_vale_resguardoDto;
}
else if( ($accion=="baja") && ($Id_Vale_Resguardo!="") ){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->deleteSiga_vale_resguardo($siga_vale_resguardoDto);
echo $siga_vale_resguardoDto;
}else if($accion=="consultarpdf"){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->selectSiga_vale_resguardo_pdf($siga_vale_resguardoDto);
echo $siga_vale_resguardoDto;
} else if( ($accion=="delete_logic") ){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->delete_logic_vale_resguardo($siga_vale_resguardoDto);
echo $siga_vale_resguardoDto;
} else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
echo  $siga_vale_resguardoDto=$siga_vale_resguardoFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search); 
}if($accion=="guardar_vales_todos"){
$siga_vale_resguardoDto=$siga_vale_resguardoFacade->guardar_vales_todos($siga_vale_resguardoDto, $enviar_correo, $mensaje_correo, $con_copia);
echo $siga_vale_resguardoDto;
}


?>