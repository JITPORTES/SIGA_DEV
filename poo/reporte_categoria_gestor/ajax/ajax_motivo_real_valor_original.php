<?php

if(isset($_POST['Id_Area']) && $_POST['Id_Area'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

$Id_Area =$_POST['Id_Area'];
$Id_Motivo_Real =$_POST['Id_Motivo_Real'];


$ticket_reasignacion_motivo_Real="
SELECT  Id_Motivo_Real,
        Desc_Motivo_Real
FROM    siga_cat_motivo_Real
WHERE   Id_Area=$Id_Area
AND     Estatus_Reg <> 3
";

$ticket_reasignacion_motivo_Real_qry=$pdoConexion->query($ticket_reasignacion_motivo_Real);
$ticket_reasignacion_motivo_Real_res=$ticket_reasignacion_motivo_Real_qry->fetchAll(PDO::FETCH_NAMED);

$ticket_reasignacion_motivo_Real_array=["<option disabled selected>Sección</option>"];

    for ($i=0; $i < count($ticket_reasignacion_motivo_Real_res) ; $i++) {    
        if($ticket_reasignacion_motivo_Real_res[$i]['Id_Motivo_Real'] == $Id_Motivo_Real){$selected="selected";}else{$selected="";}

            $ticket_reasignacion_motivo_Real_array[]="<option value='".$ticket_reasignacion_motivo_Real_res[$i]['Id_Motivo_Real']."' $selected>".$ticket_reasignacion_motivo_Real_res[$i]['Desc_Motivo_Real']."</option>";
    }

$pdoConexion=null;

echo json_encode($ticket_reasignacion_motivo_Real_array);

    }else{
        $ticket_reasignacion_sub_categoria_array=["<option disabled selected>Sin Datos</option>"];
            echo json_encode($ticket_reasignacion_sub_categoria_array);
    }

?>