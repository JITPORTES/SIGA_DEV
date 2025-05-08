<?php
if (!isset($_GET['file'])) {
    die('Archivo no especificado.');
}

if (!isset($_GET['url'])) {
    die('Ruta no especificada.');
}
$url=$_GET['url'];
$filename = basename($_GET['file']);
$path = __DIR__ . $url . $filename;

if (!file_exists($path)) {
    die('Archivo no encontrado.');
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($path));
flush();
readfile($path);
exit;