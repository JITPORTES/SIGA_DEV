<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_baja_activo/Siga_baja_activoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_baja_activoDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_baja_activo($siga_baja_activoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_baja_activo(";
if($siga_baja_activoDto->getId_baja()!=""){
$sql.="Id_baja";
if(($siga_baja_activoDto->getId_Activo()!="") ||($siga_baja_activoDto->getMotivo_Baja()!="") ||($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="")||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="") ){
$sql.=",";
}
}
if($siga_baja_activoDto->getId_Activo()!=""){
$sql.="Id_Activo";
if(($siga_baja_activoDto->getMotivo_Baja()!="") ||($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getMotivo_Baja()!=""){
$sql.="Motivo_Baja";
if(($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getComentarios()!=""){
$sql.="Comentarios";
if(($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getDestino()!=""){
$sql.="Destino";
if(($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getFecha_Baja()!=""){
$sql.="Fecha_Baja";
if(($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getUsuario()!=""){
$sql.="Usuario";
if(($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getSeg_Sol_Baja()!=""){
$sql.="Seg_Sol_Baja";
if(($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getSeg_Resp_Area_Ges()!=""){
$sql.="Seg_Resp_Area_Ges";
if(($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getSeg_Dir_Adminis()!=""){
$sql.=",Seg_Resp_Area_Ges";
}
if($siga_baja_activoDto->getCuenta_baja()!=""){
$sql.=",Cuenta_baja";
}
if($siga_baja_activoDto->getJefe_Area()!=""){
$sql.=",Jefe_Area";
}
if($siga_baja_activoDto->getSeg_Usuario_Resp()!=""){
$sql.=",Seg_Usuario_Resp";
}
$sql.=") VALUES(";
if($siga_baja_activoDto->getId_baja()!=""){
$sql.="'".$siga_baja_activoDto->getId_baja()."'";
if(($siga_baja_activoDto->getId_Activo()!="") ||($siga_baja_activoDto->getMotivo_Baja()!="") ||($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getId_Activo()!=""){
$sql.="'".$siga_baja_activoDto->getId_Activo()."'";
if(($siga_baja_activoDto->getMotivo_Baja()!="") ||($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getMotivo_Baja()!=""){
$sql.="'".$siga_baja_activoDto->getMotivo_Baja()."'";
if(($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getComentarios()!=""){
$sql.="'".$siga_baja_activoDto->getComentarios()."'";
if(($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getDestino()!=""){
$sql.="'".$siga_baja_activoDto->getDestino()."'";
if(($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getFecha_Baja()!=""){
$sql.="'".$siga_baja_activoDto->getFecha_Baja()."'";
if(($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}

if($siga_baja_activoDto->getUsuario()!=""){
$sql.="'".$siga_baja_activoDto->getUsuario()."'";
if(($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getSeg_Sol_Baja()!=""){
$sql.="'".$siga_baja_activoDto->getSeg_Sol_Baja()."'";
if(($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getSeg_Resp_Area_Ges()!=""){
$sql.="'".$siga_baja_activoDto->getSeg_Resp_Area_Ges()."'";
if(($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getSeg_Dir_Adminis()!=""){
$sql.=",'".$siga_baja_activoDto->getSeg_Dir_Adminis()."'";
}
if($siga_baja_activoDto->getCuenta_baja()!=""){
$sql.=",'".$siga_baja_activoDto->getCuenta_baja()."'";
}
if($siga_baja_activoDto->getJefe_Area()!=""){
$sql.=",'".$siga_baja_activoDto->getJefe_Area()."'";
}
if($siga_baja_activoDto->getSeg_Usuario_Resp()!=""){
$sql.=",'".$siga_baja_activoDto->getSeg_Usuario_Resp()."'";
}
$sql.=")";
//echo $sql;
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_baja_activoDTO();
$tmp->setId_baja($this->_proveedor->lastID());
$tmp = $this->selectSiga_baja_activo($tmp,"",$this->_proveedor);
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
public function updateSiga_baja_activo($siga_baja_activoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_baja_activo SET ";

if($siga_baja_activoDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_baja_activoDto->getId_Activo()."'";
if(($siga_baja_activoDto->getMotivo_Baja()!="") ||($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") || ($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getMotivo_Baja()!=""){
$sql.="Motivo_Baja='".$siga_baja_activoDto->getMotivo_Baja()."'";
if(($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getComentarios()!=""){
$sql.="Comentarios='".$siga_baja_activoDto->getComentarios()."'";
if(($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getDestino()!=""){
$sql.="Destino='".$siga_baja_activoDto->getDestino()."'";
if(($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getFecha_Baja()!=""){
$sql.="Fecha_Baja='".$siga_baja_activoDto->getFecha_Baja()."'";
if(($siga_baja_activoDto->getUsuario()!="") ||($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}


if($siga_baja_activoDto->getUsuario()!=""){
$sql.="Usuario='".$siga_baja_activoDto->getUsuario()."'";
if(($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}

if($siga_baja_activoDto->getSeg_Sol_Baja()!=""){
$sql.="Seg_Sol_Baja='".$siga_baja_activoDto->getSeg_Sol_Baja()."'";
if(($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}

if($siga_baja_activoDto->getSeg_Resp_Area_Ges()!=""){
$sql.="Seg_Resp_Area_Ges='".$siga_baja_activoDto->getSeg_Resp_Area_Ges()."'";
if(($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=",";
}
}
if($siga_baja_activoDto->getSeg_Dir_Adminis()!=""){
$sql.=",Seg_Dir_Adminis='".$siga_baja_activoDto->getSeg_Dir_Adminis()."'";
}
if($siga_baja_activoDto->getCuenta_baja()!=""){
$sql.=",Cuenta_baja='".$siga_baja_activoDto->getCuenta_baja()."'";
}
if($siga_baja_activoDto->getJefe_Area()!=""){
$sql.=",Jefe_Area='".$siga_baja_activoDto->getJefe_Area()."'";
}
if($siga_baja_activoDto->getSeg_Usuario_Resp()!=""){
$sql.=",Seg_Usuario_Resp='".$siga_baja_activoDto->getSeg_Usuario_Resp()."'";
}
$sql.=" WHERE Id_baja='".$siga_baja_activoDto->getId_baja()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_baja_activoDTO();
$tmp->setId_baja($siga_baja_activoDto->getId_baja());
$tmp = $this->selectSiga_baja_activo($tmp,"",$this->_proveedor);
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
public function deleteSiga_baja_activo($siga_baja_activoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}

$sql="DELETE FROM siga_workflow_activo  WHERE Id_Activo='".$siga_baja_activoDto->getId_baja()."'";
//echo $sql;
$this->_proveedor->execute($sql);

$sql="DELETE FROM siga_baja_activo  WHERE Id_Activo='".$siga_baja_activoDto->getId_baja()."'";
//echo $sql;
$this->_proveedor->execute($sql);


$sql="update siga_activos set Id_Situacion_Activo=1 WHERE Id_Activo='".$siga_baja_activoDto->getId_baja()."'";
//echo $sql;
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
public function selectSiga_baja_activo($siga_baja_activoDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_baja,Id_Activo,Motivo_Baja,Comentarios,Destino,Fecha_Baja,Usuario,Seg_Sol_Baja,Seg_Resp_Area_Ges,Seg_Dir_Adminis,Jefe_Area,Cuenta_baja,Seg_Usuario_Resp FROM siga_baja_activo ";
if(($siga_baja_activoDto->getId_baja()!="") ||($siga_baja_activoDto->getId_Activo()!="") ||($siga_baja_activoDto->getMotivo_Baja()!="") ||($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") || ($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" WHERE ";
}
if($siga_baja_activoDto->getId_baja()!=""){
$sql.="Id_baja='".$siga_baja_activoDto->getId_baja()."'";
if(($siga_baja_activoDto->getId_Activo()!="") ||($siga_baja_activoDto->getMotivo_Baja()!="") ||($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") || ($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" AND ";
}
}
if($siga_baja_activoDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_baja_activoDto->getId_Activo()."'";
if(($siga_baja_activoDto->getMotivo_Baja()!="") ||($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") || ($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" AND ";
}
}
if($siga_baja_activoDto->getMotivo_Baja()!=""){
$sql.="Motivo_Baja='".$siga_baja_activoDto->getMotivo_Baja()."'";
if(($siga_baja_activoDto->getComentarios()!="") ||($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") || ($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" AND ";
}
}
if($siga_baja_activoDto->getComentarios()!=""){
$sql.="Comentarios='".$siga_baja_activoDto->getComentarios()."'";
if(($siga_baja_activoDto->getDestino()!="") ||($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") || ($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" AND ";
}
}
if($siga_baja_activoDto->getDestino()!=""){
$sql.="Destino='".$siga_baja_activoDto->getDestino()."'";
if(($siga_baja_activoDto->getFecha_Baja()!="") ||($siga_baja_activoDto->getUsuario()!="") || ($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" AND ";
}
}
if($siga_baja_activoDto->getFecha_Baja()!=""){
$sql.="Fecha_Baja='".$siga_baja_activoDto->getFecha_Baja()."'";
if(($siga_baja_activoDto->getUsuario()!="") || ($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" AND ";
}
}
if($siga_baja_activoDto->getUsuario()!=""){
$sql.="Usuario='".$siga_baja_activoDto->getUsuario()."'";
if(($siga_baja_activoDto->getSeg_Sol_Baja()!="")||($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" AND ";
}
}
if($siga_baja_activoDto->getSeg_Sol_Baja()!=""){
$sql.="Seg_Sol_Baja='".$siga_baja_activoDto->getSeg_Sol_Baja()."'";
if(($siga_baja_activoDto->getSeg_Resp_Area_Ges()!="")||($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" AND ";
}
}
if($siga_baja_activoDto->getSeg_Resp_Area_Ges()!=""){
$sql.="Seg_Resp_Area_Ges='".$siga_baja_activoDto->getSeg_Resp_Area_Ges()."'";
if(($siga_baja_activoDto->getSeg_Dir_Adminis()!="")){
$sql.=" AND ";
}
}
if($siga_baja_activoDto->getSeg_Dir_Adminis()!=""){
$sql.="Seg_Dir_Adminis='".$siga_baja_activoDto->getSeg_Dir_Adminis()."'";
}
//if($orden!=""){
$sql.=" order by Id_baja desc";
//}else{
//$sql.="";
//}
//echo $sql;
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
$tmp = [];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_baja_activoDTO();
$tmp[$contador]->setId_baja($row["Id_baja"]);
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
$tmp[$contador]->setMotivo_Baja($row["Motivo_Baja"]);
$tmp[$contador]->setComentarios($row["Comentarios"]);
$tmp[$contador]->setDestino($row["Destino"]);
$tmp[$contador]->setFecha_Baja($row["Fecha_Baja"]);
$tmp[$contador]->setUsuario($row["Usuario"]);
$tmp[$contador]->setSeg_Sol_Baja($row["Seg_Sol_Baja"]);
$tmp[$contador]->setSeg_Resp_Area_Ges($row["Seg_Resp_Area_Ges"]);
$tmp[$contador]->setSeg_Dir_Adminis($row["Seg_Dir_Adminis"]);
$tmp[$contador]->setCuenta_baja($row["Cuenta_baja"]);
$tmp[$contador]->setJefe_Area($row["Jefe_Area"]);
$tmp[$contador]->setSeg_Usuario_Resp($row["Seg_Usuario_Resp"]);
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