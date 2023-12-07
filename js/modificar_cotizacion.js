// Función para mostrar la imagen previa antes de subirla
function previewImage() {
    const input = document.getElementById('imagen');
    const preview = document.getElementById('imagen-preview');
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        preview.src = '';
    }
}

// Puedes agregar más funciones o lógica según tus necesidades
