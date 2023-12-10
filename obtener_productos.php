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

// Consulta para obtener las fuentes de poder
$queryFuentesPoder = "SELECT * FROM fuente_de_poder";
$resultFuentesPoder = $conexion->query($queryFuentesPoder);

$fuentesPoder = array();

while ($row = $resultFuentesPoder->fetch_assoc()) {
    $fuentePoder = array(
        'Id' => $row['Id_Fuente_De_Poder'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $fuentesPoder[] = $fuentePoder;
}

// Consulta para obtener los cases
$queryCases = "SELECT * FROM cases";
$resultCases = $conexion->query($queryCases);

$cases = array();

while ($row = $resultCases->fetch_assoc()) {
    $case = array(
        'Id' => $row['Id_Cases'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $cases[] = $case;
}

// Consultas para obtener los datos de las nuevas secciones
$queryMonitores = "SELECT * FROM monitor";
$resultMonitores = $conexion->query($queryMonitores);

$monitores = array();

while ($row = $resultMonitores->fetch_assoc()) {
    $monitor = array(
        'Id' => $row['Id_Monitor'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $monitores[] = $monitor;
}

$queryTeclados = "SELECT * FROM teclado";
$resultTeclados = $conexion->query($queryTeclados);

$teclados = array();

while ($row = $resultTeclados->fetch_assoc()) {
    $teclado = array(
        'Id' => $row['Id_Teclado'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $teclados[] = $teclado;
}

$queryMouses = "SELECT * FROM mouse";
$resultMouses = $conexion->query($queryMouses);

$mouses = array();

while ($row = $resultMouses->fetch_assoc()) {
    $mouse = array(
        'Id' => $row['Id_Mouse'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $mouses[] = $mouse;
}

$queryAudifonos = "SELECT * FROM audifono";
$resultAudifonos = $conexion->query($queryAudifonos);

$audifonos = array();

while ($row = $resultAudifonos->fetch_assoc()) {
    $audifono = array(
        'Id' => $row['Id_Audifono'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $audifonos[] = $audifono;
}

$queryAccesorios = "SELECT * FROM accesorio";
$resultAccesorios = $conexion->query($queryAccesorios);

$accesorios = array();

while ($row = $resultAccesorios->fetch_assoc()) {
    $accesorio = array(
        'Id' => $row['Id_Accesorio'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $accesorios[] = $accesorio;
}

$queryRefrigeraciones = "SELECT * FROM refrigeracion";
$resultRefrigeraciones = $conexion->query($queryRefrigeraciones);

$refrigeraciones = array();

while ($row = $resultRefrigeraciones->fetch_assoc()) {
    $refrigeracion = array(
        'Id' => $row['Id_Refrigeracion'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $refrigeraciones[] = $refrigeracion;
}

// Combinar datos de procesadores, almacenamientos, tarjetas de video, fuentes de poder, cases, monitores, teclados, mouses, audífonos y refrigeraciones
$datosCombinados = array(
    'procesadores' => $procesadores,
    'almacenamientos' => $almacenamientos,
    'tarjetasVideo' => $tarjetasVideo,
    'fuentesPoder' => $fuentesPoder,
    'cases' => $cases,
    'monitores' => $monitores,
    'teclados' => $teclados,
    'mouses' => $mouses,
    'audifonos' => $audifonos,
    'accesorios' => $accesorios,
    'refrigeraciones' => $refrigeraciones
);

echo json_encode($datosCombinados);
?>
