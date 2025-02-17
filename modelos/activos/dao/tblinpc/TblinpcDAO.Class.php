<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/tblinpc/TblinpcDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class TblinpcDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertTblinpc($tblinpcDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO tblinpc(";
if($tblinpcDto->getId_INPC()!=""){
$sql.="Id_INPC";
if(($tblinpcDto->getAnio()!="") ||($tblinpcDto->getMes()!="") ||($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getAnio()!=""){
$sql.="Anio";
if(($tblinpcDto->getMes()!="") ||($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getMes()!=""){
$sql.="Mes";
if(($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getValor()!=""){
$sql.="Valor";
if(($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($tblinpcDto->getId_INPC()!=""){
$sql.="'".$tblinpcDto->getId_INPC()."'";
if(($tblinpcDto->getAnio()!="") ||($tblinpcDto->getMes()!="") ||($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getAnio()!=""){
$sql.="'".$tblinpcDto->getAnio()."'";
if(($tblinpcDto->getMes()!="") ||($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getMes()!=""){
$sql.="'".$tblinpcDto->getMes()."'";
if(($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getValor()!=""){
$sql.="'".$tblinpcDto->getValor()."'";
if(($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getFech_Inser()!=""){
$sql.="'".$tblinpcDto->getFech_Inser()."'";
if(($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getUsr_Inser()!=""){
$sql.="'".$tblinpcDto->getUsr_Inser()."'";
if(($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getFech_Mod()!=""){
$sql.="'".$tblinpcDto->getFech_Mod()."'";
if(($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getUsr_Mod()!=""){
$sql.="'".$tblinpcDto->getUsr_Mod()."'";
if(($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getEstatus_Reg()!=""){
$sql.="'".$tblinpcDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new TblinpcDTO();
$tmp->setId_INPC($this->_proveedor->lastID());
$tmp = $this->selectTblinpc($tmp,"",$this->_proveedor);
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
public function updateTblinpc($tblinpcDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE tblinpc SET ";
if($tblinpcDto->getId_INPC()!=""){
$sql.="Id_INPC='".$tblinpcDto->getId_INPC()."'";
if(($tblinpcDto->getAnio()!="") ||($tblinpcDto->getMes()!="") ||($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getAnio()!=""){
$sql.="Anio='".$tblinpcDto->getAnio()."'";
if(($tblinpcDto->getMes()!="") ||($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getMes()!=""){
$sql.="Mes='".$tblinpcDto->getMes()."'";
if(($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getValor()!=""){
$sql.="Valor='".$tblinpcDto->getValor()."'";
if(($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$tblinpcDto->getFech_Inser()."'";
if(($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$tblinpcDto->getUsr_Inser()."'";
if(($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$tblinpcDto->getFech_Mod()."'";
if(($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$tblinpcDto->getUsr_Mod()."'";
if(($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblinpcDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$tblinpcDto->getEstatus_Reg()."'";
}
$sql.=" WHERE ='".$tblinpcDto->get()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new TblinpcDTO();
$tmp->set($tblinpcDto->get());
$tmp = $this->selectTblinpc($tmp,"",$this->_proveedor);
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
public function deleteTblinpc($tblinpcDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM tblinpc  WHERE ='".$tblinpcDto->get()."'";
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
public function selectTblinpc($tblinpcDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_INPC,Anio,Mes,Valor,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM tblinpc ";
if(($tblinpcDto->getId_INPC()!="") ||($tblinpcDto->getAnio()!="") ||($tblinpcDto->getMes()!="") ||($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($tblinpcDto->getId_INPC()!=""){
$sql.="Id_INPC='".$tblinpcDto->getId_INPC()."'";
if(($tblinpcDto->getAnio()!="") ||($tblinpcDto->getMes()!="") ||($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblinpcDto->getAnio()!=""){
$sql.="Anio='".$tblinpcDto->getAnio()."'";
if(($tblinpcDto->getMes()!="") ||($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblinpcDto->getMes()!=""){
$sql.="Mes='".$tblinpcDto->getMes()."'";
if(($tblinpcDto->getValor()!="") ||($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblinpcDto->getValor()!=""){
$sql.="Valor='".$tblinpcDto->getValor()."'";
if(($tblinpcDto->getFech_Inser()!="") ||($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblinpcDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$tblinpcDto->getFech_Inser()."'";
if(($tblinpcDto->getUsr_Inser()!="") ||($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblinpcDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$tblinpcDto->getUsr_Inser()."'";
if(($tblinpcDto->getFech_Mod()!="") ||($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblinpcDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$tblinpcDto->getFech_Mod()."'";
if(($tblinpcDto->getUsr_Mod()!="") ||($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblinpcDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$tblinpcDto->getUsr_Mod()."'";
if(($tblinpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblinpcDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$tblinpcDto->getEstatus_Reg()."'";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new TblinpcDTO();
$tmp[$contador]->setId_INPC($row["Id_INPC"]);
$tmp[$contador]->setAnio($row["Anio"]);
$tmp[$contador]->setMes($row["Mes"]);
$tmp[$contador]->setValor($row["Valor"]);
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