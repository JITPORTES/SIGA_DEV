<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/CambioVida/CambioVidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class CambioVidaDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertCambioVida($CambioVidaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO CambioVida(";
if($CambioVidaDto->getId_cambiovida()!=""){
$sql.="Id_cambiovida";
if(($CambioVidaDto->getFechacambio()!="") ||($CambioVidaDto->getNuevosmeses()!="") ||($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getFechacambio()!=""){
$sql.="fechacambio";
if(($CambioVidaDto->getNuevosmeses()!="") ||($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getNuevosmeses()!=""){
$sql.="nuevosmeses";
if(($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getSaldoMOI()!=""){
$sql.="saldoMOI";
if(($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getSaldoDepreciacion()!=""){
$sql.="saldoDepreciacion";
if(($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getId_Activo()!=""){
$sql.="Id_Activo";
if(($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getFechaalta()!=""){
$sql.="fechaalta";
if(($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getTipoDepreciacion()!=""){
$sql.="TipoDepreciacion";
}
$sql.=") VALUES(";
if($CambioVidaDto->getId_cambiovida()!=""){
$sql.="'".$CambioVidaDto->getId_cambiovida()."'";
if(($CambioVidaDto->getFechacambio()!="") ||($CambioVidaDto->getNuevosmeses()!="") ||($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getFechacambio()!=""){
$sql.="'".$CambioVidaDto->getFechacambio()."'";
if(($CambioVidaDto->getNuevosmeses()!="") ||($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getNuevosmeses()!=""){
$sql.="'".$CambioVidaDto->getNuevosmeses()."'";
if(($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getSaldoMOI()!=""){
$sql.="'".$CambioVidaDto->getSaldoMOI()."'";
if(($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getSaldoDepreciacion()!=""){
$sql.="'".$CambioVidaDto->getSaldoDepreciacion()."'";
if(($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getId_Activo()!=""){
$sql.="'".$CambioVidaDto->getId_Activo()."'";
if(($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getFechaalta()!=""){
$sql.="'".$CambioVidaDto->getFechaalta()."'";
if(($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getTipoDepreciacion()!=""){
$sql.="'".$CambioVidaDto->getTipoDepreciacion()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new CambioVidaDTO();
$tmp->setId_cambiovida($this->_proveedor->lastID());
$tmp = $this->selectCambioVida($tmp,"",$this->_proveedor);
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
public function updateCambioVida($CambioVidaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE CambioVida SET ";
if($CambioVidaDto->getId_cambiovida()!=""){
$sql.="Id_cambiovida='".$CambioVidaDto->getId_cambiovida()."'";
if(($CambioVidaDto->getFechacambio()!="") ||($CambioVidaDto->getNuevosmeses()!="") ||($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getFechacambio()!=""){
$sql.="fechacambio='".$CambioVidaDto->getFechacambio()."'";
if(($CambioVidaDto->getNuevosmeses()!="") ||($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getNuevosmeses()!=""){
$sql.="nuevosmeses='".$CambioVidaDto->getNuevosmeses()."'";
if(($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getSaldoMOI()!=""){
$sql.="saldoMOI='".$CambioVidaDto->getSaldoMOI()."'";
if(($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getSaldoDepreciacion()!=""){
$sql.="saldoDepreciacion='".$CambioVidaDto->getSaldoDepreciacion()."'";
if(($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getId_Activo()!=""){
$sql.="Id_Activo='".$CambioVidaDto->getId_Activo()."'";
if(($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getFechaalta()!=""){
$sql.="fechaalta='".$CambioVidaDto->getFechaalta()."'";
if(($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=",";
}
}
if($CambioVidaDto->getTipoDepreciacion()!=""){
$sql.="TipoDepreciacion='".$CambioVidaDto->getTipoDepreciacion()."'";
}
$sql.=" WHERE Id_cambiovida='".$CambioVidaDto->getId_cambiovida()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new CambioVidaDTO();
$tmp->setId_cambiovida($CambioVidaDto->getId_cambiovida());
$tmp = $this->selectCambioVida($tmp,"",$this->_proveedor);
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
public function deleteCambioVida($CambioVidaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM CambioVida  WHERE Id_cambiovida='".$CambioVidaDto->getId_cambiovida()."'";
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
public function selectCambioVida($CambioVidaDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_cambiovida,fechacambio,nuevosmeses,saldoMOI,saldoDepreciacion,Id_Activo,fechaalta,TipoDepreciacion FROM CambioVida ";
if(($CambioVidaDto->getId_cambiovida()!="") ||($CambioVidaDto->getFechacambio()!="") ||($CambioVidaDto->getNuevosmeses()!="") ||($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=" WHERE ";
}
if($CambioVidaDto->getId_cambiovida()!=""){
$sql.="Id_cambiovida='".$CambioVidaDto->getId_cambiovida()."'";
if(($CambioVidaDto->getFechacambio()!="") ||($CambioVidaDto->getNuevosmeses()!="") ||($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=" AND ";
}
}
if($CambioVidaDto->getFechacambio()!=""){
$sql.="fechacambio='".$CambioVidaDto->getFechacambio()."'";
if(($CambioVidaDto->getNuevosmeses()!="") ||($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=" AND ";
}
}
if($CambioVidaDto->getNuevosmeses()!=""){
$sql.="nuevosmeses='".$CambioVidaDto->getNuevosmeses()."'";
if(($CambioVidaDto->getSaldoMOI()!="") ||($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=" AND ";
}
}
if($CambioVidaDto->getSaldoMOI()!=""){
$sql.="saldoMOI='".$CambioVidaDto->getSaldoMOI()."'";
if(($CambioVidaDto->getSaldoDepreciacion()!="") ||($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=" AND ";
}
}
if($CambioVidaDto->getSaldoDepreciacion()!=""){
$sql.="saldoDepreciacion='".$CambioVidaDto->getSaldoDepreciacion()."'";
if(($CambioVidaDto->getId_Activo()!="") ||($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=" AND ";
}
}
if($CambioVidaDto->getId_Activo()!=""){
$sql.="Id_Activo='".$CambioVidaDto->getId_Activo()."'";
if(($CambioVidaDto->getFechaalta()!="") ||($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=" AND ";
}
}
if($CambioVidaDto->getFechaalta()!=""){
$sql.="fechaalta='".$CambioVidaDto->getFechaalta()."'";
if(($CambioVidaDto->getTipoDepreciacion()!="") ){
$sql.=" AND ";
}
}
if($CambioVidaDto->getTipoDepreciacion()!=""){
$sql.="TipoDepreciacion='".$CambioVidaDto->getTipoDepreciacion()."'";
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
$tmp[$contador] = new CambioVidaDTO();
$tmp[$contador]->setId_cambiovida($row["Id_cambiovida"]);
$tmp[$contador]->setFechacambio($row["fechacambio"]);
$tmp[$contador]->setNuevosmeses($row["nuevosmeses"]);
$tmp[$contador]->setSaldoMOI($row["saldoMOI"]);
$tmp[$contador]->setSaldoDepreciacion($row["saldoDepreciacion"]);
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
$tmp[$contador]->setFechaalta($row["fechaalta"]);
$tmp[$contador]->setTipoDepreciacion($row["TipoDepreciacion"]);
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