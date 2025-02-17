<?php

if(isset($_POST['Id_Solicitud_dato']) && $_POST['Id_Solicitud_dato'] !==''){

include_once(dirname(__FILE__)."/../cx.php");
    
$Id_Solicitud_dato =$_POST['Id_Solicitud_dato'];

$sql_extraer_Id_Area="
SELECT Id_Area
FROM siga_solicitud_tickets
WHERE Id_Solicitud=$Id_Solicitud_dato
";

$sql_extraer_Id_Area_qry=$pdoConexion->query($sql_extraer_Id_Area);
$sql_extraer_Id_Area_res=$sql_extraer_Id_Area_qry->fetch(PDO::FETCH_COLUMN);

$pdoConexion=null;

echo json_encode($sql_extraer_Id_Area_res);

    }else{
        echo json_encode("Vacio");
    }

?>