<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_correos/Siga_correosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_correosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_correos($siga_correosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_correos(";
if($siga_correosDto->getCadena_Mail()!=""){
$sql.="Cadena_Mail";
if(($siga_correosDto->getCadena_Mail_Copia()!="") ||($siga_correosDto->getCadena_Mail_Copia_Oculta()!="") ||($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Mail_Copia()!=""){
$sql.="Cadena_Mail_Copia";
if(($siga_correosDto->getCadena_Mail_Copia_Oculta()!="") ||($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Mail_Copia_Oculta()!=""){
$sql.="Cadena_Mail_Copia_Oculta";
if(($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Archivos()!=""){
$sql.="Cadena_Archivos";
if(($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getSubject()!=""){
$sql.="Subject";
if(($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getMensaje()!=""){
$sql.="Mensaje";
if(($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCorreo_Envio()!=""){
$sql.="Correo_Envio";
if(($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getPass_Correo_Envio()!=""){
$sql.="Pass_Correo_Envio";
if(($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Archivos_Nombre()!=""){
$sql.="Cadena_Archivos_Nombre";
}
$sql.=") VALUES(";
if($siga_correosDto->getCadena_Mail()!=""){
$sql.="'".$siga_correosDto->getCadena_Mail()."'";
if(($siga_correosDto->getCadena_Mail_Copia()!="") ||($siga_correosDto->getCadena_Mail_Copia_Oculta()!="") ||($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Mail_Copia()!=""){
$sql.="'".$siga_correosDto->getCadena_Mail_Copia()."'";
if(($siga_correosDto->getCadena_Mail_Copia_Oculta()!="") ||($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Mail_Copia_Oculta()!=""){
$sql.="'".$siga_correosDto->getCadena_Mail_Copia_Oculta()."'";
if(($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Archivos()!=""){
$sql.="'".$siga_correosDto->getCadena_Archivos()."'";
if(($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getSubject()!=""){
$sql.="'".$siga_correosDto->getSubject()."'";
if(($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getMensaje()!=""){
$sql.="'".$siga_correosDto->getMensaje()."'";
if(($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCorreo_Envio()!=""){
$sql.="'".$siga_correosDto->getCorreo_Envio()."'";
if(($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getPass_Correo_Envio()!=""){
$sql.="'".$siga_correosDto->getPass_Correo_Envio()."'";
if(($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Archivos_Nombre()!=""){
$sql.="'".$siga_correosDto->getCadena_Archivos_Nombre()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_correosDTO();
$tmp->setCadena_Mail($this->_proveedor->lastID());
$tmp = $this->selectSiga_correos($tmp,"",$this->_proveedor);
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
public function updateSiga_correos($siga_correosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_correos SET ";
if($siga_correosDto->getCadena_Mail()!=""){
$sql.="Cadena_Mail='".$siga_correosDto->getCadena_Mail()."'";
if(($siga_correosDto->getCadena_Mail_Copia()!="") ||($siga_correosDto->getCadena_Mail_Copia_Oculta()!="") ||($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Mail_Copia()!=""){
$sql.="Cadena_Mail_Copia='".$siga_correosDto->getCadena_Mail_Copia()."'";
if(($siga_correosDto->getCadena_Mail_Copia_Oculta()!="") ||($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Mail_Copia_Oculta()!=""){
$sql.="Cadena_Mail_Copia_Oculta='".$siga_correosDto->getCadena_Mail_Copia_Oculta()."'";
if(($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Archivos()!=""){
$sql.="Cadena_Archivos='".$siga_correosDto->getCadena_Archivos()."'";
if(($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getSubject()!=""){
$sql.="Subject='".$siga_correosDto->getSubject()."'";
if(($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getMensaje()!=""){
$sql.="Mensaje='".$siga_correosDto->getMensaje()."'";
if(($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCorreo_Envio()!=""){
$sql.="Correo_Envio='".$siga_correosDto->getCorreo_Envio()."'";
if(($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getPass_Correo_Envio()!=""){
$sql.="Pass_Correo_Envio='".$siga_correosDto->getPass_Correo_Envio()."'";
if(($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=",";
}
}
if($siga_correosDto->getCadena_Archivos_Nombre()!=""){
$sql.="Cadena_Archivos_Nombre='".$siga_correosDto->getCadena_Archivos_Nombre()."'";
}
$sql.=" WHERE Cadena_Mail='".$siga_correosDto->getCadena_Mail()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_correosDTO();
$tmp->setCadena_Mail($siga_correosDto->getCadena_Mail());
$tmp = $this->selectSiga_correos($tmp,"",$this->_proveedor);
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
public function deleteSiga_correos($siga_correosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_correos  WHERE Cadena_Mail='".$siga_correosDto->getCadena_Mail()."'";
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
public function selectSiga_correos($siga_correosDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Cadena_Mail,Cadena_Mail_Copia,Cadena_Mail_Copia_Oculta,Cadena_Archivos,Subject,Mensaje,Correo_Envio,Pass_Correo_Envio,Cadena_Archivos_Nombre FROM siga_correos ";
if(($siga_correosDto->getCadena_Mail()!="") ||($siga_correosDto->getCadena_Mail_Copia()!="") ||($siga_correosDto->getCadena_Mail_Copia_Oculta()!="") ||($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=" WHERE ";
}
if($siga_correosDto->getCadena_Mail()!=""){
$sql.="Cadena_Mail='".$siga_correosDto->getCadena_Mail()."'";
if(($siga_correosDto->getCadena_Mail_Copia()!="") ||($siga_correosDto->getCadena_Mail_Copia_Oculta()!="") ||($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=" AND ";
}
}
if($siga_correosDto->getCadena_Mail_Copia()!=""){
$sql.="Cadena_Mail_Copia='".$siga_correosDto->getCadena_Mail_Copia()."'";
if(($siga_correosDto->getCadena_Mail_Copia_Oculta()!="") ||($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=" AND ";
}
}
if($siga_correosDto->getCadena_Mail_Copia_Oculta()!=""){
$sql.="Cadena_Mail_Copia_Oculta='".$siga_correosDto->getCadena_Mail_Copia_Oculta()."'";
if(($siga_correosDto->getCadena_Archivos()!="") ||($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=" AND ";
}
}
if($siga_correosDto->getCadena_Archivos()!=""){
$sql.="Cadena_Archivos='".$siga_correosDto->getCadena_Archivos()."'";
if(($siga_correosDto->getSubject()!="") ||($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=" AND ";
}
}
if($siga_correosDto->getSubject()!=""){
$sql.="Subject='".$siga_correosDto->getSubject()."'";
if(($siga_correosDto->getMensaje()!="") ||($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=" AND ";
}
}
if($siga_correosDto->getMensaje()!=""){
$sql.="Mensaje='".$siga_correosDto->getMensaje()."'";
if(($siga_correosDto->getCorreo_Envio()!="") ||($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=" AND ";
}
}
if($siga_correosDto->getCorreo_Envio()!=""){
$sql.="Correo_Envio='".$siga_correosDto->getCorreo_Envio()."'";
if(($siga_correosDto->getPass_Correo_Envio()!="") ||($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=" AND ";
}
}
if($siga_correosDto->getPass_Correo_Envio()!=""){
$sql.="Pass_Correo_Envio='".$siga_correosDto->getPass_Correo_Envio()."'";
if(($siga_correosDto->getCadena_Archivos_Nombre()!="") ){
$sql.=" AND ";
}
}
if($siga_correosDto->getCadena_Archivos_Nombre()!=""){
$sql.="Cadena_Archivos_Nombre='".$siga_correosDto->getCadena_Archivos_Nombre()."'";
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
$tmp[$contador] = new Siga_correosDTO();
$tmp[$contador]->setCadena_Mail($row["Cadena_Mail"]);
$tmp[$contador]->setCadena_Mail_Copia($row["Cadena_Mail_Copia"]);
$tmp[$contador]->setCadena_Mail_Copia_Oculta($row["Cadena_Mail_Copia_Oculta"]);
$tmp[$contador]->setCadena_Archivos($row["Cadena_Archivos"]);
$tmp[$contador]->setSubject($row["Subject"]);
$tmp[$contador]->setMensaje($row["Mensaje"]);
$tmp[$contador]->setCorreo_Envio($row["Correo_Envio"]);
$tmp[$contador]->setPass_Correo_Envio($row["Pass_Correo_Envio"]);
$tmp[$contador]->setCadena_Archivos_Nombre($row["Cadena_Archivos_Nombre"]);
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