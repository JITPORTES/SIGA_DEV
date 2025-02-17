<?php
include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_usuario_areas/Siga_usuario_areasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_usuario_areasDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_usuario_areas($siga_usuario_areasDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Usuario_Area+1) IS NULL then 1 else (max(Id_Usuario_Area + 1)) end as IndiceMaximo from siga_usuario_areas ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_usuario_areas on ";
//
$sql.="INSERT INTO siga_usuario_areas(";
$sql.="Id_Usuario_Area";
$sql.=",";
$sql.="Id_Usuario";
$sql.=",";
$sql.="Id_Area";
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
$sql.="'".$siga_usuario_areasDto->getId_Usuario()."'";
$sql.=",";
$sql.="'".$siga_usuario_areasDto->getId_Area()."'";
$sql.=",";
$sql.="".$siga_usuario_areasDto->getFech_Inser()."";
$sql.=",";
$sql.="'".$siga_usuario_areasDto->getUsr_Inser()."'";
$sql.=",";
$sql.="'".$siga_usuario_areasDto->getFech_Mod()."'";
$sql.=",";
$sql.="'".$siga_usuario_areasDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_usuario_areasDto->getEstatus_Reg()."'";
$sql.=")";
//
$sql.=" set identity_insert siga_usuario_areas off ";
//
if($Idmaximo!="")
{
	$this->_proveedor->execute($sql);
}
if (!$this->_proveedor->error()) {
$tmp = new Siga_usuario_areasDTO();
$tmp->setId_Usuario_Area($this->_proveedor->lastID());
$tmp = $this->selectSiga_usuario_areas($tmp,"",$this->_proveedor);
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
public function updateSiga_usuario_areas($siga_usuario_areasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_usuario_areas SET ";
if($siga_usuario_areasDto->getId_Usuario_Area()!=""){
$sql.="Id_Usuario_Area='".$siga_usuario_areasDto->getId_Usuario_Area()."'";
if(($siga_usuario_areasDto->getId_Usuario()!="") ||($siga_usuario_areasDto->getId_Area()!="") ||($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_areasDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_usuario_areasDto->getId_Usuario()."'";
if(($siga_usuario_areasDto->getId_Area()!="") ||($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_areasDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_usuario_areasDto->getId_Area()."'";
if(($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_areasDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_usuario_areasDto->getFech_Inser()."'";
if(($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_areasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_usuario_areasDto->getUsr_Inser()."'";
if(($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_areasDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_usuario_areasDto->getFech_Mod()."'";
if(($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_areasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_usuario_areasDto->getUsr_Mod()."'";
if(($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuario_areasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_usuario_areasDto->getEstatus_Reg()."'";
}
$sql.=" WHERE ='".$siga_usuario_areasDto->get()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_usuario_areasDTO();
$tmp->set($siga_usuario_areasDto->get());
$tmp = $this->selectSiga_usuario_areas($tmp,"",$this->_proveedor);
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
public function deleteSiga_usuario_areas($siga_usuario_areasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_usuario_areas  WHERE ";
if($siga_usuario_areasDto->getId_Usuario_Area()!=""){
$sql.="Id_Usuario_Area='".$siga_usuario_areasDto->getId_Usuario_Area()."'";
if(($siga_usuario_areasDto->getId_Usuario()!="") ){
$sql.=" AND ";
}
}

if($siga_usuario_areasDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_usuario_areasDto->getId_Usuario()."'";
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
public function selectSiga_usuario_areas($siga_usuario_areasDto,$orden="",$proveedor=null){
$tmp = [];
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Usuario_Area,Id_Usuario,Id_Area,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_usuario_areas ";
if(($siga_usuario_areasDto->getId_Usuario_Area()!="") ||($siga_usuario_areasDto->getId_Usuario()!="") ||($siga_usuario_areasDto->getId_Area()!="") ||($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_usuario_areasDto->getId_Usuario_Area()!=""){
$sql.="Id_Usuario_Area='".$siga_usuario_areasDto->getId_Usuario_Area()."'";
if(($siga_usuario_areasDto->getId_Usuario()!="") ||($siga_usuario_areasDto->getId_Area()!="") ||($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_usuario_areasDto->getId_Usuario()."'";
if(($siga_usuario_areasDto->getId_Area()!="") ||($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_usuario_areasDto->getId_Area()."'";
if(($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_usuario_areasDto->getFech_Inser()."'";
if(($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_usuario_areasDto->getUsr_Inser()."'";
if(($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_usuario_areasDto->getFech_Mod()."'";
if(($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_usuario_areasDto->getUsr_Mod()."'";
if(($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <> '3' ";
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
$tmp[$contador] = new Siga_usuario_areasDTO();
$tmp[$contador]->setId_Usuario_Area($row["Id_Usuario_Area"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
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

public function selectSiga_catareas($siga_usuario_areasDto,$orden="",$proveedor=null){
$tmp = [];
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql=" SELECT A.Id_Usuario_Area,A.Id_Usuario,A.Id_Area,A.Fech_Inser,A.Usr_Inser,A.Fech_Mod,A.Usr_Mod,A.Estatus_Reg, rtrim(ltrim(C.Nom_Area)) as Nom_Area FROM   siga_usuario_areas A left join siga_catareas C on A.Id_Area=C.Id_Area ";
if(($siga_usuario_areasDto->getId_Usuario_Area()!="") ||($siga_usuario_areasDto->getId_Usuario()!="") ||($siga_usuario_areasDto->getId_Area()!="") ||($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_usuario_areasDto->getId_Usuario_Area()!=""){
$sql.="Id_Usuario_Area='".$siga_usuario_areasDto->getId_Usuario_Area()."'";
if(($siga_usuario_areasDto->getId_Usuario()!="") ||($siga_usuario_areasDto->getId_Area()!="") ||($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_usuario_areasDto->getId_Usuario()."'";
if(($siga_usuario_areasDto->getId_Area()!="") ||($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_usuario_areasDto->getId_Area()."'";
if(($siga_usuario_areasDto->getFech_Inser()!="") ||($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_usuario_areasDto->getFech_Inser()."'";
if(($siga_usuario_areasDto->getUsr_Inser()!="") ||($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_usuario_areasDto->getUsr_Inser()."'";
if(($siga_usuario_areasDto->getFech_Mod()!="") ||($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_usuario_areasDto->getFech_Mod()."'";
if(($siga_usuario_areasDto->getUsr_Mod()!="") ||($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_usuario_areasDto->getUsr_Mod()."'";
if(($siga_usuario_areasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuario_areasDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_usuario_areasDTO();
$tmp[$contador]->setId_Usuario_Area($row["Id_Usuario_Area"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setNom_Area($row["Nom_Area"]);
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