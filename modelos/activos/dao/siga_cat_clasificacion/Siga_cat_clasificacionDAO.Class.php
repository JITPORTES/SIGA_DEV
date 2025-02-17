<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_clasificacion/Siga_cat_clasificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_clasificacionDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_clasificacion($siga_cat_clasificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_clasificacion(";
//if($siga_cat_clasificacionDto->getId_Clasificacion()!=""){
//$sql.="Id_Clasificacion";
//if(($siga_cat_clasificacionDto->getId_Clase()!="") ||($siga_cat_clasificacionDto->getDesc_Clasificacion()!="") ||($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_clasificacionDto->getId_Clase()!=""){
$sql.="Id_Clase";
if(($siga_cat_clasificacionDto->getDesc_Clasificacion()!="") ||($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getDesc_Clasificacion()!=""){
$sql.="Desc_Clasificacion";
if(($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
//if($siga_cat_clasificacionDto->getId_Clasificacion()!=""){
//$sql.="'".$siga_cat_clasificacionDto->getId_Clasificacion()."'";
//if(($siga_cat_clasificacionDto->getId_Clase()!="") ||($siga_cat_clasificacionDto->getDesc_Clasificacion()!="") ||($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_clasificacionDto->getId_Clase()!=""){
$sql.="'".$siga_cat_clasificacionDto->getId_Clase()."'";
if(($siga_cat_clasificacionDto->getDesc_Clasificacion()!="") ||($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getDesc_Clasificacion()!=""){
$sql.="'".$siga_cat_clasificacionDto->getDesc_Clasificacion()."'";
if(($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getFech_Inser()!=""){
$sql.="".$siga_cat_clasificacionDto->getFech_Inser()."";
if(($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getUsr_Inser()!=""){
$sql.="'".$siga_cat_clasificacionDto->getUsr_Inser()."'";
if(($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getFech_Mod()!=""){
$sql.="".$siga_cat_clasificacionDto->getFech_Mod()."";
if(($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getUsr_Mod()!=""){
$sql.="'".$siga_cat_clasificacionDto->getUsr_Mod()."'";
if(($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cat_clasificacionDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_clasificacionDTO();
$tmp->setId_Clasificacion($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_clasificacion($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_clasificacion($siga_cat_clasificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_clasificacion SET ";
//if($siga_cat_clasificacionDto->getId_Clasificacion()!=""){
//$sql.="Id_Clasificacion='".$siga_cat_clasificacionDto->getId_Clasificacion()."'";
//if(($siga_cat_clasificacionDto->getId_Clase()!="") ||($siga_cat_clasificacionDto->getDesc_Clasificacion()!="") ||($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_clasificacionDto->getId_Clase()!=""){
$sql.="Id_Clase='".$siga_cat_clasificacionDto->getId_Clase()."'";
if(($siga_cat_clasificacionDto->getDesc_Clasificacion()!="") ||($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getDesc_Clasificacion()!=""){
$sql.="Desc_Clasificacion='".$siga_cat_clasificacionDto->getDesc_Clasificacion()."'";
if(($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_clasificacionDto->getFech_Inser()."'";
if(($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_clasificacionDto->getUsr_Inser()."'";
if(($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_cat_clasificacionDto->getFech_Mod()."";
if(($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_clasificacionDto->getUsr_Mod()."'";
if(($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_clasificacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_clasificacionDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Clasificacion='".$siga_cat_clasificacionDto->getId_Clasificacion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_clasificacionDTO();
$tmp->setId_Clasificacion($siga_cat_clasificacionDto->getId_Clasificacion());
$tmp = $this->selectSiga_cat_clasificacion($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_clasificacion($siga_cat_clasificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_clasificacion  WHERE Id_Clasificacion='".$siga_cat_clasificacionDto->getId_Clasificacion()."'";
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
public function selectSiga_cat_clasificacion($siga_cat_clasificacionDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Clasificacion,Id_Clase,Desc_Clasificacion,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cat_clasificacion ";
if(($siga_cat_clasificacionDto->getId_Clasificacion()!="") ||($siga_cat_clasificacionDto->getId_Clase()!="") ||($siga_cat_clasificacionDto->getDesc_Clasificacion()!="") ||($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_clasificacionDto->getId_Clasificacion()!=""){
$sql.="Id_Clasificacion='".$siga_cat_clasificacionDto->getId_Clasificacion()."'";
if(($siga_cat_clasificacionDto->getId_Clase()!="") ||($siga_cat_clasificacionDto->getDesc_Clasificacion()!="") ||($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_clasificacionDto->getId_Clase()!=""){
$sql.="Id_Clase='".$siga_cat_clasificacionDto->getId_Clase()."'";
if(($siga_cat_clasificacionDto->getDesc_Clasificacion()!="") ||($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_clasificacionDto->getDesc_Clasificacion()!=""){
$sql.="Desc_Clasificacion='".$siga_cat_clasificacionDto->getDesc_Clasificacion()."'";
if(($siga_cat_clasificacionDto->getFech_Inser()!="") ||($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_clasificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_clasificacionDto->getFech_Inser()."'";
if(($siga_cat_clasificacionDto->getUsr_Inser()!="") ||($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_clasificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_clasificacionDto->getUsr_Inser()."'";
if(($siga_cat_clasificacionDto->getFech_Mod()!="") ||($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_clasificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_clasificacionDto->getFech_Mod()."'";
if(($siga_cat_clasificacionDto->getUsr_Mod()!="") ||($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_clasificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_clasificacionDto->getUsr_Mod()."'";
if(($siga_cat_clasificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_clasificacionDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_cat_clasificacionDTO();
$tmp[$contador]->setId_Clasificacion($row["Id_Clasificacion"]);
$tmp[$contador]->setId_Clase($row["Id_Clase"]);
$tmp[$contador]->setDesc_Clasificacion($row["Desc_Clasificacion"]);
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