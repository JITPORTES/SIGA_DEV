<?php
include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_activos/Siga_activosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");

/*
// IMPORTANTE
// Estatus que definen si un Activo se ecneuntra en baja definitiva. Considerando la tabla de Bajas "siga_baja_activo" y los campos Estatus_Cancelacion y EstatusBaja:
// ════════════════════╦═════════════════════╦═════════════════════════
//     EstatusBaja     ║ Estatus_Cancelacion ║    Estatus Real Baja    
// ════════════════════╬═════════════════════╬═════════════════════════
//         0           ║           0         ║ En Proceso
//         0           ║           1         ║ Cancelado y vuelve a Operación
//         1           ║           0         ║ Baja definitiva
//         1           ║           1         ║ No definido
// ════════════════════╩═════════════════════╩═════════════════════════
*/


class Siga_activosDAO{
	protected $_proveedor;
	public function __construct($gestor = "sqlserver", $bd = "gestion") {
		$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
	}

public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_activos($siga_activosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_activos(";
if($siga_activosDto->getId_Activo()!=""){
$sql.="Id_Activo";
if(($siga_activosDto->getAF_BC()!="") ||($siga_activosDto->getNombre_Activo()!="") ||($siga_activosDto->getId_Tipo_Vale_Resg()!="") || ($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getAF_BC()!=""){
$sql.="AF_BC";
if(($siga_activosDto->getNombre_Activo()!="") ||($siga_activosDto->getId_Tipo_Vale_Resg()!="") || ($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNombre_Activo()!=""){
$sql.="Nombre_Activo";
if(($siga_activosDto->getId_Tipo_Vale_Resg()!="") || ($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Tipo_Vale_Resg()!=""){
$sql.="Id_Tipo_Vale_Resg";
if(($siga_activosDto->getMant_Prevent()!="") || ($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getMant_Prevent()!=""){
$sql.="Mant_Prevent";
if(($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Area()!=""){
$sql.="Id_Area";
if(($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Departamento()!=""){
$sql.="Id_Departamento";
if(($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNum_Empleado()!=""){
$sql.="Num_Empleado";
if(($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNombre_Completo()!=""){
$sql.="Nombre_Completo";
if(($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
//if($siga_activosDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
//}
if($siga_activosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
if(($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getFoto()!=""){
$sql.="Foto";
if(($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Clase()!=""){
$sql.="Id_Clase";
if(($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Clasificacion()!=""){
$sql.="Id_Clasificacion";
if(($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Propiedad()!=""){
$sql.="Id_Propiedad";
if(($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Tipo_Activo()!=""){
$sql.="Id_Tipo_Activo";
if(($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getDescCorta()!=""){
$sql.="DescCorta";
if(($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getDescLarga()!=""){
$sql.="DescLarga";
if(($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim";
if(($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}

if($siga_activosDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec";
if(($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Situacion_Activo()!=""){
$sql.="Id_Situacion_Activo";
if(($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Motivo_Alta()!=""){
$sql.="Id_Motivo_Alta";
if(($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Familia()!=""){
$sql.="Id_Familia";
if(($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Subfamilia()!=""){
$sql.="Id_Subfamilia";
if(($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getMarca()!=""){
$sql.="Marca";
if(($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getModelo()!=""){
$sql.="Modelo";
if(($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNumSerie()!=""){
$sql.="NumSerie";
if(($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_ActivoPadre()!=""){
$sql.="Id_ActivoPadre";
if(($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNumActivoAnterior()!=""){
$sql.="NumActivoAnterior";
if(($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getParticipaPre()!=""){
$sql.="ParticipaPre";
if(($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getParticipaSeguros()!=""){
$sql.="ParticipaSeguros";
if(($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getImporteSeguros()!=""){
$sql.="ImporteSeguros";
if(($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getParticipaCertificacion()!=""){
$sql.="ParticipaCertificacion";
if(($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getGarantia()!=""){
$sql.="Garantia";
if(($siga_activosDto->getExtGarantia()!="") || ($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getExtGarantia()!=""){
$sql.="ExtGarantia";
if(($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getAnexo()!=""){
$sql.="Anexo";
}

if($siga_activosDto->getEspecifica()!=""){
$sql.=",Especifica";
}
// Se agregaron tre datos alex arias 25/04/24 siga_activos_condicion_recepcion
if($siga_activosDto->getsiga_cmb_condicion_recepcion()!=""){
	$sql.=",siga_activos_condicion_recepcion";
	}

	if($siga_activosDto->getsiga_activo_alta_fch_recepcion()!=""){
		$sql.=",siga_activos_fch_recepcion_equipo";
		}

		if($siga_activosDto->getsiga_activo_alta_fch_operacion()!=""){
			$sql.=",siga_activos_fch_operacion";
			}
// Se agregaron tre datos alex arias 25/04/24

$sql.=") VALUES(";
if($siga_activosDto->getId_Activo()!=""){
$sql.="'".$siga_activosDto->getId_Activo()."'";
if(($siga_activosDto->getAF_BC()!="") ||($siga_activosDto->getNombre_Activo()!="") ||($siga_activosDto->getId_Tipo_Vale_Resg()!="") || ($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="") || ($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getAF_BC()!=""){
$sql.="'".$siga_activosDto->getAF_BC()."'";
if(($siga_activosDto->getNombre_Activo()!="") ||($siga_activosDto->getId_Tipo_Vale_Resg()!="") ||($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNombre_Activo()!=""){
$sql.="'".$siga_activosDto->getNombre_Activo()."'";
if(($siga_activosDto->getId_Tipo_Vale_Resg()!="") ||($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Tipo_Vale_Resg()!=""){
$sql.="'".$siga_activosDto->getId_Tipo_Vale_Resg()."'";
if(($siga_activosDto->getMant_Prevent()!="")||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getMant_Prevent()!=""){
$sql.="'".$siga_activosDto->getMant_Prevent()."'";
if(($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Area()!=""){
$sql.="'".$siga_activosDto->getId_Area()."'";
if(($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="")||($siga_activosDto->getId_Clase()!="") ||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Departamento()!=""){
$sql.="'".$siga_activosDto->getId_Departamento()."'";
if(($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNum_Empleado()!=""){
$sql.="'".$siga_activosDto->getNum_Empleado()."'";
if(($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNombre_Completo()!=""){
$sql.="'".$siga_activosDto->getNombre_Completo()."'";
if(($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
//if($siga_activosDto->getFech_Inser()!=""){
$sql.="getDate()";
if(($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
//}
if($siga_activosDto->getUsr_Inser()!=""){
$sql.="'".$siga_activosDto->getUsr_Inser()."'";
if(($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getFech_Mod()!=""){
$sql.="'".$siga_activosDto->getFech_Mod()."'";
if(($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getUsr_Mod()!=""){
$sql.="'".$siga_activosDto->getUsr_Mod()."'";
if(($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="")||($siga_activosDto->getId_Clase()!="") ||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getEstatus_Reg()!=""){
$sql.="'".$siga_activosDto->getEstatus_Reg()."'";
if(($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getFoto()!=""){
$sql.="'".$siga_activosDto->getFoto()."'";
if(($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Clase()!=""){
$sql.="'".$siga_activosDto->getId_Clase()."'";
if(($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Clasificacion()!=""){
$sql.="'".$siga_activosDto->getId_Clasificacion()."'";
if(($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Propiedad()!=""){
$sql.="'".$siga_activosDto->getId_Propiedad()."'";
if(($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Tipo_Activo()!=""){
$sql.="'".$siga_activosDto->getId_Tipo_Activo()."'";
if(($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getDescCorta()!=""){
$sql.="'".$siga_activosDto->getDescCorta()."'";
if(($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getDescLarga()!=""){
$sql.="'".$siga_activosDto->getDescLarga()."'";
if(($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Ubic_Prim()!=""){
$sql.="'".$siga_activosDto->getId_Ubic_Prim()."'";
if(($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Ubic_Sec()!=""){
$sql.="'".$siga_activosDto->getId_Ubic_Sec()."'";
if(($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Situacion_Activo()!=""){
$sql.="'".$siga_activosDto->getId_Situacion_Activo()."'";
if(($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Motivo_Alta()!=""){
$sql.="'".$siga_activosDto->getId_Motivo_Alta()."'";
if(($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Familia()!=""){
$sql.="'".$siga_activosDto->getId_Familia()."'";
if(($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Subfamilia()!=""){
$sql.="'".$siga_activosDto->getId_Subfamilia()."'";
if(($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getMarca()!=""){
$sql.="'".$siga_activosDto->getMarca()."'";
if(($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getModelo()!=""){
$sql.="'".$siga_activosDto->getModelo()."'";
if(($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNumSerie()!=""){
$sql.="'".$siga_activosDto->getNumSerie()."'";
if(($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_ActivoPadre()!=""){
$sql.="'".$siga_activosDto->getId_ActivoPadre()."'";
if(($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNumActivoAnterior()!=""){
$sql.="'".$siga_activosDto->getNumActivoAnterior()."'";
if(($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getParticipaPre()!=""){
$sql.="'".$siga_activosDto->getParticipaPre()."'";
if(($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getParticipaSeguros()!=""){
$sql.="'".$siga_activosDto->getParticipaSeguros()."'";
if(($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getImporteSeguros()!=""){
$sql.="'".$siga_activosDto->getImporteSeguros()."'";
if(($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getParticipaCertificacion()!=""){
$sql.="'".$siga_activosDto->getParticipaCertificacion()."'";
if(($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getGarantia()!=""){
$sql.="'".$siga_activosDto->getGarantia()."'";
if(($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getExtGarantia()!=""){
$sql.="'".$siga_activosDto->getExtGarantia()."'";
if(($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getAnexo()!=""){
$sql.="'".$siga_activosDto->getAnexo()."'";
}

if($siga_activosDto->getEspecifica()!=""){
$sql.=",'".$siga_activosDto->getEspecifica()."'";
}
//agrego 3 campos a values alex arias 25/04/24
if($siga_activosDto->getsiga_cmb_condicion_recepcion()!=""){
	$sql.=",'".$siga_activosDto->getsiga_cmb_condicion_recepcion()."'";
	}
if($siga_activosDto->getsiga_activo_alta_fch_recepcion()!=""){
	$sql.=",'".$siga_activosDto->getsiga_activo_alta_fch_recepcion()."'";
	}
if($siga_activosDto->getsiga_activo_alta_fch_operacion()!=""){
	$sql.=",'".$siga_activosDto->getsiga_activo_alta_fch_operacion()."'";
	}
//agrego 3 campos a values alex arias 25/04/24
$sql.=")";

//echo $sql;

$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_activosDTO();
$tmp->setId_Activo($this->_proveedor->lastID());
$tmp = $this->selectSiga_activos($tmp,"",$this->_proveedor);
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
public function updateSiga_activos($siga_activosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_activos SET ";
/*if($siga_activosDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_activosDto->getId_Activo()."'";
if(($siga_activosDto->getAF_BC()!="") ||($siga_activosDto->getNombre_Activo()!="") ||($siga_activosDto->getId_Tipo_Vale_Resg()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}*/
if($siga_activosDto->getAF_BC()!=""){
$sql.="AF_BC='".$siga_activosDto->getAF_BC()."'";
if(($siga_activosDto->getNombre_Activo()!="") ||($siga_activosDto->getId_Tipo_Vale_Resg()!="")||($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNombre_Activo()!=""){
$sql.="Nombre_Activo='".$siga_activosDto->getNombre_Activo()."'";
if(($siga_activosDto->getId_Tipo_Vale_Resg()!="") || ($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Tipo_Vale_Resg()!=""){
$sql.="Id_Tipo_Vale_Resg='".$siga_activosDto->getId_Tipo_Vale_Resg()."'";
if(($siga_activosDto->getMant_Prevent()!="") || ($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getMant_Prevent()!=""){
$sql.="Mant_Prevent='".$siga_activosDto->getMant_Prevent()."'";
if(($siga_activosDto->getMant_Prevent()!="") || ($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_activosDto->getId_Area()."'";
if(($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Departamento()!=""){
$sql.="Id_Departamento='".$siga_activosDto->getId_Departamento()."'";
if(($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNum_Empleado()!=""){
$sql.="Num_Empleado='".$siga_activosDto->getNum_Empleado()."'";
if(($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNombre_Completo()!=""){
$sql.="Nombre_Completo='".$siga_activosDto->getNombre_Completo()."'";
if(($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="")||($siga_activosDto->getId_Clase()!="") ||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_activosDto->getFech_Inser()."'";
if(($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_activosDto->getUsr_Inser()."'";
if(($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="")||($siga_activosDto->getId_Clase()!="") ||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_activosDto->getFech_Mod()."'";
if(($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_activosDto->getUsr_Mod()."'";
if(($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_activosDto->getEstatus_Reg()."'";
if(($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getFoto()!=""){
$sql.="Foto='".$siga_activosDto->getFoto()."'";
if(($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Clase()!=""){
$sql.="Id_Clase='".$siga_activosDto->getId_Clase()."'";
if(($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Clasificacion()!=""){
$sql.="Id_Clasificacion='".$siga_activosDto->getId_Clasificacion()."'";
if(($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Propiedad()!=""){
$sql.="Id_Propiedad='".$siga_activosDto->getId_Propiedad()."'";
if(($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Tipo_Activo()!=""){
$sql.="Id_Tipo_Activo='".$siga_activosDto->getId_Tipo_Activo()."'";
if(($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getDescCorta()!=""){
$sql.="DescCorta='".$siga_activosDto->getDescCorta()."'";
if(($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getDescLarga()!=""){
$sql.="DescLarga='".$siga_activosDto->getDescLarga()."'";
if(($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_activosDto->getId_Ubic_Prim()."'";
if(($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}

if($siga_activosDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec='".$siga_activosDto->getId_Ubic_Sec()."'";
if(($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}

if($siga_activosDto->getId_Situacion_Activo()!=""){
$sql.="Id_Situacion_Activo='".$siga_activosDto->getId_Situacion_Activo()."'";
if(($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}

if($siga_activosDto->getId_Motivo_Alta()!=""){
$sql.="Id_Motivo_Alta='".$siga_activosDto->getId_Motivo_Alta()."'";
if(($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Familia()!=""){
$sql.="Id_Familia='".$siga_activosDto->getId_Familia()."'";
if(($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_Subfamilia()!=""){
$sql.="Id_Subfamilia='".$siga_activosDto->getId_Subfamilia()."'";
if(($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getMarca()!=""){
$sql.="Marca='".$siga_activosDto->getMarca()."'";
if(($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getModelo()!=""){
$sql.="Modelo='".$siga_activosDto->getModelo()."'";
if(($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNumSerie()!=""){
$sql.="NumSerie='".$siga_activosDto->getNumSerie()."'";
if(($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getId_ActivoPadre()!=""){
$sql.="Id_ActivoPadre='".$siga_activosDto->getId_ActivoPadre()."'";
if(($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getNumActivoAnterior()!=""){
$sql.="NumActivoAnterior='".$siga_activosDto->getNumActivoAnterior()."'";
if(($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getParticipaPre()!=""){
$sql.="ParticipaPre='".$siga_activosDto->getParticipaPre()."'";
if(($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getParticipaSeguros()!=""){
$sql.="ParticipaSeguros='".$siga_activosDto->getParticipaSeguros()."'";
if(($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getImporteSeguros()!=""){
$sql.="ImporteSeguros='".$siga_activosDto->getImporteSeguros()."'";
if(($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getParticipaCertificacion()!=""){
$sql.="ParticipaCertificacion='".$siga_activosDto->getParticipaCertificacion()."'";
if(($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getGarantia()!=""){
$sql.="Garantia='".$siga_activosDto->getGarantia()."'";
if(($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}
if($siga_activosDto->getExtGarantia()!=""){
$sql.="ExtGarantia='".$siga_activosDto->getExtGarantia()."'";

if(($siga_activosDto->getAnexo()!="") ){
$sql.=",";
}
}

if($siga_activosDto->getAnexo()!=""){
$sql.="Anexo='".$siga_activosDto->getAnexo()."'";
}

if($siga_activosDto->getEspecifica()!=""){
$sql.=",Especifica='".$siga_activosDto->getEspecifica()."'";
}
//-----------------------------------------------------------------------------------------------------------

if($siga_activosDto->getsiga_cmb_condicion_recepcion()!=""){
	$sql.=",siga_activos_condicion_recepcion='".$siga_activosDto->getsiga_cmb_condicion_recepcion()."'";
}

if($siga_activosDto->getsiga_activo_alta_fch_recepcion()!=""){
	$sql.=",siga_activos_fch_recepcion_equipo='".$siga_activosDto->getsiga_activo_alta_fch_recepcion()."'";
}

if($siga_activosDto->getsiga_activo_alta_fch_operacion()!=""){
	$sql.=",siga_activos_fch_operacion='".$siga_activosDto->getsiga_activo_alta_fch_operacion()."'";
}

//-----------------------------------------------------------------------------------------------------------
$sql.=" WHERE Id_Activo='".$siga_activosDto->getId_Activo()."'";
//echo $sql;
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_activosDTO();
$tmp->setId_Activo($siga_activosDto->getId_Activo());
$tmp = $this->selectSiga_activos($tmp,"",$this->_proveedor);
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
public function deleteSiga_activos($siga_activosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_activos  WHERE Id_Activo='".$siga_activosDto->getId_Activo()."'";
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

public function selectSiga_activos($siga_activosDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT CASE when rtrim(ltrim(Foto)) IS NULL then '' else Foto end as Foto,
Id_Activo,AF_BC,Nombre_Activo,Id_Tipo_Vale_Resg,Id_Area,Id_Departamento,CONVERT(varchar(10), num_empleado) as Num_Empleado,
Nombre_Completo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg,Id_Clase,Id_Clasificacion,
Id_Propiedad,Id_Tipo_Activo,DescCorta,DescLarga,Id_Ubic_Prim,Id_Ubic_Sec,
Id_Situacion_Activo,Id_Motivo_Alta,Id_Familia,Id_Subfamilia,Marca,Modelo,NumSerie,
Id_ActivoPadre,NumActivoAnterior,ParticipaPre,ParticipaSeguros,ImporteSeguros,ParticipaCertificacion,Garantia,ExtGarantia,Anexo,Especifica,Mant_Prevent,
siga_activos_fch_recepcion_equipo,siga_activos_fch_operacion,siga_activos_condicion_recepcion,
(select Desc_Ubic_Prim from siga_cat_ubic_prim where Id_Ubic_Prim=siga_activos.Id_Ubic_Prim) Desc_Ubic_Prim,
(select Desc_Ubic_Sec from siga_cat_ubic_sec where Id_Ubic_Sec=siga_activos.Id_Ubic_Sec) Desc_Ubic_Sec,
(select DepreciacionPeriodo from spLineaRectaFn(AF_BC,1) where Anio=year(getDate())) DepreciacionPeriodo,
(select DepreciacionAcumuladaFin from spLineaRectaFn(AF_BC,1) where Anio=year(getDate())) DepreciacionAcumulada,
(select DepreciacionPeriodo from spLineaRectaFn(AF_BC,2) where Anio=year(getDate())) DepreciacionPeriodoMixta,
(select DepreciacionAcumuladaFin from spLineaRectaFn(AF_BC,2) where Anio=year(getDate())) DepreciacionAcumuladaMixta,
(select DepreciacionPeriodo from spFiscalFn(AF_BC) where Anio=year(getDate())) DepreciacionPeriodoFiscal,
(select DepreciacionFiscal from spFiscalFn(AF_BC) where Anio=year(getDate())) DepreciacionFiscal,
(select DepreciacionPeriodo from spFiscalD4Fn(AF_BC,'') where Anio=year(getDate())) DepreciacionPeriodoFiscalD4,
(select DepreciacionFiscal from spFiscalD4Fn(AF_BC,'') where Anio=year(getDate())) DepreciacionFiscalD4,
(select DepreciacionPeriodo from spFiscalD4Fn(AF_BC,'B10') where Anio=year(getDate())) DepreciacionPeriodoFiscalB10,
(select DepreciacionFiscal from spFiscalD4Fn(AF_BC,'B10') where Anio=year(getDate())) DepreciacionFiscalB10
FROM siga_activos ";
if(($siga_activosDto->getId_Activo()!="") ||($siga_activosDto->getAF_BC()!="") ||($siga_activosDto->getNombre_Activo()!="") ||($siga_activosDto->getId_Tipo_Vale_Resg()!="")||($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" WHERE ";
}
if($siga_activosDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_activosDto->getId_Activo()."'";
if(($siga_activosDto->getAF_BC()!="") ||($siga_activosDto->getNombre_Activo()!="") ||($siga_activosDto->getId_Tipo_Vale_Resg()!="") ||($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="")||($siga_activosDto->getId_Clase()!="") ||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getAF_BC()!=""){
$sql.="AF_BC='".$siga_activosDto->getAF_BC()."'";
if(($siga_activosDto->getNombre_Activo()!="") ||($siga_activosDto->getId_Tipo_Vale_Resg()!="") ||($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getNombre_Activo()!=""){
$sql.="Nombre_Activo='".$siga_activosDto->getNombre_Activo()."'";
if(($siga_activosDto->getId_Tipo_Vale_Resg()!="") ||($siga_activosDto->getMant_Prevent()!="") ||($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Tipo_Vale_Resg()!=""){
$sql.="Id_Tipo_Vale_Resg='".$siga_activosDto->getId_Tipo_Vale_Resg()."'";
if(($siga_activosDto->getMant_Prevent()!="") || ($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getMant_Prevent()!=""){
$sql.="Mant_Prevent='".$siga_activosDto->getMant_Prevent()."'";
if(($siga_activosDto->getId_Area()!="") ||($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_activosDto->getId_Area()."'";
if(($siga_activosDto->getId_Departamento()!="") ||($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="")||($siga_activosDto->getId_Clase()!="") ||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Departamento()!=""){
$sql.="Id_Departamento='".$siga_activosDto->getId_Departamento()."'";
if(($siga_activosDto->getNum_Empleado()!="") ||($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getNum_Empleado()!=""){
$sql.="Num_Empleado='".$siga_activosDto->getNum_Empleado()."'";
if(($siga_activosDto->getNombre_Completo()!="") ||($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getNombre_Completo()!=""){
$sql.="Nombre_Completo='".$siga_activosDto->getNombre_Completo()."'";
if(($siga_activosDto->getFech_Inser()!="") ||($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_activosDto->getFech_Inser()."'";
if(($siga_activosDto->getUsr_Inser()!="") ||($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_activosDto->getUsr_Inser()."'";
if(($siga_activosDto->getFech_Mod()!="") ||($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_activosDto->getFech_Mod()."'";
if(($siga_activosDto->getUsr_Mod()!="") ||($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_activosDto->getUsr_Mod()."'";
if(($siga_activosDto->getEstatus_Reg()!="") ||($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="") ||($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <>'3'";
if(($siga_activosDto->getFoto()!="") ||($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getFoto()!=""){
$sql.="Foto='".$siga_activosDto->getFoto()."'";
if(($siga_activosDto->getId_Clase()!="")||($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}

if($siga_activosDto->getId_Clase()!=""){
$sql.="Id_Clase='".$siga_activosDto->getId_Clase()."'";
if(($siga_activosDto->getId_Clasificacion()!="") ||($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Clasificacion()!=""){
$sql.="Id_Clasificacion='".$siga_activosDto->getId_Clasificacion()."'";
if(($siga_activosDto->getId_Propiedad()!="") ||($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Propiedad()!=""){
$sql.="Id_Propiedad='".$siga_activosDto->getId_Propiedad()."'";
if(($siga_activosDto->getId_Tipo_Activo()!="") ||($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Tipo_Activo()!=""){
$sql.="Id_Tipo_Activo='".$siga_activosDto->getId_Tipo_Activo()."'";
if(($siga_activosDto->getDescCorta()!="") ||($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getDescCorta()!=""){
$sql.="DescCorta='".$siga_activosDto->getDescCorta()."'";
if(($siga_activosDto->getDescLarga()!="") ||($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getDescLarga()!=""){
$sql.="DescLarga='".$siga_activosDto->getDescLarga()."'";
if(($siga_activosDto->getId_Ubic_Prim()!="") ||($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_activosDto->getId_Ubic_Prim()."'";
if(($siga_activosDto->getId_Ubic_Sec()!="")||($siga_activosDto->getId_Situacion_Activo()!="") ||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec='".$siga_activosDto->getId_Ubic_Sec()."'";
if(($siga_activosDto->getId_Situacion_Activo()!="")||($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Situacion_Activo()!=""){
$sql.="Id_Situacion_Activo='".$siga_activosDto->getId_Situacion_Activo()."'";
if(($siga_activosDto->getId_Motivo_Alta()!="") ||($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Motivo_Alta()!=""){
$sql.="Id_Motivo_Alta='".$siga_activosDto->getId_Motivo_Alta()."'";
if(($siga_activosDto->getId_Familia()!="") ||($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Familia()!=""){
$sql.="Id_Familia='".$siga_activosDto->getId_Familia()."'";
if(($siga_activosDto->getId_Subfamilia()!="") ||($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_Subfamilia()!=""){
$sql.="Id_Subfamilia='".$siga_activosDto->getId_Subfamilia()."'";
if(($siga_activosDto->getMarca()!="") ||($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getMarca()!=""){
$sql.="Marca='".$siga_activosDto->getMarca()."'";
if(($siga_activosDto->getModelo()!="") ||($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getModelo()!=""){
$sql.="Modelo='".$siga_activosDto->getModelo()."'";
if(($siga_activosDto->getNumSerie()!="") ||($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getNumSerie()!=""){
$sql.="NumSerie='".$siga_activosDto->getNumSerie()."'";
if(($siga_activosDto->getId_ActivoPadre()!="") ||($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getId_ActivoPadre()!=""){
$sql.="Id_ActivoPadre='".$siga_activosDto->getId_ActivoPadre()."'";
if(($siga_activosDto->getNumActivoAnterior()!="") ||($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getNumActivoAnterior()!=""){
$sql.="NumActivoAnterior='".$siga_activosDto->getNumActivoAnterior()."'";
if(($siga_activosDto->getParticipaPre()!="") ||($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getParticipaPre()!=""){
$sql.="ParticipaPre='".$siga_activosDto->getParticipaPre()."'";
if(($siga_activosDto->getParticipaSeguros()!="") ||($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getParticipaSeguros()!=""){
$sql.="ParticipaSeguros='".$siga_activosDto->getParticipaSeguros()."'";
if(($siga_activosDto->getImporteSeguros()!="") ||($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getImporteSeguros()!=""){
$sql.="ImporteSeguros='".$siga_activosDto->getImporteSeguros()."'";
if(($siga_activosDto->getParticipaCertificacion()!="") ||($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getParticipaCertificacion()!=""){
$sql.="ParticipaCertificacion='".$siga_activosDto->getParticipaCertificacion()."'";
if(($siga_activosDto->getGarantia()!="") ||($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getGarantia()!=""){
$sql.="Garantia='".$siga_activosDto->getGarantia()."'";
if(($siga_activosDto->getExtGarantia()!="") ||($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getExtGarantia()!=""){
$sql.="ExtGarantia='".$siga_activosDto->getExtGarantia()."'";
if(($siga_activosDto->getAnexo()!="") ){
$sql.=" AND ";
}
}
if($siga_activosDto->getAnexo()!=""){
$sql.="Anexo='".$siga_activosDto->getAnexo()."'";
}

if($siga_activosDto->getEspecifica()!=""){
$sql.=" AND Especifica='".$siga_activosDto->getEspecifica()."'";
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
$tmp[$contador] = new Siga_activosDTO();
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
$tmp[$contador]->setAF_BC(rtrim(ltrim($row["AF_BC"])));
$tmp[$contador]->setNombre_Activo(rtrim(ltrim($row["Nombre_Activo"])));
$tmp[$contador]->setId_Tipo_Vale_Resg(rtrim(ltrim($row["Id_Tipo_Vale_Resg"])));
$tmp[$contador]->setMant_Prevent(rtrim(ltrim($row["Mant_Prevent"])));
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setId_Departamento($row["Id_Departamento"]);
$tmp[$contador]->setNum_Empleado(rtrim(ltrim($row["Num_Empleado"])));
$tmp[$contador]->setNombre_Completo(rtrim(ltrim($row["Nombre_Completo"])));
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser(rtrim(ltrim($row["Usr_Inser"])));
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setFoto(rtrim(ltrim(($row["Foto"]))));
$tmp[$contador]->setId_Clase($row["Id_Clase"]);
$tmp[$contador]->setId_Clasificacion($row["Id_Clasificacion"]);
$tmp[$contador]->setId_Propiedad($row["Id_Propiedad"]);
$tmp[$contador]->setId_Tipo_Activo($row["Id_Tipo_Activo"]);
$tmp[$contador]->setDescCorta(rtrim(ltrim($row["DescCorta"])));
$tmp[$contador]->setDescLarga(rtrim(ltrim($row["DescLarga"])));
$tmp[$contador]->setId_Ubic_Prim($row["Id_Ubic_Prim"]);
$tmp[$contador]->setId_Ubic_Sec($row["Id_Ubic_Sec"]);
$tmp[$contador]->setId_Situacion_Activo($row["Id_Situacion_Activo"]);
$tmp[$contador]->setId_Motivo_Alta($row["Id_Motivo_Alta"]);
$tmp[$contador]->setId_Familia($row["Id_Familia"]);
$tmp[$contador]->setId_Subfamilia($row["Id_Subfamilia"]);
$tmp[$contador]->setMarca(rtrim(ltrim($row["Marca"])));
$tmp[$contador]->setModelo(rtrim(ltrim($row["Modelo"])));
$tmp[$contador]->setNumSerie(rtrim(ltrim($row["NumSerie"])));
$tmp[$contador]->setId_ActivoPadre($row["Id_ActivoPadre"]);
$tmp[$contador]->setNumActivoAnterior(rtrim(ltrim($row["NumActivoAnterior"])));
$tmp[$contador]->setParticipaPre(rtrim(ltrim($row["ParticipaPre"])));
$tmp[$contador]->setParticipaSeguros(rtrim(ltrim($row["ParticipaSeguros"])));
$tmp[$contador]->setImporteSeguros(rtrim(ltrim($row["ImporteSeguros"])));
$tmp[$contador]->setParticipaCertificacion($row["ParticipaCertificacion"]);
$tmp[$contador]->setGarantia(rtrim(ltrim($row["Garantia"])));
$tmp[$contador]->setExtGarantia(rtrim(ltrim($row["ExtGarantia"])));
$tmp[$contador]->setAnexo(rtrim(ltrim($row["Anexo"])));
$tmp[$contador]->setEspecifica(rtrim(ltrim($row["Especifica"])));
$tmp[$contador]->setDepreciacion(rtrim(ltrim($row["DepreciacionPeriodo"])));
$tmp[$contador]->setDepreciacionAcumulada(rtrim(ltrim($row["DepreciacionAcumulada"])));
$tmp[$contador]->setDepreciacionPeriodoFiscal(rtrim(ltrim($row["DepreciacionPeriodoFiscal"])));
$tmp[$contador]->setDepreciacionFiscal(rtrim(ltrim($row["DepreciacionFiscal"])));
$tmp[$contador]->setDepreciacionMixta(rtrim(ltrim($row["DepreciacionPeriodoMixta"])));
$tmp[$contador]->setDepreciacionAcumuladaMixta(rtrim(ltrim($row["DepreciacionAcumuladaMixta"])));
$tmp[$contador]->setDepreciacionPeriodoFiscalD4(rtrim(ltrim($row["DepreciacionPeriodoFiscalD4"])));
$tmp[$contador]->setDepreciacionFiscalD4(rtrim(ltrim($row["DepreciacionFiscalD4"])));
$tmp[$contador]->setDepreciacionPeriodoFiscalB10(rtrim(ltrim($row["DepreciacionPeriodoFiscalB10"])));
$tmp[$contador]->setDepreciacionFiscalB10(rtrim(ltrim($row["DepreciacionFiscalB10"])));
$tmp[$contador]->setDesc_Ubic_Prim(rtrim(ltrim($row["Desc_Ubic_Prim"])));
$tmp[$contador]->setDesc_Ubic_Sec(rtrim(ltrim($row["Desc_Ubic_Sec"])));

$tmp[$contador]->setsiga_cmb_condicion_recepcion(rtrim(ltrim($row["siga_activos_condicion_recepcion"])));
$tmp[$contador]->setsiga_activo_alta_fch_recepcion(rtrim(ltrim($row["siga_activos_fch_recepcion_equipo"])));
$tmp[$contador]->setsiga_activo_alta_fch_operacion(rtrim(ltrim($row["siga_activos_fch_operacion"])));


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

	// <summary>
	// Obtiene la información del Inventario que se encuentra en Operación. Obtiene solo los activos que no han tenido actividad en la tabla "Siga_baja_activo"
	// </summary>
	public function llenarDataTable($draw,$columns,$order,$start,$length,$search,$orden,$siga_activosDto,$estatus,$perfil, $Fech_Inicial, $Fech_Final, $Tab, $Filtro_AF_BC_Activos, $Filtro_Nombre_Activos, $Filtro_Clasific_Activos, $Filtro_Marca_Activos, $Filtro_Modelo_Activos, $Filtro_NumSerie_Activos, $Filtro_Propiedad_Activos, $Filtro_Usr_Responsable_Activos, $Filtro_UPrimaria_Activos, $Filtro_USecundaria_Activos, $Filtro_Estatus_Activos, $Filtro_Importe_Seguro_Activos, $Filtro_Monto_Factura_Activos, $Filtro_Fecha_Alta_Activos, $Filtro_Fecha_Reubicacion_Activos, $Filtro_Descripcion_Activos, $Filtro_Filtro_UPrimariaOrigen_Activos = null, $Filtro_Filtro_USecundariaOrigen_Activos = null, $Filtro_Tipo_Activo_Activos = null, $Filtro_Fecha_Baja_Usr_Solicitante_Activos = null, $Filtro_Fecha_Baja_Usr_DirFinanciera_Activos = null, $Filtro_Fecha_Baja_Usr_Contabilidad_Activos = null, $Filtro_Estatus_Workflow_Activos = null, $Filtro_UbicacionEspecifica_Activos = null, $Filtro_Motivo_Baja_Activos = null, $proveedor = null) {
		$clase_biomedica = "";
		if($perfil == 68) { $clase_biomedica=" and S.Id_Clase=17 "; }
	
		$FechInicio = "";
		if($Fech_Inicial!="") {
			$FechInicio=$Fech_Inicial[6].$Fech_Inicial[7].$Fech_Inicial[8].$Fech_Inicial[9]."-".$Fech_Inicial[3].$Fech_Inicial[4]."-".$Fech_Inicial[0].$Fech_Inicial[1];
		}
	
		$FechFin="";
		if($Fech_Final!="") {
			$FechFin=$Fech_Final[6].$Fech_Final[7].$Fech_Final[8].$Fech_Final[9]."-".$Fech_Final[3].$Fech_Final[4]."-".$Fech_Final[0].$Fech_Final[1];
		}
	
		$Filtros_Fech_Baja="";
		$Campo="";
		if($estatus == "baja" || $estatus == "baja2" || $estatus == "baja3") {
			if($estatus=="baja"){$Campo="fecha_baja_usr_solicitante";}
			if($estatus=="baja2"){$Campo="fecha_baja_dir_financiera";}
			if($estatus=="baja3"){$Campo="fecha_baja_usr_contabilidad";}

			if($FechInicio!=""&&$FechFin!="") {
				$Filtros_Fech_Baja = " where ".$Campo." between convert(date,'".$FechInicio."') and convert(date,'".$FechFin."') ";
			}
			else {
				if($FechInicio!=""&&$FechFin=="") {
					$Filtros_Fech_Baja = " where ".$Campo." = convert(date,'".$FechInicio."')  ";
				}
				else {
					if($FechInicio==""&&$FechFin!=""){
						$Filtros_Fech_Baja = " where ".$Campo." = convert(date,'".$FechFin."')  ";
					}
				}
			}
		}
		
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
								
				if($value["data"]!='Id_Activo' AND $value["data"]!='Area'   AND $value["data"]!='function' )
				$criterios.=' ' . $value["data"] . " LIKE '%" . $search["value"] . "%'" . ' OR';
			}
			$criterios = $criterios != "" ? ('WHERE (' . substr($criterios, 0, -2) . ')') : '';
		}
		
		$ordenamiento='';
		if ($order != ''AND count($order)> 0 ) {
			$order=$order[0];
						$aux=$columns[$order["column"]];
					
					if($aux["data"] !="function") {
						$ordenamiento=' ORDER BY '.$aux["data"].' '.$order["dir"];
					}
					
					//Alta
					if($estatus=="soloactivos"){
						if($order["column"]==4){
							$ordenamiento=' ORDER BY Foto '.$order["dir"];
						}
						
						//if($order["column"]==5){
						//	$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_usr_solicitante, 103) '.$order["dir"];
						//}
						//
						//if($order["column"]==6){
						//	$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_dir_financiera, 103) '.$order["dir"];
						//}
						//
						//if($order["column"]==7){
						//	$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_usr_contabilidad, 103) '.$order["dir"];
						//}
						
						if($order["column"]==16){//Monto Activo
							$ordenamiento=' ORDER BY MontoF '.$order["dir"];
						}
						
						if($order["column"]==17){//Importe Seguros
							$ordenamiento=' ORDER BY ImporteSeguros '.$order["dir"];
						}
					}
					
					//Proceso de baja
					if($estatus=="baja"){
						if($order["column"]==3){
							$ordenamiento=' ORDER BY Foto '.$order["dir"];
						}
						
						if($order["column"]==22){//Monto Activo
							$ordenamiento=' ORDER BY MontoF '.$order["dir"];
						}
					}
					
					//Baja Definitiva
					if($estatus=="baja3"){
						if($order["column"]==3){
							$ordenamiento=' ORDER BY Foto '.$order["dir"];
						}
						
						if($order["column"]==5){
							$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_usr_solicitante, 103) '.$order["dir"];
						}
						
						if($order["column"]==6){
							$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_dir_financiera, 103) '.$order["dir"];
						}
						
						if($order["column"]==7){
							$ordenamiento=' ORDER BY CONVERT (date, fecha_baja_usr_contabilidad, 103) '.$order["dir"];
						}
						
						if($order["column"]==22){//Monto Activo
							$ordenamiento=' ORDER BY MontoF '.$order["dir"];
						}
					}
					
					//Reubicación
					if($estatus=="reubicacion"){
						if($order["column"]==4){
							$ordenamiento=' ORDER BY Foto '.$order["dir"];
						}
						
						if($order["column"]==18){//Monto Activo
							$ordenamiento=' ORDER BY MontoF '.$order["dir"];
						}
					}
					
        }
				if($ordenamiento==""){
					$ordenamiento=' ORDER BY Fech_Inser desc ';
				}
        $pagina='';
        if($start!='' AND $length!=''){
            $pagina='  OFFSET '.$start.' ROWS FETCH NEXT '.$length.' ROWS ONLY ';
        }
		
		if($Filtros_Fech_Baja!=""){
			if($criterios!=""){
				$criterios=str_replace("WHERE"," and ",$criterios);
			}
		}
		/*
		echo " SELECT S.Id_Activo,S.AF_BC,S.Foto,S.Nombre_Activo,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,
		(select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,
		(select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad=S.Id_Propiedad) as Propiedad,
		(select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,
		(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,
		(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria
		FROM siga_activos S where 0=0 "
                . "".$criterios.$ordenamiento.$pagina;*/
				
		$baja="";
		$baja_reubicacion="";
		if($Tab == "0") {
			// ACTIVOS QUE ESTAN EN PROCESO DE BAJA
			$baja_reubicacion=" ,SB.Id_Baja as Id_Baja_Reubicacion ";
			//$baja=" right join siga_baja_activo SB on S.Id_Activo = SB.Id_Activo and SB.EstatusBaja = 0 and Estatus_Cancelacion = 0 ";
			$baja=" right join siga_baja_activo SB on S.Id_Activo = SB.Id_Activo ";
			// Se consideran los Activos que está en proceso de baja. Para ello se debe tomar en cuenta el último registro de la actividad en la tabla de bajas ya que es un histórico 
			// y no se deberán considerar los registros previos siendo que ya hay un nuevo registro que los anula. En caso de que sea en la misma fecha, se toma también el último registro más reciente por Id.
			$baja .= " INNER JOIN
						(
							/*-- https://stackoverflow.com/questions/28722276/sql-select-top-1-for-each-group/28727802 --*/
							SELECT TOP 1 WITH TIES
								Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
							FROM siga_baja_activo
							ORDER BY
								ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
						) B_2
					ON SB.Fecha_Baja = B_2.UltimoRegistro
					AND SB.Id_Activo = B_2.Id_Activo
					AND SB.Id_baja = B_2.UltimoMovimiento ";
			$baja .= " AND SB.EstatusBaja = 0 AND SB.Estatus_Cancelacion = 0 ";
		}
		
		if($Tab == "1") {
			// ACTIVOS DADOS DE BAJA DEFINITIVA
			$baja_reubicacion=" ,SB.Id_Baja as Id_Baja_Reubicacion ";
			//$baja=" right join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo and SB.EstatusBaja = 1 and Estatus_Cancelacion <> 1 ";
			$baja = " right join siga_baja_activo SB on S.Id_Activo=SB.Id_Activo ";
			// Se consideran los Activos que fueron dados de baja definitivamente. Para ello se debe tomar en cuenta el último registro de la actividad en la tabla de bajas ya que es un histórico 
			// y no se deberán considerar los registros previos siendo que ya hay un nuevo registro que los anula. En caso de que sea en la misma fecha, se toma también el último registro más reciente por Id.
			$baja .= " INNER JOIN
						(
							/*-- https://stackoverflow.com/questions/28722276/sql-select-top-1-for-each-group/28727802 --*/
							SELECT TOP 1 WITH TIES
								Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
							FROM siga_baja_activo
							ORDER BY
								ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
						) B_2
					ON SB.Fecha_Baja = B_2.UltimoRegistro
					AND SB.Id_Activo = B_2.Id_Activo
					AND SB.Id_baja = B_2.UltimoMovimiento ";
			$baja .= " AND SB.EstatusBaja = 1 AND SB.Estatus_Cancelacion = 0 ";
		}
		
		$reubicacion="";
		if($estatus=="reubicacion") {
			$baja_reubicacion=" ,SR.Id_Activo_Reubicacion as Id_Baja_Reubicacion ";
			$reubicacion=" right join siga_reubicacion_activo SR on S.Id_Activo=SR.Id_Activo ";
		}
		
		$EstatusReg = "";
		if($estatus != "baja" && $estatus != "baja2" && $estatus != "baja3" && $estatus != "reubicacion") {
			$baja_reubicacion = " , S.Id_Activo as Id_Baja_Reubicacion ";
			$EstatusReg = " AND S.Estatus_Reg <> '3' ";
		}
		
		$soloactivos = "";
		if($estatus == "soloactivos") {
			// Activos que no han tenido cambios desde que se dieron de baja
			// También se consideran los Activos que fueron dados de baja o siguieron un proceso pero volvieron a estar en Operación y para ello se considera el último registro en la tabla de bajas en caso de que exista
			$soloactivos = " AND (
					S.Id_Activo not in (select Id_Activo from siga_baja_activo /*where Estatus_Cancelacion<>1*/)
					OR
					S.Id_Activo IN (
						SELECT B_1.Id_Activo
						FROM siga_baja_activo B_1
						INNER JOIN 
							(
								/*-- https://stackoverflow.com/questions/28722276/sql-select-top-1-for-each-group/28727802 --*/
								SELECT TOP 1 WITH TIES
									Id_Activo, Fecha_Baja AS UltimoRegistro, Id_baja AS UltimoMovimiento
								FROM siga_baja_activo
								ORDER BY
									ROW_NUMBER() OVER(PARTITION BY Id_Activo ORDER BY Fecha_Baja DESC, Id_baja DESC)
							) B_2
						ON B_1.Fecha_Baja = B_2.UltimoRegistro
						AND B_1.Id_Activo = B_2.Id_Activo
						AND B_1.Id_Baja = B_2.UltimoMovimiento
						WHERE
						/*-- Cancelados y que siguen en operación --*/
						B_1.Estatus_Cancelacion = 1 AND B_1.EstatusBaja = 0
					)
				)";
		}


		// FILTROS DE SELECCION DE COLUMNAS
		if($Filtro_AF_BC_Activos != null) {
			$soloactivos .= " AND RTRIM(LTRIM(S.AF_BC)) IN (" . $Filtro_AF_BC_Activos . ") ";
		}
		if($Filtro_Nombre_Activos != "") {
			$soloactivos .= " AND RTRIM(LTRIM(S.Nombre_Activo)) IN (" . $Filtro_Nombre_Activos . ") ";
		}
		if($Filtro_Clasific_Activos != "") {
			//$soloactivos .= " AND (select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) IN(" . $Filtro_Clasific_Activos . ") ";
			$soloactivos .= " AND (SELECT C.Id_Clasificacion from siga_cat_clasificacion C where Id_Clasificacion=S.Id_Clasificacion) IN(" . $Filtro_Clasific_Activos . ") ";
		}
		if($Filtro_Marca_Activos != null) {
			$soloactivos .= " AND RTRIM(LTRIM(S.Marca)) IN (" . $Filtro_Marca_Activos . ") ";
		}
		if($Filtro_Modelo_Activos != null) {
			$soloactivos .= " AND RTRIM(LTRIM(S.Modelo)) IN (". $Filtro_Modelo_Activos .") ";
		}
		if($Filtro_NumSerie_Activos != null) {
			$soloactivos .= " AND RTRIM(LTRIM(S.NumSerie)) IN (". $Filtro_NumSerie_Activos .") ";
		}
		
		if($Filtro_Propiedad_Activos != null) {
			$soloactivos .= " AND S.Id_Propiedad IN (".$Filtro_Propiedad_Activos.") ";
		}
		if($Filtro_Usr_Responsable_Activos != null) {
			$soloactivos .= " AND S.Num_Empleado IN (".$Filtro_Usr_Responsable_Activos.") ";
		}
		if($Filtro_UPrimaria_Activos != null) {
			$soloactivos .= " AND S.Id_Ubic_Prim IN (".$Filtro_UPrimaria_Activos.") ";
		}
		
		if($Filtro_USecundaria_Activos != null) {
			//$soloactivos .= " AND (select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) IN(" . $Filtro_USecundaria_Activos . ") ";
			$soloactivos .= " AND S.Id_Ubic_Sec IN (" . $Filtro_USecundaria_Activos . ") ";
		}
		if($Filtro_Estatus_Activos != null) {
			$soloactivos .= " AND S.Id_Situacion_Activo IN (" . $Filtro_Estatus_Activos . ") ";
		}
		if($Filtro_Importe_Seguro_Activos != null) {
			$soloactivos .= " AND S.ImporteSeguros IN (" . $Filtro_Importe_Seguro_Activos . ") ";
		}
		if($Filtro_Monto_Factura_Activos != null) {
			$soloactivos .= " AND (SELECT MontoFactura FROM siga_activo_proveedor P WHERE S.Id_Activo = P.Id_Activo) IN (" . $Filtro_Monto_Factura_Activos . ") ";
		}
		if($Filtro_Fecha_Alta_Activos != null) {
			$soloactivos .= " AND CAST(S.Fech_Inser as DATE) IN (" . $Filtro_Fecha_Alta_Activos . ") ";
		}
		if($Filtro_Fecha_Reubicacion_Activos != null) {
			$soloactivos .= " AND CONVERT(VARCHAR, SR.Fech_Inser, 103) IN (" . $Filtro_Fecha_Reubicacion_Activos . ") ";
		}
		if($Filtro_Descripcion_Activos != null) {
			$soloactivos .= " AND RTRIM(LTRIM(S.DescCorta)) IN(". $Filtro_Descripcion_Activos . ") ";
		}
		if($Filtro_Filtro_UPrimariaOrigen_Activos != null) {
			$soloactivos .= " AND (SELECT TOP(1) H.Id_Ubic_Prim FROM siga_historico_reubicacion H WHERE H.Id_Activo = S.Id_Activo) IN (" . $Filtro_Filtro_UPrimariaOrigen_Activos . ") ";
		}
		if($Filtro_Filtro_USecundariaOrigen_Activos != null) {
			$soloactivos .= " AND (SELECT TOP(1) H.Id_Ubic_Sec FROM siga_historico_reubicacion H WHERE H.Id_Activo = S.Id_Activo) IN (" . $Filtro_Filtro_USecundariaOrigen_Activos . ") ";
		}
		if($Filtro_Tipo_Activo_Activos != null) {
			$soloactivos .= " AND S.Id_Tipo_Activo IN (" . $Filtro_Tipo_Activo_Activos . ") ";
		}
		if($Filtro_Fecha_Baja_Usr_Solicitante_Activos != null) {
			$soloactivos .= " AND S.Id_Activo IN (SELECT Id_Activo FROM siga_workflow_activo WHERE Aceptado = 1 AND CveWorkFlow = 1 AND CONVERT(VARCHAR, FechaAceptado, 103) IN (" . $Filtro_Fecha_Baja_Usr_Solicitante_Activos . ")) ";
		}
		if($Filtro_Fecha_Baja_Usr_DirFinanciera_Activos != null) {
			$soloactivos .= " AND S.Id_Activo IN (SELECT Id_Activo FROM siga_workflow_activo WHERE Aceptado = 1 AND CveWorkFlow = 4 AND CONVERT(VARCHAR, FechaAceptado, 103) IN (" . $Filtro_Fecha_Baja_Usr_DirFinanciera_Activos . ")) ";
		}
		if($Filtro_Fecha_Baja_Usr_Contabilidad_Activos != null) {
			$soloactivos .= " AND S.Id_Activo IN (SELECT Id_Activo FROM siga_workflow_activo WHERE Aceptado = 1 AND CveWorkFlow = 5 AND CONVERT(VARCHAR, FechaAceptado, 103) IN (" . $Filtro_Fecha_Baja_Usr_Contabilidad_Activos . ")) ";
		}
		if($Filtro_Estatus_Workflow_Activos != null) {
			$soloactivos .= " AND S.Id_Activo IN (SELECT W.Id_Activo /*MAX(W.CveWorkflow)-*/ FROM siga_workflow_activo W WHERE W.Aceptado = 1 GROUP BY W.Id_Activo HAVING MAX(W.CveWorkflow) IN (" . $Filtro_Estatus_Workflow_Activos . ")) ";
		}
		if($Filtro_UbicacionEspecifica_Activos != null) {
			$soloactivos .= " AND S.Especifica IN (" . $Filtro_UbicacionEspecifica_Activos . ") ";
		}
		if($Filtro_Motivo_Baja_Activos != null) {
			$soloactivos .= " AND S.Id_Activo IN (SELECT Id_Activo FROM siga_baja_activo WHERE Motivo_Baja IN (" . $Filtro_Motivo_Baja_Activos . ")) ";
		}
		
		$Area = "";
		if($siga_activosDto->getId_Area()!="") {
			if($siga_activosDto->getId_Area()!='5') {
				// Mostrar los activos basados en el historico de reubicaciones por area
				if($estatus=="reubicacion") {
					if($FechInicio!=""&&$FechFin!="") {
						$Area="	and SR.Fech_Inser between convert(date,'".$FechInicio."') and convert(date,'".$FechFin."') ";
					}
					else {
						if($FechInicio!=""&&$FechFin=="") {
							$Area = " AND SR.Fech_Inser = convert(date,'".$FechInicio."') ";
						}
						else {
							if($FechInicio==""&&$FechFin!="") {
								$Area = " AND SR.Fech_Inser = convert(date,'".$FechFin."')  ";
							}
						}
					}
					$Area .= " and (S.Id_Area=".$siga_activosDto->getId_Area()." or S.Id_Activo in ( select Id_Activo from siga_historico_reubicacion where Id_Area=".$siga_activosDto->getId_Area().") )";
				}
				else {
					$Area .= " and S.Id_Area=".$siga_activosDto->getId_Area()." ";
				}
			}
		}
		
		$Num_Empleado="";
		if($siga_activosDto->getNum_Empleado()!=""){
			$Area.=" and S.Num_Empleado=".$siga_activosDto->getNum_Empleado()." ";
		}
		//MontoFactura
		$sqltotal = " SELECT  S.Id_Activo,S.AF_BC,S.Foto,S.Nombre_Activo,S.Marca, S.Modelo, S.NumSerie,S.Nombre_Completo,(select Nom_Area from siga_catareas A where A.id_Area=S.Id_Area) as Area,
		(select Desc_Clasificacion from siga_cat_clasificacion C where C.Id_Clasificacion=S.Id_Clasificacion) as Clasificacion,
		(select Desc_Tipo_Vale_Resg from siga_cat_tipo_vale_resg TV where TV.Id_Tipo_Vale_Resg=S.Id_Tipo_Vale_Resg) as Tipo_Vale,
		(select Des_Departamento from siga_cat_departamento D where D.Id_Departamento=S.Id_Departamento) as Departamento,
		(select Desc_Propiedad from siga_cat_propiedad C where C.Id_Propiedad=S.Id_Propiedad) as Propiedad,
		(select Desc_Estatus from siga_cat_estatus C where C.Id_Estatus=S.Id_Situacion_Activo) as Estatus,
		(select Desc_Tipo_Activo from siga_cat_tipo_activo T where T.Id_Tipo_Activo=S.Id_Tipo_Activo) as TipoActivo,DescCorta,
		(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=S.Id_Ubic_Prim) as UbicacionPrimaria,
		(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=S.Id_Ubic_Sec) as UbicacionSecundaria,isnull(FORMAT(S.Fech_Inser,'dd/MM/yyyy'),'') as FechaAlta, S.Fech_Inser, ";
		
		if($estatus == "baja" || $estatus == "baja2" || $estatus == "baja3") {
			$sqltotal .= "
			SB.Comentarios,
			(select top 1  rtrim(ltrim(us.No_Usuario))+'-'+rtrim(ltrim(us.Nombre_Usuario)) from siga_usuarios us where us.Id_Usuario=SB.Usuario) as Usuario_Solicitante_Baja, 
			(select top 1 Desc_Destino_Final from siga_cast_destino_final dest_f where dest_f.Id_Destino_final=SB.Destino) as Destino_Final,
			(select top 1 Desc_Motivo_baja from siga_cast_motivo_baja mot_b where mot_b.Id_Motivo_baja=SB.Motivo_Baja) as Motivo_Baja,
			/*(select top 1 FORMAT(FechaAceptado,'dd/MM/yyyy') from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=1) as fecha_baja_usr_solicitante,*/
			(SELECT MAX(FORMAT(FechaAceptado,'dd/MM/yyyy')) FROM siga_workflow_activo SW WHERE S.Id_Activo = SW.Id_Activo and SW.CveWorkflow = 1 AND SW.Aceptado = 1) AS fecha_baja_usr_solicitante,
			(select top 1 (select top 1  rtrim(ltrim(usr.No_Usuario))+'-'+rtrim(ltrim(usr.Nombre_Usuario)) from siga_usuarios usr where usr.Id_Usuario=sw.Id_Usuario) from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=2) as Usuario_Responsable_Baja,
			(select top 1 FORMAT(FechaAceptado,'dd/MM/yyyy') from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=2) as fecha_baja_usr_responsable,
			/*(select top 1 FORMAT(FechaAceptado,'dd/MM/yyyy') from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=4) as fecha_baja_dir_financiera,*/
			(SELECT MAX(FORMAT(FechaAceptado,'dd/MM/yyyy')) FROM siga_workflow_activo SW WHERE S.Id_Activo = SW.Id_Activo and SW.CveWorkflow = 4 AND SW.Aceptado = 1) as fecha_baja_dir_financiera,
			/*(select top 1 FORMAT(FechaAceptado,'dd/MM/yyyy') from siga_workflow_activo sw where sw.Id_baja=SB.Id_baja and CveWorkflow=5) as fecha_baja_usr_contabilidad,*/
			(SELECT MAX(FORMAT(FechaAceptado,'dd/MM/yyyy')) FROM siga_workflow_activo SW WHERE S.Id_Activo = SW.Id_Activo and SW.CveWorkflow = 5 AND SW.Aceptado = 1) as fecha_baja_usr_contabilidad,";
		}
		
		$sqltotal .= "
			CONVERT(VARCHAR, CONVERT(VARCHAR, CAST((select top 1 MontoFactura from siga_activo_proveedor T where T.Id_Activo=S.Id_Activo)  AS MONEY), 1)) as MontoFactura,
			(select top 1 MontoFactura from siga_activo_proveedor T where T.Id_Activo=S.Id_Activo) as MontoF,
			CONVERT(VARCHAR, CONVERT(VARCHAR, CAST(ImporteSeguros  AS MONEY), 1)) as Importe_Seguros, S.ImporteSeguros, ";
		if($estatus=="reubicacion"){
			$sqltotal .= "
				(select top 1  Desc_Ubic_Prim from siga_cat_ubic_prim where (select top 1 HR.Id_Ubic_Prim from siga_historico_reubicacion HR where HR.Id_Activo_Reubicacion=SR.Id_Activo_Reubicacion)=siga_cat_ubic_prim.Id_Ubic_Prim) as Desc_ubic_prim_proc,
				(select top 1  Desc_Ubic_Sec from siga_cat_ubic_sec where (select top 1 HR.Id_Ubic_Sec from siga_historico_reubicacion HR where HR.Id_Activo_Reubicacion=SR.Id_Activo_Reubicacion)=siga_cat_ubic_sec.Id_Ubic_Sec) as Desc_ubic_sec_proc,
				(select Desc_Ubic_Prim from siga_cat_ubic_prim T where T.Id_Ubic_Prim=SR.Id_Ubic_Prim) as UbicacionPrimariaReu,
				(select Desc_Ubic_Sec from siga_cat_ubic_sec T where T.Id_Ubic_Sec=SR.Id_Ubic_Sec) as UbicacionSecundariaReu, Ubic_Especifica,
				(select Nom_Area from siga_catareas T where T.Id_Area=SR.Id_Area) as Id_AreaReu,SR.Fech_Inser as Fecha_Reubicacion,";
		}
		else {
			$sqltotal .= "
				'' as Desc_ubic_prim_proc,
				'' as Desc_ubic_sec_proc,
				'' as UbicacionPrimariaReu,
				'' as UbicacionSecundariaReu,
				'' as Id_AreaReu,";
		}

		$sqltotal .= "
			(select Fecha_Baja from siga_baja_activo A where A.Id_Activo=S.Id_Activo and Estatus_Cancelacion<>1) as Fecha_Baja,
			(select WorkFlowPaso from siga_baja_activo A where A.Id_Activo=S.Id_Activo and Estatus_Cancelacion<>1 ) as WorkFlowPaso " . $baja_reubicacion . ", 
			(SELECT COUNT(*) FROM siga_activo_accesorio_consumible A_C WHERE A_C.Id_Activo = S.Id_Activo) AS CuentaAccesoriosConsumibles 
			FROM siga_activos S ".$baja." ".$reubicacion." where 0=0 ". $clase_biomedica . $EstatusReg.$Area . $soloactivos . $Num_Empleado;

		$sql = "select * from (" . $sqltotal . ") siga_activos " . $Filtros_Fech_Baja . $criterios . $ordenamiento . $pagina;
		$sql = str_replace("ORDER BY FechaAlta desc", "ORDER BY Fech_Inser desc", $sql);
		$sql = str_replace("ORDER BY FechaAlta asc", "ORDER BY Fech_Inser asc", $sql);

		//echo "<pre>";
		//echo $sql;
		//echo "</pre>";
		$sql_post = $sql;
		$this->_proveedor->execute($sql);
		if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
			while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
				$data[] = array("Id_Activo" => $row["Id_Activo"],
					"AF_BC" => $row["AF_BC"],
					//"Marca" => $sql,
					"Marca" => $row["Marca"],
					"Modelo" => $row["Modelo"],
					"NumSerie" => $row["NumSerie"],
					"Tipo_Vale" => $row["Tipo_Vale"],
					"Foto" => $row["Foto"],
					"Nombre_Activo" => $row["Nombre_Activo"],
					"Area" => $row["Area"],
					"Departamento" => $row["Departamento"],
					"Clasificacion" => $row["Clasificacion"],
					"Propiedad" => $row["Propiedad"],
					"Estatus" => $row["Estatus"],
					"TipoActivo" => $row["TipoActivo"],
					"DescCorta" => $row["DescCorta"],
					"Nombre_Completo" => $row["Nombre_Completo"],
					"UbicacionPrimaria" => $row["UbicacionPrimaria"],
					"UbicacionSecundaria" => $row["UbicacionSecundaria"],
					"Id_Baja_Reubicacion" => $row["Id_Baja_Reubicacion"],
					"Fecha_Baja" => $row["Fecha_Baja"],
					"WorkFlowPaso" => $row["WorkFlowPaso"],
					"Desc_ubic_prim_proc" => $row["Desc_ubic_prim_proc"],
					"Desc_ubic_sec_proc" => $row["Desc_ubic_sec_proc"],
					"UbicacionPrimariaReu" => $row["UbicacionPrimariaReu"],
					"UbicacionSecundariaReu" => $row["UbicacionSecundariaReu"],
					"Ubic_Especifica" => $row["Ubic_Especifica"],
					"FechaAlta" => $row["FechaAlta"],
					"MontoFactura" => $row["MontoFactura"],
					"Importe_Seguros" => $row["Importe_Seguros"],
					"Id_AreaReu" =>$row["Id_AreaReu"],
					"fecha_baja_usr_solicitante" => $row["fecha_baja_usr_solicitante"],
					"fecha_baja_usr_responsable" => $row["fecha_baja_usr_responsable"],
					"fecha_baja_dir_financiera" => $row["fecha_baja_dir_financiera"],
					"fecha_baja_usr_contabilidad" =>$row["fecha_baja_usr_contabilidad"],
					"Fecha_Reubicacion" =>$row["Fecha_Reubicacion"],
					"Usuario_Solicitante_Baja" =>$row["Usuario_Solicitante_Baja"],
					"Usuario_Responsable_Baja" =>$row["Usuario_Responsable_Baja"],
					"Motivo_Baja" => $row["Motivo_Baja"],
					"Comentarios" => $row["Comentarios"],
					"Destino_Final" => $row["Destino_Final"],
					"CuentaAccesoriosConsumibles" => $row["CuentaAccesoriosConsumibles"]
				);
			}
			$this->_proveedor->execute("select COUNT(*) AS total from ( select * from (".$sqltotal.") siga_activos ".$Filtros_Fech_Baja.$criterios." ) siga_activos");
			while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
				$recordsTotal = $row["total"];
			}
		}
		return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
	}
}
?>