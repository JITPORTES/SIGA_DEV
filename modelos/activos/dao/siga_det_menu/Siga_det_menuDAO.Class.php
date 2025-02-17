<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_det_menu/Siga_det_menuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_det_menuDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_det_menu($siga_det_menuDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_det_menu(";
//$sql.="Id_Det_Menu";
//$sql.=",";
$sql.="Id_Menu";
$sql.=",";
$sql.="Id_Submenu";
$sql.=",";
$sql.="Id_Usuario";
$sql.=",";
$sql.="Lectura";
$sql.=",";
$sql.="Alta";
$sql.=",";
$sql.="Baja";
$sql.=",";
$sql.="Cambio";
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
//$sql.="'".$siga_det_menuDto->getId_Det_Menu()."'";
//$sql.=",";
$sql.="'".$siga_det_menuDto->getId_Menu()."'";
$sql.=",";
$sql.="'".$siga_det_menuDto->getId_Submenu()."'";
$sql.=",";
$sql.="'".$siga_det_menuDto->getId_Usuario()."'";
$sql.=",";
$sql.="'".$siga_det_menuDto->getLectura()."'";
$sql.=",";
$sql.="'".$siga_det_menuDto->getAlta()."'";
$sql.=",";
$sql.="'".$siga_det_menuDto->getBaja()."'";
$sql.=",";
$sql.="'".$siga_det_menuDto->getCambio()."'";
$sql.=",";
$sql.="".$siga_det_menuDto->getFech_Inser()."";
$sql.=",";
$sql.="'".$siga_det_menuDto->getUsr_Inser()."'";
$sql.=",";
$sql.="'".$siga_det_menuDto->getFech_Mod()."'";
$sql.=",";
$sql.="'".$siga_det_menuDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_det_menuDto->getEstatus_Reg()."'";
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_det_menuDTO();
$tmp->setId_Det_Menu($this->_proveedor->lastID());
$tmp = $this->selectSiga_det_menu($tmp,"",$this->_proveedor);
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
public function updateSiga_det_menu($siga_det_menuDto,$proveedor=null){
$tmp="";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_det_menu SET ";
if($siga_det_menuDto->getId_Det_Menu()!=""){
$sql.="Id_Det_Menu='".$siga_det_menuDto->getId_Det_Menu()."'";
if(($siga_det_menuDto->getId_Menu()!="") ||($siga_det_menuDto->getId_Submenu()!="") ||($siga_det_menuDto->getId_Usuario()!="") ||($siga_det_menuDto->getLectura()!="") ||($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_det_menuDto->getId_Menu()."'";
if(($siga_det_menuDto->getId_Submenu()!="") ||($siga_det_menuDto->getId_Usuario()!="") ||($siga_det_menuDto->getLectura()!="") ||($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getId_Submenu()!=""){
$sql.="Id_Submenu='".$siga_det_menuDto->getId_Submenu()."'";
if(($siga_det_menuDto->getId_Usuario()!="") ||($siga_det_menuDto->getLectura()!="") ||($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_det_menuDto->getId_Usuario()."'";
if(($siga_det_menuDto->getLectura()!="") ||($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getLectura()!=""){
$sql.="Lectura='".$siga_det_menuDto->getLectura()."'";
if(($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getAlta()!=""){
$sql.="Alta='".$siga_det_menuDto->getAlta()."'";
if(($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getBaja()!=""){
$sql.="Baja='".$siga_det_menuDto->getBaja()."'";
if(($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getCambio()!=""){
$sql.="Cambio='".$siga_det_menuDto->getCambio()."'";
if(($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_det_menuDto->getFech_Inser()."'";
if(($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_det_menuDto->getUsr_Inser()."'";
if(($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_det_menuDto->getFech_Mod()."'";
if(($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_det_menuDto->getUsr_Mod()."'";
if(($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_menuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_det_menuDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Det_Menu='".$siga_det_menuDto->getId_Det_Menu()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_det_menuDTO();
$tmp->setId_Det_Menu($siga_det_menuDto->getId_Det_Menu());
$tmp = $this->selectSiga_det_menu($tmp,"",$this->_proveedor);
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
public function deleteSiga_det_menu($siga_det_menuDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_det_menu  WHERE Id_Det_Menu='".$siga_det_menuDto->getId_Det_Menu()."'";
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
public function selectSiga_det_menu($siga_det_menuDto,$orden="",$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Det_Menu,Id_Menu,Id_Submenu,Id_Usuario,Lectura,Alta,Baja,Cambio,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_det_menu ";
if(($siga_det_menuDto->getId_Det_Menu()!="") ||($siga_det_menuDto->getId_Menu()!="") ||($siga_det_menuDto->getId_Submenu()!="") ||($siga_det_menuDto->getId_Usuario()!="") ||($siga_det_menuDto->getLectura()!="") ||($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_det_menuDto->getId_Det_Menu()!=""){
$sql.="Id_Det_Menu='".$siga_det_menuDto->getId_Det_Menu()."'";
if(($siga_det_menuDto->getId_Menu()!="") ||($siga_det_menuDto->getId_Submenu()!="") ||($siga_det_menuDto->getId_Usuario()!="") ||($siga_det_menuDto->getLectura()!="") ||($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_det_menuDto->getId_Menu()."'";
if(($siga_det_menuDto->getId_Submenu()!="") ||($siga_det_menuDto->getId_Usuario()!="") ||($siga_det_menuDto->getLectura()!="") ||($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getId_Submenu()!=""){
$sql.="Id_Submenu='".$siga_det_menuDto->getId_Submenu()."'";
if(($siga_det_menuDto->getId_Usuario()!="") ||($siga_det_menuDto->getLectura()!="") ||($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_det_menuDto->getId_Usuario()."'";
if(($siga_det_menuDto->getLectura()!="") ||($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getLectura()!=""){
$sql.="Lectura='".$siga_det_menuDto->getLectura()."'";
if(($siga_det_menuDto->getAlta()!="") ||($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getAlta()!=""){
$sql.="Alta='".$siga_det_menuDto->getAlta()."'";
if(($siga_det_menuDto->getBaja()!="") ||($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getBaja()!=""){
$sql.="Baja='".$siga_det_menuDto->getBaja()."'";
if(($siga_det_menuDto->getCambio()!="") ||($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getCambio()!=""){
$sql.="Cambio='".$siga_det_menuDto->getCambio()."'";
if(($siga_det_menuDto->getFech_Inser()!="") ||($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_det_menuDto->getFech_Inser()."'";
if(($siga_det_menuDto->getUsr_Inser()!="") ||($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_det_menuDto->getUsr_Inser()."'";
if(($siga_det_menuDto->getFech_Mod()!="") ||($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_det_menuDto->getFech_Mod()."'";
if(($siga_det_menuDto->getUsr_Mod()!="") ||($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_det_menuDto->getUsr_Mod()."'";
if(($siga_det_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_menuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_det_menuDto->getEstatus_Reg()."' and Estatus_Reg <>'3'";
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
$tmp[$contador] = new Siga_det_menuDTO();
$tmp[$contador]->setId_Det_Menu($row["Id_Det_Menu"]);
$tmp[$contador]->setId_Menu($row["Id_Menu"]);
$tmp[$contador]->setId_Submenu($row["Id_Submenu"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setLectura($row["Lectura"]);
$tmp[$contador]->setAlta($row["Alta"]);
$tmp[$contador]->setBaja($row["Baja"]);
$tmp[$contador]->setCambio($row["Cambio"]);
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