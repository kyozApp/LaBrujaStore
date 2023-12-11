// index_producto.js

document.addEventListener('DOMContentLoaded', function () {
    var selectProcesador = document.getElementById('selectProcesador');
    var precioProcesador = document.getElementById('precioProcesador');

    // Agrega un evento de cambio al select de procesador
    selectProcesador.addEventListener('change', function () {
        // Obtiene la opción seleccionada
        var selectedOption = selectProcesador.options[selectProcesador.selectedIndex];

        // Muestra la información en la consola
        console.log('ID Procesador: ' + selectedOption.value);
        console.log('Producto Procesador: ' + selectedOption.text);
        console.log('Precio Procesador: $' + selectedOption.dataset.precio);

        // Muestra el precio en el span de procesador
        precioProcesador.textContent = 'Precio: $' + selectedOption.dataset.precio;
    });

    var selectAlmacenamiento = document.getElementById('selectAlmacenamiento');
    var precioAlmacenamiento = document.getElementById('precioAlmacenamiento');

    // Agrega un evento de cambio al select de almacenamiento
    selectAlmacenamiento.addEventListener('change', function () {
        // Obtiene la opción seleccionada
        var selectedOption = selectAlmacenamiento.options[selectAlmacenamiento.selectedIndex];

        // Muestra la información en la consola
        console.log('ID Almacenamiento: ' + selectedOption.value);
        console.log('Producto Almacenamiento: ' + selectedOption.text);
        console.log('Precio Almacenamiento: $' + selectedOption.dataset.precio);

        // Muestra el precio en el span de almacenamiento
        precioAlmacenamiento.textContent = 'Precio: $' + selectedOption.dataset.precio;
    });
});
