<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_ticket_seccion/Siga_cat_ticket_seccionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_seccionDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_ticket_seccion(";
//if($siga_cat_ticket_seccionDto->getId_Seccion()!=""){
//$sql.="Id_Seccion";
//if(($siga_cat_ticket_seccionDto->getDesc_Seccion()!="") ||($siga_cat_ticket_seccionDto->getId_Area()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_seccionDto->getDesc_Seccion()!=""){
$sql.="Desc_Seccion";
if(($siga_cat_ticket_seccionDto->getId_Area()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_seccionDto->getId_Area()!=""){
$sql.="Id_Area";
}
$sql.=") VALUES(";
//if($siga_cat_ticket_seccionDto->getId_Seccion()!=""){
//$sql.="'".$siga_cat_ticket_seccionDto->getId_Seccion()."'";
//if(($siga_cat_ticket_seccionDto->getDesc_Seccion()!="") ||($siga_cat_ticket_seccionDto->getId_Area()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_seccionDto->getDesc_Seccion()!=""){
$sql.="'".$siga_cat_ticket_seccionDto->getDesc_Seccion()."'";
if(($siga_cat_ticket_seccionDto->getId_Area()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_seccionDto->getId_Area()!=""){
$sql.="'".$siga_cat_ticket_seccionDto->getId_Area()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_seccionDTO();
$tmp->setId_Seccion($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_ticket_seccion($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_ticket_seccion SET ";
//if($siga_cat_ticket_seccionDto->getId_Seccion()!=""){
//$sql.="Id_Seccion='".$siga_cat_ticket_seccionDto->getId_Seccion()."'";
//if(($siga_cat_ticket_seccionDto->getDesc_Seccion()!="") ||($siga_cat_ticket_seccionDto->getId_Area()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_seccionDto->getDesc_Seccion()!=""){
$sql.="Desc_Seccion='".$siga_cat_ticket_seccionDto->getDesc_Seccion()."'";
if(($siga_cat_ticket_seccionDto->getId_Area()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_seccionDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_ticket_seccionDto->getId_Area()."'";
}
$sql.=" WHERE Id_Seccion='".$siga_cat_ticket_seccionDto->getId_Seccion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_seccionDTO();
$tmp->setId_Seccion($siga_cat_ticket_seccionDto->getId_Seccion());
$tmp = $this->selectSiga_cat_ticket_seccion($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_ticket_seccion  WHERE Id_Seccion='".$siga_cat_ticket_seccionDto->getId_Seccion()."'";
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
public function selectSiga_cat_ticket_seccion($siga_cat_ticket_seccionDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Seccion,Desc_Seccion,Id_Area FROM siga_cat_ticket_seccion ";
if(($siga_cat_ticket_seccionDto->getId_Seccion()!="") ||($siga_cat_ticket_seccionDto->getDesc_Seccion()!="") ||($siga_cat_ticket_seccionDto->getId_Area()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_ticket_seccionDto->getId_Seccion()!=""){
$sql.="Id_Seccion='".$siga_cat_ticket_seccionDto->getId_Seccion()."'";
if(($siga_cat_ticket_seccionDto->getDesc_Seccion()!="") ||($siga_cat_ticket_seccionDto->getId_Area()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_seccionDto->getDesc_Seccion()!=""){
$sql.="Desc_Seccion='".$siga_cat_ticket_seccionDto->getDesc_Seccion()."'";
if(($siga_cat_ticket_seccionDto->getId_Area()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_seccionDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_ticket_seccionDto->getId_Area()."'";
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
$tmp[$contador] = new Siga_cat_ticket_seccionDTO();
$tmp[$contador]->setId_Seccion($row["Id_Seccion"]);
$tmp[$contador]->setDesc_Seccion($row["Desc_Seccion"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
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