<?php

if(isset($_POST['id_folio_a_editar']) && $_POST['id_folio_a_editar'] !==''){

include_once(dirname(__FILE__)."/../cx.php");

$editar_proveedor            =$_POST['editar_proveedor'];
$editar_contacto             =$_POST['editar_contacto'];
$editar_telefono             =$_POST['editar_telefono'];
$editar_email                =$_POST['editar_email'];
$editar_nombre_activo        =$_POST['editar_nombre_activo'];
$editar_marca_activo         =$_POST['editar_marca_activo'];
$editar_modelo_activo        =$_POST['editar_modelo_activo'];
$editar_serie_activo         =$_POST['editar_serie_activo'];
$editar_ubicacion_primaria   =$_POST['editar_ubicacion_primaria'];
$editar_ubicacion_secundaria =$_POST['editar_ubicacion_secundaria'];
$id_folio_a_editar           =$_POST['id_folio_a_editar'];


$datos_de_nota_update="
UPDATE  siga_solicitud_tickets
SET     Empresa_Ext         ='$editar_proveedor',
        Marca_Act_Ext       ='$editar_marca_activo',
        Modelo_Act_Ext      ='$editar_modelo_activo', 
        No_Serie_Act_Ext    ='$editar_serie_activo',
        Nombre_Completo_Ext ='$editar_contacto',
        Telefono_Ext        ='$editar_telefono',
        Correo_Ext          ='$editar_email',
        Id_Ubic_Prim        =$editar_ubicacion_primaria,
        Id_Ubic_Sec         =$editar_ubicacion_secundaria
WHERE   Id_Solicitud        =$id_folio_a_editar
";

$pdoConexion->query($datos_de_nota_update);
$pdoConexion=null;

echo json_encode('OK');

}else{
    echo json_encode('Sin datos');
}
?>

