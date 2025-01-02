<?php
include '../config/conexion.php';

// Obtener clientes
$queryClientes = $pdo->query("SELECT id, nombre FROM clientes");
$clientes = $queryClientes->fetchAll(PDO::FETCH_ASSOC);

// Obtener servicios
$queryServicios = $pdo->query("SELECT id, nombre FROM servicios");
$servicios = $queryServicios->fetchAll(PDO::FETCH_ASSOC);
