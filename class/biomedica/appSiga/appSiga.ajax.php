<?php

include_once("appSiga.class.php");

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {

$accion = $_POST['accion'];

if($accion==1){

  $id_solicitd = $_POST['siga_ticket_por_cerrar_noTicket'];
  $appSigaClass = new appSiga();
  $datos = $appSigaClass->getSigaTicketPorCalificar($id_solicitd)  ;
  
  echo json_encode($datos);
  
} else if($accion==2){
  
  $id_solicitud                 = $_POST['id_solicitud'];
  $siga_appSiga_UsuarioFinal    = $_POST['siga_appSiga_UsuarioFinal'];
  $siga_appSiga_Ofrecida        = $_POST['siga_appSiga_Ofrecida'];
  $siga_appSiga_Servicio        = $_POST['siga_appSiga_Servicio'];
  $siga_appSiga_Respuesta       = $_POST['siga_appSiga_Respuesta'];
  $siga_appSiga_Ofrecida_c      = $_POST['siga_appSiga_Ofrecida_c'];
  $siga_appSiga_Servicio_c      = $_POST['siga_appSiga_Servicio_c'];
  $siga_appSiga_Respuesta_c     = $_POST['siga_appSiga_Respuesta_c'];
  $imageData                    = $_POST['imageData'];

  $appSigaClass = new appSiga();
  $datos = $appSigaClass->getSigaTicketCalificar($id_solicitud, $siga_appSiga_UsuarioFinal, $siga_appSiga_Ofrecida, $siga_appSiga_Servicio, $siga_appSiga_Respuesta, $siga_appSiga_Ofrecida_c,$siga_appSiga_Servicio_c,$siga_appSiga_Respuesta_c,$imageData);
  echo json_encode($datos);
}



} else {

}