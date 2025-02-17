<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_det_cargos/Siga_det_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_det_cargosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_det_cargos($siga_det_cargosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_det_cargos(";
//$sql.="Id_Det_Cargo";
//$sql.=",";
$sql.="Id_Menu";
$sql.=",";
$sql.="Id_Submenu";
$sql.=",";
$sql.="Id_Cargo";
$sql.=",";
$sql.="Id_Aplicacion";
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
//$sql.="'".$siga_det_cargosDto->getId_Det_Cargo()."'";
//$sql.=",";
$sql.="'".$siga_det_cargosDto->getId_Menu()."'";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getId_Submenu()."'";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getId_Cargo()."'";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getId_Aplicacion()."'";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getLectura()."'";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getAlta()."'";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getBaja()."'";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getCambio()."'";
$sql.=",";
$sql.="convert(datetime, ".$siga_det_cargosDto->getFech_Inser().", 21)";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getUsr_Inser()."'";
$sql.=",";
$sql.="convert(datetime, '".$siga_det_cargosDto->getFech_Mod()."', 21)";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_det_cargosDto->getEstatus_Reg()."'";
$sql.=")";
//echo $sql;
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_det_cargosDTO();
$tmp->setId_Det_Cargo($this->_proveedor->lastID());
$tmp = $this->selectSiga_det_cargos($tmp,"",$this->_proveedor);
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
public function updateSiga_det_cargos($siga_det_cargosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_det_cargos SET ";
//if($siga_det_cargosDto->getId_Det_Cargo()!=""){
//$sql.="Id_Det_Cargo='".$siga_det_cargosDto->getId_Det_Cargo()."'";
//if(($siga_det_cargosDto->getId_Menu()!="") ||($siga_det_cargosDto->getId_Submenu()!="") ||($siga_det_cargosDto->getId_Cargo()!="") ||($siga_det_cargosDto->getId_Aplicacion()!="") ||($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_det_cargosDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_det_cargosDto->getId_Menu()."'";
if(($siga_det_cargosDto->getId_Submenu()!="") ||($siga_det_cargosDto->getId_Cargo()!="") ||($siga_det_cargosDto->getId_Aplicacion()!="") ||($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getId_Submenu()!=""){
$sql.="Id_Submenu='".$siga_det_cargosDto->getId_Submenu()."'";
if(($siga_det_cargosDto->getId_Cargo()!="") ||($siga_det_cargosDto->getId_Aplicacion()!="") ||($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getId_Cargo()!=""){
$sql.="Id_Cargo='".$siga_det_cargosDto->getId_Cargo()."'";
if(($siga_det_cargosDto->getId_Aplicacion()!="") ||($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getId_Aplicacion()!=""){
$sql.="Id_Aplicacion='".$siga_det_cargosDto->getId_Aplicacion()."'";
if(($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getLectura()!=""){
$sql.="Lectura='".$siga_det_cargosDto->getLectura()."'";
if(($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getAlta()!=""){
$sql.="Alta='".$siga_det_cargosDto->getAlta()."'";
if(($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getBaja()!=""){
$sql.="Baja='".$siga_det_cargosDto->getBaja()."'";
if(($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getCambio()!=""){
$sql.="Cambio='".$siga_det_cargosDto->getCambio()."'";
if(($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_det_cargosDto->getFech_Inser()."'";
if(($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_det_cargosDto->getUsr_Inser()."'";
if(($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_det_cargosDto->getFech_Mod()."";
if(($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_det_cargosDto->getUsr_Mod()."'";
if(($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_det_cargosDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Det_Cargo='".$siga_det_cargosDto->getId_Det_Cargo()."'";

$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_det_cargosDTO();
$tmp->setId_Det_Cargo($siga_det_cargosDto->getId_Det_Cargo());
$tmp = $this->selectSiga_det_cargos($tmp,"",$this->_proveedor);
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
public function eliminacionlogica($siga_det_cargosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_det_cargos SET ";
if($siga_det_cargosDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_det_cargosDto->getFech_Mod()."";
if(($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_det_cargosDto->getUsr_Mod()."'";
if(($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_cargosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_det_cargosDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Cargo='".$siga_det_cargosDto->getId_Cargo()."'";

$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_det_cargosDTO();
$tmp->setId_Det_Cargo($siga_det_cargosDto->getId_Det_Cargo());
$tmp = $this->selectSiga_det_cargos($tmp,"",$this->_proveedor);
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


public function deleteSiga_det_cargos($siga_det_cargosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_det_cargos  WHERE Id_Cargo='".$siga_det_cargosDto->getId_Cargo()."'";
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
public function selectSiga_det_cargos($siga_det_cargosDto,$orden="",$proveedor=null){
$tmp;

$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Det_Cargo,Id_Menu,Id_Submenu,Id_Cargo,Id_Aplicacion,Lectura,Alta,Baja,Cambio,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_det_cargos ";
if(($siga_det_cargosDto->getId_Det_Cargo()!="") ||($siga_det_cargosDto->getId_Menu()!="") ||($siga_det_cargosDto->getId_Submenu()!="") ||($siga_det_cargosDto->getId_Cargo()!="") ||($siga_det_cargosDto->getId_Aplicacion()!="") ||($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_det_cargosDto->getId_Det_Cargo()!=""){
$sql.="Id_Det_Cargo='".$siga_det_cargosDto->getId_Det_Cargo()."'";
if(($siga_det_cargosDto->getId_Menu()!="") ||($siga_det_cargosDto->getId_Submenu()!="") ||($siga_det_cargosDto->getId_Cargo()!="") ||($siga_det_cargosDto->getId_Aplicacion()!="") ||($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_det_cargosDto->getId_Menu()."'";
if(($siga_det_cargosDto->getId_Submenu()!="") ||($siga_det_cargosDto->getId_Cargo()!="") ||($siga_det_cargosDto->getId_Aplicacion()!="") ||($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getId_Submenu()!=""){
$sql.="Id_Submenu='".$siga_det_cargosDto->getId_Submenu()."'";
if(($siga_det_cargosDto->getId_Cargo()!="") ||($siga_det_cargosDto->getId_Aplicacion()!="") ||($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getId_Cargo()!=""){
$sql.="Id_Cargo='".$siga_det_cargosDto->getId_Cargo()."'";
if(($siga_det_cargosDto->getId_Aplicacion()!="") ||($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getId_Aplicacion()!=""){
$sql.="Id_Aplicacion='".$siga_det_cargosDto->getId_Aplicacion()."'";
if(($siga_det_cargosDto->getLectura()!="") ||($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getLectura()!=""){
$sql.="Lectura='".$siga_det_cargosDto->getLectura()."'";
if(($siga_det_cargosDto->getAlta()!="") ||($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getAlta()!=""){
$sql.="Alta='".$siga_det_cargosDto->getAlta()."'";
if(($siga_det_cargosDto->getBaja()!="") ||($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getBaja()!=""){
$sql.="Baja='".$siga_det_cargosDto->getBaja()."'";
if(($siga_det_cargosDto->getCambio()!="") ||($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getCambio()!=""){
$sql.="Cambio='".$siga_det_cargosDto->getCambio()."'";
if(($siga_det_cargosDto->getFech_Inser()!="") ||($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_det_cargosDto->getFech_Inser()."'";
if(($siga_det_cargosDto->getUsr_Inser()!="") ||($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_det_cargosDto->getUsr_Inser()."'";
if(($siga_det_cargosDto->getFech_Mod()!="") ||($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_det_cargosDto->getFech_Mod()."'";
if(($siga_det_cargosDto->getUsr_Mod()!="") ||($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_det_cargosDto->getUsr_Mod()."'";
if(($siga_det_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_cargosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <>'3'";
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
$tmp[$contador] = new Siga_det_cargosDTO();
$tmp[$contador]->setId_Det_Cargo($row["Id_Det_Cargo"]);
$tmp[$contador]->setId_Menu($row["Id_Menu"]);
$tmp[$contador]->setId_Submenu($row["Id_Submenu"]);
$tmp[$contador]->setId_Cargo($row["Id_Cargo"]);
$tmp[$contador]->setId_Aplicacion($row["Id_Aplicacion"]);
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