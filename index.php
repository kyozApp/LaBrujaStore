<?php
// Incluir tu archivo de conexión
include 'conexiondb/conexion.php';

// Realizar la consulta para obtener los procesadores
$queryProcesadores = "SELECT Id_Procesador, Producto, Precio FROM procesador";
$resultProcesadores = $conexion->query($queryProcesadores);

// Realizar la consulta para obtener las placas
$queryPlacas = "SELECT Id_Placa, Producto, Producto FROM placa";
$resultPlacas = $conexion->query($queryPlacas);

// Verificar si las consultas fueron exitosas
if ($resultProcesadores && $resultPlacas) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <main>
        <!-- Primer select para procesadores -->
        <label for="procesador">Procesador:</label>
        <select name="procesador" id="procesador">
            <option value="" selected>Seleccionar</option>
            <?php
            while ($rowProcesador = $resultProcesadores->fetch_assoc()) {
                echo "<option value='{$rowProcesador['Id_Procesador']}' data-precio='{$rowProcesador['Precio']}'>{$rowProcesador['Producto']}</option>";
            }
            ?>
        </select>
        <span id="precioProcesador">Precio: S/. 0.00</span>

        <!-- Segundo select para placas -->
        <label for="placa">Placa:</label>
        <select name="placa" id="placa">
            <option value="" disabled selected>Seleccionar</option>
            <!-- Las opciones se llenarán dinámicamente con JavaScript -->
        </select>
        <span id="precioPlaca">Precio: S/. 0.00</span>

        <script>
            // Lógica de JavaScript para actualizar las opciones del segundo select y los precios
            document.getElementById('procesador').addEventListener('change', function() {
                // Obtener el valor y el precio seleccionado del primer select
                var idProcesador = this.value;
                var precioProcesador = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                // Actualizar el precio del procesador en el span
                document.getElementById('precioProcesador').textContent = "Precio: S/. " + (isNaN(precioProcesador) ? '0.00' : precioProcesador.toFixed(2));

                // Restablecer el precio de la placa a "Precio no disponible"
                document.getElementById('precioPlaca').textContent = "Precio: S/. ";

                // Realizar una solicitud AJAX para obtener las placas compatibles
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Limpiar las opciones actuales del segundo select
                        document.getElementById('placa').innerHTML = '';

                        // Parsear la respuesta JSON
                        var placas = JSON.parse(this.responseText);

                        // Agregar la opción "Seleccionar" al segundo select
                        var optionSeleccionar = document.createElement('option');
                        optionSeleccionar.value = "";
                        optionSeleccionar.text = "Seleccionar";
                        document.getElementById('placa').add(optionSeleccionar);

                        // Agregar las nuevas opciones al segundo select
                        for (var i = 0; i < placas.length; i++) {
                            var option = document.createElement('option');
                            option.value = placas[i].Id_Placa;
                            option.text = placas[i].Producto;
                            option.setAttribute('data-precio', placas[i].Precio);
                            document.getElementById('placa').add(option);
                        }
                    }
                };
                xhttp.open("GET", "get_placas.php?Id_Procesador=" + idProcesador, true);
                xhttp.send();
            });

            // Lógica para actualizar el precio de la placa seleccionada
            document.getElementById('placa').addEventListener('change', function() {
                // Obtener el precio seleccionado del segundo select
                var precioPlaca = parseFloat(this.options[this.selectedIndex].getAttribute('data-precio'));

                // Verificar si el precio es un número válido
                if (!isNaN(precioPlaca)) {
                    // Actualizar el precio de la placa en el span
                    document.getElementById('precioPlaca').textContent = "Precio: S/. " + precioPlaca.toFixed(2);
                } else {
                    // Manejar el caso en que el precio no sea un número válido
                    document.getElementById('precioPlaca').textContent = "Precio: S/. 0.00";
                }
            });
        </script>
    </main>
</body>

</html>

<?php
} else {
    // Si alguna consulta no fue exitosa, mostrar un mensaje de error
    echo "Error en la consulta: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
