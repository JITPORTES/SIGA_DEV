<?php
session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/inpc/InpcDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/inpc/InpcController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class InpcFacade {
private $proveedor;
public function __construct() {
}
public function validarInpc($InpcDto){
$InpcDto->setId_INPC(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($InpcDto->getId_INPC(),"utf8"):strtoupper($InpcDto->getId_INPC()))))));
if($this->esFecha($InpcDto->getId_INPC())){
$InpcDto->setId_INPC($this->fechaMysql($InpcDto->getId_INPC()));
}
$InpcDto->setAnio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($InpcDto->getAnio(),"utf8"):strtoupper($InpcDto->getAnio()))))));
if($this->esFecha($InpcDto->getAnio())){
$InpcDto->setAnio($this->fechaMysql($InpcDto->getAnio()));
}
$InpcDto->setMes(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($InpcDto->getMes(),"utf8"):strtoupper($InpcDto->getMes()))))));
if($this->esFecha($InpcDto->getMes())){
$InpcDto->setMes($this->fechaMysql($InpcDto->getMes()));
}
$InpcDto->setValor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($InpcDto->getValor(),"utf8"):strtoupper($InpcDto->getValor()))))));
if($this->esFecha($InpcDto->getValor())){
$InpcDto->setValor($this->fechaMysql($InpcDto->getValor()));
}
$InpcDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($InpcDto->getFech_Inser(),"utf8"):strtoupper($InpcDto->getFech_Inser()))))));
if($this->esFecha($InpcDto->getFech_Inser())){
$InpcDto->setFech_Inser($this->fechaMysql($InpcDto->getFech_Inser()));
}
$InpcDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($InpcDto->getUsr_Inser(),"utf8"):strtoupper($InpcDto->getUsr_Inser()))))));
if($this->esFecha($InpcDto->getUsr_Inser())){
$InpcDto->setUsr_Inser($this->fechaMysql($InpcDto->getUsr_Inser()));
}
$InpcDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($InpcDto->getFech_Mod(),"utf8"):strtoupper($InpcDto->getFech_Mod()))))));
if($this->esFecha($InpcDto->getFech_Mod())){
$InpcDto->setFech_Mod($this->fechaMysql($InpcDto->getFech_Mod()));
}
$InpcDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($InpcDto->getUsr_Mod(),"utf8"):strtoupper($InpcDto->getUsr_Mod()))))));
if($this->esFecha($InpcDto->getUsr_Mod())){
$InpcDto->setUsr_Mod($this->fechaMysql($InpcDto->getUsr_Mod()));
}
$InpcDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($InpcDto->getEstatus_Reg(),"utf8"):strtoupper($InpcDto->getEstatus_Reg()))))));
if($this->esFecha($InpcDto->getEstatus_Reg())){
$InpcDto->setEstatus_Reg($this->fechaMysql($InpcDto->getEstatus_Reg()));
}
return $InpcDto;
}
public function selectInpc($InpcDto){
$InpcDto=$this->validarInpc($InpcDto);
$InpcController = new InpcController();
$InpcDto = $InpcController->selectInpc($InpcDto);
if($InpcDto!=""){
$dtoToJson = new DtoToJson($InpcDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search) {
$InpcController = new InpcController();
return $InpcController->llenarDataTable($draw,$columns,$order,$start,$length,$search);
}

public function insertInpc($InpcDto){
//$InpcDto=$this->validarInpc($InpcDto);
$InpcController = new InpcController();
$InpcDto = $InpcController->insertInpc($InpcDto);
if($InpcDto!=""){
$dtoToJson = new DtoToJson($InpcDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateInpc($InpcDto){
//$InpcDto=$this->validarInpc($InpcDto);
$InpcController = new InpcController();
$InpcDto = $InpcController->updateInpc($InpcDto);
if($InpcDto!=""){
$dtoToJson = new DtoToJson($InpcDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteInpc($InpcDto){
//$InpcDto=$this->validarInpc($InpcDto);
$InpcController = new InpcController();
$InpcDto = $InpcController->deleteInpc($InpcDto);
if($InpcDto==true){
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



@$Id_INPC=$_POST["Id_INPC"];
@$Anio=$_POST["Anio"];
@$Mes=$_POST["Mes"];
@$Valor=$_POST["Valor"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';

$inpcFacade = new InpcFacade();
$inpcDto = new InpcDTO();

$inpcDto->setId_INPC($Id_INPC);
$inpcDto->setAnio($Anio);
$inpcDto->setMes($Mes);
$inpcDto->setValor($Valor);
$inpcDto->setFech_Inser($Fech_Inser);
$inpcDto->setUsr_Inser($Usr_Inser);
$inpcDto->setFech_Mod($Fech_Mod);
$inpcDto->setUsr_Mod($Usr_Mod);
$inpcDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_INPC=="") ){
$inpcDto=$inpcFacade->insertInpc($inpcDto);
echo $inpcDto;
} else if(($accion=="guardar") && ($Id_INPC!="")){
$inpcDto=$inpcFacade->updateInpc($inpcDto);
echo $inpcDto;
} else if($accion=="consultar"){
$inpcDto=$inpcFacade->selectInpc($inpcDto);
echo $inpcDto;
} else if( ($accion=="baja") && ($Id_INPC!="") ){
$inpcDto=$inpcFacade->deleteInpc($inpcDto);
echo $inpcDto;
} else if( ($accion=="seleccionar") && ($Id_INPC!="") ){
$inpcDto=$inpcFacade->selectInpc($inpcDto);
echo $inpcDto;
}else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
echo  $inpcFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search); 
}


?>