<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/Menu/MenuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/Menu/MenuController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class MenuFacade {
private $proveedor;
public function __construct() {
}
public function validarMenu($MenuDto){
$MenuDto->setId_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($MenuDto->getId_Menu(),"utf8"):strtoupper($MenuDto->getId_Menu()))))));
if($this->esFecha($MenuDto->getId_Menu())){
$MenuDto->setId_Menu($this->fechaMysql($MenuDto->getId_Menu()));
}
$MenuDto->setNombre_Menu(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($MenuDto->getNombre_Menu(),"utf8"):strtoupper($MenuDto->getNombre_Menu()))))));
if($this->esFecha($MenuDto->getNombre_Menu())){
$MenuDto->setNombre_Menu($this->fechaMysql($MenuDto->getNombre_Menu()));
}
$MenuDto->setDescripcion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($MenuDto->getDescripcion(),"utf8"):strtoupper($MenuDto->getDescripcion()))))));
if($this->esFecha($MenuDto->getDescripcion())){
$MenuDto->setDescripcion($this->fechaMysql($MenuDto->getDescripcion()));
}
$MenuDto->setId_Menu_Padre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($MenuDto->getId_Menu_Padre(),"utf8"):strtoupper($MenuDto->getId_Menu_Padre()))))));
if($this->esFecha($MenuDto->getId_Menu_Padre())){
$MenuDto->setId_Menu_Padre($this->fechaMysql($MenuDto->getId_Menu_Padre()));
}
$MenuDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($MenuDto->getEstatus_Reg(),"utf8"):strtoupper($MenuDto->getEstatus_Reg()))))));
if($this->esFecha($MenuDto->getEstatus_Reg())){
$MenuDto->setEstatus_Reg($this->fechaMysql($MenuDto->getEstatus_Reg()));
}
$MenuDto->setUsr_Modifico(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($MenuDto->getUsr_Modifico(),"utf8"):strtoupper($MenuDto->getUsr_Modifico()))))));
if($this->esFecha($MenuDto->getUsr_Modifico())){
$MenuDto->setUsr_Modifico($this->fechaMysql($MenuDto->getUsr_Modifico()));
}
$MenuDto->setFecha(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($MenuDto->getFecha(),"utf8"):strtoupper($MenuDto->getFecha()))))));
if($this->esFecha($MenuDto->getFecha())){
$MenuDto->setFecha($this->fechaMysql($MenuDto->getFecha()));
}
return $MenuDto;
}
public function selectMenu($MenuDto){
$MenuDto=$this->validarMenu($MenuDto);
$MenuController = new MenuController();
$MenuDto = $MenuController->selectMenu($MenuDto);
if($MenuDto!=""){
$dtoToJson = new DtoToJson($MenuDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertMenu($MenuDto){
$MenuDto=$this->validarMenu($MenuDto);
$MenuController = new MenuController();
$MenuDto = $MenuController->insertMenu($MenuDto);
if($MenuDto!=""){
$dtoToJson = new DtoToJson($MenuDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateMenu($MenuDto){
$MenuDto=$this->validarMenu($MenuDto);
$MenuController = new MenuController();
$MenuDto = $MenuController->updateMenu($MenuDto);
if($MenuDto!=""){
$dtoToJson = new DtoToJson($MenuDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteMenu($MenuDto){
$MenuDto=$this->validarMenu($MenuDto);
$MenuController = new MenuController();
$MenuDto = $MenuController->deleteMenu($MenuDto);
if($MenuDto==true){
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



@$Id_Menu=$_POST["Id_Menu"];
@$Nombre_Menu=$_POST["Nombre_Menu"];
@$Descripcion=$_POST["Descripcion"];
@$Id_Menu_Padre=$_POST["Id_Menu_Padre"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$Usr_Modifico=$_POST["Usr_Modifico"];
@$Fecha=$_POST["Fecha"];
@$accion=$_POST["accion"];

$MenuFacade = new MenuFacade();
$MenuDto = new MenuDTO();

$MenuDto->setId_Menu($Id_Menu);
$MenuDto->setNombre_Menu($Nombre_Menu);
$MenuDto->setDescripcion($Descripcion);
$MenuDto->setId_Menu_Padre($Id_Menu_Padre);
$MenuDto->setEstatus_Reg($Estatus_Reg);
$MenuDto->setUsr_Modifico($Usr_Modifico);
$MenuDto->setFecha($Fecha);

if( ($accion=="guardar") && ($Id_Menu=="") ){
$MenuDto=$MenuFacade->insertMenu($MenuDto);
echo $MenuDto;
} else if(($accion=="guardar") && ($Id_Menu!="")){
$MenuDto=$MenuFacade->updateMenu($MenuDto);
echo $MenuDto;
} else if($accion=="consultar"){
$MenuDto=$MenuFacade->selectMenu($MenuDto);
echo $MenuDto;
} else if( ($accion=="baja") && ($Id_Menu!="") ){
$MenuDto=$MenuFacade->deleteMenu($MenuDto);
echo $MenuDto;
} else if( ($accion=="seleccionar") && ($Id_Menu!="") ){
$MenuDto=$MenuFacade->selectMenu($MenuDto);
echo $MenuDto;
}


?>