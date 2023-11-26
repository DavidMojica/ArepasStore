const carrito1 = new Carrito();
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
        carrito1.addProduct(productoEncontrado, true);
    }
}

function quitarProducto(id){
    const productoEncontrado = productos.find(objeto => objeto.id === id);
    if (productoEncontrado) {
        carrito1.removeProduct(productoEncontrado);
    }
}