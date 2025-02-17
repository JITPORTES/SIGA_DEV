<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_reportes/Siga_reportesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_reportes/Siga_reportesController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_reportesFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_reportes($Siga_reportesDto){
$Siga_reportesDto->setId_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Activo(),"utf8"):strtoupper($Siga_reportesDto->getId_Activo()))))));
if($this->esFecha($Siga_reportesDto->getId_Activo())){
$Siga_reportesDto->setId_Activo($this->fechaMysql($Siga_reportesDto->getId_Activo()));
}
$Siga_reportesDto->setAF_BC(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getAF_BC(),"utf8"):strtoupper($Siga_reportesDto->getAF_BC()))))));
if($this->esFecha($Siga_reportesDto->getAF_BC())){
$Siga_reportesDto->setAF_BC($this->fechaMysql($Siga_reportesDto->getAF_BC()));
}
$Siga_reportesDto->setNombre_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getNombre_Activo(),"utf8"):strtoupper($Siga_reportesDto->getNombre_Activo()))))));
if($this->esFecha($Siga_reportesDto->getNombre_Activo())){
$Siga_reportesDto->setNombre_Activo($this->fechaMysql($Siga_reportesDto->getNombre_Activo()));
}
$Siga_reportesDto->setId_Tipo_Vale_Resg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Tipo_Vale_Resg(),"utf8"):strtoupper($Siga_reportesDto->getId_Tipo_Vale_Resg()))))));
if($this->esFecha($Siga_reportesDto->getId_Tipo_Vale_Resg())){
$Siga_reportesDto->setId_Tipo_Vale_Resg($this->fechaMysql($Siga_reportesDto->getId_Tipo_Vale_Resg()));
}
$Siga_reportesDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Area(),"utf8"):strtoupper($Siga_reportesDto->getId_Area()))))));
if($this->esFecha($Siga_reportesDto->getId_Area())){
$Siga_reportesDto->setId_Area($this->fechaMysql($Siga_reportesDto->getId_Area()));
}
$Siga_reportesDto->setId_Departamento(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Departamento(),"utf8"):strtoupper($Siga_reportesDto->getId_Departamento()))))));
if($this->esFecha($Siga_reportesDto->getId_Departamento())){
$Siga_reportesDto->setId_Departamento($this->fechaMysql($Siga_reportesDto->getId_Departamento()));
}
$Siga_reportesDto->setNum_Empleado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getNum_Empleado(),"utf8"):strtoupper($Siga_reportesDto->getNum_Empleado()))))));
if($this->esFecha($Siga_reportesDto->getNum_Empleado())){
$Siga_reportesDto->setNum_Empleado($this->fechaMysql($Siga_reportesDto->getNum_Empleado()));
}
$Siga_reportesDto->setNombre_Completo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getNombre_Completo(),"utf8"):strtoupper($Siga_reportesDto->getNombre_Completo()))))));
if($this->esFecha($Siga_reportesDto->getNombre_Completo())){
$Siga_reportesDto->setNombre_Completo($this->fechaMysql($Siga_reportesDto->getNombre_Completo()));
}
$Siga_reportesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getFech_Inser(),"utf8"):strtoupper($Siga_reportesDto->getFech_Inser()))))));
if($this->esFecha($Siga_reportesDto->getFech_Inser())){
$Siga_reportesDto->setFech_Inser($this->fechaMysql($Siga_reportesDto->getFech_Inser()));
}
$Siga_reportesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getUsr_Inser(),"utf8"):strtoupper($Siga_reportesDto->getUsr_Inser()))))));
if($this->esFecha($Siga_reportesDto->getUsr_Inser())){
$Siga_reportesDto->setUsr_Inser($this->fechaMysql($Siga_reportesDto->getUsr_Inser()));
}
$Siga_reportesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getFech_Mod(),"utf8"):strtoupper($Siga_reportesDto->getFech_Mod()))))));
if($this->esFecha($Siga_reportesDto->getFech_Mod())){
$Siga_reportesDto->setFech_Mod($this->fechaMysql($Siga_reportesDto->getFech_Mod()));
}
$Siga_reportesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getUsr_Mod(),"utf8"):strtoupper($Siga_reportesDto->getUsr_Mod()))))));
if($this->esFecha($Siga_reportesDto->getUsr_Mod())){
$Siga_reportesDto->setUsr_Mod($this->fechaMysql($Siga_reportesDto->getUsr_Mod()));
}
$Siga_reportesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_reportesDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_reportesDto->getEstatus_Reg())){
$Siga_reportesDto->setEstatus_Reg($this->fechaMysql($Siga_reportesDto->getEstatus_Reg()));
}
$Siga_reportesDto->setFoto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getFoto(),"utf8"):strtoupper($Siga_reportesDto->getFoto()))))));
if($this->esFecha($Siga_reportesDto->getFoto())){
$Siga_reportesDto->setFoto($this->fechaMysql($Siga_reportesDto->getFoto()));
}
$Siga_reportesDto->setId_Clasificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Clasificacion(),"utf8"):strtoupper($Siga_reportesDto->getId_Clasificacion()))))));
if($this->esFecha($Siga_reportesDto->getId_Clasificacion())){
$Siga_reportesDto->setId_Clasificacion($this->fechaMysql($Siga_reportesDto->getId_Clasificacion()));
}
$Siga_reportesDto->setId_Propiedad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Propiedad(),"utf8"):strtoupper($Siga_reportesDto->getId_Propiedad()))))));
if($this->esFecha($Siga_reportesDto->getId_Propiedad())){
$Siga_reportesDto->setId_Propiedad($this->fechaMysql($Siga_reportesDto->getId_Propiedad()));
}
$Siga_reportesDto->setId_Tipo_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Tipo_Activo(),"utf8"):strtoupper($Siga_reportesDto->getId_Tipo_Activo()))))));
if($this->esFecha($Siga_reportesDto->getId_Tipo_Activo())){
$Siga_reportesDto->setId_Tipo_Activo($this->fechaMysql($Siga_reportesDto->getId_Tipo_Activo()));
}
$Siga_reportesDto->setDescCorta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getDescCorta(),"utf8"):strtoupper($Siga_reportesDto->getDescCorta()))))));
if($this->esFecha($Siga_reportesDto->getDescCorta())){
$Siga_reportesDto->setDescCorta($this->fechaMysql($Siga_reportesDto->getDescCorta()));
}
$Siga_reportesDto->setDescLarga(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getDescLarga(),"utf8"):strtoupper($Siga_reportesDto->getDescLarga()))))));
if($this->esFecha($Siga_reportesDto->getDescLarga())){
$Siga_reportesDto->setDescLarga($this->fechaMysql($Siga_reportesDto->getDescLarga()));
}
$Siga_reportesDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Ubic_Prim(),"utf8"):strtoupper($Siga_reportesDto->getId_Ubic_Prim()))))));
if($this->esFecha($Siga_reportesDto->getId_Ubic_Prim())){
$Siga_reportesDto->setId_Ubic_Prim($this->fechaMysql($Siga_reportesDto->getId_Ubic_Prim()));
}
$Siga_reportesDto->setId_Ubic_Sec(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Ubic_Sec(),"utf8"):strtoupper($Siga_reportesDto->getId_Ubic_Sec()))))));
if($this->esFecha($Siga_reportesDto->getId_Ubic_Sec())){
$Siga_reportesDto->setId_Ubic_Sec($this->fechaMysql($Siga_reportesDto->getId_Ubic_Sec()));
}
$Siga_reportesDto->setId_Motivo_Alta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Motivo_Alta(),"utf8"):strtoupper($Siga_reportesDto->getId_Motivo_Alta()))))));
if($this->esFecha($Siga_reportesDto->getId_Motivo_Alta())){
$Siga_reportesDto->setId_Motivo_Alta($this->fechaMysql($Siga_reportesDto->getId_Motivo_Alta()));
}
$Siga_reportesDto->setId_Familia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Familia(),"utf8"):strtoupper($Siga_reportesDto->getId_Familia()))))));
if($this->esFecha($Siga_reportesDto->getId_Familia())){
$Siga_reportesDto->setId_Familia($this->fechaMysql($Siga_reportesDto->getId_Familia()));
}
$Siga_reportesDto->setId_Subfamilia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_Subfamilia(),"utf8"):strtoupper($Siga_reportesDto->getId_Subfamilia()))))));
if($this->esFecha($Siga_reportesDto->getId_Subfamilia())){
$Siga_reportesDto->setId_Subfamilia($this->fechaMysql($Siga_reportesDto->getId_Subfamilia()));
}
$Siga_reportesDto->setMarca(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getMarca(),"utf8"):strtoupper($Siga_reportesDto->getMarca()))))));
if($this->esFecha($Siga_reportesDto->getMarca())){
$Siga_reportesDto->setMarca($this->fechaMysql($Siga_reportesDto->getMarca()));
}
$Siga_reportesDto->setModelo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getModelo(),"utf8"):strtoupper($Siga_reportesDto->getModelo()))))));
if($this->esFecha($Siga_reportesDto->getModelo())){
$Siga_reportesDto->setModelo($this->fechaMysql($Siga_reportesDto->getModelo()));
}
$Siga_reportesDto->setNumSerie(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getNumSerie(),"utf8"):strtoupper($Siga_reportesDto->getNumSerie()))))));
if($this->esFecha($Siga_reportesDto->getNumSerie())){
$Siga_reportesDto->setNumSerie($this->fechaMysql($Siga_reportesDto->getNumSerie()));
}
$Siga_reportesDto->setId_ActivoPadre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getId_ActivoPadre(),"utf8"):strtoupper($Siga_reportesDto->getId_ActivoPadre()))))));
if($this->esFecha($Siga_reportesDto->getId_ActivoPadre())){
$Siga_reportesDto->setId_ActivoPadre($this->fechaMysql($Siga_reportesDto->getId_ActivoPadre()));
}
$Siga_reportesDto->setNumActivoAnterior(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getNumActivoAnterior(),"utf8"):strtoupper($Siga_reportesDto->getNumActivoAnterior()))))));
if($this->esFecha($Siga_reportesDto->getNumActivoAnterior())){
$Siga_reportesDto->setNumActivoAnterior($this->fechaMysql($Siga_reportesDto->getNumActivoAnterior()));
}
$Siga_reportesDto->setParticipaPre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getParticipaPre(),"utf8"):strtoupper($Siga_reportesDto->getParticipaPre()))))));
if($this->esFecha($Siga_reportesDto->getParticipaPre())){
$Siga_reportesDto->setParticipaPre($this->fechaMysql($Siga_reportesDto->getParticipaPre()));
}
$Siga_reportesDto->setParticipaSeguros(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getParticipaSeguros(),"utf8"):strtoupper($Siga_reportesDto->getParticipaSeguros()))))));
if($this->esFecha($Siga_reportesDto->getParticipaSeguros())){
$Siga_reportesDto->setParticipaSeguros($this->fechaMysql($Siga_reportesDto->getParticipaSeguros()));
}
$Siga_reportesDto->setImporteSeguros(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getImporteSeguros(),"utf8"):strtoupper($Siga_reportesDto->getImporteSeguros()))))));
if($this->esFecha($Siga_reportesDto->getImporteSeguros())){
$Siga_reportesDto->setImporteSeguros($this->fechaMysql($Siga_reportesDto->getImporteSeguros()));
}
$Siga_reportesDto->setParticipaCertificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getParticipaCertificacion(),"utf8"):strtoupper($Siga_reportesDto->getParticipaCertificacion()))))));
if($this->esFecha($Siga_reportesDto->getParticipaCertificacion())){
$Siga_reportesDto->setParticipaCertificacion($this->fechaMysql($Siga_reportesDto->getParticipaCertificacion()));
}
$Siga_reportesDto->setGarantia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getGarantia(),"utf8"):strtoupper($Siga_reportesDto->getGarantia()))))));
if($this->esFecha($Siga_reportesDto->getGarantia())){
$Siga_reportesDto->setGarantia($this->fechaMysql($Siga_reportesDto->getGarantia()));
}
$Siga_reportesDto->setExtGarantia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getExtGarantia(),"utf8"):strtoupper($Siga_reportesDto->getExtGarantia()))))));
if($this->esFecha($Siga_reportesDto->getExtGarantia())){
$Siga_reportesDto->setExtGarantia($this->fechaMysql($Siga_reportesDto->getExtGarantia()));
}
$Siga_reportesDto->setAnexo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getAnexo(),"utf8"):strtoupper($Siga_reportesDto->getAnexo()))))));
if($this->esFecha($Siga_reportesDto->getAnexo())){
$Siga_reportesDto->setAnexo($this->fechaMysql($Siga_reportesDto->getAnexo()));
}
$Siga_reportesDto->setEspecifica(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_reportesDto->getEspecifica(),"utf8"):strtoupper($Siga_reportesDto->getEspecifica()))))));
if($this->esFecha($Siga_reportesDto->getEspecifica())){
$Siga_reportesDto->setEspecifica($this->fechaMysql($Siga_reportesDto->getEspecifica()));
}
return $Siga_reportesDto;
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search, $siga_reportesDto, $Datos_Proveedor, $Baja) {
	$Siga_reportesController = new Siga_reportesController();
	return $Siga_reportesController->llenarDataTable($draw,$columns,$order,$start,$length,$search, $siga_reportesDto, $Datos_Proveedor, $Baja);
}

public function selectSiga_reportes($Siga_reportesDto){
$Siga_reportesDto=$this->validarSiga_reportes($Siga_reportesDto);
$Siga_reportesController = new Siga_reportesController();
$Siga_reportesDto = $Siga_reportesController->selectSiga_reportes($Siga_reportesDto);
if($Siga_reportesDto!=""){
$dtoToJson = new DtoToJson($Siga_reportesDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function selectDistinct($Siga_reportesDto,$Valor){
$Siga_reportesController = new Siga_reportesController();
$Siga_reportesDto = $Siga_reportesController->selectDistinct($Siga_reportesDto, $Valor);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_reportesDto);
}

public function insertSiga_reportes($Siga_reportesDto){
//$Siga_reportesDto=$this->validarSiga_reportes($Siga_reportesDto);
$Siga_reportesController = new Siga_reportesController();
$Siga_reportesDto = $Siga_reportesController->insertSiga_reportes($Siga_reportesDto);
if($Siga_reportesDto!=""){
$dtoToJson = new DtoToJson($Siga_reportesDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_reportes($Siga_reportesDto){
//$Siga_reportesDto=$this->validarSiga_reportes($Siga_reportesDto);
$Siga_reportesController = new Siga_reportesController();
$Siga_reportesDto = $Siga_reportesController->updateSiga_reportes($Siga_reportesDto);
if($Siga_reportesDto!=""){
$dtoToJson = new DtoToJson($Siga_reportesDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_reportes($Siga_reportesDto){
//$Siga_reportesDto=$this->validarSiga_reportes($Siga_reportesDto);
$Siga_reportesController = new Siga_reportesController();
$Siga_reportesDto = $Siga_reportesController->deleteSiga_reportes($Siga_reportesDto);
if($Siga_reportesDto==true){
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

@$Id_Activo=$_POST["Id_Activo"];
@$AF_BC=$_POST["AF_BC"];
@$Nombre_Activo=$_POST["Nombre_Activo"];
@$Id_Tipo_Vale_Resg=$_POST["Id_Tipo_Vale_Resg"];
@$Id_Area=$_POST["Id_Area"];
@$Id_Departamento=$_POST["Id_Departamento"];
@$Num_Empleado=$_POST["Num_Empleado"];
@$Nombre_Completo=$_POST["Nombre_Completo"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$Foto=$_POST["Foto"];
@$Id_Clasificacion=$_POST["Id_Clasificacion"];
@$Id_Propiedad=$_POST["Id_Propiedad"];
@$Id_Tipo_Activo=$_POST["Id_Tipo_Activo"];
@$DescCorta=$_POST["DescCorta"];
@$DescLarga=$_POST["DescLarga"];
@$Id_Ubic_Prim=$_POST["Id_Ubic_Prim"];
@$Id_Ubic_Sec=$_POST["Id_Ubic_Sec"];
@$Id_Motivo_Alta=$_POST["Id_Motivo_Alta"];
@$Id_Familia=$_POST["Id_Familia"];
@$Id_Subfamilia=$_POST["Id_Subfamilia"];
@$Marca=$_POST["Marca"];
@$Modelo=$_POST["Modelo"];
@$NumSerie=$_POST["NumSerie"];
@$Id_ActivoPadre=$_POST["Id_ActivoPadre"];
@$NumActivoAnterior=$_POST["NumActivoAnterior"];
@$ParticipaPre=$_POST["ParticipaPre"];
@$ParticipaSeguros=$_POST["ParticipaSeguros"];
@$ImporteSeguros=$_POST["ImporteSeguros"];
@$ParticipaCertificacion=$_POST["ParticipaCertificacion"];
@$Garantia=$_POST["Garantia"];
@$ExtGarantia=$_POST["ExtGarantia"];
@$Anexo=$_POST["Anexo"];
@$Especifica=$_POST["Especifica"];
@$Datos_Proveedor=$_POST["Datos_Proveedor"];
@$Baja=$_POST["Baja"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';
//
@$Valor=$_POST["Valor"];

$siga_reportesFacade = new Siga_reportesFacade();
$siga_reportesDto = new Siga_reportesDTO();

$siga_reportesDto->setId_Activo($Id_Activo);
$siga_reportesDto->setAF_BC($AF_BC);
$siga_reportesDto->setNombre_Activo($Nombre_Activo);
$siga_reportesDto->setId_Tipo_Vale_Resg($Id_Tipo_Vale_Resg);
$siga_reportesDto->setId_Area($Id_Area);
$siga_reportesDto->setId_Departamento($Id_Departamento);
$siga_reportesDto->setNum_Empleado($Num_Empleado);
$siga_reportesDto->setNombre_Completo($Nombre_Completo);
$siga_reportesDto->setFech_Inser($Fech_Inser);
$siga_reportesDto->setUsr_Inser($Usr_Inser);
$siga_reportesDto->setFech_Mod($Fech_Mod);
$siga_reportesDto->setUsr_Mod($Usr_Mod);
$siga_reportesDto->setEstatus_Reg($Estatus_Reg);
$siga_reportesDto->setFoto($Foto);
$siga_reportesDto->setId_Clasificacion($Id_Clasificacion);
$siga_reportesDto->setId_Propiedad($Id_Propiedad);
$siga_reportesDto->setId_Tipo_Activo($Id_Tipo_Activo);
$siga_reportesDto->setDescCorta($DescCorta);
$siga_reportesDto->setDescLarga($DescLarga);
$siga_reportesDto->setId_Ubic_Prim($Id_Ubic_Prim);
$siga_reportesDto->setId_Ubic_Sec($Id_Ubic_Sec);
$siga_reportesDto->setId_Motivo_Alta($Id_Motivo_Alta);
$siga_reportesDto->setId_Familia($Id_Familia);
$siga_reportesDto->setId_Subfamilia($Id_Subfamilia);
$siga_reportesDto->setMarca($Marca);
$siga_reportesDto->setModelo($Modelo);
$siga_reportesDto->setNumSerie($NumSerie);
$siga_reportesDto->setId_ActivoPadre($Id_ActivoPadre);
$siga_reportesDto->setNumActivoAnterior($NumActivoAnterior);
$siga_reportesDto->setParticipaPre($ParticipaPre);
$siga_reportesDto->setParticipaSeguros($ParticipaSeguros);
$siga_reportesDto->setImporteSeguros($ImporteSeguros);
$siga_reportesDto->setParticipaCertificacion($ParticipaCertificacion);
$siga_reportesDto->setGarantia($Garantia);
$siga_reportesDto->setExtGarantia($ExtGarantia);
$siga_reportesDto->setAnexo($Anexo);
$siga_reportesDto->setEspecifica($Especifica);

	if( ($accion=="guardar") && ($Id_Activo=="") ) {
		$siga_reportesDto=$siga_reportesFacade->insertSiga_reportes($siga_reportesDto);
		echo $siga_reportesDto;
	}
	else if(($accion=="guardar") && ($Id_Activo!="")){
		$siga_reportesDto=$siga_reportesFacade->updateSiga_reportes($siga_reportesDto);
		echo $siga_reportesDto;
	}
	else if($accion=="consultar"){
		$siga_reportesDto=$siga_reportesFacade->selectSiga_reportes($siga_reportesDto);
		echo $siga_reportesDto;
	}
	else if( ($accion=="baja") && ($Id_Activo!="") ){
		$siga_reportesDto=$siga_reportesFacade->deleteSiga_reportes($siga_reportesDto);
		echo $siga_reportesDto;
	}
	else if( ($accion=="seleccionar") && ($Id_Activo!="") ){
		$siga_reportesDto=$siga_reportesFacade->selectSiga_reportes($siga_reportesDto);
		echo $siga_reportesDto;
	}
	else if( ($accion=="select_distinct") ){
		$siga_reportesDto=$siga_reportesFacade->selectDistinct($siga_reportesDto, $Valor);
		echo $siga_reportesDto;
	}
	else if($accion=="Reporte_Activos"){
		$columns = isset($_POST["columns"])?$_POST["columns"]:'';
		$order = isset($_POST["order"])?$_POST["order"]:'';
		$start = isset($_POST["start"])?$_POST["start"]:'';
		$length = isset($_POST["length"])?$_POST["length"]:'';
		$search = isset($_POST["search"])?$_POST["search"]:'';
		echo  $siga_reportesFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search, $siga_reportesDto, $Datos_Proveedor, $Baja); 
	}
?>