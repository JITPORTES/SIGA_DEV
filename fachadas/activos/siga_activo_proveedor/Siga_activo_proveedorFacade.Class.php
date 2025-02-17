<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_activo_proveedor/Siga_activo_proveedorDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_activo_proveedor/Siga_activo_proveedorController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_activo_proveedorFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_activo_proveedor($Siga_activo_proveedorDto){
$Siga_activo_proveedorDto->setId_activo_proveedor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getId_activo_proveedor(),"utf8"):strtoupper($Siga_activo_proveedorDto->getId_activo_proveedor()))))));
if($this->esFecha($Siga_activo_proveedorDto->getId_activo_proveedor())){
$Siga_activo_proveedorDto->setId_activo_proveedor($this->fechaMysql($Siga_activo_proveedorDto->getId_activo_proveedor()));
}
$Siga_activo_proveedorDto->setid_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getid_Activo(),"utf8"):strtoupper($Siga_activo_proveedorDto->getid_Activo()))))));
if($this->esFecha($Siga_activo_proveedorDto->getid_Activo())){
$Siga_activo_proveedorDto->setid_Activo($this->fechaMysql($Siga_activo_proveedorDto->getid_Activo()));
}
$Siga_activo_proveedorDto->setNumOrdenCompra(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getNumOrdenCompra(),"utf8"):strtoupper($Siga_activo_proveedorDto->getNumOrdenCompra()))))));
if($this->esFecha($Siga_activo_proveedorDto->getNumOrdenCompra())){
$Siga_activo_proveedorDto->setNumOrdenCompra($this->fechaMysql($Siga_activo_proveedorDto->getNumOrdenCompra()));
}
$Siga_activo_proveedorDto->setNumFactura(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getNumFactura(),"utf8"):strtoupper($Siga_activo_proveedorDto->getNumFactura()))))));
if($this->esFecha($Siga_activo_proveedorDto->getNumFactura())){
$Siga_activo_proveedorDto->setNumFactura($this->fechaMysql($Siga_activo_proveedorDto->getNumFactura()));
}
$Siga_activo_proveedorDto->setFechaFactura(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getFechaFactura(),"utf8"):strtoupper($Siga_activo_proveedorDto->getFechaFactura()))))));
if($this->esFecha($Siga_activo_proveedorDto->getFechaFactura())){
$Siga_activo_proveedorDto->setFechaFactura($this->fechaMysql($Siga_activo_proveedorDto->getFechaFactura()));
}
$Siga_activo_proveedorDto->setUUID(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getUUID(),"utf8"):strtoupper($Siga_activo_proveedorDto->getUUID()))))));
if($this->esFecha($Siga_activo_proveedorDto->getUUID())){
$Siga_activo_proveedorDto->setUUID($this->fechaMysql($Siga_activo_proveedorDto->getUUID()));
}
$Siga_activo_proveedorDto->setFolio_Fiscal(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getFolio_Fiscal(),"utf8"):strtoupper($Siga_activo_proveedorDto->getFolio_Fiscal()))))));
if($this->esFecha($Siga_activo_proveedorDto->getFolio_Fiscal())){
$Siga_activo_proveedorDto->setFolio_Fiscal($this->fechaMysql($Siga_activo_proveedorDto->getFolio_Fiscal()));
}
$Siga_activo_proveedorDto->setMonto_F(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getMonto_F(),"utf8"):strtoupper($Siga_activo_proveedorDto->getMonto_F()))))));
if($this->esFecha($Siga_activo_proveedorDto->getMonto_F())){
$Siga_activo_proveedorDto->setMonto_F($this->fechaMysql($Siga_activo_proveedorDto->getMonto_F()));
}
$Siga_activo_proveedorDto->setMontoFactura(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getMontoFactura(),"utf8"):strtoupper($Siga_activo_proveedorDto->getMontoFactura()))))));
if($this->esFecha($Siga_activo_proveedorDto->getMontoFactura())){
$Siga_activo_proveedorDto->setMontoFactura($this->fechaMysql($Siga_activo_proveedorDto->getMontoFactura()));
}
$Siga_activo_proveedorDto->setNumContrato(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getNumContrato(),"utf8"):strtoupper($Siga_activo_proveedorDto->getNumContrato()))))));
if($this->esFecha($Siga_activo_proveedorDto->getNumContrato())){
$Siga_activo_proveedorDto->setNumContrato($this->fechaMysql($Siga_activo_proveedorDto->getNumContrato()));
}
$Siga_activo_proveedorDto->setVidaUtilFabricante(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getVidaUtilFabricante(),"utf8"):strtoupper($Siga_activo_proveedorDto->getVidaUtilFabricante()))))));
if($this->esFecha($Siga_activo_proveedorDto->getVidaUtilFabricante())){
$Siga_activo_proveedorDto->setVidaUtilFabricante($this->fechaMysql($Siga_activo_proveedorDto->getVidaUtilFabricante()));
}
$Siga_activo_proveedorDto->setVidaUtilCHS(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getVidaUtilCHS(),"utf8"):strtoupper($Siga_activo_proveedorDto->getVidaUtilCHS()))))));
if($this->esFecha($Siga_activo_proveedorDto->getVidaUtilCHS())){
$Siga_activo_proveedorDto->setVidaUtilCHS($this->fechaMysql($Siga_activo_proveedorDto->getVidaUtilCHS()));
}
$Siga_activo_proveedorDto->setGarantia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getGarantia(),"utf8"):strtoupper($Siga_activo_proveedorDto->getGarantia()))))));
if($this->esFecha($Siga_activo_proveedorDto->getGarantia())){
$Siga_activo_proveedorDto->setGarantia($this->fechaMysql($Siga_activo_proveedorDto->getGarantia()));
}
$Siga_activo_proveedorDto->setExtGarantia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getExtGarantia(),"utf8"):strtoupper($Siga_activo_proveedorDto->getExtGarantia()))))));
if($this->esFecha($Siga_activo_proveedorDto->getExtGarantia())){
$Siga_activo_proveedorDto->setExtGarantia($this->fechaMysql($Siga_activo_proveedorDto->getExtGarantia()));
}
$Siga_activo_proveedorDto->setFecha_Vencimiento(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getFecha_Vencimiento(),"utf8"):strtoupper($Siga_activo_proveedorDto->getFecha_Vencimiento()))))));
if($this->esFecha($Siga_activo_proveedorDto->getFecha_Vencimiento())){
$Siga_activo_proveedorDto->setFecha_Vencimiento($this->fechaMysql($Siga_activo_proveedorDto->getFecha_Vencimiento()));
}
$Siga_activo_proveedorDto->setPoliza_Url(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getPoliza_Url(),"utf8"):strtoupper($Siga_activo_proveedorDto->getPoliza_Url()))))));
if($this->esFecha($Siga_activo_proveedorDto->getPoliza_Url())){
$Siga_activo_proveedorDto->setPoliza_Url($this->fechaMysql($Siga_activo_proveedorDto->getPoliza_Url()));
}
$Siga_activo_proveedorDto->setNombreProveedor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getNombreProveedor(),"utf8"):strtoupper($Siga_activo_proveedorDto->getNombreProveedor()))))));
if($this->esFecha($Siga_activo_proveedorDto->getNombreProveedor())){
$Siga_activo_proveedorDto->setNombreProveedor($this->fechaMysql($Siga_activo_proveedorDto->getNombreProveedor()));
}
$Siga_activo_proveedorDto->setId_Proveedor(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getId_Proveedor(),"utf8"):strtoupper($Siga_activo_proveedorDto->getId_Proveedor()))))));
if($this->esFecha($Siga_activo_proveedorDto->getId_Proveedor())){
$Siga_activo_proveedorDto->setId_Proveedor($this->fechaMysql($Siga_activo_proveedorDto->getId_Proveedor()));
}
$Siga_activo_proveedorDto->setContacto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getContacto(),"utf8"):strtoupper($Siga_activo_proveedorDto->getContacto()))))));
if($this->esFecha($Siga_activo_proveedorDto->getContacto())){
$Siga_activo_proveedorDto->setContacto($this->fechaMysql($Siga_activo_proveedorDto->getContacto()));
}
$Siga_activo_proveedorDto->setTelefono(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getTelefono(),"utf8"):strtoupper($Siga_activo_proveedorDto->getTelefono()))))));
if($this->esFecha($Siga_activo_proveedorDto->getTelefono())){
$Siga_activo_proveedorDto->setTelefono($this->fechaMysql($Siga_activo_proveedorDto->getTelefono()));
}
$Siga_activo_proveedorDto->setDocRecibida(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getDocRecibida(),"utf8"):strtoupper($Siga_activo_proveedorDto->getDocRecibida()))))));
if($this->esFecha($Siga_activo_proveedorDto->getDocRecibida())){
$Siga_activo_proveedorDto->setDocRecibida($this->fechaMysql($Siga_activo_proveedorDto->getDocRecibida()));
}
$Siga_activo_proveedorDto->setAccesorios(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getAccesorios(),"utf8"):strtoupper($Siga_activo_proveedorDto->getAccesorios()))))));
if($this->esFecha($Siga_activo_proveedorDto->getAccesorios())){
$Siga_activo_proveedorDto->setAccesorios($this->fechaMysql($Siga_activo_proveedorDto->getAccesorios()));
}
$Siga_activo_proveedorDto->setCorreo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getCorreo(),"utf8"):strtoupper($Siga_activo_proveedorDto->getCorreo()))))));
if($this->esFecha($Siga_activo_proveedorDto->getCorreo())){
$Siga_activo_proveedorDto->setCorreo($this->fechaMysql($Siga_activo_proveedorDto->getCorreo()));
}
$Siga_activo_proveedorDto->setConsumibles(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getConsumibles(),"utf8"):strtoupper($Siga_activo_proveedorDto->getConsumibles()))))));
if($this->esFecha($Siga_activo_proveedorDto->getConsumibles())){
$Siga_activo_proveedorDto->setConsumibles($this->fechaMysql($Siga_activo_proveedorDto->getConsumibles()));
}
$Siga_activo_proveedorDto->setUrl_Contrato(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getUrl_Contrato(),"utf8"):strtoupper($Siga_activo_proveedorDto->getUrl_Contrato()))))));
if($this->esFecha($Siga_activo_proveedorDto->getUrl_Contrato())){
$Siga_activo_proveedorDto->setUrl_Contrato($this->fechaMysql($Siga_activo_proveedorDto->getUrl_Contrato()));
}
$Siga_activo_proveedorDto->setUrl_Otro_Doc(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getUrl_Otro_Doc(),"utf8"):strtoupper($Siga_activo_proveedorDto->getUrl_Otro_Doc()))))));
if($this->esFecha($Siga_activo_proveedorDto->getUrl_Otro_Doc())){
$Siga_activo_proveedorDto->setUrl_Otro_Doc($this->fechaMysql($Siga_activo_proveedorDto->getUrl_Otro_Doc()));
}
$Siga_activo_proveedorDto->setUrl_Factura(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getUrl_Factura(),"utf8"):strtoupper($Siga_activo_proveedorDto->getUrl_Factura()))))));
if($this->esFecha($Siga_activo_proveedorDto->getUrl_Factura())){
$Siga_activo_proveedorDto->setUrl_Factura($this->fechaMysql($Siga_activo_proveedorDto->getUrl_Factura()));
}
$Siga_activo_proveedorDto->setUrl_Xml(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getUrl_Xml(),"utf8"):strtoupper($Siga_activo_proveedorDto->getUrl_Xml()))))));
if($this->esFecha($Siga_activo_proveedorDto->getUrl_Xml())){
$Siga_activo_proveedorDto->setUrl_Xml($this->fechaMysql($Siga_activo_proveedorDto->getUrl_Xml()));
}
$Siga_activo_proveedorDto->setLink(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getLink(),"utf8"):strtoupper($Siga_activo_proveedorDto->getLink()))))));
if($this->esFecha($Siga_activo_proveedorDto->getLink())){
$Siga_activo_proveedorDto->setLink($this->fechaMysql($Siga_activo_proveedorDto->getLink()));
}
$Siga_activo_proveedorDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getFech_Inser(),"utf8"):strtoupper($Siga_activo_proveedorDto->getFech_Inser()))))));
if($this->esFecha($Siga_activo_proveedorDto->getFech_Inser())){
$Siga_activo_proveedorDto->setFech_Inser($this->fechaMysql($Siga_activo_proveedorDto->getFech_Inser()));
}
$Siga_activo_proveedorDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getUsr_Inser(),"utf8"):strtoupper($Siga_activo_proveedorDto->getUsr_Inser()))))));
if($this->esFecha($Siga_activo_proveedorDto->getUsr_Inser())){
$Siga_activo_proveedorDto->setUsr_Inser($this->fechaMysql($Siga_activo_proveedorDto->getUsr_Inser()));
}
$Siga_activo_proveedorDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getFech_Mod(),"utf8"):strtoupper($Siga_activo_proveedorDto->getFech_Mod()))))));
if($this->esFecha($Siga_activo_proveedorDto->getFech_Mod())){
$Siga_activo_proveedorDto->setFech_Mod($this->fechaMysql($Siga_activo_proveedorDto->getFech_Mod()));
}
$Siga_activo_proveedorDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getUsr_Mod(),"utf8"):strtoupper($Siga_activo_proveedorDto->getUsr_Mod()))))));
if($this->esFecha($Siga_activo_proveedorDto->getUsr_Mod())){
$Siga_activo_proveedorDto->setUsr_Mod($this->fechaMysql($Siga_activo_proveedorDto->getUsr_Mod()));
}
$Siga_activo_proveedorDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activo_proveedorDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_activo_proveedorDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_activo_proveedorDto->getEstatus_Reg())){
$Siga_activo_proveedorDto->setEstatus_Reg($this->fechaMysql($Siga_activo_proveedorDto->getEstatus_Reg()));
}
return $Siga_activo_proveedorDto;
}
public function selectSiga_activo_proveedor($Siga_activo_proveedorDto){
$Siga_activo_proveedorDto=$this->validarSiga_activo_proveedor($Siga_activo_proveedorDto);
$Siga_activo_proveedorController = new Siga_activo_proveedorController();
$Siga_activo_proveedorDto = $Siga_activo_proveedorController->selectSiga_activo_proveedor($Siga_activo_proveedorDto);
if($Siga_activo_proveedorDto!=""){
$dtoToJson = new DtoToJson($Siga_activo_proveedorDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_activo_proveedor($Siga_activo_proveedorDto, $No_Capex){
//$Siga_activo_proveedorDto=$this->validarSiga_activo_proveedor($Siga_activo_proveedorDto);
$Siga_activo_proveedorController = new Siga_activo_proveedorController();
$Siga_activo_proveedorDto = $Siga_activo_proveedorController->insertSiga_activo_proveedor($Siga_activo_proveedorDto, $No_Capex);
if($Siga_activo_proveedorDto!=""){
$dtoToJson = new DtoToJson($Siga_activo_proveedorDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_activo_proveedor($Siga_activo_proveedorDto, $No_Capex){
//$Siga_activo_proveedorDto=$this->validarSiga_activo_proveedor($Siga_activo_proveedorDto);
$Siga_activo_proveedorController = new Siga_activo_proveedorController();
$Siga_activo_proveedorDto = $Siga_activo_proveedorController->updateSiga_activo_proveedor($Siga_activo_proveedorDto, $No_Capex);
if($Siga_activo_proveedorDto!=""){
$dtoToJson = new DtoToJson($Siga_activo_proveedorDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_activo_proveedor($Siga_activo_proveedorDto){
//$Siga_activo_proveedorDto=$this->validarSiga_activo_proveedor($Siga_activo_proveedorDto);
$Siga_activo_proveedorController = new Siga_activo_proveedorController();
$Siga_activo_proveedorDto = $Siga_activo_proveedorController->deleteSiga_activo_proveedor($Siga_activo_proveedorDto);
if($Siga_activo_proveedorDto==true){
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



@$Id_activo_proveedor=$_POST["Id_activo_proveedor"];
@$id_Activo=$_POST["id_Activo"];
@$NumOrdenCompra=$_POST["NumOrdenCompra"];
@$NumFactura=$_POST["NumFactura"];
@$FechaFactura=$_POST["FechaFactura"];
@$UUID=$_POST["UUID"];
@$Folio_Fiscal=$_POST["Folio_Fiscal"];
@$Monto_F=$_POST["Monto_F"];
@$MontoFactura=$_POST["MontoFactura"];
@$NumContrato=$_POST["NumContrato"];
@$VidaUtilFabricante=$_POST["VidaUtilFabricante"];
@$VidaUtilCHS=$_POST["VidaUtilCHS"];
@$Garantia=$_POST["Garantia"];
@$ExtGarantia=$_POST["ExtGarantia"];
@$Fecha_Vencimiento=$_POST["Fecha_Vencimiento"];
@$Poliza_Url=$_POST["Poliza_Url"];
@$NombreProveedor=$_POST["NombreProveedor"];
@$Id_Proveedor=$_POST["Id_Proveedor"];
@$Contacto=$_POST["Contacto"];
@$Telefono=$_POST["Telefono"];
@$DocRecibida=$_POST["DocRecibida"];
@$Accesorios=$_POST["Accesorios"];
@$Correo=$_POST["Correo"];
@$Consumibles=$_POST["Consumibles"];
@$Url_Contrato=$_POST["Url_Contrato"];
@$Url_Otro_Doc=$_POST["Url_Otro_Doc"];
@$Url_Factura=$_POST["Url_Factura"];
@$Url_Xml=$_POST["Url_Xml"];
@$Link=$_POST["Link"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];
@$No_Capex=$_POST["No_Capex"];

$siga_activo_proveedorFacade = new Siga_activo_proveedorFacade();
$siga_activo_proveedorDto = new Siga_activo_proveedorDTO();

$siga_activo_proveedorDto->setId_activo_proveedor($Id_activo_proveedor);
$siga_activo_proveedorDto->setId_Activo($id_Activo);
$siga_activo_proveedorDto->setNumOrdenCompra($NumOrdenCompra);
$siga_activo_proveedorDto->setNumFactura($NumFactura);
$siga_activo_proveedorDto->setFechaFactura($FechaFactura);
$siga_activo_proveedorDto->setUUID($UUID);
$siga_activo_proveedorDto->setFolio_Fiscal($Folio_Fiscal);
$siga_activo_proveedorDto->setMonto_F($Monto_F);
$siga_activo_proveedorDto->setMontoFactura($MontoFactura);
$siga_activo_proveedorDto->setNumContrato($NumContrato);
$siga_activo_proveedorDto->setVidaUtilFabricante($VidaUtilFabricante);
$siga_activo_proveedorDto->setVidaUtilCHS($VidaUtilCHS);
$siga_activo_proveedorDto->setGarantia($Garantia);
$siga_activo_proveedorDto->setExtGarantia($ExtGarantia);
$siga_activo_proveedorDto->setFecha_Vencimiento($Fecha_Vencimiento);
$siga_activo_proveedorDto->setPoliza_Url($Poliza_Url);
$siga_activo_proveedorDto->setNombreProveedor($NombreProveedor);
$siga_activo_proveedorDto->setId_Proveedor($Id_Proveedor);
$siga_activo_proveedorDto->setContacto($Contacto);
$siga_activo_proveedorDto->setTelefono($Telefono);
$siga_activo_proveedorDto->setDocRecibida($DocRecibida);
$siga_activo_proveedorDto->setAccesorios($Accesorios);
$siga_activo_proveedorDto->setCorreo($Correo);
$siga_activo_proveedorDto->setConsumibles($Consumibles);
$siga_activo_proveedorDto->setUrl_Contrato($Url_Contrato);
$siga_activo_proveedorDto->setUrl_Otro_Doc($Url_Otro_Doc);
$siga_activo_proveedorDto->setUrl_Factura($Url_Factura);
$siga_activo_proveedorDto->setUrl_Xml($Url_Xml);
$siga_activo_proveedorDto->setLink($Link);
$siga_activo_proveedorDto->setFech_Inser($Fech_Inser);
$siga_activo_proveedorDto->setUsr_Inser($Usr_Inser);
$siga_activo_proveedorDto->setFech_Mod($Fech_Mod);
$siga_activo_proveedorDto->setUsr_Mod($Usr_Mod);
$siga_activo_proveedorDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_activo_proveedor=="") ){
$siga_activo_proveedorDto=$siga_activo_proveedorFacade->insertSiga_activo_proveedor($siga_activo_proveedorDto, $No_Capex);
echo $siga_activo_proveedorDto;
} else if(($accion=="guardar") && ($Id_activo_proveedor!="")){
$siga_activo_proveedorDto=$siga_activo_proveedorFacade->updateSiga_activo_proveedor($siga_activo_proveedorDto, $No_Capex);
echo $siga_activo_proveedorDto;
} else if($accion=="consultar"){
$siga_activo_proveedorDto=$siga_activo_proveedorFacade->selectSiga_activo_proveedor($siga_activo_proveedorDto);
echo $siga_activo_proveedorDto;
} else if( ($accion=="baja") && ($Id_activo_proveedor!="") ){
$siga_activo_proveedorDto=$siga_activo_proveedorFacade->deleteSiga_activo_proveedor($siga_activo_proveedorDto);
echo $siga_activo_proveedorDto;
} else if( ($accion=="seleccionar") && ($Id_activo_proveedor!="") ){
$siga_activo_proveedorDto=$siga_activo_proveedorFacade->selectSiga_activo_proveedor($siga_activo_proveedorDto);
echo $siga_activo_proveedorDto;
}


?>