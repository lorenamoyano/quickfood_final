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
        ||isNaN(num_card)) {
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