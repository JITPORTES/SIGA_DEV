<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class inventario extends conectar{

  function ok(){
    return 'ok';
  }

  function getCentrosDecostos(){

    $pdo = conectar::ConexionChsTcaSol();

      $sql = "SELECT Depto as Depto, centrocto as CC, Descr as Descripcion FROM acrcct WHERE cia='CHS'";
      $sqlPrepare = $pdo->prepare($sql);
      $sqlPrepare->execute();
      $sqlResult = $sqlPrepare->fetchall(PDO::FETCH_NAMED);

    $pdo=null;
    
    return $sqlResult;
  }


  
}