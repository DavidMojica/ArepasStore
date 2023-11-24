class Producto{
    constructor(id, nombre,precio, tipo){
        this.id = id;
        this.nombre = nombre;
        this.precio = precio;
        this.tipo = tipo;
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
        }
    }

    removeProduct(id) {
        if (this.productos[id]) {
            // Si el producto está en el carrito, se elimina
            delete this.productos[id];
        }
    }
}