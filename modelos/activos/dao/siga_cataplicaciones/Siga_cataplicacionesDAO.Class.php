<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cataplicaciones/Siga_cataplicacionesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cataplicacionesDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cataplicaciones($siga_cataplicacionesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cataplicaciones(";
if($siga_cataplicacionesDto->getId_Aplicacion()!=""){
$sql.="Id_Aplicacion";
if(($siga_cataplicacionesDto->getNom_Aplicacion()!="") ||($siga_cataplicacionesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cataplicacionesDto->getNom_Aplicacion()!=""){
$sql.="Nom_Aplicacion";
if(($siga_cataplicacionesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cataplicacionesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_cataplicacionesDto->getId_Aplicacion()!=""){
$sql.="'".$siga_cataplicacionesDto->getId_Aplicacion()."'";
if(($siga_cataplicacionesDto->getNom_Aplicacion()!="") ||($siga_cataplicacionesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cataplicacionesDto->getNom_Aplicacion()!=""){
$sql.="'".$siga_cataplicacionesDto->getNom_Aplicacion()."'";
if(($siga_cataplicacionesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cataplicacionesDto->getEstatus_Reg()!=""){
$sql.="'".$siga_cataplicacionesDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cataplicacionesDTO();
$tmp->setId_Aplicacion($this->_proveedor->lastID());
$tmp = $this->selectSiga_cataplicaciones($tmp,"",$this->_proveedor);
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
public function updateSiga_cataplicaciones($siga_cataplicacionesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cataplicaciones SET ";
if($siga_cataplicacionesDto->getId_Aplicacion()!=""){
$sql.="Id_Aplicacion='".$siga_cataplicacionesDto->getId_Aplicacion()."'";
if(($siga_cataplicacionesDto->getNom_Aplicacion()!="") ||($siga_cataplicacionesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cataplicacionesDto->getNom_Aplicacion()!=""){
$sql.="Nom_Aplicacion='".$siga_cataplicacionesDto->getNom_Aplicacion()."'";
if(($siga_cataplicacionesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cataplicacionesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cataplicacionesDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Aplicacion='".$siga_cataplicacionesDto->getId_Aplicacion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cataplicacionesDTO();
$tmp->setId_Aplicacion($siga_cataplicacionesDto->getId_Aplicacion());
$tmp = $this->selectSiga_cataplicaciones($tmp,"",$this->_proveedor);
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
public function deleteSiga_cataplicaciones($siga_cataplicacionesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cataplicaciones  WHERE Id_Aplicacion='".$siga_cataplicacionesDto->getId_Aplicacion()."'";
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
public function selectSiga_cataplicaciones($siga_cataplicacionesDto,$orden="",$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Aplicacion,Nom_Aplicacion,Estatus_Reg FROM siga_cataplicaciones ";
if(($siga_cataplicacionesDto->getId_Aplicacion()!="") ||($siga_cataplicacionesDto->getNom_Aplicacion()!="") ||($siga_cataplicacionesDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cataplicacionesDto->getId_Aplicacion()!=""){
$sql.="Id_Aplicacion='".$siga_cataplicacionesDto->getId_Aplicacion()."'";
if(($siga_cataplicacionesDto->getNom_Aplicacion()!="") ||($siga_cataplicacionesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cataplicacionesDto->getNom_Aplicacion()!=""){
$sql.="Nom_Aplicacion='".$siga_cataplicacionesDto->getNom_Aplicacion()."'";
if(($siga_cataplicacionesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cataplicacionesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cataplicacionesDto->getEstatus_Reg()."'";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_cataplicacionesDTO();
$tmp[$contador]->setId_Aplicacion($row["Id_Aplicacion"]);
$tmp[$contador]->setNom_Aplicacion($row["Nom_Aplicacion"]);
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
public function selectmenuaplicaciones($siga_cataplicacionesDto,$proveedor=null) {	
	$respuesta = "";
	$data = array();
	if ($proveedor == null) {
		$this->_conexion(null);
	} else if ($proveedor != null) {
		$this->_proveedor = $proveedor;
	}
	
	
	$this->_proveedor->execute("sp_selecmenudinamico '1','".$siga_cataplicacionesDto->getId_Aplicacion()."'");
	
	if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
		while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
			$data[] = array("Id_Menu" => $row["Id_Menu"],
				"Id_Submenu" => $row["Id_Submenu"],
				"Id_Aplicacion" => $row["Id_Aplicacion"],
				"OrdenMenu" => $row["OrdenMenu"],
				"OrdenSubmenu" => $row["OrdenSubmenu"],
				"Nom_Menu" => $row["Nom_Menu"],
				"Padre" => $row["Padre"],
				"Submenu" => $row["Submenu"]
			);
		}
	
		if(count($data)>0)
		{
			$respuesta = array("totalCount" => count($data), "data" => $data, "estatus" => "ok", "mensaje" => "Se han encontrado resultados satisfactoriamente");	
		}
		else
		{
			$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "No se encontraron resultados");
		}
	}
	else
	{
		$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "Ocurrio un error al consultar");
	}		
	
	
	return $respuesta;
	//return '{"totalCount":' . count($data) . ',"data":' . json_encode($data) . '}';
}
}
?>