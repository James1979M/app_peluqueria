<?php
// Incluir conexión a la base de datos o cualquier archivo necesario
include '../config/conexion.php';

// Consultar las citas
$query = $pdo->query("SELECT citas.id, clientes.nombre AS cliente, servicios.nombre AS servicio, citas.fecha, citas.hora 
                      FROM citas
                      INNER JOIN clientes ON citas.cliente_id = clientes.id
                      INNER JOIN servicios ON citas.servicio_id = servicios.id");

$citas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Enlace a iconos de Bootstrap (opcional, pero útil) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/listar.css">
    <title>Listado de Citas</title>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Citas Programadas</h1>

    <!-- Mensajes de éxito o error -->
    <?php if (isset($_GET['mensaje'])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_GET['mensaje']); ?>
        </div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_GET['error']); ?>
        </div>
    <?php endif; ?>

    <!-- Tabla de citas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <!-- <th>Acciones</th> -->
            </tr>
        </thead>
        <tbody>
        <?php if (count($citas) > 0): ?>
            <?php foreach ($citas as $cita): ?>
                <tr>
                    <td><?= htmlspecialchars($cita['id']); ?></td>
                    <td><?= htmlspecialchars($cita['cliente']); ?></td>
                    <td><?= htmlspecialchars($cita['servicio']); ?></td>
                    <td><?= htmlspecialchars($cita['fecha']); ?></td>
                    <td><?= htmlspecialchars($cita['hora']); ?></td>
                    <td>
                        <!-- Botones de acciones -->
                        <a href="../views/editar.php?id=<?= $cita['id']; ?>" class="btn-editar">Editar</a>
                        <a href="../controllers/eliminar.php?id=<?= $cita['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta cita?');">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center">No hay citas programadas.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <a href="../views/index.php" class="btn btn-primary">Registrate</a>
    <!-- <a href="../views/reser_lista.php" class="btn btn-primary">Reserva tu cita</a> -->
</div>

<!-- Enlace a Bootstrap JS y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

