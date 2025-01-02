<!-- Formulario de registro de usuario -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" 
    href="../img/tigera.png">
    <link rel="stylesheet" href="../public/css/formulario.css">
    <title>Gestión de Citas - Peluquería</title>
</head>

<body>

    <header>
        <svg xmlns="http://www.w3.org/2000/svg" class="me-3" width="20" height="20" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
            <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0m7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
        </svg>
        <h1>Peluquería Unisex</h1>
        <svg xmlns="http://www.w3.org/2000/svg" class="ms-3" width="20" height="20" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
            <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0m7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
        </svg>
    </header>

    <main>
        <div class="slider-frame">
            <ul class="ul-slider">
                <li class="li-slider"><img class="img-carrusel" src="../img/pel1.jpg" alt="corte1"></li>
                <li class="li-slider"><img class="img-carrusel" src="../img/pel5.jpg" alt="corte2"></li>
                <li class="li-slider"><img class="img-carrusel" src="../img/pel6.jpg" alt="corte3"></li>
                <li class="li-slider"><img class="img-carrusel" src="../img/pel7.jpg" alt="corte4"></li>
                <!-- <li class="li-slider"><img class="img-carrusel" src="../img/pel5.jpg" alt="corte5"></li> -->

            </ul>
        </div>

        <div class="cont-form">

            <form action="../controllers/registro_usuario.php" method="POST" id="myForm" class="form">
                <h2>Registrate para reservar tu cita</h2>
                <label for="nombre" class="label">Nombre</label>
                <input type="text" class="input" name="nombre" id="nombre" placeholder="Nombre">

                <label for="telefono" class="label">Telefòno</label>
                <input type="text" class="input" name="telefono" id="telefono" placeholder="Telefono">

                <button type="submit" class="btn">Registrarse</button>
                <p class="pregunta">Ya estas registrado? <a href="../views/reser_lista.php"> Reserva tu cita</a></p>
            </form>

        </div>
    </main>

    <footer>
        <p>James Marin Desarrollo Web 624845149</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/registro.js"></script>
</body>

</html>