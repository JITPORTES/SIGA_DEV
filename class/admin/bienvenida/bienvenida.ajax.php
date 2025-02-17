<?php

include_once "bienvenida.class.php";

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {
  
  $accion = trim($_POST['accion']);

  if($accion == 1){
    
    $id_empleado = trim($_POST['id_empleado']);
    $numEmpleado = trim($_POST['numEmpleado']);

    $bienvenidaClass = new bienvenida();
    $bienvenidaRespuesta = $bienvenidaClass->activosBajoResguardoPorUsuario($id_empleado,$numEmpleado);

    echo json_encode($bienvenidaRespuesta);
    
  } else if ($accion == 2){
  
    $numEmpleado = trim($_POST['numEmpleado']);

    $bienvenidaClass = new bienvenida();
    $bienvenidaRespuesta = $bienvenidaClass->activosBajoResguardoPorUsuarioDetalle($numEmpleado);

    echo json_encode($bienvenidaRespuesta);
  
  } else if ($accion == 3){
  
    echo json_encode('accion2');
  }



  
//======================================================================================================================================
 }else{

  echo json_encode('Error, Contacte a sistemas');

}