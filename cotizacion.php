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

// Realiza una consulta para obtener los productos de la tabla almacenamiento
$queryAlmacenamiento1 = "SELECT Id_Almacenamiento, Producto, Precio FROM almacenamiento";
$resultAlmacenamiento1 = $conexion->query($queryAlmacenamiento1);

// Verifica si la consulta fue exitosa para almacenamiento
if ($resultAlmacenamiento1) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para almacenamiento
    $optionsAlmacenamiento1 = '<option value="" selected>Seleccionar un almacenamiento</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultAlmacenamiento1->fetch_assoc()) {
        $optionsAlmacenamiento1 .= '<option value="' . $row['Id_Almacenamiento'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para almacenamiento
    $optionsAlmacenamiento1 = '<option value="">Error al obtener los productos de almacenamiento</option>';
}

// Realiza una consulta para obtener los productos de la tabla almacenamiento
$queryAlmacenamiento2 = "SELECT Id_Almacenamiento, Producto, Precio FROM almacenamiento";
$resultAlmacenamiento2 = $conexion->query($queryAlmacenamiento2);

// Verifica si la consulta fue exitosa para almacenamiento
if ($resultAlmacenamiento2) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para almacenamiento
    $optionsAlmacenamiento2 = '<option value="" selected>Seleccionar un almacenamiento</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultAlmacenamiento2->fetch_assoc()) {
        $optionsAlmacenamiento2 .= '<option value="' . $row['Id_Almacenamiento'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para almacenamiento
    $optionsAlmacenamiento2 = '<option value="">Error al obtener los productos de almacenamiento</option>';
}

// Realiza una consulta para obtener los productos de la tabla tarjeta_de_video
$queryTarjetaDeVideo = "SELECT Id_TarjetaDeVideo, Producto, Precio FROM tarjeta_de_video";
$resultTarjetaDeVideo = $conexion->query($queryTarjetaDeVideo);

// Verifica si la consulta fue exitosa para tarjeta_de_video
if ($resultTarjetaDeVideo) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para tarjeta_de_video
    $optionsTarjetaDeVideo = '<option value="" selected>Seleccionar una tarjeta de video</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultTarjetaDeVideo->fetch_assoc()) {
        $optionsTarjetaDeVideo .= '<option value="' . $row['Id_TarjetaDeVideo'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para tarjeta_de_video
    $optionsTarjetaDeVideo = '<option value="">Error al obtener los productos de tarjeta_de_video</option>';
}

// Realiza una consulta para obtener los productos de la tabla fuente_de_poder
$queryFuenteDePoder = "SELECT Id_FuenteDePoder, Producto, Precio FROM fuente_de_poder";
$resultFuenteDePoder = $conexion->query($queryFuenteDePoder);

// Verifica si la consulta fue exitosa para fuente_de_poder
if ($resultFuenteDePoder) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para fuente_de_poder
    $optionsFuenteDePoder = '<option value="" selected>Seleccionar una fuente de poder</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultFuenteDePoder->fetch_assoc()) {
        $optionsFuenteDePoder .= '<option value="' . $row['Id_FuenteDePoder'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para fuente_de_poder
    $optionsFuenteDePoder = '<option value="">Error al obtener los productos de fuente_de_poder</option>';
}

// Realiza una consulta para obtener los productos de la tabla cases
$queryCases = "SELECT Id_Cases, Producto, Precio FROM cases";
$resultCases = $conexion->query($queryCases);

// Verifica si la consulta fue exitosa para cases
if ($resultCases) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para cases
    $optionsCases = '<option value="" selected>Seleccionar un case</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultCases->fetch_assoc()) {
        $optionsCases .= '<option value="' . $row['Id_Cases'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para cases
    $optionsCases = '<option value="">Error al obtener los productos de cases</option>';
}

// Realiza una consulta para obtener los productos de la tabla monitor
$queryMonitor = "SELECT Id_Monitor, Producto, Precio FROM monitor";
$resultMonitor = $conexion->query($queryMonitor);

// Verifica si la consulta fue exitosa para monitor
if ($resultMonitor) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para monitor
    $optionsMonitor = '<option value="" selected>Seleccionar un monitor</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultMonitor->fetch_assoc()) {
        $optionsMonitor .= '<option value="' . $row['Id_Monitor'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para monitor
    $optionsMonitor = '<option value="">Error al obtener los productos de monitor</option>';
}

// Realiza una consulta para obtener los productos de la tabla teclado
$queryTeclado = "SELECT Id_Teclado, Producto, Precio FROM teclado";
$resultTeclado = $conexion->query($queryTeclado);

// Verifica si la consulta fue exitosa para teclado
if ($resultTeclado) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para teclado
    $optionsTeclado = '<option value="" selected>Seleccionar un teclado</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultTeclado->fetch_assoc()) {
        $optionsTeclado .= '<option value="' . $row['Id_Teclado'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para teclado
    $optionsTeclado = '<option value="">Error al obtener los productos de teclado</option>';
}

// Agregado: Realiza una consulta para obtener los productos de la tabla mouse
$queryMouse = "SELECT Id_Mouse, Producto, Precio FROM mouse";
$resultMouse = $conexion->query($queryMouse);

// Agregado: Verifica si la consulta fue exitosa para mouse
if ($resultMouse) {
    // Agregado: Crea el elemento de selección con los productos obtenidos de la base de datos para mouse
    $optionsMouse = '<option value="" selected>Seleccionar un mouse</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultMouse->fetch_assoc()) {
        $optionsMouse .= '<option value="' . $row['Id_Mouse'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Agregado: Maneja el caso de error en la consulta para mouse
    $optionsMouse = '<option value="">Error al obtener los productos de mouse</option>';
}

// Realiza una consulta para obtener los productos de la tabla audifono
$queryAudifono = "SELECT Id_Audifono, Producto, Precio FROM audifono";
$resultAudifono = $conexion->query($queryAudifono);

// Verifica si la consulta fue exitosa para audífonos
if ($resultAudifono) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para audífonos
    $optionsAudifono = '<option value="" selected>Seleccionar un audífono</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultAudifono->fetch_assoc()) {
        $optionsAudifono .= '<option value="' . $row['Id_Audifono'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para audífonos
    $optionsAudifono = '<option value="">Error al obtener los productos de audífonos</option>';
}

// Realiza una consulta para obtener los productos de la tabla accesorio 1
$queryAccesorio1 = "SELECT Id_Accesorio, Producto, Precio FROM accesorio";
$resultAccesorio1 = $conexion->query($queryAccesorio1);

// Verifica si la consulta fue exitosa para accesorios
if ($resultAccesorio1) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para accesorios
    $optionsAccesorio1 = '<option value="" selected>Seleccionar un accesorio</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultAccesorio1->fetch_assoc()) {
        $optionsAccesorio1 .= '<option value="' . $row['Id_Accesorio'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para accesorios
    $optionsAccesorio1 = '<option value="">Error al obtener los productos de accesorios</option>';
}

// Realiza una consulta para obtener los productos de la tabla accesorio 2
$queryAccesorio2 = "SELECT Id_Accesorio, Producto, Precio FROM accesorio";
$resultAccesorio2 = $conexion->query($queryAccesorio2);

// Verifica si la consulta fue exitosa para accesorios
if ($resultAccesorio2) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para accesorios
    $optionsAccesorio2 = '<option value="" selected>Seleccionar un accesorio</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultAccesorio2->fetch_assoc()) {
        $optionsAccesorio2 .= '<option value="' . $row['Id_Accesorio'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para accesorios
    $optionsAccesorio2 = '<option value="">Error al obtener los productos de accesorios</option>';
}

// Realiza una consulta para obtener los productos de la tabla accesorio 3
$queryAccesorio3 = "SELECT Id_Accesorio, Producto, Precio FROM accesorio";
$resultAccesorio3 = $conexion->query($queryAccesorio3);

// Verifica si la consulta fue exitosa para accesorios
if ($resultAccesorio3) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para accesorios
    $optionsAccesorio3 = '<option value="" selected>Seleccionar un accesorio</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultAccesorio3->fetch_assoc()) {
        $optionsAccesorio3 .= '<option value="' . $row['Id_Accesorio'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para accesorios
    $optionsAccesorio3 = '<option value="">Error al obtener los productos de accesorios</option>';
}

// Realiza una consulta para obtener los productos de la tabla accesorio 4
$queryAccesorio4 = "SELECT Id_Accesorio, Producto, Precio FROM accesorio";
$resultAccesorio4 = $conexion->query($queryAccesorio4);

// Verifica si la consulta fue exitosa para accesorios
if ($resultAccesorio4) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para accesorios
    $optionsAccesorio4 = '<option value="" selected>Seleccionar un accesorio</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultAccesorio4->fetch_assoc()) {
        $optionsAccesorio4 .= '<option value="' . $row['Id_Accesorio'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para accesorios
    $optionsAccesorio4 = '<option value="">Error al obtener los productos de accesorios</option>';
}

// Realiza una consulta para obtener los productos de la tabla refrigeracion
$queryRefrigeracion = "SELECT Id_Refrigeracion, Producto, Precio FROM refrigeracion";
$resultRefrigeracion = $conexion->query($queryRefrigeracion);

// Verifica si la consulta fue exitosa para refrigeración
if ($resultRefrigeracion) {
    // Crea el elemento de selección con los productos obtenidos de la base de datos para refrigeración
    $optionsRefrigeracion = '<option value="" selected>Seleccionar una refrigeración</option>'; // Agregado: opción predeterminada seleccionable
    while ($row = $resultRefrigeracion->fetch_assoc()) {
        $optionsRefrigeracion .= '<option value="' . $row['Id_Refrigeracion'] . '" data-precio="' . $row['Precio'] . '">' . $row['Producto'] . '</option>';
    }
} else {
    // Maneja el caso de error en la consulta para refrigeración
    $optionsRefrigeracion = '<option value="">Error al obtener los productos de refrigeración</option>';
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
        <!-- Formulario para el select de procesador -->
        <form>
            <label for="selectProcesador">Procesador:</label>
            <select id="selectProcesador">
                <?php echo $optionsProcesador; ?>
            </select>
            <span id="precioProcesador"></span>
        </form>

        <!-- Formulario para el select de almacenamiento 1 -->
        <form>
            <label for="selectAlmacenamiento1">Almacenamiento:</label>
            <select id="selectAlmacenamiento1">
                <?php echo $optionsAlmacenamiento1; ?>
            </select>
            <span id="precioAlmacenamiento1"></span>
        </form>

        <!-- Formulario para el select de almacenamiento 2 -->
        <form>
            <label for="selectAlmacenamiento2">Almacenamiento:</label>
            <select id="selectAlmacenamiento2">
                <?php echo $optionsAlmacenamiento2; ?>
            </select>
            <span id="precioAlmacenamiento2"></span>
        </form>

        <!-- Agregado: Formulario para el select de tarjeta_de_video -->
        <form>
            <label for="selectTarjetaDeVideo">Tarjeta de video:</label>
            <select id="selectTarjetaDeVideo">
                <?php echo $optionsTarjetaDeVideo; ?>
            </select>
            <span id="precioTarjetaDeVideo"></span>
        </form>

        <!-- Agregado: Formulario para el select de fuente_de_poder -->
        <form>
            <label for="selectFuenteDePoder">Fuente de poder:</label>
            <select id="selectFuenteDePoder">
                <?php echo $optionsFuenteDePoder; ?>
            </select>
            <span id="precioFuenteDePoder"></span>
        </form>

        <!-- Agregado: Formulario para el select de cases -->
        <form>
            <label for="selectCases">Cases:</label>
            <select id="selectCases">
                <?php echo $optionsCases; ?>
            </select>
            <span id="precioCases"></span>
        </form>

        <!-- Agregado: Formulario para el select de monitor -->
        <form>
            <label for="selectMonitor">Monitor:</label>
            <select id="selectMonitor">
                <?php echo $optionsMonitor; ?>
            </select>
            <span id="precioMonitor"></span>
        </form>

        <!-- Agregado: Formulario para el select de teclado -->
        <form>
            <label for="selectTeclado">Teclado:</label>
            <select id="selectTeclado">
                <?php echo $optionsTeclado; ?>
            </select>
            <span id="precioTeclado"></span>
        </form>

        <!-- Agregado: Formulario para el select de mouse -->
        <form>
            <label for="selectMouse">Mouse:</label>
            <select id="selectMouse">
                <?php echo $optionsMouse; ?>
            </select>
            <span id="precioMouse"></span>
        </form>

        <!-- Agregado: Formulario para el select de audífonos -->
        <form>
            <label for="selectAudifono">Audífono:</label>
            <select id="selectAudifono">
                <?php echo $optionsAudifono; ?>
            </select>
            <span id="precioAudifono"></span>
        </form>

        <!-- Agregado: Formulario para el select de accesorios 1 -->
        <form>
            <label for="selectAccesorio1">Accesorio:</label>
            <select id="selectAccesorio1">
                <?php echo $optionsAccesorio1; ?>
            </select>
            <span id="precioAccesorio1"></span>
        </form>

        <!-- Agregado: Formulario para el select de accesorios 2 -->
        <form>
            <label for="selectAccesorio2">Accesorio:</label>
            <select id="selectAccesorio2">
                <?php echo $optionsAccesorio2; ?>
            </select>
            <span id="precioAccesorio2"></span>
        </form>

        <!-- Agregado: Formulario para el select de accesorios 3 -->
        <form>
            <label for="selectAccesorio3">Accesorio:</label>
            <select id="selectAccesorio3">
                <?php echo $optionsAccesorio3; ?>
            </select>
            <span id="precioAccesorio3"></span>
        </form>

        <!-- Agregado: Formulario para el select de accesorios 4 -->
        <form>
            <label for="selectAccesorio4">Accesorio:</label>
            <select id="selectAccesorio4">
                <?php echo $optionsAccesorio4; ?>
            </select>
            <span id="precioAccesorio4"></span>
        </form>

        <!-- Agregado: Formulario para el select de refrigeración -->
        <form>
            <label for="selectRefrigeracion">Refrigeración:</label>
            <select id="selectRefrigeracion">
                <?php echo $optionsRefrigeracion; ?>
            </select>
            <span id="precioRefrigeracion"></span>
        </form>

        <!-- Agregado: Span para mostrar el precio total -->
        <span id="precioTotal"></span>



    </main>

    <footer>
        <p>&copy; 2023 La Bruja Store. Todos los derechos reservados.</p>
    </footer>

    <script src="index_producto.js"></script>
</body>

</html>