<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_medios/Siga_cat_mediosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_mediosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_medios($siga_cat_mediosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_medios(";
if($siga_cat_mediosDto->getId_Medio()!=""){
$sql.="Id_Medio";
if(($siga_cat_mediosDto->getId_Area()!="") ||($siga_cat_mediosDto->getDesc_Medio()!="") ||($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_cat_mediosDto->getDesc_Medio()!="") ||($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getDesc_Medio()!=""){
$sql.="Desc_Medio";
if(($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_cat_mediosDto->getId_Medio()!=""){
$sql.="'".$siga_cat_mediosDto->getId_Medio()."'";
if(($siga_cat_mediosDto->getId_Area()!="") ||($siga_cat_mediosDto->getDesc_Medio()!="") ||($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getId_Area()!=""){
$sql.="'".$siga_cat_mediosDto->getId_Area()."'";
if(($siga_cat_mediosDto->getDesc_Medio()!="") ||($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getDesc_Medio()!=""){
$sql.="'".$siga_cat_mediosDto->getDesc_Medio()."'";
if(($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getFech_Inser()!=""){
$sql.="'".$siga_cat_mediosDto->getFech_Inser()."'";
if(($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getUsr_Inser()!=""){
$sql.="'".$siga_cat_mediosDto->getUsr_Inser()."'";
if(($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getFech_Mod()!=""){
$sql.="'".$siga_cat_mediosDto->getFech_Mod()."'";
if(($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getUsr_Mod()!=""){
$sql.="'".$siga_cat_mediosDto->getUsr_Mod()."'";
if(($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cat_mediosDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_mediosDTO();
$tmp->setId_Medio($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_medios($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_medios($siga_cat_mediosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_medios SET ";
if($siga_cat_mediosDto->getId_Medio()!=""){
$sql.="Id_Medio='".$siga_cat_mediosDto->getId_Medio()."'";
if(($siga_cat_mediosDto->getId_Area()!="") ||($siga_cat_mediosDto->getDesc_Medio()!="") ||($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_mediosDto->getId_Area()."'";
if(($siga_cat_mediosDto->getDesc_Medio()!="") ||($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getDesc_Medio()!=""){
$sql.="Desc_Medio='".$siga_cat_mediosDto->getDesc_Medio()."'";
if(($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_mediosDto->getFech_Inser()."'";
if(($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_mediosDto->getUsr_Inser()."'";
if(($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_mediosDto->getFech_Mod()."'";
if(($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_mediosDto->getUsr_Mod()."'";
if(($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_mediosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_mediosDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Medio='".$siga_cat_mediosDto->getId_Medio()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_mediosDTO();
$tmp->setId_Medio($siga_cat_mediosDto->getId_Medio());
$tmp = $this->selectSiga_cat_medios($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_medios($siga_cat_mediosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_medios  WHERE Id_Medio='".$siga_cat_mediosDto->getId_Medio()."'";
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
public function selectSiga_cat_medios($siga_cat_mediosDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Medio,Id_Area,Desc_Medio,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cat_medios ";
if(($siga_cat_mediosDto->getId_Medio()!="") ||($siga_cat_mediosDto->getId_Area()!="") ||($siga_cat_mediosDto->getDesc_Medio()!="") ||($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_mediosDto->getId_Medio()!=""){
$sql.="Id_Medio='".$siga_cat_mediosDto->getId_Medio()."'";
if(($siga_cat_mediosDto->getId_Area()!="") ||($siga_cat_mediosDto->getDesc_Medio()!="") ||($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_mediosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_mediosDto->getId_Area()."'";
if(($siga_cat_mediosDto->getDesc_Medio()!="") ||($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_mediosDto->getDesc_Medio()!=""){
$sql.="Desc_Medio='".$siga_cat_mediosDto->getDesc_Medio()."'";
if(($siga_cat_mediosDto->getFech_Inser()!="") ||($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_mediosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_mediosDto->getFech_Inser()."'";
if(($siga_cat_mediosDto->getUsr_Inser()!="") ||($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_mediosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_mediosDto->getUsr_Inser()."'";
if(($siga_cat_mediosDto->getFech_Mod()!="") ||($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_mediosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_mediosDto->getFech_Mod()."'";
if(($siga_cat_mediosDto->getUsr_Mod()!="") ||($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_mediosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_mediosDto->getUsr_Mod()."'";
if(($siga_cat_mediosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_mediosDto->getEstatus_Reg()!=""){
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
$tmp = [];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_cat_mediosDTO();
$tmp[$contador]->setId_Medio($row["Id_Medio"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setDesc_Medio($row["Desc_Medio"]);
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