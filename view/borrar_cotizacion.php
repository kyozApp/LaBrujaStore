<?php
session_start();

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // Si no ha iniciado sesión, redirigimos a la página de inicio de sesión
    header('Location: login.php');
    die();
}

// Incluir el archivo de conexión
include('../conexiondb/conexion.php');

// Verificar si se ha proporcionado un ID válido en la URL
if (isset($_GET['id'])) {
    $idCotizacion = $_GET['id'];

    // Realizar una consulta para obtener la información de la cotización específica
    $query = "SELECT * FROM Cotizacion WHERE Id_Cotizacion = $idCotizacion";
    $result = $conexion->query($query);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta: " . $conexion->error);
    }

    // Obtener los datos de la cotización
    $cotizacion = $result->fetch_assoc();

    // Verificar si se ha enviado la confirmación de borrado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_borrado'])) {
        // Eliminar la imagen asociada a la cotización
        $imagenRuta = $cotizacion['Imagen'];
        unlink($imagenRuta);

        // Eliminar la cotización de la base de datos
        $deleteQuery = "DELETE FROM Cotizacion WHERE Id_Cotizacion = $idCotizacion";
        $deleteResult = $conexion->query($deleteQuery);

        // Verificar si la eliminación fue exitosa
        if ($deleteResult) {
            // Redirigir a admin.php después de borrar la cotización
            header('Location: admin.php');
            die();
        } else {
            echo "Error al borrar la cotización: " . $conexion->error;
        }
    }
} else {
    // Si no se proporcionó un ID válido, redirigir a la página de administración
    header('Location: admin.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar Cotización</title>
    <link rel="stylesheet" href="../css/borrar_cotizacion.css">
</head>
<body>
    <!-- Confirmación de borrado -->
    <div class="confirm-delete">
        <p>¿Estás seguro de borrar esta cotización?</p>
        <form method="post">
            <input type="submit" name="confirmar_borrado" value="Sí, borrar">
            <a href="admin.php">Cancelar</a>
        </form>
    </div>

    <script src="../js/borrar_cotizacion.js"></script>
</body>
</html>
