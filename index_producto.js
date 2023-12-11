// index_producto.js

document.addEventListener('DOMContentLoaded', function () {
    // Obtener elementos de procesador
    var selectProcesador = document.getElementById('selectProcesador');
    var precioProcesador = document.getElementById('precioProcesador');
    // Obtener elementos de almacenamiento
    var selectAlmacenamiento = document.getElementById('selectAlmacenamiento');
    var precioAlmacenamiento = document.getElementById('precioAlmacenamiento');

    // Obtener elementos de tarjeta de video
    var selectTarjetaDeVideo = document.getElementById('selectTarjetaDeVideo');
    var precioTarjetaDeVideo = document.getElementById('precioTarjetaDeVideo');

    // Obtener elementos de fuente de poder
    var selectFuenteDePoder = document.getElementById('selectFuenteDePoder');
    var precioFuenteDePoder = document.getElementById('precioFuenteDePoder');

    // Obtener elementos de cases
    var selectCases = document.getElementById('selectCases');
    var precioCases = document.getElementById('precioCases');

    // Obtener elementos de monitor
    var selectMonitor = document.getElementById('selectMonitor');
    var precioMonitor = document.getElementById('precioMonitor');

    // Obtener elementos de teclado
    var selectTeclado = document.getElementById('selectTeclado');
    var precioTeclado = document.getElementById('precioTeclado');

    // Obtener elementos de mouse
    var selectMouse = document.getElementById('selectMouse');
    var precioMouse = document.getElementById('precioMouse');

    // Obtener elementos de audífonos
    var selectAudifono = document.getElementById('selectAudifono');
    var precioAudifono = document.getElementById('precioAudifono');

    // Obtener elementos de accesorio
    var selectAccesorio = document.getElementById('selectAccesorio');
    var precioAccesorio = document.getElementById('precioAccesorio');

    // Obtener elementos de refrigeracion
    var selectRefrigeracion = document.getElementById('selectRefrigeracion');
    var precioRefrigeracion = document.getElementById('precioRefrigeracion');


    // Agregado: Span para mostrar el precio total
    var precioTotalSpan = document.getElementById('precioTotal');

    // Agregado: Variables para almacenar los precios de cada select
    var precios = {
        'procesador': 0,
        'almacenamiento': 0,
        'tarjetaDeVideo': 0,
        'fuenteDePoder': 0,
        'cases': 0,
        'monitor': 0,
        'teclado': 0,
        'mouse': 0,
        'audifono': 0,
        'accesorio': 0,
        'refrigeracion': 0
    };

    // Agregado: Función para actualizar el precio total
    function actualizarPrecioTotal() {
        var total = Object.values(precios).reduce((a, b) => a + b, 0);

        // Muestra el precio total en el span
        precioTotalSpan.textContent = 'Precio Total: $' + total.toFixed(2);
    }

    // Agregado: Función para actualizar el precio de un select específico
    function actualizarPrecioSelect(selectId, precio) {
        precios[selectId] = precio;
        actualizarPrecioTotal();
    }

    // Agregado: Función para manejar el cambio en un select específico
    function manejarCambioSelect(selectId, spanId) {
        var select = document.getElementById(selectId);
        var precioSpan = document.getElementById(spanId);

        select.addEventListener('change', function () {
            var selectedOption = select.options[select.selectedIndex];
            var precio = parseFloat(selectedOption.dataset.precio);

            // Muestra el precio en el span correspondiente
            precioSpan.textContent = 'Precio: $' + precio.toFixed(2);

            // Actualiza el precio total
            actualizarPrecioSelect(selectId, precio);

            // Muestra los detalles por consola
            console.log('ID ' + selectId + ': ' + selectedOption.value);
            console.log('Producto ' + selectId + ': ' + selectedOption.text);
            console.log('Precio ' + selectId + ': $' + precio.toFixed(2));
        });
    }

    // Llama a la función para manejar el cambio en cada select
    manejarCambioSelect('selectProcesador', 'precioProcesador');
    manejarCambioSelect('selectAlmacenamiento', 'precioAlmacenamiento');
    manejarCambioSelect('selectTarjetaDeVideo', 'precioTarjetaDeVideo');
    manejarCambioSelect('selectFuenteDePoder', 'precioFuenteDePoder');
    manejarCambioSelect('selectCases', 'precioCases');
    manejarCambioSelect('selectMonitor', 'precioMonitor');
    manejarCambioSelect('selectTeclado', 'precioTeclado');
    manejarCambioSelect('selectMouse', 'precioMouse');
    manejarCambioSelect('selectAudifono', 'precioAudifono');
    manejarCambioSelect('selectAccesorio', 'precioAccesorio');
    manejarCambioSelect('selectRefrigeracion', 'precioRefrigeracion');

});

