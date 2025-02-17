<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_ticket_categoria/Siga_cat_ticket_categoriaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_ticket_categoriaDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_ticket_categoria($siga_cat_ticket_categoriaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cat_ticket_categoria(";
//if($siga_cat_ticket_categoriaDto->getId_Categoria()!=""){
//$sql.="Id_Categoria";
//if(($siga_cat_ticket_categoriaDto->getDesc_Categoria()!="") ||($siga_cat_ticket_categoriaDto->getId_Seccion()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_categoriaDto->getDesc_Categoria()!=""){
$sql.="Desc_Categoria";
if(($siga_cat_ticket_categoriaDto->getId_Seccion()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_categoriaDto->getId_Seccion()!=""){
$sql.="Id_Seccion";
}
$sql.=") VALUES(";
//if($siga_cat_ticket_categoriaDto->getId_Categoria()!=""){
//$sql.="'".$siga_cat_ticket_categoriaDto->getId_Categoria()."'";
//if(($siga_cat_ticket_categoriaDto->getDesc_Categoria()!="") ||($siga_cat_ticket_categoriaDto->getId_Seccion()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_categoriaDto->getDesc_Categoria()!=""){
$sql.="'".$siga_cat_ticket_categoriaDto->getDesc_Categoria()."'";
if(($siga_cat_ticket_categoriaDto->getId_Seccion()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_categoriaDto->getId_Seccion()!=""){
$sql.="'".$siga_cat_ticket_categoriaDto->getId_Seccion()."'";
}
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_categoriaDTO();
$tmp->setId_Categoria($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_ticket_categoria($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_ticket_categoria($siga_cat_ticket_categoriaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_ticket_categoria SET ";
//if($siga_cat_ticket_categoriaDto->getId_Categoria()!=""){
//$sql.="Id_Categoria='".$siga_cat_ticket_categoriaDto->getId_Categoria()."'";
//if(($siga_cat_ticket_categoriaDto->getDesc_Categoria()!="") ||($siga_cat_ticket_categoriaDto->getId_Seccion()!="") ){
//$sql.=",";
//}
//}
if($siga_cat_ticket_categoriaDto->getDesc_Categoria()!=""){
$sql.="Desc_Categoria='".$siga_cat_ticket_categoriaDto->getDesc_Categoria()."'";
if(($siga_cat_ticket_categoriaDto->getId_Seccion()!="") ){
$sql.=",";
}
}
if($siga_cat_ticket_categoriaDto->getId_Seccion()!=""){
$sql.="Id_Seccion='".$siga_cat_ticket_categoriaDto->getId_Seccion()."'";
}
$sql.=" WHERE Id_Categoria='".$siga_cat_ticket_categoriaDto->getId_Categoria()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_ticket_categoriaDTO();
$tmp->setId_Categoria($siga_cat_ticket_categoriaDto->getId_Categoria());
$tmp = $this->selectSiga_cat_ticket_categoria($tmp,"",$this->_proveedor);
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
public function deleteSiga_cat_ticket_categoria($siga_cat_ticket_categoriaDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_ticket_categoria  WHERE Id_Categoria='".$siga_cat_ticket_categoriaDto->getId_Categoria()."'";
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
public function selectSiga_cat_ticket_categoria($siga_cat_ticket_categoriaDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Categoria,Desc_Categoria,Id_Seccion FROM siga_cat_ticket_categoria ";
if(($siga_cat_ticket_categoriaDto->getId_Categoria()!="") ||($siga_cat_ticket_categoriaDto->getDesc_Categoria()!="") ||($siga_cat_ticket_categoriaDto->getId_Seccion()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_ticket_categoriaDto->getId_Categoria()!=""){
$sql.="Id_Categoria='".$siga_cat_ticket_categoriaDto->getId_Categoria()."'";
if(($siga_cat_ticket_categoriaDto->getDesc_Categoria()!="") ||($siga_cat_ticket_categoriaDto->getId_Seccion()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_categoriaDto->getDesc_Categoria()!=""){
$sql.="Desc_Categoria='".$siga_cat_ticket_categoriaDto->getDesc_Categoria()."'";
if(($siga_cat_ticket_categoriaDto->getId_Seccion()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_ticket_categoriaDto->getId_Seccion()!=""){
$sql.="Id_Seccion in ('".$siga_cat_ticket_categoriaDto->getId_Seccion()."') ";
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
$tmp[$contador] = new Siga_cat_ticket_categoriaDTO();
$tmp[$contador]->setId_Categoria($row["Id_Categoria"]);
$tmp[$contador]->setDesc_Categoria($row["Desc_Categoria"]);
$tmp[$contador]->setId_Seccion($row["Id_Seccion"]);
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