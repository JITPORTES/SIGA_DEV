<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_catalogos/Siga_cat_catalogosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_cat_catalogos/Siga_cat_catalogosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_cat_catalogosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_cat_catalogos($Siga_cat_catalogosDto){
$Siga_cat_catalogosDto->setId_Catalogo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getId_Catalogo(),"utf8"):strtoupper($Siga_cat_catalogosDto->getId_Catalogo()))))));
if($this->esFecha($Siga_cat_catalogosDto->getId_Catalogo())){
$Siga_cat_catalogosDto->setId_Catalogo($this->fechaMysql($Siga_cat_catalogosDto->getId_Catalogo()));
}
$Siga_cat_catalogosDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getId_Area(),"utf8"):strtoupper($Siga_cat_catalogosDto->getId_Area()))))));
if($this->esFecha($Siga_cat_catalogosDto->getId_Area())){
$Siga_cat_catalogosDto->setId_Area($this->fechaMysql($Siga_cat_catalogosDto->getId_Area()));
}
$Siga_cat_catalogosDto->setNom_Tabla(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getNom_Tabla(),"utf8"):strtoupper($Siga_cat_catalogosDto->getNom_Tabla()))))));
if($this->esFecha($Siga_cat_catalogosDto->getNom_Tabla())){
$Siga_cat_catalogosDto->setNom_Tabla($this->fechaMysql($Siga_cat_catalogosDto->getNom_Tabla()));
}
$Siga_cat_catalogosDto->setNom_Id_Campo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getNom_Id_Campo(),"utf8"):strtoupper($Siga_cat_catalogosDto->getNom_Id_Campo()))))));
if($this->esFecha($Siga_cat_catalogosDto->getNom_Id_Campo())){
$Siga_cat_catalogosDto->setNom_Id_Campo($this->fechaMysql($Siga_cat_catalogosDto->getNom_Id_Campo()));
}
$Siga_cat_catalogosDto->setNom_Desc_Campo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getNom_Desc_Campo(),"utf8"):strtoupper($Siga_cat_catalogosDto->getNom_Desc_Campo()))))));
if($this->esFecha($Siga_cat_catalogosDto->getNom_Desc_Campo())){
$Siga_cat_catalogosDto->setNom_Desc_Campo($this->fechaMysql($Siga_cat_catalogosDto->getNom_Desc_Campo()));
}
$Siga_cat_catalogosDto->setDescripcion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getDescripcion(),"utf8"):strtoupper($Siga_cat_catalogosDto->getDescripcion()))))));
if($this->esFecha($Siga_cat_catalogosDto->getDescripcion())){
$Siga_cat_catalogosDto->setDescripcion($this->fechaMysql($Siga_cat_catalogosDto->getDescripcion()));
}
$Siga_cat_catalogosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getFech_Inser(),"utf8"):strtoupper($Siga_cat_catalogosDto->getFech_Inser()))))));
if($this->esFecha($Siga_cat_catalogosDto->getFech_Inser())){
$Siga_cat_catalogosDto->setFech_Inser($this->fechaMysql($Siga_cat_catalogosDto->getFech_Inser()));
}
$Siga_cat_catalogosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_cat_catalogosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_cat_catalogosDto->getUsr_Inser())){
$Siga_cat_catalogosDto->setUsr_Inser($this->fechaMysql($Siga_cat_catalogosDto->getUsr_Inser()));
}
$Siga_cat_catalogosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getFech_Mod(),"utf8"):strtoupper($Siga_cat_catalogosDto->getFech_Mod()))))));
if($this->esFecha($Siga_cat_catalogosDto->getFech_Mod())){
$Siga_cat_catalogosDto->setFech_Mod($this->fechaMysql($Siga_cat_catalogosDto->getFech_Mod()));
}
$Siga_cat_catalogosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_cat_catalogosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_cat_catalogosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_cat_catalogosDto->getUsr_Mod())){
$Siga_cat_catalogosDto->setUsr_Mod($this->fechaMysql($Siga_cat_catalogosDto->getUsr_Mod()));
}
return $Siga_cat_catalogosDto;
}
public function selectSiga_cat_catalogos($Siga_cat_catalogosDto){
$Siga_cat_catalogosDto=$this->validarSiga_cat_catalogos($Siga_cat_catalogosDto);
$Siga_cat_catalogosController = new Siga_cat_catalogosController();
$Siga_cat_catalogosDto = $Siga_cat_catalogosController->selectSiga_cat_catalogos($Siga_cat_catalogosDto);
if($Siga_cat_catalogosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_catalogosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}


public function insertSiga_cat_catalogos($Siga_cat_catalogosDto){
//$Siga_cat_catalogosDto=$this->validarSiga_cat_catalogos($Siga_cat_catalogosDto);
$Siga_cat_catalogosController = new Siga_cat_catalogosController();
$Siga_cat_catalogosDto = $Siga_cat_catalogosController->insertSiga_cat_catalogos($Siga_cat_catalogosDto);
//if($Siga_cat_catalogosDto!=""){
//$dtoToJson = new DtoToJson($Siga_cat_catalogosDto);
//return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
//}
$jsonDto = new Encode_JSON();
//return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));

return $jsonDto->encode($Siga_cat_catalogosDto);
}



public function consultartablas($Siga_cat_catalogosDto){
$Siga_cat_catalogosController = new Siga_cat_catalogosController();
$Siga_cat_catalogosDto = $Siga_cat_catalogosController->consultartablas($Siga_cat_catalogosDto);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_cat_catalogosDto);
}

public function insertCatalogos($Siga_cat_catalogosDto, $Desc_Campo, $Id_Campoedit){
$Siga_cat_catalogosController = new Siga_cat_catalogosController();
$Siga_cat_catalogosDto = $Siga_cat_catalogosController->insertCatalogos($Siga_cat_catalogosDto, $Desc_Campo, $Id_Campoedit);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_cat_catalogosDto);
}

public function deleteCatalogos($Siga_cat_catalogosDto, $Id_Campoedit){
$Siga_cat_catalogosController = new Siga_cat_catalogosController();
$Siga_cat_catalogosDto = $Siga_cat_catalogosController->deleteCatalogos($Siga_cat_catalogosDto, $Id_Campoedit);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_cat_catalogosDto);
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search) {
$Siga_cat_catalogosController = new Siga_cat_catalogosController();
return $Siga_cat_catalogosController->llenarDataTable($draw,$columns,$order,$start,$length,$search);
}

public function updateSiga_cat_catalogos($Siga_cat_catalogosDto){
//$Siga_cat_catalogosDto=$this->validarSiga_cat_catalogos($Siga_cat_catalogosDto);
$Siga_cat_catalogosController = new Siga_cat_catalogosController();
$Siga_cat_catalogosDto = $Siga_cat_catalogosController->updateSiga_cat_catalogos($Siga_cat_catalogosDto);
if($Siga_cat_catalogosDto!=""){
$dtoToJson = new DtoToJson($Siga_cat_catalogosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_cat_catalogos($Siga_cat_catalogosDto){
//$Siga_cat_catalogosDto=$this->validarSiga_cat_catalogos($Siga_cat_catalogosDto);
$Siga_cat_catalogosController = new Siga_cat_catalogosController();
$Siga_cat_catalogosDto = $Siga_cat_catalogosController->deleteSiga_cat_catalogos($Siga_cat_catalogosDto);
if($Siga_cat_catalogosDto==true){
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


/////
@$Id_Campoedit=$_POST["Id_Campoedit"];
/////
@$Id_Catalogo=$_POST["Id_Catalogo"];
@$Id_Area=$_POST["Id_Area"];
@$Nom_Tabla=$_POST["Nom_Tabla"];
@$Nom_Id_Campo=$_POST["Nom_Id_Campo"];
@$Nom_Desc_Campo=$_POST["Nom_Desc_Campo"];
@$Descripcion=$_POST["Descripcion"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';
@$Desc_Campo=$_POST["Desc_Campo"];

$siga_cat_catalogosFacade = new Siga_cat_catalogosFacade();
$siga_cat_catalogosDto = new Siga_cat_catalogosDTO();

$siga_cat_catalogosDto->setId_Catalogo($Id_Catalogo);
$siga_cat_catalogosDto->setId_Area($Id_Area);
$siga_cat_catalogosDto->setNom_Tabla($Nom_Tabla);
$siga_cat_catalogosDto->setNom_Id_Campo($Nom_Id_Campo);
$siga_cat_catalogosDto->setNom_Desc_Campo($Nom_Desc_Campo);
$siga_cat_catalogosDto->setDescripcion($Descripcion);
$siga_cat_catalogosDto->setFech_Inser($Fech_Inser);
$siga_cat_catalogosDto->setUsr_Inser($Usr_Inser);
$siga_cat_catalogosDto->setFech_Mod($Fech_Mod);
$siga_cat_catalogosDto->setUsr_Mod($Usr_Mod);

if( ($accion=="guardar") && ($Id_Catalogo=="") ){
$siga_cat_catalogosDto=$siga_cat_catalogosFacade->insertSiga_cat_catalogos($siga_cat_catalogosDto);
echo $siga_cat_catalogosDto;
} else if(($accion=="guardar") && ($Id_Catalogo!="")){
$siga_cat_catalogosDto=$siga_cat_catalogosFacade->updateSiga_cat_catalogos($siga_cat_catalogosDto);
echo $siga_cat_catalogosDto;
}else if($accion=="guardarcatalogos"){
$siga_cat_catalogosDto=$siga_cat_catalogosFacade->insertCatalogos($siga_cat_catalogosDto, $Desc_Campo, $Id_Campoedit);
echo $siga_cat_catalogosDto;
}else if($accion=="eliminacionlogica"){
$siga_cat_catalogosDto=$siga_cat_catalogosFacade->deleteCatalogos($siga_cat_catalogosDto, $Id_Campoedit);
echo $siga_cat_catalogosDto;
} else if($accion=="consultar"){
$siga_cat_catalogosDto=$siga_cat_catalogosFacade->selectSiga_cat_catalogos($siga_cat_catalogosDto);
echo $siga_cat_catalogosDto;
}else if($accion=="consultartablas"){
$siga_cat_catalogosDto=$siga_cat_catalogosFacade->consultartablas($siga_cat_catalogosDto);
echo $siga_cat_catalogosDto;
} else if( ($accion=="baja") && ($Id_Catalogo!="") ){
$siga_cat_catalogosDto=$siga_cat_catalogosFacade->deleteSiga_cat_catalogos($siga_cat_catalogosDto);
echo $siga_cat_catalogosDto;
} else if( ($accion=="seleccionar") && ($Id_Catalogo!="") ){
$siga_cat_catalogosDto=$siga_cat_catalogosFacade->selectSiga_cat_catalogos($siga_cat_catalogosDto);
echo $siga_cat_catalogosDto;
}else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
echo  $siga_cat_catalogosDto=$siga_cat_catalogosFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search); 
}


?>