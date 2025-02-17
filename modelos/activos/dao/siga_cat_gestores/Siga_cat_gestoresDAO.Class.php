<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_gestores/Siga_cat_gestoresDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_gestoresDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_gestores($siga_cat_gestoresDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_gestores(";
if($siga_cat_gestoresDto->getId_Gestor()!=""){
$sql.="Id_Gestor";
if(($siga_cat_gestoresDto->getId_Area()!="") ||($siga_cat_gestoresDto->getId_Seccion()!="") ||($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_cat_gestoresDto->getId_Seccion()!="") ||($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getId_Seccion()!=""){
$sql.="Id_Seccion";
if(($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getTipo_Gestor()!=""){
$sql.="Tipo_Gestor";
if(($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getId_Usuario()!=""){
$sql.="Id_Usuario";
if(($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getNombre_Empleado()!=""){
$sql.="Nombre_Empleado";
if(($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
//if($siga_cat_gestoresDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
//}
if($siga_cat_gestoresDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_cat_gestoresDto->getId_Gestor()!=""){
$sql.="'".$siga_cat_gestoresDto->getId_Gestor()."'";
if(($siga_cat_gestoresDto->getId_Area()!="") ||($siga_cat_gestoresDto->getId_Seccion()!="") ||($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getId_Area()!=""){
$sql.="'".$siga_cat_gestoresDto->getId_Area()."'";
if(($siga_cat_gestoresDto->getId_Seccion()!="") ||($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getId_Seccion()!=""){
$sql.="'".$siga_cat_gestoresDto->getId_Seccion()."'";
if(($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getTipo_Gestor()!=""){
$sql.="'".$siga_cat_gestoresDto->getTipo_Gestor()."'";
if(($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getId_Usuario()!=""){
$sql.="'".$siga_cat_gestoresDto->getId_Usuario()."'";
if(($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getNombre_Empleado()!=""){
$sql.="'".$siga_cat_gestoresDto->getNombre_Empleado()."'";
if(($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
//if($siga_cat_gestoresDto->getFech_Inser()!=""){
$sql.="getdate()";
if(($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
//}
if($siga_cat_gestoresDto->getUsr_Inser()!=""){
$sql.="'".$siga_cat_gestoresDto->getUsr_Inser()."'";
if(($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getFech_Mod()!=""){
$sql.="'".$siga_cat_gestoresDto->getFech_Mod()."'";
if(($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getUsr_Mod()!=""){
$sql.="'".$siga_cat_gestoresDto->getUsr_Mod()."'";
if(($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cat_gestoresDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_gestoresDTO();
$tmp->setId_Gestor($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_gestores($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_gestores($siga_cat_gestoresDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_gestores SET ";

if($siga_cat_gestoresDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_gestoresDto->getId_Area()."'";
if(($siga_cat_gestoresDto->getId_Seccion()!="") ||($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getId_Seccion()!=""){
$sql.="Id_Seccion='".$siga_cat_gestoresDto->getId_Seccion()."'";
if(($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getTipo_Gestor()!=""){
$sql.="Tipo_Gestor='".$siga_cat_gestoresDto->getTipo_Gestor()."'";
if(($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_cat_gestoresDto->getId_Usuario()."'";
if(($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getNombre_Empleado()!=""){
$sql.="Nombre_Empleado='".$siga_cat_gestoresDto->getNombre_Empleado()."'";
if(($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_gestoresDto->getFech_Inser()."'";
if(($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_gestoresDto->getUsr_Inser()."'";
if(($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_gestoresDto->getFech_Mod()."'";
if(($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_gestoresDto->getUsr_Mod()."'";
if(($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cat_gestoresDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cat_gestoresDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Gestor='".$siga_cat_gestoresDto->getId_Gestor()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_gestoresDTO();
$tmp->setId_Gestor($siga_cat_gestoresDto->getId_Gestor());
$tmp = $this->selectSiga_cat_gestores($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_gestores($siga_cat_gestoresDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_gestores  WHERE Id_Gestor='".$siga_cat_gestoresDto->getId_Gestor()."'";
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
public function selectSiga_cat_gestores($siga_cat_gestoresDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT 
            Id_Gestor,
            siga_cat_gestores.Id_Area,
            siga_cat_gestores.Id_Seccion,
            Tipo_Gestor,
            siga_cat_gestores.Id_Usuario,
            Nombre_Empleado,
            siga_cat_gestores.Fech_Inser,
            siga_cat_gestores.Usr_Inser,
            siga_cat_gestores.Fech_Mod,
            siga_cat_gestores.Usr_Mod,
            siga_cat_gestores.Estatus_Reg,
            CS.Desc_Seccion,
            (select COUNT(Id_Solicitud) FROM siga_solicitud_tickets WHERE Seccion=siga_cat_gestores.Id_Seccion AND Estatus_Proceso='1' AND siga_solicitud_tickets.Estatus_Reg<>'3' AND siga_solicitud_tickets.Id_Area=siga_cat_gestores.Id_Area) as Total_Nuevos,
            (select COUNT(Id_Solicitud) FROM siga_solicitud_tickets WHERE Seccion=siga_cat_gestores.Id_Seccion AND Estatus_Proceso='2' AND siga_solicitud_tickets.Estatus_Reg<>'3' AND siga_solicitud_tickets.Id_Area=siga_cat_gestores.Id_Area) as Total_Seguimiento FROM siga_cat_gestores left join siga_usuarios on siga_cat_gestores.Id_Usuario= siga_usuarios.Id_Usuario left join siga_cat_ticket_seccion CS on siga_cat_gestores.Id_Seccion=CS.Id_Seccion  ";
            
if(($siga_cat_gestoresDto->getId_Gestor()!="") ||($siga_cat_gestoresDto->getId_Area()!="") ||($siga_cat_gestoresDto->getId_Seccion()!="") ||($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" WHERE siga_cat_gestores.Estatus_Reg <> '3' AND ";
}
if($siga_cat_gestoresDto->getId_Gestor()!=""){
$sql.="siga_cat_gestores.Id_Gestor='".$siga_cat_gestoresDto->getId_Gestor()."'";
if(($siga_cat_gestoresDto->getId_Area()!="") ||($siga_cat_gestoresDto->getId_Seccion()!="") ||($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getId_Area()!=""){
$sql.="siga_cat_gestores.Id_Area='".$siga_cat_gestoresDto->getId_Area()."'";
if(($siga_cat_gestoresDto->getId_Seccion()!="") ||($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getId_Seccion()!=""){
$sql.="siga_cat_gestores.Id_Seccion='".$siga_cat_gestoresDto->getId_Seccion()."'";
if(($siga_cat_gestoresDto->getTipo_Gestor()!="") ||($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getTipo_Gestor()!=""){
$sql.="siga_cat_gestores.Tipo_Gestor='".$siga_cat_gestoresDto->getTipo_Gestor()."'";
if(($siga_cat_gestoresDto->getId_Usuario()!="") ||($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getId_Usuario()!=""){
$sql.="siga_cat_gestores.Id_Usuario='".$siga_cat_gestoresDto->getId_Usuario()."'";
if(($siga_cat_gestoresDto->getNombre_Empleado()!="") ||($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getNombre_Empleado()!=""){
$sql.="siga_cat_gestores.Nombre_Empleado='".$siga_cat_gestoresDto->getNombre_Empleado()."'";
if(($siga_cat_gestoresDto->getFech_Inser()!="") ||($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getFech_Inser()!=""){
$sql.="siga_cat_gestores.Fech_Inser='".$siga_cat_gestoresDto->getFech_Inser()."'";
if(($siga_cat_gestoresDto->getUsr_Inser()!="") ||($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getUsr_Inser()!=""){
$sql.="siga_cat_gestores.Usr_Inser='".$siga_cat_gestoresDto->getUsr_Inser()."'";
if(($siga_cat_gestoresDto->getFech_Mod()!="") ||($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getFech_Mod()!=""){
$sql.="siga_cat_gestores.Fech_Mod='".$siga_cat_gestoresDto->getFech_Mod()."'";
if(($siga_cat_gestoresDto->getUsr_Mod()!="") ||($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getUsr_Mod()!=""){
$sql.="siga_cat_gestores.Usr_Mod='".$siga_cat_gestoresDto->getUsr_Mod()."'";
if(($siga_cat_gestoresDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_gestoresDto->getEstatus_Reg()!=""){
$sql.=" siga_cat_gestores.Estatus_Reg <> '3' AND siga_usuarios.Estatus_Reg <> '3' ";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
// echo "<pre>";
// echo $sql;
// echo "</pre>";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
$tmp = [];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_cat_gestoresDTO();
$tmp[$contador]->setId_Gestor($row["Id_Gestor"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setId_Seccion($row["Id_Seccion"]);
$tmp[$contador]->setTipo_Gestor($row["Tipo_Gestor"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setNombre_Empleado($row["Nombre_Empleado"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setDesc_Seccion($row["Desc_Seccion"]);
$tmp[$contador]->setTotal_Nuevos($row["Total_Nuevos"]);
$tmp[$contador]->setTotal_Seguimiento($row["Total_Seguimiento"]);
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

public function llenarDataTable($draw,$columns,$order,$start,$length,$search, $Id_Area, $proveedor = null) {
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
                if($value["data"]!='Id_Gestor' AND $value["data"]!='function')
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
        $this->_proveedor->execute("select * from (
                    select g.Id_Gestor, g.Id_Area, g.Id_Seccion, s.Desc_Seccion,case when Tipo_Gestor= 1 then 'Senior' else 'Junior' end as Tipo_Gestor, Id_Usuario, Nombre_Empleado, g.Estatus_Reg 
                    from siga_cat_gestores g left join siga_cat_ticket_seccion s on g.Id_Seccion=s.Id_Seccion
                    ) siga_cat_gestores where Estatus_Reg <> '3' and Id_Area=".$Id_Area." and Id_Gestor LIKE '%%' 
                ". "".$criterios.$ordenamiento.$pagina);
        
        
        
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $data[] = array("Id_Gestor" => $row["Id_Gestor"],
                    "Id_Area" => $row["Id_Area"],
                                        "Id_Seccion" => $row["Id_Seccion"],
                                        "Desc_Seccion" => $row["Desc_Seccion"],
                                        "Tipo_Gestor" => $row["Tipo_Gestor"],
                                        "Id_Usuario" => $row["Id_Usuario"],
                                        "Nombre_Empleado" => $row["Nombre_Empleado"],
                                        "Estatus_Reg" => $row["Estatus_Reg"]
                );
            }
            $this->_proveedor->execute("select COUNT(*) AS total from (select * from (select g.Id_Gestor, g.Id_Area, g.Id_Seccion, s.Desc_Seccion,case when Tipo_Gestor= 1 then 'Senior' else 'Junior' end as Tipo_Gestor, Id_Usuario, Nombre_Empleado, g.Estatus_Reg from siga_cat_gestores g left join siga_cat_ticket_seccion s on g.Id_Seccion=s.Id_Seccion) siga_cat_gestores where Estatus_Reg <> '3' and Id_Area=".$Id_Area." and Id_Gestor LIKE '%%' ". "".$criterios." ) tblformulas");
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
        
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
}
}
?>