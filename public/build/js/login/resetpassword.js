$('#formResetPassword').on('submit', function (e) {
    e.preventDefault(); // Evita que el formulario se envíe de la manera tradicional

    var email = $('#email'); // Serializa los datos del formulario
    // console.log(formData);
    
    // if (!validarFormulario(formData)) {
    //     return;
    // }
    
    $.ajax({
        url: '/resetpassword/enviarEmail', // Cambia esto por la URL de tu servidor
        type: 'POST',
        data: email,
        dataType: 'json',
        beforeSend: function () {
            $('#loading').show();
        },
        success: function (response) {
            // Verificamos la respuesta
            if (response.success) {
                toastr.success(response.message, 'Éxito');
            } else {
                toastr.error(response.message, 'Error');
            }
        },
        complete: function () {
            $('#loading').hide();
        },
        error: function (xhr, status, error) {
            toastr.error('Error en la solicitud', 'Error');
            console.error('Error:', error);
        }
    });
});