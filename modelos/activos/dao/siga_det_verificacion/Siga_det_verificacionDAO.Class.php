<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_det_verificacion/Siga_det_verificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_det_verificacionDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_det_verificacion($siga_det_verificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}

$Idmaximo="";
//Obtengo el Id Maximo
$valormaximo=" select CASE when max(Id_Det_Verficacion+1) IS NULL then 1 else (max(Id_Det_Verficacion + 1)) end as IndiceMaximo from siga_det_verificacion ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_det_verificacion on ";

$sql.="INSERT INTO siga_det_verificacion(";
$sql.="Id_Det_Verficacion";
$sql.=",";
$sql.="Id_Verificacion";
$sql.=",";
$sql.="Id_Activo";
$sql.=",";
$sql.="Fech_Inser";
$sql.=",";
$sql.="Usr_Inser";
$sql.=",";
$sql.="Fech_Mod";
$sql.=",";
$sql.="Usr_Mod";
$sql.=",";
$sql.="Estatus_Reg";
$sql.=") VALUES(";
$sql.="'".$Idmaximo."'";
$sql.=",";
$sql.="'".$siga_det_verificacionDto->getId_Verificacion()."'";
$sql.=",";
$sql.="'".$siga_det_verificacionDto->getId_Activo()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_det_verificacionDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_det_verificacionDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_det_verificacionDto->getEstatus_Reg()."'";
$sql.=")";
//
$sql.=" set identity_insert siga_det_verificacion off ";
//
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}
if (!$this->_proveedor->error()) {
$tmp = new Siga_det_verificacionDTO();
$tmp->setId_Det_Verficacion($this->_proveedor->lastID());
$tmp = $this->selectSiga_det_verificacion($tmp,"",$this->_proveedor);
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
public function updateSiga_det_verificacion($siga_det_verificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_det_verificacion SET ";
if($siga_det_verificacionDto->getId_Det_Verficacion()!=""){
$sql.="Id_Det_Verficacion='".$siga_det_verificacionDto->getId_Det_Verficacion()."'";
if(($siga_det_verificacionDto->getId_Verificacion()!="") ||($siga_det_verificacionDto->getId_Activo()!="") ||($siga_det_verificacionDto->getFech_Inser()!="") ||($siga_det_verificacionDto->getUsr_Inser()!="") ||($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_verificacionDto->getId_Verificacion()!=""){
$sql.="Id_Verificacion='".$siga_det_verificacionDto->getId_Verificacion()."'";
if(($siga_det_verificacionDto->getId_Activo()!="") ||($siga_det_verificacionDto->getFech_Inser()!="") ||($siga_det_verificacionDto->getUsr_Inser()!="") ||($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_verificacionDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_det_verificacionDto->getId_Activo()."'";
if(($siga_det_verificacionDto->getFech_Inser()!="") ||($siga_det_verificacionDto->getUsr_Inser()!="") ||($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_verificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_det_verificacionDto->getFech_Inser()."'";
if(($siga_det_verificacionDto->getUsr_Inser()!="") ||($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_verificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_det_verificacionDto->getUsr_Inser()."'";
if(($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_verificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_det_verificacionDto->getFech_Mod()."'";
if(($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_verificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_det_verificacionDto->getUsr_Mod()."'";
if(($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_det_verificacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_det_verificacionDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Det_Verficacion='".$siga_det_verificacionDto->getId_Det_Verficacion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_det_verificacionDTO();
$tmp->setId_Det_Verficacion($siga_det_verificacionDto->getId_Det_Verficacion());
$tmp = $this->selectSiga_det_verificacion($tmp,"",$this->_proveedor);
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
public function deleteSiga_det_verificacion($siga_det_verificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_det_verificacion  WHERE Id_Det_Verficacion='".$siga_det_verificacionDto->getId_Det_Verficacion()."'";
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
public function selectSiga_det_verificacion($siga_det_verificacionDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Det_Verficacion,Id_Verificacion,Id_Activo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_det_verificacion ";
if(($siga_det_verificacionDto->getId_Det_Verficacion()!="") ||($siga_det_verificacionDto->getId_Verificacion()!="") ||($siga_det_verificacionDto->getId_Activo()!="") ||($siga_det_verificacionDto->getFech_Inser()!="") ||($siga_det_verificacionDto->getUsr_Inser()!="") ||($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_det_verificacionDto->getId_Det_Verficacion()!=""){
$sql.="Id_Det_Verficacion='".$siga_det_verificacionDto->getId_Det_Verficacion()."'";
if(($siga_det_verificacionDto->getId_Verificacion()!="") ||($siga_det_verificacionDto->getId_Activo()!="") ||($siga_det_verificacionDto->getFech_Inser()!="") ||($siga_det_verificacionDto->getUsr_Inser()!="") ||($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_verificacionDto->getId_Verificacion()!=""){
$sql.="Id_Verificacion='".$siga_det_verificacionDto->getId_Verificacion()."'";
if(($siga_det_verificacionDto->getId_Activo()!="") ||($siga_det_verificacionDto->getFech_Inser()!="") ||($siga_det_verificacionDto->getUsr_Inser()!="") ||($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_verificacionDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_det_verificacionDto->getId_Activo()."'";
if(($siga_det_verificacionDto->getFech_Inser()!="") ||($siga_det_verificacionDto->getUsr_Inser()!="") ||($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_verificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_det_verificacionDto->getFech_Inser()."'";
if(($siga_det_verificacionDto->getUsr_Inser()!="") ||($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_verificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_det_verificacionDto->getUsr_Inser()."'";
if(($siga_det_verificacionDto->getFech_Mod()!="") ||($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_verificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_det_verificacionDto->getFech_Mod()."'";
if(($siga_det_verificacionDto->getUsr_Mod()!="") ||($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_verificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_det_verificacionDto->getUsr_Mod()."'";
if(($siga_det_verificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_det_verificacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_det_verificacionDto->getEstatus_Reg()."'";
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
$tmp[$contador] = new Siga_det_verificacionDTO();
$tmp[$contador]->setId_Det_Verficacion($row["Id_Det_Verficacion"]);
$tmp[$contador]->setId_Verificacion($row["Id_Verificacion"]);
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
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