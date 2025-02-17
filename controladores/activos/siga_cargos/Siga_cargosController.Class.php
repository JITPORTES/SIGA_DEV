<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cargos/Siga_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cargos/Siga_cargosDAO.Class.php");


include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_cargos/Siga_det_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_cargos/Siga_det_cargosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_cargosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_cargos($Siga_cargosDto){
$Siga_cargosDto->setId_Cargo(strtoupper(str_ireplace("'","",trim($Siga_cargosDto->getId_Cargo()))));
$Siga_cargosDto->setNom_Cargo(strtoupper(str_ireplace("'","",trim($Siga_cargosDto->getNom_Cargo()))));
$Siga_cargosDto->setTipo(strtoupper(str_ireplace("'","",trim($Siga_cargosDto->getTipo()))));
$Siga_cargosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_cargosDto->getFech_Inser()))));
$Siga_cargosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_cargosDto->getUsr_Inser()))));
$Siga_cargosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_cargosDto->getFech_Mod()))));
$Siga_cargosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_cargosDto->getUsr_Mod()))));
$Siga_cargosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_cargosDto->getEstatus_Reg()))));
return $Siga_cargosDto;
}
public function selectSiga_cargos($Siga_cargosDto,$proveedor=null){
$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosDao = new Siga_cargosDAO();
$Siga_cargosDto = $Siga_cargosDao->selectSiga_cargos($Siga_cargosDto,$proveedor);
return $Siga_cargosDto;
}
public function selectSiga_ConsGrupos($Siga_cargosDto,$proveedor=null){
$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosDao = new Siga_cargosDAO();
$Siga_cargosDto = $Siga_cargosDao->selectSiga_ConsGrupos($Siga_cargosDto,$proveedor);
return $Siga_cargosDto;
}
public function selectmenucargos($Siga_cargosDto,$proveedor=null){
$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosDao = new Siga_cargosDAO();
$Siga_cargosDto = $Siga_cargosDao->selectmenucargos($Siga_cargosDto,$proveedor);
return $Siga_cargosDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search) {
$Siga_cargosDao = new Siga_cargosDAO();
return $Siga_cargosDao->llenarDataTable($draw, $columns, $order, $start, $length, $search);
}
public function insertSiga_cargos($Siga_cargosDto,$proveedor=null){
//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosDao = new Siga_cargosDAO();
$Siga_cargosDto = $Siga_cargosDao->insertSiga_cargos($Siga_cargosDto,$proveedor);
return $Siga_cargosDto;
}

public function insertcargosdetalle($Siga_cargosDto,$ArrayMenu,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error = false;
	$respuesta = array();
	
	if($Siga_cargosDto!=""){
		//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
		$Siga_cargosDto->setFech_Inser("getdate()");
		$Siga_cargosDao = new Siga_cargosDAO();
		$Siga_cargosDto = $Siga_cargosDao->insertSiga_cargos($Siga_cargosDto,$proveedor);
		//print_r($Siga_cargosDto);

		if($Siga_cargosDto!=""){	
			for($i=0; $i<count($ArrayMenu); $i++) {
			
				if($ArrayMenu[$i]!="")
				{
					if(($ArrayMenu[$i][4]!="N") || ($ArrayMenu[$i][5]!="N")|| ($ArrayMenu[$i][6]!="N")|| ($ArrayMenu[$i][7]!="N")){
						$Siga_det_cargosDto= new Siga_det_cargosDTO();
						$Siga_det_cargosDao= new Siga_det_cargosDAO();
						//$Siga_det_menuDto->setId_Det_Menu();
						$Siga_det_cargosDto->setId_Menu($ArrayMenu[$i][1]);
						$Siga_det_cargosDto->setId_Submenu($ArrayMenu[$i][2]);
						$Siga_det_cargosDto->setId_Cargo($Siga_cargosDto[0]->getId_Cargo());
						$Siga_det_cargosDto->setId_Aplicacion($ArrayMenu[$i][3]);
						$Siga_det_cargosDto->setLectura($ArrayMenu[$i][4]);
						$Siga_det_cargosDto->setAlta($ArrayMenu[$i][5]);
						$Siga_det_cargosDto->setBaja($ArrayMenu[$i][6]);
						$Siga_det_cargosDto->setCambio($ArrayMenu[$i][7]);
						$Siga_det_cargosDto->setFech_Inser("getdate()");
						$Siga_det_cargosDto->setUsr_Inser($Siga_cargosDto[0]->getUsr_Inser());
						//$Siga_det_cargosDto->setFech_Mod("'0000-00-00 00:00:00.000'");
						//$Siga_det_cargosDto->setUsr_Mod("");
						$Siga_det_cargosDto->setEstatus_Reg($Siga_cargosDto[0]->getEstatus_Reg());
						$Siga_det_cargosDto = $Siga_det_cargosDao->insertSiga_det_cargos($Siga_det_cargosDto,$proveedor);
						
						if($Siga_det_cargosDto==""){
							$error = true;
						}
					}
				}
			}
		}
		else
		{
			$error = true;
		}	
	}
	else{
		$error = true;
	}
	
	if ($error == false) {
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "text" => "REGISTRO REALIZADO DE FORMA CORRECTA");
	} else {
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL REGISTRAR");
	}
	$proveedor->close();
	return $respuesta;
}


public function updatecargosdetalle($Siga_cargosDto,$ArrayMenu,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error = false;
	$respuesta = array();
	
	if($Siga_cargosDto!=""){
		//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
		$Siga_cargosDto->setFech_Mod("getdate()");
		$Siga_cargosDao = new Siga_cargosDAO();
		$Siga_cargosDto = $Siga_cargosDao->updateSiga_cargos($Siga_cargosDto,$proveedor);
		//print_r($Siga_cargosDto);

		if($Siga_cargosDto!=""){	
			$Siga_det_cargosDto= new Siga_det_cargosDTO();
			$Siga_det_cargosDao= new Siga_det_cargosDAO();
			$Siga_det_cargosDto->setId_Cargo($Siga_cargosDto[0]->getId_Cargo());
			$Siga_det_cargosDto = $Siga_det_cargosDao->deleteSiga_det_cargos($Siga_det_cargosDto,$proveedor);
			
			if($Siga_det_cargosDto>0)
			{
				for($i=0; $i<count($ArrayMenu); $i++) {
				
					if($ArrayMenu[$i]!="")
					{
						if(($ArrayMenu[$i][4]!="N") || ($ArrayMenu[$i][5]!="N")|| ($ArrayMenu[$i][6]!="N")|| ($ArrayMenu[$i][7]!="N")){
							$Siga_det_cargosDto= new Siga_det_cargosDTO();
							$Siga_det_cargosDao= new Siga_det_cargosDAO();
							////$Siga_det_menuDto->setId_Det_Menu();
							$Siga_det_cargosDto->setId_Menu($ArrayMenu[$i][1]);
							$Siga_det_cargosDto->setId_Submenu($ArrayMenu[$i][2]);
							$Siga_det_cargosDto->setId_Cargo($Siga_cargosDto[0]->getId_Cargo());
							$Siga_det_cargosDto->setId_Aplicacion($ArrayMenu[$i][3]);
							$Siga_det_cargosDto->setLectura($ArrayMenu[$i][4]);
							$Siga_det_cargosDto->setAlta($ArrayMenu[$i][5]);
							$Siga_det_cargosDto->setBaja($ArrayMenu[$i][6]);
							$Siga_det_cargosDto->setCambio($ArrayMenu[$i][7]);
							$Siga_det_cargosDto->setFech_Inser("'".$Siga_cargosDto[0]->getFech_Inser()."'");
							$Siga_det_cargosDto->setUsr_Inser($Siga_cargosDto[0]->getUsr_Inser());
							$Siga_det_cargosDto->setFech_Mod($Siga_cargosDto[0]->getFech_mod());
							$Siga_det_cargosDto->setUsr_Mod($Siga_cargosDto[0]->getUsr_Mod());
							$Siga_det_cargosDto->setEstatus_Reg($Siga_cargosDto[0]->getEstatus_Reg());
							$Siga_det_cargosDto = $Siga_det_cargosDao->insertSiga_det_cargos($Siga_det_cargosDto,$proveedor);
							//
							//if($Siga_det_cargosDto==""){
							//	$error = true;
							//}
						}
					}
				}	
			}else{
				$error = true;
			}
			
			
		}
		else
		{
			$error = true;
		}	
	}
	else{
		$error = true;
	}
	
	if ($error == false) {
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "text" => "REGISTRO ACTUALIZADO DE FORMA CORRECTA");
	} else {
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL MODIFICAR");
	}
	$proveedor->close();
	return $respuesta;
}


public function eliminacionlogica($Siga_cargosDto,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error = false;
	$respuesta = array();
	
	if($Siga_cargosDto!=""){
		//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
		$Siga_cargosDao = new Siga_cargosDAO();
		$Siga_cargosDto->setFech_Mod("getdate()");
		$Siga_cargosDto = $Siga_cargosDao->updateSiga_cargos($Siga_cargosDto,$proveedor);
		//print_r($Siga_cargosDto);

		if($Siga_cargosDto!=""){	
		
			$Siga_det_cargosDto= new Siga_det_cargosDTO();
			$Siga_det_cargosDao= new Siga_det_cargosDAO();
			$Siga_det_cargosDto->setId_Cargo($Siga_cargosDto[0]->getId_Cargo());
			$Siga_det_cargosDto->setEstatus_Reg("3");
			$Siga_det_cargosDto->setUsr_Mod($Siga_cargosDto[0]->getUsr_Mod());
			$Siga_det_cargosDto->setFech_Mod("getdate()");
			$Siga_det_cargosDto = $Siga_det_cargosDao->eliminacionlogica($Siga_det_cargosDto,$proveedor);
			if($Siga_det_cargosDto==""){
				$error = true;
			}	
		}
		else
		{
			$error = true;
		}	
	}
	else{
		$error = true;
	}
	
	if ($error == false) {
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "text" => "REGISTRO REALIZADO DE FORMA CORRECTA");
	} else {
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL REGISTRAR");
	}
	$proveedor->close();
	return $respuesta;
}


public function updateSiga_cargos($Siga_cargosDto,$proveedor=null){
//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosDao = new Siga_cargosDAO();
//$tmpDto = new Siga_cargosDTO();
//$tmpDto = $Siga_cargosDao->selectSiga_cargos($Siga_cargosDto,$proveedor);
//if($tmpDto!=""){//$Siga_cargosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_cargosDto = $Siga_cargosDao->updateSiga_cargos($Siga_cargosDto,$proveedor);
return $Siga_cargosDto;
//}
//return "";
}
public function deleteSiga_cargos($Siga_cargosDto,$proveedor=null){
//$Siga_cargosDto=$this->validarSiga_cargos($Siga_cargosDto);
$Siga_cargosDao = new Siga_cargosDAO();
$Siga_cargosDto = $Siga_cargosDao->deleteSiga_cargos($Siga_cargosDto,$proveedor);
return $Siga_cargosDto;
}
}
?>