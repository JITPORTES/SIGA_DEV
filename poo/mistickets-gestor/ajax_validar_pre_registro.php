<?php

if(isset($_POST['Id_ticket']) && $_POST['Id_ticket'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$Id_ticket=$_POST['Id_ticket'];

$Pre_Registro_Ext="
SELECT  Pre_Registro_Ext as preRegistro,
        Estatus_Proceso as estatus
FROM    siga_solicitud_tickets
WHERE   Id_Solicitud=$Id_ticket
";

$Pre_Registro_Ext_qry=$pdoConexion->query($Pre_Registro_Ext);
$Pre_Registro_Ext_res=$Pre_Registro_Ext_qry->fetchAll(PDO::FETCH_NAMED);

$pdoConexion=null;

echo json_encode($Pre_Registro_Ext_res);
}

?>