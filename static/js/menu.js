const carrito = new Carrito();
var productos = [];
const imagenes = [/*Rutas*/];


function getProducts(action) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: '../scriptsPHP/getProducts.php',
            type: 'POST',
            data: {
                action: action
            },
            success: function (response) {
                let jsonString = JSON.stringify(response);
                let data = JSON.parse(jsonString);
                if (data.success) {
                    let totalProd = [];
                    let products = data.reboot;
                    for (let p of products) {
                        totalProd.push(new Producto(p.id, p.nombre, p.precio, p.id_tipo));
                    }
                    resolve(totalProd);
                } else {
                    console.log(data);
                    reject('Error en la solicitud');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Error en la solicitud AJAX
                console.log('Error en la solicitud');
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                reject('Error en la solicitud');
            }
        });
    });
}

async function loadProducts() {
    try {
        productos = await getProducts(1);
        console.log(productos);
        for (let p of productos) {
            displayProduct(p, "../extras/resources/arepa-carne.jpg");
        }
    } catch (error) {
        console.error(error);
    }
}
loadProducts();

function agregarAlCarro(id, cantidad){
    const productoEncontrado = productos.find(objeto => objeto.id === id);
    if (productoEncontrado) {
        productoEncontrado.cantidad = parseInt(cantidad);
        carrito.addProduct(productoEncontrado, true);
    }
}

function quitarProducto(id){
    const productoEncontrado = productos.find(objeto => objeto.id === id);
    if (productoEncontrado) {
        carrito.removeProduct(productoEncontrado);
    }
}

















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