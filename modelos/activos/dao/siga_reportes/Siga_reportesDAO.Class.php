<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_reportes/Siga_reportesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_reportesDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function selectSiga_reportes($siga_reportesDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Activo,AF_BC,Nombre_Activo,Id_Tipo_Vale_Resg,Id_Area,Id_Departamento,Num_Empleado,Nombre_Completo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg,Foto,Id_Clasificacion,Id_Propiedad,Id_Tipo_Activo,DescCorta,DescLarga,Id_Ubic_Prim,Id_Ubic_Sec,Id_Motivo_Alta,Id_Familia,Id_Subfamilia,Marca,Modelo,NumSerie,Id_ActivoPadre,NumActivoAnterior,ParticipaPre,ParticipaSeguros,ImporteSeguros,ParticipaCertificacion,Garantia,ExtGarantia,Anexo,Especifica FROM siga_reportes ";
if(($siga_reportesDto->getId_Activo()!="") ||($siga_reportesDto->getAF_BC()!="") ||($siga_reportesDto->getNombre_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getNombre_Completo()!="") ||($siga_reportesDto->getFech_Inser()!="") ||($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" WHERE ";
}
if($siga_reportesDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_reportesDto->getId_Activo()."'";
if(($siga_reportesDto->getAF_BC()!="") ||($siga_reportesDto->getNombre_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getNombre_Completo()!="") ||($siga_reportesDto->getFech_Inser()!="") ||($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getAF_BC()!=""){
$sql.="AF_BC='".$siga_reportesDto->getAF_BC()."'";
if(($siga_reportesDto->getNombre_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getNombre_Completo()!="") ||($siga_reportesDto->getFech_Inser()!="") ||($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getNombre_Activo()!=""){
$sql.="Nombre_Activo='".$siga_reportesDto->getNombre_Activo()."'";
if(($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getNombre_Completo()!="") ||($siga_reportesDto->getFech_Inser()!="") ||($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Tipo_Vale_Resg()!=""){
$sql.="Id_Tipo_Vale_Resg='".$siga_reportesDto->getId_Tipo_Vale_Resg()."'";
if(($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getNombre_Completo()!="") ||($siga_reportesDto->getFech_Inser()!="") ||($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_reportesDto->getId_Area()."'";
if(($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getNombre_Completo()!="") ||($siga_reportesDto->getFech_Inser()!="") ||($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Departamento()!=""){
$sql.="Id_Departamento='".$siga_reportesDto->getId_Departamento()."'";
if(($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getNombre_Completo()!="") ||($siga_reportesDto->getFech_Inser()!="") ||($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getNum_Empleado()!=""){
$sql.="Num_Empleado='".$siga_reportesDto->getNum_Empleado()."'";
if(($siga_reportesDto->getNombre_Completo()!="") ||($siga_reportesDto->getFech_Inser()!="") ||($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getNombre_Completo()!=""){
$sql.="Nombre_Completo='".$siga_reportesDto->getNombre_Completo()."'";
if(($siga_reportesDto->getFech_Inser()!="") ||($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_reportesDto->getFech_Inser()."'";
if(($siga_reportesDto->getUsr_Inser()!="") ||($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_reportesDto->getUsr_Inser()."'";
if(($siga_reportesDto->getFech_Mod()!="") ||($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_reportesDto->getFech_Mod()."'";
if(($siga_reportesDto->getUsr_Mod()!="") ||($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_reportesDto->getUsr_Mod()."'";
if(($siga_reportesDto->getEstatus_Reg()!="") ||($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_reportesDto->getEstatus_Reg()."'";
if(($siga_reportesDto->getFoto()!="") ||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getFoto()!=""){
$sql.="Foto='".$siga_reportesDto->getFoto()."'";
if(($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Clasificacion()!=""){
$sql.="Id_Clasificacion='".$siga_reportesDto->getId_Clasificacion()."'";
if(($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Propiedad()!=""){
$sql.="Id_Propiedad='".$siga_reportesDto->getId_Propiedad()."'";
if(($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Tipo_Activo()!=""){
$sql.="Id_Tipo_Activo='".$siga_reportesDto->getId_Tipo_Activo()."'";
if(($siga_reportesDto->getDescCorta()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getDescCorta()!=""){
$sql.="DescCorta='".$siga_reportesDto->getDescCorta()."'";
if(($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getDescLarga()!=""){
$sql.="DescLarga='".$siga_reportesDto->getDescLarga()."'";
if(($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_reportesDto->getId_Ubic_Prim()."'";
if(($siga_reportesDto->getId_Ubic_Sec()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec='".$siga_reportesDto->getId_Ubic_Sec()."'";
if(($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Motivo_Alta()!=""){
$sql.="Id_Motivo_Alta='".$siga_reportesDto->getId_Motivo_Alta()."'";
if(($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Familia()!=""){
$sql.="Id_Familia='".$siga_reportesDto->getId_Familia()."'";
if(($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_Subfamilia()!=""){
$sql.="Id_Subfamilia='".$siga_reportesDto->getId_Subfamilia()."'";
if(($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getMarca()!=""){
$sql.="Marca='".$siga_reportesDto->getMarca()."'";
if(($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getModelo()!=""){
$sql.="Modelo='".$siga_reportesDto->getModelo()."'";
if(($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getNumSerie()!=""){
$sql.="NumSerie='".$siga_reportesDto->getNumSerie()."'";
if(($siga_reportesDto->getId_ActivoPadre()!="") ||($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getId_ActivoPadre()!=""){
$sql.="Id_ActivoPadre='".$siga_reportesDto->getId_ActivoPadre()."'";
if(($siga_reportesDto->getNumActivoAnterior()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getNumActivoAnterior()!=""){
$sql.="NumActivoAnterior='".$siga_reportesDto->getNumActivoAnterior()."'";
if(($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getParticipaPre()!=""){
$sql.="ParticipaPre='".$siga_reportesDto->getParticipaPre()."'";
if(($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getParticipaSeguros()!=""){
$sql.="ParticipaSeguros='".$siga_reportesDto->getParticipaSeguros()."'";
if(($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getImporteSeguros()!=""){
$sql.="ImporteSeguros='".$siga_reportesDto->getImporteSeguros()."'";
if(($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getParticipaCertificacion()!=""){
$sql.="ParticipaCertificacion='".$siga_reportesDto->getParticipaCertificacion()."'";
if(($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getGarantia()!=""){
$sql.="Garantia='".$siga_reportesDto->getGarantia()."'";
if(($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getExtGarantia()!=""){
$sql.="ExtGarantia='".$siga_reportesDto->getExtGarantia()."'";
if(($siga_reportesDto->getAnexo()!="") ||($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getAnexo()!=""){
$sql.="Anexo='".$siga_reportesDto->getAnexo()."'";
if(($siga_reportesDto->getEspecifica()!="") ){
$sql.=" AND ";
}
}
if($siga_reportesDto->getEspecifica()!=""){
$sql.="Especifica='".$siga_reportesDto->getEspecifica()."'";
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
$tmp[$contador] = new Siga_reportesDTO();
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
$tmp[$contador]->setAF_BC($row["AF_BC"]);
$tmp[$contador]->setNombre_Activo($row["Nombre_Activo"]);
$tmp[$contador]->setId_Tipo_Vale_Resg($row["Id_Tipo_Vale_Resg"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setId_Departamento($row["Id_Departamento"]);
$tmp[$contador]->setNum_Empleado($row["Num_Empleado"]);
$tmp[$contador]->setNombre_Completo($row["Nombre_Completo"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setFoto($row["Foto"]);
$tmp[$contador]->setId_Clasificacion($row["Id_Clasificacion"]);
$tmp[$contador]->setId_Propiedad($row["Id_Propiedad"]);
$tmp[$contador]->setId_Tipo_Activo($row["Id_Tipo_Activo"]);
$tmp[$contador]->setDescCorta($row["DescCorta"]);
$tmp[$contador]->setDescLarga($row["DescLarga"]);
$tmp[$contador]->setId_Ubic_Prim($row["Id_Ubic_Prim"]);
$tmp[$contador]->setId_Ubic_Sec($row["Id_Ubic_Sec"]);
$tmp[$contador]->setId_Motivo_Alta($row["Id_Motivo_Alta"]);
$tmp[$contador]->setId_Familia($row["Id_Familia"]);
$tmp[$contador]->setId_Subfamilia($row["Id_Subfamilia"]);
$tmp[$contador]->setMarca($row["Marca"]);
$tmp[$contador]->setModelo($row["Modelo"]);
$tmp[$contador]->setNumSerie($row["NumSerie"]);
$tmp[$contador]->setId_ActivoPadre($row["Id_ActivoPadre"]);
$tmp[$contador]->setNumActivoAnterior($row["NumActivoAnterior"]);
$tmp[$contador]->setParticipaPre($row["ParticipaPre"]);
$tmp[$contador]->setParticipaSeguros($row["ParticipaSeguros"]);
$tmp[$contador]->setImporteSeguros($row["ImporteSeguros"]);
$tmp[$contador]->setParticipaCertificacion($row["ParticipaCertificacion"]);
$tmp[$contador]->setGarantia($row["Garantia"]);
$tmp[$contador]->setExtGarantia($row["ExtGarantia"]);
$tmp[$contador]->setAnexo($row["Anexo"]);
$tmp[$contador]->setEspecifica($row["Especifica"]);
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

	//<summarty>Obtiene la información de los Activos</summary>
	public function llenarDataTable($draw,$columns,$order,$start,$length,$search, $siga_reportesDto, $Datos_Proveedor, $Baja, $proveedor = null) {
        $recordsTotal = 0;
        $data = array();
        if ($proveedor == null) {
            $this->_conexion(null);
        } else if ($proveedor != null) {
            $this->_proveedor = $proveedor;
        }
		$Filtros="";
		$Sql_Baja="";
		if($siga_reportesDto!=""){
			
			
			if(($siga_reportesDto->getId_Activo()!="") ||($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") || ($siga_reportesDto->getEspecifica()!="") ||($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
			}
			
			if($siga_reportesDto->getId_Activo()!=""){
				$Filtros.="S.Id_Activo in(".$siga_reportesDto->getId_Activo().")";
				if(($siga_reportesDto->getId_Ubic_Prim()!="") ||($siga_reportesDto->getId_Ubic_Sec()!="") || ($siga_reportesDto->getEspecifica()!="") ||($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Ubic_Prim()!=""){
				$Filtros.="S.Id_Ubic_Prim in(".$siga_reportesDto->getId_Ubic_Prim().")";
				if(($siga_reportesDto->getId_Ubic_Sec()!="") || ($siga_reportesDto->getEspecifica()!="") ||($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Ubic_Sec()!=""){
				$Filtros.="S.Id_Ubic_Sec in (".$siga_reportesDto->getId_Ubic_Sec().")";
				if(($siga_reportesDto->getEspecifica()!="") || ($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getEspecifica()!=""){
				$Filtros.="S.Especifica like'%".$siga_reportesDto->getEspecifica()."%'";
				if(($siga_reportesDto->getId_Area()!="") ||($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Area()!=""){
				$Filtros.="S.Id_Area in(".$siga_reportesDto->getId_Area().")";
				if(($siga_reportesDto->getId_Propiedad()!="") ||($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Propiedad()!=""){
				$Filtros.="S.Id_Propiedad in(".$siga_reportesDto->getId_Propiedad().")";
				if(($siga_reportesDto->getId_Familia()!="") ||($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Familia()!=""){
				$Filtros.="Id_Familia in(".$siga_reportesDto->getId_Familia().")";
				if(($siga_reportesDto->getId_Subfamilia()!="") ||($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Subfamilia()!=""){
				$Filtros.="S.Id_Subfamilia in(".$siga_reportesDto->getId_Subfamilia().")";
				if(($siga_reportesDto->getId_Departamento()!="") ||($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Departamento()!=""){
				$Filtros.="S.Id_Departamento in(".$siga_reportesDto->getId_Departamento().")";
				if(($siga_reportesDto->getNum_Empleado()!="") ||($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getNum_Empleado()!=""){
				$Filtros.="S.Num_Empleado in(".$siga_reportesDto->getNum_Empleado().")";
				if(($siga_reportesDto->getId_Motivo_Alta()!="") ||($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Motivo_Alta()!=""){
				$Filtros.="S.Id_Motivo_Alta in(".$siga_reportesDto->getId_Motivo_Alta().")";
				if(($siga_reportesDto->getId_Tipo_Activo()!="") ||($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Tipo_Activo()!=""){
				$Filtros.="S.Id_Tipo_Activo in(".$siga_reportesDto->getId_Tipo_Activo().")";
				if(($siga_reportesDto->getId_Tipo_Vale_Resg()!="") ||($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Tipo_Vale_Resg()!=""){
				$Filtros.="S.Id_Tipo_Vale_Resg in(".$siga_reportesDto->getId_Tipo_Vale_Resg().")";
				if(($siga_reportesDto->getEstatus_Reg()!="")||($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getEstatus_Reg()!=""){
				$Filtros.="S.Estatus_Reg <> '3' ";
				if(($siga_reportesDto->getId_Clasificacion()!="") ||($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getId_Clasificacion()!=""){
				$Filtros.="S.Id_Clasificacion in(".$siga_reportesDto->getId_Clasificacion().")";
				if(($siga_reportesDto->getMarca()!="") ||($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getMarca()!=""){
				$Filtros.="rtrim(ltrim(S.Marca)) in(".$siga_reportesDto->getMarca().")";
				if(($siga_reportesDto->getModelo()!="") ||($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getModelo()!=""){
				$Filtros.="rtrim(ltrim(S.Modelo)) in(".$siga_reportesDto->getModelo().")";
				if(($siga_reportesDto->getNumSerie()!="") ||($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getNumSerie()!=""){
				$Filtros.="rtrim(ltrim(S.NumSerie)) in(".$siga_reportesDto->getNumSerie().")";
				if(($siga_reportesDto->getParticipaPre()!="") ||($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getParticipaPre()!=""){
				$Filtros.="S.ParticipaPre in(".$siga_reportesDto->getParticipaPre().")";
				if(($siga_reportesDto->getParticipaSeguros()!="") ||($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getParticipaSeguros()!=""){
				$Filtros.="S.ParticipaSeguros in(".$siga_reportesDto->getParticipaSeguros().")";
				if(($siga_reportesDto->getImporteSeguros()!="") ||($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getImporteSeguros()!=""){
				$Filtros.="S.ImporteSeguros='".$siga_reportesDto->getImporteSeguros()."'";
				if(($siga_reportesDto->getParticipaCertificacion()!="") ||($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getParticipaCertificacion()!=""){
				$Filtros.="S.ParticipaCertificacion in(".$siga_reportesDto->getParticipaCertificacion().")";
				if(($siga_reportesDto->getGarantia()!="") ||($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getGarantia()!=""){
				$Filtros.="S.Garantia='".$siga_reportesDto->getGarantia()."'";
				if(($siga_reportesDto->getExtGarantia()!="") ||($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getExtGarantia()!=""){
				$Filtros.="S.ExtGarantia='".$siga_reportesDto->getExtGarantia()."'";
				if(($siga_reportesDto->getDescLarga()!="") ||($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getDescLarga()!=""){
				$Filtros.="S.DescLarga like'%".$siga_reportesDto->getDescLarga()."%'";
				if(($siga_reportesDto->getDescCorta()!="")){
				$Filtros.=" AND ";
				}
			}
			
			if($siga_reportesDto->getDescCorta()!=""){
				$Filtros.="S.DescCorta like'%".$siga_reportesDto->getDescCorta()."%'";
			}
		}

		$criterios = "";
		if ($search != ''AND $search["value"] != '') {
			foreach ($columns as $value) {   
				if($value["data"]!='Id_INPC' AND $value["data"]!='function')
				$criterios.=' ' . $value["data"] . " LIKE '%" . $search["value"] . "%'" . ' OR';
			}
			$criterios = $criterios != "" ? ('AND (' . substr($criterios, 0, -2) . ')') : '';
		}

		$ordenamiento = '';
		if ($order != ''AND count($order)> 0) {
			$order=$order[0];
			$aux=$columns[$order["column"]];
			if($aux["data"] !="function") {
				$ordenamiento=' ORDER BY '.$aux["data"].' '.$order["dir"];
			}
		}
		
		if($Baja == 0) {
			// Lista de Activos en Operación
			//$Sql_Baja = " and SB.EstatusBaja is null ";
			// Considera los Activos que no han tenido operaciones de Baja
			// Cuando haya más de 1 movimiento en la baja, se toma el que haya ocurrido más reciente y si se trata de la misma fecha,
			// toma el último que se insertó en la Base de datos ya que debería ser el último movimiento
			$Sql_Baja = " AND ( SB.Id_baja IS NULL ";
			// Considera además los activos que estuvieron dados de baja o en proceso pero volvieron a Operación
			// Estatus_Cancelacion = 1 y EstatusBaja = 0: Baja en proceso
			$Sql_Baja .= "		OR (
				 					S.Id_Activo IN (
										SELECT B_1.Id_Activo
										FROM siga_baja_activo B_1
											INNER JOIN
												(
													SELECT TOP 1 WITH TIES
														Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
													FROM siga_baja_activo
													ORDER BY
														ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
												) B_2
											ON B_1.Fecha_Baja = B_2.UltimoRegistro
										AND B_1.Id_Activo = B_2.Id_Activo
										AND B_1.Id_baja = B_2.UltimoMovimiento
										WHERE
											B_1.Estatus_Cancelacion = 1 AND B_1.EstatusBaja = 0
									)
								)
							)";
		}
		else {
			// Lista de Activos que están en Proceso de Baja o que son Baja definitiva
			// Cuando haya más de 1 movimiento en la baja, se toma el que haya ocurrido más reciente y si se trata de la misma fecha,
			// toma el último que se insertó en la Base de datos ya que debería ser el último movimiento
			// Estatus_Cancelacion = 0 y EstatusBaja = 1: Baja definitiva
			// Estatus_Cancelacion = 0 y EstatusBaja = 0: Esta en Proceso de Baja
			$Sql_Baja = " AND (S.Id_Activo IN (
									SELECT B_1.Id_Activo
									FROM siga_baja_activo B_1
										INNER JOIN
											(
												SELECT TOP 1 WITH TIES
													Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
												FROM siga_baja_activo
												ORDER BY
													ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
											) B_2
										ON B_1.Fecha_Baja = B_2.UltimoRegistro
									AND B_1.Id_Activo = B_2.Id_Activo
									AND B_1.Id_baja = B_2.UltimoMovimiento
									WHERE
										(B_1.Estatus_Cancelacion = 0 AND B_1.EstatusBaja = 0)
										OR
										(B_1.Estatus_Cancelacion = 0 AND B_1.EstatusBaja = 1)
								)
							)";
		}
		
		$pagina = '';
		if($start != '' AND $length != '') {
			$pagina='  OFFSET ' . $start.' ROWS FETCH NEXT ' . $length . ' ROWS ONLY ';
		}

		// Cadena Sql a ejecutar
		/*
		$sql = "SELECT DISTINCT * from (SELECT S.Id_Activo,convert(varchar, S.Fech_Inser, 111) as Fech_Inser,S.AF_BC,S.Foto,S.Nombre_Activo,S.Num_Empleado, S.Nombre_Completo,S.Marca, S.Modelo, S.NumSerie,S.DescLarga,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,
		S.ParticipaPre, S.ParticipaSeguros, S.ImporteSeguros, S.ParticipaCertificacion,S.Garantia,S.ExtGarantia,S.Anexo, S.Especifica,
		(select top 1 (select top 1 Desc_Frecuencia from siga_cat_frecuencia where siga_cat_frecuencia.Id_Frecuencia=siga_actividades.Id_Frecuencia) as Frecuencia
		from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Frecuencia,
		( select top 1 Realiza from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Realiza,
		(select top 1 rtrim(ltrim(No_Usuario))+' - '+ rtrim(ltrim(Nombre_Usuario)) as Usuario_Registro from siga_usuarios where Id_Usuario=S.Usr_Inser) as Usuario_Registro,
		(select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,
		(select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad=S.Id_Propiedad) as Propiedad,
		(select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,
		(select Desc_Tipo_Vale_Resg from siga_cat_tipo_vale_resg T where T.Id_Tipo_Vale_Resg=S.Id_Tipo_Vale_Resg) as Tipo_Vale,
		(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,
		(select Desc_Motivo_Alta from siga_cat_motivo_alta M where M.Id_Motivo_Alta=S.Id_Motivo_Alta) as Motivo_Alta,
		(select Departamento from empleados_chs D where D.Num_Empleado=S.Num_Empleado) as Departamento,
		(select Desc_Familia from siga_cat_familia F where F.Id_Familia=S.Id_Familia) as Familia,
		(select Desc_Subfamilia from siga_cat_subfamilia Su where Su.Id_Subfamilia=S.Id_Subfamilia) as Subfamilia,
		(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria,
	--Datos Proveedor
		NumOrdenCompra,NumFactura,FechaFactura,UUID,Folio_Fiscal,Monto_F,MontoFactura,NumContrato,VidaUtilFabricante,
		VidaUtilCHS,AP.Garantia as Garantia_P ,AP.ExtGarantia as ExtGarantia_P,Fecha_Vencimiento,Poliza_Url,NombreProveedor,Contacto,Telefono,DocRecibida,
		Accesorios,Correo,Consumibles,
	--Datos Contabilidad
		CC.Desc_Centro_de_costos as Centro_Costos, No_Capex, Prorrateo, case when Participa_Depreciacion='1' then 'Si' when Participa_Depreciacion='0' then 'No' end as Participa_Depreciacion, Fecha_Inicio_Depr,
		Cuent_Cont_Act, Cuent_Cont_Act_B10, Cuent_Cont_Result, Cuent_Cont_Result_B10, Cuent_Cont_Dep, Cuent_Cont_Dep_B10
		FROM siga_activos S 

		left outer join siga_activo_proveedor AP on S.Id_Activo=AP.id_Activo
		left outer join (select * from siga_activos_contabilidad where Fech_Inser is not null) AC on S.Id_Activo=AC.Id_Activo
		left outer join siga_cat_centro_de_costos CC on AC.Centro_Costos=CC.Id_Centros_de_costos
		left outer join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo
		where 0=0 ". $Sql_Baja . "" . $Filtros . ") siga_activos where 0=0 " . $criterios . $ordenamiento . $pagina;
		*/

		$sql = "WITH TempResult AS(
					SELECT DISTINCT(S.Id_Activo),
						--convert(varchar, S.Fech_Inser, 111) as Fech_Inser,
						CAST(S.Fech_Inser as date) as Fech_Inser,
						S.AF_BC,S.Foto,S.Nombre_Activo,S.Num_Empleado, S.Nombre_Completo,S.Marca, S.Modelo, S.NumSerie,S.DescLarga,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,
						S.ParticipaPre, S.ParticipaSeguros, S.ImporteSeguros, S.ParticipaCertificacion,S.Garantia,S.ExtGarantia,S.Anexo, S.Especifica,
						(select top 1 (select top 1 Desc_Frecuencia from siga_cat_frecuencia where siga_cat_frecuencia.Id_Frecuencia=siga_actividades.Id_Frecuencia) as Frecuencia
						from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Frecuencia,
						(select top 1 Realiza from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Realiza,
						(select top 1 rtrim(ltrim(No_Usuario))+' - '+ rtrim(ltrim(Nombre_Usuario)) as Usuario_Registro from siga_usuarios where Id_Usuario=S.Usr_Inser) as Usuario_Registro,
						(select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,
						(select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad=S.Id_Propiedad) as Propiedad,
						(select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,
						(select Desc_Tipo_Vale_Resg from siga_cat_tipo_vale_resg T where T.Id_Tipo_Vale_Resg=S.Id_Tipo_Vale_Resg) as Tipo_Vale,
						(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,
						(select Desc_Motivo_Alta from siga_cat_motivo_alta M where M.Id_Motivo_Alta=S.Id_Motivo_Alta) as Motivo_Alta,
						(select Departamento from empleados_chs D where D.Num_Empleado=S.Num_Empleado AND D.Id > 0) as Departamento,
						(select Desc_Familia from siga_cat_familia F where F.Id_Familia=S.Id_Familia) as Familia,
						(select Desc_Subfamilia from siga_cat_subfamilia Su where Su.Id_Subfamilia=S.Id_Subfamilia) as Subfamilia,
						(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria,
						/* -- Datos Proveedor -- */
							NumOrdenCompra,
							NumFactura,
							FechaFactura,
							UUID,
							Folio_Fiscal,
							Monto_F,
							MontoFactura,
							NumContrato,
							VidaUtilFabricante,
							VidaUtilCHS,
							AP.Garantia AS Garantia_P,
							AP.ExtGarantia AS ExtGarantia_P,
							Fecha_Vencimiento,
							Poliza_Url,
							NombreProveedor,
							Contacto,
							Telefono,
							DocRecibida,
							Correo,
							(SELECT STUFF((SELECT ', (' + A_C.SKU + ') ' + A_C.Descripcion FROM siga_activo_accesorio_consumible A_C WHERE A_C.Tipo = 1 AND S.Id_Activo = A_C.Id_Activo ORDER BY A_C.SKU DESC FOR XML PATH ('')),1,1,'')) AS Accesorios,
							(SELECT STUFF((SELECT ', (' + A_C.SKU + ') ' + A_C.Descripcion FROM siga_activo_accesorio_consumible A_C WHERE A_C.Tipo = 2 AND S.Id_Activo = A_C.Id_Activo ORDER BY A_C.SKU DESC FOR XML PATH ('')),1,1,'')) AS Consumibles,
							Link,
							(SELECT siga_condicion_de_recepcion_descripcion FROM siga_cat_condicion_de_recepcion WHERE siga_condicion_de_recepcion_id=S.siga_activos_condicion_recepcion) AS siga_activos_condicion_recepcion,
							CAST(siga_activos_fch_recepcion_equipo as date) as siga_activos_fch_recepcion_equipo,
							CAST(siga_activos_fch_operacion as date) as siga_activos_fch_operacion,

						/* --Datos Contabilidad */
							CC.Desc_Centro_de_costos as Centro_Costos, No_Capex, Prorrateo, case when Participa_Depreciacion='1' then 'Si' when Participa_Depreciacion='0' then 'No' end as Participa_Depreciacion, Fecha_Inicio_Depr,
							Cuent_Cont_Act, Cuent_Cont_Act_B10, Cuent_Cont_Result, Cuent_Cont_Result_B10, Cuent_Cont_Dep, Cuent_Cont_Dep_B10
					FROM siga_activos S 
					/* -- Join con tablas -- */
						left outer join siga_activo_proveedor AP on S.Id_Activo=AP.id_Activo
						left outer join (select * from siga_activos_contabilidad where Fech_Inser is not null) AC on S.Id_Activo=AC.Id_Activo
						left outer join siga_cat_centro_de_costos CC on AC.Centro_Costos=CC.Id_Centros_de_costos
						left outer join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo
					/* -- Lista de Filtros -- */
						WHERE 0=0 " . $Sql_Baja . "" . $Filtros; /*. $ordenamiento*/
		$sql .= ") " .
				"SELECT *, NumRegistrosConsulta = COUNT(*) OVER() FROM TempResult ";
					if( $criterios != "") { $sql .= " WHERE 0=0 " . $criterios; }
		$sql .= $ordenamiento . $pagina;

		// Ejecuta la cadena de consulta
		$this->_proveedor->execute($sql);
		
		//echo "<pre>";
		//echo "select * from (SELECT S.Id_Activo,convert(varchar, S.Fech_Inser, 111) as Fech_Inser,S.AF_BC,S.Foto,S.Nombre_Activo,S.Num_Empleado, S.Nombre_Completo,S.Marca, S.Modelo, S.NumSerie,S.DescLarga,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,
		//S.ParticipaPre, S.ParticipaSeguros, S.ImporteSeguros, S.ParticipaCertificacion,S.Garantia,S.ExtGarantia,S.Anexo, S.Especifica,
		//
		//(select top 1 (select top 1 Desc_Frecuencia from siga_cat_frecuencia where siga_cat_frecuencia.Id_Frecuencia=siga_actividades.Id_Frecuencia) as Frecuencia
    // from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Frecuencia,
		//( select top 1 Realiza from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Realiza,
		//(select top 1 rtrim(ltrim(No_Usuario))+' - '+ rtrim(ltrim(Nombre_Usuario)) as Usuario_Registro from siga_usuarios where Id_Usuario=S.Usr_Inser) as Usuario_Registro,
		//
		//
		//(select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,
		//(select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad=S.Id_Propiedad) as Propiedad,
		//(select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,
		//(select Desc_Tipo_Vale_Resg from siga_cat_tipo_vale_resg T where T.Id_Tipo_Vale_Resg=S.Id_Tipo_Vale_Resg) as Tipo_Vale,
		//(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,
		//(select Desc_Motivo_Alta from siga_cat_motivo_alta M where M.Id_Motivo_Alta=S.Id_Motivo_Alta) as Motivo_Alta,
		//(select Des_Departamento from siga_cat_departamento D where D.Id_Departamento=S.Id_Departamento) as Departamento,
		//(select Desc_Familia from siga_cat_familia F where F.Id_Familia=S.Id_Familia) as Familia,
		//(select Desc_Subfamilia from siga_cat_subfamilia Su where Su.Id_Subfamilia=S.Id_Subfamilia) as Subfamilia,
		//(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria,
		//--Datos Proveedor
		//NumOrdenCompra,NumFactura,FechaFactura,UUID,Folio_Fiscal,Monto_F,MontoFactura,NumContrato,VidaUtilFabricante,
		//VidaUtilCHS,AP.Garantia as Garantia_P ,AP.ExtGarantia as ExtGarantia_P,Fecha_Vencimiento,Poliza_Url,NombreProveedor,Contacto,Telefono,DocRecibida,
		//Accesorios,Correo,Consumibles,
		//--Datos Contabilidad
		//CC.Desc_Centro_de_costos as Centro_Costos, No_Capex, Prorrateo, case when Participa_Depreciacion='1' then 'Si' when Participa_Depreciacion='0' then 'No' end as Participa_Depreciacion, Fecha_Inicio_Depr,
		//Cuent_Cont_Act, Cuent_Cont_Act_B10, Cuent_Cont_Result, Cuent_Cont_Result_B10, Cuent_Cont_Dep, Cuent_Cont_Dep_B10
		//FROM siga_activos S 
		//left outer join siga_activo_proveedor AP on S.Id_Activo=AP.id_Activo
		//left outer join siga_activos_contabilidad AC on S.Id_Activo=AC.Id_Activo
		//left outer join siga_cat_centro_de_costos CC on AC.Centro_Costos=CC.Id_Centros_de_costos
		//left outer join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo
		//where 0=0 ".$Sql_Baja. "".$Filtros.") siga_activos where 0=0 ";
		//echo "</pre>";	

		
		
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
				$recordsTotal = $row["NumRegistrosConsulta"];

        $ParticipaPre="";
				$ParticipaSeguros="";
				$ParticipaCertificacion="";
				if($row["ParticipaPre"]==0){$ParticipaPre="NO";}else{if($row["ParticipaPre"]==1){$ParticipaPre="SI";}}
				if($row["ParticipaSeguros"]==0){$ParticipaSeguros="NO";}else{if($row["ParticipaSeguros"]==1){$ParticipaSeguros="SI";}}
				if($row["ParticipaCertificacion"]==0){$ParticipaCertificacion="NO";}else{if($row["ParticipaCertificacion"]==1){$ParticipaCertificacion="SI";}}
				
				$Frecuencia="NO ASIGNADO";
				if($row["Frecuencia"]!=NULL){
					$Frecuencia=$row["Frecuencia"];	
				}
				
				$Realiza="NO ASIGNADO";
				if($row["Realiza"]!=NULL){
					if($row["Realiza"] == 0) {
						$Realiza="Interno";
					}
					else {
						$Realiza="Externo";
					}
				}
				
				if($row["Link"]==''){$link = '';}else{$link='<a href="'.$row["Link"].'" target="_blank">Link</a>';}

				$data[] = array("Id_Activo" => $row["Id_Activo"],
					"AF_BC" => $row["AF_BC"],
					"Foto" => $row["Foto"],
					"Nombre_Activo" => $row["Nombre_Activo"],
					"Marca" => $row["Marca"],
					"Modelo" => $row["Modelo"],
					"NumSerie" => $row["NumSerie"],
					"Area" => $row["Area"],
					"Departamento" => $row["Departamento"],
					"Clasificacion" => $row["Clasificacion"],
					"Propiedad" => $row["Propiedad"],
					"Tipo_Vale" => $row["Tipo_Vale"],
					"TipoActivo" => $row["TipoActivo"],
					"Familia" => $row["Familia"],
					"Subfamilia" => $row["Subfamilia"],
					"DescCorta" => $row["DescCorta"],
					"DescLarga" => $row["DescLarga"],
					"Motivo_Alta" => $row["Motivo_Alta"],
					"Num_Empleado" => $row["Num_Empleado"],
					"Nombre_Completo" => $row["Nombre_Completo"],
					"UbicacionPrimaria" => $row["UbicacionPrimaria"],
					"UbicacionSecundaria" => $row["UbicacionSecundaria"],
					"Especifica" => $row["Especifica"],
					"ParticipaPre" => $ParticipaPre,
					"ParticipaSeguros" => $ParticipaSeguros,
					"ImporteSeguros" => $row["ImporteSeguros"],
					"ParticipaCertificacion" => $ParticipaCertificacion,
					"Garantia" => $row["Garantia"],
					"ExtGarantia" => $row["ExtGarantia"],
					"Anexo" => $row["Anexo"],
					"Fech_Inser" => $row["Fech_Inser"],
					"Usuario_Registro" => $row["Usuario_Registro"],
					"Realiza" => $Realiza,
					"Frecuencia" => $Frecuencia,
					//Datos Proveedor
					"NumOrdenCompra" => $row["NumOrdenCompra"],
					"NumFactura" => $row["NumFactura"],
					"FechaFactura" 			=> $row["FechaFactura"],
					"UUID" 							=> $row["UUID"],
					"Folio_Fiscal" 			=> $row["Folio_Fiscal"],
					"Monto_F" 					=> $row["Monto_F"],
					"MontoFactura" 			=> $row["MontoFactura"],
					"NumContrato" 			=> $row["NumContrato"],
					"VidaUtilFabricante"=> $row["VidaUtilFabricante"],
					"VidaUtilCHS" 			=> $row["VidaUtilCHS"],
					"Garantia_P" 				=> $row["Garantia_P"],
					"ExtGarantia_P" 		=> $row["ExtGarantia_P"],
					"Fecha_Vencimiento" => $row["Fecha_Vencimiento"],
					"NombreProveedor" 	=> $row["NombreProveedor"],
					"Contacto" 					=> $row["Contacto"],
					"Telefono" 					=> $row["Telefono"],
					"DocRecibida" 			=> $row["DocRecibida"],
					"Accesorios" 				=> $row["Accesorios"],
					"Correo" 						=> $row["Telefono"],
					"Consumibles" 			=> $row["Consumibles"],
					"Link" 							=> $link,
					"siga_activos_condicion_recepcion" 	=> $row["siga_activos_condicion_recepcion"],
					"siga_activos_fch_recepcion_equipo" => $row["siga_activos_fch_recepcion_equipo"],
					"siga_activos_fch_operacion" 				=> $row["siga_activos_fch_operacion"],

					//"Link" => '<a href="'.$row["Link"].'" target="_blank">Alex</a>',
					//Datos Contabilidad
					"Centro_Costos" => $row["Centro_Costos"],
					"No_Capex" => $row["No_Capex"],
					"Prorrateo" => $row["Prorrateo"],
					"Participa_Depreciacion" => $row["Participa_Depreciacion"],
					"Fecha_Inicio_Depr" => $row["Fecha_Inicio_Depr"],
					"Cuent_Cont_Act" => $row["Cuent_Cont_Act"],
					"Cuent_Cont_Act_B10" => $row["Cuent_Cont_Act_B10"],
					"Cuent_Cont_Result" => $row["Cuent_Cont_Result"],
					"Cuent_Cont_Result_B10" => $row["Cuent_Cont_Result_B10"],
					"Cuent_Cont_Dep" => $row["Cuent_Cont_Dep"],
					"Cuent_Cont_Dep_B10" => $row["Cuent_Cont_Dep_B10"]
				);
            }
			
			
			/*
			$this->_proveedor->execute("select COUNT(*) AS total from (SELECT S.Id_Activo,S.Fech_Inser, S.Especifica, S.AF_BC,S.Foto,S.Nombre_Activo,S.Num_Empleado, S.Nombre_Completo,S.Marca, S.Modelo, S.NumSerie,S.DescLarga,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,
			S.ParticipaPre, S.ParticipaSeguros, S.ImporteSeguros, S.ParticipaCertificacion,S.Garantia,S.ExtGarantia,S.Anexo,
			
			(select top 1 (select top 1 Desc_Frecuencia from siga_cat_frecuencia where siga_cat_frecuencia.Id_Frecuencia=siga_actividades.Id_Frecuencia) as Frecuencia
			from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Frecuencia,
		    ( select top 1 Realiza from siga_actividades where siga_actividades.Id_Area=S.Id_Area and siga_actividades.Id_Activo=S.Id_Activo order by Fech_Inser desc) as Realiza,
			(select top 1 rtrim(ltrim(No_Usuario))+' - '+ rtrim(ltrim(Nombre_Usuario)) as Usuario_Registro from siga_usuarios where Id_Usuario=S.Usr_Inser) as Usuario_Registro,
			(select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,
			(select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad=S.Id_Propiedad) as Propiedad,
			(select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,
			(select Desc_Tipo_Vale_Resg from siga_cat_tipo_vale_resg T where T.Id_Tipo_Vale_Resg=S.Id_Tipo_Vale_Resg) as Tipo_Vale,
			(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,
			(select Desc_Motivo_Alta from siga_cat_motivo_alta M where M.Id_Motivo_Alta=S.Id_Motivo_Alta) as Motivo_Alta,
			(select Des_Departamento from siga_cat_departamento D where D.Id_Departamento=S.Id_Departamento) as Departamento,
			(select Desc_Familia from siga_cat_familia F where F.Id_Familia=S.Id_Familia) as Familia,
			(select Desc_Subfamilia from siga_cat_subfamilia Su where Su.Id_Subfamilia=S.Id_Subfamilia) as Subfamilia,
			(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria,
			--Datos Proveedor
			NumOrdenCompra,NumFactura,FechaFactura,UUID,Folio_Fiscal,Monto_F,MontoFactura,NumContrato,VidaUtilFabricante,
			VidaUtilCHS,AP.Garantia as Garantia_P ,AP.ExtGarantia as ExtGarantia_P,Fecha_Vencimiento,Poliza_Url,NombreProveedor,Contacto,Telefono,DocRecibida,
			Accesorios,Correo,Consumibles,
			--Datos Contabilidad
			CC.Desc_Centro_de_costos as Centro_Costos, No_Capex, Prorrateo, case when Participa_Depreciacion='1' then 'Si' when Participa_Depreciacion='0' then 'No' end as Participa_Depreciacion, Fecha_Inicio_Depr,
			Cuent_Cont_Act, Cuent_Cont_Act_B10, Cuent_Cont_Result, Cuent_Cont_Result_B10, Cuent_Cont_Dep, Cuent_Cont_Dep_B10
			FROM siga_activos S 
			left outer join siga_activo_proveedor AP on S.Id_Activo=AP.id_Activo
			left outer join (select * from siga_activos_contabilidad where Fech_Inser is not null) AC on S.Id_Activo=AC.Id_Activo
			left outer join siga_cat_centro_de_costos CC on AC.Centro_Costos=CC.Id_Centros_de_costos
			left outer join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo
			where 0=0 ".$Sql_Baja."".$Filtros.") siga_activos where 0=0 ".$criterios);
			
			//$this->_proveedor->execute("select COUNT(*) AS total from ( SELECT Id_Activo FROM siga_activos where 0=0 ". "".$Filtros.$criterios." ) siga_activos");
			while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
				$recordsTotal=$row["total"];
			}
			*/
		}
		return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
	}
}
?>