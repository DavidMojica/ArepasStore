$(document).ready(function() {
    // Función para agregar un producto al carrito mediante AJAX
    $(document).ready(function() {
        // Función para agregar un producto al carrito mediante AJAX
        $(".form-food").submit(function(event) {
            event.preventDefault();
    
            var form = $(this);
            var formData = form.serialize(); // Serializar datos del formulario
    
            $.ajax({
                type: "POST",
                url: "../scriptsPHP/agregar_carrito.php",
                data: formData, // Enviar datos serializados
                dataType: "json",
                success: function(response) {
                    console.log(response)
                },
                error: function(error) {
                    console.error("Error en la solicitud AJAX", error);
                }
            });
        });
    });
    

    // Función para mostrar el carrito mediante AJAX
    $(".btn-mostrar-carrito").click(function(event) {
        event.preventDefault();

        $.ajax({
            type: "GET",
            url: "mostrar_carrito.php",
            dataType: "json",
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error("Error en la solicitud AJAX", error);
            }
        });
    });
});