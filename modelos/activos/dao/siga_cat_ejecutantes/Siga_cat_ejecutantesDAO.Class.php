<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_ejecutantes/Siga_cat_ejecutantesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ejecutantesDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_ejecutantes($siga_cat_ejecutantesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_ejecutantes(";
$sql.="Id_Area";
$sql.=",";
$sql.="Nombre_Completo";
$sql.=",";
$sql.="Fech_Inser";
$sql.=",";
$sql.="Usr_Inser";
$sql.=",";
$sql.="Estatus_Reg";
$sql.=") VALUES(";
$sql.="'".$siga_cat_ejecutantesDto->getId_Area()."'";
$sql.=",";
$sql.="'".$siga_cat_ejecutantesDto->getNombre_Completo()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_cat_ejecutantesDto->getUsr_Inser()."'";
$sql.=",";
$sql.="'".$siga_cat_ejecutantesDto->getEstatus_Reg()."'";
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ejecutantesDTO();
$tmp->setId_Ejecutante($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_ejecutantes($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_ejecutantes($siga_cat_ejecutantesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_ejecutantes SET ";
$sql.="Nombre_Completo='".$siga_cat_ejecutantesDto->getNombre_Completo()."'";
$sql.=",";
$sql.="Fech_Mod=GETDATE()";
$sql.=",";
$sql.="Usr_Mod='".$siga_cat_ejecutantesDto->getUsr_Mod()."'";
$sql.=",";
$sql.="Estatus_Reg='".$siga_cat_ejecutantesDto->getEstatus_Reg()."'";
$sql.=" WHERE Id_Ejecutante='".$siga_cat_ejecutantesDto->getId_Ejecutante()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ejecutantesDTO();
$tmp->setId_Ejecutante($siga_cat_ejecutantesDto->getId_Ejecutante());
$tmp = $this->selectSiga_cat_ejecutantes($tmp,"",$this->_proveedor);
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


public function deleteSiga_cat_ejecutantes($siga_cat_ejecutantesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_ejecutantes SET ";
$sql.="Fech_Mod=GETDATE()";
$sql.=",";
$sql.="Usr_Mod='".$siga_cat_ejecutantesDto->getUsr_Mod()."'";
$sql.=",";
$sql.="Estatus_Reg='3'";
$sql.=" WHERE Id_Ejecutante='".$siga_cat_ejecutantesDto->getId_Ejecutante()."'";
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

public function selectSiga_cat_ejecutantes($siga_cat_ejecutantesDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Ejecutante,Id_Area,Nombre_Completo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cat_ejecutantes  where Estatus_Reg<>3 ";
if(($siga_cat_ejecutantesDto->getId_Ejecutante()!="") ||($siga_cat_ejecutantesDto->getId_Area()!="") ||($siga_cat_ejecutantesDto->getNombre_Completo()!="") ||($siga_cat_ejecutantesDto->getFech_Inser()!="") ||($siga_cat_ejecutantesDto->getUsr_Inser()!="") ||($siga_cat_ejecutantesDto->getFech_Mod()!="") ||($siga_cat_ejecutantesDto->getUsr_Mod()!="") ||($siga_cat_ejecutantesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
if($siga_cat_ejecutantesDto->getId_Ejecutante()!=""){
$sql.="Id_Ejecutante='".$siga_cat_ejecutantesDto->getId_Ejecutante()."'";
if(($siga_cat_ejecutantesDto->getId_Area()!="") ||($siga_cat_ejecutantesDto->getNombre_Completo()!="") ||($siga_cat_ejecutantesDto->getFech_Inser()!="") ||($siga_cat_ejecutantesDto->getUsr_Inser()!="") ||($siga_cat_ejecutantesDto->getFech_Mod()!="") ||($siga_cat_ejecutantesDto->getUsr_Mod()!="") ||($siga_cat_ejecutantesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ejecutantesDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_ejecutantesDto->getId_Area()."'";
if(($siga_cat_ejecutantesDto->getNombre_Completo()!="") ||($siga_cat_ejecutantesDto->getFech_Inser()!="") ||($siga_cat_ejecutantesDto->getUsr_Inser()!="") ||($siga_cat_ejecutantesDto->getFech_Mod()!="") ||($siga_cat_ejecutantesDto->getUsr_Mod()!="") ||($siga_cat_ejecutantesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ejecutantesDto->getNombre_Completo()!=""){
$sql.="Nombre_Completo='".$siga_cat_ejecutantesDto->getNombre_Completo()."'";
if(($siga_cat_ejecutantesDto->getFech_Inser()!="") ||($siga_cat_ejecutantesDto->getUsr_Inser()!="") ||($siga_cat_ejecutantesDto->getFech_Mod()!="") ||($siga_cat_ejecutantesDto->getUsr_Mod()!="") ||($siga_cat_ejecutantesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ejecutantesDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_ejecutantesDto->getFech_Inser()."'";
if(($siga_cat_ejecutantesDto->getUsr_Inser()!="") ||($siga_cat_ejecutantesDto->getFech_Mod()!="") ||($siga_cat_ejecutantesDto->getUsr_Mod()!="") ||($siga_cat_ejecutantesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ejecutantesDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_ejecutantesDto->getUsr_Inser()."'";
if(($siga_cat_ejecutantesDto->getFech_Mod()!="") ||($siga_cat_ejecutantesDto->getUsr_Mod()!="") ||($siga_cat_ejecutantesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ejecutantesDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_ejecutantesDto->getFech_Mod()."'";
if(($siga_cat_ejecutantesDto->getUsr_Mod()!="") ||($siga_cat_ejecutantesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ejecutantesDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_ejecutantesDto->getUsr_Mod()."'";
if(($siga_cat_ejecutantesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ejecutantesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_ejecutantesDto->getEstatus_Reg()."'";
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
$tmp[$contador] = new Siga_cat_ejecutantesDTO();
$tmp[$contador]->setId_Ejecutante($row["Id_Ejecutante"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setNombre_Completo($row["Nombre_Completo"]);
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