<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_estatus/Siga_cat_estatusDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_estatusDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_estatus($siga_cat_estatusDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_estatus(";
//if($siga_cat_estatusDto->getId_Estatus()!=""){
//$sql.="Id_Estatus";
//if(($siga_cat_estatusDto->getId_Area()!="") ||($siga_cat_estatusDto->getDesc_Estatus()!="") ||($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_estatusDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_cat_estatusDto->getDesc_Estatus()!="") ||($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getDesc_Estatus()!=""){
$sql.="Desc_Estatus";
if(($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
//if($siga_cat_estatusDto->getId_Estatus()!=""){
//$sql.="'".$siga_cat_estatusDto->getId_Estatus()."'";
//if(($siga_cat_estatusDto->getId_Area()!="") ||($siga_cat_estatusDto->getDesc_Estatus()!="") ||($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_estatusDto->getId_Area()!=""){
$sql.="'".$siga_cat_estatusDto->getId_Area()."'";
if(($siga_cat_estatusDto->getDesc_Estatus()!="") ||($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getDesc_Estatus()!=""){
$sql.="'".$siga_cat_estatusDto->getDesc_Estatus()."'";
if(($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getFech_Inser()!=""){
$sql.="".$siga_cat_estatusDto->getFech_Inser()."";
if(($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getUsr_Inser()!=""){
$sql.="'".$siga_cat_estatusDto->getUsr_Inser()."'";
if(($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getFech_Mod()!=""){
$sql.="".$siga_cat_estatusDto->getFech_Mod()."";
if(($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getUsr_Mod()!=""){
$sql.="'".$siga_cat_estatusDto->getUsr_Mod()."'";
if(($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cat_estatusDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_estatusDTO();
$tmp->setId_Estatus($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_estatus($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_estatus($siga_cat_estatusDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_estatus SET ";
//if($siga_cat_estatusDto->getId_Estatus()!=""){
//$sql.="Id_Estatus='".$siga_cat_estatusDto->getId_Estatus()."'";
//if(($siga_cat_estatusDto->getId_Area()!="") ||($siga_cat_estatusDto->getDesc_Estatus()!="") ||($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_estatusDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_estatusDto->getId_Area()."'";
if(($siga_cat_estatusDto->getDesc_Estatus()!="") ||($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getDesc_Estatus()!=""){
$sql.="Desc_Estatus='".$siga_cat_estatusDto->getDesc_Estatus()."'";
if(($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_estatusDto->getFech_Inser()."'";
if(($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_estatusDto->getUsr_Inser()."'";
if(($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_cat_estatusDto->getFech_Mod()."";
if(($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_estatusDto->getUsr_Mod()."'";
if(($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_estatusDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='1'";
}
$sql.=" WHERE Id_Estatus='".$siga_cat_estatusDto->getId_Estatus()."'";



$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_estatusDTO();
$tmp->setId_Estatus($siga_cat_estatusDto->getId_Estatus());
$tmp = $this->selectSiga_cat_estatus($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_estatus($siga_cat_estatusDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_estatus  WHERE Id_Estatus='".$siga_cat_estatusDto->getId_Estatus()."'";
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
public function selectSiga_cat_estatus($siga_cat_estatusDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Estatus,Id_Area,Desc_Estatus,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cat_estatus ";

if($siga_cat_estatusDto->getSolo_Juridico()=="6"){
	$sql.=" WHERE Id_Area in(6) ";
} else if($siga_cat_estatusDto->getSolo_Juridico()=="7") {
	$sql.=" WHERE Id_Area in(7) ";
} else if($siga_cat_estatusDto->getSolo_Juridico()=="8") {
    $sql.=" WHERE Id_Area in(8) ";
} else if($siga_cat_estatusDto->getSolo_Juridico()=="2") {
    $sql.=" WHERE Id_Area in(5) ";
} else if($siga_cat_estatusDto->getSolo_Juridico()=="1") {
    $sql.=" WHERE Id_Area in(1) ";
} else {
    $sql.=" WHERE Id_Area in(5) ";
}

if(($siga_cat_estatusDto->getId_Estatus()!="") ||($siga_cat_estatusDto->getId_Area()!="") ||($siga_cat_estatusDto->getDesc_Estatus()!="") ||($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
	$sql.=" and ";	
}

if($siga_cat_estatusDto->getId_Estatus()!=""){
$sql.="Id_Estatus='".$siga_cat_estatusDto->getId_Estatus()."'";
if(($siga_cat_estatusDto->getId_Area()!="") ||($siga_cat_estatusDto->getDesc_Estatus()!="") ||($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_estatusDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_estatusDto->getId_Area()."'";
if(($siga_cat_estatusDto->getDesc_Estatus()!="") ||($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_estatusDto->getDesc_Estatus()!=""){
$sql.="Desc_Estatus='".$siga_cat_estatusDto->getDesc_Estatus()."'";
if(($siga_cat_estatusDto->getFech_Inser()!="") ||($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_estatusDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_estatusDto->getFech_Inser()."'";
if(($siga_cat_estatusDto->getUsr_Inser()!="") ||($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_estatusDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_estatusDto->getUsr_Inser()."'";
if(($siga_cat_estatusDto->getFech_Mod()!="") ||($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_estatusDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_estatusDto->getFech_Mod()."'";
if(($siga_cat_estatusDto->getUsr_Mod()!="") ||($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_estatusDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_estatusDto->getUsr_Mod()."'";
if(($siga_cat_estatusDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_estatusDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <> '3'";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
//echo $sql;
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
$tmp = [];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_cat_estatusDTO();
$tmp[$contador]->setId_Estatus($row["Id_Estatus"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setDesc_Estatus($row["Desc_Estatus"]);
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