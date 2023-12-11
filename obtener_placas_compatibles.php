<?php
// obtener_placas_compatibles.php

// Incluye el archivo de conexión a la base de datos
include('conexiondb/conexion.php');

// Obtiene el ID del procesador desde la solicitud GET
$idProcesador = $_GET['id_procesador'];

// Realiza la consulta para obtener las placas compatibles con el procesador seleccionado
$queryPlacasCompatibles = "SELECT Producto, Precio, Id_Procesador FROM placa WHERE Id_Procesador = $idProcesador";
$resultPlacasCompatibles = $conexion->query($queryPlacasCompatibles);

// Almacena los resultados en un array
$placasCompatibles = array();
while ($row = $resultPlacasCompatibles->fetch_assoc()) {
    $placasCompatibles[] = $row;
}

// Devuelve los resultados en formato JSON
echo json_encode($placasCompatibles);
?>
