<?php

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {

  include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.php");

  $accion = trim($_POST['accion']);

  if($accion == 1){

    $sqlgetSigaCatAgnios ="SELECT Id_Anios,Desc_Anios
                          FROM    siga_cat_anios
                          WHERE   id_area = $valor OR id_area = 5
                          AND     Estatus_Reg in (1,2)
                          ORDER BY Desc_Anios DESC";
    
    $getSigaCatAgnios  = $pdoConexionGestafSiga->query($sqlgetSigaCatAgnios);
    $getSigaCatAgnios = $getSigaCatAgnios->fetchAll(PDO::FETCH_COLUMN);
    $pdoConexionGestafSiga=null;

    echo json_encode($getSigaCatAgnios);
    
  } else if ($accion == 2){
    $id_activo    = $_POST['id_activo'];
    $id_selector  = trim($_POST['id_selector']);
    $arraySigaSelectCondicionDeEquipo = array("<option value='0'>Seleccionar</option>");

    $sqlSigaSelectCondicionDeEquipo = "SELECT siga_condicion_de_recepcion_id,siga_condicion_de_recepcion_descripcion FROM siga_cat_condicion_de_recepcion WHERE siga_condicion_de_recepcion_estatus IN (1,2)";
    $SigaSelectCondicionDeEquipo  = $ConexionGestafSiga->query($sqlSigaSelectCondicionDeEquipo);
    $SigaSelectCondicionDeEquipoR = $SigaSelectCondicionDeEquipo->fetchAll(PDO::FETCH_NAMED);

    foreach($SigaSelectCondicionDeEquipoR as $item){
      if(strcmp($item['siga_condicion_de_recepcion_id'], $id_selector) !== 0){
        $selected='';
      }else{
        $selected='Selected';
      }
      $arraySigaSelectCondicionDeEquipo[]="<option value='".$item['siga_condicion_de_recepcion_id']."' $selected>".$item['siga_condicion_de_recepcion_descripcion']."</option>";
    }

    $ConexionGestafSiga=null;
    echo json_encode($arraySigaSelectCondicionDeEquipo);
  }



 }else{

}

