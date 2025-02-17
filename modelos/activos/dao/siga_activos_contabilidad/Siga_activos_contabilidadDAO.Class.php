<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_activos_contabilidad/Siga_activos_contabilidadDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_activos_contabilidadDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_activos_contabilidad($siga_activos_contabilidadDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Activo_Contabilidad+1) IS NULL then 1 else (max(Id_Activo_Contabilidad + 1)) end as IndiceMaximo from siga_activos_contabilidad ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_activos_contabilidad on ";
$sql.="INSERT INTO siga_activos_contabilidad(";
$sql.="Id_Activo_Contabilidad";
$sql.=",";
$sql.="Id_Activo";
$sql.=",";
$sql.="Centro_Costos";
$sql.=",";
$sql.="No_Capex";
$sql.=",";
$sql.="Prorrateo";
$sql.=",";
$sql.="Participa_Depreciacion";
$sql.=",";
if($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!=""){
$sql.="Fecha_Inicio_Depr";
$sql.=",";
}
$sql.="Url_Factura";
$sql.=",";
if($siga_activos_contabilidadDto->getCuent_Cont_Act()!=""){
$sql.="Cuent_Cont_Act";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!=""){
$sql.="Cuent_Cont_Act_B10";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Result()!=""){
$sql.="Cuent_Cont_Result";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!=""){
$sql.="Cuent_Cont_Result_B10";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Dep()!=""){
$sql.="Cuent_Cont_Dep";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!=""){
$sql.="Cuent_Cont_Dep_B10";
$sql.=",";
}
$sql.="Fech_Inser";
$sql.=",";
$sql.="Usr_Inser";
$sql.=",";
$sql.="Fech_Mod";
$sql.=",";
$sql.="Usr_Mod";
$sql.=",";
$sql.="Estatus_Reg";
$sql.=",";
$sql.="Url_Xml";
$sql.=") VALUES(";
$sql.="'".$Idmaximo."'";
$sql.=",";
$sql.="'".$siga_activos_contabilidadDto->getId_Activo()."'";
$sql.=",";
$sql.="'".$siga_activos_contabilidadDto->getCentro_Costos()."'";
$sql.=",";
$sql.="'".$siga_activos_contabilidadDto->getNo_Capex()."'";
$sql.=",";
$sql.="'".$siga_activos_contabilidadDto->getProrrateo()."'";
$sql.=",";
$sql.="'".$siga_activos_contabilidadDto->getParticipa_Depreciacion()."'";
$sql.=",";
if($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!=""){
$sql.="'".$siga_activos_contabilidadDto->getFecha_Inicio_Depr()."'";
$sql.=",";
}
$sql.="'".$siga_activos_contabilidadDto->getUrl_Factura()."'";
$sql.=",";
if($siga_activos_contabilidadDto->getCuent_Cont_Act()!=""){
$sql.="'".$siga_activos_contabilidadDto->getCuent_Cont_Act()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!=""){
$sql.="'".$siga_activos_contabilidadDto->getCuent_Cont_Act_B10()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Result()!=""){
$sql.="'".$siga_activos_contabilidadDto->getCuent_Cont_Result()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!=""){
$sql.="'".$siga_activos_contabilidadDto->getCuent_Cont_Result_B10()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Dep()!=""){
$sql.="'".$siga_activos_contabilidadDto->getCuent_Cont_Dep()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!=""){
$sql.="'".$siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()."'";
$sql.=",";
}
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_activos_contabilidadDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_activos_contabilidadDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_activos_contabilidadDto->getEstatus_Reg()."'";
$sql.=",";
$sql.="'".$siga_activos_contabilidadDto->getUrl_Xml()."'";
$sql.=")";
//
$sql.=" set identity_insert siga_activos_contabilidad off ";
//
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}

if (!$this->_proveedor->error()) {
$tmp = new Siga_activos_contabilidadDTO();
$tmp->setId_Activo_Contabilidad($this->_proveedor->lastID());
$tmp = $this->selectSiga_activos_contabilidad($tmp,"",$this->_proveedor);
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
public function updateSiga_activos_contabilidad($siga_activos_contabilidadDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_activos_contabilidad SET ";
if($siga_activos_contabilidadDto->getEstatus_Reg()!="3"){
$sql.="Id_Activo='".$siga_activos_contabilidadDto->getId_Activo()."'";
$sql.=",";
$sql.="Centro_Costos='".$siga_activos_contabilidadDto->getCentro_Costos()."'";
$sql.=",";
$sql.="No_Capex='".$siga_activos_contabilidadDto->getNo_Capex()."'";
$sql.=",";
$sql.="Prorrateo='".$siga_activos_contabilidadDto->getProrrateo()."'";
$sql.=",";
$sql.="Participa_Depreciacion='".$siga_activos_contabilidadDto->getParticipa_Depreciacion()."'";
$sql.=",";
if($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!=""){
$sql.="Fecha_Inicio_Depr='".$siga_activos_contabilidadDto->getFecha_Inicio_Depr()."'";
$sql.=",";
}
$sql.="Url_Factura='".$siga_activos_contabilidadDto->getUrl_Factura()."'";
$sql.=",";
if($siga_activos_contabilidadDto->getCuent_Cont_Act()!=""){
$sql.="Cuent_Cont_Act='".$siga_activos_contabilidadDto->getCuent_Cont_Act()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!=""){
$sql.="Cuent_Cont_Act_B10='".$siga_activos_contabilidadDto->getCuent_Cont_Act_B10()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Result()!=""){
$sql.="Cuent_Cont_Result='".$siga_activos_contabilidadDto->getCuent_Cont_Result()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!=""){
$sql.="Cuent_Cont_Result_B10='".$siga_activos_contabilidadDto->getCuent_Cont_Result_B10()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Dep()!=""){
$sql.="Cuent_Cont_Dep='".$siga_activos_contabilidadDto->getCuent_Cont_Dep()."'";
$sql.=",";
}
if($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!=""){
$sql.="Cuent_Cont_Dep_B10='".$siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()."'";
$sql.=",";
}

}

if($siga_activos_contabilidadDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_activos_contabilidadDto->getFech_Inser()."'";
if(($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_activos_contabilidadDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_activos_contabilidadDto->getUsr_Inser()."'";
if(($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}

$sql.="Fech_Mod=getdate()";
if(($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=",";
}
if($siga_activos_contabilidadDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_activos_contabilidadDto->getUsr_Mod()."'";
if(($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_activos_contabilidadDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_activos_contabilidadDto->getEstatus_Reg()."'";
}
$sql.=",";
$sql.="Url_Xml='".$siga_activos_contabilidadDto->getUrl_Xml()."'";
$sql.=" WHERE Id_Activo_Contabilidad='".$siga_activos_contabilidadDto->getId_Activo_Contabilidad()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_activos_contabilidadDTO();
$tmp->setId_Activo_Contabilidad($siga_activos_contabilidadDto->getId_Activo_Contabilidad());
$tmp = $this->selectSiga_activos_contabilidad($tmp,"",$this->_proveedor);


$sql="UPDATE siga_activos_contabilidad SET Centro_Costos='".$siga_activos_contabilidadDto->getCentro_Costos()."'";
$sql.=" WHERE Id_Activo in (select Id_Activo from siga_Activos where Id_ActivoPadre='".$siga_activos_contabilidadDto->getId_Activo()."')";
//echo $sql;
$this->_proveedor->execute($sql);

if ($this->_proveedor->error()) 
{
	echo "Error=".$this->_proveedor->error();
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
public function deleteSiga_activos_contabilidad($siga_activos_contabilidadDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_activos_contabilidad  WHERE Id_Activo_Contabilidad='".$siga_activos_contabilidadDto->getId_Activo_Contabilidad()."'";
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
public function selectSiga_activos_contabilidad($siga_activos_contabilidadDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Activo_Contabilidad,Id_Activo,Centro_Costos,No_Capex,Prorrateo,Participa_Depreciacion,Fecha_Inicio_Depr,Url_Factura,Cuent_Cont_Act,Cuent_Cont_Act_B10,Cuent_Cont_Result,Cuent_Cont_Result_B10,Cuent_Cont_Dep,Cuent_Cont_Dep_B10,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg, Url_Xml FROM siga_activos_contabilidad ";
if(($siga_activos_contabilidadDto->getId_Activo_Contabilidad()!="") ||($siga_activos_contabilidadDto->getId_Activo()!="") ||($siga_activos_contabilidadDto->getCentro_Costos()!="") ||($siga_activos_contabilidadDto->getNo_Capex()!="")||($siga_activos_contabilidadDto->getProrrateo()!="") ||($siga_activos_contabilidadDto->getParticipa_Depreciacion()!="") ||($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!="") ||($siga_activos_contabilidadDto->getUrl_Factura()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Act()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_activos_contabilidadDto->getId_Activo_Contabilidad()!=""){
$sql.="Id_Activo_Contabilidad='".$siga_activos_contabilidadDto->getId_Activo_Contabilidad()."'";
if(($siga_activos_contabilidadDto->getId_Activo()!="") ||($siga_activos_contabilidadDto->getCentro_Costos()!="") ||($siga_activos_contabilidadDto->getNo_Capex()!="") ||($siga_activos_contabilidadDto->getProrrateo()!="")||($siga_activos_contabilidadDto->getParticipa_Depreciacion()!="") ||($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!="") ||($siga_activos_contabilidadDto->getUrl_Factura()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_activos_contabilidadDto->getId_Activo()."'";
if(($siga_activos_contabilidadDto->getCentro_Costos()!="") ||($siga_activos_contabilidadDto->getNo_Capex()!="")||($siga_activos_contabilidadDto->getProrrateo()!="") ||($siga_activos_contabilidadDto->getParticipa_Depreciacion()!="") ||($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!="") ||($siga_activos_contabilidadDto->getUrl_Factura()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getCentro_Costos()!=""){
$sql.="Centro_Costos='".$siga_activos_contabilidadDto->getCentro_Costos()."'";
if(($siga_activos_contabilidadDto->getNo_Capex()!="") ||($siga_activos_contabilidadDto->getProrrateo()!="")||($siga_activos_contabilidadDto->getParticipa_Depreciacion()!="") ||($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!="") ||($siga_activos_contabilidadDto->getUrl_Factura()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getNo_Capex()!=""){
$sql.="No_Capex='".$siga_activos_contabilidadDto->getNo_Capex()."'";
if(($siga_activos_contabilidadDto->getProrrateo()!="")||($siga_activos_contabilidadDto->getParticipa_Depreciacion()!="") ||($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!="") ||($siga_activos_contabilidadDto->getUrl_Factura()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getProrrateo()!=""){
$sql.="Prorrateo='".$siga_activos_contabilidadDto->getProrrateo()."'";
if(($siga_activos_contabilidadDto->getProrrateo()!="")||($siga_activos_contabilidadDto->getParticipa_Depreciacion()!="") ||($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!="") ||($siga_activos_contabilidadDto->getUrl_Factura()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getParticipa_Depreciacion()!=""){
$sql.="Participa_Depreciacion='".$siga_activos_contabilidadDto->getParticipa_Depreciacion()."'";
if(($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!="") ||($siga_activos_contabilidadDto->getUrl_Factura()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getFecha_Inicio_Depr()!=""){
$sql.="Fecha_Inicio_Depr='".$siga_activos_contabilidadDto->getFecha_Inicio_Depr()."'";
if(($siga_activos_contabilidadDto->getUrl_Factura()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getUrl_Factura()!=""){
$sql.="Url_Factura='".$siga_activos_contabilidadDto->getUrl_Factura()."'";
if(($siga_activos_contabilidadDto->getCuent_Cont_Act()!="") ||($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_activos_contabilidadDto->getCuent_Cont_Act()!=""){
$sql.="Cuent_Cont_Act='".$siga_activos_contabilidadDto->getCuent_Cont_Act()."'";
if(($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_activos_contabilidadDto->getCuent_Cont_Act_B10()!=""){
$sql.="Cuent_Cont_Act_B10='".$siga_activos_contabilidadDto->getCuent_Cont_Act_B10()."'";
if(($siga_activos_contabilidadDto->getCuent_Cont_Result()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_activos_contabilidadDto->getCuent_Cont_Result()!=""){
$sql.="Cuent_Cont_Result='".$siga_activos_contabilidadDto->getCuent_Cont_Result()."'";
if(($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_activos_contabilidadDto->getCuent_Cont_Result_B10()!=""){
$sql.="Cuent_Cont_Result_B10='".$siga_activos_contabilidadDto->getCuent_Cont_Result_B10()."'";
if(($siga_activos_contabilidadDto->getCuent_Cont_Dep()!="")||($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_activos_contabilidadDto->getCuent_Cont_Dep()!=""){
$sql.="Cuent_Cont_Dep='".$siga_activos_contabilidadDto->getCuent_Cont_Dep()."'";
if(($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!="")||($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()!=""){
$sql.="Cuent_Cont_Dep_B10='".$siga_activos_contabilidadDto->getCuent_Cont_Dep_B10()."'";
if(($siga_activos_contabilidadDto->getFech_Inser()!="") ||($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}


if($siga_activos_contabilidadDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_activos_contabilidadDto->getFech_Inser()."'";
if(($siga_activos_contabilidadDto->getUsr_Inser()!="") ||($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_activos_contabilidadDto->getUsr_Inser()."'";
if(($siga_activos_contabilidadDto->getFech_Mod()!="") ||($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_activos_contabilidadDto->getFech_Mod()."'";
if(($siga_activos_contabilidadDto->getUsr_Mod()!="") ||($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_activos_contabilidadDto->getUsr_Mod()."'";
if(($siga_activos_contabilidadDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activos_contabilidadDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_activos_contabilidadDTO();
$tmp[$contador]->setId_Activo_Contabilidad($row["Id_Activo_Contabilidad"]);
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
$tmp[$contador]->setCentro_Costos(rtrim(ltrim($row["Centro_Costos"])));
$tmp[$contador]->setNo_Capex(rtrim(ltrim($row["No_Capex"])));
$tmp[$contador]->setProrrateo(rtrim(ltrim($row["Prorrateo"])));
$tmp[$contador]->setParticipa_Depreciacion(rtrim(ltrim($row["Participa_Depreciacion"])));
$tmp[$contador]->setFecha_Inicio_Depr(rtrim(ltrim($row["Fecha_Inicio_Depr"])));
$tmp[$contador]->setUrl_Factura(rtrim(ltrim($row["Url_Factura"])));
$tmp[$contador]->setCuent_Cont_Act(rtrim(ltrim($row["Cuent_Cont_Act"])));
$tmp[$contador]->setCuent_Cont_Act_B10(rtrim(ltrim($row["Cuent_Cont_Act_B10"])));
$tmp[$contador]->setCuent_Cont_Result(rtrim(ltrim($row["Cuent_Cont_Result"])));
$tmp[$contador]->setCuent_Cont_Result_B10(rtrim(ltrim($row["Cuent_Cont_Result_B10"])));
$tmp[$contador]->setCuent_Cont_Dep(rtrim(ltrim($row["Cuent_Cont_Dep"])));
$tmp[$contador]->setCuent_Cont_Dep_B10(rtrim(ltrim($row["Cuent_Cont_Dep_B10"])));
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setUrl_Xml($row["Url_Xml"]);
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