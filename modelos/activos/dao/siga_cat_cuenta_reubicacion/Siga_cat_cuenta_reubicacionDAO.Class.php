<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_cuenta_reubicacion/Siga_cat_cuenta_reubicacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_cuenta_reubicacionDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_cuenta_reubicacion($siga_cat_cuenta_reubicacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_cuenta_reubicacion(";
if($siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()!=""){
$sql.="Id_Cuenta_reubicacion";
if(($siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()!=""){
$sql.="Desc_Cuenta_reubicacion";
if(($siga_cat_cuenta_reubicacionDto->getFech_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()!=""){
$sql.="'".$siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()."'";
if(($siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()!=""){
$sql.="'".$siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()."'";
if(($siga_cat_cuenta_reubicacionDto->getFech_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getFech_Inser()!=""){
$sql.="'".$siga_cat_cuenta_reubicacionDto->getFech_Inser()."'";
if(($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!=""){
$sql.="'".$siga_cat_cuenta_reubicacionDto->getUsr_Inser()."'";
if(($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getFech_Mod()!=""){
$sql.="'".$siga_cat_cuenta_reubicacionDto->getFech_Mod()."'";
if(($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!=""){
$sql.="'".$siga_cat_cuenta_reubicacionDto->getUsr_Mod()."'";
if(($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cat_cuenta_reubicacionDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_cuenta_reubicacionDTO();
$tmp->setId_Cuenta_reubicacion($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_cuenta_reubicacion($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_cuenta_reubicacion($siga_cat_cuenta_reubicacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_cuenta_reubicacion SET ";
if($siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()!=""){
$sql.="Id_Cuenta_reubicacion='".$siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()."'";
if(($siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()!=""){
$sql.="Desc_Cuenta_reubicacion='".$siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()."'";
if(($siga_cat_cuenta_reubicacionDto->getFech_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_cuenta_reubicacionDto->getFech_Inser()."'";
if(($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_cuenta_reubicacionDto->getUsr_Inser()."'";
if(($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_cuenta_reubicacionDto->getFech_Mod()."'";
if(($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_cuenta_reubicacionDto->getUsr_Mod()."'";
if(($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_cuenta_reubicacionDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Cuenta_reubicacion='".$siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_cuenta_reubicacionDTO();
$tmp->setId_Cuenta_reubicacion($siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion());
$tmp = $this->selectSiga_cat_cuenta_reubicacion($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_cuenta_reubicacion($siga_cat_cuenta_reubicacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_cuenta_reubicacion  WHERE Id_Cuenta_reubicacion='".$siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()."'";
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
public function selectSiga_cat_cuenta_reubicacion($siga_cat_cuenta_reubicacionDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Cuenta_reubicacion,Desc_Cuenta_reubicacion,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cat_cuenta_reubicacion ";
if(($siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()!="") ||($siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()!=""){
$sql.="Id_Cuenta_reubicacion='".$siga_cat_cuenta_reubicacionDto->getId_Cuenta_reubicacion()."'";
if(($siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()!=""){
$sql.="Desc_Cuenta_reubicacion='".$siga_cat_cuenta_reubicacionDto->getDesc_Cuenta_reubicacion()."'";
if(($siga_cat_cuenta_reubicacionDto->getFech_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_cuenta_reubicacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_cuenta_reubicacionDto->getFech_Inser()."'";
if(($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!="") ||($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_cuenta_reubicacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_cuenta_reubicacionDto->getUsr_Inser()."'";
if(($siga_cat_cuenta_reubicacionDto->getFech_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_cuenta_reubicacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_cuenta_reubicacionDto->getFech_Mod()."'";
if(($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!="") ||($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_cuenta_reubicacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_cuenta_reubicacionDto->getUsr_Mod()."'";
if(($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_cuenta_reubicacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_cuenta_reubicacionDto->getEstatus_Reg()."'";
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
$tmp[$contador] = new Siga_cat_cuenta_reubicacionDTO();
$tmp[$contador]->setId_Cuenta_reubicacion($row["Id_Cuenta_reubicacion"]);
$tmp[$contador]->setDesc_Cuenta_reubicacion($row["Desc_Cuenta_reubicacion"]);
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