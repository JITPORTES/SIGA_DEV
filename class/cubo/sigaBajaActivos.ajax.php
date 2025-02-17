<?php

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {

  include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
  $conn = new conectar();
  $pdoGestaf = $conn->ConexionGestafSiga();
  $accion = trim($_POST['accion']);

  if($accion == 1){
    $mes    = trim($_POST['mes']);
    $agnio  = trim($_POST['agnio']);
    
    if($mes==0){
      $mes='1,2,4,5,6,4,8,9,10,11,12';
    }

$sqlSigaActivosBaja ="SELECT siga_baja_activo.Id_baja idBaja,
                             AF_BC,CveWorkflow Paso,
                             siga_activos.Nombre_Activo NombreActivo,
                      (SELECT Nom_Area FROM siga_catareas WHERE siga_activos.Id_Area=siga_catareas.Id_Area) Area,
                      (SELECT Desc_Clasificacion FROM siga_cat_clasificacion WHERE siga_cat_clasificacion.Id_Clasificacion=siga_activos.Id_Clasificacion) Id_Clasificacion,
                      marca,
                      Modelo,
                      NumSerie,
                      (SELECT Desc_Propiedad FROM siga_cat_propiedad WHERE siga_cat_propiedad.Id_Propiedad=siga_activos.Id_Propiedad) Id_Propiedad,
                      (SELECT Desc_Tipo_Activo FROM siga_cat_tipo_activo WHERE siga_cat_tipo_activo.Id_Tipo_Activo=siga_activos.Id_Tipo_Activo) Id_Tipo_Activo,
                      (SELECT Desc_Ubic_Prim FROM siga_cat_ubic_prim WHERE siga_cat_ubic_prim.Id_Ubic_Prim=siga_activos.Id_Ubic_Prim) Id_Ubic_Prim,
                      (SELECT Desc_Ubic_Sec FROM siga_cat_ubic_sec WHERE siga_cat_ubic_sec.Id_Ubic_Sec=siga_activos.Id_Ubic_Sec) Id_Ubic_Sec,
                      FORMAT(siga_activos.Fech_Inser,'dd/MM/yyyy') fecha_alta,
                      isnull(FORMAT(MontoFactura, 'N', 'en-us'),0) MontoFactura,
                      (SELECT Id_Usuario FROM siga_workflow_activo WHERE siga_baja_activo.Id_baja= siga_workflow_activo.Id_baja AND CveWorkflow=1) id_baja, 
                      (SELECT (SELECT Nombre_Usuario FROM siga_usuarios WHERE siga_usuarios.Id_Usuario=siga_workflow_activo.Id_Usuario) FROM siga_workflow_activo WHERE siga_baja_activo.Id_baja= siga_workflow_activo.Id_baja AND CveWorkflow=1) usuario_baja, 
                      FORMAT(siga_baja_activo.Fecha_Baja,'dd/MM/yyyy') fecha_baja_solicitante,
                      Num_Empleado,
                      Nombre_Completo,
                      (SELECT FORMAT(fechaAceptado,'dd/MM/yyyy') FROM siga_workflow_activo WHERE CveWorkflow=2 AND siga_workflow_activo.Id_baja=siga_baja_activo.Id_baja) fechaBajaResponbleResguardo,
                      (SELECT FORMAT(fechaAceptado,'dd/MM/yyyy') FROM siga_workflow_activo WHERE CveWorkflow=4 AND siga_workflow_activo.Id_baja=siga_baja_activo.Id_baja) fechaBajaDireccion,
                      (SELECT FORMAT(fechaAceptado,'dd/MM/yyyy') FROM siga_workflow_activo WHERE CveWorkflow=5 AND siga_workflow_activo.Id_baja=siga_baja_activo.Id_baja) fechaBajaContabilidad,
                      (SELECT Desc_Motivo_baja FROM siga_cast_motivo_baja WHERE Id_Motivo_baja=siga_baja_activo.Motivo_Baja) Motivo_Baja,
                      Comentarios,
                      (SELECT Desc_Destino_final FROM siga_cast_destino_final WHERE Id_Destino_final=Destino) destino_final
              FROM siga_baja_activo 
              LEFT JOIN siga_activos ON siga_baja_activo.Id_Activo=siga_activos.Id_Activo
              LEFT JOIN siga_activo_proveedor ON siga_baja_activo.Id_Activo  = siga_activo_proveedor.id_Activo
              LEFT JOIN siga_workflow_activo ON siga_workflow_activo.Id_baja = siga_baja_activo.Id_baja
              WHERE CveWorkflow=5
              AND YEAR(siga_workflow_activo.fechaAceptado)=$agnio
              AND MONTH(siga_workflow_activo.fechaAceptado) in ($mes)
            ";
   
    $SigaActivosBaja = $pdoGestaf->prepare($sqlSigaActivosBaja);
    $SigaActivosBaja->execute();
    $SigaActivosBajaInfo = $SigaActivosBaja->fetchall(PDO::FETCH_NAMED);
    $pdoGestaf=null;

    echo json_encode($SigaActivosBajaInfo);
    
  } 


 }else{
  echo json_encode('Error');
}

