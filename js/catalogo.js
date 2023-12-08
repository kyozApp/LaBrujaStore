// Función para abrir el modal y mostrar los detalles del producto
function abrirModal(elemento, nombre, imagen, precio, stock, enlace) {
  // Obtener la descripción del atributo personalizado
  var descripcion = decodeURIComponent(elemento.getAttribute('data-descripcion'));

  // Reemplazar saltos de línea con etiquetas <br>
  descripcion = descripcion.replace(/\n/g, '<br>');

  document.getElementById("nombreProductoModal").textContent = nombre;
  document.getElementById("imagenProductoModal").src = imagen;
  document.getElementById("precioProductoModal").textContent = "Precio: " + precio;
  document.getElementById("stockProductoModal").textContent = "Stock: " + stock;
  document.getElementById("descripcionProductoModal").innerHTML = "Descripción: " + descripcion;
  document.getElementById("enlaceProductoModal").href = enlace;

  document.getElementById("detalleProductoModal").style.display = "block";
}



// Función para cerrar el modal
function cerrarModal() {
  document.getElementById("detalleProductoModal").style.display = "none";
}

// Cerrar el modal si se hace clic fuera de él
window.onclick = function (event) {
  var modal = document.getElementById("detalleProductoModal");
  if (event.target === modal) {
    modal.style.display = "none";
  }
}
