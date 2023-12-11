<?php
// Incluye el archivo de conexión a la base de datos
include('conexiondb/conexion.php');

// Realiza una consulta para obtener los productos de la tabla procesador
$queryProcesador = "SELECT Id_Procesador, Producto, Precio FROM procesador";
$resultProcesador = $conexion->query($queryProcesador);

// Verifica si la consulta fue exitosa para procesador
if ($resultProcesador) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para procesador
    $optionsProcesador = '<option value="" selected>Seleccionar un procesador</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultProcesador->fetch_assoc()) {
        $optionsProcesador .= '<option value="' . $row['Id_Procesador'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para procesador
    $optionsProcesador = '<option value="">Error al obtener los productos de procesador</option>';
}

// Realiza una consulta para obtener los productos de la tabla procesador
$queryAlmacenamiento = "SELECT Id_Almacenamiento, Producto, Precio FROM almacenamiento";
$resultAlmacenamiento = $conexion->query($queryAlmacenamiento);

// Verifica si la consulta fue exitosa para almacenamiento
if ($resultAlmacenamiento) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para almacenamiento
    $optionsAlmacenamiento = '<option value="" selected>Seleccionar un almacenamiento</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultAlmacenamiento->fetch_assoc()) {
        $optionsAlmacenamiento .= '<option value="' . $row['Id_Almacenamiento'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para almacenamiento
    $optionsAlmacenamiento = '<option value="">Error al obtener los productos de almacenamiento</option>';
}


// Cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda La Bruja Store</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index_producto.css">
</head>

<body>
    <header id="header">
        <!-- ... Tu código de encabezado ... -->
    </header>

    <main class="body-cont">
        <!-- Agrega un formulario con el select -->
        <form>
            <label for="selectProcesador">Procesador:</label>
            <select id="selectProcesador">
                <?php echo $optionsProcesador; ?>
            </select>

            <!-- Agregado: Span para mostrar el precio -->
            <span id="precioProcesador"></span>

            <label for="selectAlmacenamiento">Almacenamiento:</label>
            <select id="selectAlmacenamiento">
                <?php echo $optionsAlmacenamiento; ?>
            </select>

            <!-- Agregado: Span para mostrar el precio -->
            <span id="precioAlmacenamiento"></span>
        </form>

    </main>

    <footer>
        <p>&copy; 2023 La Bruja Store. Todos los derechos reservados.</p>
    </footer>

    <script src="index_producto.js"></script>
</body>

</html>