<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuarios/Siga_usuariosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_usuarios/Siga_usuariosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_menu/Siga_det_menuDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_menu/Siga_det_menuDAO.Class.php");
//
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuario_areas/Siga_usuario_areasDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_usuario_areas/Siga_usuario_areasDAO.Class.php");
//
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/Siga_usuario_cargos/Siga_usuario_cargosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/Siga_usuario_cargos/Siga_usuario_cargosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_usuariosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_usuarios($Siga_usuariosDto){
$Siga_usuariosDto->setId_Usuario(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getId_Usuario()))));
$Siga_usuariosDto->setNo_Usuario(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getNo_Usuario()))));
$Siga_usuariosDto->setNombre_Usuario(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getNombre_Usuario()))));
$Siga_usuariosDto->setUsuario(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getUsuario()))));
$Siga_usuariosDto->setPassword(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getPassword()))));
$Siga_usuariosDto->setPuesto(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getPuesto()))));
$Siga_usuariosDto->setActivo_Fijo(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getActivo_Fijo()))));
$Siga_usuariosDto->setMesa_Ayuda(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getMesa_Ayuda()))));
$Siga_usuariosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getFech_Inser()))));
$Siga_usuariosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getUsr_Inser()))));
$Siga_usuariosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getFech_Mod()))));
$Siga_usuariosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getUsr_Mod()))));
$Siga_usuariosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_usuariosDto->getEstatus_Reg()))));
return $Siga_usuariosDto;
}

public function selectSiga_login($Siga_usuariosDto,$proveedor=null){
$Siga_usuarios="";

$Usuario=$Siga_usuariosDto->getUsuario();
$Password=$Siga_usuariosDto->getPassword();

$proveedorsiga_tcausr = new Proveedor('sqlserver', 'consultador');
$proveedorsiga_tcausr->connect();
$sql=" select * from tcausr where nombre=rtrim(ltrim('".$Usuario."')) and pwd=rtrim(ltrim('".$Password."')) ";

$proveedorsiga_tcausr->execute($sql);

$proveedorsiga_tcausr->execute($sql);
if (!$proveedorsiga_tcausr->error()){
	if ($proveedorsiga_tcausr->rows($proveedorsiga_tcausr->stmt) > 0) {
		////////////////
		$proveedorsiga = new Proveedor('sqlserver', 'activos');
		$proveedorsiga->connect();
		$sql=" select num_empleado,usuario_sistema_hospitalario from empleados_chs where estatus in('1','3') and usuario_sistema_hospitalario =rtrim(ltrim('".$Usuario."')) ";
		
		/*
		select num_empleado,usuario_sistema_hospitalario from 
		( 
		select num_empleado, usuario_sistema_hospitalario collate Traditional_Spanish_CI_AS as usuario_sistema_hospitalario from empleados_chs where estatus in('1','3') 
		union all 
		select rtrim(aiam_m_clave) as num_empleado, rtrim(aiam_m_clave) as usuario_sistema_hospitalario from directorio_medico where aiam_m_tipo_medico = 'STAFF' and aiam_m_tipo_medico <> 'DEFUNCION' 
		) as empleados_medicos 
		where usuario_sistema_hospitalario = rtrim(ltrim('".$Usuario."')) ";
		*/
		
		$proveedorsiga->execute($sql);
		if (!$proveedorsiga->error()){
			if ($proveedorsiga->rows($proveedorsiga->stmt) > 0) {
				while ($rowsiga = $proveedorsiga->fetch_array($proveedorsiga->stmt, 0)) {
					$Siga_usuariosDto->setUsuario("");
					$Siga_usuariosDto->setPassword("");
					$Siga_usuariosDto->setNo_Usuario($rowsiga["num_empleado"]);
					$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
					$Siga_usuarios_selectDao = new Siga_usuariosDAO();
					$Siga_usuariosDto = $Siga_usuarios_selectDao->selectSiga_usuarios($Siga_usuariosDto, $proveedor);
					$Siga_usuarios=$Siga_usuariosDto;
					//echo $Siga_usuariosDto[0]->getNombre_Usuario();
				}
			}else{
				//Aqui va la rutina para poder agregar un nuevo usuario que se loqgueo pero no esta registrado en el sistema de siga
			}
		}		
		$proveedorsiga->close();
		///////////////////////
		
		//while ($row = $proveedorsiga_tcausr->fetch_array($proveedorsiga_tcausr->stmt, 0)) {
		//	$Desc_Subcategoria=$row["Desc_Subcategoria"];
		//}
	}else{
		//Esto Aplica para Usuarios Externos
		$Siga_usuariosDto = new Siga_usuariosDTO();
		$Siga_usuariosDto->setUsuario($Usuario);
		$Siga_usuariosDto->setPassword($Password);
		$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
		$Siga_usuarios_selectDao = new Siga_usuariosDAO();
		$Siga_usuariosDto = $Siga_usuarios_selectDao->selectSiga_usuarios($Siga_usuariosDto, $proveedor);
		$Siga_usuarios=$Siga_usuariosDto;
	}
}else{
	$error=true;
}
$proveedorsiga_tcausr->close();




/*
if($Siga_usuariosDto==""){
	$proveedor_cons = new Proveedor('sqlserver', 'consultador');
	$proveedor_cons->connect();

	$sql=" select * from tcausr where rtrim(ltrim(nombre))='".$Usuario."' and rtrim(ltrim(pwd))='".$Password."' ";

	$proveedor_cons->execute($sql);
	
	if (!$proveedor_cons->error()){
		if ($proveedor_cons->rows($proveedor_cons->stmt) > 0) {
			while ($row = $proveedor_cons->fetch_array($proveedor_cons->stmt, 0)) {
					//Actualiza el password en siga_usuarios
				
					$proveedorsiga = new Proveedor('sqlserver', 'activos');
					$proveedorsiga->connect();
					$sql=" select * from siga_usuarios where rtrim(ltrim(Usuario))='".$Usuario."' ";

					$proveedorsiga->execute($sql);
					if (!$proveedorsiga->error()){
						if ($proveedorsiga->rows($proveedorsiga->stmt) > 0) {
							while ($rowsiga = $proveedorsiga->fetch_array($proveedorsiga->stmt, 0)) {
								//Actualiza el regitro
								$proveedorsiga_mod = new Proveedor('sqlserver', 'activos');
								$proveedorsiga_mod->connect();
								$sql=" update siga_usuarios set Password='".$Password."' where rtrim(ltrim(Usuario))='".$Usuario."'";
								
								$proveedorsiga_mod->execute($sql);
								if (!$proveedorsiga_mod->error()) {
									$Siga_usuariosDto = new Siga_usuariosDTO();
									$Siga_usuariosDto->setUsuario($Usuario);
									$Siga_usuariosDto->setPassword($Password);
									$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
									$Siga_usuarios_selectDao = new Siga_usuariosDAO();
									$Siga_usuariosDto = $Siga_usuarios_selectDao->selectSiga_usuarios($Siga_usuariosDto, $proveedor);
								}
								$proveedorsiga_mod->close();
							}
						}else{
							//Aqui va la rutina para poder agregar un nuevo usuario que se loqgueo pero no esta registrado en el sistema de siga
						}
					}		
					$proveedorsiga->close();
			}
		}
	}
	
	$proveedor_cons->close();
}
*/

return $Siga_usuarios;
}

public function consultar_depto($No_Usuario){
	$Data = array();
	$Data_Envia = array();
	$Total=0;
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		SELECT count(departamento) as Total FROM empleados_chs where departamento in ('TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES', 'MANTENIMIENTO', 'SERVICIOS GENERALES')  and estatus in(1,3) and num_empleado=".$No_Usuario."
	";
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			$row_tot = $proveedor->fetch_array($proveedor->stmt, 0);
			$Total=$row_tot["Total"];
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	if($error==false){
		$respuesta = array("totalCount" => $Total,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "estatus" => "error", "mensaje" => "No encontrado");
	}
	return $respuesta;
}

public function selectSiga_usuarios($Siga_usuariosDto,$proveedor=null){
$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosDao = new Siga_usuariosDAO();
$Siga_usuariosDto = $Siga_usuariosDao->selectSiga_usuarios($Siga_usuariosDto,$proveedor);
return $Siga_usuariosDto;
}

public function selectSiga_usuariosareascargos($Siga_usuariosDto,$proveedor=null){
$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosDao = new Siga_usuariosDAO();
$Siga_usuariosDto = $Siga_usuariosDao->selectSiga_usuarios($Siga_usuariosDto,$proveedor);
//Usuarios Array
$usuariosE = array();
$usuariosEnvia = array();
$respuesta = array();
//Areas Array
$areasE = array();
$areasEnvia = array();
//Cargos Array
$cargosE = array();
$cargosEnvia = array();



if($Siga_usuariosDto!="")
{
	$usuariosE = array(
		"Id_Usuario" => $Siga_usuariosDto[0]->getId_Usuario(),
        "No_Usuario" => $Siga_usuariosDto[0]->getNo_Usuario(),
        "Nombre_Usuario" => $Siga_usuariosDto[0]->getNombre_Usuario(),
        "Correo" => $Siga_usuariosDto[0]->getCorreo(),
		"Usuario" => $Siga_usuariosDto[0]->getUsuario(),
        "Password" => $Siga_usuariosDto[0]->getPassword(),
        "Puesto" => $Siga_usuariosDto[0]->getPuesto(),
        "Activo_Fijo" => $Siga_usuariosDto[0]->getActivo_Fijo(),
        "Mesa_Ayuda" => $Siga_usuariosDto[0]->getMesa_Ayuda()
    );

    array_push($usuariosEnvia, $usuariosE);
	//Buscar Areas
	$Siga_usuario_areasDto= new Siga_usuario_areasDTO();
	$Siga_usuario_areasDao= new Siga_usuario_areasDAO();
	$Siga_usuario_areasDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
	$Ordenareas=" order by Id_Area asc ";
	$Siga_usuario_areasDto = $Siga_usuario_areasDao->selectSiga_usuario_areas($Siga_usuario_areasDto,$Ordenareas,$proveedor);
	
	if($Siga_usuario_areasDto!=""){
		for($i=0;$i<count($Siga_usuario_areasDto);$i++){
			$areasE = array(
				"Id_Usuario_Area" => $Siga_usuario_areasDto[$i]->getId_Usuario_Area(),
				"Id_Usuario" => $Siga_usuario_areasDto[$i]->getId_Usuario(),
				"Id_Area" => $Siga_usuario_areasDto[$i]->getId_Area()
			);
			array_push($areasEnvia, $areasE);
		}
	}
	//Fin Buscar Areas
	//Buscar Cargos
	$Siga_usuario_cargosDto= new Siga_usuario_cargosDTO();
	$Siga_usuario_cargosDao= new Siga_usuario_cargosDAO();
	$Siga_usuario_cargosDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
	$Ordencargos=" order by Id_Cargo asc ";
	$Siga_usuario_cargosDto = $Siga_usuario_cargosDao->selectSiga_usuario_cargos($Siga_usuario_cargosDto,$Ordencargos,$proveedor);
	
	if($Siga_usuario_cargosDto!=""){
		for($j=0;$j<count($Siga_usuario_cargosDto);$j++){
			$cargosE = array(
				"Id_Usuario_Cargos" => $Siga_usuario_cargosDto[$j]->getId_Usuario_Cargos(),
				"Id_Usuario" => $Siga_usuario_cargosDto[$j]->getId_Usuario(),
				"Id_Cargo" => $Siga_usuario_cargosDto[$j]->getId_Cargo()
			);
			array_push($cargosEnvia, $cargosE);
		}
	}
	//Fin Buscar Cargos
	$respuesta = array("totalCount" => count($usuariosEnvia), "data" => $usuariosEnvia, "totalCountAreasEnvia" => count($areasEnvia), "dataareas" => $areasEnvia, "totalCountCargosEnvia" => count($cargosEnvia), "datacargos" => $cargosEnvia, "estatus" => "ok", "mensaje" => "Registros Encontrados");      
}
else
{
	$respuesta = array("totalCount" => "0", "data" => "", "totalCountAreasEnvia" =>"0", "dataareas" => "", "totalCountCargosEnvia" => "0", "datacargos" => "", "estatus" => "error", "mensaje" => "Registros No Encontrados");  
}
return $respuesta;
}

public function insertusuariosdetalle($Siga_usuariosDto,$ArrayMenu,$CadenaAreas,$CadenaCargos,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error = false;
	$respuesta = array();
	
	if($Siga_usuariosDto!="")
	{
		//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
		$Siga_usuariosDto->setFech_Inser("getdate()");
		$Siga_usuariosDao = new Siga_usuariosDAO();
		$Siga_usuariosDto = $Siga_usuariosDao->insertSiga_usuarios($Siga_usuariosDto,$proveedor);
		
		if($Siga_usuariosDto!=""){
			$array_cadena_areas=explode(',', $CadenaAreas);
			
			if(count($array_cadena_areas)>0)
			{
				for($i = 0; $i <count($array_cadena_areas); $i++){
					$Siga_usuario_areasDto= new Siga_usuario_areasDTO();
					$Siga_usuario_areasDao= new Siga_usuario_areasDAO();
					
					$Siga_usuario_areasDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
					$Siga_usuario_areasDto->setId_Area($array_cadena_areas[$i]);
					$Siga_usuario_areasDto->setFech_Inser("getdate()");
					$Siga_usuario_areasDto->setUsr_Inser($Siga_usuariosDto[0]->getUsr_Inser());
					$Siga_usuario_areasDto->setEstatus_Reg($Siga_usuariosDto[0]->getEstatus_Reg());
					$Siga_usuario_areasDto = $Siga_usuario_areasDao->insertSiga_usuario_areas($Siga_usuario_areasDto,$proveedor);
					
					if($Siga_usuario_areasDto=="")
					{
						$error=true;
					}
				}
			}else{
				$error = true;
			}
			
			$array_cadena_cargos=explode(',', $CadenaCargos);
			
			if(count($array_cadena_cargos)>0)
			{
				for($j = 0; $j <count($array_cadena_cargos); $j++){
					$Siga_usuario_cargosDto= new Siga_usuario_cargosDTO();
					$Siga_usuario_cargosDao= new Siga_usuario_cargosDAO();
					
					$Siga_usuario_cargosDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
					$Siga_usuario_cargosDto->setId_Cargo($array_cadena_cargos[$j]);
					$Siga_usuario_cargosDto->setFech_Inser("getdate()");
					$Siga_usuario_cargosDto->setUsr_Inser($Siga_usuariosDto[0]->getUsr_Inser());
					$Siga_usuario_cargosDto->setEstatus_Reg($Siga_usuariosDto[0]->getEstatus_Reg());
					$Siga_usuario_cargosDto = $Siga_usuario_cargosDao->insertSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor);
					
					if($Siga_usuario_cargosDto=="")
					{
						$error=true;
					}
				}
			}else{
				$error = true;
			}
		}else{
			$error = true;
		}	
		
		//for($i=0; $i<count($ArrayMenu); $i++) {
		//
		//	if($ArrayMenu[$i]!="")
		//	{
		//		if(($ArrayMenu[$i][3]!="N") || ($ArrayMenu[$i][4]!="N")|| ($ArrayMenu[$i][5]!="N")|| ($ArrayMenu[$i][6]!="N")){
		//			$Siga_det_menuDto= new Siga_det_menuDTO();
		//			$Siga_det_menuDao= new Siga_det_menuDAO();
		//			//$Siga_det_menuDto->setId_Det_Menu();
		//			$Siga_det_menuDto->setId_Menu($ArrayMenu[$i][1]);
		//			$Siga_det_menuDto->setId_Submenu($ArrayMenu[$i][2]);
		//			$Siga_det_menuDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
		//			$Siga_det_menuDto->setLectura($ArrayMenu[$i][3]);
		//			$Siga_det_menuDto->setAlta($ArrayMenu[$i][4]);
		//			$Siga_det_menuDto->setBaja($ArrayMenu[$i][5]);
		//			$Siga_det_menuDto->setCambio($ArrayMenu[$i][6]);
		//			$Siga_det_menuDto->setFech_Inser("getdate()");
		//			$Siga_det_menuDto->setUsr_Inser($Siga_usuariosDto[0]->getUsr_Inser());
		//			//$Siga_det_menuDto->setFech_Mod("");
		//			//$Siga_det_menuDto->setUsr_Mod("");
		//			$Siga_det_menuDto->setEstatus_Reg($Siga_usuariosDto[0]->getEstatus_Reg());
		//			$Siga_det_menuDto = $Siga_det_menuDao->insertSiga_det_menu($Siga_det_menuDto,$proveedor);
		//			
		//			if($Siga_det_menuDto==""){
		//				$error = true;
		//			}
		//		}
		//	}
		//}
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

public function updateusuariosdetalle($Siga_usuariosDto,$ArrayMenu,$CadenaAreas,$CadenaCargos,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error = false;
	$respuesta = array();
	
	if($Siga_usuariosDto!=""){
		//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
		$Siga_usuariosDto->setFech_Mod("getdate()");
		$Siga_usuariosDao = new Siga_usuariosDAO();
		$Siga_usuariosDto = $Siga_usuariosDao->updateSiga_usuarios($Siga_usuariosDto,$proveedor);
		
		if($Siga_usuariosDto!="")
		{	
			$Siga_usuario_areasDto= new Siga_usuario_areasDTO();
			$Siga_usuario_areasDao= new Siga_usuario_areasDAO();
			$Siga_usuario_areasDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
			$Siga_usuario_areasDto = $Siga_usuario_areasDao->deleteSiga_usuario_areas($Siga_usuario_areasDto,$proveedor);
			
			if($Siga_usuario_areasDto>0)
			{
				$array_cadena_areas=explode(',', $CadenaAreas);
				
				if(count($array_cadena_areas)>0)
				{
					for($i = 0; $i <count($array_cadena_areas); $i++){
						$Siga_usuario_areasDto= new Siga_usuario_areasDTO();
						$Siga_usuario_areasDao= new Siga_usuario_areasDAO();
						
						$Siga_usuario_areasDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
						$Siga_usuario_areasDto->setId_Area($array_cadena_areas[$i]);
						$Siga_usuario_areasDto->setFech_Inser("'".$Siga_usuariosDto[0]->getFech_Inser()."'");
						$Siga_usuario_areasDto->setUsr_Inser($Siga_usuariosDto[0]->getUsr_Inser());
						$Siga_usuario_areasDto->setFech_Mod($Siga_usuariosDto[0]->getFech_mod());
						$Siga_usuario_areasDto->setUsr_Mod($Siga_usuariosDto[0]->getUsr_Mod());
						$Siga_usuario_areasDto->setEstatus_Reg($Siga_usuariosDto[0]->getEstatus_Reg());
						
						$Siga_usuario_areasDto = $Siga_usuario_areasDao->insertSiga_usuario_areas($Siga_usuario_areasDto,$proveedor);
						
						if($Siga_usuario_areasDto=="")
						{
							$error=true;
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
			
			$Siga_usuario_cargosDto= new Siga_usuario_cargosDTO();
			$Siga_usuario_cargosDao= new Siga_usuario_cargosDAO();
			$Siga_usuario_cargosDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
			$Siga_usuario_cargosDto = $Siga_usuario_cargosDao->deleteSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor);
			
			if($Siga_usuario_cargosDto>0)
			{
				$array_cadena_cargos=explode(',', $CadenaCargos);
				
				if(count($array_cadena_cargos)>0)
				{
					for($j = 0; $j <count($array_cadena_cargos); $j++){
						$Siga_usuario_cargosDto= new Siga_usuario_cargosDTO();
						$Siga_usuario_cargosDao= new Siga_usuario_cargosDAO();
						
						$Siga_usuario_cargosDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
						$Siga_usuario_cargosDto->setId_Cargo($array_cadena_cargos[$j]);
						$Siga_usuario_cargosDto->setFech_Inser("'".$Siga_usuariosDto[0]->getFech_Inser()."'");
						$Siga_usuario_cargosDto->setUsr_Inser($Siga_usuariosDto[0]->getUsr_Inser());
						$Siga_usuario_cargosDto->setFech_Mod($Siga_usuariosDto[0]->getFech_mod());
						$Siga_usuario_cargosDto->setUsr_Mod($Siga_usuariosDto[0]->getUsr_Mod());
						$Siga_usuario_cargosDto->setEstatus_Reg($Siga_usuariosDto[0]->getEstatus_Reg());
						$Siga_usuario_cargosDto = $Siga_usuario_cargosDao->insertSiga_usuario_cargos($Siga_usuario_cargosDto,$proveedor);
						
						if($Siga_usuario_cargosDto=="")
						{
							$error=true;
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
	}
	else{
		$error = true;
	}
	
	if ($error == false) {
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "text" => "REGISTRO REALIZADO DE FORMA CORRECTA");
	} else {
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL MODIFICAR");
	}
	$proveedor->close();
	return $respuesta;
}

public function llenarDataTable($draw, $columns, $order, $start, $length, $search) {
$Siga_usuariosDao = new Siga_usuariosDAO();
return $Siga_usuariosDao->llenarDataTable($draw, $columns, $order, $start, $length, $search);
}

public function insertSiga_usuarios($Siga_usuariosDto,$proveedor=null){
//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosDao = new Siga_usuariosDAO();
$Siga_usuariosDto = $Siga_usuariosDao->insertSiga_usuarios($Siga_usuariosDto,$proveedor);
return $Siga_usuariosDto;
}
public function updateSiga_usuarios($Siga_usuariosDto,$proveedor=null){
//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosDao = new Siga_usuariosDAO();
//$tmpDto = new Siga_usuariosDTO();
//$tmpDto = $Siga_usuariosDao->selectSiga_usuarios($Siga_usuariosDto,$proveedor);
//if($tmpDto!=""){//$Siga_usuariosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_usuariosDto = $Siga_usuariosDao->updateSiga_usuarios($Siga_usuariosDto,$proveedor);
return $Siga_usuariosDto;
//}
//return "";
}
public function deleteSiga_usuarios($Siga_usuariosDto,$proveedor=null){
//$Siga_usuariosDto=$this->validarSiga_usuarios($Siga_usuariosDto);
$Siga_usuariosDao = new Siga_usuariosDAO();
$Siga_usuariosDto = $Siga_usuariosDao->deleteSiga_usuarios($Siga_usuariosDto,$proveedor);
return $Siga_usuariosDto;
}
}
?>