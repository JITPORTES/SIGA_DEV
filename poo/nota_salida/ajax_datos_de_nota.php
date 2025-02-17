<?php

if(isset($_POST['Id_Solicitud']) && $_POST['Id_Solicitud'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$Id_Solicitud  =$_POST['Id_Solicitud'];


$datos_activo_externo="
SELECT 
    st.Empresa_Ext,
    st.Nombre_Act_Ext,
    st.Marca_Act_Ext,
    st.Modelo_Act_Ext, 
    st.No_Serie_Act_Ext,
    st.Nombre_Completo_Ext,
    st.Telefono_Ext,
    st.Correo_Ext,
    st.Id_Ubic_Prim,
    st.Id_Ubic_Sec,
    Desc_Ubic_Prim,
    Desc_Ubic_Sec
FROM siga_solicitud_tickets st
LEFT JOIN siga_cat_ubic_prim CUP on st.Id_Ubic_Prim = CUP.Id_Ubic_Prim
LEFT JOIN siga_cat_ubic_sec CUS on st.Id_Ubic_Sec = CUS.Id_Ubic_Sec
WHERE st.Id_Solicitud=$Id_Solicitud
";

$datos_activo_externo_qry=$pdoConexion->query($datos_activo_externo);
$datos_activo_externo_res=$datos_activo_externo_qry->fetchAll(PDO::FETCH_NAMED);

$pdoConexion=null;

echo json_encode($datos_activo_externo_res);

}else{
    echo json_encode('Sin datos');
}
?>

