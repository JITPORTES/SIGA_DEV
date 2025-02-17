<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_centro_de_costos/Siga_cat_centro_de_costosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_centro_de_costosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_centro_de_costos($siga_cat_centro_de_costosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_centro_de_costos(";
//if($siga_cat_centro_de_costosDto->getId_Centros_de_costos()!=""){
//$sql.="Id_Centros_de_costos";
//if(($siga_cat_centro_de_costosDto->getId_Area()!="") ||($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!="") ||($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_centro_de_costosDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!="") ||($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!=""){
$sql.="Desc_Centro_de_costos";
if(($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
if(($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getNoCentroCostos()!=""){
$sql.="NoCentroCostos";
if(($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getNombreReporte()!=""){
$sql.="NombreReporte";
if(($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getClave()!=""){
$sql.="Clave";
if(($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getNomenclatura()!=""){
$sql.="Nomenclatura";
}
$sql.=") VALUES(";
//if($siga_cat_centro_de_costosDto->getId_Centros_de_costos()!=""){
//$sql.="'".$siga_cat_centro_de_costosDto->getId_Centros_de_costos()."'";
//if(($siga_cat_centro_de_costosDto->getId_Area()!="") ||($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!="") ||($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_centro_de_costosDto->getId_Area()!=""){
$sql.="'".$siga_cat_centro_de_costosDto->getId_Area()."'";
if(($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!="") ||($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!=""){
$sql.="'".$siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()."'";
if(($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getFech_Inser()!=""){
$sql.="".$siga_cat_centro_de_costosDto->getFech_Inser()."";
if(($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="") ){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getUsr_Inser()!=""){
$sql.="'".$siga_cat_centro_de_costosDto->getUsr_Inser()."'";
if(($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getFech_Mod()!=""){
$sql.="".$siga_cat_centro_de_costosDto->getFech_Mod()."";
if(($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getUsr_Mod()!=""){
$sql.="'".$siga_cat_centro_de_costosDto->getUsr_Mod()."'";
if(($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cat_centro_de_costosDto->getEstatus_Reg()."'";
if(($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getNoCentroCostos()!=""){
$sql.="'".$siga_cat_centro_de_costosDto->getNoCentroCostos()."'";
if(($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getNombreReporte()!=""){
$sql.="'".$siga_cat_centro_de_costosDto->getNombreReporte()."'";
if(($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getClave()!=""){
$sql.="'".$siga_cat_centro_de_costosDto->getClave()."'";
if(($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getNomenclatura()!=""){
$sql.="'".$siga_cat_centro_de_costosDto->getNomenclatura()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_centro_de_costosDTO();
$tmp->setId_Centros_de_costos($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_centro_de_costos($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_centro_de_costos($siga_cat_centro_de_costosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_centro_de_costos SET ";
//if($siga_cat_centro_de_costosDto->getId_Centros_de_costos()!=""){
//$sql.="Id_Centros_de_costos='".$siga_cat_centro_de_costosDto->getId_Centros_de_costos()."'";
//if(($siga_cat_centro_de_costosDto->getId_Area()!="") ||($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!="") ||($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
//$sql.=",";
//}
//}
if($siga_cat_centro_de_costosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_centro_de_costosDto->getId_Area()."'";
if(($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!="") ||($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!=""){
$sql.="Desc_Centro_de_costos='".$siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()."'";
if(($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_centro_de_costosDto->getFech_Inser()."'";
if(($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_centro_de_costosDto->getUsr_Inser()."'";
if(($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_cat_centro_de_costosDto->getFech_Mod()."";
if(($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_centro_de_costosDto->getUsr_Mod()."'";
if(($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ||($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_centro_de_costosDto->getEstatus_Reg()."'";
if(($siga_cat_centro_de_costosDto->getNoCentroCostos()!="")||($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getNoCentroCostos()!=""){
$sql.="NoCentroCostos='".$siga_cat_centro_de_costosDto->getNoCentroCostos()."'";
if(($siga_cat_centro_de_costosDto->getNombreReporte()!="")||($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getNombreReporte()!=""){
$sql.="NombreReporte='".$siga_cat_centro_de_costosDto->getNombreReporte()."'";
if(($siga_cat_centro_de_costosDto->getClave()!="")||($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getClave()!=""){
$sql.="Clave='".$siga_cat_centro_de_costosDto->getClave()."'";
if(($siga_cat_centro_de_costosDto->getNomenclatura()!="")){
$sql.=",";
}
}
if($siga_cat_centro_de_costosDto->getNomenclatura()!=""){
$sql.="Nomenclatura='".$siga_cat_centro_de_costosDto->getNomenclatura()."'";
}
$sql.=" WHERE Id_Centros_de_costos='".$siga_cat_centro_de_costosDto->getId_Centros_de_costos()."'";

//echo "<pre>";
//echo $sql;
//echo "</pre>";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_centro_de_costosDTO();
$tmp->setId_Centros_de_costos($siga_cat_centro_de_costosDto->getId_Centros_de_costos());
$tmp = $this->selectSiga_cat_centro_de_costos($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_centro_de_costos($siga_cat_centro_de_costosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_centro_de_costos  WHERE Id_Centros_de_costos='".$siga_cat_centro_de_costosDto->getId_Centros_de_costos()."'";
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
public function selectSiga_cat_centro_de_costos($siga_cat_centro_de_costosDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Centros_de_costos,Id_Area,Desc_Centro_de_costos,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg, NoCentroCostos, NombreReporte, Clave, Nomenclatura FROM siga_cat_centro_de_costos ";
if(($siga_cat_centro_de_costosDto->getId_Centros_de_costos()!="") ||($siga_cat_centro_de_costosDto->getId_Area()!="") ||($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!="") ||($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_centro_de_costosDto->getId_Centros_de_costos()!=""){
$sql.="Id_Centros_de_costos='".$siga_cat_centro_de_costosDto->getId_Centros_de_costos()."'";
if(($siga_cat_centro_de_costosDto->getId_Area()!="") ||($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!="") ||($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_centro_de_costosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_centro_de_costosDto->getId_Area()."'";
if(($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!="") ||($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()!=""){
$sql.="Desc_Centro_de_costos='".$siga_cat_centro_de_costosDto->getDesc_Centro_de_costos()."'";
if(($siga_cat_centro_de_costosDto->getFech_Inser()!="") ||($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_centro_de_costosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_centro_de_costosDto->getFech_Inser()."'";
if(($siga_cat_centro_de_costosDto->getUsr_Inser()!="") ||($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_centro_de_costosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_centro_de_costosDto->getUsr_Inser()."'";
if(($siga_cat_centro_de_costosDto->getFech_Mod()!="") ||($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_centro_de_costosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_centro_de_costosDto->getFech_Mod()."'";
if(($siga_cat_centro_de_costosDto->getUsr_Mod()!="") ||($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_centro_de_costosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_centro_de_costosDto->getUsr_Mod()."'";
if(($siga_cat_centro_de_costosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_centro_de_costosDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_cat_centro_de_costosDTO();
$tmp[$contador]->setId_Centros_de_costos($row["Id_Centros_de_costos"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setDesc_Centro_de_costos($row["Desc_Centro_de_costos"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setNoCentroCostos($row["NoCentroCostos"]);
$tmp[$contador]->setNombreReporte($row["NombreReporte"]);
$tmp[$contador]->setClave($row["Clave"]);
$tmp[$contador]->setNomenclatura($row["Nomenclatura"]);

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
public function llenarDataTable($draw,$columns,$order,$start,$length,$search, $proveedor = null) {
		$recordsTotal = 0;
        $data = array();
        if ($proveedor == null) {
            $this->_conexion(null);
        } else if ($proveedor != null) {
            $this->_proveedor = $proveedor;
        }
        $criterios = "";
        if ($search != ''AND $search["value"] != '') {
            foreach ($columns as $value) {   
                if($value["data"]!='Id_Centros_de_costos' AND $value["data"]!='function')
                $criterios.=' ' . $value["data"] . " LIKE '%" . $search["value"] . "%'" . ' OR';
            }
            $criterios = $criterios != "" ? ('AND (' . substr($criterios, 0, -2) . ')') : '';
        }
        $ordenamiento='';        
        if ($order != ''AND count($order)> 0) {
            $order=$order[0];
            $aux=$columns[$order["column"]];
			if($aux["data"] !="function")
			{
				$ordenamiento=' ORDER BY '.$aux["data"].' '.$order["dir"];
			}
        }
        $pagina='';
        if($start!='' AND $length!=''){
            $pagina='  OFFSET '.$start.' ROWS FETCH NEXT '.$length.' ROWS ONLY ';
        }
        $this->_proveedor->execute("SELECT Id_Centros_de_costos, Id_Area, Desc_Centro_de_costos, Fech_Inser, Usr_Inser, Fech_Mod, Usr_Mod, Estatus_Reg, NoCentroCostos, NombreReporte, Clave, Nomenclatura FROM siga_cat_centro_de_costos where Estatus_Reg <> '3' and Id_Centros_de_costos LIKE '%%' "
                . "".$criterios.$ordenamiento.$pagina);
								
		
        
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $data[] = array("Id_Centros_de_costos" => $row["Id_Centros_de_costos"],
																"Id_Area" => $row["Id_Area"],
																"Desc_Centro_de_costos" => $row["Desc_Centro_de_costos"],
																"NoCentroCostos" => $row["NoCentroCostos"],
																"NombreReporte" => $row["NombreReporte"],
																"Clave" => $row["Clave"],
																"Nomenclatura" => $row["Nomenclatura"]
													);
            }
						
						
						
            $this->_proveedor->execute("select COUNT(*) AS total from (SELECT Id_Centros_de_costos, Id_Area, Desc_Centro_de_costos, Fech_Inser, Usr_Inser, Fech_Mod, Usr_Mod, Estatus_Reg, NoCentroCostos, NombreReporte, Clave, Nomenclatura FROM siga_cat_centro_de_costos where Estatus_Reg <> '3' and Id_Centros_de_costos LIKE '%%'". "".$criterios." ) siga_cat_centro_de_costos");
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
		
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    }

}
?>