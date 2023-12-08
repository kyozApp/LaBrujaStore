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

// Definir las opciones de categoría
$categorias = array("Procesador", "Placa", "Memoria ram", "Almacenamiento", "Tarjeta de video", "Fuente de poder", "Case", "Torre de refrigeracion", "Torre liquida", "Monitor", "Teclado", "Mouse", "Audifonos", "Laptop", "Combos");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $enlace = $_POST['enlace'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];

    // Obtener la información del archivo de imagen
    $imagenNombre = $_FILES['imagen']['name'];
    $imagenTmpName = $_FILES['imagen']['tmp_name'];
    $imagenSize = $_FILES['imagen']['size'];
    $imagenError = $_FILES['imagen']['error'];

    // Verificar si se ha seleccionado un archivo de imagen
    if ($imagenError === UPLOAD_ERR_OK) {
        // Ruta donde se guardará la imagen en el servidor
        $imagenRuta = '../img/producto/' . $imagenNombre;

        // Mover el archivo de la ubicación temporal a la ruta deseada
        move_uploaded_file($imagenTmpName, $imagenRuta);

        // Preparar la consulta SQL
        $query = "INSERT INTO Producto (Nombre, Imagen, Descripcion, Precio, Enlace, Categoria, Stock) VALUES ('$nombre', '$imagenRuta', '$descripcion', '$precio', '$enlace', '$categoria', $stock)";

        // Ejecutar la consulta
        $result = $conexion->query($query);

        // Verificar si la consulta fue exitosa
        if ($result) {
            // Redirigir a admin.php después de agregar el producto
            header('Location: admin.php');
            die();
        } else {
            echo "Error al guardar el producto: " . $conexion->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear - CRUD PHP</title>
    <link rel="stylesheet" href="../css/nuevo_producto.css">
</head>

<body>
    <div class="container">
        <form action="nuevo_producto.php" method="post" enctype="multipart/form-data">
            <h2>Crear Nuevo Producto</h2>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required><br>
            <img id="imagen-preview" alt="Imagen previa">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea><br>

            <label for="precio">Precio:</label>
            <input type="text" id="precio" name="precio" required><br>

            <label for="stock">Stock:</label>
            <input type="text" id="stock" name="stock" required><br>

            <label for="enlace">Enlace:</label>
            <input type="text" id="enlace" name="enlace" required><br>

            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?= $categoria ?>"><?= $categoria ?></option>
                <?php endforeach; ?>
            </select><br>

            <input type="submit" value="Guardar Producto">
            <a href="admin.php" type="button" class="button">Salir</a>
        </form>
    </div>

    <script src="../js/nuevo_producto.js"></script>
</body>

</html>