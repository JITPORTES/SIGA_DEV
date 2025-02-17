<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_sla_p/Siga_sla_pDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_sla_p/Siga_sla_pController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_sla_pFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_sla_p($Siga_sla_pDto){
$Siga_sla_pDto->setId_Sla_P(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getId_Sla_P(),"utf8"):strtoupper($Siga_sla_pDto->getId_Sla_P()))))));
if($this->esFecha($Siga_sla_pDto->getId_Sla_P())){
$Siga_sla_pDto->setId_Sla_P($this->fechaMysql($Siga_sla_pDto->getId_Sla_P()));
}
$Siga_sla_pDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getId_Area(),"utf8"):strtoupper($Siga_sla_pDto->getId_Area()))))));
if($this->esFecha($Siga_sla_pDto->getId_Area())){
$Siga_sla_pDto->setId_Area($this->fechaMysql($Siga_sla_pDto->getId_Area()));
}
$Siga_sla_pDto->setId_Seccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getId_Seccion(),"utf8"):strtoupper($Siga_sla_pDto->getId_Seccion()))))));
if($this->esFecha($Siga_sla_pDto->getId_Seccion())){
$Siga_sla_pDto->setId_Seccion($this->fechaMysql($Siga_sla_pDto->getId_Seccion()));
}
$Siga_sla_pDto->setId_Categoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getId_Categoria(),"utf8"):strtoupper($Siga_sla_pDto->getId_Categoria()))))));
if($this->esFecha($Siga_sla_pDto->getId_Categoria())){
$Siga_sla_pDto->setId_Categoria($this->fechaMysql($Siga_sla_pDto->getId_Categoria()));
}
$Siga_sla_pDto->setId_Subcategoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getId_Subcategoria(),"utf8"):strtoupper($Siga_sla_pDto->getId_Subcategoria()))))));
if($this->esFecha($Siga_sla_pDto->getId_Subcategoria())){
$Siga_sla_pDto->setId_Subcategoria($this->fechaMysql($Siga_sla_pDto->getId_Subcategoria()));
}
$Siga_sla_pDto->setProceso_Ticket(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getProceso_Ticket(),"utf8"):strtoupper($Siga_sla_pDto->getProceso_Ticket()))))));
if($this->esFecha($Siga_sla_pDto->getProceso_Ticket())){
$Siga_sla_pDto->setProceso_Ticket($this->fechaMysql($Siga_sla_pDto->getProceso_Ticket()));
}
$Siga_sla_pDto->setEscala(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getEscala(),"utf8"):strtoupper($Siga_sla_pDto->getEscala()))))));
if($this->esFecha($Siga_sla_pDto->getEscala())){
$Siga_sla_pDto->setEscala($this->fechaMysql($Siga_sla_pDto->getEscala()));
}
$Siga_sla_pDto->setHoras(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getHoras(),"utf8"):strtoupper($Siga_sla_pDto->getHoras()))))));
if($this->esFecha($Siga_sla_pDto->getHoras())){
$Siga_sla_pDto->setHoras($this->fechaMysql($Siga_sla_pDto->getHoras()));
}
$Siga_sla_pDto->setCorreos(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getCorreos(),"utf8"):strtoupper($Siga_sla_pDto->getCorreos()))))));
if($this->esFecha($Siga_sla_pDto->getCorreos())){
$Siga_sla_pDto->setCorreos($this->fechaMysql($Siga_sla_pDto->getCorreos()));
}
$Siga_sla_pDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_sla_pDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_sla_pDto->getEstatus_Reg())){
$Siga_sla_pDto->setEstatus_Reg($this->fechaMysql($Siga_sla_pDto->getEstatus_Reg()));
}
$Siga_sla_pDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getFech_Inser(),"utf8"):strtoupper($Siga_sla_pDto->getFech_Inser()))))));
if($this->esFecha($Siga_sla_pDto->getFech_Inser())){
$Siga_sla_pDto->setFech_Inser($this->fechaMysql($Siga_sla_pDto->getFech_Inser()));
}
$Siga_sla_pDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getUsr_Inser(),"utf8"):strtoupper($Siga_sla_pDto->getUsr_Inser()))))));
if($this->esFecha($Siga_sla_pDto->getUsr_Inser())){
$Siga_sla_pDto->setUsr_Inser($this->fechaMysql($Siga_sla_pDto->getUsr_Inser()));
}
$Siga_sla_pDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getFech_Mod(),"utf8"):strtoupper($Siga_sla_pDto->getFech_Mod()))))));
if($this->esFecha($Siga_sla_pDto->getFech_Mod())){
$Siga_sla_pDto->setFech_Mod($this->fechaMysql($Siga_sla_pDto->getFech_Mod()));
}
$Siga_sla_pDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_sla_pDto->getUsr_Mod(),"utf8"):strtoupper($Siga_sla_pDto->getUsr_Mod()))))));
if($this->esFecha($Siga_sla_pDto->getUsr_Mod())){
$Siga_sla_pDto->setUsr_Mod($this->fechaMysql($Siga_sla_pDto->getUsr_Mod()));
}
return $Siga_sla_pDto;
}

public function consultar_tabla($Siga_sla_pDto){
$Siga_sla_pController = new Siga_sla_pController();
$Siga_sla_pDto = $Siga_sla_pController->consultar_tabla($Siga_sla_pDto);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_sla_pDto);

}

public function valida_sla_cmb($Siga_sla_pDto){
$Siga_sla_pController = new Siga_sla_pController();
$Siga_sla_pDto = $Siga_sla_pController->valida_sla_cmb($Siga_sla_pDto);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_sla_pDto);

}

public function guardar_detalle($Siga_sla_pDto, $Array_Padre){
$Siga_sla_pController = new Siga_sla_pController();

$Siga_sla_pDto = $Siga_sla_pController->guardar_detalle($Siga_sla_pDto, $Array_Padre);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_sla_pDto);

}

public function guardar_escala_1($Siga_sla_pDto){
$Siga_sla_pController = new Siga_sla_pController();

$Siga_sla_pDto = $Siga_sla_pController->guardar_escala_1($Siga_sla_pDto);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_sla_pDto);

}

public function editar_escala_1($Siga_sla_pDto){
$Siga_sla_pController = new Siga_sla_pController();

$Siga_sla_pDto = $Siga_sla_pController->editar_escala_1($Siga_sla_pDto);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_sla_pDto);

}

public function siga_sla_seguimiento($Id_Subcategoria){
$Siga_sla_pController = new Siga_sla_pController();

$Siga_sla_pDto = $Siga_sla_pController->siga_sla_seguimiento($Id_Subcategoria);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_sla_pDto);

}

public function Guardar_Seguimiento_SLA($Interno_Externo, $Es_Urgencia_Recurrencia, $Desc_Urgencia, $Desc_Recurrencia, $Usr_Mod, $Id_Subcategoria){
$Siga_sla_pController = new Siga_sla_pController();

$Siga_sla_pDto = $Siga_sla_pController->Guardar_Seguimiento_SLA($Interno_Externo, $Es_Urgencia_Recurrencia, $Desc_Urgencia, $Desc_Recurrencia, $Usr_Mod, $Id_Subcategoria);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_sla_pDto);

}

public function selectSiga_sla_p($Siga_sla_pDto){
//$Siga_sla_pDto=$this->validarSiga_sla_p($Siga_sla_pDto);
$Siga_sla_pController = new Siga_sla_pController();
$Siga_sla_pDto = $Siga_sla_pController->selectSiga_sla_p($Siga_sla_pDto);
if($Siga_sla_pDto!=""){
$dtoToJson = new DtoToJson($Siga_sla_pDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}
public function insertSiga_sla_p($Siga_sla_pDto){
//$Siga_sla_pDto=$this->validarSiga_sla_p($Siga_sla_pDto);
$Siga_sla_pController = new Siga_sla_pController();
$Siga_sla_pDto = $Siga_sla_pController->insertSiga_sla_p($Siga_sla_pDto);
if($Siga_sla_pDto!=""){
$dtoToJson = new DtoToJson($Siga_sla_pDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function updateSiga_sla_p($Siga_sla_pDto){
//$Siga_sla_pDto=$this->validarSiga_sla_p($Siga_sla_pDto);
$Siga_sla_pController = new Siga_sla_pController();
$Siga_sla_pDto = $Siga_sla_pController->updateSiga_sla_p($Siga_sla_pDto);
if($Siga_sla_pDto!=""){
$dtoToJson = new DtoToJson($Siga_sla_pDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_sla_p($Siga_sla_pDto){
//$Siga_sla_pDto=$this->validarSiga_sla_p($Siga_sla_pDto);
$Siga_sla_pController = new Siga_sla_pController();
$Siga_sla_pDto = $Siga_sla_pController->deleteSiga_sla_p($Siga_sla_pDto);
if($Siga_sla_pDto==true){
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



@$Array_Padre=$_POST["Array_Padre"];
@$Id_Sla_P=$_POST["Id_Sla_P"];
@$Id_Area=$_POST["Id_Area"];
@$Id_Seccion=$_POST["Id_Seccion"];
@$Id_Categoria=$_POST["Id_Categoria"];
@$Id_Subcategoria=$_POST["Id_Subcategoria"];
@$Interno_Externo=$_POST["Interno_Externo"];
@$Proceso_Ticket=$_POST["Proceso_Ticket"];
@$Escala=$_POST["Escala"];
@$Horas=$_POST["Horas"];
@$Correos=$_POST["Correos"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$accion=$_POST["accion"];


@$Es_Urgencia_Recurrencia=$_POST["Es_Urgencia_Recurrencia"];
@$Desc_Urgencia=$_POST["Desc_Urgencia"];
@$Desc_Recurrencia=$_POST["Desc_Recurrencia"];

$siga_sla_pFacade = new Siga_sla_pFacade();
$siga_sla_pDto = new Siga_sla_pDTO();

$siga_sla_pDto->setId_Sla_P($Id_Sla_P);
$siga_sla_pDto->setId_Area($Id_Area);
$siga_sla_pDto->setId_Seccion($Id_Seccion);
$siga_sla_pDto->setId_Categoria($Id_Categoria);
$siga_sla_pDto->setId_Subcategoria($Id_Subcategoria);
$siga_sla_pDto->setInterno_Externo($Interno_Externo);
$siga_sla_pDto->setProceso_Ticket($Proceso_Ticket);
$siga_sla_pDto->setEscala($Escala);
$siga_sla_pDto->setHoras($Horas);
$siga_sla_pDto->setCorreos($Correos);
$siga_sla_pDto->setEstatus_Reg($Estatus_Reg);
$siga_sla_pDto->setFech_Inser($Fech_Inser);
$siga_sla_pDto->setUsr_Inser($Usr_Inser);
$siga_sla_pDto->setFech_Mod($Fech_Mod);
$siga_sla_pDto->setUsr_Mod($Usr_Mod);

if( ($accion=="guardar") && ($Id_Sla_P=="") ){
$siga_sla_pDto=$siga_sla_pFacade->insertSiga_sla_p($siga_sla_pDto);
echo $siga_sla_pDto;
} else if(($accion=="guardar") && ($Id_Sla_P!="")){
$siga_sla_pDto=$siga_sla_pFacade->updateSiga_sla_p($siga_sla_pDto);
echo $siga_sla_pDto;
} else if($accion=="consultar"){
$siga_sla_pDto=$siga_sla_pFacade->selectSiga_sla_p($siga_sla_pDto);
echo $siga_sla_pDto;
} else if( ($accion=="baja") && ($Id_Sla_P!="") ){
$siga_sla_pDto=$siga_sla_pFacade->deleteSiga_sla_p($siga_sla_pDto);
echo $siga_sla_pDto;
} else if( ($accion=="seleccionar") && ($Id_Sla_P!="") ){
$siga_sla_pDto=$siga_sla_pFacade->selectSiga_sla_p($siga_sla_pDto);
echo $siga_sla_pDto;
}else if( ($accion=="consultar_tabla")){
$siga_sla_pDto=$siga_sla_pFacade->consultar_tabla($siga_sla_pDto);
echo $siga_sla_pDto;
}else if( ($accion=="valida_sla_cmb")){
$siga_sla_pDto=$siga_sla_pFacade->valida_sla_cmb($siga_sla_pDto);
echo $siga_sla_pDto;
}else if(($accion=="guardar_detalle")){
$siga_sla_pDto=$siga_sla_pFacade->guardar_detalle($siga_sla_pDto, $Array_Padre);
echo $siga_sla_pDto;
}if( ($accion=="guardar_escala_1")){
$siga_sla_pDto=$siga_sla_pFacade->guardar_escala_1($siga_sla_pDto);
echo $siga_sla_pDto;
}if( ($accion=="editar_escala_1")){
$siga_sla_pDto=$siga_sla_pFacade->editar_escala_1($siga_sla_pDto);
echo $siga_sla_pDto;
}if( ($accion=="Guardar_Seguimiento_SLA")){
$siga_sla_pDto=$siga_sla_pFacade->Guardar_Seguimiento_SLA($Interno_Externo, $Es_Urgencia_Recurrencia, $Desc_Urgencia, $Desc_Recurrencia, $Usr_Mod, $Id_Subcategoria);
echo $siga_sla_pDto;
}if( ($accion=="siga_sla_seguimiento")){
$siga_sla_pDto=$siga_sla_pFacade->siga_sla_seguimiento($Id_Subcategoria);
echo $siga_sla_pDto;
}


?>