<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_ticket_usuarios_vip/Siga_ticket_usuarios_vipDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_ticket_usuarios_vipDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_ticket_usuarios_vip($siga_ticket_usuarios_vipDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_ticket_usuarios_vip(";
if($siga_ticket_usuarios_vipDto->getId_Usuario_Vip()!=""){
$sql.="Id_Usuario_Vip";
if(($siga_ticket_usuarios_vipDto->getId_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getNo_Empleado()!="") ||($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getId_Usuario()!=""){
$sql.="Id_Usuario";
if(($siga_ticket_usuarios_vipDto->getNo_Empleado()!="") ||($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getNo_Empleado()!=""){
$sql.="No_Empleado";
if(($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getNombre_Usuario()!=""){
$sql.="Nombre_Usuario";
if(($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_ticket_usuarios_vipDto->getId_Usuario_Vip()!=""){
$sql.="'".$siga_ticket_usuarios_vipDto->getId_Usuario_Vip()."'";
if(($siga_ticket_usuarios_vipDto->getId_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getNo_Empleado()!="") ||($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getId_Usuario()!=""){
$sql.="'".$siga_ticket_usuarios_vipDto->getId_Usuario()."'";
if(($siga_ticket_usuarios_vipDto->getNo_Empleado()!="") ||($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getNo_Empleado()!=""){
$sql.="'".$siga_ticket_usuarios_vipDto->getNo_Empleado()."'";
if(($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getNombre_Usuario()!=""){
$sql.="'".$siga_ticket_usuarios_vipDto->getNombre_Usuario()."'";
if(($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getFech_Inser()!=""){
$sql.="'".$siga_ticket_usuarios_vipDto->getFech_Inser()."'";
if(($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getUsr_Inser()!=""){
$sql.="'".$siga_ticket_usuarios_vipDto->getUsr_Inser()."'";
if(($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getFech_Mod()!=""){
$sql.="'".$siga_ticket_usuarios_vipDto->getFech_Mod()."'";
if(($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getUsr_Mod()!=""){
$sql.="'".$siga_ticket_usuarios_vipDto->getUsr_Mod()."'";
if(($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getEstatus_Reg()!=""){
$sql.="'".$siga_ticket_usuarios_vipDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_ticket_usuarios_vipDTO();
$tmp->setId_Usuario_Vip($this->_proveedor->lastID());
$tmp = $this->selectSiga_ticket_usuarios_vip($tmp,"",$this->_proveedor);
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
public function updateSiga_ticket_usuarios_vip($siga_ticket_usuarios_vipDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_ticket_usuarios_vip SET ";
if($siga_ticket_usuarios_vipDto->getId_Usuario_Vip()!=""){
$sql.="Id_Usuario_Vip='".$siga_ticket_usuarios_vipDto->getId_Usuario_Vip()."'";
if(($siga_ticket_usuarios_vipDto->getId_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getNo_Empleado()!="") ||($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_ticket_usuarios_vipDto->getId_Usuario()."'";
if(($siga_ticket_usuarios_vipDto->getNo_Empleado()!="") ||($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getNo_Empleado()!=""){
$sql.="No_Empleado='".$siga_ticket_usuarios_vipDto->getNo_Empleado()."'";
if(($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getNombre_Usuario()!=""){
$sql.="Nombre_Usuario='".$siga_ticket_usuarios_vipDto->getNombre_Usuario()."'";
if(($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_ticket_usuarios_vipDto->getFech_Inser()."'";
if(($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_ticket_usuarios_vipDto->getUsr_Inser()."'";
if(($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_ticket_usuarios_vipDto->getFech_Mod()."'";
if(($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_ticket_usuarios_vipDto->getUsr_Mod()."'";
if(($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_usuarios_vipDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_ticket_usuarios_vipDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Usuario_Vip='".$siga_ticket_usuarios_vipDto->getId_Usuario_Vip()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_ticket_usuarios_vipDTO();
$tmp->setId_Usuario_Vip($siga_ticket_usuarios_vipDto->getId_Usuario_Vip());
$tmp = $this->selectSiga_ticket_usuarios_vip($tmp,"",$this->_proveedor);
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
public function deleteSiga_ticket_usuarios_vip($siga_ticket_usuarios_vipDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_ticket_usuarios_vip  WHERE Id_Usuario_Vip='".$siga_ticket_usuarios_vipDto->getId_Usuario_Vip()."'";
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
public function selectSiga_ticket_usuarios_vip($siga_ticket_usuarios_vipDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Usuario_Vip,Id_Usuario,No_Empleado,Nombre_Usuario,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_ticket_usuarios_vip ";
if(($siga_ticket_usuarios_vipDto->getId_Usuario_Vip()!="") ||($siga_ticket_usuarios_vipDto->getId_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getNo_Empleado()!="") ||($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_ticket_usuarios_vipDto->getId_Usuario_Vip()!=""){
$sql.="Id_Usuario_Vip='".$siga_ticket_usuarios_vipDto->getId_Usuario_Vip()."'";
if(($siga_ticket_usuarios_vipDto->getId_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getNo_Empleado()!="") ||($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_usuarios_vipDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_ticket_usuarios_vipDto->getId_Usuario()."'";
if(($siga_ticket_usuarios_vipDto->getNo_Empleado()!="") ||($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_usuarios_vipDto->getNo_Empleado()!=""){
$sql.="No_Empleado='".$siga_ticket_usuarios_vipDto->getNo_Empleado()."'";
if(($siga_ticket_usuarios_vipDto->getNombre_Usuario()!="") ||($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_usuarios_vipDto->getNombre_Usuario()!=""){
$sql.="Nombre_Usuario='".$siga_ticket_usuarios_vipDto->getNombre_Usuario()."'";
if(($siga_ticket_usuarios_vipDto->getFech_Inser()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_usuarios_vipDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_ticket_usuarios_vipDto->getFech_Inser()."'";
if(($siga_ticket_usuarios_vipDto->getUsr_Inser()!="") ||($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_usuarios_vipDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_ticket_usuarios_vipDto->getUsr_Inser()."'";
if(($siga_ticket_usuarios_vipDto->getFech_Mod()!="") ||($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_usuarios_vipDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_ticket_usuarios_vipDto->getFech_Mod()."'";
if(($siga_ticket_usuarios_vipDto->getUsr_Mod()!="") ||($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_usuarios_vipDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_ticket_usuarios_vipDto->getUsr_Mod()."'";
if(($siga_ticket_usuarios_vipDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_usuarios_vipDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_ticket_usuarios_vipDTO();
$tmp[$contador]->setId_Usuario_Vip($row["Id_Usuario_Vip"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setNo_Empleado(rtrim(ltrim($row["No_Empleado"])));
$tmp[$contador]->setNombre_Usuario(rtrim(ltrim($row["Nombre_Usuario"])));
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