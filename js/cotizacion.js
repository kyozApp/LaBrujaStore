// Contenido de tu archivo cotizacion.js

// Variables globales para almacenar las selecciones
let procesadorSeleccionado = "";
let placaBaseSeleccionada = "";
let memoriaRamSeleccionada = "";
let almacenamientoSeleccionado = "";
let tarjetaVideoSeleccionada = "";
let fuentePoderSeleccionada = "";
let caseSeleccionado = "";

// Lista de números de teléfono de WhatsApp
const numerosWhatsApp = ['51985872694', '51979578623', '51927993661'];

// Índice para llevar un seguimiento del número de teléfono actual
let indiceNumeroWhatsApp = 0;


// Definir las relaciones de compatibilidad entre procesadores y placas base
const compatibilidad = {
    "Ryzen 5 5500": ["Selecciona tu placa", "PlacaGaming", "PlacaBásica"],
    "Ryzen 5 5600G": ["Selecciona tu placa", "PlacaGaming", "PlacaPremium"],
    "Intel 12400F": ["Selecciona tu placa", "PlacaGaming", "PlacaBásica"]
};

// Definir las relaciones entre placas base y memorias RAM
const memoriasPorPlaca = {
    "PlacaGaming": ["Selecciona tu memoria ram", "8GB", "16GB"],
    "PlacaBásica": ["Selecciona tu memoria ram", "8GB", "32GB"],
    "PlacaPremium": ["Selecciona tu memoria ram", "16GB", "32GB"]
};

// Definir las relaciones entre placas base y opciones de almacenamiento
const almacenamientoPorPlaca = {
    "PlacaGaming": ["Selecciona tu almacenamiento", "256GB SSD", "1TB HDD"],
    "PlacaBásica": ["Selecciona tu almacenamiento", "512GB SSD", "2TB HDD"],
    "PlacaPremium": ["Selecciona tu almacenamiento", "1TB SSD", "4TB HDD"]
};

// Definir las relaciones entre procesadores y tarjetas de video
const tarjetasVideoPorProcesador = {
    "Ryzen 5 5500": ["Selecciona tu tarjeta de video", "NVIDIA GTX 1660", "AMD RX 570"],
    "Ryzen 5 5600G": ["Selecciona tu tarjeta de video", "NVIDIA RTX 3060", "AMD RX 6600"],
    "Intel 12400F": ["Selecciona tu tarjeta de video", "NVIDIA RTX 3070", "AMD RX 6700 XT"]
};

// Definir las relaciones entre tarjetas de video y fuentes de poder
const fuentesPoderPorTarjetaVideo = {
    "NVIDIA GTX 1660": ["Selecciona tu fuente de poder", "500W", "600W"],
    "AMD RX 570": ["Selecciona tu fuente de poder", "550W", "650W"],
    "NVIDIA RTX 3060": ["Selecciona tu fuente de poder", "600W", "700W"],
    "AMD RX 6600": ["Selecciona tu fuente de poder", "650W", "750W"],
    "NVIDIA RTX 3070": ["Selecciona tu fuente de poder", "700W", "800W"],
    "AMD RX 6700 XT": ["Selecciona tu fuente de poder", "750W", "850W"]
};

// Definir las relaciones entre placa base, tarjeta de video y cases
const casesPorPlacaYTarjetaVideo = {
    "PlacaGaming": {
        "NVIDIA GTX 1660": ["Selecciona tu case", "CaseGaming1", "CaseGaming2"],
        "AMD RX 570": ["Selecciona tu case", "CaseGaming1", "CaseGaming3"],
        // Otras combinaciones para la placa PlacaGaming
    },
    "PlacaBásica": {
        "NVIDIA RTX 3060": ["Selecciona tu case", "CaseBásico1", "CaseBásico2"],
        "AMD RX 6600": ["Selecciona tu case", "CaseBásico1", "CaseBásico3"],
        // Otras combinaciones para la placa PlacaBásica
    },
    "PlacaPremium": {
        "NVIDIA RTX 3070": ["Selecciona tu case", "CasePremium1", "CasePremium2"],
        "AMD RX 6700 XT": ["Selecciona tu case", "CasePremium1", "CasePremium3"],
        // Otras combinaciones para la placa PlacaPremium
    }
};

// Función para cargar las opciones de placas base al seleccionar un procesador
function cargarPlacasBase() {
    // Obtener el elemento select del procesador, la placa base, la memoria RAM, el almacenamiento, la tarjeta de video, la fuente de poder y el case
    const procesadorSelect = document.getElementById("procesador");
    const placaBaseSelect = document.getElementById("placaBase");
    const memoriaRamSelect = document.getElementById("memoriaRam");
    const almacenamientoSelect = document.getElementById("almacenamiento");
    const tarjetaVideoSelect = document.getElementById("tarjetaVideo");
    const fuentePoderSelect = document.getElementById("fuentePoder");
    const caseSelect = document.getElementById("case");

    // Obtener el valor seleccionado del procesador
    const procesadorSeleccionado = procesadorSelect.value;

    // Limpiar las opciones actuales de la placa base, memoria RAM, almacenamiento, tarjeta de video, fuente de poder y case
    placaBaseSelect.innerHTML = "";
    memoriaRamSelect.innerHTML = "";
    almacenamientoSelect.innerHTML = "";
    tarjetaVideoSelect.innerHTML = "";
    fuentePoderSelect.innerHTML = "";
    caseSelect.innerHTML = "";

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

    // Al seleccionar una placa base, cargar las opciones de memoria RAM, almacenamiento, tarjeta de video, fuente de poder y case asociadas
    placaBaseSelect.onchange = function () {
        const placaBaseSeleccionada = placaBaseSelect.value;

        // Limpiar las opciones actuales de la memoria RAM, almacenamiento, tarjeta de video, fuente de poder y case
        memoriaRamSelect.innerHTML = "";
        almacenamientoSelect.innerHTML = "";
        tarjetaVideoSelect.innerHTML = "";
        fuentePoderSelect.innerHTML = "";
        caseSelect.innerHTML = "";

        // Obtener las opciones de memoria RAM para la placa base seleccionada
        const opcionesMemoriaRam = memoriasPorPlaca[placaBaseSeleccionada];

        // Agregar las opciones de memoria RAM al elemento select
        opcionesMemoriaRam.forEach(opcion => {
            const option = document.createElement("option");
            option.value = opcion;
            option.text = opcion;
            memoriaRamSelect.add(option);
        });

        // Obtener las opciones de almacenamiento para la placa base seleccionada
        const opcionesAlmacenamiento = almacenamientoPorPlaca[placaBaseSeleccionada];

        // Agregar las opciones de almacenamiento al elemento select
        opcionesAlmacenamiento.forEach(opcion => {
            const option = document.createElement("option");
            option.value = opcion;
            option.text = opcion;
            almacenamientoSelect.add(option);
        });

        // Obtener las opciones de tarjeta de video para el procesador seleccionado
        const opcionesTarjetaVideo = tarjetasVideoPorProcesador[procesadorSeleccionado];

        // Agregar las opciones de tarjeta de video al elemento select
        opcionesTarjetaVideo.forEach(opcion => {
            const option = document.createElement("option");
            option.value = opcion;
            option.text = opcion;
            tarjetaVideoSelect.add(option);
        });

        // Al seleccionar una tarjeta de video, cargar las opciones de fuente de poder y case asociadas
        tarjetaVideoSelect.onchange = function () {
            const tarjetaVideoSeleccionada = tarjetaVideoSelect.value;

            // Limpiar las opciones actuales de la fuente de poder y case
            fuentePoderSelect.innerHTML = "";
            caseSelect.innerHTML = "";

            // Obtener las opciones de fuente de poder para la tarjeta de video seleccionada
            const opcionesFuentePoder = fuentesPoderPorTarjetaVideo[tarjetaVideoSeleccionada];

            // Agregar las opciones de fuente de poder al elemento select
            opcionesFuentePoder.forEach(opcion => {
                const option = document.createElement("option");
                option.value = opcion;
                option.text = opcion;
                fuentePoderSelect.add(option);
            });

            // Obtener la placa base seleccionada para cargar las opciones de case
            const placaBaseSeleccionada = placaBaseSelect.value;

            // Verificar si hay opciones de case para la placa base y tarjeta de video seleccionadas
            if (casesPorPlacaYTarjetaVideo.hasOwnProperty(placaBaseSeleccionada) &&
                casesPorPlacaYTarjetaVideo[placaBaseSeleccionada].hasOwnProperty(tarjetaVideoSeleccionada)) {

                // Obtener las opciones de case para la placa base y tarjeta de video seleccionadas
                const opcionesCase = casesPorPlacaYTarjetaVideo[placaBaseSeleccionada][tarjetaVideoSeleccionada];

                // Agregar las opciones de case al elemento select
                opcionesCase.forEach(opcion => {
                    const option = document.createElement("option");
                    option.value = opcion;
                    option.text = opcion;
                    caseSelect.add(option);
                });

                // Habilitar el elemento select de case
                caseSelect.disabled = false;
            } else {
                // Si no hay opciones de case, deshabilitar el elemento select
                caseSelect.disabled = true;
            }

            // Habilitar el elemento select de la fuente de poder
            fuentePoderSelect.disabled = false;
        };

        // Habilitar los elementos select de memoria RAM, almacenamiento, tarjeta de video, fuente de poder y case
        memoriaRamSelect.disabled = false;
        almacenamientoSelect.disabled = false;
        tarjetaVideoSelect.disabled = false;
        fuentePoderSelect.disabled = false;
        caseSelect.disabled = false;
    };
}

// Función para generar la cotización y enviar a WhatsApp
function generarCotizacion() {
    // Obtener el valor seleccionado del procesador
    procesadorSeleccionado = document.getElementById("procesador").value;

    // Obtener el valor seleccionado de la placa base
    placaBaseSeleccionada = document.getElementById("placaBase").value;

    // Obtener el valor seleccionado de la memoria RAM
    memoriaRamSeleccionada = document.getElementById("memoriaRam").value;

    // Obtener el valor seleccionado del almacenamiento
    almacenamientoSeleccionado = document.getElementById("almacenamiento").value;

    // Obtener el valor seleccionado de la tarjeta de video
    tarjetaVideoSeleccionada = document.getElementById("tarjetaVideo").value;

    // Obtener el valor seleccionado de la fuente de poder
    fuentePoderSeleccionada = document.getElementById("fuentePoder").value;

    // Obtener el valor seleccionado del case
    caseSeleccionado = document.getElementById("case").value;

    // Construir el mensaje de cotización
    const mensajeCotizacion = `
        Cotización:
        Procesador: ${procesadorSeleccionado}
        Placa Base: ${placaBaseSeleccionada}
        Memoria RAM: ${memoriaRamSeleccionada}
        Almacenamiento: ${almacenamientoSeleccionado}
        Tarjeta de Video: ${tarjetaVideoSeleccionada}
        Fuente de Poder: ${fuentePoderSeleccionada}
        Case: ${caseSeleccionado}
    `;

    // Número de teléfono de WhatsApp al que enviar el mensaje
    const numeroWhatsAppActual = numerosWhatsApp[indiceNumeroWhatsApp];

    // Crear el enlace de WhatsApp
    const enlaceWhatsApp = `https://wa.me/${numeroWhatsAppActual}?text=${encodeURIComponent(mensajeCotizacion)}`;

    // Redireccionar a la página de WhatsApp
    window.location.href = enlaceWhatsApp;

    // Incrementar el índice para el próximo número de teléfono
    indiceNumeroWhatsApp = (indiceNumeroWhatsApp + 1) % numerosWhatsApp.length;
}

// Fin del contenido de cotizacion.js
