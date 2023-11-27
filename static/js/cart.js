const cartBody = document.getElementById('cartBody');
const carrito = new Carrito();
var total=0;


function getCartProducts(){
    $.ajax({
        url: '../scriptsPHP/carrito.php',
        type: 'POST',
        data: {
            action: 4
        },
        success: function (response) {
            let productos = JSON.parse(response.reboot);
            for(let p of productos){
                carrito.addProduct(new Producto(p.id, p.nombre, p.precio, p.tipo, p.cantidad), false); 
                displayCartProducts(p);
            }
            graphTableFooter();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error al obtener los productos', textStatus, errorThrown);
        }
    });
}

async function clearAll(){
    await carrito.borrarTodo();
    window.location.reload(true);
}

function quitarProducto(producto, tr, precioTOT){
    const totalPrice = document.getElementById('totalPrice');
    precioTOT = parseInt(precioTOT);
    total -= precioTOT;
    totalPrice.textContent = total;
    tr.remove(); 
    carrito.removeProduct(producto);
}

function graphTableFooter(){
    const tr = document.createElement('tr');
    
    const th = document.createElement('th');
    th.scope = "row";

    const td1 = document.createElement('td');

    const form = document.createElement('form');
    form.setAttribute('class', 'form-row');
    form.action = "pedidos.php";
    form.method = "POST";

    const nombreEntrega = document.createElement('input');
    nombreEntrega.type = "text";
    nombreEntrega.placeholder = "¿Quien recibe? (nombre)";
    nombreEntrega.setAttribute('class', 'form-control mb-2 col-md-2');
    nombreEntrega.setAttribute('name', 'nombreEntrega');
    
    const direccion = document.createElement('input');
    direccion.type = "text";
    direccion.placeholder = "Ingrese la dirección destino";
    direccion.setAttribute('class', 'form-control mb-2 col-md-2');
    direccion.setAttribute('name', 'direccion');

    const td2 = document.createElement('td');
    td2.textContent = "Total";

    const td3 = document.createElement('td');
    td3.setAttribute('id', "totalPrice");
    td3.setAttribute('name', 'totalPrice');
    td3.textContent = total;

    const td4 = document.createElement('td');

    

    const hidden = document.createElement('input');
    hidden.id = "hidTotal";
    hidden.type = "hidden";
    hidden.textContent = total;

    form.appendChild(hidden);
    form.appendChild(hidden);
    

    if(Object.keys(carrito.productos).length >= 1){
        const btnComprar = document.createElement('button');
        btnComprar.textContent = 'Comprar';
        btnComprar.setAttribute('class', 'btn btn-success');
        form.appendChild(nombreEntrega);
        form.appendChild(direccion);
        form.appendChild(btnComprar);
        td4.appendChild(form);
    } else{
        const btnSinArticulos = document.createElement('button');
        btnSinArticulos.textContent = "Sin Articulos";
        btnSinArticulos.setAttribute('class', 'btn btn-warning');
        td4.appendChild(btnSinArticulos);
    }
    
    tr.appendChild(th);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    cartBody.appendChild(tr);
}

function displayCartProducts(producto){
    let subtotal = producto.cantidad * producto.precio;
    const tr = document.createElement('tr');
    
    const th = document.createElement('th');
    th.scope = "row";
    th.textContent = producto.nombre;

    const td1 = document.createElement('td');
    td1.textContent = producto.cantidad;

    const td2 = document.createElement('td');
    td2.textContent = producto.precio;

    const td3 = document.createElement('td');
    td3.textContent = subtotal;
    total += subtotal;

    const td4 = document.createElement('td');

    const btnBorrarProducto = document.createElement('button');
    btnBorrarProducto.textContent = 'Quitar producto';
    btnBorrarProducto.setAttribute('class', "btn btn-warning");
    btnBorrarProducto.addEventListener('click', function(){
        quitarProducto(producto, tr, td3.textContent);
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
//