<?php
require_once 'config/database.php';

class Cliente {
    public static function registrar($nombre, $apellido, $telefono, $correo, $direccion, $dui, $password, $token) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "INSERT INTO clientes (nombre, apellido, telefono, correo, direccion, dui, password, token_verificacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$nombre, $apellido, $telefono, $correo, $direccion, $dui, $password, $token]);
    }

    public static function obtenerPorCorreo($correo) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "SELECT * FROM clientes WHERE correo = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$correo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function verificarCuenta($token) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "UPDATE clientes SET estado = 'verificado' WHERE token_verificacion = ?";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$token]);
    }

    public static function actualizarPassword($correo, $nuevoPassword) {
        $db = new Database();
        $conn = $db->getConnection();
        $query = "UPDATE clientes SET password = ? WHERE correo = ?";
        $stmt = $conn->prepare($query);
        return $stmt->execute([$nuevoPassword, $correo]);
    }
    
    
}
?>
