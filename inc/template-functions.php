<?php
// Estrutura de rotas
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$routes = [
    '/pos-graduacao/direito/' => $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/uniminasead/page-area.php',
    '/pos-graduacao/educacao/' => $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/uniminasead/page-area.php',
    '/pos-graduacao/saude/' => $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/uniminasead/page-area.php',
    '/pos-graduacao/psicologia/' => $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/uniminasead/page-area.php',
    '/pos-graduacao/empresarial/' => $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/uniminasead/page-area.php',
    '/pos-graduacao/servico-social/' => $_SERVER['DOCUMENT_ROOT'] . '/wp-content/themes/uniminasead/page-area.php',
];

if (array_key_exists($url, $routes)) {
    include $routes[$url];
    exit;
}