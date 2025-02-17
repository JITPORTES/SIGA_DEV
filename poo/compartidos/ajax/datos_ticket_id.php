<?php

if(isset($_POST['ticket']) && $_POST['ticket'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

$ticket=$_POST['ticket'];

$ticket_data_id="
SELECT ticket.Id_Solicitud      
      ,ticket.Titulo
      ,ticket.Desc_Motivo_Reporte
      ,ticket.Seccion
      ,ticket.Id_Categoria
      ,ticket.Id_Subcategoria      
      ,ticket.Id_Motivo_Real
      ,ticket.Id_Motivo_Aparente
      ,ticket.Nombre_Ejecutante
      ,ticket.Estatus_Proceso
      ,ticket.ComentarioCierre
      ,convert(date, ticket.Fech_Seguimiento, 105) as Fech_Seguimiento
      ,convert(date, ticket.Fech_Cierre, 105) as Fech_Cierre
      ,convert(date, ticket.Fech_Espera_Cierre, 105) as Fech_Espera_Cierre
      ,convert(date, SYSDATETIME(), 105) as Fech_hoy
      ,cat.Desc_Categoria
      ,mr.Desc_Motivo_Real
      ,sub.Desc_Subcategoria

FROM siga_solicitud_tickets ticket  WITH (NOLOCK)
LEFT JOIN siga_cat_ticket_categoria as cat WITH (NOLOCK) ON ticket.Id_Categoria=cat.Id_Categoria
LEFT JOIN siga_cat_ticket_subcategoria as sub WITH (NOLOCK) ON ticket.Id_Subcategoria=sub.Id_Subcategoria
LEFT JOIN siga_cat_motivo_aparente ma WITH (NOLOCK) ON ma.Id_Motivo_Aparente=ticket.Id_Motivo_Aparente
LEFT JOIN siga_cat_motivo_real mr   WITH (NOLOCK) ON ticket.Id_Motivo_Real=mr.Id_Motivo_Real
WHERE 	Id_Solicitud=$ticket
";

$ticket_data_id_qry=$pdoConexion->query($ticket_data_id);
$ticket_data_id_res=$ticket_data_id_qry->fetchAll(PDO::FETCH_NAMED);

$pdoConexion=null;

    echo json_encode($ticket_data_id_res);
        }else{
    echo json_encode("Error");
    }
?>