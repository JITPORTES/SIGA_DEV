<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');

	// Por la administración del sitio, se debe incluir la primera carpeta y considerarla como raiz del sitio
	$urlSitio = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http' . "://" . $_SERVER['SERVER_NAME'] . ($_SERVER["SERVER_PORT"] != null ? ":" . $_SERVER["SERVER_PORT"] : "") . "/" . explode('/', $_SERVER['REQUEST_URI'])[1];
?>