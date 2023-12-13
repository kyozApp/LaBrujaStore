<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryCases = "SELECT Id_Cases, Producto, Precio FROM cases";
$resultCases = $conexion->query($queryCases);

if ($resultCases) {
    $cases = [];
    while ($rowCase = $resultCases->fetch_assoc()) {
        $cases[] = $rowCase;
    }
    echo json_encode($cases);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
