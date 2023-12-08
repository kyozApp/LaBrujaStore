<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizaciones</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index_producto.css">
</head>

<body>

    <header id="header">

        <!-- Logo o imagen -->
        <div id="header-img-logo">
            <a href="index.php"><img id="header-cont-img-logo" src="img/labrujastore.png" alt="Logo de la empresa"></a>
        </div>

        <!-- Botones -->
        <div id="header-botones">
            <div class="botones-cont btn-acion"><a href="view/cotizacion.php">Cotización</a></div>
            <div class="dropdown botones-cont btn-acion">
                <a href="#">Catalogo</a>
                <!-- Lista de categorías -->
                <div class="categorias-lista">
                    <!-- Aquí se cargarían dinámicamente las categorías desde la base de datos -->
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

            <!-- Barra de 3 lineas -->
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

        <?php
        // Incluir el archivo de conexión
        include('conexiondb/conexion.php');

        // Ordenar las categorías según tu preferencia
        $categoriasOrdenadas = array("Procesador", "Placa", "Memoria ram", "Almacenamiento", "Tarjeta de video", "Fuente de poder", "Case", "Torre de refrigeracion", "Torre liquida", "Monitor", "Teclado", "Mouse", "Audifonos", "Laptop", "Combos");

        // Iterar sobre las categorías ordenadas
        foreach ($categoriasOrdenadas as $categoria) {
            // Realizar una consulta para obtener la información de productos de la categoría actual
            $query = "SELECT Nombre, Imagen, Precio, Stock, Descripcion, Enlace FROM Producto WHERE Categoria = '$categoria' ORDER BY Nombre";
            $result = $conexion->query($query);

            // Verificar si la consulta fue exitosa
            if ($result->num_rows > 0) {
                // Mostrar el título de la categoría
                echo '<h1>' . $categoria . '</h1>';

                // Abrir una fila para la categoría actual
                echo '<div class="product-row">';

                // Iterar sobre los productos de la categoría actual
                while ($producto = $result->fetch_assoc()) {
                    // Mostrar cada producto en una tarjeta
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $producto['Nombre'] . '</h5>';
                    echo '<img src="' . $producto['Imagen'] . '" alt="' . $producto['Nombre'] . '" class="card-img-top">';
                    echo '<p class="card-text">' . $producto['Precio'] . '</p>';
                    echo '<a href="#" onclick="abrirModal(\'' . $producto['Nombre'] . '\', \'' . $producto['Imagen'] . '\', \'' . $producto['Precio'] . '\', \'' . $producto['Stock'] . '\', \'' . $producto['Descripcion'] . '\', \'' . $producto['Enlace'] . '\')">Ver detalles</a>';
                    echo '</div>';
                    echo '</div>';
                }               

                // Cerrar la fila para la categoría actual
                echo '</div>';
            }
        }

        // Cerrar la conexión
        $conexion->close();
        ?>

        <!-- Modal -->
        <div id="detalleProductoModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="cerrarModal()">&times;</span>

                <!-- Primera Columna -->
                <div class="columna">
                    <h2 id="nombreProductoModal"></h2>
                    <img id="imagenProductoModal" alt="Imagen del producto">
                    <p id="precioProductoModal"></p>
                </div>

                <!-- Segunda Columna -->
                <div class="columna">
                    <p id="stockProductoModal"></p>
                    <p id="descripcionProductoModal"></p>
                    <a id="enlaceProductoModal" href="#" target="_blank">Enlace</a>
                </div>
            </div>
        </div>


    </main>

    <footer>
        <p>&copy; 2023 La Bruja Store. Todos los derechos reservados.</p>
    </footer>

    <script src="js/index_producto.js"></script>

</body>

</html>