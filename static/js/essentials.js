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

function displayProduct(product){
    
}