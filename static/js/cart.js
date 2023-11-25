const cartBody = document.getElementById('cartBody');
var products = [];

function getCartProducts(){
    $.ajax({
        url: '../scriptsPHP/carrito.php',
        type: 'POST',
        data: {
            action: 4
        },
        success: function (response) {
            products = response.reboot;
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error al obtener los productos', textStatus, errorThrown);
        }
    });
}

getCartProducts();

function displayCartProducts(){
    
}