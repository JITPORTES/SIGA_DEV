<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_prestamo_proceso/Siga_cat_prestamo_procesoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_prestamo_procesoDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_prestamo_proceso($siga_cat_prestamo_procesoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_prestamo_proceso(";
if($siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()!=""){
$sql.="Id_Estatus_Proceso";
if(($siga_cat_prestamo_procesoDto->getDesc_Proceso()!="") ){
$sql.=",";
}
}
if($siga_cat_prestamo_procesoDto->getDesc_Proceso()!=""){
$sql.="Desc_Proceso";
}
$sql.=") VALUES(";
if($siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()!=""){
$sql.="'".$siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()."'";
if(($siga_cat_prestamo_procesoDto->getDesc_Proceso()!="") ){
$sql.=",";
}
}
if($siga_cat_prestamo_procesoDto->getDesc_Proceso()!=""){
$sql.="'".$siga_cat_prestamo_procesoDto->getDesc_Proceso()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_prestamo_procesoDTO();
$tmp->setId_Estatus_Proceso($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_prestamo_proceso($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_prestamo_proceso($siga_cat_prestamo_procesoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_prestamo_proceso SET ";
if($siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()!=""){
$sql.="Id_Estatus_Proceso='".$siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()."'";
if(($siga_cat_prestamo_procesoDto->getDesc_Proceso()!="") ){
$sql.=",";
}
}
if($siga_cat_prestamo_procesoDto->getDesc_Proceso()!=""){
$sql.="Desc_Proceso='".$siga_cat_prestamo_procesoDto->getDesc_Proceso()."'";
}
$sql.=" WHERE Id_Estatus_Proceso='".$siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_prestamo_procesoDTO();
$tmp->setId_Estatus_Proceso($siga_cat_prestamo_procesoDto->getId_Estatus_Proceso());
$tmp = $this->selectSiga_cat_prestamo_proceso($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_prestamo_proceso($siga_cat_prestamo_procesoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_prestamo_proceso  WHERE Id_Estatus_Proceso='".$siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()."'";
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
public function selectSiga_cat_prestamo_proceso($siga_cat_prestamo_procesoDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Estatus_Proceso,Desc_Proceso FROM siga_cat_prestamo_proceso ";
if(($siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()!="") ||($siga_cat_prestamo_procesoDto->getDesc_Proceso()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()!=""){
$sql.="Id_Estatus_Proceso='".$siga_cat_prestamo_procesoDto->getId_Estatus_Proceso()."'";
if(($siga_cat_prestamo_procesoDto->getDesc_Proceso()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_prestamo_procesoDto->getDesc_Proceso()!=""){
$sql.="Desc_Proceso='".$siga_cat_prestamo_procesoDto->getDesc_Proceso()."'";
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
$tmp[$contador] = new Siga_cat_prestamo_procesoDTO();
$tmp[$contador]->setId_Estatus_Proceso($row["Id_Estatus_Proceso"]);
$tmp[$contador]->setDesc_Proceso($row["Desc_Proceso"]);
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