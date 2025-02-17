<?php

if(isset($_POST['Id_Area']) && $_POST['Id_Area'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

$Id_Area =$_POST['Id_Area'];
$Seccion =$_POST['Seccion'];

$ticket_reasignacion_seccion="
SELECT  Id_Seccion,
        Desc_Seccion
FROM    siga_cat_ticket_seccion 
WHERE   Id_Area=$Id_Area
";

$ticket_reasignacion_seccion_qry=$pdoConexion->query($ticket_reasignacion_seccion);
$ticket_reasignacion_seccion_res=$ticket_reasignacion_seccion_qry->fetchAll(PDO::FETCH_NAMED);

$ticket_reasignacion_seccion_array=["<option disabled selected>Sección</option>"];

    for ($i=0; $i < count($ticket_reasignacion_seccion_res) ; $i++) {    
        if($ticket_reasignacion_seccion_res[$i]['Id_Seccion'] == $Seccion){$selected="selected";}else{$selected="";}

            $ticket_reasignacion_seccion_array[]="<option value='".$ticket_reasignacion_seccion_res[$i]['Id_Seccion']."' $selected>".$ticket_reasignacion_seccion_res[$i]['Desc_Seccion']."</option>";
    }

$pdoConexion=null;

echo json_encode($ticket_reasignacion_seccion_array);

    }else{
        $ubicacion_secundaria_array=["<option disabled selected>Sin Datos</option>"];
            echo json_encode($ubicacion_secundaria_array);
    }

?>