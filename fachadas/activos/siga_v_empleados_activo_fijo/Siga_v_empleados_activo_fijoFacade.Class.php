<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_v_empleados_activo_fijoFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto){
$Siga_v_empleados_activo_fijoDto->setid(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getid(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getid()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getid())){
$Siga_v_empleados_activo_fijoDto->setid($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getid()));
}
$Siga_v_empleados_activo_fijoDto->setnum_empleado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getnum_empleado(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getnum_empleado()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getnum_empleado())){
$Siga_v_empleados_activo_fijoDto->setnum_empleado($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getnum_empleado()));
}
$Siga_v_empleados_activo_fijoDto->settipo_empleado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->gettipo_empleado(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->gettipo_empleado()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->gettipo_empleado())){
$Siga_v_empleados_activo_fijoDto->settipo_empleado($this->fechaMysql($Siga_v_empleados_activo_fijoDto->gettipo_empleado()));
}
$Siga_v_empleados_activo_fijoDto->setfecha_alta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getfecha_alta(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getfecha_alta()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getfecha_alta())){
$Siga_v_empleados_activo_fijoDto->setfecha_alta($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getfecha_alta()));
}
$Siga_v_empleados_activo_fijoDto->setnombres(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getnombres(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getnombres()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getnombres())){
$Siga_v_empleados_activo_fijoDto->setnombres($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getnombres()));
}
$Siga_v_empleados_activo_fijoDto->setnombre_completo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getnombre_completo(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getnombre_completo()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getnombre_completo())){
$Siga_v_empleados_activo_fijoDto->setnombre_completo($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getnombre_completo()));
}
$Siga_v_empleados_activo_fijoDto->setnombre_completo2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getnombre_completo2(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getnombre_completo2()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getnombre_completo2())){
$Siga_v_empleados_activo_fijoDto->setnombre_completo2($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getnombre_completo2()));
}
$Siga_v_empleados_activo_fijoDto->setpuesto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getpuesto(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getpuesto()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getpuesto())){
$Siga_v_empleados_activo_fijoDto->setpuesto($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getpuesto()));
}
$Siga_v_empleados_activo_fijoDto->setdepartamento(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getdepartamento(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getdepartamento()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getdepartamento())){
$Siga_v_empleados_activo_fijoDto->setdepartamento($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getdepartamento()));
}
$Siga_v_empleados_activo_fijoDto->setgerencia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getgerencia(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getgerencia()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getgerencia())){
$Siga_v_empleados_activo_fijoDto->setgerencia($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getgerencia()));
}
$Siga_v_empleados_activo_fijoDto->setcentro_costo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getcentro_costo(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getcentro_costo()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getcentro_costo())){
$Siga_v_empleados_activo_fijoDto->setcentro_costo($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getcentro_costo()));
}
$Siga_v_empleados_activo_fijoDto->setfoto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getfoto(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getfoto()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getfoto())){
$Siga_v_empleados_activo_fijoDto->setfoto($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getfoto()));
}
$Siga_v_empleados_activo_fijoDto->setapellidos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getapellidos(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getapellidos()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getapellidos())){
$Siga_v_empleados_activo_fijoDto->setapellidos($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getapellidos()));
}
$Siga_v_empleados_activo_fijoDto->setestatus(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getestatus(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getestatus()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getestatus())){
$Siga_v_empleados_activo_fijoDto->setestatus($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getestatus()));
}
$Siga_v_empleados_activo_fijoDto->setnom_estatus(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getnom_estatus(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getnom_estatus()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getnom_estatus())){
$Siga_v_empleados_activo_fijoDto->setnom_estatus($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getnom_estatus()));
}
$Siga_v_empleados_activo_fijoDto->setext_telefonica(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getext_telefonica(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getext_telefonica()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getext_telefonica())){
$Siga_v_empleados_activo_fijoDto->setext_telefonica($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getext_telefonica()));
}
$Siga_v_empleados_activo_fijoDto->setemail(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getemail(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getemail()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getemail())){
$Siga_v_empleados_activo_fijoDto->setemail($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getemail()));
}
$Siga_v_empleados_activo_fijoDto->setEMAIL_CFDI(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_v_empleados_activo_fijoDto->getEMAIL_CFDI(),"utf8"):strtoupper($Siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()))))));
if($this->esFecha($Siga_v_empleados_activo_fijoDto->getEMAIL_CFDI())){
$Siga_v_empleados_activo_fijoDto->setEMAIL_CFDI($this->fechaMysql($Siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()));
}
return $Siga_v_empleados_activo_fijoDto;
}
public function selectSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto){
$Siga_v_empleados_activo_fijoDto=$this->validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
$Siga_v_empleados_activo_fijoController = new Siga_v_empleados_activo_fijoController();
$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoController->selectSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
if($Siga_v_empleados_activo_fijoDto!=""){
$dtoToJson = new DtoToJson($Siga_v_empleados_activo_fijoDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto){
//$Siga_v_empleados_activo_fijoDto=$this->validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
$Siga_v_empleados_activo_fijoController = new Siga_v_empleados_activo_fijoController();
$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoController->insertSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
if($Siga_v_empleados_activo_fijoDto!=""){
$dtoToJson = new DtoToJson($Siga_v_empleados_activo_fijoDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto){
//$Siga_v_empleados_activo_fijoDto=$this->validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
$Siga_v_empleados_activo_fijoController = new Siga_v_empleados_activo_fijoController();
$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoController->updateSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
if($Siga_v_empleados_activo_fijoDto!=""){
$dtoToJson = new DtoToJson($Siga_v_empleados_activo_fijoDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto){
//$Siga_v_empleados_activo_fijoDto=$this->validarSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
$Siga_v_empleados_activo_fijoController = new Siga_v_empleados_activo_fijoController();
$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoController->deleteSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto);
if($Siga_v_empleados_activo_fijoDto==true){
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



@$id=$_POST["id"];
@$num_empleado=$_POST["num_empleado"];
@$tipo_empleado=$_POST["tipo_empleado"];
@$fecha_alta=$_POST["fecha_alta"];
@$nombres=$_POST["nombres"];
@$nombre_completo=$_POST["nombre_completo"];
@$nombre_completo2=$_POST["nombre_completo2"];
@$puesto=$_POST["puesto"];
@$departamento=$_POST["departamento"];
@$gerencia=$_POST["gerencia"];
@$centro_costo=$_POST["centro_costo"];
@$foto=$_POST["foto"];
@$apellidos=$_POST["apellidos"];
@$estatus=$_POST["estatus"];
@$nom_estatus=$_POST["nom_estatus"];
@$ext_telefonica=$_POST["ext_telefonica"];
@$email=$_POST["email"];
@$EMAIL_CFDI=$_POST["EMAIL_CFDI"];
@$accion=$_POST["accion"];

$siga_v_empleados_activo_fijoFacade = new Siga_v_empleados_activo_fijoFacade();
$siga_v_empleados_activo_fijoDto = new Siga_v_empleados_activo_fijoDTO();

$siga_v_empleados_activo_fijoDto->setId($id);
$siga_v_empleados_activo_fijoDto->setNum_empleado($num_empleado);
$siga_v_empleados_activo_fijoDto->setTipo_empleado($tipo_empleado);
$siga_v_empleados_activo_fijoDto->setFecha_alta($fecha_alta);
$siga_v_empleados_activo_fijoDto->setNombres($nombres);
$siga_v_empleados_activo_fijoDto->setNombre_completo($nombre_completo);
$siga_v_empleados_activo_fijoDto->setNombre_completo2($nombre_completo2);
$siga_v_empleados_activo_fijoDto->setPuesto($puesto);
$siga_v_empleados_activo_fijoDto->setDepartamento($departamento);
$siga_v_empleados_activo_fijoDto->setGerencia($gerencia);
$siga_v_empleados_activo_fijoDto->setCentro_costo($centro_costo);
$siga_v_empleados_activo_fijoDto->setFoto($foto);
$siga_v_empleados_activo_fijoDto->setApellidos($apellidos);
$siga_v_empleados_activo_fijoDto->setEstatus($estatus);
$siga_v_empleados_activo_fijoDto->setNom_estatus($nom_estatus);
$siga_v_empleados_activo_fijoDto->setExt_telefonica($ext_telefonica);
$siga_v_empleados_activo_fijoDto->setEmail($email);
$siga_v_empleados_activo_fijoDto->setEMAIL_CFDI($EMAIL_CFDI);

if( ($accion=="guardar") && ($id=="") ){
$siga_v_empleados_activo_fijoDto=$siga_v_empleados_activo_fijoFacade->insertSiga_v_empleados_activo_fijo($siga_v_empleados_activo_fijoDto);
echo $siga_v_empleados_activo_fijoDto;
} else if(($accion=="guardar") && ($id!="")){
$siga_v_empleados_activo_fijoDto=$siga_v_empleados_activo_fijoFacade->updateSiga_v_empleados_activo_fijo($siga_v_empleados_activo_fijoDto);
echo $siga_v_empleados_activo_fijoDto;
} else if($accion=="consultar"){
$siga_v_empleados_activo_fijoDto=$siga_v_empleados_activo_fijoFacade->selectSiga_v_empleados_activo_fijo($siga_v_empleados_activo_fijoDto);
echo $siga_v_empleados_activo_fijoDto;
} else if( ($accion=="baja") && ($id!="") ){
$siga_v_empleados_activo_fijoDto=$siga_v_empleados_activo_fijoFacade->deleteSiga_v_empleados_activo_fijo($siga_v_empleados_activo_fijoDto);
echo $siga_v_empleados_activo_fijoDto;
} else if( ($accion=="seleccionar") && ($id!="") ){
$siga_v_empleados_activo_fijoDto=$siga_v_empleados_activo_fijoFacade->selectSiga_v_empleados_activo_fijo($siga_v_empleados_activo_fijoDto);
echo $siga_v_empleados_activo_fijoDto;
}


?>