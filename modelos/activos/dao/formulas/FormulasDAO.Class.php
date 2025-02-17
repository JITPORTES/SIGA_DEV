<?php

include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/formulas/FormulasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class FormulasDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertFormulas($formulasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO tblformulas(";
//$sql.="id_formula";
//$sql.=",";
$sql.="Nombre";
$sql.=",";
$sql.="Formula";
$sql.=",";
$sql.="Descripcion";
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
//$sql.="'".$formulasDto->getId_formula()."'";
//$sql.=",";
$sql.="'".$formulasDto->getNombre()."'";
$sql.=",";
$sql.="'".$formulasDto->getFormula()."'";
$sql.=",";
$sql.="'".$formulasDto->getDescripcion()."'";
$sql.=",";
$sql.="".$formulasDto->getFech_Inser()."";
$sql.=",";
$sql.="'".$formulasDto->getUsr_Inser()."'";
$sql.=",";
$sql.="'".$formulasDto->getFech_Mod()."'";
$sql.=",";
$sql.="'".$formulasDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$formulasDto->getEstatus_Reg()."'";
$sql.=")";

$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new FormulasDTO();
$tmp->setid_formula($this->_proveedor->lastID());
$tmp = $this->selectFormulas($tmp,"",$this->_proveedor);
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
public function updateFormulas($formulasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE tblformulas SET ";
//$sql.="id_formula='".$formulasDto->getId_formula()."'";
//$sql.=",";
if($formulasDto->getEstatus_Reg()!="3"){
$sql.="Nombre='".$formulasDto->getNombre()."'";
$sql.=",";
$sql.="Formula='".$formulasDto->getFormula()."'";
$sql.=",";
$sql.="Descripcion='".$formulasDto->getDescripcion()."'";
$sql.=",";
}
if($formulasDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$formulasDto->getFech_Inser()."'";
if(($formulasDto->getUsr_Inser()!="") ||($formulasDto->getFech_Mod()!="") ||($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($formulasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$formulasDto->getUsr_Inser()."'";
if(($formulasDto->getFech_Mod()!="") ||($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($formulasDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$formulasDto->getFech_Mod()."";
if(($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($formulasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$formulasDto->getUsr_Mod()."'";
if(($formulasDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($formulasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$formulasDto->getEstatus_Reg()."'";
}
$sql.=" WHERE id_formula='".$formulasDto->getId_formula()."'";


$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new FormulasDTO();
$tmp->setid_formula($formulasDto->getId_formula());
$tmp = $this->selectFormulas($tmp,"",$this->_proveedor);
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
public function deleteFormulas($formulasDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM tblformulas  WHERE id_formula='".$formulasDto->getId_formula()."'";
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
public function selectFormulas($formulasDto,$orden="",$proveedor=null){
$tmp="";

$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT id_formula,Nombre,Formula,Descripcion,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM tblformulas ";
if(($formulasDto->getId_formula()!="") ||($formulasDto->getNombre()!="") ||($formulasDto->getFormula()!="") ||($formulasDto->getDescripcion()!="") ||($formulasDto->getFech_Inser()!="") ||($formulasDto->getUsr_Inser()!="") ||($formulasDto->getFech_Mod()!="") ||($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($formulasDto->getId_formula()!=""){
$sql.="id_formula='".$formulasDto->getId_formula()."'";
if(($formulasDto->getNombre()!="") ||($formulasDto->getFormula()!="") ||($formulasDto->getDescripcion()!="") ||($formulasDto->getFech_Inser()!="") ||($formulasDto->getUsr_Inser()!="") ||($formulasDto->getFech_Mod()!="") ||($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($formulasDto->getNombre()!=""){
$sql.="Nombre='".$formulasDto->getNombre()."'";
if(($formulasDto->getFormula()!="") ||($formulasDto->getDescripcion()!="") ||($formulasDto->getFech_Inser()!="") ||($formulasDto->getUsr_Inser()!="") ||($formulasDto->getFech_Mod()!="") ||($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($formulasDto->getFormula()!=""){
$sql.="Formula='".$formulasDto->getFormula()."'";
if(($formulasDto->getDescripcion()!="") ||($formulasDto->getFech_Inser()!="") ||($formulasDto->getUsr_Inser()!="") ||($formulasDto->getFech_Mod()!="") ||($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($formulasDto->getDescripcion()!=""){
$sql.="Descripcion='".$formulasDto->getDescripcion()."'";
if(($formulasDto->getFech_Inser()!="") ||($formulasDto->getUsr_Inser()!="") ||($formulasDto->getFech_Mod()!="") ||($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($formulasDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$formulasDto->getFech_Inser()."'";
if(($formulasDto->getUsr_Inser()!="") ||($formulasDto->getFech_Mod()!="") ||($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($formulasDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$formulasDto->getUsr_Inser()."'";
if(($formulasDto->getFech_Mod()!="") ||($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($formulasDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$formulasDto->getFech_Mod()."'";
if(($formulasDto->getUsr_Mod()!="") ||($formulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($formulasDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$formulasDto->getUsr_Mod()."'";
if(($formulasDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($formulasDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$formulasDto->getEstatus_Reg()."'";
}
if($orden!=""){
$sql.=$orden;
}else{
$sql.="";
}
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
if ($this->_proveedor->rows($this->_proveedor->stmt) > 0) {
$tmp=[];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new FormulasDTO();
$tmp[$contador]->setId_formula($row["id_formula"]);
$tmp[$contador]->setNombre($row["Nombre"]);
$tmp[$contador]->setFormula($row["Formula"]);
$tmp[$contador]->setDescripcion($row["Descripcion"]);
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
                if($value["data"]!='id_formula' AND $value["data"]!='function')
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
        $this->_proveedor->execute("SELECT id_formula,Nombre,Formula,Descripcion,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM tblformulas where Estatus_Reg <> '3' and id_formula LIKE '%%' "
                . "".$criterios.$ordenamiento.$pagina);
		
		
        
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $data[] = array("id_formula" => $row["id_formula"],
                    "Nombre" => $row["Nombre"],
					"Formula" => $row["Formula"],
					"Descripcion" => $row["Descripcion"]
				);
            }
            $this->_proveedor->execute("select COUNT(*) AS total from (SELECT id_formula,Nombre,Formula,Descripcion,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM tblformulas where Estatus_Reg <> '3' and id_formula LIKE '%%'". "".$criterios." ) tblformulas");
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
		
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    }

}
?>