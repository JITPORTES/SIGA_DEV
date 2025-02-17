<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class reporteAlta extends conectar {

  function accesoriosConsumibles($id_activo,$tipo){
    $pdo = conectar::ConexionGestafSiga();

    $sql = "SELECT SKU, Descripcion, Marca, Modelo
            FROM   siga_activo_accesorio_consumible
            WHERE  Id_Activo= $id_activo
            AND tipo = $tipo";
    $sqlResultado = $pdo->prepare($sql);
    $sqlResultado->execute();
    $sqlInfo = $sqlResultado->fetchAll(PDO::FETCH_NAMED);
    
    $pdo = null;
    return $sqlInfo;
  }

  function prueba(){
    return 'Prueba';
  }

}
