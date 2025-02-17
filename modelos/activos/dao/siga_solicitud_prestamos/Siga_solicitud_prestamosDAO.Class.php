<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_solicitud_prestamos/Siga_solicitud_prestamosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_solicitud_prestamosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_solicitud_prestamos($siga_solicitud_prestamosDto,$proveedor=null){

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
$valormaximo=" select CASE when max(Id_Solicitud+1) IS NULL then 1 else (max(Id_Solicitud + 1)) end as IndiceMaximo from siga_solicitud_prestamos ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_solicitud_prestamos on ";
$sql.="INSERT INTO siga_solicitud_prestamos(";
$sql.="Id_Solicitud";
$sql.=",";
if($siga_solicitud_prestamosDto->getEstatus_Proceso()!=""){
$sql.="Estatus_Proceso";
$sql.=",";
}
if($siga_solicitud_prestamosDto->getId_Activo()!=""){
$sql.="Id_Activo";
$sql.=",";
}
$sql.="Id_Usuario";
$sql.=",";
$sql.="Id_Area";
$sql.=",";
if($siga_solicitud_prestamosDto->getId_Medio()!=""){
$sql.="Id_Medio";
$sql.=",";
}
$sql.="Seccion";
$sql.=",";
$sql.="Titulo";
$sql.=",";
if($siga_solicitud_prestamosDto->getId_Det_Actividad()!=""){
	$sql.="Id_Det_Actividad";
$sql.=",";
}
if($siga_solicitud_prestamosDto->getId_Categoria()!=""){
	$sql.="Id_Categoria";
$sql.=",";
}
if($siga_solicitud_prestamosDto->getId_Subcategoria()!=""){
$sql.="Id_Subcategoria";
$sql.=",";
}
if($siga_solicitud_prestamosDto->getId_Gestor()!=""){
$sql.="Id_Gestor";
$sql.=",";
}
$sql.="Desc_Motivo_Reporte";
$sql.=",";
$sql.="Prioridad";
$sql.=",";
$sql.="Url_archivo";
$sql.=",";
$sql.="Fech_Inser";
$sql.=",";
$sql.="Usr_Inser";
$sql.=",";
$sql.="Fech_Mod";
$sql.=",";
$sql.="Usr_Mod";
$sql.=",";
$sql.="Estatus_Reg";
$sql.=",";
$sql.="Accesorios_Cierre";
$sql.=",";
$sql.="ComentarioCierre";
$sql.=",";
$sql.="Fecha_Prestamo";
$sql.=",";
$sql.="Fecha_Devolucion";
$sql.=") VALUES(";
$sql.="'".$Idmaximo."'";
$sql.=",";
if($siga_solicitud_prestamosDto->getEstatus_Proceso()!=""){
$sql.="'".$siga_solicitud_prestamosDto->getEstatus_Proceso()."'";
$sql.=",";
}
if($siga_solicitud_prestamosDto->getId_Activo()!=""){
$sql.="'".$siga_solicitud_prestamosDto->getId_Activo()."'";
$sql.=",";
}
$sql.="'".$siga_solicitud_prestamosDto->getId_Usuario()."'";
$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getId_Area()."'";
$sql.=",";
if($siga_solicitud_prestamosDto->getId_Medio()!=""){
$sql.="'".$siga_solicitud_prestamosDto->getId_Medio()."'";
$sql.=",";
}
$sql.="'".$siga_solicitud_prestamosDto->getSeccion()."'";
$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getTitulo()."'";
$sql.=",";
if($siga_solicitud_prestamosDto->getId_Det_Actividad()!=""){
$sql.="'".$siga_solicitud_prestamosDto->getId_Det_Actividad()."'";
$sql.=",";
}
if($siga_solicitud_prestamosDto->getId_Categoria()!=""){
$sql.="'".$siga_solicitud_prestamosDto->getId_Categoria()."'";
$sql.=",";
}
if($siga_solicitud_prestamosDto->getId_Subcategoria()!=""){
$sql.="'".$siga_solicitud_prestamosDto->getId_Subcategoria()."'";
$sql.=",";
}
if($siga_solicitud_prestamosDto->getId_Gestor()!=""){
$sql.="'".$siga_solicitud_prestamosDto->getId_Gestor()."'";
$sql.=",";
}
$sql.="'".$siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()."'";
$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getPrioridad()."'";
$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getUrl_archivo()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getEstatus_Reg()."'";

$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getAccesorios_Cierre()."'";

$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getComentarioCierre()."'";

$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getFecha_Prestamo()."'";

$sql.=",";
$sql.="'".$siga_solicitud_prestamosDto->getFecha_Devolucion()."'";

$sql.=")";
//
$sql.=" set identity_insert siga_solicitud_prestamos off ";
//
//echo $sql;
//die();
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}

if (!$this->_proveedor->error()) {
$tmp = new Siga_solicitud_prestamosDTO();
$tmp->setId_Solicitud($Idmaximo);
$tmp = $this->selectSiga_solicitud_prestamos($tmp,"",$this->_proveedor);
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
public function updateSiga_solicitud_prestamos($siga_solicitud_prestamosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_solicitud_prestamos SET ";
/*if($siga_solicitud_prestamosDto->getId_Solicitud()!=""){
$sql.="Id_Solicitud='".$siga_solicitud_prestamosDto->getId_Solicitud()."'";
if(($siga_solicitud_prestamosDto->getId_Activo()!="")||($siga_solicitud_prestamosDto->getId_Usuario()!="") ||($siga_solicitud_prestamosDto->getId_Area()!="") || ($siga_solicitud_prestamosDto->getId_Medio()!="")||($siga_solicitud_prestamosDto->getSeccion()!="") ||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}*/

if($siga_solicitud_prestamosDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_solicitud_prestamosDto->getId_Activo()."'";
if(($siga_solicitud_prestamosDto->getId_Usuario()!="") ||($siga_solicitud_prestamosDto->getId_Area()!="") || ($siga_solicitud_prestamosDto->getId_Medio()!="") ||($siga_solicitud_prestamosDto->getSeccion()!="") ||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}

if($siga_solicitud_prestamosDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_solicitud_prestamosDto->getId_Usuario()."'";
if(($siga_solicitud_prestamosDto->getId_Area()!="") || ($siga_solicitud_prestamosDto->getId_Medio()!="")||($siga_solicitud_prestamosDto->getSeccion()!="") ||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_solicitud_prestamosDto->getId_Area()."'";
if(($siga_solicitud_prestamosDto->getId_Medio()!="")||($siga_solicitud_prestamosDto->getSeccion()!="") ||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getId_Medio()!=""){
$sql.="Id_Medio='".$siga_solicitud_prestamosDto->getId_Medio()."'";
if(($siga_solicitud_prestamosDto->getSeccion()!="")||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getSeccion()!=""){
$sql.="Seccion='".$siga_solicitud_prestamosDto->getSeccion()."'";
if(($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getTitulo()!=""){
$sql.="Titulo='".$siga_solicitud_prestamosDto->getTitulo()."'";
if(($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getId_Categoria()!=""){
$sql.="Id_Categoria='".$siga_solicitud_prestamosDto->getId_Categoria()."'";
if(($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!=""){
$sql.="Desc_Motivo_Reporte='".$siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()."'";
if(($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getPrioridad()!=""){
$sql.="Prioridad='".$siga_solicitud_prestamosDto->getPrioridad()."'";
if(($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getUrl_archivo()!=""){
$sql.="Url_archivo='".$siga_solicitud_prestamosDto->getUrl_archivo()."'";
if(($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_solicitud_prestamosDto->getFech_Inser()."'";
if(($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_solicitud_prestamosDto->getUsr_Inser()."'";
if(($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_solicitud_prestamosDto->getFech_Mod()."'";
if(($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_solicitud_prestamosDto->getUsr_Mod()."'";
if(($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_solicitud_prestamosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_solicitud_prestamosDto->getEstatus_Reg()."'";
}

if($siga_solicitud_prestamosDto->getEstatus_Proceso()!=""){
$sql.=",Estatus_Proceso='".$siga_solicitud_prestamosDto->getEstatus_Proceso()."'";
}
/*
if($siga_solicitud_prestamosDto->getId_Categoria()!=""){
$sql.=",Id_Categoria='".$siga_solicitud_prestamosDto->getId_Categoria()."'";
}*/

if($siga_solicitud_prestamosDto->getId_Subcategoria()!=""){
$sql.=",Id_Subcategoria='".$siga_solicitud_prestamosDto->getId_Subcategoria()."'";
}

if($siga_solicitud_prestamosDto->getId_Gestor()!=""){
$sql.=",Id_Gestor='".$siga_solicitud_prestamosDto->getId_Gestor()."'";
}

if($siga_solicitud_prestamosDto->getTituloCierre()!=""){
$sql.=",TituloCierre='".$siga_solicitud_prestamosDto->getTituloCierre()."'";
}

if($siga_solicitud_prestamosDto->getComentarioCierre()!=""){
$sql.=",ComentarioCierre='".$siga_solicitud_prestamosDto->getComentarioCierre()."'";
}

if($siga_solicitud_prestamosDto->getAccesorios_Cierre()!=""){
$sql.=",Accesorios_Cierre='".$siga_solicitud_prestamosDto->getAccesorios_Cierre()."'";
}


if($siga_solicitud_prestamosDto->getFecha_Prestamo()!=""){
$sql.=",Fecha_Prestamo='".$siga_solicitud_prestamosDto->getFecha_Prestamo()."'";
}

if($siga_solicitud_prestamosDto->getFecha_Devolucion()!=""){
$sql.=",Fecha_Devolucion='".$siga_solicitud_prestamosDto->getFecha_Devolucion()."'";
}

if($siga_solicitud_prestamosDto->getComentarioEntrega()!=""){
$sql.=",ComentarioEntrega='".$siga_solicitud_prestamosDto->getComentarioEntrega()."'";
}

if($siga_solicitud_prestamosDto->getFecha_Entrega()!=""){
$sql.=",Fecha_Entrega='".$siga_solicitud_prestamosDto->getFecha_Entrega()."'";
}

$sql.=" WHERE Id_Solicitud='".$siga_solicitud_prestamosDto->getId_Solicitud()."'";
//echo $sql;
$this->_proveedor->execute($sql);



if ($siga_solicitud_prestamosDto->getEstatus_Proceso()==3)
{
	$sql = "update siga_activos set Id_Situacion_Activo=4 where Id_Activo=".$siga_solicitud_prestamosDto->getId_Activo();
	//echo $sql;
	$this->_proveedor->execute($sql);
}

if (!$this->_proveedor->error()) {
$tmp = new Siga_solicitud_prestamosDTO();
$tmp->setId_Solicitud($siga_solicitud_prestamosDto->getId_Solicitud());
$tmp = $this->selectSiga_solicitud_prestamos($tmp,"",$this->_proveedor);


if($siga_solicitud_prestamosDto->getEstatus_Proceso()==4)
{
    $sql = "update siga_activos set Id_Situacion_Activo=1 where Id_Activo=".$tmp[0]->getId_Activo();
	//echo $sql;
	$this->_proveedor->execute($sql);
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
public function deleteSiga_solicitud_prestamos($siga_solicitud_prestamosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_solicitud_prestamos  WHERE Id_Solicitud='".$siga_solicitud_prestamosDto->getId_Solicitud()."'";
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
public function selectSiga_solicitud_prestamos($siga_solicitud_prestamosDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Estatus_Proceso Id_Estatus_Proceso,A.Marca,A.Modelo, A.NumSerie,UP.Desc_Ubic_Prim, US.Desc_Ubic_Sec,Id_Solicitud,S.Id_Activo,Id_Usuario,S.Id_Area,0 Id_Categoria,0 Id_Subcategoria,Seccion,Titulo,Desc_Motivo_Reporte,Prioridad,Url_archivo,S.Fech_Inser,S.Usr_Inser,S.Fech_Mod,S.Usr_Mod,S.Estatus_Reg  
,(select P.Desc_Proceso from siga_cat_prestamo_proceso P where P.Id_Estatus_Proceso=S.Estatus_Proceso) Estatus_Proceso
,(select C.Nom_Area from siga_catareas C where C.Id_Area=S.Id_Area) Area
,'' Nombre_Seccion
,'' Categoria
,'' Subcategoria
,'' Motivo
,(select U.Nombre_Usuario from siga_usuarios U where S.Id_Usuario=U.Id_Usuario) Nombre_Usuario
,(select A.AF_BC+' '+A.Nombre_Activo as AF_BC_Activo from siga_activos A where S.Id_Activo=A.Id_Activo) AF_BC_Activo
,(select U.Nombre_Usuario from siga_usuarios U where S.Id_Gestor=U.Id_Usuario) Gestor,TituloCierre,ComentarioCierre, S.Id_Medio,CM.Desc_Medio,S.Accesorios_Cierre,S.Fecha_Prestamo,S.Fecha_Devolucion,S.Fecha_Entrega,S.ComentarioEntrega  FROM siga_solicitud_prestamos S  left join siga_activos  A on S.Id_Activo=A.Id_Activo left join siga_cat_ubic_prim  UP on A.Id_Ubic_Prim=UP.Id_Ubic_Prim left join siga_cat_ubic_sec  US on A.Id_Ubic_Sec=US.Id_Ubic_Sec left join siga_cat_medios CM on S.Id_Medio=CM.Id_Medio ";
if(($siga_solicitud_prestamosDto->getId_Solicitud()!="") || ($siga_solicitud_prestamosDto->getId_Activo()!="") ||($siga_solicitud_prestamosDto->getId_Usuario()!="") ||($siga_solicitud_prestamosDto->getId_Area()!="") ||($siga_solicitud_prestamosDto->getSeccion()!="") ||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_solicitud_prestamosDto->getId_Solicitud()!=""){
$sql.="Id_Solicitud='".$siga_solicitud_prestamosDto->getId_Solicitud()."'";
if(($siga_solicitud_prestamosDto->getId_Activo()!="") || ($siga_solicitud_prestamosDto->getId_Usuario()!="") ||($siga_solicitud_prestamosDto->getId_Area()!="") ||($siga_solicitud_prestamosDto->getSeccion()!="") ||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_solicitud_prestamosDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_solicitud_prestamosDto->getId_Activo()."'";
if(($siga_solicitud_prestamosDto->getId_Usuario()!="") ||($siga_solicitud_prestamosDto->getId_Area()!="") ||($siga_solicitud_prestamosDto->getSeccion()!="") ||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_solicitud_prestamosDto->getId_Usuario()."'";
if(($siga_solicitud_prestamosDto->getId_Area()!="") ||($siga_solicitud_prestamosDto->getSeccion()!="") ||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_solicitud_prestamosDto->getId_Area()."'";
if(($siga_solicitud_prestamosDto->getSeccion()!="") ||($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getSeccion()!=""){
$sql.="Seccion='".$siga_solicitud_prestamosDto->getSeccion()."'";
if(($siga_solicitud_prestamosDto->getTitulo()!="") ||($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getTitulo()!=""){
$sql.="Titulo='".$siga_solicitud_prestamosDto->getTitulo()."'";
if(($siga_solicitud_prestamosDto->getId_Categoria()!="") ||($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getId_Categoria()!=""){
$sql.="Id_Categoria='".$siga_solicitud_prestamosDto->getId_Categoria()."'";
if(($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!="") ||($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()!=""){
$sql.="Desc_Motivo_Reporte='".$siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()."'";
if(($siga_solicitud_prestamosDto->getPrioridad()!="") ||($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getPrioridad()!=""){
$sql.="Prioridad='".$siga_solicitud_prestamosDto->getPrioridad()."'";
if(($siga_solicitud_prestamosDto->getUrl_archivo()!="") ||($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getUrl_archivo()!=""){
$sql.="Url_archivo='".$siga_solicitud_prestamosDto->getUrl_archivo()."'";
if(($siga_solicitud_prestamosDto->getFech_Inser()!="") ||($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_solicitud_prestamosDto->getFech_Inser()."'";
if(($siga_solicitud_prestamosDto->getUsr_Inser()!="") ||($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_solicitud_prestamosDto->getUsr_Inser()."'";
if(($siga_solicitud_prestamosDto->getFech_Mod()!="") ||($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_solicitud_prestamosDto->getFech_Mod()."'";
if(($siga_solicitud_prestamosDto->getUsr_Mod()!="") ||($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_solicitud_prestamosDto->getUsr_Mod()."'";
if(($siga_solicitud_prestamosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_solicitud_prestamosDto->getEstatus_Reg()!=""){
$sql.="S.Estatus_Reg <>'3'";
}

if($siga_solicitud_prestamosDto->getId_Categoria()!=""){
$sql.=" and Id_Categoria='".$siga_solicitud_prestamosDto->getId_Categoria()."'";
}

if($siga_solicitud_prestamosDto->getId_Subcategoria()!=""){
$sql.=" and Id_Subcategoria='".$siga_solicitud_prestamosDto->getId_Subcategoria()."'";
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
$tmp[$contador] = new Siga_solicitud_prestamosDTO();
$tmp[$contador]->setId_Solicitud($row["Id_Solicitud"]);
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
$tmp[$contador]->setAF_BC_Activo($row["AF_BC_Activo"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setId_Medio($row["Id_Medio"]);
$tmp[$contador]->setDesc_Medio(rtrim(ltrim($row["Desc_Medio"])));
$tmp[$contador]->setSeccion($row["Seccion"]);
$tmp[$contador]->setTitulo($row["Titulo"]);
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
$tmp[$contador]->setId_Estatus_Proceso($row["Id_Estatus_Proceso"]);
$tmp[$contador]->setArea($row["Area"]);
$tmp[$contador]->setNombreSeccion($row["Nombre_Seccion"]);
$tmp[$contador]->setCategoria($row["Categoria"]);
$tmp[$contador]->setSubcategoria($row["Subcategoria"]);
$tmp[$contador]->setMotivo($row["Motivo"]);
$tmp[$contador]->setUsuario($row["Nombre_Usuario"]);
$tmp[$contador]->setId_Categoria($row["Id_Categoria"]);
$tmp[$contador]->setId_Subcategoria($row["Id_Subcategoria"]);
$tmp[$contador]->setGestor($row["Gestor"]);
$tmp[$contador]->setTituloCierre($row["TituloCierre"]);
$tmp[$contador]->setAccesorios_Cierre($row["Accesorios_Cierre"]);
$tmp[$contador]->setComentarioCierre($row["ComentarioCierre"]);
$tmp[$contador]->setFecha_Prestamo($row["Fecha_Prestamo"]);
$tmp[$contador]->setFecha_Devolucion($row["Fecha_Devolucion"]);
$tmp[$contador]->setUbic_Prim($row["Desc_Ubic_Prim"]);
$tmp[$contador]->setUbic_Sec($row["Desc_Ubic_Sec"]);
$tmp[$contador]->setMarca($row["Marca"]);
$tmp[$contador]->setModelo($row["Modelo"]);
$tmp[$contador]->setNo_Serie($row["NumSerie"]);
$tmp[$contador]->setComentarioEntrega($row["ComentarioEntrega"]);
$tmp[$contador]->setFecha_Entrega($row["Fecha_Entrega"]);

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

public function llenarDataTable($draw,$columns,$order,$start,$length,$search,$Id_Estatus_Proceso,$siga_solicitud_prestamosDto,$Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor, $proveedor = null) {
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
				
				if($Id_Estatus_Proceso=="2,3"){
					$ordenamiento=' ORDER BY Id_Estatus_Proceso desc, Id_Solicitud asc ';
				}
			}else{
				$ordenamiento=' ORDER BY Id_Solicitud asc ';
				if($Id_Estatus_Proceso=="2,3"){
					$ordenamiento=' ORDER BY Id_Estatus_Proceso desc, Id_Solicitud asc ';
				}
				
			}
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
		if($siga_solicitud_prestamosDto->getId_Area()!=""){
			
			if($siga_solicitud_prestamosDto->getId_Area()!='5'){
				$Area="  ST.Id_Area=".$siga_solicitud_prestamosDto->getId_Area()." and ";
			}
		}
		
		$Id_Usuario="";
		if($Gestor_Solicitante!="gestor"){
			if($siga_solicitud_prestamosDto->getId_Usuario()!=""){
				$Id_Usuario="  ST.Id_Usuario=".$siga_solicitud_prestamosDto->getId_Usuario()." and ";
			}
		}
		
		$Seccion="";
		if($Id_Seccion!=""){
			$Seccion=" ST.Seccion=".$Id_Seccion." and ";
		}
		
		$Id_Gestor="";
		if($siga_solicitud_prestamosDto->getId_Gestor()!=""){
			$Id_Gestor=" ST.Id_Gestor=".$siga_solicitud_prestamosDto->getId_Gestor()." and ";
		}
		
		$query = "SELECT ST.Id_Solicitud,ST.Id_Activo, '[Nombre Activo: '+rtrim(ltrim(isNull(A.Nombre_Activo,'')))+'] '+'[AF/BC: '+rtrim(ltrim(isNull(A.AF_BC,'')))+'] '+'[Ubicación Primaria: '+rtrim(ltrim(isNull(UP.Desc_Ubic_Prim,'')))+'] '+'[Ubicación Secundaria: '+rtrim(ltrim(isNull(US.Desc_Ubic_Sec,'')))+'] '+'[Usuario Responsable: '+rtrim(ltrim(isNull(A.Nombre_Completo,'')))+']' as Activo,ST.Estatus_Proceso as Id_Estatus_Proceso, ST.Id_Usuario,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) Nombre_Usuario,CA.Nom_Area,ST.Id_Area,ST.Seccion,ST.Titulo,0 Id_Categoria,'' Desc_Categoria,'' Desc_Subcategoria,ST.Desc_Motivo_Reporte,ST.Prioridad,ST.Url_archivo,ST.Fech_Inser,FORMAT(ST.Fech_Inser,'dd/MM/yyyy hh:mm:ss') as Fecha,ST.Usr_Inser,ST.Fech_Mod,ST.Usr_Mod,ST.Estatus_Reg
		,'' Nombre_Seccion,Id_Gestor
		,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Gestor=U.Id_Usuario) Gestor
		,(select P.Desc_Proceso from siga_cat_prestamo_proceso P where 
		P.Id_Estatus_Proceso=ST.Estatus_Proceso) Estatus_Proceso, ST.TituloCierre, ST.Fecha_Prestamo,ST.Fecha_Devolucion,
		ST.ComentarioCierre,ST.Fecha_Entrega,ST.ComentarioEntrega FROM siga_solicitud_prestamos ST left join siga_catareas CA on ST.Id_Area=CA.Id_Area left join siga_activos A on ST.Id_Activo=A.Id_Activo left join siga_cat_ubic_prim UP on A.Id_Ubic_Prim=UP.Id_Ubic_Prim left join siga_cat_ubic_sec US on A.Id_Ubic_Sec=US.Id_Ubic_Sec where ST.Estatus_Reg <> '3' and ".$Id_Usuario.$Id_Gestor.$Seccion.$Area." Id_Solicitud LIKE '%%' "
                . "".$criterios.$filtro;
				
		//echo $query;		
		
        $this->_proveedor->execute($query);
		
		
		
		if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
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
					"Url_archivo" => rtrim(ltrim($row["Url_archivo"])),
					"Fecha" => $row["Fecha"],
					"Nom_Area" => $row["Nom_Area"],
					"Nombre_Usuario" => $row["Nombre_Usuario"],
					"Nombre_Seccion" => $row["Nombre_Seccion"],
					"Id_Gestor" => $row["Id_Gestor"],
					"Gestor" => $row["Gestor"],
					"Estatus_Proceso" => $row["Estatus_Proceso"],
					"Id_Estatus_Proceso"=> $row["Id_Estatus_Proceso"],
					"TituloCierre"=> $row["TituloCierre"],
					"ComentarioCierre"=> $row["ComentarioCierre"],
					"Activo"=> $row["Activo"],
					"Id_Activo"=>$row["Id_Activo"],
					"Fecha_Prestamo" => $row["Fecha_Prestamo"],
					"Fecha_Devolucion" => $row["Fecha_Devolucion"],
					"Fecha_Entrega" => $row["Fecha_Entrega"],
					"ComentarioEntrega"=> $row["ComentarioEntrega"]
				);
            }
			
			$query = "select COUNT(*) AS total from ( SELECT ST.Id_Solicitud FROM siga_solicitud_prestamos ST left join siga_catareas CA on ST.Id_Area=CA.Id_Area left join siga_activos A on ST.Id_Activo=A.Id_Activo left join siga_cat_ubic_prim UP on A.Id_Ubic_Prim=UP.Id_Ubic_Prim left join siga_cat_ubic_sec US on A.Id_Ubic_Sec=US.Id_Ubic_Sec where ST.Estatus_Reg <> '3' and ".$Id_Usuario.$Id_Gestor.$Seccion.$Area." Id_Solicitud LIKE '%%' ". "".$criterios.$filtro." ) siga_solicitud_prestamos";
			//echo $query;
			$this->_proveedor->execute($query);
			
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    }

}
?>