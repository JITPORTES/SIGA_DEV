<?php

include_once "inventario.class.php";

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {
  
  $accion = trim($_POST['accion']);

  if($accion == 1){

    $incventarioClass = new inventario();

    echo json_encode('accion1');
    
  } else if ($accion == 2){
  
    echo json_encode('accion2');
  }



  
//======================================================================================================================================
 }else{

  echo json_encode('Error, Contacte a sistemas');

}