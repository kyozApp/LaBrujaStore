<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryAccesorios = "SELECT Id_Accesorio, Producto, Precio FROM accesorio";
$resultAccesorios = $conexion->query($queryAccesorios);

if ($resultAccesorios) {
    $accesorios = [];
    while ($rowAccesorio = $resultAccesorios->fetch_assoc()) {
        $accesorios[] = $rowAccesorio;
    }
    echo json_encode($accesorios);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
