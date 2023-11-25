class Producto{
    constructor(id, nombre,precio, tipo, cantidad){
        this.id = id;
        this.nombre = nombre;
        this.precio = precio;
        this.tipo = tipo;
        this.cantidad = cantidad || 1;
    }
}

class Carrito{
    constructor() {
        this.productos = {};
    }
    addProduct(producto, act) {
        if (this.productos[producto.id]) {
            this.productos[producto.id].cantidad += producto.cantidad;
            $.ajax({
                url: '../scriptsPHP/carrito.php',
                type: 'POST',
                data: {
                    id: producto.id,
                    cantidad: producto.cantidad,
                    action: 3
                },
                success: function (response) {
                    console.log('Producto actualizado.', response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error al actualizar la cantidad', textStatus, errorThrown);
                }
            });
        } else {
            // Si el producto no está en el carrito, se añade
            this.productos[producto.id] = producto;
            if(act){
                $.ajax({
                    url: '../scriptsPHP/carrito.php',
                    type: 'POST',
                    data: {
                        id: producto.id,
                        nombre: producto.nombre,
                        precio: producto.precio,
                        cantidad: producto.cantidad,
                        tipo: producto.tipo,
                        action: 1
                    },
                    success: function (response) {
                        console.log('Producto agregado al carrito en el servidor:', response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('Error al agregar el producto al carrito en el servidor:',jqXHR, textStatus, errorThrown);
                    }
                });
            }
        }
    }

    removeProduct(producto) {
        if (this.productos[producto.id]) {
            console.log("entro")
            delete this.productos[producto.id];
            $.ajax({
                url: '../scriptsPHP/carrito.php',
                type: 'POST',
                data: {
                    id: producto.id,
                    action: 2
                },
                success: function (response) {
                    console.log('Producto borrado', response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error al borrar el producto', textStatus, errorThrown);
                }
            });
        } else{
            console.log(`error al borrar ajax ${producto}`)
        }
    }

    borrarTodo(){
        this.productos = {};
        $.ajax({
            url: '../scriptsPHP/carrito.php',
            type: 'POST',
            data: {
                action: 5
            },
            success: function (response) {
                console.log('Productos borrados', response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error al borrar los productos', textStatus, errorThrown);
            }
        });
    }
}