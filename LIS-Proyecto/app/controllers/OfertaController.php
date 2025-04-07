<?php
require_once 'app/models/Oferta.php';

class OfertaController {
    public function index() {
        $ofertas = Oferta::obtenerOfertasActivas();
        require_once 'app/views/ofertas/index.php';
    }

    public function detalle($id) {
        $oferta = Oferta::obtenerPorId($id);
        require_once 'app/views/ofertas/detalle.php';
    }

    public function mostrarOfertas() {
        $ofertas = Oferta::obtenerOfertasActivas();
        require_once 'app/views/ofertas_publicas.php';
    }
    
}
?>
