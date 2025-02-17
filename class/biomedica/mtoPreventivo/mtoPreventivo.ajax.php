<?php

include_once "mtoPreventivo.class.php";

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {

  $accion = trim($_POST['accion']);
  $mtoPreventivoClass = new mtoPreventivo();
  
  if($accion == 1){
    
    $id = $_POST['id'];
    $Fech_Solicitud = date('Ymd',strtotime($_POST['Fech_Solicitud']));
    $hoy            = date('Y-m-d');

    $mtoInfo = $mtoPreventivoClass->getActividadesIdFecha($id, $Fech_Solicitud);
    $mtoArray = array();
    
    foreach($mtoInfo as $item){
      
      if($item['siga_cat_rutinas_act_valor_medio']==1){ $estilo = "style='font-size: 11px; border:1px solid red;'"; } else { $estilo = "style='font-size: 11px;'"; }
      if($item['siga_cat_rutinas_act_adjunto']==1){ $estiloAdjunto = "style='font-size: 13px; border:1px solid red;'"; } else { $estiloAdjunto = "style='font-size: 13px;'"; }
      if($item['Url_Adjunto']!=''){$url="<i class='fa fa-trash-o' aria-hidden='true' style='color:red' onclick='sigaActividadesEliminarImagen(".$item['Id_Det_Actividad'].",".$Fech_Solicitud.",".$id.");'></i> <a href='/siga/Archivos/Archivos-Actividades/Mantenimiento-Preventivo/".$item['Url_Adjunto']."' target='_blank'>Ver Archivo</a>"; $validaAdjunto=1;}else{$url=""; $validaAdjunto=0;}
      if($item['Fecha_Realizada'] == '        ' || $item['Fecha_Realizada'] == '' || $item['Fecha_Realizada'] == null){
        $boton = "class='btn btn-success btn-sm'"; $txtBtn='Guardar';$funcion="sigaValidarActividades"; $disabled="";
        $fechaRealizadaActividad ='';
        $style = "";
      } else {
        $boton="class='btn btn-warning btn-sm'"; $txtBtn='Actualizar';$funcion="sigaValidarActividades"; $disabled = "";
        $fechaRealizadaActividad = date("Y-m-d", strtotime($item['Fecha_Realizada']));
        //$style = "style= 'display:none'";
        $style = "";
      }

    if($item['Estatus_Actividad'] != null){
      if($item['Estatus_Actividad']==1){
        $check1 = "checked";
      } else if($item['Estatus_Actividad']==2){
        $check2 = "checked";
      } else if($item['Estatus_Actividad']==3){
        $check3 = "checked";
      }
     } 
     else {
      $check1 = "";
      $check2 = "";
      $check3 = "";
    }

    $mtoArray[] = "
      <tr>
        <td>".$item['Num_Actividad']."</td><td>".$item['siga_cat_rutinas_act_desc']."<input type='hidden' id='act_id_".$item['Id_Det_Actividad']."' name='act_id_".$item['Id_Det_Actividad']."' value='".$item['Id_Det_Actividad']."' readonly></td><td>".$item['siga_cat_rutinas_act_valor_ref']."</td>
        <td><textarea rows='2' class='form-control' id='act_valor_medido_".$item['Id_Det_Actividad']."' name='act_valor_medido_".$item['Id_Det_Actividad']."' ".$estilo." onblur='onBlurActividades(\"act_valor_medido\",".$item['Id_Det_Actividad'].",".$item['siga_cat_rutinas_act_valor_medio'].",".$item['siga_cat_rutinas_act_adjunto'].",\"".$item['siga_cat_rutinas_act_desc']."\");'>".$item['Valor_Medido']."</textarea></td>
        <td><center><span class='form-radio'><input type='radio' ".$check1." name='act_estatus_".$item['Id_Det_Actividad']."' id='act_estatus_".$item['Id_Det_Actividad']."' value='1' onclick='onBlurActividades(\"act_valor_medido\",".$item['Id_Det_Actividad'].",".$item['siga_cat_rutinas_act_valor_medio'].",".$item['siga_cat_rutinas_act_adjunto'].",\"".$item['siga_cat_rutinas_act_desc']."\");' /><br><label for='radio1' clase='display: block;'>OK</label></span></center></td>
        <td><center><span class='form-radio'><input type='radio' ".$check2." name='act_estatus_".$item['Id_Det_Actividad']."' id='act_estatus_".$item['Id_Det_Actividad']."' value='2' onclick='onBlurActividades(\"act_valor_medido\",".$item['Id_Det_Actividad'].",".$item['siga_cat_rutinas_act_valor_medio'].",".$item['siga_cat_rutinas_act_adjunto'].",\"".$item['siga_cat_rutinas_act_desc']."\");' /><br><label for='radio1' clase='display: block;'>Fallo</label></span></center></td>
        <td><center><span class='form-radio'><input type='radio' ".$check3." name='act_estatus_".$item['Id_Det_Actividad']."' id='act_estatus_".$item['Id_Det_Actividad']."' value='3' onclick='onBlurActividades(\"act_valor_medido\",".$item['Id_Det_Actividad'].",".$item['siga_cat_rutinas_act_valor_medio'].",".$item['siga_cat_rutinas_act_adjunto'].",\"".$item['siga_cat_rutinas_act_desc']."\");' /><br><label for='radio1' clase='display: block;'>N/A</label></span></center></td>
        <td><textarea rows='2' class='form-control' placeholder='' id='act_observaciones_".$item['Id_Det_Actividad']."' name='act_observaciones_".$item['Id_Det_Actividad']."' style='font-size: 11px;' onblur='onBlurActividades(\"act_observaciones\",".$item['Id_Det_Actividad'].",".$item['siga_cat_rutinas_act_valor_medio'].",".$item['siga_cat_rutinas_act_adjunto'].",\"".$item['siga_cat_rutinas_act_desc']."\");'>".$item['Observaciones']."</textarea></td>
        <td><input type='hidden' value='".$validaAdjunto."' name='act_adjunto_valida_".$item['Id_Det_Actividad']."' id='act_adjunto_valida_".$item['Id_Det_Actividad']."'><input name='act_adjunto_".$item['Id_Det_Actividad']."' id='act_adjunto_".$item['Id_Det_Actividad']."' placeholder='Select a file' type='file' ".$estiloAdjunto." class='form-control' ".$disabled.">$url
        <td>".date("d/m/Y", strtotime($item['Fecha_Programada']))."</td>
        <td>
          <input type = 'date' onkeypress='return false;' name='act_fch_realizado_".$item['Id_Det_Actividad']."' id='act_fch_realizado_".$item['Id_Det_Actividad']."' min='".$hoy."' ".$style." value='".$fechaRealizadaActividad."'>
        </td>
        <td>
          <button ".$boton." id='act_boton_".$item['Id_Det_Actividad']."' name='act_boton_".$item['Id_Det_Actividad']."' onclick='".$funcion."(".$item['Id_Det_Actividad'].",".$item['siga_cat_rutinas_act_valor_medio'].",".$item['siga_cat_rutinas_act_adjunto'].",\"".$item['siga_cat_rutinas_act_desc']."\")'".$style." >".$txtBtn."</button>
        </td>
      </tr>";
    }    
    echo json_encode($mtoArray);
    
  } else if ($accion == 2){
    $Id_Usuario         = $_POST['Id_Usuario'];
    $act_id             = $_POST['act_id'];
    $act_valor_medido   = $_POST['act_valor_medido'];
    $act_estatus        = $_POST['act_estatus'];
    $act_observaciones  = $_POST['act_observaciones'];
    $act_fch_realizado  = date('Ymd',strtotime($_POST['act_fch_realizado']));
    $hoy                = date('Ymd');
    $act_adjunto        = $_FILES['file']['name'];
    $act_adjunto_valida = $_POST['act_adjunto_valida'];

    if($act_adjunto != ''){
      $act_adjunto =$hoy.'-'.$act_adjunto;
    } else {
      $act_adjunto ='';
    }

    $mtoInfo = $mtoPreventivoClass->updateActividades($act_id,$act_valor_medido,$act_estatus,$act_observaciones, $act_fch_realizado, $act_adjunto, $Id_Usuario );

    if($mtoInfo){

      
      if($act_adjunto_valida==0){

        if($act_adjunto != ''){
          $destinationDirectory = $_SERVER['DOCUMENT_ROOT'].'/SIGA/Archivos/Archivos-Actividades/Mantenimiento-Preventivo/';
          $finalLocation = $destinationDirectory.$act_adjunto;
  
          if(move_uploaded_file($_FILES['file']['tmp_name'], $finalLocation)) {
              echo json_encode(true);
            } else {
              echo json_encode(false);
          }
        
        } else {
          echo json_encode(false);
        } 
      }     

    }else{
      echo json_encode($act_adjunto);
    }   


  } else if($accion == 3){

    $act_id = $_POST['act_id'];
    $campo  = $_POST['campo'];
    $valor  = $_POST['valor'];
    
    $mtoInfo = $mtoPreventivoClass->sigaActualizarActividades($act_id,$campo,$valor);
    echo json_encode($mtoInfo);

  } else if ($accion == 4){

    $id = $_POST['id'];
    $mtoInfo = $mtoPreventivoClass->sigaActividadesEliminarImagen($id);

    echo json_encode('rutinas Ajax:4'.$mtoInfo);
  
  } else if ($accion == 5){
    $Id_Actividad = $_POST['Id_Actividad'];

    $mtoInfo = $mtoPreventivoClass->getActivoActividad($Id_Actividad);

    echo json_encode($mtoInfo);
  } else if ($accion == 6){

    $texto_fecha_programada   = $_POST['texto_fecha_programada'];
    $texto_id_actividad       = $_POST['texto_id_actividad'];
    $texto_fecha_reprogramada = $_POST['texto_fecha_reprogramada'];
    $Id_Usuario               = $_POST['Id_Usuario'];
    
    $mtoInfo = $mtoPreventivoClass->reprogramarActividad($texto_fecha_programada,$texto_id_actividad,$texto_fecha_reprogramada,$Id_Usuario);

    echo json_encode($mtoInfo);
  } else if ($accion == 7){

    $texto_fecha_programada   = $_POST['texto_fecha_programada'];
    $texto_id_actividad       = $_POST['texto_id_actividad'];    
    $Id_Usuario               = $_POST['Id_Usuario'];
    
    $mtoInfo = $mtoPreventivoClass->cancelarActividad($texto_fecha_programada,$texto_id_actividad,$Id_Usuario);

    echo json_encode($mtoInfo);
  }


}else{
  echo json_encode('rutinas Ajax');
  }