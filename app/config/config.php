<?php
$protocolo = !empty($_SERVER['HTTPS']) ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$UrlAtual = $protocolo . '://' . $host;
$url = $UrlAtual . "/Parnaioca";

define('BASEF', $url . '');
define('BASED', $url . '/app');
define('BASES', '/var/www/html' . "/Parnaioca");



// exemplo de consulta de based
// <script src="<?= BASED; ?>/assets/bundles/libscripts.bundle.js"></script>    
