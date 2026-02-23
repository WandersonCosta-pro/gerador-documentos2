<?php

require_once __DIR__ . '/../app/Controllers/DocumentoController.php';

$controller = new DocumentoController();

$url = $_GET['url'] ?? 'home';

switch ($url) {

    case 'cpf':
        $controller->cpf();
        break;

    case 'cnpj':
        $controller->cnpj();
        break;

    default:
        $controller->home();
}
