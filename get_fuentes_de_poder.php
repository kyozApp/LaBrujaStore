<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryFuentesDePoder = "SELECT Id_FuenteDePoder, Producto, Precio FROM fuente_de_poder";
$resultFuentesDePoder = $conexion->query($queryFuentesDePoder);

if ($resultFuentesDePoder) {
    $fuentesDePoder = [];
    while ($rowFuenteDePoder = $resultFuentesDePoder->fetch_assoc()) {
        $fuentesDePoder[] = $rowFuenteDePoder;
    }
    echo json_encode($fuentesDePoder);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
