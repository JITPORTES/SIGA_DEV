<?php
/*
    $rutaServidor = "chsgestaf";
    $nombreBaseDeDatos = "SIGAPRUEBAS";
    $usuario = "sa";
    $contraseña = "Nacho2018";
*/
    $rutaServidor = "chsgestaf";
    $nombreBaseDeDatos = "SIGA";
    $usuario = "siga";
    $contraseña = "Nacho2018";

    try {
        $pdoConexion = new PDO("sqlsrv:server=$rutaServidor;
        						Database=$nombreBaseDeDatos", 
        						$usuario,
        						$contraseña);
        $pdoConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
        echo "Ocurrió un error con la base de datos: " . $e->getMessage();
        }


    $rutaServidorAssist = "chstcasol";
    $nombreBaseDeDatosAssist = "TCADBCHS";
    $usuarioAssist = "sa";
    $contraAssist = "Tca$2010";

    try {
        $pdoConexionAssit = new PDO("sqlsrv:server=$rutaServidorAssist;
                                Database=$nombreBaseDeDatosAssist", 
                                $usuarioAssist,
                                $contraAssist);
        $pdoConexionAssit->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (Exception $e) {
        echo "Ocurrió un error con la base de datos: " . $e->getMessage();
    }

?>