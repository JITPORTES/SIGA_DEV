<?php
  include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");

  class mtoPreventivo extends conectar{
    
    function prueba(){
      $pdo = conectar::ConexionGestafSiga();

      $pdo=null;
      return 'prueba';
    }

    function getActividadesIdFecha($id, $Fech_Solicitud){            
      $pdo = conectar::ConexionGestafSiga();
      
      $sql = "SELECT act.Id_Det_Actividad, act.Num_Actividad, rutina.siga_cat_rutinas_act_desc, rutina.siga_cat_rutinas_act_valor_ref, rutina.siga_cat_rutinas_act_valor_medio, rutina.siga_cat_rutinas_act_adjunto,act.Fecha_Programada, act.Fecha_Realizada, act.Url_Adjunto, act.Valor_Medido, act.Observaciones, act.Estatus_Actividad
              FROM siga_det_actividades act
              LEFT JOIN siga_cat_rutinas_act rutina ON act.siga_cat_rutinas_act_id = rutina.siga_cat_rutinas_act_id
              WHERE Id_Actividad = $id
              AND Fecha_Programada = $Fech_Solicitud
                AND rutina.siga_cat_rutinas_act_estatus in (1,2)
              ORDER BY act.Num_Actividad";
      $resultado = $pdo->prepare($sql);
      $resultado->execute();
      $info = $resultado->fetchAll(PDO::FETCH_NAMED);
      $pdo=null;
      return $info;
    }

    function updateActividades($act_id,$act_valor_medido,$act_estatus,$act_observaciones,$act_fch_realizado, $act_adjunto_nom, $Id_Usuario){

      $pdo = conectar::ConexionGestafSiga();

        $sql = "UPDATE siga_det_actividades SET Valor_Medido=:act_valor_medido, Estatus_Actividad=:act_estatus, Observaciones=:act_observaciones, Url_Adjunto=:act_adjunto_nom, Fecha_Realizada=:act_fch_realizado, Usr_Mod=:Id_Usuario, Fech_Mod=getdate() WHERE Id_Det_Actividad=:act_id";
        $query = $pdo->prepare($sql);
        $query->bindParam(":act_valor_medido",	$act_valor_medido,  PDO::PARAM_STR);
        $query->bindParam(":act_estatus",				$act_estatus,			  PDO::PARAM_INT);      
        $query->bindParam(":act_observaciones",	$act_observaciones, PDO::PARAM_STR);
        $query->bindParam(":act_adjunto_nom",	  $act_adjunto_nom,   PDO::PARAM_STR);
        $query->bindParam(":act_fch_realizado", $act_fch_realizado, PDO::PARAM_STR);
        $query->bindParam(":Id_Usuario",				$Id_Usuario,			  PDO::PARAM_INT);
        $query->bindParam(":act_id",				    $act_id,			      PDO::PARAM_INT);

      try {
				$pdo->beginTransaction();
					$query->execute();
				$pdo->commit();
        $resultado = true;
      } catch (PDOException $e) {
        $resultado = false;
        $log=$e->getMessage();
      }

        $pdo=null;
      return $resultado;
    }

  function sigaActualizarActividades($act_id,$campo,$valor){
    // $pdo = conectar::ConexionGestafSiga();

    $sql = "UPDATE siga_det_actividades SET $campo='$valor' WHERE Id_Det_Actividad=$act_id";
    // $query = $pdo->prepare($sql);

    // $query->bindParam(":act_valor_medido",	$act_valor_medido,  PDO::PARAM_STR);
    // $query->bindParam(":act_estatus",				$act_estatus,			  PDO::PARAM_INT);  

    // try {
    //   $pdo->beginTransaction();
    //     $query->execute();
    //   $pdo->commit();
    //   $resultado = true;
    // } catch (PDOException $e) {
    //   $resultado = false;
    //   $log=$e->getMessage();
    // }

      // $pdo=null;


    return $sql;
  }

  function sigaActividadesEliminarImagen($id){
    $pdo = conectar::ConexionGestafSiga();

    $busqueda = "SELECT Url_Adjunto FROM siga_det_actividades WHERE Id_Det_Actividad=$id"; 
    $resultadoBusqueda = $pdo->prepare($busqueda);
    $resultadoBusqueda->execute();
    $url = $resultadoBusqueda->fetch(PDO::FETCH_COLUMN);

    $sql  = "UPDATE siga_det_actividades SET Url_Adjunto = '' WHERE Id_Det_Actividad=$id";
    $sql  = $pdo->prepare($sql);
    
    try {
      $pdo->beginTransaction();
        $sql->execute();
          $pdo->commit();
      $valido = true;
    } catch (PDOException $e) {
      $valido = false;
      $log=$e->getMessage();
    }    

    if($valido){
      $destinationDirectory = $_SERVER['DOCUMENT_ROOT'].'/SIGA/Archivos/Archivos-Actividades/Mantenimiento-Preventivo/'.$url;
      
      if(unlink($destinationDirectory)){
        $resultado='Se elimino';
      }else{
        $resultado='no se elimino';
      }
      
      $resultado='true';
    } else {
      $resultado='false';
     }
    
    $pdo=null;
    return 'class OK Dramas';
  }

function getActivoActividad($id_actividad){
  $pdo = conectar::ConexionGestafSiga();

  $sql = "SELECT  Id_Actividad, 
        actividades.Id_Activo, 
        actividades.Nombre_Rutina,
        activos.AF_BC,
        activos.DescLarga,
        isNULL((SELECT Desc_Ubic_Sec FROM siga_cat_ubic_sec WHERE Id_Ubic_Sec=activos.Id_Ubic_Sec),'Sin Ubicación Secundaria') Ubic_Sec,
        (SELECT Desc_Ubic_Prim FROM siga_cat_ubic_prim WHERE Id_Ubic_Prim=activos.Id_Ubic_Prim) Ubic_Prim,         
        activos.NumSerie,
        activos.Marca,
        activos.DescCorta,
        activos.Modelo,
        activos.Especifica,
        activos.Foto
      FROM siga_actividades actividades
      LEFT JOIN siga_activos activos ON activos.Id_Activo=actividades.Id_Activo
      WHERE Id_Actividad=$id_actividad";
    $resultado = $pdo->prepare($sql);
    $resultado->execute();
    $info = $resultado->fetch(PDO::FETCH_NAMED);

  $pdo=NULL;

  return $info;
}

function reprogramarActividad($texto_fecha_programada,$texto_id_actividad,$texto_fecha_reprogramada,$Id_Usuario){
  $pdo = conectar::ConexionGestafSiga();
  $texto_fecha_reprogramada = str_replace("-", "",  $texto_fecha_reprogramada);
  $texto_fecha_programada   = str_replace("-", "",  $texto_fecha_programada);
  $resultado                = true;

  $sql = "UPDATE siga_det_actividades SET Fecha_Programada=$texto_fecha_reprogramada, Fech_Mod= GETDATE(), Usr_Mod=$Id_Usuario WHERE Id_Actividad=$texto_id_actividad and Fecha_Programada=$texto_fecha_programada";
  $resultado = $pdo->prepare($sql);
  $resultado->execute();

  $pdo=null;
  return $resultado;
}

function cancelarActividad($texto_fecha_programada,$texto_id_actividad,$Id_Usuario){
  $pdo = conectar::ConexionGestafSiga();
  
  $texto_fecha_programada   = str_replace("-", "",  $texto_fecha_programada);
  $resultado                = true;

  $sql = "UPDATE siga_det_actividades SET Estatus_Reg=3, Fech_Mod= GETDATE(), Usr_Mod=$Id_Usuario WHERE Id_Actividad=$texto_id_actividad and Fecha_Programada=$texto_fecha_programada";
  $resultado = $pdo->prepare($sql);
  $resultado->execute();

  $pdo=null;
  return $resultado;
}


  } 