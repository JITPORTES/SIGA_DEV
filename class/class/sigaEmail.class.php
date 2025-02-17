<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class sigaEmail extends conectar{

function getSigaUsuarios($Id_solicitud){

  return $Id_solicitud;
}

function getSigaPerfilPermisos($Id_solicitud){ 

  return $Id_solicitud;
  }  

}
