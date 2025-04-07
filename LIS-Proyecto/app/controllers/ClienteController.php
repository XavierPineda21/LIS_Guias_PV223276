<?php
require_once 'app/models/Cliente.php';

class ClienteController {
    public function registro() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $dui = $_POST['dui'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $token = bin2hex(random_bytes(16));

            if (Cliente::registrar($nombre, $apellido, $telefono, $correo, $direccion, $dui, $password, $token)) {
                mail($correo, "Verificación de Cuenta", "Tu token de verificación es: $token");
                echo "Registro exitoso. Revisa tu correo para verificar tu cuenta.";
            } else {
                echo "Error en el registro.";
            }
        } else {
            require_once 'app/views/clientes/registro.php';
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo = $_POST['correo'];
            $password = $_POST['password'];

            $cliente = Cliente::obtenerPorCorreo($correo);
            if ($cliente && password_verify($password, $cliente['password'])) {
                session_start();
                $_SESSION['cliente_id'] = $cliente['id'];
                header("Location: index.php?action=mis_cupones");
            } else {
                echo "Credenciales incorrectas.";
            }
        } else {
            require_once 'app/views/clientes/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php");
    }

    public function verificar() {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            if (Cliente::verificarCuenta($token)) {
                echo "Cuenta verificada con éxito. Ahora puedes iniciar sesión.";
            } else {
                echo "Token inválido.";
            }
        }
    }

    public function recuperarPassword() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo = $_POST['correo'];
            $nuevoPassword = bin2hex(random_bytes(4)); 
            $passwordHash = password_hash($nuevoPassword, PASSWORD_BCRYPT);
    
            if (Cliente::actualizarPassword($correo, $passwordHash)) {
                mail($correo, "Recuperación de Contraseña", "Tu nueva contraseña es: $nuevoPassword");
                echo "Se ha enviado una nueva contraseña a tu correo.";
            } else {
                echo "Error al recuperar la contraseña.";
            }
        } else {
            require_once 'app/views/clientes/recuperar_password.php';
        }
    }
    
}
?>
