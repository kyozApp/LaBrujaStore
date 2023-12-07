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

        <form id="formulario-cotizacion" action="#" method="post">
            <h1>COTIZA TU PC AQUI</h1>
            <label for="procesador">Selecciona tu procesador:</label>
            <select class="procesador" name="procesador" onchange="cargarPlacasBase()">
                <option value="Ryzen 5 5500">Ryzen 5 5500 <img class="imagenProcesador" src="" alt="Procesador 5500"></option>
                <!-- Otros options -->
            </select>

            <img class="imagenProcesador" alt="Imagen del procesador">

            <select class="placaBase" name="placaBase" disabled>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>
            <img class="imagenPlaca" alt="Imagen de la placa">


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