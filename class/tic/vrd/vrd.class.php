<?php

include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/class/utilities.class.php");

class vrd extends conectar {

    function getSigaVrd($id_usuario){

      return "Ok".$id_usuario;
    }

function sigaVrdAltaActivo($Id_Usuario){
$pdoSiga = conectar::ConexionGestafSiga();
$utilitiesClass = new utilities();
$num_empl = $utilitiesClass->desencriptar($Id_Usuario);

$sqlActivosVigentes = "SELECT AF_BC, Nombre_Activo, Marca,Modelo,NumSerie,siga_activo_valor_de_reposicion
                      FROM siga_activos
                      WHERE num_empleado=$num_empl
                      AND Id_Area=2
                      AND Id_Tipo_Vale_Resg=2
                      AND Estatus_Reg <> 3
                      AND Id_Activo NOT IN (SELECT Id_Activo FROM siga_baja_activo WHERE Usuario = (SELECT Id_Usuario FROM siga_usuarios WHERE No_Usuario=$num_empl AND Estatus_Reg in (1,2)))";

  $ActivosVigentes = $pdoSiga->prepare($sqlActivosVigentes);
  $ActivosVigentes->execute();
  $Resultado = $ActivosVigentes->fetchAll(PDO::FETCH_NAMED);

      $pdoSiga=null;
      return $Resultado;
    }

}
