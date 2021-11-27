// JQUERY Consultar base de datos

$(document).ready(function () {
    $("#pedidoForm").submit(function (event) {
        //cancels the form submission
        console.log("entro el pedido");
        event.preventDefault();
        submitFormInsertPedido();
    });
});


function submitFormInsertPedido() {
    var registro = $("#registro").val();
    var medioPago = $("#medioPago").val();
    var cantidad = $("#cantidad").val();
    

    var object = { "registro": registro, "medioPago": medioPago, "cantidad":cantidad};

    console.log(object);

    fetch('http://localhost/Tienda-Online-UMNG-main/Backend/server/business/PedidoInsert.php', {
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

