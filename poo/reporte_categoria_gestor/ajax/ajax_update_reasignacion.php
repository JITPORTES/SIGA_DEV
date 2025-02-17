<?php

if(isset($_POST['id_ticket']) && $_POST['id_ticket'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

date_default_timezone_set('America/Mazatlan');

$id_ticket 								=$_POST['id_ticket'];
$ticket_reasignacion_Nombre_Ejecutante  =$_POST['ticket_reasignacion_Nombre_Ejecutante'];
$ticket_reasignacion_Seccion 			=$_POST['ticket_reasignacion_Seccion'];
$ticket_reasignacion_Id_Categoria		=$_POST['ticket_reasignacion_Id_Categoria'];
$ticket_reasignacion_Id_Subcategoria 	=$_POST['ticket_reasignacion_Id_Subcategoria'];
$ticket_reasignacion_Id_Motivo_Aparente =$_POST['ticket_reasignacion_Id_Motivo_Aparente'];
$ticket_reasignacion_Id_Motivo_Real 	=$_POST['ticket_reasignacion_Id_Motivo_Real'];
$ticket_reasignacion_Fech_Espera_Cierre	=$_POST['ticket_reasignacion_Fech_Espera_Cierre'];
$ticket_reasignacion_Fech_Espera_Cierre = date('d-m-Y', strtotime($ticket_reasignacion_Fech_Espera_Cierre));

$hora=date('h:i:s', time());
$fecha=$ticket_reasignacion_Fech_Espera_Cierre.' '.$hora;

$ticket_reasignacion_update="
UPDATE 	siga_solicitud_tickets
SET 	Nombre_Ejecutante	= '$ticket_reasignacion_Nombre_Ejecutante',
		Seccion 			= $ticket_reasignacion_Seccion,
		Id_Categoria 		= $ticket_reasignacion_Id_Categoria,
		Id_Subcategoria 	= $ticket_reasignacion_Id_Subcategoria,
		Id_Motivo_Aparente 	= $ticket_reasignacion_Id_Motivo_Aparente,
		Id_Motivo_Real 		= $ticket_reasignacion_Id_Motivo_Real,
		Fech_Espera_Cierre 	= '$fecha'
WHERE 	Id_Solicitud 		= $id_ticket
";

//$pdoConexion->query($ticket_reasignacion_update);

if($pdoConexion->query($ticket_reasignacion_update)){
	$resultado='Actualización correcta';
}else{
	$resultado='No se tuvo éxito';
}

$pdoConexion=null;

echo json_encode($resultado);

	}else{
       echo json_encode("Error: No se puedo actualizar");
    }

?>