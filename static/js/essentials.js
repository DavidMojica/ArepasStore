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

function getProducts(action) {
    $.ajax({
        url: '../scriptsPHP/getProducts.php',
        type: 'POST',
        data: {
            action: action
        },
        success: function (response) {
            let jsonString = JSON.stringify(response);
            let data = JSON.parse(jsonString);
            if(data.success){
                let totalProd = [];
                let products = data.reboot;
                for(let p of products){
                    totalProd.push(new Producto(p.id, p.nombre, p.precio, p.id_tipo));
                }
                console.log(totalProd);
                return totalProd;
            }else{
                console.log(data)
            }
        }, error: function (jqXHR, textStatus, errorThrown) {
            // Error en la solicitud AJAX
            console.log('Error en la solicitud');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}

const arepas_grid = document.getElementById('arepas-grid');
function displayProduct(product, imgRoute){
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
    //---------------> +++ <----------------//

    const frontFood = document.createElement('div');
    frontFood.setAttribute('class', 'front-food');

    const imgFood = document.createElement('div');
    imgFood.setAttribute('class', 'img-food');



}