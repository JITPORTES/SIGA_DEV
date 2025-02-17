<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_reportes/Siga_reportesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_reportes/Siga_reportesDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_reportesController {
private $proveedor;
public function __construct() {
}
public function validarSiga_reportes($Siga_reportesDto){
$Siga_reportesDto->setId_Activo(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Activo()))));
$Siga_reportesDto->setAF_BC(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getAF_BC()))));
$Siga_reportesDto->setNombre_Activo(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getNombre_Activo()))));
$Siga_reportesDto->setId_Tipo_Vale_Resg(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Tipo_Vale_Resg()))));
$Siga_reportesDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Area()))));
$Siga_reportesDto->setId_Departamento(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Departamento()))));
$Siga_reportesDto->setNum_Empleado(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getNum_Empleado()))));
$Siga_reportesDto->setNombre_Completo(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getNombre_Completo()))));
$Siga_reportesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getFech_Inser()))));
$Siga_reportesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getUsr_Inser()))));
$Siga_reportesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getFech_Mod()))));
$Siga_reportesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getUsr_Mod()))));
$Siga_reportesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getEstatus_Reg()))));
$Siga_reportesDto->setFoto(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getFoto()))));
$Siga_reportesDto->setId_Clasificacion(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Clasificacion()))));
$Siga_reportesDto->setId_Propiedad(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Propiedad()))));
$Siga_reportesDto->setId_Tipo_Activo(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Tipo_Activo()))));
$Siga_reportesDto->setDescCorta(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getDescCorta()))));
$Siga_reportesDto->setDescLarga(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getDescLarga()))));
$Siga_reportesDto->setId_Ubic_Prim(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Ubic_Prim()))));
$Siga_reportesDto->setId_Ubic_Sec(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Ubic_Sec()))));
$Siga_reportesDto->setId_Motivo_Alta(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Motivo_Alta()))));
$Siga_reportesDto->setId_Familia(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Familia()))));
$Siga_reportesDto->setId_Subfamilia(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_Subfamilia()))));
$Siga_reportesDto->setMarca(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getMarca()))));
$Siga_reportesDto->setModelo(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getModelo()))));
$Siga_reportesDto->setNumSerie(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getNumSerie()))));
$Siga_reportesDto->setId_ActivoPadre(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getId_ActivoPadre()))));
$Siga_reportesDto->setNumActivoAnterior(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getNumActivoAnterior()))));
$Siga_reportesDto->setParticipaPre(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getParticipaPre()))));
$Siga_reportesDto->setParticipaSeguros(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getParticipaSeguros()))));
$Siga_reportesDto->setImporteSeguros(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getImporteSeguros()))));
$Siga_reportesDto->setParticipaCertificacion(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getParticipaCertificacion()))));
$Siga_reportesDto->setGarantia(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getGarantia()))));
$Siga_reportesDto->setExtGarantia(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getExtGarantia()))));
$Siga_reportesDto->setAnexo(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getAnexo()))));
$Siga_reportesDto->setEspecifica(strtoupper(str_ireplace("'","",trim($Siga_reportesDto->getEspecifica()))));
return $Siga_reportesDto;
}
public function selectSiga_reportes($Siga_reportesDto,$proveedor=null){
$Siga_reportesDto=$this->validarSiga_reportes($Siga_reportesDto);
$Siga_reportesDao = new Siga_reportesDAO();
$Siga_reportesDto = $Siga_reportesDao->selectSiga_reportes($Siga_reportesDto,$proveedor);
return $Siga_reportesDto;
}


public function selectDistinct($Siga_reportesDto,$Valor, $proveedor=null){
	
	$DatosE = array();
	$DatosEnvia = array();
	$respuesta = array();
	$error=true;
	
	if($Siga_reportesDto!=""){
		
		$proveedor = new Proveedor('sqlserver', 'activos');
		$proveedor->connect();
		
		$sql="select distinct rtrim(ltrim(".$Valor.")) as ".$Valor." from siga_activos where Estatus_Reg<>'3' and ".$Valor."<>''";
		
		$proveedor->execute($sql);
	
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$DatosE = array(
						$Valor => rtrim(ltrim($row[$Valor])),
					);
					array_push($DatosEnvia, $DatosE);				
				}
			}	
		}else{
			$error=false;
		}
		$proveedor->close();
			
		
	}else{
		$error=false;
	}
	
	if($error==true){
		$respuesta = array("totalCount" => count($DatosEnvia), "data" => $DatosEnvia, "estatus" => "ok", "mensaje" => "Registros Encontrados");   
	}else{
		$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "Registros No Encontrados");
	}
	
	return $respuesta;
}

public function insertSiga_reportes($Siga_reportesDto,$proveedor=null){
//$Siga_reportesDto=$this->validarSiga_reportes($Siga_reportesDto);
$Siga_reportesDao = new Siga_reportesDAO();
$Siga_reportesDto = $Siga_reportesDao->insertSiga_reportes($Siga_reportesDto,$proveedor);
return $Siga_reportesDto;
}
public function updateSiga_reportes($Siga_reportesDto,$proveedor=null){
//$Siga_reportesDto=$this->validarSiga_reportes($Siga_reportesDto);
$Siga_reportesDao = new Siga_reportesDAO();
//$tmpDto = new Siga_reportesDTO();
//$tmpDto = $Siga_reportesDao->selectSiga_reportes($Siga_reportesDto,$proveedor);
//if($tmpDto!=""){//$Siga_reportesDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_reportesDto = $Siga_reportesDao->updateSiga_reportes($Siga_reportesDto,$proveedor);
return $Siga_reportesDto;
//}
//return "";
}
public function deleteSiga_reportes($Siga_reportesDto,$proveedor=null){
//$Siga_reportesDto=$this->validarSiga_reportes($Siga_reportesDto);
$Siga_reportesDao = new Siga_reportesDAO();
$Siga_reportesDto = $Siga_reportesDao->deleteSiga_reportes($Siga_reportesDto,$proveedor);
return $Siga_reportesDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search, $Siga_reportesDto, $Datos_Proveedor, $Baja) {
$Siga_reportesDao = new Siga_reportesDAO();
return $Siga_reportesDao->llenarDataTable($draw, $columns, $order, $start, $length, $search, $Siga_reportesDto, $Datos_Proveedor, $Baja);
}
}
?>