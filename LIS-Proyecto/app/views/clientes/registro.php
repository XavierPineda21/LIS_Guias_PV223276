<!DOCTYPE html>
<html>
<head>
    <title>Registro de Cliente</title>
</head>
<body>
    <h2>Registro de Cliente</h2>
    <form method="post" action="index.php?action=registro">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellido" placeholder="Apellido" required>
        <input type="tel" name="telefono" placeholder="Teléfono" required>
        <input type="email" name="correo" placeholder="Correo Electrónico" required>
        <input type="text" name="direccion" placeholder="Dirección" required>
        <input type="text" name="dui" placeholder="DUI" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
