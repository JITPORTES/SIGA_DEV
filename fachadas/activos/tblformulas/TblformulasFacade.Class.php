<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/tblformulas/TblformulasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/tblformulas/TblformulasController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class TblformulasFacade {
private $proveedor;
public function __construct() {
}
public function validarTblformulas($TblformulasDto){
$TblformulasDto->setid_formula(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblformulasDto->getid_formula(),"utf8"):strtoupper($TblformulasDto->getid_formula()))))));
if($this->esFecha($TblformulasDto->getid_formula())){
$TblformulasDto->setid_formula($this->fechaMysql($TblformulasDto->getid_formula()));
}
$TblformulasDto->setNombre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblformulasDto->getNombre(),"utf8"):strtoupper($TblformulasDto->getNombre()))))));
if($this->esFecha($TblformulasDto->getNombre())){
$TblformulasDto->setNombre($this->fechaMysql($TblformulasDto->getNombre()));
}
$TblformulasDto->setFormula(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblformulasDto->getFormula(),"utf8"):strtoupper($TblformulasDto->getFormula()))))));
if($this->esFecha($TblformulasDto->getFormula())){
$TblformulasDto->setFormula($this->fechaMysql($TblformulasDto->getFormula()));
}
$TblformulasDto->setDescripcion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblformulasDto->getDescripcion(),"utf8"):strtoupper($TblformulasDto->getDescripcion()))))));
if($this->esFecha($TblformulasDto->getDescripcion())){
$TblformulasDto->setDescripcion($this->fechaMysql($TblformulasDto->getDescripcion()));
}
$TblformulasDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblformulasDto->getFech_Inser(),"utf8"):strtoupper($TblformulasDto->getFech_Inser()))))));
if($this->esFecha($TblformulasDto->getFech_Inser())){
$TblformulasDto->setFech_Inser($this->fechaMysql($TblformulasDto->getFech_Inser()));
}
$TblformulasDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblformulasDto->getUsr_Inser(),"utf8"):strtoupper($TblformulasDto->getUsr_Inser()))))));
if($this->esFecha($TblformulasDto->getUsr_Inser())){
$TblformulasDto->setUsr_Inser($this->fechaMysql($TblformulasDto->getUsr_Inser()));
}
$TblformulasDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblformulasDto->getFech_Mod(),"utf8"):strtoupper($TblformulasDto->getFech_Mod()))))));
if($this->esFecha($TblformulasDto->getFech_Mod())){
$TblformulasDto->setFech_Mod($this->fechaMysql($TblformulasDto->getFech_Mod()));
}
$TblformulasDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblformulasDto->getUsr_Mod(),"utf8"):strtoupper($TblformulasDto->getUsr_Mod()))))));
if($this->esFecha($TblformulasDto->getUsr_Mod())){
$TblformulasDto->setUsr_Mod($this->fechaMysql($TblformulasDto->getUsr_Mod()));
}
$TblformulasDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($TblformulasDto->getEstatus_Reg(),"utf8"):strtoupper($TblformulasDto->getEstatus_Reg()))))));
if($this->esFecha($TblformulasDto->getEstatus_Reg())){
$TblformulasDto->setEstatus_Reg($this->fechaMysql($TblformulasDto->getEstatus_Reg()));
}
return $TblformulasDto;
}
public function selectTblformulas($TblformulasDto){
$TblformulasDto=$this->validarTblformulas($TblformulasDto);
$TblformulasController = new TblformulasController();
$TblformulasDto = $TblformulasController->selectTblformulas($TblformulasDto);
if($TblformulasDto!=""){
$dtoToJson = new DtoToJson($TblformulasDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertTblformulas($TblformulasDto){
//$TblformulasDto=$this->validarTblformulas($TblformulasDto);
$TblformulasController = new TblformulasController();
$TblformulasDto = $TblformulasController->insertTblformulas($TblformulasDto);
if($TblformulasDto!=""){
$dtoToJson = new DtoToJson($TblformulasDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateTblformulas($TblformulasDto){
//$TblformulasDto=$this->validarTblformulas($TblformulasDto);
$TblformulasController = new TblformulasController();
$TblformulasDto = $TblformulasController->updateTblformulas($TblformulasDto);
if($TblformulasDto!=""){
$dtoToJson = new DtoToJson($TblformulasDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteTblformulas($TblformulasDto){
//$TblformulasDto=$this->validarTblformulas($TblformulasDto);
$TblformulasController = new TblformulasController();
$TblformulasDto = $TblformulasController->deleteTblformulas($TblformulasDto);
if($TblformulasDto==true){
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

$tblformulasFacade = new TblformulasFacade();
$tblformulasDto = new TblformulasDTO();

$tblformulasDto->setId_formula($id_formula);
$tblformulasDto->setNombre($Nombre);
$tblformulasDto->setFormula($Formula);
$tblformulasDto->setDescripcion($Descripcion);
$tblformulasDto->setFech_Inser($Fech_Inser);
$tblformulasDto->setUsr_Inser($Usr_Inser);
$tblformulasDto->setFech_Mod($Fech_Mod);
$tblformulasDto->setUsr_Mod($Usr_Mod);
$tblformulasDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($id_formula=="") ){
$tblformulasDto=$tblformulasFacade->insertTblformulas($tblformulasDto);
echo $tblformulasDto;
} else if(($accion=="guardar") && ($id_formula!="")){
$tblformulasDto=$tblformulasFacade->updateTblformulas($tblformulasDto);
echo $tblformulasDto;
} else if($accion=="consultar"){
$tblformulasDto=$tblformulasFacade->selectTblformulas($tblformulasDto);
echo $tblformulasDto;
} else if( ($accion=="baja") && ($id_formula!="") ){
$tblformulasDto=$tblformulasFacade->deleteTblformulas($tblformulasDto);
echo $tblformulasDto;
} else if( ($accion=="seleccionar") && ($id_formula!="") ){
$tblformulasDto=$tblformulasFacade->selectTblformulas($tblformulasDto);
echo $tblformulasDto;
}


?>