const carrito = new Carrito();

$(document).ready(function() {
    $(".form-food").submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var formData = form.serialize();

        $.ajax({
            type: "POST",
            url: "../scriptsPHP/agregar_carrito.php",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.mensaje === 'Producto agregado al carrito') {
                    // Accede al objeto Carrito y agrega el producto
                    carrito.addProduct({
                        id: form.find('input[name="id"]').val(),
                        nombre: form.find('input[name="nombre"]').val(),
                        cantidad: parseInt(form.find('input[name="cantidad"]').val()),
                        precio: parseFloat(form.find('input[name="precio"]').val())
                    });

                    console.log(carrito)
                }

                alert(response.mensaje);
            },
            error: function(error) {
                console.error("Error en la solicitud AJAX", error);
            }
        });
    });
});

















// $(document).ready(function() {
//     // Función para agregar un producto al carrito mediante AJAX
//     $(document).ready(function() {
//         // Función para agregar un producto al carrito mediante AJAX
//         $(".form-food").submit(function(event) {
//             event.preventDefault();
    
//             var form = $(this);
//             var formData = form.serialize(); // Serializar datos del formulario
    
//             $.ajax({
//                 type: "POST",
//                 url: "../scriptsPHP/agregar_carrito.php",
//                 data: formData, // Enviar datos serializados
//                 dataType: "json",
//                 success: function(response) {
//                     console.log(response)
//                 },
//                 error: function(error) {
//                     console.error("Error en la solicitud AJAX", error);
//                 }
//             });
//         });
//     });
    

//     // Función para mostrar el carrito mediante AJAX
//     $(".btn-mostrar-carrito").click(function(event) {
//         event.preventDefault();

//         $.ajax({
//             type: "GET",
//             url: "mostrar_carrito.php",
//             dataType: "json",
//             success: function(response) {
//                 console.log(response);
//             },
//             error: function(error) {
//                 console.error("Error en la solicitud AJAX", error);
//             }
//         });
//     });
// });