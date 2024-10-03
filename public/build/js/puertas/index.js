$(document).ready(function() {
    // Función para obtener las puertas desde el servidor con AJAX
    function obtenerPuertas() {
        $.ajax({
            url: '/puertas', // URL del controlador que devuelve los datos
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

    // Función para mostrar las puertas en el DOM
    function mostrarPuertas(puertas) {
        const $contenedorPuertas = $('.puertas-cont'); // Seleccionar el contenedor

        // Limpiar el contenido previo
        $contenedorPuertas.empty();

        // Iterar sobre las puertas y crear los elementos dinámicos
        $.each(puertas, function(index, puerta) {
            let historialHtml = ''; // Variable para almacenar el historial de cada puerta
                
            // Generar el historial si la puerta tiene movimientos
            if (puerta.movimientos && puerta.movimientos.length > 0) {
                $.each(puerta.movimientos, function(i, movimiento) {
                    historialHtml += `<li class="bg-dark text-white p-2 m-0">
                    ${movimiento.nombreUsuario} - ${movimiento.fechaApertura} - Cierre: ${movimiento.fechaCierre}
                </li>`;
                });
            } else {
                historialHtml = `<li class="bg-dark text-white p-2 m-0">No hay movimientos registrados.</li>`;
            }

            const puertaElement = `
            <div class="d-grid puerta mb-2">
                <button type="button" class="btn btn-puertas p-2">${puerta.nombre}</button>
                <div class="historial">
                    ${historialHtml}
                </div>
            </div>
            `;

            // Añadir los elementos de cada puerta al contenedor
            $contenedorPuertas.append(puertaElement);
        });
    }

    // Llamar a la función para obtener los datos al cargar la página
    obtenerPuertas();
});
