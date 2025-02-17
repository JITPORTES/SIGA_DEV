<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_actividades_calificacion/Siga_actividades_calificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_actividades_calificacionDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_actividades_calificacion($siga_actividades_calificacionDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Calificacion+1) IS NULL then 1 else (max(Id_Calificacion + 1)) end as IndiceMaximo from siga_actividades_calificacion ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_actividades_calificacion on ";
$sql.="INSERT INTO siga_actividades_calificacion(";
//if($siga_actividades_calificacionDto->getId_Calificacion()!=""){
$sql.="Id_Calificacion";
if(($siga_actividades_calificacionDto->getId_Actividad()!="") ||($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
//}
if($siga_actividades_calificacionDto->getId_Actividad()!=""){
$sql.="Id_Actividad";
if(($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!=""){
$sql.="Cal_Sol_Ofrecida";
if(($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!=""){
$sql.="Comen_Sol_Ofrecida";
if(($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getCal_Act_Servicio()!=""){
$sql.="Cal_Act_Servicio";
if(($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getComen_Act_Servicio()!=""){
$sql.="Comen_Act_Servicio";
if(($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!=""){
$sql.="Cal_Tiem_Respusta";
if(($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!=""){
$sql.="Comen_Tiem_Respuesta";
if(($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
//if($siga_actividades_calificacionDto->getId_Calificacion()!=""){
$sql.="'".$Idmaximo."'";
if(($siga_actividades_calificacionDto->getId_Actividad()!="") ||($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
//}
if($siga_actividades_calificacionDto->getId_Actividad()!=""){
$sql.="".$siga_actividades_calificacionDto->getId_Actividad()."";
if(($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!=""){
$sql.="'".$siga_actividades_calificacionDto->getCal_Sol_Ofrecida()."'";
if(($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!=""){
$sql.="'".$siga_actividades_calificacionDto->getComen_Sol_Ofrecida()."'";
if(($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getCal_Act_Servicio()!=""){
$sql.="'".$siga_actividades_calificacionDto->getCal_Act_Servicio()."'";
if(($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getComen_Act_Servicio()!=""){
$sql.="'".$siga_actividades_calificacionDto->getComen_Act_Servicio()."'";
if(($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!=""){
$sql.="'".$siga_actividades_calificacionDto->getCal_Tiem_Respusta()."'";
if(($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!=""){
$sql.="'".$siga_actividades_calificacionDto->getComen_Tiem_Respuesta()."'";
if(($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getFech_Inser()!=""){
$sql.="".$siga_actividades_calificacionDto->getFech_Inser()."";
if(($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getUsr_Inser()!=""){
$sql.="'".$siga_actividades_calificacionDto->getUsr_Inser()."'";
if(($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getFech_Mod()!=""){
$sql.="".$siga_actividades_calificacionDto->getFech_Mod()."";
if(($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getUsr_Mod()!=""){
$sql.="'".$siga_actividades_calificacionDto->getUsr_Mod()."'";
if(($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getEstatus_Reg()!=""){
$sql.="'".$siga_actividades_calificacionDto->getEstatus_Reg()."'";
}
$sql.=")";
//
$sql.=" set identity_insert siga_actividades_calificacion off ";
//
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}

if (!$this->_proveedor->error()) {
$tmp = new Siga_actividades_calificacionDTO();
$tmp->setId_Calificacion($Idmaximo);
$tmp = $this->selectSiga_actividades_calificacion($tmp,"",$this->_proveedor);
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
public function updateSiga_actividades_calificacion($siga_actividades_calificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_actividades_calificacion SET ";
//if($siga_actividades_calificacionDto->getId_Calificacion()!=""){
//$sql.="Id_Calificacion='".$siga_actividades_calificacionDto->getId_Calificacion()."'";
//if(($siga_actividades_calificacionDto->getId_Actividad()!="") ||($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_actividades_calificacionDto->getId_Actividad()!=""){
$sql.="Id_Actividad='".$siga_actividades_calificacionDto->getId_Actividad()."'";
if(($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!=""){
$sql.="Cal_Sol_Ofrecida='".$siga_actividades_calificacionDto->getCal_Sol_Ofrecida()."'";
if(($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!=""){
$sql.="Comen_Sol_Ofrecida='".$siga_actividades_calificacionDto->getComen_Sol_Ofrecida()."'";
if(($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getCal_Act_Servicio()!=""){
$sql.="Cal_Act_Servicio='".$siga_actividades_calificacionDto->getCal_Act_Servicio()."'";
if(($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getComen_Act_Servicio()!=""){
$sql.="Comen_Act_Servicio='".$siga_actividades_calificacionDto->getComen_Act_Servicio()."'";
if(($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!=""){
$sql.="Cal_Tiem_Respusta='".$siga_actividades_calificacionDto->getCal_Tiem_Respusta()."'";
if(($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!=""){
$sql.="Comen_Tiem_Respuesta='".$siga_actividades_calificacionDto->getComen_Tiem_Respuesta()."'";
if(($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_actividades_calificacionDto->getFech_Inser()."'";
if(($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_actividades_calificacionDto->getUsr_Inser()."'";
if(($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_actividades_calificacionDto->getFech_Mod()."";
if(($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_actividades_calificacionDto->getUsr_Mod()."'";
if(($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_actividades_calificacionDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_actividades_calificacionDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Calificacion='".$siga_actividades_calificacionDto->getId_Calificacion()."'";

$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_actividades_calificacionDTO();
$tmp->setId_Calificacion($siga_actividades_calificacionDto->getId_Calificacion());
$tmp = $this->selectSiga_actividades_calificacion($tmp,"",$this->_proveedor);
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
public function deleteSiga_actividades_calificacion($siga_actividades_calificacionDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_actividades_calificacion  WHERE Id_Calificacion='".$siga_actividades_calificacionDto->getId_Calificacion()."'";
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
public function selectSiga_actividades_calificacion($siga_actividades_calificacionDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Calificacion,Id_Actividad,Cal_Sol_Ofrecida,Comen_Sol_Ofrecida,Cal_Act_Servicio,Comen_Act_Servicio,Cal_Tiem_Respusta,Comen_Tiem_Respuesta,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_actividades_calificacion ";
if(($siga_actividades_calificacionDto->getId_Calificacion()!="") ||($siga_actividades_calificacionDto->getId_Actividad()!="") ||($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_actividades_calificacionDto->getId_Calificacion()!=""){
$sql.="Id_Calificacion='".$siga_actividades_calificacionDto->getId_Calificacion()."'";
if(($siga_actividades_calificacionDto->getId_Actividad()!="") ||($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getId_Actividad()!=""){
$sql.="Id_Actividad='".$siga_actividades_calificacionDto->getId_Actividad()."'";
if(($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getCal_Sol_Ofrecida()!=""){
$sql.="Cal_Sol_Ofrecida='".$siga_actividades_calificacionDto->getCal_Sol_Ofrecida()."'";
if(($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!="") ||($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getComen_Sol_Ofrecida()!=""){
$sql.="Comen_Sol_Ofrecida='".$siga_actividades_calificacionDto->getComen_Sol_Ofrecida()."'";
if(($siga_actividades_calificacionDto->getCal_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getCal_Act_Servicio()!=""){
$sql.="Cal_Act_Servicio='".$siga_actividades_calificacionDto->getCal_Act_Servicio()."'";
if(($siga_actividades_calificacionDto->getComen_Act_Servicio()!="") ||($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getComen_Act_Servicio()!=""){
$sql.="Comen_Act_Servicio='".$siga_actividades_calificacionDto->getComen_Act_Servicio()."'";
if(($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!="") ||($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getCal_Tiem_Respusta()!=""){
$sql.="Cal_Tiem_Respusta='".$siga_actividades_calificacionDto->getCal_Tiem_Respusta()."'";
if(($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!="") ||($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getComen_Tiem_Respuesta()!=""){
$sql.="Comen_Tiem_Respuesta='".$siga_actividades_calificacionDto->getComen_Tiem_Respuesta()."'";
if(($siga_actividades_calificacionDto->getFech_Inser()!="") ||($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_actividades_calificacionDto->getFech_Inser()."'";
if(($siga_actividades_calificacionDto->getUsr_Inser()!="") ||($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_actividades_calificacionDto->getUsr_Inser()."'";
if(($siga_actividades_calificacionDto->getFech_Mod()!="") ||($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_actividades_calificacionDto->getFech_Mod()."'";
if(($siga_actividades_calificacionDto->getUsr_Mod()!="") ||($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_actividades_calificacionDto->getUsr_Mod()."'";
if(($siga_actividades_calificacionDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_actividades_calificacionDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_actividades_calificacionDTO();
$tmp[$contador]->setId_Calificacion($row["Id_Calificacion"]);
$tmp[$contador]->setId_Actividad($row["Id_Actividad"]);
$tmp[$contador]->setCal_Sol_Ofrecida($row["Cal_Sol_Ofrecida"]);
$tmp[$contador]->setComen_Sol_Ofrecida($row["Comen_Sol_Ofrecida"]);
$tmp[$contador]->setCal_Act_Servicio($row["Cal_Act_Servicio"]);
$tmp[$contador]->setComen_Act_Servicio($row["Comen_Act_Servicio"]);
$tmp[$contador]->setCal_Tiem_Respusta($row["Cal_Tiem_Respusta"]);
$tmp[$contador]->setComen_Tiem_Respuesta($row["Comen_Tiem_Respuesta"]);
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