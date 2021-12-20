window.onload = function() {
    if (document.getElementById('arreglo').value != 0) {
        btn_terraza1()
    }
}

function validar() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (email == "" || password == "") {

        if (email == "" && password != "") {

            //alert ("No se ha especificado ningun Email");

            document.getElementById('mensaje').innerHTML = "<p>No se ha especificado ningun Email</p>";
            document.getElementById('mensaje').style.color = "red";
            document.getElementById('email').style.border = "2px solid red";
            document.getElementById('password').style.border = "2px solid grey";
            document.getElementById('mensaje').style.color = "red";
            return false;

        } else if (email != "" && password == "") {

            //alert ("No se ha especificado ninguna Contraseña");

            document.getElementById('mensaje').innerHTML = "<p>No se ha especificado ninguna Contraseña</p>";
            document.getElementById('mensaje').style.color = "red";
            document.getElementById('password').style.border = "2px solid red";
            document.getElementById('email').style.border = "2px solid grey";
            document.getElementById('mensaje').style.color = "red";
            return false;

        } else {

            //alert ("No se ha especificado ningun valor");

            document.getElementById('mensaje').innerHTML = "<p>No se ha especificado ningun Valor</p>";
            document.getElementById('mensaje').style.color = "red";
            document.getElementById('password').style.border = "2px solid red";
            document.getElementById('email').style.border = "2px solid red";
            document.getElementById('mensaje').style.color = "red";
            return false;
        }
    } else {
        return true;
    }
}

function errorini() {
    document.getElementById("errorinicio").innerHTML = "";
}

function crear() {
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('passwd').value;

    if (email == "" || password == "" || nombre == "" || apellido == "") {

        document.getElementById('mensaje').innerHTML = "<p>Faltan valores por especificar</p>";
        document.getElementById('mensaje').style.color = "red";
        document.getElementById('email').style.border = "2px solid red";
        document.getElementById('passwd').style.border = "2px solid red";
        document.getElementById('nombre').style.border = "2px solid red";
        document.getElementById('apellido').style.border = "2px solid red";
        return false;

    } else {

        return true;

    }
}

function crearmesa() {
    var comensal = document.getElementById('comensal').value;
    var lugar = document.getElementById('lugar').value;

    if (comensal == "" || lugar == "") {

        document.getElementById('mensaje').innerHTML = "<p>Faltan valores por especificar</p>";
        document.getElementById('mensaje').style.color = "red";
        document.getElementById('comensal').style.border = "2px solid red";
        document.getElementById('lugar').style.border = "2px solid red";
        return false;

    } else {

        return true;

    }
}

function reserva() {
    var dia = document.getElementById('dia_reserva').value;

    if (dia == "") {

        document.getElementById('mensaje').innerHTML = "<p>Tienes que especificar una fecha</p>";
        document.getElementById('mensaje').style.color = "red";
        document.getElementById('dia_reserva').style.border = "2px solid red";
        return false;

    } else {

        return true;

    }
}