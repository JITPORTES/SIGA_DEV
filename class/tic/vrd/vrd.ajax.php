<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/class/utilities.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/tic/vrd/vrd.class.php");

if(	isset($_POST['accion']) && 
		$_POST['accion'] !==''){

  $accion = trim($_POST['accion']);

    if($accion == 1){
    
      $siga_numero_empleado = trim($_POST['siga_numero_empleado']);

      $utilitiesClass = new utilities();
      $utilitiesClass->envioWhatappSiga($siga_numero_empleado);         
      echo json_encode($siga_numero_empleado);
    }

    else if($accion == 2){

      $Id_Usuario = trim($_POST['usuariosesion']);
      $utilitiesClass = new utilities();
      $utilitiesClass->envioWhatappSiga($Id_Usuario);         
    
      echo json_encode("Se envió nuevo vale de resguardo:OK:");
    } 
    
    else if($accion == 3){
      
      session_start();
      session_unset();

      $utilitiesClass = new utilities();
      $siga_txt_dato     = trim($_POST['siga_txt_dato']);
      $siga_txt_Password = trim($_POST['siga_txt_Password']);
      
      $siga_dato = $utilitiesClass->desencriptar($siga_txt_dato);      
      $respuesta = $utilitiesClass->validarVed($siga_dato,$siga_txt_Password);         
      
      if($respuesta==1){
        $_SESSION['siga_VED'] = $siga_txt_dato;
      }
      echo json_encode($respuesta);

    } 
    else if($accion==4){
      
      
      echo json_encode($accion);

    }



}