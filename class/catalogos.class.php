<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class catalogos extends conectar {

  function getSigaMenu(){
    
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();

    $sqlSigaCatMenu ="SELECT siga_menu_id, siga_menu_desc FROM siga_usuarios_menu WHERE siga_menu_estatus in (1,2) ORDER BY siga_menu_desc ASC";
    
    $sqlSigaCatMenu = $pdoConexionGestafSiga->query($sqlSigaCatMenu);
    $SigaCatMenu    = $sqlSigaCatMenu->fetchAll(PDO::FETCH_NUM);

    return $SigaCatMenu;
  }

function getSigaPermisos(){
  $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
  $sqlSigaCat ="SELECT siga_id_permiso,siga_permiso_desc FROM siga_usuarios_permisos WHERE siga_permiso_estatus IN (1,2) ORDER BY siga_menu_id";
    
  $SigaCat = $pdoConexionGestafSiga->query($sqlSigaCat);
  $SigaCat = $SigaCat->fetchAll(PDO::FETCH_NAMED);

  return $SigaCat;
}

function getSigaEmail($Id_Usuario){
  $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
  
  $sqlGetSigaEmail="SELECT Nombre_Usuario, Correo FROM siga_usuarios WHERE Id_Usuario=$Id_Usuario";
  $GetSigaEmail = $pdoConexionGestafSiga->query($sqlGetSigaEmail);
  $SigaEmail    = $GetSigaEmail->fetch(PDO::FETCH_NUM);

return $SigaEmail;
}

function getSigaCatAgnios(){
  $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
  $sqlgetSigaCatAgnios ="SELECT   Id_Anios,Desc_Anios
                        FROM      siga_cat_anios
                        WHERE     Estatus_Reg in (1,2)
                        ORDER BY  Desc_Anios DESC";
  
  $getSigaCatAgnios  = $pdoConexionGestafSiga->query($sqlgetSigaCatAgnios);
  $getSigaCatAgnios = $getSigaCatAgnios->fetchAll(PDO::FETCH_NAMED);
  $pdoConexionGestafSiga=null;

  return $getSigaCatAgnios;
  }

  function getSigaUsuariosVigentes(){
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
    
    $sqlgetSigaUsuariosVigentes = "SELECT Id_Usuario,No_Usuario,Nombre_Usuario
                                  FROM    siga_usuarios
                                  WHERE   Estatus_Reg in (1,2)
                                  -- AND No_Usuario <> ''
                                  -- AND Correo <> ''
                                  -- AND Correo <> '0'
                                  -- AND Correo <> '@hospitalsatelite.com'
                                  -- AND Id_Usuario NOT IN (3847,143)
                                  AND Password not like 'baja%' 
                                  ORDER BY Nombre_Usuario ASC";                                  
    
    $getSigaUsuariosVigentes = $pdoConexionGestafSiga->prepare($sqlgetSigaUsuariosVigentes);
    $getSigaUsuariosVigentes->execute();
    $getSigaUsuariosVigentesInfo = $getSigaUsuariosVigentes->fetchAll(PDO::FETCH_NAMED);    
  
  return $getSigaUsuariosVigentesInfo;

  }


  function getSigaUsuariosVigentesConCorreo(){
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
    
    $sqlgetSigaUsuariosVigentes = "SELECT Id_Usuario,No_Usuario,Nombre_Usuario,Correo
                                  FROM    siga_usuarios
                                  WHERE   Estatus_Reg in (1,2)
                                  AND No_Usuario <> ''
                                  AND Correo <> ''
                                  AND Correo <> '0'
                                  AND Correo <> '@hospitalsatelite.com'
                                  AND Id_Usuario NOT IN (3847,143)
                                  AND Password not like 'baja%' 
                                  ORDER BY Nombre_Usuario ASC";                                  
    
    $getSigaUsuariosVigentes = $pdoConexionGestafSiga->prepare($sqlgetSigaUsuariosVigentes);
    $getSigaUsuariosVigentes->execute();
    $getSigaUsuariosVigentesInfo = $getSigaUsuariosVigentes->fetchAll(PDO::FETCH_NAMED);    
  
  return $getSigaUsuariosVigentesInfo;
  }


  function getFrecuencia(){
    
    $pdoConexionGestafSiga = conectar::ConexionGestafSiga();

    $sql = "SELECT  Id_Frecuencia,      
                    Desc_Frecuencia,      
                    Periodo,
                    Total
            FROM  siga_cat_frecuencia
            WHERE Estatus_Reg in (1,2)";                                  
    
    $getSql = $pdoConexionGestafSiga->prepare($sql);
    $getSql->execute();
    $getSqlInfo = $getSql->fetchAll(PDO::FETCH_NAMED);    
  
  return $getSqlInfo;

  }

}