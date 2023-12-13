<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryMonitores = "SELECT Id_Monitor, Producto, Precio FROM monitor";
$resultMonitores = $conexion->query($queryMonitores);

if ($resultMonitores) {
    $monitores = [];
    while ($rowMonitor = $resultMonitores->fetch_assoc()) {
        $monitores[] = $rowMonitor;
    }
    echo json_encode($monitores);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
