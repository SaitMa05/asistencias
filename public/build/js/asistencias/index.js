$(document).ready(function() {
    $('#tablaAsistencias').DataTable({
        "columnDefs": [
        { "width": "90%", "targets": 0 },  // Ancho de la primera columna
        { "width": "10%", "targets": 1 },  // Ancho de la segunda columna
        ]
    });


    $('#cursos').change(function(event) {
        event.preventDefault(); // Prevenir que el formulario se envíe automáticamente

        var cursoId = $(this).val(); // Obtener el ID del curso seleccionado

        if (cursoId != '') {
            $.ajax({
                url: '/asistencias/alumnos', // URL que apunta a tu controlador y acción
                type: 'POST',
                data: { cursos: cursoId }, // Enviamos el curso seleccionado
                success: function(data) {
                    $('#alumnos').html(data); // Insertamos la respuesta en el tbody de la tabla
                },
                error: function(xhr, status, error) {
                    console.log('Error: ' + error); // En caso de error, lo mostramos en la consola
                }
            });
        } else {
            $('#alumnos').html(''); // Limpiamos el div si no hay curso seleccionado
        }
    });
});