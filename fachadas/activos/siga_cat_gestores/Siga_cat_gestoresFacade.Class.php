<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_gestores/Siga_cat_gestoresDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_gestores/Siga_cat_gestoresController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");

class Siga_cat_gestoresFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_gestores($Siga_cat_gestoresDto){
$Siga_cat_gestoresDto->setId_Gestor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getId_Gestor(),"utf8"):strtoupper($Siga_cat_gestoresDto->getId_Gestor()))))));
if($this->esFecha($Siga_cat_gestoresDto->getId_Gestor())){
$Siga_cat_gestoresDto->setId_Gestor($this->fechaMysql($Siga_cat_gestoresDto->getId_Gestor()));
}
$Siga_cat_gestoresDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getId_Area(),"utf8"):strtoupper($Siga_cat_gestoresDto->getId_Area()))))));
if($this->esFecha($Siga_cat_gestoresDto->getId_Area())){
$Siga_cat_gestoresDto->setId_Area($this->fechaMysql($Siga_cat_gestoresDto->getId_Area()));
}
$Siga_cat_gestoresDto->setId_Seccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getId_Seccion(),"utf8"):strtoupper($Siga_cat_gestoresDto->getId_Seccion()))))));
if($this->esFecha($Siga_cat_gestoresDto->getId_Seccion())){
$Siga_cat_gestoresDto->setId_Seccion($this->fechaMysql($Siga_cat_gestoresDto->getId_Seccion()));
}
$Siga_cat_gestoresDto->setTipo_Gestor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getTipo_Gestor(),"utf8"):strtoupper($Siga_cat_gestoresDto->getTipo_Gestor()))))));
if($this->esFecha($Siga_cat_gestoresDto->getTipo_Gestor())){
$Siga_cat_gestoresDto->setTipo_Gestor($this->fechaMysql($Siga_cat_gestoresDto->getTipo_Gestor()));
}
$Siga_cat_gestoresDto->setId_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getId_Usuario(),"utf8"):strtoupper($Siga_cat_gestoresDto->getId_Usuario()))))));
if($this->esFecha($Siga_cat_gestoresDto->getId_Usuario())){
$Siga_cat_gestoresDto->setId_Usuario($this->fechaMysql($Siga_cat_gestoresDto->getId_Usuario()));
}
$Siga_cat_gestoresDto->setNombre_Empleado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getNombre_Empleado(),"utf8"):strtoupper($Siga_cat_gestoresDto->getNombre_Empleado()))))));
if($this->esFecha($Siga_cat_gestoresDto->getNombre_Empleado())){
$Siga_cat_gestoresDto->setNombre_Empleado($this->fechaMysql($Siga_cat_gestoresDto->getNombre_Empleado()));
}
$Siga_cat_gestoresDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_gestoresDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_gestoresDto->getFech_Inser())){
$Siga_cat_gestoresDto->setFech_Inser($this->fechaMysql($Siga_cat_gestoresDto->getFech_Inser()));
}
$Siga_cat_gestoresDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_gestoresDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_gestoresDto->getUsr_Inser())){
$Siga_cat_gestoresDto->setUsr_Inser($this->fechaMysql($Siga_cat_gestoresDto->getUsr_Inser()));
}
$Siga_cat_gestoresDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_gestoresDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_gestoresDto->getFech_Mod())){
$Siga_cat_gestoresDto->setFech_Mod($this->fechaMysql($Siga_cat_gestoresDto->getFech_Mod()));
}
$Siga_cat_gestoresDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_gestoresDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_gestoresDto->getUsr_Mod())){
$Siga_cat_gestoresDto->setUsr_Mod($this->fechaMysql($Siga_cat_gestoresDto->getUsr_Mod()));
}
$Siga_cat_gestoresDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_gestoresDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_gestoresDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_gestoresDto->getEstatus_Reg())){
$Siga_cat_gestoresDto->setEstatus_Reg($this->fechaMysql($Siga_cat_gestoresDto->getEstatus_Reg()));
}
return $Siga_cat_gestoresDto;
}
public function selectSiga_cat_gestores($Siga_cat_gestoresDto){
$Siga_cat_gestoresDto=$this->validarSiga_cat_gestores($Siga_cat_gestoresDto);
$Siga_cat_gestoresController = new Siga_cat_gestoresController();
$Siga_cat_gestoresDto = $Siga_cat_gestoresController->selectSiga_cat_gestores($Siga_cat_gestoresDto);
if($Siga_cat_gestoresDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_gestoresDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_gestores($Siga_cat_gestoresDto){
//$Siga_cat_gestoresDto=$this->validarSiga_cat_gestores($Siga_cat_gestoresDto);
$Siga_cat_gestoresController = new Siga_cat_gestoresController();
$Siga_cat_gestoresDto = $Siga_cat_gestoresController->insertSiga_cat_gestores($Siga_cat_gestoresDto);
if($Siga_cat_gestoresDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_gestoresDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_gestores($Siga_cat_gestoresDto){
//$Siga_cat_gestoresDto=$this->validarSiga_cat_gestores($Siga_cat_gestoresDto);
$Siga_cat_gestoresController = new Siga_cat_gestoresController();
$Siga_cat_gestoresDto = $Siga_cat_gestoresController->updateSiga_cat_gestores($Siga_cat_gestoresDto);
if($Siga_cat_gestoresDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_gestoresDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Area) {
$Siga_cat_gestoresController = new Siga_cat_gestoresController();
return $Siga_cat_gestoresController->llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Area);
}

public function deleteSiga_cat_gestores($Siga_cat_gestoresDto){
//$Siga_cat_gestoresDto=$this->validarSiga_cat_gestores($Siga_cat_gestoresDto);
$Siga_cat_gestoresController = new Siga_cat_gestoresController();
$Siga_cat_gestoresDto = $Siga_cat_gestoresController->deleteSiga_cat_gestores($Siga_cat_gestoresDto);
if($Siga_cat_gestoresDto==true){
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



@$Id_Gestor=$_POST["Id_Gestor"];
@$Id_Area=$_POST["Id_Area"];
@$Id_Seccion=$_POST["Id_Seccion"];
@$Tipo_Gestor=$_POST["Tipo_Gestor"];
@$Id_Usuario=$_POST["Id_Usuario"];
@$Nombre_Empleado=$_POST["Nombre_Empleado"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';

$siga_cat_gestoresFacade = new Siga_cat_gestoresFacade();
$siga_cat_gestoresDto = new Siga_cat_gestoresDTO();

$siga_cat_gestoresDto->setId_Gestor($Id_Gestor);
$siga_cat_gestoresDto->setId_Area($Id_Area);
$siga_cat_gestoresDto->setId_Seccion($Id_Seccion);
$siga_cat_gestoresDto->setTipo_Gestor($Tipo_Gestor);
$siga_cat_gestoresDto->setId_Usuario($Id_Usuario);
$siga_cat_gestoresDto->setNombre_Empleado($Nombre_Empleado);
$siga_cat_gestoresDto->setFech_Inser($Fech_Inser);
$siga_cat_gestoresDto->setUsr_Inser($Usr_Inser);
$siga_cat_gestoresDto->setFech_Mod($Fech_Mod);
$siga_cat_gestoresDto->setUsr_Mod($Usr_Mod);
$siga_cat_gestoresDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Gestor=="") ){
$siga_cat_gestoresDto=$siga_cat_gestoresFacade->insertSiga_cat_gestores($siga_cat_gestoresDto);
echo $siga_cat_gestoresDto;
} else if(($accion=="guardar") && ($Id_Gestor!="")){
$siga_cat_gestoresDto=$siga_cat_gestoresFacade->updateSiga_cat_gestores($siga_cat_gestoresDto);
echo $siga_cat_gestoresDto;
} else if($accion=="consultar"){
$siga_cat_gestoresDto=$siga_cat_gestoresFacade->selectSiga_cat_gestores($siga_cat_gestoresDto);
echo $siga_cat_gestoresDto;
} else if( ($accion=="baja") && ($Id_Gestor!="") ){
$siga_cat_gestoresDto=$siga_cat_gestoresFacade->deleteSiga_cat_gestores($siga_cat_gestoresDto);
echo $siga_cat_gestoresDto;
} else if( ($accion=="seleccionar") && ($Id_Gestor!="") ){
$siga_cat_gestoresDto=$siga_cat_gestoresFacade->selectSiga_cat_gestores($siga_cat_gestoresDto);
echo $siga_cat_gestoresDto;
}else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
echo  $siga_cat_gestoresFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Area); 
}


?>