<?php

if(isset($_POST['accion']) && 
$_POST['accion'] !=='') {

  include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.php");

  $accion = trim($_POST['accion']);

  if($accion == 1){
    
    $Id_Usuario = trim($_POST['Id_Usuario']);
    $siga_permiso_descripcion = trim($_POST['siga_permiso_descripcion']);
    $siga_menu                = trim($_POST['siga_menu']);

    $sqLInsertPermiso ="INSERT INTO siga_usuarios_permisos(siga_menu_id,siga_permiso_desc,siga_permiso_usuario_insert,siga_permiso_fch_insert,siga_permiso_estatus) VALUES (:siga_menu,:siga_permiso_descripcion,:Id_Usuario,getdate(),1)";
    $InsertPermiso = $ConexionGestafSiga->prepare($sqLInsertPermiso);
    $InsertPermiso->bindParam(":siga_menu",	                $siga_menu, 	PDO::PARAM_INT);
    $InsertPermiso->bindParam(":siga_permiso_descripcion",  $siga_permiso_descripcion, 	PDO::PARAM_STR);
    $InsertPermiso->bindParam(":Id_Usuario",	              $Id_Usuario, 	PDO::PARAM_INT);
    
    try {
      $ConexionGestafSiga->beginTransaction();
        $InsertPermiso->execute();
      $ConexionGestafSiga->commit();
        $resultado = 1;
    } catch (PDOException $e) {
      $cxPdoGestaf->rollBack();
        $error='SIC::Error: Alta Area:: '.$e->getMessage();
          //$util->fnlog($error);
      $resultado = 2;
      }

    $ConexionGestafSiga=null;

    echo json_encode($resultado);
    
  } else if ($accion == 2){

  }

  
 }else{
  echo json_encode('Error');
}

