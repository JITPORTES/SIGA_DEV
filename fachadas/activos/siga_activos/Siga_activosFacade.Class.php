<?php

session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_activos/Siga_activosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_activos/Siga_activosController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
class Siga_activosFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_activos($Siga_activosDto){
$Siga_activosDto->setId_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Activo(),"utf8"):strtoupper($Siga_activosDto->getId_Activo()))))));
if($this->esFecha($Siga_activosDto->getId_Activo())){
$Siga_activosDto->setId_Activo($this->fechaMysql($Siga_activosDto->getId_Activo()));
}
$Siga_activosDto->setAF_BC(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getAF_BC(),"utf8"):strtoupper($Siga_activosDto->getAF_BC()))))));
if($this->esFecha($Siga_activosDto->getAF_BC())){
$Siga_activosDto->setAF_BC($this->fechaMysql($Siga_activosDto->getAF_BC()));
}
$Siga_activosDto->setNombre_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getNombre_Activo(),"utf8"):strtoupper($Siga_activosDto->getNombre_Activo()))))));
if($this->esFecha($Siga_activosDto->getNombre_Activo())){
$Siga_activosDto->setNombre_Activo($this->fechaMysql($Siga_activosDto->getNombre_Activo()));
}
$Siga_activosDto->setId_Tipo_Vale_Resg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Tipo_Vale_Resg(),"utf8"):strtoupper($Siga_activosDto->getId_Tipo_Vale_Resg()))))));
if($this->esFecha($Siga_activosDto->getId_Tipo_Vale_Resg())){
$Siga_activosDto->setId_Tipo_Vale_Resg($this->fechaMysql($Siga_activosDto->getId_Tipo_Vale_Resg()));
}
$Siga_activosDto->setMant_Prevent(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getMant_Prevent(),"utf8"):strtoupper($Siga_activosDto->getMant_Prevent()))))));
if($this->esFecha($Siga_activosDto->getMant_Prevent())){
$Siga_activosDto->setMant_Prevent($this->fechaMysql($Siga_activosDto->getMant_Prevent()));
}
$Siga_activosDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Area(),"utf8"):strtoupper($Siga_activosDto->getId_Area()))))));
if($this->esFecha($Siga_activosDto->getId_Area())){
$Siga_activosDto->setId_Area($this->fechaMysql($Siga_activosDto->getId_Area()));
}
$Siga_activosDto->setId_Departamento(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Departamento(),"utf8"):strtoupper($Siga_activosDto->getId_Departamento()))))));
if($this->esFecha($Siga_activosDto->getId_Departamento())){
$Siga_activosDto->setId_Departamento($this->fechaMysql($Siga_activosDto->getId_Departamento()));
}
$Siga_activosDto->setNum_Empleado(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getNum_Empleado(),"utf8"):strtoupper($Siga_activosDto->getNum_Empleado()))))));
if($this->esFecha($Siga_activosDto->getNum_Empleado())){
$Siga_activosDto->setNum_Empleado($this->fechaMysql($Siga_activosDto->getNum_Empleado()));
}
//$Siga_activosDto->setNombre_Completo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getNombre_Completo(),"utf8"):strtoupper($Siga_activosDto->getNombre_Completo()))))));
//if($this->esFecha($Siga_activosDto->getNombre_Completo())){
//$Siga_activosDto->setNombre_Completo($this->fechaMysql($Siga_activosDto->getNombre_Completo()));
//}
$Siga_activosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getFech_Inser(),"utf8"):strtoupper($Siga_activosDto->getFech_Inser()))))));
if($this->esFecha($Siga_activosDto->getFech_Inser())){
$Siga_activosDto->setFech_Inser($this->fechaMysql($Siga_activosDto->getFech_Inser()));
}
$Siga_activosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getUsr_Inser(),"utf8"):strtoupper($Siga_activosDto->getUsr_Inser()))))));
if($this->esFecha($Siga_activosDto->getUsr_Inser())){
$Siga_activosDto->setUsr_Inser($this->fechaMysql($Siga_activosDto->getUsr_Inser()));
}
$Siga_activosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getFech_Mod(),"utf8"):strtoupper($Siga_activosDto->getFech_Mod()))))));
if($this->esFecha($Siga_activosDto->getFech_Mod())){
$Siga_activosDto->setFech_Mod($this->fechaMysql($Siga_activosDto->getFech_Mod()));
}
$Siga_activosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getUsr_Mod(),"utf8"):strtoupper($Siga_activosDto->getUsr_Mod()))))));
if($this->esFecha($Siga_activosDto->getUsr_Mod())){
$Siga_activosDto->setUsr_Mod($this->fechaMysql($Siga_activosDto->getUsr_Mod()));
}
$Siga_activosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_activosDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_activosDto->getEstatus_Reg())){
$Siga_activosDto->setEstatus_Reg($this->fechaMysql($Siga_activosDto->getEstatus_Reg()));
}
//$Siga_activosDto->setFoto(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getFoto(),"utf8"):strtoupper($Siga_activosDto->getFoto()))))));
//if($this->esFecha($Siga_activosDto->getFoto())){
//$Siga_activosDto->setFoto($this->fechaMysql($Siga_activosDto->getFoto()));
//}
$Siga_activosDto->setId_Clase(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Clase(),"utf8"):strtoupper($Siga_activosDto->getId_Clase()))))));
if($this->esFecha($Siga_activosDto->getId_Clase())){
$Siga_activosDto->setId_Clase($this->fechaMysql($Siga_activosDto->getId_Clase()));
}
$Siga_activosDto->setId_Clasificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Clasificacion(),"utf8"):strtoupper($Siga_activosDto->getId_Clasificacion()))))));
if($this->esFecha($Siga_activosDto->getId_Clasificacion())){
$Siga_activosDto->setId_Clasificacion($this->fechaMysql($Siga_activosDto->getId_Clasificacion()));
}
$Siga_activosDto->setId_Propiedad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Propiedad(),"utf8"):strtoupper($Siga_activosDto->getId_Propiedad()))))));
if($this->esFecha($Siga_activosDto->getId_Propiedad())){
$Siga_activosDto->setId_Propiedad($this->fechaMysql($Siga_activosDto->getId_Propiedad()));
}
$Siga_activosDto->setId_Tipo_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Tipo_Activo(),"utf8"):strtoupper($Siga_activosDto->getId_Tipo_Activo()))))));
if($this->esFecha($Siga_activosDto->getId_Tipo_Activo())){
$Siga_activosDto->setId_Tipo_Activo($this->fechaMysql($Siga_activosDto->getId_Tipo_Activo()));
}
$Siga_activosDto->setDescCorta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getDescCorta(),"utf8"):strtoupper($Siga_activosDto->getDescCorta()))))));
if($this->esFecha($Siga_activosDto->getDescCorta())){
$Siga_activosDto->setDescCorta($this->fechaMysql($Siga_activosDto->getDescCorta()));
}
$Siga_activosDto->setDescLarga(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getDescLarga(),"utf8"):strtoupper($Siga_activosDto->getDescLarga()))))));
if($this->esFecha($Siga_activosDto->getDescLarga())){
$Siga_activosDto->setDescLarga($this->fechaMysql($Siga_activosDto->getDescLarga()));
}
$Siga_activosDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Ubic_Prim(),"utf8"):strtoupper($Siga_activosDto->getId_Ubic_Prim()))))));
if($this->esFecha($Siga_activosDto->getId_Ubic_Prim())){
$Siga_activosDto->setId_Ubic_Prim($this->fechaMysql($Siga_activosDto->getId_Ubic_Prim()));
}
$Siga_activosDto->setId_Ubic_Sec(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Ubic_Sec(),"utf8"):strtoupper($Siga_activosDto->getId_Ubic_Sec()))))));
if($this->esFecha($Siga_activosDto->getId_Ubic_Sec())){
$Siga_activosDto->setId_Ubic_Sec($this->fechaMysql($Siga_activosDto->getId_Ubic_Sec()));
}

$Siga_activosDto->setId_Situacion_Activo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Situacion_Activo(),"utf8"):strtoupper($Siga_activosDto->getId_Situacion_Activo()))))));
if($this->esFecha($Siga_activosDto->getId_Situacion_Activo())){
$Siga_activosDto->setId_Situacion_Activo($this->fechaMysql($Siga_activosDto->getId_Situacion_Activo()));
}

$Siga_activosDto->setId_Motivo_Alta(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Motivo_Alta(),"utf8"):strtoupper($Siga_activosDto->getId_Motivo_Alta()))))));
if($this->esFecha($Siga_activosDto->getId_Motivo_Alta())){
$Siga_activosDto->setId_Motivo_Alta($this->fechaMysql($Siga_activosDto->getId_Motivo_Alta()));
}
$Siga_activosDto->setId_Familia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Familia(),"utf8"):strtoupper($Siga_activosDto->getId_Familia()))))));
if($this->esFecha($Siga_activosDto->getId_Familia())){
$Siga_activosDto->setId_Familia($this->fechaMysql($Siga_activosDto->getId_Familia()));
}
$Siga_activosDto->setId_Subfamilia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_Subfamilia(),"utf8"):strtoupper($Siga_activosDto->getId_Subfamilia()))))));
if($this->esFecha($Siga_activosDto->getId_Subfamilia())){
$Siga_activosDto->setId_Subfamilia($this->fechaMysql($Siga_activosDto->getId_Subfamilia()));
}
$Siga_activosDto->setMarca(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getMarca(),"utf8"):strtoupper($Siga_activosDto->getMarca()))))));
if($this->esFecha($Siga_activosDto->getMarca())){
$Siga_activosDto->setMarca($this->fechaMysql($Siga_activosDto->getMarca()));
}
$Siga_activosDto->setModelo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getModelo(),"utf8"):strtoupper($Siga_activosDto->getModelo()))))));
if($this->esFecha($Siga_activosDto->getModelo())){
$Siga_activosDto->setModelo($this->fechaMysql($Siga_activosDto->getModelo()));
}
$Siga_activosDto->setNumSerie(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getNumSerie(),"utf8"):strtoupper($Siga_activosDto->getNumSerie()))))));
if($this->esFecha($Siga_activosDto->getNumSerie())){
$Siga_activosDto->setNumSerie($this->fechaMysql($Siga_activosDto->getNumSerie()));
}
$Siga_activosDto->setId_ActivoPadre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getId_ActivoPadre(),"utf8"):strtoupper($Siga_activosDto->getId_ActivoPadre()))))));
if($this->esFecha($Siga_activosDto->getId_ActivoPadre())){
$Siga_activosDto->setId_ActivoPadre($this->fechaMysql($Siga_activosDto->getId_ActivoPadre()));
}
$Siga_activosDto->setNumActivoAnterior(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getNumActivoAnterior(),"utf8"):strtoupper($Siga_activosDto->getNumActivoAnterior()))))));
if($this->esFecha($Siga_activosDto->getNumActivoAnterior())){
$Siga_activosDto->setNumActivoAnterior($this->fechaMysql($Siga_activosDto->getNumActivoAnterior()));
}
$Siga_activosDto->setParticipaPre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getParticipaPre(),"utf8"):strtoupper($Siga_activosDto->getParticipaPre()))))));
if($this->esFecha($Siga_activosDto->getParticipaPre())){
$Siga_activosDto->setParticipaPre($this->fechaMysql($Siga_activosDto->getParticipaPre()));
}
$Siga_activosDto->setParticipaSeguros(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getParticipaSeguros(),"utf8"):strtoupper($Siga_activosDto->getParticipaSeguros()))))));
if($this->esFecha($Siga_activosDto->getParticipaSeguros())){
$Siga_activosDto->setParticipaSeguros($this->fechaMysql($Siga_activosDto->getParticipaSeguros()));
}
$Siga_activosDto->setImporteSeguros(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getImporteSeguros(),"utf8"):strtoupper($Siga_activosDto->getImporteSeguros()))))));
if($this->esFecha($Siga_activosDto->getImporteSeguros())){
$Siga_activosDto->setImporteSeguros($this->fechaMysql($Siga_activosDto->getImporteSeguros()));
}
$Siga_activosDto->setParticipaCertificacion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getParticipaCertificacion(),"utf8"):strtoupper($Siga_activosDto->getParticipaCertificacion()))))));
if($this->esFecha($Siga_activosDto->getParticipaCertificacion())){
$Siga_activosDto->setParticipaCertificacion($this->fechaMysql($Siga_activosDto->getParticipaCertificacion()));
}
$Siga_activosDto->setGarantia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getGarantia(),"utf8"):strtoupper($Siga_activosDto->getGarantia()))))));
if($this->esFecha($Siga_activosDto->getGarantia())){
$Siga_activosDto->setGarantia($this->fechaMysql($Siga_activosDto->getGarantia()));
}
$Siga_activosDto->setExtGarantia(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getExtGarantia(),"utf8"):strtoupper($Siga_activosDto->getExtGarantia()))))));
if($this->esFecha($Siga_activosDto->getExtGarantia())){
$Siga_activosDto->setExtGarantia($this->fechaMysql($Siga_activosDto->getExtGarantia()));
}
$Siga_activosDto->setAnexo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getAnexo(),"utf8"):strtoupper($Siga_activosDto->getAnexo()))))));
if($this->esFecha($Siga_activosDto->getAnexo())){
$Siga_activosDto->setAnexo($this->fechaMysql($Siga_activosDto->getAnexo()));
}
$Siga_activosDto->setEspecifica(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_activosDto->getEspecifica(),"utf8"):strtoupper($Siga_activosDto->getEspecifica()))))));
if($this->esFecha($Siga_activosDto->getEspecifica())){
$Siga_activosDto->setEspecifica($this->fechaMysql($Siga_activosDto->getEspecifica()));
}
return $Siga_activosDto;
}

public function selectSiga_activos($Siga_activosDto){
$Siga_activosDto=$this->validarSiga_activos($Siga_activosDto);
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->selectSiga_activos($Siga_activosDto);
if($Siga_activosDto!=""){
$dtoToJson = new DtoToJson($Siga_activosDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function selectbusqueda_activos($Siga_activosDto){
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->selectbusqueda_activos($Siga_activosDto);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_activosDto);
}

public function usuarios_delegacion_autoridad($Siga_activosDto){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->usuarios_delegacion_autoridad($Siga_activosDto);
	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function selectbusqueda_activos_nota_salida($Siga_activosDto, $Cadena){
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->selectbusqueda_activos_nota_salida($Siga_activosDto, $Cadena);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_activosDto);
}

public function selectbusqueda_activos_externos_nota_salida($Siga_activosDto, $Cadena){
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->selectbusqueda_activos_externos_nota_salida($Siga_activosDto, $Cadena);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_activosDto);
}


public function Cancelar_Nota_Salida($Id_Solicitud, $Motivo_Cancelacion, $Usr_Inser){
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->Cancelar_Nota_Salida($Id_Solicitud, $Motivo_Cancelacion, $Usr_Inser);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_activosDto);
}

public function Cancelar_Nota_Salida_Proceso($Id_Nota_Salida, $Motivo_Cancelacion, $Usr_Inser){
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->Cancelar_Nota_Salida_Proceso($Id_Nota_Salida, $Motivo_Cancelacion, $Usr_Inser);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_activosDto);
}

public function selectbusqueda_activos_nota_salida_gtiqx($Siga_activosDto, $Empresa, $Cadena, $Id_Usuario){
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->selectbusqueda_activos_nota_salida_gtiqx($Siga_activosDto, $Empresa, $Cadena, $Id_Usuario);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_activosDto);
}

public function guardar_nota_salida($Id_Nota_Salida,  $Id_Ubic_Prim, $Id_Ubic_Sec, $Id_Motivo_Salida, $Id_Usuario, $Id_Usr_Quien_Autoriza, $Empresa_Recibe, $Nombre_Contacto, $Telefono_Contacto, $Mail_Contacto, $Observaciones, $Url_Adjuntos, $Tipo_Solicitud, $Id_Area, $Array_Equ_Acc, $Firma_Digital, $Estatus_Proceso, $Nota_Duplicada){
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->guardar_nota_salida($Id_Nota_Salida,  $Id_Ubic_Prim, $Id_Ubic_Sec, $Id_Motivo_Salida, $Id_Usuario, $Id_Usr_Quien_Autoriza, $Empresa_Recibe, $Nombre_Contacto, $Telefono_Contacto, $Mail_Contacto, $Observaciones, $Url_Adjuntos, $Tipo_Solicitud, $Id_Area, $Array_Equ_Acc, $Firma_Digital, $Estatus_Proceso, $Nota_Duplicada);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_activosDto);
}

public function editar_nota_salida($Id_Nota_Salida,  $Id_Ubic_Prim, $Id_Ubic_Sec, $Id_Motivo_Salida, $Id_Usuario, $Id_Usr_Quien_Autoriza, $Empresa_Recibe, $Nombre_Contacto, $Telefono_Contacto, $Mail_Contacto, $Observaciones, $Url_Adjuntos, $Tipo_Solicitud, $Id_Area, $Array_Equ_Acc, $Firma_Digital, $Estatus_Proceso){
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->editar_nota_salida($Id_Nota_Salida,  $Id_Ubic_Prim, $Id_Ubic_Sec, $Id_Motivo_Salida, $Id_Usuario, $Id_Usr_Quien_Autoriza, $Empresa_Recibe, $Nombre_Contacto, $Telefono_Contacto, $Mail_Contacto, $Observaciones, $Url_Adjuntos, $Tipo_Solicitud, $Id_Area, $Array_Equ_Acc, $Firma_Digital, $Estatus_Proceso);

$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_activosDto);
}

public function select_activos($Siga_activosDto, $soloactivos){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->select_activos($Siga_activosDto, $soloactivos);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function grafica_clasificacion($Siga_activosDto){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->grafica_clasificacion($Siga_activosDto);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function grafica_subfamilias($Siga_activosDto){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->grafica_subfamilias($Siga_activosDto);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function selectmotivosalida($Siga_activosDto){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->selectmotivosalida($Siga_activosDto);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function select_Nota_Salida($Id_Nota_Salida){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->select_Nota_Salida($Id_Nota_Salida);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function guardar_firma($Id_Nota_Salida, $Estatus_Proceso, $Firma_Digital, $Tipo_Firma, $Empresa_Recibe, $Html_body, $Url_Adjuntos){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->guardar_firma($Id_Nota_Salida, $Estatus_Proceso, $Firma_Digital, $Tipo_Firma, $Empresa_Recibe, $Html_body, $Url_Adjuntos);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function proceso_notas_salida($Id_Area){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->proceso_notas_salida($Id_Area);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function historial_notas_salida($Id_Area){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->historial_notas_salida($Id_Area);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function filtro_afbc($Id_Area, $Seccion){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->filtro_afbc($Id_Area, $Seccion);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function filtro_clasificacion($Id_Area, $Seccion){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->filtro_clasificacion($Id_Area, $Seccion);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function filtro_marca($Id_Area, $Seccion){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->filtro_marca($Id_Area, $Seccion);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function filtro_propiedad($Id_Area, $Seccion){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->filtro_propiedad($Id_Area, $Seccion);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function filtro_usr_responsable($Id_Area, $Seccion){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->filtro_usr_responsable($Id_Area, $Seccion);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function filtro_ubic_prim($Id_Area, $Seccion){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->filtro_ubic_prim($Id_Area, $Seccion);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function filtro_ubic_sec($Id_Area, $Seccion){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->filtro_ubic_sec($Id_Area, $Seccion);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function guardar_adjuntos($Id_Nota_Salida, $Url_Adjuntos){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->guardar_adjuntos($Id_Nota_Salida, $Url_Adjuntos);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function historial_cancelacion_notas_salida($Id_Area){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->historial_cancelacion_notas_salida($Id_Area);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function grafica_estatus_activo($Siga_activosDto){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->grafica_estatus_activo($Siga_activosDto);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function autocomplete_activos($Siga_activosDto,$soloactivos){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->autocomplete_activos($Siga_activosDto,null,$soloactivos);
	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}

public function Tabla_Activos_Asis_Esp($Siga_activosDto,$soloactivos){
	$Siga_activosController = new Siga_activosController();
	$Siga_activosDto = $Siga_activosController->Tabla_Activos_Asis_Esp($Siga_activosDto,null,$soloactivos);
	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_activosDto);
}


public function insertSiga_activos($Siga_activosDto){
//$Siga_activosDto=$this->validarSiga_activos($Siga_activosDto);
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->insertSiga_activos($Siga_activosDto);
if($Siga_activosDto!=""){
$dtoToJson = new DtoToJson($Siga_activosDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}

public function updateSiga_activos($Siga_activosDto){
//$Siga_activosDto=$this->validarSiga_activos($Siga_activosDto);
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->updateSiga_activos($Siga_activosDto);
if($Siga_activosDto!=""){
$dtoToJson = new DtoToJson($Siga_activosDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}

public function deleteSiga_activos($Siga_activosDto){
//$Siga_activosDto=$this->validarSiga_activos($Siga_activosDto);
$Siga_activosController = new Siga_activosController();
$Siga_activosDto = $Siga_activosController->deleteSiga_activos($Siga_activosDto);
if($Siga_activosDto==true){
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"REGISTRO ELIMINADO DE FORMA CORRECTA"));
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL LA BAJA"));
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search,$orden,$siga_activosDto,$estatus,$perfil, $Fech_Inicial, $Fech_Final, $Tab, $Filtro_Clasific_Activos, $Filtro_Marca_Activos, $Filtro_Propiedad_Activos, $Filtro_Usr_Responsable_Activos, $Filtro_UPrimaria_Activos, $Filtro_USecundaria_Activos) {
	$Siga_activosController = new Siga_activosController();
	//return $Siga_activosController->llenarDataTable($draw,$columns,$order,$start,$length,$search,$orden,$siga_activosDto,$estatus,$perfil, $Fech_Inicial, $Fech_Final, $Tab, $Filtro_Clasific_Activos, $Filtro_Marca_Activos, $Filtro_Propiedad_Activos, $Filtro_Usr_Responsable_Activos, $Filtro_UPrimaria_Activos, $Filtro_USecundaria_Activos);
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


	@$Id_Solicitud=$_POST["Id_Solicitud"];
	@$Motivo_Cancelacion=$_POST["Motivo_Cancelacion"];
	@$Id_Activo=$_POST["Id_Activo"];
	@$AF_BC=$_POST["AF_BC"];
	@$Nombre_Activo=$_POST["Nombre_Activo"];
	@$Id_Tipo_Vale_Resg=$_POST["Id_Tipo_Vale_Resg"];
	@$Mant_Prevent=$_POST["Mant_Prevent"];
	@$Id_Area=$_POST["Id_Area"];
	@$Id_Departamento=$_POST["Id_Departamento"];
	@$Num_Empleado=$_POST["Num_Empleado"];
	@$Nombre_Completo=$_POST["Nombre_Completo"];
	@$Fech_Inser=$_POST["Fech_Inser"];
	@$Usr_Inser=$_POST["Usr_Inser"];
	@$Fech_Mod=$_POST["Fech_Mod"];
	@$Usr_Mod=$_POST["Usr_Mod"];
	@$Estatus_Reg=$_POST["Estatus_Reg"];
	@$Foto=$_POST["Foto"];
	@$Id_Clase=$_POST["Id_Clase"];
	@$Id_Clasificacion=$_POST["Id_Clasificacion"];
	@$Id_Propiedad=$_POST["Id_Propiedad"];
	@$Id_Tipo_Activo=$_POST["Id_Tipo_Activo"];
	@$DescCorta=$_POST["DescCorta"];
	@$DescLarga=$_POST["DescLarga"];
	@$Id_Ubic_Prim=$_POST["Id_Ubic_Prim"];
	@$Id_Ubic_Sec=$_POST["Id_Ubic_Sec"];
	@$Id_Situacion_Activo=$_POST["Id_Situacion_Activo"];
	@$Id_Motivo_Alta=$_POST["Id_Motivo_Alta"];
	@$Id_Familia=$_POST["Id_Familia"];
	@$Id_Subfamilia=$_POST["Id_Subfamilia"];
	@$Marca=$_POST["Marca"];
	@$Modelo=$_POST["Modelo"];
	@$NumSerie=$_POST["NumSerie"];
	@$Id_ActivoPadre=$_POST["Id_ActivoPadre"];
	@$NumActivoAnterior=$_POST["NumActivoAnterior"];
	@$ParticipaPre=$_POST["ParticipaPre"];
	@$ParticipaSeguros=$_POST["ParticipaSeguros"];
	@$ImporteSeguros=$_POST["ImporteSeguros"];
	@$ParticipaCertificacion=$_POST["ParticipaCertificacion"];
	@$Garantia=$_POST["Garantia"];
	@$ExtGarantia=$_POST["ExtGarantia"];
	@$Anexo=$_POST["Anexo"];
	@$Especifica=$_POST["Especifica"];
	@$accion=$_POST["accion"];
	@$NombreCampo = $_POST["NombreCampo"];
	// se agregaron estos tres campos Alex Arias 25/04/24
	@$siga_cmb_condicion_recepcion 	 = $_POST["siga_cmb_condicion_recepcion"];
	@$siga_activo_alta_fch_recepcion = $_POST["siga_activo_alta_fch_recepcion"];
	@$siga_activo_alta_fch_operacion = $_POST["siga_activo_alta_fch_operacion"];
// se agregaron estos tres campops Alex Arias 25/04/24 $newDate = date("Y/m/d", strtotime($_POST["siga_activo_alta_fch_operacion"]))

	@$Empresa 	= $_POST["Empresa"];
	@$Cadena 		= $_POST["Cadena"];
	@$Seccion 	= $_POST["Seccion"];

	@$Fech_Inicial 	= $_POST["Fech_Inicial"];
	@$Fech_Final 		= $_POST["Fech_Final"];
	@$Tab       		= $_POST["Tab"];

	@$Id_Nota_Salida 				= $_POST["Id_Nota_Salida"];
	@$Id_Motivo_Salida 			= $_POST["Id_Motivo_Salida"];
	@$Id_Usr_Quien_Autoriza = $_POST["Id_Usr_Quien_Autoriza"];
	@$Empresa_Recibe 				= $_POST["Empresa_Recibe"];
	@$Nombre_Contacto 			= $_POST["Nombre_Contacto"];
	@$Telefono_Contacto 		= $_POST["Telefono_Contacto"];
	@$Mail_Contacto 				= $_POST["Mail_Contacto"];
	@$Observaciones 				= $_POST["Observaciones"];
	@$Url_Adjuntos 					= $_POST["Url_Adjuntos"];
	@$Tipo_Solicitud 				= $_POST["Tipo_Solicitud"];
	@$Id_Usuario 						= $_POST["Id_Usuario"];
	@$Array_Equ_Acc 				= $_POST["Array_Equ_Acc"];
	@$Firma_Digital 				= $_POST["Firma_Digital"];
	@$Tipo_Firma 						= $_POST["Tipo_Firma"];
	@$Estatus_Proceso 			= $_POST["Estatus_Proceso"];
	@$Firma_Quien_Autoriza 	= $_POST["Firma_Quien_Autoriza"];
	@$Firma_Quien_Recibe		= $_POST["Firma_Quien_Recibe"];
	@$Html_body 						= $_POST["Html_body"];
	@$Nota_Duplicada 				= $_POST["Nota_Duplicada"];
	//$Id_Nota_Salida, $Id_Ubic_Prim, $Id_Ubic_Sec, $Id_Motivo_Salida, $Id_Usr_Quien_Autoriza, $Empresa_Recibe, $Nombre_Contacto, $Telefono_Contacto, $Mail_Contacto, $Observaciones, $Tipo_Solicitud, $Id_Usuario, $Id_Area, $Array_Equ_Acc, $Firma_Digital

	@$orden 								= $_POST["orden"];
	@$soloactivos 					= 0;
	if (isset($_POST["soloactivos"])) { @$soloactivos = $_POST["soloactivos"]; }
	@$draw = isset($_POST["draw"])?$_POST["draw"]:'';

	//Variables Filtros Por Columna
	@$Filtro_AF_BC_Activos 		= $_POST["Filtro_AF_BC_Activos"];
	@$Filtro_Nombre_Activos 	= $_POST["Filtro_Nombre_Activos"];
	@$Filtro_Clasific_Activos = $_POST["Filtro_Clasific_Activos"];
	@$Filtro_Marca_Activos 		= $_POST["Filtro_Marca_Activos"];
	@$Filtro_Modelo_Activos 	= $_POST["Filtro_Modelo_Activos"];
	@$Filtro_NumSerie_Activos = $_POST["Filtro_NumSerie_Activos"];
	@$Filtro_Propiedad_Activos = $_POST["Filtro_Propiedad_Activos"];
	@$Filtro_Usr_Responsable_Activos = $_POST["Filtro_Usr_Responsable_Activos"];
	@$Filtro_UPrimaria_Activos = $_POST["Filtro_UPrimaria_Activos"];
	@$Filtro_USecundaria_Activos = $_POST["Filtro_USecundaria_Activos"];
	@$Filtro_Estatus_Activos 	= $_POST["Filtro_Estatus_Activos"];
	@$Filtro_Importe_Seguro_Activos = $_POST["Filtro_Importe_Seguro_Activos"];
	@$Filtro_Monto_Factura_Activos = $_POST["Filtro_Monto_Factura_Activos"];
	@$Filtro_Fecha_Alta_Activos = $_POST["Filtro_Fecha_Alta_Activos"];
	@$Filtro_Fecha_Reubicacion_Activos = $_POST["Filtro_Fecha_Reubicacion_Activos"];
	@$Filtro_Descripcion_Activos = $_POST["Filtro_Descripcion_Activos"];
	@$Filtro_Filtro_UPrimariaOrigen_Activos = $_POST["Filtro_Filtro_UPrimariaOrigen_Activos"];
	@$Filtro_Filtro_USecundariaOrigen_Activos = $_POST["Filtro_Filtro_USecundariaOrigen_Activos"];
	@$Filtro_Tipo_Activo_Activos = $_POST["Filtro_Tipo_Activo_Activos"];
	@$Filtro_Fecha_Baja_Usr_Solicitante_Activos = $_POST["Filtro_Fecha_Baja_Usr_Solicitante_Activos"];
	@$Filtro_Fecha_Baja_Usr_DirFinanciera_Activos = $_POST["Filtro_Fecha_Baja_Usr_DirFinanciera_Activos"];
	@$Filtro_Fecha_Baja_Usr_Contabilidad_Activos = $_POST["Filtro_Fecha_Baja_Usr_Contabilidad_Activos"];
	@$Filtro_Estatus_Workflow_Activos = $_POST["Filtro_Estatus_Workflow_Activos"];
	@$Filtro_UbicacionEspecifica_Activos = $_POST["Filtro_UbicacionEspecifica_Activos"];
	@$Filtro_Motivo_Baja_Activos = $_POST["Filtro_Motivo_Baja_Activos"];

	// Filtros para generar el encadenamiento y generar columnas tipo Excel
	@$FiltroSuperior_AFBC = $_POST["FiltroSuperior_AFBC"];
	@$FiltroSuperior_Nombre = $_POST["FiltroSuperior_Nombre"];
	@$FiltroSuperior_Clasificacion = $_POST["FiltroSuperior_Clasificacion"];
	@$FiltroSuperior_Marca = $_POST["FiltroSuperior_Marca"];
	@$FiltroSuperior_Modelo = $_POST["FiltroSuperior_Modelo"];
	@$FiltroSuperior_NumSerie = $_POST["FiltroSuperior_NumSerie"];
	@$FiltroSuperior_Propiedad = $_POST["FiltroSuperior_Propiedad"];
	@$FiltroSuperior_UsuarioResponsable = $_POST["FiltroSuperior_UsuarioResponsable"];
	@$FiltroSuperior_UbicacionPrimaria = $_POST["FiltroSuperior_UbicacionPrimaria"];
	@$FiltroSuperior_UbicacionSecundaria = $_POST["FiltroSuperior_UbicacionSecundaria"];
	@$FiltroSuperior_Monto_Factura = $_POST["FiltroSuperior_Monto_Factura"];
	@$FiltroSuperior_ImporteSeguros = $_POST["FiltroSuperior_ImporteSeguros"];
	@$FiltroSuperior_Estatus = $_POST["FiltroSuperior_Estatus"];
	@$FiltroSuperior_Clase = $_POST["FiltroSuperior_Clase"];
	@$FiltroSuperior_MotivoBaja = $_POST["FiltroSuperior_MotivoBaja"];
	@$FiltroSuperior_FechaAlta = $_POST["FiltroSuperior_FechaAlta"];
	@$FiltroSuperior_Descripcion = $_POST["FiltroSuperior_Descripcion"];
	@$FiltroSuperior_UbicacionPrimariaOrigen = $_POST["FiltroSuperior_UbicacionPrimariaOrigen"];
	@$FiltroSuperior_UbicacionSecundariaOrigen = $_POST["FiltroSuperior_UbicacionSecundariaOrigen"];
	@$FiltroSuperior_Baja_Usr_Solicitante = $_POST["FiltroSuperior_Baja_Usr_Solicitante"];
	@$FiltroSuperior_Baja_Usr_DirFinanciera = $_POST["FiltroSuperior_Baja_Usr_DirFinanciera"];
	@$FiltroSuperior_Baja_Usr_Contabilidad = $_POST["FiltroSuperior_Baja_Usr_Contabilidad"];
	@$FiltroSuperior_EstatusWorkflow_Baja = $_POST["FiltroSuperior_EstatusWorkflow_Baja"];
	@$FiltroSuperior_UbicacionEspecifica = $_POST["FiltroSuperior_UbicacionEspecifica"];


	$siga_activosFacade = new Siga_activosFacade();
	$siga_activosDto 		= new Siga_activosDTO();

	$siga_activosDto->setId_Activo($Id_Activo);
	$siga_activosDto->setAF_BC($AF_BC);
	$siga_activosDto->setNombre_Activo($Nombre_Activo);
	$siga_activosDto->setId_Tipo_Vale_Resg($Id_Tipo_Vale_Resg);
	$siga_activosDto->setMant_Prevent($Mant_Prevent);
	$siga_activosDto->setId_Area($Id_Area);
	$siga_activosDto->setId_Departamento($Id_Departamento);
	$siga_activosDto->setNum_Empleado($Num_Empleado);
	$siga_activosDto->setNombre_Completo($Nombre_Completo);
	$siga_activosDto->setFech_Inser($Fech_Inser);
	$siga_activosDto->setUsr_Inser($Usr_Inser);
	$siga_activosDto->setFech_Mod($Fech_Mod);
	$siga_activosDto->setUsr_Mod($Usr_Mod);
	$siga_activosDto->setEstatus_Reg($Estatus_Reg);
	$siga_activosDto->setFoto($Foto);
	$siga_activosDto->setId_Clase($Id_Clase);
	$siga_activosDto->setId_Clasificacion($Id_Clasificacion);
	$siga_activosDto->setId_Propiedad($Id_Propiedad);
	$siga_activosDto->setId_Tipo_Activo($Id_Tipo_Activo);
	$siga_activosDto->setDescCorta($DescCorta);
	$siga_activosDto->setDescLarga($DescLarga);
	$siga_activosDto->setId_Ubic_Prim($Id_Ubic_Prim);
	$siga_activosDto->setId_Ubic_Sec($Id_Ubic_Sec);
	$siga_activosDto->setId_Situacion_Activo($Id_Situacion_Activo);
	$siga_activosDto->setId_Motivo_Alta($Id_Motivo_Alta);
	$siga_activosDto->setId_Familia($Id_Familia);
	$siga_activosDto->setId_Subfamilia($Id_Subfamilia);
	$siga_activosDto->setMarca($Marca);
	$siga_activosDto->setModelo($Modelo);
	$siga_activosDto->setNumSerie($NumSerie);
	$siga_activosDto->setId_ActivoPadre($Id_ActivoPadre);
	$siga_activosDto->setNumActivoAnterior($NumActivoAnterior);
	$siga_activosDto->setParticipaPre($ParticipaPre);
	$siga_activosDto->setParticipaSeguros($ParticipaSeguros);
	$siga_activosDto->setImporteSeguros($ImporteSeguros);
	$siga_activosDto->setParticipaCertificacion($ParticipaCertificacion);
	$siga_activosDto->setGarantia($Garantia);
	$siga_activosDto->setExtGarantia($ExtGarantia);
	$siga_activosDto->setAnexo($Anexo);
	$siga_activosDto->setEspecifica($Especifica);
	$siga_activosDto->setsiga_cmb_condicion_recepcion($siga_cmb_condicion_recepcion);
	$siga_activosDto->setsiga_activo_alta_fch_recepcion($siga_activo_alta_fch_recepcion);
	$siga_activosDto->setsiga_activo_alta_fch_operacion($siga_activo_alta_fch_operacion);
	
	if(($accion == "guardar") && ($Id_Activo == "")) {
		$siga_activosDto=$siga_activosFacade->insertSiga_activos($siga_activosDto);
		echo $siga_activosDto;
	}
	else if(($accion == "guardar") && ($Id_Activo!="")) {
		$siga_activosDto=$siga_activosFacade->updateSiga_activos($siga_activosDto);
		echo $siga_activosDto;
	}
	else if($accion == "consultar") {
		$siga_activosDto=$siga_activosFacade->selectSiga_activos($siga_activosDto);
		echo $siga_activosDto;
	}
	else if($accion == "busqueda_activos") {
		$siga_activosDto=$siga_activosFacade->selectbusqueda_activos($siga_activosDto);
		echo $siga_activosDto;
	}
	else if($accion == "activos") {
		$siga_activosDto=$siga_activosFacade->select_activos($siga_activosDto, $soloactivos);
		echo $siga_activosDto;
	}
	else if(($accion == "baja") && ($Id_Activo != "")) {
		$siga_activosDto=$siga_activosFacade->deleteSiga_activos($siga_activosDto);
		echo $siga_activosDto;
	}
	else if(($accion == "seleccionar") && ($Id_Activo != "")) {
		$siga_activosDto=$siga_activosFacade->selectSiga_activos($siga_activosDto);
		echo $siga_activosDto;
	}
	else if($accion == "grafica_clasificacion") {
		$siga_activosDto=$siga_activosFacade->grafica_clasificacion($siga_activosDto);
		echo $siga_activosDto;
	}
	else if($accion == "grafica_subfamilias") {
		$siga_activosDto=$siga_activosFacade->grafica_subfamilias($siga_activosDto);
		echo $siga_activosDto;
	}
	else if($accion == "grafica_estatus_activo") {
		$siga_activosDto=$siga_activosFacade->grafica_estatus_activo($siga_activosDto);
		echo $siga_activosDto;
	}
	else if($accion == "autocomplete_activos") {
		$siga_activosDto=$siga_activosFacade->autocomplete_activos($siga_activosDto,$soloactivos);
		echo $siga_activosDto;
	}
	else if($accion == "Tabla_Activos_Asis_Esp") {
		$siga_activosDto=$siga_activosFacade->Tabla_Activos_Asis_Esp($siga_activosDto,$soloactivos);
		echo $siga_activosDto;
	}
	else if($accion == "selectbusqueda_activos_nota_salida") {
		$siga_activosDto=$siga_activosFacade->selectbusqueda_activos_nota_salida($siga_activosDto, $Cadena);
		echo $siga_activosDto;
	}
	else if($accion == "selectbusqueda_activos_externos_nota_salida") {
		$siga_activosDto=$siga_activosFacade->selectbusqueda_activos_externos_nota_salida($siga_activosDto, $Cadena);
		echo $siga_activosDto;
	}
	else if($accion == "selectbusqueda_activos_nota_salida_gtiqx") {
		$siga_activosDto=$siga_activosFacade->selectbusqueda_activos_nota_salida_gtiqx($siga_activosDto, $Empresa, $Cadena, $Id_Usuario);
		echo $siga_activosDto;
	}
	else if($accion == "selectmotivosalida") {
		$siga_activosDto=$siga_activosFacade->selectmotivosalida($siga_activosDto);
		echo $siga_activosDto;
	}
	else if($accion == "guardar_nota_salida") {
		$siga_activosDto=$siga_activosFacade->guardar_nota_salida($Id_Nota_Salida, $Id_Ubic_Prim, $Id_Ubic_Sec, $Id_Motivo_Salida, $Id_Usuario,$Id_Usr_Quien_Autoriza, $Empresa_Recibe, $Nombre_Contacto, $Telefono_Contacto, $Mail_Contacto, $Observaciones, $Url_Adjuntos, $Tipo_Solicitud, $Id_Area, $Array_Equ_Acc, $Firma_Digital,$Estatus_Proceso, $Nota_Duplicada);
		echo $siga_activosDto;
	}
	else if($accion=="editar_nota_salida") {
		$siga_activosDto=$siga_activosFacade->editar_nota_salida($Id_Nota_Salida, $Id_Ubic_Prim, $Id_Ubic_Sec, $Id_Motivo_Salida, $Id_Usuario,$Id_Usr_Quien_Autoriza, $Empresa_Recibe, $Nombre_Contacto, $Telefono_Contacto, $Mail_Contacto, $Observaciones, $Url_Adjuntos, $Tipo_Solicitud, $Id_Area, $Array_Equ_Acc, $Firma_Digital,$Estatus_Proceso);
		echo $siga_activosDto;
	}
	else if($accion == "select_Nota_Salida") {
		$siga_activosDto=$siga_activosFacade->select_Nota_Salida($Id_Nota_Salida);
		echo $siga_activosDto;
	}
	else if($accion == "guardar_firma") {
		$siga_activosDto=$siga_activosFacade->guardar_firma($Id_Nota_Salida, $Estatus_Proceso, $Firma_Digital, $Tipo_Firma, $Empresa_Recibe, $Html_body, $Url_Adjuntos);
		echo $siga_activosDto;
	}
	else if($accion=="historial_notas_salida") {
		$siga_activosDto=$siga_activosFacade->historial_notas_salida($Id_Area);
		echo $siga_activosDto;
	}
	else if($accion == "proceso_notas_salida") {
		$siga_activosDto=$siga_activosFacade->proceso_notas_salida($Id_Area);
		echo $siga_activosDto;
	}
	else if($accion == "usuarios_delegacion_autoridad") {
		$siga_activosDto=$siga_activosFacade->usuarios_delegacion_autoridad($siga_activosDto);
		echo $siga_activosDto;
	}
	else if($accion == "Cancelar_Nota_Salida") {
		$siga_activosDto=$siga_activosFacade->Cancelar_Nota_Salida($Id_Solicitud, $Motivo_Cancelacion, $Usr_Inser);
		echo $siga_activosDto;
	}
	else if($accion == "Cancelar_Nota_Salida_Proceso") {
		$siga_activosDto=$siga_activosFacade->Cancelar_Nota_Salida_Proceso($Id_Nota_Salida, $Motivo_Cancelacion, $Usr_Inser);
		echo $siga_activosDto;
	}
	else if($accion == "historial_cancelacion_notas_salida") {
		$siga_activosDto=$siga_activosFacade->historial_cancelacion_notas_salida($Id_Area);
		echo $siga_activosDto;
	}

	/* Acciones para rellenar campos select */
	else if($accion == "filtro_afbc") {
		$siga_activosDto = $siga_activosFacade->filtro_afbc($Id_Area, $Seccion);
		echo $siga_activosDto;
	}
	else if($accion == "filtro_clasificacion") {
		$siga_activosDto = $siga_activosFacade->filtro_clasificacion($Id_Area, $Seccion);
		echo $siga_activosDto;
	}
	else if($accion == "filtro_marca") {
		$siga_activosDto = $siga_activosFacade->filtro_marca($Id_Area, $Seccion);
		echo $siga_activosDto;
	}
	else if($accion == "filtro_propiedad") {
		$siga_activosDto = $siga_activosFacade->filtro_propiedad($Id_Area, $Seccion);
		echo $siga_activosDto;
	}
	else if($accion == "filtro_usr_responsable") {
		$siga_activosDto = $siga_activosFacade->filtro_usr_responsable($Id_Area, $Seccion);
		echo $siga_activosDto;
	}
	else if($accion == "filtro_ubic_prim"){
		$siga_activosDto = $siga_activosFacade->filtro_ubic_prim($Id_Area, $Seccion);
		echo $siga_activosDto;
	}
	else if($accion == "filtro_ubic_sec") {
		$siga_activosDto = $siga_activosFacade->filtro_ubic_sec($Id_Area, $Seccion);
		echo $siga_activosDto;
	}
	else if($accion == "filtro_generico") {
		// Obtiene la lista de Estatus en los que se encuentran los Activos
		$Siga_activosController = new Siga_activosController();
		$Siga_activosDto = $Siga_activosController->filtro_generico($Id_Area, $NombreCampo, $Seccion, $FiltroSuperior_AFBC, $FiltroSuperior_Nombre, $FiltroSuperior_Clasificacion, $FiltroSuperior_Marca, $FiltroSuperior_Modelo, $FiltroSuperior_NumSerie, $FiltroSuperior_Propiedad, $FiltroSuperior_UsuarioResponsable, $FiltroSuperior_UbicacionPrimaria, $FiltroSuperior_UbicacionSecundaria, $FiltroSuperior_Monto_Factura, $FiltroSuperior_ImporteSeguros, $FiltroSuperior_Estatus, $FiltroSuperior_Clase, $FiltroSuperior_MotivoBaja, $FiltroSuperior_FechaAlta, $FiltroSuperior_Descripcion, $FiltroSuperior_UbicacionPrimariaOrigen, $FiltroSuperior_UbicacionSecundariaOrigen, $FiltroSuperior_Baja_Usr_Solicitante, $FiltroSuperior_Baja_Usr_DirFinanciera, $FiltroSuperior_Baja_Usr_Contabilidad, $FiltroSuperior_EstatusWorkflow_Baja, $FiltroSuperior_UbicacionEspecifica, $FiltroSuperior_MotivoBaja);
		$jsonDto = new Encode_JSON();
		echo $jsonDto->encode($Siga_activosDto);
	}
	else if($accion=="guardar_adjuntos") {
		$siga_activosDto = $siga_activosFacade->guardar_adjuntos($Id_Nota_Salida, $Url_Adjuntos);
		echo $siga_activosDto;
	}
	else if (isset ($draw) && ($draw != "")) {
		
		$columns 	= isset($_POST["columns"])?$_POST["columns"] : '';
		$order 		= isset($_POST["order"])?$_POST["order"] : '';
		$start 		= isset($_POST["start"])?$_POST["start"] : '';
		$length 	= isset($_POST["length"])?$_POST["length"] : '';
		$search 	= isset($_POST["search"])?$_POST["search"] : '';
		$estatus 	= isset($_POST["estatus"])?$_POST["estatus"] : '';
		$perfil 	= isset($_POST["perfil"])?$_POST["perfil"] : '';
	
		$Siga_activosController = new Siga_activosController();
		echo $Siga_activosController->llenarDataTable($draw, $columns, $order, $start, $length, $search, $orden, $siga_activosDto, $estatus, $perfil, $Fech_Inicial, $Fech_Final, $Tab, $Filtro_AF_BC_Activos, $Filtro_Nombre_Activos, $Filtro_Clasific_Activos, $Filtro_Marca_Activos, $Filtro_Modelo_Activos, $Filtro_NumSerie_Activos, $Filtro_Propiedad_Activos, $Filtro_Usr_Responsable_Activos, $Filtro_UPrimaria_Activos, $Filtro_USecundaria_Activos, $Filtro_Estatus_Activos, $Filtro_Importe_Seguro_Activos, $Filtro_Monto_Factura_Activos, $Filtro_Fecha_Alta_Activos, $Filtro_Fecha_Reubicacion_Activos, $Filtro_Descripcion_Activos, $Filtro_Filtro_UPrimariaOrigen_Activos, $Filtro_Filtro_USecundariaOrigen_Activos, $Filtro_Tipo_Activo_Activos, $Filtro_Fecha_Baja_Usr_Solicitante_Activos, $Filtro_Fecha_Baja_Usr_DirFinanciera_Activos, $Filtro_Fecha_Baja_Usr_Contabilidad_Activos, $Filtro_Estatus_Workflow_Activos, $Filtro_UbicacionEspecifica_Activos, $Filtro_Motivo_Baja_Activos);
		//echo $siga_activosDto = $siga_activosFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search,$orden,$siga_activosDto,$estatus,$perfil, $Fech_Inicial, $Fech_Final, $Tab, $Filtro_Clasific_Activos, $Filtro_Marca_Activos, $Filtro_Propiedad_Activos, $Filtro_Usr_Responsable_Activos, $Filtro_UPrimaria_Activos, $Filtro_USecundaria_Activos); 
	}
