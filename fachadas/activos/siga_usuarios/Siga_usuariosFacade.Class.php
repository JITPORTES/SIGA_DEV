<?php
session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuarios/Siga_usuariosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_usuarios/Siga_usuariosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_usuariosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_usuarios($Siga_usuariosDto){
//$Siga_usuariosDto->setId_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getId_Usuario(),"utf8"):strtoupper($Siga_usuariosDto->getId_Usuario()))))));
//if($this->esFecha($Siga_usuariosDto->getId_Usuario())){
//$Siga_usuariosDto->setId_Usuario($this->fechaMysql($Siga_usuariosDto->getId_Usuario()));
//}
$Siga_usuariosDto->setNo_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getNo_Usuario(),"utf8"):strtoupper($Siga_usuariosDto->getNo_Usuario()))))));
if($this->esFecha($Siga_usuariosDto->getNo_Usuario())){
$Siga_usuariosDto->setNo_Usuario($this->fechaMysql($Siga_usuariosDto->getNo_Usuario()));
}
$Siga_usuariosDto->setNombre_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getNombre_Usuario(),"utf8"):strtoupper($Siga_usuariosDto->getNombre_Usuario()))))));
if($this->esFecha($Siga_usuariosDto->getNombre_Usuario())){
$Siga_usuariosDto->setNombre_Usuario($this->fechaMysql($Siga_usuariosDto->getNombre_Usuario()));
}
$Siga_usuariosDto->setUsuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getUsuario(),"utf8"):strtoupper($Siga_usuariosDto->getUsuario()))))));
if($this->esFecha($Siga_usuariosDto->getUsuario())){
$Siga_usuariosDto->setUsuario($this->fechaMysql($Siga_usuariosDto->getUsuario()));
}
$Siga_usuariosDto->setPassword(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getPassword(),"utf8"):strtoupper($Siga_usuariosDto->getPassword()))))));
if($this->esFecha($Siga_usuariosDto->getPassword())){
$Siga_usuariosDto->setPassword($this->fechaMysql($Siga_usuariosDto->getPassword()));
}
$Siga_usuariosDto->setPuesto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getPuesto(),"utf8"):strtoupper($Siga_usuariosDto->getPuesto()))))));
if($this->esFecha($Siga_usuariosDto->getPuesto())){
$Siga_usuariosDto->setPuesto($this->fechaMysql($Siga_usuariosDto->getPuesto()));
}
$Siga_usuariosDto->setActivo_Fijo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getActivo_Fijo(),"utf8"):strtoupper($Siga_usuariosDto->getActivo_Fijo()))))));
if($this->esFecha($Siga_usuariosDto->getActivo_Fijo())){
$Siga_usuariosDto->setActivo_Fijo($this->fechaMysql($Siga_usuariosDto->getActivo_Fijo()));
}
$Siga_usuariosDto->setMesa_Ayuda(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getMesa_Ayuda(),"utf8"):strtoupper($Siga_usuariosDto->getMesa_Ayuda()))))));
if($this->esFecha($Siga_usuariosDto->getMesa_Ayuda())){
$Siga_usuariosDto->setMesa_Ayuda($this->fechaMysql($Siga_usuariosDto->getMesa_Ayuda()));
}
$Siga_usuariosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getFech_Inser(),"utf8"):strtoupper($Siga_usuariosDto->getFech_Inser()))))));
if($this->esFecha($Siga_usuariosDto->getFech_Inser())){
$Siga_usuariosDto->setFech_Inser($this->fechaMysql($Siga_usuariosDto->getFech_Inser()));
}
$Siga_usuariosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_usuariosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_usuariosDto->getUsr_Inser())){
$Siga_usuariosDto->setUsr_Inser($this->fechaMysql($Siga_usuariosDto->getUsr_Inser()));
}
$Siga_usuariosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getFech_Mod(),"utf8"):strtoupper($Siga_usuariosDto->getFech_Mod()))))));
if($this->esFecha($Siga_usuariosDto->getFech_Mod())){
$Siga_usuariosDto->setFech_Mod($this->fechaMysql($Siga_usuariosDto->getFech_Mod()));
}
$Siga_usuariosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_usuariosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_usuariosDto->getUsr_Mod())){
$Siga_usuariosDto->setUsr_Mod($this->fechaMysql($Siga_usuariosDto->getUsr_Mod()));
}
$Siga_usuariosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_usuariosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_usuariosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_usuariosDto->getEstatus_Reg())){
$Siga_usuariosDto->setEstatus_Reg($this->fechaMysql($Siga_usuariosDto->getEstatus_Reg()));
}
return $Siga_usuariosDto;
}
public function selectSiga_usuarios($Siga_usuariosDto){
$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosController = new Siga_usuariosController();
$Siga_usuariosDto = $Siga_usuariosController->selectSiga_usuarios($Siga_usuariosDto);
if($Siga_usuariosDto!=""){
$dtoToJson = new DtoToJson($Siga_usuariosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function selectSiga_login($Siga_usuariosDto, $EstProc, $Sistema, $Solicitud, $Seccion, $Usuario_Id, $Area_Id){
$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosController = new Siga_usuariosController();

$decrypt_Id_Usuario="";
$decrypt_EstProc="";
$decrypt_Sistema="";
$decrypt_Solicitud="";
if($Siga_usuariosDto->getId_Usuario()!=""){
	$decrypt_Id_Usuario=$this->decrypt($Siga_usuariosDto->getId_Usuario(),'siga');
	$Siga_usuariosDto->setId_Usuario($decrypt_Id_Usuario);
	$decrypt_EstProc=$this->decrypt($Siga_usuariosDto->getEstProc(),'siga');
	$decrypt_Sistema=$this->decrypt($Siga_usuariosDto->getSistema(),'siga');
	$decrypt_Solicitud=$this->decrypt($Siga_usuariosDto->getSolicitud(),'siga');
}


$Siga_usuariosDto = $Siga_usuariosController->selectSiga_login($Siga_usuariosDto);
$json = "";
if($Siga_usuariosDto!=""){
$_SESSION['Nombre_Usuario']=$Siga_usuariosDto[0]->getNombre_Usuario();
$_SESSION['Id_Usuario']=$Siga_usuariosDto[0]->getId_Usuario();
$_SESSION['Activo_Fijo']=$Siga_usuariosDto[0]->getActivo_Fijo();
$_SESSION['Mesa_Ayuda']=$Siga_usuariosDto[0]->getMesa_Ayuda();
$_SESSION['No_Usuario']=$Siga_usuariosDto[0]->getNo_Usuario();
//Parametros por url
$_SESSION['url_est_proceso']=$EstProc;
$_SESSION['url_sistema']=$Sistema;
$_SESSION['url_id_solicitud']=$Solicitud;
$_SESSION['url_id_seccion']=$Seccion;
$_SESSION['url_id_usuario']=$Usuario_Id;
$_SESSION['url_id_area']=$Area_Id;
//Si el usuario existe se va hacia esta direccion
$json .= '{"estatus":"ok","Id_Usuario":"'.$Siga_usuariosDto[0]->getId_Usuario().'", "location":"inicio.php"}';
}
else
{
$json .= '{"estatus":"fail"}';
}
echo $json;
//if($Siga_usuariosDto!=""){
//$dtoToJson = new DtoToJson($Siga_usuariosDto);
//return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
//}
//$jsonDto = new Encode_JSON();
//return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}


public function romper_sesion(){
	session_start();
	unset($_SESSION["url_id_area"]);
	unset($_SESSION["url_est_proceso"]);
	unset($_SESSION["url_sistema"]);
	unset($_SESSION["url_id_solicitud"]);
	unset($_SESSION["url_id_seccion"]);
	//unset($_SESSION["url_id_usuario"]);
	$json .= '{"estatus":"ok"}';
	echo $json;
}


/////////////////
public function selectTcausr($TcausrDto){
$TcausrDto=$this->validarTcausr($TcausrDto);
$TcausrController = new TcausrController();
$TcausrDto = $TcausrController->selectTcausr($TcausrDto);
$json = "";
if($TcausrDto!=""){
$_SESSION['Nombre']=$TcausrDto[0]->getnombre();
//$json .= '{"estatus":"ok","location":"inicio.php"}';
}
else
{
$json .= '{"estatus":"fail"}';
}
echo $json;
}




//Funcion Para desemcriptar
public function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}


public function selectSiga_usuariosareascargos($Siga_usuariosDto){
$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosController = new Siga_usuariosController();
$Siga_usuariosDto = $Siga_usuariosController->selectSiga_usuariosareascargos($Siga_usuariosDto);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_usuariosDto);
}
public function insertSiga_usuarios($Siga_usuariosDto){
//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosController = new Siga_usuariosController();
$Siga_usuariosDto = $Siga_usuariosController->insertSiga_usuarios($Siga_usuariosDto);
if($Siga_usuariosDto!=""){
$dtoToJson = new DtoToJson($Siga_usuariosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function insertusuariosdetalle($Siga_usuariosDto, $Arraymenu, $CadenaAreas, $CadenaCargos){
//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosController = new Siga_usuariosController();
$Siga_usuariosDto = $Siga_usuariosController->insertusuariosdetalle($Siga_usuariosDto, $Arraymenu, $CadenaAreas, $CadenaCargos);
//if($Siga_usuariosDto!=""){
$jsonDto = new Encode_JSON();
//return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
//}
//$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_usuariosDto);
}

public function updateusuariosdetalle($Siga_usuariosDto, $Arraymenu, $CadenaAreas, $CadenaCargos){
//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosController = new Siga_usuariosController();
$Siga_usuariosDto = $Siga_usuariosController->updateusuariosdetalle($Siga_usuariosDto, $Arraymenu, $CadenaAreas, $CadenaCargos);
//if($Siga_usuariosDto!=""){
$jsonDto = new Encode_JSON();
//return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
//}
//$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_usuariosDto);
}


public function consultar_depto($No_Usuario){
$Siga_usuariosController = new Siga_usuariosController();
$Siga_usuariosDto = $Siga_usuariosController->consultar_depto($No_Usuario);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_usuariosDto);
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search) {
$Siga_usuariosController = new Siga_usuariosController();
return $Siga_usuariosController->llenarDataTable($draw,$columns,$order,$start,$length,$search);
}

public function updateSiga_usuarios($Siga_usuariosDto){
//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosController = new Siga_usuariosController();
$Siga_usuariosDto = $Siga_usuariosController->updateSiga_usuarios($Siga_usuariosDto);
if($Siga_usuariosDto!=""){
$dtoToJson = new DtoToJson($Siga_usuariosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_usuarios($Siga_usuariosDto){
//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosController = new Siga_usuariosController();
$Siga_usuariosDto = $Siga_usuariosController->deleteSiga_usuarios($Siga_usuariosDto);
if($Siga_usuariosDto==true){
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



@$Id_Usuario=$_POST["Id_Usuario"];
@$No_Usuario=$_POST["No_Usuario"];
@$Nombre_Usuario=$_POST["Nombre_Usuario"];
@$Correo=$_POST["Correo"];
@$Usuario=$_POST["Usuario"];
@$Password=$_POST["Password"];
@$Puesto=$_POST["Puesto"];
@$Activo_Fijo=$_POST["Activo_Fijo"];
@$Mesa_Ayuda=$_POST["Mesa_Ayuda"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$CadenaAreas=$_POST["CadenaAreas"];
@$CadenaCargos=$_POST["CadenaCargos"];
@$Arraymenu=$_POST["Arraymenu"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';
//Variables loguearse desde otra pantalla
@$EstProc=$_POST["EstProc"];
@$Sistema=$_POST["Sistema"];
@$Solicitud=$_POST["Solicitud"];
@$Seccion=$_POST["Seccion"];
@$Usuario_Id=$_POST["Usuario_Id"];
@$Area_Id=$_POST["Area_Id"];
$siga_usuariosFacade = new Siga_usuariosFacade();
$siga_usuariosDto = new Siga_usuariosDTO();

$siga_usuariosDto->setId_Usuario($Id_Usuario);
$siga_usuariosDto->setNo_Usuario($No_Usuario);
$siga_usuariosDto->setNombre_Usuario($Nombre_Usuario);
$siga_usuariosDto->setCorreo($Correo);
$siga_usuariosDto->setUsuario($Usuario);
$siga_usuariosDto->setPassword($Password);
$siga_usuariosDto->setPuesto($Puesto);
$siga_usuariosDto->setActivo_Fijo($Activo_Fijo);
$siga_usuariosDto->setMesa_Ayuda($Mesa_Ayuda);
$siga_usuariosDto->setFech_Inser($Fech_Inser);
$siga_usuariosDto->setUsr_Inser($Usr_Inser);
$siga_usuariosDto->setFech_Mod($Fech_Mod);
$siga_usuariosDto->setUsr_Mod($Usr_Mod);
$siga_usuariosDto->setEstatus_Reg($Estatus_Reg);
$siga_usuariosDto->setEstProc($EstProc);
$siga_usuariosDto->setSistema($Sistema);
$siga_usuariosDto->setSolicitud($Solicitud);

if( ($accion=="guardar") && ($Id_Usuario=="") ){
$siga_usuariosDto=$siga_usuariosFacade->insertSiga_usuarios($siga_usuariosDto);
echo $siga_usuariosDto;
} else if(($accion=="guardar") && ($Id_Usuario!="")){
$siga_usuariosDto=$siga_usuariosFacade->updateSiga_usuarios($siga_usuariosDto);
echo $siga_usuariosDto;
}else if(($accion=="guardardetalle")){
$siga_usuariosDto=$siga_usuariosFacade->insertusuariosdetalle($siga_usuariosDto, $Arraymenu, $CadenaAreas, $CadenaCargos);
echo $siga_usuariosDto;
}else if(($accion=="modificardetalle")){
$siga_usuariosDto=$siga_usuariosFacade->updateusuariosdetalle($siga_usuariosDto, $Arraymenu, $CadenaAreas, $CadenaCargos);
echo $siga_usuariosDto;
}else if($accion=="consultar"){
$siga_usuariosDto=$siga_usuariosFacade->selectSiga_usuarios($siga_usuariosDto);
echo $siga_usuariosDto;
}else if($accion=="login"){
$siga_usuariosDto=$siga_usuariosFacade->selectSiga_login($siga_usuariosDto, $EstProc, $Sistema, $Solicitud, $Seccion, $Usuario_Id, $Area_Id);
echo $siga_usuariosDto;
}else if($accion=="consultarusuariosareas"){
$siga_usuariosDto=$siga_usuariosFacade->selectSiga_usuariosareascargos($siga_usuariosDto);
echo $siga_usuariosDto;
}else if($accion=="romper_sesion"){
$siga_usuariosDto=$siga_usuariosFacade->romper_sesion();
echo $siga_usuariosDto;
}else if($accion=="consultar_depto"){
$siga_usuariosDto=$siga_usuariosFacade->consultar_depto($No_Usuario);
echo $siga_usuariosDto;
}
 else if( ($accion=="baja") && ($Id_Usuario!="") ){
$siga_usuariosDto=$siga_usuariosFacade->deleteSiga_usuarios($siga_usuariosDto);
echo $siga_usuariosDto;
} else if( ($accion=="seleccionar") && ($Id_Usuario!="") ){
$siga_usuariosDto=$siga_usuariosFacade->selectSiga_usuarios($siga_usuariosDto);
echo $siga_usuariosDto;
} else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
echo  $siga_usuariosDto=$siga_usuariosFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search); 
}
?>