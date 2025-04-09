<?php
include_once 'Controllers/EditorialesController.php';
include_once 'Controllers/AutoresController.php';
include_once 'Controllers/IndexController.php';

const PATH = '/LIS/Guia_07_08_09';
$url = $_SERVER['REQUEST_URI'];
$slices = explode('/', $url);

$controller = empty($slices[3]) ? "IndexController" : $slices[3] . "Controller";
$method = empty($slices[4]) ? "index" : $slices[4];
$params = empty($slices[5]) ? [] : array_slice($slices, 5);

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