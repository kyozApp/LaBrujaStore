<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones</title>
    <link rel="stylesheet" href="../css/cotizacion.css">
    <link rel="stylesheet" href="../css/cotizacion_productos.css">
</head>

<body>

    <header id="header">

        <!-- Logo o imagen -->
        <div id="header-img-logo">
            <a href="../index.php"><img id="header-cont-img-logo" src="../img/labrujastore.png" alt="Logo de la empresa"></a>
        </div>

        <!-- Botones -->
        <div id="header-botones">
            <div class="botones-cont btn-acion"><a href="cotizacion.php">Cotización</a></div>
            <div class="dropdown botones-cont btn-acion">
                <a href="#">Categoría</a>
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
                    <a class="cont-lista" href="#">Cotización</a>

                    <div class="cont-sub-categorias">
                        <a class="cont-lista" href="#">Categorías</a>
                        <div class="opciones-sub-categoria">
                            <a class="cont-lista" href="#">Procesador</a>
                            <a class="cont-lista" href="#">Placas Madre</a>
                            <a class="cont-lista" href="#">Memorias Ram</a>
                        </div>
                    </div>
                    <a class="cont-lista" href="login.php">Iniciar Sesion</a>
                </div>
            </div>

            <div class="botones-cont div-formulario">
                <!-- Barra de búsqueda -->
                <form class="-segundo" action="/ruta_de_busqueda" method="GET">
                    <input class="buscar-text" type="text" name="busqueda" placeholder="Buscar...">
                    <button class="buscar-boton" type="submit">Buscar</button>
                </form>
            </div>
        </div>

        <!-- Logo la derecha -->
        <div id="header-img-logo-right">
            <img id="header-cont-img-logo" src="img/labrujastore.png" alt="Logo de la empresa">
        </div>
        <!-- TIENES QUE AL DAR CLICK EN LA LUPA QUE SE ABRA EL BUSCADOR -->
    </header>

    <main class="body-cont">

        <form id="formulario-cotizacion" action="procesar_cotizacion.php" method="post">
            <h1>COTIZA TU PC AQUI</h1>

            <!-- Procesador -->
            <label for="procesador">Selecciona tu procesador:</label>
            <select id="procesador" name="procesador" onchange="cargarPlacasBase()">
                <option value="" disabled selected>Selecciona tu procesador</option>
                <option value="Ryzen 5 5500">Ryzen 5 5500</option>
                <option value="Ryzen 5 5600G">Ryzen 5 5600G</option>
                <option value="Intel 12400F">Intel 12400F</option>
            </select>
            <img id="imagenProcesador" alt="Imagen del procesador">

            <!-- Placa Base -->
            <label for="placaBase">Selecciona tu placa base:</label>
            <select id="placaBase" name="placaBase" disabled>
                <option value="" disabled selected>Selecciona tu placa base</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>
            <img id="imagenPlaca" alt="Imagen de la placa">

            <!-- Memoria RAM -->
            <label for="memoriaRam">Selecciona tu memoria RAM:</label>
            <select id="memoriaRam" name="memoriaRam" disabled>
                <option value="" disabled selected>Selecciona tu memoria RAM</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>
            <img id="imagenMemoriaRam" alt="Imagen de la memoria RAM">

            <!-- Almacenamiento -->
            <label for="almacenamiento">Selecciona tu almacenamiento:</label>
            <select id="almacenamiento" name="almacenamiento" disabled>
                <option value="" disabled selected>Selecciona tu almacenamiento</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>
            <img id="imagenAlmacenamiento" alt="Imagen del almacenamiento">

            <!-- Tarjeta de Video -->
            <label for="tarjetaVideo">Selecciona tu tarjeta de video:</label>
            <select id="tarjetaVideo" name="tarjetaVideo" disabled>
                <option value="" disabled selected>Selecciona tu tarjeta de video</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>
            <img id="imagenTarjetaVideo" alt="Imagen de la tarjeta de video">

            <!-- Fuente de Poder -->
            <label for="fuentePoder">Selecciona tu fuente de poder:</label>
            <select id="fuentePoder" name="fuentePoder" disabled>
                <option value="" disabled selected>Selecciona tu fuente de poder</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>
            <img id="imagenFuentePoder" alt="Imagen de la fuente de poder">

            <!-- Case -->
            <label for="case">Selecciona tu case:</label>
            <select id="case" name="case" disabled>
                <option value="" disabled selected>Selecciona tu case</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>
            <img id="imagenCase" alt="Imagen del case">

            <!-- Otras selecciones ... -->

            <button type="button" onclick="generarCotizacion()">Generar Cotización</button>
        </form>

        <div id="resultado-cotizacion"></div>



    </main>

    <footer>
        <p>&copy; 2023 La Bruja Store. Todos los derechos reservados.</p>
    </footer>

    <script src="../js/cotizacion.js"></script>

</body>

</html>