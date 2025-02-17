<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class menu extends conectar {

  function getSigaMenu(){
    
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();

    $sqlSigaCatMenu ="SELECT siga_menu_id, siga_menu_desc FROM siga_usuarios_menu WHERE siga_menu_estatus in (1,2) ORDER BY siga_menu_desc ASC";
    
    $sqlSigaCatMenu       = $pdoConexionGestafSiga->query($sqlSigaCatMenu);
    $SigaCatMenu = $sqlSigaCatMenu->fetchAll(PDO::FETCH_NUM);

    return $SigaCatMenu;
  }

}



