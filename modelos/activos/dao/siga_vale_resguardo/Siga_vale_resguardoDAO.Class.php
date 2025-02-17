<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_vale_resguardo/Siga_vale_resguardoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_vale_resguardoDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_vale_resguardo($siga_vale_resguardoDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Vale_Resguardo+1) IS NULL then 1 else (max(Id_Vale_Resguardo + 1)) end as IndiceMaximo from siga_vale_resguardo ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_vale_resguardo on ";
$sql.="INSERT INTO siga_vale_resguardo(";
$sql.="Id_Vale_Resguardo";
$sql.=",";
$sql.="Id_Tipo_Vale_Resg";
$sql.=",";
$sql.="Id_Area";
$sql.=",";
$sql.="Num_Empleado";
$sql.=",";
$sql.="Extension_Tel";
$sql.=",";
$sql.="Correo";
$sql.=",";
$sql.="Observaciones";
$sql.=",";
$sql.="Estatus_Envio";
$sql.=",";
$sql.="Estatus_Correo_Responsable";
$sql.=",";
$sql.="Estatus_Correo_Solicitante";
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
$sql.="'".$siga_vale_resguardoDto->getId_Tipo_Vale_Resg()."'";
$sql.=",";
$sql.="'".$siga_vale_resguardoDto->getId_Area()."'";
$sql.=",";
$sql.="'".$siga_vale_resguardoDto->getNum_Empleado()."'";
$sql.=",";
$sql.="'".$siga_vale_resguardoDto->getExtension_Tel()."'";
$sql.=",";
$sql.="'".$siga_vale_resguardoDto->getCorreo()."'";
$sql.=",";
$sql.="'".$siga_vale_resguardoDto->getObservaciones()."'";
$sql.=",";
$sql.="'0'";
$sql.=",";
$sql.="'0'";
$sql.=",";
$sql.="'0'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_vale_resguardoDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_vale_resguardoDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_vale_resguardoDto->getEstatus_Reg()."'";
$sql.=")";
//
$sql.=" set identity_insert siga_vale_resguardo off ";
//
//print_r($sql);
//echo "<pre>";
//echo $sql;
//echo "</pre>";
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}


if (!$this->_proveedor->error()) {
$tmp = new Siga_vale_resguardoDTO();
$tmp->setId_Vale_Resguardo($this->_proveedor->lastID());
$tmp = $this->selectSiga_vale_resguardo($tmp,0,"",$this->_proveedor);
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

public function updateSiga_vale_resguardo($siga_vale_resguardoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_vale_resguardo SET ";
if($siga_vale_resguardoDto->getEstatus_Reg()!="3"){
	$sql.="Id_Vale_Resguardo='".$siga_vale_resguardoDto->getId_Vale_Resguardo()."'";
	$sql.=",";
	$sql.="Id_Tipo_Vale_Resg='".$siga_vale_resguardoDto->getId_Tipo_Vale_Resg()."'";
	$sql.=",";
	$sql.="Id_Area='".$siga_vale_resguardoDto->getId_Area()."'";
	$sql.=",";
	$sql.="Num_Empleado='".$siga_vale_resguardoDto->getNum_Empleado()."'";
	$sql.=",";
	$sql.="Extension_Tel='".$siga_vale_resguardoDto->getExtension_Tel()."'";
	$sql.=",";
	$sql.="Correo='".$siga_vale_resguardoDto->getCorreo()."'";
	$sql.=",";
	$sql.="Observaciones='".$siga_vale_resguardoDto->getObservaciones()."'";
	$sql.=",";
	$sql.="Estatus_Envio='".$siga_vale_resguardoDto->getEstatus_Envio()."'";
	$sql.=",";
	$sql.="Estatus_Correo_Responsable='".$siga_vale_resguardoDto->getEstatus_Correo_Responsable()."'";
	$sql.=",";
	$sql.="Estatus_Correo_Solicitante='".$siga_vale_resguardoDto->getEstatus_Correo_Solicitante()."'";
	$sql.=",";
}
$sql.="Fech_Mod=getdate() ";
if(($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=",";
}

if($siga_vale_resguardoDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_vale_resguardoDto->getUsr_Mod()."'";
if(($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_vale_resguardoDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_vale_resguardoDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Vale_Resguardo='".$siga_vale_resguardoDto->getId_Vale_Resguardo()."'";

$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_vale_resguardoDTO();
$tmp->setId_Vale_Resguardo($siga_vale_resguardoDto->getId_Vale_Resguardo());
$tmp = $this->selectSiga_vale_resguardo($tmp,0,"",$this->_proveedor);
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
public function deleteSiga_vale_resguardo($siga_vale_resguardoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_vale_resguardo  WHERE Id_Vale_Resguardo='".$siga_vale_resguardoDto->getId_Vale_Resguardo()."'";
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
public function selectSiga_vale_resguardo($siga_vale_resguardoDto,$Historico,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT 	VR.Id_Vale_Resguardo,
				VR.Id_Tipo_Vale_Resg,
				VR.Id_Area,
				VR.Num_Empleado,
				VR.Extension_Tel,
				VR.Correo,
				VR.Observaciones,
				VR.Estatus_Envio,
				VR.Estatus_Correo_Responsable,
				VR.Estatus_Correo_Solicitante,
				VR.Fech_Inser,
				VR.Usr_Inser,
				VR.Fech_Mod,
				VR.Usr_Mod,
				VR.Estatus_Reg,
				TV.Desc_Tipo_Vale_Resg,
				CA.Nom_Area 
				FROM 	siga_vale_resguardo VR 
				LEFT JOIN siga_cat_tipo_vale_resg TV on VR.Id_Tipo_Vale_Resg=TV.Id_Tipo_Vale_Resg 
				LEFT JOIN siga_catareas CA on VR.Id_Area=CA.Id_Area ";
if(($siga_vale_resguardoDto->getId_Vale_Resguardo()!="") ||($siga_vale_resguardoDto->getId_Tipo_Vale_Resg()!="")||($siga_vale_resguardoDto->getId_Area()!="") ||($siga_vale_resguardoDto->getNum_Empleado()!="") ||($siga_vale_resguardoDto->getExtension_Tel()!="") ||($siga_vale_resguardoDto->getCorreo()!="") ||($siga_vale_resguardoDto->getObservaciones()!="")||($siga_vale_resguardoDto->getEstatus_Envio()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="") ||($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_vale_resguardoDto->getId_Vale_Resguardo()!=""){
$sql.="Id_Vale_Resguardo='".$siga_vale_resguardoDto->getId_Vale_Resguardo()."'";
if(($siga_vale_resguardoDto->getId_Area()!="")||($siga_vale_resguardoDto->getId_Tipo_Vale_Resg()!="") ||($siga_vale_resguardoDto->getNum_Empleado()!="") ||($siga_vale_resguardoDto->getExtension_Tel()!="") ||($siga_vale_resguardoDto->getCorreo()!="") ||($siga_vale_resguardoDto->getObservaciones()!="") ||($siga_vale_resguardoDto->getEstatus_Envio()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="")||($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getId_Area()!=""){
$sql.="VR.Id_Area='".$siga_vale_resguardoDto->getId_Area()."'";
if(($siga_vale_resguardoDto->getId_Tipo_Vale_Resg()!="") ||($siga_vale_resguardoDto->getNum_Empleado()!="") ||($siga_vale_resguardoDto->getExtension_Tel()!="") ||($siga_vale_resguardoDto->getCorreo()!="") ||($siga_vale_resguardoDto->getObservaciones()!="") ||($siga_vale_resguardoDto->getEstatus_Envio()!="") ||($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="")||($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getId_Tipo_Vale_Resg()!=""){
$sql.="Id_Tipo_Vale_Resg='".$siga_vale_resguardoDto->getId_Tipo_Vale_Resg()."'";
if(($siga_vale_resguardoDto->getNum_Empleado()!="") ||($siga_vale_resguardoDto->getExtension_Tel()!="") ||($siga_vale_resguardoDto->getCorreo()!="") ||($siga_vale_resguardoDto->getObservaciones()!="") ||($siga_vale_resguardoDto->getEstatus_Envio()!="") ||($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="")||($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getNum_Empleado()!=""){
$sql.="Num_Empleado='".$siga_vale_resguardoDto->getNum_Empleado()."'";
if(($siga_vale_resguardoDto->getExtension_Tel()!="") ||($siga_vale_resguardoDto->getCorreo()!="") ||($siga_vale_resguardoDto->getObservaciones()!="") ||($siga_vale_resguardoDto->getEstatus_Envio()!="") ||($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="") ||($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getExtension_Tel()!=""){
$sql.="Extension_Tel='".$siga_vale_resguardoDto->getExtension_Tel()."'";
if(($siga_vale_resguardoDto->getCorreo()!="") ||($siga_vale_resguardoDto->getObservaciones()!="") ||($siga_vale_resguardoDto->getEstatus_Envio()!="") ||($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="") ||($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getCorreo()!=""){
$sql.="Correo='".$siga_vale_resguardoDto->getCorreo()."'";
if(($siga_vale_resguardoDto->getObservaciones()!="") ||($siga_vale_resguardoDto->getEstatus_Envio()!="") ||($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="") ||($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getObservaciones()!=""){
$sql.="Observaciones='".$siga_vale_resguardoDto->getObservaciones()."'";
if(($siga_vale_resguardoDto->getEstatus_Envio()!="") || ($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="") || ($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_vale_resguardoDto->getEstatus_Envio()!=""){
$sql.="Estatus_Envio='".$siga_vale_resguardoDto->getEstatus_Envio()."'";
if(($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!="")||($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="") || ($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_vale_resguardoDto->getEstatus_Correo_Responsable()!=""){
$sql.="Estatus_Correo_Responsable='".$siga_vale_resguardoDto->getEstatus_Correo_Responsable()."'";
if(($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!="") || ($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!=""){
$sql.="Estatus_Correo_Solicitante='".$siga_vale_resguardoDto->getEstatus_Correo_Solicitante()."'";
if(($siga_vale_resguardoDto->getFech_Inser()!="") ||($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_vale_resguardoDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_vale_resguardoDto->getFech_Inser()."'";
if(($siga_vale_resguardoDto->getUsr_Inser()!="") ||($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_vale_resguardoDto->getUsr_Inser()."'";
if(($siga_vale_resguardoDto->getFech_Mod()!="") ||($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_vale_resguardoDto->getFech_Mod()."'";
if(($siga_vale_resguardoDto->getUsr_Mod()!="") ||($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_vale_resguardoDto->getUsr_Mod()."'";
if(($siga_vale_resguardoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_vale_resguardoDto->getEstatus_Reg()!=""){
$sql.="VR.Estatus_Reg <> '3'";
}

if($Historico==0){
	$sql.=" and VR.Estatus_Reg <> '4' ";
}else{
	$sql.=" and VR.Estatus_Reg = '4' ";
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
$tmp[$contador] = new Siga_vale_resguardoDTO();
$tmp[$contador]->setId_Vale_Resguardo($row["Id_Vale_Resguardo"]);
$tmp[$contador]->setId_Tipo_Vale_Resg($row["Id_Tipo_Vale_Resg"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setNum_Empleado($row["Num_Empleado"]);
$tmp[$contador]->setExtension_Tel($row["Extension_Tel"]);
$tmp[$contador]->setCorreo($row["Correo"]);
$tmp[$contador]->setObservaciones($row["Observaciones"]);
$tmp[$contador]->setEstatus_Envio($row["Estatus_Envio"]);
$tmp[$contador]->setEstatus_Correo_Responsable($row["Estatus_Correo_Responsable"]);
$tmp[$contador]->setEstatus_Correo_Solicitante($row["Estatus_Correo_Solicitante"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setDesc_Tipo_Vale_Resg($row["Desc_Tipo_Vale_Resg"]);
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