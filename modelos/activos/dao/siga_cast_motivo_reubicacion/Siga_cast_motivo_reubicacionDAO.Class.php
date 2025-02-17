<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cast_motivo_reubicacion/Siga_cast_motivo_reubicacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cast_motivo_reubicacionDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cast_motivo_reubicacion($siga_cast_motivo_reubicacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cast_motivo_reubicacion(";
//if($siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()!=""){
//$sql.="Id_Motivo_reubicacion";
//if(($siga_cast_motivo_reubicacionDto->getId_Area()!="") ||($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cast_motivo_reubicacionDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!=""){
$sql.="Desc_Motivo_reubicacion";
if(($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
//if($siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()!=""){
//$sql.="'".$siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()."'";
//if(($siga_cast_motivo_reubicacionDto->getId_Area()!="") ||($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cast_motivo_reubicacionDto->getId_Area()!=""){
$sql.="'".$siga_cast_motivo_reubicacionDto->getId_Area()."'";
if(($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!=""){
$sql.="'".$siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()."'";
if(($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getFech_Inser()!=""){
$sql.="".$siga_cast_motivo_reubicacionDto->getFech_Inser()."";
if(($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getUsr_Inser()!=""){
$sql.="'".$siga_cast_motivo_reubicacionDto->getUsr_Inser()."'";
if(($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getFech_Mod()!=""){
$sql.="".$siga_cast_motivo_reubicacionDto->getFech_Mod()."";
if(($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getUsr_Mod()!=""){
$sql.="'".$siga_cast_motivo_reubicacionDto->getUsr_Mod()."'";
if(($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cast_motivo_reubicacionDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cast_motivo_reubicacionDTO();
$tmp->setId_Motivo_reubicacion($this->_proveedor->lastID());
$tmp = $this->selectSiga_cast_motivo_reubicacion($tmp,"",$this->_proveedor);
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
public function updateSiga_cast_motivo_reubicacion($siga_cast_motivo_reubicacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cast_motivo_reubicacion SET ";
//if($siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()!=""){
//$sql.="Id_Motivo_reubicacion='".$siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()."'";
//if(($siga_cast_motivo_reubicacionDto->getId_Area()!="") ||($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cast_motivo_reubicacionDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cast_motivo_reubicacionDto->getId_Area()."'";
if(($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!=""){
$sql.="Desc_Motivo_reubicacion='".$siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()."'";
if(($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cast_motivo_reubicacionDto->getFech_Inser()."'";
if(($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cast_motivo_reubicacionDto->getUsr_Inser()."'";
if(($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_cast_motivo_reubicacionDto->getFech_Mod()."";
if(($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cast_motivo_reubicacionDto->getUsr_Mod()."'";
if(($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cast_motivo_reubicacionDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Motivo_reubicacion='".$siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cast_motivo_reubicacionDTO();
$tmp->setId_Motivo_reubicacion($siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion());
$tmp = $this->selectSiga_cast_motivo_reubicacion($tmp,"",$this->_proveedor);
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
public function deleteSiga_cast_motivo_reubicacion($siga_cast_motivo_reubicacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cast_motivo_reubicacion  WHERE Id_Motivo_reubicacion='".$siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()."'";
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
public function selectSiga_cast_motivo_reubicacion($siga_cast_motivo_reubicacionDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Motivo_reubicacion,Id_Area,Desc_Motivo_reubicacion,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cast_motivo_reubicacion ";
if(($siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getId_Area()!="") ||($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()!=""){
$sql.="Id_Motivo_reubicacion='".$siga_cast_motivo_reubicacionDto->getId_Motivo_reubicacion()."'";
if(($siga_cast_motivo_reubicacionDto->getId_Area()!="") ||($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cast_motivo_reubicacionDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cast_motivo_reubicacionDto->getId_Area()."'";
if(($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()!=""){
$sql.="Desc_Motivo_reubicacion='".$siga_cast_motivo_reubicacionDto->getDesc_Motivo_reubicacion()."'";
if(($siga_cast_motivo_reubicacionDto->getFech_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cast_motivo_reubicacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cast_motivo_reubicacionDto->getFech_Inser()."'";
if(($siga_cast_motivo_reubicacionDto->getUsr_Inser()!="") ||($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cast_motivo_reubicacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cast_motivo_reubicacionDto->getUsr_Inser()."'";
if(($siga_cast_motivo_reubicacionDto->getFech_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cast_motivo_reubicacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cast_motivo_reubicacionDto->getFech_Mod()."'";
if(($siga_cast_motivo_reubicacionDto->getUsr_Mod()!="") ||($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cast_motivo_reubicacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cast_motivo_reubicacionDto->getUsr_Mod()."'";
if(($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cast_motivo_reubicacionDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_cast_motivo_reubicacionDTO();
$tmp[$contador]->setId_Motivo_reubicacion($row["Id_Motivo_reubicacion"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setDesc_Motivo_reubicacion($row["Desc_Motivo_reubicacion"]);
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