<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_menu/Siga_menuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_menuDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_menu($siga_menuDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_menu(";
if($siga_menuDto->getId_Menu()!=""){
$sql.="Id_Menu";
if(($siga_menuDto->getId_Perfil()!="") ||($siga_menuDto->getNom_Menu()!="") ||($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getId_Perfil()!=""){
$sql.="Id_Perfil";
if(($siga_menuDto->getNom_Menu()!="") ||($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getNom_Menu()!=""){
$sql.="Nom_Menu";
if(($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getUrl_Menu()!=""){
$sql.="Url_Menu";
if(($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getIcono()!=""){
$sql.="Icono";
if(($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getOrden()!=""){
$sql.="Orden";
if(($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getPadre()!=""){
$sql.="Padre";
if(($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_menuDto->getId_Menu()!=""){
$sql.="'".$siga_menuDto->getId_Menu()."'";
if(($siga_menuDto->getId_Perfil()!="") ||($siga_menuDto->getNom_Menu()!="") ||($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getId_Perfil()!=""){
$sql.="'".$siga_menuDto->getId_Perfil()."'";
if(($siga_menuDto->getNom_Menu()!="") ||($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getNom_Menu()!=""){
$sql.="'".$siga_menuDto->getNom_Menu()."'";
if(($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getUrl_Menu()!=""){
$sql.="'".$siga_menuDto->getUrl_Menu()."'";
if(($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getIcono()!=""){
$sql.="'".$siga_menuDto->getIcono()."'";
if(($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getOrden()!=""){
$sql.="'".$siga_menuDto->getOrden()."'";
if(($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getPadre()!=""){
$sql.="'".$siga_menuDto->getPadre()."'";
if(($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getFech_Inser()!=""){
$sql.="'".$siga_menuDto->getFech_Inser()."'";
if(($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getUsr_Inser()!=""){
$sql.="'".$siga_menuDto->getUsr_Inser()."'";
if(($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getFech_Mod()!=""){
$sql.="'".$siga_menuDto->getFech_Mod()."'";
if(($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getUsr_Mod()!=""){
$sql.="'".$siga_menuDto->getUsr_Mod()."'";
if(($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getEstatus_Reg()!=""){
$sql.="'".$siga_menuDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_menuDTO();
$tmp->setId_Menu($this->_proveedor->lastID());
$tmp = $this->selectSiga_menu($tmp,"",$this->_proveedor);
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
public function updateSiga_menu($siga_menuDto,$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_menu SET ";
if($siga_menuDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_menuDto->getId_Menu()."'";
if(($siga_menuDto->getId_Perfil()!="") ||($siga_menuDto->getNom_Menu()!="") ||($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getId_Perfil()!=""){
$sql.="Id_Perfil='".$siga_menuDto->getId_Perfil()."'";
if(($siga_menuDto->getNom_Menu()!="") ||($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getNom_Menu()!=""){
$sql.="Nom_Menu='".$siga_menuDto->getNom_Menu()."'";
if(($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getUrl_Menu()!=""){
$sql.="Url_Menu='".$siga_menuDto->getUrl_Menu()."'";
if(($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getIcono()!=""){
$sql.="Icono='".$siga_menuDto->getIcono()."'";
if(($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getOrden()!=""){
$sql.="Orden='".$siga_menuDto->getOrden()."'";
if(($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getPadre()!=""){
$sql.="Padre='".$siga_menuDto->getPadre()."'";
if(($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_menuDto->getFech_Inser()."'";
if(($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_menuDto->getUsr_Inser()."'";
if(($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_menuDto->getFech_Mod()."'";
if(($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_menuDto->getUsr_Mod()."'";
if(($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_menuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_menuDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Menu='".$siga_menuDto->getId_Menu()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_menuDTO();
$tmp->setId_Menu($siga_menuDto->getId_Menu());
$tmp = $this->selectSiga_menu($tmp,"",$this->_proveedor);
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
public function deleteSiga_menu($siga_menuDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_menu  WHERE Id_Menu='".$siga_menuDto->getId_Menu()."'";
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
public function selectSiga_menu($siga_menuDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Menu,Id_Perfil,Nom_Menu,Url_Menu,Icono,Orden,Padre,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_menu ";
if(($siga_menuDto->getId_Menu()!="") ||($siga_menuDto->getId_Perfil()!="") ||($siga_menuDto->getNom_Menu()!="") ||($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_menuDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_menuDto->getId_Menu()."'";
if(($siga_menuDto->getId_Perfil()!="") ||($siga_menuDto->getNom_Menu()!="") ||($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getId_Perfil()!=""){
$sql.="Id_Perfil='".$siga_menuDto->getId_Perfil()."'";
if(($siga_menuDto->getNom_Menu()!="") ||($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getNom_Menu()!=""){
$sql.="Nom_Menu='".$siga_menuDto->getNom_Menu()."'";
if(($siga_menuDto->getUrl_Menu()!="") ||($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getUrl_Menu()!=""){
$sql.="Url_Menu='".$siga_menuDto->getUrl_Menu()."'";
if(($siga_menuDto->getIcono()!="") ||($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getIcono()!=""){
$sql.="Icono='".$siga_menuDto->getIcono()."'";
if(($siga_menuDto->getOrden()!="") ||($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getOrden()!=""){
$sql.="Orden='".$siga_menuDto->getOrden()."'";
if(($siga_menuDto->getPadre()!="") ||($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getPadre()!=""){
$sql.="Padre='".$siga_menuDto->getPadre()."'";
if(($siga_menuDto->getFech_Inser()!="") ||($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_menuDto->getFech_Inser()."'";
if(($siga_menuDto->getUsr_Inser()!="") ||($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_menuDto->getUsr_Inser()."'";
if(($siga_menuDto->getFech_Mod()!="") ||($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_menuDto->getFech_Mod()."'";
if(($siga_menuDto->getUsr_Mod()!="") ||($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_menuDto->getUsr_Mod()."'";
if(($siga_menuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_menuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_menuDto->getEstatus_Reg()."'";
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
$tmp[$contador] = new Siga_menuDTO();
$tmp[$contador]->setId_Menu($row["Id_Menu"]);
$tmp[$contador]->setId_Perfil($row["Id_Perfil"]);
$tmp[$contador]->setNom_Menu($row["Nom_Menu"]);
$tmp[$contador]->setUrl_Menu($row["Url_Menu"]);
$tmp[$contador]->setIcono($row["Icono"]);
$tmp[$contador]->setOrden($row["Orden"]);
$tmp[$contador]->setPadre($row["Padre"]);
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