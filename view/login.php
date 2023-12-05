<?php

include('../conexiondb/conexion.php'); // Incluye tu archivo de conexión

// Iniciamos las sesiones al principio del archivo
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales en la base de datos
    $consulta = "SELECT * FROM Usuario WHERE Usuario = '$usuario' AND Contraseña = '$contrasena'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        // El usuario ha iniciado sesión correctamente
        $row = $resultado->fetch_assoc();
        $_SESSION['id_usuario'] = $row['Id_Usuario'];
        $_SESSION['usuario'] = $row['Usuario'];
        $_SESSION['rol'] = $row['Rol'];

        // Redireccionar según el rol del usuario
        if ($_SESSION['rol'] == 'admin') {
            header("Location: admin.php");
            die();
        } elseif ($_SESSION['rol'] == 'cliente') {
            header("Location: cliente.php");
            die();
        } else {
            // Manejar otros roles según sea necesario
            echo "Rol no reconocido";
        }
    } else {
        echo "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <button type="submit">Iniciar Sesión</button>
        <a href="../index.php">Salir</a>
    </form>
</body>

</html>
