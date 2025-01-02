<?php
include '../config/conexion.php'; // Asegúrate de incluir tu archivo de conexión

$id = $_GET['id'];
$sql = "DELETE FROM citas WHERE id = :id";
$stmt = $pdo->prepare($sql);

if ($stmt->execute(['id' => $id])) {
            // Redirigir de vuelta a la página de citas con un mensaje de éxito
            header('Location: ../views/listar_citas.php?mensaje=Error al eliminar el usuario');
        } else {
            // Redirigir con un mensaje de error
            header('Location: ../views/listar_citas.php?mensaje=Error al eliminar la cita');
            exit;
        } 

