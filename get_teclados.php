<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryTeclados = "SELECT Id_Teclado, Producto, Precio FROM teclado";
$resultTeclados = $conexion->query($queryTeclados);

if ($resultTeclados) {
    $teclados = [];
    while ($rowTeclado = $resultTeclados->fetch_assoc()) {
        $teclados[] = $rowTeclado;
    }
    echo json_encode($teclados);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
