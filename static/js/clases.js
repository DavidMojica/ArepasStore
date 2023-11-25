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

    addProduct(producto) {
        if (this.productos[producto.id]) {
            // Si el producto ya está en el carrito, actualiza la cantidad
            this.productos[producto.id].cantidad += producto.cantidad;
        } else {
            // Si el producto no está en el carrito, se añade
            this.productos[producto.id] = producto;
            $.ajax({
                url: '../scriptsPHP/agregar_carrito.php',
                type: 'POST',
                data: {
                    id: producto.id,
                    nombre: producto.nombre,
                    precio: producto.precio,
                    cantidad: producto.cantidad,
                    action: 1
                },
                success: function (response) {
                    console.log('Producto agregado al carrito en el servidor:', response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error al agregar el producto al carrito en el servidor:', textStatus, errorThrown);
                }
            });
        }
    }

    removeProduct(id) {
        if (this.productos[id]) {
            // Si el producto está en el carrito, se elimina
            delete this.productos[id];
            $.ajax({
                url: '../scriptsPHP/agregar_carrito.php',
                type: 'POST',
                data: {
                    id: id,
                    action: 2
                },
                success: function (response) {
                    console.log('Producto agregado al carrito en el servidor:', response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error al agregar el producto al carrito en el servidor:', textStatus, errorThrown);
                }
            });
        }
    }
}