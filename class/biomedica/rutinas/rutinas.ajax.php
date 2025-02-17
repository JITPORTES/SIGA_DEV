<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/biomedica/rutinas/rutinas.class.php");

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {


$accion = trim($_POST['accion']);
$rutinasClass = new rutinas();

if($accion==1){

$rutinasClass = new rutinas();

  $siga_rutinas_descripcion = trim($_POST['siga_rutinas_descripcion']);
  $Id_Usuario               = $_POST['Id_Usuario'];
  $array                    = json_decode($_POST['array'],true);

  $rutinasTitulo    = $rutinasClass->sigaRutinasTitulo($siga_rutinas_descripcion,$Id_Usuario);

  $arraDecode = array();

  foreach ($array as $value) {
    if($value['key']==''){$key1='';}else{$key1=trim(str_replace(',','',$value['key']));}
    if($value['key2']==''){$key2='';}else{$key2=trim(str_replace(',','',$value['key2']));}
    if($value['key3']==''){$key3=0;}else{$key3=$value['key3'];}
    if($value['key4']==''){$key4=0;}else{$key4=$value['key4'];}
    $arraDecode[]=$rutinasClass->sigaRutinasActividad($rutinasTitulo,$key1,$key2,$key3,$key4,$Id_Usuario);
  }  
    echo json_encode('ok');
    
  } else if($accion == 2){
   
    echo json_encode($accion);

  } else if($accion == 3){
    $rutinasClass = new rutinas();
    $siga_rutina_titulo_id  = $_POST['siga_rutina_titulo_id'];
    $Id_Usuario             = $_POST['Id_Usuario'];
    $rutinaBaja = $rutinasClass->sigaRutinasBaja($siga_rutina_titulo_id,$Id_Usuario);
  
    echo json_encode($rutinaBaja);

  } else if ($accion==4){
    
    $siga_rutinas_id = $_POST['siga_rutinas_id'];
    $rutinasInfo = $rutinasClass->sigaRutinasInfo($siga_rutinas_id);

    echo json_encode($rutinasInfo);
  
  } else if($accion==5){

      $siga_ids_activos = $_POST['siga_ids_activos'];
      $rutinasInfo = $rutinasClass->sigaRutinasActivosSolicitados($siga_ids_activos);

    echo json_encode($rutinasInfo);

  } else if ($accion==6){
    
    $array            = $_POST['array'];
    $siga_cmb_rutinas = $_POST['siga_cmb_rutinas'];
    $siga_cmb_rutinasD= $_POST['siga_cmb_rutinasD'];
    $Id_Usuario       = $_POST['Id_Usuario'];

    foreach($array as $item){

      switch ($item['Frecuencia']) {
        case 2:
          $rutinasInfo = $rutinasClass->sigaInsertarRutina($item['id_activo'],2, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);          
          break;
        case 3:
          $rutinasInfo = $rutinasClass->sigaInsertarRutina($item['id_activo'],3, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);          
          break;
        case 4:
          $rutinasInfo = $rutinasClass->sigaInsertarRutina($item['id_activo'],4, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);          
          break;
        case 5:
          $rutinasInfo = $rutinasClass->sigaInsertarRutina($item['id_activo'],5, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);          
          break;
        case 6:
          $rutinasInfo = $rutinasClass->sigaInsertarRutina($item['id_activo'],6, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);          
          break;
        case 7:          
          $rutinasInfo = $rutinasClass->sigaInsertarRutina($item['id_activo'],7, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);          
          break;
      }
      
  }
    echo json_encode($rutinasInfo);
  
  } else if($accion==7){

      $id = $_POST['id'];
      $rutinasInfo = $rutinasClass->actividadPorId($id);
      
      echo json_encode($rutinasInfo);
  } else if($accion==8){

    $id                         = $_POST['siga_id_actividad_editar'];
    $siga_rutina_act_desc       = $_POST['siga_rutina_act_desc'];
    $siga_rutina_act_valor_ref  = $_POST['siga_rutina_act_valor_ref'] ;
    $siga_rutina_act_valor_medio = $_POST['siga_rutina_act_valor_medio'];
    $siga_rutina_act_adjunto     = $_POST['siga_rutina_act_adjunto'];
    $rutinasInfo = $rutinasClass->actividadUpdatePorId($id, $siga_rutina_act_desc, $siga_rutina_act_valor_ref, $siga_rutina_act_valor_medio, $siga_rutina_act_adjunto);

    echo json_encode($rutinasInfo);
    
  } else if($accion == 9){
      $rutinasInfo = $rutinasClass->sigaRutinas();
      $rutinasInfoArray = array('<option value="-1">Seleccionar Rutina</option>');

      foreach($rutinasInfo as $item){
        $rutinasInfoArray[]='<option value='.$item["siga_cat_rutinas_id"].'>'.$item["siga_cat_rutinas_titulo"].'</option>';
      }
    echo json_encode($rutinasInfoArray);

  }  else if ($accion==10) {
        
    $select_activos         = $_POST['select_activos'];
    $siga_rutinasGet        = $_POST['siga_rutinasGet'];    
    $siga_fecha_programada  = $_POST['siga_fecha_programada'];
    $siga_frecuencia        = $_POST['siga_frecuencia'];
    $siga_realiza           = $_POST['siga_realiza'];
    $vincular_a_mesa_ayuda  = $_POST['vincular_a_mesa_ayuda'];
    $txt_comentarios        = $_POST['txt_comentarios'];
    $siga_rutinasGetNombre  = $_POST['siga_rutinasGetNombre'];
    $arrayAccesorios        = $_POST['arrayAccesorios'];
    $Id_Usuario             = $_POST['Id_Usuario'];
    
      switch ($siga_frecuencia) {
        case 2:
          $rutinasInfo = $rutinasClass->sigaInsertarRutinaIndividual($select_activos,2, $siga_fecha_programada,$siga_rutinasGet, $siga_rutinasGetNombre, $Id_Usuario,$txt_comentarios, $arrayAccesorios);
          break;
        case 3:
          //$rutinasInfo = $rutinasClass->sigaInsertarRutinaIndividual($select_activos,2, $siga_fecha_programada,$siga_rutinasGet, $siga_rutinasGetNombre, $Id_Usuario);
          break;
        case 4:
          //$rutinasInfo = $rutinasClass->sigaInsertarRutinaIndividual($item['id_activo'],4, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);
          break;
        case 5:
          //$rutinasInfo = $rutinasClass->sigaInsertarRutinaIndividual($item['id_activo'],5, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);
          break;
        case 6:
          //$rutinasInfo = $rutinasClass->sigaInsertarRutinaIndividual($item['id_activo'],6, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);
          break;
        case 7:
          //$rutinasInfo = $rutinasClass->sigaInsertarRutinaIndividual($item['id_activo'],7, $item['fecha'],$siga_cmb_rutinas, $siga_cmb_rutinasD, $Id_Usuario);
          break;
      }
      echo json_encode('ajax:'.$rutinasInfo);
  }

} else {
echo json_encode('error rutina Ajax');
}
