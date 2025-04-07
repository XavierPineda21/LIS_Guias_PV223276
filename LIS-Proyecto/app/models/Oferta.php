<?php
require_once 'config/database.php';

class Oferta {
    public static function obtenerOfertasActivas() {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "SELECT * FROM ofertas WHERE estado = 'Oferta aprobada' AND CURDATE() BETWEEN fecha_inicio AND fecha_fin";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    public static function obtenerPorId($id) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "SELECT * FROM ofertas WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function cambiarEstado($oferta_id, $estado, $motivo = null) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "UPDATE ofertas SET estado = ?, motivo_rechazo = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$estado, $motivo, $oferta_id]);
    }

    public static function verificarDisponibilidad($oferta_id) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "SELECT cantidad_limite, (SELECT COUNT(*) FROM compras WHERE oferta_id = ?) as vendidos FROM ofertas WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$oferta_id, $oferta_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result['cantidad_limite'] !== null && $result['vendidos'] >= $result['cantidad_limite']) {
            return false; // No hay más cupones disponibles
        }
        return true;
    }
    

}
?>
