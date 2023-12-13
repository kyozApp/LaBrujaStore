<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryRefrigeracion = "SELECT Id_Refrigeracion, Producto, Precio FROM refrigeracion";
$resultRefrigeracion = $conexion->query($queryRefrigeracion);

if ($resultRefrigeracion) {
    $refrigeraciones = [];
    while ($rowRefrigeracion = $resultRefrigeracion->fetch_assoc()) {
        $refrigeraciones[] = $rowRefrigeracion;
    }
    echo json_encode($refrigeraciones);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
