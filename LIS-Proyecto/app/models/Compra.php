<?php
require_once 'config/database.php';

class Compra {
    public static function registrarCompra($cliente_id, $oferta_id, $codigo) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "INSERT INTO compras (cliente_id, oferta_id, codigo) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$cliente_id, $oferta_id, $codigo]);
    }
    

    public static function obtenerPorCliente($cliente_id) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "SELECT * FROM compras WHERE cliente_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$cliente_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerCupon($codigo) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "SELECT * FROM compras WHERE codigo = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$codigo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
    