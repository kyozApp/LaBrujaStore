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

// Realizar una consulta para obtener la información de productos
$query = "SELECT * FROM Producto";
$result = $conexion->query($query);

// Realizar una consulta para obtener la información de cotizaciones
$queryCotizaciones = "SELECT * FROM Cotizacion";
$resultCotizaciones = $conexion->query($queryCotizaciones);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . $conexion->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://kit.fontawesome.com/3ee8728f65.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1>Bienvenido <?= $_SESSION['usuario'] ?></h1>
    <a href="../config/cerrar_sesion.php">Cerrar sesión</a>


    <table>
        <h1>Tabla de catalogo</h1>
        <p><a class="button" href="nuevo_producto.php">Crear</a></p>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Enlace</th>
            <th>Categoria</th>
            <th>Stock</th>
            <td></td>
            <td></td>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['Id_Producto']; ?></td>
                <td><?= $row['Nombre']; ?></td>
                <td><img src="<?= $row['Imagen']; ?>" alt="Imagen de <?= $row['Nombre']; ?>" style="max-width: 100px;"></td>
                <td><?= $row['Descripcion']; ?></td>
                <td><?= $row['Precio']; ?></td>
                <td><?= $row['Enlace']; ?></td>
                <td><?= $row['Categoria']; ?></td>
                <td><?= $row['Stock']; ?></td>
                <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
                <td><a href="modificar_producto.php?id=<?= $row['Id_Producto'] ?>"><i class="fas fa-pen"></i></a></td>
                <td><a href="borrar_producto.php?id=<?= $row['Id_Producto'] ?>"><i class="fas fa-trash"></i></a></td>

            </tr>
        <?php endwhile; ?>
    </table>

    <table>
        <h2>Tabla de Cotización</h2>
        <p><a class="button" href="nuevo_cotizacion.php">Crear</a></p>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Categoría</th>
            <td></td>
            <td></td>
        </tr>
        <?php while ($row = $resultCotizaciones->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['Id_Cotizacion']; ?></td>
                <td><?= $row['Nombre']; ?></td>
                <td><img src="<?= $row['Imagen']; ?>" alt="Imagen de <?= $row['Nombre']; ?>" style="max-width: 100px;"></td>
                <td><?= $row['Categoria']; ?></td>
                <td><a href="modificar_cotizacion.php?id=<?= $row['Id_Cotizacion'] ?>"><i class="fas fa-pen"></i></a></td>
                <td><a href="borrar_cotizacion.php?id=<?= $row['Id_Cotizacion'] ?>"><i class="fas fa-trash"></i></a></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <script src="../js/borrar_producto.js"></script>

</body>

</html>