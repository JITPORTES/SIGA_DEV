<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_usuarios/Siga_usuariosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_usuariosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('sqlserver', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_usuarios($siga_usuariosDto,$proveedor=null){


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
$valormaximo=" select CASE when max(Id_Usuario+1) IS NULL then 1 else (max(Id_Usuario + 1)) end as IndiceMaximo from siga_usuarios ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_usuarios on ";
//
$sql.="INSERT INTO siga_usuarios(";
$sql.="Id_Usuario";
$sql.=",";
$sql.="No_Usuario";
$sql.=",";
$sql.="Nombre_Usuario";
$sql.=",";
$sql.="Correo";
$sql.=",";
$sql.="Usuario";
$sql.=",";
$sql.="Password";
$sql.=",";
$sql.="Puesto";
$sql.=",";
$sql.="Activo_Fijo";
$sql.=",";
$sql.="Mesa_Ayuda";
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
$sql.="'".$siga_usuariosDto->getNo_Usuario()."'";
$sql.=",";
$sql.="'".utf8_encode($siga_usuariosDto->getNombre_Usuario())."'";
$sql.=",";
$sql.="'".utf8_encode($siga_usuariosDto->getCorreo())."'";
$sql.=",";
$sql.="'".utf8_encode($siga_usuariosDto->getUsuario())."'";
$sql.=",";
$sql.="'".utf8_encode($siga_usuariosDto->getPassword())."'";
$sql.=",";
$sql.="'".utf8_encode($siga_usuariosDto->getPuesto())."'";
$sql.=",";
$sql.="'".$siga_usuariosDto->getActivo_Fijo()."'";
$sql.=",";
$sql.="'".$siga_usuariosDto->getMesa_Ayuda()."'";
$sql.=",";
$sql.="".$siga_usuariosDto->getFech_Inser()."";
$sql.=",";
$sql.="'".utf8_encode($siga_usuariosDto->getUsr_Inser())."'";
$sql.=",";
$sql.="'".$siga_usuariosDto->getFech_Mod()."'";
$sql.=",";
$sql.="'".$siga_usuariosDto->getUsr_Mod()."'";
$sql.=",";
$sql.="'".$siga_usuariosDto->getEstatus_Reg()."'";
$sql.=")";
//
$sql.=" set identity_insert siga_usuarios off ";
//
if($Idmaximo!="")
{
	$this->_proveedor->execute($sql);
}
if (!$this->_proveedor->error()) {
$tmp = new Siga_usuariosDTO();
$tmp->setId_Usuario($Idmaximo);
$tmp = $this->selectSiga_usuarios($tmp,"",$this->_proveedor);
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
public function updateSiga_usuarios($siga_usuariosDto,$proveedor=null){
$tmp="";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_usuarios SET ";
//if($siga_usuariosDto->getId_Usuario()!=""){
//$sql.="Id_Usuario='".$siga_usuariosDto->getId_Usuario()."'";
//if(($siga_usuariosDto->getNo_Usuario()!="") ||($siga_usuariosDto->getNombre_Usuario()!="") ||($siga_usuariosDto->getUsuario()!="") ||($siga_usuariosDto->getPassword()!="") ||($siga_usuariosDto->getPuesto()!="") ||($siga_usuariosDto->getActivo_Fijo()!="") ||($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
//$sql.=",";
//}
//}
if($siga_usuariosDto->getEstatus_Reg()!="3"){
	if($siga_usuariosDto->getNo_Usuario()!=""){
	$sql.="No_Usuario='".$siga_usuariosDto->getNo_Usuario()."'";
	$sql.=",";
	}
	if($siga_usuariosDto->getNombre_Usuario()!=""){
	$sql.="Nombre_Usuario='".$siga_usuariosDto->getNombre_Usuario()."'";
	$sql.=",";
	}
	if($siga_usuariosDto->getCorreo()!=""){
	$sql.="Correo='".$siga_usuariosDto->getCorreo()."'";
	$sql.=",";
	}
	if($siga_usuariosDto->getUsuario()!=""){
	$sql.="Usuario='".$siga_usuariosDto->getUsuario()."'";
	$sql.=",";
	}
	if($siga_usuariosDto->getPassword()!=""){
	$sql.="Password='".$siga_usuariosDto->getPassword()."'";
	$sql.=",";
	}
	if($siga_usuariosDto->getPuesto()!=""){
	$sql.="Puesto='".$siga_usuariosDto->getPuesto()."'";
	$sql.=",";
	}
	if($siga_usuariosDto->getActivo_Fijo()!=""){
	$sql.="Activo_Fijo='".$siga_usuariosDto->getActivo_Fijo()."'";
	$sql.=",";
	}
	if($siga_usuariosDto->getMesa_Ayuda()!=""){
	$sql.="Mesa_Ayuda='".$siga_usuariosDto->getMesa_Ayuda()."'";
	$sql.=",";
	}
}
if($siga_usuariosDto->getFech_Mod()!=""){
$sql.="Fech_Mod=".$siga_usuariosDto->getFech_Mod()."";
if(($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuariosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_usuariosDto->getUsr_Mod()."'";
if(($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=",";
}
}
if($siga_usuariosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg='".$siga_usuariosDto->getEstatus_Reg()."'";
}
$sql.=" WHERE Id_Usuario='".$siga_usuariosDto->getId_Usuario()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_usuariosDTO();
$tmp->setId_Usuario($siga_usuariosDto->getId_Usuario());
$tmp = $this->selectSiga_usuarios($tmp,"",$this->_proveedor);
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
public function deleteSiga_usuarios($siga_usuariosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_usuarios  WHERE Id_Usuario='".$siga_usuariosDto->getId_Usuario()."'";
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
public function selectSiga_usuarios($siga_usuariosDto,$orden="",$proveedor=null){
$tmp="";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}

$sql="SELECT Id_Usuario,No_Usuario,Nombre_Usuario,Correo,Usuario,Password,Puesto,Activo_Fijo,Mesa_Ayuda,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod,Estatus_Reg FROM siga_usuarios ";
if(($siga_usuariosDto->getId_Usuario()!="") ||($siga_usuariosDto->getNo_Usuario()!="") ||($siga_usuariosDto->getNombre_Usuario()!="")||($siga_usuariosDto->getCorreo()!="") ||($siga_usuariosDto->getUsuario()!="") ||($siga_usuariosDto->getPassword()!="") ||($siga_usuariosDto->getPuesto()!="") ||($siga_usuariosDto->getActivo_Fijo()!="") ||($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" WHERE ";
}
if($siga_usuariosDto->getId_Usuario()!=""){
$sql.="Id_Usuario='".$siga_usuariosDto->getId_Usuario()."'";
if(($siga_usuariosDto->getNo_Usuario()!="") ||($siga_usuariosDto->getNombre_Usuario()!="") ||($siga_usuariosDto->getCorreo()!="")||($siga_usuariosDto->getUsuario()!="") ||($siga_usuariosDto->getPassword()!="") ||($siga_usuariosDto->getPuesto()!="") ||($siga_usuariosDto->getActivo_Fijo()!="") ||($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getNo_Usuario()!=""){
$sql.="No_Usuario='".$siga_usuariosDto->getNo_Usuario()."'";
if(($siga_usuariosDto->getNombre_Usuario()!="")||($siga_usuariosDto->getCorreo()!="") ||($siga_usuariosDto->getUsuario()!="") ||($siga_usuariosDto->getPassword()!="") ||($siga_usuariosDto->getPuesto()!="") ||($siga_usuariosDto->getActivo_Fijo()!="") ||($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getNombre_Usuario()!=""){
$sql.="Nombre_Usuario='".$siga_usuariosDto->getNombre_Usuario()."'";
if(($siga_usuariosDto->getCorreo()!="")||($siga_usuariosDto->getUsuario()!="") ||($siga_usuariosDto->getPassword()!="") ||($siga_usuariosDto->getPuesto()!="") ||($siga_usuariosDto->getActivo_Fijo()!="") ||($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getCorreo()!=""){
$sql.="Correo='".$siga_usuariosDto->getCorreo()."'";
if(($siga_usuariosDto->getUsuario()!="") ||($siga_usuariosDto->getPassword()!="") ||($siga_usuariosDto->getPuesto()!="") ||($siga_usuariosDto->getActivo_Fijo()!="") ||($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getUsuario()!=""){
$sql.="Usuario='".$siga_usuariosDto->getUsuario()."'";
if(($siga_usuariosDto->getPassword()!="") ||($siga_usuariosDto->getPuesto()!="") ||($siga_usuariosDto->getActivo_Fijo()!="") ||($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getPassword()!=""){
$sql.="Password='".$siga_usuariosDto->getPassword()."'";
if(($siga_usuariosDto->getPuesto()!="") ||($siga_usuariosDto->getActivo_Fijo()!="") ||($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getPuesto()!=""){
$sql.="Puesto='".$siga_usuariosDto->getPuesto()."'";
if(($siga_usuariosDto->getActivo_Fijo()!="") ||($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getActivo_Fijo()!=""){
$sql.="Activo_Fijo='".$siga_usuariosDto->getActivo_Fijo()."'";
if(($siga_usuariosDto->getMesa_Ayuda()!="") ||($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getMesa_Ayuda()!=""){
$sql.="Mesa_Ayuda='".$siga_usuariosDto->getMesa_Ayuda()."'";
if(($siga_usuariosDto->getFech_Inser()!="") ||($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_usuariosDto->getFech_Inser()."'";
if(($siga_usuariosDto->getUsr_Inser()!="") ||($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_usuariosDto->getUsr_Inser()."'";
if(($siga_usuariosDto->getFech_Mod()!="") ||($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_usuariosDto->getFech_Mod()."'";
if(($siga_usuariosDto->getUsr_Mod()!="") ||($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_usuariosDto->getUsr_Mod()."'";
if(($siga_usuariosDto->getEstatus_Reg()!="") ){
$sql.=" AND ";
}
}
if($siga_usuariosDto->getEstatus_Reg()!=""){
$sql.="Estatus_Reg <> 3 ";
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
$tmp = [];
while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
$tmp[$contador] = new Siga_usuariosDTO();
$tmp[$contador]->setId_Usuario($row["Id_Usuario"]);
$tmp[$contador]->setNo_Usuario(rtrim(ltrim($row["No_Usuario"])));
$tmp[$contador]->setNombre_Usuario(rtrim(ltrim($row["Nombre_Usuario"])));
$tmp[$contador]->setCorreo(rtrim(ltrim($row["Correo"])));
$tmp[$contador]->setUsuario(rtrim(ltrim($row["Usuario"])));
$tmp[$contador]->setPassword(rtrim(ltrim($row["Password"])));
$tmp[$contador]->setPuesto(rtrim(ltrim($row["Puesto"])));
$tmp[$contador]->setActivo_Fijo($row["Activo_Fijo"]);
$tmp[$contador]->setMesa_Ayuda($row["Mesa_Ayuda"]);
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
                if($value["data"]!='Id_Usuario' AND $value["data"]!='function')
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
        $this->_proveedor->execute(" SELECT Id_Usuario,No_Usuario,Nombre_Usuario,Usuario,Password,Puesto, Activo_Fijo, Mesa_Ayuda  FROM siga_usuarios where Estatus_Reg <> '3' and Id_Usuario LIKE '%%' "
                . "".$criterios.$ordenamiento.$pagina);
		
        
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $data[] = array("Id_Usuario" => $row["Id_Usuario"],
                    "No_Usuario" => $row["No_Usuario"],
					"Nombre_Usuario" => $row["Nombre_Usuario"],
					"Usuario" => $row["Usuario"],
					"Password" => $row["Password"],
					"Puesto" => $row["Puesto"],
					"Activo_Fijo" => $row["Activo_Fijo"],
					"Mesa_Ayuda" => $row["Mesa_Ayuda"],
				);
            }
            $this->_proveedor->execute("select COUNT(*) AS total from ( SELECT Id_Usuario,No_Usuario,Nombre_Usuario,Usuario,Password,Puesto, Activo_Fijo, Mesa_Ayuda  FROM siga_usuarios where Estatus_Reg <> '3' and Id_Usuario LIKE '%%' ". "".$criterios." ) siga_usuarios");
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
		
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    }

}
?>