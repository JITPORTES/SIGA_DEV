<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_perfiles/Siga_perfilesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_perfilesDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_perfiles($siga_perfilesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_perfiles(";
if($siga_perfilesDto->getId_Perfil()!=""){
$sql.="Id_Perfil";
if(($siga_perfilesDto->getNom_Perrfil()!="") ||($siga_perfilesDto->getTipo()!="") ||($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getNom_Perrfil()!=""){
$sql.="Nom_Perrfil";
if(($siga_perfilesDto->getTipo()!="") ||($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getTipo()!=""){
$sql.="Tipo";
if(($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getFech_Inser()!=""){
$sql.="Fech_Inser";
if(($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getUsr_Inser()!=""){
$sql.="Usr_Inser";
if(($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getFech_Mod()!=""){
$sql.="Fech_Mod";
if(($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getUsr_Mod()!=""){
$sql.="Usr_Mod";
if(($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg";
}
$sql.=") VALUES(";
if($siga_perfilesDto->getId_Perfil()!=""){
$sql.="'".$siga_perfilesDto->getId_Perfil()."'";
if(($siga_perfilesDto->getNom_Perrfil()!="") ||($siga_perfilesDto->getTipo()!="") ||($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getNom_Perrfil()!=""){
$sql.="'".$siga_perfilesDto->getNom_Perrfil()."'";
if(($siga_perfilesDto->getTipo()!="") ||($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getTipo()!=""){
$sql.="'".$siga_perfilesDto->getTipo()."'";
if(($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getFech_Inser()!=""){
$sql.="'".$siga_perfilesDto->getFech_Inser()."'";
if(($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getUsr_Inser()!=""){
$sql.="'".$siga_perfilesDto->getUsr_Inser()."'";
if(($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getFech_Mod()!=""){
$sql.="'".$siga_perfilesDto->getFech_Mod()."'";
if(($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getUsr_Mod()!=""){
$sql.="'".$siga_perfilesDto->getUsr_Mod()."'";
if(($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getEstatus_Reg()!=""){
$sql.="'".$siga_perfilesDto->getEstatus_Reg()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_perfilesDTO();
$tmp->setId_Perfil($this->_proveedor->lastID());
$tmp = $this->selectSiga_perfiles($tmp,"",$this->_proveedor);
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
public function updateSiga_perfiles($siga_perfilesDto,$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_perfiles SET ";
if($siga_perfilesDto->getId_Perfil()!=""){
$sql.="Id_Perfil='".$siga_perfilesDto->getId_Perfil()."'";
if(($siga_perfilesDto->getNom_Perrfil()!="") ||($siga_perfilesDto->getTipo()!="") ||($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getNom_Perrfil()!=""){
$sql.="Nom_Perrfil='".$siga_perfilesDto->getNom_Perrfil()."'";
if(($siga_perfilesDto->getTipo()!="") ||($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getTipo()!=""){
$sql.="Tipo='".$siga_perfilesDto->getTipo()."'";
if(($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_perfilesDto->getFech_Inser()."'";
if(($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_perfilesDto->getUsr_Inser()."'";
if(($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_perfilesDto->getFech_Mod()."'";
if(($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_perfilesDto->getUsr_Mod()."'";
if(($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_perfilesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_perfilesDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Perfil='".$siga_perfilesDto->getId_Perfil()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_perfilesDTO();
$tmp->setId_Perfil($siga_perfilesDto->getId_Perfil());
$tmp = $this->selectSiga_perfiles($tmp,"",$this->_proveedor);
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
public function deleteSiga_perfiles($siga_perfilesDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_perfiles  WHERE Id_Perfil='".$siga_perfilesDto->getId_Perfil()."'";
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
public function selectSiga_perfiles($siga_perfilesDto,$orden="",$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Perfil,Nom_Perrfil,Tipo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_perfiles ";
if(($siga_perfilesDto->getId_Perfil()!="") ||($siga_perfilesDto->getNom_Perrfil()!="") ||($siga_perfilesDto->getTipo()!="") ||($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_perfilesDto->getId_Perfil()!=""){
$sql.="Id_Perfil='".$siga_perfilesDto->getId_Perfil()."'";
if(($siga_perfilesDto->getNom_Perrfil()!="") ||($siga_perfilesDto->getTipo()!="") ||($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_perfilesDto->getNom_Perrfil()!=""){
$sql.="Nom_Perrfil='".$siga_perfilesDto->getNom_Perrfil()."'";
if(($siga_perfilesDto->getTipo()!="") ||($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_perfilesDto->getTipo()!=""){
$sql.="Tipo='".$siga_perfilesDto->getTipo()."'";
if(($siga_perfilesDto->getFech_Inser()!="") ||($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_perfilesDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_perfilesDto->getFech_Inser()."'";
if(($siga_perfilesDto->getUsr_Inser()!="") ||($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_perfilesDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_perfilesDto->getUsr_Inser()."'";
if(($siga_perfilesDto->getFech_Mod()!="") ||($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_perfilesDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_perfilesDto->getFech_Mod()."'";
if(($siga_perfilesDto->getUsr_Mod()!="") ||($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_perfilesDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_perfilesDto->getUsr_Mod()."'";
if(($siga_perfilesDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_perfilesDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_perfilesDto->getEstatus_Reg()."'";
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
$tmp[$contador] = new Siga_perfilesDTO();
$tmp[$contador]->setId_Perfil($row["Id_Perfil"]);
$tmp[$contador]->setNom_Perrfil($row["Nom_Perrfil"]);
$tmp[$contador]->setTipo($row["Tipo"]);
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

public function selectmenuopciones($siga_perfilesDto,$proveedor=null) {	
	$respuesta = "";
	$data = array();
	if ($proveedor == null) {
		$this->_conexion(null);
	} else if ($proveedor != null) {
		$this->_proveedor = $proveedor;
	}
	
	
	$this->_proveedor->execute("sp_selecmenudinamico '".$siga_perfilesDto->getId_Perfil()."'");
	
	if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
		while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
			$data[] = array("Id_Menu" => $row["Id_Menu"],
				"Id_Submenu" => $row["Id_Submenu"],
				"Id_Cargo" => $row["Id_Cargo"],
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