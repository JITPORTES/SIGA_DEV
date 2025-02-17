<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_solicitud_prestamos/Siga_solicitud_prestamosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_solicitud_prestamos/Siga_solicitud_prestamosDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_solicitud_prestamosController {
private $proveedor;
public function __construct() {
}
public function validarSiga_solicitud_prestamos($Siga_solicitud_prestamosDto){
$Siga_solicitud_prestamosDto->setId_Solicitud(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getId_Solicitud()))));
$Siga_solicitud_prestamosDto->setId_Activo(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getId_Activo()))));
$Siga_solicitud_prestamosDto->setId_Usuario(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getId_Usuario()))));
$Siga_solicitud_prestamosDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getId_Area()))));
$Siga_solicitud_prestamosDto->setId_Medio(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getId_Medio()))));
$Siga_solicitud_prestamosDto->setSeccion(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getSeccion()))));
$Siga_solicitud_prestamosDto->setTitulo(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getTitulo()))));
$Siga_solicitud_prestamosDto->setId_Det_Actividad(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getId_Det_Actividad()))));
$Siga_solicitud_prestamosDto->setDesc_Motivo_Reporte(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getDesc_Motivo_Reporte()))));
$Siga_solicitud_prestamosDto->setPrioridad(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getPrioridad()))));
$Siga_solicitud_prestamosDto->setUrl_archivo(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getUrl_archivo()))));
$Siga_solicitud_prestamosDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getFech_Inser()))));
$Siga_solicitud_prestamosDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getUsr_Inser()))));
$Siga_solicitud_prestamosDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getFech_Mod()))));
$Siga_solicitud_prestamosDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getUsr_Mod()))));
$Siga_solicitud_prestamosDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getEstatus_Reg()))));
$Siga_solicitud_prestamosDto->setEstatus_Proceso(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getEstatus_Proceso()))));
$Siga_solicitud_prestamosDto->setTituloCierre(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getTituloCierre()))));
$Siga_solicitud_prestamosDto->setComentariocierre(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getComentarioCierre()))));
$Siga_solicitud_prestamosDto->setAccesorios_Cierre(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getAccesorios_Cierre()))));
$Siga_solicitud_prestamosDto->setFecha_Prestamo(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getFecha_Prestamo()))));
$Siga_solicitud_prestamosDto->setFecha_Devolucion(strtoupper(str_ireplace("'","",trim($Siga_solicitud_prestamosDto->getFecha_Devolucion()))));
return $Siga_solicitud_prestamosDto;
}
public function selectSiga_solicitud_prestamos($Siga_solicitud_prestamosDto,$proveedor=null){
$Siga_solicitud_prestamosDto=$this->validarSiga_solicitud_prestamos($Siga_solicitud_prestamosDto);
$Siga_solicitud_prestamosDao = new Siga_solicitud_prestamosDAO();
$Siga_solicitud_prestamosDto = $Siga_solicitud_prestamosDao->selectSiga_solicitud_prestamos($Siga_solicitud_prestamosDto,$proveedor);
return $Siga_solicitud_prestamosDto;
}


public function reporte_prestamo($Siga_solicitud_prestamosDto, $proveedor=null){
	$Total=0;
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	$sql="
		select 
		p.Id_Solicitud
		,p.Id_Usuario
		,(select top 1 Nombre_Usuario from siga_usuarios where Id_Usuario=p.Id_Usuario) as Nom_Solicitante
		,p.Id_Area
		,p.Id_Medio
		,p.Seccion
		,p.Titulo
		,p.Desc_Motivo_Reporte
		,case when p.Prioridad=1 then 'Alta' when p.Prioridad=2 then 'Media' when p.Prioridad=3 then 'Poca' end as Prioridad
		,p.Url_archivo
		,FORMAT (p.Fech_Inser, 'yyyy/MM/dd hh:mm') as Fech_Inser
		,p.Usr_Inser
		,p.Fech_Mod
		,p.Usr_Mod
		,p.Estatus_Reg
		,p.Estatus_Proceso
		,p.Id_Activo
		,p.Id_Gestor
		,(select top 1 Nombre_Usuario from siga_usuarios where Id_Usuario=p.Id_Gestor) as Nom_Gestor
		,p.Nombre_Gestor
		,p.TituloCierre
		,p.Estado_Equipo_Cierre
		,p.Accesorios_Cierre
		,p.ComentarioCierre
		,p.Fecha_Prestamo
		,p.Fecha_Devolucion
		,p.Fecha_Entrega
		,p.ComentarioEntrega
		
		,su.No_Usuario
		,e.gerencia
		,e.departamento
		,e.puesto
		,e.direccion
		,e.ext_telefonica
		,e.email
		
		,(select A.AF_BC from siga_activos A where P.Id_Activo=A.Id_Activo) AF_BC
		,(select Foto  from siga_activos A where P.Id_Activo=A.Id_Activo) Foto 
		,(select Nombre_Activo  from siga_activos A where P.Id_Activo=A.Id_Activo) Nombre_Activo
		,(select DescLarga  from siga_activos A where P.Id_Activo=A.Id_Activo) Desc_Larga
		,(select top 1 Nom_Area from siga_catareas where Id_Area=p.Id_Area) Nom_Area
		,A.Marca
		,A.Modelo
		,A.NumSerie
		,UP.Desc_Ubic_Prim
		,US.Desc_Ubic_Sec
		,A.Especifica
		from siga_solicitud_prestamos  p
		left join siga_activos  A on P.Id_Activo=A.Id_Activo
		left join siga_cat_ubic_prim  UP on A.Id_Ubic_Prim=UP.Id_Ubic_Prim 
		left join siga_cat_ubic_sec  US on A.Id_Ubic_Sec=US.Id_Ubic_Sec 
		left join siga_usuarios su on p.Id_Usuario=su.Id_Usuario
		left join empleados_chs e on e.num_empleado=su.No_Usuario 
		where Id_Solicitud=".$Siga_solicitud_prestamosDto->getId_Solicitud()."
	";
	
	
	//echo "<pre>";
	//echo $sql;
	//echo "</pre>";
	$proveedor->execute($sql);
	
	
	if (!$proveedor->error()){
		//La posicion cero no se toma
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row_c = $proveedor->fetch_array($proveedor->stmt, 0)) {
				
				$Data= array(
					"Id_Solicitud"=>$row_c["Id_Solicitud"],
					"Id_Usuario"=>$row_c["Id_Usuario"],
					"Nom_Solicitante"=>$row_c["Nom_Solicitante"],
					"Id_Area"=>$row_c["Id_Area"],
					"Id_Medio"=>$row_c["Id_Medio"],
					"Seccion"=>$row_c["Seccion"],
					"Titulo"=>$row_c["Titulo"],
					"Desc_Motivo_Reporte"=>$row_c["Desc_Motivo_Reporte"],
					"Prioridad"=>$row_c["Prioridad"],
					"Url_archivo"=>$row_c["Url_archivo"],
					"Fech_Inser"=>$row_c["Fech_Inser"],
					"Usr_Inser"=>$row_c["Usr_Inser"],
					"Fech_Mod"=>$row_c["Fech_Mod"],
					"Usr_Mod"=>$row_c["Usr_Mod"],
					"Estatus_Reg"=>$row_c["Estatus_Reg"],
					"Estatus_Proceso"=>$row_c["Estatus_Proceso"],
					"Id_Activo"=>$row_c["Id_Activo"],
					"Id_Gestor"=>$row_c["Id_Gestor"],
					"Nom_Gestor"=>$row_c["Nom_Gestor"],
					"Nombre_Gestor"=>$row_c["Nombre_Gestor"],
					"TituloCierre"=>$row_c["TituloCierre"],
					"Estado_Equipo_Cierre"=>$row_c["Estado_Equipo_Cierre"],
					"Accesorios_Cierre"=>$row_c["Accesorios_Cierre"],
					"ComentarioCierre"=>$row_c["ComentarioCierre"],
					"Fecha_Prestamo"=>$row_c["Fecha_Prestamo"],
					"Fecha_Devolucion"=>$row_c["Fecha_Devolucion"],
					"Fecha_Entrega"=>$row_c["Fecha_Entrega"],
					"ComentarioEntrega"=>$row_c["ComentarioEntrega"],				
					"Nom_Area"=>$row_c["Nom_Area"],
					
					"No_Usuario"=>$row_c["No_Usuario"],
					"gerencia"=>$row_c["gerencia"],
					"departamento"=>$row_c["departamento"],
					"puesto"=>$row_c["puesto"],
					"direccion"=>$row_c["direccion"],
					"ext_telefonica"=>$row_c["ext_telefonica"],
					"email"=>$row_c["email"],
					
					"AF_BC"=>$row_c["AF_BC"],
					"Foto"=>$row_c["Foto"],
					"Nombre_Activo"=>$row_c["Nombre_Activo"],
					"Desc_Larga"=>$row_c["Desc_Larga"],
					"Marca"=>$row_c["Marca"],
					"Modelo"=>$row_c["Modelo"],
					"NumSerie"=>$row_c["NumSerie"],
					"Desc_Ubic_Prim"=>$row_c["Desc_Ubic_Prim"],
					"Desc_Ubic_Sec"=>$row_c["Desc_Ubic_Sec"],
					"Especifica"=>$row_c["Especifica"]
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



public function insertSiga_solicitud_prestamos($Siga_solicitud_prestamosDto,$proveedor=null){
$Siga_solicitud_prestamosDao = new Siga_solicitud_prestamosDAO();
$Siga_solicitud_prestamosDto = $Siga_solicitud_prestamosDao->insertSiga_solicitud_prestamos($Siga_solicitud_prestamosDto,$proveedor);
return $Siga_solicitud_prestamosDto;
}
public function updateSiga_solicitud_prestamos($Siga_solicitud_prestamosDto,$proveedor=null){
$Siga_solicitud_prestamosDao = new Siga_solicitud_prestamosDAO();
//$tmpDto = new Siga_solicitud_prestamosDTO();
//$tmpDto = $Siga_solicitud_prestamosDao->selectSiga_solicitud_prestamos($Siga_solicitud_prestamosDto,$proveedor);
//if($tmpDto!=""){//$Siga_solicitud_prestamosDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_solicitud_prestamosDto = $Siga_solicitud_prestamosDao->updateSiga_solicitud_prestamos($Siga_solicitud_prestamosDto,$proveedor);
return $Siga_solicitud_prestamosDto;
//}
//return "";
}
public function deleteSiga_solicitud_prestamos($Siga_solicitud_prestamosDto,$proveedor=null){
//$Siga_solicitud_prestamosDto=$this->validarSiga_solicitud_prestamos($Siga_solicitud_prestamosDto);
$Siga_solicitud_prestamosDao = new Siga_solicitud_prestamosDAO();
$Siga_solicitud_prestamosDto = $Siga_solicitud_prestamosDao->deleteSiga_solicitud_prestamos($Siga_solicitud_prestamosDto,$proveedor);
return $Siga_solicitud_prestamosDto;
}
public function llenarDataTable($draw, $columns, $order, $start, $length, $search,$Id_Estatus_Proceso, $siga_solicitud_prestamosDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor) {
//print_r($siga_solicitud_prestamosDto);
$Siga_solicitud_prestamosDao = new Siga_solicitud_prestamosDAO();
return $Siga_solicitud_prestamosDao->llenarDataTable($draw, $columns, $order, $start, $length, $search,$Id_Estatus_Proceso, $siga_solicitud_prestamosDto, $Gestor_Solicitante, $Id_Seccion, $Tipo_Gestor);
}
}
?>