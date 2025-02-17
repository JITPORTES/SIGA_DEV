<?php

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {

  include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.php");

  $accion = trim($_POST['accion']);

  if($accion == 1){
    
    $Id_Usuario = trim($_POST['Id_Usuario']);
    $siga_menu_descripcion = ucfirst(mb_strtolower(trim($_POST['siga_menu_descripcion'])));

    $sqLInsertMenu ="INSERT INTO siga_usuarios_menu(siga_menu_desc,siga_menu_usuario_insert,siga_menu_fch_insert,siga_menu_estatus) VALUES ('$siga_menu_descripcion',$Id_Usuario,getdate(),1)";
    
    $ConexionGestafSiga->query($sqLInsertMenu);
    $respuesta = 1;
    $ConexionGestafSiga=null;

    echo json_encode($respuesta);
    
  } else if ($accion == 2){

  }

  
 }else{
  echo json_encode('Error');
}

