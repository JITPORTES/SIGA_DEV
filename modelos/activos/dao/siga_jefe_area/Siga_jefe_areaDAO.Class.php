<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_jefe_area/Siga_jefe_areaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_jefe_areaDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_jefe_area($siga_jefe_areaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_jefe_area(";
if($siga_jefe_areaDto->getId_Jefe_Area()!=""){
$sql.="Id_Jefe_Area";
if(($siga_jefe_areaDto->getId_Area()!="") ||($siga_jefe_areaDto->getNum_Empleado()!="") ||($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_jefe_areaDto->getNum_Empleado()!="") ||($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getNum_Empleado()!=""){
$sql.="Num_Empleado";
if(($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getNombre()!=""){
$sql.="Nombre";
if(($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCorreo()!=""){
$sql.="Correo";
if(($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_1()!=""){
$sql.="Campo_1";
if(($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_2()!=""){
$sql.="Campo_2";
if(($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_3()!=""){
$sql.="Campo_3";
if(($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_4()!=""){
$sql.="Campo_4";
if(($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_5()!=""){
$sql.="Campo_5";
if(($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_jefe_areaDto->getId_Jefe_Area()!=""){
$sql.="'".$siga_jefe_areaDto->getId_Jefe_Area()."'";
if(($siga_jefe_areaDto->getId_Area()!="") ||($siga_jefe_areaDto->getNum_Empleado()!="") ||($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getId_Area()!=""){
$sql.="'".$siga_jefe_areaDto->getId_Area()."'";
if(($siga_jefe_areaDto->getNum_Empleado()!="") ||($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getNum_Empleado()!=""){
$sql.="'".$siga_jefe_areaDto->getNum_Empleado()."'";
if(($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getNombre()!=""){
$sql.="'".$siga_jefe_areaDto->getNombre()."'";
if(($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCorreo()!=""){
$sql.="'".$siga_jefe_areaDto->getCorreo()."'";
if(($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_1()!=""){
$sql.="'".$siga_jefe_areaDto->getCampo_1()."'";
if(($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_2()!=""){
$sql.="'".$siga_jefe_areaDto->getCampo_2()."'";
if(($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_3()!=""){
$sql.="'".$siga_jefe_areaDto->getCampo_3()."'";
if(($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_4()!=""){
$sql.="'".$siga_jefe_areaDto->getCampo_4()."'";
if(($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_5()!=""){
$sql.="'".$siga_jefe_areaDto->getCampo_5()."'";
if(($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getFech_Inser()!=""){
$sql.="'".$siga_jefe_areaDto->getFech_Inser()."'";
if(($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getUsr_Inser()!=""){
$sql.="'".$siga_jefe_areaDto->getUsr_Inser()."'";
if(($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getFech_Mod()!=""){
$sql.="'".$siga_jefe_areaDto->getFech_Mod()."'";
if(($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getUsr_Mod()!=""){
$sql.="'".$siga_jefe_areaDto->getUsr_Mod()."'";
if(($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getEstatus_Reg()!=""){
$sql.="'".$siga_jefe_areaDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_jefe_areaDTO();
$tmp->setId_Jefe_Area($this->_proveedor->lastID());
$tmp = $this->selectSiga_jefe_area($tmp,"",$this->_proveedor);
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
public function updateSiga_jefe_area($siga_jefe_areaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_jefe_area SET ";
if($siga_jefe_areaDto->getId_Jefe_Area()!=""){
$sql.="Id_Jefe_Area='".$siga_jefe_areaDto->getId_Jefe_Area()."'";
if(($siga_jefe_areaDto->getId_Area()!="") ||($siga_jefe_areaDto->getNum_Empleado()!="") ||($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_jefe_areaDto->getId_Area()."'";
if(($siga_jefe_areaDto->getNum_Empleado()!="") ||($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getNum_Empleado()!=""){
$sql.="Num_Empleado='".$siga_jefe_areaDto->getNum_Empleado()."'";
if(($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getNombre()!=""){
$sql.="Nombre='".$siga_jefe_areaDto->getNombre()."'";
if(($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCorreo()!=""){
$sql.="Correo='".$siga_jefe_areaDto->getCorreo()."'";
if(($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_1()!=""){
$sql.="Campo_1='".$siga_jefe_areaDto->getCampo_1()."'";
if(($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_2()!=""){
$sql.="Campo_2='".$siga_jefe_areaDto->getCampo_2()."'";
if(($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_3()!=""){
$sql.="Campo_3='".$siga_jefe_areaDto->getCampo_3()."'";
if(($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_4()!=""){
$sql.="Campo_4='".$siga_jefe_areaDto->getCampo_4()."'";
if(($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getCampo_5()!=""){
$sql.="Campo_5='".$siga_jefe_areaDto->getCampo_5()."'";
if(($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_jefe_areaDto->getFech_Inser()."'";
if(($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_jefe_areaDto->getUsr_Inser()."'";
if(($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_jefe_areaDto->getFech_Mod()."'";
if(($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_jefe_areaDto->getUsr_Mod()."'";
if(($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_jefe_areaDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_jefe_areaDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Jefe_Area='".$siga_jefe_areaDto->getId_Jefe_Area()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_jefe_areaDTO();
$tmp->setId_Jefe_Area($siga_jefe_areaDto->getId_Jefe_Area());
$tmp = $this->selectSiga_jefe_area($tmp,"",$this->_proveedor);
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
public function deleteSiga_jefe_area($siga_jefe_areaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_jefe_area  WHERE Id_Jefe_Area='".$siga_jefe_areaDto->getId_Jefe_Area()."'";
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
public function selectSiga_jefe_area($siga_jefe_areaDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Jefe_Area,Id_Area,Num_Empleado,Nombre,Correo,Campo_1,Campo_2,Campo_3,Campo_4,Campo_5,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_jefe_area ";
if(($siga_jefe_areaDto->getId_Jefe_Area()!="") ||($siga_jefe_areaDto->getId_Area()!="") ||($siga_jefe_areaDto->getNum_Empleado()!="") ||($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_jefe_areaDto->getId_Jefe_Area()!=""){
$sql.="Id_Jefe_Area='".$siga_jefe_areaDto->getId_Jefe_Area()."'";
if(($siga_jefe_areaDto->getId_Area()!="") ||($siga_jefe_areaDto->getNum_Empleado()!="") ||($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_jefe_areaDto->getId_Area()."'";
if(($siga_jefe_areaDto->getNum_Empleado()!="") ||($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getNum_Empleado()!=""){
$sql.="Num_Empleado='".$siga_jefe_areaDto->getNum_Empleado()."'";
if(($siga_jefe_areaDto->getNombre()!="") ||($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getNombre()!=""){
$sql.="Nombre='".$siga_jefe_areaDto->getNombre()."'";
if(($siga_jefe_areaDto->getCorreo()!="") ||($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getCorreo()!=""){
$sql.="Correo='".$siga_jefe_areaDto->getCorreo()."'";
if(($siga_jefe_areaDto->getCampo_1()!="") ||($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getCampo_1()!=""){
$sql.="Campo_1='".$siga_jefe_areaDto->getCampo_1()."'";
if(($siga_jefe_areaDto->getCampo_2()!="") ||($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getCampo_2()!=""){
$sql.="Campo_2='".$siga_jefe_areaDto->getCampo_2()."'";
if(($siga_jefe_areaDto->getCampo_3()!="") ||($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getCampo_3()!=""){
$sql.="Campo_3='".$siga_jefe_areaDto->getCampo_3()."'";
if(($siga_jefe_areaDto->getCampo_4()!="") ||($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getCampo_4()!=""){
$sql.="Campo_4='".$siga_jefe_areaDto->getCampo_4()."'";
if(($siga_jefe_areaDto->getCampo_5()!="") ||($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getCampo_5()!=""){
$sql.="Campo_5='".$siga_jefe_areaDto->getCampo_5()."'";
if(($siga_jefe_areaDto->getFech_Inser()!="") ||($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_jefe_areaDto->getFech_Inser()."'";
if(($siga_jefe_areaDto->getUsr_Inser()!="") ||($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_jefe_areaDto->getUsr_Inser()."'";
if(($siga_jefe_areaDto->getFech_Mod()!="") ||($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_jefe_areaDto->getFech_Mod()."'";
if(($siga_jefe_areaDto->getUsr_Mod()!="") ||($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_jefe_areaDto->getUsr_Mod()."'";
if(($siga_jefe_areaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_jefe_areaDto->getEstatus_Reg()!=""){
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
$tmp[$contador] = new Siga_jefe_areaDTO();
$tmp[$contador]->setId_Jefe_Area($row["Id_Jefe_Area"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setNum_Empleado($row["Num_Empleado"]);
$tmp[$contador]->setNombre($row["Nombre"]);
$tmp[$contador]->setCorreo($row["Correo"]);
$tmp[$contador]->setCampo_1($row["Campo_1"]);
$tmp[$contador]->setCampo_2($row["Campo_2"]);
$tmp[$contador]->setCampo_3($row["Campo_3"]);
$tmp[$contador]->setCampo_4($row["Campo_4"]);
$tmp[$contador]->setCampo_5($row["Campo_5"]);
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