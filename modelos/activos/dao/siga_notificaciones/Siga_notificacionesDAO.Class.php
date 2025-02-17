<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_notificaciones/Siga_notificacionesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_notificacionesDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_notificaciones($siga_notificacionesDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Notificacion+1) IS NULL then 1 else (max(Id_Notificacion + 1)) end as IndiceMaximo from siga_notificaciones ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_notificaciones on ";
$sql.="INSERT INTO siga_notificaciones(";
$sql.="Id_Notificacion";
$sql.=",";
$sql.="Id_Usuario_Envia";
$sql.=",";
$sql.="Id_Usuario_Recibe";
$sql.=",";
$sql.="Mensaje_Largo";
$sql.=",";
$sql.="Mensaje_Corto";
$sql.=",";
$sql.="Estatus_Leido";
$sql.=",";
$sql.="Estatus_Eliminado";
$sql.=",";
$sql.="Url_Archivho_Enviado";
$sql.=",";
$sql.="Id_Aplicacion";
$sql.=",";
$sql.="Id_Area";
$sql.=",";
$sql.="Id_Menu";
$sql.=",";
$sql.="Id_Submenu";
$sql.=",";
$sql.="Fecha_Envio";
$sql.=") VALUES(";
$sql.="'".$Idmaximo."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getId_Usuario_Envia()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getId_Usuario_Recibe()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getMensaje_Largo()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getMensaje_Corto()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getEstatus_Leido()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getEstatus_Eliminado()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getUrl_Archivho_Enviado()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getId_Aplicacion()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getId_Area()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getId_Menu()."'";
$sql.=",";
$sql.="'".$siga_notificacionesDto->getId_Submenu()."'";
$sql.=",";
$sql.="getdate()";
$sql.=")";
//
$sql.=" set identity_insert siga_notificaciones off ";
//
if($Idmaximo!="")
{
	$this->_proveedor->execute($sql);
}

if (!$this->_proveedor->error()) {
$tmp = new Siga_notificacionesDTO();
$tmp->setId_Notificacion($this->_proveedor->lastID());
$tmp = $this->selectSiga_notificaciones($tmp,"",$this->_proveedor);
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
public function updateSiga_notificaciones($siga_notificacionesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_notificaciones SET ";
if($siga_notificacionesDto->getId_Usuario_Envia()!=""){
$sql.="Id_Usuario_Envia='".$siga_notificacionesDto->getId_Usuario_Envia()."'";
if(($siga_notificacionesDto->getId_Usuario_Recibe()!="") ||($siga_notificacionesDto->getMensaje_Largo()!="") ||($siga_notificacionesDto->getMensaje_Corto()!="") ||($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getId_Usuario_Recibe()!=""){
$sql.="Id_Usuario_Recibe='".$siga_notificacionesDto->getId_Usuario_Recibe()."'";
if(($siga_notificacionesDto->getMensaje_Largo()!="") ||($siga_notificacionesDto->getMensaje_Corto()!="") ||($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getMensaje_Largo()!=""){
$sql.="Mensaje_Largo='".$siga_notificacionesDto->getMensaje_Largo()."'";
if(($siga_notificacionesDto->getMensaje_Corto()!="") ||($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getMensaje_Corto()!=""){
$sql.="Mensaje_Corto='".$siga_notificacionesDto->getMensaje_Corto()."'";
if(($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getEstatus_Leido()!=""){
$sql.="Estatus_Leido='".$siga_notificacionesDto->getEstatus_Leido()."'";
if(($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getEstatus_Eliminado()!=""){
$sql.="Estatus_Eliminado='".$siga_notificacionesDto->getEstatus_Eliminado()."'";
if(($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getUrl_Archivho_Enviado()!=""){
$sql.="Url_Archivho_Enviado='".$siga_notificacionesDto->getUrl_Archivho_Enviado()."'";
if(($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getId_Aplicacion()!=""){
$sql.="Id_Aplicacion='".$siga_notificacionesDto->getId_Aplicacion()."'";
if(($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_notificacionesDto->getId_Area()."'";
if(($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_notificacionesDto->getId_Menu()."'";
if(($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getId_Submenu()!=""){
$sql.="Id_Submenu='".$siga_notificacionesDto->getId_Submenu()."'";
if(($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=",";
}
}
if($siga_notificacionesDto->getFecha_Envio()!=""){
$sql.="Fecha_Envio='".$siga_notificacionesDto->getFecha_Envio()."'";
}
$sql.=" WHERE Id_Notificacion='".$siga_notificacionesDto->getId_Notificacion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_notificacionesDTO();
$tmp->setId_Notificacion($siga_notificacionesDto->getId_Notificacion());
$tmp = $this->selectSiga_notificaciones($tmp,"",$this->_proveedor);
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
public function deleteSiga_notificaciones($siga_notificacionesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_notificaciones  WHERE Id_Notificacion='".$siga_notificacionesDto->getId_Notificacion()."'";
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
public function selectSiga_notificaciones($siga_notificacionesDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Notificacion,Id_Usuario_Envia,Id_Usuario_Recibe,Mensaje_Largo,Mensaje_Corto,Estatus_Leido,Estatus_Eliminado,Url_Archivho_Enviado,Id_Aplicacion,Id_Area,Id_Menu,Id_Submenu,Fecha_Envio FROM siga_notificaciones ";
if(($siga_notificacionesDto->getId_Notificacion()!="") ||($siga_notificacionesDto->getId_Usuario_Envia()!="") ||($siga_notificacionesDto->getId_Usuario_Recibe()!="") ||($siga_notificacionesDto->getMensaje_Largo()!="") ||($siga_notificacionesDto->getMensaje_Corto()!="") ||($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" WHERE ";
}
if($siga_notificacionesDto->getId_Notificacion()!=""){
$sql.="Id_Notificacion='".$siga_notificacionesDto->getId_Notificacion()."'";
if(($siga_notificacionesDto->getId_Usuario_Envia()!="") ||($siga_notificacionesDto->getId_Usuario_Recibe()!="") ||($siga_notificacionesDto->getMensaje_Largo()!="") ||($siga_notificacionesDto->getMensaje_Corto()!="") ||($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getId_Usuario_Envia()!=""){
$sql.="Id_Usuario_Envia='".$siga_notificacionesDto->getId_Usuario_Envia()."'";
if(($siga_notificacionesDto->getId_Usuario_Recibe()!="") ||($siga_notificacionesDto->getMensaje_Largo()!="") ||($siga_notificacionesDto->getMensaje_Corto()!="") ||($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getId_Usuario_Recibe()!=""){
$sql.="Id_Usuario_Recibe='".$siga_notificacionesDto->getId_Usuario_Recibe()."'";
if(($siga_notificacionesDto->getMensaje_Largo()!="") ||($siga_notificacionesDto->getMensaje_Corto()!="") ||($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getMensaje_Largo()!=""){
$sql.="Mensaje_Largo='".$siga_notificacionesDto->getMensaje_Largo()."'";
if(($siga_notificacionesDto->getMensaje_Corto()!="") ||($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getMensaje_Corto()!=""){
$sql.="Mensaje_Corto='".$siga_notificacionesDto->getMensaje_Corto()."'";
if(($siga_notificacionesDto->getEstatus_Leido()!="") ||($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getEstatus_Leido()!=""){
$sql.="Estatus_Leido='".$siga_notificacionesDto->getEstatus_Leido()."'";
if(($siga_notificacionesDto->getEstatus_Eliminado()!="") ||($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getEstatus_Eliminado()!=""){
$sql.="Estatus_Eliminado='".$siga_notificacionesDto->getEstatus_Eliminado()."'";
if(($siga_notificacionesDto->getUrl_Archivho_Enviado()!="") ||($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getUrl_Archivho_Enviado()!=""){
$sql.="Url_Archivho_Enviado='".$siga_notificacionesDto->getUrl_Archivho_Enviado()."'";
if(($siga_notificacionesDto->getId_Aplicacion()!="") ||($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getId_Aplicacion()!=""){
$sql.="Id_Aplicacion='".$siga_notificacionesDto->getId_Aplicacion()."'";
if(($siga_notificacionesDto->getId_Area()!="") ||($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_notificacionesDto->getId_Area()."'";
if(($siga_notificacionesDto->getId_Menu()!="") ||($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_notificacionesDto->getId_Menu()."'";
if(($siga_notificacionesDto->getId_Submenu()!="") ||($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getId_Submenu()!=""){
$sql.="Id_Submenu='".$siga_notificacionesDto->getId_Submenu()."'";
if(($siga_notificacionesDto->getFecha_Envio()!="") ){
$sql.=" AND ";
}
}
if($siga_notificacionesDto->getFecha_Envio()!=""){
$sql.="Fecha_Envio='".$siga_notificacionesDto->getFecha_Envio()."'";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
$tmp = [];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_notificacionesDTO();
$tmp[$contador]->setId_Notificacion($row["Id_Notificacion"]);
$tmp[$contador]->setId_Usuario_Envia($row["Id_Usuario_Envia"]);
$tmp[$contador]->setId_Usuario_Recibe($row["Id_Usuario_Recibe"]);
$tmp[$contador]->setMensaje_Largo($row["Mensaje_Largo"]);
$tmp[$contador]->setMensaje_Corto($row["Mensaje_Corto"]);
$tmp[$contador]->setEstatus_Leido($row["Estatus_Leido"]);
$tmp[$contador]->setEstatus_Eliminado($row["Estatus_Eliminado"]);
$tmp[$contador]->setUrl_Archivho_Enviado($row["Url_Archivho_Enviado"]);
$tmp[$contador]->setId_Aplicacion($row["Id_Aplicacion"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setId_Menu($row["Id_Menu"]);
$tmp[$contador]->setId_Submenu($row["Id_Submenu"]);
$tmp[$contador]->setFecha_Envio($row["Fecha_Envio"]);
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
}
?>