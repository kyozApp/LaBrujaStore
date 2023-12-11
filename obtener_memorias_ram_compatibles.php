<?php
// obtener_memorias_ram_compatibles.php

// Incluye el archivo de conexión a la base de datos
include('conexiondb/conexion.php');

// Obtiene el ID de la placa desde la solicitud GET
$idPlaca = $_GET['id_placa'];

// Realiza la consulta para obtener las memorias RAM compatibles con la placa seleccionada
$queryMemoriasRamCompatibles = "SELECT Producto, Precio FROM memoria_ram WHERE Id_Placa = $idPlaca";
$resultMemoriasRamCompatibles = $conexion->query($queryMemoriasRamCompatibles);

// Almacena los resultados en un array
$memoriasRamCompatibles = array();
while ($row = $resultMemoriasRamCompatibles->fetch_assoc()) {
    $memoriasRamCompatibles[] = $row;
}

// Devuelve los resultados en formato JSON
echo json_encode($memoriasRamCompatibles);
?>
