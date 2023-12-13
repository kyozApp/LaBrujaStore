<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryMouses = "SELECT Id_Mouse, Producto, Precio FROM mouse";
$resultMouses = $conexion->query($queryMouses);

if ($resultMouses) {
    $mouses = [];
    while ($rowMouse = $resultMouses->fetch_assoc()) {
        $mouses[] = $rowMouse;
    }
    echo json_encode($mouses);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
