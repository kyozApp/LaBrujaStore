<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json');

$queryTarjetasDeVideo = "SELECT Id_TarjetaDeVideo, Producto, Precio FROM tarjeta_de_video";
$resultTarjetasDeVideo = $conexion->query($queryTarjetasDeVideo);

if ($resultTarjetasDeVideo) {
    $tarjetasDeVideo = [];
    while ($rowTarjetaDeVideo = $resultTarjetasDeVideo->fetch_assoc()) {
        $tarjetasDeVideo[] = $rowTarjetaDeVideo;
    }
    echo json_encode($tarjetasDeVideo);
} else {
    echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
}

$conexion->close();
?>
