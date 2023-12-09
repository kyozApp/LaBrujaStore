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

// Combinar datos de procesadores y almacenamientos
$datosCombinados = array(
    'procesadores' => $procesadores,
    'almacenamientos' => $almacenamientos
);

echo json_encode($datosCombinados);
?>
