<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_ubic_prim/Siga_cat_ubic_primDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ubic_primDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_ubic_prim($siga_cat_ubic_primDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_ubic_prim(";
//if($siga_cat_ubic_primDto->getId_Ubic_Prim()!=""){
//$sql.="Id_Ubic_Prim";
//if(($siga_cat_ubic_primDto->getId_Area()!="") ||($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ubic_primDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!=""){
$sql.="Desc_Ubic_Prim";
if(($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
//if($siga_cat_ubic_primDto->getId_Ubic_Prim()!=""){
//$sql.="'".$siga_cat_ubic_primDto->getId_Ubic_Prim()."'";
//if(($siga_cat_ubic_primDto->getId_Area()!="") ||($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ubic_primDto->getId_Area()!=""){
$sql.="'".$siga_cat_ubic_primDto->getId_Area()."'";
if(($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!=""){
$sql.="'".$siga_cat_ubic_primDto->getDesc_Ubic_Prim()."'";
if(($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getFech_Inser()!=""){
$sql.="".$siga_cat_ubic_primDto->getFech_Inser()."";
if(($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getUsr_Inser()!=""){
$sql.="'".$siga_cat_ubic_primDto->getUsr_Inser()."'";
if(($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getFech_Mod()!=""){
$sql.="".$siga_cat_ubic_primDto->getFech_Mod()."";
if(($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getUsr_Mod()!=""){
$sql.="'".$siga_cat_ubic_primDto->getUsr_Mod()."'";
if(($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cat_ubic_primDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ubic_primDTO();
$tmp->setId_Ubic_Prim($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_ubic_prim($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_ubic_prim($siga_cat_ubic_primDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_ubic_prim SET ";
//if($siga_cat_ubic_primDto->getId_Ubic_Prim()!=""){
//$sql.="Id_Ubic_Prim='".$siga_cat_ubic_primDto->getId_Ubic_Prim()."'";
//if(($siga_cat_ubic_primDto->getId_Area()!="") ||($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ubic_primDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_ubic_primDto->getId_Area()."'";
if(($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!=""){
$sql.="Desc_Ubic_Prim='".$siga_cat_ubic_primDto->getDesc_Ubic_Prim()."'";
if(($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_ubic_primDto->getFech_Inser()."'";
if(($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_ubic_primDto->getUsr_Inser()."'";
if(($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_cat_ubic_primDto->getFech_Mod()."";
if(($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_ubic_primDto->getUsr_Mod()."'";
if(($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_ubic_primDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_ubic_primDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Ubic_Prim='".$siga_cat_ubic_primDto->getId_Ubic_Prim()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ubic_primDTO();
$tmp->setId_Ubic_Prim($siga_cat_ubic_primDto->getId_Ubic_Prim());
$tmp = $this->selectSiga_cat_ubic_prim($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_ubic_prim($siga_cat_ubic_primDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_ubic_prim  WHERE Id_Ubic_Prim='".$siga_cat_ubic_primDto->getId_Ubic_Prim()."'";
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
public function selectSiga_cat_ubic_prim($siga_cat_ubic_primDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}

$sql="SELECT Id_Ubic_Prim,Id_Area,Desc_Ubic_Prim,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cat_ubic_prim ";
if(($siga_cat_ubic_primDto->getId_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getId_Area()!="") ||($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}

if($siga_cat_ubic_primDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_cat_ubic_primDto->getId_Ubic_Prim()."'";
if(($siga_cat_ubic_primDto->getId_Area()!="") ||($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_primDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_ubic_primDto->getId_Area()."'";
if(($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!="") ||($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_primDto->getDesc_Ubic_Prim()!=""){
$sql.="Desc_Ubic_Prim='".$siga_cat_ubic_primDto->getDesc_Ubic_Prim()."'";
if(($siga_cat_ubic_primDto->getFech_Inser()!="") ||($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_primDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_ubic_primDto->getFech_Inser()."'";
if(($siga_cat_ubic_primDto->getUsr_Inser()!="") ||($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_primDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_ubic_primDto->getUsr_Inser()."'";
if(($siga_cat_ubic_primDto->getFech_Mod()!="") ||($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_primDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_ubic_primDto->getFech_Mod()."'";
if(($siga_cat_ubic_primDto->getUsr_Mod()!="") ||($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_primDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_ubic_primDto->getUsr_Mod()."'";
if(($siga_cat_ubic_primDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ubic_primDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_cat_ubic_primDTO();
$tmp[$contador]->setId_Ubic_Prim($row["Id_Ubic_Prim"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setDesc_Ubic_Prim($row["Desc_Ubic_Prim"]);
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