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
    $query = "SELECT * FROM producto WHERE Id_Producto = $idProducto";
    $result = $conexion->query($query);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        die("Error en la consulta: " . $conexion->error);
    }

    // Obtener los datos del producto
    $producto = $result->fetch_assoc();

    // Guardar la ruta de la imagen actual
    $imagenActual = $producto['Imagen'];

    // Verificar si se ha enviado el formulario de actualización
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener datos del formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $enlace = $_POST['enlace'];
        $categoria = $_POST['categoria'];
        $stock = $_POST['stock'];

        // Verificar si se ha seleccionado una nueva imagen
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Obtener la información del archivo de imagen
            $imagenNombre = $_FILES['imagen']['name'];
            $imagenTmpName = $_FILES['imagen']['tmp_name'];

            // Ruta donde se guardará la nueva imagen en el servidor
            $imagenNuevaRuta = '../img/producto/' . $imagenNombre;

            // Mover el archivo de la ubicación temporal a la ruta deseada
            move_uploaded_file($imagenTmpName, $imagenNuevaRuta);

            // Actualizar la información del producto en la base de datos con la nueva imagen
            $updateQuery = "UPDATE producto SET Nombre = '$nombre', Imagen = '$imagenNuevaRuta', Descripcion = '$descripcion', Precio = '$precio', Enlace = '$enlace', Categoria = '$categoria', Stock = '$stock' WHERE Id_Producto = $idProducto";
            $updateResult = $conexion->query($updateQuery);

            // Verificar si la actualización fue exitosa
            if ($updateResult) {
                // Eliminar la imagen antigua si la ruta de la imagen actual es diferente de la nueva ruta
                if ($imagenActual !== $imagenNuevaRuta) {
                    unlink($imagenActual);
                }

                // Redirigir a admin.php después de actualizar el producto
                header('Location: admin.php');
                die();
            } else {
                echo "Error al actualizar el producto: " . $conexion->error;
            }
        } else {
            // Si no se seleccionó una nueva imagen, actualizar la información del producto sin cambiar la imagen
            $updateQuery = "UPDATE producto SET Nombre = '$nombre', Descripcion = '$descripcion', Precio = '$precio', Enlace = '$enlace', Categoria = '$categoria', Stock = '$stock' WHERE Id_Producto = $idProducto";
            $updateResult = $conexion->query($updateQuery);

            // Verificar si la actualización fue exitosa
            if ($updateResult) {
                // Redirigir a admin.php después de actualizar el producto
                header('Location: admin.php');
                die();
            } else {
                echo "Error al actualizar el producto: " . $conexion->error;
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
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="../css/modificar_producto.css">
</head>
<body>
<div class="container">
        <form id="formModificarProducto" action="modificar_producto.php?id=<?= $idProducto ?>" method="post" enctype="multipart/form-data">
            <h2 class="titulo-modificar">Modificar Producto</h2>

            <div class="cont-modi">
            <label class="contenido" for="nombre">Nombre:</label>
            <input class="cont-contenido" type="text" id="nombre" name="nombre" value="<?= $producto['Nombre'] ?>" required><br>
            </div>

            <div class="cont-modi cont-modi-img">
            <label for="imagen" class="custom-file-upload">Seleccionar Archivo</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" onchange="previewImage()" style="display: none;">
            <img id="imagen-preview" alt="Imagen previa" src="<?= $producto['Imagen'] ?>">
            </div>

            <div class="cont-modi">
            <label class="contenido" for="descripcion">Descripción:</label>
            <textarea class="cont-contenido" id="descripcion" name="descripcion" required><?= $producto['Descripcion'] ?></textarea><br>
            </div>

            <div class="cont-modi">
            <label class="contenido" for="precio">Precio:</label>
            <input class="cont-contenido" type="text" id="precio" name="precio" value="<?= $producto['Precio'] ?>" required><br>
            </div>

            <div class="cont-modi">
            <label class="contenido" for="stock">Stock:</label>
            <input class="cont-contenido" type="text" id="stock" name="stock" value="<?= $producto['Stock'] ?>" required><br>
            </div>

            <div class="cont-modi">
            <label class="contenido" for="enlace">Enlace:</label>
            <input class="cont-contenido" type="text" id="enlace" name="enlace" value="<?= $producto['Enlace'] ?>" required><br>
            </div>

            <div class="cont-modi">
            <label class="contenido" for="categoria">Categoría:</label>
            <select class="cont-contenido" id="categoria" name="categoria" required>
                <?php
                $categorias = array("Procesador", "Placa", "Memoria ram", "Almacenamiento", "Tarjeta de video", "Fuente de poder", "Case", "Torre de refrigeracion", "Torre liquida", "Monitor", "Teclado", "Mouse", "Audifonos", "Laptop", "Combos");
                foreach ($categorias as $categoriaOption) {
                    $selected = ($categoriaOption == $producto['Categoria']) ? 'selected' : '';
                    echo "<option value='$categoriaOption' $selected>$categoriaOption</option>";
                }
                ?>
            </select>
            </div>

            <br>

            <input class="btn-actualizar" type="submit" value="Actualizar Producto">
            <a href="admin.php" type="button" class="button">Salir</a>
        </form>
    </div>

    <script src="../js/modificar_producto.js"></script>
</body>
</html>
