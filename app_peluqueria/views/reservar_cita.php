<?php
include '../config/conexion.php';

// Obtener clientes y servicios dinámicamente
$queryClientes = $pdo->query("SELECT id, nombre FROM clientes");
$clientes = $queryClientes->fetchAll(PDO::FETCH_ASSOC);

$queryServicios = $pdo->query("SELECT id, nombre FROM servicios");
$servicios = $queryServicios->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/listar.css">
    <title>Listado de Citas</title>
</head>

<body>
    <div class="container mt-5">
        <h2>Reservar Cita</h2>
        <form action="../controllers/guardar_cita.php" method="POST" class="row g-3" id="reser_cita">
            <div class="col-md-6">
                <label for="cliente" class="form-label">Cliente</label>
                <select class="form-select" name="cliente_id" id="cliente" required>
                    <option value="" selected>Seleccione un cliente</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['id'] ?>"><?= $cliente['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="servicio" class="form-label">Servicio</label>
                <select class="form-select" name="servicio_id" id="servicio" required>
                    <option value="" selected>Seleccione un servicio</option>
                    <?php foreach ($servicios as $servicio): ?>
                        <option value="<?= $servicio['id'] ?>"><?= $servicio['nombre'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha" required>
            </div>
            <div class="col-md-6">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" name="hora" id="hora" required>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Reservar</button>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>

</html>