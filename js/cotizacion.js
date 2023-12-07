// Contenido de tu archivo cotizacion.js

// Definir las relaciones de compatibilidad entre procesadores y placas base
const compatibilidad = {
    "Ryzen 5 5500": ["A", "B"],
    "Ryzen 5 5600G": ["A", "C"],
    "Intel 12400F": ["A", "B"]
};

// Función para cargar las opciones de placas base al seleccionar un procesador
function cargarPlacasBase() {
    // Obtener el elemento select del procesador y la placa base
    const procesadorSelect = document.getElementById("procesador");
    const placaBaseSelect = document.getElementById("placaBase");

    // Obtener el valor seleccionado del procesador
    const procesadorSeleccionado = procesadorSelect.value;

    // Limpiar las opciones actuales de la placa base
    placaBaseSelect.innerHTML = "";

    // Verificar si el procesador seleccionado tiene opciones de placa base asociadas
    if (compatibilidad.hasOwnProperty(procesadorSeleccionado)) {
        // Obtener las opciones de placa base para el procesador seleccionado
        const opcionesPlacaBase = compatibilidad[procesadorSeleccionado];

        // Agregar las opciones de placa base al elemento select
        opcionesPlacaBase.forEach(opcion => {
            const option = document.createElement("option");
            option.value = opcion;
            option.text = opcion;
            placaBaseSelect.add(option);
        });

        // Habilitar el elemento select de la placa base
        placaBaseSelect.disabled = false;
    } else {
        // Si no hay opciones de placa base, deshabilitar el elemento select
        placaBaseSelect.disabled = true;
    }
}

// Fin del contenido de cotizacion.js
