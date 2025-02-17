<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class appSiga extends conectar{

function getSigaTicketPorCalificar($id_solicitd){
  $pdoGestafSiga = conectar::ConexionGestafSiga();

  $sqlGetSiga = "SELECT  Id_Solicitud,
        isnull(a.Id_Activo,'') bandera_int,
        isnull(Nombre_Act_Ext,'0') bandera_ext,
        convert(varchar, a.Fech_Solicitud, 105) Fech_Solicitud,
        convert(varchar, a.Fech_Espera_Cierre, 105) Fech_Espera_Cierre,
        a.Estatus_Proceso,
        b.AF_BC,
        b.DescCorta,
        b.Marca,
        b.NumSerie,
        b.modelo,        
        Nombre_Act_Ext, 
        Marca_Act_Ext,
        Modelo_Act_Ext,
        No_Serie_Act_Ext,
        isnull((SELECT Desc_Ubic_Prim FROM siga_cat_ubic_prim WHERE Id_Ubic_Prim = a.Id_Ubic_Prim),'') Id_Ubic_Prim,
        isnull((SELECT Desc_Ubic_Sec FROM siga_cat_ubic_sec WHERE Id_Ubic_Sec=a.Id_Ubic_Sec),'') Id_Ubic_Sec,
        (SELECT Desc_Motivo_Aparente FROM siga_cat_motivo_aparente WHERE Id_Motivo_Aparente=a.Id_Motivo_Aparente) Id_Motivo_Aparente,
        (SELECT Desc_Motivo_Real FROM siga_cat_motivo_real WHERE Id_Motivo_Real=a.Id_Motivo_Real) Id_Motivo_Real ,
        (SELECT Desc_Est_Equipo FROM siga_cat_estatus_equipo WHERE Id_Est_Equipo=a.Id_Est_Equipo) Id_Est_Equipo,
        (SELECT Desc_Categoria FROM siga_cat_ticket_categoria WHERE Id_Categoria=a.Id_Categoria) Id_Categoria,
        (SELECT Desc_Subcategoria FROM siga_cat_ticket_subcategoria WHERE Id_Subcategoria=a.Id_Subcategoria) Id_Subcategoria,
        ComentarioCierre,
        Id_Usuario_Inicial,
        Titulo,
        Desc_Motivo_Reporte    
        FROM      siga_solicitud_tickets a
        LEFT JOIN siga_activos b ON a.Id_Activo = b.Id_Activo
        WHERE     Id_Solicitud=:id_solicitd
        AND       a.Id_Area=1";
        $GetSiga  = $pdoGestafSiga->prepare($sqlGetSiga);
        $GetSiga->bindParam(":id_solicitd",		    $id_solicitd, PDO::PARAM_INT);

        $GetSiga->execute();
        $datos= $GetSiga->fetch(PDO::FETCH_NAMED);

      $pdoGestafSiga = null;
      return $datos;
  }

  function getSigaTicketCalificar($id_solicitud,$siga_appSiga_UsuarioFinal,$siga_appSiga_Ofrecida,$siga_appSiga_Servicio,$siga_appSiga_Respuesta,$siga_appSiga_Ofrecida_c,$siga_appSiga_Servicio_c,$siga_appSiga_Respuesta_c,$imageData){
    $pdoGestafSiga = conectar::ConexionGestafSiga();

      $sqlUpdate="UPDATE siga_solicitud_tickets SET Estatus_Proceso=4, Fech_Cierre=getdate(), Id_Usuario=:siga_appSiga_UsuarioFinal WHERE Id_Solicitud=:id_solicitud";
      $update = $pdoGestafSiga->prepare($sqlUpdate);
      $update->bindParam(":siga_appSiga_UsuarioFinal",  $siga_appSiga_UsuarioFinal, PDO::PARAM_INT);
      $update->bindParam(":id_solicitud",		            $id_solicitud, PDO::PARAM_INT);
      
      $sqlInsert="INSERT INTO siga_ticket_calificacion(Id_Solicitud,Id_Pregunta1,Id_Respuesta1,Desc_Comentario1,Id_Pregunta2,Id_Respuesta2,Desc_Comentario2,Id_Pregunta3,Id_Respuesta3,Desc_Comentario3,Fech_Inser,Usr_Inser,Estatus_Reg,Archivo_Binario) 
                  VALUES(:id_solicitud,1,:siga_appSiga_Ofrecida_c,:siga_appSiga_Ofrecida,2,:siga_appSiga_Servicio_c,:siga_appSiga_Servicio,3,:siga_appSiga_Respuesta_c,:siga_appSiga_Respuesta,getdate(),:siga_appSiga_UsuarioFinal,1,:imageData)";
      $Insert = $pdoGestafSiga->prepare($sqlInsert);
      $Insert->bindParam(":id_solicitud", $id_solicitud, PDO::PARAM_INT);
      $Insert->bindParam(":siga_appSiga_Ofrecida_c",  $siga_appSiga_Ofrecida_c, PDO::PARAM_INT);
      $Insert->bindParam(":siga_appSiga_Ofrecida",    $siga_appSiga_Ofrecida, PDO::PARAM_STR);
      $Insert->bindParam(":siga_appSiga_Servicio_c",  $siga_appSiga_Servicio_c, PDO::PARAM_INT);
      $Insert->bindParam(":siga_appSiga_Servicio",    $siga_appSiga_Servicio,PDO::PARAM_STR);
      $Insert->bindParam(":siga_appSiga_Respuesta_c", $siga_appSiga_Respuesta_c,PDO::PARAM_INT);
      $Insert->bindParam(":siga_appSiga_Respuesta",   $siga_appSiga_Respuesta, PDO::PARAM_STR);
      $Insert->bindParam(":siga_appSiga_UsuarioFinal",$siga_appSiga_UsuarioFinal, PDO::PARAM_INT);
      $Insert->bindParam(":imageData",                $imageData, PDO::PARAM_STR);

try {
  $pdoGestafSiga->beginTransaction();
    $update->execute();
    $Insert->execute();
  $pdoGestafSiga->commit();
    $resultado = 1;
} catch (PDOException $e) {
  $pdoGestafSiga->rollBack();
    $error='appSiga:: '.$e->getMessage();
      //$util->fnlog($error);
  $resultado = 5;
  }
    $pdoGestafSiga = null;
    return $resultado;
  }

}