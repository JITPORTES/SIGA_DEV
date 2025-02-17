<?php

//session_start();
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_solicitud_tickets/Siga_solicitud_ticketsDTO.Class.php");
include_once(dirname(__FILE__)."/../../../controladores/activos/siga_solicitud_tickets/Siga_solicitud_ticketsController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/dtotojson/DtoToJson.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonEncod.Class.php");
include_once(dirname(__FILE__)."/../../../datos/json/JsonDecod.Class.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
class Siga_solicitud_ticketsFacade {
private $proveedor;
public function __construct() {
}
public function validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto){
$Siga_solicitud_ticketsDto->setId_Solicitud(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getId_Solicitud(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getId_Solicitud()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getId_Solicitud())){
$Siga_solicitud_ticketsDto->setId_Solicitud($this->fechaMysql($Siga_solicitud_ticketsDto->getId_Solicitud()));
}

$Siga_solicitud_ticketsDto->setId_Solicitud_Anterior(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getId_Solicitud_Anterior(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getId_Solicitud_Anterior()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getId_Solicitud_Anterior())){
$Siga_solicitud_ticketsDto->setId_Solicitud_Anterior($this->fechaMysql($Siga_solicitud_ticketsDto->getId_Solicitud_Anterior()));
}

$Siga_solicitud_ticketsDto->setAsist_Especial(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getAsist_Especial(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getAsist_Especial()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getAsist_Especial())){
$Siga_solicitud_ticketsDto->setAsist_Especial($this->fechaMysql($Siga_solicitud_ticketsDto->getAsist_Especial()));
}

$Siga_solicitud_ticketsDto->setId_Categoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getId_Categoria(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getId_Categoria()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getId_Categoria())){
$Siga_solicitud_ticketsDto->setId_Categoria($this->fechaMysql($Siga_solicitud_ticketsDto->getId_Categoria()));
}

$Siga_solicitud_ticketsDto->setId_Subcategoria(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getId_Subcategoria(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getId_Subcategoria()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getId_Subcategoria())){
$Siga_solicitud_ticketsDto->setId_Subcategoria($this->fechaMysql($Siga_solicitud_ticketsDto->getId_Subcategoria()));
}
$Siga_solicitud_ticketsDto->setId_Usuario(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getId_Usuario(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getId_Usuario()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getId_Usuario())){
$Siga_solicitud_ticketsDto->setId_Usuario($this->fechaMysql($Siga_solicitud_ticketsDto->getId_Usuario()));
}
$Siga_solicitud_ticketsDto->setId_Area(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getId_Area(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getId_Area()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getId_Area())){
$Siga_solicitud_ticketsDto->setId_Area($this->fechaMysql($Siga_solicitud_ticketsDto->getId_Area()));
}
$Siga_solicitud_ticketsDto->setId_Medio(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getId_Medio(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getId_Medio()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getId_Medio())){
$Siga_solicitud_ticketsDto->setId_Medio($this->fechaMysql($Siga_solicitud_ticketsDto->getId_Medio()));
}
$Siga_solicitud_ticketsDto->setSeccion(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getSeccion(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getSeccion()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getSeccion())){
$Siga_solicitud_ticketsDto->setSeccion($this->fechaMysql($Siga_solicitud_ticketsDto->getSeccion()));
}
$Siga_solicitud_ticketsDto->setTitulo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getTitulo(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getTitulo()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getTitulo())){
$Siga_solicitud_ticketsDto->setTitulo($this->fechaMysql($Siga_solicitud_ticketsDto->getTitulo()));
}
//$Siga_solicitud_ticketsDto->setId_Det_Actividad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getId_Det_Actividad(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getId_Det_Actividad()))))));
//if($this->esFecha($Siga_solicitud_ticketsDto->getId_Det_Actividad())){
//$Siga_solicitud_ticketsDto->setId_Det_Actividad($this->fechaMysql($Siga_solicitud_ticketsDto->getId_Det_Actividad()));
//}
$Siga_solicitud_ticketsDto->setDesc_Motivo_Reporte(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getDesc_Motivo_Reporte(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getDesc_Motivo_Reporte())){
$Siga_solicitud_ticketsDto->setDesc_Motivo_Reporte($this->fechaMysql($Siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()));
}
$Siga_solicitud_ticketsDto->setPrioridad(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getPrioridad(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getPrioridad()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getPrioridad())){
$Siga_solicitud_ticketsDto->setPrioridad($this->fechaMysql($Siga_solicitud_ticketsDto->getPrioridad()));
}
$Siga_solicitud_ticketsDto->setUrl_archivo(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getUrl_archivo(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getUrl_archivo()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getUrl_archivo())){
$Siga_solicitud_ticketsDto->setUrl_archivo($this->fechaMysql($Siga_solicitud_ticketsDto->getUrl_archivo()));
}
$Siga_solicitud_ticketsDto->setFech_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getFech_Inser(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getFech_Inser()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getFech_Inser())){
$Siga_solicitud_ticketsDto->setFech_Inser($this->fechaMysql($Siga_solicitud_ticketsDto->getFech_Inser()));
}
$Siga_solicitud_ticketsDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getUsr_Inser(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getUsr_Inser()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getUsr_Inser())){
$Siga_solicitud_ticketsDto->setUsr_Inser($this->fechaMysql($Siga_solicitud_ticketsDto->getUsr_Inser()));
}
$Siga_solicitud_ticketsDto->setFech_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getFech_Mod(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getFech_Mod()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getFech_Mod())){
$Siga_solicitud_ticketsDto->setFech_Mod($this->fechaMysql($Siga_solicitud_ticketsDto->getFech_Mod()));
}
$Siga_solicitud_ticketsDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getUsr_Mod(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getUsr_Mod()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getUsr_Mod())){
$Siga_solicitud_ticketsDto->setUsr_Mod($this->fechaMysql($Siga_solicitud_ticketsDto->getUsr_Mod()));
}
$Siga_solicitud_ticketsDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getEstatus_Reg(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getEstatus_Reg()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getEstatus_Reg())){
$Siga_solicitud_ticketsDto->setEstatus_Reg($this->fechaMysql($Siga_solicitud_ticketsDto->getEstatus_Reg()));
}
$Siga_solicitud_ticketsDto->setEstatus_Proceso(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getEstatus_Proceso(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getEstatus_Proceso()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getEstatus_Proceso())){
$Siga_solicitud_ticketsDto->setEstatus_Proceso($this->fechaMysql($Siga_solicitud_ticketsDto->getEstatus_Proceso()));
}

$Siga_solicitud_ticketsDto->setTituloCierre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getTituloCierre(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getTituloCierre()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getTituloCierre())){
$Siga_solicitud_ticketsDto->setTituloCierre($this->fechaMysql($Siga_solicitud_ticketsDto->getTituloCierre()));
}

$Siga_solicitud_ticketsDto->setComentarioCierre(strtoupper(str_ireplace("'","",trim(utf8_decode((phpversion()<=5.5) ? mb_strtoupper($Siga_solicitud_ticketsDto->getComentarioCierre(),"utf8"):strtoupper($Siga_solicitud_ticketsDto->getComentarioCierre()))))));
if($this->esFecha($Siga_solicitud_ticketsDto->getComentarioCierre())){
$Siga_solicitud_ticketsDto->setComentarioCierre($this->fechaMysql($Siga_solicitud_ticketsDto->getComentarioCierre()));
}

return $Siga_solicitud_ticketsDto;
}

public function selectSiga_categorias_reporte($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->selectSiga_categorias_reporte($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function selectSiga_Estatus_Proceso($Id_Solicitud, $Estatus_Proceso){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->selectEstatus_Proceso($Id_Solicitud, $Estatus_Proceso);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Cambiar_Activo_Solicitud($Id_Solicitud, $Id_Activo, $Id_Cirugia, $Id_Usuario){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Cambiar_Activo_Solicitud($Id_Solicitud, $Id_Activo, $Id_Cirugia, $Id_Usuario);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Guardar_Activo_Externo($Id_Solicitud,$Id_Cirugia, $Id_Usuario, $Activo_Externo, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Id_Ubic_Prim, $Id_Ubic_Sec, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $array_accesorios_act_ext, $array_eliminados_act_ext){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Guardar_Activo_Externo($Id_Solicitud,$Id_Cirugia, $Id_Usuario, $Activo_Externo, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Id_Ubic_Prim, $Id_Ubic_Sec, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $array_accesorios_act_ext, $array_eliminados_act_ext);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Guardar_Preregistro($Id_Solicitud, $Id_Cirugia, $Id_Usuario,$Pre_Registro_Ext, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Cantidad_Equ_Ext, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $Observ_Pre_Reg_Ext, $html_pre_reg,$qr_proveedor, $array_accesorios_act_ext, $array_eliminados_act_ext, $Pre_Re_Procedimiento, $Pre_Re_Fecha_Hora_Cirugia, $Pre_Re_Quirofano, $Pre_Re_Paciente, $Pre_Re_Cirujano){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Guardar_Preregistro($Id_Solicitud, $Id_Cirugia, $Id_Usuario,$Pre_Registro_Ext, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Cantidad_Equ_Ext, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $Observ_Pre_Reg_Ext, $html_pre_reg, $qr_proveedor, $array_accesorios_act_ext, $array_eliminados_act_ext, $Pre_Re_Procedimiento, $Pre_Re_Fecha_Hora_Cirugia, $Pre_Re_Quirofano, $Pre_Re_Paciente, $Pre_Re_Cirujano);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Guardar_Recepcion_Equipo($Id_Solicitud, $Id_Cirugia, $Id_Usuario, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Cantidad_Equ_Ext, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $Observ_Pre_Reg_Ext, $Comentarios_Recepcion, $array_accesorios_act_ext, $array_eliminados_act_ext, $Id_Motivo_Rechazo, $Pre_Re_Procedimiento, $Pre_Re_Fecha_Hora_Cirugia, $Pre_Re_Quirofano, $Pre_Re_Paciente, $Pre_Re_Cirujano){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Guardar_Recepcion_Equipo($Id_Solicitud, $Id_Cirugia, $Id_Usuario, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Cantidad_Equ_Ext, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $Observ_Pre_Reg_Ext, $Comentarios_Recepcion, $array_accesorios_act_ext, $array_eliminados_act_ext, $Id_Motivo_Rechazo, $Pre_Re_Procedimiento, $Pre_Re_Fecha_Hora_Cirugia, $Pre_Re_Quirofano, $Pre_Re_Paciente, $Pre_Re_Cirujano);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function confirm_solic_firm_gesjur($Id_Solicitud, $Usr_Inser){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->confirm_solic_firm_gesjur($Id_Solicitud, $Usr_Inser);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Pausar_iniciar_SLA($Id_Solicitud, $Estatus_SLA, $Justificacion_Pausa_SLA, $Desc_Motivo_Pausa){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Pausar_iniciar_SLA($Id_Solicitud, $Estatus_SLA, $Justificacion_Pausa_SLA, $Desc_Motivo_Pausa);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function accesorios_act_ext_nota_salida($Id_Solicitud){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->accesorios_act_ext_nota_salida($Id_Solicitud);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}


public function accesorios_act_ext_mesa_ayuda($Id_Solicitud){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->accesorios_act_ext_mesa_ayuda($Id_Solicitud);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}



public function selectSiga_categorias_reporte_Top_3($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->selectSiga_categorias_reporte_Top_3($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Cambiar_Area($Siga_solicitud_ticketsDto){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Cambiar_Area($Siga_solicitud_ticketsDto);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function selectreporte_por_reparto($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->selectreporte_por_reparto($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function  selectgrafica_calif_gestor($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->selectgrafica_calif_gestor($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function selectreporte_gestor_detalle($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->selectSiga_x_gestor_detalle($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Cambiar_lo_Realiza($Siga_solicitud_ticketsDto){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Cambiar_lo_Realiza($Siga_solicitud_ticketsDto);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Por_cerrar_a_seguimiento($Siga_solicitud_ticketsDto){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Por_cerrar_a_seguimiento($Siga_solicitud_ticketsDto);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function selectSiga_x_categorias($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->selectSiga_x_categorias($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function selectSiga_x_categorias_tabla($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final, $Nombre_Grafica, $Tipo_Calificacion, $Calificacion){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->tabla_x_categoria($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final, $Nombre_Grafica, $Tipo_Calificacion, $Calificacion);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function select_tabla_dinamica_tickets($siga_solicitud_ticketsDto, $Gerencia, $Departamento, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Rutina, $Nombre_Grafica, $Tipo_Mantenimiento){

$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->tabla_dinamica_tickets($siga_solicitud_ticketsDto, $Gerencia, $Departamento, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Rutina, $Nombre_Grafica, $Tipo_Mantenimiento);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Accesorios_Ext($Id_Solicitud){

$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Accesorios_Ext($Id_Solicitud);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Buscar_Cancelados($Id_Solicitud){

$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Buscar_Cancelados($Id_Solicitud);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function consulta_gtiqx($Id_Cirugia){

$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->consulta_gtiqx($Id_Cirugia);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function cmb_empresas_gtiqx(){

$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->cmb_empresas_gtiqx();
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function cmb_motivo_rechazo(){

$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->cmb_motivo_rechazo();
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function selectUsuarios_Enfermeria(){

$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->selectUsuarios_Enfermeria();
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Reporte_Mesa_de_Ayuda($siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Tipo_Mantenimiento, $Tipo_Seg_Fecha){

$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Reporte_Mesa_de_Ayuda($siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Tipo_Mantenimiento, $Tipo_Seg_Fecha);
$jsonDto = new Encode_JSON();
return $jsonDto->encode($Siga_solicitud_ticketsDto);
}




public function selectSiga_solicitud_tickets($Siga_solicitud_ticketsDto){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->selectSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
if($Siga_solicitud_ticketsDto!=""){
$dtoToJson = new DtoToJson($Siga_solicitud_ticketsDto);
return $dtoToJson->toJson("RESULTADOS DE LA CONSULTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"SIN RESULTADOS A MOSTRAR"));
}

public function grafica_servicios_registrados($Siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->grafica_servicios_registrados($Siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function indicadores_mesa_ayuda($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->indicadores_mesa_ayuda($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Cancelar_Solicitud($Siga_solicitud_ticketsDto, $Motivo_Cancelacion, $Id_Cirugia){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Cancelar_Solicitud($Siga_solicitud_ticketsDto, $Motivo_Cancelacion, $Id_Cirugia);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function indicador_servicios_registrados($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->indicador_servicios_registrados($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function barra_indicador_reportes_por_area($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->barra_indicador_reportes_por_area($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function pie_indicador_reportes_por_area($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->pie_indicador_reportes_por_area($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function pie_indicador_reportes_por_area_ubic_sec($Siga_solicitud_ticketsDto, $Gerencia, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->pie_indicador_reportes_por_area_ubic_sec($Siga_solicitud_ticketsDto, $Gerencia, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function pie_servicios_registrados_por_mes($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->pie_servicios_registrados_por_mes($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function pie_indicador_reportes_por_mes_por_area($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Tipo_Mantenimiento){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->pie_indicador_reportes_por_mes_por_area($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Tipo_Mantenimiento);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}


public function graf_barra_por_gestor($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->graf_barra_por_gestor($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function graf_barra_mantenimientos($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Rutina){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->graf_barra_mantenimientos($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Rutina);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function tabla_servicios_registrados($Siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Tipo_Actividad){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->tabla_servicios_registrados($Siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Tipo_Actividad);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Archivos_Adjuntos($Siga_solicitud_ticketsDto){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Archivos_Adjuntos($Siga_solicitud_ticketsDto);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function Archivos_Chat($Siga_solicitud_ticketsDto){
	$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
	$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->Archivos_Chat($Siga_solicitud_ticketsDto);

	$jsonDto = new Encode_JSON();
	return $jsonDto->encode($Siga_solicitud_ticketsDto);
}

public function insertSiga_solicitud_tickets($Siga_solicitud_ticketsDto){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->insertSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
if($Siga_solicitud_ticketsDto!=""){
$dtoToJson = new DtoToJson($Siga_solicitud_ticketsDto);
return $dtoToJson->toJson("REGISTRO REALIZADO DE FORMA CORRECTA");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR EL REGISTRO"));
}
public function llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Estatus_Proceso, $siga_solicitud_ticketsDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor, $Medio_de_Envio, $EsApp, $Todos_Tickets, $Tickets_SLA_Vencidos) {
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
return $Siga_solicitud_ticketsController->llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Estatus_Proceso, $siga_solicitud_ticketsDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor, $Medio_de_Envio, $EsApp, $Todos_Tickets, $Tickets_SLA_Vencidos);
}
public function updateSiga_solicitud_tickets($Siga_solicitud_ticketsDto){
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->updateSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
if($Siga_solicitud_ticketsDto!=""){
$dtoToJson = new DtoToJson($Siga_solicitud_ticketsDto);
return $dtoToJson->toJson("REGISTRO ACTUALIZADO");
}
$jsonDto = new Encode_JSON();
return $jsonDto->encode(array("totalCount"=>"0","text"=>"OCURRIO UN ERROR AL REALIZAR LA ACTUALIZACION"));
}
public function deleteSiga_solicitud_tickets($Siga_solicitud_ticketsDto){
//$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsController->deleteSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
if($Siga_solicitud_ticketsDto==true){
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


@$Id_Solicitud=$_POST["Id_Solicitud"];
@$Id_Solicitud_Anterior=$_POST["Id_Solicitud_Anterior"];
@$Asist_Especial=$_POST["Asist_Especial"];
@$Id_Activo=$_POST["Id_Activo"];
@$Id_Usuario=$_POST["Id_Usuario"];
@$Id_Area=$_POST["Id_Area"];
@$Id_Categoria=$_POST["Id_Categoria"];
@$Id_Gestor=$_POST["Id_Gestor"];
@$Nombre_Ejecutante=$_POST["Nombre_Ejecutante"];
@$Id_Gestor_Reasignado=$_POST["Id_Gestor_Reasignado"];
@$Id_Subcategoria=$_POST["Id_Subcategoria"];
@$Id_Medio=$_POST["Id_Medio"];
@$Seccion=$_POST["Seccion"];

//@$Titulo=$_POST["Titulo"];
@$Titulo= str_replace("'","",$_POST['Titulo']);

@$Id_Actividad=$_POST["Id_Actividad"];
@$Id_Det_Actividad=$_POST["Id_Det_Actividad"];

//@$Desc_Motivo_Reporte= $_POST["Desc_Motivo_Reporte"];
@$Desc_Motivo_Reporte1= str_replace("'","",$_POST['Desc_Motivo_Reporte']);
@$Desc_Motivo_Reporte= str_replace('"','',$Desc_Motivo_Reporte1);

@$Prioridad=$_POST["Prioridad"];
@$Url_archivo=$_POST["Url_archivo"];
@$Archivo_Binario=$_POST["Archivo_Binario1"];
@$Archivo_Binario2=$_POST["Archivo_Binario2"];
@$Archivo_Binario3=$_POST["Archivo_Binario3"];
@$Archivo_Binario4=$_POST["Archivo_Binario4"];
@$Fech_Inser=$_POST["Fech_Inser"];
@$Usr_Inser=$_POST["Usr_Inser"];
@$Fech_Mod=$_POST["Fech_Mod"];
@$Usr_Mod=$_POST["Usr_Mod"];
@$Estatus_Reg=$_POST["Estatus_Reg"];
@$Estatus_Proceso=$_POST["Estatus_Proceso"];
@$Lo_Realiza=$_POST["Lo_Realiza"];

//@$TituloCierre=$_POST["TituloCierre"];
@$TituloCierre= str_replace("'","",$_POST['TituloCierre']);

//@$ComentarioCierre=$_POST["ComentarioCierre"];
@$ComentarioCierre= str_replace("'","",$_POST['ComentarioCierre']);

//@$ComentarioCierreGestor=$_POST["ComentarioCierreGestor"];
@$ComentarioCierreGestor= str_replace("'","",$_POST['ComentarioCierreGestor']);

@$Id_Motivo_Aparente=$_POST["Id_Motivo_Aparente"];
@$Id_Motivo_Real=$_POST["Id_Motivo_Real"];
@$Id_Est_Equipo=$_POST["Id_Est_Equipo"];
@$Fech_Solicitud=$_POST["Fech_Solicitud"];
@$Fech_Seguimiento=$_POST["Fech_Seguimiento"];
@$Fech_Espera_Cierre=$_POST["Fech_Espera_Cierre"];
@$Fech_Cierre=$_POST["Fech_Cierre"];
@$Direccion_Ip_Sol=$_POST["Direccion_Ip_Sol"];
@$Tipo_Seg_Fecha=$_POST["Tipo_Seg_Fecha"];
//Activo Externo
@$Activo_Externo=$_POST["Activo_Externo"];
@$AF_BC_Ext=$_POST["AF_BC_Ext"];
@$Nombre_Act_Ext=$_POST["Nombre_Act_Ext"];
@$Marca_Act_Ext=$_POST["Marca_Act_Ext"];
@$Modelo_Act_Ext=$_POST["Modelo_Act_Ext"];
@$No_Serie_Act_Ext=$_POST["No_Serie_Act_Ext"];
@$Cantidad_Equ_Ext=$_POST["Cantidad_Equ_Ext"];
@$Pre_Re_Procedimiento=$_POST["Pre_Re_Procedimiento"];
@$Pre_Re_Fecha_Hora_Cirugia=$_POST["Pre_Re_Fecha_Hora_Cirugia"];
@$Pre_Re_Quirofano=$_POST["Pre_Re_Quirofano"];
@$Pre_Re_Paciente=$_POST["Pre_Re_Paciente"];
@$Pre_Re_Cirujano=$_POST["Pre_Re_Cirujano"];
@$Empresa_Ext=$_POST["Empresa_Ext"];
@$Nombre_Completo_Ext=$_POST["Nombre_Completo_Ext"];
@$Telefono_Ext=$_POST["Telefono_Ext"];
@$Correo_Ext=$_POST["Correo_Ext"];
@$Pre_Registro_Ext=$_POST["Pre_Registro_Ext"];
@$Observ_Pre_Reg_Ext=$_POST["Observ_Pre_Reg_Ext"];
@$Estatus_Recepcion=$_POST["Estatus_Recepcion"];
@$Comentarios_Recepcion=$_POST["Comentarios_Recepcion"];
@$Id_Motivo_Rechazo=$_POST["Id_Motivo_Rechazo"];
@$array_accesorios_act_ext=$_POST["array_accesorios_act_ext"];
@$array_eliminados_act_ext=$_POST["array_eliminados_act_ext"];


@$Id_Ubic_Prim=$_POST["Id_Ubic_Prim"];
@$Id_Ubic_Sec=$_POST["Id_Ubic_Sec"];
@$EsApp=$_POST["EsApp"];
@$Id_Cirugia=$_POST["Id_Cirugia"];

@$accion=$_POST["accion"];
@$draw = isset($_POST["draw"])?$_POST["draw"]:'';

@$Gestor_Solicitante=$_POST["Gestor_Solicitante"];
@$Id_Seccion=$_POST["Id_Seccion"];
@$Tipo_Gestor=$_POST["Tipo_Gestor"];

//Variables para la generacion de reportes e indicadores
@$Fecha_Inicial=$_POST["Fecha_Inicial"];
@$Fecha_Final=$_POST["Fecha_Final"];
@$Tipo_Calificacion=$_POST["Tipo_Calificacion"];
@$Calificacion=$_POST["Calificacion"];


@$Tipo_Actividad=$_POST["Tipo_Actividad"];
@$Mes=$_POST["Mes"];
@$Anio=$_POST["Anio"];
@$Nombre_Grafica=$_POST["Nombre_Grafica"];
@$Tipo_Mantenimiento=$_POST["Tipo_Mantenimiento"];
@$Rutina=$_POST["Rutina"];

@$Gerencia=$_POST["Gerencia"];
@$Departamento=$_POST["Departamento"];
@$Ubic_Prim=$_POST["Ubic_Prim"];
@$Ubic_Sec=$_POST["Ubic_Sec"];
@$Clase=$_POST["Clase"];
@$Clasificacion=$_POST["Clasificacion"];
@$Familia=$_POST["Familia"];
@$Subfamilia=$_POST["Subfamilia"];
@$Motivo_Cancelacion=$_POST["Motivo_Cancelacion"];
@$Medio_de_Envio=$_POST["Medio_de_Envio"];
@$html_pre_reg=$_POST["html_pre_reg"];
@$qr_proveedor=$_POST["qr_proveedor"];
@$Todos_Tickets=$_POST["Todos_Tickets"];
@$Tickets_SLA_Vencidos=$_POST["Tickets_SLA_Vencidos"];
@$Justificacion_Pausa_SLA=$_POST["Justificacion_Pausa_SLA"];
@$Estatus_SLA=$_POST["Estatus_SLA"];
@$Desc_Motivo_Pausa=$_POST["Desc_Motivo_Pausa"];

$siga_solicitud_ticketsFacade = new Siga_solicitud_ticketsFacade();
$siga_solicitud_ticketsDto = new Siga_solicitud_ticketsDTO();

$siga_solicitud_ticketsDto->setId_Solicitud($Id_Solicitud);
$siga_solicitud_ticketsDto->setId_Solicitud_Anterior($Id_Solicitud_Anterior);
$siga_solicitud_ticketsDto->setAsist_Especial($Asist_Especial);
$siga_solicitud_ticketsDto->setId_Activo($Id_Activo);
$siga_solicitud_ticketsDto->setId_Usuario($Id_Usuario);
$siga_solicitud_ticketsDto->setId_Area($Id_Area);
$siga_solicitud_ticketsDto->setId_Categoria($Id_Categoria);
$siga_solicitud_ticketsDto->setId_Subcategoria($Id_Subcategoria);
$siga_solicitud_ticketsDto->setId_Gestor($Id_Gestor);
$siga_solicitud_ticketsDto->setNombre_Ejecutante($Nombre_Ejecutante);
$siga_solicitud_ticketsDto->setId_Gestor_Reasignado($Id_Gestor_Reasignado);
$siga_solicitud_ticketsDto->setId_Medio($Id_Medio);
$siga_solicitud_ticketsDto->setSeccion($Seccion);
$siga_solicitud_ticketsDto->setTitulo($Titulo);
$siga_solicitud_ticketsDto->setId_Actividad($Id_Actividad);
$siga_solicitud_ticketsDto->setId_Det_Actividad($Id_Det_Actividad);
$siga_solicitud_ticketsDto->setDesc_Motivo_Reporte($Desc_Motivo_Reporte);
$siga_solicitud_ticketsDto->setPrioridad($Prioridad);
$siga_solicitud_ticketsDto->setUrl_archivo($Url_archivo);
$siga_solicitud_ticketsDto->setArchivo_Binario($Archivo_Binario);
$siga_solicitud_ticketsDto->setArchivo_Binario2($Archivo_Binario2);
$siga_solicitud_ticketsDto->setArchivo_Binario3($Archivo_Binario3);
$siga_solicitud_ticketsDto->setArchivo_Binario4($Archivo_Binario4);
$siga_solicitud_ticketsDto->setFech_Inser($Fech_Inser);
$siga_solicitud_ticketsDto->setUsr_Inser($Usr_Inser);
$siga_solicitud_ticketsDto->setFech_Mod($Fech_Mod);
$siga_solicitud_ticketsDto->setUsr_Mod($Usr_Mod);
$siga_solicitud_ticketsDto->setEstatus_Reg($Estatus_Reg);
$siga_solicitud_ticketsDto->setEstatus_Proceso($Estatus_Proceso);
$siga_solicitud_ticketsDto->setLo_Realiza($Lo_Realiza);
$siga_solicitud_ticketsDto->setTituloCierre($TituloCierre);
$siga_solicitud_ticketsDto->setComentarioCierre($ComentarioCierre);
$siga_solicitud_ticketsDto->setComentarioCierreGestor($ComentarioCierreGestor);
$siga_solicitud_ticketsDto->setId_Motivo_Aparente($Id_Motivo_Aparente);
$siga_solicitud_ticketsDto->setId_Motivo_Real($Id_Motivo_Real);
$siga_solicitud_ticketsDto->setId_Est_Equipo($Id_Est_Equipo);
$siga_solicitud_ticketsDto->setFech_Solicitud($Fech_Solicitud);
$siga_solicitud_ticketsDto->setFech_Seguimiento($Fech_Seguimiento);
$siga_solicitud_ticketsDto->setFech_Espera_Cierre($Fech_Espera_Cierre);
$siga_solicitud_ticketsDto->setFech_Cierre($Fech_Cierre);
$siga_solicitud_ticketsDto->setDireccion_Ip_Sol($Direccion_Ip_Sol);
$siga_solicitud_ticketsDto->setActivo_Externo($Activo_Externo);
$siga_solicitud_ticketsDto->setAF_BC_Ext($AF_BC_Ext);
$siga_solicitud_ticketsDto->setNombre_Act_Ext($Nombre_Act_Ext);
$siga_solicitud_ticketsDto->setMarca_Act_Ext($Marca_Act_Ext);
$siga_solicitud_ticketsDto->setModelo_Act_Ext($Modelo_Act_Ext);
$siga_solicitud_ticketsDto->setNo_Serie_Act_Ext($No_Serie_Act_Ext);

$siga_solicitud_ticketsDto->setCantidad_Equ_Ext($Cantidad_Equ_Ext);
$siga_solicitud_ticketsDto->setEmpresa_Ext($Empresa_Ext);
$siga_solicitud_ticketsDto->setNombre_Completo_Ext($Nombre_Completo_Ext);
$siga_solicitud_ticketsDto->setTelefono_Ext($Telefono_Ext);
$siga_solicitud_ticketsDto->setCorreo_Ext($Correo_Ext);
$siga_solicitud_ticketsDto->setPre_Registro_Ext($Pre_Registro_Ext);
$siga_solicitud_ticketsDto->setObserv_Pre_Reg_Ext($Observ_Pre_Reg_Ext);

$siga_solicitud_ticketsDto->setEstatus_Recepcion($Estatus_Recepcion);
$siga_solicitud_ticketsDto->setComentarios_Recepcion($Comentarios_Recepcion);
$siga_solicitud_ticketsDto->setId_Motivo_Rechazo($Id_Motivo_Rechazo);

$siga_solicitud_ticketsDto->setId_Ubic_Prim($Id_Ubic_Prim);
$siga_solicitud_ticketsDto->setId_Ubic_Sec($Id_Ubic_Sec);
$siga_solicitud_ticketsDto->setEsApp($EsApp);
$siga_solicitud_ticketsDto->setId_Cirugia($Id_Cirugia);


if( ($accion=="guardar") && ($Id_Solicitud=="") ){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->insertSiga_solicitud_tickets($siga_solicitud_ticketsDto);
echo $siga_solicitud_ticketsDto;
} else if(($accion=="guardar") && ($Id_Solicitud!="")){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->updateSiga_solicitud_tickets($siga_solicitud_ticketsDto);
echo $siga_solicitud_ticketsDto;
} else if($accion=="Cambiar_Area"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Cambiar_Area($siga_solicitud_ticketsDto);
echo $siga_solicitud_ticketsDto;
}else if($accion=="consultar"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectSiga_solicitud_tickets($siga_solicitud_ticketsDto);
echo $siga_solicitud_ticketsDto;
} else if($accion=="consul_report_ges_categ"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectSiga_categorias_reporte($siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
echo $siga_solicitud_ticketsDto;
}else if($accion=="consul_report_ges_categ_Top_3"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectSiga_categorias_reporte_Top_3($siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
echo $siga_solicitud_ticketsDto;
}else if($accion=="consul_grafica_por_reparto"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectreporte_por_reparto($siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
echo $siga_solicitud_ticketsDto;
}else if($accion=="consul_grafica_calif_gestor"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectgrafica_calif_gestor($siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
echo $siga_solicitud_ticketsDto;
}else if($accion=="consul_grafica_gestor_detalle"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectreporte_gestor_detalle($siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
echo $siga_solicitud_ticketsDto;
}
else if($accion=="consul_report_x_categ"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectSiga_x_categorias($siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final);
echo $siga_solicitud_ticketsDto;
}else if($accion=="consul_tabla_x_categ"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectSiga_x_categorias_tabla($siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final, $Nombre_Grafica, $Tipo_Calificacion, $Calificacion);
echo $siga_solicitud_ticketsDto;
}else if( ($accion=="baja") && ($Id_Solicitud!="") ){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->deleteSiga_solicitud_tickets($siga_solicitud_ticketsDto);
echo $siga_solicitud_ticketsDto;
} else if( ($accion=="seleccionar") && ($Id_Solicitud!="") ){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectSiga_solicitud_tickets($siga_solicitud_ticketsDto);
echo $siga_solicitud_ticketsDto;
}else if($accion=="grafica_servicios_registrados"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->grafica_servicios_registrados($siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final);
echo $siga_solicitud_ticketsDto;
}else if($accion=="tabla_servicios_registrados"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->tabla_servicios_registrados($siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Tipo_Actividad);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Cambiar_lo_Realiza"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Cambiar_lo_Realiza($siga_solicitud_ticketsDto);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Por_cerrar_a_seguimiento"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Por_cerrar_a_seguimiento($siga_solicitud_ticketsDto);
echo $siga_solicitud_ticketsDto;
}else if($accion=="indicadores_mesa_ayuda"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->indicadores_mesa_ayuda($siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Cancelar_Solicitud"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Cancelar_Solicitud($siga_solicitud_ticketsDto, $Motivo_Cancelacion, $Id_Cirugia);
echo $siga_solicitud_ticketsDto;
}else if($accion=="indicador_servicios_registrados"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->indicador_servicios_registrados($siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio);
echo $siga_solicitud_ticketsDto;
}else if($accion=="barra_indicador_reportes_por_area"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->barra_indicador_reportes_por_area($siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);
echo $siga_solicitud_ticketsDto;
}else if($accion=="pie_indicador_reportes_por_area"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->pie_indicador_reportes_por_area($siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);
echo $siga_solicitud_ticketsDto;
}else if($accion=="pie_indicador_reportes_por_area_ubic_sec"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->pie_indicador_reportes_por_area_ubic_sec($siga_solicitud_ticketsDto, $Gerencia, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);
echo $siga_solicitud_ticketsDto;
}else if($accion=="pie_servicios_registrados_por_mes"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->pie_servicios_registrados_por_mes($siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);
echo $siga_solicitud_ticketsDto;
}else if($accion=="pie_indicador_reportes_por_mes_por_area"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->pie_indicador_reportes_por_mes_por_area($siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Tipo_Mantenimiento);
echo $siga_solicitud_ticketsDto;
}else if($accion=="graf_barra_por_gestor"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->graf_barra_por_gestor($siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes);
echo $siga_solicitud_ticketsDto;
}else if($accion=="graf_barra_mantenimientos"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->graf_barra_mantenimientos($siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Rutina);
echo $siga_solicitud_ticketsDto;
}else if($accion=="select_tabla_dinamica_tickets"){

$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->select_tabla_dinamica_tickets($siga_solicitud_ticketsDto, $Gerencia, $Departamento, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Rutina, $Nombre_Grafica, $Tipo_Mantenimiento);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Reporte_Mesa_de_Ayuda"){

$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Reporte_Mesa_de_Ayuda($siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Tipo_Mantenimiento, $Tipo_Seg_Fecha);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Archivos_Adjuntos"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Archivos_Adjuntos($siga_solicitud_ticketsDto);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Consulta_Estatus_Proceso"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectSiga_Estatus_Proceso($Id_Solicitud, $Estatus_Proceso);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Cambiar_Activo_Solicitud"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Cambiar_Activo_Solicitud($Id_Solicitud, $Id_Activo, $Id_Cirugia, $Id_Usuario);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Guardar_Activo_Externo"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Guardar_Activo_Externo($Id_Solicitud, $Id_Cirugia, $Id_Usuario,$Activo_Externo, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Id_Ubic_Prim, $Id_Ubic_Sec, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $array_accesorios_act_ext, $array_eliminados_act_ext);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Guardar_Preregistro"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Guardar_Preregistro($Id_Solicitud, $Id_Cirugia, $Id_Usuario,$Pre_Registro_Ext, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Cantidad_Equ_Ext, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $Observ_Pre_Reg_Ext, $html_pre_reg, $qr_proveedor, $array_accesorios_act_ext, $array_eliminados_act_ext, $Pre_Re_Procedimiento, $Pre_Re_Fecha_Hora_Cirugia, $Pre_Re_Quirofano, $Pre_Re_Paciente, $Pre_Re_Cirujano);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Accesorios_Ext"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Accesorios_Ext($Id_Solicitud);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Buscar_Cancelados"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Buscar_Cancelados($Id_Solicitud);
echo $siga_solicitud_ticketsDto;
}else if($accion=="consulta_gtiqx"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->consulta_gtiqx($Id_Cirugia);
echo $siga_solicitud_ticketsDto;
}else if($accion=="cmb_empresas_gtiqx"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->cmb_empresas_gtiqx();
echo $siga_solicitud_ticketsDto;
}else if($accion=="cmb_motivo_rechazo"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->cmb_motivo_rechazo();
echo $siga_solicitud_ticketsDto;
}else if($accion=="Guardar_Recepcion_Equipo"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Guardar_Recepcion_Equipo($Id_Solicitud, $Id_Cirugia, $Id_Usuario, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Cantidad_Equ_Ext, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $Observ_Pre_Reg_Ext, $Comentarios_Recepcion, $array_accesorios_act_ext, $array_eliminados_act_ext, $Id_Motivo_Rechazo, $Pre_Re_Procedimiento, $Pre_Re_Fecha_Hora_Cirugia, $Pre_Re_Quirofano, $Pre_Re_Paciente, $Pre_Re_Cirujano);
echo $siga_solicitud_ticketsDto;
}else if($accion=="selectUsuarios_Enfermeria"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->selectUsuarios_Enfermeria();
echo $siga_solicitud_ticketsDto;
}else if($accion=="confirm_solic_firm_gesjur"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->confirm_solic_firm_gesjur($Id_Solicitud, $Usr_Inser);
echo $siga_solicitud_ticketsDto;
}else if($accion=="accesorios_act_ext_nota_salida"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->accesorios_act_ext_nota_salida($Id_Solicitud);
echo $siga_solicitud_ticketsDto;
}else if($accion=="accesorios_act_ext_mesa_ayuda"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->accesorios_act_ext_mesa_ayuda($Id_Solicitud);
echo $siga_solicitud_ticketsDto;
}else if($accion=="Pausar_iniciar_SLA"){
$siga_solicitud_ticketsDto=$siga_solicitud_ticketsFacade->Pausar_iniciar_SLA($Id_Solicitud, $Estatus_SLA, $Justificacion_Pausa_SLA, $Desc_Motivo_Pausa);
echo $siga_solicitud_ticketsDto;
}

else if (isset ($draw) && ($draw != "")) {
$columns = isset($_POST["columns"])?$_POST["columns"]:'';
$order = isset($_POST["order"])?$_POST["order"]:'';
$start = isset($_POST["start"])?$_POST["start"]:'';
$length = isset($_POST["length"])?$_POST["length"]:'';
$search = isset($_POST["search"])?$_POST["search"]:'';
$Id_Estatus_Proceso = isset($_POST["Estatus_Proceso"])?$_POST["Estatus_Proceso"]:'';
echo  $siga_solicitud_ticketsFacade->llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Estatus_Proceso, $siga_solicitud_ticketsDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor, $Medio_de_Envio, $EsApp, $Todos_Tickets, $Tickets_SLA_Vencidos);
}


?>