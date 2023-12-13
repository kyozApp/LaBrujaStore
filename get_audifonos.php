<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryAudifonos = "SELECT Id_Audifono, Producto, Precio FROM audifono";
$resultAudifonos = $conexion->query($queryAudifonos);

if ($resultAudifonos) {
    $audifonos = [];
    while ($rowAudifono = $resultAudifonos->fetch_assoc()) {
        $audifonos[] = $rowAudifono;
    }
    echo json_encode($audifonos);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
