<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_sla_p/Siga_sla_pDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_sla_pDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_sla_p($siga_sla_pDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_sla_p(";
if($siga_sla_pDto->getId_Sla_P()!=""){
$sql.="Id_Sla_P";
if(($siga_sla_pDto->getId_Area()!="") ||($siga_sla_pDto->getId_Seccion()!="") ||($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") ||($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_sla_pDto->getId_Seccion()!="") ||($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") ||($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Seccion()!=""){
$sql.="Id_Seccion";
if(($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") ||($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Categoria()!=""){
$sql.="Id_Categoria";
if(($siga_sla_pDto->getId_Subcategoria()!="") ||($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Subcategoria()!=""){
$sql.="Id_Subcategoria";
if(($siga_sla_pDto->getInterno_Externo()!="") || ($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getInterno_Externo()!=""){
$sql.="Interno_Externo";
if(($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}

if($siga_sla_pDto->getProceso_Ticket()!=""){
$sql.="Proceso_Ticket";
if(($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getEscala()!=""){
$sql.="Escala";
if(($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getHoras()!=""){
$sql.="Horas";
if(($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getCorreos()!=""){
$sql.="Correos";
if(($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
if(($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
}
$sql.=") VALUES(";
if($siga_sla_pDto->getId_Sla_P()!=""){
$sql.="'".$siga_sla_pDto->getId_Sla_P()."'";
if(($siga_sla_pDto->getId_Area()!="") ||($siga_sla_pDto->getId_Seccion()!="") ||($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Area()!=""){
$sql.="'".$siga_sla_pDto->getId_Area()."'";
if(($siga_sla_pDto->getId_Seccion()!="") ||($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Seccion()!=""){
$sql.="'".$siga_sla_pDto->getId_Seccion()."'";
if(($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Categoria()!=""){
$sql.="'".$siga_sla_pDto->getId_Categoria()."'";
if(($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Subcategoria()!=""){
$sql.="'".$siga_sla_pDto->getId_Subcategoria()."'";
if(($siga_sla_pDto->getInterno_Externo()!="") || ($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getInterno_Externo()!=""){
$sql.="'".$siga_sla_pDto->getInterno_Externo()."'";
if(($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getProceso_Ticket()!=""){
$sql.="'".$siga_sla_pDto->getProceso_Ticket()."'";
if(($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getEscala()!=""){
$sql.="'".$siga_sla_pDto->getEscala()."'";
if(($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getHoras()!=""){
$sql.="'".$siga_sla_pDto->getHoras()."'";
if(($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getCorreos()!=""){
$sql.="'".$siga_sla_pDto->getCorreos()."'";
if(($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getEstatus_Reg()!=""){
$sql.="'".$siga_sla_pDto->getEstatus_Reg()."'";
if(($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getFech_Inser()!=""){
$sql.="'".$siga_sla_pDto->getFech_Inser()."'";
if(($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getUsr_Inser()!=""){
$sql.="'".$siga_sla_pDto->getUsr_Inser()."'";
if(($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getFech_Mod()!=""){
$sql.="'".$siga_sla_pDto->getFech_Mod()."'";
if(($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getUsr_Mod()!=""){
$sql.="'".$siga_sla_pDto->getUsr_Mod()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_sla_pDTO();
$tmp->setId_Sla_P($this->_proveedor->lastID());
$tmp = $this->selectSiga_sla_p($tmp,"",$this->_proveedor);
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
public function updateSiga_sla_p($siga_sla_pDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_sla_p SET ";
if($siga_sla_pDto->getId_Sla_P()!=""){
$sql.="Id_Sla_P='".$siga_sla_pDto->getId_Sla_P()."'";
if(($siga_sla_pDto->getId_Area()!="") ||($siga_sla_pDto->getId_Seccion()!="") ||($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_sla_pDto->getId_Area()."'";
if(($siga_sla_pDto->getId_Seccion()!="") ||($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Seccion()!=""){
$sql.="Id_Seccion='".$siga_sla_pDto->getId_Seccion()."'";
if(($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Categoria()!=""){
$sql.="Id_Categoria='".$siga_sla_pDto->getId_Categoria()."'";
if(($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getId_Subcategoria()!=""){
$sql.="Id_Subcategoria='".$siga_sla_pDto->getId_Subcategoria()."'";
if(($siga_sla_pDto->getInterno_Externo()!="") || ($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getInterno_Externo()!=""){
$sql.="Interno_Externo='".$siga_sla_pDto->getInterno_Externo()."'";
if(($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}

if($siga_sla_pDto->getProceso_Ticket()!=""){
$sql.="Proceso_Ticket='".$siga_sla_pDto->getProceso_Ticket()."'";
if(($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getEscala()!=""){
$sql.="Escala='".$siga_sla_pDto->getEscala()."'";
if(($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getHoras()!=""){
$sql.="Horas='".$siga_sla_pDto->getHoras()."'";
if(($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getCorreos()!=""){
$sql.="Correos='".$siga_sla_pDto->getCorreos()."'";
if(($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_sla_pDto->getEstatus_Reg()."'";
if(($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_sla_pDto->getFech_Inser()."'";
if(($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_sla_pDto->getUsr_Inser()."'";
if(($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_sla_pDto->getFech_Mod()."'";
if(($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_sla_pDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_sla_pDto->getUsr_Mod()."'";
}
$sql.=" WHERE Id_Sla_P='".$siga_sla_pDto->getId_Sla_P()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_sla_pDTO();
$tmp->setId_Sla_P($siga_sla_pDto->getId_Sla_P());
$tmp = $this->selectSiga_sla_p($tmp,"",$this->_proveedor);
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
public function deleteSiga_sla_p($siga_sla_pDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_sla_p  WHERE Id_Sla_P='".$siga_sla_pDto->getId_Sla_P()."'";
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
public function selectSiga_sla_p($siga_sla_pDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Sla_P,Id_Area,Id_Seccion,Id_Categoria,Id_Subcategoria,Interno_Externo,Proceso_Ticket,Escala,Horas,Correos,Estatus_Reg,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod FROM siga_sla_p ";
if(($siga_sla_pDto->getId_Sla_P()!="") ||($siga_sla_pDto->getId_Area()!="") ||($siga_sla_pDto->getId_Seccion()!="") ||($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") ||($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" WHERE ";
}
if($siga_sla_pDto->getId_Sla_P()!=""){
$sql.="Id_Sla_P='".$siga_sla_pDto->getId_Sla_P()."'";
if(($siga_sla_pDto->getId_Area()!="") ||($siga_sla_pDto->getId_Seccion()!="") ||($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") ||($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_sla_pDto->getId_Area()."'";
if(($siga_sla_pDto->getId_Seccion()!="") ||($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") ||($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getId_Seccion()!=""){
$sql.="Id_Seccion='".$siga_sla_pDto->getId_Seccion()."'";
if(($siga_sla_pDto->getId_Categoria()!="") ||($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") ||($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getId_Categoria()!=""){
$sql.="Id_Categoria='".$siga_sla_pDto->getId_Categoria()."'";
if(($siga_sla_pDto->getId_Subcategoria()!="") || ($siga_sla_pDto->getInterno_Externo()!="") || ($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getId_Subcategoria()!=""){
$sql.="Id_Subcategoria='".$siga_sla_pDto->getId_Subcategoria()."'";
if(($siga_sla_pDto->getInterno_Externo()!="") || ($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getInterno_Externo()!=""){
$sql.="Interno_Externo='".$siga_sla_pDto->getInterno_Externo()."'";
if(($siga_sla_pDto->getProceso_Ticket()!="") ||($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getProceso_Ticket()!=""){
$sql.="Proceso_Ticket='".$siga_sla_pDto->getProceso_Ticket()."'";
if(($siga_sla_pDto->getEscala()!="") ||($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getEscala()!=""){
$sql.="Escala='".$siga_sla_pDto->getEscala()."'";
if(($siga_sla_pDto->getHoras()!="") ||($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getHoras()!=""){
$sql.="Horas='".$siga_sla_pDto->getHoras()."'";
if(($siga_sla_pDto->getCorreos()!="") ||($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getCorreos()!=""){
$sql.="Correos='".$siga_sla_pDto->getCorreos()."'";
if(($siga_sla_pDto->getEstatus_Reg()!="") ||($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_sla_pDto->getEstatus_Reg()."'";
if(($siga_sla_pDto->getFech_Inser()!="") ||($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_sla_pDto->getFech_Inser()."'";
if(($siga_sla_pDto->getUsr_Inser()!="") ||($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_sla_pDto->getUsr_Inser()."'";
if(($siga_sla_pDto->getFech_Mod()!="") ||($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_sla_pDto->getFech_Mod()."'";
if(($siga_sla_pDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_sla_pDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_sla_pDto->getUsr_Mod()."'";
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
$tmp[$contador] = new Siga_sla_pDTO();
$tmp[$contador]->setId_Sla_P($row["Id_Sla_P"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setId_Seccion($row["Id_Seccion"]);
$tmp[$contador]->setId_Categoria($row["Id_Categoria"]);
$tmp[$contador]->setId_Subcategoria($row["Id_Subcategoria"]);
$tmp[$contador]->setInterno_Externo($row["Interno_Externo"]);
$tmp[$contador]->setProceso_Ticket($row["Proceso_Ticket"]);
$tmp[$contador]->setEscala($row["Escala"]);
$tmp[$contador]->setHoras($row["Horas"]);
$tmp[$contador]->setCorreos($row["Correos"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
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