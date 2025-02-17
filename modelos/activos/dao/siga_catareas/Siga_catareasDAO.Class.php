<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_catareas/Siga_catareasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_catareasDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_catareas($siga_catareasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_catareas(";
if($siga_catareasDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_catareasDto->getNom_Area()!="") ||($siga_catareasDto->getIcono()!="") ||($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getNom_Area()!=""){
$sql.="Nom_Area";
if(($siga_catareasDto->getIcono()!="") ||($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getIcono()!=""){
$sql.="Icono";
if(($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_catareasDto->getId_Area()!=""){
$sql.="'".$siga_catareasDto->getId_Area()."'";
if(($siga_catareasDto->getNom_Area()!="") ||($siga_catareasDto->getIcono()!="") ||($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getNom_Area()!=""){
$sql.="'".$siga_catareasDto->getNom_Area()."'";
if(($siga_catareasDto->getIcono()!="") ||($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getIcono()!=""){
$sql.="'".$siga_catareasDto->getIcono()."'";
if(($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getFech_Inser()!=""){
$sql.="'".$siga_catareasDto->getFech_Inser()."'";
if(($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getUsr_Inser()!=""){
$sql.="'".$siga_catareasDto->getUsr_Inser()."'";
if(($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getFech_Mod()!=""){
$sql.="'".$siga_catareasDto->getFech_Mod()."'";
if(($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getUsr_Mod()!=""){
$sql.="'".$siga_catareasDto->getUsr_Mod()."'";
if(($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getEstatus_Reg()!=""){
$sql.="'".$siga_catareasDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_catareasDTO();
$tmp->setId_Area($this->_proveedor->lastID());
$tmp = $this->selectSiga_catareas($tmp,"",$this->_proveedor);
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
public function updateSiga_catareas($siga_catareasDto,$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_catareas SET ";
if($siga_catareasDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_catareasDto->getId_Area()."'";
if(($siga_catareasDto->getNom_Area()!="") ||($siga_catareasDto->getIcono()!="") ||($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getNom_Area()!=""){
$sql.="Nom_Area='".$siga_catareasDto->getNom_Area()."'";
if(($siga_catareasDto->getIcono()!="") ||($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getIcono()!=""){
$sql.="Icono='".$siga_catareasDto->getIcono()."'";
if(($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_catareasDto->getFech_Inser()."'";
if(($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_catareasDto->getUsr_Inser()."'";
if(($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_catareasDto->getFech_Mod()."'";
if(($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_catareasDto->getUsr_Mod()."'";
if(($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_catareasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_catareasDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Area='".$siga_catareasDto->getId_Area()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_catareasDTO();
$tmp->setId_Area($siga_catareasDto->getId_Area());
$tmp = $this->selectSiga_catareas($tmp,"",$this->_proveedor);
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
public function deleteSiga_catareas($siga_catareasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_catareas  WHERE Id_Area='".$siga_catareasDto->getId_Area()."'";
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
public function selectSiga_catareas($siga_catareasDto,$orden="",$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Area,Nom_Area,Icono,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_catareas ";
if(($siga_catareasDto->getId_Area()!="") ||($siga_catareasDto->getNom_Area()!="") ||($siga_catareasDto->getIcono()!="") ||($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_catareasDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_catareasDto->getId_Area()."'";
if(($siga_catareasDto->getNom_Area()!="") ||($siga_catareasDto->getIcono()!="") ||($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_catareasDto->getNom_Area()!=""){
$sql.="Nom_Area='".$siga_catareasDto->getNom_Area()."'";
if(($siga_catareasDto->getIcono()!="") ||($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_catareasDto->getIcono()!=""){
$sql.="Icono='".$siga_catareasDto->getIcono()."'";
if(($siga_catareasDto->getFech_Inser()!="") ||($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_catareasDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_catareasDto->getFech_Inser()."'";
if(($siga_catareasDto->getUsr_Inser()!="") ||($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_catareasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_catareasDto->getUsr_Inser()."'";
if(($siga_catareasDto->getFech_Mod()!="") ||($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_catareasDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_catareasDto->getFech_Mod()."'";
if(($siga_catareasDto->getUsr_Mod()!="") ||($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_catareasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_catareasDto->getUsr_Mod()."'";
if(($siga_catareasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_catareasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <> '3' ";
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
$tmp[$contador] = new Siga_catareasDTO();
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setNom_Area($row["Nom_Area"]);
$tmp[$contador]->setIcono($row["Icono"]);
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