<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class bienvenida extends conectar{

  function ok(){
    return 'ok';
  }

  function activosBajoResguardoPorUsuario($id_empleado, $numEmpleado){
    $pdo = conectar::ConexionGestafSiga();

    $sql = "SELECT COUNT(Id_Activo) activos 
            FROM siga_activos 
            WHERE Num_Empleado=$numEmpleado 
            AND Estatus_Reg in (1,2) 
            AND Id_Activo NOT IN (SELECT Id_Activo FROM siga_baja_activo WHERE usuario = (SELECT Id_Usuario FROM siga_usuarios WHERE No_Usuario=$numEmpleado AND Estatus_Reg IN (1,2)))";
    
    $sqlPrepare = $pdo->prepare($sql);
    $sqlPrepare->execute();
    $sqlResult = $sqlPrepare->fetchColumn();
    $pdo=null;

    return $sqlResult;
  }

function activosBajoResguardoPorUsuarioDetalle($numEmpleado){
  $pdo = conectar::ConexionGestafSiga();

  $sql= "SELECT ISNULL((SELECT Nom_Area FROM siga_catareas WHERE Id_Area= activos.Id_Area),'Sin Área Asignada') area,
                AF_BC,
                Nombre_Activo Activo, 
                ISNULL((SELECT Desc_Tipo_Vale_Resg FROM siga_cat_tipo_vale_resg WHERE Id_Tipo_Vale_Resg= activos.Id_Tipo_Vale_Resg),'Sin Asignación') tipoDeVale,
                ISNULL((SELECT Desc_Ubic_Prim FROM siga_cat_ubic_prim WHERE Id_Ubic_Prim=activos.Id_Ubic_Prim), 'Sin ubicación Primaria') UP, 
                ISNULL((SELECT Desc_Ubic_Sec FROM siga_cat_ubic_sec WHERE Id_Ubic_Sec=activos.Id_Ubic_Sec),'Sin Ubicación Secundaria') US,
                ISNULL(activos.especifica,'Sin Ubicación') Especifica,
                ISNULL(activos.marca,'Sin Marca') marca,        
                ISNULL(activos.modelo,'Sin Modelo') modelo,        
                ISNULL(activos.NumSerie,'Sin Serie') NumSerie
        FROM siga_activos activos
        wHERE Num_Empleado=$numEmpleado 
        AND Estatus_Reg in (1,2) 
        AND Id_Activo NOT IN (SELECT Id_Activo FROM siga_baja_activo where usuario = (select Id_Usuario from siga_usuarios where No_Usuario=$numEmpleado and Estatus_Reg in (1,2)))
        ORDER BY Id_Area ASC";

    $sqlPrepare = $pdo->prepare($sql);
    $sqlPrepare->execute();
    $sqlResult = $sqlPrepare->fetchAll(PDO::FETCH_NAMED);
    $pdo=null;

    return $sqlResult;

}


}
