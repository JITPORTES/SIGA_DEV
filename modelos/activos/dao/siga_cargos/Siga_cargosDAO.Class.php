<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cargos/Siga_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cargosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cargos($siga_cargosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="INSERT INTO siga_cargos(";
//$sql.="Id_Cargo";
//$sql.=",";
$sql.="Nom_Cargo";
$sql.=",";
$sql.="Tipo";
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
//$sql.="'".$siga_cargosDto->getId_Cargo()."'";
//$sql.=",";
$sql.="'".$siga_cargosDto->getNom_Cargo()."'";
$sql.=",";
$sql.="'".$siga_cargosDto->getTipo()."'";
$sql.=",";
$sql.="".$siga_cargosDto->getFech_Inser()."";
$sql.=",";
$sql.="'".$siga_cargosDto->getUsr_Inser()."'";
$sql.=",";
$sql.="'".$siga_cargosDto->getFech_Mod()."'";
$sql.=",";
$sql.="'".$siga_cargosDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_cargosDto->getEstatus_Reg()."'";
$sql.=")";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cargosDTO();
$tmp->setId_Cargo($this->_proveedor->lastID());
$tmp = $this->selectSiga_cargos($tmp,"",$this->_proveedor);
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
public function updateSiga_cargos($siga_cargosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cargos SET ";
//$sql.="Id_Cargo='".$siga_cargosDto->getId_Cargo()."'";
//$sql.=",";
if($siga_cargosDto->getEstatus_Reg()!="3"){
	$sql.="Nom_Cargo='".$siga_cargosDto->getNom_Cargo()."'";
	$sql.=",";
	if($siga_cargosDto->getTipo()!=""){
		$sql.="Tipo='".$siga_cargosDto->getTipo()."'";
		$sql.=",";
	}
}
if($siga_cargosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cargosDto->getFech_Inser()."'";
$sql.=",";
}
if($siga_cargosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cargosDto->getUsr_Inser()."'";
$sql.=",";
}

if($siga_cargosDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_cargosDto->getFech_Mod()."";
if(($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cargosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cargosDto->getUsr_Mod()."'";
if(($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_cargosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_cargosDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Cargo='".$siga_cargosDto->getId_Cargo()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cargosDTO();
$tmp->setId_Cargo($siga_cargosDto->getId_Cargo());
$tmp = $this->selectSiga_cargos($tmp,"",$this->_proveedor);
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
public function deleteSiga_cargos($siga_cargosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cargos  WHERE Id_Cargo='".$siga_cargosDto->getId_Cargo()."'";
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
public function selectSiga_cargos($siga_cargosDto,$orden="",$proveedor=null){
$tmp=[];
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Cargo,Nom_Cargo,Tipo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cargos ";
if(($siga_cargosDto->getId_Cargo()!="") ||($siga_cargosDto->getNom_Cargo()!="") ||($siga_cargosDto->getTipo()!="") ||($siga_cargosDto->getFech_Inser()!="") ||($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cargosDto->getId_Cargo()!=""){
$sql.="Id_Cargo='".$siga_cargosDto->getId_Cargo()."'";
if(($siga_cargosDto->getNom_Cargo()!="") ||($siga_cargosDto->getTipo()!="") ||($siga_cargosDto->getFech_Inser()!="") ||($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getNom_Cargo()!=""){
$sql.="Nom_Cargo='".$siga_cargosDto->getNom_Cargo()."'";
if(($siga_cargosDto->getTipo()!="") ||($siga_cargosDto->getFech_Inser()!="") ||($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getTipo()!=""){
$sql.="Tipo='".$siga_cargosDto->getTipo()."'";
if(($siga_cargosDto->getFech_Inser()!="") ||($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cargosDto->getFech_Inser()."'";
if(($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cargosDto->getUsr_Inser()."'";
if(($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cargosDto->getFech_Mod()."'";
if(($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cargosDto->getUsr_Mod()."'";
if(($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <> '3'";
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
$tmp[$contador] = new Siga_cargosDTO();
$tmp[$contador]->setId_Cargo($row["Id_Cargo"]);
$tmp[$contador]->setNom_Cargo($row["Nom_Cargo"]);
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
public function selectSiga_ConsGrupos($siga_cargosDto,$orden="",$proveedor=null){
$tmp;
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Cargo,Nom_Cargo,Tipo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cargos ";
if(($siga_cargosDto->getId_Cargo()!="") ||($siga_cargosDto->getNom_Cargo()!="") ||($siga_cargosDto->getTipo()!="") ||($siga_cargosDto->getFech_Inser()!="") ||($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_cargosDto->getId_Cargo()!=""){
$sql.="Id_Cargo='".$siga_cargosDto->getId_Cargo()."'";
if(($siga_cargosDto->getNom_Cargo()!="") ||($siga_cargosDto->getTipo()!="") ||($siga_cargosDto->getFech_Inser()!="") ||($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getNom_Cargo()!=""){
$sql.="Nom_Cargo='".$siga_cargosDto->getNom_Cargo()."'";
if(($siga_cargosDto->getTipo()!="") ||($siga_cargosDto->getFech_Inser()!="") ||($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getTipo()!=""){
if($siga_cargosDto->getTipo()>2){
	$sql.="Tipo in('1','2','3')";
}else{
	$sql.="Tipo='".$siga_cargosDto->getTipo()."'";
}
if(($siga_cargosDto->getFech_Inser()!="") ||($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cargosDto->getFech_Inser()."'";
if(($siga_cargosDto->getUsr_Inser()!="") ||($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cargosDto->getUsr_Inser()."'";
if(($siga_cargosDto->getFech_Mod()!="") ||($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cargosDto->getFech_Mod()."'";
if(($siga_cargosDto->getUsr_Mod()!="") ||($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cargosDto->getUsr_Mod()."'";
if(($siga_cargosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_cargosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <> '3'";
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
$tmp[$contador] = new Siga_cargosDTO();
$tmp[$contador]->setId_Cargo($row["Id_Cargo"]);
$tmp[$contador]->setNom_Cargo($row["Nom_Cargo"]);
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
                if($value["data"]!='Id_Cargo' AND $value["data"]!='function')
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
        $this->_proveedor->execute("SELECT Id_Cargo,Nom_Cargo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cargos where Estatus_Reg <> '3' and Id_Cargo LIKE '%%'  "
                . "".$criterios.$ordenamiento.$pagina);
		
        
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $data[] = array("Id_Cargo" => $row["Id_Cargo"],
                    "Nom_Cargo" => $row["Nom_Cargo"]
				);
            }
            $this->_proveedor->execute("select COUNT(*) AS total from ( SELECT Id_Cargo,Nom_Cargo,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_cargos where Estatus_Reg <> '3' and Id_Cargo LIKE '%%'". "".$criterios." ) siga_usuarios");
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
		
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    }

public function selectmenucargos($selectmenucargos,$proveedor=null) {	
	$respuesta = "";
	$data = array();
	if ($proveedor == null) {
		$this->_conexion(null);
	} else if ($proveedor != null) {
		$this->_proveedor = $proveedor;
	}
	
	
	$this->_proveedor->execute("sp_selecmenudinamico '2','".$selectmenucargos->getId_Cargo()."'");
	
	if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
		while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
			$data[] = array("Id_Det_Cargo" => $row["Id_Det_Cargo"],
				"Id_Menu" => $row["Id_Menu"],
				"Id_Submenu" => $row["Id_Submenu"],
				"Id_Cargo" => $row["Id_Cargo"],
				"Id_Aplicacion" => $row["Id_Aplicacion"],
				"Lectura" => $row["Lectura"],
				"Alta" => $row["Alta"],
				"Baja" => $row["Baja"],
				"Cambio" => $row["Cambio"],
				"OrdenMenu" => $row["OrdenMenu"],
				"OrdenSubmenu" => $row["OrdenSubmenu"],
				"Nom_Menu" => $row["Nom_Menu"],
				"Padre" => $row["Padre"],
				"Submenu" => $row["Submenu"],
				"Url_Menu" => $row["Url_Menu"],
				"Url_Submenu" => $row["Url_Submenu"],
				"Icono" => $row["Icono"]
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