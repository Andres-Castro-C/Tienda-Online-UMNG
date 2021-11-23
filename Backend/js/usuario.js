// JQUERY Consultar base de datos

$(document).ready(function () {
    $("#usuarioForm").submit(function (event) {
        //cancels the form submission
        console.log("entro");
        event.preventDefault();
        submitFormInsert();
    });
});


function submitConsulta() {
    console.log("Entró a llamar");
    fetch('http://localhost/tienda/Backend/server/business/UsuarioConsulta.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(response => response.json())
        .then(result => {
            if (result.length > 0) {
                cargarDatos(result);
            } else {
                console.log(JSON.stringify(result));
            }
        })
        .catch(error => console.log('error: ' + error));
}

function submitFormInsert() {
    var nombre = $("#nombre").val();
    var documento = $("#documento").val();
    var fechaNacimiento = $("#fechaNacimiento").val();
    var correo = $("#correo").val();
    var clave = $("#clave").val();

    var object = { "nombre": nombre, "documento": documento, "fechaNacimiento":fechaNacimiento, "correo":correo,"clave":clave };

    console.log(object);

    fetch('http://localhost/tienda/Backend/server/business/UsuarioInsert.php', {
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
                alert("registrado");
            }
            else {
                alert("Error al registrarse");
            }
        })
        .catch(function (err) {
            console.error(err);
        });
}

