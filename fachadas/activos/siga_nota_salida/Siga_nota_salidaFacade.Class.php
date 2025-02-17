<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_nota_salida/Siga_nota_salidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_nota_salida/Siga_nota_salidaController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_nota_salidaFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_nota_salida($Siga_nota_salidaDto){
$Siga_nota_salidaDto->setId_Nota_Salida(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getId_Nota_Salida(),"utf8"):strtoupper($Siga_nota_salidaDto->getId_Nota_Salida()))))));
if($this->esFecha($Siga_nota_salidaDto->getId_Nota_Salida())){
$Siga_nota_salidaDto->setId_Nota_Salida($this->fechaMysql($Siga_nota_salidaDto->getId_Nota_Salida()));
}
$Siga_nota_salidaDto->setId_Area_Realiza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getId_Area_Realiza(),"utf8"):strtoupper($Siga_nota_salidaDto->getId_Area_Realiza()))))));
if($this->esFecha($Siga_nota_salidaDto->getId_Area_Realiza())){
$Siga_nota_salidaDto->setId_Area_Realiza($this->fechaMysql($Siga_nota_salidaDto->getId_Area_Realiza()));
}
$Siga_nota_salidaDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getId_Ubic_Prim(),"utf8"):strtoupper($Siga_nota_salidaDto->getId_Ubic_Prim()))))));
if($this->esFecha($Siga_nota_salidaDto->getId_Ubic_Prim())){
$Siga_nota_salidaDto->setId_Ubic_Prim($this->fechaMysql($Siga_nota_salidaDto->getId_Ubic_Prim()));
}
$Siga_nota_salidaDto->setId_Ubic_Sec(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getId_Ubic_Sec(),"utf8"):strtoupper($Siga_nota_salidaDto->getId_Ubic_Sec()))))));
if($this->esFecha($Siga_nota_salidaDto->getId_Ubic_Sec())){
$Siga_nota_salidaDto->setId_Ubic_Sec($this->fechaMysql($Siga_nota_salidaDto->getId_Ubic_Sec()));
}
$Siga_nota_salidaDto->setId_Motivo_Salida(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getId_Motivo_Salida(),"utf8"):strtoupper($Siga_nota_salidaDto->getId_Motivo_Salida()))))));
if($this->esFecha($Siga_nota_salidaDto->getId_Motivo_Salida())){
$Siga_nota_salidaDto->setId_Motivo_Salida($this->fechaMysql($Siga_nota_salidaDto->getId_Motivo_Salida()));
}
$Siga_nota_salidaDto->setId_Usr_Realiza_Nota(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getId_Usr_Realiza_Nota(),"utf8"):strtoupper($Siga_nota_salidaDto->getId_Usr_Realiza_Nota()))))));
if($this->esFecha($Siga_nota_salidaDto->getId_Usr_Realiza_Nota())){
$Siga_nota_salidaDto->setId_Usr_Realiza_Nota($this->fechaMysql($Siga_nota_salidaDto->getId_Usr_Realiza_Nota()));
}
$Siga_nota_salidaDto->setNombre_Realiza_Nota(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getNombre_Realiza_Nota(),"utf8"):strtoupper($Siga_nota_salidaDto->getNombre_Realiza_Nota()))))));
if($this->esFecha($Siga_nota_salidaDto->getNombre_Realiza_Nota())){
$Siga_nota_salidaDto->setNombre_Realiza_Nota($this->fechaMysql($Siga_nota_salidaDto->getNombre_Realiza_Nota()));
}
$Siga_nota_salidaDto->setMail_Realiza_Nota(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getMail_Realiza_Nota(),"utf8"):strtoupper($Siga_nota_salidaDto->getMail_Realiza_Nota()))))));
if($this->esFecha($Siga_nota_salidaDto->getMail_Realiza_Nota())){
$Siga_nota_salidaDto->setMail_Realiza_Nota($this->fechaMysql($Siga_nota_salidaDto->getMail_Realiza_Nota()));
}
$Siga_nota_salidaDto->setFirma_Realiza_Nota(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getFirma_Realiza_Nota(),"utf8"):strtoupper($Siga_nota_salidaDto->getFirma_Realiza_Nota()))))));
if($this->esFecha($Siga_nota_salidaDto->getFirma_Realiza_Nota())){
$Siga_nota_salidaDto->setFirma_Realiza_Nota($this->fechaMysql($Siga_nota_salidaDto->getFirma_Realiza_Nota()));
}
$Siga_nota_salidaDto->setFech_Realiza_Nota(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getFech_Realiza_Nota(),"utf8"):strtoupper($Siga_nota_salidaDto->getFech_Realiza_Nota()))))));
if($this->esFecha($Siga_nota_salidaDto->getFech_Realiza_Nota())){
$Siga_nota_salidaDto->setFech_Realiza_Nota($this->fechaMysql($Siga_nota_salidaDto->getFech_Realiza_Nota()));
}
$Siga_nota_salidaDto->setId_Usr_Quien_Autoriza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getId_Usr_Quien_Autoriza(),"utf8"):strtoupper($Siga_nota_salidaDto->getId_Usr_Quien_Autoriza()))))));
if($this->esFecha($Siga_nota_salidaDto->getId_Usr_Quien_Autoriza())){
$Siga_nota_salidaDto->setId_Usr_Quien_Autoriza($this->fechaMysql($Siga_nota_salidaDto->getId_Usr_Quien_Autoriza()));
}
$Siga_nota_salidaDto->setNombre_Quien_Autoriza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getNombre_Quien_Autoriza(),"utf8"):strtoupper($Siga_nota_salidaDto->getNombre_Quien_Autoriza()))))));
if($this->esFecha($Siga_nota_salidaDto->getNombre_Quien_Autoriza())){
$Siga_nota_salidaDto->setNombre_Quien_Autoriza($this->fechaMysql($Siga_nota_salidaDto->getNombre_Quien_Autoriza()));
}
$Siga_nota_salidaDto->setMail_Quien_Autoriza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getMail_Quien_Autoriza(),"utf8"):strtoupper($Siga_nota_salidaDto->getMail_Quien_Autoriza()))))));
if($this->esFecha($Siga_nota_salidaDto->getMail_Quien_Autoriza())){
$Siga_nota_salidaDto->setMail_Quien_Autoriza($this->fechaMysql($Siga_nota_salidaDto->getMail_Quien_Autoriza()));
}
$Siga_nota_salidaDto->setFirma_Quien_Autoriza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getFirma_Quien_Autoriza(),"utf8"):strtoupper($Siga_nota_salidaDto->getFirma_Quien_Autoriza()))))));
if($this->esFecha($Siga_nota_salidaDto->getFirma_Quien_Autoriza())){
$Siga_nota_salidaDto->setFirma_Quien_Autoriza($this->fechaMysql($Siga_nota_salidaDto->getFirma_Quien_Autoriza()));
}
$Siga_nota_salidaDto->setFech_Autoriza(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getFech_Autoriza(),"utf8"):strtoupper($Siga_nota_salidaDto->getFech_Autoriza()))))));
if($this->esFecha($Siga_nota_salidaDto->getFech_Autoriza())){
$Siga_nota_salidaDto->setFech_Autoriza($this->fechaMysql($Siga_nota_salidaDto->getFech_Autoriza()));
}
$Siga_nota_salidaDto->setEmpresa_Recibe(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getEmpresa_Recibe(),"utf8"):strtoupper($Siga_nota_salidaDto->getEmpresa_Recibe()))))));
if($this->esFecha($Siga_nota_salidaDto->getEmpresa_Recibe())){
$Siga_nota_salidaDto->setEmpresa_Recibe($this->fechaMysql($Siga_nota_salidaDto->getEmpresa_Recibe()));
}
$Siga_nota_salidaDto->setNombre_Contacto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getNombre_Contacto(),"utf8"):strtoupper($Siga_nota_salidaDto->getNombre_Contacto()))))));
if($this->esFecha($Siga_nota_salidaDto->getNombre_Contacto())){
$Siga_nota_salidaDto->setNombre_Contacto($this->fechaMysql($Siga_nota_salidaDto->getNombre_Contacto()));
}
$Siga_nota_salidaDto->setTelefono_Contacto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getTelefono_Contacto(),"utf8"):strtoupper($Siga_nota_salidaDto->getTelefono_Contacto()))))));
if($this->esFecha($Siga_nota_salidaDto->getTelefono_Contacto())){
$Siga_nota_salidaDto->setTelefono_Contacto($this->fechaMysql($Siga_nota_salidaDto->getTelefono_Contacto()));
}
$Siga_nota_salidaDto->setMail_Contacto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getMail_Contacto(),"utf8"):strtoupper($Siga_nota_salidaDto->getMail_Contacto()))))));
if($this->esFecha($Siga_nota_salidaDto->getMail_Contacto())){
$Siga_nota_salidaDto->setMail_Contacto($this->fechaMysql($Siga_nota_salidaDto->getMail_Contacto()));
}
$Siga_nota_salidaDto->setFirma_Quien_Recibe(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getFirma_Quien_Recibe(),"utf8"):strtoupper($Siga_nota_salidaDto->getFirma_Quien_Recibe()))))));
if($this->esFecha($Siga_nota_salidaDto->getFirma_Quien_Recibe())){
$Siga_nota_salidaDto->setFirma_Quien_Recibe($this->fechaMysql($Siga_nota_salidaDto->getFirma_Quien_Recibe()));
}
$Siga_nota_salidaDto->setFech_Firma_Recibe(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getFech_Firma_Recibe(),"utf8"):strtoupper($Siga_nota_salidaDto->getFech_Firma_Recibe()))))));
if($this->esFecha($Siga_nota_salidaDto->getFech_Firma_Recibe())){
$Siga_nota_salidaDto->setFech_Firma_Recibe($this->fechaMysql($Siga_nota_salidaDto->getFech_Firma_Recibe()));
}
$Siga_nota_salidaDto->setObservaciones(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getObservaciones(),"utf8"):strtoupper($Siga_nota_salidaDto->getObservaciones()))))));
if($this->esFecha($Siga_nota_salidaDto->getObservaciones())){
$Siga_nota_salidaDto->setObservaciones($this->fechaMysql($Siga_nota_salidaDto->getObservaciones()));
}
$Siga_nota_salidaDto->setUrl_Adjuntos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getUrl_Adjuntos(),"utf8"):strtoupper($Siga_nota_salidaDto->getUrl_Adjuntos()))))));
if($this->esFecha($Siga_nota_salidaDto->getUrl_Adjuntos())){
$Siga_nota_salidaDto->setUrl_Adjuntos($this->fechaMysql($Siga_nota_salidaDto->getUrl_Adjuntos()));
}
$Siga_nota_salidaDto->setEstatus_Proceso(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getEstatus_Proceso(),"utf8"):strtoupper($Siga_nota_salidaDto->getEstatus_Proceso()))))));
if($this->esFecha($Siga_nota_salidaDto->getEstatus_Proceso())){
$Siga_nota_salidaDto->setEstatus_Proceso($this->fechaMysql($Siga_nota_salidaDto->getEstatus_Proceso()));
}
$Siga_nota_salidaDto->setTipo_Solicitud(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getTipo_Solicitud(),"utf8"):strtoupper($Siga_nota_salidaDto->getTipo_Solicitud()))))));
if($this->esFecha($Siga_nota_salidaDto->getTipo_Solicitud())){
$Siga_nota_salidaDto->setTipo_Solicitud($this->fechaMysql($Siga_nota_salidaDto->getTipo_Solicitud()));
}
$Siga_nota_salidaDto->setDesc_Motivo_Cancel_Proceso(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso(),"utf8"):strtoupper($Siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()))))));
if($this->esFecha($Siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso())){
$Siga_nota_salidaDto->setDesc_Motivo_Cancel_Proceso($this->fechaMysql($Siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()));
}
$Siga_nota_salidaDto->setNota_Duplicada(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getNota_Duplicada(),"utf8"):strtoupper($Siga_nota_salidaDto->getNota_Duplicada()))))));
if($this->esFecha($Siga_nota_salidaDto->getNota_Duplicada())){
$Siga_nota_salidaDto->setNota_Duplicada($this->fechaMysql($Siga_nota_salidaDto->getNota_Duplicada()));
}
$Siga_nota_salidaDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getUsr_Inser(),"utf8"):strtoupper($Siga_nota_salidaDto->getUsr_Inser()))))));
if($this->esFecha($Siga_nota_salidaDto->getUsr_Inser())){
$Siga_nota_salidaDto->setUsr_Inser($this->fechaMysql($Siga_nota_salidaDto->getUsr_Inser()));
}
$Siga_nota_salidaDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getFech_Inser(),"utf8"):strtoupper($Siga_nota_salidaDto->getFech_Inser()))))));
if($this->esFecha($Siga_nota_salidaDto->getFech_Inser())){
$Siga_nota_salidaDto->setFech_Inser($this->fechaMysql($Siga_nota_salidaDto->getFech_Inser()));
}
$Siga_nota_salidaDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getUsr_Mod(),"utf8"):strtoupper($Siga_nota_salidaDto->getUsr_Mod()))))));
if($this->esFecha($Siga_nota_salidaDto->getUsr_Mod())){
$Siga_nota_salidaDto->setUsr_Mod($this->fechaMysql($Siga_nota_salidaDto->getUsr_Mod()));
}
$Siga_nota_salidaDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getFech_Mod(),"utf8"):strtoupper($Siga_nota_salidaDto->getFech_Mod()))))));
if($this->esFecha($Siga_nota_salidaDto->getFech_Mod())){
$Siga_nota_salidaDto->setFech_Mod($this->fechaMysql($Siga_nota_salidaDto->getFech_Mod()));
}
$Siga_nota_salidaDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_nota_salidaDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_nota_salidaDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_nota_salidaDto->getEstatus_Reg())){
$Siga_nota_salidaDto->setEstatus_Reg($this->fechaMysql($Siga_nota_salidaDto->getEstatus_Reg()));
}
return $Siga_nota_salidaDto;
}
public function selectSiga_nota_salida($Siga_nota_salidaDto){
$Siga_nota_salidaDto=$this->validarSiga_nota_salida($Siga_nota_salidaDto);
$Siga_nota_salidaController = new Siga_nota_salidaController();
$Siga_nota_salidaDto = $Siga_nota_salidaController->selectSiga_nota_salida($Siga_nota_salidaDto);
if($Siga_nota_salidaDto!=""){
$dtoToJson = new DtoToJson($Siga_nota_salidaDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_nota_salida($Siga_nota_salidaDto){
$Siga_nota_salidaDto=$this->validarSiga_nota_salida($Siga_nota_salidaDto);
$Siga_nota_salidaController = new Siga_nota_salidaController();
$Siga_nota_salidaDto = $Siga_nota_salidaController->insertSiga_nota_salida($Siga_nota_salidaDto);
if($Siga_nota_salidaDto!=""){
$dtoToJson = new DtoToJson($Siga_nota_salidaDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_nota_salida($Siga_nota_salidaDto){
$Siga_nota_salidaDto=$this->validarSiga_nota_salida($Siga_nota_salidaDto);
$Siga_nota_salidaController = new Siga_nota_salidaController();
$Siga_nota_salidaDto = $Siga_nota_salidaController->updateSiga_nota_salida($Siga_nota_salidaDto);
if($Siga_nota_salidaDto!=""){
$dtoToJson = new DtoToJson($Siga_nota_salidaDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_nota_salida($Siga_nota_salidaDto){
$Siga_nota_salidaDto=$this->validarSiga_nota_salida($Siga_nota_salidaDto);
$Siga_nota_salidaController = new Siga_nota_salidaController();
$Siga_nota_salidaDto = $Siga_nota_salidaController->deleteSiga_nota_salida($Siga_nota_salidaDto);
if($Siga_nota_salidaDto==true){
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



@$Id_Nota_Salida=$_POST["Id_Nota_Salida"];
@$Id_Area_Realiza=$_POST["Id_Area_Realiza"];
@$Id_Ubic_Prim=$_POST["Id_Ubic_Prim"];
@$Id_Ubic_Sec=$_POST["Id_Ubic_Sec"];
@$Id_Motivo_Salida=$_POST["Id_Motivo_Salida"];
@$Id_Usr_Realiza_Nota=$_POST["Id_Usr_Realiza_Nota"];
@$Nombre_Realiza_Nota=$_POST["Nombre_Realiza_Nota"];
@$Mail_Realiza_Nota=$_POST["Mail_Realiza_Nota"];
@$Firma_Realiza_Nota=$_POST["Firma_Realiza_Nota"];
@$Fech_Realiza_Nota=$_POST["Fech_Realiza_Nota"];
@$Id_Usr_Quien_Autoriza=$_POST["Id_Usr_Quien_Autoriza"];
@$Nombre_Quien_Autoriza=$_POST["Nombre_Quien_Autoriza"];
@$Mail_Quien_Autoriza=$_POST["Mail_Quien_Autoriza"];
@$Firma_Quien_Autoriza=$_POST["Firma_Quien_Autoriza"];
@$Fech_Autoriza=$_POST["Fech_Autoriza"];
@$Empresa_Recibe=$_POST["Empresa_Recibe"];
@$Nombre_Contacto=$_POST["Nombre_Contacto"];
@$Telefono_Contacto=$_POST["Telefono_Contacto"];
@$Mail_Contacto=$_POST["Mail_Contacto"];
@$Firma_Quien_Recibe=$_POST["Firma_Quien_Recibe"];
@$Fech_Firma_Recibe=$_POST["Fech_Firma_Recibe"];
@$Observaciones=$_POST["Observaciones"];
@$Url_Adjuntos=$_POST["Url_Adjuntos"];
@$Estatus_Proceso=$_POST["Estatus_Proceso"];
@$Tipo_Solicitud=$_POST["Tipo_Solicitud"];
@$Desc_Motivo_Cancel_Proceso=$_POST["Desc_Motivo_Cancel_Proceso"];
@$Nota_Duplicada=$_POST["Nota_Duplicada"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$accion=$_POST["accion"];

$siga_nota_salidaFacade = new Siga_nota_salidaFacade();
$siga_nota_salidaDto = new Siga_nota_salidaDTO();

$siga_nota_salidaDto->setId_Nota_Salida($Id_Nota_Salida);
$siga_nota_salidaDto->setId_Area_Realiza($Id_Area_Realiza);
$siga_nota_salidaDto->setId_Ubic_Prim($Id_Ubic_Prim);
$siga_nota_salidaDto->setId_Ubic_Sec($Id_Ubic_Sec);
$siga_nota_salidaDto->setId_Motivo_Salida($Id_Motivo_Salida);
$siga_nota_salidaDto->setId_Usr_Realiza_Nota($Id_Usr_Realiza_Nota);
$siga_nota_salidaDto->setNombre_Realiza_Nota($Nombre_Realiza_Nota);
$siga_nota_salidaDto->setMail_Realiza_Nota($Mail_Realiza_Nota);
$siga_nota_salidaDto->setFirma_Realiza_Nota($Firma_Realiza_Nota);
$siga_nota_salidaDto->setFech_Realiza_Nota($Fech_Realiza_Nota);
$siga_nota_salidaDto->setId_Usr_Quien_Autoriza($Id_Usr_Quien_Autoriza);
$siga_nota_salidaDto->setNombre_Quien_Autoriza($Nombre_Quien_Autoriza);
$siga_nota_salidaDto->setMail_Quien_Autoriza($Mail_Quien_Autoriza);
$siga_nota_salidaDto->setFirma_Quien_Autoriza($Firma_Quien_Autoriza);
$siga_nota_salidaDto->setFech_Autoriza($Fech_Autoriza);
$siga_nota_salidaDto->setEmpresa_Recibe($Empresa_Recibe);
$siga_nota_salidaDto->setNombre_Contacto($Nombre_Contacto);
$siga_nota_salidaDto->setTelefono_Contacto($Telefono_Contacto);
$siga_nota_salidaDto->setMail_Contacto($Mail_Contacto);
$siga_nota_salidaDto->setFirma_Quien_Recibe($Firma_Quien_Recibe);
$siga_nota_salidaDto->setFech_Firma_Recibe($Fech_Firma_Recibe);
$siga_nota_salidaDto->setObservaciones($Observaciones);
$siga_nota_salidaDto->setUrl_Adjuntos($Url_Adjuntos);
$siga_nota_salidaDto->setEstatus_Proceso($Estatus_Proceso);
$siga_nota_salidaDto->setTipo_Solicitud($Tipo_Solicitud);
$siga_nota_salidaDto->setDesc_Motivo_Cancel_Proceso($Desc_Motivo_Cancel_Proceso);
$siga_nota_salidaDto->setNota_Duplicada($Nota_Duplicada);
$siga_nota_salidaDto->setUsr_Inser($Usr_Inser);
$siga_nota_salidaDto->setFech_Inser($Fech_Inser);
$siga_nota_salidaDto->setUsr_Mod($Usr_Mod);
$siga_nota_salidaDto->setFech_Mod($Fech_Mod);
$siga_nota_salidaDto->setEstatus_Reg($Estatus_Reg);

if( ($accion=="guardar") && ($Id_Nota_Salida=="") ){
$siga_nota_salidaDto=$siga_nota_salidaFacade->insertSiga_nota_salida($siga_nota_salidaDto);
echo $siga_nota_salidaDto;
} else if(($accion=="guardar") && ($Id_Nota_Salida!="")){
$siga_nota_salidaDto=$siga_nota_salidaFacade->updateSiga_nota_salida($siga_nota_salidaDto);
echo $siga_nota_salidaDto;
} else if($accion=="consultar"){
$siga_nota_salidaDto=$siga_nota_salidaFacade->selectSiga_nota_salida($siga_nota_salidaDto);
echo $siga_nota_salidaDto;
} else if( ($accion=="baja") && ($Id_Nota_Salida!="") ){
$siga_nota_salidaDto=$siga_nota_salidaFacade->deleteSiga_nota_salida($siga_nota_salidaDto);
echo $siga_nota_salidaDto;
} else if( ($accion=="seleccionar") && ($Id_Nota_Salida!="") ){
$siga_nota_salidaDto=$siga_nota_salidaFacade->selectSiga_nota_salida($siga_nota_salidaDto);
echo $siga_nota_salidaDto;
}


?>