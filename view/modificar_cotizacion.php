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

    // Guardar la ruta de la imagen actual
    $imagenActual = $cotizacion['Imagen'];

    // Verificar si se ha enviado el formulario de actualización
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener datos del formulario
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];

        // Verificar si se ha seleccionado una nueva imagen
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Obtener la información del archivo de imagen
            $imagenNombre = $_FILES['imagen']['name'];
            $imagenTmpName = $_FILES['imagen']['tmp_name'];

            // Ruta donde se guardará la nueva imagen en el servidor
            $imagenNuevaRuta = '../img/cotizacion/' . $imagenNombre;

            // Mover el archivo de la ubicación temporal a la ruta deseada
            move_uploaded_file($imagenTmpName, $imagenNuevaRuta);

            // Actualizar la información de la cotización en la base de datos con la nueva imagen
            $updateQuery = "UPDATE Cotizacion SET Nombre = '$nombre', Imagen = '$imagenNuevaRuta', Categoria = '$categoria' WHERE Id_Cotizacion = $idCotizacion";
            $updateResult = $conexion->query($updateQuery);

            // Verificar si la actualización fue exitosa
            if ($updateResult) {
                // Eliminar la imagen antigua si la ruta de la imagen actual es diferente de la nueva ruta
                if ($imagenActual !== $imagenNuevaRuta) {
                    unlink($imagenActual);
                }

                // Redirigir a admin.php después de actualizar la cotización
                header('Location: admin.php');
                die();
            } else {
                echo "Error al actualizar la cotización: " . $conexion->error;
            }
        } else {
            // Si no se seleccionó una nueva imagen, actualizar la información de la cotización sin cambiar la imagen
            $updateQuery = "UPDATE Cotizacion SET Nombre = '$nombre', Categoria = '$categoria' WHERE Id_Cotizacion = $idCotizacion";
            $updateResult = $conexion->query($updateQuery);

            // Verificar si la actualización fue exitosa
            if ($updateResult) {
                // Redirigir a admin.php después de actualizar la cotización
                header('Location: admin.php');
                die();
            } else {
                echo "Error al actualizar la cotización: " . $conexion->error;
            }
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
    <title>Modificar Cotización</title>
    <link rel="stylesheet" href="../css/modificar_cotizacion.css">
</head>
<body>
    <div class="container">
        <form id="formModificarCotizacion" action="modificar_cotizacion.php?id=<?= $idCotizacion ?>" method="post" enctype="multipart/form-data">
            <h2>Modificar Cotización</h2>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= $cotizacion['Nombre'] ?>" required><br>

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" onchange="previewImage()"><br>
            <img id="imagen-preview" alt="Imagen previa" src="<?= $cotizacion['Imagen'] ?>">

            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <?php
                $categorias = array("Placa", "Procesador", "Case");
                foreach ($categorias as $categoriaOption) {
                    $selected = ($categoriaOption == $cotizacion['Categoria']) ? 'selected' : '';
                    echo "<option value='$categoriaOption' $selected>$categoriaOption</option>";
                }
                ?>
            </select><br>

            <input type="submit" value="Actualizar Cotización">
            <a href="admin.php" type="button" class="button">Salir</a>
        </form>
    </div>

    <script src="../js/modificar_cotizacion.js"></script>
</body>
</html>
