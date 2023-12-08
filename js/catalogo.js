// Función para abrir el modal y mostrar los detalles del producto
function abrirModal(nombre, imagen, precio, stock, descripcion, enlace) {
    document.getElementById("nombreProductoModal").innerHTML = nombre;
    document.getElementById("imagenProductoModal").src = imagen;
    document.getElementById("precioProductoModal").innerHTML = "Precio: " + precio;
    document.getElementById("stockProductoModal").innerHTML = "Stock: " + stock;
    document.getElementById("descripcionProductoModal").innerHTML = "Descripción: " + descripcion;
    document.getElementById("enlaceProductoModal").href = enlace;
  
    document.getElementById("detalleProductoModal").style.display = "block";
  }
  
  // Función para cerrar el modal
  function cerrarModal() {
    document.getElementById("detalleProductoModal").style.display = "none";
  }
  
  // Cerrar el modal si se hace clic fuera de él
  window.onclick = function(event) {
    var modal = document.getElementById("detalleProductoModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  }
  