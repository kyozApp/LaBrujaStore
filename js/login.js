function togglePassword() {
    var contrasenaInput = document.getElementById("contrasena");
    var tipo = contrasenaInput.getAttribute("type");
    if (tipo === "password") {
        contrasenaInput.setAttribute("type", "text");
    } else {
        contrasenaInput.setAttribute("type", "password");
    }
}