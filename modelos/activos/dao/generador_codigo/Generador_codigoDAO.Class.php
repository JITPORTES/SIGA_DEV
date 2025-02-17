<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/generador_codigo/Generador_codigoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Generador_codigoDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function selectGenerador_codigo($generador_codigoDto,$orden="",$proveedor=null){
$tmp=[];
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT CAST(table_name as varchar) as nombre_tabla FROM INFORMATION_SCHEMA.TABLES ";
if(($generador_codigoDto->getNombre_tabla()!="") ){
$sql.=" WHERE ";
}
if($generador_codigoDto->getNombre_tabla()!=""){
$sql.="nombre_tabla='".$generador_codigoDto->getNombre_tabla()."'";
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
$tmp[$contador] = new Generador_codigoDTO();
$tmp[$contador]->setNombre_tabla($row["nombre_tabla"]);
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