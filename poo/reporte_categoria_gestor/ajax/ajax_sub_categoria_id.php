<?php

if(isset($_POST['Id_Categoria']) && $_POST['Id_Categoria'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

$Id_Categoria =$_POST['Id_Categoria'];

$ticket_reasignacion_sub_categoria="
SELECT  Id_Subcategoria,
        Desc_Subcategoria
FROM    siga_cat_ticket_subcategoria
WHERE   Id_Categoria=$Id_Categoria
";

$ticket_reasignacion_sub_categoria_qry=$pdoConexion->query($ticket_reasignacion_sub_categoria);
$ticket_reasignacion_sub_categoria_res=$ticket_reasignacion_sub_categoria_qry->fetchAll(PDO::FETCH_NAMED);

$ticket_reasignacion_sub_categoria_array=["<option disabled selected>Sección</option>"];

    for ($i=0; $i < count($ticket_reasignacion_sub_categoria_res) ; $i++) {    
            $ticket_reasignacion_sub_categoria_array[]="<option value='".$ticket_reasignacion_sub_categoria_res[$i]['Id_Subcategoria']."' $selected>".$ticket_reasignacion_sub_categoria_res[$i]['Desc_Subcategoria']."</option>";
    }

$pdoConexion=null;

echo json_encode($ticket_reasignacion_sub_categoria_array);

    }else{
        $ticket_reasignacion_sub_categoria_array=["<option disabled selected>Sin Datos</option>"];
            echo json_encode($ticket_reasignacion_sub_categoria_array);
    }

?>