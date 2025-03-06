<?php 
 error_reporting(0);
 require_once("class/SIGA.php"); 
 $Id_Activo = $_POST["Id_Activo"];
 $Id_Area = $_POST["Id_Area"];
 $Id_Ubic_Prim= $_POST["Id_Ubic_Prim"];
 $Id_Ubic_Sec= $_POST["Id_Ubic_Sec"];
 $Id_Estatus_Activo= $_POST["Id_Estatus_Activo"];//Mauricio/Ignacio
 $Ubic_Especifica=$_POST["Ubic_Especifica"];
 $Centro_Costos= $_POST["Centro_Costos"];
 $Id_Usuario_Sesion = $_POST["Id_Usuario_Sesion"];
 $Id_Usuario_Responsable= $_POST["Id_Usuario_Responsable"];
 $Nom_Usuario_Reponsable = $_POST["Nom_Usuario_Reponsable"];
 $Responsable_Procedencia = $_POST["Responsable_Procedencia"];
 $Id_Activo_Reubicacion=$_POST["Id_Activo_Reubicacion"];
 $obj = new SIGA(); 
 $obj->actualizaReubicacion($Id_Activo,$Id_Area,$Id_Ubic_Prim,$Id_Ubic_Sec,$Id_Estatus_Activo,$Ubic_Especifica,$Centro_Costos,$Id_Usuario_Sesion, $Id_Usuario_Responsable, $Nom_Usuario_Reponsable, $Responsable_Procedencia, $Id_Activo_Reubicacion);//Mauricio/Ignacio
 
 echo "OK";
?>
