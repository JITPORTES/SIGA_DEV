<?php

if(isset($_POST['Seccion']) && $_POST['Seccion'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

$Seccion =$_POST['Seccion'];


$ticket_reasignacion_categoria="
SELECT  Id_Categoria,
        Desc_Categoria
FROM    siga_cat_ticket_categoria
WHERE   Id_Seccion=$Seccion
";

$ticket_reasignacion_categoria_qry=$pdoConexion->query($ticket_reasignacion_categoria);
$ticket_reasignacion_categoria_res=$ticket_reasignacion_categoria_qry->fetchAll(PDO::FETCH_NAMED);

$ticket_reasignacion_categoria_array=["<option disabled selected>Categoría</option>"];

    for ($i=0; $i < count($ticket_reasignacion_categoria_res) ; $i++) {    
            $ticket_reasignacion_categoria_array[]="<option value='".$ticket_reasignacion_categoria_res[$i]['Id_Categoria']."'>".$ticket_reasignacion_categoria_res[$i]['Desc_Categoria']."</option>";
    }

$pdoConexion=null;

echo json_encode($ticket_reasignacion_categoria_array);

    }else{
        $ubicacion_secundaria_array=["<option disabled selected>Sin Datos</option>"];
            echo json_encode($ubicacion_secundaria_array);
    }

?>