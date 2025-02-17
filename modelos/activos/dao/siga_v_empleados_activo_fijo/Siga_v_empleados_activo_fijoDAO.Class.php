<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_v_empleados_activo_fijoDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'chsapps');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_v_empleados_activo_fijo($siga_v_empleados_activo_fijoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_v_empleados_activo_fijo(";
if($siga_v_empleados_activo_fijoDto->getId()!=""){
$sql.="id";
if(($siga_v_empleados_activo_fijoDto->getNum_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getTipo_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNum_empleado()!=""){
$sql.="num_empleado";
if(($siga_v_empleados_activo_fijoDto->getTipo_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getTipo_empleado()!=""){
$sql.="tipo_empleado";
if(($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getFecha_alta()!=""){
$sql.="fecha_alta";
if(($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNombres()!=""){
$sql.="nombres";
if(($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNombre_completo()!=""){
$sql.="nombre_completo";
if(($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNombre_completo2()!=""){
$sql.="nombre_completo2";
if(($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getPuesto()!=""){
$sql.="puesto";
if(($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getDepartamento()!=""){
$sql.="departamento";
if(($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getGerencia()!=""){
$sql.="gerencia";
if(($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getCentro_costo()!=""){
$sql.="centro_costo";
if(($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getFoto()!=""){
$sql.="foto";
if(($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getApellidos()!=""){
$sql.="apellidos";
if(($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getEstatus()!=""){
$sql.="estatus";
if(($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNom_estatus()!=""){
$sql.="nom_estatus";
if(($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getExt_telefonica()!=""){
$sql.="ext_telefonica";
if(($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getEmail()!=""){
$sql.="email";
if(($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!=""){
$sql.="EMAIL_CFDI";
}
$sql.=") VALUES(";
if($siga_v_empleados_activo_fijoDto->getId()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getId()."'";
if(($siga_v_empleados_activo_fijoDto->getNum_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getTipo_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNum_empleado()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getNum_empleado()."'";
if(($siga_v_empleados_activo_fijoDto->getTipo_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getTipo_empleado()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getTipo_empleado()."'";
if(($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getFecha_alta()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getFecha_alta()."'";
if(($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNombres()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getNombres()."'";
if(($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNombre_completo()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getNombre_completo()."'";
if(($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNombre_completo2()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getNombre_completo2()."'";
if(($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getPuesto()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getPuesto()."'";
if(($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getDepartamento()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getDepartamento()."'";
if(($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getGerencia()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getGerencia()."'";
if(($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getCentro_costo()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getCentro_costo()."'";
if(($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getFoto()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getFoto()."'";
if(($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getApellidos()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getApellidos()."'";
if(($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getEstatus()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getEstatus()."'";
if(($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNom_estatus()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getNom_estatus()."'";
if(($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getExt_telefonica()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getExt_telefonica()."'";
if(($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getEmail()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getEmail()."'";
if(($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!=""){
$sql.="'".$siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_v_empleados_activo_fijoDTO();
$tmp->setid($this->_proveedor->lastID());
$tmp = $this->selectSiga_v_empleados_activo_fijo($tmp,"",$this->_proveedor);
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
public function updateSiga_v_empleados_activo_fijo($siga_v_empleados_activo_fijoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_v_empleados_activo_fijo SET ";
if($siga_v_empleados_activo_fijoDto->getId()!=""){
$sql.="id='".$siga_v_empleados_activo_fijoDto->getId()."'";
if(($siga_v_empleados_activo_fijoDto->getNum_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getTipo_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNum_empleado()!=""){
$sql.="num_empleado='".$siga_v_empleados_activo_fijoDto->getNum_empleado()."'";
if(($siga_v_empleados_activo_fijoDto->getTipo_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getTipo_empleado()!=""){
$sql.="tipo_empleado='".$siga_v_empleados_activo_fijoDto->getTipo_empleado()."'";
if(($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getFecha_alta()!=""){
$sql.="fecha_alta='".$siga_v_empleados_activo_fijoDto->getFecha_alta()."'";
if(($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNombres()!=""){
$sql.="nombres='".$siga_v_empleados_activo_fijoDto->getNombres()."'";
if(($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNombre_completo()!=""){
$sql.="nombre_completo='".$siga_v_empleados_activo_fijoDto->getNombre_completo()."'";
if(($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNombre_completo2()!=""){
$sql.="nombre_completo2='".$siga_v_empleados_activo_fijoDto->getNombre_completo2()."'";
if(($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getPuesto()!=""){
$sql.="puesto='".$siga_v_empleados_activo_fijoDto->getPuesto()."'";
if(($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getDepartamento()!=""){
$sql.="departamento='".$siga_v_empleados_activo_fijoDto->getDepartamento()."'";
if(($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getGerencia()!=""){
$sql.="gerencia='".$siga_v_empleados_activo_fijoDto->getGerencia()."'";
if(($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getCentro_costo()!=""){
$sql.="centro_costo='".$siga_v_empleados_activo_fijoDto->getCentro_costo()."'";
if(($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getFoto()!=""){
$sql.="foto='".$siga_v_empleados_activo_fijoDto->getFoto()."'";
if(($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getApellidos()!=""){
$sql.="apellidos='".$siga_v_empleados_activo_fijoDto->getApellidos()."'";
if(($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getEstatus()!=""){
$sql.="estatus='".$siga_v_empleados_activo_fijoDto->getEstatus()."'";
if(($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getNom_estatus()!=""){
$sql.="nom_estatus='".$siga_v_empleados_activo_fijoDto->getNom_estatus()."'";
if(($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getExt_telefonica()!=""){
$sql.="ext_telefonica='".$siga_v_empleados_activo_fijoDto->getExt_telefonica()."'";
if(($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getEmail()!=""){
$sql.="email='".$siga_v_empleados_activo_fijoDto->getEmail()."'";
if(($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=",";
}
}
if($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!=""){
$sql.="EMAIL_CFDI='".$siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()."'";
}
$sql.=" WHERE id='".$siga_v_empleados_activo_fijoDto->getId()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_v_empleados_activo_fijoDTO();
$tmp->setid($siga_v_empleados_activo_fijoDto->getId());
$tmp = $this->selectSiga_v_empleados_activo_fijo($tmp,"",$this->_proveedor);
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
public function deleteSiga_v_empleados_activo_fijo($siga_v_empleados_activo_fijoDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_v_empleados_activo_fijo  WHERE id='".$siga_v_empleados_activo_fijoDto->getId()."'";
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

public function selectSiga_v_empleados_activo_fijo($siga_v_empleados_activo_fijoDto,$orden="",$proveedor=null){

$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT * from 
(
    SELECT  id, CONVERT(int, num_empleado) as num_empleado, 
            tipo_empleado, fecha_alta, nombres, nombre_completo, nombre_completo2, puesto, departamento, gerencia, centro_costo, foto, apellidos, estatus, 
            case when estatus='1' then 'Activo' when estatus='2' then 'Baja' when estatus='3' then 'Reingreso' end as nom_estatus,ext_telefonica, 
            case when rtrim(ltrim(email)) IS NULL then '' else email end as email,case when rtrim(ltrim(email)) IS NULL then '' else email end as EMAIL_CFDI 
    FROM empleados_chs 
  UNION ALL 
    SELECT
    0 as id  
    ,rtrim(aiam_m_clave) as num_empleado 
    ,1 as tipo_empleado 
    ,'01/01/2021' as fecha_alta 
    ,nombre_medico as nombres 
    ,medico_nombre as nombre_completo 
    ,medico_nombre + ' ' + paterno_medico + '' + materno_medico as nombre_completo2 
    ,'MÉDICO ' + aiam_m_tipo_medico collate Traditional_Spanish_CI_AS as puesto 
    ,desc_esp as departamento 
    ,'DIRECCIÖN MËDICA' as gerencia 
    ,'' as centro_costo 
    ,'http://chsapp01/fotos_medicos/' + rtrim(aiam_m_clave collate Traditional_Spanish_CI_AS) + '.jpg' as foto 
    ,paterno_medico + '' + materno_medico as apellidos 
    ,1 as estatus 
    ,'Activo' as nom_estatus 
    ,'0' as ext_telefonica 
    ,case when rtrim(ltrim(email)) IS NULL then '' else email end as email 
    ,case when rtrim(ltrim(email)) IS NULL then '' else email end as EMAIL_CFDI 
    FROM directorio_medico 
    WHERE 
    aiam_m_tipo_medico = 'STAFF' 
    and aiam_m_tipo_medico <> 'DEFUNCION' 
    ) as empleados_medicos 
    WHERE estatus in('1','3','2')
";
if(($siga_v_empleados_activo_fijoDto->getId()!="") ||($siga_v_empleados_activo_fijoDto->getNum_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getTipo_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
if($siga_v_empleados_activo_fijoDto->getId()!=""){
$sql.="id='".$siga_v_empleados_activo_fijoDto->getId()."'";
if(($siga_v_empleados_activo_fijoDto->getNum_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getTipo_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getNum_empleado()!=""){
$sql.="num_empleado='".$siga_v_empleados_activo_fijoDto->getNum_empleado()."'";
if(($siga_v_empleados_activo_fijoDto->getTipo_empleado()!="") ||($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getTipo_empleado()!=""){
$sql.="tipo_empleado='".$siga_v_empleados_activo_fijoDto->getTipo_empleado()."'";
if(($siga_v_empleados_activo_fijoDto->getFecha_alta()!="") ||($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getFecha_alta()!=""){
$sql.="fecha_alta='".$siga_v_empleados_activo_fijoDto->getFecha_alta()."'";
if(($siga_v_empleados_activo_fijoDto->getNombres()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getNombres()!=""){
$sql.="nombres='".$siga_v_empleados_activo_fijoDto->getNombres()."'";
if(($siga_v_empleados_activo_fijoDto->getNombre_completo()!="") ||($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getNombre_completo()!=""){
$sql.="nombre_completo='".$siga_v_empleados_activo_fijoDto->getNombre_completo()."'";
if(($siga_v_empleados_activo_fijoDto->getNombre_completo2()!="") ||($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getNombre_completo2()!=""){
$sql.="nombre_completo2='".$siga_v_empleados_activo_fijoDto->getNombre_completo2()."'";
if(($siga_v_empleados_activo_fijoDto->getPuesto()!="") ||($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getPuesto()!=""){
$sql.="puesto='".$siga_v_empleados_activo_fijoDto->getPuesto()."'";
if(($siga_v_empleados_activo_fijoDto->getDepartamento()!="") ||($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getDepartamento()!=""){
$sql.="departamento='".$siga_v_empleados_activo_fijoDto->getDepartamento()."'";
if(($siga_v_empleados_activo_fijoDto->getGerencia()!="") ||($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getGerencia()!=""){
$sql.="gerencia='".$siga_v_empleados_activo_fijoDto->getGerencia()."'";
if(($siga_v_empleados_activo_fijoDto->getCentro_costo()!="") ||($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getCentro_costo()!=""){
$sql.="centro_costo='".$siga_v_empleados_activo_fijoDto->getCentro_costo()."'";
if(($siga_v_empleados_activo_fijoDto->getFoto()!="") ||($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getFoto()!=""){
$sql.="foto='".$siga_v_empleados_activo_fijoDto->getFoto()."'";
if(($siga_v_empleados_activo_fijoDto->getApellidos()!="") ||($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getApellidos()!=""){
$sql.="apellidos='".$siga_v_empleados_activo_fijoDto->getApellidos()."'";
if(($siga_v_empleados_activo_fijoDto->getEstatus()!="") ||($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getEstatus()!=""){
$sql.="estatus='".$siga_v_empleados_activo_fijoDto->getEstatus()."'";
if(($siga_v_empleados_activo_fijoDto->getNom_estatus()!="") ||($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getNom_estatus()!=""){
$sql.="nom_estatus='".$siga_v_empleados_activo_fijoDto->getNom_estatus()."'";
if(($siga_v_empleados_activo_fijoDto->getExt_telefonica()!="") ||($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getExt_telefonica()!=""){
$sql.="ext_telefonica='".$siga_v_empleados_activo_fijoDto->getExt_telefonica()."'";
if(($siga_v_empleados_activo_fijoDto->getEmail()!="") ||($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getEmail()!=""){
$sql.="email='".$siga_v_empleados_activo_fijoDto->getEmail()."'";
if(($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!="") ){
$sql.=" AND ";
}
}
if($siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()!=""){
$sql.="EMAIL_CFDI='".$siga_v_empleados_activo_fijoDto->getEMAIL_CFDI()."'";
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
$tmp[$contador] = new Siga_v_empleados_activo_fijoDTO();
$tmp[$contador]->setId($row["id"]);
$tmp[$contador]->setNum_empleado($row["num_empleado"]);
$tmp[$contador]->setTipo_empleado($row["tipo_empleado"]);
$tmp[$contador]->setFecha_alta($row["fecha_alta"]);
$tmp[$contador]->setNombres($row["nombres"]);
$tmp[$contador]->setNombre_completo($row["nombre_completo"]);
$tmp[$contador]->setNombre_completo2($row["nombre_completo2"]);
$tmp[$contador]->setPuesto($row["puesto"]);
$tmp[$contador]->setDepartamento($row["departamento"]);
$tmp[$contador]->setGerencia($row["gerencia"]);
$tmp[$contador]->setCentro_costo($row["centro_costo"]);
$tmp[$contador]->setFoto($row["foto"]);
$tmp[$contador]->setApellidos($row["apellidos"]);
$tmp[$contador]->setEstatus($row["estatus"]);
$tmp[$contador]->setNom_estatus($row["nom_estatus"]);
$tmp[$contador]->setExt_telefonica($row["ext_telefonica"]);
$tmp[$contador]->setEmail(rtrim(ltrim($row["email"])));
$tmp[$contador]->setEMAIL_CFDI(rtrim(ltrim($row["EMAIL_CFDI"])));
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