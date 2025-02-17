<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_submenu/Siga_submenuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_submenuDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_submenu($siga_submenuDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_submenu(";
if($siga_submenuDto->getId_Submenu()!=""){
$sql.="Id_Submenu";
if(($siga_submenuDto->getId_Menu()!="") ||($siga_submenuDto->getNom_Submenu()!="") ||($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getId_Menu()!=""){
$sql.="Id_Menu";
if(($siga_submenuDto->getNom_Submenu()!="") ||($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getNom_Submenu()!=""){
$sql.="Nom_Submenu";
if(($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getUrl_Menu()!=""){
$sql.="Url_Menu";
if(($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getIcono()!=""){
$sql.="Icono";
if(($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getOrden()!=""){
$sql.="Orden";
if(($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_submenuDto->getId_Submenu()!=""){
$sql.="'".$siga_submenuDto->getId_Submenu()."'";
if(($siga_submenuDto->getId_Menu()!="") ||($siga_submenuDto->getNom_Submenu()!="") ||($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getId_Menu()!=""){
$sql.="'".$siga_submenuDto->getId_Menu()."'";
if(($siga_submenuDto->getNom_Submenu()!="") ||($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getNom_Submenu()!=""){
$sql.="'".$siga_submenuDto->getNom_Submenu()."'";
if(($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getUrl_Menu()!=""){
$sql.="'".$siga_submenuDto->getUrl_Menu()."'";
if(($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getIcono()!=""){
$sql.="'".$siga_submenuDto->getIcono()."'";
if(($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getOrden()!=""){
$sql.="'".$siga_submenuDto->getOrden()."'";
if(($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getFech_Inser()!=""){
$sql.="'".$siga_submenuDto->getFech_Inser()."'";
if(($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getUsr_Inser()!=""){
$sql.="'".$siga_submenuDto->getUsr_Inser()."'";
if(($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getFech_Mod()!=""){
$sql.="'".$siga_submenuDto->getFech_Mod()."'";
if(($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getUsr_Mod()!=""){
$sql.="'".$siga_submenuDto->getUsr_Mod()."'";
if(($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getEstatus_Reg()!=""){
$sql.="'".$siga_submenuDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_submenuDTO();
$tmp->setId_Submenu($this->_proveedor->lastID());
$tmp = $this->selectSiga_submenu($tmp,"",$this->_proveedor);
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
public function updateSiga_submenu($siga_submenuDto,$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_submenu SET ";
if($siga_submenuDto->getId_Submenu()!=""){
$sql.="Id_Submenu='".$siga_submenuDto->getId_Submenu()."'";
if(($siga_submenuDto->getId_Menu()!="") ||($siga_submenuDto->getNom_Submenu()!="") ||($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_submenuDto->getId_Menu()."'";
if(($siga_submenuDto->getNom_Submenu()!="") ||($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getNom_Submenu()!=""){
$sql.="Nom_Submenu='".$siga_submenuDto->getNom_Submenu()."'";
if(($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getUrl_Menu()!=""){
$sql.="Url_Menu='".$siga_submenuDto->getUrl_Menu()."'";
if(($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getIcono()!=""){
$sql.="Icono='".$siga_submenuDto->getIcono()."'";
if(($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getOrden()!=""){
$sql.="Orden='".$siga_submenuDto->getOrden()."'";
if(($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_submenuDto->getFech_Inser()."'";
if(($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_submenuDto->getUsr_Inser()."'";
if(($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_submenuDto->getFech_Mod()."'";
if(($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_submenuDto->getUsr_Mod()."'";
if(($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_submenuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_submenuDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Submenu='".$siga_submenuDto->getId_Submenu()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_submenuDTO();
$tmp->setId_Submenu($siga_submenuDto->getId_Submenu());
$tmp = $this->selectSiga_submenu($tmp,"",$this->_proveedor);
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
public function deleteSiga_submenu($siga_submenuDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_submenu  WHERE Id_Submenu='".$siga_submenuDto->getId_Submenu()."'";
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
public function selectSiga_submenu($siga_submenuDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Submenu,Id_Menu,Nom_Submenu,Url_Menu,Icono,Orden,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_submenu ";
if(($siga_submenuDto->getId_Submenu()!="") ||($siga_submenuDto->getId_Menu()!="") ||($siga_submenuDto->getNom_Submenu()!="") ||($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_submenuDto->getId_Submenu()!=""){
$sql.="Id_Submenu='".$siga_submenuDto->getId_Submenu()."'";
if(($siga_submenuDto->getId_Menu()!="") ||($siga_submenuDto->getNom_Submenu()!="") ||($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getId_Menu()!=""){
$sql.="Id_Menu='".$siga_submenuDto->getId_Menu()."'";
if(($siga_submenuDto->getNom_Submenu()!="") ||($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getNom_Submenu()!=""){
$sql.="Nom_Submenu='".$siga_submenuDto->getNom_Submenu()."'";
if(($siga_submenuDto->getUrl_Menu()!="") ||($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getUrl_Menu()!=""){
$sql.="Url_Menu='".$siga_submenuDto->getUrl_Menu()."'";
if(($siga_submenuDto->getIcono()!="") ||($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getIcono()!=""){
$sql.="Icono='".$siga_submenuDto->getIcono()."'";
if(($siga_submenuDto->getOrden()!="") ||($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getOrden()!=""){
$sql.="Orden='".$siga_submenuDto->getOrden()."'";
if(($siga_submenuDto->getFech_Inser()!="") ||($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_submenuDto->getFech_Inser()."'";
if(($siga_submenuDto->getUsr_Inser()!="") ||($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_submenuDto->getUsr_Inser()."'";
if(($siga_submenuDto->getFech_Mod()!="") ||($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_submenuDto->getFech_Mod()."'";
if(($siga_submenuDto->getUsr_Mod()!="") ||($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_submenuDto->getUsr_Mod()."'";
if(($siga_submenuDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_submenuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_submenuDto->getEstatus_Reg()."'";
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
$tmp[$contador] = new Siga_submenuDTO();
$tmp[$contador]->setId_Submenu($row["Id_Submenu"]);
$tmp[$contador]->setId_Menu($row["Id_Menu"]);
$tmp[$contador]->setNom_Submenu($row["Nom_Submenu"]);
$tmp[$contador]->setUrl_Menu($row["Url_Menu"]);
$tmp[$contador]->setIcono($row["Icono"]);
$tmp[$contador]->setOrden($row["Orden"]);
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