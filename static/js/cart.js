const cartBody = document.getElementById('cartBody');
const carrito = new Carrito();

function getCartProducts(){
    $.ajax({
        url: '../scriptsPHP/carrito.php',
        type: 'POST',
        data: {
            action: 4
        },
        success: function (response) {
            let productos = JSON.parse(response.reboot);
            console.log(productos)
            for(let p of productos){
                let producto = new Producto(p.id, p.nombre, p.precio, p.tipo, p.cantidad)
               carrito.addProduct(producto);
                displayCartProducts(p);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error al obtener los productos', textStatus, errorThrown);
        }
    });
}

function quitarProducto(id){
    for (const key in carrito.productos) {
        console.log(key)
        if (carrito.productos.hasOwnProperty(key)) {
            const producto = carrito.productos[key];
            if (producto.id === id) {
                var productoEncontrado = producto;
                console.log(productoEncontrado)
            }
        }
    }
    carrito.removeProduct(productoEncontrado);

}

function displayCartProducts(producto){
    const tr = document.createElement('tr');
    
    const th = document.createElement('th');
    th.scope = "row";
    th.textContent = producto.nombre;

    const td1 = document.createElement('td');
    td1.textContent = producto.cantidad;

    const td2 = document.createElement('td');
    td2.textContent = producto.precio;

    const td3 = document.createElement('td');
    td3.textContent = producto.cantidad * producto.precio;

    const td4 = document.createElement('td');
    

    const btnBorrarProducto = document.createElement('button');
    btnBorrarProducto.textContent = 'Quitar producto';
    btnBorrarProducto.setAttribute('class', "btn btn-warning");
    btnBorrarProducto.addEventListener('click', function(){
        quitarProducto(producto.id);
    });
    
    td4.appendChild(btnBorrarProducto);

    tr.appendChild(th);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    cartBody.appendChild(tr);
}


//-----------CODE
getCartProducts();
