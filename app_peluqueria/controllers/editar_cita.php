<?php
// editar_cita_logic.php

require_once '../config/conexion.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: No se proporcionó un ID válido.");
}

$id = (int)$_GET['id'];

// Obtener los datos de la cita
$queryCita = $pdo->prepare("
    SELECT 
        citas.id, 
        citas.fecha, 
        citas.hora, 
        citas.cliente_id, 
        citas.servicio_id
    FROM citas
    WHERE citas.id = ?
");
$queryCita->execute([$id]);
$cita = $queryCita->fetch(PDO::FETCH_ASSOC);

if (!$cita) {
    die("Error: No se encontraron los datos de la cita.");
}

// Obtener todos los clientes
$queryClientes = $pdo->query("SELECT id, nombre FROM clientes");
$clientes = $queryClientes->fetchAll(PDO::FETCH_ASSOC);

// Obtener todos los servicios
$queryServicios = $pdo->query("SELECT id, nombre FROM servicios");
$servicios = $queryServicios->fetchAll(PDO::FETCH_ASSOC);

// Procesar el formulario si es un método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente_id = $_POST['cliente_id'];
    $servicio_id = $_POST['servicio_id'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Validar que todos los campos estén completos
    if (!empty($cliente_id) && !empty($servicio_id) && !empty($fecha) && !empty($hora)) {
        // Actualizar los datos de la cita
        $stmt = $pdo->prepare("
            UPDATE citas 
            SET cliente_id = ?, servicio_id = ?, fecha = ?, hora = ?
            WHERE id = ?
        ");
        $stmt->execute([$cliente_id, $servicio_id, $fecha, $hora, $id]);

        if ($stmt->rowCount() > 0) {
            header("Location: ../views/listar_citas.php?mensaje=Cita actualizada correctamente.");
            exit;
        } else {
            $error = "No se realizaron cambios en la cita.";
        }
    } else {
        $error = "Todos los campos son obligatorios.";
    }
}









