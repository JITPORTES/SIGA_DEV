<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_nota_salida/Siga_nota_salidaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_nota_salidaDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_nota_salida($siga_nota_salidaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_nota_salida(";
if($siga_nota_salidaDto->getId_Nota_Salida()!=""){
$sql.="Id_Nota_Salida";
if(($siga_nota_salidaDto->getId_Area_Realiza()!="") ||($siga_nota_salidaDto->getId_Ubic_Prim()!="") ||($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Area_Realiza()!=""){
$sql.="Id_Area_Realiza";
if(($siga_nota_salidaDto->getId_Ubic_Prim()!="") ||($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim";
if(($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec";
if(($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Motivo_Salida()!=""){
$sql.="Id_Motivo_Salida";
if(($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!=""){
$sql.="Id_Usr_Realiza_Nota";
if(($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNombre_Realiza_Nota()!=""){
$sql.="Nombre_Realiza_Nota";
if(($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getMail_Realiza_Nota()!=""){
$sql.="Mail_Realiza_Nota";
if(($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFirma_Realiza_Nota()!=""){
$sql.="Firma_Realiza_Nota";
if(($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Realiza_Nota()!=""){
$sql.="Fech_Realiza_Nota";
if(($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!=""){
$sql.="Id_Usr_Quien_Autoriza";
if(($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNombre_Quien_Autoriza()!=""){
$sql.="Nombre_Quien_Autoriza";
if(($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getMail_Quien_Autoriza()!=""){
$sql.="Mail_Quien_Autoriza";
if(($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFirma_Quien_Autoriza()!=""){
$sql.="Firma_Quien_Autoriza";
if(($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Autoriza()!=""){
$sql.="Fech_Autoriza";
if(($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getEmpresa_Recibe()!=""){
$sql.="Empresa_Recibe";
if(($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNombre_Contacto()!=""){
$sql.="Nombre_Contacto";
if(($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getTelefono_Contacto()!=""){
$sql.="Telefono_Contacto";
if(($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getMail_Contacto()!=""){
$sql.="Mail_Contacto";
if(($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFirma_Quien_Recibe()!=""){
$sql.="Firma_Quien_Recibe";
if(($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Firma_Recibe()!=""){
$sql.="Fech_Firma_Recibe";
if(($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getObservaciones()!=""){
$sql.="Observaciones";
if(($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getUrl_Adjuntos()!=""){
$sql.="Url_Adjuntos";
if(($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getEstatus_Proceso()!=""){
$sql.="Estatus_Proceso";
if(($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getTipo_Solicitud()!=""){
$sql.="Tipo_Solicitud";
if(($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!=""){
$sql.="Desc_Motivo_Cancel_Proceso";
if(($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNota_Duplicada()!=""){
$sql.="Nota_Duplicada";
if(($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_nota_salidaDto->getId_Nota_Salida()!=""){
$sql.="'".$siga_nota_salidaDto->getId_Nota_Salida()."'";
if(($siga_nota_salidaDto->getId_Area_Realiza()!="") ||($siga_nota_salidaDto->getId_Ubic_Prim()!="") ||($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Area_Realiza()!=""){
$sql.="'".$siga_nota_salidaDto->getId_Area_Realiza()."'";
if(($siga_nota_salidaDto->getId_Ubic_Prim()!="") ||($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Ubic_Prim()!=""){
$sql.="'".$siga_nota_salidaDto->getId_Ubic_Prim()."'";
if(($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Ubic_Sec()!=""){
$sql.="'".$siga_nota_salidaDto->getId_Ubic_Sec()."'";
if(($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Motivo_Salida()!=""){
$sql.="'".$siga_nota_salidaDto->getId_Motivo_Salida()."'";
if(($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!=""){
$sql.="'".$siga_nota_salidaDto->getId_Usr_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNombre_Realiza_Nota()!=""){
$sql.="'".$siga_nota_salidaDto->getNombre_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getMail_Realiza_Nota()!=""){
$sql.="'".$siga_nota_salidaDto->getMail_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFirma_Realiza_Nota()!=""){
$sql.="'".$siga_nota_salidaDto->getFirma_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Realiza_Nota()!=""){
$sql.="'".$siga_nota_salidaDto->getFech_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!=""){
$sql.="'".$siga_nota_salidaDto->getId_Usr_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNombre_Quien_Autoriza()!=""){
$sql.="'".$siga_nota_salidaDto->getNombre_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getMail_Quien_Autoriza()!=""){
$sql.="'".$siga_nota_salidaDto->getMail_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFirma_Quien_Autoriza()!=""){
$sql.="'".$siga_nota_salidaDto->getFirma_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Autoriza()!=""){
$sql.="'".$siga_nota_salidaDto->getFech_Autoriza()."'";
if(($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getEmpresa_Recibe()!=""){
$sql.="'".$siga_nota_salidaDto->getEmpresa_Recibe()."'";
if(($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNombre_Contacto()!=""){
$sql.="'".$siga_nota_salidaDto->getNombre_Contacto()."'";
if(($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getTelefono_Contacto()!=""){
$sql.="'".$siga_nota_salidaDto->getTelefono_Contacto()."'";
if(($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getMail_Contacto()!=""){
$sql.="'".$siga_nota_salidaDto->getMail_Contacto()."'";
if(($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFirma_Quien_Recibe()!=""){
$sql.="'".$siga_nota_salidaDto->getFirma_Quien_Recibe()."'";
if(($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Firma_Recibe()!=""){
$sql.="'".$siga_nota_salidaDto->getFech_Firma_Recibe()."'";
if(($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getObservaciones()!=""){
$sql.="'".$siga_nota_salidaDto->getObservaciones()."'";
if(($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getUrl_Adjuntos()!=""){
$sql.="'".$siga_nota_salidaDto->getUrl_Adjuntos()."'";
if(($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getEstatus_Proceso()!=""){
$sql.="'".$siga_nota_salidaDto->getEstatus_Proceso()."'";
if(($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getTipo_Solicitud()!=""){
$sql.="'".$siga_nota_salidaDto->getTipo_Solicitud()."'";
if(($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!=""){
$sql.="'".$siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()."'";
if(($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNota_Duplicada()!=""){
$sql.="'".$siga_nota_salidaDto->getNota_Duplicada()."'";
if(($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getUsr_Inser()!=""){
$sql.="'".$siga_nota_salidaDto->getUsr_Inser()."'";
if(($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Inser()!=""){
$sql.="'".$siga_nota_salidaDto->getFech_Inser()."'";
if(($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getUsr_Mod()!=""){
$sql.="'".$siga_nota_salidaDto->getUsr_Mod()."'";
if(($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Mod()!=""){
$sql.="'".$siga_nota_salidaDto->getFech_Mod()."'";
if(($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getEstatus_Reg()!=""){
$sql.="'".$siga_nota_salidaDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_nota_salidaDTO();
$tmp->setId_Nota_Salida($this->_proveedor->lastID());
$tmp = $this->selectSiga_nota_salida($tmp,"",$this->_proveedor);
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
public function updateSiga_nota_salida($siga_nota_salidaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_nota_salida SET ";
if($siga_nota_salidaDto->getId_Nota_Salida()!=""){
$sql.="Id_Nota_Salida='".$siga_nota_salidaDto->getId_Nota_Salida()."'";
if(($siga_nota_salidaDto->getId_Area_Realiza()!="") ||($siga_nota_salidaDto->getId_Ubic_Prim()!="") ||($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Area_Realiza()!=""){
$sql.="Id_Area_Realiza='".$siga_nota_salidaDto->getId_Area_Realiza()."'";
if(($siga_nota_salidaDto->getId_Ubic_Prim()!="") ||($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_nota_salidaDto->getId_Ubic_Prim()."'";
if(($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec='".$siga_nota_salidaDto->getId_Ubic_Sec()."'";
if(($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Motivo_Salida()!=""){
$sql.="Id_Motivo_Salida='".$siga_nota_salidaDto->getId_Motivo_Salida()."'";
if(($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!=""){
$sql.="Id_Usr_Realiza_Nota='".$siga_nota_salidaDto->getId_Usr_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNombre_Realiza_Nota()!=""){
$sql.="Nombre_Realiza_Nota='".$siga_nota_salidaDto->getNombre_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getMail_Realiza_Nota()!=""){
$sql.="Mail_Realiza_Nota='".$siga_nota_salidaDto->getMail_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFirma_Realiza_Nota()!=""){
$sql.="Firma_Realiza_Nota='".$siga_nota_salidaDto->getFirma_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Realiza_Nota()!=""){
$sql.="Fech_Realiza_Nota='".$siga_nota_salidaDto->getFech_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!=""){
$sql.="Id_Usr_Quien_Autoriza='".$siga_nota_salidaDto->getId_Usr_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNombre_Quien_Autoriza()!=""){
$sql.="Nombre_Quien_Autoriza='".$siga_nota_salidaDto->getNombre_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getMail_Quien_Autoriza()!=""){
$sql.="Mail_Quien_Autoriza='".$siga_nota_salidaDto->getMail_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFirma_Quien_Autoriza()!=""){
$sql.="Firma_Quien_Autoriza='".$siga_nota_salidaDto->getFirma_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Autoriza()!=""){
$sql.="Fech_Autoriza='".$siga_nota_salidaDto->getFech_Autoriza()."'";
if(($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getEmpresa_Recibe()!=""){
$sql.="Empresa_Recibe='".$siga_nota_salidaDto->getEmpresa_Recibe()."'";
if(($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNombre_Contacto()!=""){
$sql.="Nombre_Contacto='".$siga_nota_salidaDto->getNombre_Contacto()."'";
if(($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getTelefono_Contacto()!=""){
$sql.="Telefono_Contacto='".$siga_nota_salidaDto->getTelefono_Contacto()."'";
if(($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getMail_Contacto()!=""){
$sql.="Mail_Contacto='".$siga_nota_salidaDto->getMail_Contacto()."'";
if(($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFirma_Quien_Recibe()!=""){
$sql.="Firma_Quien_Recibe='".$siga_nota_salidaDto->getFirma_Quien_Recibe()."'";
if(($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Firma_Recibe()!=""){
$sql.="Fech_Firma_Recibe='".$siga_nota_salidaDto->getFech_Firma_Recibe()."'";
if(($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getObservaciones()!=""){
$sql.="Observaciones='".$siga_nota_salidaDto->getObservaciones()."'";
if(($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getUrl_Adjuntos()!=""){
$sql.="Url_Adjuntos='".$siga_nota_salidaDto->getUrl_Adjuntos()."'";
if(($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getEstatus_Proceso()!=""){
$sql.="Estatus_Proceso='".$siga_nota_salidaDto->getEstatus_Proceso()."'";
if(($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getTipo_Solicitud()!=""){
$sql.="Tipo_Solicitud='".$siga_nota_salidaDto->getTipo_Solicitud()."'";
if(($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!=""){
$sql.="Desc_Motivo_Cancel_Proceso='".$siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()."'";
if(($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getNota_Duplicada()!=""){
$sql.="Nota_Duplicada='".$siga_nota_salidaDto->getNota_Duplicada()."'";
if(($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_nota_salidaDto->getUsr_Inser()."'";
if(($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_nota_salidaDto->getFech_Inser()."'";
if(($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_nota_salidaDto->getUsr_Mod()."'";
if(($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_nota_salidaDto->getFech_Mod()."'";
if(($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_nota_salidaDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_nota_salidaDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Nota_Salida='".$siga_nota_salidaDto->getId_Nota_Salida()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_nota_salidaDTO();
$tmp->setId_Nota_Salida($siga_nota_salidaDto->getId_Nota_Salida());
$tmp = $this->selectSiga_nota_salida($tmp,"",$this->_proveedor);
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
public function deleteSiga_nota_salida($siga_nota_salidaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_nota_salida  WHERE Id_Nota_Salida='".$siga_nota_salidaDto->getId_Nota_Salida()."'";
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
public function selectSiga_nota_salida($siga_nota_salidaDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Nota_Salida,Id_Area_Realiza,Id_Ubic_Prim,Id_Ubic_Sec,Id_Motivo_Salida,Id_Usr_Realiza_Nota,Nombre_Realiza_Nota,Mail_Realiza_Nota,Firma_Realiza_Nota,Fech_Realiza_Nota,Id_Usr_Quien_Autoriza,Nombre_Quien_Autoriza,Mail_Quien_Autoriza,Firma_Quien_Autoriza,Fech_Autoriza,Empresa_Recibe,Nombre_Contacto,Telefono_Contacto,Mail_Contacto,Firma_Quien_Recibe,Fech_Firma_Recibe,Observaciones,Url_Adjuntos,Estatus_Proceso,Tipo_Solicitud,Desc_Motivo_Cancel_Proceso,Nota_Duplicada,Usr_Inser,Fech_Inser,Usr_Mod,Fech_Mod,Estatus_Reg FROM siga_nota_salida ";
if(($siga_nota_salidaDto->getId_Nota_Salida()!="") ||($siga_nota_salidaDto->getId_Area_Realiza()!="") ||($siga_nota_salidaDto->getId_Ubic_Prim()!="") ||($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_nota_salidaDto->getId_Nota_Salida()!=""){
$sql.="Id_Nota_Salida='".$siga_nota_salidaDto->getId_Nota_Salida()."'";
if(($siga_nota_salidaDto->getId_Area_Realiza()!="") ||($siga_nota_salidaDto->getId_Ubic_Prim()!="") ||($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getId_Area_Realiza()!=""){
$sql.="Id_Area_Realiza='".$siga_nota_salidaDto->getId_Area_Realiza()."'";
if(($siga_nota_salidaDto->getId_Ubic_Prim()!="") ||($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getId_Ubic_Prim()!=""){
$sql.="Id_Ubic_Prim='".$siga_nota_salidaDto->getId_Ubic_Prim()."'";
if(($siga_nota_salidaDto->getId_Ubic_Sec()!="") ||($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getId_Ubic_Sec()!=""){
$sql.="Id_Ubic_Sec='".$siga_nota_salidaDto->getId_Ubic_Sec()."'";
if(($siga_nota_salidaDto->getId_Motivo_Salida()!="") ||($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getId_Motivo_Salida()!=""){
$sql.="Id_Motivo_Salida='".$siga_nota_salidaDto->getId_Motivo_Salida()."'";
if(($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!="") ||($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getId_Usr_Realiza_Nota()!=""){
$sql.="Id_Usr_Realiza_Nota='".$siga_nota_salidaDto->getId_Usr_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getNombre_Realiza_Nota()!="") ||($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getNombre_Realiza_Nota()!=""){
$sql.="Nombre_Realiza_Nota='".$siga_nota_salidaDto->getNombre_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getMail_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getMail_Realiza_Nota()!=""){
$sql.="Mail_Realiza_Nota='".$siga_nota_salidaDto->getMail_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getFirma_Realiza_Nota()!="") ||($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getFirma_Realiza_Nota()!=""){
$sql.="Firma_Realiza_Nota='".$siga_nota_salidaDto->getFirma_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getFech_Realiza_Nota()!="") ||($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getFech_Realiza_Nota()!=""){
$sql.="Fech_Realiza_Nota='".$siga_nota_salidaDto->getFech_Realiza_Nota()."'";
if(($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getId_Usr_Quien_Autoriza()!=""){
$sql.="Id_Usr_Quien_Autoriza='".$siga_nota_salidaDto->getId_Usr_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getNombre_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getNombre_Quien_Autoriza()!=""){
$sql.="Nombre_Quien_Autoriza='".$siga_nota_salidaDto->getNombre_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getMail_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getMail_Quien_Autoriza()!=""){
$sql.="Mail_Quien_Autoriza='".$siga_nota_salidaDto->getMail_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getFirma_Quien_Autoriza()!="") ||($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getFirma_Quien_Autoriza()!=""){
$sql.="Firma_Quien_Autoriza='".$siga_nota_salidaDto->getFirma_Quien_Autoriza()."'";
if(($siga_nota_salidaDto->getFech_Autoriza()!="") ||($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getFech_Autoriza()!=""){
$sql.="Fech_Autoriza='".$siga_nota_salidaDto->getFech_Autoriza()."'";
if(($siga_nota_salidaDto->getEmpresa_Recibe()!="") ||($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getEmpresa_Recibe()!=""){
$sql.="Empresa_Recibe='".$siga_nota_salidaDto->getEmpresa_Recibe()."'";
if(($siga_nota_salidaDto->getNombre_Contacto()!="") ||($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getNombre_Contacto()!=""){
$sql.="Nombre_Contacto='".$siga_nota_salidaDto->getNombre_Contacto()."'";
if(($siga_nota_salidaDto->getTelefono_Contacto()!="") ||($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getTelefono_Contacto()!=""){
$sql.="Telefono_Contacto='".$siga_nota_salidaDto->getTelefono_Contacto()."'";
if(($siga_nota_salidaDto->getMail_Contacto()!="") ||($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getMail_Contacto()!=""){
$sql.="Mail_Contacto='".$siga_nota_salidaDto->getMail_Contacto()."'";
if(($siga_nota_salidaDto->getFirma_Quien_Recibe()!="") ||($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getFirma_Quien_Recibe()!=""){
$sql.="Firma_Quien_Recibe='".$siga_nota_salidaDto->getFirma_Quien_Recibe()."'";
if(($siga_nota_salidaDto->getFech_Firma_Recibe()!="") ||($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getFech_Firma_Recibe()!=""){
$sql.="Fech_Firma_Recibe='".$siga_nota_salidaDto->getFech_Firma_Recibe()."'";
if(($siga_nota_salidaDto->getObservaciones()!="") ||($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getObservaciones()!=""){
$sql.="Observaciones='".$siga_nota_salidaDto->getObservaciones()."'";
if(($siga_nota_salidaDto->getUrl_Adjuntos()!="") ||($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getUrl_Adjuntos()!=""){
$sql.="Url_Adjuntos='".$siga_nota_salidaDto->getUrl_Adjuntos()."'";
if(($siga_nota_salidaDto->getEstatus_Proceso()!="") ||($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getEstatus_Proceso()!=""){
$sql.="Estatus_Proceso='".$siga_nota_salidaDto->getEstatus_Proceso()."'";
if(($siga_nota_salidaDto->getTipo_Solicitud()!="") ||($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getTipo_Solicitud()!=""){
$sql.="Tipo_Solicitud='".$siga_nota_salidaDto->getTipo_Solicitud()."'";
if(($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!="") ||($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()!=""){
$sql.="Desc_Motivo_Cancel_Proceso='".$siga_nota_salidaDto->getDesc_Motivo_Cancel_Proceso()."'";
if(($siga_nota_salidaDto->getNota_Duplicada()!="") ||($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getNota_Duplicada()!=""){
$sql.="Nota_Duplicada='".$siga_nota_salidaDto->getNota_Duplicada()."'";
if(($siga_nota_salidaDto->getUsr_Inser()!="") ||($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_nota_salidaDto->getUsr_Inser()."'";
if(($siga_nota_salidaDto->getFech_Inser()!="") ||($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_nota_salidaDto->getFech_Inser()."'";
if(($siga_nota_salidaDto->getUsr_Mod()!="") ||($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_nota_salidaDto->getUsr_Mod()."'";
if(($siga_nota_salidaDto->getFech_Mod()!="") ||($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_nota_salidaDto->getFech_Mod()."'";
if(($siga_nota_salidaDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_nota_salidaDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_nota_salidaDto->getEstatus_Reg()."'";
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
$tmp[$contador] = new Siga_nota_salidaDTO();
$tmp[$contador]->setId_Nota_Salida($row["Id_Nota_Salida"]);
$tmp[$contador]->setId_Area_Realiza($row["Id_Area_Realiza"]);
$tmp[$contador]->setId_Ubic_Prim($row["Id_Ubic_Prim"]);
$tmp[$contador]->setId_Ubic_Sec($row["Id_Ubic_Sec"]);
$tmp[$contador]->setId_Motivo_Salida($row["Id_Motivo_Salida"]);
$tmp[$contador]->setId_Usr_Realiza_Nota($row["Id_Usr_Realiza_Nota"]);
$tmp[$contador]->setNombre_Realiza_Nota($row["Nombre_Realiza_Nota"]);
$tmp[$contador]->setMail_Realiza_Nota($row["Mail_Realiza_Nota"]);
$tmp[$contador]->setFirma_Realiza_Nota($row["Firma_Realiza_Nota"]);
$tmp[$contador]->setFech_Realiza_Nota($row["Fech_Realiza_Nota"]);
$tmp[$contador]->setId_Usr_Quien_Autoriza($row["Id_Usr_Quien_Autoriza"]);
$tmp[$contador]->setNombre_Quien_Autoriza($row["Nombre_Quien_Autoriza"]);
$tmp[$contador]->setMail_Quien_Autoriza($row["Mail_Quien_Autoriza"]);
$tmp[$contador]->setFirma_Quien_Autoriza($row["Firma_Quien_Autoriza"]);
$tmp[$contador]->setFech_Autoriza($row["Fech_Autoriza"]);
$tmp[$contador]->setEmpresa_Recibe($row["Empresa_Recibe"]);
$tmp[$contador]->setNombre_Contacto($row["Nombre_Contacto"]);
$tmp[$contador]->setTelefono_Contacto($row["Telefono_Contacto"]);
$tmp[$contador]->setMail_Contacto($row["Mail_Contacto"]);
$tmp[$contador]->setFirma_Quien_Recibe($row["Firma_Quien_Recibe"]);
$tmp[$contador]->setFech_Firma_Recibe($row["Fech_Firma_Recibe"]);
$tmp[$contador]->setObservaciones($row["Observaciones"]);
$tmp[$contador]->setUrl_Adjuntos($row["Url_Adjuntos"]);
$tmp[$contador]->setEstatus_Proceso($row["Estatus_Proceso"]);
$tmp[$contador]->setTipo_Solicitud($row["Tipo_Solicitud"]);
$tmp[$contador]->setDesc_Motivo_Cancel_Proceso($row["Desc_Motivo_Cancel_Proceso"]);
$tmp[$contador]->setNota_Duplicada($row["Nota_Duplicada"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
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