<?php

if(
isset($_POST['Id_Area']) && $_POST['Id_Area'] !==''
&& isset($_POST['Tipo_Actividad']) && $_POST['Tipo_Actividad'] !=='' 
&& isset($_POST['Id_Activo']) && $_POST['Id_Activo'] !==''
&& isset($_POST['Usuario_Responsable']) && $_POST['Usuario_Responsable'] !==''
&& isset($_POST['Id_Motivo_Real']) && $_POST['Id_Motivo_Real'] !==''
&& isset($_POST['Fecha_Realizada']) && $_POST['Fecha_Realizada'] !==''
&& isset($_POST['Descripcion']) && $_POST['Descripcion'] !==''
&& isset($_POST['Realiza']) && $_POST['Realiza'] !==''
&& isset($_POST['url_documentos_adjuntos']) && $_POST['url_documentos_adjuntos'] !==''
&& isset($_POST['Comentarios']) && $_POST['Comentarios'] !==''
&& isset($_POST['vincular_mesa_ayuda']) && $_POST['vincular_mesa_ayuda'] !==''
&& isset($_POST['quien_realiza']) && $_POST['quien_realiza'] !==''
&& isset($_POST['select_seccion']) && $_POST['select_seccion'] !==''
&& isset($_POST['select_categoria']) && $_POST['select_categoria'] !==''
&& isset($_POST['select_categoria_sub']) && $_POST['select_categoria_sub'] !==''
&& isset($_POST['folio_reporte_externo']) && $_POST['folio_reporte_externo'] !==''
&& isset($_POST['Fecha_solicitud']) && $_POST['Fecha_solicitud'] !==''
&& isset($_POST['select_ejecutantes']) && $_POST['select_ejecutantes'] !==''
&& isset($_POST['descripcion_de_lo_reportado']) && $_POST['descripcion_de_lo_reportado'] !==''
&& isset($_POST['estatus_final_del_equipo']) && $_POST['estatus_final_del_equipo'] !==''
&& isset($_POST['nombre_ingeniero_externo']) && $_POST['nombre_ingeniero_externo'] !==''
&& isset($_POST['select_gestor_levanta_reporte']) && $_POST['select_gestor_levanta_reporte'] !==''
&& isset($_POST['select_gestor_recibe_reporte']) && $_POST['select_gestor_recibe_reporte'] !==''
&& isset($_POST['Usr_Inser']) && $_POST['Usr_Inser'] !==''
&& isset($_POST['Estatus_Reg']) && $_POST['Estatus_Reg'] !==''
){    
include_once(dirname(__FILE__)."/../../cx.php");

@$ip_usuario=$_SERVER['REMOTE_ADDR'];

@$Id_Area               =$_POST['Id_Area'];
@$Tipo_Actividad        =$_POST['Tipo_Actividad'];
@$Id_Activo             =$_POST['Id_Activo'];
@$Usuario_Responsable   =$_POST['Usuario_Responsable'];
@$Id_Motivo_Real        =$_POST['Id_Motivo_Real'];
@$Fecha_Realizada       =$_POST['Fecha_Realizada'];
@$Descripcion           =$_POST['Descripcion'];
@$Realiza               =$_POST['Realiza'];
@$url_documentos_adjuntos =trim($_POST['url_documentos_adjuntos']);
@$Comentarios           =$_POST['Comentarios'];
@$vincular_mesa_ayuda   =$_POST['vincular_mesa_ayuda'];
@$quien_realiza         =$_POST['quien_realiza'];
@$select_seccion        =$_POST['select_seccion'];
@$select_categoria      =$_POST['select_categoria'];
@$select_categoria_sub  =$_POST['select_categoria_sub'];
@$folio_reporte_externo =$_POST['folio_reporte_externo'];
@$Fecha_solicitud       =$_POST['Fecha_solicitud'];
@$select_ejecutantes    =$_POST['select_ejecutantes'];
@$descripcion_de_lo_reportado =$_POST['descripcion_de_lo_reportado'];
@$estatus_final_del_equipo  =$_POST['estatus_final_del_equipo'];
@$nombre_ingeniero_externo  =$_POST['nombre_ingeniero_externo'];
@$select_gestor_levanta_reporte =$_POST['select_gestor_levanta_reporte'];
@$select_gestor_recibe_reporte  =$_POST['select_gestor_recibe_reporte'];
@$Usr_Inser             =$_POST['Usr_Inser'];
@$Estatus_Reg           =$_POST['Estatus_Reg'];

$descripcion_1    =trim($_POST['descripcion_1']);
$descripcion_2    =trim($_POST['descripcion_2']);
$descripcion_3    =trim($_POST['descripcion_3']);
$descripcion_4    =trim($_POST['descripcion_4']);
$descripcion_5    =trim($_POST['descripcion_5']);
$Folio_Almacen_1   =$_POST['Folio_Almacen_1'];
$Folio_Almacen_2   =$_POST['Folio_Almacen_2'];
$Folio_Almacen_3   =$_POST['Folio_Almacen_3'];
$Folio_Almacen_4   =$_POST['Folio_Almacen_4'];
$Folio_Almacen_5   =$_POST['Folio_Almacen_5'];
$combo_accesorios_1=$_POST['combo_accesorios_1'];
$combo_accesorios_2=$_POST['combo_accesorios_2'];
$combo_accesorios_3=$_POST['combo_accesorios_3'];
$combo_accesorios_4=$_POST['combo_accesorios_4'];
$combo_accesorios_5=$_POST['combo_accesorios_5'];
$clase_1           =$_POST['clase_1'];
$clase_2           =$_POST['clase_2'];
$clase_3           =$_POST['clase_3'];
$clase_4           =$_POST['clase_4'];
$clase_5           =$_POST['clase_5'];
$unidad_1          =$_POST['unidad_1'];
$unidad_2          =$_POST['unidad_2'];
$unidad_3          =$_POST['unidad_3'];
$unidad_4          =$_POST['unidad_4'];
$unidad_5          =$_POST['unidad_5'];
$costo_valor_1     =$_POST['costo_valor_1'];
$costo_valor_2     =$_POST['costo_valor_2'];
$costo_valor_3     =$_POST['costo_valor_3'];
$costo_valor_4     =$_POST['costo_valor_4'];
$costo_valor_5     =$_POST['costo_valor_5'];
$cantidad_1        =$_POST['cantidad_1'];
$cantidad_2        =$_POST['cantidad_2'];
$cantidad_3        =$_POST['cantidad_3'];
$cantidad_4        =$_POST['cantidad_4'];
$cantidad_5        =$_POST['cantidad_5'];
$manual_descripcion_1    =trim($_POST['manual_descripcion_1']);
$manual_descripcion_2    =trim($_POST['manual_descripcion_2']);
$manual_descripcion_3    =trim($_POST['manual_descripcion_3']);
$manual_descripcion_4    =trim($_POST['manual_descripcion_4']);
$manual_descripcion_5    =trim($_POST['manual_descripcion_5']);
$manual_codigo_de_barras_1=trim($_POST['manual_codigo_de_barras_1']);
$manual_codigo_de_barras_2=trim($_POST['manual_codigo_de_barras_2']);
$manual_codigo_de_barras_3=trim($_POST['manual_codigo_de_barras_3']);
$manual_codigo_de_barras_4=trim($_POST['manual_codigo_de_barras_4']);
$manual_codigo_de_barras_5=trim($_POST['manual_codigo_de_barras_5']);
$manual_costo_1          =$_POST['manual_costo_1'];
$manual_costo_2          =$_POST['manual_costo_2'];
$manual_costo_3          =$_POST['manual_costo_3'];
$manual_costo_4          =$_POST['manual_costo_4'];
$manual_costo_5          =$_POST['manual_costo_5'];
$manual_cantidad_1       =$_POST['manual_cantidad_1'];
$manual_cantidad_2       =$_POST['manual_cantidad_2'];
$manual_cantidad_3       =$_POST['manual_cantidad_3'];
$manual_cantidad_4       =$_POST['manual_cantidad_4'];
$manual_cantidad_5       =$_POST['manual_cantidad_5'];

$Fecha_solicitud_sin=str_replace('-','',$Fecha_solicitud);
$Fecha_Realizada_sin=str_replace('-','',$Fecha_Realizada);
$Fecha_solicitud=date('d-m-Y', strtotime($Fecha_solicitud));
$Fecha_Realizada=date('d-m-Y', strtotime($Fecha_Realizada));

$insert_siga_actividades="
INSERT INTO siga_actividades (
Id_Area,Tipo_Actividad,
Id_Activo,Usuario_Responsable,
Id_Motivo_Real,Fecha_Realizada,
Descripcion,Realiza,
url_documentos_adjuntos,Comentarios,
vincular_mesa_ayuda,select_seccion,
select_categoria,select_categoria_sub,
folio_reporte_externo,Fecha_solicitud,
Nombre_Ejecutante,descripcion_de_lo_reportado,
estatus_final_del_equipo,nombre_ingeniero_externo,
ID_Gestor,select_gestor_recibe_reporte,
Usr_Inser,Estatus_Reg,Fech_Inser) 
values (
$Id_Area,$Tipo_Actividad,$Id_Activo,
'$Usuario_Responsable',$Id_Motivo_Real,
'$Fecha_Realizada_sin','$Descripcion',
$Realiza,'$url_documentos_adjuntos',
'$Comentarios',$vincular_mesa_ayuda,
$select_seccion,$select_categoria,
$select_categoria_sub,'$folio_reporte_externo',
'$Fecha_solicitud_sin',$select_ejecutantes,
'$descripcion_de_lo_reportado',$estatus_final_del_equipo,
'$nombre_ingeniero_externo',$select_gestor_levanta_reporte,
$select_gestor_recibe_reporte,$Usr_Inser,
$Estatus_Reg,GETDATE()
)
";

$pdoConexion->query($insert_siga_actividades);
$Id_Actividad = $pdoConexion->lastInsertId();

$update_estatus_activo="
UPDATE siga_activos
SET Id_Situacion_Activo=$estatus_final_del_equipo
WHERE Id_Activo= $Id_Activo
";
$pdoConexion->query($update_estatus_activo);

$select_siga_activo_fijo="
SELECT Num_Empleado, 
Nombre_Completo, 
Nombre_Activo, 
Marca, 
Modelo,
NumSerie,
Id_Ubic_Prim,
Id_Ubic_Sec, 
AF_BC
FROM siga_activos
WHERE Id_Activo=$Id_Activo
";

$select_siga_activo_fijo_qry=$pdoConexion->query($select_siga_activo_fijo);
$select_siga_activo_fijo_select=$select_siga_activo_fijo_qry->fetchAll(PDO::FETCH_NAMED);

$Id_Usuario_Inicial =trim($select_siga_activo_fijo_select[0]['Num_Empleado']);
$Nombre_Completo    =trim($select_siga_activo_fijo_select[0]['Nombre_Completo']);
$Nombre_Activo      =trim($select_siga_activo_fijo_select[0]['Nombre_Activo']);
$Marca              =trim($select_siga_activo_fijo_select[0]['Marca']);
$Modelo             =trim($select_siga_activo_fijo_select[0]['Modelo']);
$NumSerie           =trim($select_siga_activo_fijo_select[0]['NumSerie']);
$Id_Ubic_Prim       =$select_siga_activo_fijo_select[0]['Id_Ubic_Prim'];
$Id_Ubic_Sec        =$select_siga_activo_fijo_select[0]['Id_Ubic_Sec'];
$AF_BC              =trim($select_siga_activo_fijo_select[0]['AF_BC']);

$select_siga_usuarios="
SELECT Id_Usuario
FROM siga_usuarios
WHERE No_Usuario=$Id_Usuario_Inicial
";

$select_siga_usuarios_qry=$pdoConexion->query($select_siga_usuarios);
$select_siga_usuarios_select=$select_siga_usuarios_qry->fetchAll(PDO::FETCH_NAMED);

$Id_Usuario =trim($select_siga_usuarios_select[0]['Id_Usuario']);

$insert_siga_solicitud_tickets="
INSERT INTO siga_solicitud_tickets(
Asist_Especial,Id_Usuario_Inicial,Id_Usuario,
Id_Area,Id_Medio,Seccion,Id_Actividad,
Titulo,Desc_Motivo_Reporte,Prioridad,
Url_archivo,Fech_Inser,
Usr_Inser,Estatus_Reg,Estatus_Proceso,
Lo_Realiza,Id_Activo,
Id_Categoria,Id_Subcategoria,
Id_Gestor,Nombre_Ejecutante,
ComentarioCierre,Id_Motivo_Aparente,
Id_Motivo_Real,Id_Est_Equipo,
Fech_Solicitud,Fech_Seguimiento,
Fech_Espera_Cierre,Gestor_Final_Cierre,
Activo_Externo,AF_BC_Ext,
Nombre_Act_Ext,Marca_Act_Ext,
Modelo_Act_Ext,No_Serie_Act_Ext,
Nombre_Completo_Ext,Id_Ubic_Prim,
Id_Ubic_Sec,Direccion_Ip_Sol
)
VALUES (
0,$Id_Usuario_Inicial,$Id_Usuario,
$Id_Area,1,$select_seccion,$Id_Actividad,
'Servicio Externo','$descripcion_de_lo_reportado',$Tipo_Actividad,
'$url_documentos_adjuntos','$Fecha_solicitud',
$Usr_Inser,1,3,
1,$Id_Activo,$select_categoria,
$select_categoria_sub,$select_gestor_levanta_reporte,
$select_ejecutantes,'$Descripcion',
17,$Id_Motivo_Real,
$estatus_final_del_equipo,
'$Fecha_solicitud',
'$Fecha_solicitud', 
'$Fecha_Realizada',
$select_gestor_recibe_reporte,0,
'$AF_BC','$Nombre_Activo','$Marca',
'$Modelo','$NumSerie','$nombre_ingeniero_externo',
$Id_Ubic_Prim,$Id_Ubic_Sec,'$ip_usuario'
)
";

$pdoConexion->query($insert_siga_solicitud_tickets);
$Id_Ticket = $pdoConexion->lastInsertId();

    if($combo_accesorios_1 != 'default'){

      $insert_siga_material_externo_1="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     folio_almacen_material,
                     sku_material,
                     clase_material,
                     unidad_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$descripcion_1',
                      '$Folio_Almacen_1',
                      '$combo_accesorios_1',
                      '$clase_1',
                      '$unidad_1',
                      $costo_valor_1,
                      $cantidad_1,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_externo_1);
    }

    if($combo_accesorios_2 != 'default'){

      $insert_siga_material_externo_2="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     folio_almacen_material,
                     sku_material,
                     clase_material,
                     unidad_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$descripcion_2',
                      '$Folio_Almacen_2',
                      '$combo_accesorios_2',
                      '$clase_2',
                      '$unidad_2',
                      $costo_valor_2,
                      $cantidad_2,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_externo_2);
    }

    if($combo_accesorios_3 != 'default'){

      $insert_siga_material_externo_3="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     folio_almacen_material,
                     sku_material,
                     clase_material,
                     unidad_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$descripcion_3',
                      '$Folio_Almacen_3',
                      '$combo_accesorios_3',
                      '$clase_3',
                      '$unidad_3',
                      $costo_valor_3,
                      $cantidad_3,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_externo_3);
    }

    if($combo_accesorios_4 != 'default'){

      $insert_siga_material_externo_4="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     folio_almacen_material,
                     sku_material,
                     clase_material,
                     unidad_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$descripcion_4',
                      '$Folio_Almacen_4',
                      '$combo_accesorios_4',
                      '$clase_4',
                      '$unidad_4',
                      $costo_valor_4,
                      $cantidad_4,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_externo_4);
    }

    if($combo_accesorios_5 != 'default'){

      $insert_siga_material_externo_5="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     folio_almacen_material,
                     sku_material,
                     clase_material,
                     unidad_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$descripcion_5',
                      '$Folio_Almacen_5',
                      '$combo_accesorios_5',
                      '$clase_5',
                      '$unidad_5',
                      $costo_valor_5,
                      $cantidad_5,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_externo_5);
    }

    if($manual_descripcion_1 != ''){

      $insert_siga_material_manual="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     sku_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$manual_descripcion_1',
                      '$manual_codigo_de_barras_1',
                      $manual_costo_1,
                      $manual_cantidad_1,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_manual);
    }

    if($manual_descripcion_2 != ''){

      $insert_siga_material_manual="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     sku_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$manual_descripcion_2',
                      '$manual_codigo_de_barras_2',
                      $manual_costo_2,
                      $manual_cantidad_2,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_manual);
    }

    if($manual_descripcion_3 != ''){

      $insert_siga_material_manual="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     sku_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$manual_descripcion_3',
                      '$manual_codigo_de_barras_3',
                      $manual_costo_3,
                      $manual_cantidad_3,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_manual);
    }

    if($manual_descripcion_4 != ''){

      $insert_siga_material_manual="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     sku_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$manual_descripcion_4',
                      '$manual_codigo_de_barras_4',
                      $manual_costo_4,
                      $manual_cantidad_4,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_manual);
    }

    if($manual_descripcion_5 != ''){

      $insert_siga_material_manual="

              INSERT INTO siga_actividades_materiales
                    (id_actividad,
                     id_solicitud,
                     descripcion_material,
                     sku_material,
                     costo_material,
                     cantidad_material,
                     Fech_Inser,
                     Usr_Inser
              )VALUES($Id_Actividad,
                      $Id_Ticket,
                      '$manual_descripcion_5',
                      '$manual_codigo_de_barras_5',
                      $manual_costo_5,
                      $manual_cantidad_5,
                      GETDATE(),
                      $Usr_Inser)";

      $pdoConexion->query($insert_siga_material_manual);
    }

$pdoConexion=null;

  echo json_encode($insert_siga_material_manual);
}else{
  echo json_encode('Error Material');
}

/*

&& isset($_POST['Mant_RAC1']) && $_POST['Mant_RAC1'] !==''
&& isset($_POST['Mant_RAC2']) && $_POST['Mant_RAC2'] !==''
&& isset($_POST['Mant_RAC3']) && $_POST['Mant_RAC3'] !==''
&& isset($_POST['Mant_RAC4']) && $_POST['Mant_RAC4'] !==''
&& isset($_POST['Cantidad_1']) && $_POST['Cantidad_1'] !==''
&& isset($_POST['Cantidad_2']) && $_POST['Cantidad_2'] !==''
&& isset($_POST['Cantidad_3']) && $_POST['Cantidad_3'] !==''
&& isset($_POST['Cantidad_4']) && $_POST['Cantidad_4'] !==''
&& isset($_POST['Costo_1']) && $_POST['Costo_1'] !==''
&& isset($_POST['Costo_2']) && $_POST['Costo_2'] !==''
&& isset($_POST['Costo_3']) && $_POST['Costo_3'] !==''
&& isset($_POST['Costo_4']) && $_POST['Costo_4'] !==''
&& isset($_POST['Horas']) && $_POST['Horas'] !==''
&& isset($_POST['Costos_Materiales_CE']) && $_POST['Costos_Materiales_CE'] !==''
&& isset($_POST['Mano_Obra_CE']) && $_POST['Mano_Obra_CE'] !==''
&& isset($_POST['Total_CE']) && $_POST['Total_CE'] !==''
&& isset($_POST['Costos_Materiales_CI']) && $_POST['Costos_Materiales_CI'] !==''
&& isset($_POST['Mano_Obra_CI']) && $_POST['Mano_Obra_CI'] !==''
&& isset($_POST['Total_CI']) && $_POST['Total_CI'] !==''
&& isset($_POST['Ahorro']) && $_POST['Ahorro'] !==''

*/
/*
try {  
    $pdoConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdoConexion->beginTransaction();

        $pdoConexion->exec($insert_siga_actividades);
          $id = $pdoConexion->lastInsertId();
        $pdoConexion->exec($update_estatus_activo);
        $pdoConexion->exec($select_siga_activo_fijo);


        $pdoConexion->exec();
    $pdoConexion->commit();
} catch (Exception $e) {
    $pdoConexion->rollBack();
    echo "Failed: " . $e->getMessage();
}


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}


*/


?>