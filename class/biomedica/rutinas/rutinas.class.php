<?php
  include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
  
class rutinas extends conectar{


  function sigaRutinasTitulo($siga_rutinas_descripcion,$Id_Usuario){
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();

    $sqlSigaRutinas = "INSERT INTO siga_cat_rutinas(siga_cat_rutinas_titulo, siga_cat_rutinas_usr_insert,siga_cat_rutinas_fch_insert,siga_cat_rutinas_estatus) VALUES(:siga_rutinas_descripcion,$Id_Usuario,getdate(),1)";
    $SigaRutinas    = $pdoConexionGestafSiga->prepare($sqlSigaRutinas);
    $SigaRutinas->bindParam(":siga_rutinas_descripcion",		    $siga_rutinas_descripcion, PDO::PARAM_STR);

    try {
      $pdoConexionGestafSiga->beginTransaction();
        $SigaRutinas->execute();
        $siga_cat_rutinas_id = $pdoConexionGestafSiga->lastInsertId();
      $pdoConexionGestafSiga->commit();
    } catch (PDOException $e) {
      $pdoConexionGestafSiga->rollBack();
        $error='Rutinas: '.$e->getMessage();
    }

      $pdoConexionGestafSiga=null;
    return $siga_cat_rutinas_id;
  }

  
  function sigaRutinasActividad($rutinasTitulo,$key1,$key2,$key3,$key4,$Id_Usuario){
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();

    $sqlSigaRutinasAct = "INSERT INTO siga_cat_rutinas_act(siga_cat_rutinas_id, siga_cat_rutinas_act_desc, siga_cat_rutinas_act_valor_ref,siga_cat_rutinas_act_valor_medio, siga_cat_rutinas_act_adjunto, siga_cat_rutinas_act_usr_insert, siga_cat_rutinas_act_fch_insert, siga_cat_rutinas_act_estatus) 
                          VALUES($rutinasTitulo,'$key1','$key2',$key3,$key4,$Id_Usuario,getdate(),1)";
    $SigaRutinasAct    = $pdoConexionGestafSiga->prepare($sqlSigaRutinasAct);
    
    try {
      $pdoConexionGestafSiga->beginTransaction();
        $SigaRutinasAct->execute();
        $siga_cat_rutinas_id = $pdoConexionGestafSiga->lastInsertId();
      $pdoConexionGestafSiga->commit();
    } catch (PDOException $e) {
      $pdoConexionGestafSiga->rollBack();
        $error='Rutinas: '.$e->getMessage();
    }
      
    $pdoConexionGestafSiga=null;

    return $siga_cat_rutinas_id;
  }

  function sigaRutinasBaja($siga_rutina_titulo_id,$Id_Usuario){
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
    $sqlSigaRutina = "UPDATE siga_cat_rutinas SET siga_cat_rutinas_estatus=3, siga_cat_rutinas_usr_update=$Id_Usuario,siga_cat_rutinas_fch_update=getdate() WHERE siga_cat_rutinas_id=$siga_rutina_titulo_id";
    $SigaRutina    = $pdoConexionGestafSiga->prepare($sqlSigaRutina);

    try {
      $pdoConexionGestafSiga->beginTransaction();
        $SigaRutina->execute();
      $pdoConexionGestafSiga->commit();
      $resultado=1;
    } catch (PDOException $e) {
      $pdoConexionGestafSiga->rollBack();
      $resultado=5;
        //$error='Rutinas: '.$e->getMessage();
    }

    return $sqlSigaRutina;
  }

  function sigaRutinas(){
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
      
      $sqlSigaRutinas = "SELECT  siga_cat_rutinas_id, siga_cat_rutinas_titulo FROM siga_cat_rutinas WITH (NOLOCK) WHERE siga_cat_rutinas_estatus IN (1,2)";
      $SigaRutinas    = $pdoConexionGestafSiga->prepare($sqlSigaRutinas);
      $SigaRutinas->execute();
      $SigaRutinasInfo = $SigaRutinas->fetchAll(PDO::FETCH_ASSOC);

    $pdoConexionGestafSiga = NULL;
    return $SigaRutinasInfo;
  }

  function sigaRutinasInfo($siga_rutinas_id){
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();

    $sqlSigaRutina ="SELECT siga_cat_rutinas_act_desc, 
                            siga_cat_rutinas_act_valor_ref,
                        CASE 
                          WHEN siga_cat_rutinas_act_valor_medio=1 THEN 'SI'
                          ELSE 'NO'
                        END valor_medio,
                        CASE 
                          WHEN siga_cat_rutinas_act_adjunto=1 THEN 'SI'
                          ELSE 'NO'
                        END valor_adjunto,
                        siga_cat_rutinas_act_id as id_actividad
                        FROM  siga_cat_rutinas_act WITH (NOLOCK)
                        WHERE siga_cat_rutinas_id=$siga_rutinas_id
                        AND   siga_cat_rutinas_act_estatus IN (1,2)
                        AND   siga_cat_rutinas_act_desc != ''
                        ORDER BY siga_cat_rutinas_act_usr_insert DESC";
      $SigaRutinas = $pdoConexionGestafSiga->prepare($sqlSigaRutina);
      $SigaRutinas->execute();
      $SigaRutinasInfo = $SigaRutinas->fetchAll(PDO::FETCH_ASSOC);

    $pdoConexionGestafSiga = NULL;
    return $SigaRutinasInfo;
  }

function sigaRutinasActivosSolicitados($siga_ids_activos){
  $pdoConexionGestafSiga = conectar::ConexionGestafSiga();

  $ids = implode(",", $siga_ids_activos);

  $sql="SELECT  Id_Activo, AF_BC, Nombre_Activo
        FROM    siga_activos WITH (NOLOCK)
        WHERE   Id_Activo IN ($ids)
        ORDER BY Id_Activo
        ";

  $sqlResult = $pdoConexionGestafSiga->prepare($sql);
  $sqlResult->execute();
  $datos = $sqlResult->fetchAll(PDO::FETCH_NAMED);

  $pdoConexionGestafSiga = NULL;
return $datos;
}

function sigaInsertarRutina($id_activo,$frecuencia,$fecha,$siga_cmb_rutinas,$siga_cmb_rutinasD,$Id_Usuario){
$pdoSiga = conectar::ConexionGestafSiga();

$sql = "SELECT siga_cat_rutinas_act_id, siga_cat_rutinas_act_desc, siga_cat_rutinas_act_valor_ref FROM siga_cat_rutinas_act WITH (NOLOCK) WHERE siga_cat_rutinas_act_estatus IN (1,2) AND siga_cat_rutinas_act_desc != '' AND siga_cat_rutinas_id=$siga_cmb_rutinas";
$sqlPre = $pdoSiga->prepare($sql);
$sqlPre->execute();
$fetchSql = $sqlPre->fetchAll(PDO::FETCH_NUM);

  if($frecuencia == 2){
    $valorIntervalo = 'P1M';
  } else if($frecuencia == 3){
    $valorIntervalo = 'P2M';
  } else if($frecuencia == 4){
    $valorIntervalo = 'P3M';
  } else if($frecuencia == 5){
    $valorIntervalo = 'P4M';
  } else if($frecuencia == 6){
    $valorIntervalo = 'P6M';
  } else if($frecuencia == 7){
    $valorIntervalo = 'P12M';
  }
  
  $primeraFecha = date('Ym01', strtotime($fecha));
  $fechaIni       = new DateTime($fecha);
  $fechaDeInicio  = intval($fechaIni->format('Y'));
  $fechaFin       = new DateTime($fecha);
  $fechaFinal     = $fechaFin->add(new DateInterval('P12M'));
  $fechaFinal     = intval($fechaFin->format('Y'));
  $fechaInsert    = new DateTime($fecha);
  $arrayPrueba = array();

  $sqlIni     = "INSERT INTO siga_actividades(Id_Area, Tipo_Actividad, Id_Activo, Nombre_Rutina, Id_Frecuencia,Descripcion,Realiza,Fecha_Programada,vincular_mesa_ayuda,Fech_Inser,Usr_Inser,Estatus_Reg) VALUES (1,2,$id_activo,'$siga_cmb_rutinasD',$frecuencia,'$siga_cmb_rutinasD',1,'$primeraFecha',1,getdate(),$Id_Usuario,1)";
  $sqlIniPre  = $pdoSiga->prepare($sqlIni);

  try {
    $sqlIniPre->execute();
    $idDeActividad = $pdoSiga->lastInsertId();

  for($i=0;$i<30;$i++){

    $unaFecha = $fechaIni->add(new DateInterval($valorIntervalo));
    $unaFecha->format('Y');
    $fvalidar = intval($fechaIni->format('Y'));
    $fechaInsert->add(new DateInterval($valorIntervalo));

    if($fechaFinal >= $fvalidar){
      $fechaInserts = $fechaInsert->format('Ym01');
      try {
        $i=1;
        foreach($fetchSql as $item){
          try {
            $sqlInsert  = "INSERT INTO siga_det_actividades(Id_Actividad,siga_cat_rutinas_act_id,Num_Actividad,Nombre_Actividad,Valor_Referencia,Fecha_Programada,Fech_Inser,Usr_Inser,Estatus_Reg,V_Mesa) VALUES ($idDeActividad,$item[0],$i,'$item[1]','$item[2]','$fechaInserts',getdate(),$Id_Usuario,1,1)";
            $arrayPrueba[]=$sqlInsert;
            $ejecutar   = $pdoSiga->prepare($sqlInsert);
            $ejecutar->execute();
          } catch (PDOException $e) {
            $resultado=$e->getMessage();
          }
        $i++;
      }
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        } catch (PDOException $e) {
            $pdoSiga->rollBack();
            $resultado=$e->getMessage();            
          }     
      }

  }
  $z=1;
  foreach($fetchSql as $item){
    $sqlInsert2 = "INSERT INTO siga_det_actividades(Id_Actividad,siga_cat_rutinas_act_id,Num_Actividad,Nombre_Actividad,Valor_Referencia,Fecha_Programada,Fech_Inser,Usr_Inser,Estatus_Reg,V_Mesa) VALUES ($idDeActividad,$item[0],$z,'$item[1]','$item[2]','$primeraFecha',getdate(),$Id_Usuario,1,1)";
    $ejecutar2   = $pdoSiga->prepare($sqlInsert2);
    $ejecutar2->execute();
    $z++;
  }

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

  } catch(PDOException $e) {
    $error=$e->getMessage();
  }

      $pdoSiga=null;
    return  $arrayPrueba;
 }

function actividadPorId($id){
  $pdo = conectar::ConexionGestafSiga();

  $sql = "SELECT siga_cat_rutinas_act_id, siga_cat_rutinas_act_desc, siga_cat_rutinas_act_valor_ref, siga_cat_rutinas_act_valor_medio, siga_cat_rutinas_act_adjunto FROM siga_cat_rutinas_act WHERE siga_cat_rutinas_act_id = $id";
  $sqlResult = $pdo->prepare($sql);
  $sqlResult->execute();
  $datos = $sqlResult->fetch(PDO::FETCH_NAMED);

  $pdoConexionGestafSiga = NULL;

  return $datos;
}

function actividadUpdatePorId($id, $siga_rutina_act_desc, $siga_rutina_act_valor_ref, $siga_rutina_act_valor_medio, $siga_rutina_act_adjunto){
  $pdo = conectar::ConexionGestafSiga();

  $sql ="UPDATE siga_cat_rutinas_act 
        SET siga_cat_rutinas_act_desc='$siga_rutina_act_desc', siga_cat_rutinas_act_valor_ref='$siga_rutina_act_valor_ref', 
            siga_cat_rutinas_act_valor_medio=$siga_rutina_act_valor_medio, siga_cat_rutinas_act_adjunto=$siga_rutina_act_adjunto
        WHERE siga_cat_rutinas_act_id=$id";
    $qry = $pdo->prepare($sql);

  try {
    $pdo->beginTransaction();
      $qry->execute();
    $pdo->commit();
    $resultado=1;
  } catch (PDOException $e) {
    $pdo->rollBack();
    $resultado=5;
      //$error='Rutinas: '.$e->getMessage();
  }

  $pdo= null;
  return ''.$resultado;
}

function sigaInsertarRutinaIndividual($id_activo,$frecuencia,$fecha,$siga_cmb_rutinas,$siga_cmb_rutinasD,$Id_Usuario, $comentarios,  $arrayAccesorios){
  $pdoSiga = conectar::ConexionGestafSiga();
  
  $sql = "SELECT siga_cat_rutinas_act_id, siga_cat_rutinas_act_desc, siga_cat_rutinas_act_valor_ref 
          FROM siga_cat_rutinas_act WITH (NOLOCK) 
          WHERE siga_cat_rutinas_act_estatus IN (1,2) 
          AND siga_cat_rutinas_act_desc != '' 
          AND siga_cat_rutinas_id=$siga_cmb_rutinas";
    $sqlPre = $pdoSiga->prepare($sql);
    $sqlPre->execute();
    $fetchSql = $sqlPre->fetchAll(PDO::FETCH_NUM);
  
    if($frecuencia == 2){
      $valorIntervalo = 'P1M';
    } else if($frecuencia == 3){
      $valorIntervalo = 'P2M';
    } else if($frecuencia == 4){
      $valorIntervalo = 'P3M';
    } else if($frecuencia == 5){
      $valorIntervalo = 'P4M';
    } else if($frecuencia == 6){
      $valorIntervalo = 'P6M';
    } else if($frecuencia == 7){
      $valorIntervalo = 'P12M';
    }
    
    $primeraFecha   = date('Ym01', strtotime($fecha));
    $fechaIni       = new DateTime($fecha);
    $fechaDeInicio  = intval($fechaIni->format('Y'));
    $fechaFin       = new DateTime($fecha);
    $fechaFinal     = $fechaFin->add(new DateInterval('P12M'));
    $fechaFinal     = intval($fechaFin->format('Y'));
    $fechaInsert    = new DateTime($fecha);
  
    $sqlIni     = "INSERT INTO siga_actividades(Id_Area, Tipo_Actividad, Id_Activo, Nombre_Rutina, Id_Frecuencia,Descripcion,Realiza,Fecha_Programada,vincular_mesa_ayuda,Comentarios,Fech_Inser,Usr_Inser,Estatus_Reg) 
                    VALUES (1,2,$id_activo,'$siga_cmb_rutinasD',$frecuencia,'$siga_cmb_rutinasD',1,'$primeraFecha',1,'$comentarios', getdate(),$Id_Usuario,1)";
    $sqlIniPre  = $pdoSiga->prepare($sqlIni);

      $sqlIniPre->execute();
      $idDeActividad = $pdoSiga->lastInsertId();
  
    for($i=0;$i<30;$i++){
  
      $unaFecha = $fechaIni->add(new DateInterval($valorIntervalo));
      $unaFecha->format('Y');
      $fvalidar = intval($fechaIni->format('Y'));
      $fechaInsert->add(new DateInterval($valorIntervalo));
  
      if($fechaFinal >= $fvalidar){
        $fechaInserts = $fechaInsert->format('Ym01');
        try {
          $i=1;
          foreach($fetchSql as $item){
            try {
              $sqlInsert  = "INSERT INTO siga_det_actividades(Id_Actividad,siga_cat_rutinas_act_id,Num_Actividad,Nombre_Actividad,Valor_Referencia,Fecha_Programada,Fech_Inser,Usr_Inser,Estatus_Reg,V_Mesa) 
                              VALUES ($idDeActividad,$item[0],$i,'$item[1]','$item[2]','$fechaInserts',getdate(),$Id_Usuario,1,1)";

              $ejecutar   = $pdoSiga->prepare($sqlInsert);
              $ejecutar->execute();
            } catch (PDOException $e) {
              $resultado=$e->getMessage();
            }
          $i++;
        }
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
          } catch (PDOException $e) {
              $pdoSiga->rollBack();
              $resultado=$e->getMessage();            
            }     
        }
  
    }
    $z=1;
    foreach($fetchSql as $item){
      $sqlInsert2 = "INSERT INTO siga_det_actividades(Id_Actividad,siga_cat_rutinas_act_id,Num_Actividad,Nombre_Actividad,Valor_Referencia,Fecha_Programada,Fech_Inser,Usr_Inser,Estatus_Reg,V_Mesa) VALUES ($idDeActividad,$item[0],$z,'$item[1]','$item[2]','$primeraFecha',getdate(),$Id_Usuario,1,1)";
      $ejecutar2   = $pdoSiga->prepare($sqlInsert2);
      $ejecutar2->execute();
      $z++;
    }
  
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  
  // try {

    if(!empty($arrayAccesorios)){
      
      foreach ($arrayAccesorios as $item) {
        $descripcion_material   = trim($item["nombre"]);
        $folio_almacen_material = trim($item["folio"]);
        $sku_material           = trim($item["sku"]);
        $clase_material         = trim($item["clase"]);
        $unidad_material        = trim($item["unidad"]);
        $costo_material         = trim($item["costo"]);
        $cantidad_material      = trim($item["cantidad"]);

        $sqlAccesorios = "INSERT INTO siga_actividades_materiales(id_actividad,descripcion_material,folio_almacen_material,sku_material,clase_material,unidad_material,costo_material,cantidad_material,Fech_Inser,Usr_Inser) 
                          VALUES ($idDeActividad, '$descripcion_material','$folio_almacen_material','$sku_material','$clase_material','$unidad_material',$costo_material,$cantidad_material,getdate(),$Id_Usuario)";
        
        $sqlAccesoriosExecute  = $pdoSiga->prepare($sqlAccesorios);
        $sqlAccesoriosExecute->execute();
      }
               
    }
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
  //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // } catch(Exception $e) {
    //   print 'el error: '.$error=$e->getMessage();
    // }
  
        $pdoSiga=null;
      return 'ok:';
   }


function pruebaRutinas(){
  return 'Prueba De la clase nueva';
}

}

