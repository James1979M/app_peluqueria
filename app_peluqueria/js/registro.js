// Seleccionar el formulario con el id
const formulario = document.getElementById('myForm');

// Escuchar el evento submit
if (formulario) {
    formulario.addEventListener('submit', function (e) {
        // Seleccionar campos
        const nombre = document.getElementById('nombre').value.trim();
        const telefono = document.getElementById('telefono').value.trim();

        // Validar los campos si están vacíos
        if (!nombre || !telefono) {
            e.preventDefault(); // Evita el envío del formulario
            alert("Todos los campos son obligatorios");
        } else {
            // No previene el envío en el caso válido
            alert("Registro exitoso, ahora puedes reservar tu cita!! 😀");
        }
    });
}

// Mensaje de alerta en la página index
const alertElement = document.getElementById('successAlert');

// Verificar si la alerta existe
if (alertElement) {
    // Desaparecer la alerta después de 5 segundos
    setTimeout(() => {
        alertElement.style.transition = 'opacity 0.5s';
        alertElement.style.opacity = '0';
        setTimeout(() => alertElement.remove(), 500); // Elimina el elemento después de que se desvanezca
    }, 5000);
}

 