// Cuando el documento esté listo
$(document).ready(function() {
    // Obtener el selector de procesadores
    var procesadorSelect = $('#procesadorSelect');
    var precioProcesadorSpan = $('#precioProcesador');
    var data; // Variable para almacenar los datos de procesadores

    // Realizar una solicitud AJAX para obtener los nombres y precios de los procesadores desde la base de datos
    $.ajax({
        url: 'obtener_productos.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Almacenar los datos de procesadores en la variable data
            data = response;

            // Limpiar opciones existentes
            procesadorSelect.empty();

            // Agregar la opción predeterminada
            procesadorSelect.append('<option value="" disabled selected>Selecciona tu procesador</option>');

            // Agregar cada nombre de procesador como una opción
            $.each(data, function(index, procesador) {
                procesadorSelect.append('<option value="' + procesador.Id_Procesador + '">' + procesador.Nombre + '</option>');
            });

            // Habilitar el selector de procesadores
            procesadorSelect.prop('disabled', false);
        },
        error: function(error) {
            console.log('Error al obtener procesadores:', error);
        }
    });

    // Agregar un evento change al selector de procesadores
    procesadorSelect.change(function() {
        // Obtener el valor seleccionado del procesador
        var procesadorId = $(this).val();

        // Buscar el procesador seleccionado en el array de datos
        var procesadorSeleccionado = data.find(function(procesador) {
            return procesador.Id_Procesador == procesadorId;
        });

        // Mostrar el precio del procesador dentro del elemento span
        precioProcesadorSpan.text('Precio: ' + procesadorSeleccionado.Precio);
    });
});
