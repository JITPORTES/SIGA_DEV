<?php

//session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_solicitud_prestamos/Siga_solicitud_prestamosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_solicitud_prestamos/Siga_solicitud_prestamosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_solicitud_prestamosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_solicitud_prestamos($Siga_solicitud_prestamosDto){
$Siga_solicitud_prestamosDto->setId_Solicitud(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getId_Solicitud(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getId_Solicitud()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getId_Solicitud())){
$Siga_solicitud_prestamosDto->setId_Solicitud($this->fechaMysql($Siga_solicitud_prestamosDto->getId_Solicitud()));
}

$Siga_solicitud_prestamosDto->setId_Categoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getId_Categoria(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getId_Categoria()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getId_Categoria())){
$Siga_solicitud_prestamosDto->setId_Categoria($this->fechaMysql($Siga_solicitud_prestamosDto->getId_Categoria()));
}

$Siga_solicitud_prestamosDto->setId_Subcategoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getId_Subcategoria(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getId_Subcategoria()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getId_Subcategoria())){
$Siga_solicitud_prestamosDto->setId_Subcategoria($this->fechaMysql($Siga_solicitud_prestamosDto->getId_Subcategoria()));
}

$Siga_solicitud_prestamosDto->setId_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getId_Usuario(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getId_Usuario()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getId_Usuario())){
$Siga_solicitud_prestamosDto->setId_Usuario($this->fechaMysql($Siga_solicitud_prestamosDto->getId_Usuario()));
}
$Siga_solicitud_prestamosDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getId_Area(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getId_Area()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getId_Area())){
$Siga_solicitud_prestamosDto->setId_Area($this->fechaMysql($Siga_solicitud_prestamosDto->getId_Area()));
}
$Siga_solicitud_prestamosDto->setId_Medio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getId_Medio(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getId_Medio()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getId_Medio())){
$Siga_solicitud_prestamosDto->setId_Medio($this->fechaMysql($Siga_solicitud_prestamosDto->getId_Medio()));
}
$Siga_solicitud_prestamosDto->setSeccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getSeccion(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getSeccion()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getSeccion())){
$Siga_solicitud_prestamosDto->setSeccion($this->fechaMysql($Siga_solicitud_prestamosDto->getSeccion()));
}
$Siga_solicitud_prestamosDto->setTitulo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getTitulo(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getTitulo()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getTitulo())){
$Siga_solicitud_prestamosDto->setTitulo($this->fechaMysql($Siga_solicitud_prestamosDto->getTitulo()));
}
//$Siga_solicitud_prestamosDto->setId_Det_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getId_Det_Actividad(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getId_Det_Actividad()))))));
//if($this->esFecha($Siga_solicitud_prestamosDto->getId_Det_Actividad())){
//$Siga_solicitud_prestamosDto->setId_Det_Actividad($this->fechaMysql($Siga_solicitud_prestamosDto->getId_Det_Actividad()));
//}
$Siga_solicitud_prestamosDto->setDesc_Motivo_Reporte(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getDesc_Motivo_Reporte(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getDesc_Motivo_Reporte())){
$Siga_solicitud_prestamosDto->setDesc_Motivo_Reporte($this->fechaMysql($Siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()));
}
$Siga_solicitud_prestamosDto->setPrioridad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getPrioridad(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getPrioridad()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getPrioridad())){
$Siga_solicitud_prestamosDto->setPrioridad($this->fechaMysql($Siga_solicitud_prestamosDto->getPrioridad()));
}
$Siga_solicitud_prestamosDto->setUrl_archivo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getUrl_archivo(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getUrl_archivo()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getUrl_archivo())){
$Siga_solicitud_prestamosDto->setUrl_archivo($this->fechaMysql($Siga_solicitud_prestamosDto->getUrl_archivo()));
}
$Siga_solicitud_prestamosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getFech_Inser(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getFech_Inser()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getFech_Inser())){
$Siga_solicitud_prestamosDto->setFech_Inser($this->fechaMysql($Siga_solicitud_prestamosDto->getFech_Inser()));
}
$Siga_solicitud_prestamosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getUsr_Inser())){
$Siga_solicitud_prestamosDto->setUsr_Inser($this->fechaMysql($Siga_solicitud_prestamosDto->getUsr_Inser()));
}
$Siga_solicitud_prestamosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getFech_Mod(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getFech_Mod()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getFech_Mod())){
$Siga_solicitud_prestamosDto->setFech_Mod($this->fechaMysql($Siga_solicitud_prestamosDto->getFech_Mod()));
}
$Siga_solicitud_prestamosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getUsr_Mod())){
$Siga_solicitud_prestamosDto->setUsr_Mod($this->fechaMysql($Siga_solicitud_prestamosDto->getUsr_Mod()));
}
$Siga_solicitud_prestamosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getEstatus_Reg())){
$Siga_solicitud_prestamosDto->setEstatus_Reg($this->fechaMysql($Siga_solicitud_prestamosDto->getEstatus_Reg()));
}
$Siga_solicitud_prestamosDto->setEstatus_Proceso(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getEstatus_Proceso(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getEstatus_Proceso()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getEstatus_Proceso())){
$Siga_solicitud_prestamosDto->setEstatus_Proceso($this->fechaMysql($Siga_solicitud_prestamosDto->getEstatus_Proceso()));
}

$Siga_solicitud_prestamosDto->setTituloCierre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getTituloCierre(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getTituloCierre()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getTituloCierre())){
$Siga_solicitud_prestamosDto->setTituloCierre($this->fechaMysql($Siga_solicitud_prestamosDto->getTituloCierre()));
}

$Siga_solicitud_prestamosDto->setComentarioCierre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getComentarioCierre(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getComentarioCierre()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getComentarioCierre())){
$Siga_solicitud_prestamosDto->setComentarioCierre($this->fechaMysql($Siga_solicitud_prestamosDto->getComentarioCierre()));
}
$Siga_solicitud_prestamosDto->setAccesorios_Cierre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getAccesorios_Cierre(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getAccesorios_Cierre()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getAccesorios_Cierre())){
$Siga_solicitud_prestamosDto->setAccesorios_Cierre($this->fechaMysql($Siga_solicitud_prestamosDto->getAccesorios_Cierre()));
}
$Siga_solicitud_prestamosDto->setFecha_Prestamo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getFecha_Prestamo(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getFecha_Prestamo()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getFecha_Prestamo())){
$Siga_solicitud_prestamosDto->setFecha_Prestamo($this->fechaMysql($Siga_solicitud_prestamosDto->getFecha_Prestamo()));
}
$Siga_solicitud_prestamosDto->setFecha_Devolucion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_prestamosDto->getFecha_Devolucion(),"utf8"):strtoupper($Siga_solicitud_prestamosDto->getFecha_Devolucion()))))));
if($this->esFecha($Siga_solicitud_prestamosDto->getFecha_Devolucion())){
$Siga_solicitud_prestamosDto->setFecha_Devolucion($this->fechaMysql($Siga_solicitud_prestamosDto->getFecha_Devolucion()));
}
return $Siga_solicitud_prestamosDto;
}
public function selectSiga_solicitud_prestamos($Siga_solicitud_prestamosDto){
//$Siga_solicitud_prestamosDto=$this->validarSiga_solicitud_prestamos($Siga_solicitud_prestamosDto);
$Siga_solicitud_prestamosController = new Siga_solicitud_prestamosController();
$Siga_solicitud_prestamosDto = $Siga_solicitud_prestamosController->selectSiga_solicitud_prestamos($Siga_solicitud_prestamosDto);
if($Siga_solicitud_prestamosDto!=""){
$dtoToJson = new DtoToJson($Siga_solicitud_prestamosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_solicitud_prestamos($Siga_solicitud_prestamosDto){	
$Siga_solicitud_prestamosController = new Siga_solicitud_prestamosController();
$Siga_solicitud_prestamosDto = $Siga_solicitud_prestamosController->insertSiga_solicitud_prestamos($Siga_solicitud_prestamosDto);
if($Siga_solicitud_prestamosDto!=""){
$dtoToJson = new DtoToJson($Siga_solicitud_prestamosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Estatus_Proceso, $siga_solicitud_prestamosDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor) {
$Siga_solicitud_prestamosController = new Siga_solicitud_prestamosController();
return $Siga_solicitud_prestamosController->llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Estatus_Proceso, $siga_solicitud_prestamosDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor);
}
public function updateSiga_solicitud_prestamos($Siga_solicitud_prestamosDto){
$Siga_solicitud_prestamosController = new Siga_solicitud_prestamosController();
$Siga_solicitud_prestamosDto = $Siga_solicitud_prestamosController->updateSiga_solicitud_prestamos($Siga_solicitud_prestamosDto);
if($Siga_solicitud_prestamosDto!=""){
$dtoToJson = new DtoToJson($Siga_solicitud_prestamosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}

public function reporte_prestamo($Siga_solicitud_prestamosDto){
$Siga_solicitud_prestamosController = new Siga_solicitud_prestamosController();
$Siga_solicitud_prestamosDto = $Siga_solicitud_prestamosController->reporte_prestamo($Siga_solicitud_prestamosDto);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_prestamosDto);
}

public function deleteSiga_solicitud_prestamos($Siga_solicitud_prestamosDto){
//$Siga_solicitud_prestamosDto=$this->validarSiga_solicitud_prestamos($Siga_solicitud_prestamosDto);
$Siga_solicitud_prestamosController = new Siga_solicitud_prestamosController();
$Siga_solicitud_prestamosDto = $Siga_solicitud_prestamosController->deleteSiga_solicitud_prestamos($Siga_solicitud_prestamosDto);
if($Siga_solicitud_prestamosDto==true){
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



@$Id_Solicitud=$_POST["Id_Solicitud"];
@$Id_Activo=$_POST["Id_Activo"];
@$Id_Usuario=$_POST["Id_Usuario"];
@$Id_Area=$_POST["Id_Area"];
@$Id_Categoria=$_POST["Id_Categoria"];
@$Id_Gestor=$_POST["Id_Gestor"];
@$Id_Subcategoria=$_POST["Id_Subcategoria"];
@$Id_Medio=$_POST["Id_Medio"];
@$Seccion=$_POST["Seccion"];
@$Titulo=$_POST["Titulo"];
@$Id_Det_Actividad=$_POST["Id_Det_Actividad"];
@$Desc_Motivo_Reporte=$_POST["Desc_Motivo_Reporte"];
@$Prioridad=$_POST["Prioridad"];
@$Url_archivo=$_POST["Url_archivo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$Estatus_Proceso=$_POST["Estatus_Proceso"];
@$TituloCierre=$_POST["TituloCierre"];
@$Accesorios_Cierre=$_POST["Accesorios_Cierre"];
@$ComentarioCierre=$_POST["ComentarioCierre"];
@$Fecha_Prestamo=$_POST["Fecha_Prestamo"];
@$Fecha_Devolucion=$_POST["Fecha_Devolucion"];
@$ComentarioEntrega=$_POST["ComentarioEntrega"];
@$Fecha_Entrega=$_POST["Fecha_Entrega"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';

@$Gestor_Solicitante=$_POST["Gestor_Solicitante"];
@$Id_Seccion=$_POST["Id_Seccion"];
@$Tipo_Gestor=$_POST["Tipo_Gestor"];




$siga_solicitud_prestamosFacade = new Siga_solicitud_prestamosFacade();
$siga_solicitud_prestamosDto = new Siga_solicitud_prestamosDTO();

$siga_solicitud_prestamosDto->setId_Solicitud($Id_Solicitud);
$siga_solicitud_prestamosDto->setId_Activo($Id_Activo);
$siga_solicitud_prestamosDto->setId_Usuario($Id_Usuario);
$siga_solicitud_prestamosDto->setId_Area($Id_Area);
$siga_solicitud_prestamosDto->setId_Categoria($Id_Categoria);
$siga_solicitud_prestamosDto->setId_Subcategoria($Id_Subcategoria);
$siga_solicitud_prestamosDto->setId_Gestor($Id_Gestor);
$siga_solicitud_prestamosDto->setId_Medio($Id_Medio);
$siga_solicitud_prestamosDto->setSeccion($Seccion);
$siga_solicitud_prestamosDto->setTitulo($Titulo);
$siga_solicitud_prestamosDto->setId_Det_Actividad($Id_Det_Actividad);
$siga_solicitud_prestamosDto->setDesc_Motivo_Reporte($Desc_Motivo_Reporte);
$siga_solicitud_prestamosDto->setPrioridad($Prioridad);
$siga_solicitud_prestamosDto->setUrl_archivo($Url_archivo);
$siga_solicitud_prestamosDto->setFech_Inser($Fech_Inser);
$siga_solicitud_prestamosDto->setUsr_Inser($Usr_Inser);
$siga_solicitud_prestamosDto->setFech_Mod($Fech_Mod);
$siga_solicitud_prestamosDto->setUsr_Mod($Usr_Mod);
$siga_solicitud_prestamosDto->setEstatus_Reg($Estatus_Reg);
$siga_solicitud_prestamosDto->setEstatus_Proceso($Estatus_Proceso);
$siga_solicitud_prestamosDto->setTituloCierre($TituloCierre);
$siga_solicitud_prestamosDto->setAccesorios_Cierre($Accesorios_Cierre);
$siga_solicitud_prestamosDto->setComentarioCierre($ComentarioCierre);
$siga_solicitud_prestamosDto->setFecha_Prestamo($Fecha_Prestamo);
$siga_solicitud_prestamosDto->setFecha_Devolucion($Fecha_Devolucion);
$siga_solicitud_prestamosDto->setFecha_Entrega($Fecha_Entrega);
$siga_solicitud_prestamosDto->setComentarioEntrega($ComentarioEntrega);

if( ($accion=="guardar") && ($Id_Solicitud=="") ){
$siga_solicitud_prestamosDto=$siga_solicitud_prestamosFacade->insertSiga_solicitud_prestamos($siga_solicitud_prestamosDto);
echo $siga_solicitud_prestamosDto;
} else if(($accion=="guardar") && ($Id_Solicitud!="")){
$siga_solicitud_prestamosDto=$siga_solicitud_prestamosFacade->updateSiga_solicitud_prestamos($siga_solicitud_prestamosDto);
echo $siga_solicitud_prestamosDto;
} else if($accion=="consultar"){
$siga_solicitud_prestamosDto=$siga_solicitud_prestamosFacade->selectSiga_solicitud_prestamos($siga_solicitud_prestamosDto);
echo $siga_solicitud_prestamosDto;
}else if($accion=="reporte_prestamo"){
$siga_solicitud_prestamosDto=$siga_solicitud_prestamosFacade->reporte_prestamo($siga_solicitud_prestamosDto);
echo $siga_solicitud_prestamosDto;
} else if( ($accion=="baja") && ($Id_Solicitud!="") ){
$siga_solicitud_prestamosDto=$siga_solicitud_prestamosFacade->deleteSiga_solicitud_prestamos($siga_solicitud_prestamosDto);
echo $siga_solicitud_prestamosDto;
} else if( ($accion=="seleccionar") && ($Id_Solicitud!="") ){
$siga_solicitud_prestamosDto=$siga_solicitud_prestamosFacade->selectSiga_solicitud_prestamos($siga_solicitud_prestamosDto);
echo $siga_solicitud_prestamosDto;
}else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
$Id_Estatus_Proceso = isset($_POST["Estatus_Proceso"])?$_POST["Estatus_Proceso"]:'';
echo  $siga_solicitud_prestamosFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Estatus_Proceso, $siga_solicitud_prestamosDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor); 
}


?>