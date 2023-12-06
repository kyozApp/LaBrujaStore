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
    $idProducto = $_GET['id'];

    // Realizar una consulta para obtener la información del producto específico
    $query = "SELECT * FROM Producto WHERE Id_Producto = $idProducto";
    $result = $conexion->query($query);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta: " . $conexion->error);
    }

    // Obtener los datos del producto
    $producto = $result->fetch_assoc();

    // Verificar si se ha enviado la confirmación de borrado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_borrado'])) {
        // Eliminar la imagen asociada al producto
        $imagenRuta = $producto['Imagen'];
        unlink($imagenRuta);

        // Eliminar el producto de la base de datos
        $deleteQuery = "DELETE FROM Producto WHERE Id_Producto = $idProducto";
        $deleteResult = $conexion->query($deleteQuery);

        // Verificar si la eliminación fue exitosa
        if ($deleteResult) {
            // Redirigir a admin.php después de borrar el producto
            header('Location: admin.php');
            die();
        } else {
            echo "Error al borrar el producto: " . $conexion->error;
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
    <title>Borrar Producto</title>
    <link rel="stylesheet" href="../css/borrar_producto.css">
</head>
<body>
    <!-- Confirmación de borrado -->
    <div class="confirm-delete">
        <p>¿Estás seguro de borrar este producto?</p>
        <form method="post">
            <input type="submit" name="confirmar_borrado" value="Sí, borrar">
            <a href="admin.php">Cancelar</a>
        </form>
    </div>

    <script src="../js/borrar_producto.js"></script>
</body>
</html>
