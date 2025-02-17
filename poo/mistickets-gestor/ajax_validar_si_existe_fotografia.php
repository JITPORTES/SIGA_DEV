<?php

if(isset($_POST['Id_Solicitud']) && $_POST['Id_Solicitud'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$Id_Solicitud  =$_POST['Id_Solicitud'];

$sql_id_categoria_update="
SELECT  Url_archivo
FROM    siga_solicitud_tickets (NOLOCK)
WHERE   Id_Solicitud=$Id_Solicitud

UNION ALL 

SELECT  Url_Adjunto
FROM    siga_cat_ticket_adjuntos (NOLOCK)
WHERE   Id_Chat IN (SELECT Id_Chat FROM siga_ticket_chat (NOLOCK) WHERE Id_Solicitud=$Id_Solicitud)
";

$sql_id_categoria_update_qry=$pdoConexion->query($sql_id_categoria_update);
$sql_id_categoria_update_sel=$sql_id_categoria_update_qry->fetchAll(PDO::FETCH_COLUMN);

$pdoConexion=null;

echo json_encode($sql_id_categoria_update_sel);

}else{
    echo json_encode('Sin datos');
}
?>