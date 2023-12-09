// Cuando el documento esté listo
$(document).ready(function () {
    // Obtener los selectores y spans de procesadores, almacenamientos, tarjetas de video, fuentes de poder, cases, monitores, teclados, mouses, audífonos y refrigeraciones
    var procesadorSelect = $('#procesadorSelect');
    var almacenamiento1Select = $('#almacenamiento1');
    var almacenamiento2Select = $('#almacenamiento2');
    var tarjetaVideoSelect = $('#tarjetaVideo');
    var fuentePoderSelect = $('#fuentePoder');
    var casesSelect = $('#cases');
    var monitorSelect = $('#monitor');
    var tecladoSelect = $('#teclado');
    var mouseSelect = $('#mouse');
    var audifonoSelect = $('#audifono');
    var refrigeracionSelect = $('#refrigeracion');

    var precioProcesadorSpan = $('#precioProcesador');
    var precioAlmacenamiento1Span = $('#precioAlmacenamiento1');
    var precioAlmacenamiento2Span = $('#precioAlmacenamiento2');
    var precioTarjetaVideoSpan = $('#precioTarjetaVideo');
    var precioFuentePoderSpan = $('#precioFuentePoder');
    var precioCasesSpan = $('#precioCases');
    var precioMonitorSpan = $('#precioMonitor');
    var precioTecladoSpan = $('#precioTeclado');
    var precioMouseSpan = $('#precioMouse');
    var precioAudifonoSpan = $('#precioAudifono');
    var precioRefrigeracionSpan = $('#precioRefrigeracion');

    var data; // Variable para almacenar los datos de procesadores, almacenamientos y tarjetas de video

    // Realizar una solicitud AJAX para obtener los nombres y precios de procesadores, almacenamientos y tarjetas de video desde la base de datos
    $.ajax({
        url: 'obtener_productos.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Almacenar los datos de procesadores, almacenamientos y tarjetas de video en la variable data
            data = response;

            // Función para llenar un select con opciones
            function llenarSelect(select, opciones) {
                // Limpiar opciones existentes
                select.empty();

                // Agregar la opción predeterminada
                select.append('<option value="" disabled selected>Selecciona...</option>');

                // Agregar cada opción al select
                $.each(opciones, function (index, opcion) {
                    select.append('<option value="' + opcion.Id + '">' + opcion.Nombre + '</option>');
                });
            }

            // Llenar los selectores con datos
            llenarSelect(procesadorSelect, data.procesadores);
            llenarSelect(almacenamiento1Select, data.almacenamientos);
            llenarSelect(almacenamiento2Select, data.almacenamientos);
            llenarSelect(tarjetaVideoSelect, data.tarjetasVideo);
            llenarSelect(fuentePoderSelect, data.fuentesPoder);
            llenarSelect(casesSelect, data.cases);
            llenarSelect(monitorSelect, data.monitores);
            llenarSelect(tecladoSelect, data.teclados);
            llenarSelect(mouseSelect, data.mouses);
            llenarSelect(audifonoSelect, data.audifonos);
            llenarSelect(refrigeracionSelect, data.refrigeraciones);

            // Habilitar los selectores
            procesadorSelect.prop('disabled', false);
            almacenamiento1Select.prop('disabled', false);
            almacenamiento2Select.prop('disabled', false);
            tarjetaVideoSelect.prop('disabled', false);
            fuentePoderSelect.prop('disabled', false);
            casesSelect.prop('disabled', false);
            monitorSelect.prop('disabled', false);
            tecladoSelect.prop('disabled', false);
            mouseSelect.prop('disabled', false);
            audifonoSelect.prop('disabled', false);
            refrigeracionSelect.prop('disabled', false);
        },
        error: function (error) {
            console.log('Error al obtener datos:', error);
        }
    });

    // Agregar eventos change a los selectores de procesadores, almacenamientos, tarjetas de video, fuentes de poder, cases, monitores, teclados, mouses, audífonos y refrigeraciones
    procesadorSelect.change(function() {
        mostrarPrecioSeleccionado(procesadorSelect, precioProcesadorSpan);
    });

    almacenamiento1Select.change(function() {
        mostrarPrecioSeleccionado(almacenamiento1Select, precioAlmacenamiento1Span);
    });

    almacenamiento2Select.change(function() {
        mostrarPrecioSeleccionado(almacenamiento2Select, precioAlmacenamiento2Span);
    });

    tarjetaVideoSelect.change(function() {
        mostrarPrecioSeleccionado(tarjetaVideoSelect, precioTarjetaVideoSpan);
    });

    fuentePoderSelect.change(function() {
        mostrarPrecioSeleccionado(fuentePoderSelect, precioFuentePoderSpan);
    });

    casesSelect.change(function() {
        mostrarPrecioSeleccionado(casesSelect, precioCasesSpan);
    });

    monitorSelect.change(function() {
        mostrarPrecioSeleccionado(monitorSelect, precioMonitorSpan);
    });

    tecladoSelect.change(function() {
        mostrarPrecioSeleccionado(tecladoSelect, precioTecladoSpan);
    });

    mouseSelect.change(function() {
        mostrarPrecioSeleccionado(mouseSelect, precioMouseSpan);
    });

    audifonoSelect.change(function() {
        mostrarPrecioSeleccionado(audifonoSelect, precioAudifonoSpan);
    });

    refrigeracionSelect.change(function() {
        mostrarPrecioSeleccionado(refrigeracionSelect, precioRefrigeracionSpan);
    });

    // Función para mostrar el precio del elemento seleccionado en el span correspondiente
    function mostrarPrecioSeleccionado(selector, span) {
        // Obtener el valor seleccionado
        var elementoId = selector.val();

        // Buscar el elemento seleccionado en el array de datos
        var elementoSeleccionado = data.procesadores
            .concat(data.almacenamientos)
            .concat(data.tarjetasVideo)
            .concat(data.fuentesPoder)
            .concat(data.cases)
            .concat(data.monitores)
            .concat(data.teclados)
            .concat(data.mouses)
            .concat(data.audifonos)
            .concat(data.refrigeraciones)
            .find(function(elemento) {
                return elemento.Id == elementoId;
            });

        // Mostrar el precio del elemento dentro del span
        span.text('Precio: ' + elementoSeleccionado.Precio);
    }
});


// ... (código anterior)

// Variable para almacenar los precios seleccionados
var precioProcesador = 0;
var precioAlmacenamiento1 = 0;
var precioAlmacenamiento2 = 0;

// Función para actualizar el precio total
function actualizarPrecioTotal() {
    var precioTotal = precioProcesador + precioAlmacenamiento1 + precioAlmacenamiento2;
    $('#precioTotal').text('Precio Total: ' + precioTotal);
}

// Agregar un evento change al selector de procesadores
procesadorSelect.change(function () {
    // Obtener el valor seleccionado del procesador
    var procesadorId = $(this).val();

    // Buscar el procesador seleccionado en el array de datos
    var procesadorSeleccionado = data.procesadores.find(function (procesador) {
        return procesador.Id == procesadorId;
    });

    // Almacenar el precio del procesador seleccionado
    precioProcesador = procesadorSeleccionado.Precio;

    // Mostrar el precio del procesador dentro del elemento span
    precioProcesadorSpan.text('Precio: ' + precioProcesador);

    // Actualizar el precio total
    actualizarPrecioTotal();
});

// Agregar eventos change a los selectores de almacenamientos
almacenamiento1Select.change(function () {
    // Obtener el valor seleccionado del almacenamiento1
    var almacenamiento1Id = $(this).val();

    // Buscar el almacenamiento1 seleccionado en el array de datos
    var almacenamiento1Seleccionado = data.almacenamientos.find(function (almacenamiento) {
        return almacenamiento.Id == almacenamiento1Id;
    });

    // Almacenar el precio del almacenamiento1 seleccionado
    precioAlmacenamiento1 = almacenamiento1Seleccionado.Precio;

    // Mostrar el precio del almacenamiento1 dentro del elemento span
    precioAlmacenamiento1Span.text('Precio: ' + precioAlmacenamiento1);

    // Actualizar el precio total
    actualizarPrecioTotal();
});

almacenamiento2Select.change(function () {
    // Obtener el valor seleccionado del almacenamiento2
    var almacenamiento2Id = $(this).val();

    // Buscar el almacenamiento2 seleccionado en el array de datos
    var almacenamiento2Seleccionado = data.almacenamientos.find(function (almacenamiento) {
        return almacenamiento.Id == almacenamiento2Id;
    });

    // Almacenar el precio del almacenamiento2 seleccionado
    precioAlmacenamiento2 = almacenamiento2Seleccionado.Precio;

    // Mostrar el precio del almacenamiento2 dentro del elemento span
    precioAlmacenamiento2Span.text('Precio: ' + precioAlmacenamiento2);

    // Actualizar el precio total
    actualizarPrecioTotal();
});

// Función para mostrar el precio del elemento seleccionado en el span correspondiente
function mostrarPrecioSeleccionado(selector, span, tipoPrecio) {
    // Obtener el valor seleccionado
    var elementoId = selector.val();

    // Buscar el elemento seleccionado en el array de datos
    var elementoSeleccionado = tipoPrecio == 'procesador' ?
        data.procesadores.find(function (elemento) {
            return elemento.Id == elementoId;
        }) :
        data.almacenamientos.find(function (elemento) {
            return elemento.Id == elementoId;
        });

    // Mostrar el precio del elemento dentro del span
    span.text('Precio: ' + elementoSeleccionado.Precio);

    // Actualizar el precio total
    actualizarPrecioTotal();
}

// Función para generar la cotización
function generarCotizacion() {
    // Tu lógica para generar la cotización aquí
}

// ... (resto del código)
