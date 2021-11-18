
    function cargarDatos(data) {
        var rows = "";
        $("#dataTable tr").remove();
        $("#dataTable").append('<tr><td>Id</td>' +
            '<td>Descripción</td>' +
            '<td>Costo</td>'+
            '<td>Actualizar</td>' +
            '<td>Eliminar</td>' +
            "</tr>"
            );
        for (x in data) {
            rows += `<tr row_id= ${data[x].idProducto}>`;
            rows += `<td><div col_name="idProducto">${data[x].idProducto}</div></td>`
            rows += `<td contenteditable="true" style="cursor: pointer;">${data[x].descripcion}</td>`
            rows += `<td contenteditable="true" style="cursor: pointer;">${data[x].costo}</td>`
            rows += `<td> <button type='button'onclick='productUpdate(this);'class='btn btn-primary'>Actualizar</button></td>`
            rows += `<td> <button type='button'onclick='productDelete(this);'class='btn btn-danger btn-sm'>Eliminar</button></td></tr>`

        }
        $("#dataTable").append(rows);
    }
    function submitFormUpdate(object){
         console.log(object);

           fetch('http://localhost/proyecto_umng/Tienda-Online-UMNG-main/backend/server/get_all_products.php', {
               method:'PUT',
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
                    
                    alert("Producto actualizado");
                }
                else {
                    alert("Error al actualizar");
                }
            })
            .catch(function (err) {
                console.error(err);
            });
    }

     function submitFormDelete(object){
         console.log(object);

           fetch('http://localhost/proyecto_umng/Tienda-Online-UMNG-main/backend/server/ProductoDelete.php', {
               method:'DELETE',
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
                if (data != -1) {
                    actualizar();
                    alert("Producto eliminado");
                }
                else {
                    alert("Error al eliminar");
                }
            })
            .catch(function (err) {
                console.error(err);
            });
    }

    function productUpdate(cellActual) {
        _row = $(cellActual).parents("tr");
        var cols = _row.children("td");
        var object = { "idProducto" : $(cols[0]).text() ,"descripcion": $(cols[1]).text(), "costo": $(cols[2]).text() };
        console.log(object); 
        submitFormUpdate(object);  
    }
  function productDelete(cellActual) {
        _row = $( cellActual).parents("tr");
        var cols = _row.children("td");
        var object = { "idProducto" : $(cols[0]).text()};
        console.log(object); 
        submitFormDelete(object);  
    }
   function actualizar(){
location.reload(true);
   }