document.getElementById('imagen').addEventListener('change', previewImage);

function previewImage() {
    var input = document.getElementById('imagen');
    var preview = document.getElementById('imagen-preview');
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        preview.src = e.target.result;
    };

    reader.readAsDataURL(file);
}