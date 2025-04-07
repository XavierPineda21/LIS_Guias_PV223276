<form method="post" action="index.php?action=procesar_compra">
    <input type="hidden" name="oferta_id" value="<?php echo $oferta['id']; ?>">
    <label>Tarjeta de Crédito:</label>
    <input type="text" name="tarjeta" placeholder="1234 5678 9012 3456" required>
    <label>CVV:</label>
    <input type="text" name="cvv" placeholder="123" required>
    <label>Fecha de Expiración:</label>
    <input type="month" name="expiracion" required>
    <button type="submit">Pagar</button>
</form>
