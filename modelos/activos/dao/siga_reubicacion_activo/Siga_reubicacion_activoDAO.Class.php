<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_reubicacion_activo/Siga_reubicacion_activoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_reubicacion_activoDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_reubicacion_activo($siga_reubicacion_activoDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Activo_Reubicacion+1) IS NULL then 1 else (max(Id_Activo_Reubicacion + 1)) end as IndiceMaximo from siga_reubicacion_activo ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_reubicacion_activo on ";
$sql.="INSERT INTO siga_reubicacion_activo(";
$sql.="Id_Activo_Reubicacion";
$sql.=",";
$sql.="Id_Activo";
$sql.=",";
$sql.="Id_Area";
$sql.=",";
$sql.="Id_Ubic_Prim";
$sql.=",";
$sql.="Id_Ubic_Sec";
$sql.=",";
$sql.="Ubic_Especifica";
$sql.=",";
$sql.="Id_Usuario_Responsable";
$sql.=",";
$sql.="Nom_Usuario_Reponsable";
$sql.=",";
$sql.="Centro_Costos";
$sql.=",";
$sql.="Jefe_Area";
$sql.=",";
$sql.="Motivo_Reubicacion";
$sql.=",";
$sql.="Comentarios_Reubicacion";
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
$sql.="'".$siga_reubicacion_activoDto->getId_Activo()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getId_Area()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getId_Ubic_Prim()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getId_Ubic_Sec()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getUbic_Especifica()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getId_Usuario_Responsable()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getNom_Usuario_Reponsable()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getCentro_Costos()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getJefe_Area()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getMotivo_Reubicacion()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getComentarios_Reubicacion()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_reubicacion_activoDto->getEstatus_Reg()."'";

$sql.=")";
//
$sql.=" set identity_insert siga_reubicacion_activo off ";
//
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}
if (!$this->_proveedor->error()) {
$tmp = new Siga_reubicacion_activoDTO();
$tmp->setId_Activo_Reubicacion($this->_proveedor->lastID());
$tmp = $this->selectSiga_reubicacion_activo($tmp,"",$this->_proveedor);
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
public function updateSiga_reubicacion_activo($siga_reubicacion_activoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_reubicacion_activo SET ";

if($siga_reubicacion_activoDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_reubicacion_activoDto->getId_Activo()."'";
if(($siga_reubicacion_activoDto->getId_Area()!="") ||($siga_reubicacion_activoDto->getId_Ubic_Prim()!="") ||($siga_reubicacion_activoDto->getId_Ubic_Sec()!="") ||($siga_reubicacion_activoDto->getUbic_Especifica()!="") ||($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_reubicacion_activoDto->getId_Area()."'";
if(($siga_reubicacion_activoDto->getId_Ubic_Prim()!="") ||($siga_reubicacion_activoDto->getId_Ubic_Sec()!="") ||($siga_reubicacion_activoDto->getUbic_Especifica()!="") ||($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_reubicacion_activoDto->getId_Ubic_Prim()."'";
if(($siga_reubicacion_activoDto->getId_Ubic_Sec()!="") || ($siga_reubicacion_activoDto->getUbic_Especifica()!="") || ($siga_reubicacion_activoDto->getUbic_Especifica()!="") ||($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec='".$siga_reubicacion_activoDto->getId_Ubic_Sec()."'";
if(($siga_reubicacion_activoDto->getUbic_Especifica()!="") || ($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getUbic_Especifica()!=""){
$sql.="Ubic_Especifica='".$siga_reubicacion_activoDto->getUbic_Especifica()."'";
if(($siga_reubicacion_activoDto->getUbic_Especifica()!="") || ($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getId_Usuario_Responsable()!=""){
$sql.="Id_Usuario_Responsable='".$siga_reubicacion_activoDto->getId_Usuario_Responsable()."'";
if(($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!=""){
$sql.="Nom_Usuario_Reponsable='".$siga_reubicacion_activoDto->getNom_Usuario_Reponsable()."'";
if(($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getCentro_Costos()!=""){
$sql.="Centro_Costos='".$siga_reubicacion_activoDto->getCentro_Costos()."'";
if(($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getJefe_Area()!=""){
$sql.="Jefe_Area='".$siga_reubicacion_activoDto->getJefe_Area()."'";
if(($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getMotivo_Reubicacion()!=""){
$sql.="Motivo_Reubicacion='".$siga_reubicacion_activoDto->getMotivo_Reubicacion()."'";
if(($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getComentarios_Reubicacion()!=""){
$sql.="Comentarios_Reubicacion='".$siga_reubicacion_activoDto->getComentarios_Reubicacion()."'";
if(($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_reubicacion_activoDto->getFech_Inser()."'";
if(($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_reubicacion_activoDto->getUsr_Inser()."'";
if(($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
$sql.="Fech_Mod=getdate()";
$sql.=",";

if($siga_reubicacion_activoDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_reubicacion_activoDto->getUsr_Mod()."'";
if(($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_reubicacion_activoDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_reubicacion_activoDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Activo_Reubicacion='".$siga_reubicacion_activoDto->getId_Activo_Reubicacion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_reubicacion_activoDTO();
$tmp->setId_Activo_Reubicacion($siga_reubicacion_activoDto->getId_Activo_Reubicacion());
$tmp = $this->selectSiga_reubicacion_activo($tmp,"",$this->_proveedor);
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
public function deleteSiga_reubicacion_activo($siga_reubicacion_activoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}


$sql="update siga_activos set Id_Area=Id_Area_Ant,Id_Ubic_Prim=Id_Ubic_Prim_Ant,Id_Ubic_Sec=Id_Ubic_Sec_Ant where Id_Activo=(select Id_Activo from 
siga_reubicacion_activo  WHERE Id_Activo_Reubicacion='".$siga_reubicacion_activoDto->getId_Activo_Reubicacion()."')";
//echo $sql;
$this->_proveedor->execute($sql);

$sql="update siga_activos_contabilidad set Centro_Costos=(select Centro_Costos_Ant from siga_activos A where A.Id_Activo=
(select Id_Activo from 
siga_reubicacion_activo  WHERE Id_Activo_Reubicacion='".$siga_reubicacion_activoDto->getId_Activo_Reubicacion()."')
) where Id_Activo=(select Id_Activo from 
siga_reubicacion_activo  WHERE Id_Activo_Reubicacion='".$siga_reubicacion_activoDto->getId_Activo_Reubicacion()."')";
//echo $sql;
$this->_proveedor->execute($sql);

$sql="DELETE FROM siga_reubicacion_activo  WHERE Id_Activo_Reubicacion='".$siga_reubicacion_activoDto->getId_Activo_Reubicacion()."'";
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
public function selectSiga_reubicacion_activo($siga_reubicacion_activoDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Activo_Reubicacion,Id_Activo,Id_Area,Id_Ubic_Prim,Id_Ubic_Sec,Ubic_Especifica,Id_Usuario_Responsable,Nom_Usuario_Reponsable,Centro_Costos,Jefe_Area,Motivo_Reubicacion,Comentarios_Reubicacion,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_reubicacion_activo ";
if(($siga_reubicacion_activoDto->getId_Activo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getId_Activo()!="")||($siga_reubicacion_activoDto->getId_Area()!="") ||($siga_reubicacion_activoDto->getId_Ubic_Prim()!="") ||($siga_reubicacion_activoDto->getId_Ubic_Sec()!="") ||($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_reubicacion_activoDto->getId_Activo_Reubicacion()!=""){
$sql.="Id_Activo_Reubicacion='".$siga_reubicacion_activoDto->getId_Activo_Reubicacion()."'";
if(($siga_reubicacion_activoDto->getId_Activo()!="") ||($siga_reubicacion_activoDto->getId_Area()!="") ||($siga_reubicacion_activoDto->getId_Ubic_Prim()!="") ||($siga_reubicacion_activoDto->getId_Ubic_Sec()!="") ||($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_reubicacion_activoDto->getId_Activo()."'";
if(($siga_reubicacion_activoDto->getId_Area()!="")||($siga_reubicacion_activoDto->getId_Ubic_Prim()!="") ||($siga_reubicacion_activoDto->getId_Ubic_Sec()!="") ||($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_reubicacion_activoDto->getId_Area()."'";
if(($siga_reubicacion_activoDto->getId_Ubic_Prim()!="") ||($siga_reubicacion_activoDto->getId_Ubic_Sec()!="") ||($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_reubicacion_activoDto->getId_Ubic_Prim()."'";
if(($siga_reubicacion_activoDto->getId_Ubic_Sec()!="") ||($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec='".$siga_reubicacion_activoDto->getId_Ubic_Sec()."'";
if(($siga_reubicacion_activoDto->getId_Usuario_Responsable()!="") ||($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getId_Usuario_Responsable()!=""){
$sql.="Id_Usuario_Responsable='".$siga_reubicacion_activoDto->getId_Usuario_Responsable()."'";
if(($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!="") ||($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getNom_Usuario_Reponsable()!=""){
$sql.="Nom_Usuario_Reponsable='".$siga_reubicacion_activoDto->getNom_Usuario_Reponsable()."'";
if(($siga_reubicacion_activoDto->getCentro_Costos()!="") ||($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getCentro_Costos()!=""){
$sql.="Centro_Costos='".$siga_reubicacion_activoDto->getCentro_Costos()."'";
if(($siga_reubicacion_activoDto->getJefe_Area()!="") ||($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getJefe_Area()!=""){
$sql.="Jefe_Area='".$siga_reubicacion_activoDto->getJefe_Area()."'";
if(($siga_reubicacion_activoDto->getMotivo_Reubicacion()!="") ||($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getMotivo_Reubicacion()!=""){
$sql.="Motivo_Reubicacion='".$siga_reubicacion_activoDto->getMotivo_Reubicacion()."'";
if(($siga_reubicacion_activoDto->getComentarios_Reubicacion()!="") ||($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getComentarios_Reubicacion()!=""){
$sql.="Comentarios_Reubicacion='".$siga_reubicacion_activoDto->getComentarios_Reubicacion()."'";
if(($siga_reubicacion_activoDto->getFech_Inser()!="") ||($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_reubicacion_activoDto->getFech_Inser()."'";
if(($siga_reubicacion_activoDto->getUsr_Inser()!="") ||($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_reubicacion_activoDto->getUsr_Inser()."'";
if(($siga_reubicacion_activoDto->getFech_Mod()!="") ||($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_reubicacion_activoDto->getFech_Mod()."'";
if(($siga_reubicacion_activoDto->getUsr_Mod()!="") ||($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_reubicacion_activoDto->getUsr_Mod()."'";
if(($siga_reubicacion_activoDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_reubicacion_activoDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <>'3'";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
//echo $sql;
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
$tmp = [];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_reubicacion_activoDTO();
$tmp[$contador]->setId_Activo_Reubicacion($row["Id_Activo_Reubicacion"]);
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setId_Ubic_Prim($row["Id_Ubic_Prim"]);
$tmp[$contador]->setId_Ubic_Sec($row["Id_Ubic_Sec"]);
$tmp[$contador]->setUbic_Especifica($row["Ubic_Especifica"]);
$tmp[$contador]->setId_Usuario_Responsable($row["Id_Usuario_Responsable"]);
$tmp[$contador]->setNom_Usuario_Reponsable(rtrim(ltrim($row["Nom_Usuario_Reponsable"])));
$tmp[$contador]->setCentro_Costos(rtrim(ltrim($row["Centro_Costos"])));
$tmp[$contador]->setJefe_Area(rtrim(ltrim($row["Jefe_Area"])));
$tmp[$contador]->setMotivo_Reubicacion(rtrim(ltrim($row["Motivo_Reubicacion"])));
$tmp[$contador]->setComentarios_Reubicacion(rtrim(ltrim($row["Comentarios_Reubicacion"])));
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