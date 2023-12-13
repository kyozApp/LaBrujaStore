<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryAlmacenamientos = "SELECT Id_Almacenamiento, Producto, Precio FROM almacenamiento";
$resultAlmacenamientos = $conexion->query($queryAlmacenamientos);

if ($resultAlmacenamientos) {
    $almacenamientos = [];
    while ($rowAlmacenamiento = $resultAlmacenamientos->fetch_assoc()) {
        $almacenamientos[] = $rowAlmacenamiento;
    }
    echo json_encode($almacenamientos);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
