<?php
        // Incluir el archivo de conexión
        include('conexiondb/conexion.php');

        // Ordenar las categorías según tu preferencia
        $categoriasOrdenadas = array("Procesador", "Placa", "Memoria ram", "Almacenamiento", "Tarjeta de video", "Fuente de poder", "Case", "Torre de refrigeracion", "Torre liquida", "Monitor", "Teclado", "Mouse", "Audifonos", "Laptop", "Combos");

        // Iterar sobre las categorías ordenadas
        foreach ($categoriasOrdenadas as $categoria) {
            // Realizar una consulta para obtener la información de productos de la categoría actual
            $query = "SELECT Nombre, Imagen, Precio, Stock, Descripcion, Enlace FROM Producto WHERE Categoria = '$categoria' ORDER BY Nombre";
            $result = $conexion->query($query);

            // Verificar si la consulta fue exitosa
            if ($result->num_rows > 0) {
                // Mostrar el título de la categoría
                echo '<h1>' . $categoria . '</h1>';

                // Abrir una fila para la categoría actual
                echo '<div class="product-row">';

                while ($producto = $result->fetch_assoc()) {
                    // Ruta relativa a la carpeta img/producto/
                    echo 'Ruta de la imagen en la base de datos: ' . $producto['Imagen'];
                    $imagenRuta = '' . $producto['Imagen'];
                
                    // Mostrar cada producto en una tarjeta
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $producto['Nombre'] . '</h5>';
                    // Ajusta la ruta de la imagen
                    echo 'Ruta de la imagen: ' . $imagenRuta;
                    echo '<img src="' . $imagenRuta . '" alt="' . $producto['Nombre'] . '" class="card-img-top">';
                    echo '<p class="card-text">' . $producto['Precio'] . '</p>';
                    echo '<a href="#" onclick="abrirModal(\'' . $producto['Nombre'] . '\', \'' . $imagenRuta . '\', \'' . $producto['Precio'] . '\', \'' . $producto['Stock'] . '\', \'' . $producto['Descripcion'] . '\', \'' . $producto['Enlace'] . '\')">Ver detalles</a>';
                    echo '</div>';
                    echo '</div>';
                }
                              

                // Cerrar la fila para la categoría actual
                echo '</div>';
            }
        }

        // Cerrar la conexión
        $conexion->close();
        ?>