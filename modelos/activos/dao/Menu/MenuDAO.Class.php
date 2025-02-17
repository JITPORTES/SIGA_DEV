<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/Menu/MenuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class MenuDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertMenu($MenuDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO Menu(";
if($MenuDto->getId_Menu()!=""){
$sql.="Id_Menu";
if(($MenuDto->getNombre_Menu()!="") ||($MenuDto->getDescripcion()!="") ||($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getNombre_Menu()!=""){
$sql.="Nombre_Menu";
if(($MenuDto->getDescripcion()!="") ||($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getDescripcion()!=""){
$sql.="Descripcion";
if(($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getId_Menu_Padre()!=""){
$sql.="Id_Menu_Padre";
if(($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
if(($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getUsr_Modifico()!=""){
$sql.="Usr_Modifico";
if(($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getFecha()!=""){
$sql.="Fecha";
}
$sql.=") VALUES(";
if($MenuDto->getId_Menu()!=""){
$sql.="'".$MenuDto->getId_Menu()."'";
if(($MenuDto->getNombre_Menu()!="") ||($MenuDto->getDescripcion()!="") ||($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getNombre_Menu()!=""){
$sql.="'".$MenuDto->getNombre_Menu()."'";
if(($MenuDto->getDescripcion()!="") ||($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getDescripcion()!=""){
$sql.="'".$MenuDto->getDescripcion()."'";
if(($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getId_Menu_Padre()!=""){
$sql.="'".$MenuDto->getId_Menu_Padre()."'";
if(($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getEstatus_Reg()!=""){
$sql.="'".$MenuDto->getEstatus_Reg()."'";
if(($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getUsr_Modifico()!=""){
$sql.="'".$MenuDto->getUsr_Modifico()."'";
if(($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getFecha()!=""){
$sql.="'".$MenuDto->getFecha()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new MenuDTO();
$tmp->setId_Menu($this->_proveedor->lastID());
$tmp = $this->selectMenu($tmp,"",$this->_proveedor);
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
public function updateMenu($MenuDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE Menu SET ";
if($MenuDto->getId_Menu()!=""){
$sql.="Id_Menu='".$MenuDto->getId_Menu()."'";
if(($MenuDto->getNombre_Menu()!="") ||($MenuDto->getDescripcion()!="") ||($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getNombre_Menu()!=""){
$sql.="Nombre_Menu='".$MenuDto->getNombre_Menu()."'";
if(($MenuDto->getDescripcion()!="") ||($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getDescripcion()!=""){
$sql.="Descripcion='".$MenuDto->getDescripcion()."'";
if(($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getId_Menu_Padre()!=""){
$sql.="Id_Menu_Padre='".$MenuDto->getId_Menu_Padre()."'";
if(($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$MenuDto->getEstatus_Reg()."'";
if(($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getUsr_Modifico()!=""){
$sql.="Usr_Modifico='".$MenuDto->getUsr_Modifico()."'";
if(($MenuDto->getFecha()!="") ){
$sql.=",";
}
}
if($MenuDto->getFecha()!=""){
$sql.="Fecha='".$MenuDto->getFecha()."'";
}
$sql.=" WHERE Id_Menu='".$MenuDto->getId_Menu()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new MenuDTO();
$tmp->setId_Menu($MenuDto->getId_Menu());
$tmp = $this->selectMenu($tmp,"",$this->_proveedor);
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
public function deleteMenu($MenuDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM Menu  WHERE Id_Menu='".$MenuDto->getId_Menu()."'";
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
public function selectMenu($MenuDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Menu,Nombre_Menu,Descripcion,Id_Menu_Padre,Estatus_Reg,Usr_Modifico,Fecha FROM Menu ";
if(($MenuDto->getId_Menu()!="") ||($MenuDto->getNombre_Menu()!="") ||($MenuDto->getDescripcion()!="") ||($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=" WHERE ";
}
if($MenuDto->getId_Menu()!=""){
$sql.="Id_Menu='".$MenuDto->getId_Menu()."'";
if(($MenuDto->getNombre_Menu()!="") ||($MenuDto->getDescripcion()!="") ||($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=" AND ";
}
}
if($MenuDto->getNombre_Menu()!=""){
$sql.="Nombre_Menu='".$MenuDto->getNombre_Menu()."'";
if(($MenuDto->getDescripcion()!="") ||($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=" AND ";
}
}
if($MenuDto->getDescripcion()!=""){
$sql.="Descripcion='".$MenuDto->getDescripcion()."'";
if(($MenuDto->getId_Menu_Padre()!="") ||($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=" AND ";
}
}
if($MenuDto->getId_Menu_Padre()!=""){
$sql.="Id_Menu_Padre='".$MenuDto->getId_Menu_Padre()."'";
if(($MenuDto->getEstatus_Reg()!="") ||($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=" AND ";
}
}
if($MenuDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$MenuDto->getEstatus_Reg()."'";
if(($MenuDto->getUsr_Modifico()!="") ||($MenuDto->getFecha()!="") ){
$sql.=" AND ";
}
}
if($MenuDto->getUsr_Modifico()!=""){
$sql.="Usr_Modifico='".$MenuDto->getUsr_Modifico()."'";
if(($MenuDto->getFecha()!="") ){
$sql.=" AND ";
}
}
if($MenuDto->getFecha()!=""){
$sql.="Fecha='".$MenuDto->getFecha()."'";
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
$tmp[$contador] = new MenuDTO();
$tmp[$contador]->setId_Menu($row["Id_Menu"]);
$tmp[$contador]->setNombre_Menu($row["Nombre_Menu"]);
$tmp[$contador]->setDescripcion($row["Descripcion"]);
$tmp[$contador]->setId_Menu_Padre($row["Id_Menu_Padre"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setUsr_Modifico($row["Usr_Modifico"]);
$tmp[$contador]->setFecha($row["Fecha"]);
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