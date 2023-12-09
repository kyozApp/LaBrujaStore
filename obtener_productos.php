<?php
include('conexiondb/conexion.php');

$query = "SELECT * FROM procesador";
$result = $conexion->query($query);

$procesadores = array();

while ($row = $result->fetch_assoc()) {
    $procesador = array(
        'Id_Procesador' => $row['Id_Procesador'],
        'Nombre' => $row['Nombre'],
        'Precio' => $row['Precio']
    );

    $procesadores[] = $procesador;
}

echo json_encode($procesadores);
?>
