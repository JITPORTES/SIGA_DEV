<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_vale_resguardo/Siga_vale_resguardoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_vale_resguardo/Siga_vale_resguardoDAO.Class.php");
//Detalle Vale de Resguardo
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_vale_resguardo/Siga_det_vale_resguardoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_vale_resguardo/Siga_det_vale_resguardoDAO.Class.php");
//Nomina
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_v_empleados_activo_fijo/Siga_v_empleados_activo_fijoDAO.Class.php");
//Jefe por Area
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_jefe_area/Siga_jefe_areaDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_jefe_area/Siga_jefe_areaDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../vistas/CURL.php");
include_once(dirname(__FILE__) . "/../../../datos/logger/Logger.Class.php");
class Siga_vale_resguardoController {
private $proveedor;
public function __construct() {
}
public function validarSiga_vale_resguardo($Siga_vale_resguardoDto){
$Siga_vale_resguardoDto->setId_Vale_Resguardo(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getId_Vale_Resguardo()))));
$Siga_vale_resguardoDto->setId_Tipo_Vale_Resg(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getId_Tipo_Vale_Resg()))));
$Siga_vale_resguardoDto->setNum_Empleado(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getNum_Empleado()))));
$Siga_vale_resguardoDto->setExtension_Tel(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getExtension_Tel()))));
$Siga_vale_resguardoDto->setCorreo(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getCorreo()))));
$Siga_vale_resguardoDto->setObservaciones(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getObservaciones()))));
$Siga_vale_resguardoDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getFech_Inser()))));
$Siga_vale_resguardoDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getUsr_Inser()))));
$Siga_vale_resguardoDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getFech_Mod()))));
$Siga_vale_resguardoDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getUsr_Mod()))));
$Siga_vale_resguardoDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_vale_resguardoDto->getEstatus_Reg()))));
return $Siga_vale_resguardoDto;
}
public function selectSiga_vale_resguardo($Siga_vale_resguardoDto,$proveedor=null){
$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
$Siga_vale_resguardoDao = new Siga_vale_resguardoDAO();
$Siga_vale_resguardoDto = $Siga_vale_resguardoDao->selectSiga_vale_resguardo($Siga_vale_resguardoDto,0,$proveedor);
return $Siga_vale_resguardoDto;
}
public function selectSiga_vale_resguardo_pdf($Siga_vale_resguardoDto,$proveedor=null){
	$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
	$Siga_vale_resguardoDao = new Siga_vale_resguardoDAO();
	$Siga_vale_resguardoDto = $Siga_vale_resguardoDao->selectSiga_vale_resguardo($Siga_vale_resguardoDto,0,$proveedor);
	$error=false;
	//Vale Array
	$Vale_ResgE = array();
	$Vale_ResgEnvia = array();
	$respuesta = array();
	
	if($Siga_vale_resguardoDto!=""){
		//Obtenemos Informacion de la base de datos de nomina para el solicitante
		$Siga_v_empleados_activo_fijoDao = new Siga_v_empleados_activo_fijoDAO();
		$Siga_v_empleados_activo_fijoDto = new Siga_v_empleados_activo_fijoDTO();
		$Siga_v_empleados_activo_fijoDto->setnum_empleado($Siga_vale_resguardoDto[0]->getNum_Empleado());
		$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoDao->selectSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor);
		
		$Nombre_Solicitante="";
		$puesto="";
		$departamento="";
		if($Siga_v_empleados_activo_fijoDto!="")
		{
			$Nombre_Solicitante=$Siga_v_empleados_activo_fijoDto[0]->getnombre_completo();
			$puesto=$Siga_v_empleados_activo_fijoDto[0]->getpuesto();
			$departamento=$Siga_v_empleados_activo_fijoDto[0]->getdepartamento();
		}else{
			$error=true;
		}
		/////////////////////
		//Obtenemos Informacion del jefe del area
		$Siga_jefe_areaDao = new Siga_jefe_areaDAO();
		$Siga_jefe_areaDto = new Siga_jefe_areaDTO();
		$Siga_jefe_areaDto->setId_Area($Siga_vale_resguardoDto[0]->getId_Area());
		$Siga_jefe_areaDto->setEstatus_Reg("1");
		$Siga_jefe_areaDto = $Siga_jefe_areaDao->selectSiga_jefe_area($Siga_jefe_areaDto,$proveedor);
		
		$Nombre_Jefe_Area="";
		$Correo_Jefe_Area="";
		$Num_Empleado_Jefe="";
		if($Siga_jefe_areaDto!=""){
			$Nombre_Jefe_Area=$Siga_jefe_areaDto[0]->getNombre();
			$Correo_Jefe_Area=$Siga_jefe_areaDto[0]->getCorreo();
			$Num_Empleado_Jefe=$Siga_jefe_areaDto[0]->getNum_Empleado();
		}else{
			$error=true;
		}
		
		
		$Oficina="";
		$Telefono="";
		$Correo="";
		/////////////////////
		$proveedor_emp = new Proveedor('sqlserver', 'activos');
		$proveedor_emp->connect();
		$consulta_emp.=" select * from empleados_chs where num_empleado=".$Siga_vale_resguardoDto[0]->getNum_Empleado();
		$proveedor_emp->execute($consulta_emp);
		if (!$proveedor_emp->error()) {
			if ($proveedor_emp->rows($proveedor_emp->stmt) > 0) {
				
				while ($row_emp = $proveedor_emp->fetch_array($proveedor_emp->stmt, 0)) {
					$Oficina=$row_emp["gerencia"];
					$Telefono=$row_emp["ext_telefonica"];
					$Correo=$row_emp["email"];
        }
			}else{
				$error=true;
			}
		}else{
			$error=true;
		}
		$proveedor_emp->close();
		
		
		////////////////////////
		$Vale_ResgE = array(
			"Id_Vale_Resguardo" => $Siga_vale_resguardoDto[0]->getId_Vale_Resguardo(),
			"Id_Tipo_Vale_Resg" => $Siga_vale_resguardoDto[0]->getId_Tipo_Vale_Resg(),
			"Id_Area" => $Siga_vale_resguardoDto[0]->getId_Area(),
			"Num_Empleado" => $Siga_vale_resguardoDto[0]->getNum_Empleado(),
			"Extension_Tel" => $Siga_vale_resguardoDto[0]->getExtension_Tel(),
			"Correo" => $Siga_vale_resguardoDto[0]->getCorreo(),
			"Observaciones" => $Siga_vale_resguardoDto[0]->getObservaciones(),
			"Estatus_Envio" => $Siga_vale_resguardoDto[0]->getEstatus_Envio(),
			"Estatus_Correo_Responsable" => $Siga_vale_resguardoDto[0]->getEstatus_Correo_Responsable(),
			"Estatus_Correo_Solicitante" => $Siga_vale_resguardoDto[0]->getEstatus_Correo_Solicitante(),
			"Fech_Inser" => $Siga_vale_resguardoDto[0]->getFech_Inser(),
			"Usr_Inser" => $Siga_vale_resguardoDto[0]->getUsr_Inser(),
			"Fech_Mod" => $Siga_vale_resguardoDto[0]->getFech_Mod(),
			"Usr_Mod" => $Siga_vale_resguardoDto[0]->getUsr_Mod(),
			"Estatus_Reg" => $Siga_vale_resguardoDto[0]->getEstatus_Reg(),
			"Desc_Tipo_Vale_Resg" => $Siga_vale_resguardoDto[0]->getDesc_Tipo_Vale_Resg(),
			"Nom_Area" => $Siga_vale_resguardoDto[0]->getNom_Area(),
			//Nomina
			"Nombre_Solicitante"=>$Nombre_Solicitante,
			"Puesto"=>$puesto,
			"Departamento"=>$departamento,
			//Jefe Area
			"Nombre_Jefe_Area"=>$Nombre_Jefe_Area,
			"Correo_Jefe_Area"=>$Correo_Jefe_Area,
			"Num_Empleado_Jefe"=>$Num_Empleado_Jefe,
			"Tel_Resp"=>$Telefono,
			"Oficina_Resp"=>$Oficina,
			"Correo_Resp"=>$Correo
		);
		
		array_push($Vale_ResgEnvia, $Vale_ResgE);
		
		
		//Buscar Detalle Vale Resguardo
		$campos=[];
		$contador = 0;
		
		$proveedor = new Proveedor('sqlserver', 'activos');
		$proveedor->connect();
		
		$consulta="select DVR.Id_Det_Vale_Resguardo, DVR.Id_Vale_Resguardo, DVR.Id_Activo, DVR.Estatus_Reg, A.AF_BC, A.Nombre_Activo, CA.Nom_Area, CD.Des_Departamento, A.Estatus_Reg, UP.Desc_Ubic_Prim, US.Desc_Ubic_Sec, A.NumSerie, A.Fech_Inser from  siga_det_vale_resguardo DVR";
		$consulta.=" left join siga_activos A on DVR.Id_Activo=A.Id_Activo";
		$consulta.=" left outer join siga_baja_activo SB on A.Id_Activo=SB.Id_Activo ";
		$consulta.=" left join siga_catareas CA on A.Id_Area=CA.Id_Area";
		
		$consulta.=" left join siga_cat_ubic_prim UP on A.Id_Ubic_Prim=UP.Id_Ubic_Prim";
		$consulta.=" left join siga_cat_ubic_sec US on A.Id_Ubic_Sec=US.Id_Ubic_Sec";
		
		
		$consulta.=" left join siga_cat_departamento CD on A.Id_Departamento=CD.Id_Departamento where DVR.Id_Vale_Resguardo=".$Siga_vale_resguardoDto[0]->getId_Vale_Resguardo()." and DVR.Estatus_Reg <> '3' and SB.EstatusBaja is null ";
		
		
		$proveedor->execute($consulta);
		if (!$proveedor->error()) {
			if ($proveedor->rows($proveedor->stmt) > 0) {
				
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					//$campos[$contador] = $row[0];
					$campos[$contador] = array("Id_Det_Vale_Resguardo" => $row[0], "Id_Vale_Resguardo" => $row[1], "Id_Activo"=>$row[2], "Estatus_Reg"=>$row[3], "AF_BC"=>$row[4],"Nombre_Activo"=>$row[5],'Nom_Area'=>$row[6],'Des_Departamento'=>$row[7],'Estatus_Activo'=>$row[8],'Desc_Ubic_Prim'=>$row[9],'Desc_Ubic_Sec'=>$row[10],'NumSerie'=>$row[11],'Fech_Inser'=>$row[12]);
                    $contador++;
                }
			}else{
				$error=true;
			}
		}else{
			$error=true;
		}
		$proveedor->close();
		//////////////////////////////////////////////////
	}
	else
	{
		$error=true;  
	}
	
	if($error==false){
		$respuesta = array("totalCount" => count($Vale_ResgEnvia), "data" => $Vale_ResgEnvia,"totalCountDetalle" => count($campos), "data_Detalle" => $campos, "estatus" => "ok", "mensaje" => "Registros Encontrados");
	}
	else{
		$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "Registros No Encontrados");
	}
	return $respuesta;
}

public function selectSiga_vale_resguardo_tbl_dynamic($Siga_vale_resguardoDto,$Historico,$proveedor=null){
	$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
	$Siga_vale_resguardoDao = new Siga_vale_resguardoDAO();
	$Siga_vale_resguardoDto = $Siga_vale_resguardoDao->selectSiga_vale_resguardo($Siga_vale_resguardoDto,$Historico,$proveedor);

	//Vale Array
	$Vale_ResgE = array();
	$Vale_ResgEnvia = array();
	$respuesta = array();
	
	if($Siga_vale_resguardoDto!="")
	{
		for($i=0; $i<count($Siga_vale_resguardoDto); $i++) {

			$Siga_v_empleados_activo_fijoDao = new Siga_v_empleados_activo_fijoDAO();
			$Siga_v_empleados_activo_fijoDto = new Siga_v_empleados_activo_fijoDTO();
			$Siga_v_empleados_activo_fijoDto->setnum_empleado($Siga_vale_resguardoDto[$i]->getNum_Empleado());
			$Siga_v_empleados_activo_fijoDto = $Siga_v_empleados_activo_fijoDao->selectSiga_v_empleados_activo_fijo($Siga_v_empleados_activo_fijoDto,$proveedor);
			
			$nombre_completo="";
			$puesto="";
			$departamento="";
			if($Siga_v_empleados_activo_fijoDto!="")
			{
				$nombre_completo=$Siga_v_empleados_activo_fijoDto[0]->getnombre_completo();
				$puesto=$Siga_v_empleados_activo_fijoDto[0]->getpuesto();
				$departamento=$Siga_v_empleados_activo_fijoDto[0]->getdepartamento();
			}
			
			$Vale_ResgE = array(
				"Id_Vale_Resguardo" => $Siga_vale_resguardoDto[$i]->getId_Vale_Resguardo(),
				"Id_Tipo_Vale_Resg" => $Siga_vale_resguardoDto[$i]->getId_Tipo_Vale_Resg(),
				"Id_Area" => $Siga_vale_resguardoDto[$i]->getId_Area(),
				"Num_Empleado" => $Siga_vale_resguardoDto[$i]->getNum_Empleado(),
				"Extension_Tel" => $Siga_vale_resguardoDto[$i]->getExtension_Tel(),
				"Correo" => $Siga_vale_resguardoDto[$i]->getCorreo(),
				"Observaciones" => $Siga_vale_resguardoDto[$i]->getObservaciones(),
				"Estatus_Envio" => $Siga_vale_resguardoDto[$i]->getEstatus_Envio(),
				"Estatus_Correo_Responsable" => $Siga_vale_resguardoDto[$i]->getEstatus_Correo_Responsable(),
				"Estatus_Correo_Solicitante" => $Siga_vale_resguardoDto[$i]->getEstatus_Correo_Solicitante(),
				"Fech_Inser" => $Siga_vale_resguardoDto[$i]->getFech_Inser(),
				"Usr_Inser" => $Siga_vale_resguardoDto[$i]->getUsr_Inser(),
				"Fech_Mod" => $Siga_vale_resguardoDto[$i]->getFech_Mod(),
				"Usr_Mod" => $Siga_vale_resguardoDto[$i]->getUsr_Mod(),
				"Estatus_Reg" => $Siga_vale_resguardoDto[$i]->getEstatus_Reg(),
				"Desc_Tipo_Vale_Resg" => $Siga_vale_resguardoDto[$i]->getDesc_Tipo_Vale_Resg(),
				"Nom_Area" => $Siga_vale_resguardoDto[$i]->getNom_Area(),
				//Nomina
				"nombre_completo"=>$nombre_completo,
				"puesto"=>$puesto,
				"departamento"=>$departamento
			);
			
			array_push($Vale_ResgEnvia, $Vale_ResgE);
		}
		//Fin 
		$respuesta = array("totalCount" => count($Siga_vale_resguardoDto), "data" => $Vale_ResgEnvia,"estatus" => "ok", "mensaje" => "Registros Encontrados");      
	}
	else
	{
		$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "Registros No Encontrados");  
	}
	return $respuesta;
}

public function selectSiga_Tabla_Activos($Siga_vale_resguardoDto,$Id_Tipo_Vale_Resg_Bus, $Id_Area_Sesion_Bus, $Num_Empleado_Bus, $Estatus_Reg_Bus, $proveedor=null){
	
	
	$Id_Vale_Resguardo=$Siga_vale_resguardoDto->getId_Vale_Resguardo();
	//Vale Array
	$Data = array();
	$Data_Envia = array();
	$respuesta = array();
	$error=false;
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	//Buscar Detalle Vale Resguardo
	$campos=[];
	$contador = 0;
	
	if($Id_Vale_Resguardo!="")
	{
		$consulta="select DVR.Id_Det_Vale_Resguardo, DVR.Id_Vale_Resguardo, DVR.Id_Activo, DVR.Estatus_Reg, A.AF_BC, A.Nombre_Activo, CA.Nom_Area, CD.Des_Departamento, A.Estatus_Reg as Estatus_Activo,CUP.Desc_Ubic_Prim,CUS.Desc_Ubic_Sec, A.Marca, A.Modelo, A.NumSerie from  siga_det_vale_resguardo DVR";
		$consulta.=" left join siga_activos A on DVR.Id_Activo=A.Id_Activo";
		$consulta.=" left join siga_catareas CA on A.Id_Area=CA.Id_Area";
		$consulta.=" left join siga_cat_ubic_prim CUP on A.Id_Ubic_Prim = CUP.Id_Ubic_Prim";
		$consulta.=" left join siga_cat_ubic_sec CUS on A.Id_Ubic_Sec = CUS.Id_Ubic_Sec";
		$consulta.=" left outer join siga_baja_activo SB on A.Id_Activo=SB.Id_Activo  ";
		$consulta.=" left join siga_cat_departamento CD on A.Id_Departamento=CD.Id_Departamento where DVR.Id_Vale_Resguardo=".$Id_Vale_Resguardo." and DVR.Estatus_Reg <> '3' and SB.EstatusBaja is null ";
		
		$proveedor->execute($consulta);
		if (!$proveedor->error()) {
			if ($proveedor->rows($proveedor->stmt) > 0) {
				
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					//$campos[$contador] = $row[0];
					$campos[$contador] = array(
						"Id_Det_Vale_Resguardo" => $row["Id_Det_Vale_Resguardo"], 
						"Id_Vale_Resguardo" => $row["Id_Vale_Resguardo"], 
						"Id_Activo"=>$row["Id_Activo"], 
						"Estatus_Reg"=>$row["Estatus_Reg"], 
						"AF_BC"=>$row["AF_BC"],
						"Nombre_Activo"=>$row["Nombre_Activo"],
						"Nom_Area"=>$row["Nom_Area"],
						"Des_Departamento"=>$row["Des_Departamento"],
						"Estatus_Activo"=>$row["Estatus_Activo"],
						"Desc_Ubic_Prim"=>$row["Desc_Ubic_Prim"],
						"Desc_Ubic_Sec"=>$row["Desc_Ubic_Sec"],
						"Marca"=>$row["Marca"],
						"Modelo"=>$row["Modelo"],
						"NumSerie"=>$row["NumSerie"]
					);
                    $contador++;
                }
			}
		}else
		{
			$error=true;
		}
	}
	
	
	$sql=' select SA.Id_Activo, SA.AF_BC, SA.Nombre_Activo,SA.Marca,SA.Modelo,SA.NumSerie,CUP.Desc_Ubic_Prim,CUS.Desc_Ubic_Sec, SA.Id_Tipo_Vale_Resg, SA.Id_Area, SC.Nom_Area, SA.Id_Departamento, SD.Des_Departamento,SA.Num_Empleado,'; 
	$sql.=' SA.Nombre_Completo, SA.Estatus_Reg';
	$sql.=' from  siga_activos SA';
	$sql.=' left join siga_catareas SC on SA.Id_Area=SC.Id_Area';
	$sql.=' left join siga_cat_departamento SD on SA.Id_Departamento=SD.Id_Departamento';
	$sql.=" left join siga_cat_ubic_prim CUP on SA.Id_Ubic_Prim = CUP.Id_Ubic_Prim";
	$sql.=" left join siga_cat_ubic_sec CUS on SA.Id_Ubic_Sec = CUS.Id_Ubic_Sec";
	$sql.=" left outer join siga_baja_activo SB on SA.Id_Activo=SB.Id_Activo ";
	$sql.=' where ';
	$sql.=" SA.Estatus_Reg <> '3' and SB.EstatusBaja is null and SA.Num_Empleado='".$Num_Empleado_Bus."' and SA.Id_Tipo_Vale_Resg='".$Id_Tipo_Vale_Resg_Bus."' and SA.Id_Area='".$Id_Area_Sesion_Bus."'  ";
	//$sql.=' and SA.Id_Activo not in';
	//$sql.=' (select ';
	////$sql.='--SVR.Id_Vale_Resguardo, SVR.Id_Tipo_Vale_Resg, SVR.Id_Area, SVR.Num_Empleado, SVR.Extension_Tel, SVR.Correo, SVR.Observaciones, ';
	//$sql.=' SDV.Id_Activo ';
	//$sql.=' from siga_vale_resguardo SVR ';
	//$sql.=" left join siga_det_vale_resguardo SDV on SVR.Id_Vale_Resguardo=SDV.Id_Vale_Resguardo and SDV.Estatus_Reg <> '3'";
	////$sql.="--left join siga_activos SA on SDV.Id_Activo = SA.Id_Activo and SA.Estatus_Reg <> '3' and SVR.Num_Empleado=SA.Num_Empleado";
	//$sql.=" where SA.Id_Tipo_Vale_Resg='".$Id_Tipo_Vale_Resg_Bus."' and SVR.Estatus_Reg <> '3' and SVR.Num_Empleado='".$Num_Empleado_Bus."' and SA.Id_Area='".$Id_Area_Sesion_Bus."'";
	//$sql.=' )';
   

	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				$Data= array(
					"Id_Activo" => $row["Id_Activo"],
					"AF_BC" => $row["AF_BC"],
					"Nombre_Activo" => $row["Nombre_Activo"],
					"Id_Tipo_Vale_Resg" => $row["Id_Tipo_Vale_Resg"],
					"Id_Area" => $row["Id_Area"],
					"Nom_Area" => $row["Nom_Area"],
					"Id_Departamento" => $row["Id_Departamento"],
					"Des_Departamento" => $row["Des_Departamento"],
					"Num_Empleado" => $row["Num_Empleado"],
					"Nombre_Completo" => $row["Nombre_Completo"],
					"Estatus_Reg" => $row["Estatus_Reg"],
					"Marca" => $row["Marca"],
					"Modelo" => $row["Modelo"],
					"NumSerie" => $row["NumSerie"],
					"Desc_Ubic_Prim" => $row["Desc_Ubic_Prim"],
					"Desc_Ubic_Sec" => $row["Desc_Ubic_Sec"]
				);
			
				array_push($Data_Envia, $Data);
			}
		}	
    }else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia), "data" => $Data_Envia,"totalCountDetalle" => count($campos), "data_Detalle" => $campos,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}


public function insertSiga_vale_resguardo($Siga_vale_resguardoDto,$cadena_id_activos, $enviar_correo, $mensaje_correo, $con_copia, $proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error = false;
	$respuesta = array();
	if($Siga_vale_resguardoDto!="")
	{
		//$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
		$Siga_vale_resguardoDao = new Siga_vale_resguardoDAO();
		$Siga_vale_resguardoDto = $Siga_vale_resguardoDao->insertSiga_vale_resguardo($Siga_vale_resguardoDto,$proveedor);
		$Id_Vale_Resguardo=$Siga_vale_resguardoDto[0]->getId_Vale_Resguardo();
		$Correo_solicitante=$Siga_vale_resguardoDto[0]->getCorreo();
		if($Siga_vale_resguardoDto!="")
		{
			if(count($cadena_id_activos)>0)
			{
				for($i=0; $i<count($cadena_id_activos); $i++) {
					if($cadena_id_activos[$i]!="N")
					{
						$Siga_det_vale_resguardoDto= new Siga_det_vale_resguardoDTO();
						$Siga_det_vale_resguardoDao= new Siga_det_vale_resguardoDAO();
						
						$Siga_det_vale_resguardoDto->setId_Vale_Resguardo($Siga_vale_resguardoDto[0]->getId_Vale_Resguardo());
						$Siga_det_vale_resguardoDto->setId_Activo($cadena_id_activos[$i]);
						$Siga_det_vale_resguardoDto->setUsr_Inser($Siga_vale_resguardoDto[0]->getUsr_Inser());
						$Siga_det_vale_resguardoDto->setEstatus_Reg($Siga_vale_resguardoDto[0]->getEstatus_Reg());
						$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoDao->insertSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor);
						
						if($Siga_det_vale_resguardoDto==""){
							$error=true;
						}
					}	
				}
			}else{
				$error = true;
			}
		}else{
			$error = true;
		}
	}
	else{
		$error = true;
	}
	
	if ($error == false) {
		if($enviar_correo==1){
		
			$Subject="SIGA: Vale de Resguardo (Folio: ".$Id_Vale_Resguardo.")";
			
			$Body='<font face="arial" size="2.5">'.$mensaje_correo.'</font>';
			
			$Body.='<br><br><font face="arial" size="2.5"><a href="https://apps2.hospitalsatelite.com/siga/controladores/activos/siga_vale_resguardo/reporte.php?Id_Vale_Resguardo='.$Id_Vale_Resguardo.'">Vale de Resguardo</a></font>';
			$Body.='<br><br><br><font face="arial" size="1"><i>* Este es un envío automatizado, no es necesario responder este correo.</i></font>';
			
			$Body=str_replace("á", "a|", $Body);
			$Body=str_replace("Á", "A|", $Body);
			$Body=str_replace("é", "e|", $Body);
			$Body=str_replace("É", "E|", $Body);
			$Body=str_replace("í", "i|", $Body);
			$Body=str_replace("Í", "I|", $Body);
			$Body=str_replace("ó", "o|", $Body);
			$Body=str_replace("Ó", "O|", $Body);
			$Body=str_replace("ú", "u|", $Body);
			$Body=str_replace("Ú", "U|", $Body);
			$Body=str_replace("ñ", "n|", $Body);
			$Body=str_replace("Ñ", "N|", $Body);
			$obj = new CURL();
			$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
			$data = array('strPassword' => 'C68H17S49', 'strSubject' => $Subject,'strTo'=>'cleon@hospitalsatelite.com','strHTMLBody'=>$Body,'strCc'=>$con_copia,'strBCC'=>'itdeveloper@hospitalsatelite.com');
			//$data = array('strPassword' => 'C68H17S49', 'strSubject' => $Subject,'strTo'=>$Correo_solicitante,'strHTMLBody'=>$Body,'strCc'=>$con_copia,'strBCC'=>'jrivera@hospitalsatelite.com');
			$correoASP = $obj->curlData($url,$data);
		}
		
		
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "text" => "VALE GENERADO CORRECTAMENTE", "Id_Vale_Resguardo"=>$Id_Vale_Resguardo);
	} else {
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL GENERAR EL VALE");
	}
	$proveedor->close();
	return $respuesta;
}



public function guardar_vales_todos($Siga_vale_resguardoDto, $enviar_correo, $mensaje_correo, $con_copia, $proveedor=null){
		
	$cont=0;
	$Data = array();
	$Data_Envia = array();
	$proveedor_tra = new Proveedor('sqlserver', 'activos');
	$proveedor_tra->connect();
	$proveedor_tra->beginTransaction();
	$error = false;
	$respuesta = array();
	
	if($Siga_vale_resguardoDto!="")
	{
		$sql="
			select distinct sa.Num_Empleado from siga_activos sa
			left join siga_baja_activo sb on sa.Id_Activo=sb.Id_Activo
			left join empleados_chs on sa.Num_Empleado=empleados_chs.num_empleado
			where Estatus_Reg<>3 and Id_Area=".$Siga_vale_resguardoDto->getId_Area()." and sb.Id_Activo is null and sa.Num_Empleado is not null and sa.Num_Empleado <>'0'
			and sa.Id_Tipo_Vale_Resg=".$Siga_vale_resguardoDto->getId_Tipo_Vale_Resg()." and empleados_chs.estatus in(1,3))";
//			AND sa.Num_Empleado in (54,98,113,155,237,242,263,272,292,315,378,381,481,490,643,722,785,827,836,898,899,973,1003,1042,1062,1071,1135,1225,1366,1367,1416,1440,1470,1694,1861,1871,1953,1973,2104,2166,2245,2301,2427,2468,2618,2780,2927,2988,3032,3034,3147,3156

		$proveedor_tra->execute($sql);
		
		if (!$proveedor_tra->error()){
		//La posicion cero no se toma
		if ($proveedor_tra->rows($proveedor_tra->stmt) > 0) {
			while ($row_c = $proveedor_tra->fetch_array($proveedor_tra->stmt, 0)) {
				$num_emp=$row_c["Num_Empleado"];
				$cont=$cont+1;
				$sql_s="
					select sa.Id_Activo, (select email from empleados_chs where sa.Num_Empleado=empleados_chs.num_empleado and email like '%@hospitalsatelite%') as email from siga_activos sa
					left join siga_baja_activo sb on sa.Id_Activo=sb.Id_Activo
					where Estatus_Reg<>3 and Id_Area=".$Siga_vale_resguardoDto->getId_Area()." and sb.Id_Activo is null 
					and Num_Empleado is not null and Num_Empleado <>'0'
					and Num_Empleado='".$num_emp."' and sa.Id_Tipo_Vale_Resg=".$Siga_vale_resguardoDto->getId_Tipo_Vale_Resg()."
				";

				$proveedor = new Proveedor('sqlserver', 'activos');
				$proveedor->connect();
				$proveedor->execute($sql_s);
				if (!$proveedor->error()){
					if ($proveedor->rows($proveedor->stmt) > 0) {
						$contador_cad=0;
						$cadena_activos = array();
						$correo_electronico="";
						while ($row_s = $proveedor->fetch_array($proveedor->stmt, 0)) {
							if($row_s["email"]!=""){
								$correo_electronico=$row_s["email"];
							}
								
							$cadena_activos[$contador_cad]=$row_s["Id_Activo"];
							$contador_cad=$contador_cad+1;
						}
						
						//Elimina vales si existe alguno
							$delete_vale_d = new Proveedor('sqlserver', 'activos');
							$delete_vale_d->connect();
							$consulta="update siga_det_vale_resguardo set Estatus_Reg=4, Fech_Mod=getdate(), Usr_Mod='".$Siga_vale_resguardoDto->getUsr_Inser()."' where Id_Vale_Resguardo in (select Id_Vale_Resguardo from siga_vale_resguardo where Id_Area=".$Siga_vale_resguardoDto->getId_Area()." and Num_Empleado=".$num_emp." and Id_Tipo_Vale_Resg=".$Siga_vale_resguardoDto->getId_Tipo_Vale_Resg()." and Estatus_Reg not in(3,4))";
							$delete_vale_d->execute($consulta);
		
							if (!$delete_vale_d->error()) {
								$delete_vale_m = new Proveedor('sqlserver', 'activos');
								$delete_vale_m->connect();
								$consulta="update siga_vale_resguardo set Estatus_Reg=4, Fech_Mod=getdate(), Usr_Mod='".$Siga_vale_resguardoDto->getUsr_Inser()."' where Id_Area=".$Siga_vale_resguardoDto->getId_Area()." and Num_Empleado=".$num_emp." and Id_Tipo_Vale_Resg=".$Siga_vale_resguardoDto->getId_Tipo_Vale_Resg()." and Estatus_Reg not in(3,4)";
								$delete_vale_m->execute($consulta);
			
								if (!$delete_vale_m->error()) {
								}else{
									$error=true;
								}
							
							}else{
								$error=true;
							}
						//Fin Elimina vales si existe alguno
						
						
						$Siga_vale_resguardoDto->setNum_Empleado($row_c["Num_Empleado"]);
						$Siga_vale_resguardoDto->setEstatus_Envio(0);
						$Siga_vale_resguardoDto->setEstatus_Correo_Responsable(0);
						$Siga_vale_resguardoDto->setEstatus_Correo_Solicitante(0);
						$Siga_vale=$this->insertSiga_vale_resguardo($Siga_vale_resguardoDto, $cadena_activos);
						
						if($enviar_correo==1){
							if($correo_electronico!=""){
								if($Siga_vale['totalCount']==1){
									$Subject="SIGA: Vale de Resguardo (Folio: ".$Siga_vale['Id_Vale_Resguardo'].")";
									
									$Body='<font face="arial" size="2.5">'.$mensaje_correo.'</font>';
									
									$Body.='<br><br><font face="arial" size="2.5"><a href="https://apps2.hospitalsatelite.com/siga/controladores/activos/siga_vale_resguardo/reporte.php?Id_Vale_Resguardo='.$Siga_vale['Id_Vale_Resguardo'].'">Vale de Resguardo</a></font>';
									$Body.='<br><br><br><font face="arial" size="1"><i>* Este es un envío automatizado, no es necesario responder este correo.</i></font>';
									
									$Body=str_replace("á", "a|", $Body);
									$Body=str_replace("Á", "A|", $Body);
									$Body=str_replace("é", "e|", $Body);
									$Body=str_replace("É", "E|", $Body);
									$Body=str_replace("í", "i|", $Body);
									$Body=str_replace("Í", "I|", $Body);
									$Body=str_replace("ó", "o|", $Body);
									$Body=str_replace("Ó", "O|", $Body);
									$Body=str_replace("ú", "u|", $Body);
									$Body=str_replace("Ú", "U|", $Body);
									$Body=str_replace("ñ", "n|", $Body);
									$Body=str_replace("Ñ", "N|", $Body);
									
									$obj = new CURL();
									$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
									//envio a Cesarin
									$data = array('strPassword' => 'C68H17S49', 'strSubject' => $Subject,'strTo'=>"cleon@hospitalsatelite.com",'strHTMLBody'=>$Body,'strCc'=>"",'strBCC'=>'itdeveloper@hospitalsatelite.com');
									//$data = array('strPassword' => 'C68H17S49', 'strSubject' => $Subject,'strTo'=>$correo_electronico,'strHTMLBody'=>$Body,'strCc'=>$con_copia,'strBCC'=>'itdeveloper@hospitalsatelite.com');
									$correoASP = $obj->curlData($url,$data);
									
									
									//$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
									//$data = array('strPassword' => 'C68H17S49', 'strSubject' => $Subject,'strTo'=>"jrivera@hospitalsatelite.com",'strHTMLBody'=>$Body,'strCc'=>'','strBCC'=>'');
									
									/*
									//url contra la que atacamos
									$ch = curl_init($url);
									//a true, obtendremos una respuesta de la url, en otro caso, 
									//true si es correcto, false si no lo es
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
									//establecemos el verbo http que queremos utilizar para la petición
									curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
									//enviamos el array data
									curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
									//obtenemos la respuesta
									$response = curl_exec($ch);
									// Se cierra el recurso CURL y se liberan los recursos del sistema
									curl_close($ch);
									
									echo $response;
									if(!$response) {
											echo 0;
									}else{
											echo 1;
									}
									*/
								}
							}
						}
						
						
						
					}
				}else{
					$error=true;
				}
				
				
				
				
				//$prov=$proveedor;
				//
				//$Siga_vale_resguardoDto->setNum_Empleado($row_c["Num_Empleado"]);
				//$Siga_vale_resguardoDto->setEstatus_Envio(0);
				//$Siga_vale_resguardoDto->setEstatus_Correo_Responsable(0);
				//$Siga_vale_resguardoDto->setEstatus_Correo_Solicitante(0);
				//
				//$Siga_vale_resguardoDao = new Siga_vale_resguardoDAO();
				//$Siga_vale_resguardoDto = $Siga_vale_resguardoDao->insertSiga_vale_resguardo($Siga_vale_resguardoDto,$prov);
				//$Id_Vale_Resguardo=$Siga_vale_resguardoDto[0]->getId_Vale_Resguardo();
				//if($Siga_vale_resguardoDto!=""){
				//	
				//	
				//	
				//}else{
				//	$error = true;
				//}
				
				
				//$Data= array(
				//	"Num_Empleado"=>$row_c["Num_Empleado"],
				//);
				//array_push($Data_Envia, $Data);
			}
		}
		
		
	}else{
		$error=true;
	}
		
		
		
	}
	else{
		$error = true;
	}
	
	if ($error == false) {
		$proveedor_tra->commit();
		$respuesta = array("totalCount" => "1", "text" => "VALES GENERADO CORRECTAMENTE", "con"=>$cont);
	} else {
		$proveedor_tra->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL GENERAR EL VALE");
	}
	$proveedor_tra->close();
	return $respuesta;
}


	public function query($sql, $proveedor){
		$Data = array();
		$Data_Envia = array();
		$respuesta = array();
		
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"Id_Activo"=> $row["Id_Activo"]
					);
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$Error=true;
		}
		
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia, "estatus" => "ok", "mensaje" => "Registros Encontrados");
		$jsonDto = new Encode_JSON();
		return $jsonDto->encode($respuesta);
	}



public function updateSiga_vale_resguardo($Siga_vale_resguardoDto,$cadena_id_activos,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error = false;
	$respuesta = array();
	
	//Editar
	if($Siga_vale_resguardoDto->getId_Vale_Resguardo()!=""){
		$consulta="UPDATE siga_vale_resguardo SET Fech_Mod=getdate(), Usr_Mod='".$Siga_vale_resguardoDto->getUsr_Inser()."', Estatus_Reg='3' where Id_Vale_Resguardo='".$Siga_vale_resguardoDto->getId_Vale_Resguardo()."'";
		$proveedor->execute($consulta);
		
		if (!$proveedor->error()) {	
			
			$consulta="UPDATE siga_det_vale_resguardo SET Fech_Mod=getdate(), Usr_Mod='".$Siga_vale_resguardoDto->getUsr_Inser()."', Estatus_Reg='3' where Id_Vale_Resguardo='".$Siga_vale_resguardoDto->getId_Vale_Resguardo()."'";
			$proveedor->execute($consulta);
			
			if (!$proveedor->error()) {
				$Siga_vale_resguardoDao = new Siga_vale_resguardoDAO();
				$Siga_vale_resguardoDto = $Siga_vale_resguardoDao->insertSiga_vale_resguardo($Siga_vale_resguardoDto,$proveedor);
				$Id_Vale_Resguardo=$Siga_vale_resguardoDto[0]->getId_Vale_Resguardo();
				if($Siga_vale_resguardoDto!="")
				{
					if(count($cadena_id_activos)>0)
					{
						for($i=0; $i<count($cadena_id_activos); $i++) {
							if(($cadena_id_activos[$i]!="")&&($cadena_id_activos[$i]!="N"))
							{
								$Siga_det_vale_resguardoDto= new Siga_det_vale_resguardoDTO();
								$Siga_det_vale_resguardoDao= new Siga_det_vale_resguardoDAO();
								
								$Siga_det_vale_resguardoDto->setId_Vale_Resguardo($Siga_vale_resguardoDto[0]->getId_Vale_Resguardo());
								$Siga_det_vale_resguardoDto->setId_Activo($cadena_id_activos[$i]);
								$Siga_det_vale_resguardoDto->setUsr_Inser($Siga_vale_resguardoDto[0]->getUsr_Inser());
								$Siga_det_vale_resguardoDto->setEstatus_Reg($Siga_vale_resguardoDto[0]->getEstatus_Reg());
								$Siga_det_vale_resguardoDto = $Siga_det_vale_resguardoDao->insertSiga_det_vale_resguardo($Siga_det_vale_resguardoDto,$proveedor);
								
								if($Siga_det_vale_resguardoDto==""){
									$error=true;
								}
							}	
						}
					}else{
						$error = true;
					}		
				
				}else{
					$error = true;
				}
			
			}else{
				$error = true;
			}
		}else{
			$error = true;
		}
	}
	
	if ($error == false) {
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "text" => "VALE GENERADO CORRECTAMENTE", "Id_Vale_Resguardo"=>$Id_Vale_Resguardo);
	} else {
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL GENERAR EL VALE");
	}
	$proveedor->close();
	return $respuesta;
	
}

public function delete_logic_vale_resguardo($Siga_vale_resguardoDto,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error = false;
	$respuesta = array();
	

	if($Siga_vale_resguardoDto->getId_Vale_Resguardo()!=""){
		$consulta="UPDATE siga_vale_resguardo SET Fech_Mod=getdate(), Usr_Mod='".$Siga_vale_resguardoDto->getUsr_Mod()."', Estatus_Reg='3' where Id_Vale_Resguardo='".$Siga_vale_resguardoDto->getId_Vale_Resguardo()."'";
		$proveedor->execute($consulta);
		
		if (!$proveedor->error()) {	
			
			$consulta="UPDATE siga_det_vale_resguardo SET Fech_Mod=getdate(), Usr_Mod='".$Siga_vale_resguardoDto->getUsr_Mod()."', Estatus_Reg='3' where Id_Vale_Resguardo='".$Siga_vale_resguardoDto->getId_Vale_Resguardo()."'";
			$proveedor->execute($consulta);
			
			if (!$proveedor->error()) {
				
			
			}else{
				$error = true;
			}
		}else{
			$error = true;
		}
	}
	
	if ($error == false) {
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "text" => "VALE ELIMINADO CORRECTAMENTE", "Id_Vale_Resguardo"=>$Siga_vale_resguardoDto->getId_Vale_Resguardo());
	} else {
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL ELIMINAR EL VALE");
	}
	$proveedor->close();
	return $respuesta;
}


public function selectcambia_estatus_autorizacion($Siga_vale_resguardoDto,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$respuesta = array();
	
	//Editar
	if($Siga_vale_resguardoDto->getId_Vale_Resguardo()!=""){
		
		if($Siga_vale_resguardoDto->getEstatus_Correo_Responsable()!=""){	
			$consulta="UPDATE siga_vale_resguardo SET  Estatus_Correo_Responsable='".$Siga_vale_resguardoDto->getEstatus_Correo_Responsable()."' where Id_Vale_Resguardo='".$Siga_vale_resguardoDto->getId_Vale_Resguardo()."' and Estatus_Reg <> '3'";
		}
		
		if($Siga_vale_resguardoDto->getEstatus_Correo_Solicitante()!=""){	
			$consulta="UPDATE siga_vale_resguardo SET  Estatus_Correo_Solicitante='".$Siga_vale_resguardoDto->getEstatus_Correo_Solicitante()."' where Id_Vale_Resguardo='".$Siga_vale_resguardoDto->getId_Vale_Resguardo()."' and Estatus_Reg <> '3'";
		}
		
		$proveedor->execute($consulta);
		
		if (!$proveedor->error()) {	
			$respuesta = array("totalCount" => "1", "text" => "SE HA AUTORIZADO CORRECTAMENTE");
		}else{
			$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL AUTORIZAR");
		}
	}else{
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL AUTORIZAR");
	}
	
	$proveedor->close();
	return $respuesta;
	
}

public function selectcambia_estatus_envio($Siga_vale_resguardoDto,$proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$respuesta = array();
	
	//Editar
	if($Siga_vale_resguardoDto->getId_Vale_Resguardo()!=""){
		
		if($Siga_vale_resguardoDto->getEstatus_Envio()!=""){	
			$consulta="UPDATE siga_vale_resguardo SET  Estatus_Envio='".$Siga_vale_resguardoDto->getEstatus_Envio()."' where Id_Vale_Resguardo='".$Siga_vale_resguardoDto->getId_Vale_Resguardo()."' and Estatus_Reg <> '3'";
		}
		
		$proveedor->execute($consulta);
		
		if (!$proveedor->error()) {	
			$respuesta = array("totalCount" => "1", "text" => "SE HA AUTORIZADO CORRECTAMENTE");
		}else{
			$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL AUTORIZAR");
		}
	}else{
		$respuesta = array("totalCount" => "0", "text" => "OCURRIO UN ERROR AL AUTORIZAR");
	}
	
	$proveedor->close();
	return $respuesta;
}


public function deleteSiga_vale_resguardo($Siga_vale_resguardoDto,$proveedor=null){
//$Siga_vale_resguardoDto=$this->validarSiga_vale_resguardo($Siga_vale_resguardoDto);
$Siga_vale_resguardoDao = new Siga_vale_resguardoDAO();
$Siga_vale_resguardoDto = $Siga_vale_resguardoDao->deleteSiga_vale_resguardo($Siga_vale_resguardoDto,$proveedor);
return $Siga_vale_resguardoDto;
}

public function llenarDataTable($draw, $columns, $order, $start, $length, $search) {

//$Siga_vale_resguardoDao = new Siga_vale_resguardoDAO();
//return $Siga_vale_resguardoDao->llenarDataTable($draw, $columns, $order, $start, $length, $search);
	$recordsTotal = 0;
    $data = array();
    $proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
    
	$criterios = "";
    if ($search != ''AND $search["value"] != '') {
        foreach ($columns as $value) {   
            if($value["data"]!='VR.Id_Vale_Resguardo' AND $value["data"]!='function')
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
    $proveedor->execute("SELECT VR.Id_Vale_Resguardo,VR.Id_Tipo_Vale_Resg,VR.Id_Area, VR.Num_Empleado,VR.Extension_Tel,VR.Correo,VR.Observaciones,VR.Estatus_Envio,VR.Estatus_Correo_Responsable,VR.Estatus_Correo_Solicitante,VR.Fech_Inser,VR.Usr_Inser,VR.Fech_Mod,VR.Usr_Mod,VR.Estatus_Reg, TV.Desc_Tipo_Vale_Resg ,CA.Nom_Area FROM siga_vale_resguardo VR left join siga_cat_tipo_vale_resg TV on  VR.Id_Tipo_Vale_Resg=TV.Id_Tipo_Vale_Resg left join siga_catareas CA on VR.Id_Area=CA.Id_Area where VR.Estatus_Reg <> '3' and VR.Id_Vale_Resguardo LIKE '%%' "
            . "".$criterios.$ordenamiento.$pagina);
		
			
    if (!$proveedor->error() AND $proveedor->rows($proveedor->stmt) > 0) {
        $Siga_v_empleados_activo_fijoDao = new Siga_v_empleados_activo_fijoDAO();
		$Siga_v_empleados_activo_fijoDto = new Siga_v_empleados_activo_fijoDTO();
			
		while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
            
			$data[] = array(
				"Id_Vale_Resguardo" => $row["Id_Vale_Resguardo"],
                "Id_Tipo_Vale_Resg" => $row["Id_Tipo_Vale_Resg"],
				"Id_Area" => $row["Id_Area"],
				"Num_Empleado" => $row["Num_Empleado"],
				"Extension_Tel" => $row["Extension_Tel"],
                "Correo" => $row["Correo"],
				"Observaciones" => $row["Observaciones"],
				"Estatus_Envio" => $row["Estatus_Envio"],
				"Estatus_Correo_Responsable" => $row["Estatus_Correo_Responsable"],
				"Estatus_Correo_Solicitante" => $row["Estatus_Correo_Solicitante"],
				"Fech_Inser" => $row["Fech_Inser"],
				"Usr_Inser" => $row["Usr_Inser"],
                "Fech_Mod" => $row["Fech_Mod"],
				"Usr_Mod" => $row["Usr_Mod"],
				"Estatus_Reg" => $row["Estatus_Reg"],
				"Desc_Tipo_Vale_Resg" => $row["Desc_Tipo_Vale_Resg"],
				"Nom_Area" => $row["Nom_Area"],
				//
				"nombre_completo" => $nombre_completo,
				"puesto" => $puesto,
				"departamento" => $departamento,
				
			);
        }
        $proveedor->execute("select COUNT(*) AS total from (SELECT VR.Id_Vale_Resguardo,VR.Id_Tipo_Vale_Resg,VR.Id_Area, VR.Num_Empleado,VR.Extension_Tel,VR.Correo,VR.Observaciones,VR.Estatus_Envio,VR.Estatus_Correo_Responsable,VR.Estatus_Correo_Solicitante,VR.Fech_Inser,VR.Usr_Inser,VR.Fech_Mod,VR.Usr_Mod,VR.Estatus_Reg, TV.Desc_Tipo_Vale_Resg ,CA.Nom_Area FROM siga_vale_resguardo VR left join siga_cat_tipo_vale_resg TV on  VR.Id_Tipo_Vale_Resg=TV.Id_Tipo_Vale_Resg left join siga_catareas CA on VR.Id_Area=CA.Id_Area where VR.Estatus_Reg <> '3' and VR.Id_Vale_Resguardo LIKE '%%'". "".$criterios." ) siga_vale_resguardo");
        while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
            $recordsTotal=$row["total"];
        }
    }
	
	$proveedor->close();
	
    return '{"draw":' . $draw . ',"recordsTotal":' . $recordsTotal . ',"recordsFiltered":' . $recordsTotal . ',"data":' . json_encode($data) . '}';
    

}
}
?>