<?php
include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_solicitud_tickets_app/Siga_solicitud_ticketsDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_solicitud_tickets_app/Siga_solicitud_ticketsDAO.Class.php");

include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_activos/Siga_activosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_activos/Siga_activosDAO.Class.php");
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

	public function Cambiar_Activo_Solicitud($Id_Solicitud, $Id_Activo){
		
		$respuesta = array();
		$Error=false;
		
		if($Id_Solicitud!="" && $Id_Activo!=""){
			//Datos del Activo
			$AF_BC=""; $Nombre_Activo=""; $Marca=""; $Modelo=""; $NumSerie=""; $Id_Ubic_Prim=""; $Id_Ubic_Sec="";
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
			}
			//Datos del Activo
			
			
			$proveedor = new Proveedor('sqlserver', 'activos');
			$proveedor->connect();
			$strSQL="update siga_solicitud_tickets ";
			$strSQL.=" set Id_Activo=".$Id_Activo; 
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
		
		return $respuesta;
	}	
	
	public function Guardar_Activo_Externo($Id_Solicitud, $Activo_Externo, $Nombre_Act_Ext, $Marca_Act_Ext, $Modelo_Act_Ext, $No_Serie_Act_Ext, $Id_Ubic_Prim, $Id_Ubic_Sec){
		
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
			
			
			$strSQL.=" where ";
			$strSQL.=" Id_Solicitud=".$Id_Solicitud; 
			//echo $strSQL;
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
	FORMAT(S.Fech_Solicitud,'dd/MM/yyyy')
	BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
	group by S.Id_Categoria
	having count(S.Id_Categoria) > 0
	union
	SELECT  '0' as Id_Categoria,COUNT (*) as cantidad FROM siga_solicitud_tickets S WHERE Id_Categoria IS NULL and
	Estatus_Reg <> '3' and Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ".$seccion_y_Gestor." 
	FORMAT(Fech_Solicitud,'dd/MM/yyyy') 
	BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."')
	)
	siga_solicitud_tickets order by Cantidad asc
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
			select * from (
				SELECT 
				(select top 1 Id_Respuesta1 from siga_ticket_calificacion where Id_Solicitud=ST.Id_Solicitud order by Fech_Inser desc) as Solucion_Ofrecida,
				(select top 1 Id_Respuesta2 from siga_ticket_calificacion where Id_Solicitud=ST.Id_Solicitud order by Fech_Inser desc) as Actitud_Solucion,
				(select top 1 Id_Respuesta3 from siga_ticket_calificacion where Id_Solicitud=ST.Id_Solicitud order by Fech_Inser desc) as Tiempo_Respuesta,
				ST.Id_Solicitud,ST.Asist_Especial,ST.Id_Activo, '[Nombre Activo: '+rtrim(ltrim(A.Nombre_Activo))+'] '+'[AF/BC: '+rtrim(ltrim(A.AF_BC))+'] '+'[Ubicaci&oacute;n Primaria: '+rtrim(ltrim(UP.Desc_Ubic_Prim))+'] '+'[Ubicaci&oacute;n Secundaria: '+rtrim(ltrim(US.Desc_Ubic_Sec))+'] '+'[Usuario Responsable: '+rtrim(ltrim(A.Nombre_Completo))+']' as Activo,
				CASE ST.Estatus_Proceso when 1 then 'Nuevo' when 2 then 'En Seguimiento' when 3 then 'En espera de cierre' when 4 then 'Cerrado'
				end as  Id_Estatus_Proceso, ST.Id_Usuario,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) Nombre_Usuario,CA.Nom_Area,ST.Id_Area,ST.Seccion,ST.Titulo,ST.Id_Categoria,SCMR.Desc_Categoria,SCTS.Desc_Subcategoria,ST.Desc_Motivo_Reporte,ST.Prioridad,ST.Url_archivo,ST.Fech_Inser,FORMAT(ST.Fech_Inser,'dd/MM/yyyy hh:mm:ss') as Fecha,FORMAT(ST.Fech_Solicitud,'dd/MM/yyyy hh:mm:ss') as Fecha_Solicitud, FORMAT(ST.Fech_Seguimiento,'dd/MM/yyyy hh:mm:ss') as Fecha_Seguimiento,FORMAT(ST.Fech_Espera_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Esp_Cierre,FORMAT(ST.Fech_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Cierre,
				ST.Usr_Inser,ST.Fech_Mod,ST.Usr_Mod,ST.Estatus_Reg
				,(select C.Desc_Seccion from siga_cat_ticket_seccion C where C.Id_Seccion=ST.Seccion) Nombre_Seccion,Id_Gestor, Id_Gestor_Reasignado
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
				where ST.Estatus_Reg <> '3' and ST.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
				and".$Id_Categoria.$Id_Subcategoria.$seccion_y_Gestor." 
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
					"Tiempo_Respuesta"=>$row["Tiempo_Respuesta"]
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



public function Cancelar_Solicitud($Siga_solicitud_ticketsDto, $Motivo_Cancelacion, $proveedor=null){
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


public function Cambiar_Area($Siga_solicitud_ticketsDto, $proveedor=null){
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$Id_Area=$Siga_solicitud_ticketsDto->getId_Area();
	$Seccion=$Siga_solicitud_ticketsDto->getSeccion();
	
	if($Id_Area!=""&&$Seccion!=""&&$Siga_solicitud_ticketsDto->getId_Solicitud()!=""){
		$sql="
			update siga_solicitud_tickets set Id_Area='".$Id_Area."',Id_Categoria=null,Id_Subcategoria=null, Seccion='".$Seccion."', Fech_Mod=getdate(),Usr_Mod=".$Siga_solicitud_ticketsDto->getUsr_Mod().", Fech_Solicitud=getdate()   where Id_Solicitud=".$Siga_solicitud_ticketsDto->getId_Solicitud()."
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
$Siga_solicitud_ticketsDao = new Siga_solicitud_ticketsDAO();

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
	}
	//Datos del Activo
}

$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsDao->insertSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor);
return $Siga_solicitud_ticketsDto;
}
public function updateSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor=null){
$Siga_solicitud_ticketsDao = new Siga_solicitud_ticketsDAO();
//$tmpDto = new Siga_solicitud_ticketsDTO();
//$tmpDto = $Siga_solicitud_ticketsDao->selectSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor);
//if($tmpDto!=""){//$Siga_solicitud_ticketsDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_solicitud_ticketsDto = $Siga_solicitud_ticketsDao->updateSiga_solicitud_tickets($Siga_solicitud_ticketsDto,$proveedor);
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
public function llenarDataTable($draw, $columns, $order, $start, $length, $search,$Id_Estatus_Proceso, $siga_solicitud_ticketsDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor, $Medio_de_Envio) {
//print_r($siga_solicitud_ticketsDto);
$Siga_solicitud_ticketsDao = new Siga_solicitud_ticketsDAO();
return $Siga_solicitud_ticketsDao->llenarDataTable($draw, $columns, $order, $start, $length, $search,$Id_Estatus_Proceso, $siga_solicitud_ticketsDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor, $Medio_de_Envio);
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
		$sql="
			--Grafica Sservicios Registrados
			SELECT A.Tipo_Actividad, 
			case 
			when A.Tipo_Actividad='1' then 'Mantenimiento Predictivo'
			when A.Tipo_Actividad='2' then 'Mantenimiento Preventivo'
			when A.Tipo_Actividad='3' then 'Mantenimiento Correctivo'
			when A.Tipo_Actividad='4' then 'Capacitaciones'
			end as Desc_Tipo_Actividad,
			COUNT(A.Tipo_Actividad) AS RecuentoFilas
			FROM siga_solicitud_tickets S
			left join siga_actividades A on S.Id_Actividad=A.Id_Actividad
			where S.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' 
			and S.Estatus_Reg<>'3' and rtrim(ltrim(S.Id_Actividad)) <> ''
			and FORMAT(S.Fech_Solicitud  ,'dd/MM/yyyy')between convert(date,'".$Fecha_Inicial."') and convert(date,'".$Fecha_Final."')
			GROUP BY A.Tipo_Actividad
			HAVING COUNT(*) > 0
			--ORDER BY A.Tipo_Actividad
			union
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
	
	if($Fecha_Inicial!=""&&$Fecha_Final!=""){
		$sql="
			--Tabla Sservicios Registrados
			select 
			Sec.Desc_Seccion, S.Titulo, S.Desc_Motivo_Reporte, Act. Nombre_Activo, Act.Marca, Act.Modelo, Act.NumSerie ,
			Cat.Desc_Categoria,
			Sub.Desc_Subcategoria,
			Ges.Nombre_Usuario as Gestor,
			case 
			when S.Prioridad='1' then 'Alta'
			when S.Prioridad='2' then 'Media'
			when S.Prioridad='3' then 'Baja' 
			end  Desc_Prioridad,
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
		and year(A.Fech_Solicitud)=".$Anio; if($Mes!="Anual"){$sql.=" and month(A.Fech_Solicitud)=".$Mes; } 
	$sql.="	) as Total_Seguimiento,
		(select count(*) as Total_Espera_Cierre from siga_solicitud_tickets A 
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
		where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and A.Estatus_Proceso='3'
		and year(A.Fech_Solicitud)=".$Anio; if($Mes!="Anual"){$sql.=" and month(A.Fech_Solicitud)=".$Mes; }
	$sql.="	) as Total_Espera_Cierre,
		(select count(*) as Total_Cierre from siga_solicitud_tickets A 
		left join siga_activos SA  on A.Id_Activo=SA.Id_Activo 
		where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and A.Estatus_Proceso='4'
		and year(A.Fech_Solicitud)=".$Anio; if($Mes!="Anual"){$sql.=" and month(A.Fech_Solicitud)=".$Mes; }
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=01 
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=02
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=03
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=04
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=05
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=06
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=07
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=08
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=09
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=10
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=11
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=12
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=01 
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=02
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=03
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=04
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=05
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=06
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=07
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=08
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=09
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=10
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=11
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
			and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=12
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
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=01 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Enero,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=02 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Febrero,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=03 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Marzo,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=04 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Abril,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=05 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Mayo,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=06 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Junio,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=07 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Julio,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=08 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Agosto,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=09 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Septiembre,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=10 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Octubre,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=11 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
		) as Noviembre,
		(select count(*) as Total from siga_solicitud_tickets A left join siga_activos SA  on A.Id_Activo=SA.Id_Activo where A.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and A.Estatus_Reg<>'3' ".$sql_search.$sql_search_mesa_ayuda."
		and year(A.Fech_Solicitud)=".$Anio." and month(A.Fech_Solicitud)=12 
		and A.Id_Subcategoria not in(
			select 
			--sc.Id_Seccion, ss.Id_Categoria, 
			ss.Id_Subcategoria
			--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
			from siga_cat_ticket_subcategoria ss
			left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
			left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
			where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
			--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
		)
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
		select * from siga_cat_ubic_prim where Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Estatus_Reg<>'3'
	";
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
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and Id_Ubic_Prim=".$row_c["Id_Ubic_Prim"]." and SS.Estatus_Reg<>'3' 
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes." 
					and SS.Id_Subcategoria not in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					)
					and Id_Actividad is null ".$sql_search.$sql_search_mesa_ayuda."
				";
				if(($Ubic_Prim!="-1")){ $sql.=" and SA.Id_Ubic_Prim='".$Ubic_Prim."'"; }
				if(($Ubic_Sec!="-1")){ $sql.=" and SA.Id_Ubic_Sec='".$Ubic_Sec."'"; }
				
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
					and rtrim(ltrim(EMP.gerencia))='".$row_c["Desc_Ubic_Prim"]."'
					and SS.Id_Subcategoria not in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					)
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes." ".$sql_search.$sql_search_mesa_ayuda."
				
				";
				
				//echo "<pre>";
				//echo $sql;
				//echo "</pre>";
				
				if(($Ubic_Prim!="-1")){
					$Desc_Ubic_Primaria=$this->Ubicacion_Primaria($Siga_solicitud_ticketsDto, $Ubic_Prim);	
					$sql.=" and rtrim(ltrim(EMP.gerencia))='".$Desc_Ubic_Primaria['data'][0]['Desc_Ubic_Prim']."'";
				}
				if(($Ubic_Sec!="-1")){  
					$Desc_Ubic_Secundaria=$this->Ubicacion_Secundaria($Siga_solicitud_ticketsDto, $Ubic_Sec);	
					$sql.=" and rtrim(ltrim(EMP.departamento))='".$Desc_Ubic_Secundaria['data'][0]['Desc_Ubic_Sec']."'";
				}
				
				//echo $sql;
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
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and Id_Ubic_Prim=".$row_c["Id_Ubic_Prim"]." and SS.Estatus_Reg<>'3' --and ACT.Tipo_Actividad='2'
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
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes." ".$sql_search.$sql_search_mesa_ayuda."
				";
				if(($Ubic_Prim!="-1")){ $sql.=" and SA.Id_Ubic_Prim='".$Ubic_Prim."'"; }
				if(($Ubic_Sec!="-1")){ $sql.=" and SA.Id_Ubic_Sec='".$Ubic_Sec."'"; }
				
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
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and Id_Ubic_Prim=".$row_c["Id_Ubic_Prim"]." and SS.Estatus_Reg<>'3' --and ACT.Tipo_Actividad='3'
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
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes." ".$sql_search.$sql_search_mesa_ayuda."
				";
				if(($Ubic_Prim!="-1")){ $sql.=" and SA.Id_Ubic_Prim='".$Ubic_Prim."'"; }
				if(($Ubic_Sec!="-1")){ $sql.=" and SA.Id_Ubic_Sec='".$Ubic_Sec."'"; }
				
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
					"Desc_Ubic_Prim"=>$row_c["Desc_Ubic_Prim"],
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
	
	
	$sql_ubic_prim_1="";
	$sql_ubic_prim_2="";
	if(($Ubic_Prim!="-1")){
		$sql_ubic_prim_1.=" and SA.Id_Ubic_Prim='".$Ubic_Prim."' ";
		/////
		$Desc_Ubic_Primaria=$this->Ubicacion_Primaria($Siga_solicitud_ticketsDto, $Ubic_Prim);	
		$sql_ubic_prim_2.=" and rtrim(ltrim(EMP.gerencia))='".$Desc_Ubic_Primaria['data'][0]['Desc_Ubic_Prim']."'";
	}
	
	$sql_ubic_sec_1="";
	$sql_ubic_sec_2="";
	if(($Ubic_Sec!="-1")){
		$sql_ubic_sec_1.=" and SA.Id_Ubic_Sec='".$Ubic_Sec."' ";
		/////
		$Desc_Ubic_Secundaria=$this->Ubicacion_Secundaria($Siga_solicitud_ticketsDto, $Ubic_Sec);	
		$sql_ubic_sec_2.=" and rtrim(ltrim(EMP.departamento))='".$Desc_Ubic_Secundaria['data'][0]['Desc_Ubic_Sec']."' ";
	}
	
	
	
	$sql="
		--Se realiza la consulta al catalogo de ubicacion primaria por area
		select * from (	
			select 
				SCUP.Id_Ubic_Prim, SCUP.Desc_Ubic_Prim
				,(
					
					--Se obtiene el total de solicitudes ligados a un activo
					(select count(*) as Total from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim
					left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
					left join empleados_chs EMP on SU.No_Usuario=EMP.num_empleado
					where 
					SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
					and SS.Id_Activo is not null and
					SS.Estatus_Reg<>'3' and SA.Id_Ubic_Prim=SCUP.Id_Ubic_Prim
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes.$sql_ubic_prim_1.$sql_ubic_sec_1.$sql_search.$sql_search_mesa_ayuda.")
					+  --Se realiza la suma de los Totales
					--Se obtoiene el total de activos que no estan liga
					(select count(*) as Total from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim
					left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
					left join empleados_chs EMP on SU.No_Usuario=EMP.num_empleado
					where 
					SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
					and SS.Id_Activo is null and
					SS.Estatus_Reg<>'3' and EMP.gerencia=SCUP.Desc_Ubic_Prim COLLATE Modern_Spanish_CI_AS
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes.$sql_ubic_prim_2.$sql_ubic_sec_2.$sql_search.$sql_search_mesa_ayuda.") 
				) as Total_Solicitudes
			from siga_cat_ubic_prim SCUP
			where
				Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and Estatus_Reg<>'3'
		)	siga_cat_ubic_prim where Total_Solicitudes>0
	";
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

public function pie_indicador_reportes_por_area_ubic_sec($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $proveedor=null){
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
	
	$sql_ubic_prim_1="";
	$sql_ubic_prim_2="";
	if(($Ubic_Prim!="-1")){
		$sql_ubic_prim_1.=" and SA.Id_Ubic_Prim='".$Ubic_Prim."' ";
		/////
		$Desc_Ubic_Primaria=$this->Ubicacion_Primaria($Siga_solicitud_ticketsDto, $Ubic_Prim);	
		$sql_ubic_prim_2.=" and rtrim(ltrim(EMP.gerencia))='".$Desc_Ubic_Primaria['data'][0]['Desc_Ubic_Prim']."'";
	}
	
	$sql_ubic_sec_1="";
	$sql_ubic_sec_2="";
	if(($Ubic_Sec!="-1")){
		$sql_ubic_sec_1.=" and SA.Id_Ubic_Sec='".$Ubic_Sec."' ";
		/////
		$Desc_Ubic_Secundaria=$this->Ubicacion_Secundaria($Siga_solicitud_ticketsDto, $Ubic_Sec);	
		$sql_ubic_sec_2.=" and rtrim(ltrim(EMP.departamento))='".$Desc_Ubic_Secundaria['data'][0]['Desc_Ubic_Sec']."' ";
	}
	
	
	$sql="
		
		--Se realiza la consulta al catalogo de ubicacion primaria por area
		select * from (	
			select 
				SCUS.Id_Ubic_Sec, SCUS.Desc_Ubic_Sec
				,(
					--Se obtiene el total de solicitudes ligados a un activo
					(select count(*) as Total from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim
					left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
					left join empleados_chs EMP on SU.No_Usuario=EMP.num_empleado
					where 
					SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
					and SS.Id_Activo is not null and
					SS.Estatus_Reg<>'3' and SA.Id_Ubic_Sec=SCUS.Id_Ubic_Sec
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes.$sql_ubic_prim_1.$sql_ubic_sec_1.$sql_search.$sql_search_mesa_ayuda.")
					+  --Se realiza la suma de los Totales
					--Se obtoiene el total de activos que no estan liga
					(select count(*) as Total from siga_solicitud_tickets SS 
					left join siga_activos SA on  SS.Id_Activo=SA.Id_Activo
					left join siga_actividades ACT on SS.Id_Actividad=ACT.Id_Actividad
					left join siga_cat_ubic_prim UP on SA.Id_Ubic_Prim=UP.Id_Ubic_Prim
					left join siga_usuarios SU on SS.Id_Usuario =SU.Id_Usuario
					left join empleados_chs EMP on SU.No_Usuario=EMP.num_empleado
					where 
					SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'
					and SS.Id_Activo is null and
					SS.Estatus_Reg<>'3' and EMP.departamento=SCUS.Desc_Ubic_Sec COLLATE Modern_Spanish_CI_AS
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes.$sql_ubic_prim_2.$sql_ubic_sec_2.$sql_search.$sql_search_mesa_ayuda.")
				) as Total_Solicitudes
			from siga_cat_ubic_sec SCUS
			where
				Estatus_Reg<>'3' and Id_Ubic_Prim='".$Ubic_Prim."'
		)	siga_cat_ubic_sec where Total_Solicitudes>0
	";
	
	$proveedor->execute($sql);
	
	$Total_Cantidad=0;
	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Total_Cantidad=$Total_Cantidad+$row_c["Total_Solicitudes"];
				$Data= array(
					"Id_Ubic_Sec"=>$row_c["Id_Ubic_Sec"],
					"Desc_Ubic_Sec"=>$row_c["Desc_Ubic_Sec"],
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
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."'  and Id_Gestor=".$row_c["Id_Usuario"]." and SS.Estatus_Reg<>'3' 
					and year(SS.Fech_Solicitud)=".$Anio." and month(SS.Fech_Solicitud)=".$Mes."
					and SS.Id_Subcategoria not in(
						select 
						--sc.Id_Seccion, ss.Id_Categoria, 
						ss.Id_Subcategoria
						--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
						from siga_cat_ticket_subcategoria ss
						left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
						left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
						where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
						--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
					)".$sql_search." ".$sql_search_mesa_ayuda."
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
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and Id_Gestor=".$row_c["Id_Usuario"]." and SS.Estatus_Reg<>'3' --and ACT.Tipo_Actividad='2'
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
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and Id_Gestor=".$row_c["Id_Usuario"]." and SS.Estatus_Reg<>'3' --and ACT.Tipo_Actividad='3'
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
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and Id_Ubic_Prim=".$row_c["Id_Ubic_Prim"]." and SS.Estatus_Reg<>'3' 
					and SS.Id_Actividad is not null and SS.Id_Actividad<>''
					and 
					((year(SS.Fech_Solicitud)=".$Anio; if($Mes!="Anual"){$sql.=" and month(SS.Fech_Solicitud)=".$Mes;}
					$sql.=" ) or (year(SS.Fech_Seguimiento)=".$Anio; if($Mes!="Anual"){$sql.=" and month(SS.Fech_Seguimiento)=".$Mes;}
					$sql.=" ) or (year(SS.Fech_Espera_Cierre)=".$Anio; if($Mes!="Anual"){$sql.=" and month(SS.Fech_Espera_Cierre)=".$Mes;}
					$sql.=" )) and Fech_Cierre is null
					".$sql_search.$sql_search_mesa_ayuda;
					
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
					where SS.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and SS.Id_Activo is not null and Id_Ubic_Prim=".$row_c["Id_Ubic_Prim"]." and SS.Estatus_Reg<>'3'
					and SS.Id_Actividad is not null and SS.Id_Actividad<>''
					and year(SS.Fech_Cierre)=".$Anio;
					if($Mes!="Anual"){$sql.=" and month(SS.Fech_Cierre)=".$Mes;}
					$sql.=$sql_search.$sql_search_mesa_ayuda;
					
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


public function tabla_dinamica_tickets($Siga_solicitud_ticketsDto, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Mes, $Rutina, $Nombre_Grafica, $Tipo_Mantenimiento, $proveedor=null){
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
			$Desc_Ubic_Primaria=$this->Ubicacion_Primaria($Siga_solicitud_ticketsDto, $Ubic_Prim);	
			$sql_search.=" rtrim(ltrim(EMP.gerencia))='".$Desc_Ubic_Primaria['data'][0]['Desc_Ubic_Prim']."'";
		}else{
				//Grafica 4
			if($Nombre_Grafica=="pie_reportes_por_area_ubic_prim_sec"){
				$Desc_Ubic_Primaria=$this->Ubicacion_Primaria($Siga_solicitud_ticketsDto, $Ubic_Prim);	
				$sql_search.=" (UP.Desc_Ubic_Prim is null AND rtrim(ltrim(EMP.gerencia))='".$Desc_Ubic_Primaria['data'][0]['Desc_Ubic_Prim']."' OR UP.Id_Ubic_Prim=".$Ubic_Prim.") ";
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
			$Desc_Ubic_Secundaria=$this->Ubicacion_Secundaria($Siga_solicitud_ticketsDto, $Ubic_Sec);	
			$sql_search.=" rtrim(ltrim(EMP.departamento))='".$Desc_Ubic_Secundaria['data'][0]['Desc_Ubic_Sec']."'";
		}else{
			//Grafica 4
			if($Nombre_Grafica=="pie_reportes_por_area_ubic_prim_sec"){
				$Desc_Ubic_Secundaria=$this->Ubicacion_Secundaria($Siga_solicitud_ticketsDto, $Ubic_Sec);	
				$sql_search.=" (US.Desc_Ubic_Sec is null and rtrim(ltrim(EMP.departamento))='".$Desc_Ubic_Secundaria['data'][0]['Desc_Ubic_Sec']."' or US.Id_Ubic_Sec=".$Ubic_Sec.") ";
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
				and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Solicitud)=".$Anio." 
			";
			
			if($Mes!="Anual"){
				$sql_barra_indicadores_mesa_ayuda.="
					and month(ST.Fech_Solicitud)=".$Mes."
				";
			}
			
			//$sql_barra_indicadores_mesa_ayuda="
			//	and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Seguimiento)=".$Anio." 
			//";
		}
		
		if($Siga_solicitud_ticketsDto->getEstatus_Proceso()==3){
			$sql_barra_indicadores_mesa_ayuda="
				and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Solicitud)=".$Anio." 
			";
			
			if($Mes!="Anual"){
				$sql_barra_indicadores_mesa_ayuda.="
					and month(ST.Fech_Solicitud)=".$Mes."
				";
			}
			//$sql_barra_indicadores_mesa_ayuda="
			//	and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Espera_Cierre)=".$Anio." 
			//";
		}
		
		if($Siga_solicitud_ticketsDto->getEstatus_Proceso()==4){
			$sql_barra_indicadores_mesa_ayuda="
				and ST.Estatus_Proceso='".$Siga_solicitud_ticketsDto->getEstatus_Proceso()."' and year(ST.Fech_Solicitud)=".$Anio." 
			";
			
			if($Mes!="Anual"){
				$sql_barra_indicadores_mesa_ayuda.="
					and month(ST.Fech_Solicitud)=".$Mes."
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
				--and ST.Id_Activo is not null
				and year(ST.Fech_Solicitud)=".$Anio." and month(ST.Fech_Solicitud)=".$Mes."
				--and ST.Id_Actividad is null 
				and ST.Id_Subcategoria not in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				)
			";
		}
		
		//Asistencia Sin Activos(Solicitud Tickets)
		if($Tipo_Mantenimiento=="Sin_Activo"){
			$sql_barra_indicador_rep_por_area="
				and ST.Id_Activo is null --No Viene Relacionado a un Activo 
				and year(ST.Fech_Solicitud)=".$Anio." and month(ST.Fech_Solicitud)=".$Mes."
				--and ST.Id_Actividad is null  --No viene Relacionado a una Actividad
				and ST.Id_Subcategoria not in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				)
			";
		}
		
		//Mantenimiento Predictivo
		if($Tipo_Mantenimiento==2){
			$sql_barra_indicador_rep_por_area="
				--and ST.Id_Activo is not null
				and year(ST.Fech_Solicitud)=".$Anio." and month(ST.Fech_Solicitud)=".$Mes."
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
				and year(ST.Fech_Solicitud)=".$Anio." and month(ST.Fech_Solicitud)=".$Mes."
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
	}
	
	$sql_barra_indicador_rep_por_gestor="";
	if($Nombre_Grafica=="barra_indicador_reportes_por_gestor"){
		//Asistencia (Solicitud Tickets)
		if($Tipo_Mantenimiento==0){
			$sql_barra_indicador_rep_por_gestor="
				and year(ST.Fech_Solicitud)=".$Anio." and month(ST.Fech_Solicitud)=".$Mes."
				--and ST.Id_Actividad is null 
				and ST.Id_Subcategoria not in(
					select 
					--sc.Id_Seccion, ss.Id_Categoria, 
					ss.Id_Subcategoria
					--,ss.Desc_Subcategoria, ss.Id_Categoria, secc.Desc_Seccion 
					from siga_cat_ticket_subcategoria ss
					left join siga_cat_ticket_categoria sc on ss.Id_Categoria=sc.Id_Categoria 
					left join siga_cat_ticket_seccion secc on sc.Id_Seccion=secc.Id_Seccion 
					where secc.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and (Desc_Subcategoria like '%mantenimiento preventivo%' or Desc_Subcategoria like '%mantenimiento correctivo%')
					--and sc.Id_Seccion=1 and ss.Id_Categoria=1 and ss.Id_Subcategoria=1
				)
			";
		}
		
		//Mantenimiento Predictivo
		if($Tipo_Mantenimiento==2){
			$sql_barra_indicador_rep_por_gestor="
				and ST.Id_Activo is not null
				and year(ST.Fech_Solicitud)=".$Anio." and month(ST.Fech_Solicitud)=".$Mes."
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
				and year(ST.Fech_Solicitud)=".$Anio." and month(ST.Fech_Solicitud)=".$Mes."
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
			and year(ST.Fech_Solicitud)=".$Anio." and month(ST.Fech_Solicitud)=".$Mes."
			
		";
		
	}
	
	$sql_barra_mant_prog_realiz="";
	if($Nombre_Grafica=="barra_indicador_mantenimientos"){
		//Programados
		if($Tipo_Mantenimiento==1){
			$sql_barra_mant_prog_realiz="
				and ST.Id_Activo is not null
				and ST.Id_Actividad is not null and ST.Id_Actividad<>'' and  
				((year(ST.Fech_Solicitud)=".$Anio; if($Mes!="Anual"){$sql_barra_mant_prog_realiz.=" and month(ST.Fech_Solicitud)=".$Mes;}
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
	
	
	$sql="
		SELECT EMP.gerencia, EMP.departamento, A.AF_BC,A.Nombre_Activo,Est_Act.Desc_Estatus as Estatus_Activo, UP.Desc_Ubic_Prim, US.Desc_Ubic_Sec,ST.Id_Solicitud,ST.Asist_Especial,ST.Id_Activo, '[Nombre Activo: '+rtrim(ltrim(A.Nombre_Activo))+'] '+'[AF/BC: '+rtrim(ltrim(A.AF_BC))+'] '+'[Ubicaci&oacute;n Primaria: '+rtrim(ltrim(UP.Desc_Ubic_Prim))+'] '+'[Ubicaci&oacute;n Secundaria: '+rtrim(ltrim(US.Desc_Ubic_Sec))+'] '+'[Usuario Responsable: '+rtrim(ltrim(A.Nombre_Completo))+']' as Activo,
		CASE ST.Estatus_Proceso when 1 then 'Nuevo' when 2 then 'En Seguimiento' when 3 then 'En espera de cierre' when 4 then 'Cerrado'
		end as  Id_Estatus_Proceso, ST.Id_Usuario,(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) Nombre_Usuario,CA.Nom_Area,ST.Id_Area,ST.Seccion,ST.Titulo,ST.Id_Categoria,SCMR.Desc_Categoria,SCTS.Desc_Subcategoria,ST.Desc_Motivo_Reporte,ST.Prioridad,ST.Url_archivo,ST.Fech_Inser,FORMAT(ST.Fech_Inser,'dd/MM/yyyy hh:mm:ss') as Fecha,FORMAT(ST.Fech_Solicitud,'dd/MM/yyyy hh:mm:ss') as Fecha_Solicitud, FORMAT(ST.Fech_Seguimiento,'dd/MM/yyyy hh:mm:ss') as Fecha_Seguimiento,FORMAT(ST.Fech_Espera_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Esp_Cierre,FORMAT(ST.Fech_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Cierre,
		ST.Usr_Inser,ST.Fech_Mod,ST.Usr_Mod,ST.Estatus_Reg
		,(select C.Desc_Seccion from siga_cat_ticket_seccion C where C.Id_Seccion=ST.Seccion) Nombre_Seccion,Id_Gestor, Id_Gestor_Reasignado
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

public function Reporte_Mesa_de_Ayuda($Siga_solicitud_ticketsDto, $Fecha_Inicial, $Fecha_Final, $Ubic_Prim, $Ubic_Sec, $Clase, $Clasificacion, $Familia, $Subfamilia, $Anio, $Tipo_Mantenimiento, $proveedor=null){
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
	
	$sql="
		SELECT 
			A.AF_BC,";
	if($Siga_solicitud_ticketsDto->getId_Area()==1){
	$sql.="	case when UP.Desc_Ubic_Prim='HOSPITALIZACIÓN' then US.Desc_Ubic_Sec 
			when UP.Desc_Ubic_Prim='DIRECCION MEDICA' then US.Desc_Ubic_Sec 
			when UP.Desc_Ubic_Prim='UNIDAD QUIRÚRGICA' then US.Desc_Ubic_Sec else
			Desc_Ubic_Prim
			end as
			Desc_Ubic_Prim,"; 
	}else{
	$sql.="	UP.Desc_Ubic_Prim,"; 
	
	}
	
	$sql.="	US.Desc_Ubic_Sec,
			Cl.Desc_Clase,
			Clasif.Desc_Clasificacion,
			A.Marca,
			A.Modelo,
			A.NumSerie,
			A.Nombre_Activo, 
			Prop.Desc_Propiedad,
			CASE when Act.Tipo_Actividad=1 then 'Mto. Predictivo' when Act.Tipo_Actividad=2 then 'Mto. Preventivo' when Act.Tipo_Actividad=3 then 'Mto. Correctivo' when Act.Tipo_Actividad=4 then 'Capacitaciones'  when ST.Id_Actividad is NULL then '".$Tipo_Asistencia."' end as  Tipo_Servicio,
			M_Ap.Desc_Motivo_Aparente,
			M_Re.Desc_Motivo_Real,
			ST.Desc_Motivo_Reporte,
			SCMR.desc_categoria,
			SCTS.desc_subcategoria,
			ST.ComentarioCierre as Desc_Acci_Realiz,
			(select rtrim(ltrim(U.No_Usuario)) from siga_usuarios U where ST.Id_Gestor=U.Id_Usuario) Gestor_Nomina,
			(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Gestor=U.Id_Usuario) Gestor,
			(select top 1 '<strong>Solucíon Ofrecida: </strong>'+TC.Desc_Comentario1+ ' <br><br><strong>Actitud del Servicio: </strong>'+TC.Desc_Comentario2 + ' <br><br><strong>Tiempo de Respuesta: </strong>'+TC.Desc_Comentario3 as Comentarios_Cierre from siga_ticket_calificacion TC where ST.Id_Solicitud=TC.Id_Solicitud) Comentarios_Cierre,
			
			(select top 1  Id_Respuesta1 from siga_ticket_calificacion TC where ST.Id_Solicitud=TC.Id_Solicitud) Id_Respuesta1,
			(select top 1  Id_Respuesta2 from siga_ticket_calificacion TC where ST.Id_Solicitud=TC.Id_Solicitud) Id_Respuesta2,
			(select top 1  Id_Respuesta3 from siga_ticket_calificacion TC where ST.Id_Solicitud=TC.Id_Solicitud) Id_Respuesta3,
			
			(select rtrim(ltrim(U.No_Usuario)) from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) Solicitante_Nomina,
			(select U.Nombre_Usuario from siga_usuarios U where ST.Id_Usuario=U.Id_Usuario) Solicitante,
			FORMAT(ST.Fech_Solicitud,'dd/MM/yyyy hh:mm:ss') as Fecha_Solicitud, 
			FORMAT(ST.Fech_Seguimiento,'dd/MM/yyyy hh:mm:ss') as Fecha_Seguimiento,
			FORMAT(ST.Fech_Espera_Cierre,'dd/MM/yyyy hh:mm:ss') as Fecha_Esp_Cierre,";
			
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
			left join siga_cat_ticket_categoria SCMR on ST.Id_Categoria=SCMR.Id_Categoria 
			left join siga_cat_ticket_subcategoria SCTS on ST.Id_Subcategoria=SCTS.Id_Subcategoria 
			left join siga_catareas CA on ST.Id_Area=CA.Id_Area 
			left join siga_activos A on ST.Id_Activo=A.Id_Activo 
			left join siga_cat_ubic_prim UP on A.Id_Ubic_Prim=UP.Id_Ubic_Prim 
			left join siga_cat_ubic_sec US on A.Id_Ubic_Sec=US.Id_Ubic_Sec 
			left join siga_actividades Act on ST.Id_Actividad=Act.Id_Actividad
			left join siga_cat_estatus Est_Act on A.Id_Situacion_Activo=Est_Act.Id_Estatus
			left join siga_cat_clase Cl on A.Id_Clase=Cl.Id_Clase
			left join siga_cat_clasificacion Clasif on A.Id_Clasificacion=Clasif.Id_Clasificacion
			left join siga_cat_propiedad Prop on A.Id_Propiedad=Prop.Id_Propiedad
			left join siga_cat_motivo_aparente M_Ap on ST.Id_Motivo_Aparente=M_Ap.Id_Motivo_Aparente
			left join siga_cat_motivo_real M_Re on ST.Id_Motivo_Real=M_Re.Id_Motivo_Real
		where ST.Estatus_Reg <> '3' and ST.Id_Area='".$Siga_solicitud_ticketsDto->getId_Area()."' and ST.Estatus_Proceso='4'  
		and FORMAT(ST.Fech_Cierre,'dd/MM/yyyy') BETWEEN convert(date,'".$Fecha_Inicial."') AND convert(date,'".$Fecha_Final."') ".$sql_search."
	";
	
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	$proveedor->execute($sql);

	if(!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				$Data= array(
					"AF_BC" => $row_c["AF_BC"],
                    "Desc_Ubic_Prim" => $row_c["Desc_Ubic_Prim"],
					"Desc_Ubic_Sec" => $row_c["Desc_Ubic_Sec"],
					"Desc_Clase" => $row_c["Desc_Clase"],
					"Desc_Clasificacion" => $row_c["Desc_Clasificacion"],
					"Marca" => $row_c["Marca"],
					"Modelo" => $row_c["Modelo"],
					"NumSerie" => $row_c["NumSerie"],
					"Nombre_Activo"=> $row_c["Nombre_Activo"],
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
?>