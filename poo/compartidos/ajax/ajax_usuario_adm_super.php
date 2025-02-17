<?php

if(isset($_POST['Id_Usuario_para_ajax']) && $_POST['Id_Usuario_para_ajax'] !==''){

include_once(dirname(__FILE__)."/../../cx.php");

$Id_Usuario_para_ajax  =$_POST['Id_Usuario_para_ajax'];

$array_adm_super="
SELECT 	Id_Cargo
FROM 	siga_usuario_cargos
WHERE 	Id_Usuario=$Id_Usuario_para_ajax
";

$array_adm_super_qry=$pdoConexion->query($array_adm_super);
$array_adm_super_qry=$array_adm_super_qry->fetchAll(PDO::FETCH_NAMED);

$pdoConexion=null;

echo json_encode($array_adm_super_qry);

}else{    
    echo json_encode('error');
}

?>