<?php

if(isset($_POST['Id_Area']) && $_POST['Id_Area'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

$Id_Area =$_POST['Id_Area'];
$Id_Motivo_Aparente =$_POST['Id_Motivo_Aparente'];


$ticket_reasignacion_motivo_aparente="
SELECT  Id_Motivo_Aparente,
        Desc_Motivo_Aparente
FROM    siga_cat_motivo_aparente
WHERE   Id_Area=$Id_Area
AND     Estatus_Reg <> 3
";

$ticket_reasignacion_motivo_aparente_qry=$pdoConexion->query($ticket_reasignacion_motivo_aparente);
$ticket_reasignacion_motivo_aparente_res=$ticket_reasignacion_motivo_aparente_qry->fetchAll(PDO::FETCH_NAMED);

$ticket_reasignacion_motivo_aparente_array=["<option disabled selected>Sección</option>"];

    for ($i=0; $i < count($ticket_reasignacion_motivo_aparente_res) ; $i++) {    
        if($ticket_reasignacion_motivo_aparente_res[$i]['Id_Motivo_Aparente'] == $Id_Motivo_Aparente){$selected="selected";}else{$selected="";}

            $ticket_reasignacion_motivo_aparente_array[]="<option value='".$ticket_reasignacion_motivo_aparente_res[$i]['Id_Motivo_Aparente']."' $selected>".$ticket_reasignacion_motivo_aparente_res[$i]['Desc_Motivo_Aparente']."</option>";
    }

$pdoConexion=null;

echo json_encode($ticket_reasignacion_motivo_aparente_array);

    }else{
        $ticket_reasignacion_sub_categoria_array=["<option disabled selected>Sin Datos</option>"];
            echo json_encode($ticket_reasignacion_sub_categoria_array);
    }

?>