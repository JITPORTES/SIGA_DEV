<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_ticket_chat/Siga_ticket_chatDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_ticket_chatDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_ticket_chat($siga_ticket_chatDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_ticket_chat(";
if($siga_ticket_chatDto->getId_Chat()!=""){
$sql.="Id_Chat";
if(($siga_ticket_chatDto->getId_Solicitud()!="") ||($siga_ticket_chatDto->getId_UsuarioGestor()!="") ||($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getId_Solicitud()!=""){
$sql.="Id_Solicitud";
if(($siga_ticket_chatDto->getId_UsuarioGestor()!="") ||($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getId_UsuarioGestor()!=""){
$sql.="Id_UsuarioGestor";
if(($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getId_Usuario()!=""){
$sql.="Id_Usuario";
if(($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getNombre_Gestor()!=""){
$sql.="Nombre_Gestor";
if(($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getNombre_Usuario()!=""){
$sql.="Nombre_Usuario";
if(($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getFecha_Alta()!=""){
$sql.="Fecha_Alta";
if(($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getMensaje()!=""){
$sql.="Mensaje,Id_Estatus_Proceso";
}
$sql.=") VALUES(";
if($siga_ticket_chatDto->getId_Chat()!=""){
$sql.="'".$siga_ticket_chatDto->getId_Chat()."'";
if(($siga_ticket_chatDto->getId_Solicitud()!="") ||($siga_ticket_chatDto->getId_UsuarioGestor()!="") ||($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getId_Solicitud()!=""){
$sql.="'".$siga_ticket_chatDto->getId_Solicitud()."'";
if(($siga_ticket_chatDto->getId_UsuarioGestor()!="") ||($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getId_UsuarioGestor()!=""){
$sql.="'".$siga_ticket_chatDto->getId_UsuarioGestor()."'";
if(($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getId_Usuario()!=""){
$sql.="'".$siga_ticket_chatDto->getId_Usuario()."'";
if(($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getNombre_Gestor()!=""){
$sql.="'".$siga_ticket_chatDto->getNombre_Gestor()."'";
if(($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getNombre_Usuario()!=""){
$sql.="'".$siga_ticket_chatDto->getNombre_Usuario()."'";
if(($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getFecha_Alta()!=""){
$sql.="'".$siga_ticket_chatDto->getFecha_Alta()."'";
if(($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getMensaje()!=""){
$sql.="'".$siga_ticket_chatDto->getMensaje()."'";
}
if($siga_ticket_chatDto->getId_Estatus_Proceso()!=""){
$sql.=",'".$siga_ticket_chatDto->getId_Estatus_Proceso()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_ticket_chatDTO();
$tmp->setId_Chat($this->_proveedor->lastID());
$tmp = $this->selectSiga_ticket_chat($tmp,"",$this->_proveedor);
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
public function updateSiga_ticket_chat($siga_ticket_chatDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_ticket_chat SET ";
if($siga_ticket_chatDto->getId_Chat()!=""){
$sql.="Id_Chat='".$siga_ticket_chatDto->getId_Chat()."'";
if(($siga_ticket_chatDto->getId_Solicitud()!="") ||($siga_ticket_chatDto->getId_UsuarioGestor()!="") ||($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getId_Solicitud()!=""){
$sql.="Id_Solicitud='".$siga_ticket_chatDto->getId_Solicitud()."'";
if(($siga_ticket_chatDto->getId_UsuarioGestor()!="") ||($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getId_UsuarioGestor()!=""){
$sql.="Id_UsuarioGestor='".$siga_ticket_chatDto->getId_UsuarioGestor()."'";
if(($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_ticket_chatDto->getId_Usuario()."'";
if(($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getNombre_Gestor()!=""){
$sql.="Nombre_Gestor='".$siga_ticket_chatDto->getNombre_Gestor()."'";
if(($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getNombre_Usuario()!=""){
$sql.="Nombre_Usuario='".$siga_ticket_chatDto->getNombre_Usuario()."'";
if(($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getFecha_Alta()!=""){
$sql.="Fecha_Alta='".$siga_ticket_chatDto->getFecha_Alta()."'";
if(($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=",";
}
}
if($siga_ticket_chatDto->getMensaje()!=""){
$sql.="Mensaje='".$siga_ticket_chatDto->getMensaje()."'";
}

if($siga_ticket_chatDto->getMensaje()!=""){
$sql.=",Id_Estatus_Proceso='".$siga_ticket_chatDto->getId_Estatus_Proceso()."'";
}

$sql.=" WHERE Id_Chat='".$siga_ticket_chatDto->getId_Chat()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_ticket_chatDTO();
$tmp->setId_Chat($siga_ticket_chatDto->getId_Chat());
$tmp = $this->selectSiga_ticket_chat($tmp,"",$this->_proveedor);
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
public function deleteSiga_ticket_chat($siga_ticket_chatDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_ticket_chat  WHERE Id_Chat='".$siga_ticket_chatDto->getId_Chat()."'";
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
public function selectSiga_ticket_chat($siga_ticket_chatDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT (select top 1 Id_Cirugia from siga_solicitud_tickets where siga_ticket_chat.Id_Solicitud=siga_solicitud_tickets.Id_Solicitud) as Id_Cirugia,Id_Estatus_Proceso,siga_ticket_chat.Id_Chat,Id_Solicitud,Id_UsuarioGestor,siga_ticket_chat.Id_Usuario,Nombre_Gestor,siga_ticket_chat.Nombre_Usuario,Fecha_Alta,Mensaje,STA.Url_Adjunto, 
SUG.No_Usuario as No_Empl_Gestor, SUS.No_Usuario as No_Empl_Solicitante 
,(select top 1 usuario_sistema_hospitalario from empleados_chs where empleados_chs.num_empleado=SUG.No_Usuario) as Gestor_Assist
,(select top 1 usuario_sistema_hospitalario from empleados_chs where empleados_chs.num_empleado=SUS.No_Usuario) as Usuario_Assist
,(select top 1 Iniciar_SLA_Juridico from siga_solicitud_tickets st where st.Id_Solicitud=siga_ticket_chat.Id_Solicitud) as Iniciar_SLA_Juridico
, stuff((
SELECT '<a href=''../Archivos/Archivos-Chat/'+ Url_Adjunto +'''  target=''_blank''>Ver Adjunto </a><br>' 
FROM siga_cat_ticket_adjuntos
WHERE siga_cat_ticket_adjuntos.Id_Chat=siga_ticket_chat.Id_Chat
FOR XML PATH ('')),1,1,''
) as Adjuntos
FROM siga_ticket_chat 
left join siga_cat_ticket_adjuntos STA on siga_ticket_chat.Id_Chat=STA.Id_Chat 
left join siga_usuarios SUG on  siga_ticket_chat.Id_UsuarioGestor=SUG.Id_Usuario 
left join siga_usuarios SUS on  siga_ticket_chat.Id_Usuario=SUS.Id_Usuario ";
if(($siga_ticket_chatDto->getId_Chat()!="") ||($siga_ticket_chatDto->getId_Solicitud()!="") ||($siga_ticket_chatDto->getId_UsuarioGestor()!="") ||($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=" WHERE ";
}
if($siga_ticket_chatDto->getId_Chat()!=""){
$sql.="siga_ticket_chat.Id_Chat='".$siga_ticket_chatDto->getId_Chat()."'";
if(($siga_ticket_chatDto->getId_Solicitud()!="") ||($siga_ticket_chatDto->getId_UsuarioGestor()!="") ||($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_chatDto->getId_Solicitud()!=""){
$sql.="Id_Solicitud='".$siga_ticket_chatDto->getId_Solicitud()."'";
if(($siga_ticket_chatDto->getId_UsuarioGestor()!="") ||($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_chatDto->getId_UsuarioGestor()!=""){
$sql.="Id_UsuarioGestor='".$siga_ticket_chatDto->getId_UsuarioGestor()."'";
if(($siga_ticket_chatDto->getId_Usuario()!="") ||($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_chatDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_ticket_chatDto->getId_Usuario()."'";
if(($siga_ticket_chatDto->getNombre_Gestor()!="") ||($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_chatDto->getNombre_Gestor()!=""){
$sql.="Nombre_Gestor='".$siga_ticket_chatDto->getNombre_Gestor()."'";
if(($siga_ticket_chatDto->getNombre_Usuario()!="") ||($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_chatDto->getNombre_Usuario()!=""){
$sql.="Nombre_Usuario='".$siga_ticket_chatDto->getNombre_Usuario()."'";
if(($siga_ticket_chatDto->getFecha_Alta()!="") ||($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_chatDto->getFecha_Alta()!=""){
$sql.="Fecha_Alta='".$siga_ticket_chatDto->getFecha_Alta()."'";
if(($siga_ticket_chatDto->getMensaje()!="") ){
$sql.=" AND ";
}
}
if($siga_ticket_chatDto->getMensaje()!=""){
$sql.="Mensaje='".$siga_ticket_chatDto->getMensaje()."'";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.=" order by Fecha_Alta asc ";
}
//echo "<pre>";
//echo $sql;
//echo "</pre>";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
$tmp = [];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$Adjuntos=$row["Adjuntos"];
$Adjuntos=str_replace("&lt;",'<', $Adjuntos);
$Adjuntos=str_replace("lt;", '<', $Adjuntos);
$Adjuntos=str_replace("&gt;",'>', $Adjuntos);	
	
	
$tmp[$contador] = new Siga_ticket_chatDTO();
$tmp[$contador]->setId_Chat($row["Id_Chat"]);
$tmp[$contador]->setId_Solicitud($row["Id_Solicitud"]);
$tmp[$contador]->setId_Cirugia($row["Id_Cirugia"]);
$tmp[$contador]->setId_UsuarioGestor($row["Id_UsuarioGestor"]);
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setNombre_Gestor($row["Nombre_Gestor"]);
$tmp[$contador]->setNombre_Usuario($row["Nombre_Usuario"]);
$tmp[$contador]->setFecha_Alta($row["Fecha_Alta"]);
$tmp[$contador]->setMensaje(rtrim(ltrim($row["Mensaje"])));
$tmp[$contador]->setId_Estatus_Proceso($row["Id_Estatus_Proceso"]);
$tmp[$contador]->setUrl_Adjunto(rtrim(ltrim($row["Url_Adjunto"])));
$tmp[$contador]->setNo_Empl_Gestor(rtrim(ltrim($row["No_Empl_Gestor"])));
$tmp[$contador]->setNo_Empl_Solicitante(rtrim(ltrim($row["No_Empl_Solicitante"])));
$tmp[$contador]->setUsuario_Assist(rtrim(ltrim($row["Usuario_Assist"])));
$tmp[$contador]->setGestor_Assist(rtrim(ltrim($row["Gestor_Assist"])));
$tmp[$contador]->setIniciar_SLA_Juridico(rtrim(ltrim($row["Iniciar_SLA_Juridico"])));
$tmp[$contador]->setAdjuntos($Adjuntos);
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