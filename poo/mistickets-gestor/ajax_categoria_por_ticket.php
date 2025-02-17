<?php

if(isset($_POST['Id_Solicitud_dato']) && $_POST['Id_Solicitud_dato'] !==''){

include_once(dirname(__FILE__)."/../cx.php");    

$Id_Solicitud_dato =$_POST['Id_Solicitud_dato'];

$sql_extraer_categoria="
SELECT Id_Categoria
FROM siga_solicitud_tickets
WHERE Id_Solicitud=$Id_Solicitud_dato
";

$sql_extraer_categoria_QRY=$pdoConexion->query($sql_extraer_categoria);
$sql_extraer_categoria_RES=$sql_extraer_categoria_QRY->fetch(PDO::FETCH_NUM);

$ticket_reasignacion_categoria="
SELECT  Id_Categoria,
        Desc_Categoria
FROM    siga_cat_ticket_categoria
WHERE   Id_Seccion in (1,2,3)
";

$ticket_reasignacion_categoria_qry=$pdoConexion->query($ticket_reasignacion_categoria);
$ticket_reasignacion_categoria_res=$ticket_reasignacion_categoria_qry->fetchAll(PDO::FETCH_NAMED);

$ticket_reasignacion_categoria_array=[];

    for ($i=0; $i < count($ticket_reasignacion_categoria_res) ; $i++) {    
        if($sql_extraer_categoria_RES[$i]['Id_Categoria'] == $sql_extraer_categoria_RES){$selected="selected";}else{$selected="";}

            $ticket_reasignacion_categoria_array[]="<option value='".$ticket_reasignacion_categoria_res[$i]['Id_Categoria']."' $selected>".$ticket_reasignacion_categoria_res[$i]['Desc_Categoria']."</option>";
    }

$pdoConexion=null;

echo json_encode($ticket_reasignacion_categoria_array);

    }else{
        $ubicacion_secundaria_array=["<option disabled selected>Sin Datos</option>"];
            echo json_encode($ubicacion_secundaria_array);
    }


?>