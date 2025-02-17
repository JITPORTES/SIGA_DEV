<?php
session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/formulas/FormulasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/formulas/FormulasController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class FormulasFacade {
private $proveedor;
public function __construct() {
}
public function validarFormulas($FormulasDto){
$FormulasDto->setid_formula(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($FormulasDto->getid_formula(),"utf8"):strtoupper($FormulasDto->getid_formula()))))));
if($this->esFecha($FormulasDto->getid_formula())){
$FormulasDto->setid_formula($this->fechaMysql($FormulasDto->getid_formula()));
}
$FormulasDto->setNombre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($FormulasDto->getNombre(),"utf8"):strtoupper($FormulasDto->getNombre()))))));
if($this->esFecha($FormulasDto->getNombre())){
$FormulasDto->setNombre($this->fechaMysql($FormulasDto->getNombre()));
}
$FormulasDto->setFormula(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($FormulasDto->getFormula(),"utf8"):strtoupper($FormulasDto->getFormula()))))));
if($this->esFecha($FormulasDto->getFormula())){
$FormulasDto->setFormula($this->fechaMysql($FormulasDto->getFormula()));
}
$FormulasDto->setDescripcion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($FormulasDto->getDescripcion(),"utf8"):strtoupper($FormulasDto->getDescripcion()))))));
if($this->esFecha($FormulasDto->getDescripcion())){
$FormulasDto->setDescripcion($this->fechaMysql($FormulasDto->getDescripcion()));
}
$FormulasDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($FormulasDto->getFech_Inser(),"utf8"):strtoupper($FormulasDto->getFech_Inser()))))));
if($this->esFecha($FormulasDto->getFech_Inser())){
$FormulasDto->setFech_Inser($this->fechaMysql($FormulasDto->getFech_Inser()));
}
$FormulasDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($FormulasDto->getUsr_Inser(),"utf8"):strtoupper($FormulasDto->getUsr_Inser()))))));
if($this->esFecha($FormulasDto->getUsr_Inser())){
$FormulasDto->setUsr_Inser($this->fechaMysql($FormulasDto->getUsr_Inser()));
}
$FormulasDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($FormulasDto->getFech_Mod(),"utf8"):strtoupper($FormulasDto->getFech_Mod()))))));
if($this->esFecha($FormulasDto->getFech_Mod())){
$FormulasDto->setFech_Mod($this->fechaMysql($FormulasDto->getFech_Mod()));
}
$FormulasDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($FormulasDto->getUsr_Mod(),"utf8"):strtoupper($FormulasDto->getUsr_Mod()))))));
if($this->esFecha($FormulasDto->getUsr_Mod())){
$FormulasDto->setUsr_Mod($this->fechaMysql($FormulasDto->getUsr_Mod()));
}
$FormulasDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($FormulasDto->getEstatus_Reg(),"utf8"):strtoupper($FormulasDto->getEstatus_Reg()))))));
if($this->esFecha($FormulasDto->getEstatus_Reg())){
$FormulasDto->setEstatus_Reg($this->fechaMysql($FormulasDto->getEstatus_Reg()));
}
return $FormulasDto;
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search) {
$FormulasController = new FormulasController();
return $FormulasController->llenarDataTable($draw,$columns,$order,$start,$length,$search);
}

public function selectFormulas($FormulasDto){
$FormulasDto=$this->validarFormulas($FormulasDto);
$FormulasController = new FormulasController();
$FormulasDto = $FormulasController->selectFormulas($FormulasDto);
if($FormulasDto!=""){
$dtoToJson = new DtoToJson($FormulasDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertFormulas($FormulasDto){
//$FormulasDto=$this->validarFormulas($FormulasDto);
$FormulasController = new FormulasController();
$FormulasDto = $FormulasController->insertFormulas($FormulasDto);
if($FormulasDto!=""){
$dtoToJson = new DtoToJson($FormulasDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateFormulas($FormulasDto){
//$FormulasDto=$this->validarFormulas($FormulasDto);
$FormulasController = new FormulasController();
$FormulasDto = $FormulasController->updateFormulas($FormulasDto);
if($FormulasDto!=""){
$dtoToJson = new DtoToJson($FormulasDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteFormulas($FormulasDto){
//$FormulasDto=$this->validarFormulas($FormulasDto);
$FormulasController = new FormulasController();
$FormulasDto = $FormulasController->deleteFormulas($FormulasDto);
if($FormulasDto==true){
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



@$id_formula=$_POST["id_formula"];
@$Nombre=$_POST["Nombre"];
@$Formula=$_POST["Formula"];
@$Descripcion=$_POST["Descripcion"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';

$formulasFacade = new FormulasFacade();
$formulasDto = new FormulasDTO();

$formulasDto->setId_formula($id_formula);
$formulasDto->setNombre($Nombre);
$formulasDto->setFormula($Formula);
$formulasDto->setDescripcion($Descripcion);
$formulasDto->setFech_Inser($Fech_Inser);
$formulasDto->setUsr_Inser($Usr_Inser);
$formulasDto->setFech_Mod($Fech_Mod);
$formulasDto->setUsr_Mod($Usr_Mod);
$formulasDto->setEstatus_Reg($Estatus_Reg);


if( ($accion=="guardar") && ($id_formula=="") ){
$formulasDto=$formulasFacade->insertFormulas($formulasDto);
echo $formulasDto;
} else if(($accion=="guardar") && ($id_formula!="")){
$formulasDto=$formulasFacade->updateFormulas($formulasDto);
echo $formulasDto;
} else if($accion=="consultar"){
$formulasDto=$formulasFacade->selectFormulas($formulasDto);
echo $formulasDto;
} else if( ($accion=="baja") && ($id_formula!="") ){
$formulasDto=$formulasFacade->deleteFormulas($formulasDto);
echo $formulasDto;
} else if( ($accion=="seleccionar") && ($id_formula!="") ){
$formulasDto=$formulasFacade->selectFormulas($formulasDto);
echo $formulasDto;
} else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
echo  $formulasFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search); 
}


?>