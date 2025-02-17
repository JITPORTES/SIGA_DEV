<?php

abstract class conexionPoo{

	function conexion(){

			$servidor 	= "192.168.1.191";
	    $DB 				= "SIGA";
	    $usuario 		= "siga";
	    $contra 		= "Nacho2018";

	    try {
	        $pdoConexion = new PDO("sqlsrv:server=$servidor;
	        						Database=$DB", 
	        						$usuario,
	        						$contra);
	        $pdoConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    } catch (Exception $e) {
	        echo "Ocurrió un error con la base de datos: " . $e->getMessage();
	    }
	    return $pdoConexion;
	}

	function cerrar_conexion(){
		return $pdoConexion=null;
	}

}

?>