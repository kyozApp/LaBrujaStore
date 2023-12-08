// Contenido de tu archivo cotizacion.js

// Definir las relaciones de compatibilidad entre procesadores y placas base
const compatibilidad = {
    "Ryzen 5 5500": ["Selecciona tu placa base", "PlacaGaming", "B"],
    "Ryzen 5 5600G": ["Selecciona tu placa base", "PlacaGaming", "C"],
    "Intel 12400F": ["Selecciona tu placa base", "PlacaGaming", "B"]
};

// Definir las relaciones entre placas base y memorias RAM
const memoriasPorPlaca = {
    "PlacaGaming": ["Selecciona tu placa base", "8GB", "16GB"],
    "B": ["Selecciona tu placa base", "8GB", "32GB"],
    "C": ["Selecciona tu placa base", "16GB", "32GB"]
};

// Definir las relaciones entre placas base y opciones de almacenamiento
const almacenamientoPorPlaca = {
    "PlacaGaming": ["Selecciona tu placa base", "256GB SSD", "1TB HDD"],
    "B": ["Selecciona tu placa base", "512GB SSD", "2TB HDD"],
    "C": ["Selecciona tu placa base", "1TB SSD", "4TB HDD"]
};

// Definir las relaciones entre procesadores y tarjetas de video
const tarjetasVideoPorProcesador = {
    "Ryzen 5 5500": ["Selecciona tu tarjeta de video", "NVIDIA GTX 1660", "AMD RX 570"],
    "Ryzen 5 5600G": ["Selecciona tu tarjeta de video", "NVIDIA RTX 3060", "AMD RX 6600"],
    "Intel 12400F": ["Selecciona tu tarjeta de video", "NVIDIA RTX 3070", "AMD RX 6700 XT"]
};

// Definir las relaciones entre tarjetas de video y fuentes de poder
const fuentesPoderPorTarjetaVideo = {
    "NVIDIA GTX 1660": ["Selecciona tu tarjeta de video", "500W", "600W"],
    "AMD RX 570": ["Selecciona tu tarjeta de video", "550W", "650W"],
    "NVIDIA RTX 3060": ["Selecciona tu tarjeta de video", "600W", "700W"],
    "AMD RX 6600": ["Selecciona tu tarjeta de video", "650W", "750W"],
    "NVIDIA RTX 3070": ["Selecciona tu tarjeta de video", "700W", "800W"],
    "AMD RX 6700 XT": ["Selecciona tu tarjeta de video", "750W", "850W"]
};

// Definir las relaciones entre placa base, tarjeta de video y cases
const casesPorPlacaYTarjetaVideo = {
    "PlacaGaming": {
        "NVIDIA GTX 1660": ["Selecciona tu placa base", "Case A1", "Case A2"],
        "AMD RX 570": ["Selecciona tu placa base", "Case A1", "Case A3"],
        // Otras combinaciones para la placa A
    },
    "B": {
        "NVIDIA RTX 3060": ["Selecciona tu placa base", "Case B1", "Case B2"],
        "AMD RX 6600": ["Selecciona tu placa base", "Case B1", "Case B3"],
        // Otras combinaciones para la placa B
    },
    "C": {
        "NVIDIA RTX 3070": ["Selecciona tu placa base", "Case C1", "Case C2"],
        "AMD RX 6700 XT": ["Selecciona tu placa base", "Case C1", "Case C3"],
        // Otras combinaciones para la placa C
    }
};

// Definir las relaciones entre procesadores y configuraciones de imágenes
const imagenesProcesador = {
    "Ryzen 5 5500": "../img/cotizacion/procesador/Ryzen 5 4600G.png",
    "Ryzen 5 5600G": "../img/cotizacion/procesador/5-procesador-intel-core-i5-12400f.png",
    "Intel 12400F": "../img/cotizacion/procesador/4-procesador-intel-core-3-12100f.png"
};

const imagenesPlaca = {
    "PlacaGaming": "../img/cotizacion/procesador/Ryzen 5 4600G.png",
    "B": "../img/cotizacion/placa/6-placa-madre-h610m-h-ddr4-gigabyte.png",
    "C": "../img/cotizacion/placa/1-placa-madre-msi-pro-h610m-g-svl-ddr4.png"
};

const imagenesMemoriaRam = {
    "8GB": "../img/cotizacion/memoriaRam/1-memoria-ram-8gb-3200mhz-fury-beast-kingston.png",
    "16GB": "../img/cotizacion/memoriaRam/1-memoria-ram-8gb-3200mhz-fury-beast-kingston.png",
    "32GB": "../img/cotizacion/memoriaRam/1-memoria-ram-8gb-3200mhz-fury-beast-kingston.png"
};

const imagenesAlmacenamiento = {
    "256GB SSD": "../img/cotizacion/almacenamiento/1-ssd-m.2-pcie-500gb-samsung-980-pro.png",
    "512GB SSD": "../img/cotizacion/almacenamiento/1-ssd-m.2-pcie-500gb-samsung-980-pro.png",
    "1TB HDD": "../img/cotizacion/almacenamiento/1-ssd-m.2-pcie-500gb-samsung-980-pro.png",
    "2TB HDD": "../img/cotizacion/almacenamiento/1-ssd-m.2-pcie-500gb-samsung-980-pro.png",
    "4TB HDD": "../img/cotizacion/almacenamiento/1-ssd-m.2-pcie-500gb-samsung-980-pro.png"
};

const imagenesTarjetaVideo = {
    "NVIDIA GTX 1660": "../img/cotizacion/procesador/Ryzen 5 4600G.png",
    "AMD RX 570": "../img/cotizacion/tarjetaDeVideo/2-tarjeta-de-video-rtx4060ti-gigabyte-eagle-oc-8gb.png",
    "NVIDIA RTX 3060": "../img/cotizacion/fuenteDePoder/1-fuente-de-poder-600w-80-plus-bronze-teros.png",
    "AMD RX 6600": "../img/cotizacion/procesador/Ryzen 5 4600G.png",
    "NVIDIA RTX 3070": "../img/cotizacion/procesador/Ryzen 5 4600G.png",
    "AMD RX 6700 XT": "../img/cotizacion/procesador/Ryzen 5 4600G.png"
};

const imagenesFuentePoder = {
    "500W": "../img/cotizacion/fuenteDePoder/1-fuente-de-poder-600w-80-plus-bronze-teros.png",
    "550W": "../img/cotizacion/fuenteDePoder/1-fuente-de-poder-600w-80-plus-bronze-teros.png",
    "600W": "../img/cotizacion/fuenteDePoder/1-fuente-de-poder-600w-80-plus-bronze-teros.png",
    "650W": "../img/cotizacion/fuenteDePoder/1-fuente-de-poder-600w-80-plus-bronze-teros.png",
    "700W": "../img/cotizacion/fuenteDePoder/1-fuente-de-poder-600w-80-plus-bronze-teros.png",
    "750W": "../img/cotizacion/fuenteDePoder/1-fuente-de-poder-600w-80-plus-bronze-teros.png",
    "800W": "../img/cotizacion/fuenteDePoder/1-fuente-de-poder-600w-80-plus-bronze-teros.png",
    "850W": "../img/cotizacion/fuenteDePoder/1-fuente-de-poder-600w-80-plus-bronze-teros.png"
};

const imagenesCase = {
    "Case A1": "../img/cotizacion/case/1-case-gaming-1stplayer-fd3-n.png",
    "Case A2": "../img/cotizacion/case/1-case-gaming-1stplayer-fd3-n.png",
    "Case A3": "../img/cotizacion/case/1-case-gaming-1stplayer-fd3-n.png",
    "Case B1": "../img/cotizacion/case/1-case-gaming-1stplayer-fd3-n.png",
    "Case B2": "../img/cotizacion/case/1-case-gaming-1stplayer-fd3-n.png",
    "Case B3": "../img/cotizacion/case/1-case-gaming-1stplayer-fd3-n.png",
    "Case C1": "../img/cotizacion/case/1-case-gaming-1stplayer-fd3-n.png",
    "Case C2": "../img/cotizacion/case/1-case-gaming-1stplayer-fd3-n.png",
    "Case C3": "../img/cotizacion/case/1-case-gaming-1stplayer-fd3-n.png"
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
    const imagenProcesador = document.getElementById("imagenProcesador");
    const imagenPlaca = document.getElementById("imagenPlaca");
    const imagenMemoriaRam = document.getElementById("imagenMemoriaRam");
    const imagenAlmacenamiento = document.getElementById("imagenAlmacenamiento");
    const imagenTarjetaVideo = document.getElementById("imagenTarjetaVideo");
    const imagenFuentePoder = document.getElementById("imagenFuentePoder");
    const imagenCase = document.getElementById("imagenCase");

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

    // Actualizar la imagen del procesador según la selección
    imagenProcesador.src = imagenesProcesador[procesadorSeleccionado] || "";

    // Al seleccionar una placa base, actualizar la imagen de la placa base
    // ...

    // Al seleccionar una placa base, actualizar la imagen de la placa base
    placaBaseSelect.onchange = function () {
        const placaBaseSeleccionada = placaBaseSelect.value;

        // Actualizar la imagen de la placa base según la selección
        imagenPlaca.src = imagenesPlaca[placaBaseSeleccionada] || "";
    };

    // ...

    // Al seleccionar una memoria RAM, actualizar la imagen de la memoria RAM
    memoriaRamSelect.onchange = function () {
        const memoriaRamSeleccionada = memoriaRamSelect.value;

        // Actualizar la imagen de la memoria RAM según la selección
        const imagenMemoriaRam = document.getElementById("imagenMemoriaRam");
        imagenMemoriaRam.src = imagenesMemoriaRam[memoriaRamSeleccionada] || "";
    };

    // Al seleccionar un almacenamiento, actualizar la imagen del almacenamiento
    almacenamientoSelect.onchange = function () {
        const almacenamientoSeleccionado = almacenamientoSelect.value;

        // Actualizar la imagen del almacenamiento según la selección
        const imagenAlmacenamiento = document.getElementById("imagenAlmacenamiento");
        imagenAlmacenamiento.src = imagenesAlmacenamiento[almacenamientoSeleccionado] || "";
    };

    // Al seleccionar una tarjeta de video, actualizar la imagen de la tarjeta de video
    tarjetaVideoSelect.onchange = function () {
        const tarjetaVideoSeleccionada = tarjetaVideoSelect.value;

        // Actualizar la imagen de la tarjeta de video según la selección
        const imagenTarjetaVideo = document.getElementById("imagenTarjetaVideo");
        imagenTarjetaVideo.src = imagenesTarjetaVideo[tarjetaVideoSeleccionada] || "";
    };

    // Al seleccionar una fuente de poder, actualizar la imagen de la fuente de poder
    fuentePoderSelect.onchange = function () {
        const fuentePoderSeleccionada = fuentePoderSelect.value;

        // Actualizar la imagen de la fuente de poder según la selección
        const imagenFuentePoder = document.getElementById("imagenFuentePoder");
        imagenFuentePoder.src = imagenesFuentePoder[fuentePoderSeleccionada] || "";
    };

    // Al seleccionar un case, actualizar la imagen del case
    caseSelect.onchange = function () {
        const caseSeleccionado = caseSelect.value;

        // Actualizar la imagen del case según la selección
        const imagenCase = document.getElementById("imagenCase");
        imagenCase.src = imagenesCase[caseSeleccionado] || "";
    };


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

        // Actualizar la imagen de la placa base según la selección
        imagenPlaca.src = imagenesPlaca[placaBaseSeleccionada] || "";
    };

}

// Fin del contenido de cotizacion.js
