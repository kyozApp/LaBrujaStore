<?php
include 'conexiondb/conexion.php';

header('Content-Type: application/json'); // Indicar que el contenido es JSON

if (isset($_GET['Id_Placa'])) {
    $idPlaca = $_GET['Id_Placa'];

    $queryMemoriasRamCompatibles = "SELECT m.Id_MemoriaRam, m.Producto, m.Precio 
                                    FROM memoria_ram m 
                                    JOIN relacion_placa_memoria_ram rpmr ON m.Id_MemoriaRam = rpmr.Id_MemoriaRam 
                                    WHERE rpmr.Id_Placa = $idPlaca";

    $resultMemoriasRamCompatibles = $conexion->query($queryMemoriasRamCompatibles);

    if ($resultMemoriasRamCompatibles) {
        $memoriasRam = [];
        while ($rowMemoriaRam = $resultMemoriasRamCompatibles->fetch_assoc()) {
            $memoriasRam[] = $rowMemoriaRam;
        }
        echo json_encode($memoriasRam);
    } else {
        // En caso de error, devolver un JSON con un mensaje de error
        echo json_encode(["error" => "Error en la consulta: " . $conexion->error]);
    }
} else {
    // En caso de que el ID de la placa no se haya proporcionado, devolver un JSON con un mensaje de error
    echo json_encode(["error" => "ID de placa no proporcionado."]);
}

$conexion->close();
?>
