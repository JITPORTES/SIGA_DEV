<?php
    $rutaServidorChsGestaf = "chsgestaf";
    $DBChsGestaf           = "siga";
    $usuarioChsGestaf      = "siga";
    $contraChsGestaf       = "Nacho2018";

    try {
        $ConexionGestafSiga = new PDO("sqlsrv:server=$rutaServidorChsGestaf;
        						    Database=$DBChsGestaf", 
        						    $usuarioChsGestaf,
        						    $contraChsGestaf);
        $ConexionGestafSiga->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (Exception $e) {
        echo "Ocurrió un error con la base de datos: " . $e->getMessage();
    }
