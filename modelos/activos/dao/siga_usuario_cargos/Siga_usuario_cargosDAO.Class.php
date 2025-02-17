<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_usuario_cargos/Siga_usuario_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_usuario_cargosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_usuario_cargos($siga_usuario_cargosDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Usuario_Cargos+1) IS NULL then 1 else (max(Id_Usuario_Cargos + 1)) end as IndiceMaximo from siga_usuario_cargos ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_usuario_cargos on ";
//
$sql.="INSERT INTO siga_usuario_cargos(";
$sql.="Id_Usuario_Cargos";
$sql.=",";
$sql.="Id_Usuario";
$sql.=",";
$sql.="Id_Cargo";
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
$sql.="'".$siga_usuario_cargosDto->getId_Usuario()."'";
$sql.=",";
$sql.="'".$siga_usuario_cargosDto->getId_Cargo()."'";
$sql.=",";
$sql.="".$siga_usuario_cargosDto->getFech_Inser()."";
$sql.=",";
$sql.="'".$siga_usuario_cargosDto->getUsr_Inser()."'";
$sql.=",";
$sql.="'".$siga_usuario_cargosDto->getFech_Mod()."'";
$sql.=",";
$sql.="'".$siga_usuario_cargosDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_usuario_cargosDto->getEstatus_Reg()."'";
$sql.=")";
//
$sql.=" set identity_insert siga_usuario_cargos off ";
//
if($Idmaximo!="")
{
	$this->_proveedor->execute($sql);
}
if (!$this->_proveedor->error()) {
$tmp = new Siga_usuario_cargosDTO();
$tmp->setId_Usuario_Cargos($this->_proveedor->lastID());
$tmp = $this->selectSiga_usuario_cargos($tmp,"",$this->_proveedor);
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
public function updateSiga_usuario_cargos($siga_usuario_cargosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_usuario_cargos SET ";
if($siga_usuario_cargosDto->getId_Usuario_Cargos()!=""){
$sql.="Id_Usuario_Cargos='".$siga_usuario_cargosDto->getId_Usuario_Cargos()."'";
if(($siga_usuario_cargosDto->getId_Usuario()!="") ||($siga_usuario_cargosDto->getId_Cargo()!="") ||($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_cargosDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_usuario_cargosDto->getId_Usuario()."'";
if(($siga_usuario_cargosDto->getId_Cargo()!="") ||($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_cargosDto->getId_Cargo()!=""){
$sql.="Id_Cargo='".$siga_usuario_cargosDto->getId_Cargo()."'";
if(($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_cargosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_usuario_cargosDto->getFech_Inser()."'";
if(($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_cargosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_usuario_cargosDto->getUsr_Inser()."'";
if(($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_cargosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_usuario_cargosDto->getFech_Mod()."'";
if(($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_cargosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_usuario_cargosDto->getUsr_Mod()."'";
if(($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_cargosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_usuario_cargosDto->getEstatus_Reg()."'";
}
$sql.=" WHERE ='".$siga_usuario_cargosDto->get()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_usuario_cargosDTO();
$tmp->set($siga_usuario_cargosDto->get());
$tmp = $this->selectSiga_usuario_cargos($tmp,"",$this->_proveedor);
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
public function deleteSiga_usuario_cargos($siga_usuario_cargosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_usuario_cargos  WHERE ";
if($siga_usuario_cargosDto->getId_Usuario_Cargos()!=""){
$sql.="Id_Usuario_Cargos='".$siga_usuario_cargosDto->getId_Usuario_Cargos()."'";
if(($siga_usuario_cargosDto->getId_Usuario()!="")){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_usuario_cargosDto->getId_Usuario()."'";
}
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
public function selectSiga_usuario_cargos($siga_usuario_cargosDto,$orden="",$proveedor=null){
$tmp = [];
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Usuario_Cargos,Id_Usuario,Id_Cargo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_usuario_cargos ";
if(($siga_usuario_cargosDto->getId_Usuario_Cargos()!="") ||($siga_usuario_cargosDto->getId_Usuario()!="") ||($siga_usuario_cargosDto->getId_Cargo()!="") ||($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_usuario_cargosDto->getId_Usuario_Cargos()!=""){
$sql.="Id_Usuario_Cargos='".$siga_usuario_cargosDto->getId_Usuario_Cargos()."'";
if(($siga_usuario_cargosDto->getId_Usuario()!="") ||($siga_usuario_cargosDto->getId_Cargo()!="") ||($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_usuario_cargosDto->getId_Usuario()."'";
if(($siga_usuario_cargosDto->getId_Cargo()!="") ||($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getId_Cargo()!=""){
$sql.="Id_Cargo='".$siga_usuario_cargosDto->getId_Cargo()."'";
if(($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_usuario_cargosDto->getFech_Inser()."'";
if(($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_usuario_cargosDto->getUsr_Inser()."'";
if(($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_usuario_cargosDto->getFech_Mod()."'";
if(($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_usuario_cargosDto->getUsr_Mod()."'";
if(($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getEstatus_Reg()!=""){
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
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_usuario_cargosDTO();
$tmp[$contador]->setId_Usuario_Cargos($row["Id_Usuario_Cargos"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setId_Cargo($row["Id_Cargo"]);
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
public function selectSiga_cargos($siga_usuario_cargosDto,$orden="",$proveedor=null){
$tmp = [];
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT C.Id_Usuario_Cargos,C.Id_Usuario,C.Id_Cargo,C.Fech_Inser,C.Usr_Inser,C.Fech_Mod,C.Usr_Mod,C.Estatus_Reg, rtrim(ltrim(SC.Nom_Cargo)) as Nom_Cargo, SC.Tipo  FROM siga_usuario_cargos C left join siga_cargos  SC on C.Id_Cargo=SC.Id_Cargo ";
if(($siga_usuario_cargosDto->getId_Usuario_Cargos()!="") ||($siga_usuario_cargosDto->getId_Usuario()!="") ||($siga_usuario_cargosDto->getId_Cargo()!="") ||($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_usuario_cargosDto->getId_Usuario_Cargos()!=""){
$sql.="Id_Usuario_Cargos='".$siga_usuario_cargosDto->getId_Usuario_Cargos()."'";
if(($siga_usuario_cargosDto->getId_Usuario()!="") ||($siga_usuario_cargosDto->getId_Cargo()!="") ||($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_usuario_cargosDto->getId_Usuario()."'";
if(($siga_usuario_cargosDto->getId_Cargo()!="") ||($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getId_Cargo()!=""){
$sql.="Id_Cargo='".$siga_usuario_cargosDto->getId_Cargo()."'";
if(($siga_usuario_cargosDto->getFech_Inser()!="") ||($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_usuario_cargosDto->getFech_Inser()."'";
if(($siga_usuario_cargosDto->getUsr_Inser()!="") ||($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_usuario_cargosDto->getUsr_Inser()."'";
if(($siga_usuario_cargosDto->getFech_Mod()!="") ||($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_usuario_cargosDto->getFech_Mod()."'";
if(($siga_usuario_cargosDto->getUsr_Mod()!="") ||($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_usuario_cargosDto->getUsr_Mod()."'";
if(($siga_usuario_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_cargosDto->getEstatus_Reg()!=""){
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
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_usuario_cargosDTO();
$tmp[$contador]->setId_Usuario_Cargos($row["Id_Usuario_Cargos"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setId_Cargo($row["Id_Cargo"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Tipo"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setNom_Cargo($row["Nom_Cargo"]);
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