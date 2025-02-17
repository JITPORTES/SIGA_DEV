<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/tblformulas/TblformulasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class TblformulasDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertTblformulas($tblformulasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO tblformulas(";
if($tblformulasDto->getId_formula()!=""){
$sql.="id_formula";
if(($tblformulasDto->getNombre()!="") ||($tblformulasDto->getFormula()!="") ||($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getNombre()!=""){
$sql.="Nombre";
if(($tblformulasDto->getFormula()!="") ||($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getFormula()!=""){
$sql.="Formula";
if(($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getDescripcion()!=""){
$sql.="Descripcion";
if(($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($tblformulasDto->getId_formula()!=""){
$sql.="'".$tblformulasDto->getId_formula()."'";
if(($tblformulasDto->getNombre()!="") ||($tblformulasDto->getFormula()!="") ||($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getNombre()!=""){
$sql.="'".$tblformulasDto->getNombre()."'";
if(($tblformulasDto->getFormula()!="") ||($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getFormula()!=""){
$sql.="'".$tblformulasDto->getFormula()."'";
if(($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getDescripcion()!=""){
$sql.="'".$tblformulasDto->getDescripcion()."'";
if(($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getFech_Inser()!=""){
$sql.="'".$tblformulasDto->getFech_Inser()."'";
if(($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getUsr_Inser()!=""){
$sql.="'".$tblformulasDto->getUsr_Inser()."'";
if(($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getFech_Mod()!=""){
$sql.="'".$tblformulasDto->getFech_Mod()."'";
if(($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getUsr_Mod()!=""){
$sql.="'".$tblformulasDto->getUsr_Mod()."'";
if(($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getEstatus_Reg()!=""){
$sql.="'".$tblformulasDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new TblformulasDTO();
$tmp->setid_formula($this->_proveedor->lastID());
$tmp = $this->selectTblformulas($tmp,"",$this->_proveedor);
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
public function updateTblformulas($tblformulasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE tblformulas SET ";
if($tblformulasDto->getId_formula()!=""){
$sql.="id_formula='".$tblformulasDto->getId_formula()."'";
if(($tblformulasDto->getNombre()!="") ||($tblformulasDto->getFormula()!="") ||($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getNombre()!=""){
$sql.="Nombre='".$tblformulasDto->getNombre()."'";
if(($tblformulasDto->getFormula()!="") ||($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getFormula()!=""){
$sql.="Formula='".$tblformulasDto->getFormula()."'";
if(($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getDescripcion()!=""){
$sql.="Descripcion='".$tblformulasDto->getDescripcion()."'";
if(($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$tblformulasDto->getFech_Inser()."'";
if(($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$tblformulasDto->getUsr_Inser()."'";
if(($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$tblformulasDto->getFech_Mod()."'";
if(($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$tblformulasDto->getUsr_Mod()."'";
if(($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($tblformulasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$tblformulasDto->getEstatus_Reg()."'";
}
$sql.=" WHERE ='".$tblformulasDto->get()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new TblformulasDTO();
$tmp->set($tblformulasDto->get());
$tmp = $this->selectTblformulas($tmp,"",$this->_proveedor);
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
public function deleteTblformulas($tblformulasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM tblformulas  WHERE ='".$tblformulasDto->get()."'";
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
public function selectTblformulas($tblformulasDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT id_formula,Nombre,Formula,Descripcion,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM tblformulas ";
if(($tblformulasDto->getId_formula()!="") ||($tblformulasDto->getNombre()!="") ||($tblformulasDto->getFormula()!="") ||($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($tblformulasDto->getId_formula()!=""){
$sql.="id_formula='".$tblformulasDto->getId_formula()."'";
if(($tblformulasDto->getNombre()!="") ||($tblformulasDto->getFormula()!="") ||($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblformulasDto->getNombre()!=""){
$sql.="Nombre='".$tblformulasDto->getNombre()."'";
if(($tblformulasDto->getFormula()!="") ||($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblformulasDto->getFormula()!=""){
$sql.="Formula='".$tblformulasDto->getFormula()."'";
if(($tblformulasDto->getDescripcion()!="") ||($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblformulasDto->getDescripcion()!=""){
$sql.="Descripcion='".$tblformulasDto->getDescripcion()."'";
if(($tblformulasDto->getFech_Inser()!="") ||($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblformulasDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$tblformulasDto->getFech_Inser()."'";
if(($tblformulasDto->getUsr_Inser()!="") ||($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblformulasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$tblformulasDto->getUsr_Inser()."'";
if(($tblformulasDto->getFech_Mod()!="") ||($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblformulasDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$tblformulasDto->getFech_Mod()."'";
if(($tblformulasDto->getUsr_Mod()!="") ||($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblformulasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$tblformulasDto->getUsr_Mod()."'";
if(($tblformulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($tblformulasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$tblformulasDto->getEstatus_Reg()."'";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new TblformulasDTO();
$tmp[$contador]->setId_formula($row["id_formula"]);
$tmp[$contador]->setNombre($row["Nombre"]);
$tmp[$contador]->setFormula($row["Formula"]);
$tmp[$contador]->setDescripcion($row["Descripcion"]);
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