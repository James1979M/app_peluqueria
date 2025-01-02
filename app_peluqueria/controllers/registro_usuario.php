<?php
include '../config/conexion.php';
//Reporte de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    //Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    //Validar que todos los campos esten completos
    if (!empty($nombre) && !empty($telefono)) {
        try{
            //Insertar el registro en la base de datos
            $query = $pdo->prepare("INSERT INTO clientes(nombre, telefono) VALUES(?,?)");
            $query->execute([$nombre, $telefono]);

            //Redirigir con exito
            header('Location: ../views/reser_lista.php?success=1');
            exit;
        } catch (PDOException $e) {
            echo "Error al guardar la cita: " . $e->getMessage();
        }
    } else {
        echo "Por favor complete todos los campos.";
    }
}
