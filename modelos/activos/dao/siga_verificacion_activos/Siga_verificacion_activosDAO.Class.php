<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_verificacion_activos/Siga_verificacion_activosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_verificacion_activosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_verificacion_activos($siga_verificacion_activosDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Verificacion+1) IS NULL then 1 else (max(Id_Verificacion + 1)) end as IndiceMaximo from siga_verificacion_activos ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];
//Hacemos la Insersion
$sql="set identity_insert siga_verificacion_activos on ";

$sql.="INSERT INTO siga_verificacion_activos(";
$sql.="Id_Verificacion";
$sql.=",";
$sql.="Id_Area";
$sql.=",";
$sql.="Fecha";
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
$sql.=") VALUES(";
$sql.="'".$Idmaximo."'";
$sql.=",";
$sql.="'".$siga_verificacion_activosDto->getId_Area()."'";
$sql.=",";
$sql.="'".$siga_verificacion_activosDto->getFecha()."'";
$sql.=",";
$sql.="'".$siga_verificacion_activosDto->getComentarios()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_verificacion_activosDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_verificacion_activosDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_verificacion_activosDto->getEstatus_Reg()."'";
$sql.=")";
$sql.=" set identity_insert siga_verificacion_activos off ";
if($Idmaximo!=""){
	$this->_proveedor->execute($sql);
}
if (!$this->_proveedor->error()) {
$tmp = new Siga_verificacion_activosDTO();
$tmp->setId_Verificacion($this->_proveedor->lastID());
$tmp = $this->selectSiga_verificacion_activos($tmp,"",$this->_proveedor);
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
public function updateSiga_verificacion_activos($siga_verificacion_activosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_verificacion_activos SET ";
if($siga_verificacion_activosDto->getEstatus_Reg()!="3"){
	if($siga_verificacion_activosDto->getId_Area()!=""){
	$sql.="Id_Area='".$siga_verificacion_activosDto->getId_Area()."'";
	$sql.=",";
	}
	if($siga_verificacion_activosDto->getFecha()!=""){
	$sql.="Fecha='".$siga_verificacion_activosDto->getFecha()."'";
	$sql.=",";
	}
	if($siga_verificacion_activosDto->getComentarios()!=""){
	$sql.="Comentarios='".$siga_verificacion_activosDto->getComentarios()."'";
	$sql.=",";
	}
}	
$sql.="Fech_Mod=getdate()";
if(($siga_verificacion_activosDto->getUsr_Mod()!="") ||($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
if($siga_verificacion_activosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_verificacion_activosDto->getUsr_Mod()."'";
if(($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_verificacion_activosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_verificacion_activosDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Verificacion='".$siga_verificacion_activosDto->getId_Verificacion()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_verificacion_activosDTO();
$tmp->setId_Verificacion($siga_verificacion_activosDto->getId_Verificacion());
$tmp = $this->selectSiga_verificacion_activos($tmp,"",$this->_proveedor);
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
public function deleteSiga_verificacion_activos($siga_verificacion_activosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_verificacion_activos  WHERE Id_Verificacion='".$siga_verificacion_activosDto->getId_Verificacion()."'";
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
public function selectSiga_verificacion_activos($siga_verificacion_activosDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Verificacion,Id_Area,Fecha,Comentarios,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_verificacion_activos ";
if(($siga_verificacion_activosDto->getId_Verificacion()!="")||($siga_verificacion_activosDto->getId_Area()!="")||($siga_verificacion_activosDto->getFecha()!="") ||($siga_verificacion_activosDto->getComentarios()!="") ||($siga_verificacion_activosDto->getFech_Inser()!="") ||($siga_verificacion_activosDto->getUsr_Inser()!="") ||($siga_verificacion_activosDto->getFech_Mod()!="") ||($siga_verificacion_activosDto->getUsr_Mod()!="") ||($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_verificacion_activosDto->getId_Verificacion()!=""){
$sql.="Id_Verificacion='".$siga_verificacion_activosDto->getId_Verificacion()."'";
if(($siga_verificacion_activosDto->getId_Area()!="")||($siga_verificacion_activosDto->getFecha()!="") ||($siga_verificacion_activosDto->getComentarios()!="") ||($siga_verificacion_activosDto->getFech_Inser()!="") ||($siga_verificacion_activosDto->getUsr_Inser()!="") ||($siga_verificacion_activosDto->getFech_Mod()!="") ||($siga_verificacion_activosDto->getUsr_Mod()!="") ||($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_verificacion_activosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_verificacion_activosDto->getId_Area()."'";
if(($siga_verificacion_activosDto->getFecha()!="") ||($siga_verificacion_activosDto->getComentarios()!="") ||($siga_verificacion_activosDto->getFech_Inser()!="") ||($siga_verificacion_activosDto->getUsr_Inser()!="") ||($siga_verificacion_activosDto->getFech_Mod()!="") ||($siga_verificacion_activosDto->getUsr_Mod()!="") ||($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}

if($siga_verificacion_activosDto->getFecha()!=""){
$sql.="Fecha='".$siga_verificacion_activosDto->getFecha()."'";
if(($siga_verificacion_activosDto->getComentarios()!="") ||($siga_verificacion_activosDto->getFech_Inser()!="") ||($siga_verificacion_activosDto->getUsr_Inser()!="") ||($siga_verificacion_activosDto->getFech_Mod()!="") ||($siga_verificacion_activosDto->getUsr_Mod()!="") ||($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_verificacion_activosDto->getComentarios()!=""){
$sql.="Comentarios='".$siga_verificacion_activosDto->getComentarios()."'";
if(($siga_verificacion_activosDto->getFech_Inser()!="") ||($siga_verificacion_activosDto->getUsr_Inser()!="") ||($siga_verificacion_activosDto->getFech_Mod()!="") ||($siga_verificacion_activosDto->getUsr_Mod()!="") ||($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_verificacion_activosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_verificacion_activosDto->getFech_Inser()."'";
if(($siga_verificacion_activosDto->getUsr_Inser()!="") ||($siga_verificacion_activosDto->getFech_Mod()!="") ||($siga_verificacion_activosDto->getUsr_Mod()!="") ||($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_verificacion_activosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_verificacion_activosDto->getUsr_Inser()."'";
if(($siga_verificacion_activosDto->getFech_Mod()!="") ||($siga_verificacion_activosDto->getUsr_Mod()!="") ||($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_verificacion_activosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_verificacion_activosDto->getFech_Mod()."'";
if(($siga_verificacion_activosDto->getUsr_Mod()!="") ||($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_verificacion_activosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_verificacion_activosDto->getUsr_Mod()."'";
if(($siga_verificacion_activosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_verificacion_activosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_verificacion_activosDto->getEstatus_Reg()."'";
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
$tmp[$contador] = new Siga_verificacion_activosDTO();
$tmp[$contador]->setId_Verificacion($row["Id_Verificacion"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setFecha($row["Fecha"]);
$tmp[$contador]->setComentarios($row["Comentarios"]);
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

public function llenarDataTable($draw,$columns,$order,$start,$length,$search,$siga_verificacion_activosDto,$proveedor = null) {
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
                if($value["data"]!='Id_Verificacion' AND $value["data"]!='function')
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
        
		$Area="";
		
		if($siga_verificacion_activosDto->getId_Area()!="5"){
			$Area=" Id_Area=".$siga_verificacion_activosDto->getId_Area();
			$Area.=" and ";
		}
		
		$this->_proveedor->execute(" select Id_Verificacion, Fecha, Comentarios, Fech_Inser, Usr_Inser, Fech_Mod, Usr_Mod, Estatus_Reg from siga_verificacion_activos where Estatus_Reg <> '3' and ".$Area." Id_Verificacion LIKE '%%' "
                . "".$criterios.$ordenamiento.$pagina);
		
        
		
		
		
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $data[] = array("Id_Verificacion" => $row["Id_Verificacion"],
                    "Fecha" => $row["Fecha"],
					"Comentarios" => $row["Comentarios"]
				);
            }
            $this->_proveedor->execute("select COUNT(*) AS total from ( select Id_Verificacion, Fecha, Comentarios, Fech_Inser, Usr_Inser, Fech_Mod, Usr_Mod, Estatus_Reg from siga_verificacion_activos where Estatus_Reg <> '3' and ".$Area." Id_Verificacion LIKE '%%' ". "".$criterios." ) siga_verificacion_activos");
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
		
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    }

}
?>