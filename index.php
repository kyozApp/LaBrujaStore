<?php
include('conexiondb/conexion.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda La Bruja Store</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index_producto.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>

<body>

    <header id="header">
        <div id="header-img-logo">
            <a href="index.php"><img id="header-cont-img-logo" src="img/labrujastore.png" alt="Logo de la empresa"></a>
        </div>
        <div id="header-botones">
            <div class="botones-cont btn-acion"><a href="view/cotizacion.php">Cotización</a></div>
            <div class="dropdown botones-cont btn-acion">
                <a href="view/catalogo.php">Catalogo</a>
                <div class="categorias-lista">
                    <a class="cont-lista" href="#">Procesador</a>
                    <a class="cont-lista" href="#">Placa</a>
                    <a class="cont-lista" href="#">Memoria ram</a>
                    <a class="cont-lista" href="#">Almacenamiento</a>
                    <a class="cont-lista" href="#">Tarjeta de video</a>
                    <a class="cont-lista" href="#">Fuente de poder</a>
                    <a class="cont-lista" href="#">Case</a>
                    <a class="cont-lista" href="#">Torre de refrigeracion</a>
                    <a class="cont-lista" href="#">Torre liquida</a>
                    <a class="cont-lista" href="#">Monitor</a>
                    <a class="cont-lista" href="#">Teclado</a>
                    <a class="cont-lista" href="#">Mouse</a>
                    <a class="cont-lista" href="#">Audifonos</a>
                    <a class="cont-lista" href="#">Laptop</a>
                    <a class="cont-lista" href="#">Combos</a>
                </div>
            </div>
            <div class="botones-cont btn-acion"><a href="view/login.php">Iniciar Sesion</a></div>
            <div class="bloque-icon-tres-lineas">
                <img id="icon-tres-lineas" src="img/icon/tres-lineas.png" alt="Icono de menu 3 lineas">
                <div class="opciones-lista">
                    <a class="cont-lista" href="#">Cotización</a>
                    <div class="cont-sub-categorias">
                        <a class="cont-lista" href="#">Categorías</a>
                        <div class="opciones-sub-categoria">
                            <a class="cont-lista" href="#">Procesador</a>
                            <a class="cont-lista" href="#">Placa</a>
                            <a class="cont-lista" href="#">Memoria ram</a>
                            <a class="cont-lista" href="#">Almacenamiento</a>
                            <a class="cont-lista" href="#">Tarjeta de video</a>
                            <a class="cont-lista" href="#">Fuente de poder</a>
                            <a class="cont-lista" href="#">Case</a>
                            <a class="cont-lista" href="#">Torre de refrigeracion</a>
                            <a class="cont-lista" href="#">Torre liquida</a>
                            <a class="cont-lista" href="#">Monitor</a>
                            <a class="cont-lista" href="#">Teclado</a>
                            <a class="cont-lista" href="#">Mouse</a>
                            <a class="cont-lista" href="#">Audifonos</a>
                            <a class="cont-lista" href="#">Laptop</a>
                            <a class="cont-lista" href="#">Combos</a>
                        </div>
                    </div>
                    <a class="cont-lista" href="view/login.php">Iniciar Sesion</a>
                </div>
            </div>
            <div class="botones-cont div-formulario">
                <form class="-segundo" action="/ruta_de_busqueda" method="GET">
                    <input class="buscar-text" type="text" name="busqueda" placeholder="Buscar...">
                    <button class="buscar-boton" type="submit">Buscar</button>
                </form>
            </div>
        </div>
        <div id="header-img-logo-right">
            <img id="header-cont-img-logo" src="img/labrujastore.png" alt="Logo de la empresa">
        </div>
    </header>

    <main class="body-cont">

        <form id="formulario-cotizacion" action="procesar_cotizacion.php" method="post">
            <h1>COTIZA TU PC AQUI</h1>

            <!-- Procesador -->
            <div class="cotizacion-item">
                <label for="procesador">PROCESADOR:</label>
                <select id="procesadorSelect" name="procesador"></select>
                <span id="precioProcesador" class="precioSpan"></span>
            </div>

            <!-- Placa Base -->
            <div class="cotizacion-item">
                <label for="placaBase">PLACA:</label>
                <select id="placaBase" name="placaBase" disabled></select>
                <span id="precioPlacaBase" class="precioSpan"></span>
            </div>

            <!-- Memoria RAM -->
            <div class="cotizacion-item">
                <label for="memoriaRam">MEMORIA RAM:</label>
                <select id="memoriaRam" name="memoriaRam" disabled></select>
                <span id="precioMemoriaRam" class="precioSpan"></span>
            </div>

            <!-- Almacenamiento 1 -->
            <div class="cotizacion-item">
                <label for="almacenamiento1">ALMACENAMIENTO:</label>
                <select id="almacenamiento1" name="almacenamiento1"></select>
                <span id="precioAlmacenamiento1" class="precioSpan"></span>
            </div>

            <!-- Almacenamiento 2 -->
            <div class="cotizacion-item">
                <label for="almacenamiento2">ALMACENAMIENTO:</label>
                <select id="almacenamiento2" name="almacenamiento2"></select>
                <span id="precioAlmacenamiento2" class="precioSpan"></span>
            </div>

            <!-- Tarjeta de Video -->
            <div class="cotizacion-item">
                <label for="tarjetaVideo">TARJETA DE VIDEO:</label>
                <select id="tarjetaVideo" name="tarjetaVideo"></select>
                <span id="precioTarjetaVideo" class="precioSpan"></span>
            </div>

            <!-- Fuente de Poder -->
            <div class="cotizacion-item">
                <label for="fuentePoder">FUENTE DE PODER:</label>
                <select id="fuentePoder" name="fuentePoder"></select>
                <span id="precioFuentePoder" class="precioSpan"></span>
            </div>

            <!-- Case -->
            <div class="cotizacion-item">
                <label for="case">CASE:</label>
                <select id="case" name="case"></select>
                <span id="precioCase" class="precioSpan"></span>
            </div>

            <!-- Monitor -->
            <div class="cotizacion-item">
                <label for="monitor">MONITOR:</label>
                <select id="monitor" name="monitor"></select>
                <span id="precioMonitor" class="precioSpan"></span>
            </div>

            <!-- Teclado -->
            <div class="cotizacion-item">
                <label for="teclado">TECLADO:</label>
                <select id="teclado" name="teclado"></select>
                <span id="precioTeclado" class="precioSpan"></span>
            </div>

            <!-- Mouse -->
            <div class="cotizacion-item">
                <label for="mouse">MOUSE:</label>
                <select id="mouse" name="mouse"></select>
                <span id="precioMouse" class="precioSpan"></span>
            </div>

            <!-- Audifono -->
            <div class="cotizacion-item">
                <label for="audifono">AUDIFONO:</label>
                <select id="audifono" name="audifono"></select>
                <span id="precioAudifono" class="precioSpan"></span>
            </div>

            <!-- Accesorio 1 -->
            <div class="cotizacion-item">
                <label for="accesorio1">ACCESORIO:</label>
                <select id="accesorio1" name="accesorio1"></select>
                <span id="precioAccesorio1" class="precioSpan"></span>
            </div>

            <!-- Accesorio 2 -->
            <div class="cotizacion-item">
                <label for="accesorio2">ACCESORIO:</label>
                <select id="accesorio2" name="accesorio2"></select>
                <span id="precioAccesorio2" class="precioSpan"></span>
            </div>

            <!-- Accesorio 3 -->
            <div class="cotizacion-item">
                <label for="accesorio3">ACCESORIO:</label>
                <select id="accesorio3" name="accesorio3"></select>
                <span id="precioAccesorio3" class="precioSpan"></span>
            </div>

            <!-- Accesorio 4 -->
            <div class="cotizacion-item">
                <label for="accesorio4">ACCESORIO:</label>
                <select id="accesorio4" name="accesorio4"></select>
                <span id="precioAccesorio4" class="precioSpan"></span>
            </div>

            <!-- Refrigeracion -->
            <div class="cotizacion-item">
                <label for="refrigeracion">REFRIGERACION:</label>
                <select id="refrigeracion" name="refrigeracion"></select>
                <span id="precioRefrigeracion" class="precioSpan"></span>
            </div>


            <button type="button" onclick="generarCotizacion()">Generar Cotización</button>
            <span id="precioTotal"></span>
        </form>

        <div id="resultado-cotizacion"></div>

    </main>

    <footer>
        <p>&copy; 2023 La Bruja Store. Todos los derechos reservados.</p>
    </footer>

    <script src="index_producto.js"></script>
</body>

</html>