$(document).ready(function() {

    $.fn.dataTable.ext.errMode = 'none';

    var table = $('#tablaAsistencias').DataTable({
        "columnDefs": [
            { "width": "90%", "targets": 0 },  // Ancho de la primera columna
            { "width": "10%", "targets": 1 },  // Ancho de la segunda columna
        ]
    });


    $('#tablaAsistencias').on('error.dt', function(e, settings, techNote, message) {
        // Mostrar el error en la consola o manejarlo como quieras
        alertaMensaje("No hay alumnos registrados en este curso", "error");
        return;
    });


    
    $('#cursos').change(function() {
        var curso_id = $(this).val();

        if (curso_id !== "") {
            // Hacer la solicitud AJAX
            $.ajax({
                url: 'asistencias/alumnos', // Cambia a la ruta de tu controlador
                method: 'POST',
                data: { cursos: curso_id },
                dataType: 'json', // Especificar que esperamos un JSON como respuesta
                success: function(response) {
                    // Limpiar la tabla de DataTables
                    table.clear().draw();

                    if (Array.isArray(response) && response.length > 0) {
                        // Recorrer la respuesta y agregar filas a la tabla
                        $.each(response, function(index, alumno) {
                            var fila = "<tr>" +
                                "<td>" + alumno.nombre + " " + alumno.apellido + "</td>" +
                                "<td class='asistencia-confirma text-center'><input type='checkbox' name='asistencia' data-id='" + alumno.id + "' value='asistencia'></td>" +
                                "<td class='asistencia-confirma text-center'><input type='checkbox' name='tardanza' data-id='" + alumno.id + "' value='tardanza'></td>" +
                                "</tr>";

                            // Agregar la fila a la tabla de DataTables
                            table.row.add($(fila)).draw(false);
                        });
                    } else {
                        table.row.add($("<tr><td colspan='3'>No se encontraron alumnos para este curso.</td></tr>")).draw(false);
                    }
                },
                error: function() {
                    alertaMensaje("Error al cargar los alumnos", "error");
                    table.row.add($("<tr><td colspan='3'>Error al cargar los alumnos.</td></tr>")).draw(false);
                }
            });
        } else {
            // Si no se selecciona un curso, limpiar la tabla
            table.clear().draw();
            table.row.add($("<tr><td colspan='3'>Por favor, seleccione un curso.</td></tr>")).draw(false);
        }
    });
});