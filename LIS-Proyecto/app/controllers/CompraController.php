<?php
require_once 'app/models/Compra.php';
require('fpdf/fpdf.php');

class CompraController {
    public function comprar() {
        session_start();
        if (!isset($_SESSION['cliente_id'])) {
            echo "Debes iniciar sesión.";
            return;
        }

        $cliente_id = $_SESSION['cliente_id'];
        $oferta_id = $_GET['oferta_id'];

        if (Compra::registrarCompra($cliente_id, $oferta_id)) {
            echo "Compra realizada con éxito.";
        } else {
            echo "Error en la compra.";
        }
    }

    

    public function misCupones() {
        session_start();
        if (!isset($_SESSION['cliente_id'])) {
            echo "Debes iniciar sesión.";
            return;
        }

        $cliente_id = $_SESSION['cliente_id'];
        $cupones = Compra::obtenerPorCliente($cliente_id);
        require_once 'app/views/clientes/mis_cupones.php';
    }

    public function generarPDF() {
    if (isset($_GET['codigo'])) {
        $codigo = $_GET['codigo'];
        $cupon = Compra::obtenerCupon($codigo);

        if ($cupon) {
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->Cell(40, 10, "Cupon de Descuento");
            $pdf->Ln();
            $pdf->Cell(40, 10, "Codigo: " . $cupon['codigo']);
            $pdf->Output();
        } else {
            echo "Cupon no encontrado.";
        }
    }
}

    public function procesarCompra() {
        session_start();
        if (!isset($_SESSION['cliente_id'])) {
            echo "Debes iniciar sesión para comprar.";
            return;
        }

        $cliente_id = $_SESSION['cliente_id'];
        $oferta_id = $_POST['oferta_id'];
        $codigo_cupon = strtoupper(substr(md5(uniqid()), 0, 7));

        if (Compra::registrarCompra($cliente_id, $oferta_id, $codigo_cupon)) {
            echo "Compra exitosa. Revisa tu correo con el código de tu cupón.";
        } else {
            echo "Error en la compra.";
        }
    }
}
?>
