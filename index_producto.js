function mostrarPlacasCompatibles() {
    // Obtiene el valor seleccionado del select de procesadores
    var idProcesador = document.getElementById('productosProcesador').value;

    // Realiza la consulta para obtener las placas compatibles con el procesador seleccionado
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Parsea la respuesta JSON
            var placas = JSON.parse(this.responseText);

            // Actualiza las opciones del select de placas
            var selectPlaca = document.getElementById('productosPlaca');
            selectPlaca.innerHTML = '<option value="" selected>Selecciona un procesador primero</option>';

            for (var i = 0; i < placas.length; i++) {
                selectPlaca.innerHTML += '<option value="' + placas[i].Precio + '">' + placas[i].Producto + '</option>';
            }
        }
    };

    xmlhttp.open("GET", "obtener_placas_compatibles.php?id_procesador=" + idProcesador, true);
    xmlhttp.send();
}


function mostrarPrecio(spanId, selectElement) {
    // Obtiene el valor seleccionado del select
    var precio = parseFloat(selectElement.value) || 0;

    // Actualiza el contenido del span con el precio seleccionado
    document.getElementById(spanId).innerHTML = 'Precio: ' + precio.toFixed(2);

    // Calcula la suma total de precios
    var totalProcesador = parseFloat(document.getElementById('productosProcesador').value) || 0;
    var totalAlmacenamiento1 = parseFloat(document.getElementById('productosAlmacenamiento1').value) || 0;
    var totalAlmacenamiento2 = parseFloat(document.getElementById('productosAlmacenamiento2').value) || 0;
    var totalPlaca = parseFloat(document.getElementById('productosPlaca').value) || 0;

    var sumaTotal = totalProcesador + totalAlmacenamiento1 + totalAlmacenamiento2 + totalPlaca;

    // Muestra la suma total
    document.getElementById('sumaTotal').innerHTML = 'Suma Total: ' + sumaTotal.toFixed(2);
}
