<?php
include '../config/conexion.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $cliente = $_POST['cliente_id'];
    $servicio = $_POST['servicio_id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Validar que todos los datos estén completos
    if (!empty($cliente) && !empty($servicio) && !empty($fecha) && !empty($hora)) {
        try {
            // Insertar la cita en la base de datos
            $query = $pdo->prepare("INSERT INTO citas (cliente_id, servicio_id, fecha, hora) VALUES (?, ?, ?, ?)");
            $query->execute([$cliente, $servicio, $fecha, $hora]);

            // Redirigir con éxito
            header('Location: ../views/reser_lista.php?success=1');
            exit;
        } catch (PDOException $e) {
            echo "Error al guardar la cita: " . $e->getMessage();
        }
    } else {
        echo "Por favor complete todos los campos.";
    }
}

