<?php

include_once "ticketsGestor.class.php";

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {
  
  $accion = trim($_POST['accion']);

  if($accion == 1){

    $ticketsGestorClass = new ticketsGestor();

    echo json_encode('accion1');
    
  } else if ($accion == 2){
  
    echo json_encode('accion2');
  }



 }else{

  echo json_encode('Error, Contacte a sistemas');

}