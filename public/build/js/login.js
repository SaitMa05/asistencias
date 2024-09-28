$(document).ready(function() {
    console.log("Desde login.js");
    
    $('#formRegistro').on('submit', function(e) {
        e.preventDefault(); // Evita que el formulario se envíe de la manera tradicional

        var formData = $(this).serialize(); // Serializa los datos del formulario
        
        $.ajax({
            url: '/registro/crear', // Cambia esto por la URL de tu servidor
            type: 'POST',
            data: formData,
            success: function(response) {
                // Maneja la respuesta del servidor aquí
                console.log('Éxito:', response);
                window.location.href = '/login';
            },
            error: function(xhr, status, error) {
                // Maneja los errores aquí
                console.error('Error:', error);
            }
        });
    });
});