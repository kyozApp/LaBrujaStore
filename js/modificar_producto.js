function previewImage() {
    var input = document.getElementById('imagen');
    var preview = document.getElementById('imagen-preview');
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            preview.src = e.target.result;
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}