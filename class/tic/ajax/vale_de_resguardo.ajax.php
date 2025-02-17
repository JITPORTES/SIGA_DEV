<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/class/utilities.class.php");



if(	isset($_POST['accion']) && 
		$_POST['accion'] !==''){

    $accion = trim($_POST['accion']);

      if($accion == 1){
        $siga_numero_empleado = trim($_POST['siga_numero_empleado']);

        $utilitiesClass = new utilities();
        $utilitiesClass->envioWhatappSiga($siga_numero_empleado);         
        echo json_encode($siga_numero_empleado);
      }




    }