<?php
include '../config/conexion.php';

// Obtener clientes y servicios dinámicamente
$queryClientes = $pdo->query("SELECT id, nombre FROM clientes");
$clientes = $queryClientes->fetchAll(PDO::FETCH_ASSOC);

$queryServicios = $pdo->query("SELECT id, nombre FROM servicios");
$servicios = $queryServicios->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Reservar Cita</h2>
<form action="../controllers/guardar_cita.php" method="POST" class="row g-3">
    <div class="col-md-6">
        <label for="cliente" class="form-label">Cliente</label>
        <select class="form-select" name="cliente" id="cliente" required>
            <option value="" selected>Seleccione un cliente</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente['id'] ?>"><?= $cliente['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="servicio" class="form-label">Servicio</label>
        <select class="form-select" name="servicio" id="servicio" required>
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

