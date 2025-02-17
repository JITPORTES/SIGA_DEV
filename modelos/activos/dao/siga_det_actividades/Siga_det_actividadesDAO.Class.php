<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_det_actividades/Siga_det_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_det_actividadesDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_det_actividades($siga_det_actividadesDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Det_Actividad+1) IS NULL then 1 else (max(Id_Det_Actividad + 1)) end as IndiceMaximo from siga_det_actividades ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_det_actividades on ";

$sql.="INSERT INTO siga_det_actividades(";
$sql.="Id_Det_Actividad";
$sql.=",";
$sql.="Id_Actividad";
$sql.=",";
$sql.="Num_Actividad";
$sql.=",";
$sql.="Nombre_Actividad";
$sql.=",";
$sql.="Valor_Referencia";
$sql.=",";
$sql.="Valor_Medido";
$sql.=",";
$sql.="Estatus_Actividad";
$sql.=",";
$sql.="Observaciones";
$sql.=",";
$sql.="Url_Adjunto";
$sql.=",";
$sql.="Fecha_Programada";
$sql.=",";
$sql.="Fecha_Realizada";
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
$sql.="V_Mesa";
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
$sql.="'".$siga_det_actividadesDto->getId_Actividad()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getNum_Actividad()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getNombre_Actividad()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getValor_Referencia()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getValor_Medido()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getEstatus_Actividad()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getObservaciones()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getUrl_Adjunto()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getFecha_Programada()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getFecha_Realizada()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getEstatus_Reg()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getV_Mesa()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getCampo_2()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getCampo_3()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getCampo_4()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getCampo_5()."'";
$sql.=",";
$sql.="'".$siga_det_actividadesDto->getCampo_6()."'";
$sql.=")";
//
$sql.=" set identity_insert siga_det_actividades off ";
//

if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}
if (!$this->_proveedor->error()) {
$tmp = new Siga_det_actividadesDTO();
$tmp->setId_Det_Actividad($this->_proveedor->lastID());
$tmp = $this->selectSiga_det_actividades($tmp,"",$this->_proveedor);
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
public function updateSiga_det_actividades($siga_det_actividadesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_det_actividades SET ";
if($siga_det_actividadesDto->getId_Det_Actividad()!=""){
$sql.="Id_Det_Actividad='".$siga_det_actividadesDto->getId_Det_Actividad()."'";
if(($siga_det_actividadesDto->getId_Actividad()!="")||($siga_det_actividadesDto->getNum_Actividad()!="")||($siga_det_actividadesDto->getNombre_Actividad()!="") ||($siga_det_actividadesDto->getValor_Referencia()!="") ||($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getId_Actividad()!=""){
$sql.="Id_Actividad='".$siga_det_actividadesDto->getId_Actividad()."'";
if(($siga_det_actividadesDto->getNum_Actividad()!="") || ($siga_det_actividadesDto->getNombre_Actividad()!="") ||($siga_det_actividadesDto->getValor_Referencia()!="") ||($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getNum_Actividad()!=""){
$sql.="Num_Actividad='".$siga_det_actividadesDto->getNum_Actividad()."'";
if(($siga_det_actividadesDto->getNombre_Actividad()!="") ||($siga_det_actividadesDto->getValor_Referencia()!="") ||($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getNombre_Actividad()!=""){
$sql.="Nombre_Actividad='".$siga_det_actividadesDto->getNombre_Actividad()."'";
if(($siga_det_actividadesDto->getValor_Referencia()!="") ||($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getValor_Referencia()!=""){
$sql.="Valor_Referencia='".$siga_det_actividadesDto->getValor_Referencia()."'";
if(($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getValor_Medido()!=""){
$sql.="Valor_Medido='".$siga_det_actividadesDto->getValor_Medido()."'";
if(($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getEstatus_Actividad()!=""){
$sql.="Estatus_Actividad='".$siga_det_actividadesDto->getEstatus_Actividad()."'";
if(($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getObservaciones()!=""){
$sql.="Observaciones='".$siga_det_actividadesDto->getObservaciones()."'";
if(($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getUrl_Adjunto()!=""){
$sql.="Url_Adjunto='".$siga_det_actividadesDto->getUrl_Adjunto()."'";
if(($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getFecha_Programada()!=""){
$sql.="Fecha_Programada='".$siga_det_actividadesDto->getFecha_Programada()."'";
if(($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getFecha_Realizada()!=""){
$sql.="Fecha_Realizada='".$siga_det_actividadesDto->getFecha_Realizada()."'";
if(($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_det_actividadesDto->getFech_Inser()."'";
if(($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_det_actividadesDto->getUsr_Inser()."'";
if(($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_det_actividadesDto->getFech_Mod()."'";
if(($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_det_actividadesDto->getUsr_Mod()."'";
if(($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_det_actividadesDto->getEstatus_Reg()."'";
if(($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getV_Mesa()!=""){
$sql.="V_Mesa='".$siga_det_actividadesDto->getV_Mesa()."'";
if(($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getCampo_2()!=""){
$sql.="Campo_2='".$siga_det_actividadesDto->getCampo_2()."'";
if(($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getCampo_3()!=""){
$sql.="Campo_3='".$siga_det_actividadesDto->getCampo_3()."'";
if(($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getCampo_4()!=""){
$sql.="Campo_4='".$siga_det_actividadesDto->getCampo_4()."'";
if(($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getCampo_5()!=""){
$sql.="Campo_5='".$siga_det_actividadesDto->getCampo_5()."'";
if(($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=",";
}
}
if($siga_det_actividadesDto->getCampo_6()!=""){
$sql.="Campo_6='".$siga_det_actividadesDto->getCampo_6()."'";
}
$sql.=" WHERE Id_Det_Actividad='".$siga_det_actividadesDto->getId_Det_Actividad()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_det_actividadesDTO();
$tmp->setId_Det_Actividad($siga_det_actividadesDto->getId_Det_Actividad());
$tmp = $this->selectSiga_det_actividades($tmp,"",$this->_proveedor);
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
public function deleteSiga_det_actividades($siga_det_actividadesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_det_actividades  WHERE Id_Det_Actividad='".$siga_det_actividadesDto->getId_Det_Actividad()."'";
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
public function selectSiga_det_actividades($siga_det_actividadesDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Det_Actividad,Id_Actividad,Num_Actividad,Nombre_Actividad,Valor_Referencia,Valor_Medido,Estatus_Actividad,Observaciones,Url_Adjunto,Fecha_Programada,Fecha_Realizada,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg,V_Mesa,Campo_2,Campo_3,Campo_4,Campo_5,Campo_6 FROM siga_det_actividades ";
if(($siga_det_actividadesDto->getId_Det_Actividad()!="") || ($siga_det_actividadesDto->getId_Actividad()!="") || ($siga_det_actividadesDto->getNum_Actividad()!="")||($siga_det_actividadesDto->getNombre_Actividad()!="") ||($siga_det_actividadesDto->getValor_Referencia()!="") ||($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" WHERE ";
}
if($siga_det_actividadesDto->getId_Det_Actividad()!=""){
$sql.="Id_Det_Actividad='".$siga_det_actividadesDto->getId_Det_Actividad()."'";
if(($siga_det_actividadesDto->getId_Actividad()!="")|| ($siga_det_actividadesDto->getNum_Actividad()!="")||($siga_det_actividadesDto->getNombre_Actividad()!="") ||($siga_det_actividadesDto->getValor_Referencia()!="") ||($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getId_Actividad()!=""){
$sql.="Id_Actividad='".$siga_det_actividadesDto->getId_Actividad()."'";
if(($siga_det_actividadesDto->getNum_Actividad()!="")||($siga_det_actividadesDto->getNombre_Actividad()!="") ||($siga_det_actividadesDto->getValor_Referencia()!="") ||($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getNum_Actividad()!=""){
$sql.="Num_Actividad='".$siga_det_actividadesDto->getNum_Actividad()."'";
if(($siga_det_actividadesDto->getNombre_Actividad()!="") ||($siga_det_actividadesDto->getValor_Referencia()!="") ||($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getNombre_Actividad()!=""){
$sql.="Nombre_Actividad='".$siga_det_actividadesDto->getNombre_Actividad()."'";
if(($siga_det_actividadesDto->getValor_Referencia()!="") ||($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getValor_Referencia()!=""){
$sql.="Valor_Referencia='".$siga_det_actividadesDto->getValor_Referencia()."'";
if(($siga_det_actividadesDto->getValor_Medido()!="") ||($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getValor_Medido()!=""){
$sql.="Valor_Medido='".$siga_det_actividadesDto->getValor_Medido()."'";
if(($siga_det_actividadesDto->getEstatus_Actividad()!="") ||($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getEstatus_Actividad()!=""){
$sql.="Estatus_Actividad='".$siga_det_actividadesDto->getEstatus_Actividad()."'";
if(($siga_det_actividadesDto->getObservaciones()!="") ||($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getObservaciones()!=""){
$sql.="Observaciones='".$siga_det_actividadesDto->getObservaciones()."'";
if(($siga_det_actividadesDto->getUrl_Adjunto()!="") ||($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getUrl_Adjunto()!=""){
$sql.="Url_Adjunto='".$siga_det_actividadesDto->getUrl_Adjunto()."'";
if(($siga_det_actividadesDto->getFecha_Programada()!="") ||($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getFecha_Programada()!=""){
$sql.="Fecha_Programada='".$siga_det_actividadesDto->getFecha_Programada()."'";
if(($siga_det_actividadesDto->getFecha_Realizada()!="") ||($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getFecha_Realizada()!=""){
$sql.="Fecha_Realizada='".$siga_det_actividadesDto->getFecha_Realizada()."'";
if(($siga_det_actividadesDto->getFech_Inser()!="") ||($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_det_actividadesDto->getFech_Inser()."'";
if(($siga_det_actividadesDto->getUsr_Inser()!="") ||($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_det_actividadesDto->getUsr_Inser()."'";
if(($siga_det_actividadesDto->getFech_Mod()!="") ||($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_det_actividadesDto->getFech_Mod()."'";
if(($siga_det_actividadesDto->getUsr_Mod()!="") ||($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_det_actividadesDto->getUsr_Mod()."'";
if(($siga_det_actividadesDto->getEstatus_Reg()!="") ||($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <> '3'";
if(($siga_det_actividadesDto->getV_Mesa()!="") ||($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getV_Mesa()!=""){
$sql.="V_Mesa='".$siga_det_actividadesDto->getV_Mesa()."'";
if(($siga_det_actividadesDto->getCampo_2()!="") ||($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getCampo_2()!=""){
$sql.="Campo_2='".$siga_det_actividadesDto->getCampo_2()."'";
if(($siga_det_actividadesDto->getCampo_3()!="") ||($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getCampo_3()!=""){
$sql.="Campo_3='".$siga_det_actividadesDto->getCampo_3()."'";
if(($siga_det_actividadesDto->getCampo_4()!="") ||($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getCampo_4()!=""){
$sql.="Campo_4='".$siga_det_actividadesDto->getCampo_4()."'";
if(($siga_det_actividadesDto->getCampo_5()!="") ||($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getCampo_5()!=""){
$sql.="Campo_5='".$siga_det_actividadesDto->getCampo_5()."'";
if(($siga_det_actividadesDto->getCampo_6()!="") ){
$sql.=" AND ";
}
}
if($siga_det_actividadesDto->getCampo_6()!=""){
$sql.="Campo_6='".$siga_det_actividadesDto->getCampo_6()."'";
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
$tmp[$contador] = new Siga_det_actividadesDTO();
$tmp[$contador]->setId_Det_Actividad($row["Id_Det_Actividad"]);
$tmp[$contador]->setNum_Actividad(rtrim(ltrim($row["Num_Actividad"])));
$tmp[$contador]->setNombre_Actividad(rtrim(ltrim($row["Nombre_Actividad"])));
$tmp[$contador]->setValor_Referencia(rtrim(ltrim($row["Valor_Referencia"])));
$tmp[$contador]->setValor_Medido(rtrim(ltrim($row["Valor_Medido"])));
$tmp[$contador]->setEstatus_Actividad($row["Estatus_Actividad"]);
$tmp[$contador]->setObservaciones(rtrim(ltrim($row["Observaciones"])));
$tmp[$contador]->setUrl_Adjunto(rtrim(ltrim($row["Url_Adjunto"])));
$tmp[$contador]->setFecha_Programada(rtrim(ltrim($row["Fecha_Programada"])));
$tmp[$contador]->setFecha_Realizada(rtrim(ltrim($row["Fecha_Realizada"])));
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
$tmp[$contador]->setEstatus_Reg($row["Estatus_Reg"]);
$tmp[$contador]->setV_Mesa($row["V_Mesa"]);
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
}
?>