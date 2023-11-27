const changers = document.getElementsByClassName('changers');

Array.from(changers).forEach(element => {
    element.addEventListener('change', function() {
        const idPedido = element.getAttribute('data-idpedido');
        $.ajax({
            url: '../scriptsPHP/updateEstado.php',
            type: 'POST',
            data: {
                id: idPedido,
                value: element.value
            },
            success: function(response) {
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
            }
        });
    });
});
