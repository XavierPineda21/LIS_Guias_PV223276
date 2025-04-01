<?php
include_once 'Controllers/EditorialesController.php';
include_once 'Controllers/IndexController.php';


const PATH='/Guia_07_08_09';

$url = $_SERVER['REQUEST_URI'];
$slices=explode('/',$url);
$controller = empty($slices[2])?"IndexController":$slices[2]."Controller";
$method = empty($slices[3])?"index":$slices[3];
$params = empty($slices[4])?[]:array_slice($slices,4);

$cont = new $controller;
$cont ->$method($params);
