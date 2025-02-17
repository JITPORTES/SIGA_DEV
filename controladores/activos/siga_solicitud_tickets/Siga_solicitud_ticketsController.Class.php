<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_solicitud_tickets/Siga_solicitud_ticketsDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_solicitud_tickets/Siga_solicitud_ticketsDAO.Class.php");
include_once(dirname(__FILE__)."/../../../vistas/CURL.php");
include_once(dirname(__FILE__)."/../../../datos/logger/Logger.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_activos/Siga_activosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_activos/Siga_activosDAO.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_usuarios/Siga_usuariosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_usuarios/Siga_usuariosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_solicitud_ticketsController {
private $proveedor;
public function __construct() {
}
public function validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto){
$Siga_solicitud_ticketsDto->setId_Solicitud(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getId_Solicitud()))));
$Siga_solicitud_ticketsDto->setId_Solicitud_Anterior(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getId_Solicitud_Anterior()))));
$Siga_solicitud_ticketsDto->setAsist_Especial(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getAsist_Especial()))));
$Siga_solicitud_ticketsDto->setId_Activo(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getId_Activo()))));
$Siga_solicitud_ticketsDto->setId_Usuario(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getId_Usuario()))));
$Siga_solicitud_ticketsDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getId_Area()))));
$Siga_solicitud_ticketsDto->setId_Medio(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getId_Medio()))));
$Siga_solicitud_ticketsDto->setSeccion(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getSeccion()))));
$Siga_solicitud_ticketsDto->setTitulo(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getTitulo()))));
$Siga_solicitud_ticketsDto->setId_Det_Actividad(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getId_Det_Actividad()))));
$Siga_solicitud_ticketsDto->setDesc_Motivo_Reporte(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getDesc_Motivo_Reporte()))));
$Siga_solicitud_ticketsDto->setPrioridad(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getPrioridad()))));
$Siga_solicitud_ticketsDto->setUrl_archivo(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getUrl_archivo()))));
$Siga_solicitud_ticketsDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getFech_Inser()))));
$Siga_solicitud_ticketsDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getUsr_Inser()))));
$Siga_solicitud_ticketsDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getFech_Mod()))));
$Siga_solicitud_ticketsDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getUsr_Mod()))));
$Siga_solicitud_ticketsDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getEstatus_Reg()))));
$Siga_solicitud_ticketsDto->setEstatus_Proceso(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getEstatus_Proceso()))));
$Siga_solicitud_ticketsDto->setTituloCierre(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getTituloCierre()))));
$Siga_solicitud_ticketsDto->setComentariocierre(strtoupper(str_ireplace("'","",trim($Siga_solicitud_ticketsDto->getComentarioCierre()))));
return $Siga_solicitud_ticketsDto;
}

public function selectEstatus_Proceso($Id_Solicitud, $Estatus_P, $proveedor=null){
	$Estatus_Proceso="";
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql="
		select top 1 Estatus_Proceso from siga_solicitud_tickets where Id_Solicitud=".$Id_Solicitud." and Estatus_Proceso=".$Estatus_P."
	";
	//echo $sql;
	$proveedor->execute($sql);

	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Estatus_Proceso=$row["Estatus_Proceso"];
			}
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		if($Estatus_Proceso!=""){
			$respuesta = array("totalCount" => "1", "Estatus_Proceso"=>$Estatus_Proceso, "mensaje" => "Registros Encontrados");
		}else{
			$respuesta = array("totalCount" => "0", "Estatus_Proceso"=>$Estatus_Proceso, "mensaje" => "Registros No Encontrados");
		}
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}


public function selectUsuarios_Enfermeria(){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select Id_Usuario, No_Usuario, Nombre_Usuario from siga_usuarios where No_Usuario in(select convert(varchar, num_empleado) from empleados_chs where puesto like '%enfermer%' and estatus in(1,3) and departamento='UNIDAD QUIRÚRGICA' )
		order by Nombre_Usuario asc
	";
	
	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Id_Usuario"=>$row_c["Id_Usuario"],
					"No_Usuario"=>$row_c["No_Usuario"],
					"Nombre_Usuario"=>$row_c["Nombre_Usuario"]
					
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


	public function Cambiar_Activo_Solicitud($Id_Solicitud, $Id_Activo, $Id_Cirugia, $Id_Usuario){
		$respuesta = array();
		$Error=false;
		//Datos del Activo
		$AF_BC=""; $Nombre_Activo=""; $Marca=""; $Modelo=""; $NumSerie=""; $Id_Ubic_Prim=""; $Id_Ubic_Sec="";
		$Empresa=""; $Nombre_Completo=""; $Telefono=""; $Correo="";
		if($Id_Solicitud!="" && $Id_Activo!=""){
			$Siga_activosDto = new Siga_activosDTO();
			$Siga_activosDao = new Siga_activosDAO();
			$Siga_activosDto->setId_Activo($Id_Activo);
			$orden="";
			$Siga_activosDto = $Siga_activosDao->selectSiga_activos($Siga_activosDto,$orden,$proveedor=null);
			if($Siga_activosDto!=""){
				$AF_BC=$Siga_activosDto[0]->getAF_BC();
				$Nombre_Activo=$Siga_activosDto[0]->getNombre_Activo();
				$Marca=$Siga_activosDto[0]->getMarca();
				$Modelo=$Siga_activosDto[0]->getModelo();
				$NumSerie=$Siga_activosDto[0]->getNumSerie();
				$Id_Ubic_Prim=$Siga_activosDto[0]->getId_Ubic_Prim();
				$Id_Ubic_Sec=$Siga_activosDto[0]->getId_Ubic_Sec();
				//$Empresa=$Siga_activosDto[0]->getEmpresa_Ext();
				//$Nombre_Completo=$Siga_activosDto[0]->getNombre_Completo_Ext();
				//$Telefono=$Siga_activosDto[0]->getTelefono_Ext();
				//$Correo=$Siga_activosDto[0]->getCorreo_Ext();
			}
			//Datos del Activo
			
			
			$proveedor = new Proveedor('sqlserver', 'activos');
			$proveedor->connect();
			$strSQL="UPDATE siga_solicitud_tickets ";
			$strSQL.=" SET Id_Activo=".$Id_Activo; 
			$strSQL.="		 ,AF_BC_Ext='".$AF_BC."'";
			$strSQL.="		 ,Nombre_Act_Ext='".$Nombre_Activo."'";
			$strSQL.="		 ,Marca_Act_Ext='".$Marca."'";
			$strSQL.="		 ,Modelo_Act_Ext='".$Modelo."'";
			$strSQL.="		 ,No_Serie_Act_Ext='".$NumSerie."'";
			if($Id_Ubic_Prim!=""){
				$strSQL.="	 ,Id_Ubic_Prim=".$Id_Ubic_Prim;
			}
			if($Id_Ubic_Sec!=""){
				$strSQL.="	 ,Id_Ubic_Sec=".$Id_Ubic_Sec;
			}
			$strSQL.="		 ,Empresa_Ext='".$Empresa."'";
			$strSQL.="		 ,Nombre_Completo_Ext='".$Nombre_Completo."'";
			$strSQL.="		 ,Telefono_Ext='".$Telefono."'";
			$strSQL.="		 ,Correo_Ext='".$Correo."'";
			$strSQL.=" where ";
			$strSQL.=" Id_Solicitud=".$Id_Solicitud; 
			$proveedor->execute($strSQL);
			
			if (!$proveedor->error()){
			}else{
				$Error=true;
			}
			$proveedor->close();
		}else{
			$Error=true;
		}
		
		
		if($Error==false){
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha actualizado el registro correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar información");
		}
		
		if($Id_Usuario!=""){
			if($Id_Cirugia!=""){
				$proveedorusr = new Proveedor('sqlserver', 'activos');
				$proveedorusr->connect();
				$sql="
					select (select top 1 usuario_sistema_hospitalario from empleados_chs where siga_usuarios.No_Usuario=empleados_chs.num_empleado) as usuario_assist 
					from siga_usuarios 
					where Id_Usuario=".$Id_Usuario."
				";
				
				$proveedorusr->execute($sql);
				
				if (!$proveedorusr->error()){
					//La posicion cero no se toma
					if ($proveedorusr->rows($proveedorusr->stmt) > 0) {
						while ($row_c = $proveedorusr->fetch_array($proveedorusr->stmt, 0)) {
							$usuario_assist=$row_c["usuario_assist"];
							$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Id_Solicitud.'&tab=1">'.$Id_Solicitud.'</a>/Se Agrego Activo Externo/Nombre Activo: '.$Nombre_Activo;
							$this->insert_gtiqx($Id_Cirugia, $comentario, $usuario_assist, "N");		
						}
					}	
				}
			}
		}
		
		
		return $respuesta;
	}	
	



//Funcion para generar el reporte de Categorias en Mesa de Ayuda (Gestores)
public function selectSiga_categorias_reporte($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final,$proveedor=null){
	$Total_Cantidad=0;
	$Data = array();
	$Data_Envia = array();
	
	$Data_Anio = array();
	$Data_Anio_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$seccion_y_Gestor="";
	
	if($Siga_solicitud_ticketsDto->getSeccion()!=""&&$Siga_solicitud_ticketsDto->getSeccion()!="-1"){
		$seccion_y_Gestor.=" S.Seccion=".$Siga_solicitud_ticketsDto->getSeccion()." and ";
	}
	
	if($Siga_solicitud_ticketsDto->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto->getId_Gestor()!="-1"){
		$seccion_y_Gestor.=" S.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." and ";
	}
	
	$sql="
	select * from
	(
	select S.Id_Categoria,
	count(
	S.Id_Categoria
	) as Cantidad
	from dbo.siga_solicitud_tickets S
	left join siga_cat_ticket_categoria SC on S.Id_Categoria=SC.Id_Categoria
	where S.Estatus_Reg <> '3' and S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor."
	FORMAT(S.Fech_Cierre,'dd/MM/yyyy')
	BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
	group by S.Id_Categoria
	having count(S.Id_Categoria) > 0
	union
	SELECT  '0' as Id_Categoria,COUNT (*) as cantidad FROM siga_solicitud_tickets S WHERE Id_Categoria IS NULL and
	Estatus_Reg <> '3' and Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor." 
	FORMAT(Fech_Cierre,'dd/MM/yyyy') 
	BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
	)
	siga_solicitud_tickets order by Cantidad asc
	";
	$proveedor->execute($sql);
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Id_Categoria=$row["Id_Categoria"];
				$Cantidad=$row["Cantidad"];
				$Desc_Categoria="";
				$Emitidas=0;
				$Sin_Categoria=0; if($Id_Categoria==0){$Sin_Categoria=$row["Cantidad"];}
				$Nuevas=0;
				$Seguimiento=0;
				$Por_Calificar=0;
				$Cerradas=0;
				$Pendientes=0;
				if($row["Id_Categoria"]!="0"||$row["Id_Categoria"]!=""){
					$proveedor2 = new Proveedor('sqlserver', 'activos');
					$proveedor2->connect();
					$sql="
					SELECT  S.Id_Categoria,S.Id_Subcategoria, S.Estatus_Proceso, SC.Desc_Categoria FROM siga_solicitud_tickets S
					left join siga_cat_ticket_categoria SC on S.Id_Categoria=SC.Id_Categoria
					WHERE
					Estatus_Reg <> '3' and Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor." S.Id_Categoria='".$row["Id_Categoria"]."' and
					FORMAT(Fech_Inser,'dd/MM/yyyy')  
					BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')";
					
					$proveedor2->execute($sql);
					if (!$proveedor2->error()){
						if ($proveedor2->rows($proveedor2->stmt) > 0) {
							while ($row = $proveedor2->fetch_array($proveedor2->stmt, 0)) {
								$Desc_Categoria=$row["Desc_Categoria"];
								$Emitidas=$Emitidas+1;
								
								
								
								if($row["Estatus_Proceso"]==1){
									$Nuevas=$Nuevas+1;
								}
								
								if($row["Estatus_Proceso"]==2){
									$Seguimiento=$Seguimiento+1;
								}
								
								if($row["Estatus_Proceso"]==3){
									$Por_Calificar=$Por_Calificar+1;
								}
								if($row["Estatus_Proceso"]==4){
									$Cerradas=$Cerradas+1;
								}
							}
						}
					}else{
						$error=true;
					}
					$proveedor2->close();
				}else{
					
				}
				
				//VALIDAMOS QUE LA CANTIDAD DE CATEGORIAS SEA MAYOR A CERO
				if($Cantidad>0){
					$Total_Cantidad=$Total_Cantidad+(int)$Cantidad;
					$Pendientes=$Emitidas - $Cerradas;
					$Data= array(
						"Id_Categoria" => $Id_Categoria,
						"Cantidad" => $Cantidad,
						"Desc_Categoria" => $Desc_Categoria,
						"Nuevas" => $Nuevas+$Sin_Categoria,
						"Seguimiento" => $Seguimiento,
						"Por_Calificar" => $Por_Calificar,
						"Cerradas" => $Cerradas,
						"Emitidas"=>$Emitidas,
						"Pendientes"=>$Pendientes
					);
				
					array_push($Data_Envia, $Data);
				}
			}
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"Total_Cantidad"=>$Total_Cantidad, "data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}

//Funcion para generar el reporte de Categorias con un Top 3
public function selectSiga_categorias_reporte_Top_3($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final,$proveedor=null){
	$Total_Cantidad=0;
	$Data = array();
	$Data_Envia = array();
	
	$Data_Anio = array();
	$Data_Anio_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$seccion_y_Gestor="";
	
	if($Siga_solicitud_ticketsDto->getSeccion()!=""&&$Siga_solicitud_ticketsDto->getSeccion()!="-1"){
		$seccion_y_Gestor.=" S.Seccion=".$Siga_solicitud_ticketsDto->getSeccion()." and ";
	}
	
	if($Siga_solicitud_ticketsDto->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto->getId_Gestor()!="-1"){
		$seccion_y_Gestor.=" S.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." and ";
	}
	
	$sql="
	select top 3 * from
	(
	select S.Id_Categoria,
	count(
	S.Id_Categoria
	) as Cantidad
	from dbo.siga_solicitud_tickets S
	left join siga_cat_ticket_categoria SC on S.Id_Categoria=SC.Id_Categoria
	where S.Estatus_Reg <> '3' and S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor."
	FORMAT(S.Fech_Solicitud ,'dd/MM/yyyy')  
	BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
	group by S.Id_Categoria
	having count(S.Id_Categoria) > 0
	union
	SELECT  '0' as Id_Categoria,COUNT (*) as cantidad FROM siga_solicitud_tickets S WHERE Id_Categoria IS NULL and
	Estatus_Reg <> '3' and Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor." 
	FORMAT(Fech_Solicitud ,'dd/MM/yyyy')  
	BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
	)
	siga_solicitud_tickets order by Cantidad desc
	";
	$proveedor->execute($sql);

	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Id_Categoria=$row["Id_Categoria"];
				$Cantidad=$row["Cantidad"];
				$Desc_Categoria="";
				$Emitidas=0;
				$Sin_Categoria=0; if($Id_Categoria==0){$Sin_Categoria=$row["Cantidad"];}
				$Nuevas=0;
				$Seguimiento=0;
				$Por_Calificar=0;
				$Cerradas=0;
				$Pendientes=0;
				if($row["Id_Categoria"]!="0"||$row["Id_Categoria"]!=""){
					$proveedor2 = new Proveedor('sqlserver', 'activos');
					$proveedor2->connect();
					$sql="
					SELECT  S.Id_Categoria,S.Id_Subcategoria, S.Estatus_Proceso, SC.Desc_Categoria FROM siga_solicitud_tickets S
					left join siga_cat_ticket_categoria SC on S.Id_Categoria=SC.Id_Categoria
					WHERE
					Estatus_Reg <> '3' and Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor." S.Id_Categoria='".$row["Id_Categoria"]."' and
					 
					FORMAT(Fech_Inser ,'dd/MM/yyyy') 
					BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')";
					
					$proveedor2->execute($sql);
					if (!$proveedor2->error()){
						if ($proveedor2->rows($proveedor2->stmt) > 0) {
							while ($row = $proveedor2->fetch_array($proveedor2->stmt, 0)) {
								$Desc_Categoria=$row["Desc_Categoria"];
								$Emitidas=$Emitidas+1;
								
								if($row["Estatus_Proceso"]==1){
									$Nuevas=$Nuevas+1;
								}
								
								if($row["Estatus_Proceso"]==2){
									$Seguimiento=$Seguimiento+1;
								}
								
								if($row["Estatus_Proceso"]==3){
									$Por_Calificar=$Por_Calificar+1;
								}
								if($row["Estatus_Proceso"]==4){
									$Cerradas=$Cerradas+1;
								}
							}
						}
					}else{
						$error=true;
					}
					$proveedor2->close();
				}else{
					
				}
				
				//VALIDAMOS QUE LA CANTIDAD DE CATEGORIAS SEA MAYOR A CERO
				if($Cantidad>0){
					$Total_Cantidad=$Total_Cantidad+(int)$Cantidad;
					$Pendientes=$Emitidas - $Cerradas;
					$Data= array(
						"Id_Categoria" => $Id_Categoria,
						"Cantidad" => $Cantidad,
						"Desc_Categoria" => $Desc_Categoria,
						"Nuevas" => $Nuevas+$Sin_Categoria,
						"Seguimiento" => $Seguimiento,
						"Por_Calificar" => $Por_Calificar,
						"Cerradas" => $Cerradas,
						"Emitidas"=>$Emitidas,
						"Pendientes"=>$Pendientes
					);
				
					array_push($Data_Envia, $Data);
				}
			}
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"Total_Cantidad"=>$Total_Cantidad, "data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}



//Funcion para generar el reporte por Categorias en Mesa de Ayuda (Gestores)
public function selectSiga_x_categorias($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final,$proveedor=null){
	$Total_Cantidad=0;
	$Data = array();
	$Data_Envia = array();
	
	$Data_Anio = array();
	$Data_Anio_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$seccion_y_Gestor="";
	
	if($Siga_solicitud_ticketsDto->getSeccion()!=""&&$Siga_solicitud_ticketsDto->getSeccion()!="-1"){
		$seccion_y_Gestor.=" S.Seccion=".$Siga_solicitud_ticketsDto->getSeccion()." and ";
	}
	
	if($Siga_solicitud_ticketsDto->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto->getId_Gestor()!="-1"){
		$seccion_y_Gestor.=" S.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." and ";
	}
	
	$sql="
	select S.Id_Subcategoria, count( S.Id_Subcategoria ) as Cantidad from dbo.siga_solicitud_tickets S 
	left join siga_cat_ticket_subcategoria SS on S.Id_Categoria=SS.Id_Subcategoria 
	where S.Estatus_Reg <> '3' 
	and S.Id_Categoria ='".$Siga_solicitud_ticketsDto->getId_Categoria()."' and S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor." 
	FORMAT(S.Fech_Solicitud  ,'dd/MM/yyyy') 
	BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."') 
	group by S.Id_Subcategoria having count(S.Id_Subcategoria) > 0 
	";

	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Id_Subcategoria=$row["Id_Subcategoria"];
				$Cantidad=$row["Cantidad"];
				$Desc_Subcategoria="";

				
				$proveedor2 = new Proveedor('sqlserver', 'activos');
				$proveedor2->connect();
				$sql="
				select * from siga_cat_ticket_subcategoria where 
				Id_Subcategoria='".$row["Id_Subcategoria"]."'
				";
				
				$proveedor2->execute($sql);
				if (!$proveedor2->error()){
					if ($proveedor2->rows($proveedor2->stmt) > 0) {
						while ($row = $proveedor2->fetch_array($proveedor2->stmt, 0)) {
							$Desc_Subcategoria=$row["Desc_Subcategoria"];
						}
					}
				}else{
					$error=true;
				}
				$proveedor2->close();
				
				
				//VALIDAMOS QUE LA CANTIDAD DE CATEGORIAS SEA MAYOR A CERO
				if($Cantidad>0){
					$Total_Cantidad=$Total_Cantidad+(int)$Cantidad;
					$Data= array(
						"Id_Subcategoria" => $Id_Subcategoria,
						"Cantidad" => $Cantidad,
						"Desc_Subcategoria" => $Desc_Subcategoria
					);
				
					array_push($Data_Envia, $Data);
				}
			}
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"Total_Cantidad"=>$Total_Cantidad, "data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}

//Funcion tabla por subcategoria
public function tabla_x_categoria($Siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Nombre_Grafica, $Tipo_Calificacion, $Calificacion, $proveedor=null){

	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$Id_Categoria="";
	if($Nombre_Grafica=="Por_Categoria_y_Subcategoria"){
		if($Siga_solicitud_ticketsDto->getId_Categoria()!=""){
			$Id_Categoria.=" ST.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." and ";
		}else{
			$Id_Categoria.=" ST.Id_Categoria is null and ";
		}
	}
	
	$Id_Subcategoria="";
	if($Nombre_Grafica=="Por_Categoria_y_Subcategoria"){
		if($Siga_solicitud_ticketsDto->getId_Subcategoria()!=""){
			$Id_Subcategoria.=" ST.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." and ";
		}else{
			$Id_Subcategoria.=" ST.Id_Subcategoria is null and ";
		}
	}
	
	$seccion_y_Gestor="";
	if($Siga_solicitud_ticketsDto->getSeccion()!=""&&$Siga_solicitud_ticketsDto->getSeccion()!="-1"){
		$seccion_y_Gestor.=" ST.Seccion=".$Siga_solicitud_ticketsDto->getSeccion()." and ";
	}
	if($Siga_solicitud_ticketsDto->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto->getId_Gestor()!="-1"){
		$seccion_y_Gestor.=" ST.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." and ";
	}
	
	if($Fecha_Inicial!=""&&$Fecha_Final!=""){
		$sql="
			SELECT * from (
				SELECT 
				(SELECT top 1 Id_Respuesta1 from siga_ticket_calificacion where Id_Solicitud=ST.Id_Solicitud order by Fech_Inser desc) as Solucion_Ofrecida,
				(SELECT top 1 Id_Respuesta2 from siga_ticket_calificacion where Id_Solicitud=ST.Id_Solicitud order by Fech_Inser desc) as Actitud_Solucion,
				(SELECT top 1 Id_Respuesta3 from siga_ticket_calificacion where Id_Solicitud=ST.Id_Solicitud order by Fech_Inser desc) as Tiempo_Respuesta,
					ST.Id_Solicitud,
					ST.Asist_Especial,
					ST.Id_Activo,
					'[Nombre Activo: '+rtrim(ltrim(A.Nombre_Activo))+'] '+'[AF/BC: '+rtrim(ltrim(A.AF_BC))+'] '+'[Ubicaci&oacute;n Primaria: '+rtrim(ltrim(UP.Desc_Ubic_Prim))+'] '+'[Ubicaci&oacute;n Secundaria: '+rtrim(ltrim(US.Desc_Ubic_Sec))+'] '+'[Usuario Responsable: '+rtrim(ltrim(A.Nombre_Completo))+']' as Activo,
				CASE ST.Estatus_Proceso 
					WHEN 1 
						THEN 'Nuevo' 
					WHEN 2 
						THEN 'En Seguimiento' 
					WHEN 3 
						THEN 'En espera de cierre' 
					WHEN 4 
						THEN 'Cerrado'
				END as  Id_Estatus_Proceso, 
					ST.Id_Usuario,
					(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) Nombre_Usuario,
					CA.Nom_Area,
					ST.Id_Area,
					ST.Seccion,
					ST.Titulo,
					ST.Id_Categoria,
					SCMR.Desc_Categoria,
					SCTS.Desc_Subcategoria,
					ST.Desc_Motivo_Reporte,
					ST.Prioridad,
					ST.Url_archivo,
					ST.Fech_Inser,
					FORMAT(ST.Fech_Inser,'dd/MM/yyyy hh:mm:ss') as Fecha,
					FORMAT(ST.Fech_Solicitud,'dd/MM/yyyy hh:mm:ss') as Fecha_Solicitud,
					FORMAT(ST.Fech_Seguimiento,'dd/MM/yyyy hh:mm:ss') as Fecha_Seguimiento,
					FORMAT(ST.Fech_Espera_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Esp_Cierre,
					FORMAT(ST.Fech_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Cierre,
					ST.Usr_Inser,
					ST.Fech_Mod,
					ST.Usr_Mod,
					ST.Estatus_Reg,
					(select C.Desc_Seccion from siga_cat_ticket_seccion C where C.Id_Seccion=ST.Seccion) Nombre_Seccion,
					ST.Id_Gestor,
					Id_Gestor_Reasignado,
					(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Gestor=U.Id_Usuario) Gestor,
					(select P.Desc_Proceso from siga_cat_ticket_proceso P where P.Id_Estatus_Proceso=ST.Estatus_Proceso) Estatus_Proceso, 
					ST.TituloCierre, 
					ST.ComentarioCierre,
					Usr.Nombre_Usuario as Nom_usr_reasignado,
					ST.Id_Actividad,
				CASE ST.Asist_Especial 
					WHEN 1 
						THEN 'Asistencia Especial' 
					END as A_Especial,
				CASE ST.Prioridad 
					WHEN 1 
						THEN 'Alta' 
					WHEN 2 
						THEN 'Media' 
					WHEN 3 
						THEN 'Baja' 
				END as Desc_Prioridad,
					ISNULL(UP.Desc_Ubic_Prim,'') as Desc_Ubic_Prim,
					ISNULL(US.Desc_Ubic_Sec,'')	as Desc_Ubic_Sec, 
					(SELECT z.Desc_Estatus FROM siga_cat_estatus as z WHERE z.Id_Estatus= ST.Id_Est_Equipo) as Desc_Estatus,
					(select U.Nombre_Usuario from siga_usuarios U where st.Id_Usuario_Inicial=U.Id_Usuario) as Id_Usuario_Inicial,
					(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) usuario_final,
					CASE ST.Lo_Realiza
						WHEN 0
							THEN 'Interno' 
						WHEN 1 
							THEN 'Externo'
					END as Lo_Realiza,
					ISNULL((select U.Nombre_Usuario from siga_usuarios U where ST.Gestor_Final_Cierre=U.Id_Usuario),'Sin Datos') Gestor_Final_Cierre,
					ISNULL(st.Nombre_Ejecutante,'Sin Datos') Nombre_Ejecutante,
					ISNULL(st.AF_BC_Ext,'') AF_BC_Ext,
					ISNULL(st.Nombre_Act_Ext,'') Nombre_Act_Ext,
					ISNULL(st.Marca_Act_Ext,'') Marca_Act_Ext,
					ISNULL(st.Modelo_Act_Ext,'') Modelo_Act_Ext,
					ISNULL(st.No_Serie_Act_Ext,'') No_Serie_Act_Ext,
					ISNULL((SELECT a.Desc_Motivo_Aparente FROM siga_cat_motivo_aparente a WHERE st.Id_Motivo_Aparente=a.Id_Motivo_Aparente),'Sin Datos')Id_Motivo_Aparente,
					(SELECT a.Desc_Motivo_Real FROM siga_cat_motivo_real a WHERE a.Id_Motivo_Real=st.Id_Motivo_Real) Id_Motivo_Real,
					ISNULL(st.Fech_Solicitud,'') Fech_Solicitud,
					ISNULL(st.Fech_Espera_Cierre,'') Fech_Espera_Cierre
				FROM siga_solicitud_tickets  ST 
					LEFT JOIN siga_cat_ticket_categoria SCMR 	ON ST.Id_Categoria=SCMR.Id_Categoria 
					LEFT JOIN siga_cat_ticket_subcategoria SCTS ON ST.Id_Subcategoria=SCTS.Id_Subcategoria 
					LEFT JOIN siga_catareas CA 					ON ST.Id_Area=CA.Id_Area 
					LEFT JOIN siga_activos A 						ON ST.Id_Activo=A.Id_Activo 
					LEFT JOIN siga_cat_ubic_prim UP 		ON A.Id_Ubic_Prim=UP.Id_Ubic_Prim 
					LEFT JOIN siga_cat_ubic_sec US 			ON A.Id_Ubic_Sec=US.Id_Ubic_Sec 
					LEFT JOIN siga_usuarios Usr 				ON ST.Id_Gestor_Reasignado=Usr.Id_Usuario 
				WHERE 	ST.Estatus_Reg <> '3' 
				AND 	ST.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
				AND 	".$Id_Categoria.$Id_Subcategoria.$seccion_y_Gestor." 
		";
		if($Nombre_Grafica=="Por_Categoria_y_Subcategoria"){
			$sql.="	
				FORMAT(ST.Fech_Solicitud  ,'dd/MM/yyyy') 
			";
		}
		
		if($Nombre_Grafica=="grafica_por_gestor"){
			$sql.="	
				ST.Estatus_Proceso=4 and
				FORMAT(ST.Fech_Cierre  ,'dd/MM/yyyy') 
			";
		}
		$sql.="
			between convert(date,'".$Fecha_Inicial."') and convert(date,'".$Fecha_Final."')
		) siga_solicitud_tickets	
		";
		
		if($Nombre_Grafica=="grafica_por_gestor"){
			$sql.="
				where 
			";
			
			if($Tipo_Calificacion==0){
				$sql.="
					Solucion_Ofrecida=".$Calificacion." 
				";
			}
			
			if($Tipo_Calificacion==1){
				$sql.="
					Actitud_Solucion=".$Calificacion." 
				";
			}
			
			if($Tipo_Calificacion==2){
				$sql.="
					Tiempo_Respuesta=".$Calificacion." 
				";
			}
		}
		
		//echo "<pre>";
		//echo $sql;
		//echo "</pre>";
	}
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Id_Solicitud" => $row["Id_Solicitud"],
          "Id_Usuario" => $row["Id_Usuario"],
					"Id_Area" => $row["Id_Area"],
					"Seccion" => $row["Seccion"],
					"Titulo" => $row["Titulo"],
					"Id_Categoria" => $row["Id_Categoria"],
					"Desc_Categoria" => $row["Desc_Categoria"],
					"Desc_Subcategoria"=> $row["Desc_Subcategoria"],
					"Desc_Motivo_Reporte" => $row["Desc_Motivo_Reporte"],
					"Prioridad" => $row["Prioridad"],
					"Desc_Prioridad"=> $row["Desc_Prioridad"],
					"Url_archivo" => rtrim(ltrim($row["Url_archivo"])),
					"Fecha" => $row["Fecha"],
					"Nom_Area" => $row["Nom_Area"],
					"Nombre_Usuario" => $row["Nombre_Usuario"],
					"Nombre_Seccion" => $row["Nombre_Seccion"],
					"Id_Gestor" => $row["Id_Gestor"],
					"Id_Gestor_Reasignado"=> $row["Id_Gestor_Reasignado"],
					"Gestor" => $row["Gestor"],
					"Estatus_Proceso" => $row["Estatus_Proceso"],
					"Id_Estatus_Proceso"=> $row["Id_Estatus_Proceso"],
					"TituloCierre"=> $row["TituloCierre"],
					"ComentarioCierre"=> $row["ComentarioCierre"],
					"Activo"=> $row["Activo"],
					"Id_Activo"=>$row["Id_Activo"],
					"Asist_Especial"=>$row["Asist_Especial"],
					"A_Especial"=>$row["A_Especial"],
					"Nom_usr_reasignado"=>$row["Nom_usr_reasignado"],
					"Fecha_Seguimiento"=>$row["Fecha_Seguimiento"],
					"Fecha_Esp_Cierre"=>$row["Fecha_Esp_Cierre"],
					"Fecha_Cierre"=>$row["Fecha_Cierre"],
					"Fecha_Solicitud"=>$row["Fecha_Solicitud"],
					"Id_Actividad"=>rtrim(ltrim($row["Id_Actividad"])),
					"Solucion_Ofrecida"=>$row["Solucion_Ofrecida"],
					"Actitud_Solucion"=>$row["Actitud_Solucion"],
					"Tiempo_Respuesta"=>$row["Tiempo_Respuesta"],
					"Desc_Ubic_Prim"=>$row["Desc_Ubic_Prim"],
					"Desc_Ubic_Sec"=>$row["Desc_Ubic_Sec"],
					"Desc_Estatus"=>$row["Desc_Estatus"],
					"Id_Usuario_Inicial"=>$row["Id_Usuario_Inicial"],
					"usuario_final" => $row["usuario_final"],
					"Lo_Realiza" => $row["Lo_Realiza"],
					"Gestor_Final_Cierre" => $row["Gestor_Final_Cierre"],
					"Nombre_Ejecutante" => $row["Nombre_Ejecutante"],
					"AF_BC_Ext" => $row["AF_BC_Ext"],
					"Nombre_Act_Ext" => $row["Nombre_Act_Ext"],
					"Marca_Act_Ext" => $row["Marca_Act_Ext"],
					"Modelo_Act_Ext" => $row["Modelo_Act_Ext"],
					"No_Serie_Act_Ext" => $row["No_Serie_Act_Ext"],
					"Id_Motivo_Aparente" => $row["Id_Motivo_Aparente"],
					"Id_Motivo_Real" => $row["Id_Motivo_Real"],
					"Fech_Solicitud" => $row["Fech_Solicitud"],
					"Fech_Espera_Cierre" => $row["Fech_Espera_Cierre"]

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

//Funcion grafica por reparto
public function selectSiga_x_reparto($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final,$proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	
	$Data_Anio = array();
	$Data_Anio_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$seccion_y_Gestor="";
	$seccion_y_Gestor_2="";
	
	if($Siga_solicitud_ticketsDto->getSeccion()!=""&&$Siga_solicitud_ticketsDto->getSeccion()!="-1"){
		$seccion_y_Gestor.=" S.Seccion=".$Siga_solicitud_ticketsDto->getSeccion()." and ";
		$seccion_y_Gestor_2.=" and Seccion=".$Siga_solicitud_ticketsDto->getSeccion();
	}
	
	if($Siga_solicitud_ticketsDto->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto->getId_Gestor()!="-1"){
		$seccion_y_Gestor.=" S.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." and ";
		$seccion_y_Gestor_2.=" and Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor();
	}
	
	
	$sql="
		SELECT S.Id_Gestor, U.Nombre_Usuario, COUNT(Id_Gestor) as Total, 
		(select COUNT(Id_Gestor) as Total_Reasignados from siga_solicitud_tickets where Id_Gestor_Reasignado is not null and Id_Gestor=S.Id_Gestor and Id_Gestor_Reasignado=S.Id_Gestor) as Total_Reasignados,
		(select COUNT(Id_Gestor) as Total_Seguimiento from siga_solicitud_tickets where  Id_Gestor=S.Id_Gestor and  Estatus_Reg<>'3' and Estatus_Proceso=2 and FORMAT(Fech_Solicitud,'dd/MM/yyyy') BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')".$seccion_y_Gestor_2.")as Total_Seguimiento,
		(select COUNT(Id_Gestor) as Total_Por_Calificar from siga_solicitud_tickets where  Id_Gestor=S.Id_Gestor and  Estatus_Reg<>'3' and Estatus_Proceso=3 and FORMAT(Fech_Solicitud,'dd/MM/yyyy') BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')".$seccion_y_Gestor_2.")as Total_Por_Calificar
		FROM siga_solicitud_tickets S
		left join siga_usuarios U on S.Id_Gestor=U.Id_Usuario
		where S.Id_Gestor is not null and S.Id_Gestor<>''
		and S.Estatus_Reg <> '3' and S.Estatus_Proceso='4' and S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor."
		FORMAT(Fech_Solicitud  ,'dd/MM/yyyy')
		BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
		GROUP BY Id_Gestor, Nombre_Usuario
		HAVING count( Id_Gestor ) >0
	";
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data_Calif = array();
				$Data_Envia_Calif = array();
				$Promedio_General=0;
				$Solucion_Ofrecida_Promedio=0;
				$Actitud_Servicio_Promedio=0;
				$Tiempo_Respuesta_Promedio=0;
				$proveedor_calif = new Proveedor('sqlserver', 'activos');
				$proveedor_calif->connect();
				
				$sql_calif="
					SELECT S.Id_Solicitud, Id_Pregunta1, 
					case 
					when Id_Respuesta1=1 then 10 
					when Id_Respuesta1=2 then 8
					when Id_Respuesta1=3 then 6
					when Id_Respuesta1=4 then 4
					when Id_Respuesta1=5 then 2
					end as Id_Respuesta1,
					Desc_Comentario1 , Id_Pregunta2, 
					case 
					when Id_Respuesta2=1 then 10 
					when Id_Respuesta2=2 then 8
					when Id_Respuesta2=3 then 6
					when Id_Respuesta2=4 then 4
					when Id_Respuesta2=5 then 2
					end as Id_Respuesta2, Desc_Comentario2, Id_Pregunta3, 
					case 
					when Id_Respuesta3=1 then 10 
					when Id_Respuesta3=2 then 8
					when Id_Respuesta3=3 then 6
					when Id_Respuesta3=4 then 4
					when Id_Respuesta3=5 then 2
					end as Id_Respuesta3,
					Desc_Comentario3
					FROM siga_solicitud_tickets S
					left join siga_ticket_calificacion T on S.Id_Solicitud=T.Id_Solicitud
					where S.Id_Gestor is not null and S.Id_Gestor<>''
					and S.Estatus_Reg <> '3' and S.Estatus_Proceso='4' and S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor."
					FORMAT(Fech_Solicitud  ,'dd/MM/yyyy') BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
					and Id_Gestor='".$row["Id_Gestor"]."'
				";
				$proveedor_calif->execute($sql_calif);
				if (!$proveedor_calif->error()){
					if ($proveedor_calif->rows($proveedor_calif->stmt) > 0) {
						while ($row_c = $proveedor_calif->fetch_array($proveedor_calif->stmt, 0)) {
							$Promedio=($row_c["Id_Respuesta1"]+$row_c["Id_Respuesta2"]+$row_c["Id_Respuesta3"])/3;
							$Promedio_General=$Promedio_General+$Promedio;
							$Solucion_Ofrecida_Promedio=$row_c["Id_Respuesta1"]+$Solucion_Ofrecida_Promedio;
							$Actitud_Servicio_Promedio=$row_c["Id_Respuesta2"]+$Actitud_Servicio_Promedio;
							$Tiempo_Respuesta_Promedio=$row_c["Id_Respuesta3"]+$Tiempo_Respuesta_Promedio;
							$Data_Calif= array(
								"Id_Solicitud" => $row_c["Id_Solicitud"],
								"Id_Pregunta1" => $row_c["Id_Pregunta1"],
								"Id_Respuesta1" => $row_c["Id_Respuesta1"],
								"Desc_Comentario1" => $row_c["Desc_Comentario1"],
								"Id_Pregunta2" => $row_c["Id_Pregunta2"],
								"Id_Respuesta2" => $row_c["Id_Respuesta2"],
								"Desc_Comentario2" => $row_c["Desc_Comentario2"],
								"Id_Pregunta3" => $row_c["Id_Pregunta3"],
								"Id_Respuesta3" => $row_c["Id_Respuesta3"],
								"Desc_Comentario3" => $row_c["Desc_Comentario3"],
								"Promedio"=>$Promedio
							);
							array_push($Data_Envia_Calif, $Data_Calif);
						}
					}	
				}
				$proveedor_calif->close();
				
				
				$Total=$row["Total"]+$Total;
				$Data= array(
					"sql"=>$sql,
					"Id_Gestor" => $row["Id_Gestor"],
					"Nombre_Usuario" => $row["Nombre_Usuario"],
					"Total" => $row["Total"],
					"Total_Reasignados" => $row["Total_Reasignados"],
					"Total_Seguimiento" => $row["Total_Seguimiento"],
					"Total_Por_Calificar" => $row["Total_Por_Calificar"],
					"Detalle_Calif" => $Data_Envia_Calif,
					"totalCount" =>count($Data_Envia_Calif),
					"Promedio_General"=>$Promedio_General/count($Data_Envia_Calif),
					"Solucion_Ofrecida_Promedio"=>$Solucion_Ofrecida_Promedio/count($Data_Envia_Calif),
					"Actitud_Servicio_Promedio"=>$Actitud_Servicio_Promedio/count($Data_Envia_Calif),
					"Tiempo_Respuesta_Promedio"=>$Tiempo_Respuesta_Promedio/count($Data_Envia_Calif)
				);
				array_push($Data_Envia, $Data);
				
			}
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"Total"=>$Total, "data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}

public function selectgrafica_calif_gestor($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final,$proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	
	$Data_Anio = array();
	$Data_Anio_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$seccion_y_Gestor="";
	$seccion_y_Gestor_2="";
	
	if($Siga_solicitud_ticketsDto->getSeccion()!=""&&$Siga_solicitud_ticketsDto->getSeccion()!="-1"){
		$seccion_y_Gestor.=" S.Seccion=".$Siga_solicitud_ticketsDto->getSeccion()." and ";
	}
	
	if($Siga_solicitud_ticketsDto->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto->getId_Gestor()!="-1"){
		$seccion_y_Gestor.=" S.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." and ";
	}
	
	
	$sql="
		select * from (
		select 
			S.Id_Solicitud,Fech_Cierre ,
			(select top 1 Id_Respuesta1 from siga_ticket_calificacion where Id_Solicitud=S.Id_Solicitud order by Fech_Inser desc) as Solucion_Ofrecida,
			(select top 1 Id_Respuesta2 from siga_ticket_calificacion where Id_Solicitud=S.Id_Solicitud order by Fech_Inser desc) as Actitud_Solucion,
			(select top 1 Id_Respuesta3 from siga_ticket_calificacion where Id_Solicitud=S.Id_Solicitud order by Fech_Inser desc) as Tiempo_Respuesta
		from 
			siga_solicitud_tickets S 
		where 
			FORMAT(Fech_Cierre  ,'dd/MM/yyyy')
			BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."') and ".$seccion_y_Gestor."
			S.Id_Gestor is not null and S.Id_Gestor<>''
			and S.Estatus_Reg <> '3' and S.Estatus_Proceso='4' and S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' 
		) siga_solicitud_ticket
	";
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			$Total_Excelente=0;
			$Total_Muy_Bien=0;
			$Total_Bien=0;
			$Total_Malo=0;
			$Total_Muy_Malo=0;
			
			
			$Solucion_Ofrecida_Excelente=0;
			$Solucion_Ofrecida_Muy_Bien=0;
			$Solucion_Ofrecida_Bien=0;
			$Solucion_Ofrecida_Malo=0;
			$Solucion_Ofrecida_Muy_Malo=0;
			
			$Actitud_Solucion_Excelente=0;
			$Actitud_Solucion_Muy_Bien=0;
			$Actitud_Solucion_Bien=0;
			$Actitud_Solucion_Malo=0;
			$Actitud_Solucion_Muy_Malo=0;
			
			$Tiempo_Respuesta_Excelente=0;
			$Tiempo_Respuesta_Muy_Bien=0;
			$Tiempo_Respuesta_Bien=0;
			$Tiempo_Respuesta_Malo=0;
			$Tiempo_Respuesta_Muy_Malo=0;		
				
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				if($row["Solucion_Ofrecida"]==1){$Solucion_Ofrecida_Excelente=$Solucion_Ofrecida_Excelente+1;}
				if($row["Solucion_Ofrecida"]==2){$Solucion_Ofrecida_Muy_Bien=$Solucion_Ofrecida_Muy_Bien+1;}
				if($row["Solucion_Ofrecida"]==3){$Solucion_Ofrecida_Bien=$Solucion_Ofrecida_Bien+1;}
				if($row["Solucion_Ofrecida"]==4){$Solucion_Ofrecida_Malo=$Solucion_Ofrecida_Malo+1;}
				if($row["Solucion_Ofrecida"]==5){$Solucion_Ofrecida_Muy_Malo=$Solucion_Ofrecida_Muy_Malo+1;}
				
				if($row["Actitud_Solucion"]==1){$Actitud_Solucion_Excelente=$Actitud_Solucion_Excelente+1;}
				if($row["Actitud_Solucion"]==2){$Actitud_Solucion_Muy_Bien=$Actitud_Solucion_Muy_Bien+1;}
				if($row["Actitud_Solucion"]==3){$Actitud_Solucion_Bien=$Actitud_Solucion_Bien+1;}
				if($row["Actitud_Solucion"]==4){$Actitud_Solucion_Malo=$Actitud_Solucion_Malo+1;}
				if($row["Actitud_Solucion"]==5){$Actitud_Solucion_Muy_Malo=$Actitud_Solucion_Muy_Malo+1;}
				
				if($row["Tiempo_Respuesta"]==1){$Tiempo_Respuesta_Excelente=$Tiempo_Respuesta_Excelente+1;}
				if($row["Tiempo_Respuesta"]==2){$Tiempo_Respuesta_Muy_Bien=$Tiempo_Respuesta_Muy_Bien+1;}
				if($row["Tiempo_Respuesta"]==3){$Tiempo_Respuesta_Bien=$Tiempo_Respuesta_Bien+1;}
				if($row["Tiempo_Respuesta"]==4){$Tiempo_Respuesta_Malo=$Tiempo_Respuesta_Malo+1;}
				if($row["Tiempo_Respuesta"]==5){$Tiempo_Respuesta_Muy_Malo=$Tiempo_Respuesta_Muy_Malo+1;}
			}
			
			$Total_Excelente=$Solucion_Ofrecida_Excelente+$Actitud_Solucion_Excelente+$Tiempo_Respuesta_Excelente;
			$Total_Muy_Bien=$Solucion_Ofrecida_Muy_Bien+$Actitud_Solucion_Muy_Bien+$Tiempo_Respuesta_Muy_Bien;
			$Total_Bien=$Solucion_Ofrecida_Bien+$Actitud_Solucion_Bien+$Tiempo_Respuesta_Bien;
			$Total_Malo=$Solucion_Ofrecida_Malo+$Actitud_Solucion_Malo+$Tiempo_Respuesta_Malo;
			$Total_Muy_Malo=$Solucion_Ofrecida_Muy_Malo+$Actitud_Solucion_Muy_Malo+$Tiempo_Respuesta_Muy_Malo;
			
			$Data= array(
				
				"Solucion_Ofrecida_Excelente" => $Solucion_Ofrecida_Excelente,
				"Solucion_Ofrecida_Muy_Bien" => $Solucion_Ofrecida_Muy_Bien,
				"Solucion_Ofrecida_Bien" => $Solucion_Ofrecida_Bien,
				"Solucion_Ofrecida_Malo" => $Solucion_Ofrecida_Malo,
				"Solucion_Ofrecida_Muy_Malo" => $Solucion_Ofrecida_Muy_Malo,
				"Actitud_Solucion_Excelente" => $Actitud_Solucion_Excelente,
				"Actitud_Solucion_Muy_Bien" => $Actitud_Solucion_Muy_Bien,
				"Actitud_Solucion_Bien" => $Actitud_Solucion_Bien,
				"Actitud_Solucion_Malo" => $Actitud_Solucion_Malo,
				"Actitud_Solucion_Muy_Malo" => $Actitud_Solucion_Muy_Malo,
				"Tiempo_Respuesta_Excelente" => $Tiempo_Respuesta_Excelente,
				"Tiempo_Respuesta_Muy_Bien" => $Tiempo_Respuesta_Muy_Bien,
				"Tiempo_Respuesta_Bien" => $Tiempo_Respuesta_Bien,
				"Tiempo_Respuesta_Malo" => $Tiempo_Respuesta_Malo,
				"Tiempo_Respuesta_Muy_Malo" => $Tiempo_Respuesta_Muy_Malo,
				
				"Total_Excelente" => $Total_Excelente,
				"Total_Muy_Bien" => $Total_Muy_Bien,
				"Total_Bien" => $Total_Bien,
				"Total_Malo" => $Total_Malo,
				"Total_Muy_Malo" => $Total_Muy_Malo
				
			);
			array_push($Data_Envia, $Data);
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia), "data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}


public function selectreporte_por_reparto($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final,$proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	
	$Data_Anio = array();
	$Data_Anio_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$seccion_y_Gestor="";
	$seccion_y_Gestor_2="";
	
	if($Siga_solicitud_ticketsDto->getSeccion()!=""&&$Siga_solicitud_ticketsDto->getSeccion()!="-1"){
		$seccion_y_Gestor.=" S.Seccion=".$Siga_solicitud_ticketsDto->getSeccion()." and ";
		$seccion_y_Gestor_2.=" and Seccion=".$Siga_solicitud_ticketsDto->getSeccion();
	}
	
	if($Siga_solicitud_ticketsDto->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto->getId_Gestor()!="-1"){
		$seccion_y_Gestor.=" S.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." and ";
		$seccion_y_Gestor_2.=" and Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor();
	}
	
	
	$sql="
		SELECT S.Id_Gestor, U.Nombre_Usuario, COUNT(Id_Gestor) as Total, 
		(select COUNT(Id_Gestor) as Total_Reasignados from siga_solicitud_tickets where Id_Gestor_Reasignado is not null and Id_Gestor=S.Id_Gestor and Id_Gestor_Reasignado=S.Id_Gestor) as Total_Reasignados,
		(select COUNT(Id_Gestor) as Total_Seguimiento from siga_solicitud_tickets where  Id_Gestor=S.Id_Gestor and  Estatus_Reg<>'3' and Estatus_Proceso=2 and FORMAT(Fech_Solicitud,'dd/MM/yyyy') BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')".$seccion_y_Gestor_2.")as Total_Seguimiento,
		(select COUNT(Id_Gestor) as Total_Por_Calificar from siga_solicitud_tickets where  Id_Gestor=S.Id_Gestor and  Estatus_Reg<>'3' and Estatus_Proceso=3 and FORMAT(Fech_Solicitud,'dd/MM/yyyy') BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')".$seccion_y_Gestor_2.")as Total_Por_Calificar
		FROM siga_solicitud_tickets S
		left join siga_usuarios U on S.Id_Gestor=U.Id_Usuario
		where S.Id_Gestor is not null and S.Id_Gestor<>''
		and S.Estatus_Reg <> '3' and S.Estatus_Proceso='4' and S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor."
		FORMAT(Fech_Cierre  ,'dd/MM/yyyy')
		BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
		GROUP BY Id_Gestor, Nombre_Usuario
		HAVING count( Id_Gestor ) >0
	";
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				
				$Total=$row["Total"]+$Total;
				$Data= array(
					"Id_Gestor" => $row["Id_Gestor"],
					"Nombre_Usuario" => $row["Nombre_Usuario"],
					"Total" => $row["Total"],
					"Total_Reasignados" => $row["Total_Reasignados"],
					"Total_Seguimiento" => $row["Total_Seguimiento"],
					"Total_Por_Calificar" => $row["Total_Por_Calificar"]
				);
				array_push($Data_Envia, $Data);
				
			}
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"Total"=>$Total, "data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}


public function selectSiga_x_gestor_detalle($Siga_solicitud_ticketsDto,$Fecha_Inicial,$Fecha_Final,$proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	
	$Data_Anio = array();
	$Data_Anio_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$seccion_y_Gestor="";
	
	if($Siga_solicitud_ticketsDto->getSeccion()!=""&&$Siga_solicitud_ticketsDto->getSeccion()!="-1"){
		$seccion_y_Gestor.=" S.Seccion=".$Siga_solicitud_ticketsDto->getSeccion()." and ";
	}
	
	if($Siga_solicitud_ticketsDto->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto->getId_Gestor()!="-1"){
		$seccion_y_Gestor.=" S.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." and ";
	}
	
	
	$sql="
		SELECT S.Id_Usuario, U.Nombre_Usuario, COUNT(S.Id_Usuario) as Total
		FROM siga_solicitud_tickets S 
		left join siga_usuarios U on S.Id_Usuario=U.Id_Usuario 
		where S.Id_Gestor is not null and S.Id_Gestor<>''
		and S.Estatus_Reg <> '3' and S.Estatus_Proceso='4' and S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor."
		FORMAT(Fech_Solicitud  ,'dd/MM/yyyy') BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
		GROUP BY S.Id_Usuario, Nombre_Usuario 
		HAVING count( S.Id_Usuario ) >0 
	";
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				$Data_Det = array();
				$Data_Detalle = array();
				
				$proveedor_calif = new Proveedor('sqlserver', 'activos');
				$proveedor_calif->connect();
				
				$sql_calif="
					select S.Id_Solicitud,S.Id_Gestor,S.Titulo,S.Desc_Motivo_Reporte,SECC.Desc_Seccion,CAT.Desc_Categoria,CS.Desc_Subcategoria,FORMAT(S.Fech_Solicitud,'dd/MM/yyyy hh:mm:ss') as Fecha_Solicitud,FORMAT(S.Fech_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Cierre, 
					T.Id_Pregunta1, 
					case 
					when T.Id_Respuesta1=1 then 10 
					when T.Id_Respuesta1=2 then 8
					when T.Id_Respuesta1=3 then 6
					when T.Id_Respuesta1=4 then 4
					when T.Id_Respuesta1=5 then 2
					end as Id_Respuesta1,
					T.Desc_Comentario1 , T.Id_Pregunta2, 
					case 
					when T.Id_Respuesta2=1 then 10 
					when T.Id_Respuesta2=2 then 8
					when T.Id_Respuesta2=3 then 6
					when T.Id_Respuesta2=4 then 4
					when T.Id_Respuesta2=5 then 2
					end as Id_Respuesta2, T.Desc_Comentario2, T.Id_Pregunta3, 
					case 
					when T.Id_Respuesta3=1 then 10 
					when T.Id_Respuesta3=2 then 8
					when T.Id_Respuesta3=3 then 6
					when T.Id_Respuesta3=4 then 4
					when T.Id_Respuesta3=5 then 2
					end as Id_Respuesta3,
					T.Desc_Comentario3
					from siga_solicitud_tickets S
					left join siga_cat_ticket_categoria CAT on S.Id_Categoria=CAT.Id_Categoria
					left join siga_cat_ticket_subcategoria CS on S.Id_Subcategoria=CS.Id_Subcategoria
					left join siga_cat_ticket_seccion SECC on S.Seccion=SECC.Id_Seccion
					left join siga_ticket_calificacion T on S.Id_Solicitud=T.Id_Solicitud
					where S.Id_Gestor is not null and S.Id_Gestor<>''
					and S.Estatus_Reg <> '3' and S.Estatus_Proceso='4' and S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor."
					FORMAT(Fech_Solicitud  ,'dd/MM/yyyy') 
					BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
					and Id_Usuario='".$row["Id_Usuario"]."'
				";
				
				$proveedor_calif->execute($sql_calif);
				if (!$proveedor_calif->error()){
					if ($proveedor_calif->rows($proveedor_calif->stmt) > 0) {
						while ($row_c = $proveedor_calif->fetch_array($proveedor_calif->stmt, 0)) {
							
							$Data_Det= array(
								"Id_Solicitud" => $row_c["Id_Solicitud"],
								"Id_Gestor" => $row_c["Id_Gestor"],
								"Titulo" => $row_c["Titulo"],
								"Desc_Motivo_Reporte" => $row_c["Desc_Motivo_Reporte"],
								"Desc_Seccion" => $row_c["Desc_Seccion"],
								"Desc_Categoria" => $row_c["Desc_Categoria"],
								"Desc_Subcategoria" => $row_c["Desc_Subcategoria"],
								"Fecha_Solicitud" => $row_c["Fecha_Solicitud"],
								"Fecha_Cierre" => $row_c["Fecha_Cierre"],
								"Id_Pregunta1" => $row_c["Id_Pregunta1"],
								"Id_Respuesta1" => $row_c["Id_Respuesta1"],
								"Desc_Comentario1" => $row_c["Desc_Comentario1"],
								"Id_Pregunta2" => $row_c["Id_Pregunta2"],
								"Id_Respuesta2" => $row_c["Id_Respuesta2"],
								"Desc_Comentario2" => $row_c["Desc_Comentario2"],
								"Id_Pregunta3" => $row_c["Id_Pregunta3"],
								"Id_Respuesta3" => $row_c["Id_Respuesta3"],
								"Desc_Comentario3" => $row_c["Desc_Comentario3"]
							);
							array_push($Data_Detalle, $Data_Det);
						}
					}	
				}
				$proveedor_calif->close();
				
				
				$Data= array(
					"Id_Usuario" => $row["Id_Usuario"],
					"Nombre_Usuario" => $row["Nombre_Usuario"],
					"Total" => $row["Total"],
					"Detalle" => $Data_Detalle,
					"totalCount" =>count($Data_Detalle)
					);
				array_push($Data_Envia, $Data);
				
			}
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia), "data" => $Data_Envia,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}


public function Cambiar_lo_Realiza($Siga_solicitud_ticketsDto, $proveedor=null){
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$Lo_Realiza=$Siga_solicitud_ticketsDto->getLo_Realiza();

	if($Siga_solicitud_ticketsDto->getId_Solicitud()!=""&&$Siga_solicitud_ticketsDto->getLo_Realiza()!=""){
		$sql="
			update siga_solicitud_tickets set Lo_Realiza='".$Siga_solicitud_ticketsDto->getLo_Realiza()."' where Id_Solicitud=".$Siga_solicitud_ticketsDto->getId_Solicitud()."
		";
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			$proveedor_exis_act = new Proveedor('sqlserver', 'activos');
			$proveedor_exis_act->connect();
			
			$sql_exis_act="select * from siga_solicitud_tickets where Id_Solicitud=".$Siga_solicitud_ticketsDto->getId_Solicitud()." ";
			
			
			$proveedor_exis_act->execute($sql_exis_act);
			
			if (!$proveedor_exis_act->error()){
				if ($proveedor_exis_act->rows($proveedor_exis_act->stmt) > 0) {
					while ($row = $proveedor_exis_act->fetch_array($proveedor_exis_act->stmt, 0)) {
						$Id_Actividad=$row["Id_Actividad"];
						if($Id_Actividad!=""&&$Id_Actividad!="0"){
							$proveedor_cambio_real_activ = new Proveedor('sqlserver', 'activos');
							$proveedor_cambio_real_activ->connect();
			
							$sql_cambio_real_activ="
								update siga_actividades set Realiza=".$Lo_Realiza." where Id_Actividad=".$Id_Actividad."
							";
							
							$proveedor_cambio_real_activ->execute($sql_cambio_real_activ);
							if (!$proveedor_cambio_real_activ->error()){
							}else{
								$error=true;
							}
							
							$proveedor_cambio_real_activ->close();
						}
					}
				}	
			}	
			
			$proveedor_exis_act->close();
		}else{
			$error=true;
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Registros Actualizado Correctamente");
	}else{
		$respuesta = array("totalCount" => "0","estatus" => "error", "mensaje" => "Ocurrio un error al Actualizar");
	}
	
	return $respuesta;
}



public function Cancelar_Solicitud($Siga_solicitud_ticketsDto, $Motivo_Cancelacion, $Id_Cirugia, $proveedor=null){
	$Usr_Inser=$Siga_solicitud_ticketsDto->getUsr_Inser();
	$respuesta = array();
	$error=false;
	
	$proveedor_trans = new Proveedor('sqlserver', 'activos');
	$proveedor_trans->connect();
	$proveedor_trans->beginTransaction();
	
	if($Siga_solicitud_ticketsDto->getId_Solicitud()!=""){
		$proveedor = new Proveedor('sqlserver', 'activos');
		$proveedor->connect();
	
		$sql="
			insert into siga_motivo_cancelacion (Id_Solicitud, Desc_Motivio_Cancelacion, Fech_Inser, Usr_Inser, Estatus_Reg)
			values (".$Siga_solicitud_ticketsDto->getId_Solicitud().", '".$Motivo_Cancelacion."', getdate(), '".$Siga_solicitud_ticketsDto->getUsr_Inser()."', 1)
		";
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			//Cambia de Estatus al Ticket 
			$proveedor_solic = new Proveedor('sqlserver', 'activos');
			$proveedor_solic->connect();
		
			$sql="
				update siga_solicitud_tickets set Estatus_Reg=3, Usr_Mod=".$Siga_solicitud_ticketsDto->getUsr_Inser().", Fech_Mod=getdate()
				where Id_Solicitud=".$Siga_solicitud_ticketsDto->getId_Solicitud()." 
			";
			$proveedor_solic->execute($sql);
			if (!$proveedor_solic->error()){
				if($Id_Cirugia!=""){
					if($Usr_Inser!=""){
						$proveedorusr = new Proveedor('sqlserver', 'activos');
						$proveedorusr->connect();
						$sql="
							select (select top 1 usuario_sistema_hospitalario from empleados_chs where siga_usuarios.No_Usuario=empleados_chs.num_empleado) as usuario_assist 
							from siga_usuarios 
							where Id_Usuario=".$Usr_Inser."
						";
						
						$proveedorusr->execute($sql);
						
						if (!$proveedorusr->error()){
							//La posicion cero no se toma
							if ($proveedorusr->rows($proveedorusr->stmt) > 0) {
								while ($row_c = $proveedorusr->fetch_array($proveedorusr->stmt, 0)) {
									$usuario_assist=$row_c["usuario_assist"];
									$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_solicitud_ticketsDto->getId_Solicitud().'&tab=1">'.$Siga_solicitud_ticketsDto->getId_Solicitud().'</a>/Ticket Cancelado/'.$Motivo_Cancelacion;
									$this->insert_gtiqx($Id_Cirugia, $comentario, $usuario_assist, "N");	
								}
							}	
						}
					}
				}
				
				
				if($Siga_solicitud_ticketsDto->getId_Actividad()!=""){
					$proveedor_det_act = new Proveedor('sqlserver', 'activos');
					$proveedor_det_act->connect();
				
					$sql="
						update siga_det_actividades set Estatus_Reg=3, Usr_Mod=".$Siga_solicitud_ticketsDto->getUsr_Inser().", Fech_Mod=getdate()
						where Id_Actividad=".$Siga_solicitud_ticketsDto->getId_Actividad()." 
					";
					$proveedor_det_act->execute($sql);
					if (!$proveedor_det_act->error()){
						$proveedor_act = new Proveedor('sqlserver', 'activos');
						$proveedor_act->connect();
					
						$sql="
							update siga_actividades set Estatus_Reg=3, Usr_Mod=".$Siga_solicitud_ticketsDto->getUsr_Inser().", Fech_Mod=getdate()
							where Id_Actividad=".$Siga_solicitud_ticketsDto->getId_Actividad()." 
						";
						$proveedor_act->execute($sql);
						if (!$proveedor_act->error()){
							
						}else{
							$error=true;
						}	
						$proveedor_act->close();
						
					}else{
						$error=true;
					}
					
					$proveedor_det_act->close();
				}
				
			}else{
				$error=true;
			}
			$proveedor_solic->close();
			//
			
			
			
		}else{
			$error=true;
		}
		$proveedor->close();
	}else{
		$error=true;
	}
	
	
	if($error==false){
		$proveedor_trans->commit();
		$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Registros Actualizado Correctamente");
	}else{
		$proveedor_trans->rollback();
		$respuesta = array("totalCount" => "0","estatus" => "error", "mensaje" => "Ocurrio un error al Actualizar");
	}
	
	return $respuesta;
}

public function Buscar_Cancelados($Id_Solicitud, $proveedor=null){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	if($Id_Solicitud!=""){
		$sql="
			select * from siga_motivo_cancelacion where Id_Solicitud=".$Id_Solicitud."
		";
	}
	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Id_Motivo_Cancelacion"=>$row_c["Id_Motivo_Cancelacion"],
					"Id_Solicitud"=>$row_c["Id_Solicitud"],
					"Desc_Motivio_Cancelacion" => $row_c["Desc_Motivio_Cancelacion"],
					"Fech_Inser"=>$row_c["Fech_Inser"],
					"Usr_Inser"=>$row_c["Usr_Inser"],
					"Fech_Mod" => $row_c["Fech_Mod"],
					"Usr_Mod"=>$row_c["Usr_Mod"],
					"Estatus_Reg"=>$row_c["Estatus_Reg"]
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

public function cmb_empresas_gtiqx(){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select distinct Empresa_Ext
		from siga_solicitud_tickets st
		left outer join siga_cancelacion_nota_salida cn on st.Id_Solicitud=cn.Id_Solicitud and cn.Estatus_Reg<>3 
		where st.Estatus_Proceso=4 and st.Estatus_Reg <>3 and st.Id_Cirugia is not null and cn.Id_Cancelacion_Nota is null and st.Empresa_Ext != ''
		and st.Estatus_Recepcion=1  and st.Id_Solicitud not in(select distinct Id_solicitud_DNS from siga_det_nota_salida left join siga_nota_salida on siga_det_nota_salida.Id_Nota_Salida_DNS=siga_nota_salida.Id_Nota_Salida
		where Id_solicitud_DNS is not null and Tipo_Solicitud=1 and siga_nota_salida.Estatus_Reg<>3 and  Nota_Duplicada <>1)
	";
	
	// se agrego a la sentencia línea 1646 and st.Empresa_Ext != '' al final 
	// Ing. Alejandro Arias
	// 19 de diciembre, 2023
	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Empresa_Ext"=>$row_c["Empresa_Ext"]
					
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


public function accesorios_act_ext_nota_salida($Id_Solicitud){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select 
			Cantidad_DNS, Unidad_DNS, Marca_DNS, Modelo_DNS, Descripcion_DNS, No_Serie_DNS from siga_det_nota_salida 
		where 
			Id_Solicitud_DNS=".$Id_Solicitud." 
			and 
			Estatus_Reg_DNS<>3
	";
	
	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Cantidad_DNS"=>$row_c["Cantidad_DNS"],
					"Unidad_DNS"=>$row_c["Unidad_DNS"],
					"Marca_DNS"=>$row_c["Marca_DNS"],
					"Modelo_DNS"=>$row_c["Modelo_DNS"],
					"Descripcion_DNS"=>$row_c["Descripcion_DNS"],
					"No_Serie_DNS"=>$row_c["No_Serie_DNS"]
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


public function accesorios_act_ext_mesa_ayuda($Id_Solicitud){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select 
			Cantidad_Ext, 'ACC' as Unidad_Ext, Marca_Ext, Modelo_Ext, Nombre_Ext, No_Serie_Ext 
		from 
			siga_det_accesorios_act_ext 
		where 
			Id_Solicitud_Ext=".$Id_Solicitud."  
			and 
			Estatus_Reg_Ext<>3
	";
	
	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Cantidad_Ext"=>$row_c["Cantidad_Ext"],
					"Unidad_Ext"=>$row_c["Unidad_Ext"],
					"Marca_Ext"=>$row_c["Marca_Ext"],
					"Modelo_Ext"=>$row_c["Modelo_Ext"],
					"Nombre_Ext"=>$row_c["Nombre_Ext"],
					"No_Serie_Ext"=>$row_c["No_Serie_Ext"]
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


public function cmb_motivo_rechazo(){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select * from siga_cat_motivo_rechazo where Estatus_Reg<>3
	";
	
	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Id_Motivo_Rechazo"=>$row_c["Id_Motivo_Rechazo"],
					"Desc_Motivo_Rechazo"=>$row_c["Desc_Motivo_Rechazo"]
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

public function Cambiar_Area($Siga_solicitud_ticketsDto, $proveedor=null){
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$Id_Area=$Siga_solicitud_ticketsDto->getId_Area();
	$Seccion=$Siga_solicitud_ticketsDto->getSeccion();
	
	if($Id_Area!=""&&$Seccion!=""&&$Siga_solicitud_ticketsDto->getId_Solicitud()!=""){
		$sql="
			update siga_solicitud_tickets set Estatus_Proceso=1, Id_Area='".$Id_Area."',Id_Categoria=null,Id_Subcategoria=null, Seccion='".$Seccion."', Id_Gestor=NULL, Fech_Seguimiento=NULL, Fech_Espera_Cierre=NULL, Fech_Cierre=NULL, Fech_Mod=getdate(),Usr_Mod=".$Siga_solicitud_ticketsDto->getUsr_Mod()."   where Id_Solicitud=".$Siga_solicitud_ticketsDto->getId_Solicitud()."
		";
		
		$proveedor->execute($sql);
		if (!$proveedor->error()){
			
		}else{
			$error=true;
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Registros Actualizado Correctamente");
	}else{
		$respuesta = array("totalCount" => "0","estatus" => "error", "mensaje" => "Ocurrio un error al Actualizar");
	}
	
	return $respuesta;
}


public function confirm_solic_firm_gesjur($Id_Solicitud, $Usr_Inser, $proveedor=null){
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		update siga_solicitud_tickets set Iniciar_SLA_Juridico=1, Fecha_Inicio_SLA_Juridico=getdate(), Usr_Inicia_SLA_Juridico='".$Usr_Inser."', Estatus_SLA='Play' where Id_Solicitud=".$Id_Solicitud."
	";

	$proveedor->execute($sql);
	if (!$proveedor->error()){
		
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Registro Actualizado Correctamente");
	}else{
		$respuesta = array("totalCount" => "0","estatus" => "error", "mensaje" => "Ocurrio un error al Actualizar");
	}
	
	return $respuesta;
}

public function Pausar_iniciar_SLA($Id_Solicitud, $Estatus_SLA, $Justificacion_Pausa_SLA, $Desc_Motivo_Pausa, $proveedor=null){
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		update 
			siga_solicitud_tickets 
		set 
				Fech_Pausa_Reactivacion_SLA=getdate(),
				Estatus_SLA='".$Estatus_SLA."'
	";
	
	if($Justificacion_Pausa_SLA!=""){
		$sql.="	
					,Justificacion_Pausa_SLA='".$Justificacion_Pausa_SLA."'
		";
	}
	
	if($Desc_Motivo_Pausa!=""){
		$sql.="	
					,Desc_Motivo_Pausa='".$Desc_Motivo_Pausa."'
		";
	}
	
	$sql.="
		where 
				Id_Solicitud=".$Id_Solicitud."
	";

	$proveedor->execute($sql);
	if (!$proveedor->error()){
		$Mail="";
		$Subject="";
		$Mensaje="";
		$Mensaje_Chat="";
		$Id_UsuarioGestor="";
		$Id_Estatus_Proceso="";
		//Obtengo Correo del Solicitante
		$proveedor_mail = new Proveedor('sqlserver', 'activos');
		$proveedor_mail->connect();
		$sql="
			select 
				case when (select top 1 email from empleados_chs  Modern_Spanish_CI_AS  where num_empleado=U.No_Usuario) is not NULL  then 
					(select top 1 email collate Modern_Spanish_CI_AS from empleados_chs  where num_empleado=U.No_Usuario)
				else
					U.Correo
				end as Mail,
				T.Id_Gestor,
				T.Estatus_Proceso
			from 
				siga_solicitud_tickets T
				left join siga_usuarios U on T.Id_Usuario=U.Id_Usuario
			where Id_Solicitud=".$Id_Solicitud."
		";
		$proveedor_mail->execute($sql);
		if (!$proveedor_mail->error()){
			if ($proveedor_mail->rows($proveedor_mail->stmt) > 0) {
				while ($row_c = $proveedor_mail->fetch_array($proveedor_mail->stmt, 0)) {
					$Mail=$row_c["Mail"];
					$Id_UsuarioGestor=$row_c["Id_Gestor"];
					$Id_Estatus_Proceso=rtrim(ltrim($row_c["Estatus_Proceso"]));
				}
			}	
		}else{
			$error=true;
		}
		$proveedor_mail->close();
		//Fin Obtengo Correo del Solicitante
		
		if($Estatus_SLA=="Play"){
			$Subject=" GESJUR: ".utf8_decode("Reactivación")." SLA de Ticket: ".$Id_Solicitud;
			$Mensaje="
				<p size=2>
					<font size='2' face='Arial'> 
						<span>
							El ticket ".$Id_Solicitud." se encuentra en estatus de <strong>".utf8_decode("Reactivación")." de SLA</strong>
						</span>
					</font>
				</p>
				<br>
				<br>
			";
			$Mensaje_Chat="El ticket se encuentra en estatus de Reactivación de SLA";
		}
		if($Estatus_SLA=="Pausa"){
			$Subject=" GESJUR: Pausa SLA de Ticket: ".$Id_Solicitud;
			$Mensaje="
				<p size=2>
					<font size='2' face='Arial'> 
						<span>
							El ticket ".$Id_Solicitud." se encuentra en estatus <strong>En Pausa</strong> debido a ".utf8_decode($Justificacion_Pausa_SLA)." por el siguiente motivo:
						</span>
						<br><br>
						<span>
							".utf8_decode($Desc_Motivo_Pausa)."
						</span>
					</font>
				</p>
				<br>
				<br>
			";
			$Mensaje_Chat='El ticket se encuentra en estatus "En Pausa" debido a '.$Justificacion_Pausa_SLA.' por el siguiente motivo: <br><br>'.$Desc_Motivo_Pausa;
		}
		
		//Envio Mail
		if($Mail!=""){
			$obj = new CURL();
			$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
			$data = array('strPassword' => 'C68H17S49', 'strSubject' => $Subject,'strTo'=>$Mail,'strHTMLBody'=>$Mensaje,'strCc'=>'itdeveloper@hospitalsatelite.com; mramos@hospitalsatelite.com; ');
			$correoASP = $obj->curlData($url,$data);
		}
		//Fin Envio Mail
		
		//Envio Chat
	  $data = array("Id_Solicitud" => $Id_Solicitud, "Mensaje"=>$Mensaje_Chat, "Id_UsuarioGestor"=>$Id_UsuarioGestor, "Id_Estatus_Proceso"=>$Id_Estatus_Proceso, "Estatus_Reg"=>"1", "accion"=>"guardar");
	  $ch = curl_init("http://siga.hospitalsatelite.com/siga/fachadas/activos/siga_ticket_chat/Siga_ticket_chatFacade.Class.php");
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	  curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
	  $response = curl_exec($ch);
	  curl_close($ch);
	  //Fin Envio Chat
		
		
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Actualizado Correctamente");
	}else{
		$respuesta = array("totalCount" => "0","estatus" => "error", "mensaje" => "Ocurrio un error al Actualizar");
	}
	
	return $respuesta;
}

//Esta Función permite que el solicitante regrese un ticket en espera de cierre a seguimiento
public function Por_cerrar_a_seguimiento($Siga_solicitud_ticketsDto,$proveedor=null){
	$Total_Cantidad=0;
	$Data = array();
	$Data_Envia = array();
	
	$Data_Anio = array();
	$Data_Anio_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	if($Siga_solicitud_ticketsDto->getId_Solicitud()!=""){
		$sql="update siga_solicitud_tickets set ComentarioCierre=NULL, Id_Motivo_Aparente=NULL, Id_Motivo_Real=NULL, Id_Est_Equipo=NULL, Fech_Cierre=NULL, Estatus_Proceso='2', Fech_Seguimiento=GETDATE(), Proc_Cierre_a_Seguim=1 where Id_Solicitud=".$Siga_solicitud_ticketsDto->getId_Solicitud()."";
		$proveedor->execute($sql);
		
		if (!$proveedor->error()){
			
		}else{
			$error=true;
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => "1", "data" => "","estatus" => "exito", "mensaje" => "El ticket paso a seguimiento");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}


public function selectSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor=null){
$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsDao = new Siga_solicitud_ticketsDAO();
$orden="";
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsDao->selectSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$orden,$proveedor);
return $Siga_solicitud_ticketsDto;
}

public function insertSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor=null){
$Usr_Inser=$Siga_solicitud_ticketsDto->getUsr_Inser();
$Siga_solicitud_ticketsDao = new Siga_solicitud_ticketsDAO();
//Esto se realiza cuando se crea el ticket desde el sistema de insumos
if($Siga_solicitud_ticketsDto->getId_Cirugia()!=""){
	if($Siga_solicitud_ticketsDto->getId_Usuario()!=""){
		$Siga_usuariosDto = new Siga_usuariosDTO();
		$Siga_usuariosDao = new Siga_usuariosDAO();
		$Siga_usuariosDto->setNo_Usuario($Siga_solicitud_ticketsDto->getId_Usuario());
		$Siga_usuariosDto = $Siga_usuariosDao->selectSiga_usuarios($Siga_usuariosDto,$proveedor=null);
		
		if($Siga_usuariosDto!=""){
			$Siga_solicitud_ticketsDto->setId_Usuario($Siga_usuariosDto[0]->getId_Usuario());
			$Siga_solicitud_ticketsDto->setUsr_Inser($Siga_usuariosDto[0]->getId_Usuario());
		}
	}
}

if($Siga_solicitud_ticketsDto->getId_Activo()!=""){
	//Datos del Activo
	$Siga_activosDto = new Siga_activosDTO();
	$Siga_activosDao = new Siga_activosDAO();
	$Siga_activosDto->setId_Activo($Siga_solicitud_ticketsDto->getId_Activo());
	$orden="";
	$Siga_activosDto = $Siga_activosDao->selectSiga_activos($Siga_activosDto,$orden,$proveedor=null);
	if($Siga_activosDto!=""){
		$Siga_solicitud_ticketsDto->setAF_BC_Ext($Siga_activosDto[0]->getAF_BC());
		$Siga_solicitud_ticketsDto->setNombre_Act_Ext($Siga_activosDto[0]->getNombre_Activo());
		$Siga_solicitud_ticketsDto->setMarca_Act_Ext($Siga_activosDto[0]->getMarca());
		$Siga_solicitud_ticketsDto->setModelo_Act_Ext($Siga_activosDto[0]->getModelo());
		$Siga_solicitud_ticketsDto->setNo_Serie_Act_Ext($Siga_activosDto[0]->getNumSerie());
		if($Siga_activosDto[0]->getId_Ubic_Prim()!=""){
			$Siga_solicitud_ticketsDto->setId_Ubic_Prim($Siga_activosDto[0]->getId_Ubic_Prim());
		}
		if($Siga_activosDto[0]->getId_Ubic_Sec()!=""){
			$Siga_solicitud_ticketsDto->setId_Ubic_Sec($Siga_activosDto[0]->getId_Ubic_Sec());
		}
		//$Siga_solicitud_ticketsDto->setEmpresa_Ext($Siga_activosDto[0]->getEmpresa_Ext());
		//$Siga_solicitud_ticketsDto->setNombre_Completo_Ext($Siga_activosDto[0]->getNombre_Completo_Ext());
		//$Siga_solicitud_ticketsDto->setTelefono_Ext($Siga_activosDto[0]->getTelefono_Ext());
		//$Siga_solicitud_ticketsDto->setCorreo_Ext($Siga_activosDto[0]->getCorreo_Ext());
	}
	//Datos del Activo
}

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsDao->insertSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor);
if($Siga_solicitud_ticketsDto!=""){
	if($Siga_solicitud_ticketsDto[0]->getId_Cirugia()!=""){
		if($Siga_solicitud_ticketsDto[0]->getId_Solicitud_Anterior()==""){
			//Nuevo Ticket
			//$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'&tab=1">'.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'</a>/Creación de Ticket Padre  ';
			//$this->insert_gtiqx($Siga_solicitud_ticketsDto[0]->getId_Cirugia(), $comentario, $Siga_solicitud_ticketsDto[0]->getUsuario_Assist(), "N");	
		}else{
			if($Siga_solicitud_ticketsDto[0]->getId_Solicitud_Anterior()!=""){
				//Ticket Dividido
				//Obtengo al gestor
				$Gestor="";
				$proveedo_gest = new Proveedor('sqlserver', 'activos');
				$proveedo_gest->connect();
				$sql="select top 1 Nombre_Usuario from siga_usuarios where Id_Usuario=".$Siga_solicitud_ticketsDto[0]->getId_Gestor();
				$proveedo_gest->execute($sql);
				if (!$proveedo_gest->error()){
					//La posicion cero no se toma
					if ($proveedo_gest->rows($proveedo_gest->stmt) > 0) {
						while ($row_gest = $proveedo_gest->fetch_array($proveedo_gest->stmt, 0)) {
							$Gestor=$row_gest["Nombre_Usuario"];
						}
					}	
				}
				//////////////////////////////
				
				if($Usr_Inser!=""){
					$proveedorusr = new Proveedor('sqlserver', 'activos');
					$proveedorusr->connect();
					$sql="
						select (select top 1 usuario_sistema_hospitalario from empleados_chs where siga_usuarios.No_Usuario=empleados_chs.num_empleado) as usuario_assist 
						from siga_usuarios 
						where Id_Usuario=".$Usr_Inser."
					";
					
					$proveedorusr->execute($sql);
					
					if (!$proveedorusr->error()){
						//La posicion cero no se toma
						if ($proveedorusr->rows($proveedorusr->stmt) > 0) {
							while ($row_c = $proveedorusr->fetch_array($proveedorusr->stmt, 0)) {
								$usuario_assist=$row_c["usuario_assist"];
								$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'&tab=1">'.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'</a>/División de Ticket/Gestor: '.$Gestor;
								$this->insert_gtiqx($Siga_solicitud_ticketsDto[0]->getId_Cirugia(), $comentario, $usuario_assist, "N");	
							}
						}	
					}
				}
			}
		}
	}
}
return $Siga_solicitud_ticketsDto;
}


public function insert_gtiqx($consecutivo, $comentario, $modifico, $relevante){
	$comentario_href=$comentario;
	$REQUEST_URI=$_SERVER["REQUEST_URI"];
	$REQUEST_URI = explode('/', $REQUEST_URI);
	if($REQUEST_URI[1]=="sigapruebas"||$REQUEST_URI[1]=="SIGAPRUEBAS"){$comentario_href=str_replace("||SERVER||", "https://apps2.hospitalsatelite.com/SIGAPRUEBAS", $comentario_href);}
	if($REQUEST_URI[1]=="siga"||$REQUEST_URI[1]=="SIGA"){$comentario_href=str_replace("||SERVER||", "https://apps2.hospitalsatelite.com/SIGA", $comentario_href);}
	
	
	$proveedor = new Proveedor('sqlserver', 'gtiqx');
	$proveedor->connect();
	$Error=false;
	$sql="
		insert into
		GTIQX_D_WK_APROVCIR_COMENTARIO 
		(
		consecutivo
		, id_wf
		, comentario
		, f_cambio
		, modifico
		, relevante
		, editable
		,tipo
		)
		values
		(
		".$consecutivo."
		, 0
		, '".$comentario_href."'
		, getdate()
		, '".$modifico."'
		, '".$relevante."'
		, 'N'
		, 'SIGA'
		)
	";
	
	
	$proveedor->execute($sql);
	if (!$proveedor->error()){
		//echo 1;
	}else{
		//echo 2;
		$Error=true;	
	}
	
	return $Error;
}


	public function Guardar_Activo_Externo($Id_Solicitud, $Id_Cirugia, $Id_Usuario, $Activo_Externo, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Id_Ubic_Prim, $Id_Ubic_Sec, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $array_accesorios_act_ext, $array_eliminados_act_ext){
		
		$respuesta = array();
		$Error=false;
		
		if($Id_Solicitud!=""){
			$proveedor = new Proveedor('sqlserver', 'activos');
			$proveedor->connect();
			$strSQL="update siga_solicitud_tickets ";
			$strSQL.=" set Activo_Externo=".$Activo_Externo; 
			$strSQL.=" 		 ,Nombre_Act_Ext='".$Nombre_Act_Ext."'"; 
			$strSQL.=" 		 ,Marca_Act_Ext='".$Marca_Act_Ext."'"; 
			$strSQL.=" 		 ,Modelo_Act_Ext='".$Modelo_Act_Ext."'"; 
			$strSQL.=" 		 ,No_Serie_Act_Ext='".$No_Serie_Act_Ext."'"; 
			$strSQL.=" 		 ,Id_Ubic_Prim=".$Id_Ubic_Prim; 
			$strSQL.=" 		 ,Id_Ubic_Sec=".$Id_Ubic_Sec;
			$strSQL.=" 		 ,Empresa_Ext='".$Empresa_Ext."'";
			$strSQL.=" 		 ,Nombre_Completo_Ext='".$Nombre_Completo_Ext."'";
			$strSQL.=" 		 ,Telefono_Ext='".$Telefono_Ext."'";
			$strSQL.=" 		 ,Correo_Ext='".$Correo_Ext."'";
			
			
			$strSQL.=" where ";
			$strSQL.=" Id_Solicitud=".$Id_Solicitud; 
			//echo $strSQL;
			$proveedor->execute($strSQL);
			
			if (!$proveedor->error()){
				
				//Inserta y Modifica Accesorios
				if(count($array_accesorios_act_ext)>0){
					//print_r($array_accesorios_act_ext);
					for($i=0; $i<count($array_accesorios_act_ext); $i++){
						if($array_accesorios_act_ext[$i][4]==""){
							//Inserta
							$proveedor_insert = new Proveedor('sqlserver', 'activos');
							$proveedor_insert->connect();
							$strSQL="insert into siga_det_accesorios_act_ext (
												Id_Solicitud_Ext
												,Nombre_Ext
												,Cantidad_Ext
												,Marca_Ext
												,Modelo_Ext
												,No_Serie_Ext
												,Fech_Inser_Ext
												,Estatus_Reg_Ext
											)
											values (
							";
							$strSQL.=$Id_Solicitud; 
							$strSQL.=",'".$array_accesorios_act_ext[$i][0]."'";
							$strSQL.=",".$array_accesorios_act_ext[$i][5];
							$strSQL.=",'".$array_accesorios_act_ext[$i][1]."'";
							$strSQL.=",'".$array_accesorios_act_ext[$i][2]."'";
							$strSQL.=",'".$array_accesorios_act_ext[$i][3]."'";
							$strSQL.=",getdate()"; 
							$strSQL.=",'1'";
							$strSQL.=")";
							//echo $strSQL;
							$proveedor_insert->execute($strSQL);
						}else{
							//Modifica
							$proveedor_update = new Proveedor('sqlserver', 'activos');
							$proveedor_update->connect();
							$strSQL="update siga_det_accesorios_act_ext ";
							$strSQL.=" set Nombre_Ext='".$array_accesorios_act_ext[$i][0]."'"; 
							$strSQL.=" 		 ,Cantidad_Ext=".$array_accesorios_act_ext[$i][5]; 
							$strSQL.=" 		 ,Marca_Ext='".$array_accesorios_act_ext[$i][1]."'"; 
							$strSQL.=" 		 ,Modelo_Ext='".$array_accesorios_act_ext[$i][2]."'"; 
							$strSQL.=" 		 ,No_Serie_Ext='".$array_accesorios_act_ext[$i][3]."'"; 
							$strSQL.=" 		 ,Fech_Mod_Ext=getdate()"; 
							$strSQL.=" 		 ,Estatus_Reg_Ext='2'"; 
							$strSQL.=" where ";
							$strSQL.=" Id_Accesorio_Ext=".$array_accesorios_act_ext[$i][4]; 
							//echo $strSQL;
							$proveedor_update->execute($strSQL);
						}
					}
				}
				
				//Elimina Accesorios
				if(count($array_eliminados_act_ext)>0){
					for($k=0; $k<count($array_eliminados_act_ext); $k++){
						//Modifica
						$proveedor_delete = new Proveedor('sqlserver', 'activos');
						$proveedor_delete->connect();
						$strSQL="update siga_det_accesorios_act_ext ";
						$strSQL.=" set Fech_Mod_Ext=getdate()"; 
						$strSQL.=" 		 ,Estatus_Reg_Ext='3'"; 
						$strSQL.=" where ";
						$strSQL.=" Id_Accesorio_Ext=".$array_eliminados_act_ext[$k]; 
						//echo $strSQL;
						$proveedor_delete->execute($strSQL);
					}
				}
			}else{
				$Error=true;
			}
			$proveedor->close();
		}else{
			$Error=true;
		}
		
		
		if($Error==false){
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha actualizado el registro correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar información");
		}
		
		
		
		if($Id_Usuario!=""){
			if($Id_Cirugia!=""){
				$proveedorusr = new Proveedor('sqlserver', 'activos');
				$proveedorusr->connect();
				$sql="
					select (select top 1 usuario_sistema_hospitalario from empleados_chs where siga_usuarios.No_Usuario=empleados_chs.num_empleado) as usuario_assist 
					from siga_usuarios 
					where Id_Usuario=".$Id_Usuario."
				";
				
				$proveedorusr->execute($sql);
				
				if (!$proveedorusr->error()){
					//La posicion cero no se toma
					if ($proveedorusr->rows($proveedorusr->stmt) > 0) {
						while ($row_c = $proveedorusr->fetch_array($proveedorusr->stmt, 0)) {
							$usuario_assist=$row_c["usuario_assist"];
							$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Id_Solicitud.'&tab=1-1">'.$Id_Solicitud.'</a>/Se Agrego Activo Externo/Nombre Activo: '.$Nombre_Act_Ext;
							$this->insert_gtiqx($Id_Cirugia, $comentario, $usuario_assist, "N");
						}
					}	
				}
			}
		}
		return $respuesta;
	}	

	
	
	
	public function Guardar_Preregistro($Id_Solicitud, $Id_Cirugia, $Id_Usuario,$Pre_Registro_Ext, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Cantidad_Equ_Ext, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $Observ_Pre_Reg_Ext, $html_pre_reg, $qr_proveedor, $array_accesorios_act_ext, $array_eliminados_act_ext, $Pre_Re_Procedimiento, $Pre_Re_Fecha_Hora_Cirugia, $Pre_Re_Quirofano, $Pre_Re_Paciente, $Pre_Re_Cirujano){
		//Guarda el temporal
		//$baseFromJavascript = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMEAAAEFCAMAAABtknO4AAABg1BMVEX////oTD3m5uZMS01PTU8AAADy8vIgICA4OzYPM0egoI7/zMnoSzza29o2Nzb6+vpGRUdBQEIwMDGFhYbIycmxsbLp6enoRzfi4uLv7+/nQzLnRTT0//+bmYnV1dXxTj6oqJgXFxfAwMDJQTT98vHnPiyzs7O3Oy//0s+9uq773tzmIwvW8/QvLS8kIyTY4+LZRzndzMn1sKoREREAL0f/UDvmNCKWlZZZWFp4d3gvMy32urX84+HraF1kZGTugngAFjQAITs2PkrpXVCko6TNzcPviYHvk4vsd2zwopzpVUjrhHvlYlbfrqrrMh5/f3+sPTMAACTRurspNjbwnJTltK/pHwDV/P3in5ndr6vxm5TgoZytPTpQZmi71NWUfHxsSE1QFRYqVWN/lJ0nGCgVFSl2O0NpcnsxSFpMYG1lhJBNN0TRTD0AAB8cKTs7QEyWQD8AEDO7lZbFqqmvpaVfZHBnNT5XOUR4OTTEYlnRf3kAITBGNzgMMzY6SVQVGxF+fXPkmaOGAAAgAElEQVR4nNVdiX/bxpXmAZJ2BBAAD4AAFTCiCZqlRFGiJB7mIcvEihQlU7Yju47jTbObbuy2Tupe2e5um/ZP3zkwuEmCEGSpz/kpJAHMvG/eMW/eHIhEwqJ+dHYWWmG3QTWapuV/aQhncjRKixu3zUZwYo/FKIAgD26bkcCEEUSLp7fNSGBiJ0WIgI7+6+pRS45iIbC3zUlQ2qBpJASxftucrE9spVKJROpjhCAqT26bn7WpNpleTFuVyBSZcpQu3jZDq2hwdjpp1SrG91ZUFmlRHg762BCi6h235dpcLhZlVZ32B8hkKzPc9PI0ImI1Es+BYtUsGO8Y6boSFeXxZANwyU6LetOfnWEh0ON6pK/K09Zts7qACAKo8PTsahCp60KIymcXui23IhcigHhHTbqvRg0CoZx6OqiNdRO+ONbV6LhSpGGE0b9tZj2Jnap01AKiODvbGCII9Ox8pncJA9Q3iNO72blVJlExasdw/AFxLk7Pi7oaDdEP6l215o2hTQygzYlS9THn9HSK/t++qwgilTO1KNpAYCpOTrE+7WF1ku8sAoChNRVlNwaR6Be+RJ+f9euDyt20hkhl42zoloITkawWx9NJa+NOjnvYymTmoUlOommxWIzOLiat+p2SxWBjEm0XfQAwYcjti7M7E2rUJkMvK1itU9Hp1R3Qp0F/XPT0RH5kIRbFYf92BVE7m6l0MPYJCHXYur1h3OB4FkB7nCTKs8ntYKhP1YDa4yS62J58eoOotMbFUNjHJI9bn9i71i9EcTVfa5AoTmufkP/BaVgKZBIttiefzC3Vh3LI7GMqDj+RGFrRcBXIJFH+JKPpMzVsBTKJlq9u3KArkxC6gCUQisc3bAyVobqajWuRfHGj3Vvl+GZs2ErF4Q32buxpmL3YIpJvMKlxddMqpEM4vylbeNn+JACiUfWGJq9q0Zv0Qja6mfxeZXhTHZmb6NlNOKQ3ViOg5fl8G9FcDQjMWoTLQRSn4QPYMGM5UW3Tw8nrl61+v986O5+p64OgZVUcXsEC+i+/vjq+UFVHR6mGr0cT0k7iXD3/imluGjSoHctr2rg8v2jVk0YJUmz/aja3OTp6HLY/qhMRqO3z/Z3mJps0iWUH59trdHX0XN5IbloKSG5KzebXs7lVDMWwgzx9qkNULwD/kpV/xMFmfzz366nk9oTddBTAJgs7O1eyRQziONyuuY7VRN5+2mwWkjoA2HUSLJvSdNsfBFWssaxklkBASM2d/eHccl+4K2PwMglZ3d9hYjrTkaSk5AAaHQSbnPgyBjFa1wUAHowpSgwooV4A09wZmmXQapgA8Py22N7fURjUXmykoMW3EonEbleLkWb0E7fS27VNCTd/rpcGBSQyvRyWCSsozZ1js4xQ3VEfOaJXr3cYRpd+Np042NpKpbYOErwWQRxsDl6t9qrzcyyBSGx0AEpIbYECDkYMboSC0myqhkuA87hhUQUpUfv8l4yCjJhVGomt1EEilThI7aa2El2sWZv99ipTUIdYZSJaIpEClNjaQiV18M+MsrPfNmYdxuF1zAOYly7Omk2FQQAEDlSfGFVz5S7mI469k3SxKvpuv0Q6FOkktnYB+EQnl+vsgo8JDRegMDuviSnQxfDUaAMq5/zrJsMIqAG7CVBnFzoSiToACHYTPaQGm60VxqyOsRIWEPBUogxLL4MvBwnUNkmGaTJGABniOj04PS9Hm01sBZEqrD8hoEsKYmXrQEHCqayYRJifIStge1h0HVz8KJHaPeAjCJrCNF8Tl1qchDbUgWYwvwJmXEAN1QXtfpDBl2LxLcRMFgthhTsCjgiZUQqLII/L0BJYHlCNgBAUYgniNLTIYo+GnrTJKFCJ2BxUnK0Ebh+lgYWQLiAEy/uEoox8P7CClFUGSCKJS12NmB3SDHQ0LAQVEDeqM6BDjITdCKq+By+xlwm9PZEabbbmyxCoM6xEUIgQdiMHyyigb1uUQBAYttwOK7CArkgd7ugIWNyCu4mswjI9YNPEKJE/XY7gAncGHEYAVLEqSXnuAJaxxSMpFgCCr4hTDm1tUg0iOCYIiA7sJhIHCQLAJ4IxRsDrCIAuHoAODX/ECEAlzX2ZrI8Jy51uAC+PEUBBR/K64oBaUwZhZ+QPATs6MJ7bImVsdSUDgWqs8AkJQZ8gAGEYtGQL4wYjuAU3X/pBQKRoo8RlxC2D0BEwBashWmgXuBWE4PVSBLK4yVq8qR1BDl4SlJuTwRQisPRodsJKBLzpUgRFNWbt0WwA4rhHgzJ4QbLjoSIAXTJEgEK4iIsBvUNjd5b3aPR8HyOQEg4xbh0USHdg8aahTSdAS6Zhj8aQ4Hpkh5AY4eh4k1mRmp+/3sGhaXVra9d8fhe6MmDIbEyx9mhhelNcOaPbsgSDU9OcDxI9PMxim18tVSKoi02EQAKaaGmERKKqR9dQiRgjeaOGNStVh/GaPGsiIeABQqSTScAhDhifJNJ5PNBkheZ0VcZC3W/qAwShe0BKOOjiEQ6M64AInhrNoIbZJwMhPEW2TEaZjHbZ5TN8N5sXUPUSGKq/WDlBpR438WgIlFDujOKZDDfqlNkI6gsQAIaZkWagZ2HFRSzSbhlFRgweKEMxsJIQEyRjpC8xO7OVA2Vxvr8jGKmOpBCLCUmS70BGoJh2HBWHYcamgNrHv7RCcJCk7JxtrwIAhKA2mwVnuslUIWZn30zaiOHNI+CV+PT2V1iPQHDh4AHmTXYYX9P8YJwB28BVAIMANJtjU44hjnBIwk7exxCUgmSrXpIYxVb3EqLboB3QQMNaQAw3DbNjHWDIb8ICECHTZ3L7hS4FhSkIOgpJKChggK6oPqeoxFdXO03wBHk+CdhXsA03m9akXXgdWiTyhngHuf10p8kQEEyhUMAfQEwv+p5jE+fnMOsBySwACUAZ2pKvIc7knJlZqO0pY2Ag1GzuXM2L9J4/AHs03RYVVyFMc+dp256Ap8PbfKFvbIruRUul9uwpYLlpqbjZfDqbl6J7ez6T13t7UbU9UZpWEKDE/fO5XIJ1GAhm4S0U0dfo09EHD6IlVRWPnzI7hJovTmftI/rhA7/r7Wh678FeqS0PvwYgSCH7r8dquwSvmKWEmbPbIMmD0t7DhwBEe7s9nk5efw3nj+Tttrj34OFeyR//kEqlB6AUeT6PokJen46L8zlg/6G9GULs0CJ1Qz9RPQ9BS8lqG5G6B9gHNa8BALfEM1AKKAQUA/4U9x48QG1jlWOYGxYGZsBGg9ofPHv2EOKAtT58+OyZo2bfGPRScCGwFeylhJm7HtiWVJeA1aJqET3YW59/VAptKQRK1VWKfBUegsqFPV6gAQHtAQRcYyD+YSElaNOoEADHo5QwJ/YrU2fEAzGUANHXW/GLylhUSJh78fAMyKem0MY3EWO38U0RLXp6snaYy4zOvEaPotxW5WuuO6VF6FFnDzwg0NEQARhhhZVKb1+0zi/U9rwtB5MQLbfnc3V83KoV/v3IfVkchongpQePpYffRNjKYOPseKzO53PQMxVFerVl03AHCOjHwBOgS94YwM3Mm7/yQhBidwDCCo/FUaUH78jlSr3fenM+HY6jogqUApEMSNSpCL+A31AvLkYvhsenV62aaajffOuBINzTLmoeu4To0n80rfewlcpgUK9tPL06hWBmoK0R0xCNGJ2Nh8Ppm7OXG7U6aHa7jUr/6WUH4a7PIXvWbXT09p3Hrd9BMDpVICjwJ8lW4NfIN02PByLM+1976Z4a6jKvwYVHFfTRf33nulNLfLOwFPb+D1rBxX/n5PH3nq4oVATea+xKb59rjhvzJ4+9BINJe374+Ek2Z/mFLb978vjw8K0XgpBX57jCCgzhp+fv8xJRalbKv39+eP+5WzD48nfP7wN6/Pzk/W9++x2g3/7m/ckPjw/vH/7uyANBiFOxiLzDitKHw5PnT77Ll3O5XFl79/4PJ5DHHzpenWnsHQIA6PDk5DGik5ND9P2ZhycKM92FyHu5Mn30PWjCk8cnP/4IuML8wGb+S9n5PPPd7x/f96bDJ0defUgx5F3xnmEF9Ki/P/Rg6uSHw3edag7lYxhGyb97//y5130IwOFDz6io+DpcBF5hBdKj6O88WTuEigJE8+Q+ks7JAvbhnR89Bxi0GPJyzf6ifFap9GRx6xJazP/9w588dSj8U3dqCydnSrRbCsBWIR3ef6ITQKP/5Lj38HtvAIBCXrdcobcXDXJKUd7CF9CeP5y87/ayf/zTixcv9nUCH//0x19djn4+fPwH0+IBru9L3kkOcR72nnhBakXbC4Lo0tH3Px7qbf/kL++0Fxt1ECDV6zVAG5jgxzqIiOq1l3++/Mvvdbs4/PF7r54Aht2z85B3YCcLwqZwJi5YRkcf7f0ExXDyc2e/BlnfWEg1eH3/zz3Qkd0//O8PXipEq+1hq7K5GQsVghSD00WV6bb38iEwYP8IBPAuVq8t4d5EUav8CqjSx5KHF6Lbr+h+hRVAhckQAbBMDJKwWZ+22972cHT08df79dXs65Ts/pV2CwCojzipRdhYAVbHhIhAiOmUZDemqscCa7oErKE4WapAFqoP+h/cFiDO1dlZHaqsXpsUGgCWAABtk2QH56pLDijlVlLHV7VBvbZUk6Ah1Frurc20PG9P6sD/JGMFo7rQ9MgQAcIARgtvom1bH01H91D6Tp6rw0kfclkzaMP8iNxT/+w42nZsjQfao07Rhn1WKFgqC0sISWuhuGUGb+Rt26YWmECEKVQZ7gcZH0/O+v0NnWviV/uts8nxcFYEg06YebXMdLRfiWd15P7ZmL2ukNyRZAcQK8CVppX+sN22rAOB+dM9nAcuiXh4DFRtrBM6LwTm6sHgHyWO9/awFES53aZPa5hTuwBQVaEA0B2RUwwg0mhd2D0TSWoDGIC/UknGSQucuECuE6nbA3wdeX55aOYski4AIVmC4AYAHCs+d6w2ffXKoU1QneBswAOoJ/qRM+gvTHbDeQ/wFfJPq9vbs9OBGTt48E/quR4lvQBAp4QvV/pTsW3bC0VjUTx7aKdngKDLKhHdmbasA2GnsREKwZidVmBgMMbH9dYUuELrshZ9asCGAKkO0KQiTDXOrjZsoafbAoxqri2ERW1jEQMQRKU/GarztuX4Ezi/ABSHUBROE4hFcI84vWoNHHGnFFtYy/WN2dMKXGKANKidTWcw5ygbOlUiJENPJNOgs/A4L2exABBd05jZpYUXHMVXBrX+ZDxTt+fbczzV2T5qb29vt+HBS/163TPk9zY0k4TrIVgmArcYMGi2UtsAvdfp8fHx6Zv/+d8N0O7sQm1eIYBrC2FV+0AxLDM1JZv4v6qytIKVAGKxawBgV5cOxbCQ/xHc75VI9RZZow8BXBPCahFgDF5iYJVRwqBLT0lJ/vi/TnjktwYvMWgJK+26sngRdlFP46t4f+RLiXAdzmZik4INAZV0xgeLOxqP4gMKgV3liOztZKkF2GeBZVIWBJJUKMQst/iyYJMCCsGnFRASzCw85K6QtOiRpvcrxDH6tgBCwYRg1lLwCLDdpKsrbG1EEcOUu2ZjQDk4xzELCzRvCyQEiwh8AYBDH9bkH9Sa3NIRlC0j7ULStwCSFjUO0q3ZePMJIWZ18IVkFQPoRRY/sowEa2nrA7A+7bPjcRF2qZnkOi7BSlZnuLYQrI6osLbhkVoV7EkDApAigrCZJE+viwA8J8QkSYBACnYWBPSfLwTYHUkBZSAABJPj2s4m+ra2O2KFZn1/vx4D1SdtXZtyGWOySkfrrBYMm0UIcv67RjsCNvLm1Xx7vJ+UAnkj9lgtyvLsShBYqwyE3KWijBQtVi6valohif1pJziCr9tRWp2fbjaDDPkrqkjTorg92UnaEJSzuSqSwWoOCjxCMAroi4D11mDCn24PA40R9Mk/8LRdBuWypuUVrbBaiwQFBxbplQOlhQgG+AjzYEvu9Gn8+etNGwOCxnTKAEVhtRYly7g/2Ir5DkNtBDr5zQlqx0CTy/oaUzpaYX1H2Q6KZEmfHNCfAuvto/SHGOR0sj5ObKK3qdgRCAs+u4glgZEW0JQl+DoClJ8sBlgGr++aUF+Cz/a4KFcQYKgkMEpMySnLEKTJEC04ggheVRNgO0iFnD9fdyAQgCErgqYJ5XxZ0ZYjICOEUcC4AiLADkW8WBtBHZ/bQF9ABbSWCjjP56ROVanmJSUvLGFNMoZp3YC9MkSgr7tff8u+vgwBrfKx6QCQQSeXq5bLsXyH6Wi5xbyxZYIgXQiOoIIZWX/Vnb7KF7sxO4Ky1MnnNQ1EPeXqMhmwHWOMlgvmThECrM7i8boI9N0k+CwqOwLQ8NWCANgH/Vp+iQwiPQNBNZgpQwT6imlxuGZYMcBT37QMDdlRPRmFFWJLhz4CyxkIAo5xUMoUv5Zm7W1FekhByxE3Ap8kFRoGAj5YESic09e6rnuQzrn+OpLZNRDktgwEibUyNyZBBPpK0TWXAJPVmfj9ZsEQJPOWfJESKK5AmS59+4a43uGzZJUy7gqDIbC4okQiH6gMnKvT38UxW6tHIMvq8MrhgDKwZH4DxhUYgb5Kca1N++QsWTo6CI5ASFsQdAMZAkawgRGstTWqoi8U13flBUIgFA4sCNKBhggMQjDQw4N1dlToz0TF0+AIzJgC0m6gXhkjiOgTve01EBAz0D1YIATG8EY35SDOSM+66/HBOsv5yTpx0osEQtC1IQiUr9AR6OysM0Yg6yFmG9eQgQ0AGCIER0CiTP/nF9cJAn2DcBAEkmRHwAf3RUSp11jP3xdtrsj/fJqF2JwdQaIQwJR1BDXV1qA+aKIbskiOC/Y5f2BDoDkQBAqwMYKBPl70/SJd9pwYMsnSBEFw6UCQDeAPdBkMbDGODzJ2whpPrK9FQpJyIOADIND7AyPO9HuGiLF1y4hE1q9bEHoOBL0AWkQQkDNL/JpyjazENF4qF8CPSLbALhgAokVGmCb6REB2rJgH7QYap7PWTnkUKPlLZsLPbKHyaiKGTI/JL4GGJ4JlgMBLwZIVOgIjyvE30mSJGZjBYMDEreGPGkqwmTiyOIp0UD7fGlohK/TNFE3QqbwIjk8PlOVLxRYSmXkiW3NFf3FFjSwgNYcUQRHEImhGuRx0DocgIINe0d+J/MbGLbMDCTwhDKSQSmgBk0WCROaeiH/HqZOVdO4+TY6FpyUFzJfkswH8KDpiKpYji5IqF2TxsK/RPtkGa3kPRK+XrSrJYNqUXPchAVaklLO9Lk9VCQI9fRX1M9qvmK5IB8xe8hzfyHQvtRxoG0kKOsG9kkDRqOm1HpVupLl4nKN0DvRW9bdR0NjQbvThhVGcilMUn87w3VGnqoD+lvW/xMwXCbDIpMDk8tluppFO8xQFqozzVYde+NqsaRwqYGyvFUYcLI6Kx+M8z6ca3KiTz+GVGtcHIuF3EMSUqpYdxfl0ejeThuyjCinSIRAEvjIuLbJvzkxUZjECCksCiCLTaPDUKJvVgEAEfCRiEq7B8KVewMcgwsew5apa5xKoPCgS6g1FpaEEUHNRnLHR2XjZt5/U4xVxpqLhTDscLBEjAAA48IniOIAlneaobi/byZdz+Hg4csQAMhcLwTPrzEuxgpIrQ85HXQpIFbDMozJRO3GgVFRTnOKNPfTEP/qJTo1XP1lOMtM4LFbYLBlQPsaDFYsDUCAWnuuORgBMR8tX4ZZxRSmgw97gBuWCosBN5NW8pnWyl6NRN87hRzgOGKveNnHMNRICh7WIzxMOyLkxfuaVjeGNxXPliQxI8ZZ/pHZAkK1MppHJZCB7gDhMPGpncAloSgY1OLzbfJ6yFhiHeprWZUAM2QyXfbzpZ0CcqSVXXDUQABFn9MbS6yNGF9dbEDGEiIvrCOKEKJPitma3ISCtBFyRscyWxAm06AMBcUVmbA0QWCSsmxmpnYAweDIuGXcQx0I00fjB2gwmHCgEHv3CGQiMDd703nCy4pW/xrFpliiqzOmVQgQWxnTBOFTKyiFl5RNft6oe5f4Cv2ewoONdY9V839jAR4vF9nRpzoIcXWfNkLG8zgOwY15XGLP97A1qAKDsPxPbt/5Hno/bbosTSXM9gwP7UQ1idFnSwkBL02fGng2Nj1vcBGWqBeXQARfXpj7ZlMeJmrIVGEcOlesamQnWcWTJUnMwj3Wg5ejpBsYAIiNYAYe9hJ1FZ/t7/SOgLSgWCQn9RUIwdSjScuxDdcZHknUR3sSCli5Gxy2EIdnjLU7CUqu3Fi0BY1UhqzBtN0C3bAFQdx2to780imWFXLVz2aWornmAjP14E5pWL7AYsqS3NKtdrUWESce1xYIiN4DIxQRQoV2buosTBrDeozJbqd0G7H8yuxw50WbqkJesn9jMarxuYO76FjSl7Sc3rGV3ZzjzhJ3KufuEg9KHLyHrMK5J3wP/YIdJHrEdVARc19To15RRJu3ZfHFrD2Uy4rPhPZ7kKM2ythEGas4jB0t7aZ17kzJpvN3HelgUHR1a38ucBC7JrHoBd4ta1eb3PUVjfOBHpgaB4PXi6KhU+uBQjejfDM5R+AJDmkYWPWI9KJZ2xlHKyIrBk+uFimGKJm756L6P4zvIsySZspbtjbrc3z6+/fj9jx+Mbf10qXR0dPTTlzrruj1CX99jXQjcg7ryKM4taefFvtVbiVwXOeqSEQDr3UxqdxcHiV/+/e9///LLD/r+yKNSdO/h24/fcrpUTaLiPQTdJiyPcFwqQ8dqjW6WN/l6APjLXDWbSek2atH0L/fkvQ9v3378+NdvYaj488825nXqMi4EnisBkuUux63gcjH3lOFg3Re5bpXVUGxOHIyp6d9+G/8Z/FtKeEQUdQjBjQBQtccHF4B3DwjqH1XZiLZlbXmk6HHKoS6LiWJdCOiiJ4JIMtfjeXcA5xOCx7U4363GQLkpg3VzxOGLeURp1mnJdFReFMiysc6I4pc4fS82if93ODSgPr0y8iOdXQQgvhbfFgSCDQE9vFLp4pLD49lcZ8RxfiFYDQH/0W/h+F6eHNEyQgPUYOwDQqGI2SfT0Xp/tr10+pAVqqM0b4zQ7BG0A4LVDDDB/4OOqJczIsskQhAYAB6WkriIxgmj1ckNSet1LYV4SyFuRNjWW4EAe3nb3giIgAsMADujqRhFoeCe6PuAUVZJL4JAQn6rJyLEcT0t55he7WU8RZB2/eJNHHzh2pkqjod0VHxzKsu+3wCcsRbj6qPtVmvUdumxxSyrD2NtRPFZ94/eCGBkVDke9usisGB2Mva9wtOCAGZXHBCMEZodQdajIA34IheA9CX43R8CNLKugGhuKsOXtvo/C8xEQGnV7IjXeyL9J+MPzH1ZEHgUX96F41gHWylg6dldX1IYkYIqw/WOvbcgyIGhX1LJd0BU2aUs6ZVut9vr5Jm8AcETQS7lQkA1YOaOvWz4gTAKupvchoCQVMjBbCkk8H8GJ9KryxHEUmnezhOVxvexWT8QukFPGPFE4EkrZJDccsqA4/RmTfZc+uWBYNnJEp8EQWTL4U2plJG/jnUd4nESxa2s/hMgwGlNk9Ij81ohs9ypprtU3H0kw6dGADplGwLeqhYKz8UX026P6ZozDreGAHRplqiCchxzwcQXQuDS1UiM4ju3jqDTsCCgrDqEKHewAAKfBsISurznEcOfFAHolE0eOd61Mdy7c6bScRifSyPes9BPigB0yoa5UhkPrdYaHggaPQQ12eN7AY8KCg+BYiKg+JGnlLbcAPQUH5vlg3bK4SFg7hldGrfrfXqUlnGMMhqGuXfS3YAnBYWHoBAnCKiG80R2ndieFQKVNmfbIlqaDxhWhIdAgB0CIn60SKWTvBlfULuUpcfIZ/iAYUV4CJI9HQHHLW5NECLptcUztg6g2uADdsrhIWAvM9idpqoeVwlJXTwhye1qtkJyDW6B6q2i8BBEOhgBTy117BIaKvENB0yAIGCnHCICDYcV6RXlKOCutCuWVjKeY1cfFCKCPBzrU42VTZnbTbl9f4GP97xuXk0hIqjCnB3fXV1nOev2VRLHOSMpnxQigjJEkAk4UGEpzgd2LwoXQZrKBB2ogGFcsAdDRKDwAMGi7ngljdJcsAdDRFDgoAyCDlQuM7ePQIKBUSagT4xkG7ePgKXAWD8d0CfeCQSRLgiM+MAI7oAWwQQ876c/8CTqDvgiGBjxXEA+tLsQVcDkL89x6w/Yk4VcJx2//fEBMOU4MIS03+OJ2aQkwAUYo3i6AdMct5+zA5TjQJe2simTBQUu2c72uhyfzmTQAmK+FzRtGi6CSDlDZZZ0ynDRS6cH18lneExo9fMoqynBT2UOF0FEASGmkxkWrjcvw3lToC67DR6uKAbMd+Fab62sXPd4+JARsJecRQispJSrnewIrfPD680B7xkKNHo1p3gcuH0HEERycS7TUWJKOa9lYatDPUfqQnVxo1cZuBsgDNZvCEEkn443MulMAxC2UZ4aXXa0fE655hnqiyh0BJFqXNcWPg1ttKwwQjLc1yzZKXwEkaTW6/UA60yYbyZaTDeAANBNtrmTbgbBp6R1EJBdIEFjsJshC4IV4UDZlMHldd4KECqxzOWjewYtn8hiR5ZlxlxPuQuKJFVHKQuAdGrp8CprufXevUePqPKtY8iNHtmYunfvH0tea1bo2u8FGHphvgVtfUpq9xz8A6aWZEpyzpvB7feWpdlvmtheyoOlJQgYyn3/vUdB01vXJzbrEgCgxLLIpef1xKNw3sAVgLR/eLCz20sWmH9D9AsroV8KZQ+h3XsUMN98bfIUQSb+2Weff/6ZN33+2Rf/3E27H+rekkNiO24EmfTnXyxgH9MX/2w0XDIImt+6NikuVvjRF8sBAAifdzN2B5xJ317nrFhYSTdSjdFnKwEACF98PkrDfUyY/dRB4HVZYZDU6XKgV3oEh97d3goFsoLojPC+dvBU+dMMABZSUqlqiL4AbbvQhB0E7gO35/PV3JKfmYwAAAAjSURBVPXf3xYasfCkgRh0o7/4AtPnDsK/IrfKwMMGbmrQ+P8fqKtA+4EH0QAAAABJRU5ErkJggg==";
		$baseFromJavascript=$qr_proveedor;
		// Nuestro base64 contiene un esquema Data URI (data:image/png;base64,)
		// que necesitamos remover para poder guardar nuestra imagen
		// Usa explode para dividir la cadena de texto en la , (coma)
		$base_to_php = explode(',', $baseFromJavascript);
		// El segundo item del array base_to_php contiene la información que necesitamos (base64 plano)
		// y usar base64_decode para obtener la información binaria de la imagen
		$data = base64_decode(str_replace(array('-', '_'), array('+', '/'), $base_to_php[1]));// BBBFBfj42Pj4....
		// Proporciona una locación a la nueva imagen (con el nombre y formato especifico)
		$filepath = dirname(__FILE__)."/../../../Archivos/QR_Temporal/tmp".$Id_Solicitud.".png"; // or image.jpg
		// Finalmente guarda la imágen en el directorio especificado y con la informacion dada
		file_put_contents($filepath, $data);
		//Fin Guarda el temporal
		
		$respuesta = array();
		$Error=false;
		
		if($Id_Solicitud!=""){
			$proveedor = new Proveedor('sqlserver', 'activos');
			$proveedor->connect();
			$strSQL="update siga_solicitud_tickets ";
			$strSQL.=" set Pre_Registro_Ext=".$Pre_Registro_Ext; 
			$strSQL.=" 		 ,Nombre_Act_Ext='".$Nombre_Act_Ext."'"; 
			$strSQL.=" 		 ,Marca_Act_Ext='".$Marca_Act_Ext."'"; 
			$strSQL.=" 		 ,Modelo_Act_Ext='".$Modelo_Act_Ext."'"; 
			$strSQL.=" 		 ,No_Serie_Act_Ext='".$No_Serie_Act_Ext."'"; 
			$strSQL.=" 		 ,Cantidad_Equ_Ext=".$Cantidad_Equ_Ext;
			$strSQL.=" 		 ,Empresa_Ext='".$Empresa_Ext."'";
			$strSQL.=" 		 ,Nombre_Completo_Ext='".$Nombre_Completo_Ext."'";
			$strSQL.=" 		 ,Telefono_Ext='".$Telefono_Ext."'";
			$strSQL.=" 		 ,Correo_Ext='".$Correo_Ext."'";
			$strSQL.=" 		 ,Observ_Pre_Reg_Ext='".$Observ_Pre_Reg_Ext."'";
			$strSQL.=" 		 ,Pre_Re_Procedimiento='".$Pre_Re_Procedimiento."'";
			$strSQL.=" 		 ,Pre_Re_Fecha_Hora_Cirugia='".$Pre_Re_Fecha_Hora_Cirugia."'";
			$strSQL.=" 		 ,Pre_Re_Quirofano='".$Pre_Re_Quirofano."'";
			$strSQL.=" 		 ,Pre_Re_Paciente='".$Pre_Re_Paciente."'";
			$strSQL.=" 		 ,Pre_Re_Cirujano='".$Pre_Re_Cirujano."'";
			$strSQL.=" where ";
			$strSQL.=" Id_Solicitud=".$Id_Solicitud; 
			//echo $strSQL;
			$proveedor->execute($strSQL);
			
			if (!$proveedor->error()){
				//Inserta y Modifica Accesorios
				if(count($array_accesorios_act_ext)>0){
					//print_r($array_accesorios_act_ext);
					for($i=0; $i<count($array_accesorios_act_ext); $i++){
						if($array_accesorios_act_ext[$i][4]==""){
							//Inserta
							$proveedor_insert = new Proveedor('sqlserver', 'activos');
							$proveedor_insert->connect();
							$strSQL="insert into siga_det_accesorios_act_ext (
												Id_Solicitud_Ext
												,Nombre_Ext
												,Cantidad_Ext
												,Marca_Ext
												,Modelo_Ext
												,No_Serie_Ext
												,Fech_Inser_Ext
												,Estatus_Reg_Ext
											)
											values (
							";
							$strSQL.=$Id_Solicitud; 
							$strSQL.=",'".$array_accesorios_act_ext[$i][0]."'";
							$strSQL.=",".$array_accesorios_act_ext[$i][5];
							$strSQL.=",'".$array_accesorios_act_ext[$i][1]."'";
							$strSQL.=",'".$array_accesorios_act_ext[$i][2]."'";
							$strSQL.=",'".$array_accesorios_act_ext[$i][3]."'";
							$strSQL.=",getdate()"; 
							$strSQL.=",'1'";
							$strSQL.=")";
							//echo $strSQL;
							$proveedor_insert->execute($strSQL);
						}else{
							//Modifica
							$proveedor_update = new Proveedor('sqlserver', 'activos');
							$proveedor_update->connect();
							$strSQL="update siga_det_accesorios_act_ext ";
							$strSQL.=" set Nombre_Ext='".$array_accesorios_act_ext[$i][0]."'"; 
							$strSQL.=" 		 ,Cantidad_Ext=".$array_accesorios_act_ext[$i][5]; 
							$strSQL.=" 		 ,Marca_Ext='".$array_accesorios_act_ext[$i][1]."'"; 
							$strSQL.=" 		 ,Modelo_Ext='".$array_accesorios_act_ext[$i][2]."'"; 
							$strSQL.=" 		 ,No_Serie_Ext='".$array_accesorios_act_ext[$i][3]."'"; 
							$strSQL.=" 		 ,Fech_Mod_Ext=getdate()"; 
							$strSQL.=" 		 ,Estatus_Reg_Ext='2'"; 
							$strSQL.=" where ";
							$strSQL.=" Id_Accesorio_Ext=".$array_accesorios_act_ext[$i][4]; 
							//echo $strSQL;
							$proveedor_update->execute($strSQL);
						}
					}
				}
				
				//Elimina Accesorios
				if(count($array_eliminados_act_ext)>0){
					for($k=0; $k<count($array_eliminados_act_ext); $k++){
						//Modifica
						$proveedor_delete = new Proveedor('sqlserver', 'activos');
						$proveedor_delete->connect();
						$strSQL="update siga_det_accesorios_act_ext ";
						$strSQL.=" set Fech_Mod_Ext=getdate()"; 
						$strSQL.=" 		 ,Estatus_Reg_Ext='3'"; 
						$strSQL.=" where ";
						$strSQL.=" Id_Accesorio_Ext=".$array_eliminados_act_ext[$k]; 
						//echo $strSQL;
						$proveedor_delete->execute($strSQL);
					}
				}
				
			}else{
				$Error=true;
			}
			$proveedor->close();
		}else{
			$Error=true;
		}
		
		
		
		
		
		if($Error==false){
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha actualizado el registro correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar información");
		}
		
		
		
		if($Id_Usuario!=""){
			if($Id_Cirugia!=""){
				$proveedorusr = new Proveedor('sqlserver', 'activos');
				$proveedorusr->connect();
				$sql="
					select (select top 1 usuario_sistema_hospitalario from empleados_chs where siga_usuarios.No_Usuario=empleados_chs.num_empleado) as usuario_assist 
					from siga_usuarios 
					where Id_Usuario=".$Id_Usuario."
				";
				
				$proveedorusr->execute($sql);
				
				if (!$proveedorusr->error()){
					//La posicion cero no se toma
					if ($proveedorusr->rows($proveedorusr->stmt) > 0) {
						while ($row_c = $proveedorusr->fetch_array($proveedorusr->stmt, 0)) {
							$usuario_assist=$row_c["usuario_assist"];
							$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Id_Solicitud.'&tab=2-1">'.$Id_Solicitud.'</a>/Envío Pre registro Proveedor/'.$Nombre_Completo_Ext;
							$this->insert_gtiqx($Id_Cirugia, $comentario, $usuario_assist, "N");		
						}
					}
				}
			}
		}
		
		
		if($html_pre_reg!=""){
			//Se obtiene el correo del gestor
			$Id_Gestor=0;
			$Correo_Gestor="jpalacio@hospitalsatelite.com; ";
			$proveedorgestor = new Proveedor('sqlserver', 'activos');
			$proveedorgestor->connect();
			$sql="
				select 
					(select top 1 (select top 1 email from empleados_chs where num_empleado=No_Usuario) from siga_usuarios where Id_Usuario=Id_Gestor) as Correo_Gestor, Id_Gestor
				from siga_solicitud_tickets where Id_Solicitud=".$Id_Solicitud."
			";
			$proveedorgestor->execute($sql);
			
			if (!$proveedorgestor->error()){
				//La posicion cero no se toma
				if ($proveedorgestor->rows($proveedorgestor->stmt) > 0) {
					while ($row_g = $proveedorgestor->fetch_array($proveedorgestor->stmt, 0)) {
						$Id_Gestor=$row_g["Id_Gestor"];
						//$Correo_Gestor.=$row_g["Correo_Gestor"];
						$Correo_Gestor.=" biomedica@hospitalsatelite.com;";
					
					}
				}	
			}
			///////////////////////////////////////////////////////////////////////////////////
			$mensaje_proveedor="<p size=2><font size='2' face='Arial'> <span>Atención <strong>".$Nombre_Completo_Ext."</strong>,</span><br><br>

			Por medio del presente se envía el pre registro de los equipos solicitados para renta, FAVOR DE CONFIRMAR DISPONIBILIDAD Y ASISTENCIA a los correos: biomedica@hospitalsatelite.com con copia a jpalacio@hospitalsatelite.com.
			<br><br>
			Favor de considerar todos los accesorios necesarios para su utilización y buen funcionamiento.
			<br><br>
			Es importante que la persona que entregue el equipo al Hospital, traiga consigo este pre registro ya sea impreso o de forma digital ya que será la única forma de autorizar el ingreso de los equipos.
			<br><br>
			El ingreso al Hospital debe ser por el acceso a proveedores (portón gris) y solicitar el ingreso con personal de Seguridad con su respectivo registro.
			<br><br>
			En caso de alguna eventualidad favor de comunicarse con el personal de Ingeniería Biomédica al 5089.1410 Ext.2222 / 2169.</p>
			</font>
			
			<p><font size='-2' face='Arial'> 
			Para autorización de facturas de rentas se requiere presentar copia de remisión firmada por Enfermería e Ingeniería Biomédica, así como la siguiente documentación 
			asociada del equipo: copia vigente (menor a 1 año) de último reporte de mantenimiento preventivo realizado al equipo, realizado por técnico avalado 
			(presentar constancia capacitación expedido por fabricante o distribuidor autorizado de marca) y ejecutado con equipo de medición/analizadores calibrados 
			(presentar certificado calibración vigente) o copia de factura de adquisición del equipo en caso de ser nuevo (menor a 1 año y número de serie visible).
			</font></p>
			<br><br>";
			
			$REQUEST_URI=$_SERVER["REQUEST_URI"];
			$REQUEST_URI = explode('/', $REQUEST_URI);
			$url_prov="";
			$link_gestor=""; $link_proveedor="";
			if($REQUEST_URI[1]=="sigapruebas"||$REQUEST_URI[1]=="SIGAPRUEBAS"){
				$url_prov="http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/Archivos/QR_Temporal/tmp".$Id_Solicitud.".png"; 
				$link_gestor='http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key='.$Id_Solicitud.'&gest='.$Id_Gestor.'&tipo=1'; 
				$link_proveedor='http://siga.hospitalsatelite.com:8080/SIGAPRUEBAS/vistas/gtiqx_recepcion_equipo.php?key='.$Id_Solicitud.'&gest='.$Id_Gestor.'&tipo=2'; 
			}
			if($REQUEST_URI[1]=="siga"||$REQUEST_URI[1]=="SIGA"){
				$url_prov="https://apps2.hospitalsatelite.com/SIGA/Archivos/QR_Temporal/tmp".$Id_Solicitud.".png"; 
				$link_gestor='https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key='.$Id_Solicitud.'&gest='.$Id_Gestor.'&tipo=1'; 
				$link_proveedor='https://apps2.hospitalsatelite.com/SIGA/vistas/gtiqx_recepcion_equipo.php?key='.$Id_Solicitud.'&gest='.$Id_Gestor.'&tipo=2'; 
			}
			$html_proveedor=$html_pre_reg;
			$html_proveedor=str_replace("||QR||", '<img data-imagetype="External" src="'.$url_prov.'"/><br><a href="'.$link_proveedor.'">Click Aquí</a>', $html_proveedor);
			$html_proveedor=str_replace("||Link_QR||", 'QR', $html_proveedor);
			$html_proveedor=str_replace("||msj_proveedor||", $mensaje_proveedor, $html_proveedor);
			//$html_proveedor=str_replace("á", "a|", $html_proveedor);
			//$html_proveedor=str_replace("Á", "A|", $html_proveedor);
			//$html_proveedor=str_replace("é", "e|", $html_proveedor);
			//$html_proveedor=str_replace("É", "E|", $html_proveedor);
			//$html_proveedor=str_replace("í", "i|", $html_proveedor);
			//$html_proveedor=str_replace("Í", "I|", $html_proveedor);
			//$html_proveedor=str_replace("ó", "o|", $html_proveedor);
			//$html_proveedor=str_replace("Ó", "O|", $html_proveedor);
			//$html_proveedor=str_replace("ú", "u|", $html_proveedor);
			//$html_proveedor=str_replace("Ú", "U|", $html_proveedor);
			//$html_proveedor=str_replace("ñ", "n|", $html_proveedor);
			//$html_proveedor=str_replace("Ñ", "N|", $html_proveedor);
			//Este correo se envia al proveedor
			//https://apps2.hospitalsatelite.com/
			$obj = new CURL();
			$url = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
			$data = array('strPassword' => 'C68H17S49', 'strSubject' => "GTIQX Pre-Registro (Folio: ".$Id_Solicitud.")",'strTo'=>$Correo_Ext,'strHTMLBody'=>$html_proveedor,'strCc'=>'jpalacio@hospitalsatelite.com; biomedica@hospitalsatelite.com','strBCC'=>'itdeveloper@hospitalsatelite.com');
			$correoASP = $obj->curlData($url,$data);
			
			$html_gestor=$html_pre_reg;
			$html_gestor=str_replace("||QR||", '<a href="'.$link_gestor.'">Click Aquí</a>', $html_gestor);
			$html_gestor=str_replace("||Link_QR||", 'LINK', $html_gestor);
			$html_gestor=str_replace("||msj_proveedor||", "", $html_gestor);
			//$html_gestor=str_replace("á", "a|", $html_gestor);
			//$html_gestor=str_replace("Á", "A|", $html_gestor);
			//$html_gestor=str_replace("é", "e|", $html_gestor);
			//$html_gestor=str_replace("É", "E|", $html_gestor);
			//$html_gestor=str_replace("í", "i|", $html_gestor);
			//$html_gestor=str_replace("Í", "I|", $html_gestor);
			//$html_gestor=str_replace("ó", "o|", $html_gestor);
			//$html_gestor=str_replace("Ó", "O|", $html_gestor);
			//$html_gestor=str_replace("ú", "u|", $html_gestor);
			//$html_gestor=str_replace("Ú", "U|", $html_gestor);
			//$html_gestor=str_replace("ñ", "n|", $html_gestor);
			//$html_gestor=str_replace("Ñ", "N|", $html_gestor);
			//Este correo se envia al gestor y a joaquin de biomedica
			//$obj2 = new CURL();
			//$url2 = "http://207.249.133.119:8080/envio_correo_externo/send_external_email.asp";
			//Productivo
			//$data2 = array('strPassword' => 'C68H17S49', 'strSubject' => "GTIQX Pre-Registro (Folio: ".$Id_Solicitud.")",'strTo'=>$Correo_Gestor,'strHTMLBody'=>$html_gestor,'strCc'=>'','strBCC'=>'itdeveloper@hospitalsatelite.com;');
			//Pruebas
			//$data2 = array('strPassword' => 'C68H17S49', 'strSubject' => "GTIQX Pre-Registro (Folio: ".$Id_Solicitud.")",'strTo'=>"itdeveloper@hospitalsatelite.com",'strHTMLBody'=>$html_gestor,'strCc'=>'','strBCC'=>'itdeveloper@hospitalsatelite.com');
			//Se comento debido a que el primer correo tambien llega al gestor y a los proveedores
			//$correoASP2 = $obj2->curlData($url2,$data2);
		}
		
		return $respuesta;
	}
	
	
	public function Guardar_Recepcion_Equipo($Id_Solicitud, $Id_Cirugia, $Id_Usuario, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Cantidad_Equ_Ext, $Empresa_Ext, $Nombre_Completo_Ext, $Telefono_Ext, $Correo_Ext, $Observ_Pre_Reg_Ext, $Comentarios_Recepcion, $array_accesorios_act_ext, $array_eliminados_act_ext, $Id_Motivo_Rechazo, $Pre_Re_Procedimiento, $Pre_Re_Fecha_Hora_Cirugia, $Pre_Re_Quirofano, $Pre_Re_Paciente, $Pre_Re_Cirujano){
		$respuesta = array();
		$Error=false;
		
		if($Id_Solicitud!=""){
			$proveedor = new Proveedor('sqlserver', 'activos');
			$proveedor->connect();
			$strSQL="update siga_solicitud_tickets ";
			$strSQL.=" set Nombre_Act_Ext='".$Nombre_Act_Ext."'"; 
			$strSQL.=" 		 ,Marca_Act_Ext='".$Marca_Act_Ext."'"; 
			$strSQL.=" 		 ,Modelo_Act_Ext='".$Modelo_Act_Ext."'"; 
			$strSQL.=" 		 ,No_Serie_Act_Ext='".$No_Serie_Act_Ext."'"; 
			$strSQL.=" 		 ,Cantidad_Equ_Ext=".$Cantidad_Equ_Ext;
			$strSQL.=" 		 ,Empresa_Ext='".$Empresa_Ext."'";
			$strSQL.=" 		 ,Nombre_Completo_Ext='".$Nombre_Completo_Ext."'";
			$strSQL.=" 		 ,Telefono_Ext='".$Telefono_Ext."'";
			$strSQL.=" 		 ,Correo_Ext='".$Correo_Ext."'";
			$strSQL.=" 		 ,Observ_Pre_Reg_Ext='".$Observ_Pre_Reg_Ext."'";
			$strSQL.=" 		 ,Comentarios_Recepcion='".$Comentarios_Recepcion."'";
			$strSQL.=" 		 ,Pre_Re_Procedimiento='".$Pre_Re_Procedimiento."'";
			$strSQL.=" 		 ,Pre_Re_Fecha_Hora_Cirugia='".$Pre_Re_Fecha_Hora_Cirugia."'";
			$strSQL.=" 		 ,Pre_Re_Quirofano='".$Pre_Re_Quirofano."'";
			$strSQL.=" 		 ,Pre_Re_Paciente='".$Pre_Re_Paciente."'";
			$strSQL.=" 		 ,Pre_Re_Cirujano='".$Pre_Re_Cirujano."'";
			if($Id_Motivo_Rechazo!=""){
			$strSQL.=" 		 ,Id_Motivo_Rechazo=".$Id_Motivo_Rechazo;
			}
			$strSQL.=" 		 ,Estatus_Recepcion=1";
			$strSQL.=" where ";
			$strSQL.=" Id_Solicitud=".$Id_Solicitud; 
			//echo $strSQL;
			$proveedor->execute($strSQL);
			
			if (!$proveedor->error()){
				//Inserta y Modifica Accesorios
				if(count($array_accesorios_act_ext)>0){
					//print_r($array_accesorios_act_ext);
					for($i=0; $i<count($array_accesorios_act_ext); $i++){
						if($array_accesorios_act_ext[$i][4]==""){
							//Inserta
							$proveedor_insert = new Proveedor('sqlserver', 'activos');
							$proveedor_insert->connect();
							$strSQL="insert into siga_det_accesorios_act_ext (
												Id_Solicitud_Ext
												,Nombre_Ext
												,Cantidad_Ext
												,Marca_Ext
												,Modelo_Ext
												,No_Serie_Ext
												,Fech_Inser_Ext
												,Estatus_Reg_Ext
											)
											values (
							";
							$strSQL.=$Id_Solicitud; 
							$strSQL.=",'".$array_accesorios_act_ext[$i][0]."'";
							$strSQL.=",".$array_accesorios_act_ext[$i][5];
							$strSQL.=",'".$array_accesorios_act_ext[$i][1]."'";
							$strSQL.=",'".$array_accesorios_act_ext[$i][2]."'";
							$strSQL.=",'".$array_accesorios_act_ext[$i][3]."'";
							$strSQL.=",getdate()"; 
							$strSQL.=",'1'";
							$strSQL.=")";
							//echo $strSQL;
							$proveedor_insert->execute($strSQL);
						}else{
							//Modifica
							$proveedor_update = new Proveedor('sqlserver', 'activos');
							$proveedor_update->connect();
							$strSQL="update siga_det_accesorios_act_ext ";
							$strSQL.=" set Nombre_Ext='".$array_accesorios_act_ext[$i][0]."'"; 
							$strSQL.=" 		 ,Cantidad_Ext=".$array_accesorios_act_ext[$i][5]; 
							$strSQL.=" 		 ,Marca_Ext='".$array_accesorios_act_ext[$i][1]."'"; 
							$strSQL.=" 		 ,Modelo_Ext='".$array_accesorios_act_ext[$i][2]."'"; 
							$strSQL.=" 		 ,No_Serie_Ext='".$array_accesorios_act_ext[$i][3]."'"; 
							$strSQL.=" 		 ,Fech_Mod_Ext=getdate()"; 
							$strSQL.=" 		 ,Estatus_Reg_Ext='2'"; 
							$strSQL.=" where ";
							$strSQL.=" Id_Accesorio_Ext=".$array_accesorios_act_ext[$i][4]; 
							//echo $strSQL;
							$proveedor_update->execute($strSQL);
						}
					}
				}
				
				//Elimina Accesorios
				if(count($array_eliminados_act_ext)>0){
					for($k=0; $k<count($array_eliminados_act_ext); $k++){
						//Modifica
						$proveedor_delete = new Proveedor('sqlserver', 'activos');
						$proveedor_delete->connect();
						$strSQL="update siga_det_accesorios_act_ext ";
						$strSQL.=" set Fech_Mod_Ext=getdate()"; 
						$strSQL.=" 		 ,Estatus_Reg_Ext='3'"; 
						$strSQL.=" where ";
						$strSQL.=" Id_Accesorio_Ext=".$array_eliminados_act_ext[$k]; 
						//echo $strSQL;
						$proveedor_delete->execute($strSQL);
					}
				}
				
			}else{
				$Error=true;
			}
			$proveedor->close();
		}else{
			$Error=true;
		}
		
		
		
		
		
		if($Error==false){
			$respuesta = array("totalCount" => "1", "estatus" => "ok", "mensaje" => "Se ha actualizado el registro correctamente");
		}else{
			$respuesta = array("totalCount" => "0", "estatus" => "ok", "mensaje" => "Ocurrio un error al actualizar información");
		}
		
		
		
		if($Id_Usuario!=""){
			if($Id_Cirugia!=""){
				$proveedorusr = new Proveedor('sqlserver', 'activos');
				$proveedorusr->connect();
				$sql="
					select (select top 1 usuario_sistema_hospitalario from empleados_chs where siga_usuarios.No_Usuario=empleados_chs.num_empleado) as usuario_assist 
					from siga_usuarios 
					where Id_Usuario=".$Id_Usuario."
				";
				
				$proveedorusr->execute($sql);
				
				if (!$proveedorusr->error()){
					//La posicion cero no se toma
					if ($proveedorusr->rows($proveedorusr->stmt) > 0) {
						while ($row_c = $proveedorusr->fetch_array($proveedorusr->stmt, 0)) {
							$usuario_assist=$row_c["usuario_assist"];
							$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_recepcion_equipo.php?key='.$Id_Solicitud.'&tipo=3">'.$Id_Solicitud.'</a>/Recepción de Equipo';
							$this->insert_gtiqx($Id_Cirugia, $comentario, $usuario_assist, "N");		
						}
					}	
				}
			}
		}
		
		
		
		
		return $respuesta;
	}
	
	public function Accesorios_Ext($Id_Solicitud, $proveedor=null){
	
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	if($Id_Solicitud!=""){
		$sql="
			select * from siga_det_accesorios_act_ext where Estatus_Reg_Ext<>'3' and Id_Solicitud_Ext=".$Id_Solicitud."
		";
	}
	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Id_Accesorio_Ext"=>$row_c["Id_Accesorio_Ext"],
					"Id_Solicitud_Ext"=>$row_c["Id_Solicitud_Ext"],
					"Cantidad_Ext" => $row_c["Cantidad_Ext"],
					"Nombre_Ext" => $row_c["Nombre_Ext"],
					"Marca_Ext"=>$row_c["Marca_Ext"],
					"Modelo_Ext"=>$row_c["Modelo_Ext"],
					"No_Serie_Ext" => $row_c["No_Serie_Ext"],
					"Fech_Inser_Ext"=>$row_c["Fech_Inser_Ext"],
					"Fech_Mod_Ext"=>$row_c["Fech_Mod_Ext"],
					"Estatus_Reg_Ext" => $row_c["Estatus_Reg_Ext"]
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


public function consulta_gtiqx($Id_Cirugia, $proveedor=null){
	
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'gtiqx');
	$proveedor->connect();
	
	if($Id_Cirugia!=""){
		$sql="
			select
			hoschd.consecutivo
			,hosccd.cirugia as cie9
			,hoschd.nombre as paciente
			,hoschd.cirujano as num_cirujano
			,hoschd.nombrecirujano
			,hosccd.descripcion as procedimiento
			,hoschd.cuarto as quirofano
			,hoschd.fechacirugia
			,hoschd.horainicio
			from
			tcadbchs.dbo.hoschd
			left outer join
			tcadbchs.dbo.hosccd
			on
			hoschd.consecutivo = hosccd.consecutivo
			where
			hoschd.consecutivo = ".$Id_Cirugia."
		";
	}
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Fecha=$row_c["fechacirugia"];
				$Fecha=$Fecha[0]."".$Fecha[1]."".$Fecha[2]."".$Fecha[3]."/".$Fecha[4]."".$Fecha[5]."/".$Fecha[6]."".$Fecha[7];
				$Hora=$row_c["horainicio"];
				$Hora=$Hora[0]."".$Hora[1].":".$Hora[2]."".$Hora[3];
				$Data= array(
					"consecutivo"=>$row_c["consecutivo"],
					"paciente"=>$row_c["paciente"],
					"num_cirujano"=>$row_c["num_cirujano"],
					"nombrecirujano"=>$row_c["nombrecirujano"],
					"cie9"=>$row_c["cie9"],
					"procedimiento" => $row_c["procedimiento"],
					"quirofano" => $row_c["quirofano"],
					"fechacirugia"=>$Fecha,
					"horainicio"=>$Hora
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
	
public function updateSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor=null){
$Siga_solicitud_ticketsDao = new Siga_solicitud_ticketsDAO();
//$tmpDto = new Siga_solicitud_ticketsDTO();
//$tmpDto = $Siga_solicitud_ticketsDao->selectSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor);
//if($tmpDto!=""){//$Siga_solicitud_ticketsDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());


//$log = new Logger();
//$log->w_onError("1234");

//Actualizo Estatus en el inventario, cuando se cierra la mesa de ayuda
if($Siga_solicitud_ticketsDto->getId_Activo()!=""){
	if($Siga_solicitud_ticketsDto->getEstatus_Proceso()==3){
		if($Siga_solicitud_ticketsDto->getId_Est_Equipo()!=""){
			$proveedor_act_est = new Proveedor('sqlserver', 'activos');
			$proveedor_act_est->connect();
			$sql="update siga_activos set Id_Situacion_Activo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." where Id_Activo=".$Siga_solicitud_ticketsDto->getId_Activo();
			$proveedor_act_est->execute($sql);
			if (!$proveedor_act_est->error()){
			//		
			}
		}
	}
}else{
	if($Siga_solicitud_ticketsDto->getEstatus_Proceso()==3){
		if($Siga_solicitud_ticketsDto->getId_Est_Equipo()!=""){
			$proveedor_act_est = new Proveedor('sqlserver', 'activos');
			$proveedor_act_est->connect();
			$sql="update siga_activos set Id_Situacion_Activo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." where Id_Activo=(select top 1 Id_Activo from siga_solicitud_tickets where Id_Solicitud=".$Siga_solicitud_ticketsDto->getId_Solicitud()." and Id_Activo is not null and Id_Activo<>'' )";
			$proveedor_act_est->execute($sql);
			if (!$proveedor_act_est->error()){
			//		
			}
		}
	}
}
//Fin Actualiza Estatus en el Inventario



if($Siga_solicitud_ticketsDto->getId_Activo()!=""){
	$Nombre_Activo="";
	//Datos del Activo
	$Siga_activosDto = new Siga_activosDTO();
	$Siga_activosDao = new Siga_activosDAO();
	$Siga_activosDto->setId_Activo($Siga_solicitud_ticketsDto->getId_Activo());
	$orden="";
	$Siga_activosDto = $Siga_activosDao->selectSiga_activos($Siga_activosDto,$orden,$proveedor=null);
	if($Siga_activosDto!=""){
		$Nombre_Activo=$Siga_activosDto[0]->getNombre_Activo();
		$Siga_solicitud_ticketsDto->setAF_BC_Ext($Siga_activosDto[0]->getAF_BC());
		$Siga_solicitud_ticketsDto->setNombre_Act_Ext($Siga_activosDto[0]->getNombre_Activo());
		$Siga_solicitud_ticketsDto->setMarca_Act_Ext($Siga_activosDto[0]->getMarca());
		$Siga_solicitud_ticketsDto->setModelo_Act_Ext($Siga_activosDto[0]->getModelo());
		$Siga_solicitud_ticketsDto->setNo_Serie_Act_Ext($Siga_activosDto[0]->getNumSerie());
		if($Siga_activosDto[0]->getId_Ubic_Prim()!=""){
			$Siga_solicitud_ticketsDto->setId_Ubic_Prim($Siga_activosDto[0]->getId_Ubic_Prim());
		}
		if($Siga_activosDto[0]->getId_Ubic_Sec()!=""){
			$Siga_solicitud_ticketsDto->setId_Ubic_Sec($Siga_activosDto[0]->getId_Ubic_Sec());
		}
		//$Siga_solicitud_ticketsDto->setEmpresa_Ext($Siga_activosDto[0]->getEmpresa_Ext());
		//$Siga_solicitud_ticketsDto->setNombre_Completo_Ext($Siga_activosDto[0]->getNombre_Completo_Ext());
		//$Siga_solicitud_ticketsDto->setTelefono_Ext($Siga_activosDto[0]->getTelefono_Ext());
		//$Siga_solicitud_ticketsDto->setCorreo_Ext($Siga_activosDto[0]->getCorreo_Ext());
		
	}
	//Datos del Activo
}

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsDao->updateSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor);
if($Siga_solicitud_ticketsDto!=""){
	if($Siga_solicitud_ticketsDto[0]->getId_Cirugia()!=""){
		//Si el Ticket esta en seguimiento y lo toma un gestor
		if($Siga_solicitud_ticketsDto[0]->getId_Estatus_Proceso()==2&&$Siga_solicitud_ticketsDto[0]->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto[0]->getNombre_Act_Ext()==""){
			$proveedorusr = new Proveedor('sqlserver', 'activos');
			$proveedorusr->connect();
			$sql="select top 1 Nombre_Usuario from siga_usuarios where Id_Usuario=".$Siga_solicitud_ticketsDto[0]->getId_Gestor();
			$proveedorusr->execute($sql);
			if (!$proveedorusr->error()){
				//La posicion cero no se toma
				if ($proveedorusr->rows($proveedorusr->stmt) > 0) {
					while ($row_c = $proveedorusr->fetch_array($proveedorusr->stmt, 0)) {
						$usuario=$row_c["Nombre_Usuario"];
						$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'&tab=1">'.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'</a>/En Seguimiento/Gestor: '.$usuario;
						$this->insert_gtiqx($Siga_solicitud_ticketsDto[0]->getId_Cirugia(), $comentario, $Siga_solicitud_ticketsDto[0]->getGestor_Assist(), "N");	
					}
				}	
			}
		}else{
			if($Siga_solicitud_ticketsDto[0]->getId_Estatus_Proceso()==3&&$Siga_solicitud_ticketsDto[0]->getId_Gestor()!=""){
				$proveedorusr = new Proveedor('sqlserver', 'activos');
				$proveedorusr->connect();
				$sql="select top 1 Nombre_Usuario from siga_usuarios where Id_Usuario=".$Siga_solicitud_ticketsDto[0]->getId_Gestor();
				$proveedorusr->execute($sql);
				if (!$proveedorusr->error()){
					//La posicion cero no se toma
					if ($proveedorusr->rows($proveedorusr->stmt) > 0) {
						while ($row_c = $proveedorusr->fetch_array($proveedorusr->stmt, 0)) {
							$usuario=$row_c["Nombre_Usuario"];
							$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'&tab=2">'.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'</a>/En Proceso de Cierre';
							$this->insert_gtiqx($Siga_solicitud_ticketsDto[0]->getId_Cirugia(), $comentario, $Siga_solicitud_ticketsDto[0]->getGestor_Assist(), "N");	
						}
					}
				}
			}
			
			if($Siga_solicitud_ticketsDto[0]->getId_Estatus_Proceso()==4&&$Siga_solicitud_ticketsDto[0]->getId_Usuario()!=""){
				$proveedorusr = new Proveedor('sqlserver', 'activos');
				$proveedorusr->connect();
				$sql="select top 1 Nombre_Usuario from siga_usuarios where Id_Usuario=".$Siga_solicitud_ticketsDto[0]->getId_Usuario();
				$proveedorusr->execute($sql);
				if (!$proveedorusr->error()){
					//La posicion cero no se toma
					if ($proveedorusr->rows($proveedorusr->stmt) > 0) {
						while ($row_c = $proveedorusr->fetch_array($proveedorusr->stmt, 0)) {
							$usuario=$row_c["Nombre_Usuario"];
							$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/controladores/activos/siga_solicitud_tickets/Reporte-Ticket.php?Id_Solicitud='.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'">'.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'</a>/Calificación de Ticket';
							$this->insert_gtiqx($Siga_solicitud_ticketsDto[0]->getId_Cirugia(), $comentario, $Siga_solicitud_ticketsDto[0]->getUsuario_Assist(), "N");	
						}
					}
				}
			}
			
			
			
			
			
			
			////Si esta en estatus procesos 2 con un gestor y se agrega un activo externo o interno
			//if($Siga_solicitud_ticketsDto[0]->getId_Estatus_Proceso()==2&&$Siga_solicitud_ticketsDto[0]->getId_Gestor()!=""&&$Siga_solicitud_ticketsDto[0]->getNombre_Act_Ext()!=""){
			//	if($Siga_solicitud_ticketsDto[0]->getActivo_Externo()==0){//Activo Interno
			//		$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'&tab=1">'.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'</a>/Se Agrego Activo Interno/Nombre Activo: '.$Nombre_Activo;
			//		$this->insert_gtiqx($Siga_solicitud_ticketsDto[0]->getId_Cirugia(), $comentario, $Siga_solicitud_ticketsDto[0]->getGestor_Assist(), "N");		
			//	}else {
			//		if($Siga_solicitud_ticketsDto[0]->getActivo_Externo()==1){//Activo Externo
			//			$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'&tab=1">'.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'</a>/Se Agrego Activo Externo/Nombre Activo: '.$Nombre_Activo;
			//			$this->insert_gtiqx($Siga_solicitud_ticketsDto[0]->getId_Cirugia(), $comentario, $Siga_solicitud_ticketsDto[0]->getGestor_Assist(), "N");		
			//		}
			//	}
			//}else{
			//	//Si esta en estatus procesos 1 sin ningun gestor y se agrega un activo externo o interno
			//	if($Siga_solicitud_ticketsDto[0]->getId_Estatus_Proceso()==1&&$Siga_solicitud_ticketsDto[0]->getId_Gestor()==""&&$Siga_solicitud_ticketsDto[0]->getNombre_Act_Ext()!=""){
			//		if($Siga_solicitud_ticketsDto[0]->getActivo_Externo()==0){//Activo Interno
			//			$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'&tab=1">'.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'</a>/Se Agrego Activo Interno/Nombre Activo: '.$Nombre_Activo;
			//			$this->insert_gtiqx($Siga_solicitud_ticketsDto[0]->getId_Cirugia(), $comentario, $Siga_solicitud_ticketsDto[0]->getGestor_Assist(), "N");		
			//		}else {
			//			if($Siga_solicitud_ticketsDto[0]->getActivo_Externo()==1){//Activo Externo
			//				$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'&tab=1">'.$Siga_solicitud_ticketsDto[0]->getId_Solicitud().'</a>/Se Agrego Activo Externo/Nombre Activo: '.$Nombre_Activo;
			//				$this->insert_gtiqx($Siga_solicitud_ticketsDto[0]->getId_Cirugia(), $comentario, $Siga_solicitud_ticketsDto[0]->getGestor_Assist(), "N");		
			//			}
			//		}
			//	}
			//}
		}
	}
}

return $Siga_solicitud_ticketsDto;
//}
//return "";
}
public function deleteSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor=null){
//$Siga_solicitud_ticketsDto=$this->validarSiga_solicitud_tickets($Siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsDao = new Siga_solicitud_ticketsDAO();
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsDao->deleteSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor);
return $Siga_solicitud_ticketsDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search,$Id_Estatus_Proceso, $siga_solicitud_ticketsDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor, $Medio_de_Envio, $EsApp, $Todos_Tickets, $Tickets_SLA_Vencidos) {
//echo 1;
//print_r($siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsDao = new Siga_solicitud_ticketsDAO();
return $Siga_solicitud_ticketsDao->llenarDataTable($draw, $columns, $order, $start, $length, $search,$Id_Estatus_Proceso, $siga_solicitud_ticketsDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor, $Medio_de_Envio, $EsApp, $Todos_Tickets, $Tickets_SLA_Vencidos);
}

public function grafica_servicios_registrados($Siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	if($Fecha_Inicial!=""&&$Fecha_Final!=""){
		//Grafica Sservicios Registrados
		//--ORDER BY A.Tipo_Actividad
		$sql="SELECT A.Tipo_Actividad, 
			CASE 
				WHEN A.Tipo_Actividad='1' then 'Mantenimiento Predictivo'
				WHEN A.Tipo_Actividad='2' then 'Mantenimiento Preventivo'
				WHEN A.Tipo_Actividad='3' then 'Mantenimiento Correctivo'
				WHEN A.Tipo_Actividad='4' then 'Capacitaciones'
			END AS Desc_Tipo_Actividad,
			COUNT(A.Tipo_Actividad) AS RecuentoFilas
			FROM siga_solicitud_tickets S
			left join siga_actividades A on S.Id_Actividad=A.Id_Actividad
			WHERE S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' 
			AND S.Estatus_Reg<>'3' and rtrim(ltrim(S.Id_Actividad)) <> ''
			AND FORMAT(S.Fech_Solicitud  ,'dd/MM/yyyy')between convert(date,'".$Fecha_Inicial."') and convert(date,'".$Fecha_Final."')
			GROUP BY A.Tipo_Actividad
			HAVING COUNT(*) > 0
			UNION
			select '0' as Tipo_Actividad,'Solicitud Tickets' as Desc_Tipo_Actividad,COUNT(*) as RecuentoFilas from siga_solicitud_tickets 
			where Estatus_Reg <> '3' and Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' 
			and Id_Actividad is null 
			and FORMAT(Fech_Solicitud  ,'dd/MM/yyyy') between convert(date,'".$Fecha_Inicial."') and convert(date,'".$Fecha_Final."')
			HAVING COUNT(*) > 0
			order by RecuentoFilas asc
		";
	}
	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total=$Total+$row_c["RecuentoFilas"];
				
				$Data= array(
					"Tipo_Actividad"=>$row_c["Tipo_Actividad"],
					"Desc_Tipo_Actividad"=>$row_c["Desc_Tipo_Actividad"],
					"RecuentoFilas" => $row_c["RecuentoFilas"],
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

public function tabla_servicios_registrados($Siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Tipo_Actividad, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	//Tabla Sservicios Registrados
	if($Fecha_Inicial!=""&&$Fecha_Final!=""){
		$sql="SELECT 
			Sec.Desc_Seccion,
			S.Titulo, 
			S.Desc_Motivo_Reporte, 
			Act. Nombre_Activo, 
			Act.Marca, 
			Act.Modelo, 
			Act.NumSerie ,
			Cat.Desc_Categoria,
			Sub.Desc_Subcategoria,
			Ges.Nombre_Usuario as Gestor,
			CASE 
				when S.Prioridad='1' then 'Alta'
				when S.Prioridad='2' then 'Media'
				when S.Prioridad='3' then 'Baja' 
			END  Desc_Prioridad,
			EstP.Desc_Proceso,
			Fech_Solicitud
			from siga_solicitud_tickets S
			left join siga_actividades A on S.Id_Actividad=A.Id_Actividad
			left join siga_cat_ticket_seccion Sec on S.Seccion=Sec.Id_Seccion
			left join siga_cat_ticket_categoria Cat on S.Id_Categoria=Cat.Id_Categoria
			left join siga_cat_ticket_subcategoria Sub on S.Id_Subcategoria=Sub.Id_Subcategoria
			left join siga_usuarios Ges on S.Id_Gestor=Ges.Id_Usuario
			left join siga_activos Act on S.Id_Activo=Act.Id_Activo
			left join siga_cat_ticket_proceso EstP on S.Estatus_Proceso=EstP.Id_Estatus_Proceso
			where S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' 
			and S.Estatus_Reg<>'3'";
			if($Tipo_Actividad!="0"){
			$sql.=" and rtrim(ltrim(S.Id_Actividad)) <> ''
			and A.Tipo_Actividad='".$Tipo_Actividad."' ";
			}else{
			$sql.=" and rtrim(ltrim(S.Id_Actividad)) is null ";
			}
			$sql.=" and FORMAT(S.Fech_Solicitud  ,'dd/MM/yyyy')
			between convert(date,'".$Fecha_Inicial."') and convert(date,'".$Fecha_Final."')
		";
		
		
	}
	
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				$Data= array(
					"Desc_Seccion"=>$row_c["Desc_Seccion"],
					"Titulo"=>$row_c["Titulo"],
					"Desc_Motivo_Reporte" => $row_c["Desc_Motivo_Reporte"],
					"Nombre_Activo" => $row_c["Nombre_Activo"],
					"Marca" => $row_c["Marca"],
					"Modelo" => $row_c["Modelo"],
					"NumSerie" => $row_c["NumSerie"],
					"Desc_Categoria" => $row_c["Desc_Categoria"],
					"Desc_Subcategoria" => $row_c["Desc_Subcategoria"],
					"Gestor" => $row_c["Gestor"],
					"Desc_Prioridad" => $row_c["Desc_Prioridad"],
					"Desc_Proceso" => $row_c["Desc_Proceso"],
					"Fech_Solicitud" => $row_c["Fech_Solicitud"]
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


///////////////////////////IMG ADJUNTAS APP//////////////////////////////////////////////////////
public function Archivos_Adjuntos($Siga_solicitud_ticketsDto, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	
	
	
	$sql="
		select Archivo_Binario, Archivo_Binario2, Archivo_Binario3, Archivo_Binario4  from siga_solicitud_tickets where Id_Solicitud='".$Siga_solicitud_ticketsDto->getId_Solicitud()."' AND Estatus_Reg<>'3'
	";
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Archivo_Binario"=>$row_c["Archivo_Binario"],
					"Archivo_Binario2"=>$row_c["Archivo_Binario2"],
					"Archivo_Binario3" => $row_c["Archivo_Binario3"],
					"Archivo_Binario4" => $row_c["Archivo_Binario4"]
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

public function Archivos_Chat($Siga_solicitud_ticketsDto, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	
	
	
	$sql="
		select * from siga_cat_ticket_adjuntos where Id_Chat in(
		select Id_Chat from siga_ticket_chat where Id_Solicitud='".$Siga_solicitud_ticketsDto->getId_Solicitud()."' and Estatus_Reg<>'3' and Url_Adjunto is not null
		) and (Url_Adjunto like '%.png%' or Url_Adjunto like '%.jpg%')
	";
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Url_Adjunto"=>rtrim(ltrim($row_c["Url_Adjunto"])),
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

//////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////INDICADORES//////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

//Grafica 1
public function indicadores_mesa_ayuda($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql_search="";
	
	if(($Ubic_Prim!="-1")||($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" and ";
	}
	
	if(($Ubic_Prim!="-1")){
		$sql_search.=" SA.Id_Ubic_Prim='".$Ubic_Prim."'";
		if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Ubic_Sec!="-1")){
		$sql_search.=" SA.Id_Ubic_Sec='".$Ubic_Sec."'";
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clase!="-1")){
		$sql_search.=" SA.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" SA.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" SA.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" SA.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" A.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
	}
	
	
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" A.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}
	
	//$sql="
	//	--Grafica Indicadores Mesa de Ayuda (Nuevos, Seguimiento, Espera de Cierre, Cerrados)				
	//	select top 1
	//	(select count(*) as Total_Nuevos from siga_solicitud_tickets A 
	//	left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
	//	where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
	//	and A.Estatus_Proceso='1'
	//	and year(A.Fech_Solicitud)=".$Anio." ) as Total_Nuevos,
	//	(select count(*) as Total_Seguimiento from siga_solicitud_tickets A 
	//	left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
	//	where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
	//	and A.Estatus_Proceso='2'
	//	and year(A.Fech_Seguimiento)=".$Anio." ) as Total_Seguimiento,
	//	(select count(*) as Total_Espera_Cierre from siga_solicitud_tickets A 
	//	left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
	//	where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
	//	and A.Estatus_Proceso='3'
	//	and year(A.Fech_Espera_Cierre)=".$Anio." ) as Total_Espera_Cierre,
	//	(select count(*) a_Excelente=0;$Tiempo_Reicitud_tickets A 
	//	left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
	//	where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
	//	and A.Estatus_Proceso='4'
	//	and year(A.Fech_Cierre)=".$Anio." ) as Total_Cierre
	//	from siga_solicitud_tickets
	//";
	
	$sql="
		--Grafica Indicadores Mesa de Ayuda (Nuevos, Seguimiento, Espera de Cierre, Cerrados)				
		select top 1
		(select count(*) as Total_Nuevos from siga_solicitud_tickets A 
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
		where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and A.Estatus_Proceso='1'
		and year(A.Fech_Solicitud)=".$Anio; if($Mes!="Anual"){$sql.=" and month(A.Fech_Solicitud)=".$Mes; }
	$sql.="	) as Total_Nuevos,
		(select count(*) as Total_Seguimiento from siga_solicitud_tickets A 
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
		where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and A.Estatus_Proceso='2'
		and year(A.Fech_Seguimiento)=".$Anio; if($Mes!="Anual"){$sql.=" and month(A.Fech_Seguimiento)=".$Mes; } 
	$sql.="	) as Total_Seguimiento,
		(select count(*) as Total_Espera_Cierre from siga_solicitud_tickets A 
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
		where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and A.Estatus_Proceso='3'
		and year(A.Fech_Espera_Cierre)=".$Anio; if($Mes!="Anual"){$sql.=" and month(A.Fech_Espera_Cierre)=".$Mes; }
	$sql.="	) as Total_Espera_Cierre,
		(select count(*) as Total_Cierre from siga_solicitud_tickets A 
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
		where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and A.Estatus_Proceso='4'
		and year(A.Fech_Cierre)=".$Anio; if($Mes!="Anual"){$sql.=" and month(A.Fech_Cierre)=".$Mes; }
	$sql.="	) as Total_Cierre
		from siga_solicitud_tickets
	";
	$proveedor->execute($sql);
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Total_Nuevos"=>$row_c["Total_Nuevos"],
					"Total_Seguimiento"=>$row_c["Total_Seguimiento"],
					"Total_Espera_Cierre" => $row_c["Total_Espera_Cierre"],
					"Total_Cierre" => $row_c["Total_Cierre"]
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

//Fin Grafica 1

//Grafica 2
public function indicador_servicios_registrados($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql_search="";
	
	if(($Ubic_Prim!="-1")||($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" and ";
	}
	
	if(($Ubic_Prim!="-1")){
		$sql_search.=" SA.Id_Ubic_Prim='".$Ubic_Prim."'";
		if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Ubic_Sec!="-1")){
		$sql_search.=" SA.Id_Ubic_Sec='".$Ubic_Sec."'";
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clase!="-1")){
		$sql_search.=" SA.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" SA.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" SA.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" SA.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" A.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
		
	}
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" A.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}
	//Grafica Sservicios Registrados
	
	$sql="
		select 
		top 1
		'Mantenimiento Preventivo' as Desc_Tipo_Actividad, '2' as Tipo_Actividad,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=01 
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Enero,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=02
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Febrero,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=03
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Marzo,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=04
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Abril,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=05
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Mayo,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=06
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Junio,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=07
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Julio,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=08
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Agosto,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=09
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Septiembre,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=10
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Octubre,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=11
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Noviembre,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=12
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Diciembre
		from siga_actividades
		union
		select 
		top 1
		'Mantenimiento Correctivo' as Desc_Tipo_Actividad, '3' as Tipo_Actividad,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=01 
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Enero,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=02
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Febrero,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=03
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Marzo,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=04
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Abril,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=05
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Mayo,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=06
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Junio,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=07
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Julio,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=08
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Agosto,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=09
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Septiembre,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=10
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Octubre,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=11
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Noviembre,
		(select count(*) as Total from siga_solicitud_tickets A 
			left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
			where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' 
			and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=12
			and Id_Subcategoria in(
				select 
				--sc.Id_Seccion, ss.Id_Categoria, 
				ss.Id_Subcategoria
				--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
				from siga_cat_ticket_subcategoria ss
				left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
				left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
				where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
				--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
			) ".$sql_search.$sql_search_mesa_ayuda."
		) as Diciembre
		from siga_actividades
		
		union
		select 
		top 1
		'Mesa de Ayuda' as Desc_Tipo_Actividad, '0' as Tipo_Actividad,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=01 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Enero,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=02 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Febrero,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=03 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Marzo,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=04 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Abril,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=05 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Mayo,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=06 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Junio,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=07 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Julio,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=08 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Agosto,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=09 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Septiembre,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=10 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Octubre,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=11 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Noviembre,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Cierre)=".$Anio." and month(A.Fech_Cierre)=12 
		and (A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		) or A.Id_Subcategoria is null)
		) as Diciembre
		from siga_actividades
	";
	
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	/*$sql="
		select 
		top 1
		'Mantenimiento Preventivo' as Desc_Tipo_Actividad, '2' as Tipo_Actividad,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=01) as Enero,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=02) as Febrero, 
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=03) as Marzo,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=04) as Abril,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=05) as Mayo,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=06) as Junio,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=07) as Julio,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=08) as Agosto,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=09) as Septiembre,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=10) as Octubre,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=11) as Noviembre,
		(select count(*) as Total from 
		(select A.Id_Actividad,convert(date,(substring(DA.Fecha_Programada,1,4)+'-'+substring(DA.Fecha_Programada,5,2)+'-'+substring(DA.Fecha_Programada,7,2))) as Fecha_Programada 
		from siga_actividades 
		A left join
		siga_det_actividades DA on A.Id_Actividad=DA.Id_Actividad and DA.Estatus_Reg<>'3' and Num_Actividad='1'
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='2' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		) Siga_Actividades where year(Fecha_Programada)=".$Anio." and month(Fecha_Programada)=12) as Diciembre
		from siga_actividades
		union
		select 
		top 1
		'Mantenimiento Correctivo' as Desc_Tipo_Actividad, '3' as Tipo_Actividad,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=01) as Enero,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=02) as Febrero,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=03) as Marzo,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=04) as Abril,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=05) as Mayo,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=06) as Junio,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=07) as Julio,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=08) as Agosto,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=09) as Septiembre,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=10) as Octubre,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=11) as Noviembre,
		(select count(*) as Total from (select convert(date,(substring(Fecha_Realizada,1,4)+'-'+substring(Fecha_Realizada,5,2)+'-'+substring(Fecha_Realizada,7,2))) as Fecha_Realizada  
		from siga_actividades A
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo
		where A.Tipo_Actividad='3' and A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg <>'3' and rtrim(ltrim(Fecha_Realizada))  is not null and Fecha_Realizada<>'' ".$sql_search.") 
		siga_actividades where year(Fecha_Realizada)=".$Anio." and month(Fecha_Realizada)=12) as Diciembre
		from siga_actividades
		
		union
		select 
		top 1
		'Mesa de Ayuda' as Desc_Tipo_Actividad, '0' as Tipo_Actividad,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=01 and Id_Actividad is null) as Enero,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=02 and Id_Actividad is null) as Febrero,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=03 and Id_Actividad is null) as Marzo,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=04 and Id_Actividad is null) as Abril,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=05 and Id_Actividad is null) as Mayo,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=06 and Id_Actividad is null) as Junio,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=07 and Id_Actividad is null) as Julio,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=08 and Id_Actividad is null) as Agosto,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=09 and Id_Actividad is null) as Septiembre,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=10 and Id_Actividad is null) as Octubre,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=11 and Id_Actividad is null) as Noviembre,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=12 and Id_Actividad is null) as Diciembre
		from siga_actividades
	";*/
	$proveedor->execute($sql);
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	$Enero=0; $Febrero=0; $Marzo=0; $Abril=0; $Mayo=0; $Junio=0; $Julio=0; $Agosto=0; $Septiembre=0; $Octubre=0; $Noviembre=0; $Diciembre=0;
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Enero=$Enero + $row_c["Enero"]; $Febrero=$Febrero + $row_c["Febrero"]; $Marzo=$Marzo + $row_c["Marzo"]; 
				$Abril=$Abril + $row_c["Abril"]; $Mayo=$Mayo + $row_c["Mayo"]; $Junio=$Junio + $row_c["Junio"]; 
				$Julio=$Julio + $row_c["Julio"]; $Agosto=$Agosto + $row_c["Agosto"]; $Septiembre=$Septiembre + $row_c["Septiembre"];
				$Octubre=$Octubre + $row_c["Octubre"]; $Noviembre=$Noviembre + $row_c["Noviembre"]; $Diciembre=$Diciembre + $row_c["Diciembre"];
				$Data= array(
					"Desc_Tipo_Actividad"=>$row_c["Desc_Tipo_Actividad"],
					"Tipo_Actividad"=>$row_c["Tipo_Actividad"],
					"Enero" => $row_c["Enero"],
					"Febrero" => $row_c["Febrero"],
					"Marzo" => $row_c["Marzo"],
					"Abril" => $row_c["Abril"],
					"Mayo" => $row_c["Mayo"],
					"Junio" => $row_c["Junio"],
					"Julio" => $row_c["Julio"],
					"Agosto" => $row_c["Agosto"],
					"Septiembre" => $row_c["Septiembre"],
					"Octubre" => $row_c["Octubre"],
					"Noviembre" => $row_c["Noviembre"],
					"Diciembre" => $row_c["Diciembre"],
				);
				array_push($Data_Envia, $Data);
			}
			
			//Array que obtiene los totales
			$Data= array(
				"Desc_Tipo_Actividad"=>"Total",
				"Tipo_Actividad"=>0,
				"Enero" => $Enero,
				"Febrero" => $Febrero,
				"Marzo" => $Marzo,
				"Abril" => $Abril,
				"Mayo" => $Mayo,
				"Junio" => $Junio,
				"Julio" => $Julio,
				"Agosto" => $Agosto,
				"Septiembre" => $Septiembre,
				"Octubre" => $Octubre,
				"Noviembre" => $Noviembre,
				"Diciembre" => $Diciembre,
			);
			array_push($Data_Envia, $Data);
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

//Fin Grafica 2
public function barra_indicador_reportes_por_area($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql_search="";
	
	if(($Ubic_Prim!="-1")||($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" and ";
	}
	
	if(($Ubic_Prim!="-1")){
		$sql_search.=" SA.Id_Ubic_Prim='".$Ubic_Prim."'";
		if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Ubic_Sec!="-1")){
		$sql_search.=" SA.Id_Ubic_Sec='".$Ubic_Sec."'";
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	
	if(($Clase!="-1")){
		$sql_search.=" SA.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" SA.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" SA.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" SA.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" SS.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
	}
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}
	
	$sql="select distinct gerencia from empleados_chs where estatus in(1,3) and gerencia is not null order by gerencia ";
	//$sql=" select * from siga_cat_ubic_prim where Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Estatus_Reg<>'3' ";
	//if($Ubic_Prim!="-1"){
	//	$sql.=" and Id_Ubic_Prim=".$Ubic_Prim;	
	//}
	
	
	
	
	$proveedor->execute($sql);
	
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total_Asistencia=0;
				$Total_Asistencia_Sin_Activo=0;
				$Total_Preventivo=0;
				$Total_Correctivo=0;
				
				//Asistencias
				$proveedor_T_As = new Proveedor('sqlserver', 'activos');
				$proveedor_T_As->connect();
				$sql="
					select count(SS.Id_Solicitud) as Total_Asistencia from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
					left join empleados_chs emp on SU.No_Usuario = emp.num_empleado
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and gerencia='".$row_c["gerencia"]."' and SS.Estatus_Reg<>'3' 
					and year(SS.Fech_Cierre)=".$Anio." and month(SS.Fech_Cierre)=".$Mes." 
					and (SS.Id_Subcategoria not in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					) or SS.Id_Subcategoria is null)
					and Id_Actividad is null ".$sql_search.$sql_search_mesa_ayuda."
				";
				//echo "<pre>";
				//echo $sql;
				//echo "</pre>";
				$proveedor_T_As->execute($sql);
				if(!$proveedor_T_As->error()){
					if ($proveedor_T_As->rows($proveedor_T_As->stmt) > 0) {
						$row_T_As = $proveedor_T_As->fetch_array($proveedor_T_As->stmt, 0);
						$Total_Asistencia =$row_T_As["Total_Asistencia"];
					}
				}
				$proveedor_T_As->close();
				/////////////////////////////////////////////////////////////////////////////
				//Asistencias sin Activos
				$proveedor_T_As_Sin_Act = new Proveedor('sqlserver', 'activos');
				$proveedor_T_As_Sin_Act->connect();
				$sql="
					select 
					count(SS.Id_Solicitud) as Total_Asistencia_Sin_Activo
					from siga_solicitud_tickets SS 
					left join siga_activos SA on SS.Id_Activo=SA.Id_Activo 
					left join siga_usuarios SU on SS.Id_Usuario=SU.Id_Usuario
					left join empleados_chs EMP on SU.No_Usuario=EMP.num_empleado
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' 
					and SS.Id_Activo is null --No Viene Relacionado a un Activo 
					and Id_Actividad is null --No viene Relacionado a una Actividad
					and SS.Estatus_Reg<>'3' 
					and rtrim(ltrim(EMP.gerencia))='".$row_c["gerencia"]."'
					and (SS.Id_Subcategoria not in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					) or SS.Id_Subcategoria is null)
					and year(SS.Fech_Cierre)=".$Anio." and month(SS.Fech_Cierre)=".$Mes." ".$sql_search.$sql_search_mesa_ayuda."
				
				";
				
				//echo "<pre>";
				//echo $sql;
				//echo "</pre>";
				
				$proveedor_T_As_Sin_Act->execute($sql);
				if(!$proveedor_T_As_Sin_Act->error()){
					if ($proveedor_T_As_Sin_Act->rows($proveedor_T_As_Sin_Act->stmt) > 0) {
						$row_T_As_Sin_Act = $proveedor_T_As_Sin_Act->fetch_array($proveedor_T_As_Sin_Act->stmt, 0);
						$Total_Asistencia_Sin_Activo =$row_T_As_Sin_Act["Total_Asistencia_Sin_Activo"];
					}
				}
				$proveedor_T_As_Sin_Act->close();
				/////////////////////////////////////////////////////////////////////////////
				
				
				//Mantenimientos Preventivos
				$proveedor_T_Prev = new Proveedor('sqlserver', 'activos');
				$proveedor_T_Prev->connect();
				$sql="
					select count(SS.Id_Solicitud) as Total_Preventivo from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
					left join empleados_chs emp on SU.No_Usuario = emp.num_empleado
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and gerencia='".$row_c["gerencia"]."' and SS.Estatus_Reg<>'3' --and ACT.Tipo_Actividad='2'
					--and SS.Id_Actividad is not null and SS.Id_Actividad<>''
					and SS.Id_Subcategoria in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					)
					and year(SS.Fech_Cierre)=".$Anio." and month(SS.Fech_Cierre)=".$Mes." ".$sql_search.$sql_search_mesa_ayuda."
				";
				
				$proveedor_T_Prev->execute($sql);
				if(!$proveedor_T_Prev->error()){
					if ($proveedor_T_Prev->rows($proveedor_T_Prev->stmt) > 0) {
						$row_T_Prev = $proveedor_T_Prev->fetch_array($proveedor_T_Prev->stmt, 0);
						$Total_Preventivo =$row_T_Prev["Total_Preventivo"];
					}
				}
				$proveedor_T_Prev->close();
				/////////////////////////////////////////////////////////////////////////////
				//Mantenimientos Correctivos
				$proveedor_T_Correc = new Proveedor('sqlserver', 'activos');
				$proveedor_T_Correc->connect();
				$sql="
					select count(SS.Id_Solicitud) as Total_Correctivo from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
					left join empleados_chs emp on SU.No_Usuario = emp.num_empleado
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and gerencia='".$row_c["gerencia"]."' and SS.Estatus_Reg<>'3' --and ACT.Tipo_Actividad='3'
					--and SS.Id_Actividad is not null and SS.Id_Actividad<>''
					and SS.Id_Subcategoria in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					)
					and year(SS.Fech_Cierre)=".$Anio." and month(SS.Fech_Cierre)=".$Mes." ".$sql_search.$sql_search_mesa_ayuda."
				";
				
				
				//echo "<pre>";
				//echo $sql;
				//echo "</pre>";
				$proveedor_T_Correc->execute($sql);
				if(!$proveedor_T_Correc->error()){
					if ($proveedor_T_Correc->rows($proveedor_T_Correc->stmt) > 0) {
						$row_T_Correc = $proveedor_T_Correc->fetch_array($proveedor_T_Correc->stmt, 0);
						$Total_Correctivo =$row_T_Correc["Total_Correctivo"];
					}
				}
				$proveedor_T_Correc->close();
				/////////////////////////////////////////////////////////////////////////////
				
				
				$Data= array(
					"Id_Ubic_Prim"=>$row_c["Id_Ubic_Prim"],
					"Gerencia"=>$row_c["gerencia"],
					"Total_Asistencia_Sin_Activo"=>$Total_Asistencia_Sin_Activo,
					"Total_Asistencia"=>$Total_Asistencia,
					"Total_Preventivo"=>$Total_Preventivo,
					"Total_Correctivo"=>$Total_Correctivo
				);
				array_push($Data_Envia, $Data);
			}
			
			//Sin Area
			/*
			$proveedor_T_S_A = new Proveedor('sqlserver', 'activos');
			$proveedor_T_S_A->connect();
			$sql="
				select count(*) as Total_Asistencia_Sin_Area from siga_solicitud_tickets SS 
				left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
				where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
				and SS.Id_Activo is null 
				and  
				SS.Estatus_Reg<>'3' and 
				year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes." ".$sql_search."
				and Id_Actividad is null
			";	
			$proveedor_T_S_A->execute($sql);
			if(!$proveedor_T_S_A->error()){
				if ($proveedor_T_S_A->rows($proveedor_T_S_A->stmt) > 0) {
					$row_T_S_A = $proveedor_T_S_A->fetch_array($proveedor_T_S_A->stmt, 0);
					$Total_Preventivo =$row_T_S_A["Total_Asistencia_Sin_Area"];
					
					$Data= array(
						"Id_Ubic_Prim"=>0,
						"Desc_Ubic_Prim"=>"Sin Area",
						"Total_Asistencia"=>$row_T_S_A["Total_Asistencia_Sin_Area"],
						"Total_Preventivo"=>0,
						"Total_Correctivo"=>0
					);
					array_push($Data_Envia, $Data);
					
				}
			}
			$proveedor_T_S_A->close();
			*/
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

//Grafica 3
public function pie_indicador_reportes_por_area($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql_search="";
	
	if(($Ubic_Prim!="-1")||($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" and ";
	}
	
	if(($Ubic_Prim!="-1")){
		$sql_search.=" SA.Id_Ubic_Prim='".$Ubic_Prim."'";
		if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Ubic_Sec!="-1")){
		$sql_search.=" SA.Id_Ubic_Sec='".$Ubic_Sec."'";
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clase!="-1")){
		$sql_search.=" SA.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" SA.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" SA.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" SA.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" SS.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
	}
	
	
	/////////FILTROS MESA DE AYUDA
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}

	
	
	$sql="
		select Gerencia, count(Gerencia) as Total_Solicitudes  from siga_solicitud_tickets SS 
		left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
		left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
		left join empleados_chs emp on SU.No_Usuario = emp.num_empleado
		where 
		SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
		and SS.Estatus_Reg<>'3' 
		and year(SS.Fech_Cierre)=".$Anio."  and month(SS.Fech_Cierre)=".$Mes.$sql_search.$sql_search_mesa_ayuda."
		GROUP BY Gerencia
		HAVING count( Gerencia ) >0
	";
	$proveedor->execute($sql);
	
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	
	
	$Total_Cantidad=0;
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total_Cantidad=$Total_Cantidad+$row_c["Total_Solicitudes"];
				$Data= array(
					"Gerencia"=>$row_c["Gerencia"],
					"Total_Solicitudes"=>$row_c["Total_Solicitudes"]
				);
				array_push($Data_Envia, $Data);
			}
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"Total_Cantidad"=>$Total_Cantidad,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	return $respuesta;
}

public function pie_indicador_reportes_por_area_ubic_sec($Siga_solicitud_ticketsDto, $Gerencia, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql_search="";
	
	if(($Ubic_Prim!="-1")||($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")){
		$sql_search.=" and ";
	}
	
	if(($Ubic_Prim!="-1")){
		$sql_search.=" SA.Id_Ubic_Prim='".$Ubic_Prim."'";
		if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Ubic_Sec!="-1")){
		$sql_search.=" SA.Id_Ubic_Sec='".$Ubic_Sec."'";
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clase!="-1")){
		$sql_search.=" SA.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" SA.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" SA.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" SA.Id_Subfamilia='".$Subfamilia."'";
		
	}
	
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}
	
	$sql="
		select Departamento, count(Departamento) as Total_Solicitudes  from siga_solicitud_tickets SS 
		left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
		left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
		left join empleados_chs emp on SU.No_Usuario = emp.num_empleado
		where 
		SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
		and SS.Estatus_Reg<>'3' and rtrim(ltrim(gerencia))=rtrim(ltrim('".$Gerencia."'))
		and year(SS.Fech_Cierre)=".$Anio."  and month(SS.Fech_Cierre)=".$Mes.$sql_search.$sql_search_mesa_ayuda."
		GROUP BY Departamento
		HAVING count( Departamento ) >0
	";
	
	$proveedor->execute($sql);
	
	$Total_Cantidad=0;
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total_Cantidad=$Total_Cantidad+$row_c["Total_Solicitudes"];
				$Data= array(
					"Departamento"=>$row_c["Departamento"],
					"Total_Solicitudes"=>$row_c["Total_Solicitudes"]
				);
				array_push($Data_Envia, $Data);
			}
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"Total_Cantidad"=>$Total_Cantidad,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	return $respuesta;
}
//Fin Grafica 3

//Grafica 4
public function pie_servicios_registrados_por_mes($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes,$proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql_search="";
	
	if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" and ";
	}
	
	
	
	if(($Clase!="-1")){
		$sql_search.=" SA.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" SA.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" SA.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" SA.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" A.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
	}
	
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" A.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" A.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}
	
	
	
	$Id_Ubic_Prim_PrevCorrec="";
	$Id_Ubic_Sec_PrevCorrec="";
	$sql_ubic_prim="";
	$sql_ubic_sec="";
	if(($Ubic_Prim!="-1")){
		$Id_Ubic_Prim_PrevCorrec.=" and SA.Id_Ubic_Prim='".$Ubic_Prim."' ";
		/////
		$Desc_Ubic_Primaria=$this->Ubicacion_Primaria($Siga_solicitud_ticketsDto, $Ubic_Prim);	
		$sql_ubic_prim.=" and (UP.Desc_Ubic_Prim is null AND rtrim(ltrim(EMP.gerencia))='".$Desc_Ubic_Primaria['data'][0]['Desc_Ubic_Prim']."' OR UP.Id_Ubic_Prim=".$Ubic_Prim.") ";
	}
	
	if(($Ubic_Sec!="-1")){
		$Id_Ubic_Sec_PrevCorrec.=" and SA.Id_Ubic_Sec='".$Ubic_Sec."' ";
		/////
		$Desc_Ubic_Secundaria=$this->Ubicacion_Secundaria($Siga_solicitud_ticketsDto, $Ubic_Sec);	
		$sql_ubic_sec.=" and (US.Desc_Ubic_Sec is null and rtrim(ltrim(EMP.departamento))='".$Desc_Ubic_Secundaria['data'][0]['Desc_Ubic_Sec']."' or US.Id_Ubic_Sec=".$Ubic_Sec.") ";
	}
	
	
	
	$Desc_Area="";
	if($Siga_solicitud_ticketsDto->getId_Area()=="1"){
		$Desc_Area="Biomedica";
	}
	if($Siga_solicitud_ticketsDto->getId_Area()=="2"){
		$Desc_Area="Tic";
	}
	if($Siga_solicitud_ticketsDto->getId_Area()=="3"){
		$Desc_Area="Mantenimiento";
	}
	if($Siga_solicitud_ticketsDto->getId_Area()=="4"){
		$Desc_Area="Mobiliario y Equipo";
	}
	
	
	//Grafica Sservicios Registrados
	$sql="
		select 
		top 1
		'Mantenimiento Preventivo' as Desc_Tipo_Actividad, '2' as Tipo_Actividad,
		(
		
		select count(*) as Total from siga_solicitud_tickets A 
		where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3'  and 
		Id_Subcategoria=318
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=".$Mes." 
		
		--select count(*) as Total from siga_solicitud_tickets A 
		--left join siga_activos SA  on A.Id_Activo=SA.Id_Activo left join siga_actividades S_ACT on A.Id_Actividad=S_ACT.Id_Actividad and S_ACT.Estatus_Reg<>3 
		--where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' and S_ACT.Tipo_Actividad=2 ".$Id_Ubic_Prim_PrevCorrec.$Id_Ubic_Sec_PrevCorrec.$sql_search.$sql_search_mesa_ayuda."
		--and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=".$Mes." and A.Id_Actividad is not null
		) as Total
		from siga_actividades
		union
		select 
		top 1
		'Mantenimiento Correctivo' as Desc_Tipo_Actividad, '3' as Tipo_Actividad,
		(
		select count(*) as Total from siga_solicitud_tickets A 
		where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3'  and 
		Id_Subcategoria=316
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=".$Mes." 
		
		--select count(*) as Total from siga_solicitud_tickets A 
		--left join siga_activos SA  on A.Id_Activo=SA.Id_Activo left join siga_actividades S_ACT on A.Id_Actividad=S_ACT.Id_Actividad and S_ACT.Estatus_Reg<>3 
		--where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' and S_ACT.Tipo_Actividad=3 ".$Id_Ubic_Prim_PrevCorrec.$Id_Ubic_Sec_PrevCorrec.$sql_search.$sql_search_mesa_ayuda."
		--and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=".$Mes." and A.Id_Actividad is not null
		) as Total
		from siga_actividades
		union
		select 
		top 1
		'Asistencia ".$Desc_Area."' as Desc_Tipo_Actividad, '-1' as Tipo_Actividad,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
		left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim 
		left join siga_cat_ubic_sec US on SA.Id_Ubic_Sec=US.Id_Ubic_Sec
		left join siga_usuarios Solic on A.Id_Usuario=Solic.Id_Usuario 
		left join empleados_chs EMP on Solic.No_Usuario=EMP.num_empleado
		where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_ubic_prim.$sql_ubic_sec.$sql_search.$sql_search_mesa_ayuda." 
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=".$Mes." and Id_Actividad is null) as Total
		from siga_actividades
	";
	$proveedor->execute($sql);
	//echo $sql;
	$Total_Cantidad=0;
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total_Cantidad=$Total_Cantidad+$row_c["Total"];
				$Data= array(
					"Desc_Tipo_Actividad"=>$row_c["Desc_Tipo_Actividad"],
					"Tipo_Actividad"=>$row_c["Tipo_Actividad"],
					"Total" => $row_c["Total"]
				);
				array_push($Data_Envia, $Data);
			}
			
		
		}	
	}else{
		$error=true;
	}
	
	$proveedor->close();
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"Total_Cantidad"=>$Total_Cantidad,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	return $respuesta;
}

public function pie_indicador_reportes_por_mes_por_area($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Tipo_Actividad, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql_search="";
	
	if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" and ";
	}
	
	//if(($Ubic_Prim!="-1")){
	//	$sql_search.=" SA.Id_Ubic_Prim='".$Ubic_Prim."'";
	//	if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
	//		$sql_search.=" and ";
	//	}
	//}
	
	if(($Ubic_Sec!="-1")){
		$sql_search.=" SA.Id_Ubic_Sec='".$Ubic_Sec."'";
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clase!="-1")){
		$sql_search.=" SA.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" SA.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" SA.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" SA.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" SS.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
	}
	
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}
	
	$Id_Ubic_Prim="";
	$sql_ubic_prim="";
	if(($Ubic_Prim!="-1")){
		$Id_Ubic_Prim.=" and SA.Id_Ubic_Prim='".$Ubic_Prim."' ";
		/////
		$Desc_Ubic_Primaria=$this->Ubicacion_Primaria($Siga_solicitud_ticketsDto, $Ubic_Prim);	
		$sql_ubic_prim.=" and (UP.Desc_Ubic_Prim is null AND rtrim(ltrim(EMP.gerencia))='".$Desc_Ubic_Primaria['data'][0]['Desc_Ubic_Prim']."' OR UP.Id_Ubic_Prim=".$Ubic_Prim.") ";
	}
	
	
	
	$Id_Ubic_Sec="";
	$sql_ubic_sec="";
	if(($Ubic_Sec!="-1")){
		$Id_Ubic_Sec.=" and SA.Id_Ubic_Sec='".$Ubic_Sec."' ";
		/////
		$Desc_Ubic_Secundaria=$this->Ubicacion_Secundaria($Siga_solicitud_ticketsDto, $Ubic_Sec);	
		$sql_ubic_sec.=" and (US.Desc_Ubic_Sec is null and rtrim(ltrim(EMP.departamento))='".$Desc_Ubic_Secundaria['data'][0]['Desc_Ubic_Sec']."' or US.Id_Ubic_Sec=".$Ubic_Sec.") ";
	}
	
	
	
	$sql_search_tipo_actividad="";
	
	if($Tipo_Actividad==2){
		$sql_search_tipo_actividad=" and ACT.Tipo_Actividad=2 ";
	}
	
	if($Tipo_Actividad==3){
		$sql_search_tipo_actividad=" and ACT.Tipo_Actividad=3 ";
	}
	
	if($Tipo_Actividad!=2 && $Tipo_Actividad!=3){
		$sql_search_tipo_actividad=" and SS.Id_Actividad is null ";
	}
	
	$sql="
		select Id_Ubic_Prim,Desc_Ubic_Prim,
		(
			select count(SA.Id_Area) as Total_Solicitudes from siga_solicitud_tickets SS 
			left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
			left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
			where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and SA.Id_Ubic_Prim=siga_solicitud_tickets.Id_Ubic_Prim
			and SS.Estatus_Reg<>'3'
			and year(SS.Fech_Solicitud)=".$Anio.$sql_search_tipo_actividad." and month(SS.Fech_Solicitud)=".$Mes.$Id_Ubic_Prim.$Id_Ubic_Sec.$sql_search.$sql_search_mesa_ayuda."
		) as Total_Solicitudes
		from (
			select distinct SA.Id_Ubic_Prim, UP.Desc_Ubic_Prim from siga_solicitud_tickets SS 
			left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
			left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
			left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim
			where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null
			and SS.Estatus_Reg<>'3' 
			and year(SS.Fech_Solicitud)=".$Anio.$sql_search_tipo_actividad." and month(SS.Fech_Solicitud)=".$Mes.$Id_Ubic_Prim.$Id_Ubic_Sec.$sql_search.$sql_search_mesa_ayuda."
		) siga_solicitud_tickets
	";
	if($Tipo_Actividad!=2 && $Tipo_Actividad!=3){
		
		$sql="
			select * from (
				select 
					SCUP.Id_Ubic_Prim, SCUP.Desc_Ubic_Prim
					,(
						--Se obtiene el total de solicitudes ligados a un activo
						(select count(*) as Total from siga_solicitud_tickets SS 
						left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
						left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
						left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim
						left join siga_cat_ubic_sec US on SA.Id_Ubic_Sec=US.Id_Ubic_Sec
						left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
						left join empleados_chs EMP on SU.No_Usuario=EMP.num_empleado
						where 
						SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'".$sql_ubic_prim.$sql_ubic_sec.$sql_search.$sql_search_mesa_ayuda."
						and SS.Id_Activo is not null and SS.Id_Actividad is null and
						SS.Estatus_Reg<>'3' and SA.Id_Ubic_Prim=SCUP.Id_Ubic_Prim
						and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes.")
						+  --Se realiza la suma de los Totales
						--Se obtoiene el total de activos que no estan liga
						(select count(*) as Total from siga_solicitud_tickets SS 
						left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
						left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
						left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim
						left join siga_cat_ubic_sec US on SA.Id_Ubic_Sec=US.Id_Ubic_Sec
						left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
						left join empleados_chs EMP on SU.No_Usuario=EMP.num_empleado
						where 
						SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'".$sql_ubic_prim.$sql_ubic_sec.$sql_search.$sql_search_mesa_ayuda."
						and SS.Id_Activo is null and SS.Id_Actividad is null and 
						SS.Estatus_Reg<>'3' and EMP.gerencia=SCUP.Desc_Ubic_Prim COLLATE Modern_Spanish_CI_AS
						and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes." )
					) as Total_Solicitudes
				from siga_cat_ubic_prim SCUP
				where
					Estatus_Reg<>'3' and  Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'";
		if(($Ubic_Prim!="-1")){
					$sql.=" and Id_Ubic_Prim='".$Ubic_Prim."' ";
		}	
		
		$sql.="			
			)	siga_cat_ubic_prim where Total_Solicitudes>0
		";
		
	}
	$proveedor->execute($sql);
	
	$Total_Cantidad=0;
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total_Cantidad=$Total_Cantidad+$row_c["Total_Solicitudes"];
				$Data= array(
					"Id_Ubic_Prim"=>$row_c["Id_Ubic_Prim"],
					"Desc_Ubic_Prim"=>$row_c["Desc_Ubic_Prim"],
					"Total_Solicitudes"=>$row_c["Total_Solicitudes"]
				);
				array_push($Data_Envia, $Data);
			}
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia),"data" => $Data_Envia,"Total_Cantidad"=>$Total_Cantidad,"estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	return $respuesta;
}

//Fin Grafica 4



//Grafica 6
public function graf_barra_por_gestor($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql_search="";
	
	if(($Ubic_Prim!="-1")||($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" and ";
	}
	
	if(($Ubic_Prim!="-1")){
		$sql_search.=" SA.Id_Ubic_Prim='".$Ubic_Prim."'";
		if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Ubic_Sec!="-1")){
		$sql_search.=" SA.Id_Ubic_Sec='".$Ubic_Sec."'";
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clase!="-1")){
		$sql_search.=" SA.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" SA.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" SA.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" SA.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" SS.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
	}
	
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}
	
	
	$sql="
		select 
			distinct(cg.Id_Usuario), su.Nombre_Usuario 
		from siga_cat_gestores cg
			left join siga_usuarios su on cg.Id_Usuario=su.Id_Usuario
		where cg.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and cg.Estatus_Reg<>3
	";
	
	if($Siga_solicitud_ticketsDto->getId_Gestor()!="-1"){
		$sql.=" and cg.Id_Usuario= ".$Siga_solicitud_ticketsDto->getId_Gestor();
	}
	if($Siga_solicitud_ticketsDto->getSeccion()!="-1"){
		$sql.=" and cg.Id_Seccion=".$Siga_solicitud_ticketsDto->getSeccion();	
	}
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	$proveedor->execute($sql);
	
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total_Asistencia=0;
				$Total_Preventivo=0;
				$Total_Correctivo=0;
				
				$proveedor_T_As = new Proveedor('sqlserver', 'activos');
				$proveedor_T_As->connect();
				$sql="
					select count(SS.Id_Solicitud) as Total_Asistencia from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'  and SS.Id_Gestor=".$row_c["Id_Usuario"]." and SS.Estatus_Reg<>'3' 
					and year(SS.Fech_Cierre)=".$Anio." and month(SS.Fech_Cierre)=".$Mes."
					and (SS.Id_Subcategoria not in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					) or SS.Id_Subcategoria is null) ".$sql_search." ".$sql_search_mesa_ayuda."
				";		
				
				//echo "<pre>";
				//echo $sql;
				//echo "</pre>";
				
				$proveedor_T_As->execute($sql);
				if(!$proveedor_T_As->error()){
					if ($proveedor_T_As->rows($proveedor_T_As->stmt) > 0) {
						$row_T_As = $proveedor_T_As->fetch_array($proveedor_T_As->stmt, 0);
						$Total_Asistencia =$row_T_As["Total_Asistencia"];
					}
				}
				$proveedor_T_As->close();
				
				$proveedor_T_Prev = new Proveedor('sqlserver', 'activos');
				$proveedor_T_Prev->connect();
				$sql="
					select count(SS.Id_Solicitud) as Total_Preventivo from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and SS.Id_Gestor=".$row_c["Id_Usuario"]." and SS.Estatus_Reg<>'3' --and ACT.Tipo_Actividad='2'
					--and SS.Id_Actividad is not null and SS.Id_Actividad<>''
					and SS.Id_Subcategoria in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%')
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					)
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes." ".$sql_search." ".$sql_search_mesa_ayuda."
				";
				$proveedor_T_Prev->execute($sql);
				if(!$proveedor_T_Prev->error()){
					if ($proveedor_T_Prev->rows($proveedor_T_Prev->stmt) > 0) {
						$row_T_Prev = $proveedor_T_Prev->fetch_array($proveedor_T_Prev->stmt, 0);
						$Total_Preventivo =$row_T_Prev["Total_Preventivo"];
					}
				}
				$proveedor_T_Prev->close();
				
				$proveedor_T_Correc = new Proveedor('sqlserver', 'activos');
				$proveedor_T_Correc->connect();
				$sql="
					select count(SS.Id_Solicitud) as Total_Correctivo from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and SS.Id_Gestor=".$row_c["Id_Usuario"]." and SS.Estatus_Reg<>'3' --and ACT.Tipo_Actividad='3'
					--and SS.Id_Actividad is not null and SS.Id_Actividad<>''
					and SS.Id_Subcategoria in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento correctivo%')
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					)
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes." ".$sql_search." ".$sql_search_mesa_ayuda."
				";
				
				//echo "<pre>";
				//echo $sql;
				//echo "</pre>";
				$proveedor_T_Correc->execute($sql);
				if(!$proveedor_T_Correc->error()){
					if ($proveedor_T_Correc->rows($proveedor_T_Correc->stmt) > 0) {
						$row_T_Correc = $proveedor_T_Correc->fetch_array($proveedor_T_Correc->stmt, 0);
						$Total_Correctivo =$row_T_Correc["Total_Correctivo"];
					}
				}
				$proveedor_T_Correc->close();
				
				
				$Data= array(
					"Id_Usuario"=>$row_c["Id_Usuario"],
					"Nombre_Usuario"=>$row_c["Nombre_Usuario"],
					"Total_Asistencia"=>$Total_Asistencia,
					"Total_Preventivo"=>$Total_Preventivo,
					"Total_Correctivo"=>$Total_Correctivo
				);
				array_push($Data_Envia, $Data);
			}
			
			//Sin Area
			/*
			$proveedor_T_S_A = new Proveedor('sqlserver', 'activos');
			$proveedor_T_S_A->connect();
			$sql="
				select count(*) as Total_Asistencia_Sin_Area from siga_solicitud_tickets SS 
				left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
				where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
				and SS.Id_Activo is null 
				and  
				SS.Estatus_Reg<>'3' and 
				year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes." ".$sql_search."
				and Id_Actividad is null
			";	
			$proveedor_T_S_A->execute($sql);
			if(!$proveedor_T_S_A->error()){
				if ($proveedor_T_S_A->rows($proveedor_T_S_A->stmt) > 0) {
					$row_T_S_A = $proveedor_T_S_A->fetch_array($proveedor_T_S_A->stmt, 0);
					$Total_Preventivo =$row_T_S_A["Total_Asistencia_Sin_Area"];
					
					$Data= array(
						"Id_Ubic_Prim"=>0,
						"Desc_Ubic_Prim"=>"Sin Area",
						"Total_Asistencia"=>$row_T_S_A["Total_Asistencia_Sin_Area"],
						"Total_Preventivo"=>0,
						"Total_Correctivo"=>0
					);
					array_push($Data_Envia, $Data);
					
				}
			}
			$proveedor_T_S_A->close();
			*/
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

//Fin Grafica 6

//Grafica 7
public function graf_barra_mantenimientos($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Rutina, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql_search="";
	
	if(($Ubic_Prim!="-1")||($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Rutina!="-1")){
		$sql_search.=" and ";
	}
	
	if(($Ubic_Prim!="-1")){
		$sql_search.=" SA.Id_Ubic_Prim='".$Ubic_Prim."'";
		if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Rutina!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Ubic_Sec!="-1")){
		$sql_search.=" SA.Id_Ubic_Sec='".$Ubic_Sec."'";
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Rutina!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clase!="-1")){
		$sql_search.=" SA.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Rutina!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" SA.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Rutina!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" SA.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Rutina!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" SA.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Rutina!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" SS.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
		if(($Rutina!="-1")){
			$sql_search.=" and ";
		}
	}
	if(($Rutina!="-1")){
		$sql_search.=" rtrim(ltrim(ACT.Nombre_Rutina))='".$Rutina."'";
	}
	
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" SS.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}
	
	
	$sql="
		select * from siga_cat_ubic_prim where Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Estatus_Reg<>'3'
	";
	if($Ubic_Prim!="-1"){
		$sql.=" and Id_Ubic_Prim=".$Ubic_Prim;	
	}
	$proveedor->execute($sql);
	
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total_Programados=0;
				$Total_Realizados=0;
				
				
				//Programados
				$proveedor_T_Prev = new Proveedor('sqlserver', 'activos');
				$proveedor_T_Prev->connect();
				$sql="
					select count(SS.Id_Solicitud) as Total_Programados from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and SS.Id_Ubic_Prim=".$row_c["Id_Ubic_Prim"]." and SS.Estatus_Reg<>'3' 
					and SS.Id_Actividad is not null and SS.Id_Actividad<>''
					and 
					((year(SS.Fech_Solicitud)=".$Anio; if($Mes!="Anual"){$sql.=" and month(SS.Fech_Solicitud)=".$Mes;}
					$sql.=" ) or (year(SS.Fech_Seguimiento)=".$Anio; if($Mes!="Anual"){$sql.=" and month(SS.Fech_Seguimiento)=".$Mes;}
					$sql.=" ) or (year(SS.Fech_Espera_Cierre)=".$Anio; if($Mes!="Anual"){$sql.=" and month(SS.Fech_Espera_Cierre)=".$Mes;}
					$sql.=" )) and Fech_Cierre is null
					".$sql_search.$sql_search_mesa_ayuda;
				
				//echo "<pre>";
				//echo $sql;
				//echo "</pre>";

				
				$proveedor_T_Prev->execute($sql);
				if(!$proveedor_T_Prev->error()){
					if ($proveedor_T_Prev->rows($proveedor_T_Prev->stmt) > 0) {
						$row_T_Prev = $proveedor_T_Prev->fetch_array($proveedor_T_Prev->stmt, 0);
						$Total_Programados =$row_T_Prev["Total_Programados"];
					}
				}
				$proveedor_T_Prev->close();
				//Fin Programados
				
				//Realizados
				$proveedor_T_Correc = new Proveedor('sqlserver', 'activos');
				$proveedor_T_Correc->connect();
				$sql="
					select count(SS.Id_Solicitud) as Total_Realizados from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and SA.Id_Ubic_Prim=".$row_c["Id_Ubic_Prim"]." and SS.Estatus_Reg<>'3'
					and SS.Id_Actividad is not null and SS.Id_Actividad<>''
					and year(SS.Fech_Cierre)=".$Anio;
					if($Mes!="Anual"){$sql.=" and month(SS.Fech_Cierre)=".$Mes;}
					$sql.=$sql_search.$sql_search_mesa_ayuda;
				
				//echo "<pre>";
				//echo $sql;
				//echo "</pre>";
				$proveedor_T_Correc->execute($sql);
				if(!$proveedor_T_Correc->error()){
					if ($proveedor_T_Correc->rows($proveedor_T_Correc->stmt) > 0) {
						$row_T_Correc = $proveedor_T_Correc->fetch_array($proveedor_T_Correc->stmt, 0);
						$Total_Realizados =$row_T_Correc["Total_Realizados"];
					}
				}
				$proveedor_T_Correc->close();
				//Fin Realizados
				
				$Data= array(
					"Id_Ubic_Prim"=>$row_c["Id_Ubic_Prim"],
					"Desc_Ubic_Prim"=>$row_c["Desc_Ubic_Prim"],
					"Total_Programados"=>$Total_Programados,
					"Total_Realizados"=>$Total_Realizados
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
//Fin Grafica 7


public function tabla_dinamica_tickets($Siga_solicitud_ticketsDto, $Gerencia, $Departamento, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Rutina, $Nombre_Grafica, $Tipo_Mantenimiento, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$Desc_Ubic_Primaria="";
	$Desc_Ubic_Secundaria="";
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql_search="";
	
	
	if(($Ubic_Prim!="-1")||($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search.=" and ";
	}
	
	if(($Ubic_Prim!="-1")){
			//Grafica 3
		if(($Nombre_Grafica=="barra_indicador_reportes_por_area" && $Tipo_Mantenimiento=="Sin_Activo")){
			$sql_search.=" A.Id_Ubic_Sec='".$Ubic_Sec."'";
		}else{
				//Grafica 4
			if($Nombre_Grafica=="pie_reportes_por_area_ubic_prim_sec"){
				$sql_search.=" A.Id_Ubic_Prim='".$Ubic_Prim."'";
			}else{
				$sql_search.=" A.Id_Ubic_Prim='".$Ubic_Prim."'";
			}
		}
		if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Ubic_Sec!="-1")){
			//Grafica 3
		if(($Nombre_Grafica=="barra_indicador_reportes_por_area" && $Tipo_Mantenimiento=="Sin_Activo")){
			$sql_search.=" A.Id_Ubic_Sec='".$Ubic_Sec."'";
		}else{
			//Grafica 4
			if($Nombre_Grafica=="pie_reportes_por_area_ubic_prim_sec"){
				$sql_search.=" A.Id_Ubic_Sec='".$Ubic_Sec."'";
			}else{
				$sql_search.=" A.Id_Ubic_Sec='".$Ubic_Sec."'";
			}
		}
		
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
			$sql_search.=" and ";
		}
	}
		
	if(($Clase!="-1")){
		$sql_search.=" A.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" A.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" A.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" A.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" ST.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
			$sql_search.=" and ";
		}
	}
	
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search.=" ST.Id_Gestor='".$Siga_solicitud_ticketsDto->getId_Gestor()."'";
	}
	
	/////////FILTROS MESA DE AYUDA
	$sql_search_mesa_ayuda="";
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")||($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" and ";
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Medio()!="-1")){
		$sql_search_mesa_ayuda.=" ST.Id_Medio=".$Siga_solicitud_ticketsDto->getId_Medio()." ";
		if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getLo_Realiza()!="-1")){
		$sql_search_mesa_ayuda.=" ST.Lo_Realiza=".$Siga_solicitud_ticketsDto->getLo_Realiza()." ";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search_mesa_ayuda.=" ST.Id_Categoria=".$Siga_solicitud_ticketsDto->getId_Categoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search_mesa_ayuda.=" ST.Id_Subcategoria=".$Siga_solicitud_ticketsDto->getId_Subcategoria()." ";
		if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Gestor()!="-1")){
		$sql_search_mesa_ayuda.=" ST.Id_Gestor=".$Siga_solicitud_ticketsDto->getId_Gestor()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")||($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Real()!="-1")){
		$sql_search_mesa_ayuda.=" ST.Id_Motivo_Real=".$Siga_solicitud_ticketsDto->getId_Motivo_Real()." ";
		if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")||($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Motivo_Aparente()!="-1")){
		$sql_search_mesa_ayuda.=" ST.Id_Motivo_Aparente=".$Siga_solicitud_ticketsDto->getId_Motivo_Aparente()." ";
		if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
			$sql_search_mesa_ayuda.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Est_Equipo()!="-1")){
		$sql_search_mesa_ayuda.=" ST.Id_Est_Equipo=".$Siga_solicitud_ticketsDto->getId_Est_Equipo()." ";
	}
	
	 
	$sql_barra_indicadores_mesa_ayuda="";
	if($Nombre_Grafica=="barra_indicadores_mesa_ayuda"){
		
		
		if($Siga_solicitud_ticketsDto->getEstatus_Proceso()==1){
			$sql_barra_indicadores_mesa_ayuda="
				and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Solicitud)=".$Anio." 
			";
			
			if($Mes!="Anual"){
				$sql_barra_indicadores_mesa_ayuda.="
					and month(ST.Fech_Solicitud)=".$Mes."
				";
			}
		}
		
		if($Siga_solicitud_ticketsDto->getEstatus_Proceso()==2){
			$sql_barra_indicadores_mesa_ayuda="
				and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Seguimiento)=".$Anio." 
			";
			
			if($Mes!="Anual"){
				$sql_barra_indicadores_mesa_ayuda.="
					and month(ST.Fech_Seguimiento)=".$Mes."
				";
			}
			
			//$sql_barra_indicadores_mesa_ayuda="
			//	and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Seguimiento)=".$Anio." 
			//";
		}
		
		if($Siga_solicitud_ticketsDto->getEstatus_Proceso()==3){
			$sql_barra_indicadores_mesa_ayuda="
				and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Espera_Cierre)=".$Anio." 
			";
			
			if($Mes!="Anual"){
				$sql_barra_indicadores_mesa_ayuda.="
					and month(ST.Fech_Espera_Cierre)=".$Mes."
				";
			}
			//$sql_barra_indicadores_mesa_ayuda="
			//	and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Espera_Cierre)=".$Anio." 
			//";
		}
		
		if($Siga_solicitud_ticketsDto->getEstatus_Proceso()==4){
			$sql_barra_indicadores_mesa_ayuda="
				and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Cierre)=".$Anio." 
			";
			
			if($Mes!="Anual"){
				$sql_barra_indicadores_mesa_ayuda.="
					and month(ST.Fech_Cierre)=".$Mes."
				";
			}
			//$sql_barra_indicadores_mesa_ayuda="
			//	and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Cierre)=".$Anio." 
			//";
		}
	}
	
	$sql_barra_indicador_rep_por_area="";
	if($Nombre_Grafica=="barra_indicador_reportes_por_area"){
		//Asistencia (Solicitud Tickets)
		if($Tipo_Mantenimiento==0){
			$sql_barra_indicador_rep_por_area="
				and ST.Id_Activo is not null
				and year(ST.Fech_Cierre)=".$Anio." and month(ST.Fech_Cierre)=".$Mes."
				--and ST.Id_Actividad is null 
				and (ST.Id_Subcategoria not in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				) or ST.Id_Subcategoria is null)
			";
		}
		
		//Asistencia Sin Activos(Solicitud Tickets)
		if($Tipo_Mantenimiento=="Sin_Activo"){
			$sql_barra_indicador_rep_por_area="
				and ST.Id_Activo is null --No Viene Relacionado a un Activo 
				and year(ST.Fech_Cierre)=".$Anio." and month(ST.Fech_Cierre)=".$Mes."
				--and ST.Id_Actividad is null  --No viene Relacionado a una Actividad
				and (ST.Id_Subcategoria not in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				) or ST.Id_Subcategoria is null)
			";
		}
		
		//Mantenimiento Predictivo
		if($Tipo_Mantenimiento==2){
			$sql_barra_indicador_rep_por_area="
				--and ST.Id_Activo is not null
				and year(ST.Fech_Cierre)=".$Anio." and month(ST.Fech_Cierre)=".$Mes."
				--and Act.Tipo_Actividad='2'
				--and ST.Id_Actividad is not null and ST.Id_Actividad<>''
				and ST.Id_Subcategoria in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento preventivo%'
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				)
			";
		}
		
		//Mantenimiento Correctivo
		if($Tipo_Mantenimiento==3){
			$sql_barra_indicador_rep_por_area="
				--and ST.Id_Activo is not null
				and year(ST.Fech_Cierre)=".$Anio." and month(ST.Fech_Cierre)=".$Mes."
				--and Act.Tipo_Actividad='3'
				--and ST.Id_Actividad is not null and ST.Id_Actividad<>''
				and ST.Id_Subcategoria in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Desc_Subcategoria like '%mantenimiento correctivo%'
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				)
			
			";
		}
		
		if($Gerencia!=""){
			$sql_barra_indicador_rep_por_area.=" and EMP.gerencia='".$Gerencia."'  ";
		}
	}
	
	$sql_barra_indicador_rep_por_gestor="";
	if($Nombre_Grafica=="barra_indicador_reportes_por_gestor"){
		//Asistencia (Solicitud Tickets)
		if($Tipo_Mantenimiento==0){
			$sql_barra_indicador_rep_por_gestor="
				and year(ST.Fech_Cierre)=".$Anio." and month(ST.Fech_Cierre)=".$Mes."
				--and ST.Id_Actividad is null 
				and (ST.Id_Subcategoria not in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				) or ST.Id_Subcategoria is null)
			";
		}
		
		//Mantenimiento Predictivo
		if($Tipo_Mantenimiento==2){
			$sql_barra_indicador_rep_por_gestor="
				and ST.Id_Activo is not null
				and year(ST.Fech_Cierre)=".$Anio." and month(ST.Fech_Cierre)=".$Mes."
				--and Act.Tipo_Actividad='2'
				--and ST.Id_Actividad is not null and ST.Id_Actividad<>''
				and ST.Id_Subcategoria in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%')
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				)
			";
		}
		
		//Mantenimiento Correctivo
		if($Tipo_Mantenimiento==3){
			$sql_barra_indicador_rep_por_gestor="
				and ST.Id_Activo is not null
				and year(ST.Fech_Cierre)=".$Anio." and month(ST.Fech_Cierre)=".$Mes."
				--and Act.Tipo_Actividad='3'
				--and ST.Id_Actividad is not null and ST.Id_Actividad<>''
				and ST.Id_Subcategoria in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento correctivo%')
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				)
			";
		}
	}
	
	
	$sql_pie_indicador_rep_por_area_ubic_sec="";
	if($Nombre_Grafica=="pie_reportes_por_area_ubic_prim_sec"){
		$sql_pie_indicador_rep_por_area_ubic_sec="
			and year(ST.Fech_Cierre)=".$Anio." and month(ST.Fech_Cierre)=".$Mes."
		";
		
		if($Gerencia!=""){
			$sql_pie_indicador_rep_por_area_ubic_sec.=" and EMP.gerencia='".$Gerencia."'  ";
		}
		
		if($Departamento!=""){
			$sql_pie_indicador_rep_por_area_ubic_sec.=" and EMP.departamento='".$Departamento."' ";
		}
		
	}
	
	$sql_barra_mant_prog_realiz="";
	if($Nombre_Grafica=="barra_indicador_mantenimientos"){
		//Programados
		if($Tipo_Mantenimiento==1){
			$sql_barra_mant_prog_realiz="
				and ST.Id_Activo is not null
				and ST.Id_Actividad is not null and ST.Id_Actividad<>'' and  
				((year(ST.Fech_Cierre)=".$Anio; if($Mes!="Anual"){$sql_barra_mant_prog_realiz.=" and month(ST.Fech_Cierre)=".$Mes;}
				$sql_barra_mant_prog_realiz.=" ) or (year(ST.Fech_Seguimiento)=".$Anio; if($Mes!="Anual"){$sql_barra_mant_prog_realiz.=" and month(ST.Fech_Seguimiento)=".$Mes;}
				$sql_barra_mant_prog_realiz.=") or (year(ST.Fech_Espera_Cierre)=".$Anio; if($Mes!="Anual"){$sql_barra_mant_prog_realiz.=" and month(ST.Fech_Espera_Cierre)=".$Mes;}
				$sql_barra_mant_prog_realiz.=")) and Fech_Cierre is null";
				if($Rutina!="-1"){
					$sql_barra_mant_prog_realiz.=" and rtrim(ltrim(Act.Nombre_Rutina))='".$Rutina."' ";
				}
		}
		
		//Realizados
		if($Tipo_Mantenimiento==2){
			$sql_barra_mant_prog_realiz="
				and ST.Id_Activo is not null
				and year(ST.Fech_Cierre)=".$Anio; if($Mes!="Anual"){$sql_barra_mant_prog_realiz.="and month(ST.Fech_Cierre)=".$Mes;}
				$sql_barra_mant_prog_realiz.=" and ST.Id_Actividad is not null and ST.Id_Actividad<>'' ";
				
				if($Rutina!="-1"){
					
					$sql_barra_mant_prog_realiz.=" and rtrim(ltrim(Act.Nombre_Rutina))='".$Rutina."' ";
				}
		}
		
		
	}
	
	
	$sql="SELECT EMP.gerencia, 
		EMP.departamento, 
		A.AF_BC,
		A.Nombre_Activo,
		Est_Act.Desc_Estatus as Estatus_Activo,
		UP.Desc_Ubic_Prim,
		US.Desc_Ubic_Sec,
		ST.Id_Solicitud,
		ST.Asist_Especial,
		ST.Id_Activo,
		'[Nombre Activo: '+rtrim(ltrim(A.Nombre_Activo))+'] '+'[AF/BC: '+rtrim(ltrim(A.AF_BC))+'] '+'[Ubicaci&oacute;n Primaria: '+rtrim(ltrim(UP.Desc_Ubic_Prim))+'] '+'[Ubicaci&oacute;n Secundaria: '+rtrim(ltrim(US.Desc_Ubic_Sec))+'] '+'[Usuario Responsable: '+rtrim(ltrim(A.Nombre_Completo))+']' as Activo,
		CASE ST.Estatus_Proceso when 1 then 'Nuevo' when 2 then 'En Seguimiento' when 3 then 'En espera de cierre' when 4 then 'Cerrado'
		end as  Id_Estatus_Proceso, ST.Id_Usuario,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) Nombre_Usuario,CA.Nom_Area,ST.Id_Area,ST.Seccion,ST.Titulo,ST.Id_Categoria,SCMR.Desc_Categoria,SCTS.Desc_Subcategoria,ST.Desc_Motivo_Reporte,ST.Prioridad,ST.Url_archivo,ST.Fech_Inser,FORMAT(ST.Fech_Inser,'dd/MM/yyyy hh:mm:ss') as Fecha,FORMAT(ST.Fech_Solicitud,'dd/MM/yyyy hh:mm:ss') as Fecha_Solicitud, FORMAT(ST.Fech_Seguimiento,'dd/MM/yyyy hh:mm:ss') as Fecha_Seguimiento,FORMAT(ST.Fech_Espera_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Esp_Cierre,FORMAT(ST.Fech_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Cierre,
		ST.Usr_Inser,ST.Fech_Mod,ST.Usr_Mod,ST.Estatus_Reg
		,(select C.Desc_Seccion from siga_cat_ticket_seccion C where C.Id_Seccion=ST.Seccion) Nombre_Seccion,ST.Id_Gestor, Id_Gestor_Reasignado
		,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Gestor=U.Id_Usuario) Gestor
		,(select P.Desc_Proceso from siga_cat_ticket_proceso P where P.Id_Estatus_Proceso=ST.Estatus_Proceso) Estatus_Proceso, 
		ST.TituloCierre, ST.ComentarioCierre,Usr.Nombre_Usuario as Nom_usr_reasignado
		,ST.Id_Actividad, CASE ST.Asist_Especial when 1 then 'Asistencia Especial' END as A_Especial, CASE ST.Prioridad when 1 then 'Alta' when 2 then 'Media' when 3 then 'Baja' END as Desc_Prioridad
		FROM siga_solicitud_tickets  ST 
		left join siga_cat_ticket_categoria SCMR on ST.Id_Categoria=SCMR.Id_Categoria 
		left join siga_cat_ticket_subcategoria SCTS on ST.Id_Subcategoria=SCTS.Id_Subcategoria 
		left join siga_catareas CA on ST.Id_Area=CA.Id_Area 
		left join siga_activos A on ST.Id_Activo=A.Id_Activo 
		left join siga_cat_ubic_prim UP on A.Id_Ubic_Prim=UP.Id_Ubic_Prim 
		left join siga_cat_ubic_sec US on A.Id_Ubic_Sec=US.Id_Ubic_Sec 
		left join siga_usuarios Usr on ST.Id_Gestor_Reasignado=Usr.Id_Usuario 
		left join siga_actividades Act on ST.Id_Actividad=Act.Id_Actividad
		left join siga_cat_estatus Est_Act on A.Id_Situacion_Activo=Est_Act.Id_Estatus
		left join siga_usuarios Solic on ST.Id_Usuario=Solic.Id_Usuario 
		left join empleados_chs EMP on Solic.No_Usuario=EMP.num_empleado
		where ST.Estatus_Reg <> '3' and ST.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' ".$sql_barra_indicadores_mesa_ayuda.$sql_barra_indicador_rep_por_area.$sql_barra_indicador_rep_por_gestor.$sql_barra_mant_prog_realiz.$sql_pie_indicador_rep_por_area_ubic_sec.$sql_search.$sql_search_mesa_ayuda."
	";
		
	$proveedor->execute($sql);
	//echo "<pre>";
	//echo $sql;
	//echo "<pre>";
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Gerencia_Ubic_Prim="";
				$Departamento_Ubic_Sec="";
				
				if($row_c["Id_Activo"]==""){
					$Gerencia_Ubic_Prim="<label style='color:blue'>[Gerencia]<br>".$row_c["gerencia"]."</label>";
					$Departamento_Ubic_Sec="<label style='color:blue'>[Departamento]<br>".$row_c["departamento"]."</label>";
				}else{
					$Gerencia_Ubic_Prim=$row_c["Desc_Ubic_Prim"];
					$Departamento_Ubic_Sec=$row_c["Desc_Ubic_Sec"];			
				}
				
				$Data= array(
					"Id_Solicitud" => $row_c["Id_Solicitud"],
          "Id_Usuario" => $row_c["Id_Usuario"],
					"Id_Area" => $row_c["Id_Area"],
					"Seccion" => $row_c["Seccion"],
					"Titulo" => $row_c["Titulo"],
					"Estatus_Activo" => $row_c["Estatus_Activo"],
					"Id_Categoria" => $row_c["Id_Categoria"],
					"Desc_Ubic_Prim" => $Gerencia_Ubic_Prim,
					"Desc_Ubic_Sec"=> $Departamento_Ubic_Sec,
					"Desc_Categoria" => $row_c["Desc_Categoria"],
					"Desc_Subcategoria"=> $row_c["Desc_Subcategoria"],
					"Desc_Motivo_Reporte" => $row_c["Desc_Motivo_Reporte"],
					"Prioridad" => $row_c["Prioridad"],
					"Desc_Prioridad"=> $row_c["Desc_Prioridad"],
					"Url_archivo" => rtrim(ltrim($row_c["Url_archivo"])),
					"Fecha" => $row_c["Fecha"],
					"Nom_Area" => $row_c["Nom_Area"],
					"AF_BC" => $row_c["AF_BC"],
					"Nombre_Activo" => $row_c["Nombre_Activo"],
					"Nombre_Usuario" => $row_c["Nombre_Usuario"],
					"Nombre_Seccion" => $row_c["Nombre_Seccion"],
					"Id_Gestor" => $row_c["Id_Gestor"],
					"Id_Gestor_Reasignado"=> $row_c["Id_Gestor_Reasignado"],
					"Gestor" => $row_c["Gestor"],
					"Estatus_Proceso" => $row_c["Estatus_Proceso"],
					"Id_Estatus_Proceso"=> $row_c["Id_Estatus_Proceso"],
					"TituloCierre"=> $row_c["TituloCierre"],
					"ComentarioCierre"=> $row_c["ComentarioCierre"],
					"Activo"=> $row_c["Activo"],
					"Id_Activo"=>$row_c["Id_Activo"],
					"Asist_Especial"=>$row_c["Asist_Especial"],
					"A_Especial"=>$row_c["A_Especial"],
					"Nom_usr_reasignado"=>$row_c["Nom_usr_reasignado"],
					"Fecha_Seguimiento"=>$row_c["Fecha_Seguimiento"],
					"Fecha_Esp_Cierre"=>$row_c["Fecha_Esp_Cierre"],
					"Fecha_Cierre"=>$row_c["Fecha_Cierre"],
					"Fecha_Solicitud"=>$row_c["Fecha_Solicitud"],
					"Id_Actividad"=>rtrim(ltrim($row_c["Id_Actividad"]))
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

///////////////////////////////////////////////////FIN INDICADORES//////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

public function Reporte_Mesa_de_Ayuda($Siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Tipo_Mantenimiento, $Tipo_Seg_Fecha, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql_search="";
	
	if(($Ubic_Prim!="-1")||($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Anio!="")){
		$sql_search.=" and ";
	}
	
	if(($Ubic_Prim!="-1")){
		$sql_search.=" A.Id_Ubic_Prim='".$Ubic_Prim."'";
		if(($Ubic_Sec!="-1")||($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Anio!="")){
			$sql_search.=" and ";
		}
	}
	
	if(($Ubic_Sec!="-1")){
		$sql_search.=" A.Id_Ubic_Sec='".$Ubic_Sec."'";
		if(($Clase!="-1")||($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Anio!="")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clase!="-1")){
		$sql_search.=" A.Id_Clase='".$Clase."'";
		if(($Clasificacion!="-1")||($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Anio!="")){
			$sql_search.=" and ";
		}
	}
	
	if(($Clasificacion!="-1")){
		$sql_search.=" A.Id_Clasificacion='".$Clasificacion."'";
		if(($Familia!="-1")||($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Anio!="")){
			$sql_search.=" and ";
		}
	}
	
	if(($Familia!="-1")){
		$sql_search.=" A.Id_Familia='".$Familia."'";
		if(($Subfamilia!="-1")||($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Anio!="")){
			$sql_search.=" and ";
		}
	}
	
	if(($Subfamilia!="-1")){
		$sql_search.=" A.Id_Subfamilia='".$Subfamilia."'";
		if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")||($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Anio!="")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getSeccion()!="-1")){
		$sql_search.=" ST.Seccion='".$Siga_solicitud_ticketsDto->getSeccion()."'";
		if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")||($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Anio!="")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Categoria()!="-1")){
		$sql_search.=" ST.Id_Categoria='".$Siga_solicitud_ticketsDto->getId_Categoria()."'";
		if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")||($Anio!="")){
			$sql_search.=" and ";
		}
	}
	
	if(($Siga_solicitud_ticketsDto->getId_Subcategoria()!="-1")){
		$sql_search.=" ST.Id_Subcategoria='".$Siga_solicitud_ticketsDto->getId_Subcategoria()."'";
		if($Anio!=""){
			$sql_search.=" and ";
		}
	}
	
	if(($Anio!="")){
		$sql_search.=" year(ST.Fech_Cierre)=".$Anio." ";
	}
	
	$Tipo_Asistencia="";
	if($Siga_solicitud_ticketsDto->getId_Area()==1){
		$Tipo_Asistencia="Asistencia Biomedica";
	}
	
	if($Siga_solicitud_ticketsDto->getId_Area()==2){
		$Tipo_Asistencia="Asistencia Tic";
	}
	
	if($Siga_solicitud_ticketsDto->getId_Area()==3){
		$Tipo_Asistencia="Asistencia Mantenimiento";
	}
	
	if($Siga_solicitud_ticketsDto->getId_Area()==4){
		$Tipo_Asistencia="Asistencia Mobiliario y Equipo";
	}
	
	$sql="SELECT A.AF_BC,";

	if($Siga_solicitud_ticketsDto->getId_Area()==1){
	$sql.="	
			--case when UP.Desc_Ubic_Prim='HOSPITALIZACIÓN' then US.Desc_Ubic_Sec 
			--when UP.Desc_Ubic_Prim='DIRECCION MEDICA' then US.Desc_Ubic_Sec 
			--when UP.Desc_Ubic_Prim='UNIDAD QUIRÚRGICA' then US.Desc_Ubic_Sec else
			--Desc_Ubic_Prim
			--end as
			Desc_Ubic_Prim,"; 

	}else{
	$sql.="	UP.Desc_Ubic_Prim,";
}
		
	$Tipo_Fecha="Fech_Cierre";
	if($Tipo_Seg_Fecha!=""){
		if($Tipo_Seg_Fecha=="1"){$Tipo_Fecha="Fech_Solicitud";}
		if($Tipo_Seg_Fecha=="2"){$Tipo_Fecha="Fech_Seguimiento";}
		if($Tipo_Seg_Fecha=="3"){$Tipo_Fecha="Fech_Espera_Cierre";}
		if($Tipo_Seg_Fecha=="4"){$Tipo_Fecha="Fech_Cierre";}
		
	}
	
$sql.="
			US.Desc_Ubic_Sec,
			Cl.Desc_Clase,
			Clasif.Desc_Clasificacion,
			A.Marca,
			A.Modelo,
			A.NumSerie,
			A.Nombre_Activo,
			ST.Marca_Act_Ext,
			ST.Modelo_Act_Ext,
			ST.No_Serie_Act_Ext,
			ST.Nombre_Act_Ext,
			ST.Activo_Externo,
			Prop.Desc_Propiedad,
				CASE when Act.Tipo_Actividad=1 
					THEN 'Mto. Predictivo' WHEN Act.Tipo_Actividad=2 
					THEN 'Mto. Preventivo' WHEN Act.Tipo_Actividad=3 
					THEN 'Mto. Correctivo' WHEN Act.Tipo_Actividad=4 
					THEN 'Capacitaciones'  WHEN ST.Id_Actividad is NULL 
					THEN '".$Tipo_Asistencia."' 
				END as  Tipo_Servicio,
			M_Ap.Desc_Motivo_Aparente,
			M_Re.Desc_Motivo_Real,
			ST.Desc_Motivo_Reporte,
			SCMR.desc_categoria,
			SCTS.desc_subcategoria,
			ST.ComentarioCierre as Desc_Acci_Realiz,
			(SELECT rtrim(ltrim(U.No_Usuario)) FROM siga_usuarios U WHERE ST.Id_Gestor=U.Id_Usuario) Gestor_Nomina,
			(SELECT U.Nombre_Usuario FROM siga_usuarios U WHERE ST.Id_Gestor=U.Id_Usuario) Gestor,
			(SELECT TOP 1 '<strong>Solucíon Ofrecida: </strong>'+TC.Desc_Comentario1+ ' <br><br><strong>Actitud del Servicio: </strong>'+TC.Desc_Comentario2 + ' <br><br><strong>Tiempo de Respuesta: </strong>'+TC.Desc_Comentario3 as Comentarios_Cierre from siga_ticket_calificacion TC where ST.Id_Solicitud=TC.Id_Solicitud) Comentarios_Cierre,			
			(SELECT TOP 1  Id_Respuesta1 FROM siga_ticket_calificacion TC WHERE ST.Id_Solicitud=TC.Id_Solicitud) Id_Respuesta1,
			(SELECT TOP 1  Id_Respuesta2 FROM siga_ticket_calificacion TC WHERE ST.Id_Solicitud=TC.Id_Solicitud) Id_Respuesta2,
			(SELECT TOP 1  Id_Respuesta3 FROM siga_ticket_calificacion TC WHERE ST.Id_Solicitud=TC.Id_Solicitud) Id_Respuesta3,			
			(SELECT rtrim(ltrim(U.No_Usuario)) FROM siga_usuarios U WHERE ST.Id_Usuario=U.Id_Usuario) Solicitante_Nomina,
			(SELECT U.Nombre_Usuario FROM siga_usuarios U WHERE ST.Id_Usuario=U.Id_Usuario) Solicitante,
			FORMAT(ST.Fech_Solicitud,'dd/MM/yyyy HH:mm:ss') as Fecha_Solicitud, 
			FORMAT(ST.Fech_Seguimiento,'dd/MM/yyyy HH:mm:ss') as Fecha_Seguimiento,
			FORMAT(ST.Fech_Espera_Cierre,'dd/MM/yyyy HH:mm:ss') as Fecha_Esp_Cierre,";
			
		if($Siga_solicitud_ticketsDto->getId_Area()==1){
		$sql.="	FORMAT(ST.Fech_Cierre,'dd/MM/yyyy') as Fecha_Cierre, ";
		}else{
		$sql.="	FORMAT(ST.Fech_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Cierre, ";
		}
		$sql.="	
			ST.Id_Solicitud as Folio_Reporte, 
			Act.Horas as Horas_Empleadas, 
			Act.Total_CE as Cost_Tot_Exter,
			Act.Total_CI as Cost_Tot_Inter
		FROM 
			siga_solicitud_tickets  ST 
			LEFT JOIN siga_cat_ticket_categoria SCMR ON ST.Id_Categoria=SCMR.Id_Categoria 
			LEFT JOIN siga_cat_ticket_subcategoria SCTS ON ST.Id_Subcategoria=SCTS.Id_Subcategoria 
			LEFT JOIN siga_catareas CA ON ST.Id_Area=CA.Id_Area 
			LEFT JOIN siga_activos A ON ST.Id_Activo=A.Id_Activo
			LEFT JOIN siga_cat_ubic_prim UP ON ST.Id_Ubic_Prim=UP.Id_Ubic_Prim 
			LEFT JOIN siga_cat_ubic_sec US ON ST.Id_Ubic_Sec=US.Id_Ubic_Sec 
			LEFT JOIN siga_actividades Act ON ST.Id_Actividad=Act.Id_Actividad
			LEFT JOIN siga_cat_estatus Est_Act ON A.Id_Situacion_Activo=Est_Act.Id_Estatus
			LEFT JOIN siga_cat_clase Cl ON A.Id_Clase=Cl.Id_Clase
			LEFT JOIN siga_cat_clasificacion Clasif ON A.Id_Clasificacion=Clasif.Id_Clasificacion
			LEFT JOIN siga_cat_propiedad Prop ON A.Id_Propiedad=Prop.Id_Propiedad
			LEFT JOIN siga_cat_motivo_aparente M_Ap ON ST.Id_Motivo_Aparente=M_Ap.Id_Motivo_Aparente
			LEFT JOIN siga_cat_motivo_real M_Re ON ST.Id_Motivo_Real=M_Re.Id_Motivo_Real
		WHERE ST.Estatus_Reg <> '3' 
		AND ST.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' 
		AND ST.Estatus_Proceso='4'  
		AND FORMAT(ST.".$Tipo_Fecha.",'dd/MM/yyyy') BETWEEN convert(date,'".$Fecha_Inicial."') 
		AND convert(date,'".$Fecha_Final."') ".$sql_search."
	";
	
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	$proveedor->execute($sql);

	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$AF_BC="";
				if($row_c["Activo_Externo"]=="1"){
					$AF_BC="Externo";
				}else{
					$AF_BC=$row_c["AF_BC"];
				}
				$Data= array(
					"AF_BC" => $AF_BC,
          "Desc_Ubic_Prim" => $row_c["Desc_Ubic_Prim"],
					"Desc_Ubic_Sec" => $row_c["Desc_Ubic_Sec"],
					"Desc_Clase" => $row_c["Desc_Clase"],
					"Desc_Clasificacion" => $row_c["Desc_Clasificacion"],
					"Marca" => $row_c["Marca_Act_Ext"],
					"Modelo" => $row_c["Modelo_Act_Ext"],
					"NumSerie" => $row_c["No_Serie_Act_Ext"],
					"Nombre_Activo"=> $row_c["Nombre_Act_Ext"],
					"Desc_Propiedad" => $row_c["Desc_Propiedad"],
					"Tipo_Servicio"=> $row_c["Tipo_Servicio"],
					"Desc_Motivo_Aparente" => $row_c["Desc_Motivo_Aparente"],
					"Desc_Motivo_Real" => $row_c["Desc_Motivo_Real"],
					"Desc_Motivo_Reporte"=> $row_c["Desc_Motivo_Reporte"],
					"Desc_Acci_Realiz" => rtrim(ltrim($row_c["Desc_Acci_Realiz"])),
					"Gestor_Nomina" => $row_c["Gestor_Nomina"],
					"Gestor" => $row_c["Gestor"],
					"Comentarios_Cierre" => $row_c["Comentarios_Cierre"],
					"Id_Respuesta1" => $row_c["Id_Respuesta1"],
					"Id_Respuesta2" => $row_c["Id_Respuesta2"],
					"Id_Respuesta3" => $row_c["Id_Respuesta3"],
					"Solicitante_Nomina" => $row_c["Solicitante_Nomina"],
					"Solicitante" => $row_c["Solicitante"],
					"Fecha_Solicitud" => $row_c["Fecha_Solicitud"],
					"Fecha_Seguimiento" => $row_c["Fecha_Seguimiento"],
					"Fecha_Esp_Cierre"=> $row_c["Fecha_Esp_Cierre"],
					"Fecha_Cierre" => $row_c["Fecha_Cierre"],
					"Folio_Reporte" => $row_c["Folio_Reporte"],
					"Horas_Empleadas"=> $row_c["Horas_Empleadas"],
					"Cost_Tot_Exter"=> $row_c["Cost_Tot_Exter"],
					"Cost_Tot_Inter"=> $row_c["Cost_Tot_Inter"],
					"desc_categoria"=> $row_c["desc_categoria"],
					"desc_subcategoria"=> $row_c["desc_subcategoria"]
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


public function Ubicacion_Primaria($Siga_solicitud_ticketsDto, $Ubic_Prim, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select * from siga_cat_ubic_prim where Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Estatus_Reg<>'3'
	";
	$sql.=" and Id_Ubic_Prim=".$Ubic_Prim;	
	
	$proveedor->execute($sql);
	
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				$Data= array(
					"Id_Ubic_Prim"=>$row_c["Id_Ubic_Prim"],
					"Desc_Ubic_Prim"=>$row_c["Desc_Ubic_Prim"]
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

public function Ubicacion_Secundaria($Siga_solicitud_ticketsDto, $Ubic_Sec, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select * from siga_cat_ubic_sec where  Estatus_Reg<>'3'
	";
	$sql.=" and Id_Ubic_Sec=".$Ubic_Sec;	
	
	$proveedor->execute($sql);
	
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				$Data= array(
					"Id_Ubic_Sec"=>$row_c["Id_Ubic_Sec"],
					"Desc_Ubic_Sec"=>$row_c["Desc_Ubic_Sec"]
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


}
