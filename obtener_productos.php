<?php
include('conexiondb/conexion.php');

// Consulta para obtener los procesadores
$queryProcesadores = "SELECT * FROM procesador";
$resultProcesadores = $conexion->query($queryProcesadores);

$procesadores = array();

while ($row = $resultProcesadores->fetch_assoc()) {
    $procesador = array(
        'Id' => $row['Id_Procesador'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $procesadores[] = $procesador;
}

// Consulta para obtener los almacenamientos
$queryAlmacenamientos = "SELECT * FROM almacenamiento";
$resultAlmacenamientos = $conexion->query($queryAlmacenamientos);

$almacenamientos = array();

while ($row = $resultAlmacenamientos->fetch_assoc()) {
    $almacenamiento = array(
        'Id' => $row['Id_Almacenamiento'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $almacenamientos[] = $almacenamiento;
}

// Consulta para obtener las tarjetas de video
$queryTarjetasVideo = "SELECT * FROM tarjeta_de_video";
$resultTarjetasVideo = $conexion->query($queryTarjetasVideo);

$tarjetasVideo = array();

while ($row = $resultTarjetasVideo->fetch_assoc()) {
    $tarjetaVideo = array(
        'Id' => $row['Id_Tarjeta_De_Video'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $tarjetasVideo[] = $tarjetaVideo;
}

// Combinar datos de procesadores, almacenamientos y tarjetas de video
$datosCombinados = array(
    'procesadores' => $procesadores,
    'almacenamientos' => $almacenamientos,
    'tarjetasVideo' => $tarjetasVideo
);

echo json_encode($datosCombinados);
?>
