<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_ticket_subcategoria/Siga_cat_ticket_subcategoriaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_subcategoriaDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_ticket_subcategoria($siga_cat_ticket_subcategoriaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_ticket_subcategoria(Estatus_Reg, ";
//if($siga_cat_ticket_subcategoriaDto->getId_Subcategoria()!=""){
//$sql.="Id_Subcategoria";
//if(($siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()!="") ||($siga_cat_ticket_subcategoriaDto->getId_Categoria()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()!=""){
$sql.="Desc_Subcategoria";
if(($siga_cat_ticket_subcategoriaDto->getId_Categoria()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_subcategoriaDto->getId_Categoria()!=""){
$sql.="Id_Categoria";
}
$sql.=") VALUES(1, ";
//if($siga_cat_ticket_subcategoriaDto->getId_Subcategoria()!=""){
//$sql.="'".$siga_cat_ticket_subcategoriaDto->getId_Subcategoria()."'";
//if(($siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()!="") ||($siga_cat_ticket_subcategoriaDto->getId_Categoria()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()!=""){
$sql.="'".$siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()."'";
if(($siga_cat_ticket_subcategoriaDto->getId_Categoria()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_subcategoriaDto->getId_Categoria()!=""){
$sql.="'".$siga_cat_ticket_subcategoriaDto->getId_Categoria()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_subcategoriaDTO();
$tmp->setId_Subcategoria($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_ticket_subcategoria($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_ticket_subcategoria($siga_cat_ticket_subcategoriaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_ticket_subcategoria SET ";
//if($siga_cat_ticket_subcategoriaDto->getId_Subcategoria()!=""){
//$sql.="Id_Subcategoria='".$siga_cat_ticket_subcategoriaDto->getId_Subcategoria()."'";
//if(($siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()!="") ||($siga_cat_ticket_subcategoriaDto->getId_Categoria()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()!=""){
$sql.="Desc_Subcategoria='".$siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()."'";
if(($siga_cat_ticket_subcategoriaDto->getId_Categoria()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_subcategoriaDto->getId_Categoria()!=""){
$sql.="Id_Categoria='".$siga_cat_ticket_subcategoriaDto->getId_Categoria()."'";
}
$sql.=" WHERE Id_Subcategoria='".$siga_cat_ticket_subcategoriaDto->getId_Subcategoria()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_subcategoriaDTO();
$tmp->setId_Subcategoria($siga_cat_ticket_subcategoriaDto->getId_Subcategoria());
$tmp = $this->selectSiga_cat_ticket_subcategoria($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_ticket_subcategoria($siga_cat_ticket_subcategoriaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_ticket_subcategoria  WHERE Id_Subcategoria='".$siga_cat_ticket_subcategoriaDto->getId_Subcategoria()."'";
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
public function selectSiga_cat_ticket_subcategoria($siga_cat_ticket_subcategoriaDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Subcategoria,Desc_Subcategoria,Id_Categoria FROM siga_cat_ticket_subcategoria where Estatus_Reg<>'3'";
if(($siga_cat_ticket_subcategoriaDto->getId_Subcategoria()!="") ||($siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()!="") ||($siga_cat_ticket_subcategoriaDto->getId_Categoria()!="") ){
$sql.=" AND ";
}
if($siga_cat_ticket_subcategoriaDto->getId_Subcategoria()!=""){
$sql.="Id_Subcategoria='".$siga_cat_ticket_subcategoriaDto->getId_Subcategoria()."'";
if(($siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()!="") ||($siga_cat_ticket_subcategoriaDto->getId_Categoria()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()!=""){
$sql.="Desc_Subcategoria='".$siga_cat_ticket_subcategoriaDto->getDesc_Subcategoria()."'";
if(($siga_cat_ticket_subcategoriaDto->getId_Categoria()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_subcategoriaDto->getId_Categoria()!=""){
$sql.="Id_Categoria='".$siga_cat_ticket_subcategoriaDto->getId_Categoria()."'";
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
$tmp[$contador] = new Siga_cat_ticket_subcategoriaDTO();
$tmp[$contador]->setId_Subcategoria($row["Id_Subcategoria"]);
$tmp[$contador]->setDesc_Subcategoria($row["Desc_Subcategoria"]);
$tmp[$contador]->setId_Categoria($row["Id_Categoria"]);
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