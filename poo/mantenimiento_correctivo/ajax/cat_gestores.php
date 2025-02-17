<?php

include_once(dirname(__FILE__)."/../../cx.php");

if(isset($_POST['Id_Area']) && $_POST['Id_Area'] !==''){

$Id_Area=$_POST['Id_Area'];

$cat_gestores="
SELECT 	 distinct(Id_Usuario) as ID, 
		 Nombre_Empleado
FROM 	 siga_cat_gestores
WHERE 	 Id_Area=1
AND 	 estatus_reg !=3
GROUP BY Id_Usuario,
		 Nombre_Empleado
ORDER BY Nombre_Empleado
";

$cat_gestores_qry=$pdoConexion->query($cat_gestores);
$cat_gestores_resul=$cat_gestores_qry->fetchAll(PDO::FETCH_NAMED);

$cat_gestores_array=array("<option disabled selected>Selecciona Gestor</option>");

for ($i=0; $i < count($cat_gestores_resul) ; $i++) { 
    $cat_gestores_array[]="<option value='".$cat_gestores_resul[$i]['ID']."'>".$cat_gestores_resul[$i]['Nombre_Empleado']."</option>";
}

$pdoConexion=null;

echo json_encode($cat_gestores_array);
}else{
	echo json_encode(false);
}
?>