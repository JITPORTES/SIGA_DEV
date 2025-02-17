<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_reubicacion_activo/Siga_reubicacion_activoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_reubicacion_activo/Siga_reubicacion_activoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_reubicacion_activoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_reubicacion_activo($Siga_reubicacion_activoDto){
$Siga_reubicacion_activoDto->setId_Activo_Reubicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getId_Activo_Reubicacion(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getId_Activo_Reubicacion()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getId_Activo_Reubicacion())){
$Siga_reubicacion_activoDto->setId_Activo_Reubicacion($this->fechaMysql($Siga_reubicacion_activoDto->getId_Activo_Reubicacion()));
}
$Siga_reubicacion_activoDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getId_Area(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getId_Area()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getId_Area())){
$Siga_reubicacion_activoDto->setId_Area($this->fechaMysql($Siga_reubicacion_activoDto->getId_Area()));
}
$Siga_reubicacion_activoDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getId_Ubic_Prim(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getId_Ubic_Prim()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getId_Ubic_Prim())){
$Siga_reubicacion_activoDto->setId_Ubic_Prim($this->fechaMysql($Siga_reubicacion_activoDto->getId_Ubic_Prim()));
}
$Siga_reubicacion_activoDto->setId_Ubic_Sec(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getId_Ubic_Sec(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getId_Ubic_Sec()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getId_Ubic_Sec())){
$Siga_reubicacion_activoDto->setId_Ubic_Sec($this->fechaMysql($Siga_reubicacion_activoDto->getId_Ubic_Sec()));
}
$Siga_reubicacion_activoDto->setId_Usuario_Responsable(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getId_Usuario_Responsable(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getId_Usuario_Responsable()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getId_Usuario_Responsable())){
$Siga_reubicacion_activoDto->setId_Usuario_Responsable($this->fechaMysql($Siga_reubicacion_activoDto->getId_Usuario_Responsable()));
}
$Siga_reubicacion_activoDto->setNom_Usuario_Reponsable(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getNom_Usuario_Reponsable(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getNom_Usuario_Reponsable()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getNom_Usuario_Reponsable())){
$Siga_reubicacion_activoDto->setNom_Usuario_Reponsable($this->fechaMysql($Siga_reubicacion_activoDto->getNom_Usuario_Reponsable()));
}
$Siga_reubicacion_activoDto->setCentro_Costos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getCentro_Costos(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getCentro_Costos()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getCentro_Costos())){
$Siga_reubicacion_activoDto->setCentro_Costos($this->fechaMysql($Siga_reubicacion_activoDto->getCentro_Costos()));
}
$Siga_reubicacion_activoDto->setJefe_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getJefe_Area(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getJefe_Area()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getJefe_Area())){
$Siga_reubicacion_activoDto->setJefe_Area($this->fechaMysql($Siga_reubicacion_activoDto->getJefe_Area()));
}
$Siga_reubicacion_activoDto->setMotivo_Reubicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getMotivo_Reubicacion(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getMotivo_Reubicacion()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getMotivo_Reubicacion())){
$Siga_reubicacion_activoDto->setMotivo_Reubicacion($this->fechaMysql($Siga_reubicacion_activoDto->getMotivo_Reubicacion()));
}
$Siga_reubicacion_activoDto->setComentarios_Reubicacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getComentarios_Reubicacion(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getComentarios_Reubicacion()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getComentarios_Reubicacion())){
$Siga_reubicacion_activoDto->setComentarios_Reubicacion($this->fechaMysql($Siga_reubicacion_activoDto->getComentarios_Reubicacion()));
}
$Siga_reubicacion_activoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getFech_Inser(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getFech_Inser()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getFech_Inser())){
$Siga_reubicacion_activoDto->setFech_Inser($this->fechaMysql($Siga_reubicacion_activoDto->getFech_Inser()));
}
$Siga_reubicacion_activoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getUsr_Inser(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getUsr_Inser()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getUsr_Inser())){
$Siga_reubicacion_activoDto->setUsr_Inser($this->fechaMysql($Siga_reubicacion_activoDto->getUsr_Inser()));
}
$Siga_reubicacion_activoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getFech_Mod(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getFech_Mod()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getFech_Mod())){
$Siga_reubicacion_activoDto->setFech_Mod($this->fechaMysql($Siga_reubicacion_activoDto->getFech_Mod()));
}
$Siga_reubicacion_activoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getUsr_Mod(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getUsr_Mod()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getUsr_Mod())){
$Siga_reubicacion_activoDto->setUsr_Mod($this->fechaMysql($Siga_reubicacion_activoDto->getUsr_Mod()));
}
$Siga_reubicacion_activoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reubicacion_activoDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_reubicacion_activoDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_reubicacion_activoDto->getEstatus_Reg())){
$Siga_reubicacion_activoDto->setEstatus_Reg($this->fechaMysql($Siga_reubicacion_activoDto->getEstatus_Reg()));
}
return $Siga_reubicacion_activoDto;
}
public function selectSiga_reubicacion_activo($Siga_reubicacion_activoDto){
$Siga_reubicacion_activoDto=$this->validarSiga_reubicacion_activo($Siga_reubicacion_activoDto);
$Siga_reubicacion_activoController = new Siga_reubicacion_activoController();
$Siga_reubicacion_activoDto = $Siga_reubicacion_activoController->selectSiga_reubicacion_activo($Siga_reubicacion_activoDto);
if($Siga_reubicacion_activoDto!=""){
$dtoToJson = new DtoToJson($Siga_reubicacion_activoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_reubicacion_activo($Siga_reubicacion_activoDto){
//$Siga_reubicacion_activoDto=$this->validarSiga_reubicacion_activo($Siga_reubicacion_activoDto);
$Siga_reubicacion_activoController = new Siga_reubicacion_activoController();
$Siga_reubicacion_activoDto = $Siga_reubicacion_activoController->insertSiga_reubicacion_activo($Siga_reubicacion_activoDto);
if($Siga_reubicacion_activoDto!=""){
$dtoToJson = new DtoToJson($Siga_reubicacion_activoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_reubicacion_activo($Siga_reubicacion_activoDto){
//$Siga_reubicacion_activoDto=$this->validarSiga_reubicacion_activo($Siga_reubicacion_activoDto);
$Siga_reubicacion_activoController = new Siga_reubicacion_activoController();
$Siga_reubicacion_activoDto = $Siga_reubicacion_activoController->updateSiga_reubicacion_activo($Siga_reubicacion_activoDto);
if($Siga_reubicacion_activoDto!=""){
$dtoToJson = new DtoToJson($Siga_reubicacion_activoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_reubicacion_activo($Siga_reubicacion_activoDto){
//$Siga_reubicacion_activoDto=$this->validarSiga_reubicacion_activo($Siga_reubicacion_activoDto);
$Siga_reubicacion_activoController = new Siga_reubicacion_activoController();
$Siga_reubicacion_activoDto = $Siga_reubicacion_activoController->deleteSiga_reubicacion_activo($Siga_reubicacion_activoDto);
if($Siga_reubicacion_activoDto==true){
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



@$Id_Activo_Reubicacion=$_POST["Id_Activo_Reubicacion"];
@$Id_Activo=$_POST["Id_Activo"];
@$Id_Area=$_POST["Id_Area"];
@$Id_Ubic_Prim=$_POST["Id_Ubic_Prim"];
@$Id_Ubic_Sec=$_POST["Id_Ubic_Sec"];
@$Ubic_Especifica=$_POST["Ubic_Especifica"];
@$Id_Usuario_Responsable=$_POST["Id_Usuario_Responsable"];
@$Nom_Usuario_Reponsable=$_POST["Nom_Usuario_Reponsable"];
@$Centro_Costos=$_POST["Centro_Costos"];
@$Jefe_Area=$_POST["Jefe_Area"];
@$Motivo_Reubicacion=$_POST["Motivo_Reubicacion"];
@$Comentarios_Reubicacion=$_POST["Comentarios_Reubicacion"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_reubicacion_activoFacade = new Siga_reubicacion_activoFacade();
$siga_reubicacion_activoDto = new Siga_reubicacion_activoDTO();

$siga_reubicacion_activoDto->setId_Activo_Reubicacion($Id_Activo_Reubicacion);
$siga_reubicacion_activoDto->setId_Activo($Id_Activo);
$siga_reubicacion_activoDto->setId_Area($Id_Area);
$siga_reubicacion_activoDto->setId_Ubic_Prim($Id_Ubic_Prim);
$siga_reubicacion_activoDto->setId_Ubic_Sec($Id_Ubic_Sec);

$siga_reubicacion_activoDto->setUbic_Especifica($Ubic_Especifica);
$siga_reubicacion_activoDto->setId_Usuario_Responsable($Id_Usuario_Responsable);
$siga_reubicacion_activoDto->setNom_Usuario_Reponsable($Nom_Usuario_Reponsable);
$siga_reubicacion_activoDto->setCentro_Costos($Centro_Costos);
$siga_reubicacion_activoDto->setJefe_Area($Jefe_Area);
$siga_reubicacion_activoDto->setMotivo_Reubicacion($Motivo_Reubicacion);
$siga_reubicacion_activoDto->setComentarios_Reubicacion($Comentarios_Reubicacion);
$siga_reubicacion_activoDto->setFech_Inser($Fech_Inser);
$siga_reubicacion_activoDto->setUsr_Inser($Usr_Inser);
$siga_reubicacion_activoDto->setFech_Mod($Fech_Mod);
$siga_reubicacion_activoDto->setUsr_Mod($Usr_Mod);
$siga_reubicacion_activoDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Activo_Reubicacion=="") ){
$siga_reubicacion_activoDto=$siga_reubicacion_activoFacade->insertSiga_reubicacion_activo($siga_reubicacion_activoDto);
echo $siga_reubicacion_activoDto;
} else if(($accion=="guardar") && ($Id_Activo_Reubicacion!="")){
$siga_reubicacion_activoDto=$siga_reubicacion_activoFacade->updateSiga_reubicacion_activo($siga_reubicacion_activoDto);
echo $siga_reubicacion_activoDto;
} else if($accion=="consultar"){
$siga_reubicacion_activoDto=$siga_reubicacion_activoFacade->selectSiga_reubicacion_activo($siga_reubicacion_activoDto);
echo $siga_reubicacion_activoDto;
} else if( ($accion=="baja") && ($Id_Activo_Reubicacion!="") ){
$siga_reubicacion_activoDto=$siga_reubicacion_activoFacade->deleteSiga_reubicacion_activo($siga_reubicacion_activoDto);
echo $siga_reubicacion_activoDto;
} else if( ($accion=="seleccionar") && ($Id_Activo_Reubicacion!="") ){
$siga_reubicacion_activoDto=$siga_reubicacion_activoFacade->selectSiga_reubicacion_activo($siga_reubicacion_activoDto);
echo $siga_reubicacion_activoDto;
}


?>