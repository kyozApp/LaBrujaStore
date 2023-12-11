<?php
// Incluye el archivo de conexión a la base de datos
include('conexiondb/conexion.php');

// Realiza la consulta para obtener todos los productos y precios de procesador
$queryProcesador = "SELECT Producto, Precio, Id_Procesador FROM procesador";
$resultProcesador = $conexion->query($queryProcesador);

// Realiza la consulta para obtener todos los productos y precios de placa
$queryPlaca = "SELECT Producto, Precio, Id_Procesador FROM placa";
$resultPlaca = $conexion->query($queryPlaca);

// Realiza la consulta para obtener todos los productos y precios de memoria RAM
$queryMemoriaRAM = "SELECT Producto, Precio, Id_Placa FROM memoria_ram";
$resultMemoriaRAM = $conexion->query($queryMemoriaRAM);

// Realiza la consulta para obtener todos los productos y precios de almacenamiento
$queryAlmacenamiento = "SELECT Producto, Precio, Id_Almacenamiento FROM almacenamiento";
$resultAlmacenamiento = $conexion->query($queryAlmacenamiento);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda La Bruja Store</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index_producto.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="index_producto.js"></script>
</head>

<body>
    <header id="header">
        <!-- ... Tu código de encabezado ... -->
    </header>

    <main class="body-cont">
        <!-- Contenido de tu página -->

        <!-- Formulario de selección para procesador -->
        <form>
            <label for="productosProcesador">Procesador:</label>
            <select id="productosProcesador" name="productosProcesador" onchange="mostrarPlacasCompatibles(); mostrarPrecio('precioProcesador', this)">
                <option value="" selected>Selecciona un procesador</option>
                <?php
                while ($row = $resultProcesador->fetch_assoc()) {
                    echo '<option value="' . $row['Id_Procesador'] . '">' . $row['Producto'] . '</option>';
                }
                ?>
            </select>
            <span id="precioProcesador">Precio: </span>
        </form>


        <!-- Formulario de selección para placas -->
        <form>
            <label for="productosPlaca">Placa:</label>
            <select id="productosPlaca" name="productosPlaca" onchange="mostrarPrecio('precioPlaca', this); mostrarMemoriasRAMCompatibles()">
                <option value="" selected>Selecciona un procesador primero</option>
                <!-- ... (resto del código de la selección de placas) ... -->
            </select>
            <span id="precioPlaca">Precio: </span>
        </form>


        <!-- Formulario de selección para memoria RAM -->
        <form>
            <label for="productosMemoriaRAM">Memoria RAM:</label>
            <select id="productosMemoriaRAM" name="productosMemoriaRAM" onchange="mostrarPrecio('precioMemoriaRAM', this)">
                <option value="" selected>Selecciona una placa primero</option>
            </select>
            <span id="precioMemoriaRAM">Precio: </span>
        </form>




        <!-- Formulario de selección para almacenamiento (1) -->
        <form>
            <label for="productosAlmacenamiento1">Almacenamiento (1):</label>
            <select id="productosAlmacenamiento1" name="productosAlmacenamiento1" onchange="mostrarPrecio('precioAlmacenamiento1', this)">
                <option value="" selected>Selecciona un producto de almacenamiento</option>
                <?php
                // Recorre los resultados y muestra cada producto como una opción en el select
                while ($row = $resultAlmacenamiento->fetch_assoc()) {
                    echo '<option value="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
                }
                ?>
            </select>
            <span id="precioAlmacenamiento1">Precio: </span>
        </form>

        <!-- Formulario de selección para almacenamiento (2) -->
        <form>
            <label for="productosAlmacenamiento2">Almacenamiento (2):</label>
            <select id="productosAlmacenamiento2" name="productosAlmacenamiento2" onchange="mostrarPrecio('precioAlmacenamiento2', this)">
                <option value="" selected>Selecciona un producto de almacenamiento</option>
                <?php
                // Vuelve a realizar la consulta para almacenamiento
                $resultAlmacenamiento = $conexion->query($queryAlmacenamiento);

                // Recorre los resultados y muestra cada producto como una opción en el select
                while ($row = $resultAlmacenamiento->fetch_assoc()) {
                    echo '<option value="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
                }
                ?>
            </select>
            <span id="precioAlmacenamiento2">Precio: </span>
        </form>


        <span id="sumaTotal">Suma Total: 0.00</span>

        <!-- Otro contenido de tu página -->
    </main>

    <footer>
        <p>&copy; 2023 La Bruja Store. Todos los derechos reservados.</p>
    </footer>
</body>

</html>