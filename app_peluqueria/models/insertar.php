<!-- Insertar servicios -->
 <?php
 $stmt = $pdo->prepare("INSERT INTO servicios (nombre, precio) VALUES (:nombre, :precio)");
 $stmt->execute(['nombre' => 'Corte de Cabello', 'precio' => 15.00]);