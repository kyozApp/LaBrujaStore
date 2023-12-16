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
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/index_producto.css">
        <link rel="stylesheet" href="css/catalogo_header.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    </head>

    <body>
        <main>

        <header id="header">

        <!-- Logo o imagen -->
        <div id="header-img-logo">
            <a href="index.php"><img id="header-cont-img-logo" src="img/labrujastore.png" alt="Logo de la empresa"></a>
        </div>

        <!-- Botones -->
        <div id="header-botones">
            <div class="dropdown botones-cont btn-acion">
                <a href="view/catalogo.php">Catalogo</a>
                <!-- Lista de categorías -->
                <div class="categorias-lista">
                    <!-- Aquí se cargarían dinámicamente las categorías desde la base de datos -->
                    <a class="cont-lista" href="#">Procesadores</a>
                    <a class="cont-lista" href="#">Placas Madre</a>
                    <a class="cont-lista" href="#">Memorias Ram</a>
                </div>
            </div>
            <div class="botones-cont btn-acion"><a href="view/login.php">Iniciar Sesion</a></div>

            <!-- Barra de 3 lineas -->
            <div class="bloque-icon-tres-lineas">
                <img id="icon-tres-lineas" src="img/icon/tres-lineas.png" alt="Icono de menu 3 lineas">

                <div class="opciones-lista">
                    <div class="cont-sub-categorias">
                        <a class="cont-lista" href="view/catalogo.php">Catalogo</a>
                        <div class="opciones-sub-categoria">
                            <a class="cont-lista" href="#">Procesador</a>
                            <a class="cont-lista" href="#">Placas Madre</a>
                            <a class="cont-lista" href="#">Memorias Ram</a>
                        </div>
                    </div>
                    <a class="cont-lista" href="view/login.php">Iniciar Sesion</a>
                </div>
            </div>

            <div class="botones-cont div-formulario">
                <!-- Barra de búsqueda -->
                
            </div>
        </div>

        <!-- Logo la derecha -->
        <div id="header-img-logo-right">
            <img id="header-cont-img-logo" src="img/labrujastore.png" alt="Logo de la empresa">
        </div>
        <!-- TIENES QUE AL DAR CLICK EN LA LUPA QUE SE ABRA EL BUSCADOR -->
    </header>

            <form>
                <h1>REALZIA TU COTIZACION</h1>
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

                <!-- Cuarto select para accesorios -->
                <label for="accesorio1">Accesorio 1:</label>
                <select name="accesorio1" id="accesorio1">
                    <option value="" disabled selected>Seleccionar</option>
                    <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                </select>
                <span id="precioAccesorio1">Precio: S/. 0.00</span>

                <!-- Quinto select para accesorios -->
                <label for="accesorio2">Accesorio 2:</label>
                <select name="accesorio2" id="accesorio2">
                    <option value="" disabled selected>Seleccionar</option>
                    <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                </select>
                <span id="precioAccesorio2">Precio: S/. 0.00</span>

                <!-- Sexto select para accesorios -->
                <label for="accesorio3">Accesorio 3:</label>
                <select name="accesorio3" id="accesorio3">
                    <option value="" disabled selected>Seleccionar</option>
                    <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                </select>
                <span id="precioAccesorio3">Precio: S/. 0.00</span>

                <!-- Séptimo select para accesorios -->
                <label for="accesorio4">Accesorio 4:</label>
                <select name="accesorio4" id="accesorio4">
                    <option value="" disabled selected>Seleccionar</option>
                    <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                </select>
                <span id="precioAccesorio4">Precio: S/. 0.00</span>


                <!-- Décimo tercer select para refrigeración -->
                <label for="refrigeracion">Refrigeración:</label>
                <select name="refrigeracion" id="refrigeracion">
                    <option value="" disabled selected>Seleccionar</option>
                    <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                </select>
                <span id="precioRefrigeracion">Precio: S/. 0.00</span>
                <div class="coti-final">
                    <span id="precioTotal">Precio Total: S/. 0.00</span>
                    <button type="button" onclick="generarCotizacion()">Generar Cotización</button>
                </div>
    

            </form>


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
                // Lógica de JavaScript para cargar las opciones de accesorios desde la base de datos
                function cargarAccesorios(selectId, precioId) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            // Limpiar las opciones actuales del select de accesorio
                            document.getElementById(selectId).innerHTML = '';

                            // Parsear la respuesta JSON
                            var accesorios = JSON.parse(this.responseText);

                            // Agregar la opción "Seleccionar" al select de accesorio
                            var optionSeleccionar = document.createElement('option');
                            optionSeleccionar.value = "";
                            optionSeleccionar.text = "Seleccionar";
                            document.getElementById(selectId).add(optionSeleccionar);

                            // Agregar las nuevas opciones al select de accesorio
                            for (var i = 0; i < accesorios.length; i++) {
                                var option = document.createElement('option');
                                option.value = accesorios[i].Id_Accesorio;
                                option.text = accesorios[i].Producto;
                                option.setAttribute('data-precio', accesorios[i].Precio);
                                document.getElementById(selectId).add(option);
                            }
                        }
                    };
                    xhttp.open("GET", "get_accesorios.php", true);
                    xhttp.send();
                }

                // Llamada a la función para cargar las opciones de accesorio al cargar la página
                cargarAccesorios('accesorio1', 'precioAccesorio1');
                cargarAccesorios('accesorio2', 'precioAccesorio2');
                cargarAccesorios('accesorio3', 'precioAccesorio3');
                cargarAccesorios('accesorio4', 'precioAccesorio4');

                // Lógica para actualizar el precio del accesorio seleccionado
                function actualizarPrecioAccesorio(selectId, precioId) {
                    document.getElementById(selectId).addEventListener('change', function() {
                        // Obtener el precio seleccionado del select de accesorio
                        var precioAccesorio = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                        // Verificar si el precio es un número válido
                        if (!isNaN(precioAccesorio)) {
                            // Actualizar el precio del accesorio en el span
                            document.getElementById(precioId).textContent = "Precio: S/. " + precioAccesorio.toFixed(2);
                        } else {
                            // Manejar el caso en que el precio no sea un número válido
                            document.getElementById(precioId).textContent = "Precio: S/. 0.00";
                        }
                    });
                }

                // Llamada a la función para actualizar los precios de los accesorios
                actualizarPrecioAccesorio('accesorio1', 'precioAccesorio1');
                actualizarPrecioAccesorio('accesorio2', 'precioAccesorio2');
                actualizarPrecioAccesorio('accesorio3', 'precioAccesorio3');
                actualizarPrecioAccesorio('accesorio4', 'precioAccesorio4');

                // Función para calcular y actualizar el precio total
                function actualizarPrecioTotal() {
                    // Obtener los precios de cada componente
                    var precioProcesador = parseFloat(document.getElementById('precioProcesador').textContent.replace('Precio: S/. ', '') || 0);
                    var precioPlaca = parseFloat(document.getElementById('precioPlaca').textContent.replace('Precio: S/. ', '') || 0);
                    var precioMemoriaRam1 = parseFloat(document.getElementById('precioMemoriaRam1').textContent.replace('Precio: S/. ', '') || 0);
                    var precioMemoriaRam2 = parseFloat(document.getElementById('precioMemoriaRam2').textContent.replace('Precio: S/. ', '') || 0);
                    var precioAlmacenamiento1 = parseFloat(document.getElementById('precioAlmacenamiento1').textContent.replace('Precio: S/. ', '') || 0);
                    var precioAlmacenamiento2 = parseFloat(document.getElementById('precioAlmacenamiento2').textContent.replace('Precio: S/. ', '') || 0);
                    var precioTarjetaDeVideo = parseFloat(document.getElementById('precioTarjetaDeVideo').textContent.replace('Precio: S/. ', '') || 0);
                    var precioFuenteDePoder = parseFloat(document.getElementById('precioFuenteDePoder').textContent.replace('Precio: S/. ', '') || 0);
                    var precioCases = parseFloat(document.getElementById('precioCases').textContent.replace('Precio: S/. ', '') || 0);
                    var precioMonitores = parseFloat(document.getElementById('precioMonitores').textContent.replace('Precio: S/. ', '') || 0);
                    var precioTeclados = parseFloat(document.getElementById('precioTeclados').textContent.replace('Precio: S/. ', '') || 0);
                    var precioMouses = parseFloat(document.getElementById('precioMouses').textContent.replace('Precio: S/. ', '') || 0);
                    var precioAudifonos = parseFloat(document.getElementById('precioAudifonos').textContent.replace('Precio: S/. ', '') || 0);
                    var precioAccesorio1 = parseFloat(document.getElementById('precioAccesorio1').textContent.replace('Precio: S/. ', '') || 0);
                    var precioAccesorio2 = parseFloat(document.getElementById('precioAccesorio2').textContent.replace('Precio: S/. ', '') || 0);
                    var precioAccesorio3 = parseFloat(document.getElementById('precioAccesorio3').textContent.replace('Precio: S/. ', '') || 0);
                    var precioAccesorio4 = parseFloat(document.getElementById('precioAccesorio4').textContent.replace('Precio: S/. ', '') || 0);
                    var precioRefrigeracion = parseFloat(document.getElementById('precioRefrigeracion').textContent.replace('Precio: S/. ', '') || 0);

                    // Calcular el precio total
                    var precioTotal = precioProcesador + precioPlaca + precioMemoriaRam1 + precioMemoriaRam2 +
                        precioAlmacenamiento1 + precioAlmacenamiento2 + precioTarjetaDeVideo + precioFuenteDePoder +
                        precioCases + precioMonitores + precioTeclados + precioMouses + precioAudifonos +
                        precioAccesorio1 + precioAccesorio2 + precioAccesorio3 + precioAccesorio4 + precioRefrigeracion;

                    // Actualizar el precio total en el span correspondiente
                    document.getElementById('precioTotal').textContent = "Precio Total: S/. " + precioTotal.toFixed(2);
                }

                // ... (código existente) ...

                // Llamada a la función para actualizar el precio total al cargar la página
                actualizarPrecioTotal();

                // Llamada a la función para actualizar el precio total cada vez que cambia un componente
                document.getElementById('procesador').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('placa').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('memoriaRam1').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('memoriaRam2').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('almacenamiento1').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('almacenamiento2').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('tarjetaDeVideo').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('fuenteDePoder').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('cases').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('monitores').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('teclados').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('mouses').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('audifonos').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('accesorio1').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('accesorio2').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('accesorio3').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('accesorio4').addEventListener('change', actualizarPrecioTotal);
                document.getElementById('refrigeracion').addEventListener('change', actualizarPrecioTotal);


                // Lista de números de teléfono de WhatsApp
                const numerosWhatsApp = ['51985872694', '51979578623', '51927993661'];

                // Índice para llevar un seguimiento del número de teléfono actual
                let indiceNumeroWhatsApp = 0;

                // Resto del código...


                // Función para generar la cotización y enviar a WhatsApp
                function generarCotizacion() {
                    // Obtener los valores seleccionados en los select
                    const procesador = obtenerSeleccionado('procesador');
                    const placa = obtenerSeleccionado('placa');
                    const memoriaRam1 = obtenerSeleccionado('memoriaRam1');
                    const memoriaRam2 = obtenerSeleccionado('memoriaRam2');
                    const almacenamiento1 = obtenerSeleccionado('almacenamiento1');
                    const almacenamiento2 = obtenerSeleccionado('almacenamiento2');
                    const tarjetaDeVideo = obtenerSeleccionado('tarjetaDeVideo');
                    const fuenteDePoder = obtenerSeleccionado('fuenteDePoder');
                    const cases = obtenerSeleccionado('cases');
                    const monitores = obtenerSeleccionado('monitores');
                    const teclados = obtenerSeleccionado('teclados');
                    const mouses = obtenerSeleccionado('mouses');
                    const audifonos = obtenerSeleccionado('audifonos');
                    const accesorio1 = obtenerSeleccionado('accesorio1');
                    const accesorio2 = obtenerSeleccionado('accesorio2');
                    const accesorio3 = obtenerSeleccionado('accesorio3');
                    const accesorio4 = obtenerSeleccionado('accesorio4');
                    const refrigeracion = obtenerSeleccionado('refrigeracion');
                    const precioTotal = document.getElementById('precioTotal').innerText;

                    // Obtener los elementos span que contienen los precios de cada producto
                    const precios = document.querySelectorAll('[id^="precio"]');

                    // Construir el mensaje de cotización con nombres y precios
                    let mensajeCotizacion = `
                        Procesador: ${procesador}            Precio: ${precios[0].textContent.replace('Precio: ', '').trim()}
                        Placa: ${placa}                      Precio: ${precios[1].textContent.replace('Precio: ', '').trim()}
                        Memoria Ram 1: ${memoriaRam1}        Precio: ${precios[2].textContent.replace('Precio: ', '').trim()}
                        Memoria Ram 2: ${memoriaRam2}        Precio: ${precios[3].textContent.replace('Precio: ', '').trim()}
                        Almacenamiento 1: ${almacenamiento1} Precio: ${precios[4].textContent.replace('Precio: ', '').trim()}
                        Almacenamiento 2: ${almacenamiento2} Precio: ${precios[5].textContent.replace('Precio: ', '').trim()}
                        Tarjeta de Video: ${tarjetaDeVideo}  Precio: ${precios[6].textContent.replace('Precio: ', '').trim()}
                        Fuente de Poder: ${fuenteDePoder}    Precio: ${precios[7].textContent.replace('Precio: ', '').trim()}
                        Case: ${cases}                       Precio: ${precios[8].textContent.replace('Precio: ', '').trim()}
                        Monitor: ${monitores}                Precio: ${precios[9].textContent.replace('Precio: ', '').trim()}
                        Teclado: ${teclados}                 Precio: ${precios[10].textContent.replace('Precio: ', '').trim()}
                        Mouse: ${mouses}                     Precio: ${precios[11].textContent.replace('Precio: ', '').trim()}
                        Audífonos: ${audifonos}              Precio: ${precios[12].textContent.replace('Precio: ', '').trim()}
                        Accesorio 1: ${accesorio1}           Precio: ${precios[13].textContent.replace('Precio: ', '').trim()}
                        Accesorio 2: ${accesorio2}           Precio: ${precios[14].textContent.replace('Precio: ', '').trim()}
                        Accesorio 3: ${accesorio3}           Precio: ${precios[15].textContent.replace('Precio: ', '').trim()}
                        Accesorio 4: ${accesorio4}           Precio: ${precios[16].textContent.replace('Precio: ', '').trim()}
                        Refrigeración: ${refrigeracion}      Precio: ${precios[17].textContent.replace('Precio: ', '').trim()}
                        Precio Total: ${precioTotal}
                        `;

                    // Filtrar productos con precio distinto de "S/. 0.00"
                    mensajeCotizacion = mensajeCotizacion
                        .split('\n')
                        .filter(linea => !linea.includes('Precio: S/. 0.00'))
                        .join('\n');

                    // Número de teléfono de WhatsApp al que enviar el mensaje
                    const numeroWhatsAppActual = numerosWhatsApp[indiceNumeroWhatsApp];

                    // Crear el enlace de WhatsApp
                    const enlaceWhatsApp = `https://wa.me/${numeroWhatsAppActual}?text=${encodeURIComponent(mensajeCotizacion)}`;

                    // Redireccionar a la página de WhatsApp
                    window.location.href = enlaceWhatsApp;

                    // Incrementar el índice para el próximo número de teléfono
                    indiceNumeroWhatsApp = (indiceNumeroWhatsApp + 1) % numerosWhatsApp.length;
                }


                // Función para obtener la opción seleccionada en un select
                function obtenerSeleccionado(idSelect) {
                    const select = document.getElementById(idSelect);
                    const indiceSeleccionado = select.selectedIndex;
                    return indiceSeleccionado !== -1 ? select.options[indiceSeleccionado].text : '';
                }
            </script>

        </main>
        <footer>
        <p>&copy; 2023 La Bruja Store. Todos los derechos reservados.</p>
    </footer>
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