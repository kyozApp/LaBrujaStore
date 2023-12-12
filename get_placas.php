<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json'); // Indicar que el contenido es JSON

if (isset($_GET['Id_Procesador'])) {
    $idProcesador = $_GET['Id_Procesador'];

    $queryPlacasCompatibles = "SELECT p.Id_Placa, p.Producto, p.Precio 
                               FROM placa p 
                               JOIN relacion_procesador_placa rp ON p.Id_Placa = rp.Id_Placa 
                               WHERE rp.Id_Procesador = $idProcesador";

    $resultPlacasCompatibles = $conexion->query($queryPlacasCompatibles);

    if ($resultPlacasCompatibles) {
        $placas = [];
        while ($rowPlaca = $resultPlacasCompatibles->fetch_assoc()) {
            $placas[] = $rowPlaca;
        }
        echo json_encode($placas);
    } else {
        // En caso de error, devolver un JSON con un mensaje de error
        echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
    }
} else {
    // En caso de que el ID de procesador no se haya proporcionado, devolver un JSON con un mensaje de error
    echo json_encode(["error" => "ID de procesador no proporcionado."]);
}

$conexion->close();
?>
