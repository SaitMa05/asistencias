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
            // Hacer la solicitud AJAX para obtener los alumnos
            $.ajax({
                url: 'asistencias/alumnos', // Ruta al controlador PHP
                method: 'POST',
                data: { cursos: curso_id },
                dataType: 'json', // Esperamos un JSON como respuesta
                success: function(response) {
                    // Limpiar la tabla de DataTables
                    table.clear().draw();

                    if (Array.isArray(response) && response.length > 0) {
                        // Recorrer la respuesta y agregar filas a la tabla
                        $.each(response, function(index, alumno) {
                            var fila = "<tr>" +
                                "<td>" + alumno.nombre + " " + alumno.apellido + "</td>" +
                                "<td class='asistencia-confirma text-center'><input type='checkbox' name='asistencia[" + alumno.id + "]' class='asistencia-checkbox' data-id='" + alumno.id + "' value='1'></td>" +
                                "<td class='asistencia-confirma text-center'><input type='checkbox' name='tardanza[" + alumno.id + "]' class='tardanza-checkbox' data-id='" + alumno.id + "' value='1'></td>" +
                                "</tr>";

                            // Agregar la fila a la tabla de DataTables
                            table.row.add($(fila)).draw(false);
                        });

                        // Agregar el comportamiento de exclusión a los checkboxes de asistencia y tardanza
                        $('.asistencia-checkbox').on('change', function() {
                            var alumnoId = $(this).data('id');
                            if ($(this).is(':checked')) {
                                $('.tardanza-checkbox[data-id="' + alumnoId + '"]').prop('checked', false);
                            }
                        });
                        $('.tardanza-checkbox').on('change', function() {
                            var alumnoId = $(this).data('id');
                            if ($(this).is(':checked')) {
                                $('.asistencia-checkbox[data-id="' + alumnoId + '"]').prop('checked', false);
                            }
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

    $('#formAsistencia').on('submit', function(e) {
        e.preventDefault(); // Evita el envío tradicional del formulario


        if(!validarFormulario(formData)){
            return;
        }

        // Asegurar que todos los checkboxes no seleccionados también se envíen con valor `0`
        $('input[type="checkbox"]').each(function() {
            if (!$(this).is(':checked')) {
                // Agregar un campo oculto con valor 0 para los checkboxes no seleccionados
                $(this).prop('checked', true).val(0);
            }
        });

        // Serializar el formulario y enviar los datos
        var formData = $(this).serialize();
        console.log(formData); // Muestra los datos serializados en consola para depuración

        $.ajax({
            url: '/asistencias/enviar', // Cambia esto a la URL de tu servidor
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log("Respuesta recibida:", response);
                if (response.status) {
                    toastr.success(response.message, 'Éxito');
                } else {
                    toastr.error(response.message, 'Error');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
    });

    function validarFormulario(formData) {
        
        if (formData === 'tablaAsistencias_length') {
            alertaMensaje('Debe seleccionar un curso y marcar la asistencia de al menos un alumno', 'error');
            return false;
        }   

        return true;
    }
});