<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/siga/class/connect/conectar.class.php");
class sigaCatalogos extends conectar{

function getSigaCat(){

$sqlgetUsuariosPermisos ="SELECT Id_Usuario, No_Usuario, Nombre_Usuario  
                          FROM siga_usuarios
                          WHERE Estatus_Reg <> 3 
                          AND Id_Usuario NOT IN (2)
                          AND Correo <> '0'
                          AND Correo <> ''
                          AND correo != '@hospitalsatelite.com'
                          ORDER BY Nombre_Usuario ASC
                          ";

  return $sqlgetUsuariosPermisos;
}

function getSigaCatAgnios($valor){
  $pdoConexionGestafSiga = conectar::ConexionGestafSiga();
  $sqlgetSigaCatAgnios ="SELECT Id_Anios,Desc_Anios
                        FROM siga_cat_anios
                        WHERE id_area = $valor OR id_area = 5
                        AND Estatus_Reg in (1,2)
                        ORDER BY Desc_Anios DESC";
  
  $getSigaCatAgnios  = $pdoConexionGestafSiga->query($sqlgetSigaCatAgnios);
  $getSigaCatAgnios = $getSigaCatAgnios->fetchAll(PDO::FETCH_COLUMN);
  $pdoConexionGestafSiga=null;

  return $getSigaCatAgnios;
  }



}
