<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_actividades/Siga_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_actividadesDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_actividades($siga_actividadesDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Actividad+1) IS NULL then 1 else (max(Id_Actividad + 1)) end as IndiceMaximo from siga_actividades ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_actividades on ";
$sql.="INSERT INTO siga_actividades(";
$sql.="Id_Actividad";
$sql.=",";
$sql.="Id_Area";
$sql.=",";
$sql.="Tipo_Actividad";
$sql.=",";
$sql.="Id_Activo";
$sql.=",";
$sql.="Nombre_Rutina";
$sql.=",";
if($siga_actividadesDto->getId_Frecuencia()!=""){
$sql.="Id_Frecuencia";
$sql.=",";
}
$sql.="Descripcion";
$sql.=",";
if($siga_actividadesDto->getId_Gestor()!=""){
$sql.="Id_Gestor";
$sql.=",";
}
if($siga_actividadesDto->getNombre_Ejecutante()!=""){
$sql.="Nombre_Ejecutante";
$sql.=",";
}
$sql.="Realiza";
$sql.=",";
$sql.="url_documentos_adjuntos";
$sql.=",";
$sql.="vincular_mesa_ayuda";
$sql.=",";
$sql.="Usuario_Responsable";
$sql.=",";
$sql.="Motivo_Servicio";
$sql.=",";
$sql.="Fecha_Programada";
$sql.=",";
$sql.="Fecha_Realizada";
$sql.=",";
$sql.="Mant_RAC1";
$sql.=",";
$sql.="Mant_RAC2";
$sql.=",";
$sql.="Mant_RAC3";
$sql.=",";
$sql.="Mant_RAC4";
$sql.=",";
$sql.="Cantidad_1";
$sql.=",";
$sql.="Cantidad_2";
$sql.=",";
$sql.="Cantidad_3";
$sql.=",";
$sql.="Cantidad_4";
$sql.=",";
$sql.="Costo_1";
$sql.=",";
$sql.="Costo_2";
$sql.=",";
$sql.="Costo_3";
$sql.=",";
$sql.="Costo_4";
$sql.=",";
$sql.="Horas";
$sql.=",";
$sql.="Costos_Materiales_CE";
$sql.=",";
$sql.="Mano_Obra_CE";
$sql.=",";
$sql.="Total_CE";
$sql.=",";
$sql.="Costos_Materiales_CI";
$sql.=",";
$sql.="Mano_Obra_CI";
$sql.=",";
$sql.="Total_CI";
$sql.=",";
$sql.="Ahorro";
$sql.=",";
$sql.="Comentarios";
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
$sql.=",";
if($siga_actividadesDto->getId_Motivo_Real()!=""){
$sql.="Id_Motivo_Real";
$sql.=",";
}
$sql.="Campo_1";
$sql.=",";
$sql.="Campo_2";
$sql.=",";
$sql.="Campo_3";
$sql.=",";
$sql.="Campo_4";
$sql.=",";
$sql.="Campo_5";
$sql.=",";
$sql.="Campo_6";
$sql.=") VALUES(";
$sql.="'".$Idmaximo."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getId_Area()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getTipo_Actividad()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getId_Activo()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getNombre_Rutina()."'";
$sql.=",";
if($siga_actividadesDto->getId_Frecuencia()!=""){
$sql.="'".$siga_actividadesDto->getId_Frecuencia()."'";
$sql.=",";
}
$sql.="'".$siga_actividadesDto->getDescripcion()."'";
$sql.=",";
if($siga_actividadesDto->getId_Gestor()!=""){
$sql.="'".$siga_actividadesDto->getId_Gestor()."'";
$sql.=",";
}
if($siga_actividadesDto->getNombre_Ejecutante()!=""){
$sql.="'".$siga_actividadesDto->getNombre_Ejecutante()."'";
$sql.=",";
}
$sql.="'".$siga_actividadesDto->getRealiza()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getUrl_documentos_adjuntos()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getVincular_mesa_ayuda()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getUsuario_Responsable()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getMotivo_Servicio()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getFecha_Programada()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getFecha_Realizada()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getMant_RAC1()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getMant_RAC2()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getMant_RAC3()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getMant_RAC4()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCantidad_1()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCantidad_2()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCantidad_3()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCantidad_4()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCosto_1()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCosto_2()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCosto_3()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCosto_4()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getHoras()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCostos_Materiales_CE()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getMano_Obra_CE()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getTotal_CE()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCostos_Materiales_CI()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getMano_Obra_CI()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getTotal_CI()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getAhorro()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getComentarios()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_actividadesDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_actividadesDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getEstatus_Reg()."'";
$sql.=",";
if($siga_actividadesDto->getId_Motivo_Real()!=""){
$sql.="'".$siga_actividadesDto->getId_Motivo_Real()."'";
$sql.=",";
}
$sql.="'".$siga_actividadesDto->getCampo_1()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCampo_2()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCampo_3()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCampo_4()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCampo_5()."'";
$sql.=",";
$sql.="'".$siga_actividadesDto->getCampo_6()."'";
$sql.=")";
//
$sql.=" set identity_insert siga_actividades off ";
//
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}
if (!$this->_proveedor->error()) {
$tmp = new Siga_actividadesDTO();
$tmp->setId_Actividad($this->_proveedor->lastID());
$tmp = $this->selectSiga_actividades($tmp,"",$this->_proveedor);
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

public function updateSiga_actividades($siga_actividadesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_actividades SET ";

$sql.="Id_Area='".$siga_actividadesDto->getId_Area()."'";
$sql.=",";
$sql.="Tipo_Actividad='".$siga_actividadesDto->getTipo_Actividad()."'";
$sql.=",";
$sql.="Id_Activo='".$siga_actividadesDto->getId_Activo()."'";
$sql.=",";
$sql.="Nombre_Rutina='".$siga_actividadesDto->getNombre_Rutina()."'";
$sql.=",";
if($siga_actividadesDto->getId_Frecuencia()!=""){
$sql.="Id_Frecuencia='".$siga_actividadesDto->getId_Frecuencia()."'";
$sql.=",";
}
$sql.="Descripcion='".$siga_actividadesDto->getDescripcion()."'";
$sql.=",";
if($siga_actividadesDto->getId_Gestor()!=""){
$sql.="Id_Gestor='".$siga_actividadesDto->getId_Gestor()."'";
$sql.=",";
}else{
$sql.="Id_Gestor=NULL";
$sql.=",";
}
if($siga_actividadesDto->getNombre_Ejecutante()!=""){
$sql.="Nombre_Ejecutante='".$siga_actividadesDto->getNombre_Ejecutante()."'";
$sql.=",";
}else{
$sql.="Nombre_Ejecutante=NULL";
$sql.=",";
}
$sql.="Realiza='".$siga_actividadesDto->getRealiza()."'";
$sql.=",";
$sql.="url_documentos_adjuntos='".$siga_actividadesDto->getUrl_documentos_adjuntos()."'";
$sql.=",";
$sql.="vincular_mesa_ayuda='".$siga_actividadesDto->getVincular_mesa_ayuda()."'";
$sql.=",";
$sql.="Usuario_Responsable='".$siga_actividadesDto->getUsuario_Responsable()."'";
$sql.=",";
$sql.="Motivo_Servicio='".$siga_actividadesDto->getMotivo_Servicio()."'";
$sql.=",";
$sql.="Fecha_Programada='".$siga_actividadesDto->getFecha_Programada()."'";
$sql.=",";
$sql.="Fecha_Realizada='".$siga_actividadesDto->getFecha_Realizada()."'";
$sql.=",";
$sql.="Mant_RAC1='".$siga_actividadesDto->getMant_RAC1()."'";
$sql.=",";
$sql.="Mant_RAC2='".$siga_actividadesDto->getMant_RAC2()."'";
$sql.=",";
$sql.="Mant_RAC3='".$siga_actividadesDto->getMant_RAC3()."'";
$sql.=",";
$sql.="Mant_RAC4='".$siga_actividadesDto->getMant_RAC4()."'";
$sql.=",";
$sql.="Cantidad_1='".$siga_actividadesDto->getCantidad_1()."'";
$sql.=",";
$sql.="Cantidad_2='".$siga_actividadesDto->getCantidad_2()."'";
$sql.=",";
$sql.="Cantidad_3='".$siga_actividadesDto->getCantidad_3()."'";
$sql.=",";
$sql.="Cantidad_4='".$siga_actividadesDto->getCantidad_4()."'";
$sql.=",";
$sql.="Costo_1='".$siga_actividadesDto->getCosto_1()."'";
$sql.=",";
$sql.="Costo_2='".$siga_actividadesDto->getCosto_2()."'";
$sql.=",";
$sql.="Costo_3='".$siga_actividadesDto->getCosto_3()."'";
$sql.=",";
$sql.="Costo_4='".$siga_actividadesDto->getCosto_4()."'";
$sql.=",";
$sql.="Horas='".$siga_actividadesDto->getHoras()."'";
$sql.=",";
$sql.="Costos_Materiales_CE='".$siga_actividadesDto->getCostos_Materiales_CE()."'";
$sql.=",";
$sql.="Mano_Obra_CE='".$siga_actividadesDto->getMano_Obra_CE()."'";
$sql.=",";
$sql.="Total_CE='".$siga_actividadesDto->getTotal_CE()."'";
$sql.=",";
$sql.="Costos_Materiales_CI='".$siga_actividadesDto->getCostos_Materiales_CI()."'";
$sql.=",";
$sql.="Mano_Obra_CI='".$siga_actividadesDto->getMano_Obra_CI()."'";
$sql.=",";
$sql.="Total_CI='".$siga_actividadesDto->getTotal_CI()."'";
$sql.=",";
$sql.="Ahorro='".$siga_actividadesDto->getAhorro()."'";
$sql.=",";
$sql.="Comentarios='".$siga_actividadesDto->getComentarios()."'";
$sql.=",";
$sql.="Fech_Inser='".$siga_actividadesDto->getFech_Inser()."'";
$sql.=",";
$sql.="Usr_Inser='".$siga_actividadesDto->getUsr_Inser()."'";
$sql.=",";
$sql.="Fech_Mod='".$siga_actividadesDto->getFech_Mod()."'";
$sql.=",";
$sql.="Usr_Mod='".$siga_actividadesDto->getUsr_Mod()."'";
$sql.=",";
$sql.="Estatus_Reg='".$siga_actividadesDto->getEstatus_Reg()."'";
$sql.=",";
if($siga_actividadesDto->getId_Motivo_Real()!=""){
$sql.="Id_Motivo_Real='".$siga_actividadesDto->getId_Motivo_Real()."'";
$sql.=",";
}
$sql.="Campo_1='".$siga_actividadesDto->getCampo_1()."'";
$sql.=",";
$sql.="Campo_2='".$siga_actividadesDto->getCampo_2()."'";
$sql.=",";
$sql.="Campo_3='".$siga_actividadesDto->getCampo_3()."'";
$sql.=",";
$sql.="Campo_4='".$siga_actividadesDto->getCampo_4()."'";
$sql.=",";
$sql.="Campo_5='".$siga_actividadesDto->getCampo_5()."'";
$sql.=",";
$sql.="Campo_6='".$siga_actividadesDto->getCampo_6()."'";

$sql.=" WHERE Id_Actividad='".$siga_actividadesDto->getId_Actividad()."'";

$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_actividadesDTO();
$tmp->setId_Actividad($siga_actividadesDto->getId_Actividad());
$tmp = $this->selectSiga_actividades($tmp,"",$this->_proveedor);
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
public function deleteSiga_actividades($siga_actividadesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_actividades  WHERE Id_Actividad='".$siga_actividadesDto->getId_Actividad()."'";
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
public function selectSiga_actividades($siga_actividadesDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Actividad,Id_Area,Tipo_Actividad,Id_Activo,Nombre_Rutina,Id_Frecuencia,Descripcion,Id_Gestor,Nombre_Ejecutante,Realiza,url_documentos_adjuntos,vincular_mesa_ayuda,Usuario_Responsable,Motivo_Servicio,Fecha_Programada,Fecha_Realizada,Mant_RAC1,Mant_RAC2,Mant_RAC3,Mant_RAC4,Cantidad_1,Cantidad_2,Cantidad_3,Cantidad_4,Costo_1,Costo_2,Costo_3,Costo_4,Horas,Costos_Materiales_CE,Mano_Obra_CE,Total_CE,Costos_Materiales_CI,Mano_Obra_CI,Total_CI,Ahorro,Comentarios,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg,Id_Motivo_Real,Campo_1,Campo_2,Campo_3,Campo_4,Campo_5,Campo_6 
	,(select Desc_Frecuencia from siga_cat_frecuencia where  siga_actividades.Id_Frecuencia=siga_cat_frecuencia.Id_Frecuencia) as Desc_Frec, 
	(select AF_BC from siga_activos SA where SA.Id_Activo=siga_actividades.Id_Activo) as AF_BC,
	(select Nombre_Completo from siga_activos SA where SA.Id_Activo=siga_actividades.Id_Activo) as Responsable_Activo,
	(select Nombre_Usuario from siga_usuarios SU where SU.Id_Usuario=siga_actividades.Id_Gestor) as Gestor_Asignado
FROM siga_actividades
";
if(($siga_actividadesDto->getId_Actividad()!="") ||($siga_actividadesDto->getId_Area()!="") ||($siga_actividadesDto->getTipo_Actividad()!="") ||($siga_actividadesDto->getId_Activo()!="") ||($siga_actividadesDto->getNombre_Rutina()!="") ||($siga_actividadesDto->getId_Frecuencia()!="") ||($siga_actividadesDto->getDescripcion()!="") || ($siga_actividadesDto->getId_Gestor()!="") || ($siga_actividadesDto->getNombre_Ejecutante()!="") || ($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" WHERE ";
}
if($siga_actividadesDto->getId_Actividad()!=""){
$sql.="Id_Actividad='".$siga_actividadesDto->getId_Actividad()."'";
if(($siga_actividadesDto->getId_Area()!="") ||($siga_actividadesDto->getTipo_Actividad()!="") ||($siga_actividadesDto->getId_Activo()!="") ||($siga_actividadesDto->getNombre_Rutina()!="") ||($siga_actividadesDto->getId_Frecuencia()!="") ||($siga_actividadesDto->getDescripcion()!="") || ($siga_actividadesDto->getId_Gestor()!="") || ($siga_actividadesDto->getNombre_Ejecutante()!="") || ($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_actividadesDto->getId_Area()."'";
if(($siga_actividadesDto->getTipo_Actividad()!="") ||($siga_actividadesDto->getId_Activo()!="") ||($siga_actividadesDto->getNombre_Rutina()!="") ||($siga_actividadesDto->getId_Frecuencia()!="") ||($siga_actividadesDto->getDescripcion()!="") || ($siga_actividadesDto->getId_Gestor()!="") || ($siga_actividadesDto->getNombre_Ejecutante()!="") || ($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getTipo_Actividad()!=""){
$sql.="Tipo_Actividad='".$siga_actividadesDto->getTipo_Actividad()."'";
if(($siga_actividadesDto->getId_Activo()!="") ||($siga_actividadesDto->getNombre_Rutina()!="") ||($siga_actividadesDto->getId_Frecuencia()!="") ||($siga_actividadesDto->getDescripcion()!="") || ($siga_actividadesDto->getId_Gestor()!="") || ($siga_actividadesDto->getNombre_Ejecutante()!="") || ($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getId_Activo()!=""){
$sql.="Id_Activo='".$siga_actividadesDto->getId_Activo()."'";
if(($siga_actividadesDto->getNombre_Rutina()!="") ||($siga_actividadesDto->getId_Frecuencia()!="") ||($siga_actividadesDto->getDescripcion()!="") || ($siga_actividadesDto->getId_Gestor()!="") || ($siga_actividadesDto->getNombre_Ejecutante()!="") || ($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getNombre_Rutina()!=""){
$sql.="Nombre_Rutina='".$siga_actividadesDto->getNombre_Rutina()."'";
if(($siga_actividadesDto->getId_Frecuencia()!="") ||($siga_actividadesDto->getDescripcion()!="") || ($siga_actividadesDto->getId_Gestor()!="") || ($siga_actividadesDto->getNombre_Ejecutante()!="") || ($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getId_Frecuencia()!=""){
$sql.="Id_Frecuencia='".$siga_actividadesDto->getId_Frecuencia()."'";
if(($siga_actividadesDto->getDescripcion()!="") || ($siga_actividadesDto->getId_Gestor()!="") || ($siga_actividadesDto->getNombre_Ejecutante()!="") || ($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getDescripcion()!=""){
$sql.="Descripcion='".$siga_actividadesDto->getDescripcion()."'";
if(($siga_actividadesDto->getId_Gestor()!="") || ($siga_actividadesDto->getNombre_Ejecutante()!="") || ($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getId_Gestor()!=""){
$sql.="Id_Gestor=".$siga_actividadesDto->getId_Gestor();
if(($siga_actividadesDto->getNombre_Ejecutante()!="") || ($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getNombre_Ejecutante()!=""){
$sql.="Nombre_Ejecutante='".$siga_actividadesDto->getNombre_Ejecutante()."'";
if(($siga_actividadesDto->getRealiza()!="") ||($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getRealiza()!=""){
$sql.="Realiza='".$siga_actividadesDto->getRealiza()."'";
if(($siga_actividadesDto->getUrl_documentos_adjuntos()!="") ||($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getUrl_documentos_adjuntos()!=""){
$sql.="url_documentos_adjuntos='".$siga_actividadesDto->getUrl_documentos_adjuntos()."'";
if(($siga_actividadesDto->getVincular_mesa_ayuda()!="") ||($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getVincular_mesa_ayuda()!=""){
$sql.="vincular_mesa_ayuda='".$siga_actividadesDto->getVincular_mesa_ayuda()."'";
if(($siga_actividadesDto->getUsuario_Responsable()!="") ||($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getUsuario_Responsable()!=""){
$sql.="Usuario_Responsable='".$siga_actividadesDto->getUsuario_Responsable()."'";
if(($siga_actividadesDto->getMotivo_Servicio()!="") ||($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getMotivo_Servicio()!=""){
$sql.="Motivo_Servicio='".$siga_actividadesDto->getMotivo_Servicio()."'";
if(($siga_actividadesDto->getFecha_Programada()!="") ||($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getFecha_Programada()!=""){
$sql.="Fecha_Programada='".$siga_actividadesDto->getFecha_Programada()."'";
if(($siga_actividadesDto->getFecha_Realizada()!="") ||($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getFecha_Realizada()!=""){
$sql.="Fecha_Realizada='".$siga_actividadesDto->getFecha_Realizada()."'";
if(($siga_actividadesDto->getMant_RAC1()!="") ||($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getMant_RAC1()!=""){
$sql.="Mant_RAC1='".$siga_actividadesDto->getMant_RAC1()."'";
if(($siga_actividadesDto->getMant_RAC2()!="") ||($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getMant_RAC2()!=""){
$sql.="Mant_RAC2='".$siga_actividadesDto->getMant_RAC2()."'";
if(($siga_actividadesDto->getMant_RAC3()!="") ||($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getMant_RAC3()!=""){
$sql.="Mant_RAC3='".$siga_actividadesDto->getMant_RAC3()."'";
if(($siga_actividadesDto->getMant_RAC4()!="") ||($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getMant_RAC4()!=""){
$sql.="Mant_RAC4='".$siga_actividadesDto->getMant_RAC4()."'";
if(($siga_actividadesDto->getHoras()!="") ||($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getHoras()!=""){
$sql.="Horas='".$siga_actividadesDto->getHoras()."'";
if(($siga_actividadesDto->getCostos_Materiales_CE()!="") ||($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getCostos_Materiales_CE()!=""){
$sql.="Costos_Materiales_CE='".$siga_actividadesDto->getCostos_Materiales_CE()."'";
if(($siga_actividadesDto->getMano_Obra_CE()!="") ||($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getMano_Obra_CE()!=""){
$sql.="Mano_Obra_CE='".$siga_actividadesDto->getMano_Obra_CE()."'";
if(($siga_actividadesDto->getTotal_CE()!="") ||($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getTotal_CE()!=""){
$sql.="Total_CE='".$siga_actividadesDto->getTotal_CE()."'";
if(($siga_actividadesDto->getCostos_Materiales_CI()!="") ||($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getCostos_Materiales_CI()!=""){
$sql.="Costos_Materiales_CI='".$siga_actividadesDto->getCostos_Materiales_CI()."'";
if(($siga_actividadesDto->getMano_Obra_CI()!="") ||($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getMano_Obra_CI()!=""){
$sql.="Mano_Obra_CI='".$siga_actividadesDto->getMano_Obra_CI()."'";
if(($siga_actividadesDto->getTotal_CI()!="") ||($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getTotal_CI()!=""){
$sql.="Total_CI='".$siga_actividadesDto->getTotal_CI()."'";
if(($siga_actividadesDto->getAhorro()!="") ||($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getAhorro()!=""){
$sql.="Ahorro='".$siga_actividadesDto->getAhorro()."'";
if(($siga_actividadesDto->getComentarios()!="") ||($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getComentarios()!=""){
$sql.="Comentarios='".$siga_actividadesDto->getComentarios()."'";
if(($siga_actividadesDto->getFech_Inser()!="") ||($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_actividadesDto->getFech_Inser()."'";
if(($siga_actividadesDto->getUsr_Inser()!="") ||($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_actividadesDto->getUsr_Inser()."'";
if(($siga_actividadesDto->getFech_Mod()!="") ||($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_actividadesDto->getFech_Mod()."'";
if(($siga_actividadesDto->getUsr_Mod()!="") ||($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_actividadesDto->getUsr_Mod()."'";
if(($siga_actividadesDto->getEstatus_Reg()!="") ||($siga_actividadesDto->getId_Motivo_Real()!="") ||($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <> '3'";
if(($siga_actividadesDto->getId_Motivo_Real()!="") || ($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}

if($siga_actividadesDto->getId_Motivo_Real()!=""){
$sql.="Id_Motivo_Real='".$siga_actividadesDto->getId_Motivo_Real()."'";
if(($siga_actividadesDto->getCampo_1()!="") ||($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}

if($siga_actividadesDto->getCampo_1()!=""){
$sql.="Campo_1='".$siga_actividadesDto->getCampo_1()."'";
if(($siga_actividadesDto->getCampo_2()!="") ||($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getCampo_2()!=""){
$sql.="Campo_2='".$siga_actividadesDto->getCampo_2()."'";
if(($siga_actividadesDto->getCampo_3()!="") ||($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getCampo_3()!=""){
$sql.="Campo_3='".$siga_actividadesDto->getCampo_3()."'";
if(($siga_actividadesDto->getCampo_4()!="") ||($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getCampo_4()!=""){
$sql.="Campo_4='".$siga_actividadesDto->getCampo_4()."'";
if(($siga_actividadesDto->getCampo_5()!="") ||($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getCampo_5()!=""){
$sql.="Campo_5='".$siga_actividadesDto->getCampo_5()."'";
if(($siga_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_actividadesDto->getCampo_6()!=""){
$sql.="Campo_6='".$siga_actividadesDto->getCampo_6()."'";
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
$tmp[$contador] = new Siga_actividadesDTO();
$tmp[$contador]->setId_Actividad($row["Id_Actividad"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setTipo_Actividad($row["Tipo_Actividad"]);
$tmp[$contador]->setId_Activo($row["Id_Activo"]);
$tmp[$contador]->setNombre_Rutina(rtrim(ltrim($row["Nombre_Rutina"])));
$tmp[$contador]->setId_Frecuencia(rtrim(ltrim($row["Id_Frecuencia"])));
$tmp[$contador]->setDesc_Frec(rtrim(ltrim($row["Desc_Frec"])));
$tmp[$contador]->setDescripcion(rtrim(ltrim($row["Descripcion"])));
$tmp[$contador]->setId_Gestor(rtrim(ltrim($row["Id_Gestor"])));
$tmp[$contador]->setNombre_Ejecutante(rtrim(ltrim($row["Nombre_Ejecutante"])));
$tmp[$contador]->setRealiza($row["Realiza"]);
$tmp[$contador]->setUrl_documentos_adjuntos(rtrim(ltrim($row["url_documentos_adjuntos"])));
$tmp[$contador]->setVincular_mesa_ayuda($row["vincular_mesa_ayuda"]);
$tmp[$contador]->setUsuario_Responsable(rtrim(ltrim($row["Usuario_Responsable"])));
$tmp[$contador]->setMotivo_Servicio(rtrim(ltrim($row["Motivo_Servicio"])));
$tmp[$contador]->setFecha_Programada(rtrim(ltrim($row["Fecha_Programada"])));
$tmp[$contador]->setFecha_Realizada(rtrim(ltrim($row["Fecha_Realizada"])));
$tmp[$contador]->setMant_RAC1(rtrim(ltrim($row["Mant_RAC1"])));
$tmp[$contador]->setMant_RAC2(rtrim(ltrim($row["Mant_RAC2"])));
$tmp[$contador]->setMant_RAC3(rtrim(ltrim($row["Mant_RAC3"])));
$tmp[$contador]->setMant_RAC4(rtrim(ltrim($row["Mant_RAC4"])));
$tmp[$contador]->setCantidad_1(rtrim(ltrim($row["Cantidad_1"])));
$tmp[$contador]->setCantidad_2(rtrim(ltrim($row["Cantidad_2"])));
$tmp[$contador]->setCantidad_3(rtrim(ltrim($row["Cantidad_3"])));
$tmp[$contador]->setCantidad_4(rtrim(ltrim($row["Cantidad_4"])));
$tmp[$contador]->setCosto_1(rtrim(ltrim($row["Costo_1"])));
$tmp[$contador]->setCosto_2(rtrim(ltrim($row["Costo_2"])));
$tmp[$contador]->setCosto_3(rtrim(ltrim($row["Costo_3"])));
$tmp[$contador]->setCosto_4(rtrim(ltrim($row["Costo_4"])));
$tmp[$contador]->setHoras(rtrim(ltrim($row["Horas"])));
$tmp[$contador]->setCostos_Materiales_CE(rtrim(ltrim($row["Costos_Materiales_CE"])));
$tmp[$contador]->setMano_Obra_CE(rtrim(ltrim($row["Mano_Obra_CE"])));
$tmp[$contador]->setTotal_CE(rtrim(ltrim($row["Total_CE"])));
$tmp[$contador]->setCostos_Materiales_CI(rtrim(ltrim($row["Costos_Materiales_CI"])));
$tmp[$contador]->setMano_Obra_CI(rtrim(ltrim($row["Mano_Obra_CI"])));
$tmp[$contador]->setTotal_CI(rtrim(ltrim($row["Total_CI"])));
$tmp[$contador]->setAhorro(rtrim(ltrim($row["Ahorro"])));
$tmp[$contador]->setComentarios(rtrim(ltrim($row["Comentarios"])));
$tmp[$contador]->setAF_BC(rtrim(ltrim($row["AF_BC"])));
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setId_Motivo_Real($row["Id_Motivo_Real"]);
$tmp[$contador]->setGestor_Asignado($row["Gestor_Asignado"]);
$tmp[$contador]->setResponsable_Activo($row["Responsable_Activo"]);
$tmp[$contador]->setCampo_1($row["Campo_1"]);
$tmp[$contador]->setCampo_2($row["Campo_2"]);
$tmp[$contador]->setCampo_3($row["Campo_3"]);
$tmp[$contador]->setCampo_4($row["Campo_4"]);
$tmp[$contador]->setCampo_5($row["Campo_5"]);
$tmp[$contador]->setCampo_6($row["Campo_6"]);
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

public function llenarDataTable($siga_actividadesDto, $draw,$columns,$order,$start,$length,$search, $proveedor = null) {
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
                if($value["data"]!='Id_Actividad' AND $value["data"]!='function')
                $criterios.=' ' . $value["data"] . " LIKE '%" . $search["value"] . "%'" . ' OR';
            }
            $criterios = $criterios != "" ? ('AND (' . substr($criterios, 0, -2) . ')') : '';
        }
        $ordenamiento='';        
        if ($order != ''AND count($order)> 0) {
            $order=$order[0];
            $aux=$columns[$order["column"]];
			if($aux["data"] !="function")
			{
				$ordenamiento=' ORDER BY '.$aux["data"].' '.$order["dir"];
			}
        }
        $pagina='';
        if($start!='' AND $length!=''){
            $pagina='  OFFSET '.$start.' ROWS FETCH NEXT '.$length.' ROWS ONLY ';
        }
		
		
        $this->_proveedor->execute("SELECT Id_Actividad,Motivo_Servicio,SA.Id_Area,SA.Tipo_Actividad,SA.Id_Activo,A.Nombre_Activo, A.AF_BC, CASE when A.Estatus_Reg ='3' then 'Baja' else 'Activo' end as Estatus_Activo, SA.Nombre_Rutina,SA.Id_Frecuencia,SCF.Desc_Frecuencia,SA.Descripcion,SA.Realiza,SA.url_documentos_adjuntos,SA.vincular_mesa_ayuda,SA.Fech_Inser,SA.Usr_Inser,SA.Fech_Mod,SA.Usr_Mod,SA.Estatus_Reg, A.Marca, A.Modelo, A.NumSerie FROM siga_actividades SA left join siga_activos A on SA.Id_Activo=A.Id_Activo left join siga_cat_frecuencia SCF on SA.Id_Frecuencia= SCF.Id_Frecuencia where SA.Estatus_Reg <> '3' and SA.Id_Area='".$siga_actividadesDto->getId_Area()."' and SA.Tipo_Actividad='".$siga_actividadesDto->getTipo_Actividad()."' and A.Id_Situacion_Activo<>'12' and Id_Actividad LIKE '%%' "
                . "".$criterios.$ordenamiento.$pagina);
					
		
		
        
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $data[] = array("Id_Actividad" => $row["Id_Actividad"],
                    "Nombre_Activo" => $row["Nombre_Activo"],
					"AF_BC" => $row["AF_BC"],
					"Estatus_Activo" => $row["Estatus_Activo"],
					"Nombre_Rutina" => $row["Nombre_Rutina"],
					"Id_Frecuencia" => $row["Id_Frecuencia"],
					"Descripcion" => $row["Descripcion"],
					"Desc_Frecuencia" => $row["Desc_Frecuencia"],					
					"Marca" => $row["Marca"],
					"Modelo" => $row["Modelo"],
					"NumSerie" => $row["NumSerie"],
					//
					"Motivo_Servicio" => $row["Motivo_Servicio"]
				);
            }
            $this->_proveedor->execute("select COUNT(*) AS total from (SELECT Id_Actividad,Motivo_Servicio,SA.Id_Area,SA.Tipo_Actividad,SA.Id_Activo, A.AF_BC,A.Nombre_Activo, CASE when A.Estatus_Reg ='3' then 'Baja' else 'Activo' end as Estatus_Activo, SA.Nombre_Rutina,SA.Id_Frecuencia,SCF.Desc_Frecuencia,SA.Descripcion,SA.Realiza,SA.url_documentos_adjuntos,SA.vincular_mesa_ayuda,SA.Fech_Inser,SA.Usr_Inser,SA.Fech_Mod,SA.Usr_Mod,SA.Estatus_Reg, A.Marca, A.Modelo, A.NumSerie FROM siga_actividades SA left join siga_activos A on SA.Id_Activo=A.Id_Activo left join siga_cat_frecuencia SCF on SA.Id_Frecuencia= SCF.Id_Frecuencia where SA.Estatus_Reg <> '3' and SA.Id_Area='".$siga_actividadesDto->getId_Area()."' and SA.Tipo_Actividad='".$siga_actividadesDto->getTipo_Actividad()."' and Id_Actividad LIKE '%%'". "".$criterios." ) siga_actividades");
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
		
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    }

}
?>