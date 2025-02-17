<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class biomedica extends conectar {


  function getSigaActivosBajaArea($id_area){

    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
    $id_area=1;

    $sqlSigaActivosBajaArea ="SELECT siga_baja_activo.Id_baja idBaja,
                          AF_BC,
                          CveWorkflow Paso,
                          FORMAT(siga_baja_activo.Fecha_Baja,'yyyy/MM/dd') fecha_baja_solicitante,
                          (SELECT FORMAT(fechaAceptado,'yyyy/MM/dd') FROM siga_workflow_activo WHERE CveWorkflow=4 AND siga_workflow_activo.Id_baja=siga_baja_activo.Id_baja) fechaBajaDireccion,
                          (SELECT FORMAT(fechaAceptado,'yyyy/MM/dd') FROM siga_workflow_activo WHERE CveWorkflow=5 AND siga_workflow_activo.Id_baja=siga_baja_activo.Id_baja) fechaBajaContabilidad,

                          siga_activos.Nombre_Activo NombreActivo,
                          (SELECT Desc_Clasificacion FROM siga_cat_clasificacion WHERE siga_cat_clasificacion.Id_Clasificacion=siga_activos.Id_Clasificacion) Id_Clasificacion,
                          marca,
                          Modelo,
                          NumSerie,

                          (SELECT Desc_Propiedad FROM siga_cat_propiedad WHERE siga_cat_propiedad.Id_Propiedad=siga_activos.Id_Propiedad) Id_Propiedad,
                          (SELECT Desc_Tipo_Activo FROM siga_cat_tipo_activo WHERE siga_cat_tipo_activo.Id_Tipo_Activo=siga_activos.Id_Tipo_Activo) Id_Tipo_Activo,
                          siga_activos.DescCorta ,
                          (SELECT Desc_Ubic_Prim FROM siga_cat_ubic_prim WHERE siga_cat_ubic_prim.Id_Ubic_Prim=siga_activos.Id_Ubic_Prim) Id_Ubic_Prim,
                          (SELECT Desc_Ubic_Sec FROM siga_cat_ubic_sec WHERE siga_cat_ubic_sec.Id_Ubic_Sec=siga_activos.Id_Ubic_Sec) Id_Ubic_Sec,

                          FORMAT(siga_activos.Fech_Inser,'yyyy/MM/dd') fecha_alta,
                          isnull(FORMAT(MontoFactura, 'N', 'en-us'),0) MontoFactura
                          FROM siga_baja_activo 
                          LEFT JOIN siga_activos ON siga_baja_activo.Id_Activo=siga_activos.Id_Activo
                          LEFT JOIN siga_activo_proveedor ON siga_baja_activo.Id_Activo  = siga_activo_proveedor.id_Activo
                          LEFT JOIN siga_workflow_activo ON siga_workflow_activo.Id_baja = siga_baja_activo.Id_baja
                          WHERE CveWorkflow=5
                          AND siga_activos.Id_Area=$id_area
                          ";                                 
    
          $SigaActivosBajaArea = $pdoConexionGestafSiga->prepare($sqlSigaActivosBajaArea);
          $SigaActivosBajaArea->execute();
          $SigaResult = $SigaActivosBajaArea->fetchAll(PDO::FETCH_NAMED);
    
    return $SigaResult;
}


function getSigaActivosArea($id_area){

  $pdoConexionGestafSiga = conectar::ConexionGestafSiga();

  $sqlSigaActivosBajaArea ="SELECT 
                            siga_activos.Id_Activo
                            ,AF_BC
                            ,Nombre_Activo
                            ,Marca
                            ,Modelo

                            ,NumSerie
                            ,(SELECT Desc_Propiedad FROM siga_cat_propiedad WHERE siga_cat_propiedad.Id_Propiedad=siga_activos.Id_Propiedad) Id_Propiedad
                            ,(SELECT Desc_Ubic_Prim FROM siga_cat_ubic_prim WHERE siga_cat_ubic_prim.Id_Ubic_Prim=siga_activos.Id_Ubic_Prim) Id_Ubic_Prim
                            ,(SELECT Desc_Ubic_Sec FROM siga_cat_ubic_sec WHERE siga_cat_ubic_sec.Id_Ubic_Sec=siga_activos.Id_Ubic_Sec) Id_Ubic_Sec
                            ,ISNULL(Especifica, 'Sin Datos') especifica                            
                            ,Num_Empleado
                            ,Nombre_Completo
                            ,ISNULL(siga_activos_fch_recepcion_equipo,'') as fch_recepcion_equipo
                            ,ISNULL(siga_activos_fch_operacion,'') as fch_operacion
                            ,isnull((SELECT siga_condicion_de_recepcion_descripcion FROM siga_cat_condicion_de_recepcion WHERE siga_condicion_de_recepcion_id=siga_activos.siga_activos_condicion_recepcion),'') condicion_recepcion                            
                            ,ISNULL(link,'') link
                            ,FORMAT(siga_activos.Fech_Inser,'yyyy/MM/dd') fecha_alta
                            ,ISNULL(Id_Vale_Resguardo,0) ValeResguardo
                            ,ISNULL(FORMAT(ImporteSeguros, 'N', 'en-us'),0) ImporteSeguros
                            ,VidaUtilCHS
                            ,ISNULL(FORMAT(siga_activo_proveedor.MontoFactura, 'N', 'en-us'),0) MontoFactura
                            ,siga_activo_valor_de_reposicion
                          FROM siga_activos
                          LEFT JOIN siga_activo_proveedor ON siga_activos.Id_Activo=siga_activo_proveedor.id_Activo
                          WHERE Id_Area = $id_area
                          AND siga_activos.Id_Activo NOT IN (SELECT id_activo FROM siga_baja_activo)
                          AND siga_activos.Estatus_Reg <> 3
                          AND siga_activos.Id_Activo NOT IN (SELECT Id_Activo FROM siga_actividades where Id_Activo = siga_activos.Id_Activo AND Estatus_Reg <> 3)
                        ";
  
        $SigaActivosBajaArea = $pdoConexionGestafSiga->prepare($sqlSigaActivosBajaArea);
        $SigaActivosBajaArea->execute();
        $SigaResult = $SigaActivosBajaArea->fetchAll(PDO::FETCH_NAMED);
  
  return $SigaResult;
}

 function getSigaTicketPorCerrar(){
  $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
  $sqlSiga= "SELECT Id_Solicitud,
                    Titulo,
                    format(Fech_Solicitud,'dd-MM-yyyy') abierto,
                    format(Fech_Espera_Cierre,'dd-MM-yyyy') calificar
            FROM siga_solicitud_tickets
            WHERE Id_Area = 1
            AND Estatus_Proceso=3
            AND Estatus_Reg =1
            ORDER BY abierto DESC";
$pdoConexionGestafSiga =null;
return $sqlSiga;
 }

//*************************************************************************************************************************/
//*************************************************************************************************************************/
}
//*************************************************************************************************************************/
//*************************************************************************************************************************/