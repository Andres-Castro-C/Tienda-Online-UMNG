// JQUERY Consultar base de datos

$(document).ready(function () {
    $("#usuarioForm").submit(function (event) {
        //cancels the form submission
        console.log("entro");
        event.preventDefault();
        submitFormInsert();
    });
});

$(document).ready(function () {
   $("#usuarioIniciosec").click(function (event) {
     event.preventDefault();
     console.log("entro");
     submitConsulta();
    });
});

function submitConsulta() {
    var correo = $("#correo").val();
    var clave = $("#clave").val();

    var object = { "correo":correo,"clave":clave };

    console.log(object);

    fetch('http://localhost/Tienda-Online-UMNG-main/Backend/server/business/UsuarioConsulta.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
     },
    })
    .then(response => response.json())
        .then(result => {
            if (result.length > 0) {
                alert("Ha iniciado sesión correctamente");
            } else {
                console.log(JSON.stringify(result));
                alert("Error al iniciar sesión");
            }
        })
        .catch(error => console.log('error: ' + error));
}


function submitFormInsert() {
    var nombre = $("#nombre").val();
    var documento = $("#documento").val();
    var fechaNacimiento = $("#fechaNacimiento").val();
    var correoRegistro = $("#correoRegistro").val();
    var claveRegistro = $("#claveRegistro").val();

    var object = { "nombre": nombre, "documento": documento, "fechaNacimiento":fechaNacimiento, "correo":correoRegistro,"clave":claveRegistro };

    console.log(object);

    fetch('http://localhost/Tienda-Online-UMNG-main/Backend/server/business/UsuarioInsert.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(object),
        cache: 'no-cache'

    })
        .then(function (response) {
            console.log("entró");
            return response.text();
        })
        .then(function (data) {
            if (data === " 1") {
                alert("Error al registrarse");
            }
            else {
                alert(" se registró");
            }
        })
        .catch(function (err) {
            console.error(err);
        });
}

