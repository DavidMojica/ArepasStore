function mandar_al_servidor(user, pass, node){
    $.ajax({
        url: '../scriptsPHP/login.php',
        type: 'POST',
        data:{
            user: user,
            pass: pass,
            node: node
        },
        success: function(response){
            let jsonString = JSON.stringify(response);
            let data       = JSON.parse(jsonString);
            if(data.success){
                window.location.href = data.reboot;
            }
            else{
                msg.textContent = data.mensaje;
            }
        },error: function(jqXHR, textStatus, errorThrown){
            // Error en la solicitud AJAX
            console.log('Error en la solicitud');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
};