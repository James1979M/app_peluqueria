<?php
// Incluir la lógica del archivo PHP para cargar los datos
include '../controllers/editar_cita.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/editar.css">
    <title>Editar Cita</title>

</head>
<body>

<div class="container">
    <h1 class="mb-4">Editar Cita</h1>

    <!-- Mostrar mensaje de error si existe -->
    <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <!-- Formulario de edición -->
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($cita['id']); ?>">

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente</label>
            <select id="cliente_id" name="cliente_id" class="form-select" required>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= htmlspecialchars($cliente['id']); ?>"
                        <?= $cliente['id'] == $cita['cliente_id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($cliente['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="servicio_id" class="form-label">Servicio</label>
            <select id="servicio_id" name="servicio_id" class="form-select" required>
                <?php foreach ($servicios as $servicio): ?>
                    <option value="<?= htmlspecialchars($servicio['id']); ?>"
                        <?= $servicio['id'] == $cita['servicio_id'] ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($servicio['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="form-control" value="<?= htmlspecialchars($cita['fecha']); ?>" required>
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" id="hora" name="hora" class="form-control" value="<?= htmlspecialchars($cita['hora']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary"><a href="reser_lista.php" class="">Guardar Cambios</a></button>
        <a href="listar_citas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- Enlace a Bootstrap JS y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>




