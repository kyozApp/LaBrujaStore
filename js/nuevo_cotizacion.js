// Función para previsualizar la imagen seleccionada
function previewImage() {
    const input = document.getElementById('imagen');
    const preview = document.getElementById('imagen-preview');

    // Verificar si se seleccionó un archivo de imagen
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Event listener para el cambio en la selección de imagen
document.getElementById('imagen').addEventListener('change', previewImage);
