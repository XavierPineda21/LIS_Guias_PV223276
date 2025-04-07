<?php
class AdminController{
    public function aprobarOferta() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $oferta_id = $_POST['oferta_id'];
            Oferta::cambiarEstado($oferta_id, "Oferta aprobada");
            echo "Oferta aprobada.";
        }
    }
    
    public function rechazarOferta() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $oferta_id = $_POST['oferta_id'];
            $motivo = $_POST['motivo'];
            Oferta::cambiarEstado($oferta_id, "Oferta rechazada", $motivo);
            echo "Oferta rechazada.";
        }
    }
}

