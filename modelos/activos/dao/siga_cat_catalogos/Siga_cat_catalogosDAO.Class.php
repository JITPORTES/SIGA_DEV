<?php
 include_once(dirname(__FILE__)."/../../../../modelos/activos/dto/siga_cat_catalogos/Siga_cat_catalogosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../../datos/connect/Proveedor.Class.php");
class Siga_cat_catalogosDAO{
 protected $_proveedor;
public function __construct($gestor = "sqlserver", $bd = "gestion") {
$this->_proveedor = new Proveedor('SQLSERVER', 'activos');
}
public function _conexion(){
$this->_proveedor->connect();
}
public function insertSiga_cat_catalogos($siga_cat_catalogosDto,$proveedor=null){
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
$valormaximo=" select CASE when max(Id_Catalogo+1) IS NULL then 1 else (max(Id_Catalogo + 1)) end as IndiceMaximo from siga_cat_catalogos ";
$this->_proveedor->execute($valormaximo);
$row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0);
$Idmaximo=$row["IndiceMaximo"];

//Hacemos la Insersion
$sql="set identity_insert siga_cat_catalogos on ";
$sql.="INSERT INTO siga_cat_catalogos(";
$sql.="Id_Catalogo";
$sql.=",";
$sql.="Id_Area";
$sql.=",";
$sql.="Nom_Tabla";
$sql.=",";
$sql.="Nom_Id_Campo";
$sql.=",";
$sql.="Nom_Desc_Campo";
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
$sql.=") VALUES(";
$sql.="'".$Idmaximo."'";
$sql.=",";
$sql.="'".$siga_cat_catalogosDto->getId_Area()."'";
$sql.=",";
$sql.="'".$siga_cat_catalogosDto->getNom_Tabla()."'";
$sql.=",";
$sql.="'".$siga_cat_catalogosDto->getNom_Id_Campo()."'";
$sql.=",";
$sql.="'".$siga_cat_catalogosDto->getNom_Desc_Campo()."'";
$sql.=",";
$sql.="'".$siga_cat_catalogosDto->getDescripcion()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_cat_catalogosDto->getUsr_Inser()."'";
$sql.=",";
$sql.="getdate()";
$sql.=",";
$sql.="'".$siga_cat_catalogosDto->getUsr_Mod()."'";
$sql.=")";
//
$sql.=" set identity_insert siga_cat_catalogos off ";
//
if($Idmaximo!="")
{
	$this->_proveedor->execute($sql);
}
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_catalogosDTO();
$tmp->setId_Catalogo($this->_proveedor->lastID());
$tmp = $this->selectSiga_cat_catalogos($tmp,"",$this->_proveedor);
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
public function updateSiga_cat_catalogos($siga_cat_catalogosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="UPDATE siga_cat_catalogos SET ";
if($siga_cat_catalogosDto->getId_Catalogo()!=""){
$sql.="Id_Catalogo='".$siga_cat_catalogosDto->getId_Catalogo()."'";
if(($siga_cat_catalogosDto->getId_Area()!="") ||($siga_cat_catalogosDto->getNom_Tabla()!="") ||($siga_cat_catalogosDto->getNom_Id_Campo()!="") ||($siga_cat_catalogosDto->getNom_Desc_Campo()!="") ||($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_cat_catalogosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_catalogosDto->getId_Area()."'";
if(($siga_cat_catalogosDto->getNom_Tabla()!="") ||($siga_cat_catalogosDto->getNom_Id_Campo()!="") ||($siga_cat_catalogosDto->getNom_Desc_Campo()!="") ||($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_cat_catalogosDto->getNom_Tabla()!=""){
$sql.="Nom_Tabla='".$siga_cat_catalogosDto->getNom_Tabla()."'";
if(($siga_cat_catalogosDto->getNom_Id_Campo()!="") ||($siga_cat_catalogosDto->getNom_Desc_Campo()!="") ||($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_cat_catalogosDto->getNom_Id_Campo()!=""){
$sql.="Nom_Id_Campo='".$siga_cat_catalogosDto->getNom_Id_Campo()."'";
if(($siga_cat_catalogosDto->getNom_Desc_Campo()!="") ||($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_cat_catalogosDto->getNom_Desc_Campo()!=""){
$sql.="Nom_Desc_Campo='".$siga_cat_catalogosDto->getNom_Desc_Campo()."'";
if(($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_cat_catalogosDto->getDescripcion()!=""){
$sql.="Descripcion='".$siga_cat_catalogosDto->getDescripcion()."'";
if(($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_cat_catalogosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_catalogosDto->getFech_Inser()."'";
if(($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_cat_catalogosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_catalogosDto->getUsr_Inser()."'";
if(($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_cat_catalogosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_catalogosDto->getFech_Mod()."'";
if(($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=",";
}
}
if($siga_cat_catalogosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_catalogosDto->getUsr_Mod()."'";
}
$sql.=" WHERE Id_Catalogo='".$siga_cat_catalogosDto->getId_Catalogo()."'";
$this->_proveedor->execute($sql);
if (!$this->_proveedor->error()) {
$tmp = new Siga_cat_catalogosDTO();
$tmp->setId_Catalogo($siga_cat_catalogosDto->getId_Catalogo());
$tmp = $this->selectSiga_cat_catalogos($tmp,"",$this->_proveedor);
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

public function deleteSiga_cat_catalogos($siga_cat_catalogosDto,$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="DELETE FROM siga_cat_catalogos  WHERE Id_Catalogo='".$siga_cat_catalogosDto->getId_Catalogo()."'";
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
public function selectSiga_cat_catalogos($siga_cat_catalogosDto,$orden="",$proveedor=null){
$tmp = "";
$contador = 0;
if ($proveedor == null) {
$this->_conexion(null);
//$this->_proveedor->connect();
} else if ($proveedor != null) {
$this->_proveedor = $proveedor;
}
$sql="SELECT Id_Catalogo,Id_Area,Nom_Tabla,Nom_Id_Campo,Nom_Desc_Campo,Descripcion,Fech_Inser,Usr_Inser,Fech_Mod,Usr_Mod FROM siga_cat_catalogos ";
if(($siga_cat_catalogosDto->getId_Catalogo()!="") ||($siga_cat_catalogosDto->getId_Area()!="") ||($siga_cat_catalogosDto->getNom_Tabla()!="") ||($siga_cat_catalogosDto->getNom_Id_Campo()!="") ||($siga_cat_catalogosDto->getNom_Desc_Campo()!="") ||($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" WHERE ";
}
if($siga_cat_catalogosDto->getId_Catalogo()!=""){
$sql.="Id_Catalogo='".$siga_cat_catalogosDto->getId_Catalogo()."'";
if(($siga_cat_catalogosDto->getId_Area()!="") ||($siga_cat_catalogosDto->getNom_Tabla()!="") ||($siga_cat_catalogosDto->getNom_Id_Campo()!="") ||($siga_cat_catalogosDto->getNom_Desc_Campo()!="") ||($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_catalogosDto->getId_Area()!=""){
$sql.="Id_Area='".$siga_cat_catalogosDto->getId_Area()."'";
if(($siga_cat_catalogosDto->getNom_Tabla()!="") ||($siga_cat_catalogosDto->getNom_Id_Campo()!="") ||($siga_cat_catalogosDto->getNom_Desc_Campo()!="") ||($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_catalogosDto->getNom_Tabla()!=""){
$sql.="Nom_Tabla='".$siga_cat_catalogosDto->getNom_Tabla()."'";
if(($siga_cat_catalogosDto->getNom_Id_Campo()!="") ||($siga_cat_catalogosDto->getNom_Desc_Campo()!="") ||($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_catalogosDto->getNom_Id_Campo()!=""){
$sql.="Nom_Id_Campo='".$siga_cat_catalogosDto->getNom_Id_Campo()."'";
if(($siga_cat_catalogosDto->getNom_Desc_Campo()!="") ||($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_catalogosDto->getNom_Desc_Campo()!=""){
$sql.="Nom_Desc_Campo='".$siga_cat_catalogosDto->getNom_Desc_Campo()."'";
if(($siga_cat_catalogosDto->getDescripcion()!="") ||($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_catalogosDto->getDescripcion()!=""){
$sql.="Descripcion='".$siga_cat_catalogosDto->getDescripcion()."'";
if(($siga_cat_catalogosDto->getFech_Inser()!="") ||($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_catalogosDto->getFech_Inser()!=""){
$sql.="Fech_Inser='".$siga_cat_catalogosDto->getFech_Inser()."'";
if(($siga_cat_catalogosDto->getUsr_Inser()!="") ||($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_catalogosDto->getUsr_Inser()!=""){
$sql.="Usr_Inser='".$siga_cat_catalogosDto->getUsr_Inser()."'";
if(($siga_cat_catalogosDto->getFech_Mod()!="") ||($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_catalogosDto->getFech_Mod()!=""){
$sql.="Fech_Mod='".$siga_cat_catalogosDto->getFech_Mod()."'";
if(($siga_cat_catalogosDto->getUsr_Mod()!="") ){
$sql.=" AND ";
}
}
if($siga_cat_catalogosDto->getUsr_Mod()!=""){
$sql.="Usr_Mod='".$siga_cat_catalogosDto->getUsr_Mod()."'";
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
$tmp[$contador] = new Siga_cat_catalogosDTO();
$tmp[$contador]->setId_Catalogo($row["Id_Catalogo"]);
$tmp[$contador]->setId_Area($row["Id_Area"]);
$tmp[$contador]->setNom_Tabla($row["Nom_Tabla"]);
$tmp[$contador]->setNom_Id_Campo($row["Nom_Id_Campo"]);
$tmp[$contador]->setNom_Desc_Campo($row["Nom_Desc_Campo"]);
$tmp[$contador]->setDescripcion($row["Descripcion"]);
$tmp[$contador]->setFech_Inser($row["Fech_Inser"]);
$tmp[$contador]->setUsr_Inser($row["Usr_Inser"]);
$tmp[$contador]->setFech_Mod($row["Fech_Mod"]);
$tmp[$contador]->setUsr_Mod($row["Usr_Mod"]);
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
                if($value["data"]!='Id_Catalogo' AND $value["data"]!='function')
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
        $this->_proveedor->execute(" SELECT Id_Catalogo,Nom_Tabla,Nom_Id_Campo,Nom_Desc_Campo,Descripcion, siga_catareas.Id_Area,Nom_Area  FROM siga_cat_catalogos left join siga_catareas on siga_cat_catalogos.Id_Area=siga_catareas.Id_Area where Id_Catalogo LIKE '%%' "
                . "".$criterios.$ordenamiento.$pagina);
		
        
        if (!$this->_proveedor->error() AND $this->_proveedor->rows($this->_proveedor->stmt) > 0) {
            while ($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $data[] = array("Id_Catalogo" => $row["Id_Catalogo"],
                    "Nom_Tabla" => $row["Nom_Tabla"],
					"Nom_Id_Campo" => $row["Nom_Id_Campo"],
					"Nom_Desc_Campo" => $row["Nom_Desc_Campo"],
					"Descripcion" => $row["Descripcion"],
					"Nom_Area" => $row["Nom_Area"],
					"Id_Area" => $row["Id_Area"]
				);
            }
            $this->_proveedor->execute("select COUNT(*) AS total from ( SELECT Id_Catalogo,Nom_Tabla,Nom_Id_Campo,Nom_Desc_Campo,Descripcion, siga_catareas.Id_Area, Nom_Area  FROM siga_cat_catalogos left join siga_catareas on siga_cat_catalogos.Id_Area=siga_catareas.Id_Area where Id_Catalogo LIKE '%%' ". "".$criterios." ) siga_cat_catalogos");
            while($row = $this->_proveedor->fetch_array($this->_proveedor->stmt, 0)) {
                $recordsTotal=$row["total"];
            }
        }
		
        return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    }


}
?>