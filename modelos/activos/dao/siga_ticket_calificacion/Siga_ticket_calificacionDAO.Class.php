<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_ticket_calificacion/Siga_ticket_calificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_ticket_calificacionDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_ticket_calificacion($siga_ticket_calificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_ticket_calificacion(";
//if($siga_ticket_calificacionDto->getId_CalificaTicket()!=""){
//$sql.="Id_CalificaTicket";
//if(($siga_ticket_calificacionDto->getId_Solicitud()!="") ||($siga_ticket_calificacionDto->getId_Pregunta1()!="") ||($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_ticket_calificacionDto->getId_Solicitud()!=""){
$sql.="Id_Solicitud";
if(($siga_ticket_calificacionDto->getId_Pregunta1()!="") ||($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta1()!=""){
$sql.="Id_Pregunta1";
if(($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta1()!=""){
$sql.="Id_Respuesta1";
if(($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario1()!=""){
$sql.="Desc_Comentario1";
if(($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta2()!=""){
$sql.="Id_Pregunta2";
if(($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta2()!=""){
$sql.="Id_Respuesta2";
if(($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario2()!=""){
$sql.="Desc_Comentario2";
if(($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta3()!=""){
$sql.="Id_Pregunta3";
if(($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta3()!=""){
$sql.="Id_Respuesta3";
if(($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario3()!=""){
$sql.="Desc_Comentario3";
if(($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}

if($siga_ticket_calificacionDto->getArchivo_Binario()!=""){
$sql.=",Archivo_Binario";
}

$sql.=") VALUES(";
//if($siga_ticket_calificacionDto->getId_CalificaTicket()!=""){
//$sql.="'".$siga_ticket_calificacionDto->getId_CalificaTicket()."'";
//if(($siga_ticket_calificacionDto->getId_Solicitud()!="") ||($siga_ticket_calificacionDto->getId_Pregunta1()!="") ||($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_ticket_calificacionDto->getId_Solicitud()!=""){
$sql.="'".$siga_ticket_calificacionDto->getId_Solicitud()."'";
if(($siga_ticket_calificacionDto->getId_Pregunta1()!="") ||($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta1()!=""){
$sql.="'".$siga_ticket_calificacionDto->getId_Pregunta1()."'";
if(($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta1()!=""){
$sql.="'".$siga_ticket_calificacionDto->getId_Respuesta1()."'";
if(($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario1()!=""){
$sql.="'".$siga_ticket_calificacionDto->getDesc_Comentario1()."'";
if(($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta2()!=""){
$sql.="'".$siga_ticket_calificacionDto->getId_Pregunta2()."'";
if(($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta2()!=""){
$sql.="'".$siga_ticket_calificacionDto->getId_Respuesta2()."'";
if(($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario2()!=""){
$sql.="'".$siga_ticket_calificacionDto->getDesc_Comentario2()."'";
if(($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta3()!=""){
$sql.="'".$siga_ticket_calificacionDto->getId_Pregunta3()."'";
if(($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta3()!=""){
$sql.="'".$siga_ticket_calificacionDto->getId_Respuesta3()."'";
if(($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario3()!=""){
$sql.="'".$siga_ticket_calificacionDto->getDesc_Comentario3()."'";
if(($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getFech_Inser()!=""){
$sql.="".$siga_ticket_calificacionDto->getFech_Inser()."";
if(($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getUsr_Inser()!=""){
$sql.="'".$siga_ticket_calificacionDto->getUsr_Inser()."'";
if(($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getFech_Mod()!=""){
$sql.="".$siga_ticket_calificacionDto->getFech_Mod()."";
if(($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getUsr_Mod()!=""){
$sql.="'".$siga_ticket_calificacionDto->getUsr_Mod()."'";
if(($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getEstatus_Reg()!=""){
$sql.="'".$siga_ticket_calificacionDto->getEstatus_Reg()."'";
}
if($siga_ticket_calificacionDto->getArchivo_Binario()!=""){
$sql.=",'".$siga_ticket_calificacionDto->getArchivo_Binario()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_ticket_calificacionDTO();
$tmp->setId_CalificaTicket($this->_proveedor->lastID());
$tmp = $this->selectSiga_ticket_calificacion($tmp,"",$this->_proveedor);
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
public function updateSiga_ticket_calificacion($siga_ticket_calificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_ticket_calificacion SET ";
//if($siga_ticket_calificacionDto->getId_CalificaTicket()!=""){
//$sql.="Id_CalificaTicket='".$siga_ticket_calificacionDto->getId_CalificaTicket()."'";
//if(($siga_ticket_calificacionDto->getId_Solicitud()!="") ||($siga_ticket_calificacionDto->getId_Pregunta1()!="") ||($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_ticket_calificacionDto->getId_Solicitud()!=""){
$sql.="Id_Solicitud='".$siga_ticket_calificacionDto->getId_Solicitud()."'";
if(($siga_ticket_calificacionDto->getId_Pregunta1()!="") ||($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta1()!=""){
$sql.="Id_Pregunta1='".$siga_ticket_calificacionDto->getId_Pregunta1()."'";
if(($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta1()!=""){
$sql.="Id_Respuesta1='".$siga_ticket_calificacionDto->getId_Respuesta1()."'";
if(($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario1()!=""){
$sql.="Desc_Comentario1='".$siga_ticket_calificacionDto->getDesc_Comentario1()."'";
if(($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta2()!=""){
$sql.="Id_Pregunta2='".$siga_ticket_calificacionDto->getId_Pregunta2()."'";
if(($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta2()!=""){
$sql.="Id_Respuesta2='".$siga_ticket_calificacionDto->getId_Respuesta2()."'";
if(($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario2()!=""){
$sql.="Desc_Comentario2='".$siga_ticket_calificacionDto->getDesc_Comentario2()."'";
if(($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta3()!=""){
$sql.="Id_Pregunta3='".$siga_ticket_calificacionDto->getId_Pregunta3()."'";
if(($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta3()!=""){
$sql.="Id_Respuesta3='".$siga_ticket_calificacionDto->getId_Respuesta3()."'";
if(($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario3()!=""){
$sql.="Desc_Comentario3='".$siga_ticket_calificacionDto->getDesc_Comentario3()."'";
if(($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_ticket_calificacionDto->getFech_Inser()."'";
if(($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_ticket_calificacionDto->getUsr_Inser()."'";
if(($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_ticket_calificacionDto->getFech_Mod()."";
if(($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_ticket_calificacionDto->getUsr_Mod()."'";
if(($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_ticket_calificacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_ticket_calificacionDto->getEstatus_Reg()."'";
}
if($siga_ticket_calificacionDto->getArchivo_Binario()!=""){
$sql.=",Archivo_Binario='".$siga_ticket_calificacionDto->getArchivo_Binario()."'";
}
$sql.=" WHERE Id_CalificaTicket='".$siga_ticket_calificacionDto->getId_CalificaTicket()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_ticket_calificacionDTO();
$tmp->setId_CalificaTicket($siga_ticket_calificacionDto->getId_CalificaTicket());
$tmp = $this->selectSiga_ticket_calificacion($tmp,"",$this->_proveedor);
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
public function deleteSiga_ticket_calificacion($siga_ticket_calificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_ticket_calificacion  WHERE Id_CalificaTicket='".$siga_ticket_calificacionDto->getId_CalificaTicket()."'";
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
public function selectSiga_ticket_calificacion($siga_ticket_calificacionDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_CalificaTicket,Id_Solicitud,Id_Pregunta1,Id_Respuesta1,Desc_Comentario1,Id_Pregunta2,Id_Respuesta2,Desc_Comentario2,Id_Pregunta3,Id_Respuesta3,Desc_Comentario3,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg,Archivo_Binario FROM siga_ticket_calificacion ";
if(($siga_ticket_calificacionDto->getId_CalificaTicket()!="") ||($siga_ticket_calificacionDto->getId_Solicitud()!="") ||($siga_ticket_calificacionDto->getId_Pregunta1()!="") ||($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_ticket_calificacionDto->getId_CalificaTicket()!=""){
$sql.="Id_CalificaTicket='".$siga_ticket_calificacionDto->getId_CalificaTicket()."'";
if(($siga_ticket_calificacionDto->getId_Solicitud()!="") ||($siga_ticket_calificacionDto->getId_Pregunta1()!="") ||($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getId_Solicitud()!=""){
$sql.="Id_Solicitud='".$siga_ticket_calificacionDto->getId_Solicitud()."'";
if(($siga_ticket_calificacionDto->getId_Pregunta1()!="") ||($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta1()!=""){
$sql.="Id_Pregunta1='".$siga_ticket_calificacionDto->getId_Pregunta1()."'";
if(($siga_ticket_calificacionDto->getId_Respuesta1()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta1()!=""){
$sql.="Id_Respuesta1='".$siga_ticket_calificacionDto->getId_Respuesta1()."'";
if(($siga_ticket_calificacionDto->getDesc_Comentario1()!="") ||($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario1()!=""){
$sql.="Desc_Comentario1='".$siga_ticket_calificacionDto->getDesc_Comentario1()."'";
if(($siga_ticket_calificacionDto->getId_Pregunta2()!="") ||($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta2()!=""){
$sql.="Id_Pregunta2='".$siga_ticket_calificacionDto->getId_Pregunta2()."'";
if(($siga_ticket_calificacionDto->getId_Respuesta2()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta2()!=""){
$sql.="Id_Respuesta2='".$siga_ticket_calificacionDto->getId_Respuesta2()."'";
if(($siga_ticket_calificacionDto->getDesc_Comentario2()!="") ||($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario2()!=""){
$sql.="Desc_Comentario2='".$siga_ticket_calificacionDto->getDesc_Comentario2()."'";
if(($siga_ticket_calificacionDto->getId_Pregunta3()!="") ||($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getId_Pregunta3()!=""){
$sql.="Id_Pregunta3='".$siga_ticket_calificacionDto->getId_Pregunta3()."'";
if(($siga_ticket_calificacionDto->getId_Respuesta3()!="") ||($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getId_Respuesta3()!=""){
$sql.="Id_Respuesta3='".$siga_ticket_calificacionDto->getId_Respuesta3()."'";
if(($siga_ticket_calificacionDto->getDesc_Comentario3()!="") ||($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getDesc_Comentario3()!=""){
$sql.="Desc_Comentario3='".$siga_ticket_calificacionDto->getDesc_Comentario3()."'";
if(($siga_ticket_calificacionDto->getFech_Inser()!="") ||($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_ticket_calificacionDto->getFech_Inser()."'";
if(($siga_ticket_calificacionDto->getUsr_Inser()!="") ||($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_ticket_calificacionDto->getUsr_Inser()."'";
if(($siga_ticket_calificacionDto->getFech_Mod()!="") ||($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_ticket_calificacionDto->getFech_Mod()."'";
if(($siga_ticket_calificacionDto->getUsr_Mod()!="") ||($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_ticket_calificacionDto->getUsr_Mod()."'";
if(($siga_ticket_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_calificacionDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_ticket_calificacionDTO();
$tmp[$contador]->setId_CalificaTicket($row["Id_CalificaTicket"]);
$tmp[$contador]->setId_Solicitud($row["Id_Solicitud"]);
$tmp[$contador]->setId_Pregunta1($row["Id_Pregunta1"]);
$tmp[$contador]->setId_Respuesta1($row["Id_Respuesta1"]);
$tmp[$contador]->setDesc_Comentario1($row["Desc_Comentario1"]);
$tmp[$contador]->setId_Pregunta2($row["Id_Pregunta2"]);
$tmp[$contador]->setId_Respuesta2($row["Id_Respuesta2"]);
$tmp[$contador]->setDesc_Comentario2($row["Desc_Comentario2"]);
$tmp[$contador]->setId_Pregunta3($row["Id_Pregunta3"]);
$tmp[$contador]->setId_Respuesta3($row["Id_Respuesta3"]);
$tmp[$contador]->setDesc_Comentario3($row["Desc_Comentario3"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setArchivo_Binario(rtrim(ltrim($row["Archivo_Binario"])));
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