<?php

include('../conexiondb/conexion.php'); // Incluye tu archivo de conexión

// Iniciamos las sesiones al principio del archivo
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales en la base de datos
    $consulta = "SELECT * FROM usuario WHERE Usuario = '$usuario' AND Contraseña = '$contrasena'";
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
        echo '<div class="div-mensaje"><p class="mensaje">Credenciales incorrectas</p></div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

<form method="post" action="" class="login-form">
        <div class="form-wrapper">

            <h1>Iniciar Sesión</h1>

            <div class="input-container">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>
            <div class="input-container">
                <label for="contrasena">Contraseña</label>
                <div class="password-input">
                    <input type="password" id="contrasena" name="contrasena" required>
                    <span class="toggle-password"></span>
                </div>
            </div>

            <div class="button-container">
                <button class="submit-button" type="submit">Iniciar Sesión</button>
                <a href="../index.php" class="exit-button">Salir</a>
            </div>

        </div>
    </form>

    <script src="../js/login.js"></script>

</body>

</html>