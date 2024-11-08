$(document).ready(function() {
    
    console.log('Admin puertas');
    
    $.fn.dataTable.ext.errMode = 'none';

    var table = $('#tablaPuertas').DataTable({
        "pageLength": 50,
        "columnDefs": [
            { "width": "90%", "targets": 0 },  // Ancho de la primera columna
            { "width": "10%", "targets": 1 },  // Ancho de la segunda columna
        ],
        "responsive": true
    });

    function obtenerPuertas() {
        

        $.ajax({
            url: '/admin/puertas', // URL del controlador que devuelve los datos
            method: 'GET',
            dataType: 'json',
            success: function(puertasConMovimientos) {
                mostrarPuertas(puertasConMovimientos); // Llamar a la función para mostrar los datos
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error al obtener los datos:', textStatus, errorThrown);
            }
        });
    }

    function mostrarPuertas(puertas) {
        const $contenedorPuertas = $('#puertas-admin'); // Seleccionar el contenedor
        // Limpiar el contenido previo
        $contenedorPuertas.empty();
        
        $.each(puertas, function(index, puerta) {
            let historialHtml = ''; // Variable para almacenar el historial de cada puerta
                
            const puertaElement = $(`
            <tr>
                <td class="text-start">${puerta.nombre}</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-orange btn-sm">
                            <i title="Editar" class="bi bi-pencil-square btnEditar"></i>
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i title="Eliminar" class="bi bi-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
            `);
        
            // Asignar evento click directamente al botón de editar
            puertaElement.find('.btnEditar').click(function() {
                $('.puerta-nombre').text(puerta.nombre);
                $('#verificacionModal').modal('show');
            });
        
            // Añadir los elementos de cada puerta al contenedor
            $contenedorPuertas.append(puertaElement);
        });
        
            
            
    }

    obtenerPuertas();

});