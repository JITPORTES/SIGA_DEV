<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_actividades/Siga_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_actividades/Siga_actividadesDAO.Class.php");
/////////////
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_det_actividades/Siga_det_actividadesDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_det_actividades/Siga_det_actividadesDAO.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_activos/Siga_activosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_activos/Siga_activosDAO.Class.php");

include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_actividadesController {
private $proveedor;
public function __construct() {
}
public function validarSiga_actividades($Siga_actividadesDto){
$Siga_actividadesDto->setId_Actividad(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getId_Actividad()))));
$Siga_actividadesDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getId_Area()))));
$Siga_actividadesDto->setTipo_Actividad(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getTipo_Actividad()))));
$Siga_actividadesDto->setId_Activo(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getId_Activo()))));
$Siga_actividadesDto->setNombre_Rutina(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getNombre_Rutina()))));
$Siga_actividadesDto->setId_Frecuencia(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getId_Frecuencia()))));
$Siga_actividadesDto->setDescripcion(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getDescripcion()))));
$Siga_actividadesDto->setRealiza(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getRealiza()))));
$Siga_actividadesDto->seturl_documentos_adjuntos(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->geturl_documentos_adjuntos()))));
$Siga_actividadesDto->setvincular_mesa_ayuda(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getvincular_mesa_ayuda()))));
$Siga_actividadesDto->setUsuario_Responsable(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getUsuario_Responsable()))));
$Siga_actividadesDto->setMotivo_Servicio(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getMotivo_Servicio()))));
$Siga_actividadesDto->setFecha_Programada(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getFecha_Programada()))));
$Siga_actividadesDto->setFecha_Realizada(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getFecha_Realizada()))));
$Siga_actividadesDto->setMant_RAC1(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getMant_RAC1()))));
$Siga_actividadesDto->setMant_RAC2(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getMant_RAC2()))));
$Siga_actividadesDto->setMant_RAC3(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getMant_RAC3()))));
$Siga_actividadesDto->setMant_RAC4(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getMant_RAC4()))));
$Siga_actividadesDto->setHoras(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getHoras()))));
$Siga_actividadesDto->setCostos_Materiales_CE(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getCostos_Materiales_CE()))));
$Siga_actividadesDto->setMano_Obra_CE(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getMano_Obra_CE()))));
$Siga_actividadesDto->setTotal_CE(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getTotal_CE()))));
$Siga_actividadesDto->setCostos_Materiales_CI(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getCostos_Materiales_CI()))));
$Siga_actividadesDto->setMano_Obra_CI(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getMano_Obra_CI()))));
$Siga_actividadesDto->setTotal_CI(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getTotal_CI()))));
$Siga_actividadesDto->setAhorro(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getAhorro()))));
$Siga_actividadesDto->setComentarios(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getComentarios()))));
$Siga_actividadesDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getFech_Inser()))));
$Siga_actividadesDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getUsr_Inser()))));
$Siga_actividadesDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getFech_Mod()))));
$Siga_actividadesDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getUsr_Mod()))));
$Siga_actividadesDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getEstatus_Reg()))));
$Siga_actividadesDto->setId_Motivo_Real(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getId_Motivo_Real()))));
$Siga_actividadesDto->setCampo_1(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getCampo_1()))));
$Siga_actividadesDto->setCampo_2(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getCampo_2()))));
$Siga_actividadesDto->setCampo_3(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getCampo_3()))));
$Siga_actividadesDto->setCampo_4(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getCampo_4()))));
$Siga_actividadesDto->setCampo_5(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getCampo_5()))));
$Siga_actividadesDto->setCampo_6(strtoupper(str_ireplace("'","",trim($Siga_actividadesDto->getCampo_6()))));
return $Siga_actividadesDto;
}

public function selectSiga_actividades($Siga_actividadesDto,$proveedor=null){
$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
$Siga_actividadesDao = new Siga_actividadesDAO();
$Siga_actividadesDto = $Siga_actividadesDao->selectSiga_actividades($Siga_actividadesDto,$proveedor);
return $Siga_actividadesDto;
}

public function select_calendario_global($Siga_actividadesDto,$Busqueda, $Id_Gestor, $Nombre_Ejecutante, $proveedor=null){
	$Data = array();
	$Data_Envia = array();
	
	$Data_Anio = array();
	$Data_Anio_Envia = array();
	
	$respuesta = array();
	$error=false;
	if($Siga_actividadesDto->getId_Actividad()==""){
		$proveedor = new Proveedor('sqlserver', 'activos');
		$proveedor->connect();
	}
	//Variable Busqueda Full Calendar
	$sql_search="";
	if($Busqueda!=""){
		if(($Busqueda[0]!="")||($Busqueda[1]!="")||($Busqueda[2]!="")||($Busqueda[3]!="")){
			$sql_search.=" and ";
		}
		
		if(($Busqueda[0]!="")){
			$sql_search.=" Id_Activo='".$Busqueda[0]."'";
			if(($Busqueda[1]!="")||($Busqueda[2]!="")||($Busqueda[3]!="")){
				$sql_search.=" and ";
			}
		}
		
		if(($Busqueda[1]!="")){
			$sql_search.=" Nombre_Rutina like '%".$Busqueda[1]."%'";
			if(($Busqueda[2]!="")||($Busqueda[3]!="")){
				$sql_search.=" and ";
			}
		}
		
		if(($Busqueda[2]!="")){
			$sql_search.=" Descripcion like '%".$Busqueda[2]."%'";
			if(($Busqueda[3]!="")){
				$sql_search.=" and ";
			}
		}
	}
	if($Siga_actividadesDto->getTipo_Actividad()!=3){
		if($Busqueda!=""){
			if(($Busqueda[3]!="")){
				$sql_search.=" LEFT(SDA.Fecha_Programada,4) ='".$Busqueda[3]."'";
			}
		}
		
		$sql=" SELECT	distinct SDA.Fecha_Programada,
									SDA.Id_Actividad,
									SA.Nombre_Rutina,
									SA.Realiza,
									SDA.Num_Actividad,
									(select count(DA.Fecha_Programada) from siga_det_actividades DA where DA.Id_Actividad=SDA.Id_Actividad and Estatus_Reg<>3) as Total_Act_Det,
									(select count(DA.Fecha_Realizada) from siga_det_actividades DA where DA.Id_Actividad=SDA.Id_Actividad and DA.Fecha_Realizada <>'' and Estatus_Reg <> 3) as Realizado,
									(select top 1 Estatus_Proceso from siga_solicitud_tickets ST where ST.Id_Actividad=SDA.Id_Actividad and Estatus_Reg<>3) as Est_Proceso_Mesa_Ayuda,
									(select top 1 Id_Solicitud from siga_solicitud_tickets ST where ST.Id_Actividad=SDA.Id_Actividad and Estatus_Reg<>3) as Id_Solicitud,
									(select top 1 '[ACTIVO: '+rtrim(ltrim(Nombre_Activo))+'] [MODELO: '+case when rtrim(ltrim(Modelo)) is not null then rtrim(ltrim(Modelo)) else '' end+'] [SERIE: '+case when rtrim(ltrim(NumSerie)) is not null then rtrim(ltrim(NumSerie)) else '' end+']'+' [UBIC. ESPECIFICA: '+case when rtrim(ltrim(Especifica)) is not null then rtrim(ltrim(Especifica)) else 'SIN UBICACIÓN ESPECÍFICA' end +']' from siga_activos SACT where SA.Id_Activo=SACT.Id_Activo) AS Activo_UbicEspecifica
						FROM siga_det_actividades SDA 
						LEFT JOIN siga_actividades SA on SDA.Id_Actividad=SA.Id_Actividad		
						WHERE SDA.Estatus_Reg<>'3' and Id_Area='".$Siga_actividadesDto->getId_Area()."' AND SDA.Num_Actividad = 1 AND SA.Tipo_Actividad=2".$sql_search."";
						//WHERE SDA.Estatus_Reg<>'3' and Id_Area='".$Siga_actividadesDto->getId_Area()."' AND SDA.Num_Actividad = 1 AND SA.Tipo_Actividad='".$Siga_actividadesDto->getTipo_Actividad()."'".$sql_search."";
		
		if($Siga_actividadesDto->getId_Actividad()!=""){
			$sql.=" and SDA.Id_Actividad='".$Siga_actividadesDto->getId_Actividad()."'";
		}
		if(rtrim(ltrim($Id_Gestor))!=""){
			$sql.=" and SA.Id_Gestor=".$Id_Gestor;
		}
		if(rtrim(ltrim($Nombre_Ejecutante))!=""){
			$sql.=" and SA.Nombre_Ejecutante like '%".$Nombre_Ejecutante."%'";
		}
		$sql.=" order by SDA.Fecha_Programada asc";
		
		// echo "<pre>";
		// echo $sql;
		// echo "</pre>";
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					// Determina el Color del Semáforo
					/*
					$color_calendar = "";
					if($row["Est_Proceso_Mesa_Ayuda"]==2) { //Si en la mesa de ayuda se encuentra en seguimiento
							$color_calendar="#ecc93b"; //Amarillo en seguimiento mesa de ayuda
					}
					else {
						if($row["Realizado"]!=0){//Si se ha realizado actividades detalle
							$color_calendar="#35a61e"; //Verde Realizado
						}else{//Si no se ha realizado ninguna actividades detalle
							$color_calendar="#D90505"; //Rojo No Realizado
						}
					}
					*/
					// Rojo: No Realizado, no existe ticket, etc.
					$color_calendar = "#d90505";
					if($row["Id_Solicitud"] != null && $row["Est_Proceso_Mesa_Ayuda"] == 2) {
						// Amarillo: Se encuentra en la Mesa de ayuda (se ha detonado un Ticket) con estatus proceso = 2 (ticket en atención)
						$color_calendar = "#ecc93b";
					}
					else if($row["Id_Solicitud"] != null && $row["Est_Proceso_Mesa_Ayuda"] == 3 && ($row["Total_Act_Det"] == $row["Realizado"])) {
						// Verde: Se han realizado todas las actividades, el ticket ha sido generado y se encuentra cerrado o Proceso de Cierre
						$color_calendar = "#35a61e";
					}
					else if($row["Id_Solicitud"] != null && $row["Est_Proceso_Mesa_Ayuda"] == 4 && ($row["Total_Act_Det"] == $row["Realizado"])) {
						// Azul: Se han realizado todas las actividades, el ticket ha sido generado y está cerrado
						$color_calendar = "#448aff";
					}
					
					$Data= array(
						"Id_Actividad" => $row["Id_Actividad"],
						"Nombre_Rutina" => $row["Nombre_Rutina"],
						"Fecha_Programada" => $row["Fecha_Programada"],
						"Realiza" => $row["Realiza"],
						"Color_Calendar"=>$color_calendar,
						"Activo_UbicEspecifica" => $row["Activo_UbicEspecifica"],
						//"sql"=>$sql
					);
					array_push($Data_Envia, $Data);
				}
			}	
		}
		else {
			$error=true;
		}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		/*Obtener los Años*/
		$sql_anio=" select distinct LEFT(SDA.Fecha_Programada,4) as Anio from siga_det_actividades SDA ";
		$sql_anio.=" left join siga_actividades SA on SDA.Id_Actividad=SA.Id_Actividad ";
		$sql_anio.=" where SDA.Estatus_Reg<>'3' and Id_Area='".$Siga_actividadesDto->getId_Area()."' and Tipo_Actividad='".$Siga_actividadesDto->getTipo_Actividad()."'".$sql_search."";
		if($Siga_actividadesDto->getId_Actividad()!=""){
			$sql_anio.=" and SDA.Id_Actividad='".$Siga_actividadesDto->getId_Actividad()."'";
		}
		$sql_anio.=" order by Anio asc";
		
		
		$proveedor->execute($sql_anio);
	    
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data_Anio= array(
						"Anio" => $row["Anio"],
					);
					array_push($Data_Anio_Envia, $Data_Anio);
				}
			}	
		}else{
			$error=true;
		}
	}
	else{
		if($Busqueda!=""){
			if(($Busqueda[3]!="")){
				$sql_search.=" LEFT(Fecha_Programada,4) ='".$Busqueda[3]."'";
			}
		}
		
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//MANTENIMIENTO CORRECTIVO
		//Este query corresponde a los mantenimientos correctivos, la fecha programada corresponde a la fecha realizada, ya que en los mantenimientos correctivos no se maneja la fecha programada.
		
		$sql="select Id_Actividad, Descripcion,Motivo_Servicio, Fecha_Realizada, (select AF_BC from siga_activos SA where SA.Id_Activo=siga_actividades.Id_Activo) as AF_BC from siga_actividades "; 
		$sql.="where Id_Area='".$Siga_actividadesDto->getId_Area()."' and Tipo_Actividad='".$Siga_actividadesDto->getTipo_Actividad()."' and Estatus_Reg<>'3' ".$sql_search;
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"Id_Actividad" => $row["Id_Actividad"],
						"Motivo_Servicio" => $row["AF_BC"].'-'.$row["Descripcion"],
						"AF_BC" => $row["AF_BC"],
						"Fecha_Programada" => $row["Fecha_Realizada"]//La Fecha Programada es la fecha Realizada, ya que en los mant. correctivos no se maneja la fecha programada, se dejo asi para no  mover a la estructura de las funciones
					);
				
					array_push($Data_Envia, $Data);
				}
			}	
		}else{
			$error=true;
		}
		
	
		/*Obtener los Años para llenar el combobox*/
		$sql_anio=" select distinct LEFT(Fecha_Realizada,4) as Anio from   siga_actividades ";
		$sql_anio.=" where Estatus_Reg<>'3' and Id_Area='".$Siga_actividadesDto->getId_Area()."' and Tipo_Actividad='".$Siga_actividadesDto->getTipo_Actividad()."'".$sql_search."";
		$sql_anio.=" order by Anio asc";
		
		$proveedor->execute($sql_anio);
		
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data_Anio= array(
						"Anio" => $row["Anio"],
					);
					array_push($Data_Anio_Envia, $Data_Anio);
				}
			}	
		}else{
			$error=true;
		}
		//FIN MANTENIMIENTO CORRECTIVO
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	
	
	
	
	if($Siga_actividadesDto->getId_Actividad()==""){
		$proveedor->close();
	}
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia), "data" => $Data_Envia,"totalCountAnio" => count($Data_Anio_Envia), "data_anios" => $Data_Anio_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}


public function selectSiga_actividades_detalle($Siga_actividadesDto,$Fecha_Det_Programada, $proveedor=null){
	$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
	$Siga_actividadesDao = new Siga_actividadesDAO();
	$Siga_actividadesDto = $Siga_actividadesDao->selectSiga_actividades($Siga_actividadesDto,$proveedor);
	
	//Vale Array
	$ActividadesE = array();
	$ActividadesEnvia = array();
	
	$ActividadesDetE = array();
	$ActividadesDetEnvia = array();
	$respuesta = array();
	$error=true;
	
	if($Siga_actividadesDto!=""){
		$Siga_det_actividadesDao = new Siga_det_actividadesDAO();
		$Siga_det_actividadesDto = new Siga_det_actividadesDTO();
		$Siga_det_actividadesDto->setId_Actividad($Siga_actividadesDto[0]->getId_Actividad());
		$Siga_det_actividadesDto->setFecha_Programada($Fecha_Det_Programada);
		$Siga_det_actividadesDto->setEstatus_Reg("1");
		$orden=' order by Num_Actividad asc';
		$Siga_det_actividadesDto = $Siga_det_actividadesDao->selectSiga_det_actividades($Siga_det_actividadesDto,$orden,$proveedor);
		
		$AF_BC="";
		$Nombre_Activo="";
		$Marca="";
		$Modelo="";
		$NumSerie="";
		$Foto="";
		$Desc_Ubic_Prim="";
		$Desc_Ubic_Sec="";
		
		if($Siga_det_actividadesDto!=""){
			
			$proveedor = new Proveedor('sqlserver', 'activos');
			$proveedor->connect();
			
			$sql="select SA.Id_Activo, SA.AF_BC, SA.Nombre_Activo, SA.Marca, SA.Modelo, SA.NumSerie, SA.Foto,SA.Id_Ubic_Prim, SA.Id_Ubic_Sec, UP.Desc_Ubic_Prim, US.Desc_Ubic_Sec";  
			$sql.=" from siga_activos SA ";  
			$sql.=" left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim";  
			$sql.=" left join siga_cat_ubic_sec US on SA.Id_Ubic_Sec=US.Id_Ubic_Sec";  
			$sql.=" where Id_Activo='".$Siga_actividadesDto[0]->getId_Activo()."'"; 
			
			$proveedor->execute($sql);
	
			if (!$proveedor->error()){
				if ($proveedor->rows($proveedor->stmt) > 0) {
					while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
						$AF_BC=$row["AF_BC"];
						$Nombre_Activo=$row["Nombre_Activo"];
						$Marca=$row["Marca"];
						$Modelo=$row["Modelo"];
						$NumSerie=$row["NumSerie"];
						$Foto=$row["Foto"];
						$Desc_Ubic_Prim=$row["Desc_Ubic_Prim"];
						$Desc_Ubic_Sec=$row["Desc_Ubic_Sec"];
					}
				}	
			}else{
				$error=false;
			}
			$proveedor->close();
			
			for($i=0; $i<count($Siga_det_actividadesDto); $i++) {
				
				$ActividadesDetE = array(
					"Id_Det_Actividad" => $Siga_det_actividadesDto[$i]->getId_Det_Actividad(),
					"Id_Actividad" => $Siga_det_actividadesDto[$i]->getId_Actividad(),
					"Num_Actividad" => $Siga_det_actividadesDto[$i]->getNum_Actividad(),
					"Nombre_Actividad" => $Siga_det_actividadesDto[$i]->getNombre_Actividad(),
					"Valor_Referencia" => $Siga_det_actividadesDto[$i]->getValor_Referencia(),
					"Valor_Medido" => $Siga_det_actividadesDto[$i]->getValor_Medido(),
					"Estatus_Actividad" => $Siga_det_actividadesDto[$i]->getEstatus_Actividad(),
					"Observaciones" => $Siga_det_actividadesDto[$i]->getObservaciones(),
					"Url_Adjunto" => $Siga_det_actividadesDto[$i]->getUrl_Adjunto(),
					"Fecha_Programada" => $Siga_det_actividadesDto[$i]->getFecha_Programada(),
					"Fecha_Realizada" => $Siga_det_actividadesDto[$i]->getFecha_Realizada(),
					"Fech_Inser" => $Siga_det_actividadesDto[$i]->getFech_Inser(),
					"Usr_Inser" => $Siga_det_actividadesDto[$i]->getUsr_Inser(),
					"Fech_Mod" => $Siga_det_actividadesDto[$i]->getFech_Mod(),
					"Usr_Mod" => $Siga_det_actividadesDto[$i]->getUsr_Mod(),
					"Estatus_Reg" => $Siga_det_actividadesDto[$i]->getEstatus_Reg(),
					"V_Mesa" => $Siga_det_actividadesDto[$i]->getV_Mesa(),
				);
				
				array_push($ActividadesDetEnvia, $ActividadesDetE);
			}
			
		}else{
			$error=false;
		}
		
		$ActividadesE = array(
			"Id_Actividad" => $Siga_actividadesDto[0]->getId_Actividad(),
			"Id_Area" => $Siga_actividadesDto[0]->getId_Area(),
			"Tipo_Actividad" => $Siga_actividadesDto[0]->getTipo_Actividad(),
			"Id_Activo" => $Siga_actividadesDto[0]->getId_Activo(),
			"Nombre_Rutina" => $Siga_actividadesDto[0]->getNombre_Rutina(),
			"Id_Frecuencia" => $Siga_actividadesDto[0]->getId_Frecuencia(),
			"Descripcion" => $Siga_actividadesDto[0]->getDescripcion(),
			"Id_Gestor" => $Siga_actividadesDto[0]->getId_Gestor(),
			"Nombre_Ejecutante" => $Siga_actividadesDto[0]->getNombre_Ejecutante(),
			"Realiza" => $Siga_actividadesDto[0]->getRealiza(),
			"url_documentos_adjuntos" => $Siga_actividadesDto[0]->geturl_documentos_adjuntos(),
			"vincular_mesa_ayuda" => $Siga_actividadesDto[0]->getvincular_mesa_ayuda(),
			
			"Gestor_Asignado" => $Siga_actividadesDto[0]->getGestor_Asignado(),
			"Usuario_Responsable" => $Siga_actividadesDto[0]->getUsuario_Responsable(),
			"Motivo_Servicio" => $Siga_actividadesDto[0]->getMotivo_Servicio(),
			"Fecha_Programada" => $Siga_actividadesDto[0]->getFecha_Programada(),
			"Fecha_Realizada" => $Siga_actividadesDto[0]->getFecha_Realizada(),
			"Mant_RAC1" => $Siga_actividadesDto[0]->getMant_RAC1(),
			"Mant_RAC2" => $Siga_actividadesDto[0]->getMant_RAC2(),
			"Mant_RAC3" => $Siga_actividadesDto[0]->getMant_RAC3(),
			"Mant_RAC4" => $Siga_actividadesDto[0]->getMant_RAC4(),
			"Cantidad_1" => $Siga_actividadesDto[0]->getCantidad_1(),
			"Cantidad_2" => $Siga_actividadesDto[0]->getCantidad_2(),
			"Cantidad_3" => $Siga_actividadesDto[0]->getCantidad_3(),
			"Cantidad_4" => $Siga_actividadesDto[0]->getCantidad_4(),
			"Costo_1" => $Siga_actividadesDto[0]->getCosto_1(),
			"Costo_2" => $Siga_actividadesDto[0]->getCosto_2(),
			"Costo_3" => $Siga_actividadesDto[0]->getCosto_3(),
			"Costo_4" => $Siga_actividadesDto[0]->getCosto_4(),
			"Horas" => $Siga_actividadesDto[0]->getHoras(),
			"Costos_Materiales_CE" => $Siga_actividadesDto[0]->getCostos_Materiales_CE(),
			"Mano_Obra_CE" => $Siga_actividadesDto[0]->getMano_Obra_CE(),
			"Total_CE" => $Siga_actividadesDto[0]->getTotal_CE(),
			"Costos_Materiales_CI" => $Siga_actividadesDto[0]->getCostos_Materiales_CI(),
			"Mano_Obra_CI" => $Siga_actividadesDto[0]->getMano_Obra_CI(),
			"Total_CI" => $Siga_actividadesDto[0]->getTotal_CI(),
			"Ahorro" => $Siga_actividadesDto[0]->getAhorro(),
			"Comentarios" => $Siga_actividadesDto[0]->getComentarios(),
			"Responsable_Activo" => $Siga_actividadesDto[0]->getResponsable_Activo(),
			"Fech_Inser" => $Siga_actividadesDto[0]->getFech_Inser(),
			"Usr_Inser" => $Siga_actividadesDto[0]->getUsr_Inser(),
			"Fech_Mod" => $Siga_actividadesDto[0]->getFech_Mod(),
			"Usr_Mod" => $Siga_actividadesDto[0]->getUsr_Mod(),
			"Estatus_Reg" => $Siga_actividadesDto[0]->getEstatus_Reg(),
			"AF_BC" =>$AF_BC,
			"Nombre_Activo" =>$Nombre_Activo,
			"Marca" =>$Marca,
			"Modelo" =>$Modelo,
			"NumSerie" =>$NumSerie,
			"Foto" =>$Foto,
			"Desc_Ubic_Prim" =>$Desc_Ubic_Prim,
			"Desc_Ubic_Sec" =>$Desc_Ubic_Sec,
		);
		
		array_push($ActividadesEnvia, $ActividadesE);
		
	}else{
		$error=false;
	}
	
	if($error==true){
		$respuesta = array("totalCount" => count($ActividadesEnvia), "data" => $ActividadesEnvia, "totalCountDetalle" => count($ActividadesDetEnvia),"data_det" => $ActividadesDetEnvia, "estatus" => "ok", "mensaje" => "Registros Encontrados");   
	}else{
		$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "Registros No Encontrados");
	}
	
	return $respuesta;
}


public function insertSiga_actividades($Siga_actividadesDto,$Array_det_actividades, $Hasta_Anio, $proveedor=null){
	$ActividadesDetalleE = array();
	$ActividadesDetalleEnvia = array();
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$proveedor->beginTransaction();
	$Id_Actividad="";
	$Id_Area=$Siga_actividadesDto->getId_Area();
	$Tipo_Actividad=$Siga_actividadesDto->getTipo_Actividad();
	
	//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
	$Siga_actividadesDao = new Siga_actividadesDAO();
	$Siga_actividadesDto = $Siga_actividadesDao->insertSiga_actividades($Siga_actividadesDto,$proveedor);
	$error=false;
	if($Siga_actividadesDto!=""){
		$Desc_Frec=$Siga_actividadesDto[0]->getDesc_Frec();
		$Id_Actividad=$Siga_actividadesDto[0]->getId_Actividad();
		if(count($Array_det_actividades) > 0){
			
			for($i=0; $i<count($Array_det_actividades); $i++) {
				$Siga_det_actividadesDao = new Siga_det_actividadesDAO();
				$Siga_det_actividadesDto = new Siga_det_actividadesDTO();
				$Fecha_Programada=$Array_det_actividades[$i][7];
				//$Fecha_Programada=$Array_det_actividades[$i][7][6].''.$Array_det_actividades[$i][7][7].''.$Array_det_actividades[$i][7][8].''.$Array_det_actividades[$i][7][9].''.$Array_det_actividades[$i][7][3].''.$Array_det_actividades[$i][7][4].''.$Array_det_actividades[$i][7][0].''.$Array_det_actividades[$i][7][1];
				
				$Siga_det_actividadesDto->setId_Actividad($Siga_actividadesDto[0]->getId_Actividad());
				$Siga_det_actividadesDto->setNum_Actividad($Array_det_actividades[$i][0]);
				$Siga_det_actividadesDto->setNombre_Actividad($Array_det_actividades[$i][1]);
				$Siga_det_actividadesDto->setValor_Referencia($Array_det_actividades[$i][2]);
				$Siga_det_actividadesDto->setValor_Medido($Array_det_actividades[$i][3]);
				//$Siga_det_actividadesDto->setEstatus_Actividad($Array_det_actividades[$i][4]);
				//$Siga_det_actividadesDto->setObservaciones($Array_det_actividades[$i][5]);
				$Siga_det_actividadesDto->setUrl_Adjunto($Array_det_actividades[$i][6]);
				
				$Siga_det_actividadesDto->setFecha_Programada($Fecha_Programada);
				//$Siga_det_actividadesDto->setFecha_Realizada($Array_det_actividades[$i][8]);
				$Siga_det_actividadesDto->setV_Mesa($Array_det_actividades[$i][10]);
				
				$Siga_det_actividadesDto->setUsr_Inser($Siga_actividadesDto[0]->getUsr_Inser());
				$Siga_det_actividadesDto->setEstatus_Reg("1");
				
				
				
				$Siga_det_actividadesDto = $Siga_det_actividadesDao->insertSiga_det_actividades($Siga_det_actividadesDto,$proveedor);
				if($Siga_det_actividadesDto!=""){
					//Llenamos el array con los id detalle
					$ActividadesDetalleE = array(
						"Id_Actividad" => $Id_Actividad,
						"Id_Det_Actividad" => $Siga_det_actividadesDto[0]->getId_Det_Actividad(),
						"Nombre_Actividad" => $Siga_det_actividadesDto[0]->getNombre_Actividad(),
						"Valor_Referencia" => $Siga_det_actividadesDto[0]->getValor_Referencia(),
						"Fecha_Programda" => $Fecha_Programada,
						"V_Mesa" => $Siga_det_actividadesDto[0]->getV_Mesa(),
					);
					array_push($ActividadesDetalleEnvia, $ActividadesDetalleE);
				}else{
					$error=true;
				}
			}
		}else{
			$error=true;
		}
	}else{
		$error=true;
	}
	
	$Add = array();
	$Siga_actividadesDto = new Siga_actividadesDTO();
	$Siga_actividadesDto->setId_Actividad($Id_Actividad);
	$Siga_actividadesDto->setId_Area($Id_Area);
	$Siga_actividadesDto->setTipo_Actividad($Tipo_Actividad);
	//$Add=$this->select_calendario_global($Siga_actividadesDto, "", $proveedor);
	//if($Add['totalCount']<=0){
	//	$error=true;
	//}
	
	if($error==false){
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "estatus" => "ok","Frecuencia"=>$Desc_Frec,"Add"=>$Add, "CountActividades_Det"=>count($ActividadesDetalleEnvia),"Actividades_Det"=>$ActividadesDetalleEnvia,"Remove"=>"", "text" => "REGISTRO GUARDADO DE FORMA CORRECTA");
	}else{
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0",  "estatus" => "error", "text" => "OCURRIO UN ERROR AL GUARDAR");
	}
	$proveedor->close();
	return $respuesta;
}


public function eliminar_programacion($Id_Actividad, $Usr_Mod){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$sql="
		select count(Id_Solicitud) as Total from siga_solicitud_tickets where Estatus_Reg<>3 and Id_Actividad=".$Id_Actividad."
	";
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			$row_tot = $proveedor->fetch_array($proveedor->stmt, 0);
			$Total=$row_tot["Total"];
			if($Total>0){
				$error=true;
				$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "Es necesario cancelar el ticket para poder eliminar esta programación.");
			}else{
				$proveedor_u = new Proveedor('sqlserver', 'activos');
				$proveedor_u->connect();
				
				$sql="
					update siga_det_actividades set Estatus_Reg=3, Usr_Mod=".$Usr_Mod.", Fech_Mod=getdate()  where Id_Actividad=".$Id_Actividad."
					update siga_actividades set Estatus_Reg=3, Usr_Mod='".$Usr_Mod."', Fech_Mod=getdate() where Id_Actividad=".$Id_Actividad."
				";
				$proveedor_u->execute($sql);
				$respuesta = array("totalCount" => "1", "data" => "","estatus" => "ok", "mensaje" => "Eliminado Correctamente.");
			}
		}
	}
	
	return $respuesta;
}


public function Elimino_Actividades_Calendario($Id_Activo, $Fecha_Calendario, $Usr_Mod, $proveedor=null){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql="
		update siga_actividades set Estatus_Reg=3, Fech_Mod=getdate(), Usr_Mod='".$Usr_Mod."' where 
		Id_Actividad in(
			select Id_Actividad from siga_actividades a where 
			--Verifica que no existan actividades ligados a la mesa de ayuda
			a.Id_Actividad not in (select Id_Actividad from siga_solicitud_tickets where Id_Actividad=a.Id_Actividad)
			and 
			--Valida que las actividades realizadas sea mayor o igual a la programada
			a.Id_Actividad in (
			select distinct da.Id_Actividad from siga_det_actividades da where da.Id_Actividad=a.Id_Actividad 
			and da.Fecha_Programada>=convert(integer,".$Fecha_Calendario.")
			and da.Estatus_Reg<>3
			)
			and
			--Valida que no existan actividades realizadas
			a.Id_Actividad not in(
			select distinct da.id_actividad from siga_det_actividades da where da.Id_Actividad=a.Id_Actividad and Fecha_Realizada<>''
			and da.Estatus_Reg<>3
			)
			and 
			a.Id_Activo=".$Id_Activo."
		)
	";
	
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	
	
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		$proveedor_d = new Proveedor('sqlserver', 'activos');
		$proveedor_d->connect();
		$sql="
		update siga_det_actividades set Estatus_Reg=3, Fech_Mod=getdate(), Usr_Mod='".$Usr_Mod."' where 
		Id_Actividad in(
			select Id_Actividad from siga_actividades a where 
			--Verifica que no existan actividades ligados a la mesa de ayuda
			a.Id_Actividad not in (select Id_Actividad from siga_solicitud_tickets where Id_Actividad=a.Id_Actividad)
			and 
			--Valida que las actividades realizadas sea mayor o igual a la programada
			a.Id_Actividad in (
			select distinct da.Id_Actividad from siga_det_actividades da where da.Id_Actividad=a.Id_Actividad 
			and da.Fecha_Programada>=convert(integer,".$Fecha_Calendario.")
			and da.Estatus_Reg<>3
			)
			and
			--Valida que no existan actividades realizadas
			--a.Id_Actividad not in(
			--select distinct da.id_actividad from siga_det_actividades da where da.Id_Actividad=a.Id_Actividad and Fecha_Realizada<>''
			--and da.Estatus_Reg<>3
			--)
			--and 
			a.Id_Activo=".$Id_Activo."
		)
		";
		
		$proveedor_d->execute($sql);
		
		if (!$proveedor_d->error()){
		}else{
			$error=true;
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => 1,"data" => "","estatus" => "ok", "mensaje" => "Eliminado Correctamente");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "Ocurrio un error al eliminar");
	}
	return $respuesta;
}

public function updateSiga_actividades($Siga_actividadesDto,$Array_det_actividades, $proveedor=null){
	$Id_Area=$Siga_actividadesDto->getId_Area();
	$Tipo_Actividad=$Siga_actividadesDto->getTipo_Actividad();
	$Id_Actividad="";
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	$error=false;
	$respuesta = array();
	
	
	if($Siga_actividadesDto!=""){
		$consulta="UPDATE siga_actividades SET 
			Fech_Mod=getdate(), 
			Usr_Mod='".$Siga_actividadesDto->getUsr_Inser()."', 
			Estatus_Reg='2', 
			Nombre_Rutina='".$Siga_actividadesDto->getNombre_Rutina()."', 
			Id_Frecuencia=".$Siga_actividadesDto->getId_Frecuencia().", 
			Descripcion='".$Siga_actividadesDto->getDescripcion()."' 
		";
		if($Siga_actividadesDto->getId_Gestor()!=""){
			$consulta.=", Id_Gestor=".$Siga_actividadesDto->getId_Gestor();
		}else{
			$consulta.=", Id_Gestor=NULL ";
		}
		if($Siga_actividadesDto->getNombre_Ejecutante()!=""){
			$consulta.=", Nombre_Ejecutante='".$Siga_actividadesDto->getNombre_Ejecutante()."'";
		}else{
			$consulta.=", Nombre_Ejecutante=NULL ";
		}
		
		if($Siga_actividadesDto->geturl_documentos_adjuntos()!=""){
			$consulta.=", url_documentos_adjuntos='".$Siga_actividadesDto->geturl_documentos_adjuntos()."'";
		}else{
			$consulta.=", url_documentos_adjuntos=NULL ";
		}
		
		$consulta.=" where Id_Actividad=".$Siga_actividadesDto->getId_Actividad()."";
		
		$proveedor->execute($consulta);
		$Id_Actividad=$Siga_actividadesDto->getId_Actividad();
		if (!$proveedor->error()) {
			if(count($Array_det_actividades) > 0){
				for($i=0; $i<count($Array_det_actividades); $i++) {
					
					$Fecha_Programada=$Array_det_actividades[$i][7][6].''.$Array_det_actividades[$i][7][7].''.$Array_det_actividades[$i][7][8].''.$Array_det_actividades[$i][7][9].''.$Array_det_actividades[$i][7][3].''.$Array_det_actividades[$i][7][4].''.$Array_det_actividades[$i][7][0].''.$Array_det_actividades[$i][7][1];
						
					if($Array_det_actividades[$i][9]==""){ //Inserta Nuevas Actividdes Detalle
						$Siga_det_actividadesDao = new Siga_det_actividadesDAO();
						$Siga_det_actividadesDto = new Siga_det_actividadesDTO();
						
						$Siga_det_actividadesDto->setId_Actividad($Id_Actividad);
						$Siga_det_actividadesDto->setNum_Actividad($Array_det_actividades[$i][0]);
						$Siga_det_actividadesDto->setNombre_Actividad($Array_det_actividades[$i][1]);
						$Siga_det_actividadesDto->setValor_Referencia($Array_det_actividades[$i][2]);
						//$Siga_det_actividadesDto->setValor_Medido($Array_det_actividades[$i][3]);
						//$Siga_det_actividadesDto->setEstatus_Actividad($Array_det_actividades[$i][4]);
						//$Siga_det_actividadesDto->setObservaciones($Array_det_actividades[$i][5]);
						$Siga_det_actividadesDto->setUrl_Adjunto($Array_det_actividades[$i][6]);
						
						$Siga_det_actividadesDto->setFecha_Programada($Fecha_Programada);
						//$Siga_det_actividadesDto->setFecha_Realizada($Array_det_actividades[$i][8]);
						$Siga_det_actividadesDto->setV_Mesa($Array_det_actividades[$i][10]);
						$Siga_det_actividadesDto->setUsr_Inser($Siga_actividadesDto->getUsr_Inser());
						$Siga_det_actividadesDto->setEstatus_Reg("1");
						
						$Siga_det_actividadesDto = $Siga_det_actividadesDao->insertSiga_det_actividades($Siga_det_actividadesDto,$proveedor);
						if($Siga_det_actividadesDto==""){
							$error=true;
						}
					}else{
						$consulta="UPDATE siga_det_actividades SET Num_Actividad='".$Array_det_actividades[$i][0]."', Nombre_Actividad='".$Array_det_actividades[$i][1]."', Valor_Referencia='".$Array_det_actividades[$i][2]."', Valor_Medido='".$Array_det_actividades[$i][3]."', Fecha_Programada='".$Fecha_Programada."', Fech_Mod=getdate(), Usr_Mod='".$Siga_actividadesDto->getUsr_Inser()."', Estatus_Reg='2' where Id_Det_Actividad=".$Array_det_actividades[$i][9]."";
						$proveedor->execute($consulta);
						if (!$proveedor->error()) {
						}else{
							$error=true;
						}
					}
				}
			}else{
				$error=true;
			}
			
		}else{
			$error = true;
		}
		
	}else{
		$error = true;
	}
	
	if($error==false){
		$proveedor->commit();
		$respuesta = array("totalCount" => "1", "estatus" => "ok", "text" => "REGISTRO MODIFICADO DE FORMA CORRECTA");
	}else{
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0",  "estatus" => "error", "text" => "OCURRIO UN ERROR AL GUARDAR");
	}
	$proveedor->close();
	return $respuesta;
}

public function update_det_realizado($Siga_actividadesDto,$Array_det_actividades, $proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$error=false;
	$respuesta = array();
	
	if($Siga_actividadesDto!=""){
		$consulta="UPDATE siga_actividades SET Fech_Mod=getdate(), Comentarios='".$Siga_actividadesDto->getComentarios()."', ";
		$consulta.="Mant_RAC1='".$Siga_actividadesDto->getMant_RAC1()."',";
		$consulta.="Mant_RAC2='".$Siga_actividadesDto->getMant_RAC2()."',";
		$consulta.="Mant_RAC3='".$Siga_actividadesDto->getMant_RAC3()."',";
		$consulta.="Mant_RAC4='".$Siga_actividadesDto->getMant_RAC4()."',";
		$consulta.="Cantidad_1='".$Siga_actividadesDto->getCantidad_1()."',";
		$consulta.="Cantidad_2='".$Siga_actividadesDto->getCantidad_2()."',";
		$consulta.="Cantidad_3='".$Siga_actividadesDto->getCantidad_3()."',";
		$consulta.="Cantidad_4='".$Siga_actividadesDto->getCantidad_4()."',";
		$consulta.="Costo_1='".$Siga_actividadesDto->getCosto_1()."',";
		$consulta.="Costo_2='".$Siga_actividadesDto->getCosto_2()."',";
		$consulta.="Costo_3='".$Siga_actividadesDto->getCosto_3()."',";
		$consulta.="Costo_4='".$Siga_actividadesDto->getCosto_4()."',";
		$consulta.="Horas='".$Siga_actividadesDto->getHoras()."',";
		$consulta.="Costos_Materiales_CE='".$Siga_actividadesDto->getCostos_Materiales_CE()."',";
		$consulta.="Mano_Obra_CE='".$Siga_actividadesDto->getMano_Obra_CE()."',";
		$consulta.="Total_CE='".$Siga_actividadesDto->getTotal_CE()."',";
		$consulta.="Costos_Materiales_CI='".$Siga_actividadesDto->getCostos_Materiales_CI()."',";
		$consulta.="Mano_Obra_CI='".$Siga_actividadesDto->getMano_Obra_CI()."',";
		$consulta.="Total_CI='".$Siga_actividadesDto->getTotal_CI()."',";
		$consulta.="Ahorro='".$Siga_actividadesDto->getAhorro()."',";
		$consulta.="url_documentos_adjuntos='".$Siga_actividadesDto->geturl_documentos_adjuntos()."',";
		
		$consulta.="Estatus_Reg='2' where Id_Actividad='".$Siga_actividadesDto->getId_Actividad()."'";
		
		$proveedor->execute($consulta);
		if (!$proveedor->error()) {
			if(count($Array_det_actividades) > 0){
				for($i=0; $i<count($Array_det_actividades); $i++) {
					if($Array_det_actividades[$i][8]!=""){
						$Fecha_Realizada=$Array_det_actividades[$i][8][6].''.$Array_det_actividades[$i][8][7].''.$Array_det_actividades[$i][8][8].''.$Array_det_actividades[$i][8][9].''.$Array_det_actividades[$i][8][3].''.$Array_det_actividades[$i][8][4].''.$Array_det_actividades[$i][8][0].''.$Array_det_actividades[$i][8][1];
					}
					
					$consulta="UPDATE siga_det_actividades SET Fech_Mod=getdate(), Usr_Mod='".$Siga_actividadesDto->getUsr_Inser()."', Url_Adjunto='".$Array_det_actividades[$i][6]."',Estatus_Actividad='".$Array_det_actividades[$i][4]."',Valor_Medido='".$Array_det_actividades[$i][3]."', Observaciones='".$Array_det_actividades[$i][5]."', Fecha_Realizada='".$Fecha_Realizada."', Estatus_Reg='2' where Id_Actividad='".$Siga_actividadesDto->getId_Actividad()."' and Id_Det_Actividad='".$Array_det_actividades[$i][9]."'";
				
					$proveedor->execute($consulta);
					if (!$proveedor->error()) {
					
					}else{
						$error=true;
					}
				}	
			}else{
				$error==true;
			}	
		
		}
	}else{
		$error=true;
	}
	
	
	
	
	if($error==false){
		$respuesta = array("totalCount" => "1", "estatus" => "ok", "text" => "REGISTRO REALIZADO DE FORMA CORRECTA");
	}else{
		$respuesta = array("totalCount" => "0",  "estatus" => "error", "text" => "OCURRIO UN ERROR AL GUARDAR");
	}
	$proveedor->close();
	return $respuesta;
}



public function cmb_gestores($Id_Area, $Id_Seccion){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select * from siga_cat_gestores where Id_Area=".$Id_Area." and Id_Seccion=".$Id_Seccion." and Estatus_Reg<>'3'
	";
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Id_Gestor"=>$row_c["Id_Gestor"],
					"Id_Usuario"=>$row_c["Id_Usuario"],
					"Nombre_Empleado"=>$row_c["Nombre_Empleado"]
				);
				array_push($Data_Envia, $Data);
			}
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	return $respuesta;
}

public function cmb_ejecutantes($Id_Area){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$Departamento="";
	
	if($Id_Area==1){$Departamento="INGENIERIA BIOMEDICA";}
	if($Id_Area==2){$Departamento="TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES";}
	if($Id_Area==3){$Departamento="MANTENIMIENT";}
	if($Id_Area==4){$Departamento="PLANEACIÓN ESTRATÉGICA";}
	if($Id_Area==6){$Departamento="JURIDICO";}
	
	$sql="
		select Id_Usuario as Id_Usuario, Nombre_Usuario as Nombre_Completo from siga_usuarios where No_Usuario in(select num_empleado from empleados_chs where estatus in(1,3) and departamento like '%".$Departamento."%') and Estatus_Reg<>3
		union 
		select Id_Ejecutante as Id_Usuario, Nombre_Completo from siga_cat_ejecutantes where Estatus_Reg<>3 and Id_Area=".$Id_Area."
		order by 2 asc
	";
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Id_Usuario"=>$row_c["Id_Usuario"],
					"Nombre_Completo"=>$row_c["Nombre_Completo"]
				);
				array_push($Data_Envia, $Data);
			}
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	return $respuesta;
}



public function selectSiga_mantenimiento_correctivo($Siga_actividadesDto,$Fecha_Det_Programada, $proveedor=null){
	$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
	$Siga_actividadesDao = new Siga_actividadesDAO();
	$Siga_actividadesDto = $Siga_actividadesDao->selectSiga_actividades($Siga_actividadesDto,$proveedor);
	
	//Vale Array
	$ActividadesE = array();
	$ActividadesEnvia = array();
	
	$ActividadesDetE = array();
	$ActividadesDetEnvia = array();
	
	$respuesta = array();
	$error=true;
	
	if($Siga_actividadesDto!=""){
		
		$AF_BC="";
		$Nombre_Activo="";
		$Marca="";
		$Modelo="";
		$NumSerie="";
		$Foto="";
		$Desc_Ubic_Prim="";
		$Desc_Ubic_Sec="";
		
		
		$proveedor = new Proveedor('sqlserver', 'activos');
		$proveedor->connect();
		
		$sql="select SA.Id_Activo, SA.AF_BC, SA.Nombre_Activo, SA.Marca, SA.Modelo, SA.NumSerie, SA.Foto,SA.Id_Ubic_Prim, SA.Id_Ubic_Sec, UP.Desc_Ubic_Prim, US.Desc_Ubic_Sec";  
		$sql.=" from siga_activos SA ";  
		$sql.=" left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim";  
		$sql.=" left join siga_cat_ubic_sec US on SA.Id_Ubic_Sec=US.Id_Ubic_Sec";  
		$sql.=" where Id_Activo='".$Siga_actividadesDto[0]->getId_Activo()."'"; 
		
		$proveedor->execute($sql);
	
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$AF_BC=$row["AF_BC"];
					$Nombre_Activo=$row["Nombre_Activo"];
					$Marca=$row["Marca"];
					$Modelo=$row["Modelo"];
					$NumSerie=$row["NumSerie"];
					$Foto=$row["Foto"];
					$Desc_Ubic_Prim=$row["Desc_Ubic_Prim"];
					$Desc_Ubic_Sec=$row["Desc_Ubic_Sec"];
				}
			}	
		}else{
			$error=false;
		}
		$proveedor->close();
			
		
		$ActividadesE = array(
			"Id_Actividad" => $Siga_actividadesDto[0]->getId_Actividad(),
			"Id_Area" => $Siga_actividadesDto[0]->getId_Area(),
			"Tipo_Actividad" => $Siga_actividadesDto[0]->getTipo_Actividad(),
			"Id_Activo" => $Siga_actividadesDto[0]->getId_Activo(),
			"Nombre_Rutina" => $Siga_actividadesDto[0]->getNombre_Rutina(),
			"Id_Frecuencia" => $Siga_actividadesDto[0]->getId_Frecuencia(),
			"Descripcion" => $Siga_actividadesDto[0]->getDescripcion(),
			"Id_Gestor" => $Siga_actividadesDto[0]->getId_Gestor(),
			"Nombre_Ejecutante" => $Siga_actividadesDto[0]->getNombre_Ejecutante(),
			"Realiza" => $Siga_actividadesDto[0]->getRealiza(),
			"url_documentos_adjuntos" => $Siga_actividadesDto[0]->geturl_documentos_adjuntos(),
			"vincular_mesa_ayuda" => $Siga_actividadesDto[0]->getvincular_mesa_ayuda(),
			
			"Usuario_Responsable" => $Siga_actividadesDto[0]->getUsuario_Responsable(),
			"Motivo_Servicio" => $Siga_actividadesDto[0]->getMotivo_Servicio(),
			"Fecha_Programada" => $Siga_actividadesDto[0]->getFecha_Programada(),
			"Fecha_Realizada" => $Siga_actividadesDto[0]->getFecha_Realizada(),
			"Mant_RAC1" => $Siga_actividadesDto[0]->getMant_RAC1(),
			"Mant_RAC2" => $Siga_actividadesDto[0]->getMant_RAC2(),
			"Mant_RAC3" => $Siga_actividadesDto[0]->getMant_RAC3(),
			"Mant_RAC4" => $Siga_actividadesDto[0]->getMant_RAC4(),
			"Horas" => $Siga_actividadesDto[0]->getHoras(),
			"Costos_Materiales_CE" => $Siga_actividadesDto[0]->getCostos_Materiales_CE(),
			"Mano_Obra_CE" => $Siga_actividadesDto[0]->getMano_Obra_CE(),
			"Total_CE" => $Siga_actividadesDto[0]->getTotal_CE(),
			"Costos_Materiales_CI" => $Siga_actividadesDto[0]->getCostos_Materiales_CI(),
			"Mano_Obra_CI" => $Siga_actividadesDto[0]->getMano_Obra_CI(),
			"Total_CI" => $Siga_actividadesDto[0]->getTotal_CI(),
			"Ahorro" => $Siga_actividadesDto[0]->getAhorro(),
			"Comentarios" => $Siga_actividadesDto[0]->getComentarios(),
			
			"Fech_Inser" => $Siga_actividadesDto[0]->getFech_Inser(),
			"Usr_Inser" => $Siga_actividadesDto[0]->getUsr_Inser(),
			"Fech_Mod" => $Siga_actividadesDto[0]->getFech_Mod(),
			"Usr_Mod" => $Siga_actividadesDto[0]->getUsr_Mod(),
			"Estatus_Reg" => $Siga_actividadesDto[0]->getEstatus_Reg(),
			"AF_BC" =>$AF_BC,
			"Nombre_Activo" =>$Nombre_Activo,
			"Marca" =>$Marca,
			"Modelo" =>$Modelo,
			"NumSerie" =>$NumSerie,
			"Foto" =>$Foto,
			"Desc_Ubic_Prim" =>$Desc_Ubic_Prim,
			"Desc_Ubic_Sec" =>$Desc_Ubic_Sec,
		);
		
		array_push($ActividadesEnvia, $ActividadesE);
		
	}else{
		$error=false;
	}
	
	if($error==true){
		$respuesta = array("totalCount" => count($ActividadesEnvia), "data" => $ActividadesEnvia, "estatus" => "ok", "mensaje" => "Registros Encontrados");   
	}else{
		$respuesta = array("totalCount" => "0", "data" => "", "estatus" => "error", "mensaje" => "Registros No Encontrados");
	}
	
	return $respuesta;
}


public function insertMant_Predictivo($Siga_actividadesDto,$proveedor=null){
$Siga_actividadesDao = new Siga_actividadesDAO();
$Siga_actividadesDto = $Siga_actividadesDao->insertSiga_actividades($Siga_actividadesDto,$proveedor);
return $Siga_actividadesDto;
}

public function updateMant_Predictivo($Siga_actividadesDto,$proveedor=null){
$Siga_actividadesDao = new Siga_actividadesDAO();
$Siga_actividadesDto = $Siga_actividadesDao->updateSiga_actividades($Siga_actividadesDto,$proveedor);
return $Siga_actividadesDto;
}


public function deleteSiga_actividades($Siga_actividadesDto,$proveedor=null){
//$Siga_actividadesDto=$this->validarSiga_actividades($Siga_actividadesDto);
$Siga_actividadesDao = new Siga_actividadesDAO();
$Siga_actividadesDto = $Siga_actividadesDao->deleteSiga_actividades($Siga_actividadesDto,$proveedor);
return $Siga_actividadesDto;
}

//////Funciones Mesa de Ayuda
public function updateSiga_actividades_mesa($Siga_actividadesDto,$Array_det_actividades, $proveedor=null){
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$error=false;
	$respuesta = array();
	
	if($Siga_actividadesDto!=""){
		
		$consulta="UPDATE siga_actividades SET Fech_Mod=getdate(), Comentarios='".$Siga_actividadesDto->getComentarios()."', ";
		$consulta.="Mant_RAC1='".$Siga_actividadesDto->getMant_RAC1()."',";
		$consulta.="Mant_RAC2='".$Siga_actividadesDto->getMant_RAC2()."',";
		$consulta.="Mant_RAC3='".$Siga_actividadesDto->getMant_RAC3()."',";
		$consulta.="Mant_RAC4='".$Siga_actividadesDto->getMant_RAC4()."',";
		$consulta.="Horas='".$Siga_actividadesDto->getHoras()."',";
		$consulta.="Costos_Materiales_CE='".$Siga_actividadesDto->getCostos_Materiales_CE()."',";
		$consulta.="Mano_Obra_CE='".$Siga_actividadesDto->getMano_Obra_CE()."',";
		$consulta.="Total_CE='".$Siga_actividadesDto->getTotal_CE()."',";
		$consulta.="Costos_Materiales_CI='".$Siga_actividadesDto->getCostos_Materiales_CI()."',";
		$consulta.="Mano_Obra_CI='".$Siga_actividadesDto->getMano_Obra_CI()."',";
		$consulta.="Total_CI='".$Siga_actividadesDto->getTotal_CI()."',";
		$consulta.="Ahorro='".$Siga_actividadesDto->getAhorro()."',";
		$consulta.="Estatus_Reg='2' where Id_Actividad='".$Siga_actividadesDto->getId_Actividad()."'";
		
		$proveedor->execute($consulta);
		if (!$proveedor->error()) {
		
			if(count($Array_det_actividades) > 0){
				for($i=0; $i<count($Array_det_actividades); $i++) {
					$Fecha_Realizada="";
					if($Array_det_actividades[$i][4]!=""){
						$Fecha_Realizada=$Array_det_actividades[$i][4][6].''.$Array_det_actividades[$i][4][7].''.$Array_det_actividades[$i][4][8].''.$Array_det_actividades[$i][4][9].''.$Array_det_actividades[$i][4][3].''.$Array_det_actividades[$i][4][4].''.$Array_det_actividades[$i][4][0].''.$Array_det_actividades[$i][4][1];
					}
					
					$consulta="UPDATE siga_det_actividades SET Fech_Mod=getdate(), Usr_Mod='".$Siga_actividadesDto->getUsr_Mod()."', Url_Adjunto='".$Array_det_actividades[$i][3]."',Estatus_Actividad='".$Array_det_actividades[$i][1]."',Valor_Medido='".$Array_det_actividades[$i][0]."', Observaciones='".$Array_det_actividades[$i][2]."', Fecha_Realizada='".$Fecha_Realizada."', Estatus_Reg='2' where Id_Actividad='".$Siga_actividadesDto->getId_Actividad()."' and Id_Det_Actividad='".$Array_det_actividades[$i][5]."'";
					
					$proveedor->execute($consulta);
					if (!$proveedor->error()) {
					
					}else{
						$error=true;
					}
				}	
			}else{
				$error==true;
			}
		
		}
	
	}else{
		$error=true;
	}
	
	if($error==false){
		$respuesta = array("totalCount" => "1", "estatus" => "ok", "text" => "REGISTRO REALIZADO DE FORMA CORRECTA");
	}else{
		$respuesta = array("totalCount" => "0",  "estatus" => "error", "text" => "OCURRIO UN ERROR AL GUARDAR");
	}
	$proveedor->close();
	return $respuesta;
}


/////////////////////////////

public function llenarDataTable($siga_actividadesDto, $draw, $columns, $order, $start, $length, $search) {
$Siga_actividadesDao = new Siga_actividadesDAO();
return $Siga_actividadesDao->llenarDataTable($siga_actividadesDto, $draw, $columns, $order, $start, $length, $search);
}


//Nombre Rutina de Actividad Mantenimiento Preventivo
public function Rutina_Mant_Preventiv($siga_actividadesDto, $proveedor=null){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql="
		select distinct rtrim(ltrim(Nombre_Rutina)) as Nombre_Rutina from siga_actividades 
		where Id_Area='".$siga_actividadesDto->getId_Area()."' and Tipo_Actividad=2 and Estatus_Reg<>3
	";
	
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				
				$Data= array(
					"Nombre_Rutina" => $row["Nombre_Rutina"]
				);
				
				array_push($Data_Envia, $Data);
			}
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	return $respuesta;
}




//Graficas (Indicadores) Actividades
public function grafica_servicios_registrados($Array_Param_G,$siga_actividadesDto, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql="
		select 
		SA.Tipo_Actividad,
		COUNT(*) AS RecuentoFilas  
		from siga_actividades SA
		left join siga_det_actividades SDA 
		on SA.Id_Actividad=SDA.Id_Actividad
		where SA.Estatus_Reg<>'3' and SDA.Estatus_Reg<>'3' and Tipo_Actividad in('1','2')
		and SA.Id_Area='".$siga_actividadesDto->getId_Area()."' and SDA.Fecha_Programada BETWEEN '".$Array_Param_G[0]."' AND '".$Array_Param_G[1]."'
		GROUP BY SA.Tipo_Actividad
		HAVING COUNT(*) > 0
		union
		select
		Tipo_Actividad,
		COUNT(*) AS RecuentoFilas
		from siga_actividades 
		where Estatus_Reg<>'3' and Tipo_Actividad='3' and Id_Area='".$siga_actividadesDto->getId_Area()."' and
		Fecha_Programada BETWEEN '".$Array_Param_G[0]."' AND '".$Array_Param_G[1]."'
		GROUP BY Tipo_Actividad
		HAVING COUNT(*) > 0
	";
	
	
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total=$Total+$row["RecuentoFilas"];
				$Desc_Tipo_Actividad="";
				
				if($row["Tipo_Actividad"]=="1"){
					$Desc_Tipo_Actividad="Mantenimiento Predictivo";
				}else{
					if($row["Tipo_Actividad"]=="2"){
						$Desc_Tipo_Actividad="Mantenimiento Preventivo";
					}else{
						if($row["Tipo_Actividad"]=="3"){
							$Desc_Tipo_Actividad="Mantenimiento Correctivo";
						}
					}
				}
				
				$Data= array(
					"Desc_Tipo_Actividad"=>$Desc_Tipo_Actividad,
					"RecuentoFilas" => $row["RecuentoFilas"]
				);
				
				array_push($Data_Envia, $Data);
			}
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"Total_Filas"=>$Total,"data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	return $respuesta;
}

//Actividades Global

public function Actividades_Global($Array_Param_G,$siga_actividadesDto, $Anio_Global, $proveedor=null){
	$Concat_Id_Activo="";
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	$Estatus_Filtro=false;
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$Data_Detalle2 = array();
	$Data_Detalle_Envia2 = array();
		
	$cons="";
		
	if(($Array_Param_G[0]!="") ||($Array_Param_G[1]!="") ||($Array_Param_G[2]!="") ||($Array_Param_G[3]!="")||($Array_Param_G[4]!="")||($Array_Param_G[6]!="")||($Array_Param_G[7]!="")||($Array_Param_G[8]!="")||($Array_Param_G[9]!=""))
	{
		$cons.=" AND ";
	}
	
	if($Array_Param_G[0]!=""){
		$cons.=" A.Id_Ubic_Prim='".$Array_Param_G[0]."'";
		if(($Array_Param_G[1]!="") ||($Array_Param_G[2]!="") ||($Array_Param_G[3]!="")||($Array_Param_G[4]!="")||($Array_Param_G[6]!="")||($Array_Param_G[7]!="")||($Array_Param_G[8]!="")||($Array_Param_G[9]!=""))
		{
			$cons.=" AND ";
		}
		$Estatus_Filtro=true;
	}
	
	if($Array_Param_G[1]!=""){
		$cons.=" A.Id_Ubic_Sec='".$Array_Param_G[1]."'";
		if(($Array_Param_G[2]!="") ||($Array_Param_G[3]!="")||($Array_Param_G[4]!="")||($Array_Param_G[6]!="")||($Array_Param_G[7]!="")||($Array_Param_G[8]!="")||($Array_Param_G[9]!=""))
		{
			$cons.=" AND ";
		}
		$Estatus_Filtro=true;
	}
	
	if($Array_Param_G[2]!=""){
		$cons.=" A.Id_Clase='".$Array_Param_G[2]."'";
		if(($Array_Param_G[3]!="")||($Array_Param_G[4]!="")||($Array_Param_G[6]!="")||($Array_Param_G[7]!="")||($Array_Param_G[8]!="")||($Array_Param_G[9]!=""))
		{
			$cons.=" AND ";
		}
		$Estatus_Filtro=true;
	}
	
	if($Array_Param_G[3]!=""){
		$cons.=" A.Id_Clasificacion='".$Array_Param_G[3]."'";
		if(($Array_Param_G[4]!="")||($Array_Param_G[6]!="")||($Array_Param_G[7]!="")||($Array_Param_G[8]!="")||($Array_Param_G[9]!=""))
		{
			$cons.=" AND ";
		}
		$Estatus_Filtro=true;
	}
	
	if($Array_Param_G[4]!=""){
		$cons.=" A.Num_Empleado='".$Array_Param_G[4]."'";
		if(($Array_Param_G[6]!="")||($Array_Param_G[7]!="")||($Array_Param_G[8]!="")||($Array_Param_G[9]!=""))
		{
			$cons.=" AND ";
		}
		$Estatus_Filtro=true;
	}
	
	if($Array_Param_G[6]!=""){
		$cons.=" A.Id_Familia='".$Array_Param_G[6]."'";
		if(($Array_Param_G[7]!="")||($Array_Param_G[8]!="")||($Array_Param_G[9]!=""))
		{
			$cons.=" AND ";
		}
		$Estatus_Filtro=true;
	}
	
	if($Array_Param_G[7]!=""){
		$cons.=" A.Id_Subfamilia='".$Array_Param_G[7]."'";
		if(($Array_Param_G[8]!="")||($Array_Param_G[9]!=""))
		{
			$cons.=" AND ";
		}
		$Estatus_Filtro=true;
	}
	
	if($Array_Param_G[8]!=""){
		$cons.=" Ac.Nombre_Rutina like'%".$Array_Param_G[8]."%'";
		if(($Array_Param_G[9]!=""))
		{
			$cons.=" AND ";
		}
		$Estatus_Filtro=true;
	}
	
	if($Array_Param_G[9]!=""){
		$cons.=" Ac.Descripcion like'%".$Array_Param_G[9]."%'";
		
		$Estatus_Filtro=true;
	}
		
	//Activiades Programadas
	if($Array_Param_G[5]==""||$Array_Param_G[5]=="1"){
		
			$sql="
				SELECT DISTINCT 
					ac.Id_Activo
				FROM siga_actividades AC 
				LEFT JOIN siga_det_actividades AD on AC.Id_Actividad=AD.Id_Actividad 
				LEFT JOIN siga_activos A on AC.Id_Activo=A.Id_Activo 
				LEFT JOIN siga_cat_clase CL on A.Id_Clase=CL.Id_Clase 
				LEFT JOIN siga_cat_clasificacion CS on A.Id_Clasificacion=CS.Id_Clasificacion 
				LEFT JOIN siga_cat_frecuencia FREC on AC.Id_Frecuencia=FREC.Id_Frecuencia 
				WHERE AC.Estatus_Reg<>'3' 
					and A.Estatus_Reg <> '3'
					and A.Id_Situacion_Activo<>'12' 
					and AC.Id_Area=".$siga_actividadesDto->getId_Area()." 
					and AC.Tipo_Actividad=".$siga_actividadesDto->getTipo_Actividad()."
					and AD.Fecha_Programada>='".$Anio_Global."0101' and  AD.Fecha_Programada<='".$Anio_Global."1231'
			";
			$sql.=$cons;

		$proveedor->execute($sql);
	
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
			
			
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					
					$Data_Detalle = array();
					$Data_Detalle_Envia = array();
					
					$proveedor2 = new Proveedor('sqlserver', 'activos');
					$proveedor2->connect();
					$sql="
						SELECT TOP 1 
							AC.Id_Actividad,
							A.Id_Activo,
							A.AF_BC,
							A.Nombre_Activo,
							A.Nombre_Completo,
							FREC.Desc_Frecuencia,
							CASE 
								WHEN AC.Realiza=0 
									THEN 'Interno' 
								WHEN AC.Realiza=1 
									THEN 'Externo' 
								END as Realiza
						FROM siga_actividades AC 
						LEFT JOIN siga_det_actividades AD on AC.Id_Actividad=AD.Id_Actividad 
						LEFT JOIN siga_activos A on AC.Id_Activo=A.Id_Activo 
						LEFT JOIN siga_cat_clase CL on A.Id_Clase=CL.Id_Clase 
						LEFT JOIN siga_cat_clasificacion CS on A.Id_Clasificacion=CS.Id_Clasificacion 
						LEFT JOIN siga_cat_frecuencia FREC on AC.Id_Frecuencia=FREC.Id_Frecuencia 
						WHERE AC.Estatus_Reg<>'3' 
							and A.Estatus_Reg <> '3'
							and A.Id_Situacion_Activo<>'12' 
							and AC.Id_Area=".$siga_actividadesDto->getId_Area()." 
							and AC.Tipo_Actividad=".$siga_actividadesDto->getTipo_Actividad()."
							and AC.Id_Activo in(".$row["Id_Activo"].") ".$cons."
						ORDER BY AC.Id_Actividad desc
					";
					
					$proveedor2->execute($sql);

					if(!$proveedor2->error()){
						if ($proveedor2->rows($proveedor2->stmt) > 0) {
							while ($row2 = $proveedor2->fetch_array($proveedor2->stmt, 0)) {
								
								//Encabezado Detalle Actividades
								$Data_Actividades = array();
								$Data_Actividades_Envia = array();
								$sql="
									SELECT 
										Num_Actividad,
										Nombre_Actividad 
									FROM siga_det_actividades 
									WHERE Id_Actividad=".$row2["Id_Actividad"]." 
									and Estatus_Reg<>'3'
									ORDER BY Num_Actividad
								";
								$proveedor3 = new Proveedor('sqlserver', 'activos');
								$proveedor3->connect();
								$proveedor3->execute($sql);
								if(!$proveedor3->error()){
									if ($proveedor3->rows($proveedor3->stmt) > 0) {
										while ($row3 = $proveedor3->fetch_array($proveedor3->stmt, 0)) {
											$Data_Actividades= array(
												"Num_Actividad" => $row3["Num_Actividad"],
												"Nombre_Actividad" => rtrim(ltrim($row3["Nombre_Actividad"]))
											);
											
											array_push($Data_Actividades_Envia, $Data_Actividades);
										
										}
									}
								}				
								$proveedor3->close();
								//Fin Encabezado Detalle Actividades
								
								

								//Detalle Actividades
								$Data_Det_Actividades = array();
								$Data_Det_Actividades_Envia = array();

								$sql="
									SELECT 
										AD.Id_Det_Actividad, 
										AD.Id_Actividad, 
										AD.Num_Actividad,
										AD.Nombre_Actividad,
										AD.Valor_Referencia,
										AD.Valor_Medido,
										AD.Estatus_Actividad,
										AD.Fecha_Programada,
										--AD.Fecha_Realizada,
										(SELECT top 1 Fecha_Realizada FROM siga_det_actividades WHERE Id_Actividad=AD.Id_Actividad ORDER BY Fecha_Realizada DESC) AS Fecha_Realizada
										--, 										
										--CASE 
										--	WHEN (Select Estatus_Reg from siga_solicitud_tickets where Id_Actividad=".$row2["Id_Actividad"].")=2
										--		THEN AD.Fecha_Realizada
										--	ELSE ''
										--END as Fecha_Realizada_alex
									FROM siga_actividades AC 
									LEFT JOIN siga_det_actividades AD 	on AC.Id_Actividad=AD.Id_Actividad 
									LEFT JOIN siga_activos A 			on AC.Id_Activo=A.Id_Activo 
									LEFT JOIN siga_cat_clase CL 		on A.Id_Clase=CL.Id_Clase 
									LEFT JOIN siga_cat_clasificacion CS on A.Id_Clasificacion=CS.Id_Clasificacion 
									LEFT JOIN siga_cat_frecuencia FREC 	on AC.Id_Frecuencia=FREC.Id_Frecuencia 
									WHERE AC.Estatus_Reg <> '3' 
									and A.Estatus_Reg <> '3' 
									and A.Id_Situacion_Activo <> '12' 
									and AC.Id_Area=".$siga_actividadesDto->getId_Area()." 
									and AC.Tipo_Actividad=".$siga_actividadesDto->getTipo_Actividad()."
									and AC.Id_Activo in(".$row["Id_Activo"].") ".$cons."
									and AD.Fecha_Programada>='".$Anio_Global."0101' and  AD.Fecha_Programada<='".$Anio_Global."1231'
									ORDER BY AC.Id_Actividad, AD.Num_Actividad, AD.Fecha_Realizada desc								
								";
								//var_dump($sql);
								$proveedor4 = new Proveedor('sqlserver', 'activos');
								$proveedor4->connect();
								$proveedor4->execute($sql);
									if(!$proveedor4->error()){
										if ($proveedor4->rows($proveedor4->stmt) > 0) {
											while ($row4 = $proveedor4->fetch_array($proveedor4->stmt, 0)) {
												$Data_Det_Actividades= array(
													"Id_Det_Actividad" => $row4["Id_Det_Actividad"],
													"Id_Actividad" => $row4["Id_Actividad"],
													//"Nombre_Actividad" => rtrim(ltrim($row3["Nombre_Actividad"])),
													"Num_Actividad" => $row4["Num_Actividad"],
													"Estatus_Actividad" => $row4["Estatus_Actividad"],
													"Fecha_Programada" => rtrim(ltrim($row4["Fecha_Programada"])),
													"Fecha_Realizada" => rtrim(ltrim($row4["Fecha_Realizada"]))
													//"Fecha_Realizada" => rtrim(ltrim($row4["Fecha_Realizada"]))
												);
												
												array_push($Data_Det_Actividades_Envia, $Data_Det_Actividades);
											
											}
										}
									}				
								$proveedor4->close();
								//Fin Detalle Actividades
								
								
								$Data_Detalle= array(
									"Id_Actividad" => $row2["Id_Actividad"],
									"Id_Activo" => $row2["Id_Activo"],
									"AF_BC" => rtrim(ltrim($row2["AF_BC"])),
									"Nombre_Activo" => rtrim(ltrim($row2["Nombre_Activo"])),
									"Nombre_Completo" => rtrim(ltrim($row2["Nombre_Completo"])),
									"Desc_Frecuencia" => rtrim(ltrim($row2["Desc_Frecuencia"])),
									"Realiza" => rtrim(ltrim($row2["Realiza"])),
									"Actividades"=>$Data_Actividades_Envia,
									"Total_Actividades"=>count($Data_Actividades_Envia),
									"Actividades_Detalle"=>$Data_Det_Actividades_Envia,
									"Total_Actividades_Detalle"=>count($Data_Det_Actividades_Envia)
								);
								
								array_push($Data_Envia, $Data_Detalle);
							}
						}
					}else{
						$error=true;
					}
					$proveedor2->close();
			
				}
				
			}else{
				$error=true;
			}
		}
	}
	
	//Actividade sin Programar
	if($Array_Param_G[5]==""||$Array_Param_G[5]=="2"){
	//if($Estatus_Filtro==true){
		$proveedor3 = new Proveedor('sqlserver', 'activos');
		$proveedor3->connect();
		
		$sql="
			select A.Id_Activo, A.AF_BC, A.Nombre_Activo, A.Marca, A.Modelo, A.NumSerie, A.Num_Empleado, A.Nombre_Completo 
			from siga_activos A 
			left join siga_actividades Ac on A.Id_Activo=Ac.Id_Actividad 
			where A.Estatus_Reg<>'3' and A.Id_Situacion_Activo<>'12' and A.Id_Area=".$siga_actividadesDto->getId_Area()." ".$cons." 
			
		";
		
		if($Concat_Id_Activo!=""){
			$sql.="
				and A.Id_Activo not in (".substr($Concat_Id_Activo, 0, -1).")
			";
		}
		
		$sql.="
			order by A.Nombre_Activo asc
		";
		
		$proveedor3->execute($sql);
			if(!$proveedor3->error()){
				if ($proveedor3->rows($proveedor3->stmt) > 0) {
					while ($row3 = $proveedor3->fetch_array($proveedor3->stmt, 0)) {
						$Data_Detalle2= array(
							"Id_Activo" => $row3["Id_Activo"],
							"AF_BC" => $row3["AF_BC"],
							"Nombre_Activo" => rtrim(ltrim($row3["Nombre_Activo"])),
							"Marca" => rtrim(ltrim($row3["Marca"])),
							"Modelo" => rtrim(ltrim($row3["Modelo"])),
							"NumSerie" => rtrim(ltrim($row3["NumSerie"])),
							"Num_Empleado" => rtrim(ltrim($row3["Num_Empleado"])),
							"Nombre_Completo" => rtrim(ltrim($row3["Nombre_Completo"]))
						);
						
						array_push($Data_Detalle_Envia2, $Data_Detalle2);
					}
				}
			}
		$proveedor3->close();
	}
	//}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"totalCountActsinProgramar" => count($Data_Detalle_Envia2),"dataActsinProgramar" => $Data_Detalle_Envia2,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","totalCountActsinProgramar" =>"0", "dataActsinProgramar" =>"", "estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	return $respuesta;
}
}
?>