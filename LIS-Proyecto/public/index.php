<?php
require_once 'app/controllers/OfertaController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = new OfertaController();
if (method_exists($controller, $action)) {
    if (isset($_GET['id'])) {
        $controller->$action($_GET['id']);
    } else {
        $controller->$action();
    }
} else {
    echo "Acción no válida.";
}
?>
