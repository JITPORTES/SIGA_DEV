<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_centro_de_costos/Siga_cat_centro_de_costosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_centro_de_costos/Siga_cat_centro_de_costosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_centro_de_costosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto){
$Siga_cat_centro_de_costosDto->setId_Centros_de_costos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_centro_de_costosDto->getId_Centros_de_costos(),"utf8"):strtoupper($Siga_cat_centro_de_costosDto->getId_Centros_de_costos()))))));
if($this->esFecha($Siga_cat_centro_de_costosDto->getId_Centros_de_costos())){
$Siga_cat_centro_de_costosDto->setId_Centros_de_costos($this->fechaMysql($Siga_cat_centro_de_costosDto->getId_Centros_de_costos()));
}
$Siga_cat_centro_de_costosDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_centro_de_costosDto->getId_Area(),"utf8"):strtoupper($Siga_cat_centro_de_costosDto->getId_Area()))))));
if($this->esFecha($Siga_cat_centro_de_costosDto->getId_Area())){
$Siga_cat_centro_de_costosDto->setId_Area($this->fechaMysql($Siga_cat_centro_de_costosDto->getId_Area()));
}
$Siga_cat_centro_de_costosDto->setDesc_Centro_de_costos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_centro_de_costosDto->getDesc_Centro_de_costos(),"utf8"):strtoupper($Siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()))))));
if($this->esFecha($Siga_cat_centro_de_costosDto->getDesc_Centro_de_costos())){
$Siga_cat_centro_de_costosDto->setDesc_Centro_de_costos($this->fechaMysql($Siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()));
}
$Siga_cat_centro_de_costosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_centro_de_costosDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_centro_de_costosDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_centro_de_costosDto->getFech_Inser())){
$Siga_cat_centro_de_costosDto->setFech_Inser($this->fechaMysql($Siga_cat_centro_de_costosDto->getFech_Inser()));
}
$Siga_cat_centro_de_costosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_centro_de_costosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_centro_de_costosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_centro_de_costosDto->getUsr_Inser())){
$Siga_cat_centro_de_costosDto->setUsr_Inser($this->fechaMysql($Siga_cat_centro_de_costosDto->getUsr_Inser()));
}
$Siga_cat_centro_de_costosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_centro_de_costosDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_centro_de_costosDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_centro_de_costosDto->getFech_Mod())){
$Siga_cat_centro_de_costosDto->setFech_Mod($this->fechaMysql($Siga_cat_centro_de_costosDto->getFech_Mod()));
}
$Siga_cat_centro_de_costosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_centro_de_costosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_centro_de_costosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_centro_de_costosDto->getUsr_Mod())){
$Siga_cat_centro_de_costosDto->setUsr_Mod($this->fechaMysql($Siga_cat_centro_de_costosDto->getUsr_Mod()));
}
$Siga_cat_centro_de_costosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_centro_de_costosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_cat_centro_de_costosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_cat_centro_de_costosDto->getEstatus_Reg())){
$Siga_cat_centro_de_costosDto->setEstatus_Reg($this->fechaMysql($Siga_cat_centro_de_costosDto->getEstatus_Reg()));
}
return $Siga_cat_centro_de_costosDto;
}
public function selectSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto){
$Siga_cat_centro_de_costosDto=$this->validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
$Siga_cat_centro_de_costosController = new Siga_cat_centro_de_costosController();
$Siga_cat_centro_de_costosDto = $Siga_cat_centro_de_costosController->selectSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
if($Siga_cat_centro_de_costosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_centro_de_costosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto){
//$Siga_cat_centro_de_costosDto=$this->validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
$Siga_cat_centro_de_costosController = new Siga_cat_centro_de_costosController();
$Siga_cat_centro_de_costosDto = $Siga_cat_centro_de_costosController->insertSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
if($Siga_cat_centro_de_costosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_centro_de_costosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto){
//$Siga_cat_centro_de_costosDto=$this->validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
$Siga_cat_centro_de_costosController = new Siga_cat_centro_de_costosController();
$Siga_cat_centro_de_costosDto = $Siga_cat_centro_de_costosController->updateSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
if($Siga_cat_centro_de_costosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_centro_de_costosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search) {
$Siga_cat_centro_de_costosController = new Siga_cat_centro_de_costosController();
return $Siga_cat_centro_de_costosController->llenarDataTable($draw,$columns,$order,$start,$length,$search);
}

public function deleteSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto){
//$Siga_cat_centro_de_costosDto=$this->validarSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
$Siga_cat_centro_de_costosController = new Siga_cat_centro_de_costosController();
$Siga_cat_centro_de_costosDto = $Siga_cat_centro_de_costosController->deleteSiga_cat_centro_de_costos($Siga_cat_centro_de_costosDto);
if($Siga_cat_centro_de_costosDto==true){
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



@$Id_Centros_de_costos=$_POST["Id_Centros_de_costos"];
@$Id_Area=$_POST["Id_Area"];
@$Desc_Centro_de_costos=$_POST["Desc_Centro_de_costos"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$NoCentroCostos=$_POST["NoCentroCostos"];
@$NombreReporte=$_POST["NombreReporte"];
@$Clave=$_POST["Clave"];
@$Nomenclatura=$_POST["Nomenclatura"];



@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';

$siga_cat_centro_de_costosFacade = new Siga_cat_centro_de_costosFacade();
$siga_cat_centro_de_costosDto = new Siga_cat_centro_de_costosDTO();

$siga_cat_centro_de_costosDto->setId_Centros_de_costos($Id_Centros_de_costos);
$siga_cat_centro_de_costosDto->setId_Area($Id_Area);
$siga_cat_centro_de_costosDto->setDesc_Centro_de_costos($Desc_Centro_de_costos);
$siga_cat_centro_de_costosDto->setFech_Inser($Fech_Inser);
$siga_cat_centro_de_costosDto->setUsr_Inser($Usr_Inser);
$siga_cat_centro_de_costosDto->setFech_Mod($Fech_Mod);
$siga_cat_centro_de_costosDto->setUsr_Mod($Usr_Mod);
$siga_cat_centro_de_costosDto->setEstatus_Reg($Estatus_Reg);
$siga_cat_centro_de_costosDto->setNoCentroCostos($NoCentroCostos);
$siga_cat_centro_de_costosDto->setNombreReporte($NombreReporte);
$siga_cat_centro_de_costosDto->setClave($Clave);
$siga_cat_centro_de_costosDto->setNomenclatura($Nomenclatura);

if( ($accion=="guardar") && ($Id_Centros_de_costos=="") ){
$siga_cat_centro_de_costosDto=$siga_cat_centro_de_costosFacade->insertSiga_cat_centro_de_costos($siga_cat_centro_de_costosDto);
echo $siga_cat_centro_de_costosDto;
} else if(($accion=="guardar") && ($Id_Centros_de_costos!="")){
$siga_cat_centro_de_costosDto=$siga_cat_centro_de_costosFacade->updateSiga_cat_centro_de_costos($siga_cat_centro_de_costosDto);
echo $siga_cat_centro_de_costosDto;
} else if($accion=="consultar"){
$siga_cat_centro_de_costosDto=$siga_cat_centro_de_costosFacade->selectSiga_cat_centro_de_costos($siga_cat_centro_de_costosDto);
echo $siga_cat_centro_de_costosDto;
} else if( ($accion=="baja") && ($Id_Centros_de_costos!="") ){
$siga_cat_centro_de_costosDto=$siga_cat_centro_de_costosFacade->deleteSiga_cat_centro_de_costos($siga_cat_centro_de_costosDto);
echo $siga_cat_centro_de_costosDto;
} else if( ($accion=="seleccionar") && ($Id_Centros_de_costos!="") ){
$siga_cat_centro_de_costosDto=$siga_cat_centro_de_costosFacade->selectSiga_cat_centro_de_costos($siga_cat_centro_de_costosDto);
echo $siga_cat_centro_de_costosDto;
} else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
echo  $siga_cat_centro_de_costosFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search); 
}


?>