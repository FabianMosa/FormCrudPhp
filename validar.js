function validarCampoVacio(campo) {
    if (campo.trim() == "" || campo.lenght == 0)
        return false;
    else return true;
}


function validar() {
    var nombre = document.getElementById('nombre').value;
    var password = document.getElementById('password').value;

    var valido = true;

    if (!validarCampoVacio(nombre)) {
        valido = false;
    }
    if (!validarCampoVacio(password)) {
        valido = false;
    }
    if(!valido)alert("Revisa que esten los datos correctos");

    return valido
}
