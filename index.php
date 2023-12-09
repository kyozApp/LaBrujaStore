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
            <label for="procesador">PROCESADOR:</label>
            <select id="procesadorSelect" name="procesador"></select>
            <span id="precioProcesador"></span>



            <!-- Placa Base -->
            <label for="placaBase">PLACA:</label>
            <select id="placaBase" name="placaBase" disabled>
                <option value="" disabled selected>Selecciona tu placa</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>


            <!-- Memoria RAM -->
            <label for="memoriaRam">MEMORIA RAM:</label>
            <select id="memoriaRam" name="memoriaRam" disabled>
                <option value="" disabled selected>Selecciona tu memoria RAM</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Memoria RAM -->
            <label for="memoriaRam">MEMORIA RAM:</label>
            <select id="memoriaRam" name="memoriaRam" disabled>
                <option value="" disabled selected>Selecciona tu memoria RAM</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>


            <!-- Almacenamiento 1 -->
            <label for="almacenamiento1">ALMACENAMIENTO:</label>
            <select id="almacenamiento1" name="almacenamiento1"></select>
            <span id="precioAlmacenamiento1"></span>

            <!-- Almacenamiento 2 -->
            <label for="almacenamiento2">ALMACENAMIENTO:</label>
            <select id="almacenamiento2" name="almacenamiento2"></select>
            <span id="precioAlmacenamiento2"></span>



            <!-- Tarjeta de Video -->
            <label for="tarjetaVideo">TARJETA DE VIDEO:</label>
            <select id="tarjetaVideo" name="tarjetaVideo">
                <option value="" disabled selected>Selecciona tu tarjeta de video</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>


            <!-- Fuente de Poder -->
            <label for="fuentePoder">FUENTE DE PODER:</label>
            <select id="fuentePoder" name="fuentePoder">
                <option value="" disabled selected>Selecciona tu fuente de poder</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>


            <!-- Case -->
            <label for="case">CASE:</label>
            <select id="case" name="case">
                <option value="" disabled selected>Selecciona tu case</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Monitor -->
            <label for="monitor">MONITOR:</label>
            <select id="monitor" name="monitor">
                <option value="" disabled selected>Selecciona tu monitor</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Teclado -->
            <label for="teclado">TECLADO:</label>
            <select id="teclado" name="teclado">
                <option value="" disabled selected>Selecciona tu teclado</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Mouse -->
            <label for="mouse">MOUSE:</label>
            <select id="mouse" name="mouse">
                <option value="" disabled selected>Selecciona tu mouse</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Audifono -->
            <label for="audifono">AUDIFONO:</label>
            <select id="audifono" name="audifono">
                <option value="" disabled selected>Selecciona tu audifono</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Accesorio -->
            <label for="accesorio">ACCESORIO:</label>
            <select id="accesorio" name="accesorio">
                <option value="" disabled selected>Selecciona tu accesorio</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Accesorio -->
            <label for="accesorio">ACCESORIO:</label>
            <select id="accesorio" name="accesorio">
                <option value="" disabled selected>Selecciona tu accesorio</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Accesorio -->
            <label for="accesorio">ACCESORIO:</label>
            <select id="accesorio" name="accesorio">
                <option value="" disabled selected>Selecciona tu accesorio</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Accesorio -->
            <label for="accesorio">ACCESORIO:</label>
            <select id="accesorio" name="accesorio">
                <option value="" disabled selected>Selecciona tu accesorio</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <!-- Refrigeracion -->
            <label for="refrigeracion">REFRIGERACION:</label>
            <select id="refrigeracion" name="refrigeracion">
                <option value="" disabled selected>Selecciona tu refrigeracion</option>
                <!-- Opciones serán cargadas dinámicamente con JavaScript -->
            </select>

            <button type="button" onclick="generarCotizacion()">Generar Cotización</button>
        </form>

        <div id="resultado-cotizacion"></div>

    </main>

    <footer>
        <p>&copy; 2023 La Bruja Store. Todos los derechos reservados.</p>
    </footer>

    <script src="index_producto.js"></script>
</body>

</html>