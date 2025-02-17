<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_ubic_sec/Siga_cat_ubic_secDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ubic_secDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_ubic_sec($siga_cat_ubic_secDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_ubic_sec(";
//if($siga_cat_ubic_secDto->getId_Ubic_Sec()!=""){
//$sql.="Id_Ubic_Sec";
//if(($siga_cat_ubic_secDto->getId_Ubic_Prim()!="") ||($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ubic_secDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim";
if(($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!=""){
$sql.="Desc_Ubic_Sec";
if(($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
//if($siga_cat_ubic_secDto->getId_Ubic_Sec()!=""){
//$sql.="'".$siga_cat_ubic_secDto->getId_Ubic_Sec()."'";
//if(($siga_cat_ubic_secDto->getId_Ubic_Prim()!="") ||($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ubic_secDto->getId_Ubic_Prim()!=""){
$sql.="'".$siga_cat_ubic_secDto->getId_Ubic_Prim()."'";
if(($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!=""){
$sql.="'".$siga_cat_ubic_secDto->getDesc_Ubic_Sec()."'";
if(($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getFech_Inser()!=""){
$sql.="".$siga_cat_ubic_secDto->getFech_Inser()."";
if(($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getUsr_Inser()!=""){
$sql.="'".$siga_cat_ubic_secDto->getUsr_Inser()."'";
if(($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getFech_Mod()!=""){
$sql.="".$siga_cat_ubic_secDto->getFech_Mod()."";
if(($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getUsr_Mod()!=""){
$sql.="'".$siga_cat_ubic_secDto->getUsr_Mod()."'";
if(($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cat_ubic_secDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ubic_secDTO();
$tmp->setId_Ubic_Sec($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_ubic_sec($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_ubic_sec($siga_cat_ubic_secDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_ubic_sec SET ";
//if($siga_cat_ubic_secDto->getId_Ubic_Sec()!=""){
//$sql.="Id_Ubic_Sec='".$siga_cat_ubic_secDto->getId_Ubic_Sec()."'";
//if(($siga_cat_ubic_secDto->getId_Ubic_Prim()!="") ||($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ubic_secDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_cat_ubic_secDto->getId_Ubic_Prim()."'";
if(($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!=""){
$sql.="Desc_Ubic_Sec='".$siga_cat_ubic_secDto->getDesc_Ubic_Sec()."'";
if(($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_ubic_secDto->getFech_Inser()."'";
if(($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_ubic_secDto->getUsr_Inser()."'";
if(($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_cat_ubic_secDto->getFech_Mod()."";
if(($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_ubic_secDto->getUsr_Mod()."'";
if(($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_secDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_ubic_secDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Ubic_Sec='".$siga_cat_ubic_secDto->getId_Ubic_Sec()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ubic_secDTO();
$tmp->setId_Ubic_Sec($siga_cat_ubic_secDto->getId_Ubic_Sec());
$tmp = $this->selectSiga_cat_ubic_sec($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_ubic_sec($siga_cat_ubic_secDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_ubic_sec  WHERE Id_Ubic_Sec='".$siga_cat_ubic_secDto->getId_Ubic_Sec()."'";
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
public function selectSiga_cat_ubic_sec($siga_cat_ubic_secDto,$orden="",$proveedor=null){

$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Ubic_Sec,Id_Ubic_Prim,Desc_Ubic_Sec,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cat_ubic_sec ";
if(($siga_cat_ubic_secDto->getId_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getId_Ubic_Prim()!="") ||($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_ubic_secDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec='".$siga_cat_ubic_secDto->getId_Ubic_Sec()."'";
if(($siga_cat_ubic_secDto->getId_Ubic_Prim()!="") ||($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_secDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_cat_ubic_secDto->getId_Ubic_Prim()."'";
if(($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!="") ||($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_secDto->getDesc_Ubic_Sec()!=""){
$sql.="Desc_Ubic_Sec='".$siga_cat_ubic_secDto->getDesc_Ubic_Sec()."'";
if(($siga_cat_ubic_secDto->getFech_Inser()!="") ||($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_secDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_ubic_secDto->getFech_Inser()."'";
if(($siga_cat_ubic_secDto->getUsr_Inser()!="") ||($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_secDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_ubic_secDto->getUsr_Inser()."'";
if(($siga_cat_ubic_secDto->getFech_Mod()!="") ||($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_secDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_ubic_secDto->getFech_Mod()."'";
if(($siga_cat_ubic_secDto->getUsr_Mod()!="") ||($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_secDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_ubic_secDto->getUsr_Mod()."'";
if(($siga_cat_ubic_secDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_secDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <> '3'";
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
$tmp[$contador] = new Siga_cat_ubic_secDTO();
$tmp[$contador]->setId_Ubic_Sec($row["Id_Ubic_Sec"]);
$tmp[$contador]->setId_Ubic_Prim($row["Id_Ubic_Prim"]);
$tmp[$contador]->setDesc_Ubic_Sec($row["Desc_Ubic_Sec"]);
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