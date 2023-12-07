<?php

// Incluir el archivo de conexión a la base de datos
include('../conexiondb/conexion.php');

// Consultar la base de datos para obtener la lista de procesadores
$sql = "SELECT Nombre FROM Cotizacion WHERE Categoria = 'Procesador'";
$resultado = $conexion->query($sql);

$procesadores = array();

if ($resultado->num_rows > 0) {
    // Recorrer los resultados y almacenar en el array de procesadores
    while ($fila = $resultado->fetch_assoc()) {
        $procesadores[] = $fila['Nombre'];
    }
}

// Devolver la lista de procesadores como respuesta en formato JSON
echo json_encode(['procesadores' => $procesadores]);

// Cerrar la conexión a la base de datos
$conexion->close();

?>
