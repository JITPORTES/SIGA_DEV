<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_solicitud_tickets_app/Siga_solicitud_ticketsDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_solicitud_ticketsDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_solicitud_tickets($siga_solicitud_ticketsDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}

$Idmaximo="";
//Obtengo el Id Maximo
$valormaximo=" select CASE when max(Id_Solicitud+1) IS NULL then 1 else (max(Id_Solicitud + 1)) end as IndiceMaximo from siga_solicitud_tickets ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_solicitud_tickets on ";
$sql.="INSERT INTO siga_solicitud_tickets(";
$sql.="Id_Solicitud";
$sql.=",";
if($siga_solicitud_ticketsDto->getId_Solicitud_Anterior()!=""){
$sql.="Id_Solicitud_Anterior";
$sql.=",";
}
$sql.="Asist_Especial";
$sql.=",";
if($siga_solicitud_ticketsDto->getEstatus_Proceso()!=""){
$sql.="Estatus_Proceso";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getLo_Realiza()!=""){
$sql.="Lo_Realiza";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Activo()!=""){
$sql.="Id_Activo";
$sql.=",";
}
$sql.="Id_Usuario";
$sql.=",";
$sql.="Id_Area";
$sql.=",";
if($siga_solicitud_ticketsDto->getId_Medio()!=""){
$sql.="Id_Medio";
$sql.=",";
}
$sql.="Seccion";
$sql.=",";
$sql.="Titulo";
$sql.=",";
if($siga_solicitud_ticketsDto->getId_Actividad()!=""){
	$sql.="Id_Actividad";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Det_Actividad()!=""){
	$sql.="Id_Det_Actividad";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Categoria()!=""){
	$sql.="Id_Categoria";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Subcategoria()!=""){
$sql.="Id_Subcategoria";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Gestor()!=""){
$sql.="Id_Gestor";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!=""){
$sql.="Id_Gestor_Reasignado";
$sql.=",";
}
$sql.="Desc_Motivo_Reporte";
$sql.=",";
$sql.="Prioridad";
$sql.=",";
$sql.="Url_archivo";
$sql.=",";
if($siga_solicitud_ticketsDto->getArchivo_Binario()!=""){
$sql.="Archivo_Binario";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getArchivo_Binario2()!=""){
$sql.="Archivo_Binario2";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getArchivo_Binario3()!=""){
$sql.="Archivo_Binario3";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getArchivo_Binario4()!=""){
$sql.="Archivo_Binario4";
$sql.=",";
}
$sql.="Fech_Inser";
$sql.=",";
$sql.="Usr_Inser";
$sql.=",";
$sql.="Fech_Mod";
$sql.=",";
$sql.="Usr_Mod";
$sql.=",";
$sql.="Estatus_Reg";
//Fechas para el proceso del ticket							Cuando el ticket venga de la app se agrega la fecha de la solicitud
if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="1" || $siga_solicitud_ticketsDto->getId_Solicitud_Anterior()!="" || ($siga_solicitud_ticketsDto->getId_Medio()=='4' && $siga_solicitud_ticketsDto->getEstatus_Proceso()=="2")){
$sql.=",Fech_Solicitud";
}
if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="2"){
if($siga_solicitud_ticketsDto->getAsist_Especial()!=""){
$sql.=",Fech_Solicitud";
}
$sql.=",Fech_Seguimiento";
}														    //Cuando el ticket venga de la app se agrega la fecha de la solicitud
if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="3" || ($siga_solicitud_ticketsDto->getId_Medio()=='4' && $siga_solicitud_ticketsDto->getEstatus_Proceso()=="2")){
$sql.=",Fech_Espera_Cierre";
}
if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="4"){
$sql.=",Fech_Cierre";
}
//Fin
if($siga_solicitud_ticketsDto->getDireccion_Ip_Sol()!=""){
$sql.=",Direccion_Ip_Sol";
}
//Activo Externo
$sql.=",Activo_Externo";

if($siga_solicitud_ticketsDto->getAF_BC_Ext()!=""){
$sql.=",AF_BC_Ext";
}
if($siga_solicitud_ticketsDto->getNombre_Act_Ext()!=""){
$sql.=",Nombre_Act_Ext";
}
if($siga_solicitud_ticketsDto->getMarca_Act_Ext()!=""){
$sql.=",Marca_Act_Ext";
}
if($siga_solicitud_ticketsDto->getModelo_Act_Ext()!=""){
$sql.=",Modelo_Act_Ext";
}
if($siga_solicitud_ticketsDto->getNo_Serie_Act_Ext()!=""){
$sql.=",No_Serie_Act_Ext";
}
if($siga_solicitud_ticketsDto->getId_Ubic_Prim()!=""){
$sql.=",Id_Ubic_Prim";
}
if($siga_solicitud_ticketsDto->getId_Ubic_Sec()!=""){
$sql.=",Id_Ubic_Sec";
}

$sql.=") VALUES(";
$sql.="'".$Idmaximo."'";
$sql.=",";
if($siga_solicitud_ticketsDto->getId_Solicitud_Anterior()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getId_Solicitud_Anterior()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getAsist_Especial()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getAsist_Especial()."'";
$sql.=",";
}else{
$sql.="0";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getEstatus_Proceso()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getEstatus_Proceso()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getLo_Realiza()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getLo_Realiza()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Activo()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getId_Activo()."'";
$sql.=",";
}
$sql.="'".$siga_solicitud_ticketsDto->getId_Usuario()."'";
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getId_Area()."'";
$sql.=",";
if($siga_solicitud_ticketsDto->getId_Medio()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getId_Medio()."'";
$sql.=",";
}
$sql.="'".$siga_solicitud_ticketsDto->getSeccion()."'";
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getTitulo()."'";
$sql.=",";
if($siga_solicitud_ticketsDto->getId_Actividad()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getId_Actividad()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Det_Actividad()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getId_Det_Actividad()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Categoria()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getId_Categoria()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Subcategoria()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getId_Subcategoria()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Gestor()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getId_Gestor()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getId_Gestor_Reasignado()."'";
$sql.=",";
}
$sql.="'".$siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()."'";
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getPrioridad()."'";
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getUrl_archivo()."'";
$sql.=",";
if($siga_solicitud_ticketsDto->getArchivo_Binario()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getArchivo_Binario()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getArchivo_Binario2()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getArchivo_Binario2()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getArchivo_Binario3()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getArchivo_Binario3()."'";
$sql.=",";
}
if($siga_solicitud_ticketsDto->getArchivo_Binario4()!=""){
$sql.="'".$siga_solicitud_ticketsDto->getArchivo_Binario4()."'";
$sql.=",";
}
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getEstatus_Reg()."'";
//Fechas para el proceso del ticket							 Cuando el ticket venga de la app se agrega la fecha de la solicitud
if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="1" || $siga_solicitud_ticketsDto->getId_Solicitud_Anterior()!=""  || ($siga_solicitud_ticketsDto->getId_Medio()=='4' && $siga_solicitud_ticketsDto->getEstatus_Proceso()=="2")){
$sql.=",";
$sql.="getdate()";
}
if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="2"){
if($siga_solicitud_ticketsDto->getAsist_Especial()!=""){
$sql.=",";
$sql.="getdate()";
}
$sql.=",";
$sql.="getdate()";
}														    //Cuando el ticket venga de la app se agrega la fecha de la solicitud
if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="3" || ($siga_solicitud_ticketsDto->getId_Medio()=='4' && $siga_solicitud_ticketsDto->getEstatus_Proceso()=="2")){
$sql.=",";
$sql.="getdate()";
}
if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="4"){
$sql.=",";
$sql.="getdate()";
}
//Fin
if($siga_solicitud_ticketsDto->getDireccion_Ip_Sol()!=""){
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getDireccion_Ip_Sol()."'";
}


if($siga_solicitud_ticketsDto->getActivo_Externo()!=""){
$sql.=",";
$sql.=$siga_solicitud_ticketsDto->getActivo_Externo();
}else{
$sql.=",";
$sql.=0;
}
if($siga_solicitud_ticketsDto->getAF_BC_Ext()!=""){
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getAF_BC_Ext()."'";
}
if($siga_solicitud_ticketsDto->getNombre_Act_Ext()!=""){
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getNombre_Act_Ext()."'";
}
if($siga_solicitud_ticketsDto->getMarca_Act_Ext()!=""){
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getMarca_Act_Ext()."'";
}
if($siga_solicitud_ticketsDto->getModelo_Act_Ext()!=""){
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getModelo_Act_Ext()."'";
}
if($siga_solicitud_ticketsDto->getNo_Serie_Act_Ext()!=""){
$sql.=",";
$sql.="'".$siga_solicitud_ticketsDto->getNo_Serie_Act_Ext()."'";
}
if($siga_solicitud_ticketsDto->getId_Ubic_Prim()!=""){
$sql.=",";
$sql.=$siga_solicitud_ticketsDto->getId_Ubic_Prim();
}
if($siga_solicitud_ticketsDto->getId_Ubic_Sec()!=""){
$sql.=",";
$sql.=$siga_solicitud_ticketsDto->getId_Ubic_Sec();
}

$sql.=")";
//
$sql.=" set identity_insert siga_solicitud_tickets off ";
//
//echo $sql;
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}

if (!$this->_proveedor->error()) {
$tmp = new Siga_solicitud_ticketsDTO();
$tmp->setId_Solicitud($Idmaximo);
$tmp = $this->selectSiga_solicitud_tickets($tmp,"",$this->_proveedor);
} else {
    $error = true;
}
if ($proveedor == null) {
    $this->_proveedor->close();
}
unset($contador);
unset($sql);
return $tmp;
}
public function updateSiga_solicitud_tickets($siga_solicitud_ticketsDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}


$sql="UPDATE siga_solicitud_tickets SET ";
//if($siga_solicitud_ticketsDto->getId_Solicitud()!=""){
//$sql.="Id_Solicitud='".$siga_solicitud_ticketsDto->getId_Solicitud()."'";
//if(($siga_solicitud_ticketsDto->getId_Solicitud_Anterior()!="") ||($siga_solicitud_ticketsDto->getAsist_Especial()!="") ||($siga_solicitud_ticketsDto->getId_Usuario()!="") ||($siga_solicitud_ticketsDto->getId_Area()!="") ||($siga_solicitud_ticketsDto->getId_Medio()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Actividad()!="") ||($siga_solicitud_ticketsDto->getId_Det_Actividad()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
//$sql.=",";
//}
//}
if($siga_solicitud_ticketsDto->getId_Solicitud_Anterior()!=""){
$sql.="Id_Solicitud_Anterior='".$siga_solicitud_ticketsDto->getId_Solicitud_Anterior()."'";
if(($siga_solicitud_ticketsDto->getAsist_Especial()!="") ||($siga_solicitud_ticketsDto->getId_Usuario()!="") ||($siga_solicitud_ticketsDto->getId_Area()!="") ||($siga_solicitud_ticketsDto->getId_Medio()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Actividad()!="") ||($siga_solicitud_ticketsDto->getId_Det_Actividad()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getAsist_Especial()!=""){
$sql.="Asist_Especial='".$siga_solicitud_ticketsDto->getAsist_Especial()."'";
if(($siga_solicitud_ticketsDto->getId_Usuario()!="") ||($siga_solicitud_ticketsDto->getId_Area()!="") ||($siga_solicitud_ticketsDto->getId_Medio()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Actividad()!="") ||($siga_solicitud_ticketsDto->getId_Det_Actividad()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_solicitud_ticketsDto->getId_Usuario()."'";
if(($siga_solicitud_ticketsDto->getId_Area()!="") ||($siga_solicitud_ticketsDto->getId_Medio()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Actividad()!="") ||($siga_solicitud_ticketsDto->getId_Det_Actividad()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_solicitud_ticketsDto->getId_Area()."'";
if(($siga_solicitud_ticketsDto->getId_Medio()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Actividad()!="") ||($siga_solicitud_ticketsDto->getId_Det_Actividad()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Medio()!=""){
$sql.="Id_Medio='".$siga_solicitud_ticketsDto->getId_Medio()."'";
if(($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Actividad()!="") ||($siga_solicitud_ticketsDto->getId_Det_Actividad()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getSeccion()!=""){
$sql.="Seccion='".$siga_solicitud_ticketsDto->getSeccion()."'";
if(($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Actividad()!="") ||($siga_solicitud_ticketsDto->getId_Det_Actividad()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getTitulo()!=""){
$sql.="Titulo='".$siga_solicitud_ticketsDto->getTitulo()."'";
if(($siga_solicitud_ticketsDto->getId_Actividad()!="") ||($siga_solicitud_ticketsDto->getId_Det_Actividad()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Actividad()!=""){
$sql.="Id_Actividad='".$siga_solicitud_ticketsDto->getId_Actividad()."'";
if(($siga_solicitud_ticketsDto->getId_Det_Actividad()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Det_Actividad()!=""){
$sql.="Id_Det_Actividad='".$siga_solicitud_ticketsDto->getId_Det_Actividad()."'";
if(($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!=""){
$sql.="Desc_Motivo_Reporte='".$siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()."'";
if(($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getPrioridad()!=""){
$sql.="Prioridad='".$siga_solicitud_ticketsDto->getPrioridad()."'";
if(($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getUrl_archivo()!=""){
$sql.="Url_archivo='".$siga_solicitud_ticketsDto->getUrl_archivo()."'";
if(($siga_solicitud_ticketsDto->getArchivo_Binario()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getArchivo_Binario()!=""){
$sql.="Archivo_Binario='".$siga_solicitud_ticketsDto->getArchivo_Binario()."'";
}
if($siga_solicitud_ticketsDto->getArchivo_Binario2()!=""){
$sql.=",Archivo_Binario2='".$siga_solicitud_ticketsDto->getArchivo_Binario2()."'";
}
if($siga_solicitud_ticketsDto->getArchivo_Binario3()!=""){
$sql.=",Archivo_Binario3='".$siga_solicitud_ticketsDto->getArchivo_Binario3()."'";
}
if($siga_solicitud_ticketsDto->getArchivo_Binario4()!=""){
$sql.=",Archivo_Binario4='".$siga_solicitud_ticketsDto->getArchivo_Binario4()."'";
}
//if($siga_solicitud_ticketsDto->getFech_Inser()!=""){
//$sql.="Fech_Inser='".$siga_solicitud_ticketsDto->getFech_Inser()."'";
//if(($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
//$sql.=",";
//}
//}
//if($siga_solicitud_ticketsDto->getUsr_Inser()!=""){
//$sql.="Usr_Inser='".$siga_solicitud_ticketsDto->getUsr_Inser()."'";
//if(($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
//$sql.=",";
//}
//}
if($siga_solicitud_ticketsDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_solicitud_ticketsDto->getFech_Mod()."'";
if(($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_solicitud_ticketsDto->getUsr_Mod()."'";
if(($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ||($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_solicitud_ticketsDto->getEstatus_Reg()."'";
if(($siga_solicitud_ticketsDto->getEstatus_Proceso()!="") ||($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getEstatus_Proceso()!=""){
$sql.="Estatus_Proceso='".$siga_solicitud_ticketsDto->getEstatus_Proceso()."'";
if(($siga_solicitud_ticketsDto->getLo_Realiza()!="") ||($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getLo_Realiza()!=""){
$sql.="Lo_Realiza='".$siga_solicitud_ticketsDto->getLo_Realiza()."'";
if(($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_solicitud_ticketsDto->getId_Activo()."'";
if(($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Categoria()!=""){
$sql.="Id_Categoria='".$siga_solicitud_ticketsDto->getId_Categoria()."'";
if(($siga_solicitud_ticketsDto->getId_Subcategoria()!="") ||($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Subcategoria()!=""){
$sql.="Id_Subcategoria='".$siga_solicitud_ticketsDto->getId_Subcategoria()."'";
if(($siga_solicitud_ticketsDto->getId_Gestor()!="") ||($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Gestor()!=""){
$sql.="Id_Gestor='".$siga_solicitud_ticketsDto->getId_Gestor()."'";
if(($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!="") ||($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Gestor_Reasignado()!=""){
$sql.="Id_Gestor_Reasignado='".$siga_solicitud_ticketsDto->getId_Gestor_Reasignado()."'";
if(($siga_solicitud_ticketsDto->getNombre_Gestor()!="") ||($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getNombre_Gestor()!=""){
$sql.="Nombre_Gestor='".$siga_solicitud_ticketsDto->getNombre_Gestor()."'";
if(($siga_solicitud_ticketsDto->getTituloCierre()!="") ||($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getTituloCierre()!=""){
$sql.="TituloCierre='".$siga_solicitud_ticketsDto->getTituloCierre()."'";
if(($siga_solicitud_ticketsDto->getComentarioCierre()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getComentarioCierre()!=""){
$sql.="ComentarioCierre='".$siga_solicitud_ticketsDto->getComentarioCierre()."'";
if(($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="") ||($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Motivo_Aparente()!=""){
$sql.="Id_Motivo_Aparente='".$siga_solicitud_ticketsDto->getId_Motivo_Aparente()."'";
if(($siga_solicitud_ticketsDto->getId_Motivo_Real()!="") ||($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Motivo_Real()!=""){
$sql.="Id_Motivo_Real='".$siga_solicitud_ticketsDto->getId_Motivo_Real()."'";
if(($siga_solicitud_ticketsDto->getId_Est_Equipo()!="") ||($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
if($siga_solicitud_ticketsDto->getId_Est_Equipo()!=""){
$sql.="Id_Est_Equipo='".$siga_solicitud_ticketsDto->getId_Est_Equipo()."'";
if(($siga_solicitud_ticketsDto->getFech_Solicitud()!="") ||($siga_solicitud_ticketsDto->getFech_Seguimiento()!="") ||($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}
//Fechas para el proceso del ticket

if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="2"){
$sql.=",Fech_Seguimiento=getdate()";
if(($siga_solicitud_ticketsDto->getFech_Espera_Cierre()!="") ||($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}


if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="3"){
$sql.=",Fech_Espera_Cierre=getdate()";
if(($siga_solicitud_ticketsDto->getFech_Cierre()!="") ){
$sql.=",";
}
}

if($siga_solicitud_ticketsDto->getEstatus_Proceso()=="4"){
$sql.=",Fech_Cierre=getdate()";
}

////
$sql.=" WHERE Id_Solicitud='".$siga_solicitud_ticketsDto->getId_Solicitud()."'";



$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_solicitud_ticketsDTO();
$tmp->setId_Solicitud($siga_solicitud_ticketsDto->getId_Solicitud());
$tmp = $this->selectSiga_solicitud_tickets($tmp,"",$this->_proveedor);
} else {
    $error = true;
}
if ($proveedor == null) {
    $this->_proveedor->close();
}
unset($contador);
unset($sql);
return $tmp;
}
public function selectExiste_Calificacion($siga_solicitud_ticketsDto, $orden="",$proveedor=null){
$tmp = "";
$contador = 0;
$Encontrado=0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="select * from siga_ticket_calificacion where Id_Solicitud=".$siga_solicitud_ticketsDto->getId_Solicitud();


$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
	if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
		$Encontrado=1;	
	} else {
	$error = true;
	}
} else {
    $error = true;
}

if ($proveedor == null) {
    $this->_proveedor->close();
}
unset($contador);
unset($sql);
return $Encontrado;
}


public function deleteSiga_solicitud_tickets($siga_solicitud_ticketsDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_solicitud_tickets  WHERE Id_Solicitud='".$siga_solicitud_ticketsDto->getId_Solicitud()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = true;
} else {
$tmp = false;
}
if ($proveedor == null) {
    $this->_proveedor->close();
}
unset($contador);
unset($sql);
return $tmp;
}
public function selectSiga_solicitud_tickets($siga_solicitud_ticketsDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Estatus_Proceso Id_Estatus_Proceso,S.Asist_Especial,A.Marca,A.Modelo, A.NumSerie,UP.Desc_Ubic_Prim, US.Desc_Ubic_Sec,Id_Solicitud,Id_Solicitud_Anterior,S.Id_Gestor_Reasignado,S.Id_Activo,Id_Usuario,S.Id_Area,Id_Actividad,Id_Det_Actividad,Id_Categoria,Id_Subcategoria,Seccion,Titulo,Id_Categoria,Desc_Motivo_Reporte,Prioridad,Url_archivo,S.Fech_Inser,S.Usr_Inser,S.Fech_Mod,S.Usr_Mod,S.Estatus_Reg, S.Fech_Solicitud, S.Fech_Seguimiento, S.Fech_Espera_Cierre, S.Fech_Cierre, S.Archivo_Binario, S.Archivo_Binario2, S.Archivo_Binario3, S.Archivo_Binario4
,S.Activo_Externo, S.AF_BC_Ext, S.Nombre_Act_Ext, S.Marca_Act_Ext, S.Modelo_Act_Ext, S.No_Serie_Act_Ext
,(select top 1 Desc_Ubic_Prim from siga_cat_ubic_prim  UP where S.Id_Ubic_Prim=UP.Id_Ubic_Prim ) as Desc_Ubic_Prim_Act_Ext, S.Id_Ubic_Prim
,(select top 1 Desc_Ubic_Sec from siga_cat_ubic_sec  US where S.Id_Ubic_Sec=US.Id_Ubic_Sec ) as Desc_Ubic_Sec_Act_Ext, S.Id_Ubic_Sec
,(select P.Desc_Proceso from siga_cat_ticket_proceso P where P.Id_Estatus_Proceso=S.Estatus_Proceso) Estatus_Proceso
,(select C.Nom_Area from siga_catareas C where C.Id_Area=S.Id_Area) Area
,(select C.Desc_Seccion from siga_cat_ticket_seccion C where C.Id_Seccion=S.Seccion) Nombre_Seccion
,(select C.Desc_Categoria from siga_cat_ticket_categoria C where C.Id_Categoria=S.Id_Categoria) Categoria
,(select C.Desc_Subcategoria from siga_cat_ticket_subcategoria C where C.Id_Subcategoria=S.Id_Subcategoria) Subcategoria
,(select C.Desc_Categoria from siga_cat_ticket_categoria C where C.Id_Categoria=S.Id_Categoria) Motivo
,(select U.Nombre_Usuario from siga_usuarios U where S.Id_Usuario=U.Id_Usuario) Nombre_Usuario
,(select A.AF_BC+' '+A.Nombre_Activo as AF_BC_Activo from siga_activos A where S.Id_Activo=A.Id_Activo) AF_BC_Activo
,(select A.AF_BC from siga_activos A where S.Id_Activo=A.Id_Activo) AF_BC
,(select Nombre_Activo  from siga_activos A where S.Id_Activo=A.Id_Activo) Nombre_Activo
,(select DescLarga  from siga_activos A where S.Id_Activo=A.Id_Activo) Desc_Larga
,(select Foto  from siga_activos A where S.Id_Activo=A.Id_Activo) Foto
,(select No_Usuario  from siga_usuarios A where S.Id_Usuario=A.Id_Usuario) No_Usuario
,(select No_Usuario  from siga_usuarios A where S.Id_Gestor=A.Id_Usuario) No_Gestor
,(select U.Nombre_Usuario from siga_usuarios U where S.Id_Gestor=U.Id_Usuario) Gestor,TituloCierre,ComentarioCierre, S.Id_Medio,CM.Desc_Medio,S.Id_Motivo_Aparente,S.Id_Motivo_Real,S.Id_Est_Equipo,MA.Desc_Motivo_Aparente,MR.Desc_Motivo_Real,EE.Desc_Estatus, S.Lo_Realiza, S.Direccion_Ip_Sol 
FROM siga_solicitud_tickets S  left join siga_activos  A on S.Id_Activo=A.Id_Activo 
left join siga_cat_ubic_prim  UP on S.Id_Ubic_Prim=UP.Id_Ubic_Prim 
left join siga_cat_ubic_sec  US on S.Id_Ubic_Sec=US.Id_Ubic_Sec 
left join siga_cat_medios CM on S.Id_Medio=CM.Id_Medio 
left join siga_cat_motivo_aparente MA on S.Id_Motivo_Aparente=MA.Id_Motivo_Aparente
left join siga_cat_motivo_real MR on S.Id_Motivo_Real=MR.Id_Motivo_Real
left join siga_cat_estatus EE on S.Id_Est_Equipo=EE.Id_Estatus ";
if(($siga_solicitud_ticketsDto->getId_Solicitud()!="") || ($siga_solicitud_ticketsDto->getId_Activo()!="") ||($siga_solicitud_ticketsDto->getId_Usuario()!="") ||($siga_solicitud_ticketsDto->getId_Area()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_solicitud_ticketsDto->getId_Solicitud()!=""){
$sql.="Id_Solicitud='".$siga_solicitud_ticketsDto->getId_Solicitud()."'";
if(($siga_solicitud_ticketsDto->getId_Solicitud_Anterior()!="")||($siga_solicitud_ticketsDto->getId_Activo()!="") || ($siga_solicitud_ticketsDto->getId_Usuario()!="") ||($siga_solicitud_ticketsDto->getId_Area()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getId_Solicitud_Anterior()!=""){
$sql.="Id_Solicitud_Anterior='".$siga_solicitud_ticketsDto->getId_Solicitud_Anterior()."'";
if(($siga_solicitud_ticketsDto->getId_Activo()!="") || ($siga_solicitud_ticketsDto->getId_Usuario()!="") ||($siga_solicitud_ticketsDto->getId_Area()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_solicitud_ticketsDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_solicitud_ticketsDto->getId_Activo()."'";
if(($siga_solicitud_ticketsDto->getId_Usuario()!="") ||($siga_solicitud_ticketsDto->getId_Area()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_solicitud_ticketsDto->getId_Usuario()."'";
if(($siga_solicitud_ticketsDto->getId_Area()!="") ||($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getId_Area()!=""){
$sql.="S.Id_Area='".$siga_solicitud_ticketsDto->getId_Area()."'";
if(($siga_solicitud_ticketsDto->getSeccion()!="") ||($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getSeccion()!=""){
$sql.="Seccion='".$siga_solicitud_ticketsDto->getSeccion()."'";
if(($siga_solicitud_ticketsDto->getTitulo()!="") ||($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getTitulo()!=""){
$sql.="Titulo='".$siga_solicitud_ticketsDto->getTitulo()."'";
if(($siga_solicitud_ticketsDto->getId_Categoria()!="") ||($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getId_Categoria()!=""){
$sql.="Id_Categoria='".$siga_solicitud_ticketsDto->getId_Categoria()."'";
if(($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()!=""){
$sql.="Desc_Motivo_Reporte='".$siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()."'";
if(($siga_solicitud_ticketsDto->getPrioridad()!="") ||($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getPrioridad()!=""){
$sql.="Prioridad='".$siga_solicitud_ticketsDto->getPrioridad()."'";
if(($siga_solicitud_ticketsDto->getUrl_archivo()!="") ||($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getUrl_archivo()!=""){
$sql.="Url_archivo='".$siga_solicitud_ticketsDto->getUrl_archivo()."'";
if(($siga_solicitud_ticketsDto->getFech_Inser()!="") ||($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_solicitud_ticketsDto->getFech_Inser()."'";
if(($siga_solicitud_ticketsDto->getUsr_Inser()!="") ||($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_solicitud_ticketsDto->getUsr_Inser()."'";
if(($siga_solicitud_ticketsDto->getFech_Mod()!="") ||($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_solicitud_ticketsDto->getFech_Mod()."'";
if(($siga_solicitud_ticketsDto->getUsr_Mod()!="") ||($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_solicitud_ticketsDto->getUsr_Mod()."'";
if(($siga_solicitud_ticketsDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_ticketsDto->getEstatus_Reg()!=""){
$sql.="S.Estatus_Reg <>'3'";
}

if($siga_solicitud_ticketsDto->getId_Categoria()!=""){
$sql.=" and Id_Categoria='".$siga_solicitud_ticketsDto->getId_Categoria()."'";
}

if($siga_solicitud_ticketsDto->getId_Subcategoria()!=""){
$sql.=" and Id_Subcategoria='".$siga_solicitud_ticketsDto->getId_Subcategoria()."'";
}


if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
//echo $sql;
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
$tmp = [];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_solicitud_ticketsDTO();


//Valida que exista la imagen del usuario 	
$tmp[$contador]->setExiste_Imagen($this->valida_existe_img('http://192.168.1.234/Fotos/'.rtrim(ltrim($row["No_Usuario"])).'.jpg'));	
$tmp[$contador]->setExiste_Imagen_Gestor($this->valida_existe_img('http://192.168.1.234/Fotos/'.rtrim(ltrim($row["No_Gestor"])).'.jpg'));
//
$tmp[$contador]->setId_Solicitud($row["Id_Solicitud"]);
$tmp[$contador]->setId_Solicitud_Anterior($row["Id_Solicitud_Anterior"]);
$tmp[$contador]->setAsist_Especial($row["Asist_Especial"]);
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
$tmp[$contador]->setAF_BC($row["AF_BC"]);
$tmp[$contador]->setNombre_Activo($row["Nombre_Activo"]);
$tmp[$contador]->setFoto($row["Foto"]);
$tmp[$contador]->setAF_BC_Activo($row["AF_BC_Activo"]);
$tmp[$contador]->setAF_BC_Activo($row["AF_BC_Activo"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setNo_Usuario(rtrim(ltrim($row["No_Usuario"])));
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setId_Medio($row["Id_Medio"]);
$tmp[$contador]->setDesc_Medio(rtrim(ltrim($row["Desc_Medio"])));
$tmp[$contador]->setSeccion($row["Seccion"]);
$tmp[$contador]->setTitulo($row["Titulo"]);
$tmp[$contador]->setId_Actividad(rtrim(ltrim($row["Id_Actividad"])));
$tmp[$contador]->setId_Det_Actividad(rtrim(ltrim($row["Id_Det_Actividad"])));
$tmp[$contador]->setId_Categoria($row["Id_Categoria"]);
$tmp[$contador]->setDesc_Motivo_Reporte($row["Desc_Motivo_Reporte"]);
$tmp[$contador]->setPrioridad($row["Prioridad"]);
$tmp[$contador]->setUrl_archivo(rtrim(ltrim($row["Url_archivo"])));
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setEstatus_Proceso($row["Estatus_Proceso"]);
$tmp[$contador]->setLo_Realiza($row["Lo_Realiza"]);
$tmp[$contador]->setId_Estatus_Proceso($row["Id_Estatus_Proceso"]);
$tmp[$contador]->setArea($row["Area"]);
$tmp[$contador]->setNombreSeccion($row["Nombre_Seccion"]);
$tmp[$contador]->setCategoria($row["Categoria"]);
$tmp[$contador]->setSubcategoria($row["Subcategoria"]);
$tmp[$contador]->setMotivo($row["Motivo"]);
$tmp[$contador]->setUsuario($row["Nombre_Usuario"]);
$tmp[$contador]->setId_Categoria($row["Id_Categoria"]);
$tmp[$contador]->setId_Subcategoria($row["Id_Subcategoria"]);
$tmp[$contador]->setId_Gestor_Reasignado($row["Id_Gestor_Reasignado"]);
$tmp[$contador]->setNo_Gestor(rtrim(ltrim($row["No_Gestor"])));
$tmp[$contador]->setGestor($row["Gestor"]);
$tmp[$contador]->setTituloCierre($row["TituloCierre"]);
$tmp[$contador]->setComentarioCierre($row["ComentarioCierre"]);
$tmp[$contador]->setId_Motivo_Aparente($row["Id_Motivo_Aparente"]);
$tmp[$contador]->setDesc_Motivo_Aparente($row["Desc_Motivo_Aparente"]);
$tmp[$contador]->setId_Motivo_Real($row["Id_Motivo_Real"]);
$tmp[$contador]->setDesc_Motivo_Real($row["Desc_Motivo_Real"]);
$tmp[$contador]->setId_Est_Equipo($row["Id_Est_Equipo"]);
$tmp[$contador]->setDesc_Est_Equipo($row["Desc_Estatus"]);
$tmp[$contador]->setUbic_Prim($row["Desc_Ubic_Prim"]);
$tmp[$contador]->setUbic_Sec($row["Desc_Ubic_Sec"]);
$tmp[$contador]->setMarca($row["Marca"]);
$tmp[$contador]->setModelo($row["Modelo"]);
$tmp[$contador]->setNo_Serie($row["NumSerie"]);
$tmp[$contador]->setDesc_Lar_Activo($row["Desc_Larga"]);

$tmp[$contador]->setFech_Solicitud(rtrim(ltrim($row["Fech_Solicitud"])));
$tmp[$contador]->setFech_Seguimiento(rtrim(ltrim($row["Fech_Seguimiento"])));
$tmp[$contador]->setFech_Espera_Cierre(rtrim(ltrim($row["Fech_Espera_Cierre"])));
$tmp[$contador]->setFech_Cierre(rtrim(ltrim($row["Fech_Cierre"])));

$tmp[$contador]->setActivo_Externo(rtrim(ltrim($row["Activo_Externo"])));
$tmp[$contador]->setAF_BC_Ext(rtrim(ltrim($row["AF_BC_Ext"])));
$tmp[$contador]->setNombre_Act_Ext(rtrim(ltrim($row["Nombre_Act_Ext"])));
$tmp[$contador]->setMarca_Act_Ext(rtrim(ltrim($row["Marca_Act_Ext"])));
$tmp[$contador]->setModelo_Act_Ext(rtrim(ltrim($row["Modelo_Act_Ext"])));
$tmp[$contador]->setNo_Serie_Act_Ext(rtrim(ltrim($row["No_Serie_Act_Ext"])));
$tmp[$contador]->setId_Ubic_Prim(rtrim(ltrim($row["Id_Ubic_Prim"])));
$tmp[$contador]->setDesc_Ubic_Prim_Act_Ext(rtrim(ltrim($row["Desc_Ubic_Prim_Act_Ext"])));
$tmp[$contador]->setId_Ubic_Sec(rtrim(ltrim($row["Id_Ubic_Sec"])));
$tmp[$contador]->setDesc_Ubic_Sec_Act_Ext(rtrim(ltrim($row["Desc_Ubic_Sec_Act_Ext"])));



$tmp[$contador]->setArchivo_Binario(rtrim(ltrim($row["Archivo_Binario"])));
$tmp[$contador]->setArchivo_Binario2(rtrim(ltrim($row["Archivo_Binario2"])));
$tmp[$contador]->setArchivo_Binario3(rtrim(ltrim($row["Archivo_Binario3"])));
$tmp[$contador]->setArchivo_Binario4(rtrim(ltrim($row["Archivo_Binario4"])));
$tmp[$contador]->setDireccion_Ip_Sol(rtrim(ltrim($row["Direccion_Ip_Sol"])));
$contador++;
}
} else {
$error = true;
}
} else {
    $error = true;
}
if ($proveedor == null) {
    $this->_proveedor->close();
}
unset($contador);
unset($sql);
return $tmp;
}

public function llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Estatus_Proceso,$siga_solicitud_ticketsDto,$Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor, $Medio_de_Envio, $proveedor = null) {
        $recordsTotal = 0;
        $data = array();
        if ($proveedor == null) {
            $this->_conexion(null);
        } else if ($proveedor != null) {
            $this->_proveedor = $proveedor;
        }
        $criterios = "";
        if ($search != ''AND $search["value"] != '') {
            foreach ($columns as $value) {   
                if($value["data"]!='Id_Solicitud' AND $value["data"]!='function')
                $criterios.=' ' . $value["data"] . " LIKE '%" . $search["value"] . "%'" . ' OR';
            }
            $criterios = $criterios != "" ? ('AND (' . substr($criterios, 0, -2) . ')') : '';
        }
        $ordenamiento='';        
        if ($order != ''AND count($order)> 0) {
            $order=$order[0];
            $aux=$columns[$order["column"]];
			if($aux["data"] !="function")
			{
				$ordenamiento=' ORDER BY '.$aux["data"].' '.$order["dir"];
				
				//$ordenamiento=' ORDER BY Id_Solicitud asc ';
				
			}else{
				$ordenamiento=' ORDER BY Id_Solicitud asc ';
				
			}
        }else{
			$ordenamiento=' ORDER BY Id_Solicitud desc ';
		}
        $pagina='';
        if($start!='' AND $length!=''){
            $pagina='  OFFSET '.$start.' ROWS FETCH NEXT '.$length.' ROWS ONLY ';
        }
		$filtro = "";
		if ($Id_Estatus_Proceso != "")
		{
			$filtro .= " and Estatus_Proceso in(".$Id_Estatus_Proceso.")";	
		}
		
		$Area="";
		if($siga_solicitud_ticketsDto->getId_Area()!=""){
			
			if($siga_solicitud_ticketsDto->getId_Area()!='5'){
				$Area="  ST.Id_Area=".$siga_solicitud_ticketsDto->getId_Area()." and ";
			}
		}
		
		$Id_Usuario="";
		if($Gestor_Solicitante!="gestor"){
			if($siga_solicitud_ticketsDto->getId_Usuario()!=""){
				$Id_Usuario="  ST.Id_Usuario=".$siga_solicitud_ticketsDto->getId_Usuario()." and ";
			}
		}
		
		$Seccion="";
		if($Id_Seccion!=""){
			$Seccion=" ST.Seccion=".$Id_Seccion." and ";
		}
		
		$Id_Gestor="";
		if($siga_solicitud_ticketsDto->getId_Gestor()!=""){
			$Id_Gestor=" ST.Id_Gestor=".$siga_solicitud_ticketsDto->getId_Gestor()." and ";
		}
		
		
		//Filtros Busqueda
		$Busqueda="";
		if($Id_Estatus_Proceso=="1" && $search["value"]!=""){
			$Busqueda.=" where ( ";
			$Busqueda.=" Id_Solicitud like '%".$search["value"]."%' ";
			$Busqueda.=" or Fecha like '%".$search["value"]."%' ";
			$Busqueda.=" or A_Especial like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Prioridad like '%".$search["value"]."%' ";
			$Busqueda.=" or Nombre_Usuario like '%".$search["value"]."%' ";
			$Busqueda.=" or Nombre_Seccion like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Categoria like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Subcategoria like '%".$search["value"]."%' ";
			$Busqueda.=" or Titulo like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Motivo_Reporte like '%".$search["value"]."%' ";
			$Busqueda.=" or Nom_Area like '%".$search["value"]."%' ";
			$Busqueda.=" or Gestor like '%".$search["value"]."%' ";
			$Busqueda.=" or Nom_usr_reasignado like '%".$search["value"]."%' ";
			//Datos del Activo
			$Busqueda.=" or AF_BC_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Nombre_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Marca_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Modelo_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or No_Serie_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Ubic_Prim like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Ubic_Sec like '%".$search["value"]."%' ";
			$Busqueda.=" ) ";
		}
		
		if($Id_Estatus_Proceso=="2" && $search["value"]!=""){
			$Busqueda.=" where ( ";
			$Busqueda.=" Id_Solicitud like '%".$search["value"]."%' ";
			$Busqueda.=" or Fecha_Seguimiento like '%".$search["value"]."%' ";
			$Busqueda.=" or A_Especial like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Prioridad like '%".$search["value"]."%' ";
			$Busqueda.=" or Nombre_Usuario like '%".$search["value"]."%' ";
			$Busqueda.=" or Gestor like '%".$search["value"]."%' ";
			$Busqueda.=" or Nombre_Seccion like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Categoria like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Subcategoria like '%".$search["value"]."%' ";
			$Busqueda.=" or Titulo like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Motivo_Reporte like '%".$search["value"]."%' ";
			$Busqueda.=" or Nom_Area like '%".$search["value"]."%' ";
			//Datos del Activo
			$Busqueda.=" or AF_BC_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Nombre_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Marca_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Modelo_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or No_Serie_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Ubic_Prim like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Ubic_Sec like '%".$search["value"]."%' ";
			$Busqueda.=" ) ";
		}
		
		if($Id_Estatus_Proceso=="3" && $search["value"]!=""){
			$Busqueda.=" where ( ";
			$Busqueda.=" Id_Solicitud like '%".$search["value"]."%' ";
			$Busqueda.=" or Fecha_Esp_Cierre like '%".$search["value"]."%' ";
			$Busqueda.=" or A_Especial like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Prioridad like '%".$search["value"]."%' ";
			$Busqueda.=" or Nombre_Usuario like '%".$search["value"]."%' ";
			$Busqueda.=" or Gestor like '%".$search["value"]."%' ";
			$Busqueda.=" or Nombre_Seccion like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Categoria like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Subcategoria like '%".$search["value"]."%' ";
			$Busqueda.=" or Titulo like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Motivo_Reporte like '%".$search["value"]."%' ";
			$Busqueda.=" or Nom_Area like '%".$search["value"]."%' ";
			//Datos del Activo
			$Busqueda.=" or AF_BC_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Nombre_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Marca_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Modelo_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or No_Serie_Act_Ext like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Ubic_Prim like '%".$search["value"]."%' ";
			$Busqueda.=" or Desc_Ubic_Sec like '%".$search["value"]."%' ";
			$Busqueda.=" ) ";
		}
		
		
		$Cerrados_por_mes="";
		if($Id_Estatus_Proceso=="4"){
			if($Medio_de_Envio!=""){
				//2 meses
				$Cerrados_por_mes=" and Fech_Cierre>=CONVERT(DATE,GETDATE()-60) ";
			}else{
				// 3 Meses
				$Cerrados_por_mes=" and Fech_Cierre>=CONVERT(DATE,GETDATE()-90) ";
			}
		
			if($search["value"]!=""){
				$Busqueda.=" where ( ";
				$Busqueda.=" Id_Solicitud like '%".$search["value"]."%' ";
				$Busqueda.=" or Fecha_Cierre like '%".$search["value"]."%' ";
				$Busqueda.=" or A_Especial like '%".$search["value"]."%' ";
				$Busqueda.=" or Desc_Prioridad like '%".$search["value"]."%' ";
				$Busqueda.=" or Nombre_Usuario like '%".$search["value"]."%' ";
				$Busqueda.=" or Gestor like '%".$search["value"]."%' ";
				$Busqueda.=" or Nombre_Seccion like '%".$search["value"]."%' ";
				$Busqueda.=" or Desc_Categoria like '%".$search["value"]."%' ";
				$Busqueda.=" or Desc_Subcategoria like '%".$search["value"]."%' ";
				$Busqueda.=" or Titulo like '%".$search["value"]."%' ";
				$Busqueda.=" or Desc_Motivo_Reporte like '%".$search["value"]."%' ";
				$Busqueda.=" or ComentarioCierre like '%".$search["value"]."%' ";
				$Busqueda.=" or Nom_Area like '%".$search["value"]."%' ";
				//Datos del Activo
				$Busqueda.=" or AF_BC_Ext like '%".$search["value"]."%' ";
				$Busqueda.=" or Nombre_Act_Ext like '%".$search["value"]."%' ";
				$Busqueda.=" or Marca_Act_Ext like '%".$search["value"]."%' ";
				$Busqueda.=" or Modelo_Act_Ext like '%".$search["value"]."%' ";
				$Busqueda.=" or No_Serie_Act_Ext like '%".$search["value"]."%' ";
				$Busqueda.=" or Desc_Ubic_Prim like '%".$search["value"]."%' ";
				$Busqueda.=" or Desc_Ubic_Sec like '%".$search["value"]."%' ";
				$Busqueda.=" or Estatus_final_equipo like '%".$search["value"]."%' ";
				$Busqueda.=" ) ";
			}
		}
		
		//Fin Filtros Busqueda 
		$this->_proveedor->execute("select * from (SELECT 
		ST.AF_BC_Ext, ST.Nombre_Act_Ext, ST.Marca_Act_Ext, ST.Modelo_Act_Ext, ST.No_Serie_Act_Ext, (select top 1 Desc_Est_Equipo from siga_cat_estatus_equipo where siga_cat_estatus_equipo.Id_Est_Equipo=ST.Id_Est_Equipo) as Estatus_final_equipo,
		A.AF_BC,A.Nombre_Activo, A.Marca, A.Modelo, A.NumSerie,UP.Desc_Ubic_Prim,US.Desc_Ubic_Sec,ST.Id_Solicitud,ST.Asist_Especial,ST.Id_Activo, '[Nombre Activo: '+rtrim(ltrim(A.Nombre_Activo))+'] '+'[AF/BC: '+rtrim(ltrim(A.AF_BC))+'] '+'[Ubicaci&oacute;n Primaria: '+rtrim(ltrim(UP.Desc_Ubic_Prim))+'] '+'[Ubicaci&oacute;n Secundaria: '+rtrim(ltrim(US.Desc_Ubic_Sec))+'] '+'[Usuario Responsable: '+rtrim(ltrim(A.Nombre_Completo))+']' as Activo,ST.Estatus_Proceso as Id_Estatus_Proceso, ST.Id_Usuario,concat((select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario),' / ',(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Gestor=U.Id_Usuario)) Nombre_Usuario,CA.Nom_Area,ST.Id_Area,ST.Seccion,ST.Titulo,ST.Id_Categoria,SCMR.Desc_Categoria,SCTS.Desc_Subcategoria,ST.Desc_Motivo_Reporte,ST.Prioridad,ST.Url_archivo,ST.Fech_Inser,CONVERT(VARCHAR(10),ST.Fech_Inser,103) +' '+SUBSTRING(CONVERT(VARCHAR(20), ST.Fech_Inser, 9), 13, 5)+' '+SUBSTRING(CONVERT(VARCHAR(30), ST.Fech_Inser, 9), 25, 2) as Fecha,CONVERT(VARCHAR(10),ST.Fech_Solicitud,103) +' '+SUBSTRING(CONVERT(VARCHAR(20), ST.Fech_Solicitud, 9), 13, 5)+' '+SUBSTRING(CONVERT(VARCHAR(30), ST.Fech_Solicitud, 9), 25, 2) as Fecha_Solicitud, FORMAT(ST.Fech_Seguimiento,'dd/MM/yyyy hh:mm:ss') as Fecha_Seguimiento,FORMAT(ST.Fech_Espera_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Esp_Cierre,FORMAT(ST.Fech_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Cierre,ST.Usr_Inser,ST.Fech_Mod,ST.Usr_Mod,ST.Estatus_Reg
		,(select C.Desc_Seccion from siga_cat_ticket_seccion C where C.Id_Seccion=ST.Seccion) Nombre_Seccion,Id_Gestor, Id_Gestor_Reasignado
		,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Gestor=U.Id_Usuario) Gestor
		,(select P.Desc_Proceso from siga_cat_ticket_proceso P where P.Id_Estatus_Proceso=ST.Estatus_Proceso) Estatus_Proceso, 
		ST.TituloCierre, ST.ComentarioCierre,Usr.Nombre_Usuario as Nom_usr_reasignado
		,ST.Id_Actividad, CASE ST.Asist_Especial when 1 then 'Asistencia Especial' END as A_Especial, CASE ST.Prioridad when 1 then 'Alta' when 2 then 'Media' when 3 then 'Baja' END as Desc_Prioridad,
		isnull((select count(*) from siga_ticket_calificacion C  where C.Id_Solicitud=ST.Id_Solicitud),0) as Num_Calif,MA.Desc_Motivo_Aparente,MR.Desc_Motivo_Real
		FROM siga_solicitud_tickets  ST 
		left join siga_cat_ticket_categoria SCMR on ST.Id_Categoria=SCMR.Id_Categoria 
		left join siga_cat_ticket_subcategoria SCTS on ST.Id_Subcategoria=SCTS.Id_Subcategoria 
		left join siga_catareas CA on ST.Id_Area=CA.Id_Area 
		left join siga_activos A on ST.Id_Activo=A.Id_Activo 
		left join siga_cat_ubic_prim UP on ST.Id_Ubic_Prim=UP.Id_Ubic_Prim 
		left join siga_cat_ubic_sec US on ST.Id_Ubic_Sec=US.Id_Ubic_Sec 
		left join siga_usuarios Usr on ST.Id_Gestor_Reasignado=Usr.Id_Usuario 
		left join siga_cat_motivo_aparente MA on ST.Id_Motivo_Aparente=MA.Id_Motivo_Aparente
		left join siga_cat_motivo_real MR on ST.Id_Motivo_Real=MR.Id_Motivo_Real
		
		
		where ST.Estatus_Reg <> '3' 
		and ".$Id_Usuario.$Id_Gestor.$Seccion.$Area." Id_Solicitud LIKE '%%' "
                .$filtro.$Cerrados_por_mes." ) siga_solicitud_tickets ".$Busqueda.$ordenamiento.$pagina);
		
		
		//Genera la tabla dinamica
		if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
				$Datos_Activo="";
				if($row["AF_BC_Ext"]!=""){
					$Datos_Activo="AF/BC: ".$row["AF_BC_Ext"]."<br>";
					$Datos_Activo.="Nombre: ".$row["Nombre_Act_Ext"]."<br>";
					$Datos_Activo.="Marca: ".$row["Marca_Act_Ext"]."<br>";
					$Datos_Activo.="Modelo: ".$row["Modelo_Act_Ext"]."<br>";
					$Datos_Activo.="Num. Serie: ".$row["No_Serie_Act_Ext"]."<br>";
					$Datos_Activo.="Ubic. Prim: ".$row["Desc_Ubic_Prim"]."<br>";
					$Datos_Activo.="Ubic. Sec: ".$row["Desc_Ubic_Sec"];
				}
				
                $data[] = array("Id_Solicitud" => $row["Id_Solicitud"],
                    "Id_Usuario" => $row["Id_Usuario"],
					"Id_Area" => $row["Id_Area"],
					"Seccion" => $row["Seccion"],
					"Titulo" => $row["Titulo"],
					"Id_Categoria" => $row["Id_Categoria"],
					"Desc_Categoria" => $row["Desc_Categoria"],
					"Desc_Subcategoria"=> $row["Desc_Subcategoria"],
					"Desc_Motivo_Reporte" => $row["Desc_Motivo_Reporte"],
					"Prioridad" => $row["Prioridad"],
					"Desc_Prioridad"=> $row["Desc_Prioridad"],
					"Num_Calif"=> $row["Num_Calif"],
					"Url_archivo" => rtrim(ltrim($row["Url_archivo"])),
					"Fecha" => $row["Fecha"],
					"Nom_Area" => $row["Nom_Area"],
					"Nombre_Usuario" => $row["Nombre_Usuario"],
					"Nombre_Seccion" => $row["Nombre_Seccion"],
					"Id_Gestor" => $row["Id_Gestor"],
					"Id_Gestor_Reasignado"=> $row["Id_Gestor_Reasignado"],
					"Gestor" => $row["Gestor"],
					"Estatus_Proceso" => $row["Estatus_Proceso"],
					"Id_Estatus_Proceso"=> $row["Id_Estatus_Proceso"],
					"TituloCierre"=> $row["TituloCierre"],
					"ComentarioCierre"=> $row["ComentarioCierre"],
					"Activo"=> $row["Activo"],
					"Id_Activo"=>$row["Id_Activo"],
					"Asist_Especial"=>$row["Asist_Especial"],
					"A_Especial"=>$row["A_Especial"],
					"Nom_usr_reasignado"=>$row["Nom_usr_reasignado"],
					"Fecha_Seguimiento"=>$row["Fecha_Seguimiento"],
					"Fecha_Esp_Cierre"=>$row["Fecha_Esp_Cierre"],
					"Fecha_Cierre"=>$row["Fecha_Cierre"],
					"Fecha_Solicitud"=>$row["Fecha_Solicitud"],
					"Desc_Motivo_Aparente"=>$row["Desc_Motivo_Aparente"],
					"Desc_Motivo_Real"=>$row["Desc_Motivo_Real"],
					"Id_Actividad"=>rtrim(ltrim($row["Id_Actividad"])),
					"Desc_Est_Equipo"=>rtrim(ltrim($row["Estatus_final_equipo"])),
					"Datos_Activo"=>$Datos_Activo
				);
            }

			//Se llena el control de categorias
			$this->_proveedor->execute(
				"select Id_Categoria, (select top 1 Desc_Categoria from siga_cat_ticket_categoria SC where siga_solicitud_tickets.Id_Categoria=SC.Id_Categoria) as Desc_Categoria from 
				(
					select distinct Id_Categoria from 
					(		
						select * from (
							SELECT SCMR.Id_Categoria,
							--SCMR.Desc_Categoria,SCTS.Id_Subcategoria, SCTS.Desc_Subcategoria,
							ST.Id_Solicitud, 
							FORMAT(ST.Fech_Inser,'dd/MM/yyyy hh:mm:ss') as Fecha,FORMAT(ST.Fech_Solicitud,'dd/MM/yyyy hh:mm:ss') as Fecha_Solicitud, 
							FORMAT(ST.Fech_Seguimiento,'dd/MM/yyyy hh:mm:ss') as Fecha_Seguimiento,
							FORMAT(ST.Fech_Espera_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Esp_Cierre,FORMAT(ST.Fech_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Cierre,
							CASE ST.Asist_Especial when 1 then 'Asistencia Especial' END as A_Especial,
							Usr.Nombre_Usuario as Nom_usr_reasignado,
							CASE ST.Prioridad when 1 then 'Alta' when 2 then 'Media' when 3 then 'Baja' END as Desc_Prioridad, (select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) Nombre_Usuario
							,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Gestor=U.Id_Usuario) Gestor, (select C.Desc_Seccion from siga_cat_ticket_seccion C where C.Id_Seccion=ST.Seccion) Nombre_Seccion
							,SCMR.Desc_Categoria, SCTS.Desc_Subcategoria, ST.Titulo, ST.Desc_Motivo_Reporte, CA.Nom_Area
							FROM siga_solicitud_tickets  ST 
							left join siga_cat_ticket_categoria SCMR on ST.Id_Categoria=SCMR.Id_Categoria 
							left join siga_cat_ticket_subcategoria SCTS on ST.Id_Subcategoria=SCTS.Id_Subcategoria 
							left join siga_catareas CA on ST.Id_Area=CA.Id_Area 
							left join siga_activos A on ST.Id_Activo=A.Id_Activo 
							left join siga_cat_ubic_prim UP on A.Id_Ubic_Prim=UP.Id_Ubic_Prim 
							left join siga_cat_ubic_sec US on A.Id_Ubic_Sec=US.Id_Ubic_Sec 
							left join siga_usuarios Usr on ST.Id_Gestor_Reasignado=Usr.Id_Usuario 
							left join siga_cat_motivo_aparente MA on ST.Id_Motivo_Aparente=MA.Id_Motivo_Aparente
							left join siga_cat_motivo_real MR on ST.Id_Motivo_Real=MR.Id_Motivo_Real
							
							where ST.Estatus_Reg <> '3' 
							and ".$Id_Usuario.$Id_Gestor.$Seccion.$Area." Id_Solicitud LIKE '%%' "
									.$filtro.$Cerrados_por_mes." 
						
					    ) siga_solicitud_tickets ".$Busqueda."
				    ) siga_solicitud_tickets
			    ) siga_solicitud_tickets"
			);
			if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
				while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
					$data_categoria[] = array(
						"Id_Categoria" => $row["Id_Categoria"],
						"Desc_Categoria" => $row["Desc_Categoria"]
					);
				}
			}
			///Fin se llena el control de categorias


			
			//Se Obtiene el conteo de los tickets
			$this->_proveedor->execute("select COUNT(*) AS total from ( SELECT 
										ST.AF_BC_Ext, ST.Nombre_Act_Ext, ST.Marca_Act_Ext, ST.Modelo_Act_Ext, ST.No_Serie_Act_Ext, UP.Desc_Ubic_Prim,US.Desc_Ubic_Sec, (select top 1 Desc_Est_Equipo from siga_cat_estatus_equipo where siga_cat_estatus_equipo.Id_Est_Equipo=ST.Id_Est_Equipo) as Estatus_final_equipo,
										ST.Id_Solicitud,ST.Id_Usuario,CA.Nom_Area,ST.Id_Area,ST.Seccion,ST.Titulo,ST.Id_Categoria,SCMR.Desc_Categoria,SCTS.Desc_Subcategoria,ST.Desc_Motivo_Reporte,ST.Prioridad,ST.Url_archivo,ST.Fech_Inser,FORMAT(ST.Fech_Inser,'dd/MM/yyyy hh:mm:ss') as Fecha,ST.Usr_Inser,ST.Fech_Mod,ST.Usr_Mod,ST.Estatus_Reg,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) Nombre_Usuario, (select C.Desc_Seccion from siga_cat_ticket_seccion C where C.Id_Seccion=ST.Seccion) Nombre_Seccion 
										,CASE ST.Asist_Especial when 1 then 'Asistencia Especial' END as A_Especial, CASE ST.Prioridad when 1 then 'Alta' when 2 then 'Media' when 3 then 'Baja' END as Desc_Prioridad
										,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Gestor=U.Id_Usuario) Gestor, Usr.Nombre_Usuario as Nom_usr_reasignado
										, FORMAT(ST.Fech_Seguimiento,'dd/MM/yyyy hh:mm:ss') as Fecha_Seguimiento,FORMAT(ST.Fech_Espera_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Esp_Cierre, FORMAT(ST.Fech_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Cierre, ST.ComentarioCierre
										FROM siga_solicitud_tickets  ST 
										left join siga_cat_ticket_categoria SCMR on ST.Id_Categoria=SCMR.Id_Categoria 
										left join siga_cat_ticket_subcategoria SCTS on ST.Id_Subcategoria=SCTS.Id_Subcategoria 
										left join siga_catareas CA on ST.Id_Area=CA.Id_Area 
										left join siga_activos A on ST.Id_Activo=A.Id_Activo 
										left join siga_cat_ubic_prim UP on ST.Id_Ubic_Prim=UP.Id_Ubic_Prim 
										left join siga_cat_ubic_sec US on ST.Id_Ubic_Sec=US.Id_Ubic_Sec 
										left join siga_usuarios Usr on ST.Id_Gestor_Reasignado=Usr.Id_Usuario 
										where ST.Estatus_Reg <> '3' and ".$Id_Usuario.$Id_Gestor.$Seccion.$Area." Id_Solicitud LIKE '%%' ". "".$filtro.$Cerrados_por_mes." ) 
										siga_solicitud_tickets ".$Busqueda);
		
			
			while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
			//Fin se Obtiene el conteo de los tickets
        }
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . ',"Count_Cat":' . count($data_categoria) . ',"data_cat":' . json_encode($data_categoria) . '}';
    }

	
	
	
public function valida_existe_img($url){
	$Respuesta="";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_exec($ch);
	$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($retcode==200 || $retcode==302){
		$Respuesta="si";
	}else{
		$Respuesta="no";
	}
	return $Respuesta;
}	
	
}
?>