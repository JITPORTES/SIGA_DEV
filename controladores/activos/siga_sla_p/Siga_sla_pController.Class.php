<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_sla_p/Siga_sla_pDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_sla_p/Siga_sla_pDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_sla_pController {
private $proveedor;
public function __construct() {
}
public function validarSiga_sla_p($Siga_sla_pDto){
$Siga_sla_pDto->setId_Sla_P(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getId_Sla_P()))));
$Siga_sla_pDto->setId_Area(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getId_Area()))));
$Siga_sla_pDto->setId_Seccion(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getId_Seccion()))));
$Siga_sla_pDto->setId_Categoria(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getId_Categoria()))));
$Siga_sla_pDto->setId_Subcategoria(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getId_Subcategoria()))));
$Siga_sla_pDto->setProceso_Ticket(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getProceso_Ticket()))));
$Siga_sla_pDto->setEscala(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getEscala()))));
$Siga_sla_pDto->setHoras(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getHoras()))));
$Siga_sla_pDto->setCorreos(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getCorreos()))));
$Siga_sla_pDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getEstatus_Reg()))));
$Siga_sla_pDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getFech_Inser()))));
$Siga_sla_pDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getUsr_Inser()))));
$Siga_sla_pDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getFech_Mod()))));
$Siga_sla_pDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_sla_pDto->getUsr_Mod()))));
return $Siga_sla_pDto;
}

public function consultar_tabla($Siga_sla_pDto, $proveedor=null){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	if($Siga_sla_pDto->getProceso_Ticket()=="1"){
		$sql="
			select 
				* 
			from siga_sla_p sla_p where sla_p.Id_Area=".$Siga_sla_pDto->getId_Area()." 
				and sla_p.Id_Seccion=".$Siga_sla_pDto->getId_Seccion()." 
				and sla_p.Interno_Externo='".$Siga_sla_pDto->getInterno_Externo()."'
				and sla_p.Proceso_Ticket=".$Siga_sla_pDto->getProceso_Ticket()." 
				and sla_p.Escala=".$Siga_sla_pDto->getEscala()." 
				and sla_p.Estatus_Reg<>3
		";
		$proveedor->execute($sql);
		
		
		
		
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
					$Data= array(
						"Id_Sla_P" => $row["Id_Sla_P"],
						"Horas" => $row["Horas"],
						"Correos" => $row["Correos"]
					);
					
					array_push($Data_Envia, $Data);
				}
			}
		}else{
			$error=true;
		}
		
	}else{
	
		$sql="
		
			select 
				cts.Id_Categoria, ctc.Desc_Categoria,cts.Id_Subcategoria, cts.Desc_Subcategoria, sla_p.Id_Sla_P, sla_p.Horas, sla_p.Correos
				,(select top 1 Interno_Externo from siga_sla_seguimiento seg where seg.Id_Subcategoria=cts.Id_Subcategoria and seg.Estatus_Reg=1) as Interno_Externo
				,(select top 1 Urgencia from siga_sla_seguimiento seg where seg.Id_Subcategoria=cts.Id_Subcategoria and seg.Estatus_Reg=1) as Urgencia
				,(select top 1 Recurrencia from siga_sla_seguimiento seg where seg.Id_Subcategoria=cts.Id_Subcategoria and seg.Estatus_Reg=1) as Recurrencia
			from siga_cat_ticket_subcategoria cts 
			left join siga_cat_ticket_categoria ctc on cts.Id_Categoria=ctc.Id_Categoria
			left join siga_sla_p sla_p on cts.Id_Subcategoria=sla_p.Id_Subcategoria and (sla_p.Id_Area=".$Siga_sla_pDto->getId_Area()." and sla_p.Id_Seccion=".$Siga_sla_pDto->getId_Seccion()." and sla_p.Interno_Externo='".$Siga_sla_pDto->getInterno_Externo()."' and sla_p.Proceso_Ticket=".$Siga_sla_pDto->getProceso_Ticket()." and sla_p.Escala=".$Siga_sla_pDto->getEscala()." and sla_p.Estatus_Reg<>3)
			where 
				cts.Id_Categoria in(
					select Id_Categoria from siga_cat_ticket_categoria where id_seccion=".$Siga_sla_pDto->getId_Seccion()."
				) and cts.Estatus_Reg<>3
			order by Desc_Categoria asc, Desc_Subcategoria asc
		";
		
		//echo "<pre>";
		//echo $sql;
		//echo "</pre>";
		//echo $sql;
		$proveedor->execute($sql);
		
		if (!$proveedor->error()){
			if ($proveedor->rows($proveedor->stmt) > 0) {
				while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
						$Id_Sla_P="";
						if(!is_null($row["Id_Sla_P"])){$Id_Sla_P=$row["Id_Sla_P"];}
						$Horas="";
						if(!is_null($row["Horas"])){$Horas=$row["Horas"];}
						$Correos="";
						if(!is_null($row["Correos"])){$Correos=$row["Correos"];}
						
						$Interno_Externo="";
						if($row["Interno_Externo"]!=NULL){$Interno_Externo=$row["Interno_Externo"];}
						
						$Data= array(
							"Id_Categoria" => $row["Id_Categoria"],
							"Desc_Categoria" => $row["Desc_Categoria"],
							"Id_Subcategoria" => $row["Id_Subcategoria"],
							"Desc_Subcategoria" => $row["Desc_Subcategoria"],
							"Recurrencia" => $row["Recurrencia"],
							"Urgencia" => $row["Urgencia"],
							"Id_Sla_P" => $Id_Sla_P,
							"Horas" => $Horas,
							"Correos" => $Correos,
							"Interno_Externo" =>$Interno_Externo
						);
					
						array_push($Data_Envia, $Data);
				}
			}
		}else{
			$error=true;
		}
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia), "data" => $Data_Envia, "estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}

public function valida_sla_cmb($Siga_sla_pDto, $proveedor=null){
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$Escala=0;
	if($Siga_sla_pDto->getEscala()!=""){
		$Escala=	$Siga_sla_pDto->getEscala()-1;
	}
	
	if($Escala==0){
		$Escala=1;
	}
	
	$sql="
		select 
			count(Id_Sla_P) as total 
		from siga_sla_p sla_p where sla_p.Id_Area=".$Siga_sla_pDto->getId_Area()." 
			and sla_p.Id_Seccion=".$Siga_sla_pDto->getId_Seccion()." 
			and sla_p.Interno_Externo='".$Siga_sla_pDto->getInterno_Externo()."'
			and sla_p.Proceso_Ticket=".$Siga_sla_pDto->getProceso_Ticket()." 
			and sla_p.Escala=".$Escala." 
			and sla_p.Estatus_Reg<>3
	";
	
	
	$proveedor->execute($sql);
	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"total" => $row["total"]
				);
				
				array_push($Data_Envia, $Data);
			}
		}
	}else{
		$error=true;
	}
		

	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia), "data" => $Data_Envia, "estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}


public function siga_sla_seguimiento($Id_Subcategoria){
	$Data = array();
	$Data_Envia = array();
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	
	$sql="
		select * from siga_sla_seguimiento where Id_Subcategoria=".$Id_Subcategoria." and Estatus_Reg<>3
	";
	//echo $sql;
	$proveedor->execute($sql);

	
	if (!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			while ($row = $proveedor->fetch_array($proveedor->stmt, 0)) {
				$Data= array(
					"Id_SLA_Seguimiento" => $row["Id_SLA_Seguimiento"],
					"Id_Subcategoria" => $row["Id_Subcategoria"],
					"Interno_Externo" => $row["Interno_Externo"],
					"Recurrencia" => rtrim(ltrim($row["Recurrencia"])),
					"Urgencia" => rtrim(ltrim($row["Urgencia"]))
				);
				
				array_push($Data_Envia, $Data);
			}
		}
	}else{
		$error=true;
	}
	
	$proveedor->close();
	
	if($error==false){
		$respuesta = array("totalCount" => count($Data_Envia), "data" => $Data_Envia, "estatus" => "ok", "mensaje" => "Registros Encontrados");
	}else{
		$respuesta = array("totalCount" => "0", "data" => "","estatus" => "error", "mensaje" => "No se Encontraron Registros");
	}
	
	return $respuesta;
}

public function guardar_detalle($Siga_sla_pDto, $Array_Padre, $proveedor=null){
	
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$proveedor->beginTransaction();
	
	if(count($Array_Padre)>0){
		
		for($i=0;$i<count($Array_Padre); $i++){
			
			if($Array_Padre[$i][0]==""){
				
				//print_r($Siga_sla_pDto);
				/*
				$sql="
					select COUNT(Id_Sla_p) as total from siga_sla_p 
					where 
					Id_Area=".$Siga_sla_pDto->getId_Area()." and 
					Id_seccion=".$Siga_sla_pDto->getId_Seccion()." and 
					Id_Categoria=".$Array_Padre[$i][1]." and 
					Id_Subcategoria=".$Array_Padre[$i][2]." and 
					Proceso_Ticket=".$Siga_sla_pDto->getProceso_Ticket()." and 
					Escala=".$Siga_sla_pDto->getEscala()."
				
				";
				*/
				
				
				$sql="
					insert into siga_sla_p (
						Id_Area
						,Id_Seccion
						,Id_Categoria
						,Id_Subcategoria
						,Interno_Externo
						,Proceso_Ticket
						,Escala
						,Horas
						,Correos
						,Estatus_Reg
						,Fech_Inser
						,Usr_Inser
						--,Fech_Mod
						--,Usr_Mod
					)values(
						".$Siga_sla_pDto->getId_Area().",
						".$Siga_sla_pDto->getId_Seccion().",
						".$Array_Padre[$i][1].",
						".$Array_Padre[$i][2].",
						'".$Siga_sla_pDto->getInterno_Externo()."',
						".$Siga_sla_pDto->getProceso_Ticket().",
						".$Siga_sla_pDto->getEscala().",
						".$Array_Padre[$i][3].",
						'".$Array_Padre[$i][4]."',
						'1',
						getdate(),
						'".$Siga_sla_pDto->getUsr_Inser()."'
					)
				";
				
				$proveedor->execute($sql);
			}else{
				$sql="
					update siga_sla_p set 
						
						Horas=".$Array_Padre[$i][3]."
						,Correos='".$Array_Padre[$i][4]."'
						,Estatus_Reg='2'
						,Fech_Mod=getdate()
						,Usr_Mod='".$Siga_sla_pDto->getUsr_Inser()."'
					where Id_Sla_P=".$Array_Padre[$i][0]."
				";
			
				$proveedor->execute($sql);
			}
			//echo "<br>";
			//echo $sql;
			
			
	
			if (!$proveedor->error()){
				
			}else{
				$error=true;
			}
			
		}
	}
	
	
	if($error==false){
		$proveedor->commit();
		$respuesta = array("totalCount" => "1",  "estatus" => "ok", "mensaje" => "Guardado Correctamente.");
	}else{
		$proveedor->rollback();
		$respuesta = array("totalCount" => "0","estatus" => "error", "mensaje" => "Ocurrio un error al guardar");
	}
	//$proveedor->close();
	return $respuesta;
}


public function guardar_escala_1($Siga_sla_pDto, $proveedor=null){
	
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	if($Siga_sla_pDto!=""){
		
		$sql="
			insert into siga_sla_p (
				Id_Area
				,Id_Seccion
				,Interno_Externo
				,Proceso_Ticket
				,Escala
				,Horas
				,Correos
				,Estatus_Reg
				,Fech_Inser
				,Usr_Inser
				--,Fech_Mod
				--,Usr_Mod
			)values(
				".$Siga_sla_pDto->getId_Area().",
				".$Siga_sla_pDto->getId_Seccion().",
				'".$Siga_sla_pDto->getInterno_Externo()."',
				".$Siga_sla_pDto->getProceso_Ticket().",
				".$Siga_sla_pDto->getEscala().",
				".$Siga_sla_pDto->getHoras().",
				'".$Siga_sla_pDto->getCorreos()."',
				".$Siga_sla_pDto->getEstatus_Reg().",
				getdate(),
				'".$Siga_sla_pDto->getUsr_Inser()."'
			)
		";
		
		$proveedor->execute($sql);

		if (!$proveedor->error()){
			
		}else{
			$error=true;
		}
	}else{
		$error=true;
	}
	
	
	if($error==false){
		$respuesta = array("totalCount" => "1",  "estatus" => "ok", "mensaje" => "Guardado Correctamente.");
	}else{
		$respuesta = array("totalCount" => "0","estatus" => "error", "mensaje" => "Ocurrio un error al guardar");
	}
	$proveedor->close();
	return $respuesta;
}

public function Guardar_Seguimiento_SLA($Interno_Externo, $Es_Urgencia_Recurrencia, $Desc_Urgencia, $Desc_Recurrencia, $Usr_Mod, $Id_Subcategoria){
	
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	if($Es_Urgencia_Recurrencia=="1"){
		$sql="
			update siga_sla_seguimiento set Estatus_Reg=3 where Id_Subcategoria=".$Id_Subcategoria."
		
			insert into siga_sla_seguimiento (
				Id_Subcategoria
				,Interno_Externo
				,Recurrencia
				,Urgencia
				,Estatus_Reg
				,Ultima_Modificacion
				,Usr
			)values(
				".$Id_Subcategoria.",
				'".$Interno_Externo."',
				(select top 1 Recurrencia  from siga_sla_seguimiento where Ultima_Modificacion is not null and Id_Subcategoria=".$Id_Subcategoria." order by Ultima_Modificacion desc),
				(select top 1 Urgencia  from siga_sla_seguimiento where Ultima_Modificacion is not null and Id_Subcategoria=".$Id_Subcategoria." order by Ultima_Modificacion desc),
				1,
				getdate(),
				'".$Usr_Mod."'
			)
		";
		$proveedor->execute($sql);
		if (!$proveedor->error()){}else{$error=true;}
	}
	
	if($Es_Urgencia_Recurrencia=="2"){
		$sql="
			update siga_sla_seguimiento set Estatus_Reg=3 where Id_Subcategoria=".$Id_Subcategoria."
		
			insert into siga_sla_seguimiento (
				Id_Subcategoria
				,Interno_Externo
				,Recurrencia
				,Urgencia
				,Estatus_Reg
				,Ultima_Modificacion
				,Usr
			)values(
				".$Id_Subcategoria.",
				(select top 1 Interno_Externo  from siga_sla_seguimiento where Ultima_Modificacion is not null and Id_Subcategoria=".$Id_Subcategoria." order by Ultima_Modificacion desc),
				(select top 1 Recurrencia  from siga_sla_seguimiento where Ultima_Modificacion is not null and Id_Subcategoria=".$Id_Subcategoria." order by Ultima_Modificacion desc),
				".$Desc_Urgencia.",
				1,
				getdate(),
				'".$Usr_Mod."'
			)
		";
		$proveedor->execute($sql);
		if (!$proveedor->error()){}else{$error=true;}
	}
	
	if($Es_Urgencia_Recurrencia=="3"){
		$sql="
			update siga_sla_seguimiento set Estatus_Reg=3 where Id_Subcategoria=".$Id_Subcategoria."
		
			insert into siga_sla_seguimiento (
				Id_Subcategoria
				,Interno_Externo
				,Recurrencia
				,Urgencia
				,Estatus_Reg
				,Ultima_Modificacion
				,Usr
			)values(
				".$Id_Subcategoria.",
				(select top 1 Interno_Externo  from siga_sla_seguimiento where Ultima_Modificacion is not null and Id_Subcategoria=".$Id_Subcategoria." order by Ultima_Modificacion desc),
				".$Desc_Recurrencia.",
				(select top 1 Urgencia  from siga_sla_seguimiento where Ultima_Modificacion is not null and Id_Subcategoria=".$Id_Subcategoria." order by Ultima_Modificacion desc),
				1,
				getdate(),
				'".$Usr_Mod."'
			)
		";
		$proveedor->execute($sql);
		if (!$proveedor->error()){}else{$error=true;}
	}
	
	
	if($error==false){
		$respuesta = array("totalCount" => "1",  "estatus" => "ok", "mensaje" => "Guardado Correctamente.");
	}else{
		$respuesta = array("totalCount" => "0","estatus" => "error", "mensaje" => "Ocurrio un error al guardar");
	}
	$proveedor->close();
	return $respuesta;
}


public function editar_escala_1($Siga_sla_pDto, $proveedor=null){
	
	$Data = array();
	$Data_Envia = array();
	
	$respuesta = array();
	$error=false;
	
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	
	if($Siga_sla_pDto!=""){
		$sql="
			update siga_sla_p set 
						
				Horas=".$Siga_sla_pDto->getHoras()."
				,Correos='".$Siga_sla_pDto->getCorreos()."'
				,Estatus_Reg=".$Siga_sla_pDto->getEstatus_Reg()."
				,Fech_Mod=getdate()
				,Usr_Mod='".$Siga_sla_pDto->getUsr_Mod()."'
			where Id_Sla_P=".$Siga_sla_pDto->getId_Sla_P()."
		";
		
		$proveedor->execute($sql);

		if (!$proveedor->error()){
			
		}else{
			$error=true;
		}
	}else{
		$error=true;
	}
	
	
	if($error==false){
		$respuesta = array("totalCount" => "1",  "estatus" => "ok", "mensaje" => "Guardado Correctamente.");
	}else{
		$respuesta = array("totalCount" => "0","estatus" => "error", "mensaje" => "Ocurrio un error al guardar");
	}
	$proveedor->close();
	return $respuesta;
}


public function selectSiga_sla_p($Siga_sla_pDto,$proveedor=null){
$Siga_sla_pDto=$this->validarSiga_sla_p($Siga_sla_pDto);
$Siga_sla_pDao = new Siga_sla_pDAO();
$Siga_sla_pDto = $Siga_sla_pDao->selectSiga_sla_p($Siga_sla_pDto,$proveedor);
return $Siga_sla_pDto;
}
public function insertSiga_sla_p($Siga_sla_pDto,$proveedor=null){
$Siga_sla_pDto=$this->validarSiga_sla_p($Siga_sla_pDto);
$Siga_sla_pDao = new Siga_sla_pDAO();
$Siga_sla_pDto = $Siga_sla_pDao->insertSiga_sla_p($Siga_sla_pDto,$proveedor);
return $Siga_sla_pDto;
}
public function updateSiga_sla_p($Siga_sla_pDto,$proveedor=null){
$Siga_sla_pDto=$this->validarSiga_sla_p($Siga_sla_pDto);
$Siga_sla_pDao = new Siga_sla_pDAO();
//$tmpDto = new Siga_sla_pDTO();
//$tmpDto = $Siga_sla_pDao->selectSiga_sla_p($Siga_sla_pDto,$proveedor);
//if($tmpDto!=""){//$Siga_sla_pDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_sla_pDto = $Siga_sla_pDao->updateSiga_sla_p($Siga_sla_pDto,$proveedor);
return $Siga_sla_pDto;
//}
//return "";
}
public function deleteSiga_sla_p($Siga_sla_pDto,$proveedor=null){
$Siga_sla_pDto=$this->validarSiga_sla_p($Siga_sla_pDto);
$Siga_sla_pDao = new Siga_sla_pDAO();
$Siga_sla_pDto = $Siga_sla_pDao->deleteSiga_sla_p($Siga_sla_pDto,$proveedor);
return $Siga_sla_pDto;
}
}
?>