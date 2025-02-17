<?php
include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_activo_proveedor/Siga_activo_proveedorDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_activo_proveedorDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}

public function insertSiga_activo_proveedor($siga_activo_proveedorDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_activo_proveedor+1) IS NULL then 1 else (max(Id_activo_proveedor + 1)) end as IndiceMaximo from siga_activo_proveedor ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_activo_proveedor on ";
$sql.="INSERT INTO siga_activo_proveedor(";
$sql.="Id_activo_proveedor";
$sql.=",";
$sql.="id_Activo";
$sql.=",";
$sql.="NumOrdenCompra";
$sql.=",";
$sql.="NumFactura";
$sql.=",";
if($siga_activo_proveedorDto->getFechaFactura()!=""){
$sql.="FechaFactura";
$sql.=",";
}
$sql.="UUID";
$sql.=",";
$sql.="Folio_Fiscal";
$sql.=",";
$sql.="Monto_F";
$sql.=",";
$sql.="MontoFactura";
$sql.=",";
$sql.="NumContrato";
$sql.=",";
$sql.="VidaUtilFabricante";
$sql.=",";
$sql.="VidaUtilCHS";
$sql.=",";
$sql.="Garantia";
$sql.=",";
$sql.="ExtGarantia";
$sql.=",";
$sql.="Fecha_Vencimiento	";
$sql.=",";
$sql.="Poliza_Url";
$sql.=",";
$sql.="NombreProveedor";
$sql.=",";
$sql.="Id_Proveedor";
$sql.=",";
$sql.="Contacto";
$sql.=",";
$sql.="Telefono";
$sql.=",";
$sql.="DocRecibida";
$sql.=",";
$sql.="Accesorios";
$sql.=",";
$sql.="Correo";
$sql.=",";
$sql.="Consumibles";
$sql.=",";
$sql.="Url_Contrato";
$sql.=",";
$sql.="Url_Otro_Doc";
$sql.=",";
$sql.="Url_Factura";
$sql.=",";
$sql.="Url_Xml";
$sql.=",";
$sql.="Link";
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
$sql.=") VALUES (";
//$sql.="'".$Idmaximo."'";
$sql.="$Idmaximo";
$sql.=",";
//$sql.="'".$siga_activo_proveedorDto->getId_Activo()."'";
// $sql.="$siga_activo_proveedorDto->getId_Activo()";
//$sql.=".$siga_activo_proveedorDto->getId_Activo().";
$sql.="".$siga_activo_proveedorDto->getId_Activo()."";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getNumOrdenCompra()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getNumFactura()."'";
$sql.=",";
if($siga_activo_proveedorDto->getFechaFactura()!=""){
$sql.="'".$siga_activo_proveedorDto->getFechaFactura()."'";
$sql.=",";
}
$sql.="'".$siga_activo_proveedorDto->getUUID()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getFolio_Fiscal()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getMonto_F()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getMontoFactura()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getNumContrato()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getVidaUtilFabricante()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getVidaUtilCHS()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getGarantia()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getExtGarantia()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getFecha_Vencimiento()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getPoliza_Url()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getNombreProveedor()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getId_Proveedor()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getContacto()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getTelefono()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getDocRecibida()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getAccesorios()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getCorreo()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getConsumibles()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getUrl_Contrato()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getUrl_Otro_Doc()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getUrl_Factura()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getUrl_Xml()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getLink()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_activo_proveedorDto->getEstatus_Reg()."'";

$sql.=")";
//
$sql.=" set identity_insert siga_activo_proveedor off ";
//
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}

if (!$this->_proveedor->error()) {
$tmp = new Siga_activo_proveedorDTO();
$tmp->setId_activo_proveedor($this->_proveedor->lastID());
$tmp = $this->selectSiga_activo_proveedor($tmp,"",$this->_proveedor);
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



public function updateSiga_activo_proveedor($siga_activo_proveedorDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_activo_proveedor SET ";
if($siga_activo_proveedorDto->getEstatus_Reg()!="3"){
$sql.="id_Activo='".$siga_activo_proveedorDto->getId_Activo()."'";
$sql.=",";
$sql.="NumOrdenCompra='".$siga_activo_proveedorDto->getNumOrdenCompra()."'";
$sql.=",";
$sql.="NumFactura='".$siga_activo_proveedorDto->getNumFactura()."'";
$sql.=",";
if($siga_activo_proveedorDto->getFechaFactura()!=""){
$sql.="FechaFactura='".$siga_activo_proveedorDto->getFechaFactura()."'";
$sql.=",";
}
$sql.="UUID='".$siga_activo_proveedorDto->getUUID()."'";
$sql.=",";
$sql.="Folio_Fiscal='".$siga_activo_proveedorDto->getFolio_Fiscal()."'";
$sql.=",";
$sql.="Monto_F='".$siga_activo_proveedorDto->getMonto_F()."'";
$sql.=",";
$sql.="MontoFactura='".$siga_activo_proveedorDto->getMontoFactura()."'";
$sql.=",";
$sql.="NumContrato='".$siga_activo_proveedorDto->getNumContrato()."'";
$sql.=",";
$sql.="VidaUtilFabricante='".$siga_activo_proveedorDto->getVidaUtilFabricante()."'";
$sql.=",";
$sql.="VidaUtilCHS='".$siga_activo_proveedorDto->getVidaUtilCHS()."'";
$sql.=",";
$sql.="Garantia='".$siga_activo_proveedorDto->getGarantia()."'";
$sql.=",";
$sql.="ExtGarantia='".$siga_activo_proveedorDto->getExtGarantia()."'";
$sql.=",";
$sql.="Fecha_Vencimiento='".$siga_activo_proveedorDto->getFecha_Vencimiento()."'";
$sql.=",";
$sql.="Poliza_Url='".$siga_activo_proveedorDto->getPoliza_Url()."'";
$sql.=",";
$sql.="NombreProveedor='".$siga_activo_proveedorDto->getNombreProveedor()."'";
$sql.=",";
$sql.="Id_Proveedor='".$siga_activo_proveedorDto->getId_Proveedor()."'";
$sql.=",";
$sql.="Contacto='".$siga_activo_proveedorDto->getContacto()."'";
$sql.=",";
$sql.="Telefono='".$siga_activo_proveedorDto->getTelefono()."'";
$sql.=",";
$sql.="DocRecibida='".$siga_activo_proveedorDto->getDocRecibida()."'";
$sql.=",";
$sql.="Accesorios='".$siga_activo_proveedorDto->getAccesorios()."'";
$sql.=",";
$sql.="Correo='".$siga_activo_proveedorDto->getCorreo()."'";
$sql.=",";
$sql.="Consumibles='".$siga_activo_proveedorDto->getConsumibles()."'";
$sql.=",";
$sql.="Url_Contrato='".$siga_activo_proveedorDto->getUrl_Contrato()."'";
$sql.=",";
$sql.="Url_Otro_Doc='".$siga_activo_proveedorDto->getUrl_Otro_Doc()."'";
$sql.=",";
$sql.="Url_Factura='".$siga_activo_proveedorDto->getUrl_Factura()."'";
$sql.=",";
$sql.="Url_Xml='".$siga_activo_proveedorDto->getUrl_Xml()."'";
$sql.=",";
$sql.="Link='".$siga_activo_proveedorDto->getLink()."'";
$sql.=",";
}
if($siga_activo_proveedorDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_activo_proveedorDto->getFech_Inser()."'";
if(($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_activo_proveedorDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_activo_proveedorDto->getUsr_Inser()."'";
if(($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
$sql.="Fech_Mod=getdate()";
if(($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=",";
}

if($siga_activo_proveedorDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_activo_proveedorDto->getUsr_Mod()."'";
if(($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_activo_proveedorDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_activo_proveedorDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_activo_proveedor='".$siga_activo_proveedorDto->getId_activo_proveedor()."'";

$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_activo_proveedorDTO();
$tmp->setId_activo_proveedor($siga_activo_proveedorDto->getId_activo_proveedor());
$tmp = $this->selectSiga_activo_proveedor($tmp,"",$this->_proveedor);
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


public function deleteSiga_activo_proveedor($siga_activo_proveedorDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_activo_proveedor  WHERE Id_activo_proveedor='".$siga_activo_proveedorDto->getId_activo_proveedor()."'";
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

public function selectSiga_activo_proveedor($siga_activo_proveedorDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_activo_proveedor,id_Activo,NumOrdenCompra,NumFactura,FechaFactura,UUID,Folio_Fiscal,Monto_F,MontoFactura,NumContrato,VidaUtilFabricante,VidaUtilCHS,Garantia,ExtGarantia,Fecha_Vencimiento,Poliza_Url,NombreProveedor,Id_Proveedor,Contacto,Telefono,DocRecibida,Accesorios,Correo,Consumibles,Url_Contrato,Url_Otro_Doc,Url_Factura,Url_Xml,Link,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_activo_proveedor ";
if(($siga_activo_proveedorDto->getId_activo_proveedor()!="") ||($siga_activo_proveedorDto->getId_Activo()!="") ||($siga_activo_proveedorDto->getNumOrdenCompra()!="") ||($siga_activo_proveedorDto->getNumFactura()!="") ||($siga_activo_proveedorDto->getFechaFactura()!="") ||($siga_activo_proveedorDto->getUUID()!="") ||($siga_activo_proveedorDto->getFolio_Fiscal()!="")||($siga_activo_proveedorDto->getMonto_F()!="")||($siga_activo_proveedorDto->getMontoFactura()!="") ||($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_activo_proveedorDto->getId_activo_proveedor()!=""){
$sql.="Id_activo_proveedor='".$siga_activo_proveedorDto->getId_activo_proveedor()."'";
if(($siga_activo_proveedorDto->getId_Activo()!="") ||($siga_activo_proveedorDto->getNumOrdenCompra()!="") ||($siga_activo_proveedorDto->getNumFactura()!="") ||($siga_activo_proveedorDto->getFechaFactura()!="") ||($siga_activo_proveedorDto->getUUID()!="") ||($siga_activo_proveedorDto->getFolio_Fiscal()!="")||($siga_activo_proveedorDto->getMonto_F()!="")||($siga_activo_proveedorDto->getMontoFactura()!="") ||($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getId_Activo()!=""){
$sql.="id_Activo='".$siga_activo_proveedorDto->getId_Activo()."'";
if(($siga_activo_proveedorDto->getNumOrdenCompra()!="") ||($siga_activo_proveedorDto->getNumFactura()!="") ||($siga_activo_proveedorDto->getFechaFactura()!="") ||($siga_activo_proveedorDto->getUUID()!="") ||($siga_activo_proveedorDto->getFolio_Fiscal()!="")||($siga_activo_proveedorDto->getMonto_F()!="")||($siga_activo_proveedorDto->getMontoFactura()!="") ||($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getNumOrdenCompra()!=""){
$sql.="NumOrdenCompra='".$siga_activo_proveedorDto->getNumOrdenCompra()."'";
if(($siga_activo_proveedorDto->getNumFactura()!="") ||($siga_activo_proveedorDto->getFechaFactura()!="") ||($siga_activo_proveedorDto->getUUID()!="")||($siga_activo_proveedorDto->getFolio_Fiscal()!="")||($siga_activo_proveedorDto->getMonto_F()!="") ||($siga_activo_proveedorDto->getMontoFactura()!="") ||($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getNumFactura()!=""){
$sql.="NumFactura='".$siga_activo_proveedorDto->getNumFactura()."'";
if(($siga_activo_proveedorDto->getFechaFactura()!="") ||($siga_activo_proveedorDto->getUUID()!="")||($siga_activo_proveedorDto->getFolio_Fiscal()!="")||($siga_activo_proveedorDto->getMonto_F()!="") ||($siga_activo_proveedorDto->getMontoFactura()!="") ||($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getFechaFactura()!=""){
$sql.="FechaFactura='".$siga_activo_proveedorDto->getFechaFactura()."'";
if(($siga_activo_proveedorDto->getUUID()!="") ||($siga_activo_proveedorDto->getFolio_Fiscal()!="")||($siga_activo_proveedorDto->getMonto_F()!="")||($siga_activo_proveedorDto->getMontoFactura()!="") ||($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getUUID()!=""){
$sql.="UUID='".$siga_activo_proveedorDto->getUUID()."'";
if(($siga_activo_proveedorDto->getFolio_Fiscal()!="")||($siga_activo_proveedorDto->getMonto_F()!="")||($siga_activo_proveedorDto->getMontoFactura()!="") ||($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getFolio_Fiscal()!=""){
$sql.="Folio_Fiscal='".$siga_activo_proveedorDto->getFolio_Fiscal()."'";
if(($siga_activo_proveedorDto->getMonto_F()!="")||($siga_activo_proveedorDto->getMontoFactura()!="") ||($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getMonto_F()!=""){
$sql.="Monto_F='".$siga_activo_proveedorDto->getMonto_F()."'";
if(($siga_activo_proveedorDto->getMontoFactura()!="") ||($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getMontoFactura()!=""){
$sql.="MontoFactura='".$siga_activo_proveedorDto->getMontoFactura()."'";
if(($siga_activo_proveedorDto->getNumContrato()!="") ||($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getNumContrato()!=""){
$sql.="NumContrato='".$siga_activo_proveedorDto->getNumContrato()."'";
if(($siga_activo_proveedorDto->getVidaUtilFabricante()!="") ||($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getVidaUtilFabricante()!=""){
$sql.="VidaUtilFabricante='".$siga_activo_proveedorDto->getVidaUtilFabricante()."'";
if(($siga_activo_proveedorDto->getVidaUtilCHS()!="") ||($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getVidaUtilCHS()!=""){
$sql.="VidaUtilCHS='".$siga_activo_proveedorDto->getVidaUtilCHS()."'";
if(($siga_activo_proveedorDto->getGarantia()!="") ||($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getGarantia()!=""){
$sql.="Garantia='".$siga_activo_proveedorDto->getGarantia()."'";
if(($siga_activo_proveedorDto->getExtGarantia()!="") ||($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getExtGarantia()!=""){
$sql.="ExtGarantia='".$siga_activo_proveedorDto->getExtGarantia()."'";
if(($siga_activo_proveedorDto->getFecha_Vencimiento()!="") ||($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getFecha_Vencimiento()!=""){
$sql.="Fecha_Vencimiento='".$siga_activo_proveedorDto->getFecha_Vencimiento()."'";
if(($siga_activo_proveedorDto->getPoliza_Url()!="") ||($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getPoliza_Url()!=""){
$sql.="Poliza_Url='".$siga_activo_proveedorDto->getPoliza_Url()."'";
if(($siga_activo_proveedorDto->getNombreProveedor()!="") ||($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getNombreProveedor()!=""){
$sql.="NombreProveedor='".$siga_activo_proveedorDto->getNombreProveedor()."'";
if(($siga_activo_proveedorDto->getId_Proveedor()!="") ||($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getId_Proveedor()!=""){
$sql.="Id_Proveedor='".$siga_activo_proveedorDto->getId_Proveedor()."'";
if(($siga_activo_proveedorDto->getContacto()!="") ||($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getContacto()!=""){
$sql.="Contacto='".$siga_activo_proveedorDto->getContacto()."'";
if(($siga_activo_proveedorDto->getTelefono()!="") ||($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getTelefono()!=""){
$sql.="Telefono='".$siga_activo_proveedorDto->getTelefono()."'";
if(($siga_activo_proveedorDto->getDocRecibida()!="") ||($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getDocRecibida()!=""){
$sql.="DocRecibida='".$siga_activo_proveedorDto->getDocRecibida()."'";
if(($siga_activo_proveedorDto->getAccesorios()!="") ||($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getAccesorios()!=""){
$sql.="Accesorios='".$siga_activo_proveedorDto->getAccesorios()."'";
if(($siga_activo_proveedorDto->getCorreo()!="") ||($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getCorreo()!=""){
$sql.="Correo='".$siga_activo_proveedorDto->getCorreo()."'";
if(($siga_activo_proveedorDto->getConsumibles()!="") ||($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getConsumibles()!=""){
$sql.="Consumibles='".$siga_activo_proveedorDto->getConsumibles()."'";
if(($siga_activo_proveedorDto->getUrl_Contrato()!="") ||($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getUrl_Contrato()!=""){
$sql.="Url_Contrato='".$siga_activo_proveedorDto->getUrl_Contrato()."'";
if(($siga_activo_proveedorDto->getUrl_Otro_Doc()!="") ||($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getUrl_Otro_Doc()!=""){
$sql.="Url_Otro_Doc='".$siga_activo_proveedorDto->getUrl_Otro_Doc()."'";
if(($siga_activo_proveedorDto->getUrl_Factura()!="") ||($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getUrl_Factura()!=""){
$sql.="Url_Factura='".$siga_activo_proveedorDto->getUrl_Factura()."'";
if(($siga_activo_proveedorDto->getUrl_Xml()!="") ||($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getUrl_Xml()!=""){
$sql.="Url_Xml='".$siga_activo_proveedorDto->getUrl_Xml()."'";
if(($siga_activo_proveedorDto->getLink()!="") ||($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getLink()!=""){
$sql.="Link='".$siga_activo_proveedorDto->getLink()."'";
if(($siga_activo_proveedorDto->getFech_Inser()!="") ||($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_activo_proveedorDto->getFech_Inser()."'";
if(($siga_activo_proveedorDto->getUsr_Inser()!="") ||($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_activo_proveedorDto->getUsr_Inser()."'";
if(($siga_activo_proveedorDto->getFech_Mod()!="") ||($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_activo_proveedorDto->getFech_Mod()."'";
if(($siga_activo_proveedorDto->getUsr_Mod()!="") ||($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_activo_proveedorDto->getUsr_Mod()."'";
if(($siga_activo_proveedorDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_activo_proveedorDto->getEstatus_Reg()!=""){
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

$tmp[$contador] = new Siga_activo_proveedorDTO();
$tmp[$contador]->setId_activo_proveedor($row["Id_activo_proveedor"]);
$tmp[$contador]->setId_Activo($row["id_Activo"]);
$tmp[$contador]->setNumOrdenCompra($row["NumOrdenCompra"]);
$tmp[$contador]->setNumFactura($row["NumFactura"]);
$tmp[$contador]->setFechaFactura($row["FechaFactura"]);
$tmp[$contador]->setUUID(rtrim(ltrim($row["UUID"])));
$tmp[$contador]->setFolio_Fiscal(rtrim(ltrim($row["Folio_Fiscal"])));
$tmp[$contador]->setMonto_F(rtrim(ltrim($row["Monto_F"])));
$tmp[$contador]->setMontoFactura(rtrim(ltrim($row["MontoFactura"])));
$tmp[$contador]->setNumContrato($row["NumContrato"]);
$tmp[$contador]->setVidaUtilFabricante($row["VidaUtilFabricante"]);
$tmp[$contador]->setVidaUtilCHS($row["VidaUtilCHS"]);
$tmp[$contador]->setGarantia(rtrim(ltrim($row["Garantia"])));
$tmp[$contador]->setExtGarantia(rtrim(ltrim($row["ExtGarantia"])));
$tmp[$contador]->setFecha_Vencimiento(rtrim(ltrim($row["Fecha_Vencimiento"])));
$tmp[$contador]->setPoliza_Url($row["Poliza_Url"]);
$tmp[$contador]->setNombreProveedor($row["NombreProveedor"]);
$tmp[$contador]->setId_Proveedor(rtrim(ltrim($row["Id_Proveedor"])));
$tmp[$contador]->setContacto(rtrim(ltrim($row["Contacto"])));
$tmp[$contador]->setTelefono(rtrim(ltrim($row["Telefono"])));
$tmp[$contador]->setDocRecibida(rtrim(ltrim($row["DocRecibida"])));
$tmp[$contador]->setAccesorios(rtrim(ltrim($row["Accesorios"])));
$tmp[$contador]->setCorreo(rtrim(ltrim($row["Correo"])));
$tmp[$contador]->setConsumibles(rtrim(ltrim($row["Consumibles"])));
$tmp[$contador]->setUrl_Contrato(rtrim(ltrim($row["Url_Contrato"])));
$tmp[$contador]->setUrl_Otro_Doc(rtrim(ltrim($row["Url_Otro_Doc"])));
$tmp[$contador]->setUrl_Factura(rtrim(ltrim($row["Url_Factura"])));
$tmp[$contador]->setUrl_Xml(rtrim(ltrim($row["Url_Xml"])));
$tmp[$contador]->setLink(rtrim(ltrim($row["Link"])));
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