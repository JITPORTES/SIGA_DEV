<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_ticket_subseccion/Siga_cat_ticket_subseccionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_subseccionDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_ticket_subseccion($siga_cat_ticket_subseccionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_ticket_subseccion(";
//if($siga_cat_ticket_subseccionDto->getId_Subseccion()!=""){
//$sql.="Id_Subseccion";
//if(($siga_cat_ticket_subseccionDto->getDesc_Subseccion()!="") ||($siga_cat_ticket_subseccionDto->getId_Seccion()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_subseccionDto->getDesc_Subseccion()!=""){
$sql.="Desc_Subseccion";
if(($siga_cat_ticket_subseccionDto->getId_Seccion()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_subseccionDto->getId_Seccion()!=""){
$sql.="Id_Seccion";
}
$sql.=") VALUES(";
//if($siga_cat_ticket_subseccionDto->getId_Subseccion()!=""){
//$sql.="'".$siga_cat_ticket_subseccionDto->getId_Subseccion()."'";
//if(($siga_cat_ticket_subseccionDto->getDesc_Subseccion()!="") ||($siga_cat_ticket_subseccionDto->getId_Seccion()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_subseccionDto->getDesc_Subseccion()!=""){
$sql.="'".$siga_cat_ticket_subseccionDto->getDesc_Subseccion()."'";
if(($siga_cat_ticket_subseccionDto->getId_Seccion()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_subseccionDto->getId_Seccion()!=""){
$sql.="'".$siga_cat_ticket_subseccionDto->getId_Seccion()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_subseccionDTO();
$tmp->setId_Subseccion($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_ticket_subseccion($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_ticket_subseccion($siga_cat_ticket_subseccionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_ticket_subseccion SET ";
//if($siga_cat_ticket_subseccionDto->getId_Subseccion()!=""){
//$sql.="Id_Subseccion='".$siga_cat_ticket_subseccionDto->getId_Subseccion()."'";
//if(($siga_cat_ticket_subseccionDto->getDesc_Subseccion()!="") ||($siga_cat_ticket_subseccionDto->getId_Seccion()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_subseccionDto->getDesc_Subseccion()!=""){
$sql.="Desc_Subseccion='".$siga_cat_ticket_subseccionDto->getDesc_Subseccion()."'";
if(($siga_cat_ticket_subseccionDto->getId_Seccion()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_subseccionDto->getId_Seccion()!=""){
$sql.="Id_Seccion='".$siga_cat_ticket_subseccionDto->getId_Seccion()."'";
}
$sql.=" WHERE Id_Subseccion='".$siga_cat_ticket_subseccionDto->getId_Subseccion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_subseccionDTO();
$tmp->setId_Subseccion($siga_cat_ticket_subseccionDto->getId_Subseccion());
$tmp = $this->selectSiga_cat_ticket_subseccion($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_ticket_subseccion($siga_cat_ticket_subseccionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_ticket_subseccion  WHERE Id_Subseccion='".$siga_cat_ticket_subseccionDto->getId_Subseccion()."'";
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
public function selectSiga_cat_ticket_subseccion($siga_cat_ticket_subseccionDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Subseccion,Desc_Subseccion,Id_Seccion FROM siga_cat_ticket_subseccion ";
if(($siga_cat_ticket_subseccionDto->getId_Subseccion()!="") ||($siga_cat_ticket_subseccionDto->getDesc_Subseccion()!="") ||($siga_cat_ticket_subseccionDto->getId_Seccion()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_ticket_subseccionDto->getId_Subseccion()!=""){
$sql.="Id_Subseccion='".$siga_cat_ticket_subseccionDto->getId_Subseccion()."'";
if(($siga_cat_ticket_subseccionDto->getDesc_Subseccion()!="") ||($siga_cat_ticket_subseccionDto->getId_Seccion()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_subseccionDto->getDesc_Subseccion()!=""){
$sql.="Desc_Subseccion='".$siga_cat_ticket_subseccionDto->getDesc_Subseccion()."'";
if(($siga_cat_ticket_subseccionDto->getId_Seccion()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_subseccionDto->getId_Seccion()!=""){
$sql.="Id_Seccion='".$siga_cat_ticket_subseccionDto->getId_Seccion()."'";
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
$tmp[$contador] = new Siga_cat_ticket_subseccionDTO();
$tmp[$contador]->setId_Subseccion($row["Id_Subseccion"]);
$tmp[$contador]->setDesc_Subseccion(rtrim(ltrim($row["Desc_Subseccion"])));
$tmp[$contador]->setId_Seccion($row["Id_Seccion"]);
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