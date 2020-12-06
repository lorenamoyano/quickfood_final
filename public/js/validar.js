function validar_pago() {
    var nombre = document.getElementById("nombre").value;
    var telefono = document.getElementById("telefono").value;
    var direccion = document.getElementById("direccion").value;
    var num_card = document.getElementById("num_card").value;
    var mes = document.getElementById("mes").value;
    var year = document.getElementById("year").value;
    var cvv = document.getElementById("cvv").value;


    var valido = true;

    if (nombre.length == 0 || parseInt(nombre)) {
        document.getElementById("nombreHelp").style.visibility = "visible";
        valido = false;
    }

    if (telefono.length == 0 || (telefono.length > 9)) {
        document.getElementById("telefonoHelp").style.visibility = "visible";
        valido = false;
    }

    if ((direccion.length == 0)) {
        document.getElementById("direccionHelp").style.visibility = "visible";
        valido = false;
    }

    if (num_card.length < 13 || num_card.length > 17 || !/^(?:4[0-9]{12}(?:[0-9]{3})?)$/.test(num_card)
        || isNaN(num_card)) {
        document.getElementById("num_cardHelp").style.visibility = "visible";
        valido = false;
    }

    if (isNaN(mes) || mes <= 0 || mes > 12) {
        document.getElementById("mesHelp").style.visibility = "visible";
        valido = false;
    }

    if (isNaN(year) || year <= 2019 || year > 2050) {
        document.getElementById("yearHelp").style.visibility = "visible";
        valido = false;
    }

    if (isNaN(cvv) || cvv.length < 3 || cvv.length > 3) {
        document.getElementById("cvvHelp").style.visibility = "visible";
        valido = false;
    }

    return valido;
}

function quitarError(msg) {
    // Cada vez que se camibia un campo, se elimina mensaje de error
    document.getElementById(msg).style.visibility = "hidden";
}

function sonido() {
    var audio = document.getElementById("audio");
    audio.play();
}

function validar_registro() {
    var nombre = document.getElementById("nombre").value;
    var primerapellido = document.getElementById("apellido1").value;
    var segundoapellido = document.getElementById("apellido2").value;
    var dni = document.getElementById("DNI").value;
    var telefono = document.getElementById("telefono").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password-confirm").value;
    var ciudad = document.getElementById("ciudad").value;


    var valido = true;

    if (nombre.length == 0 || parseInt(nombre)) {
        document.getElementById("nombreHelp").style.visibility = "visible";
        valido = false;
    }

    if (primerapellido.length == 0 || parseInt(primerapellido)) {
        document.getElementById("apellido1Help").style.visibility = "visible";
        valido = false;
    }

    if (segundoapellido.length == 0 || parseInt(segundoapellido)) {
        document.getElementById("apellido2Help").style.visibility = "visible";
        valido = false;
    }

    if ((dni.length < 9) || !/^\d{8}[a-zA-Z]$/.test(dni)) {
        document.getElementById("DNIHelp").style.visibility = "visible";
        valido = false;
    }

    if (telefono.length == 0 || (telefono.length > 9)) {
        document.getElementById("telefonoHelp").style.visibility = "visible";
        valido = false;
    }

    if (email.length == 0 || !/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/.test(email)) {
        document.getElementById("emailHelp").style.visibility = "visible";
        valido = false;
    }

    if ((password.length < 5) || (password.length > 24) ||            /* entre 8 y 24 caracteres */
        !/[a-zñ]/.test(password) || !/[A-ZÑ]/.test(password) || /* minúscula y mayúscula */
        !/[0-9]/.test(password) ||                       /* dígito numérico obligatorio */
        !/[.,:;-_?¿+@]/.test(password)                    /* caracteres especiales obligatorio */
    ) {
        document.getElementById("passwordHelp").style.visibility = "visible";
        valido = false;
    }
    // La repetición de la contraseña coincide
    if (password != password2) {
        document.getElementById("passwod-confirmHelp").style.visibility = "visible";
        valido = false;
    }


    if (ciudad.length == 0 || parseInt(ciudad)) {
        document.getElementById("ciudadHelp").style.visibility = "visible";
        valido = false;
    }
    return valido;
}