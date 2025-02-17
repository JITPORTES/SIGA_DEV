<?php
include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/inpc/InpcDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class InpcDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertInpc($inpcDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO tblinpc(";
//$sql.="Id_INPC";
//$sql.=",";
$sql.="Anio";
$sql.=",";
$sql.="Mes";
$sql.=",";
$sql.="Valor";
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
$sql.=") VALUES(";
//$sql.="'".$inpcDto->getId_INPC()."'";
//$sql.=",";
$sql.="'".$inpcDto->getAnio()."'";
$sql.=",";
$sql.="'".$inpcDto->getMes()."'";
$sql.=",";
$sql.="'".$inpcDto->getValor()."'";
$sql.=",";
$sql.="".$inpcDto->getFech_Inser()."";
$sql.=",";
$sql.="'".$inpcDto->getUsr_Inser()."'";
$sql.=",";
$sql.="'".$inpcDto->getFech_Mod()."'";
$sql.=",";
$sql.="'".$inpcDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$inpcDto->getEstatus_Reg()."'";

$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new InpcDTO();
$tmp->setId_INPC($this->_proveedor->lastID());
$tmp = $this->selectInpc($tmp,"",$this->_proveedor);
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
public function updateInpc($inpcDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}

$sql="UPDATE tblinpc SET ";
//$sql.="Id_INPC='".$inpcDto->getId_INPC()."'";
//$sql.=",";
if($inpcDto->getEstatus_Reg()!="3"){
$sql.="Anio='".$inpcDto->getAnio()."'";
$sql.=",";
$sql.="Mes='".$inpcDto->getMes()."'";
$sql.=",";
$sql.="Valor='".$inpcDto->getValor()."'";
$sql.=",";
}
if($inpcDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$inpcDto->getFech_Inser()."'";
if(($inpcDto->getUsr_Inser()!="") ||($inpcDto->getFech_Mod()!="") ||($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($inpcDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$inpcDto->getUsr_Inser()."'";
if(($inpcDto->getFech_Mod()!="") ||($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($inpcDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$inpcDto->getFech_Mod()."";
if(($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($inpcDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$inpcDto->getUsr_Mod()."'";
if(($inpcDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($inpcDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$inpcDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_INPC='".$inpcDto->getId_INPC()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new InpcDTO();
$tmp->setId_INPC($inpcDto->getId_INPC());
$tmp = $this->selectInpc($tmp,"",$this->_proveedor);
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

public function deleteInpc($inpcDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM tblinpc  WHERE Id_INPC='".$inpcDto->getId_INPC()."'";
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
public function selectInpc($inpcDto,$orden="",$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_INPC,Anio,Mes,Valor,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM tblinpc ";
if(($inpcDto->getId_INPC()!="") ||($inpcDto->getAnio()!="") ||($inpcDto->getMes()!="") ||($inpcDto->getValor()!="") ||($inpcDto->getFech_Inser()!="") ||($inpcDto->getUsr_Inser()!="") ||($inpcDto->getFech_Mod()!="") ||($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($inpcDto->getId_INPC()!=""){
$sql.="Id_INPC='".$inpcDto->getId_INPC()."'";
if(($inpcDto->getAnio()!="") ||($inpcDto->getMes()!="") ||($inpcDto->getValor()!="") ||($inpcDto->getFech_Inser()!="") ||($inpcDto->getUsr_Inser()!="") ||($inpcDto->getFech_Mod()!="") ||($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($inpcDto->getAnio()!=""){
$sql.="Anio='".$inpcDto->getAnio()."'";
if(($inpcDto->getMes()!="") ||($inpcDto->getValor()!="") ||($inpcDto->getFech_Inser()!="") ||($inpcDto->getUsr_Inser()!="") ||($inpcDto->getFech_Mod()!="") ||($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($inpcDto->getMes()!=""){
$sql.="Mes='".$inpcDto->getMes()."'";
if(($inpcDto->getValor()!="") ||($inpcDto->getFech_Inser()!="") ||($inpcDto->getUsr_Inser()!="") ||($inpcDto->getFech_Mod()!="") ||($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($inpcDto->getValor()!=""){
$sql.="Valor='".$inpcDto->getValor()."'";
if(($inpcDto->getFech_Inser()!="") ||($inpcDto->getUsr_Inser()!="") ||($inpcDto->getFech_Mod()!="") ||($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($inpcDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$inpcDto->getFech_Inser()."'";
if(($inpcDto->getUsr_Inser()!="") ||($inpcDto->getFech_Mod()!="") ||($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($inpcDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$inpcDto->getUsr_Inser()."'";
if(($inpcDto->getFech_Mod()!="") ||($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($inpcDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$inpcDto->getFech_Mod()."'";
if(($inpcDto->getUsr_Mod()!="") ||($inpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($inpcDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$inpcDto->getUsr_Mod()."'";
if(($inpcDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($inpcDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$inpcDto->getEstatus_Reg()."'";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
//echo $sql;
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new InpcDTO();
$tmp[$contador]->setId_INPC($row["Id_INPC"]);
$tmp[$contador]->setAnio($row["Anio"]);
$tmp[$contador]->setMes($row["Mes"]);
$tmp[$contador]->setValor(round($row["Valor"], 6));
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

public function llenarDataTable($draw,$columns,$order,$start,$length,$search, $proveedor = null) {
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
                if($value["data"]!='Id_INPC' AND $value["data"]!='function')
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
        $this->_proveedor->execute("SELECT Id_INPC,Anio,Mes,Valor,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM tblinpc where Estatus_Reg <> '3' and Id_INPC LIKE '%%' "
                . "".$criterios.$ordenamiento.$pagina);
		
				
		
        
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $data[] = array("Id_INPC" => $row["Id_INPC"],
                    "Anio" => $row["Anio"],
					"Mes" => $row["Mes"],
					"Valor" => round($row["Valor"], 6)
				);
            }
			$this->_proveedor->execute("select COUNT(*) AS total from (SELECT Id_INPC,Anio,Mes,Valor,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM tblinpc where Estatus_Reg <> '3' and Id_INPC LIKE '%%'". "".$criterios." ) tblinpc");
			
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    }

}
?>