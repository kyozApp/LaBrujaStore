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
    var accesorio1Select = $('#accesorio1');
    var accesorio2Select = $('#accesorio2');
    var accesorio3Select = $('#accesorio3');
    var accesorio4Select = $('#accesorio4');
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
    var precioAccesorio1Span = $('#precioAccesorio1');
    var precioAccesorio2Span = $('#precioAccesorio2');
    var precioAccesorio3Span = $('#precioAccesorio3');
    var precioAccesorio4Span = $('#precioAccesorio4');
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
            llenarSelect(accesorio1Select, data.accesorios);
            llenarSelect(accesorio2Select, data.accesorios);
            llenarSelect(accesorio3Select, data.accesorios);
            llenarSelect(accesorio4Select, data.accesorios);
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
            accesorio1Select.prop('disabled', false);
            accesorio2Select.prop('disabled', false);
            accesorio3Select.prop('disabled', false);
            accesorio4Select.prop('disabled', false);
            refrigeracionSelect.prop('disabled', false);
        },
        error: function (error) {
            console.log('Error al obtener datos:', error);
        }
    });

    // Agregar eventos change a los selectores de procesadores, almacenamientos, tarjetas de video, fuentes de poder, cases, monitores, teclados, mouses, audífonos y refrigeraciones
    // Agregar evento change al selector de procesador
    procesadorSelect.change(function () {
        // Obtener el ID del procesador seleccionado
        var procesadorSeleccionadoId = $(this).val();

        // Realizar solicitud AJAX al servidor para obtener las placas compatibles con el procesador seleccionado
        $.ajax({
            url: 'obtener_placas_compatibles.php', // Reemplaza 'obtener_placas_compatibles.php' por la ruta correcta a tu archivo PHP que obtiene las placas compatibles
            type: 'GET',
            dataType: 'json',
            data: { procesadorId: procesadorSeleccionadoId }, // Enviar el ID del procesador seleccionado al servidor
            success: function (response) {
                // Actualizar el selector de placas con las opciones compatibles obtenidas del servidor
                llenarSelect(placaBaseSelect, response.placasCompatibles);
            },
            error: function (error) {
                console.log('Error al obtener placas compatibles:', error);
            }
        });
    });


    almacenamiento1Select.change(function () {
        mostrarPrecioSeleccionado(almacenamiento1Select, precioAlmacenamiento1Span, 'almacenamiento');
    });

    almacenamiento2Select.change(function () {
        mostrarPrecioSeleccionado(almacenamiento2Select, precioAlmacenamiento2Span, 'almacenamiento');
    });

    tarjetaVideoSelect.change(function () {
        mostrarPrecioSeleccionado(tarjetaVideoSelect, precioTarjetaVideoSpan, 'tarjetaVideo');
    });

    fuentePoderSelect.change(function () {
        mostrarPrecioSeleccionado(fuentePoderSelect, precioFuentePoderSpan, 'fuentePoder');
    });

    casesSelect.change(function () {
        mostrarPrecioSeleccionado(casesSelect, precioCasesSpan, 'cases');
    });

    monitorSelect.change(function () {
        mostrarPrecioSeleccionado(monitorSelect, precioMonitorSpan, 'monitor');
    });

    tecladoSelect.change(function () {
        mostrarPrecioSeleccionado(tecladoSelect, precioTecladoSpan, 'teclado');
    });

    mouseSelect.change(function () {
        mostrarPrecioSeleccionado(mouseSelect, precioMouseSpan, 'mouse');
    });

    audifonoSelect.change(function () {
        mostrarPrecioSeleccionado(audifonoSelect, precioAudifonoSpan, 'audifono');
    });

    accesorio1Select.change(function () {
        mostrarPrecioSeleccionado(accesorio1Select, precioAccesorio1Span, 'accesorio');
    });

    accesorio2Select.change(function () {
        mostrarPrecioSeleccionado(accesorio2Select, precioAccesorio2Span, 'accesorio');
    });

    accesorio3Select.change(function () {
        mostrarPrecioSeleccionado(accesorio3Select, precioAccesorio3Span, 'accesorio');
    });

    accesorio4Select.change(function () {
        mostrarPrecioSeleccionado(accesorio4Select, precioAccesorio4Span, 'accesorio');
    });

    refrigeracionSelect.change(function () {
        mostrarPrecioSeleccionado(refrigeracionSelect, precioRefrigeracionSpan, 'refrigeracion');
    });

    // Variable para almacenar los precios seleccionados
    var preciosSeleccionados = {
        procesador: 0,
        almacenamiento1: 0,
        almacenamiento2: 0,
        tarjetaVideo: 0,
        fuentePoder: 0,
        cases: 0,
        monitor: 0,
        teclado: 0,
        mouse: 0,
        audifono: 0,
        accesorio1: 0,
        accesorio2: 0,
        accesorio3: 0,
        accesorio4: 0,
        refrigeracion: 0

        // Agrega más campos para otros productos si es necesario
    };

    // Función para mostrar el precio del elemento seleccionado en el span correspondiente
    function mostrarPrecioSeleccionado(selector, span, tipoProducto) {
        // Obtener el valor seleccionado
        var elementoId = selector.val();
        var elementoSeleccionado;

        // Buscar el elemento seleccionado en el array de datos correspondiente al tipo de producto
        switch (tipoProducto) {
            case 'procesador':
                elementoSeleccionado = data.procesadores.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'almacenamiento':
                elementoSeleccionado = data.almacenamientos.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'tarjetaVideo':
                elementoSeleccionado = data.tarjetasVideo.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'fuentePoder':
                elementoSeleccionado = data.fuentesPoder.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'cases':
                elementoSeleccionado = data.cases.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'monitor':
                elementoSeleccionado = data.monitores.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'teclado':
                elementoSeleccionado = data.teclados.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'mouse':
                elementoSeleccionado = data.mouses.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'audifono':
                elementoSeleccionado = data.audifonos.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'accesorio':
                elementoSeleccionado = data.accesorios.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            case 'refrigeracion':
                elementoSeleccionado = data.refrigeraciones.find(function (elemento) {
                    return elemento.Id == elementoId;
                });
                break;
            // Agregar otros casos según los tipos de productos disponibles
            // ...
            default:
                elementoSeleccionado = null;
        }

        if (elementoSeleccionado) {
            // Mostrar el precio del elemento dentro del span
            span.text('Precio: ' + elementoSeleccionado.Precio);

            // Actualizar el precio correspondiente en el objeto de precios seleccionados
            switch (tipoProducto) {
                case 'procesador':
                    preciosSeleccionados.procesador = elementoSeleccionado.Precio;
                    break;
                case 'almacenamiento':
                    // Verificar si es almacenamiento1 o almacenamiento2
                    if (selector.is('#almacenamiento1')) {
                        preciosSeleccionados.almacenamiento1 = elementoSeleccionado.Precio;
                    } else {
                        preciosSeleccionados.almacenamiento2 = elementoSeleccionado.Precio;
                    }
                    break;
                case 'tarjetaVideo':
                    preciosSeleccionados.tarjetaVideo = elementoSeleccionado.Precio;
                    break;
                case 'fuentePoder':
                    preciosSeleccionados.fuentePoder = elementoSeleccionado.Precio;
                    break;
                case 'cases':
                    preciosSeleccionados.cases = elementoSeleccionado.Precio;
                    break;
                case 'monitor':
                    preciosSeleccionados.monitor = elementoSeleccionado.Precio;
                    break;
                case 'teclado':
                    preciosSeleccionados.teclado = elementoSeleccionado.Precio;
                    break;
                case 'mouse':
                    preciosSeleccionados.mouse = elementoSeleccionado.Precio;
                    break;
                case 'audifono':
                    preciosSeleccionados.audifono = elementoSeleccionado.Precio;
                    break;
                case 'accesorio':
                    if (selector.is('#accesorio1')) {
                        preciosSeleccionados.accesorio1 = elementoSeleccionado.Precio;
                    } else if (selector.is('#accesorio2')) {
                        preciosSeleccionados.accesorio2 = elementoSeleccionado.Precio;
                    } else if (selector.is('#accesorio3')) {
                        preciosSeleccionados.accesorio3 = elementoSeleccionado.Precio;
                    } else if (selector.is('#accesorio4')) {
                        preciosSeleccionados.accesorio4 = elementoSeleccionado.Precio;
                    }
                    break;

                case 'refrigeracion':
                    preciosSeleccionados.refrigeracion = elementoSeleccionado.Precio;
                    break;
                // Agregar otros casos según los tipos de productos disponibles
                // ...
                default:
                // Manejar otro tipo de productos si es necesario
            }

            // Actualizar el precio total
            actualizarPrecioTotal();
        }
    }


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
