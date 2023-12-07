// ... (otras funciones)

// Nueva función para obtener la lista de procesadores desde el servidor
function obtenerListaProcesadores(callback) {
    fetch('../view/obtener_procesador.php')
        .then(response => response.json())
        .then(data => {
            // Llamar al callback con la lista de procesadores
            callback(data.procesadores);
        })
        .catch(error => {
            console.error('Error al obtener la lista de procesadores:', error);
            // Manejar el error de otra manera si es necesario
            callback([]);
        });
}

// Modificar la función cargarPlacasBase para obtener y cargar dinámicamente la lista de procesadores
function cargarPlacasBase() {
    var procesadorSelect = document.querySelector(".procesador");
    var placaBaseSelect = document.querySelector(".placaBase");
    var imagenProcesador = document.querySelector(".imagenProcesador");
    var imagenPlaca = document.querySelector(".imagenPlaca");
    var procesadorSeleccionado = procesadorSelect.value;

    placaBaseSelect.innerHTML = ""; // Limpiar las opciones actuales de placa base

    // Lógica para cargar dinámicamente las opciones de procesador
    obtenerListaProcesadores(function (listaProcesadores) {
        // Limpiar las opciones actuales de procesador
        procesadorSelect.innerHTML = "";

        // Agregar las opciones de procesador
        listaProcesadores.forEach(function (procesador) {
            var option = document.createElement("option");
            option.value = procesador.Nombre;
            option.text = procesador.Nombre;
            procesadorSelect.add(option);
        });

        // Obtener la imagen del procesador seleccionado desde el servidor
        obtenerImagenProcesador(procesadorSeleccionado, function (imagenProcesadorURL) {
            // Actualizar la imagen del procesador en la interfaz
            imagenProcesador.src = imagenProcesadorURL;
        });
    });

    // ... (resto de la función)
}
