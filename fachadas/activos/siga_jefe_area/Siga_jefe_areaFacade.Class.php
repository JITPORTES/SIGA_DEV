<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_jefe_area/Siga_jefe_areaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_jefe_area/Siga_jefe_areaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_jefe_areaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_jefe_area($Siga_jefe_areaDto){
$Siga_jefe_areaDto->setId_Jefe_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getId_Jefe_Area(),"utf8"):strtoupper($Siga_jefe_areaDto->getId_Jefe_Area()))))));
if($this->esFecha($Siga_jefe_areaDto->getId_Jefe_Area())){
$Siga_jefe_areaDto->setId_Jefe_Area($this->fechaMysql($Siga_jefe_areaDto->getId_Jefe_Area()));
}
$Siga_jefe_areaDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getId_Area(),"utf8"):strtoupper($Siga_jefe_areaDto->getId_Area()))))));
if($this->esFecha($Siga_jefe_areaDto->getId_Area())){
$Siga_jefe_areaDto->setId_Area($this->fechaMysql($Siga_jefe_areaDto->getId_Area()));
}
$Siga_jefe_areaDto->setNum_Empleado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getNum_Empleado(),"utf8"):strtoupper($Siga_jefe_areaDto->getNum_Empleado()))))));
if($this->esFecha($Siga_jefe_areaDto->getNum_Empleado())){
$Siga_jefe_areaDto->setNum_Empleado($this->fechaMysql($Siga_jefe_areaDto->getNum_Empleado()));
}
$Siga_jefe_areaDto->setNombre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getNombre(),"utf8"):strtoupper($Siga_jefe_areaDto->getNombre()))))));
if($this->esFecha($Siga_jefe_areaDto->getNombre())){
$Siga_jefe_areaDto->setNombre($this->fechaMysql($Siga_jefe_areaDto->getNombre()));
}
$Siga_jefe_areaDto->setCorreo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getCorreo(),"utf8"):strtoupper($Siga_jefe_areaDto->getCorreo()))))));
if($this->esFecha($Siga_jefe_areaDto->getCorreo())){
$Siga_jefe_areaDto->setCorreo($this->fechaMysql($Siga_jefe_areaDto->getCorreo()));
}
$Siga_jefe_areaDto->setCampo_1(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getCampo_1(),"utf8"):strtoupper($Siga_jefe_areaDto->getCampo_1()))))));
if($this->esFecha($Siga_jefe_areaDto->getCampo_1())){
$Siga_jefe_areaDto->setCampo_1($this->fechaMysql($Siga_jefe_areaDto->getCampo_1()));
}
$Siga_jefe_areaDto->setCampo_2(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getCampo_2(),"utf8"):strtoupper($Siga_jefe_areaDto->getCampo_2()))))));
if($this->esFecha($Siga_jefe_areaDto->getCampo_2())){
$Siga_jefe_areaDto->setCampo_2($this->fechaMysql($Siga_jefe_areaDto->getCampo_2()));
}
$Siga_jefe_areaDto->setCampo_3(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getCampo_3(),"utf8"):strtoupper($Siga_jefe_areaDto->getCampo_3()))))));
if($this->esFecha($Siga_jefe_areaDto->getCampo_3())){
$Siga_jefe_areaDto->setCampo_3($this->fechaMysql($Siga_jefe_areaDto->getCampo_3()));
}
$Siga_jefe_areaDto->setCampo_4(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getCampo_4(),"utf8"):strtoupper($Siga_jefe_areaDto->getCampo_4()))))));
if($this->esFecha($Siga_jefe_areaDto->getCampo_4())){
$Siga_jefe_areaDto->setCampo_4($this->fechaMysql($Siga_jefe_areaDto->getCampo_4()));
}
$Siga_jefe_areaDto->setCampo_5(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getCampo_5(),"utf8"):strtoupper($Siga_jefe_areaDto->getCampo_5()))))));
if($this->esFecha($Siga_jefe_areaDto->getCampo_5())){
$Siga_jefe_areaDto->setCampo_5($this->fechaMysql($Siga_jefe_areaDto->getCampo_5()));
}
$Siga_jefe_areaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getFech_Inser(),"utf8"):strtoupper($Siga_jefe_areaDto->getFech_Inser()))))));
if($this->esFecha($Siga_jefe_areaDto->getFech_Inser())){
$Siga_jefe_areaDto->setFech_Inser($this->fechaMysql($Siga_jefe_areaDto->getFech_Inser()));
}
$Siga_jefe_areaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_jefe_areaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_jefe_areaDto->getUsr_Inser())){
$Siga_jefe_areaDto->setUsr_Inser($this->fechaMysql($Siga_jefe_areaDto->getUsr_Inser()));
}
$Siga_jefe_areaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getFech_Mod(),"utf8"):strtoupper($Siga_jefe_areaDto->getFech_Mod()))))));
if($this->esFecha($Siga_jefe_areaDto->getFech_Mod())){
$Siga_jefe_areaDto->setFech_Mod($this->fechaMysql($Siga_jefe_areaDto->getFech_Mod()));
}
$Siga_jefe_areaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_jefe_areaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_jefe_areaDto->getUsr_Mod())){
$Siga_jefe_areaDto->setUsr_Mod($this->fechaMysql($Siga_jefe_areaDto->getUsr_Mod()));
}
$Siga_jefe_areaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_jefe_areaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_jefe_areaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_jefe_areaDto->getEstatus_Reg())){
$Siga_jefe_areaDto->setEstatus_Reg($this->fechaMysql($Siga_jefe_areaDto->getEstatus_Reg()));
}
return $Siga_jefe_areaDto;
}
public function selectSiga_jefe_area($Siga_jefe_areaDto){
$Siga_jefe_areaDto=$this->validarSiga_jefe_area($Siga_jefe_areaDto);
$Siga_jefe_areaController = new Siga_jefe_areaController();
$Siga_jefe_areaDto = $Siga_jefe_areaController->selectSiga_jefe_area($Siga_jefe_areaDto);
if($Siga_jefe_areaDto!=""){
$dtoToJson = new DtoToJson($Siga_jefe_areaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_jefe_area($Siga_jefe_areaDto){
//$Siga_jefe_areaDto=$this->validarSiga_jefe_area($Siga_jefe_areaDto);
$Siga_jefe_areaController = new Siga_jefe_areaController();
$Siga_jefe_areaDto = $Siga_jefe_areaController->insertSiga_jefe_area($Siga_jefe_areaDto);
if($Siga_jefe_areaDto!=""){
$dtoToJson = new DtoToJson($Siga_jefe_areaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_jefe_area($Siga_jefe_areaDto){
//$Siga_jefe_areaDto=$this->validarSiga_jefe_area($Siga_jefe_areaDto);
$Siga_jefe_areaController = new Siga_jefe_areaController();
$Siga_jefe_areaDto = $Siga_jefe_areaController->updateSiga_jefe_area($Siga_jefe_areaDto);
if($Siga_jefe_areaDto!=""){
$dtoToJson = new DtoToJson($Siga_jefe_areaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_jefe_area($Siga_jefe_areaDto){
//$Siga_jefe_areaDto=$this->validarSiga_jefe_area($Siga_jefe_areaDto);
$Siga_jefe_areaController = new Siga_jefe_areaController();
$Siga_jefe_areaDto = $Siga_jefe_areaController->deleteSiga_jefe_area($Siga_jefe_areaDto);
if($Siga_jefe_areaDto==true){
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



@$Id_Jefe_Area=$_POST["Id_Jefe_Area"];
@$Id_Area=$_POST["Id_Area"];
@$Num_Empleado=$_POST["Num_Empleado"];
@$Nombre=$_POST["Nombre"];
@$Correo=$_POST["Correo"];
@$Campo_1=$_POST["Campo_1"];
@$Campo_2=$_POST["Campo_2"];
@$Campo_3=$_POST["Campo_3"];
@$Campo_4=$_POST["Campo_4"];
@$Campo_5=$_POST["Campo_5"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_jefe_areaFacade = new Siga_jefe_areaFacade();
$siga_jefe_areaDto = new Siga_jefe_areaDTO();

$siga_jefe_areaDto->setId_Jefe_Area($Id_Jefe_Area);
$siga_jefe_areaDto->setId_Area($Id_Area);
$siga_jefe_areaDto->setNum_Empleado($Num_Empleado);
$siga_jefe_areaDto->setNombre($Nombre);
$siga_jefe_areaDto->setCorreo($Correo);
$siga_jefe_areaDto->setCampo_1($Campo_1);
$siga_jefe_areaDto->setCampo_2($Campo_2);
$siga_jefe_areaDto->setCampo_3($Campo_3);
$siga_jefe_areaDto->setCampo_4($Campo_4);
$siga_jefe_areaDto->setCampo_5($Campo_5);
$siga_jefe_areaDto->setFech_Inser($Fech_Inser);
$siga_jefe_areaDto->setUsr_Inser($Usr_Inser);
$siga_jefe_areaDto->setFech_Mod($Fech_Mod);
$siga_jefe_areaDto->setUsr_Mod($Usr_Mod);
$siga_jefe_areaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Jefe_Area=="") ){
$siga_jefe_areaDto=$siga_jefe_areaFacade->insertSiga_jefe_area($siga_jefe_areaDto);
echo $siga_jefe_areaDto;
} else if(($accion=="guardar") && ($Id_Jefe_Area!="")){
$siga_jefe_areaDto=$siga_jefe_areaFacade->updateSiga_jefe_area($siga_jefe_areaDto);
echo $siga_jefe_areaDto;
} else if($accion=="consultar"){
$siga_jefe_areaDto=$siga_jefe_areaFacade->selectSiga_jefe_area($siga_jefe_areaDto);
echo $siga_jefe_areaDto;
} else if( ($accion=="baja") && ($Id_Jefe_Area!="") ){
$siga_jefe_areaDto=$siga_jefe_areaFacade->deleteSiga_jefe_area($siga_jefe_areaDto);
echo $siga_jefe_areaDto;
} else if( ($accion=="seleccionar") && ($Id_Jefe_Area!="") ){
$siga_jefe_areaDto=$siga_jefe_areaFacade->selectSiga_jefe_area($siga_jefe_areaDto);
echo $siga_jefe_areaDto;
}


?>