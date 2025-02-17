<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_ticket_adjuntos/Siga_cat_ticket_adjuntosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_adjuntosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_ticket_adjuntos($siga_cat_ticket_adjuntosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_ticket_adjuntos(";
//$sql.="Id_Adjunto";
//$sql.=",";
$sql.="Id_Chat";
$sql.=",";
$sql.="Url_Adjunto";
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
$sql.=") VALUES(";
//$sql.="'".$siga_cat_ticket_adjuntosDto->getId_Adjunto()."'";
//$sql.=",";
$sql.="'".$siga_cat_ticket_adjuntosDto->getId_Chat()."'";
$sql.=",";
$sql.="'".$siga_cat_ticket_adjuntosDto->getUrl_Adjunto()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_cat_ticket_adjuntosDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_cat_ticket_adjuntosDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_cat_ticket_adjuntosDto->getEstatus_Reg()."'";
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_adjuntosDTO();
$tmp->setId_Adjunto($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_ticket_adjuntos($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_ticket_adjuntos($siga_cat_ticket_adjuntosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_ticket_adjuntos SET ";
if($siga_cat_ticket_adjuntosDto->getId_Adjunto()!=""){
$sql.="Id_Adjunto='".$siga_cat_ticket_adjuntosDto->getId_Adjunto()."'";
if(($siga_cat_ticket_adjuntosDto->getId_Chat()!="") ||($siga_cat_ticket_adjuntosDto->getUrl_Adjunto()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_adjuntosDto->getId_Chat()!=""){
$sql.="Id_Chat='".$siga_cat_ticket_adjuntosDto->getId_Chat()."'";
if(($siga_cat_ticket_adjuntosDto->getUrl_Adjunto()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_adjuntosDto->getUrl_Adjunto()!=""){
$sql.="Url_Adjunto='".$siga_cat_ticket_adjuntosDto->getUrl_Adjunto()."'";
if(($siga_cat_ticket_adjuntosDto->getFech_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_adjuntosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_ticket_adjuntosDto->getFech_Inser()."'";
if(($siga_cat_ticket_adjuntosDto->getUsr_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_adjuntosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_ticket_adjuntosDto->getUsr_Inser()."'";
if(($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_adjuntosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_ticket_adjuntosDto->getFech_Mod()."'";
if(($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_adjuntosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_ticket_adjuntosDto->getUsr_Mod()."'";
if(($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_ticket_adjuntosDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Adjunto='".$siga_cat_ticket_adjuntosDto->getId_Adjunto()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_adjuntosDTO();
$tmp->setId_Adjunto($siga_cat_ticket_adjuntosDto->getId_Adjunto());
$tmp = $this->selectSiga_cat_ticket_adjuntos($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_ticket_adjuntos($siga_cat_ticket_adjuntosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_ticket_adjuntos  WHERE Id_Adjunto='".$siga_cat_ticket_adjuntosDto->getId_Adjunto()."'";
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
public function selectSiga_cat_ticket_adjuntos($siga_cat_ticket_adjuntosDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Adjunto,Id_Chat,Url_Adjunto,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cat_ticket_adjuntos ";
if(($siga_cat_ticket_adjuntosDto->getId_Adjunto()!="") ||($siga_cat_ticket_adjuntosDto->getId_Chat()!="") ||($siga_cat_ticket_adjuntosDto->getUrl_Adjunto()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_ticket_adjuntosDto->getId_Adjunto()!=""){
$sql.="Id_Adjunto='".$siga_cat_ticket_adjuntosDto->getId_Adjunto()."'";
if(($siga_cat_ticket_adjuntosDto->getId_Chat()!="") ||($siga_cat_ticket_adjuntosDto->getUrl_Adjunto()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_adjuntosDto->getId_Chat()!=""){
$sql.="Id_Chat='".$siga_cat_ticket_adjuntosDto->getId_Chat()."'";
if(($siga_cat_ticket_adjuntosDto->getUrl_Adjunto()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_adjuntosDto->getUrl_Adjunto()!=""){
$sql.="Url_Adjunto='".$siga_cat_ticket_adjuntosDto->getUrl_Adjunto()."'";
if(($siga_cat_ticket_adjuntosDto->getFech_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_adjuntosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_ticket_adjuntosDto->getFech_Inser()."'";
if(($siga_cat_ticket_adjuntosDto->getUsr_Inser()!="") ||($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_adjuntosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_ticket_adjuntosDto->getUsr_Inser()."'";
if(($siga_cat_ticket_adjuntosDto->getFech_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_adjuntosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_ticket_adjuntosDto->getFech_Mod()."'";
if(($siga_cat_ticket_adjuntosDto->getUsr_Mod()!="") ||($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_adjuntosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_ticket_adjuntosDto->getUsr_Mod()."'";
if(($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_adjuntosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_ticket_adjuntosDto->getEstatus_Reg()."'";
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
$tmp[$contador] = new Siga_cat_ticket_adjuntosDTO();
$tmp[$contador]->setId_Adjunto($row["Id_Adjunto"]);
$tmp[$contador]->setId_Chat($row["Id_Chat"]);
$tmp[$contador]->setUrl_Adjunto($row["Url_Adjunto"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
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