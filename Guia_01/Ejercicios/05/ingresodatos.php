<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Formulario de ingreso de datos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/validar.js"></script>
</head>
<body>
<header class="bg-primary text-white text-center py-3">
<h1>Ingreso de datos</h1>
</header>
<section class="container my-5">
<article class="card shadow">
<div class="card-body">
<h2 class="card-title text-center mb-4">Formulario</h2>
<form action="procesar.php" method="POST" >
<div class="mb-3">
<label for="client" class="form-label">Cliente:</label>
<input type="text" id="client" name="client" class="form-control" placeholder="Ingrese el nombre del cliente" required>
</div>
<div class="mb-3">
<label for="product" class="form-label">Producto:</label>
<input type="text" id="product" name="product" class="form-control" placeholder="Ingrese el nombre del producto" required>
</div>
<div class="mb-3">
<label for="price" class="form-label">Precio:</label>
<input type="number" id="price" name="price" class="form-control" placeholder="Ingrese el precio" required>
</div>
<div class="mb-3">
<label for="quantity" class="form-label">Cantidad:</label>
<input type="number" id="quantity" name="quantity" class="form-control" placeholder="Ingrese la cantidad" required>
</div>
<div class="text-center">
<button type="submit" id="enviar" name="submit" class="btn btn-primary">Enviar</button>
</div>
</form>
</div>
</article>
</section>
</body>
</html>