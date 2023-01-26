//script mostrar ou ocultar senha
const passwordInput = document.getElementById("password");

function eyeClick() {
    if (passwordInput.type === "password") {
        passwordInput.setAttribute("type", "text");
    } else {
        passwordInput.setAttribute("type", "password");
    }
}
