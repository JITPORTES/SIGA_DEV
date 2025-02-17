<?php
 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_ticket_chat/Siga_ticket_chatDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_ticket_chat/Siga_ticket_chatDAO.Class.php");

 include_once(dirname(__FILE__)."/../../../modelos/activos/dto/siga_cat_ticket_adjuntos/Siga_cat_ticket_adjuntosDTO.Class.php");
include_once(dirname(__FILE__)."/../../../modelos/activos/dao/siga_cat_ticket_adjuntos/Siga_cat_ticket_adjuntosDAO.Class.php");
include_once(dirname(__FILE__)."/../siga_solicitud_tickets/Siga_solicitud_ticketsController.Class.php");
include_once(dirname(__FILE__)."/../../../datos/connect/Proveedor.Class.php");
class Siga_ticket_chatController {
private $proveedor;
public function __construct() {
}
public function validarSiga_ticket_chat($Siga_ticket_chatDto){
$Siga_ticket_chatDto->setId_Chat(strtoupper(str_ireplace("'","",trim($Siga_ticket_chatDto->getId_Chat()))));
$Siga_ticket_chatDto->setId_Solicitud(strtoupper(str_ireplace("'","",trim($Siga_ticket_chatDto->getId_Solicitud()))));
$Siga_ticket_chatDto->setId_UsuarioGestor(strtoupper(str_ireplace("'","",trim($Siga_ticket_chatDto->getId_UsuarioGestor()))));
$Siga_ticket_chatDto->setId_Usuario(strtoupper(str_ireplace("'","",trim($Siga_ticket_chatDto->getId_Usuario()))));
$Siga_ticket_chatDto->setNombre_Gestor(strtoupper(str_ireplace("'","",trim($Siga_ticket_chatDto->getNombre_Gestor()))));
$Siga_ticket_chatDto->setNombre_Usuario(strtoupper(str_ireplace("'","",trim($Siga_ticket_chatDto->getNombre_Usuario()))));
$Siga_ticket_chatDto->setFecha_Alta(strtoupper(str_ireplace("'","",trim($Siga_ticket_chatDto->getFecha_Alta()))));
$Siga_ticket_chatDto->setMensaje(strtoupper(str_ireplace("'","",trim($Siga_ticket_chatDto->getMensaje()))));
$Siga_ticket_chatDto->setId_Estatus_Proceso(strtoupper(str_ireplace("'","",trim($Siga_ticket_chatDto->getId_Estatus_Proceso()))));

return $Siga_ticket_chatDto;
}
public function selectSiga_ticket_chat($Siga_ticket_chatDto,$proveedor=null){
$Siga_ticket_chatDto=$this->validarSiga_ticket_chat($Siga_ticket_chatDto);
$Siga_ticket_chatDao = new Siga_ticket_chatDAO();
$Siga_ticket_chatDto = $Siga_ticket_chatDao->selectSiga_ticket_chat($Siga_ticket_chatDto,$proveedor);
return $Siga_ticket_chatDto;
}
public function insertSiga_ticket_chat($Siga_ticket_chatDto,$Url_Adjunto, $proveedor=null){
//$Siga_ticket_chatDto=$this->validarSiga_ticket_chat($Siga_ticket_chatDto);
$Siga_ticket_chatDao = new Siga_ticket_chatDAO();
if($Siga_ticket_chatDto->getMensaje()==""){
	$Siga_ticket_chatDto->setMensaje("Archivo");
}
$Siga_ticket_chatDto = $Siga_ticket_chatDao->insertSiga_ticket_chat($Siga_ticket_chatDto,$proveedor);



if($Url_Adjunto!=""){
	
	
	$url_detalle = explode("---", $Url_Adjunto);
	
	if(count($url_detalle)>0){
		for($i=0;$i<count($url_detalle);$i++){
			$Siga_cat_ticket_adjuntosDao = new Siga_cat_ticket_adjuntosDAO();
			$Siga_cat_ticket_adjuntosDto = new Siga_cat_ticket_adjuntosDTO();
			$Siga_cat_ticket_adjuntosDto->setId_Chat($Siga_ticket_chatDto[0]->getId_Chat());
			$Siga_cat_ticket_adjuntosDto->setUsr_Inser($Siga_ticket_chatDto[0]->getId_Usuario());
			$Siga_cat_ticket_adjuntosDto->setUrl_Adjunto($url_detalle[$i]);
			$Siga_cat_ticket_adjuntosDto->setEstatus_Reg("1");
			$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosDao->insertSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor);	
		}
	}else{
		$Siga_cat_ticket_adjuntosDao = new Siga_cat_ticket_adjuntosDAO();
		$Siga_cat_ticket_adjuntosDto = new Siga_cat_ticket_adjuntosDTO();
		$Siga_cat_ticket_adjuntosDto->setId_Chat($Siga_ticket_chatDto[0]->getId_Chat());
		$Siga_cat_ticket_adjuntosDto->setUsr_Inser($Siga_ticket_chatDto[0]->getId_Usuario());
		$Siga_cat_ticket_adjuntosDto->setUrl_Adjunto($Url_Adjunto);
		$Siga_cat_ticket_adjuntosDto->setEstatus_Reg("1");
		$Siga_cat_ticket_adjuntosDto = $Siga_cat_ticket_adjuntosDao->insertSiga_cat_ticket_adjuntos($Siga_cat_ticket_adjuntosDto,$proveedor);	
	}
}

if($Siga_ticket_chatDto!=""){
	if($Siga_ticket_chatDto[0]->getId_Cirugia()!=""){
		$Siga_solicitud_ticketsController = new Siga_solicitud_ticketsController();
		
		if($Siga_ticket_chatDto[0]->getId_UsuarioGestor()!=""){
			//Chat Gestor
			//$comentario='<a target="_blank" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_ticket_chatDto[0]->getId_Solicitud().'&tab=2">'.$Siga_ticket_chatDto[0]->getId_Solicitud().'</a>/Chat-Seguimiento/'.$Siga_ticket_chatDto[0]->getNombre_Gestor().': '.$Siga_ticket_chatDto[0]->getMensaje();
			$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_ticket_chatDto[0]->getId_Solicitud().'&tab=2">'.$Siga_ticket_chatDto[0]->getId_Solicitud().'</a>/Chat-Seguimiento/'.$Siga_ticket_chatDto[0]->getMensaje();
			$Siga_solicitud_ticketsController->insert_gtiqx($Siga_ticket_chatDto[0]->getId_Cirugia(), $comentario, $Siga_ticket_chatDto[0]->getGestor_Assist(), "N");	
		}
		if($Siga_ticket_chatDto[0]->getId_Usuario()!=""){
			//Chat Solicitante
			//$comentario='<a target="_blank" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_ticket_chatDto[0]->getId_Solicitud().'&tab=2">'.$Siga_ticket_chatDto[0]->getId_Solicitud().'</a>/Chat-Seguimiento/'.$Siga_ticket_chatDto[0]->getNombre_Usuario().': '.$Siga_ticket_chatDto[0]->getMensaje();
			$comentario='<a target="_blank" class="mlink linkSIGA" href="||SERVER||/vistas/gtiqx_ticket.php?key='.$Siga_ticket_chatDto[0]->getId_Solicitud().'&tab=2">'.$Siga_ticket_chatDto[0]->getId_Solicitud().'</a>/Chat-Seguimiento/'.$Siga_ticket_chatDto[0]->getMensaje();
			$Siga_solicitud_ticketsController->insert_gtiqx($Siga_ticket_chatDto[0]->getId_Cirugia(), $comentario, $Siga_ticket_chatDto[0]->getUsuario_Assist(), "N");	
		}
	}
}


return $Siga_ticket_chatDto;
}
public function updateSiga_ticket_chat($Siga_ticket_chatDto,$proveedor=null){
//$Siga_ticket_chatDto=$this->validarSiga_ticket_chat($Siga_ticket_chatDto);
$Siga_ticket_chatDao = new Siga_ticket_chatDAO();
//$tmpDto = new Siga_ticket_chatDTO();
//$tmpDto = $Siga_ticket_chatDao->selectSiga_ticket_chat($Siga_ticket_chatDto,$proveedor);
//if($tmpDto!=""){//$Siga_ticket_chatDto->setFechaRegistro($tmpDto[0]->getFechaRegistro());
$Siga_ticket_chatDto = $Siga_ticket_chatDao->updateSiga_ticket_chat($Siga_ticket_chatDto,$proveedor);
return $Siga_ticket_chatDto;
//}
//return "";
}
public function deleteSiga_ticket_chat($Siga_ticket_chatDto,$proveedor=null){
//$Siga_ticket_chatDto=$this->validarSiga_ticket_chat($Siga_ticket_chatDto);
$Siga_ticket_chatDao = new Siga_ticket_chatDAO();
$Siga_ticket_chatDto = $Siga_ticket_chatDao->deleteSiga_ticket_chat($Siga_ticket_chatDto,$proveedor);
return $Siga_ticket_chatDto;
}
}
?>