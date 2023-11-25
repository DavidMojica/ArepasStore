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
            carrito.productos = response.reboot;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error al obtener los productos', textStatus, errorThrown);
        }
    });
}

getCartProducts();

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

    const btnBorrarProducto = document.createElement('button');
    btnBorrarProducto.setAttribute('class', "btn btn-warning");
    btnBorrarProducto.addEventListener(function(){
        quitarProducto(producto.id);
    });

    tr.appendChild(th);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    cartBody.appendChild(tr);
}