function mandar_al_servidor(user, pass, node, msg) {
    $.ajax({
        url: '../scriptsPHP/login.php',
        type: 'POST',
        data: {
            user: user,
            pass: pass,
            node: node
        },
        success: function (response) {
            let jsonString = JSON.stringify(response);
            let data = JSON.parse(jsonString);
            if (data.success) {
                window.location.href = data.reboot;
            }
            else {
                console.log(data)
                msg.textContent = data.mensaje;
                setTimeout(function () {
                    clearSubtx(msg);
                }, 3000);
            }
        }, error: function (jqXHR, textStatus, errorThrown) {
            // Error en la solicitud AJAX
            console.log('Error en la solicitud');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
};


function clearSubtx(msg) {
    msg.textContent = "";
}

const arepas_grid = document.getElementById('arepas-grid');
function displayProduct(product, imgRoute){
    //---------------> +++ <----------------//
    //Frente
    const cardFood = document.createElement('div');
    cardFood.setAttribute('class', 'card-food');

    const contentFood = document.createElement('div');
    contentFood.setAttribute('class', 'content-food');

    const backFood = document.createElement('div');
    backFood.setAttribute('class', 'back-food');

    const backFoodContent = document.createElement('div');
    backFoodContent.setAttribute('class', 'back-food-content');

    const img = document.createElement('img');
    img.setAttribute('alt', product.nombre);
    img.setAttribute('class', 'prod-img');
    img.src = imgRoute;

    const strong1 = document.createElement('strong');
    strong1.textContent = product.nombre;

    backFoodContent.appendChild(img);
    backFoodContent.appendChild(strong1);
    backFood.appendChild(backFoodContent);
    contentFood.appendChild(backFood);
    //---------------> Atrás <----------------//
    //Circulos
    const frontFood = document.createElement('div');
    frontFood.setAttribute('class', 'front-food');

    const imgFood = document.createElement('div');
    imgFood.setAttribute('class', 'img-food');

    const circleFood1 = document.createElement('div');
    circleFood1.setAttribute('class', 'circle-food');

    const circleFood2 = document.createElement('div');
    circleFood2.setAttribute('class', 'circle-food');
    circleFood2.setAttribute('id', 'right');
    
    const circleFood3 = document.createElement('div');
    circleFood3.setAttribute('class', 'circle-food');
    circleFood3.setAttribute('id', 'bottom');

    imgFood.appendChild(circleFood1);
    imgFood.appendChild(circleFood2);
    imgFood.appendChild(circleFood3);
    frontFood.appendChild(imgFood);

    const frontContent = document.createElement('div');
    frontContent.setAttribute('class', 'front-content');

    const small = document.createElement('small');
    small.setAttribute('class', 'badge');
    small.textContent = product.nombre;

    const descriptionFood = document.createElement('div');
    descriptionFood.setAttribute('class', 'description-food');

    const titleFood = document.createElement('div');
    titleFood.setAttribute('class', 'title-food');
    
    const titleFoodP = document.createElement('p');
    titleFoodP.setAttribute('class', 'title-food');

    const strong2 = document.createElement('strong');
    strong2.textContent = `Precio por unidad: $${product.precio}`;

    titleFoodP.appendChild(strong2);
    titleFood.appendChild(titleFoodP);

    // SVG
    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.setAttribute("fill-rule", "nonzero");
    svg.setAttribute("height", "15px");
    svg.setAttribute("width", "15px");
    svg.setAttribute("xmlns:xlink", "http://www.w3.org/1999/xlink");
    svg.setAttribute("xmlns", "http://www.w3.org/2000/svg");

    const group = document.createElementNS("http://www.w3.org/2000/svg", "g");
    group.setAttribute("style", "mix-blend-mode: normal");
    group.setAttribute("text-anchor", "none");
    group.setAttribute("font-size", "none");
    group.setAttribute("font-weight", "none");
    group.setAttribute("font-family", "none");
    group.setAttribute("stroke-dashoffset", "0");
    group.setAttribute("stroke-dasharray", "");
    group.setAttribute("stroke-miterlimit", "10");
    group.setAttribute("stroke-linejoin", "miter");
    group.setAttribute("stroke-linecap", "butt");
    group.setAttribute("stroke-width", "1");
    group.setAttribute("stroke", "none");
    group.setAttribute("fill-rule", "nonzero");
    group.setAttribute("fill", "#20c997");

    const transformGroup = document.createElementNS("http://www.w3.org/2000/svg", "g");
    transformGroup.setAttribute("transform", "scale(8,8)");

    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    path.setAttribute("d", "M25,27l-9,-6.75l-9,6.75v-23h18z");
    transformGroup.appendChild(path);
    group.appendChild(transformGroup);
    svg.appendChild(group);

    const cardFoodFooter = document.createElement('p');
    cardFoodFooter.setAttribute('class','card-food-footer');
    cardFoodFooter.textContent = "30 Mins &nbsp; | &nbsp; Disponible";
    
    titleFood.appendChild(svg);
    descriptionFood.appendChild(titleFood);
    descriptionFood.appendChild(cardFoodFooter);

    const formFood = document.createElement('div');
    formFood.setAttribute('class', 'form-food');

    const inputCantidad = document.createElement('input');
    inputCantidad.type = 'number';
    inputCantidad.name = 'cantidad';
    inputCantidad.value = '1';
    inputCantidad.min = '1';
    inputCantidad.max = '10';
    
    const btnAgregarCarrito = document.createElement('button');
    btnAgregarCarrito.className = 'btn btn-success';
    btnAgregarCarrito.textContent = 'Agregar al carrito';

    let banBac = true;
    btnAgregarCarrito.addEventListener('click', function(e) {
        if (banBac){
            agregarAlCarro(product.id, inputCantidad.value); 
            const btn = e.target;
    
            btn.classList.remove('btn-success');
            btn.classList.add('btn-danger');
            inputCantidad.disabled = true;
        
            btn.textContent = 'Quitar del carrito';
            banBac = false;
        } else {
            const btn = e.target;
            btn.classList.remove('btn-danger');
            btn.classList.add('btn-success');
            inputCantidad.disabled = false;
            
            quitarProducto(product.id);
            btn.textContent = 'Agregar al carrito'
            banBac = true;
        }
    });
    

    formFood.appendChild(inputCantidad);
    formFood.appendChild(btnAgregarCarrito);

    frontContent.appendChild(small);
    frontContent.appendChild(descriptionFood);
    frontContent.appendChild(formFood);

    frontFood.appendChild(imgFood);
    frontFood.appendChild(frontContent);

    contentFood.appendChild(backFood);
    contentFood.appendChild(frontFood);

    cardFood.appendChild(contentFood);
    arepas_grid.appendChild(cardFood);
}