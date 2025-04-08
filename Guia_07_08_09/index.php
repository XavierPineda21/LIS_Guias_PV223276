<?php
include_once 'Controllers/EditorialesController.php';
include_once 'Controllers/AutoresController.php'; // AÑADE ESTA LÍNEA
include_once 'Controllers/IndexController.php';

const PATH = '/lis2025/Pratica7';
$url = $_SERVER['REQUEST_URI'];
$slices = explode('/', $url);

$controller = empty($slices[3]) ? "IndexController" : $slices[3] . "Controller";
$method = empty($slices[4]) ? "index" : $slices[4];
$params = empty($slices[5]) ? [] : array_slice($slices, 5);

// Verifica si la clase existe antes de instanciar
if (!class_exists($controller)) {
    die("Controlador no encontrado: $controller");
}

try {
    $cont = new $controller();
    $cont->$method($params);
} catch (Throwable $e) {
    die("Error: " . $e->getMessage());
}

error_reporting(E_ALL);
ini_set('display_errors', 1);