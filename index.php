<?php
// Incluir tu archivo de conexión
include 'conexiondb/conexion.php';

// Realizar la consulta para obtener los procesadores
$queryProcesadores = "SELECT Id_Procesador, Producto, Precio FROM procesador";
$resultProcesadores = $conexion->query($queryProcesadores);

// Realizar la consulta para obtener las placas
$queryPlacas = "SELECT Id_Placa, Producto, Producto FROM placa";
$resultPlacas = $conexion->query($queryPlacas);

// Verificar si las consultas fueron exitosas
if ($resultProcesadores && $resultPlacas) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="estilo.css">
    </head>

    <body>
        <main>
            <!-- Primer select para procesadores -->
            <label for="procesador">Procesador:</label>
            <select name="procesador" id="procesador">
                <option value="" selected>Seleccionar</option>
                <?php
                while ($rowProcesador = $resultProcesadores->fetch_assoc()) {
                    echo "<option value='{$rowProcesador['Id_Procesador']}' data-precio='{$rowProcesador['Precio']}'>{$rowProcesador['Producto']}</option>";
                }
                ?>
            </select>
            <span id="precioProcesador">Precio: S/. 0.00</span>

            <!-- Segundo select para placas -->
            <label for="placa">Placa:</label>
            <select name="placa" id="placa">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioPlaca">Precio: S/. 0.00</span>

            <!-- Primer select para memorias RAM -->
            <label for="memoriaRam1">Memoria RAM 1:</label>
            <select name="memoriaRam1" id="memoriaRam1">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioMemoriaRam1">Precio: S/. 0.00</span>

            <!-- Segundo select para memorias RAM -->
            <label for="memoriaRam2">Memoria RAM 2:</label>
            <select name="memoriaRam2" id="memoriaRam2">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioMemoriaRam2">Precio: S/. 0.00</span>

            <!-- Cuarto select para almacenamiento 1 -->
            <label for="almacenamiento1">Almacenamiento 1:</label>
            <select name="almacenamiento1" id="almacenamiento1">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioAlmacenamiento1">Precio: S/. 0.00</span>

            <!-- Quinto select para almacenamiento 2 -->
            <label for="almacenamiento2">Almacenamiento 2:</label>
            <select name="almacenamiento2" id="almacenamiento2">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioAlmacenamiento2">Precio: S/. 0.00</span>

            <!-- Sexto select para tarjeta de video -->
            <label for="tarjetaDeVideo">Tarjeta de Video:</label>
            <select name="tarjetaDeVideo" id="tarjetaDeVideo">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioTarjetaDeVideo">Precio: S/. 0.00</span>

            <!-- Séptimo select para fuente de poder -->
            <label for="fuenteDePoder">Fuente de Poder:</label>
            <select name="fuenteDePoder" id="fuenteDePoder">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioFuenteDePoder">Precio: S/. 0.00</span>

            <!-- Octavo select para cases -->
            <label for="cases">Cases:</label>
            <select name="cases" id="cases">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioCases">Precio: S/. 0.00</span>

            <!-- Noveno select para monitores -->
            <label for="monitores">Monitores:</label>
            <select name="monitores" id="monitores">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioMonitores">Precio: S/. 0.00</span>

            <!-- Décimo select para teclados -->
            <label for="teclados">Teclados:</label>
            <select name="teclados" id="teclados">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioTeclados">Precio: S/. 0.00</span>

            <!-- Undécimo select para mouses -->
            <label for="mouses">Mouses:</label>
            <select name="mouses" id="mouses">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioMouses">Precio: S/. 0.00</span>

            <!-- Duodécimo select para audífonos -->
            <label for="audifonos">Audífonos:</label>
            <select name="audifonos" id="audifonos">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioAudifonos">Precio: S/. 0.00</span>

            <!-- Décimo tercer select para refrigeración -->
            <label for="refrigeracion">Refrigeración:</label>
            <select name="refrigeracion" id="refrigeracion">
                <option value="" disabled selected>Seleccionar</option>
                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
            </select>
            <span id="precioRefrigeracion">Precio: S/. 0.00</span>

            <script>
                // Lógica de JavaScript para actualizar las opciones del segundo y tercer select y los precios
                document.getElementById('procesador').addEventListener('change', function() {
                    // Obtener el valor y el precio seleccionado del primer select
                    var idProcesador = this.value;
                    var precioProcesador = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Actualizar el precio del procesador en el span
                    document.getElementById('precioProcesador').textContent = "Precio: S/. " + (isNaN(precioProcesador) ? '0.00' : precioProcesador.toFixed(2));

                    // Restablecer el precio de la placa y memorias RAM a "Precio no disponible"
                    document.getElementById('precioPlaca').textContent = "Precio: S/. ";
                    document.getElementById('precioMemoriaRam1').textContent = "Precio: S/. ";
                    document.getElementById('precioMemoriaRam2').textContent = "Precio: S/. ";

                    // Realizar una solicitud AJAX para obtener las placas compatibles
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del segundo select
                            document.getElementById('placa').innerHTML = '';

                            // Parsear la respuesta JSON
                            var placas = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al segundo select
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById('placa').add(optionSeleccionar);

                            // Agregar las nuevas opciones al segundo select
                            for (var i = 0; i < placas.length; i++) {
                                var option = document.createElement('option');
                                option.value = placas[i].Id_Placa;
                                option.text = placas[i].Producto;
                                option.setAttribute('data-precio', placas[i].Precio);
                                document.getElementById('placa').add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_placas.php?Id_Procesador=" + idProcesador, true);
                    xhttp.send();
                });

                // Lógica para actualizar el precio de la placa seleccionada
                document.getElementById('placa').addEventListener('change', function() {
                    // Obtener el precio seleccionado del segundo select
                    var precioPlaca = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioPlaca)) {
                        // Actualizar el precio de la placa en el span
                        document.getElementById('precioPlaca').textContent = "Precio: S/. " + precioPlaca.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById('precioPlaca').textContent = "Precio: S/. 0.00";
                    }

                    // Restablecer el precio de las memorias RAM a "Precio no disponible"
                    document.getElementById('precioMemoriaRam1').textContent = "Precio: S/. ";
                    document.getElementById('precioMemoriaRam2').textContent = "Precio: S/. ";
                });

                // Lógica para cargar las opciones de memoria RAM compatibles con la placa seleccionada
                function cargarMemoriasRam(idPlaca, selectorMemoriaRam, selectorPrecioMemoriaRam) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del selector de memoria RAM
                            document.getElementById(selectorMemoriaRam).innerHTML = '';

                            // Parsear la respuesta JSON
                            var memoriasRam = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al selector de memoria RAM
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById(selectorMemoriaRam).add(optionSeleccionar);

                            // Agregar las nuevas opciones al selector de memoria RAM
                            for (var i = 0; i < memoriasRam.length; i++) {
                                var option = document.createElement('option');
                                option.value = memoriasRam[i].Id_MemoriaRam;
                                option.text = memoriasRam[i].Producto;
                                option.setAttribute('data-precio', memoriasRam[i].Precio);
                                document.getElementById(selectorMemoriaRam).add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_memorias_ram.php?Id_Placa=" + idPlaca, true);
                    xhttp.send();
                }

                // Lógica para cargar las opciones de memoria RAM compatibles con la placa seleccionada
                document.getElementById('placa').addEventListener('change', function() {
                    cargarMemoriasRam(this.value, 'memoriaRam1', 'precioMemoriaRam1');
                    cargarMemoriasRam(this.value, 'memoriaRam2', 'precioMemoriaRam2');
                });

                // Lógica para actualizar el precio de la memoria RAM seleccionada
                function actualizarPrecioMemoriaRam(selectorMemoriaRam, selectorPrecioMemoriaRam) {
                    // Obtener el precio seleccionado del selector de memoria RAM
                    var precioMemoriaRam = parseFloat(document.getElementById(selectorMemoriaRam).options[document.getElementById(selectorMemoriaRam).selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioMemoriaRam)) {
                        // Actualizar el precio de la memoria RAM en el span
                        document.getElementById(selectorPrecioMemoriaRam).textContent = "Precio: S/. " + precioMemoriaRam.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById(selectorPrecioMemoriaRam).textContent = "Precio: S/. 0.00";
                    }
                }

                // Lógica para actualizar el precio de la memoria RAM 1 seleccionada
                document.getElementById('memoriaRam1').addEventListener('change', function() {
                    actualizarPrecioMemoriaRam('memoriaRam1', 'precioMemoriaRam1');
                });

                // Lógica para actualizar el precio de la memoria RAM 2 seleccionada
                document.getElementById('memoriaRam2').addEventListener('change', function() {
                    actualizarPrecioMemoriaRam('memoriaRam2', 'precioMemoriaRam2');
                });

                // Lógica para cargar las opciones de almacenamiento desde la base de datos
                function cargarAlmacenamientos(selectId) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select específico
                            document.getElementById(selectId).innerHTML = '';

                            // Parsear la respuesta JSON
                            var almacenamientos = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select específico
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById(selectId).add(optionSeleccionar);

                            // Agregar las nuevas opciones al select específico
                            for (var i = 0; i < almacenamientos.length; i++) {
                                var option = document.createElement('option');
                                option.value = almacenamientos[i].Id_Almacenamiento;
                                option.text = almacenamientos[i].Producto;
                                option.setAttribute('data-precio', almacenamientos[i].Precio);
                                document.getElementById(selectId).add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_almacenamientos_2.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar los almacenamientos al cargar la página
                cargarAlmacenamientos('almacenamiento1');
                cargarAlmacenamientos('almacenamiento2');

                // Lógica para actualizar el precio del almacenamiento seleccionado
                function actualizarPrecioAlmacenamiento(selectId, spanId) {
                    document.getElementById(selectId).addEventListener('change', function() {
                        // Obtener el precio seleccionado del select específico
                        var precioAlmacenamiento = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                        // Verificar si el precio es un número válido
                        if (!isNaN(precioAlmacenamiento)) {
                            // Actualizar el precio del almacenamiento en el span específico
                            document.getElementById(spanId).textContent = "Precio: S/. " + precioAlmacenamiento.toFixed(2);
                        } else {
                            // Manejar el caso en que el precio no sea un número válido
                            document.getElementById(spanId).textContent = "Precio: S/. 0.00";
                        }
                    });
                }

                // Lógica para actualizar el precio del almacenamiento 1 seleccionado
                actualizarPrecioAlmacenamiento('almacenamiento1', 'precioAlmacenamiento1');

                // Lógica para actualizar el precio del almacenamiento 2 seleccionado
                actualizarPrecioAlmacenamiento('almacenamiento2', 'precioAlmacenamiento2');

                // Lógica para cargar las opciones de tarjeta de video desde la base de datos
                function cargarTarjetasDeVideo() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select de tarjeta de video
                            document.getElementById('tarjetaDeVideo').innerHTML = '';

                            // Parsear la respuesta JSON
                            var tarjetasDeVideo = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select de tarjeta de video
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById('tarjetaDeVideo').add(optionSeleccionar);

                            // Agregar las nuevas opciones al select de tarjeta de video
                            for (var i = 0; i < tarjetasDeVideo.length; i++) {
                                var option = document.createElement('option');
                                option.value = tarjetasDeVideo[i].Id_TarjetaDeVideo;
                                option.text = tarjetasDeVideo[i].Producto;
                                option.setAttribute('data-precio', tarjetasDeVideo[i].Precio);
                                document.getElementById('tarjetaDeVideo').add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_tarjetas_de_video.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar las tarjetas de video al cargar la página
                cargarTarjetasDeVideo();

                // Lógica para actualizar el precio de la tarjeta de video seleccionada
                document.getElementById('tarjetaDeVideo').addEventListener('change', function() {
                    // Obtener el precio seleccionado del select de tarjeta de video
                    var precioTarjetaDeVideo = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioTarjetaDeVideo)) {
                        // Actualizar el precio de la tarjeta de video en el span
                        document.getElementById('precioTarjetaDeVideo').textContent = "Precio: S/. " + precioTarjetaDeVideo.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById('precioTarjetaDeVideo').textContent = "Precio: S/. 0.00";
                    }
                });
                // Lógica para cargar las opciones de fuente de poder desde la base de datos
                function cargarFuentesDePoder() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select de fuente de poder
                            document.getElementById('fuenteDePoder').innerHTML = '';

                            // Parsear la respuesta JSON
                            var fuentesDePoder = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select de fuente de poder
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById('fuenteDePoder').add(optionSeleccionar);

                            // Agregar las nuevas opciones al select de fuente de poder
                            for (var i = 0; i < fuentesDePoder.length; i++) {
                                var option = document.createElement('option');
                                option.value = fuentesDePoder[i].Id_FuenteDePoder;
                                option.text = fuentesDePoder[i].Producto;
                                option.setAttribute('data-precio', fuentesDePoder[i].Precio);
                                document.getElementById('fuenteDePoder').add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_fuentes_de_poder.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar las fuentes de poder al cargar la página
                cargarFuentesDePoder();

                // Lógica para actualizar el precio de la fuente de poder seleccionada
                document.getElementById('fuenteDePoder').addEventListener('change', function() {
                    // Obtener el precio seleccionado del select de fuente de poder
                    var precioFuenteDePoder = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioFuenteDePoder)) {
                        // Actualizar el precio de la fuente de poder en el span
                        document.getElementById('precioFuenteDePoder').textContent = "Precio: S/. " + precioFuenteDePoder.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById('precioFuenteDePoder').textContent = "Precio: S/. 0.00";
                    }
                });
                // Lógica para cargar las opciones de cases desde la base de datos
                function cargarCases() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select de cases
                            document.getElementById('cases').innerHTML = '';

                            // Parsear la respuesta JSON
                            var cases = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select de cases
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById('cases').add(optionSeleccionar);

                            // Agregar las nuevas opciones al select de cases
                            for (var i = 0; i < cases.length; i++) {
                                var option = document.createElement('option');
                                option.value = cases[i].Id_Cases;
                                option.text = cases[i].Producto;
                                option.setAttribute('data-precio', cases[i].Precio);
                                document.getElementById('cases').add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_cases.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar los cases al cargar la página
                cargarCases();

                // Lógica para actualizar el precio del cases seleccionado
                document.getElementById('cases').addEventListener('change', function() {
                    // Obtener el precio seleccionado del select de cases
                    var precioCases = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioCases)) {
                        // Actualizar el precio del cases en el span
                        document.getElementById('precioCases').textContent = "Precio: S/. " + precioCases.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById('precioCases').textContent = "Precio: S/. 0.00";
                    }
                });
                // Lógica para cargar las opciones de monitores desde la base de datos
                function cargarMonitores() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select de monitores
                            document.getElementById('monitores').innerHTML = '';

                            // Parsear la respuesta JSON
                            var monitores = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select de monitores
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById('monitores').add(optionSeleccionar);

                            // Agregar las nuevas opciones al select de monitores
                            for (var i = 0; i < monitores.length; i++) {
                                var option = document.createElement('option');
                                option.value = monitores[i].Id_Monitor;
                                option.text = monitores[i].Producto;
                                option.setAttribute('data-precio', monitores[i].Precio);
                                document.getElementById('monitores').add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_monitores.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar los monitores al cargar la página
                cargarMonitores();

                // Lógica para actualizar el precio del monitor seleccionado
                document.getElementById('monitores').addEventListener('change', function() {
                    // Obtener el precio seleccionado del select de monitores
                    var precioMonitores = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioMonitores)) {
                        // Actualizar el precio del monitor en el span
                        document.getElementById('precioMonitores').textContent = "Precio: S/. " + precioMonitores.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById('precioMonitores').textContent = "Precio: S/. 0.00";
                    }
                });
                // Lógica para cargar las opciones de teclados desde la base de datos
                function cargarTeclados() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select de teclados
                            document.getElementById('teclados').innerHTML = '';

                            // Parsear la respuesta JSON
                            var teclados = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select de teclados
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById('teclados').add(optionSeleccionar);

                            // Agregar las nuevas opciones al select de teclados
                            for (var i = 0; i < teclados.length; i++) {
                                var option = document.createElement('option');
                                option.value = teclados[i].Id_Teclado;
                                option.text = teclados[i].Producto;
                                option.setAttribute('data-precio', teclados[i].Precio);
                                document.getElementById('teclados').add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_teclados.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar los teclados al cargar la página
                cargarTeclados();

                // Lógica para actualizar el precio del teclado seleccionado
                document.getElementById('teclados').addEventListener('change', function() {
                    // Obtener el precio seleccionado del select de teclados
                    var precioTeclados = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioTeclados)) {
                        // Actualizar el precio del teclado en el span
                        document.getElementById('precioTeclados').textContent = "Precio: S/. " + precioTeclados.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById('precioTeclados').textContent = "Precio: S/. 0.00";
                    }
                });
                // Lógica para cargar las opciones de mouses desde la base de datos
                function cargarMouses() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select de mouses
                            document.getElementById('mouses').innerHTML = '';

                            // Parsear la respuesta JSON
                            var mouses = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select de mouses
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById('mouses').add(optionSeleccionar);

                            // Agregar las nuevas opciones al select de mouses
                            for (var i = 0; i < mouses.length; i++) {
                                var option = document.createElement('option');
                                option.value = mouses[i].Id_Mouse;
                                option.text = mouses[i].Producto;
                                option.setAttribute('data-precio', mouses[i].Precio);
                                document.getElementById('mouses').add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_mouses.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar los mouses al cargar la página
                cargarMouses();

                // Lógica para actualizar el precio del mouse seleccionado
                document.getElementById('mouses').addEventListener('change', function() {
                    // Obtener el precio seleccionado del select de mouses
                    var precioMouses = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioMouses)) {
                        // Actualizar el precio del mouse en el span
                        document.getElementById('precioMouses').textContent = "Precio: S/. " + precioMouses.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById('precioMouses').textContent = "Precio: S/. 0.00";
                    }
                });
                // Lógica para cargar las opciones de audífonos desde la base de datos
                function cargarAudifonos() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select de audífonos
                            document.getElementById('audifonos').innerHTML = '';

                            // Parsear la respuesta JSON
                            var audifonos = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select de audífonos
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById('audifonos').add(optionSeleccionar);

                            // Agregar las nuevas opciones al select de audífonos
                            for (var i = 0; i < audifonos.length; i++) {
                                var option = document.createElement('option');
                                option.value = audifonos[i].Id_Audifono;
                                option.text = audifonos[i].Producto;
                                option.setAttribute('data-precio', audifonos[i].Precio);
                                document.getElementById('audifonos').add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_audifonos.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar los audífonos al cargar la página
                cargarAudifonos();

                // Lógica para actualizar el precio del audífono seleccionado
                document.getElementById('audifonos').addEventListener('change', function() {
                    // Obtener el precio seleccionado del select de audífonos
                    var precioAudifonos = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioAudifonos)) {
                        // Actualizar el precio del audífono en el span
                        document.getElementById('precioAudifonos').textContent = "Precio: S/. " + precioAudifonos.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById('precioAudifonos').textContent = "Precio: S/. 0.00";
                    }
                });
                // Lógica para cargar las opciones de refrigeración desde la base de datos
                function cargarRefrigeracion() {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select de refrigeración
                            document.getElementById('refrigeracion').innerHTML = '';

                            // Parsear la respuesta JSON
                            var refrigeraciones = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select de refrigeración
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById('refrigeracion').add(optionSeleccionar);

                            // Agregar las nuevas opciones al select de refrigeración
                            for (var i = 0; i < refrigeraciones.length; i++) {
                                var option = document.createElement('option');
                                option.value = refrigeraciones[i].Id_Refrigeracion;
                                option.text = refrigeraciones[i].Producto;
                                option.setAttribute('data-precio', refrigeraciones[i].Precio);
                                document.getElementById('refrigeracion').add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_refrigeracion.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar las refrigeraciones al cargar la página
                cargarRefrigeracion();

                // Lógica para actualizar el precio de la refrigeración seleccionada
                document.getElementById('refrigeracion').addEventListener('change', function() {
                    // Obtener el precio seleccionado del select de refrigeración
                    var precioRefrigeracion = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                    // Verificar si el precio es un número válido
                    if (!isNaN(precioRefrigeracion)) {
                        // Actualizar el precio de la refrigeración en el span
                        document.getElementById('precioRefrigeracion').textContent = "Precio: S/. " + precioRefrigeracion.toFixed(2);
                    } else {
                        // Manejar el caso en que el precio no sea un número válido
                        document.getElementById('precioRefrigeracion').textContent = "Precio: S/. 0.00";
                    }
                });
            </script>
        </main>
    </body>

    </html>

<?php
} else {
    // Si alguna consulta no fue exitosa, mostrar un mensaje de error
    echo "Error en la consulta: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>