<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_ticket_calificacion/Siga_ticket_calificacionDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_ticket_calificacion/Siga_ticket_calificacionDAO.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
include_once(dirname(__FILE__)."/../../../datos/logger/Logger.Class.php");
class Siga_ticket_calificacionController {
private $proveedor;
public function __construct() {
}
public function validarSiga_ticket_calificacion($Siga_ticket_calificacionDto){
$Siga_ticket_calificacionDto->setId_CalificaTicket(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getId_CalificaTicket()))));
$Siga_ticket_calificacionDto->setId_Solicitud(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getId_Solicitud()))));
$Siga_ticket_calificacionDto->setId_Pregunta1(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getId_Pregunta1()))));
$Siga_ticket_calificacionDto->setId_Respuesta1(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getId_Respuesta1()))));
$Siga_ticket_calificacionDto->setDesc_Comentario1(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getDesc_Comentario1()))));
$Siga_ticket_calificacionDto->setId_Pregunta2(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getId_Pregunta2()))));
$Siga_ticket_calificacionDto->setId_Respuesta2(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getId_Respuesta2()))));
$Siga_ticket_calificacionDto->setDesc_Comentario2(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getDesc_Comentario2()))));
$Siga_ticket_calificacionDto->setId_Pregunta3(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getId_Pregunta3()))));
$Siga_ticket_calificacionDto->setId_Respuesta3(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getId_Respuesta3()))));
$Siga_ticket_calificacionDto->setDesc_Comentario3(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getDesc_Comentario3()))));
$Siga_ticket_calificacionDto->setFech_Inser(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getFech_Inser()))));
$Siga_ticket_calificacionDto->setUsr_Inser(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getUsr_Inser()))));
$Siga_ticket_calificacionDto->setFech_Mod(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getFech_Mod()))));
$Siga_ticket_calificacionDto->setUsr_Mod(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getUsr_Mod()))));
$Siga_ticket_calificacionDto->setEstatus_Reg(strtoupper(str_ireplace("'","",trim($Siga_ticket_calificacionDto->getEstatus_Reg()))));
return $Siga_ticket_calificacionDto;
}
public function selectSiga_ticket_calificacion($Siga_ticket_calificacionDto,$proveedor=null){
$Siga_ticket_calificacionDto=$this->validarSiga_ticket_calificacion($Siga_ticket_calificacionDto);
$Siga_ticket_calificacionDao = new Siga_ticket_calificacionDAO();
$Siga_ticket_calificacionDto = $Siga_ticket_calificacionDao->selectSiga_ticket_calificacion($Siga_ticket_calificacionDto,$proveedor);
return $Siga_ticket_calificacionDto;
}
public function insertSiga_ticket_calificacion($Siga_ticket_calificacionDto, $Id_Cirugia, $proveedor=null){
/*
if($Siga_ticket_calificacionDto->getUsr_Inser()!=""&&$Siga_ticket_calificacionDto->getId_Solicitud()!=""){
	$Gestor_Final_Cierre="";
	$proveedor = new Proveedor('sqlserver', 'activos');
	$proveedor->connect();
	$sql="
		select count(Id_Usuario) as Id_Usuario from siga_solicitud_tickets where Id_Solicitud=".$Siga_ticket_calificacionDto->getId_Solicitud()."
		and Id_Usuario=".$Siga_ticket_calificacionDto->getUsr_Inser()."
	";
	
	$proveedor->execute($sql);
	if(!$proveedor->error()){
		if ($proveedor->rows($proveedor->stmt) > 0) {
			$row = $proveedor->fetch_array($proveedor->stmt, 0);
			$Total =$row["Id_Usuario"];
		
			if($Total==1){
				$proveedor_u = new Proveedor('sqlserver', 'activos');
				$proveedor_u->connect();
				$sql="
					select top 1 Id_Gestor from siga_solicitud_tickets where Id_Solicitud=".$Siga_ticket_calificacionDto->getId_Solicitud()."
				";
				
				$proveedor_u->execute($sql);
				if(!$proveedor_u->error()){
					if($proveedor_u->rows($proveedor_u->stmt) > 0) {
						$row_g = $proveedor_u->fetch_array($proveedor_u->stmt, 0);
						$Gestor_Final_Cierre=$row_g["Id_Gestor"];
					}
				}
				
			}else{
				$Gestor_Final_Cierre=$Siga_ticket_calificacionDto->getUsr_Inser();
			}
		
		}
	}
	

	if($Gestor_Final_Cierre!=""){
		$proveedor_C = new Proveedor('sqlserver', 'activos');
		$proveedor_C->connect();
		$sql="
			update siga_solicitud_tickets set Gestor_Final_Cierre='".$Gestor_Final_Cierre."' where Id_Solicitud=".$Siga_ticket_calificacionDto->getId_Solicitud()."
		";
		$proveedor_C->execute($sql);
		if(!$proveedor_C->error()){
		}
	}
}else{
	if($Siga_ticket_calificacionDto->getId_Solicitud()!=""){
		
		$proveedor_C = new Proveedor('sqlserver', 'activos');
		$proveedor_C->connect();
		$sql="
			update siga_solicitud_tickets set Gestor_Final_Cierre=(select top 1 Id_Gestor from siga_solicitud_tickets where Id_Solicitud=".$Siga_ticket_calificacionDto->getId_Solicitud().") where Id_Solicitud=".$Siga_ticket_calificacionDto->getId_Solicitud()."
		";
		$proveedor_C->execute($sql);
		if(!$proveedor_C->error()){
		}
	}
}
*/
//$Siga_ticket_calificacionDto=$this->validarSiga_ticket_calificacion($Siga_ticket_calificacionDto);
$Siga_ticket_calificacionDao = new Siga_ticket_calificacionDAO();
$Siga_ticket_calificacionDto->setFech_Inser("getdate()");
$Siga_ticket_calificacionDto->setFech_Mod("getdate()");
$Siga_ticket_calificacionDto = $Siga_ticket_calificacionDao->insertSiga_ticket_calificacion($Siga_ticket_calificacionDto,$proveedor);
return $Siga_ticket_calificacionDto;
}
public function updateSiga_ticket_calificacion($Siga_ticket_calificacionDto,$proveedor=null){
//$Siga_ticket_calificacionDto=$this->validarSiga_ticket_calificacion($Siga_ticket_calificacionDto);
$Siga_ticket_calificacionDao = new Siga_ticket_calificacionDAO();
$Siga_ticket_calificacionDto->set_Fech_Mod("getdate()");
//$tmpDto = new Siga_ticket_calificacionDTO();
//$tmpDto = $Siga_ticket_calificacionDao->selectSiga_ticket_calificacion($Siga_ticket_calificacionDto,$proveedor);
//if($tmpDto!=""){//$Siga_ticket_calificacionDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_ticket_calificacionDto = $Siga_ticket_calificacionDao->updateSiga_ticket_calificacion($Siga_ticket_calificacionDto,$proveedor);
return $Siga_ticket_calificacionDto;
//}
//return "";
}
public function deleteSiga_ticket_calificacion($Siga_ticket_calificacionDto,$proveedor=null){
//$Siga_ticket_calificacionDto=$this->validarSiga_ticket_calificacion($Siga_ticket_calificacionDto);
$Siga_ticket_calificacionDao = new Siga_ticket_calificacionDAO();
$Siga_ticket_calificacionDto = $Siga_ticket_calificacionDao->deleteSiga_ticket_calificacion($Siga_ticket_calificacionDto,$proveedor);
return $Siga_ticket_calificacionDto;
}
}
?>