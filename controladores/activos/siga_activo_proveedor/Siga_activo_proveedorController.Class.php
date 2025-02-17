<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_activo_proveedor/Siga_activo_proveedorDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_activo_proveedor/Siga_activo_proveedorDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_activo_proveedorController {
private $proveedor;
public function __construct() {
}
public function validarSiga_activo_proveedor($Siga_activo_proveedorDto){
$Siga_activo_proveedorDto->setId_activo_proveedor(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getId_activo_proveedor()))));
$Siga_activo_proveedorDto->setid_Activo(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getid_Activo()))));
$Siga_activo_proveedorDto->setNumOrdenCompra(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getNumOrdenCompra()))));
$Siga_activo_proveedorDto->setNumFactura(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getNumFactura()))));
$Siga_activo_proveedorDto->setFechaFactura(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getFechaFactura()))));
$Siga_activo_proveedorDto->setUUID(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getUUID()))));
$Siga_activo_proveedorDto->setFolio_Fiscal(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getFolio_Fiscal()))));
$Siga_activo_proveedorDto->setMonto_F(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getMonto_F()))));
$Siga_activo_proveedorDto->setMontoFactura(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getMontoFactura()))));
$Siga_activo_proveedorDto->setNumContrato(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getNumContrato()))));
$Siga_activo_proveedorDto->setVidaUtilFabricante(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getVidaUtilFabricante()))));
$Siga_activo_proveedorDto->setVidaUtilCHS(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getVidaUtilCHS()))));
$Siga_activo_proveedorDto->setGarantia(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getGarantia()))));
$Siga_activo_proveedorDto->setExtGarantia(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getExtGarantia()))));
$Siga_activo_proveedorDto->setFecha_Vencimiento(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getFecha_Vencimiento()))));
$Siga_activo_proveedorDto->setPoliza_Url(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getPoliza_Url()))));
$Siga_activo_proveedorDto->setNombreProveedor(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getNombreProveedor()))));
$Siga_activo_proveedorDto->setId_Proveedor(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getId_Proveedor()))));
$Siga_activo_proveedorDto->setContacto(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getContacto()))));
$Siga_activo_proveedorDto->setTelefono(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getTelefono()))));
$Siga_activo_proveedorDto->setDocRecibida(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getDocRecibida()))));
$Siga_activo_proveedorDto->setAccesorios(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getAccesorios()))));
$Siga_activo_proveedorDto->setCorreo(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getCorreo()))));
$Siga_activo_proveedorDto->setConsumibles(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getConsumibles()))));
$Siga_activo_proveedorDto->setUrl_Contrato(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getUrl_Contrato()))));
$Siga_activo_proveedorDto->setUrl_Otro_Doc(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getUrl_Otro_Doc()))));
$Siga_activo_proveedorDto->setUrl_Factura(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getUrl_Factura()))));
$Siga_activo_proveedorDto->setUrl_Xml(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getUrl_Xml()))));
$Siga_activo_proveedorDto->setLink(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getLink()))));
$Siga_activo_proveedorDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getFech_Inser()))));
$Siga_activo_proveedorDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getUsr_Inser()))));
$Siga_activo_proveedorDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getFech_Mod()))));
$Siga_activo_proveedorDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getUsr_Mod()))));
$Siga_activo_proveedorDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_activo_proveedorDto->getEstatus_Reg()))));
return $Siga_activo_proveedorDto;
}
public function selectSiga_activo_proveedor($Siga_activo_proveedorDto,$proveedor=null){
$Siga_activo_proveedorDto=$this->validarSiga_activo_proveedor($Siga_activo_proveedorDto);
$Siga_activo_proveedorDao = new Siga_activo_proveedorDAO();
$Siga_activo_proveedorDto = $Siga_activo_proveedorDao->selectSiga_activo_proveedor($Siga_activo_proveedorDto,$proveedor);
return $Siga_activo_proveedorDto;
}
public function insertSiga_activo_proveedor($Siga_activo_proveedorDto,$No_Capex, $proveedor=null){
//$Siga_activo_proveedorDto=$this->validarSiga_activo_proveedor($Siga_activo_proveedorDto);
$Siga_activo_proveedorDao = new Siga_activo_proveedorDAO();
$this->insert_update_no_capex($Siga_activo_proveedorDto->getId_Activo(), $No_Capex, $Siga_activo_proveedorDto->getUsr_Inser(), $Siga_activo_proveedorDto->getUsr_Mod());
$Siga_activo_proveedorDto = $Siga_activo_proveedorDao->insertSiga_activo_proveedor($Siga_activo_proveedorDto,$proveedor);
return $Siga_activo_proveedorDto;
}
public function updateSiga_activo_proveedor($Siga_activo_proveedorDto,$No_Capex, $proveedor=null){
//$Siga_activo_proveedorDto=$this->validarSiga_activo_proveedor($Siga_activo_proveedorDto);
$Siga_activo_proveedorDao = new Siga_activo_proveedorDAO();
//$tmpDto = new Siga_activo_proveedorDTO();
//$tmpDto = $Siga_activo_proveedorDao->selectSiga_activo_proveedor($Siga_activo_proveedorDto,$proveedor);
//if($tmpDto!=""){//$Siga_activo_proveedorDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$this->insert_update_no_capex($Siga_activo_proveedorDto->getId_Activo(), $No_Capex, $Siga_activo_proveedorDto->getUsr_Inser(), $Siga_activo_proveedorDto->getUsr_Mod());
$Siga_activo_proveedorDto = $Siga_activo_proveedorDao->updateSiga_activo_proveedor($Siga_activo_proveedorDto,$proveedor);
return $Siga_activo_proveedorDto;
//}
//return "";
}

public function insert_update_no_capex($Id_Activo, $No_Capex, $Usr_Inser, $Usr_Mod){
	$Usuario_Inserto="NULL";
	
	if($Usr_Inser!=""){
		$Usuario_Inserto=$Usr_Inser;
	}else{
		if($Usr_Mod!=""){
			$Usuario_Inserto=$Usr_Mod;	
		}
	}
	
	if($Id_Activo!=""){
		if($No_Capex!=""){
			$proveedor = new Proveedor('sqlserver', 'activos');
			$proveedor->connect();
			$sql=" 
				select COUNT(Id_Activo) as Total from siga_activos_contabilidad where Id_Activo=".$Id_Activo."  
			";
			$proveedor->execute($sql);
			if (!$proveedor->error()){
				if ($proveedor->rows($proveedor->stmt) > 0) {
					$row_tot = $proveedor->fetch_array($proveedor->stmt, 0);
					$Total=$row_tot["Total"];
					if($Total>0){
							$proveedor_u = new Proveedor('sqlserver', 'activos');
							$proveedor_u->connect();
							$sql=" 
								update siga_activos_contabilidad set
									No_Capex='".$No_Capex."', 
									Usr_Mod=".$Usuario_Inserto.", 
									Fech_Mod=getdate(), 
									Estatus_Reg=2
								where 
									Id_Activo=".$Id_Activo."
							";
							$proveedor_u->execute($sql);
							$proveedor_u->close();
					}else{
							$proveedor_i = new Proveedor('sqlserver', 'activos');
							$proveedor_i->connect();
							$sql=" 
								insert into 
									siga_activos_contabilidad 
									(Id_Activo, No_Capex, Fech_Inser, Fech_Mod, Estatus_Reg)
									values
									(".$Id_Activo.", '".$No_Capex."', ".$Usuario_Inserto.", getdate(), 1)
							";
							
							$proveedor_i->execute($sql);	
							$proveedor_i->close();
					}
				}
			}else{
				$Error=true;
			}
			$proveedor->close();
		}
	}
}

public function deleteSiga_activo_proveedor($Siga_activo_proveedorDto,$proveedor=null){
//$Siga_activo_proveedorDto=$this->validarSiga_activo_proveedor($Siga_activo_proveedorDto);
$Siga_activo_proveedorDao = new Siga_activo_proveedorDAO();
$Siga_activo_proveedorDto = $Siga_activo_proveedorDao->deleteSiga_activo_proveedor($Siga_activo_proveedorDto,$proveedor);
return $Siga_activo_proveedorDto;
}
}
?>