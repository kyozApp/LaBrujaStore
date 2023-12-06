function openDeleteModal(productId) {
    // Configurar el enlace de borrado en el modal
    document.getElementById('deleteProductBtn').href = 'borrar_producto.php?id=' + productId;

    // Mostrar el modal
    document.getElementById('deleteModal').style.display = 'block';
}

function closeDeleteModal() {
    // Ocultar el modal
    document.getElementById('deleteModal').style.display = 'none';
}
